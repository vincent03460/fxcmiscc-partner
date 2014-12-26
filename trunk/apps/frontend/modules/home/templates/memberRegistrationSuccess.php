<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html style="display: block;">
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
    <meta http-equiv="CACHE-CONTROL" content="NO-STORE">
    <meta http-equiv="PRAGMA" content="NO-CACHE">
    <meta http-equiv="EXPIRES" content="-1">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=8" /><![endif]-->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <link rel="shortcut icon" href="/favicon.ico"/>

    <?php use_helper('I18N') ?>
    <?php

    echo "<script type='text/javascript' src='/js/jquery/jquery-1.6.2.min.js'></script>";
    echo "<script type='text/javascript' src='/js/jquery/jquery-ui-1.8.11.custom.min.js'></script>";
    echo "<script type='text/javascript' src='/js/jquery/jquery.validate.js'></script>";
    echo "<script type='text/javascript' src='/js/jquery/jquery.r9jason.extend.js'></script>";
    echo "<script type='text/javascript' src='/js/jquery/jquery.blockUI.js'></script>";
    echo "<script type='text/javascript' src='/js/jquery/localization/messages_cn.js'></script>";

    echo "<link rel='stylesheet' href='/css/smoothness/jquery-ui-1.8.18.custom.css' type='text/css'/>";
    echo "<link rel='stylesheet' type='text/css' media='screen' href='/css/validate/validate.css'/>";

    echo "<title>SIXSTAR</title>";
    echo "<link rel='shortcut icon' href='/favicon.ico' />";
    ?>

	<link type="text/css" href="/css/pages/member/slider-styles.css" rel="stylesheet">
	<link href="/css/pages/member/style.css" rel="stylesheet">
	<link media="screen" type="text/css" href="/css/pages/member/member.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">

    <style type="text/css" media="screen">
        #sidebar-border {
            /*background-image: url("/css/pages/sidebar-border.png");*/
            background-repeat: repeat-y;
            float: left;
            height: 100%;
            margin-left: 13px;
            position: absolute;
            width: 306px;
            z-index: 13;
        }

        #sidebar-light {
            background-image: url("/css/pages/sidebar-light.png");
            background-position: center top;
            background-repeat: no-repeat;
            float: left;
            height: 100%;
            margin-left: 13px;
            position: absolute;
            width: 306px;
            z-index: 14;
        }
    </style>

    <script type="text/javascript">
        var infoStyle = "<div style='margin-bottom: 20px; padding: 0 .7em;' class='ui-state-highlight ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-info'></span><strong id='_msg'></strong></p></div>";
        var errorStyle = "<div style='padding: 0 .7em;' class='ui-state-error ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-alert'></span><strong id='_msg'></strong></p></div>";

        function alert(data) {
            var msgs = "";
            if ($.isArray(data)) {
                jQuery.each(data, function(key, value) {
                    msgs = value + "<br>";
                });
            } else {
                msgs = data + "<br>";
            }

            var alertPanel = "<div style='padding: 10px; line-height :normal' class='ui-state-highlight ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-info'></span>";
            alertPanel += msgs + "</p></div>";
            $("#waitingLB h3").html(alertPanel);
            $.blockUI({
                        message: $("#waitingLB")
                        , css: {
                            border: 'none',
                            padding: '5px',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            'border-radius': '10px',
                            opacity: .9
                        }});
            $(".blockOverlay").css("z-index", 1010);
            $(".blockPage").css("z-index", 1011);
            $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
        }
        function error(data) {
            var msgs = "";
            if ($.isArray(data)) {
                jQuery.each(data, function(key, value) {
                    msgs = value + "<br>";
                });
            } else {
                msgs = data + "<br>";
            }

            var errorPanel = "<div style='padding: 10px; line-height :normal' class='ui-state-error ui-corner-all'>";
            errorPanel += "<p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-alert'></span>";
            errorPanel += msgs + "</p></div>";
            $("#waitingLB h3").html(errorPanel);
            $.blockUI({
                        message: $("#waitingLB")
                        , css: {
                            border: 'none',
                            padding: '5px',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            'border-radius': '10px',
                            opacity: .9,
                            'min-width': '30%',
                            'width': '60%',
                            left: '25%',
                            top: '25%'
                        }});
            $(".blockOverlay").css("z-index", 1010);
            $(".blockPage").css("z-index", 1011);
            $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
        }
        function waiting() {
            $("#waitingLB h3").html("<h3 style='width: 100%; padding-left: 0px; background-color:inherit; color: black; line-height:0px; margin-top: 20px;'>Loading...</h3><div id='loader' class='loader'><img id='img-loader' src='/images/loading.gif' alt='Loading'/></div>");

            $.blockUI({
                        message: $("#waitingLB")
                        , css: {
                            border: 'none',
                            padding: '5px',
                            'background-color': '#fff',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            'border-radius': '10px',
                            opacity: .8,
                            color: '#000'
                        }});
            $(".blockOverlay").css("z-index", 1010);
            $(".blockPage").css("z-index", 1011);
        }
    </script>
