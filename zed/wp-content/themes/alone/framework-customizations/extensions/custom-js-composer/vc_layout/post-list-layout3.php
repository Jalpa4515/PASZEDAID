<?php
	$thumb_size = (!empty($img_size))?$img_size:'full';
	$date = get_the_date();
	$date_d = date_i18n('d', strtotime($date));
	$date_m = date_i18n('M d, Y', strtotime($date));
?>
<div class="bt-item">
	<?php echo alone_post_thumbnail_render($image_type, $thumb_size, $img_ratio); ?>
	<div class="bt-content">
    <ul class="bt-meta">
		<li><i class="fa fa-user" aria-hidden="true"></i> <?php esc_html_e('By ', 'alone'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
		<li class="bt-date"><?php echo $date_m ?></li>
	  </ul>
	  <h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	  <?php echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), 21, $excerpt_more).'</div>'; ?>
    <div class="bt-readmore"><a href="<?php the_permalink(); ?>">Read More</a></div>
	</div>
</div>
