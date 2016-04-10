<?php wp_reset_query();
$tags = get_the_tags();
$r = 0;
if($tags): $related = get_related_posts($post->ID, $tags);
	if($related->have_posts()) : ?>
		<h2>ԱՅՍ ԹԵՄԱՅՈՎ`</h2>
		<ul>
			<?php while($related->have_posts()) : $related->the_post(); $r++; ?>
			<li <?php if ($r == 2) echo 'class="last-small"'; elseif ($r == 4) echo 'style="margin-right: 0"'; ?>><a href="<?php the_permalink(); ?>">
				<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
					the_post_thumbnail('releated-thumb');
				} ?>
				<span><?php the_time('j'); echo ' ' . arm_month(get_the_time('n'), long) . ', '; the_time('Y'); ?></span>
				<?php the_title(); ?>
			</a></li>
			<?php endwhile; ?>
		</ul>
	<?php endif;                                    
endif;
wp_reset_query(); ?>
