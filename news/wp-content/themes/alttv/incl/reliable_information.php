<div id="reliable-wrapper">
    <div id="ajax-loader" style="display:none">
        <div class="ajax-loader-icon"><i class="fa fa-refresh fa-spin fa-2x"></i></div>
    </div>

    <div id="ajax-recaptcha" style="display:none">
        <div id="g-recaptcha"></div>
    </div>

    <ul>
    <?php
    $relInfoArgs = array(
        'post_type' => 'reliable-information',
        'posts_per_page' => 5
    );
    $relInfoPosts = new WP_Query($relInfoArgs);
    if($relInfoPosts->have_posts()): while($relInfoPosts->have_posts()): $relInfoPosts->the_post();
        $postid = get_the_id(); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="reliable-post-title"><?php the_title(); ?></a>
        </li>
    <?php endwhile; endif; ?>
    </ul>
    <div class="reliable-more"><a href="<?php echo get_post_type_archive_link('reliable-information'); ?>">Ավելին &raquo;</a></div>
</div>