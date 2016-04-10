<div id="sidebar">
	<div class="widget">
		<h2><i class="fa fa-book title-icon"></i> ԲԱՌԱՐԱՆ</h2>
		<?php include('incl/dictionary.php'); ?>
	</div>

    <div class="widget">
        <h2><i class="fa fa-balance-scale title-icon"></i> UNDER CONST.</h2>
        <?php include('incl/reliable_information.php'); ?>
    </div>

	<div class="widget">
		<h2><i class="fa fa-calendar title-icon"></i> ԱՐԽԻՎ</h2>
		<?php include('incl/daterange_search.php'); ?>
	</div>

	<div class="widget">
		<h2 class="dw-logo">DW НОВОСТИ</h2>
		<?php include('incl/rss_reader.php'); ?>
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