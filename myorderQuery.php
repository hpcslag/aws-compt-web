<?php

require_once 'config.php';

global $platformName;
global $myBidOrderUrl;
global $stateColor;
global $stateStyle;

$result = json_decode(file_get_contents($myBidOrderUrl), true);
$orders = $result['data'];

foreach ($orders as $order) {
    $srcPointType = $order['src_point_type'];
    $destPointType = $order['dest_point_type'];
    $srcBidPoints = $order['src_bid_points'];
    $destAskPoints = $order['dest_ask_points'];

    $startHtml = <<< TEMP
<h3 class="title-5 m-b-35">{$platformName[$srcPointType]} ({$srcBidPoints}點) 轉 {$platformName[$destPointType]} ({$destAskPoints}點) #1</h3>
<table class="table table-data2">
    <thead>
        <tr>
			<th>出價者暱稱</th>
			<th>掛單摘要</th>
			<th>局部收購量 (目標量)</th>
			<th>對照原點數 (系統產生)</th>
			<th>目前狀態</th>
			<th>決策</th>
        </tr>
    </thead>
    <tbody>
TEMP;
    echo $startHtml;
    $orderList = $order['list'];
    foreach ($orderList as $post) {

        $askedUsername = $post['asked_username'];
        $askedState = $post['asked_state'];
        $targetSrcBidPoints = $post['target_src_bid_points'];
        $targetDestBidPoints = $post['target_dest_ask_points'];
        $transcationState = $post['transcation_state'];

        $postTemplate = <<< Template
	        <tr class="tr-shadow">
				<td>
					<span class="block-email">{$askedUsername}</span>
				</td>
	            <td><span class="" style=" color: {$stateColor[$askedState]}; ">{$askedState}</span></td>
	            <td>{$targetDestBidPoints} 點 ({$platformName[$destPointType]})</td>
				<td>{$targetSrcBidPoints} 點 ({$platformName[$srcPointType]})</td>
	            <td><span class="{$stateStyle[$transcationState]}">$transcationState...</span></td>
	            <td>
					<button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-send"></i>&nbsp; 進行交易</button>
				</td>
	        </tr>
			<tr class="spacer"></tr>
Template;
        echo $postTemplate;

    }

    $endHtnl = <<< TEMP
    </tbody>
</table>
TEMP;
    echo $endHtnl;
}
