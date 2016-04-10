<link href="<?php bloginfo('stylesheet_directory'); ?>/css/jquery.datepick.css" rel="stylesheet">

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.plugin.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.datepick.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.datepick-hy.js"></script>

<script>
	$(function() {
		$('#inlineDatepicker').datepick({
			onSelect: function() {
				var selectedDay = $('#inlineDatepicker').datepick('getDate');
				var sD = selectedDay[0].getDate();
				var sM = selectedDay[0].getMonth() + 1;
				var sY = selectedDay[0].getYear() + 1900;
				if (sD < 10) sD = "0" + sD;
				if (sM < 10) sM = "0" + sM;
				var str = sY.toString() + sM.toString() + sD.toString();
				window.location.href = "<?php echo home_url(); ?>/?m=" + str; 
			} 
		});
	});
</script>

<div id="inlineDatepicker"></div>