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
                    <div id="text-size">
                        <span id="text-size-inc"><i class="fa fa-search-plus"></i></span>
                        <span id="text-size-dec"><i class="fa fa-search-minus"></i></span>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; endif;
        wp_reset_query(); ?>
    </div>
    <?php get_sidebar(); ?>
    <div class="cleaner lineclear"></div>
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
<?php get_footer(); ?>