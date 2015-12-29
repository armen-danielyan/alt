<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="hy">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="<?php echo home_url('/') . 'favicon.ico'; ?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo home_url('/') . 'favicon.ico'; ?>" type="image/x-icon"/>

    <?php wp_reset_query();
    if (is_single() || is_page()) : if (have_posts()) : while (have_posts()) : the_post(); ?>
        <meta name="description" content="<?php the_excerpt_rss(); ?>"/>
        <meta name="keywords" content="<?php meta_post_keywords(); ?>"/>
        <title><?php the_title();
            echo ' | ';
            bloginfo('name'); ?></title>
    <?php endwhile; endif;
    else : ?>
        <title><?php wp_title(' | ', true, 'right');
            bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>"/>
        <meta name="keywords"
              content="<?php echo 'ALT, TV, Armenia, online news, newspaper, Armavir, ԱԼՏ, հեռուստաընկերություն, Հայաստան, լրատվություն, լուրեր, Արմավիր, АЛТ, ТВ, Армения, интернет новости, Армавир' ?>"/>
    <?php endif;
    wp_reset_query(); ?>

    <!------------------------------>
    <!-- Add jQuery library -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.8.2.js"></script>

    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/main.js"></script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript"
            src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5"
          type="text/css" media="screen"/>
    <script type="text/javascript"
            src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet"
          href="<?php bloginfo('stylesheet_directory'); ?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5"
          type="text/css" media="screen"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript"
            src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript"
            src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet"
          href="<?php bloginfo('stylesheet_directory'); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7"
          type="text/css" media="screen"/>
    <script type="text/javascript"
            src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <script type="text/javascript">
        /* <![CDATA[ */
        $(document).ready(function () {
            $(".fancybox-thumb").fancybox({
                prevEffect: "elastic",
                nextEffect: "elastic",
                helpers: {
                    title: {
                        type: "outside"
                    },
                    thumbs: {
                        width: 50,
                        height: 50
                    }
                }
            });

            $(".fancybox-media").fancybox({
                openEffect: "fade",
                closeEffect: "fade",
                helpers: {
                    media: {}
                }
            });

            $("#single_2").fancybox({
                openEffect: "fade",
                closeEffect: "fade",
                helpers: {
                    title: {
                        type: "inside"
                    }
                }
            });

            $(".gallery-icon a").addClass("fancybox-thumb").attr("rel", "fancybox-thumb");
            $(".fancybox").fancybox();
        });
        /* ]]> */
    </script>
    <!------------------------------>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    

    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.nicescroll.js"></script>

    <!--GooglePlus-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!--END GooglePlus-->
    <!--Vkontakte-->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>
    <script type="text/javascript">
        VK.init({apiId: 4486983, onlyWidgets: true});
    </script>
    <!--END Vkontakte-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ltie9.css"/>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <meta property="fb:admins" content="816972429"/>
    <?php wp_head(); ?>
</head>
<body>

<?php
global $sape;
if (!defined('_SAPE_USER')) {
    define('_SAPE_USER', '364ab648cdc156452e2375acd0e4a98d');
}
require_once(realpath($_SERVER['DOCUMENT_ROOT'] . '/' . _SAPE_USER . '/sape.php'));
$sape = new SAPE_client();
?>

<!--Google tracking code-->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-32360873-1', 'auto');
    ga('send', 'pageview');
</script>
<!--END Google tracking code-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter19786015 = new Ya.Metrika({
                    id: 19786015,
                    webvisor: true,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="//mc.yandex.ru/watch/19786015" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<div id="scr">
    <div id="header">
        <div id="header-top-nav">
            <?php wp_nav_menu(array('container' => false, 'theme_location' => 'top-menu')); ?>
        </div>

        <div class="cleaner"></div>

        <div id="informers">
            <div id="header-col1" class="header-cols">
                <a href="<?php bloginfo('home'); ?>"><img
                        src="<?php bloginfo('stylesheet_directory'); ?>/images/header_logo.png" width=116
                        height=64/></a>
            </div>
            <div id="header-col2" class="header-cols">
                <h2><?php echo date('j'); ?></h2>
                <h4><?php if (function_exists('arm_month')) {
                        echo arm_month(date('n'), 'long');
                    } ?></h4>
                <h4><?php if (function_exists('arm_weekday')) {
                        echo arm_weekday(date('w'));
                    } ?></h4>
            </div>
            <div id="header-col3" class="header-cols">
                <?php include('weather.php'); ?>
            </div>
            <div id="header-col4" class="header-cols">
                <?php include('currency.php'); ?>
            </div>
            <div id="header-col5" class="header-cols">
                <?php get_search_form(); ?>
            </div>
        </div>

        <div class="cleaner"></div>

        <div id="header-nav">
            <?php wp_nav_menu(array('container' => false, 'theme_location' => 'main-menu')); ?>
        </div>

        <div id="informers-small">
            <div id="menu-box">
                <div id="header-menu-small">
                    <?php wp_nav_menu(array('container' => false, 'theme_location' => 'top-menu')); ?>
                    <div class="sep"></div>
                    <?php wp_nav_menu(array('container' => false, 'theme_location' => 'main-menu')); ?>
                    <div class="sep"></div>
                    <?php include('weather_small.php'); ?>
                    <div class="sep"></div>
                    <?php include('currency_small.php'); ?>
                </div>
            </div>
            <?php get_search_form(); ?>
        </div>
    </div>
    <div class="cleaner"></div>

    <div id="wrapper">