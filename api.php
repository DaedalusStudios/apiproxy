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


// Get the client request URL
$clientUrl = $_SERVER['REQUEST_URI'];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Get the response headers
$responseHeaders = curl_getinfo($ch);
// Close the cURL session
curl_close($ch);

// Forward the response headers to the client
foreach ($responseHeaders as $headerName => $headerValue) {
    header("$headerName: $headerValue");
}

// Forward the response body to the client
echo $response;
}


?>