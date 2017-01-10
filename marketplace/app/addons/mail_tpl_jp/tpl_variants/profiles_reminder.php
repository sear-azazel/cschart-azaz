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

// $Id: profiles_reminder.php by tommy from cs-cart.jp 2015
// 管理者用パスワードの変更期限が到来した際に送信されるメールで使用可能なテンプレート変数


/////////////////////////////////////////////////////////////////////////////
// データ取得 BOF
/////////////////////////////////////////////////////////////////////////////
// メールテンプレート編集ページ以外の場合
if( empty($_edit_mail_tpl) ) {
	// ユーザーに関するデータ
	$tpl_user_data = $tpl_base_data['user_data']->value;

	// 一般設定に関するデータ
	$tpl_general_settings = $tpl_base_data['settings']->value['General'];
}
/////////////////////////////////////////////////////////////////////////////
// データ取得 EOF
/////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////
// メールテンプレート取得 BOF
/////////////////////////////////////////////////////////////////////////////
// メールテンプレートコードとユーザーの言語コードでメールテンプレートを抽出
if( !empty($tpl_code) ) {
	$mtpl_lang_code = $tpl_user_data['lang_code'];
	$mail_template = fn_mtpl_get_email_contents($tpl_code, $mtpl_lang_code);
}
/////////////////////////////////////////////////////////////////////////////
// メールテンプレート取得 EOF
/////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////
// 利用可能なテンプレート変数を定義 BOF
/////////////////////////////////////////////////////////////////////////////
$mail_tpl_var = 
	array(
		'U_ID' => 
				array('desc' => 'user_id', 
						'value' => empty($_edit_mail_tpl) ? $tpl_user_data['user_id'] : ''),
		'U_LOGIN' => 
				array('desc' => 'username', 
						'value' => empty($_edit_mail_tpl) ? ($tpl_general_settings['use_email_as_login'] == 'Y') ? $tpl_user_data['email'] : $tpl_user_data['user_login'] : ''),
		'U_LASTNAME' => 
				array('desc' => 'first_name', 
						'value' => empty($_edit_mail_tpl) ? $tpl_user_data['firstname'] : ''),
		'U_FIRSTNAME' => 
				array('desc' => 'last_name', 
						'value' => empty($_edit_mail_tpl) ? $tpl_user_data['lastname'] : ''),
		'U_EMAIL' => 
				array('desc' => 'emails', 
						'value' => empty($_edit_mail_tpl) ? $tpl_user_data['email'] : ''),
		'DAYS' => 
				array('desc' => 'mtpl_days', 
						'value' => empty($_edit_mail_tpl) ? $tpl_base_data['days']->value : ''),
	);

if( empty($_edit_mail_tpl) ) {
	fn_set_hook('mail_tpl_var_profiles_reminder', $mail_tpl_var, $tpl_user_data, $tpl_general_settings, $mail_template);
}
/////////////////////////////////////////////////////////////////////////////
// 利用可能なテンプレート変数を定義 EOF
/////////////////////////////////////////////////////////////////////////////
