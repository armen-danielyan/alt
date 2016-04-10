<ul>
	<li><!----------Facebook---------->
		<div class="fb-like" data-href="<?php echo the_permalink(); ?>" data-width="72" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
	</li>
	<li><!----------Google Plus---------->
		<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
	</li>
	<li><!----------Twitter---------->
		<a href="<?php echo wp_get_shortlink(); ?>" data-url="<?php echo wp_get_shortlink(); ?>" class="twitter-share-button" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</li>
	<li><!----------Vkontakte---------->
		<div id="vk_like" style="margin-left: 16px"></div>
<script type="text/javascript">
VK.Widgets.Like("vk_like", {type: "vertical"});
</script>
	</li>
	<li><!----------Mail.Ru---------->
		<a target="_blank" class="mrc__plugin_uber_like_button" href="http://connect.mail.ru/share" data-mrc-config="{'nt' : '1', 'cm' : '1', 'sz' : '20', 'st' : '1', 'tp' : 'mm', 'vt' : '1', 'width': 40}">Нравится</a>
<script src="http://cdn.connect.mail.ru/js/loader.js" type="text/javascript" charset="UTF-8"></script>
	</li>
	<li><!---------Odnoklassniki---------->
		<div id="ok_shareWidget"></div>
<script>
!function (d, id, did, st) {
  var js = d.createElement("script");
  js.src = "http://connect.ok.ru/connect.js";
  js.onload = js.onreadystatechange = function () {
  if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
    if (!this.executed) {
      this.executed = true;
      setTimeout(function () {
        OK.CONNECT.insertShareWidget(id,did,st);
      }, 0);
    }
  }};
  d.documentElement.appendChild(js);
}(document,"ok_shareWidget",document.URL,"{width:75,height:65,st:'oval',sz:20,vt:'1',nt:1}");
</script>                            
	</li>
</ul>