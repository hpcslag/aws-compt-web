<?php

// register url
$registerUrl = 'http://18.179.14.255/login';

// index page
// $marketOrderUrl = 'data/market_order.json';
$marketOrderUrl = 'http://52.194.252.79/listMarketOrder';

// myorder page
$myBidOrderUrl = 'data/my_bid_order.json';

// orderprice page
// $myAskOrderUrl = 'data/my_ask_order.json';
$myAskOrderUrl = 'http://52.193.225.229/listMyBid?user_id=14';

// create Oreder API
// $createOrderUrl = 'http://localhost/aws-compt-web/sendOrderAPI.php';
$createOrderUrl = 'http://52.194.252.79/createMarketOrder';

// icon url
$iconUrl = [
    'line' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaadakOa7E3anC-jk7OpMV53VrMHkG2nNK5al8ngR4fJn1mHmB&s',
    'rakuten' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiDHU-shrV8NDB8hRjIu61vQcJXEBng0zWFBS91kzIscN492P4&s',
    'shopee' => 'https://cimg.pcstore.com.tw/cprd/C1079856571_big.png?pimg=static&P=1485678917',
    'p_point' => 'https://www.piapp.com.tw/assets/event/picard/img/ppoint.png',
];

// paltform name
$platformName = [
    'line' => 'LINE POINT',
    'rakuten' => '樂天點數 ',
    'shopee' => '蝦幣',
    'p_point' => 'P幣',
];

// style color
$stateColor = [
    'low' => 'red',
    'high' => 'green',
    'dealing' => 'green',
    'waiting' => '#808080',
];

// style
$stateStyle = [
    'dealing' => 'status--process',
    'waiting' => '',
];
