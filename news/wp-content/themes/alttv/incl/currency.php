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
				<li style="width:16px"><i class="fa fa-usd"></i></li>
				<li style="width:52px"><?php echo round($r -> Rate, 2); ?></li>
				<li style="width:48px"><?php if($r -> Difference < 0) {
					echo '<span style="color:#C00"><i class="fa fa-caret-down"></i> </span>';
				}
				else {
					echo '<span style="color:#0C0"><i class="fa fa-caret-up"></i> </span>';
				}
				echo round($r -> Difference, 2); ?></li>
			</ul><br>
		<?php }
		elseif($r -> ISO == 'EUR') { ?>
			<ul>
				<li style="width:16px"><i class="fa fa-eur"></i></li>
				<li style="width:52px"><?php echo round($r -> Rate, 2); ?></li>
				<li style="width:48px"><?php if($r -> Difference < 0) {
					echo '<span style="color:#C00"><i class="fa fa-caret-down"></i> </span>';
				}
				else {
					echo '<span style="color:#0C0"><i class="fa fa-caret-up"></i> </span>';
				}
				echo round($r -> Difference, 2); ?></li>
			</ul><br>
		<?php }
		elseif($r -> ISO == 'RUB') { ?>
			<ul>
				<li style="width:16px"><i class="fa fa-rub"></i></li>
				<li style="width:52px"><?php echo round($r -> Rate, 2); ?></li>
				<li style="width:48px"><?php if($r -> Difference < 0) {
					echo '<span style="color:#C00"><i class="fa fa-caret-down"></i> </span>';
				}
				else {
					echo '<span style="color:#0C0"><i class="fa fa-caret-up"></i> </span>';
				}
				echo round($r -> Difference, 2); ?></li>
			</ul>
		<?php }
	} ?>
<?php } ?>