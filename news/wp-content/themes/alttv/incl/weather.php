<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="Yerevan, Armenia")';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);

    $phpObj =  json_decode($json);

    $w_tempF = $phpObj->query->results->channel->item->condition->temp;
    $w_curr = round(($w_tempF - 32) / 1.8);

    preg_match('#(<img.*?>)#', $phpObj->query->results->channel->item->description, $cond_results);
    $w_img = $cond_results[1];

    echo $w_img;
    echo '<div class="weather-info">Արմավիր ' . $w_curr . '&#176</div>';
?>
