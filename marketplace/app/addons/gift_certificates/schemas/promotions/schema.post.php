<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

// Modified to fix bug #006334 by tommy from cs-cart.jp 2016
// See : http://forum.cs-cart.com/tracker/issue-6334-give-gift-certificate-promotion/?verfilter=127

$schema['bonuses']['gift_certificate'] = array (
    'type' => 'input',
    'function' => array('fn_gift_certificates_promotion_gift_certificate', '#this', '@cart', '@auth', '@cart_products'),
    'zones' => array('cart'),
    'filter' => 'floatval'
);

return $schema;
