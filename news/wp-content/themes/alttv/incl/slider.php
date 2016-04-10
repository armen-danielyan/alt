<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/slider.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/youtube.css" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui-1.9.0.custom.min.js" ></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui-tabs-rotate.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 10000, true);
	});
</script>
<div id="section-1">
	<div id="main-slider">
		<?php wp_reset_query();
		query_posts(array('posts_per_page' => 4, 'orderby' => 'date', 'tag' => 'slider'));
		$posts = array();
		if (have_posts()) : while (have_posts()) : the_post(); 
			$posts[] = $post;
		endwhile; endif;
		wp_reset_query(); ?>
		<div id="featured" >
			<ul class="ui-tabs-nav">
				<?php $m = 1;
				foreach($posts as $p) { ?>
					<li class="ui-tabs-nav-item" id="nav-fragment-<?php echo $m; ?>" <?php if ($m == 4) echo 'style="margin-bottom: 0"'; ?>>
						<a href="#fragment-<?php echo $m++; ?>">
							<?php echo get_the_post_thumbnail($p->ID, 'thumbnail'); ?>
							<span><?php echo $p->post_title; ?></span>
						</a>
					</li>
				<?php } ?>
			</ul>
			<?php $n = 1;
			foreach ($posts as $p) { ?>
				<div id="fragment-<?php echo $n++; ?>" class="ui-tabs-panel" style="">
					<?php echo get_the_post_thumbnail($p->ID, 'post-thumb'); ?>
					<div class="info" >
						<h3><a href="<?php echo get_permalink($p->ID); ?>" ><?php echo $p->post_title; ?></a></h3>
						<h4><?php echo $p->post_excerpt; ?></h4>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="cleaner"></div>
	<?php include('youtube.php'); ?>
</div>