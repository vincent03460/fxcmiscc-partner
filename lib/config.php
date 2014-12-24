<?php
/**
 * LBN Payment Gateway Online Payment PHP Demo
 * @author langs
 * @version demo
 */
defined('DEMO_HOST') or define('DEMO_HOST', 'partner.fxcmiscc.com');
defined('DEMO_PORT') or define('DEMO_PORT', '80');
define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);

//purchase order interface
$config['purchase'] = 'https://pgd.lbngateway.com:28086/pgdApi/Payment/Pay';

//query interface
$config['query'] = 'https://api.lbngateway.com:8086/lbnApi/Payment/Status';
//backend notify listener
//$config['benotify'] = 'http://'.DEMO_HOST.':'.DEMO_PORT.'/member/pgRedirect';
$config['benotify'] = 'http://'.DEMO_HOST.'/paymentGateway/notify';

//frontend notify listener
//$config['ftnotify'] = 'http://'.DEMO_HOST.':'.DEMO_PORT.'/member/pgSuccessRedirect';
$config['ftnotify'] = 'http://'.DEMO_HOST.'/paymentGateway/return';

// secret key
$config['key'] = '88888888';

//sign method
$config['sign_method'] = 'SHA256';

//characterset
$config['charset'] = 'UTF-8';

//mode
$config['debug'] = 'false';

$config['version'] = '1.0.0';

/*
 * merchant profile
 * */
//merchant name
$config['mer_name'] = 'GRANDEMIDAS CONSULTANCY SDN. BHD.';

//merchant serial number
$config['mer_sn'] = '88888888';

//merchant currency, we only support the one of currency type per channel.
$config['mer_currency'] = 'USD';
$config['mer_currency_code'] = '840';
//merchant transaction type, you shouldn't modify the value.
$config['mer_trans_type'] = '直接消费';

//merchant homepage url
$config['mer_homeurl'] = '';

$config['trans_type'] = '01';

$config['mer_id'] = '001185289990003';

$config['mer_code'] = '8999';

$config['trans_timeout'] = '20';

?>