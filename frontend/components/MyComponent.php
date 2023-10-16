<?php

namespace frontend\components;
use yii\base\Component;

class MyComponent extends Component{
    public function currencyConvert($currency_from, $currency_to, $currency_input) {
        $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select * from yahoo.finance.xchange where pair in ("' . $currency_from . $currency_to . '")';
        $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
        $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
        $yql_session = curl_init($yql_query_url);

        // Check if cURL initialization was successful
        if ($yql_session === false) {
            return null;  // Handle the cURL initialization error
        }

        curl_setopt($yql_session, CURLOPT_RETURNTRANSFER, true);
        $yqlexec = curl_exec($yql_session);

        // Check for cURL request errors
        if ($yqlexec === false) {
            return null;  // Handle the cURL request error
        }

        $yql_json = json_decode($yqlexec, true);

        // Check if JSON decoding was successful
        if ($yql_json === null || !isset($yql_json['query']['results']['rate']['Rate'])) {
            return null;  // Handle invalid JSON response
        }

        $currency_output = (float) $currency_input * $yql_json['query']['results']['rate']['Rate'];

        return $currency_output;
    }


}
