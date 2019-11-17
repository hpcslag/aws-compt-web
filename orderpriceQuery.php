<?php

require_once 'config.php';

global $iconUrl;
global $platformName;
global $myAskOrderUrl;

// $url = $myAskOrderUrl . '?user_id=' . $_SESSION['user_id'];
$url = $myAskOrderUrl;
$orders = json_decode(file_get_contents($url), true);

foreach ($orders as $order) {
    $username = $order['username'];
    // $username = $order['bid_username'];
    $askedState = $order['asked_state'];

    $srcPointType = $order['src_point_type'];
    $destPointType = $order['dest_point_type'];
    $revisionTimes = $order['revision_times'];
    // $srcBidPoints = $order['src_bid_points'];
    $srcBidPoints = $order['target_src_bid_points'];
    // $destAskPoints = $order['dest_ask_points'];
    $destAskPoints = $order['target_dest_ask_points'];

    $transcationState = $order['transcation_state'];

    $postTemplate = <<< Template
<tr class="tr-shadow">
    <td>
        <span class="block-email">{$username}</span>
    </td>
    <td>{$platformName[$srcPointType]} &nbsp;<img src="{$iconUrl[$srcPointType]}" alt="" style=" width: 20px; border-radius: 25px;"></td>
    <td>{$platformName[$destPointType]} &nbsp;<img src="{$iconUrl[$destPointType]}" alt="" style=" width: 20px; border-radius: 25px;"></td>
    <td>
        <span class="" style=" color: red; ">{$srcBidPoints} 點</span>
    </td>
    <td>
        <span class="" style=" color: blue; ">{$destAskPoints} 點</span>
    </td>
    <td>
        <span class="status--process">直接交易</span>
    </td>
</tr>
<tr class="spacer"></tr>
Template;

    echo $postTemplate;
}
