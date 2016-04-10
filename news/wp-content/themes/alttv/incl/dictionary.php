<div id="dictionary">
    <span><input type="text" id="word-search" placeholder="Փնտրել"></span>
    <ul class="word-list">
        <?php wp_reset_query();
        $dicArg = array(
            'post_type' => 'dictionary',
            'showposts' => -1,
            'orderby'   => 'title',
            'order'     => 'ASC'
        );
        $dictionary = new WP_Query($dicArg);
        if($dictionary -> have_posts()): while($dictionary -> have_posts()): $dictionary -> the_post();
            $dictionaryPostId = get_the_id(); ?>
            <li><a href="javascript: void(0)" data-postid="<?php echo $dictionaryPostId; ?>" class="dictionary-word" id="post-<?php echo $dictionaryPostId; ?>"><?php the_title(); ?></a></li>
        <?php endwhile; endif; ?>
    </ul>
</div>

<script>
    $(document).ready(function() {
        $(".word-list").niceScroll({
            touchbehavior:false,
            cursorcolor:"#5e707f",
            cursoropacitymax:0,
            cursorwidth:8,
            cursorborder:"none",
            cursorborderradius:"0px",
            background:"#ccc",
            autohidemode:"false"
        });

        $("#word-search").keyup(function() {
            var filter = $(this).val().trim(),
            count = 0;
            $("#dictionary ul li").each(function() {
                if($(this).text().substr(0, filter.length).search(new RegExp(filter, "i")) < 0) {
                    $(this).fadeOut();
                } else {
                    $(this).show();
                    count++;
                }
            });
        });

        $(".dictionary-word").click(function(){
            $("#modal-bgr").fadeIn("fast");

            var data = {
                action: "word_meaning",
                postid: $(this).data("postid")
            };
            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: "POST",
                data: data,
                success: function(data){
                    var resultOBJ = jQuery.parseJSON(data);
                    if(resultOBJ.status == 1) {
                        $("#modal-bgr .modal-post-title").text(resultOBJ.postTitle);
                        $("#modal-bgr .modal-post-content").text(resultOBJ.postContent);
                    }
                    $(".modal-loader").fadeOut("fast");
                    $(".modal-body").slideDown("slow");
                }
            })
        })
    });
</script>
