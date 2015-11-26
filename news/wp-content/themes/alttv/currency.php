<?php $curl = 'http://api.cba.am/exchangerates.asmx?WSDL';
try {
	$client = @new SoapClient($curl);
}
catch (Exception $e) {
	echo '...';
}
if(!empty($client))	{					
	$result = $client -> ExchangeRatesLatest() -> ExchangeRatesLatestResult -> Rates -> ExchangeRate;
	foreach($result as $r) {
		if($r -> ISO == 'USD') { ?>
			<ul>
				<li style="width:32px"><?php echo $r -> ISO; ?></li>
				<li style="width:48px"><?php echo round($r -> Rate, 2); ?></li>
				<li style="width:48px"><?php if($r -> Difference < 0) {
					echo '<span style="color:#C00">&darr; </span>';
				}
				else {
					echo '<span style="color:#0C0">&uarr; </span>';
				}
				echo round($r -> Difference, 2); ?></li>
			</ul>
		<?php }
		elseif($r -> ISO == 'EUR') { ?>
			<ul>
				<li style="width:32px"><?php echo $r -> ISO; ?></li>
				<li style="width:48px"><?php echo round($r -> Rate, 2); ?></li>
				<li style="width:48px"><?php if($r -> Difference < 0) {
					echo '<span style="color:#C00">&darr; </span>';
				}
				else {
					echo '<span style="color:#0C0">&uarr; </span>';
				}
				echo round($r -> Difference, 2); ?></li>
			</ul>
		<?php }
		elseif($r -> ISO == 'RUB') { ?>
			<ul>
				<li style="width:32px"><?php echo $r -> ISO; ?></li>
				<li style="width:48px"><?php echo round($r -> Rate, 2); ?></li>
				<li style="width:48px"><?php if($r -> Difference < 0) {
					echo '<span style="color:#C00">&darr; </span>';
				}
				else {
					echo '<span style="color:#0C0">&uarr; </span>';
				}
				echo round($r -> Difference, 2); ?></li>
			</ul>
		<?php }
	} ?>
<?php } ?>