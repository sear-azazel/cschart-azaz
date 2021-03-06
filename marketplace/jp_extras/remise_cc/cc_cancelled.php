<?php
/***************************************************************************
*                                                                          *
*    Copyright (c) 2009 Simbirsk Technologies Ltd. All rights reserved.    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

// $Id: cc_cancelled.php by tommy from cs-cart.jp 2015
// ルミーズクレジットカード決済でエラーが発生した場合の処理

use Tygh\Registry;

////////////////////////////////////////////////
// CS-Cartのクラスや関数を利用可能に BOF
////////////////////////////////////////////////
if( !empty($_REQUEST['area']) && $_REQUEST['area'] == 'A'){
	define('AREA', 'A');
}else{
	define('AREA', 'C');
}
require '../../init.php';
////////////////////////////////////////////////
// CS-Cartのクラスや関数を利用可能に EOF
////////////////////////////////////////////////


// 注文IDが存在しない場合は処理を中断
if( empty($_REQUEST['order_id']) ){
	die('INVALID ACCESS!!');
}

// 注文IDを取得
$order_id = (int)$_REQUEST['order_id'];

// 注文IDから該当するcompany_idをセット
fn_payments_set_company_id($order_id);

// fn_urlのリダイレクトパラメータに追加する"company_id"を取得
$company_query = fn_lcjp_get_company_query_from_order($order_id);

if(AREA == 'A'){
	$url = Registry::get('config.admin_index') . "?dispatch=payment_notification.cancelled&payment=remise_cc&order_id=" . $order_id . $company_query;
}else{
	$url = Registry::get('config.customer_index') . "?dispatch=payment_notification.cancelled&payment=remise_cc&order_id=" . $order_id . $company_query;
}

fn_redirect($url);