</head>

<img src="/images/loading.gif" style="display: none;">
<body class="home blog">
<div id="waitingLB" style="display:none; cursor: default">
    <h3 style="width: 100%; padding-left: 0px; background-color:inherit; color: black; line-height:0px; margin-top: 0px">We are processing your request. Please be patient.</h3>
</div>

<noscript>
    <!-- display message if java is turned off -->
    <div id="notification">Please turn on javascript in your browser for the maximum user experience!</div>
</noscript>

<div class="main_auto_frame">
<div class="top_bar"></div>

<div class="main_width_frame">

<br class="clear">

<div class="content">

<div class="top_bar_overlap"></div>
<div class="nav">
    <div class="nav_bg" style="z-index: 12;"></div>
    <div id="sidebar-border" style="z-index: 13;"></div>
    <!--<div id="sidebar-light"></div>-->
    <div class="nav_texture" style="z-index: 14;"></div>
    <!--<div class="nav_texture_carbon" style="z-index: 15;"></div>-->
    <div class="nav_texture_leather" style="z-index: 16;"></div>
    <a href="http://www.fxcmiscc.comm/" target="_blank">
        <div class="logo" style="z-index: 20;"></div>
    </a>
    <br class="clear">

    <div class="side_bar_line" style="z-index: 20;"></div>

    <style type="text/css">
<?php if ($sf_user->getCulture() == "cn" || $sf_user->getCulture() == "jp") { ?>
html, body, form, a, acronym, code, div, hr, img, label, p, pre, span, strong, table, tr, th, td, button, input, textarea {
    font-family : "Microsoft YaHei" !important;
}
<?php } ?>
.menu_title {
    font-weight: bold;
    font-family: arial;
    font-size: 12px;
}
</style>

<div class="menu" style="z-index: 20;">
    <ul>
        <li class="menu_title"><?php echo __('CONTACT US'); ?></li>
        <li>
<!--            <a href="/home/memberRegistration"><span>--><?php //echo __('Contact us if you want to know more'); ?><!--</span></a>-->
            <!--<span style="color: #0080C8;"><?php /*echo __('Contact us if you want to know more'); */?>
            <br>Skype: alvinang8833
            <br>QQ: 1049052315
            </span>-->
        </li>
    </ul>
</div>

    <div class="footer_frame" style="z-index: 20;">
        <div class="footer_content">&copy; 2012 -2015 fxcmiscc.com <br> All rights reserved.</div>
    </div>
</div>
<br class="clear">


