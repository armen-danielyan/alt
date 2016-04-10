<div id="currency-small">
	<?php foreach($result as $r) {
		if($r -> ISO == 'USD') { ?>
			<div class="currency-item">
				<?php echo $r -> ISO; ?><br>
				<span><?php echo round($r -> Rate, 2); ?></span>
			</div>
		<?php }
		elseif($r -> ISO == 'EUR') { ?>
			<div class="currency-item">
				<?php echo $r -> ISO; ?><br>
				<span><?php echo round($r -> Rate, 2); ?></span>
			</div>
		<?php }
		elseif($r -> ISO == 'RUB') { ?>
			<div class="currency-item">
				<?php echo $r -> ISO; ?><br>
				<span><?php echo round($r -> Rate, 2); ?></span>
			</div>
		<?php }
	} ?>
</div>