<?php get_header(); ?>
<?php include('sidebar_left.php'); ?>
    <div id="content">
        <?php wp_reset_query();
        if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php dimox_breadcrumbs(); ?>
            <div id="post-title">
                <h4>
                    <?php $cs = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if ($cs) {
                        foreach ($cs as $c) {
                            if ($c->term_id != 669 && $c->term_id != 9) {
                                $output .= '<a href="' . get_category_link($c->term_id) . '">' . $c->cat_name . '</a>' . $separator;
                            }
                        }
                        echo trim($output, $separator);
                    } ?>
                    <h1><?php the_title(); ?></h1>
                </h4>
                <h4><?php the_time('j');
                    echo ' ' . arm_month(get_the_time('n'), long) . ', ';
                    the_time('Y'); ?></h4>
            </div>
            <div id="post">
                <div id="post-social">
                    <?php include('social.php'); ?>
                </div>
                <div id="post-body">
                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                        <?php $thumburl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), ''); ?>
                        <a id="single_2" href="<?php echo $thumburl[0]; ?>">
                            <?php the_post_thumbnail('post-thumb'); ?>
                        </a>
                    <?php } ?>
                    <div id="text-size">
                        <span id="text-size-inc"><i class="fa fa-search-plus"></i></span>
                        <span id="text-size-dec"><i class="fa fa-search-minus"></i></span>
                    </div>
                    <?php the_content(); ?>
                    <div class="viewscount">
                        <?php wpb_set_post_views(get_the_ID());
                        echo 'Դիտումներ՝ ' . wpb_get_post_views(get_the_ID()); ?>
                    </div>
                </div>

                <div class="cleaner"></div>

                <div id="post-comment">
                    <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5"></div>
                </div>

                <div class="cleaner"></div>

                <div id="releated-posts">
                    <?php include('releated_posts.php'); ?>
                </div>
            </div>
        <?php endwhile; endif;
        wp_reset_query(); ?>

    </div>
<?php get_sidebar(); ?>
    <div class="cleaner lineclear"></div>
<?php if (in_category(529)) { ?>
    <div id="banner">
        <div class="bannerLeft">
            <img src="<?php echo get_template_directory_uri(); ?>/images/banner1.jpg"/>
        </div>
        <div class="bannerRight">
            <img src="<?php echo get_template_directory_uri(); ?>/images/banner2.jpg"/>
        </div>
        <div class="bannerText">Այս կայքը գործում է «Մեդիան քաղաքացիների տեղեկացված մասնակցության համար» ծրագրի
            շրջանակում, որը հնարավոր է դարձել Ամերիկայի ժողովրդի աջակցությամբ ԱՄՆ Միջազգային զարգացման գործակալության
            (ԱՄՆ ՄԶԳ) միջոցով: Կայքի բովանդակության համար պատասխանատվությունը միմիայն հեղինակներինն է և պարտադիր չէ, որ
            արտահայտի ԱՄՆ ՄԶԳ կամ ԱՄՆ կառավարության տեսակետները:
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?>