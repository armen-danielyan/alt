<div id="sidebar">
	<div class="widget">
		<h2>ԱՐԽԻՎ</h2>
		<?php include('daterange_search.php'); ?>
	</div>
	<div class="widget">
		<?php include('rss_reader.php'); ?>
	</div>
	<div class="widget">
		<div class="fb-like-box" data-href="https://www.facebook.com/alttv.am" data-width="300" data-height="240" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
	</div>
	<div class="widget">
		<div class="g-page" data-href="//plus.google.com/u/0/104734310901064760212" data-layout="landscape" data-rel="publisher"></div>
	</div>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')): endif; ?>
    <?php
    if (is_single() || is_home() || is_page() || is_category()) {
        global $sape;
        $s = $sape->return_links();
        $s = mb_convert_encoding($s, "utf-8", "Windows-1251");
        if (strstr($s, "href")) {
            echo '<div class="widget"><div class="sapead">' . $s . '</div></div>';
        }

    };
    ?>
</div>