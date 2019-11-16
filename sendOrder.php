<?php
require_once 'config.php';

global $createOrderUrl;

// Create map with request parameters
$params = [
    'select_src' => $_POST['select_src'],
    'select_dest' => $_POST['select_dest'],
    'total_price' => $_POST['total_price'],
];

// Build Http query using params
$query = http_build_query($params);

// Create Http context details
$contextData = array(
    'method' => 'POST',
    'header' => "Connection: close\r\n" .
    "Content-Length: " . strlen($query) . "\r\n",
    'content' => $query);

// Create context resource for our request
$context = stream_context_create(array('http' => $contextData));

// Read page rendered as result of your POST request
$result = file_get_contents(
    $createOrderUrl, // page url
    false,
    $context);

header("refresh:5; url=index.php");

echo $result;
