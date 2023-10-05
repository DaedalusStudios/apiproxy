<?php
header("Access-Control-Allow-Origin: *");
$key = "2cwijp5r9qfhzcf03ol6";
$isbn = $_GET['isbn'];


if($_GET['type'] == 'buy'){
    $url = "https://booksrun.com/api/v3/price/buy/$isbn?key=$key"; //buy
} else if($_GET['type'] == 'sell'){
    $url = "https://booksrun.com/api/price/sell/$isbn?key=$key"; //buyback
}



if($url) {


// Request URL
$clientUrl = $_SERVER['REQUEST_URI'];

// cURL it up
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$responseHeaders = curl_getinfo($ch);
curl_close($ch);

// Proxy the response headers back to the calling browser/app
foreach ($responseHeaders as $headerName => $headerValue) {
    header("$headerName: $headerValue");
}

// Response body is returned directly
echo $response;
}


?>
