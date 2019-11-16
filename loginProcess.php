<?php

require_once 'config.php';

global $registerUrl;

// var_dump($_POST);

// Create map with request parameters
$params = [
    'phone' => $_POST['phone'],
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
    $registerUrl, // page url
    false,
    $context);

$r = json_decode($result, true);

session_start();

header("refresh:5; url=index.php");
if (!$r['error'] && isset($r['id'])) {
    echo "Login success! <br>Go to index page after 5 seconds...";
    $_SESSION['user_id'] = $r['id'];
} else {
    echo "invalid phone number!";
    session_destroy();
}
