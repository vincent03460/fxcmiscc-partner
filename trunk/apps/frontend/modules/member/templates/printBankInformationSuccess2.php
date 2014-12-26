<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="SIXSTAR" />
<meta name="robots" content="SIXSTAR" />
<meta name="description" content="SIXSTAR" />
<meta name="keywords" content="SIXSTAR" />
<meta name="language" content="cn" />
<title>SIXSTAR</title>

<!--[if lte IE 8]><script language='javascript' type='text/javascript' src='/js/jquery/excanvas.min.js'></script><![endif]--><script type='text/javascript' src='/js/jquery/jquery-1.6.2.min.js'></script><script type='text/javascript' src='/js/jquery/jquery-ui-1.8.11.custom.min.js'></script><script type='text/javascript' src='/js/jquery/jquery.flot.js'></script><script type='text/javascript' src='/js/jquery/jquery.validate.min.js'></script><script type='text/javascript' src='/js/jquery/jquery.metadata.js'></script><script type='text/javascript' src='/js/jquery/cmxforms.js'></script><script type='text/javascript' src='/js/jquery/jquery.numeric.js'></script><script type='text/javascript' src='/js/jquery/jquery.r9jason.extend.js'></script><script type='text/javascript' src='/js/jquery/jquery.blockUI.js'></script><script type='text/javascript' src='/js/jquery/autoNumeric-1.7.1.js'></script><script type='text/javascript' src='/js/jquery/jquery.dataTables.js'></script><script type='text/javascript' src='/js/jquery/jquery.r9jason.dataTables.extend.js'></script><script type='text/javascript' src='/js/jquery/jquery.treeview.js'></script><script type='text/javascript' src='/js/jquery/jquery.treeview.edit.js'></script><script type='text/javascript' src='/js/jquery/jquery.treeview.async.js'></script><script type='text/javascript' src='/js/jquery/jquery.checkboxtree.min.js'></script><link rel='stylesheet' href='/css/ui-lightness/jquery-ui-1.8.17.custom.css' type='text/css'/><link rel='stylesheet' type='text/css' media='screen' href='/css/validate/validate.css'/><link rel='stylesheet' type='text/css' media='screen' href='/css/datatables/css/table.css'/><link rel='stylesheet' type='text/css' media='screen' href='/css/jquery.treeview.css'/><link rel='stylesheet' type='text/css' media='screen' href='/css/jquery.checkboxtree.css'/><title>SIXSTAR</title><link rel='shortcut icon' href='/favicon.ico' />    <!-- Google WebFonts -->
<link rel="stylesheet" href="/css/style.css">

<link rel="shortcut icon" href="/favicon.ico"/>
<?php include('scripts.php'); ?>
<style type="text/css">
    .hiddenPic {
        display: none;
    }

    .ui-widget {
        font-family: Segoe UI, Arial, sans-serif;
        font-size: 0.9em;
    }

    .text {
        padding: 5px;
    }

    .ui-widget-content .display td {
        color: black !important;
    }

    .ui-widget-content .display a {
        color: #0066bb !important;
    }

    .font {
        font-size: 14px;
        color: #f9c81e;
        font-family: arial;
    }

    .error-font {
        font-size: 14px;
        color: #990033;
        font-family: arial;
    }

    .portlet {
        margin: 0 1em 1em 0;
    }

    .portlet-header {
        margin: 0.3em;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0.5em;
    }

    .portlet-header .ui-icon {
        float: right;
    }

    .portlet-content {
        padding: 1em;
    }

    .ui-button {
        margin-left: -1px;
    }

    .ui-button-icon-only .ui-button-text {
        padding: 0.35em;
    }

    .ui-autocomplete-input {
        margin: 0;
        padding: 0.42em 0 0.47em 0.45em;
    }

    .ui-autocomplete {
        max-height: 200px;
        min-width: 180px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 20px;
    }

        /* IE 6 doesn't support max-height
        * we use height instead, but this forces the menu to always be this tall
        */
    * html .ui-autocomplete {
        height: 200px;
    }
    .display td {
        font-size: 12px;
    }
    td.caption {
        background: none repeat scroll 0 0 #D9D9D9;
        border: 1px solid #FFFFFF;
        padding: 5px;
        width: 150px;
    }
    td.value {
        background: none repeat scroll 0 0 #E9E9E9;
        border: 1px solid #FFFFFF;
        padding: 5px;
    }
</style>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<div id="wrapp_v2">
    <div class="wrapper">
        <!--this is header--><!-- #BeginLibraryItem "/Library/header.lbi" -->
        <div id="header">
            <div id="logo"><a href="/member/summary"><img src="/images/logo.png" alt="SIXSTAR"></a></div>

        </div>
        <!-- #EndLibraryItem --><!--header end here-->
        <div class="clear"></div>
        <!--- this is content--->
        <div class="content">

<table cellspacing="0" cellpadding="0" width="650px">
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Deposit Amount'); ?></strong>
        </td>
        <td class="value" style="color: red">
            <?php echo $systemCurrency." "; ?>
            <span id="depositAmountSpan">
                <?php echo $amount; ?>
            </span>
        </td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Trading Currency on MT4'); ?></strong>
        </td>
        <td class="value"><?php echo $tradingCurrencyOnMT4; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Bank Name'); ?></strong>
        </td>
        <td class="value"><?php echo $bankName; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Bank Swift Code'); ?></strong>
        </td>
        <td class="value"><?php echo $bankSwiftCode; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('IBAN'); ?></strong>
        </td>
        <td class="value"><?php echo $iban; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Bank Account Holder'); ?></strong>
        </td>
        <td class="value"><?php echo $bankAccountHolder; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Bank Account Number'); ?></strong>
        </td>
        <td class="value"><?php echo $bankAccountNumber; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('City of Bank'); ?></strong>
        </td>
        <td class="value"><?php echo $cityOfBank; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Country of Bank'); ?></strong>
        </td>
        <td class="value"><?php echo $countryOfBank; ?></td>
    </tr>
    <tr>
        <td width="160px" class="caption">
            <strong><?php echo __('Payment Reference'); ?></strong>
        </td>
        <td class="value">
        <!--<span id="paymentReferenceSpan" style="color: red"><?php /*echo $paymentReference; */?></span>
        <br><br>Note: <br>Please write at REFERENCE : Maxim Capital Limited - 9120028849 and payment reference number.-->
        Note: <br>Please write at REFERENCE : <span style="color: red">SIXSTAR Limited - 9120028849</span> and payment reference number &nbsp;<span id="paymentReferenceSpan" style="color: red"><?php echo $paymentReference; ?></span>
        </td>
    </tr>
</table>

            <!--- contend end --->
            <div class="push"></div>
            <div class="clear"></div>
        </div>
        <!--- content end here--->
    </div>

    <div class="clear"></div>
    <!--this is footer-->
    <div id="footer" class="footer">
        <div class="copy">
            <address>Copyright © SIXSTAR, Privacy Statement | Terms and Conditions.</address>
        </div>
        <div class="clear"></div>
    </div>
    <!--footer is end here-->
    <div class="clear"></div>
</div>
</html>

<script type="text/javascript">
window.print();
</script>