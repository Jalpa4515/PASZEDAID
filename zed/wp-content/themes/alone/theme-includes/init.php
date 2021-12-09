<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

class alone_Theme_Includes {
	private static $rel_path = null;

	private static $include_isolated_callable;

	private static $initialized = false;

	public static function init() {
		if ( self::$initialized ) {
			return;
		} else {
			self::$initialized = true;
		}

		/**
		 * Include a file isolated, to not have access to current context variables
		 */
		@self::$include_isolated_callable = create_function( '$path', 'include $path;' );

		/**
		 * Both frontend and backend
		 */
		{
			self::include_child_first( '/helpers.php' );
			self::include_child_first( '/hooks.php' );
			self::include_child_first( '/ajax.php' );
			self::include_child_first( '/includes/class-tgm-plugin-activation.php' );
			self::include_child_first( '/includes/html_build_attributes.php' );
			self::include_child_first( '/includes/scss.inc.php' );
			self::include_child_first( '/includes/VerifyTheme.php' );
			self::include_child_first( '/includes/sub-includes.php' );
      self::include_child_first( '/meta-boxes.php' );

			add_action( 'init', array( __CLASS__, '_action_init' ) );
			add_action( 'widgets_init', array( __CLASS__, '_action_widgets_init' ) );
		}

		/**
		 * Only frontend
		 */
		if ( ! is_admin() ) {
			add_action( 'wp_enqueue_scripts', array( __CLASS__, '_action_enqueue_scripts' ),
				20 // Include later to be able to make wp_dequeue_style|script()
			);
		} else {
			// for include back-end files
			add_action( 'admin_enqueue_scripts', array( __CLASS__, '_action_enqueue_admin_scripts' ),
				20 // Include later to be able to make wp_dequeue_style|script()
			);
		}
	}

	private static function get_rel_path( $append = '' ) {
		if ( self::$rel_path === null ) {
			self::$rel_path = '/theme-includes';
		}

		return self::$rel_path . $append;
	}

	private static function include_all_child_first( $dir_rel_path ) {
		$paths = array();

		if ( is_child_theme() ) {
			$paths[] = self::get_child_path( $dir_rel_path );
		}

		$paths[] = self::get_parent_path( $dir_rel_path );

		foreach ( $paths as $path ) {
			if ( $files = glob( $path . '/*.php' ) ) {
				foreach ( $files as $file ) {
					self::include_isolated( $file );
				}
			}
		}
	}

	/**
	 * @param string $directoryname 'foo-bar'
	 *
	 * @return string 'Foo_Bar'
	 */
	private static function directoryname_to_classname( $directoryname ) {
		$class_name = explode( '-', $directoryname );
		$class_name = array_map( 'ucfirst', $class_name );
		$class_name = implode( '_', $class_name );

		return $class_name;
	}

	public static function get_parent_path( $rel_path ) {
		return get_template_directory() . self::get_rel_path( $rel_path );
	}

	public static function get_child_path( $rel_path ) {
		if ( ! is_child_theme() ) {
			return null;
		}

		return get_stylesheet_directory() . self::get_rel_path( $rel_path );
	}

	public static function include_isolated( $path ) {
		call_user_func( self::$include_isolated_callable, $path );
	}

	public static function include_child_first( $rel_path ) {
		if ( is_child_theme() ) {
			$path = self::get_child_path( $rel_path );

			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
		}

		{
			$path = self::get_parent_path( $rel_path );

			if ( file_exists( $path ) ) {
				self::include_isolated( $path );
			}
		}
	}

	public static function include_parent_first($rel_path) {
		{
			$path = self::get_parent_path($rel_path);
			if (file_exists($path)) {
				self::include_isolated($path);
			}
		}
		if (is_child_theme()) {
			$path = self::get_child_path($rel_path);
			if (file_exists($path)) {
				self::include_isolated($path);
			}
		}
	}

	/**
	 * @internal
	 */
	public static function _action_enqueue_scripts() {
		self::include_parent_first( '/static.php' );
	}

	/**
	 * @internal
	 */
	public static function _action_enqueue_admin_scripts() {
		self::include_child_first( '/backend-static.php' );
	}

	/**
	 * @internal
	 */
	public static function _action_init() {
		self::include_child_first( '/menus.php' );
		self::include_child_first( '/posts.php' );
	}

	/**
	 * @internal
	 */
	public static function _action_widgets_init() {
		{
			$paths = array();

			if ( is_child_theme() ) {
				$paths[] = self::get_child_path( '/widgets' );
			}

			$paths[] = self::get_parent_path( '/widgets' );
		}

		$included_widgets = array();

		foreach ( $paths as $path ) {
			$dirs = glob( $path . '/*', GLOB_ONLYDIR );

			if ( ! $dirs ) {
				continue;
			}

			foreach ( $dirs as $dir ) {
				$directoryname = basename( $dir );

				if ( isset( $included_widgets[ $directoryname ] ) ) {
					// this happens when a widget in child theme wants to overwrite the widget from parent theme
					continue;
				} else {
					$included_widgets[ $directoryname ] = true;
				}

				self::include_isolated( $dir . '/class-widget-' . $directoryname . '.php' );

				register_widget( 'Widget_' . self::directoryname_to_classname( $directoryname ) );
			}
		}
	}
}

alone_Theme_Includes::init();

if(class_exists('VerifyTheme')){
	function verifytheme_init(){
		$VerifyTheme = new VerifyTheme();
	}
	add_action( 'after_setup_theme', 'verifytheme_init' );
}
add_action( 'tgmpa_register', 'alone_register_required_plugins' );

function alone_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'WPForms', // The plugin name.
			'slug'         => 'wpforms', // The plugin slug (typically the folder name).
			//'source'       => 'https://wpforms.com/', // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://wpforms.com/', // If set, overrides default API URL and points to an external URL.
		),

	);


	$config = array(
		'id'           => 'alone',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		//'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}