<div class="top_item_frame">
    <div class="left_item"><?php echo __('Welcome to SIXSTAR.') ?></b></div>
    <div class="right_item">

        <?php include_component('component', 'multiLanguage', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

        <div class="sep"></div>
        <div class="logout"><a href="http://www.fxcmiscc.com/"><?php echo __('SIXSTAR Home Page') ?></a></div>

    </div>
</div>


<div class="content_frame">
    <div class="padding">
        <div class="content_title"></div>
    </div>
    <!--<div class="content_line"></div>-->
    <br class="clear">

    <script type="text/javascript">
$(function() {
    $.populateDOB({
        dobYear : $("#dob_year")
        ,dobMonth : $("#dob_month")
        ,dobDay : $("#dob_day")
        ,dobFull : $("#dob")
    });
    $("#registerForm").validate({
        messages : {

        },
        rules : {
            "fullname" : {
                required : true
            },
            "email" : {
                required : true
                , email: true
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        },
        success: function(label) {
        }
    });
});
</script>

<form action="/home/doMemberRegistration" id="registerForm" method="post">

<table cellspacing="0" cellpadding="0">
<colgroup>
    <col width="1%">
    <col width="99%">
    <col width="1%">
</colgroup>
<tbody>
<tr>
    <td rowspan="3">&nbsp;</td>
    <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Please fill up the personal information, We will call you back in the soonest time'); ?></span></td>
    <td rowspan="3">&nbsp;</td>
</tr>
<tr>
    <td><br>
    </td>
</tr>
<tr>
<td>
<?php if ($sf_flash->has('successMsg')): ?>
    <div class="ui-widget">
        <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
             class="ui-state-highlight ui-corner-all">
            <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                          class="ui-icon ui-icon-info"></span>
                <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
        </div>
    </div>
    <?php endif; ?>
<?php if ($sf_flash->has('errorMsg')): ?>
    <div class="ui-widget">
        <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
             class="ui-state-error ui-corner-all">
            <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                          class="ui-icon ui-icon-alert"></span>
                <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
        </div>
    </div>
<?php endif; ?>

<table cellspacing="0" cellpadding="0" class="textarea1">
<tbody>
<tr>
<td>

<table cellspacing="0" cellpadding="0" class="tbl_form">
    <colgroup>
        <col width="1%">
        <col width="30%">
        <col width="69%">
        <col width="1%">
    </colgroup>

    <tbody>
    <tr class="row_header">
        <th class="tbl_header_left">
            <div class="border_left_grey">&nbsp;</div>
        </th>
        <th><?php echo __('Personal Information') ?></th>
        <th></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>


    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Full Name') ?></td>
        <td>
            <input name="fullname" type="text" id="fullname" class="inputbox"/>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('QQ') ?></td>
        <td>
            <input type="text" class="inputbox" id="qq" name="qq">
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Telephone Number') ?></td>
        <td>
            <input type="text" class="inputbox" id="contactNumber" name="contactNumber">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Email') ?></td>
        <td>
            <input type="text" class="inputbox" id="email" name="email">
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Gender') ?></td>
        <td>
            <select name="gender" class='inputbox'>
                <option value="" selected="selected"><?php echo __('Please Select') ?></option>
                <option value="M"><?php echo __('Male') ?></option>
                <option value="F"><?php echo __('Female') ?></option>
            </select>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Country') ?></td>
        <td>
            <?php include_component('component', 'countrySelectOption', array('countrySelected' => "China (PRC)", 'countryName' => 'country', 'countryId' => 'country')) ?>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Date of Birth') ?></td>
        <td>
            <select id="dob_year"></select>
            <select id="dob_month"></select>
            <select id="dob_day"></select>
            <input name="dob" readonly="readonly" type="hidden" id="dob" class="bp_05"/>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_listing_end">
        <td>&nbsp;</td>
        <td colspan="5" class="tbl_content_right">
            <span class="button">
                 <input type="submit" name="" value="<?php echo __('Submit') ?>">
            </span>
        </td>
        <td>&nbsp;</td>
    </tr>
    </tbody>
</table>


</td>
</tr>

<tr>
    <td></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</form>

    <div class="info_bottom_bg"></div>

    <!-- announcement popup   -->
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">

    <div class="content_line" style="position: absolute; bottom: 170px;"></div>
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <br class="clear">
    <div style="position: absolute; bottom: 10px; padding-right: 40px;">
        <?php include_component('component', 'footerInformation', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
    </div>
</div>

</div>

</div>

</div>
</body>
</html>