<?php get_header(); ?>
<?php include('incl/sidebar_left.php'); ?>
    <div id="content">
        <div id="archive">
            <?php if(is_category()) {
                $currentCat = get_query_var('cat');
                $arg = array(
                    "child_of" => 529,
                    "hide_empty" => 0
                );
                $cats = get_categories($arg);
                $parrentCats = get_category_parents($currentCat, false, ',');
                $parrentCatsArray = explode(',', $parrentCats);

                if (is_category(529) || count($parrentCatsArray) > 2) { ?>
                    <div id="community">
                        <ul>
                            <?php foreach ($cats as $cat) { ?>
                                <?php $catLink = get_category_link($cat->term_id); ?>
                                <li <?php if(get_cat_name($currentCat) == $cat->name) echo 'class="current-menu-item"'; ?>><a href="<?php echo $catLink; ?>"><?php echo $cat->name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php if(count($parrentCatsArray) > 2){ ?>
                        <div id="tabs">
                            <div id="tab-button-1" class="tab-button active-tab">Արխիվ</div>
                            <div id="tab-button-2" class="tab-button">Ավագանի</div>
                            <div id="tab-button-3" class="tab-button">Տեղեկություններ</div>
                        </div>
                        <div class="documents" id="tab2" style="display: none;">
                            <?php $docsArgs = array(
                                "post_type" => "document",
                                "cat" => $currentCat,
                                "post_status" => "publish",
                                "posts_per_page" => 10,
                            );
                            $docsQuery = new WP_Query($docsArgs);
                            if($docsQuery -> have_posts()) : ?>
                                <h2>Ավագանու որոշումներ</h2>
                                <ul>
                                    <?php while($docsQuery -> have_posts()): $docsQuery -> the_post(); ?>
                                        <li>
                                            <?php $documentURL = get_post_meta(get_the_id(), "_document_url", true);
                                            $documentExt = pathinfo($documentURL, PATHINFO_EXTENSION);
                                            switch ($documentExt) {
                                                case "doc":
                                                    $ext = "fa-file-word-o";
                                                    break;
                                                case "docx":
                                                    $ext = "fa-file-word-o";
                                                    break;
                                                case "xls":
                                                    $ext = "fa-file-excel-o";
                                                    break;
                                                case "xlsx":
                                                    $ext = "fa-file-excel-o";
                                                    break;
                                                case "pdf":
                                                    $ext = "fa-file-pdf-o";
                                                    break;
                                                case "txt":
                                                    $ext = "fa-file-text-o";
                                                    break;
                                                case "jpg":
                                                    $ext = "fa-file-image-o";
                                                    break;
                                                case "png":
                                                    $ext = "fa-file-image-o";
                                                    break;
                                                case "bmp":
                                                    $ext = "fa-file-image-o";
                                                    break;
                                                case "zip":
                                                    $ext = "fa-file-archive-o";
                                                    break;
                                                case "rar":
                                                    $ext = "fa-file-archive-o";
                                                    break;
                                                default:
                                                    $ext = "fa-file-o";
                                            } ?>
                                            <a href="<?php echo $documentURL; ?>" target="_blank"><i class="fa <?php echo $ext; ?> fa-2x"></i>&nbsp;&nbsp;<?php the_title(); ?></a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>

                        </div>
                        <div id="tab3" style="display: none;">
                            <h2>Տեղեկություններ համայնքի մասին</h2>

                            <?php $termLongitude = get_term_meta($currentCat, 'map-longitude', true);
                            $termLatitude = get_term_meta($currentCat, 'map-latitude', true);

                            if(!empty($termLongitude) && !empty($termLatitude)){
                                $LatLng = esc_attr($termLongitude) . ',' . esc_attr($termLatitude);
                            } ?>
                            <script
                                src="http://maps.googleapis.com/maps/api/js">
                            </script>

                            <script>
                                var myCenter=new google.maps.LatLng(<?php echo $LatLng; ?>);

                                function initialize(){
                                    var mapProp = {
                                        center:myCenter,
                                        zoom:13,
                                        mapTypeId:google.maps.MapTypeId.ROADMAP
                                    };

                                    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                                    var marker=new google.maps.Marker({
                                        position:myCenter
                                    });
                                    marker.setMap(map);
                                }
                            </script>

                            <div id="googleMap" style="height:250px;"></div>
                            <div id="termDescription">
                                <?php echo term_description($currentCat, 'category'); ?>
                            </div>
                        </div>
                    <?php }
                }
                $taxTitle = single_cat_title("", false);
            } elseif (is_tag()) {
                $taxTitle = single_tag_title("", false);
            } elseif (is_day()) {
                $taxTitle = get_the_time('j'). ' ' . arm_month(get_the_time('n'), "long") . ', ' . get_the_time('Y');
            } elseif (is_month()) {
                $taxTitle = arm_month(get_the_time('n'), long) . ', ' . get_the_time('Y');
            } elseif (is_year()) {
                $taxTitle = get_the_time('Y');
            } ?>
            <div id="tab1" style="display: block;">
                <?php if(have_posts()) : ?>
                    <h2><?php echo 'ԱՐԽԻՎ` ' . $taxTitle; ?></h2>
                    <ul>
                        <?php while (have_posts()) : the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                                        the_post_thumbnail('thumbnail');
                                    } ?>
                                    <span>
                                        <?php the_time('j');
                                        echo ' ' . arm_month(get_the_time('n'), long) . ', ';
                                        the_time('Y'); ?>
                                    </span>
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
                <?php if (function_exists('pagination')) {
                    pagination();
                } ?>
            </div>
        </div>

    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>