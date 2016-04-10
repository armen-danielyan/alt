<div id="category-list">
	<?php wp_reset_query();
    $categories = array( 10, 8, 940, 529, 6, 7);
	foreach($categories as $cat) : ?>
		<div class="category-item">
			<?php $j = 0;
			query_posts(array('orderby' => 'date', 'posts_per_page' => 4, 'cat' => $cat));
			if (have_posts()) : 
				$cat_name = get_cat_name($cat);
				$cat_url = get_category_link($cat); ?>
				<a href=<?php echo $cat_url; ?>><h2><?php echo mb_strtoupper($cat_name, 'UTF-8'); ?></h2></a>
				<?php while (have_posts()) : the_post(); 
					$j++; ?>
					<div class="post-items-<?php if ($j == 1) echo 'first'; else echo 'other'; ?>">
						<a href="<?php the_permalink(); ?>">
							<?php if ($j == 1) {
								if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
									the_post_thumbnail('category-thumb');
								} ?>
								<h3><?php the_title(); ?></h3>                        			
							<?php } else { ?>
								&bull;
								<?php echo ' '; the_title(); ?>
							<?php } ?>
						</a>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>	
		</div>
	<?php endforeach;
	wp_reset_query(); ?>
</div>

<div class="cleaner"></div>