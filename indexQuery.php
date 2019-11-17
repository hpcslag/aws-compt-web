<?php

require_once 'config.php';

global $iconUrl;
global $platformName;
global $marketOrderUrl;

$orders = json_decode(file_get_contents($marketOrderUrl), true);

foreach ($orders as $order) {
    $username = $order['username'];
    $srcPointType = $order['src_point_type'];
    $destPointType = $order['dest_point_type'];
    $revisionTimes = $order['revision_times'];
    $srcBidPoints = $order['src_bid_points'];
    $destAskPoints = $order['dest_ask_points'];

    $postTemplate = <<< Template
<tr class="tr-shadow">
	<td>
		<span class="block-email">$username</span>
	</td>
    <td>{$platformName[$srcPointType]} &nbsp;<img src="{$iconUrl[$srcPointType]}" alt="" style=" width: 20px; border-radius: 25px;"></td>
    <td>{$platformName[$destPointType]} &nbsp;<img src="{$iconUrl[$destPointType]}" alt="" style=" width: 20px; border-radius: 25px;"></td>
    <td>11 次</td>
	<td>
		<span class="" style=" color: red; ">{$srcBidPoints} 點</span>
	</td>
	<td>
		<span class="status--process">{$destAskPoints} 點</span>
	</td>
    <td>
        <div class="table-data-feature">
			<button type="button" class="btn btn-outline-success btn-sm"  data-toggle="modal" data-target="#directExchangeDialog"><i class="fa fa-send"></i>&nbsp; 直接兌換</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-outline-secondary btn-sm"  data-toggle="modal" data-target="#orderpriceDialog"><i class="fa fa-lightbulb-o"></i>&nbsp; 妥協數量</button>
        </div>
    </td>
</tr>
<tr class="spacer"></tr>
Template;

    echo $postTemplate;
}
