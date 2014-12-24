<?php
use_helper('I18N');

echo "<!--[if lte IE 8]><script language='javascript' type='text/javascript' src='/js/jquery/excanvas.min.js'></script><![endif]-->";
echo "<script type='text/javascript' src='/js/jquery/jquery-1.6.2.min.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery-ui-1.8.11.custom.min.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.flot.js'></script>";
if (sfConfig::get('sf_environment') == Globals::SF_ENVIRONMENT_DEV) {
    echo "<script type='text/javascript' src='/js/jquery/jquery.validate.js'></script>";
} else {
    echo "<script type='text/javascript' src='/js/jquery/jquery.validate.min.js'></script>";
}
echo "<script type='text/javascript' src='/js/jquery/jquery.metadata.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/cmxforms.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.numeric.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.r9jason.extend.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.blockUI.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/autoNumeric-1.7.1.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.dataTables.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.r9jason.dataTables.extend.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.treeview.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.treeview.edit.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.treeview.async.js'></script>";
echo "<script type='text/javascript' src='/js/jquery/jquery.checkboxtree.min.js'></script>";
echo "<script type='text/javascript' src='/js/bgstretcher/bgstretcher.js'></script>";
echo "<script type='text/javascript' src='/js/tiny_mce/tiny_mce.js'></script>";

echo "<script type='text/javascript' src='/js/fancybox/jquery.mousewheel-3.0.4.pack.js'></script>";
echo "<script type='text/javascript' src='/js/fancybox/jquery.fancybox-1.3.4.pack.js'></script>";
echo "<link rel='stylesheet' type='text/css' href='/js/fancybox/jquery.fancybox-1.3.4.css' media='screen' />";

if ($sf_user->getCulture() == "cn") {
    echo "<script type='text/javascript' src='/js/jquery/localization/messages_cn.js'></script>";
} else if ($sf_user->getCulture() == "kr") {
    echo "<script type='text/javascript' src='/js/jquery/localization/messages_kr.js'></script>";
} else if ($sf_user->getCulture() == "jp") {
    echo "<script type='text/javascript' src='/js/jquery/localization/messages_jp.js'></script>";
}

echo "<link rel='stylesheet' href='/css/smoothness/jquery-ui-1.8.18.custom.css' type='text/css'/>";
echo "<link rel='stylesheet' type='text/css' media='screen' href='/css/validate/validate.css'/>";
echo "<link rel='stylesheet' type='text/css' media='screen' href='/css/datatables/css/table.css'/>";
echo "<link rel='stylesheet' type='text/css' media='screen' href='/css/jquery.treeview.css'/>";
echo "<link rel='stylesheet' type='text/css' media='screen' href='/css/jquery.checkboxtree.css'/>";
echo "<link rel='stylesheet' type='text/css' media='screen' href='/js/bgstretcher/bgstretcher.css'/>";

echo "<title>Grandegoldens</title>";
echo "<link rel='shortcut icon' href='/favicon.ico' />";