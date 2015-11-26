<?php get_header(); ?>
<?php include('sidebar_left.php'); ?>
<div id="content">
	<?php wp_reset_query();
	if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div id="post">
			<div id="post-social">
				<?php include('social.php'); ?>
			</div>
			<div id="post-body">
				<?php the_content(); ?>
			</div>		
		</div>
	<?php endwhile; endif;
	wp_reset_query(); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>