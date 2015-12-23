<?php get_header(); ?>
<?php include('sidebar_left.php'); ?>
    <div id="content">
        <div id="archive">
            <?php $t = false;
            if (is_category()) {
                $currentCat = get_query_var('cat');
                $arg = array(
                    "child_of" => 529,
                    "hide_empty" => 0
                );
                $cats = get_categories($arg);
                $parrentCats = get_category_parents($currentCat, false, ',');
                $parrentCatsArray = explode(',', $parrentCats);

                if (is_category(529) || count($parrentCatsArray) > 2) { ?>
                    <?php $t = true; ?>
                    <div id="community">
                        <ul>
                            <?php foreach ($cats as $cat) { ?>
                                <?php $catLink = get_category_link($cat->term_id); ?>
                                <li <?php if(get_cat_name($currentCat) == $cat->name) echo 'class="current-menu-item"'; ?>><a href="<?php echo $catLink; ?>"><?php echo $cat->name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php if(count($parrentCatsArray) > 2){ ?>
                        <div class="documents">
                            <?php $docsArgs = array(
                                "post_type" => "document",
                                "cat" => $currentCat,
                                "post_status" => "publish",
                                "posts_per_page" => 10,
                            );
                            $docsQuery = new WP_Query($docsArgs);
                            if($docsQuery -> have_posts()) : ?>
                                <h3>Ավագանու որոշումներ</h3>
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
            }
            if(have_posts()) : ?>
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
<?php get_sidebar(); ?>
    <div class="cleaner lineclear"></div>
<?php if ($t) { ?>
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