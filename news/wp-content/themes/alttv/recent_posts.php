<div class="widget">
	<h2>ԼՐԱՀՈՍ</h2>
	<div id="recent-posts">
		<?php wp_reset_query();
		query_posts(array('posts_per_page' => 32, 'orderby' => 'date')); ?>
		<ul class="boxscroll">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li><a href="<?php echo get_permalink(); ?>">
					<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
						the_post_thumbnail('thumbnail');
					} ?>
					<span><?php the_time('j'); echo ' ' . arm_month(get_the_time('n'), long); ?></span><?php the_title(); ?>
				</a></li>
			<?php endwhile; endif;
			wp_reset_query(); ?>
		</ul>
	</div>
</div>
<script>
	$(document).ready(function() {
		$(".boxscroll").niceScroll({touchbehavior:false, cursorcolor:"#5e707f", cursoropacitymax:0, cursorwidth:8, cursorborder:"none", cursorborderradius:"0px", background:"#ccc", autohidemode:"false"})
	});
</script>