<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/carousel.css" />
<div id="carousel">
	<div class="next"><i class="fa fa-chevron-circle-right"></i></div>
	<div class="prev"><i class="fa fa-chevron-circle-left"></i></div>
	<?php $cat_name = 'Առանց մեկնաբանության'; ?>
	<h2><?php echo $cat_name; ?></h2>           
	<div class="carousel-items">    	
		<ul>
			<?php wp_reset_query();
			query_posts(array('posts_per_page' => 12, 'orderby' => 'date', 'cat' => get_cat_ID($cat_name)));
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li><a href="<?php echo get_permalink(); ?>">
					<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
						the_post_thumbnail('releated-thumb');
					}; ?>
					<span><?php the_time('j'); echo ' ' . arm_month(get_the_time('n'), long) . ', '; the_time('Y'); ?></span>
					<?php the_title(); ?>
				</a></li>					
				<?php endwhile;	endif; ?>
		</ul>
	</div>
</div>

<script>
	$("documnet").ready(function() {
		$(".carousel-items").jCarouselLite({
			btnNext: ".next",
			btnPrev: ".prev"
		});
	});
</script>
