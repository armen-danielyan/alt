<div id="yt-channel">
    <div id="yt-title">
        <a target="_blank" href="http://www.youtube.com/user/alttvam" style="float:left"><h2><i class="fa fa-youtube-square title-icon"></i> ՏԵՍԱՆՅՈՒԹԵՐ</h2></a>
        <div id="yt-subscribe"><div class="g-ytsubscribe" data-channel="alttvam" data-layout="default" data-count="default"></div></div>
    </div>
    <div class="cleaner"></div>
    <div id="yt-videos">
        <ul>
        <?php
            $theme_root = wp_make_link_relative(get_bloginfo('stylesheet_directory'));
            $theme_root = substr($theme_root, 1);

            function bwImage($flink, $fname) {
                global $theme_root;
                $fn = $theme_root . '/youtube_images/' . $fname . '.jpg';
                if (!file_exists($fn)) {
                    $fp = fopen($flink, "r");
                    $imagefile = stream_get_contents($fp);
                    fclose($fp);
                    $tmpfname = tempnam($theme_root . '/tmp', 'mmm');
                    $fp = fopen($tmpfname, 'w');
                    fwrite($fp, $imagefile);
                    fclose($fp);
                    $im = imagecreatefromjpeg($tmpfname);
                    imagefilter($im, IMG_FILTER_GRAYSCALE);
                    imagefilter($im, IMG_FILTER_COLORIZE, -32, 0, 32);
                    imagejpeg($im, $fn);
                    unlink($tmpfname);
                    imagedestroy($im);
                }
                return '<img src="' . get_bloginfo('stylesheet_directory') . '/youtube_images/' . $fname . '.jpg' . '" width="176" height="99" />';
            }

            function yt_dur($vid){
                $yt_vid_url = "https://www.googleapis.com/youtube/v3/videos?part=contentDetails&key=AIzaSyDBrfKX_fofROincBpzllrX5DO5mnKCqeo&id=" . $vid;
                $yt_vid_json = file_get_contents($yt_vid_url);
                $yt_vid_data = json_decode($yt_vid_json, TRUE);
                $yt_vid_dur = $yt_vid_data["items"][0]["contentDetails"]["duration"];															
                preg_match_all('/(\d+)/', $yt_vid_dur, $parts);
                $yt_h = floor($parts[0][0]/60);
                $yt_m = $parts[0][0]%60;
                $yt_s = $parts[0][1];
                $dur = "";
                if ($yt_h != 0) $dur = $yt_h . ":";
                if (count($parts[0]) == 1) {
                    $yt_m = 0;
                    $yt_s = $parts[0][0];
                }
                if ($yt_m < 10) $yt_m = "0" . $yt_m;
                if ($yt_s < 10) $yt_s = "0" . $yt_s;

                $dur = $dur . $yt_m . ":" . $yt_s;
                return $dur;
            }

            $yt_chan_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=10&playlistId=PL8A6FC93E68EFC576&key=AIzaSyDBrfKX_fofROincBpzllrX5DO5mnKCqeo";
            $yt_chan_json = file_get_contents($yt_chan_url);
            $yt_chan_data = json_decode($yt_chan_json, TRUE);
            $yt_item = $yt_chan_data["items"];
            for($i = 0; $i < 5; $i++) {
                $yt_video_id = $yt_item[$i]["snippet"]["resourceId"]["videoId"];
                $yt_title = $yt_item[$i]["snippet"]["title"];
                $yt_video_url = "https://www.youtube.com/watch?v=" . $yt_video_id;
                $yt_thumb_url = $yt_item[$i]["snippet"]["thumbnails"]["medium"]["url"]; ?>
                <li <?php if ($i == 0) echo 'style="margin:0"'; ?>>
                    <a class="fancybox-media" href="<?php echo $yt_video_url; ?>">
                        <?php echo bwImage($yt_thumb_url, $yt_video_id);
                        echo $yt_title; ?>
                        <div class="yt-cover"><span><?php echo yt_dur($yt_video_id); ?></span></div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>