<h2 class="dw-logo">DW НОВОСТИ</h2>
<div id="rss-posts">
	<?php $rssurl = 'http://rss.dw.de/xml/rss-ru-news';
	if ($rssxml = simplexml_load_file($rssurl)) { ?>
		<ul class="rss-box">
			<?php for($i = 0; $i < 20; $i++) {
				$rsstitle = $rssxml->channel->item[$i]->title;
				$rsslink = $rssxml->channel->item[$i]->link;
				$rssdescription = $rssxml->channel->item[$i]->description;
				$rsspubDate = $rssxml->channel->item[$i]->pubDate; ?>
				<li>
					<a href="<?php echo $rsslink; ?>"><h4><?php echo $rsstitle; ?></h4></a>
					<?php echo $rssdescription; ?>
				</li>
			<?php } ?>
		</ul>
	<?php } ?>
</div>
<script>
	$(document).ready(function() {
		$(".rss-box").niceScroll({touchbehavior:false, cursorcolor:"#5e707f", cursoropacitymax:0, cursorwidth:8, cursorborder:"none", cursorborderradius:"0px", background:"#ccc", autohidemode:"false"})
	});
</script>
