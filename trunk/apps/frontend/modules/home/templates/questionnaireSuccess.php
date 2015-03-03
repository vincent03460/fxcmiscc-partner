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
    <a href="http://www.fxcmiscc.com" target="_blank">
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
        <div class="footer_content">&copy; 2012 - 2015 CMIS Trader <br> All rights reserved.</div>
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

<form action="/home/doSubmitQuestionnaire" id="registerForm" method="post">
<input type="hidden" name="memberId" id="memberId" value="<?php echo $memberId;?>">
<table cellspacing="0" cellpadding="0">
<colgroup>
    <col width="1%">
    <col width="99%">
    <col width="1%">
</colgroup>
<tbody>
<tr>
    <td rowspan="3">&nbsp;</td>
    <td class="tbl_sprt_bottom"><span class="txt_title">外汇常识与经验问题</span></td>
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
    <style>
    .pbl_table td {
        border: 1px solid #434343;
        color: #000000;
        padding: 5px !important;
    }
    </style>
    <table cellspacing="3" cellpadding="3" border="1" class="pbl_table">
        <tbody>
        <tr class="pbl_header">
            <td align="left"></td>
            <td align="left">外汇常识与经验问题</td>
        </tr>
        <tr class="row0">
            <td><?php $idx=1;
                echo $idx++;
                ?></td>
            <td align="left">
                Have you ever traded Foreign Exchange before?
                <br>您有投资外汇的经验吗？


            <br><br><input type="radio" name="q1" value="Y" id="q1y"> Yes 有 (Go to question 3 请看问题三)
            <br><input type="radio" name="q1" value="N" id="q1n"> No 没有
            </td>
        </tr>
        <tr class="row1">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                Would you like to try Foreign Exchange trading investments?
                <br>您有想过了解什么是外汇投资吗？
            <br><br><input type="radio" name="q2" value="Y" id="q2y"> Yes 有
            <br><input type="radio" name="q2" value="N" id="q2n"> No 没有 (Go to question 8 请看问题八)
            </td>
        </tr>
        <tr class="row0">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                How many years of experience have you had with Foreign Exchange trading?
                <br>您有多少年的外汇投资经验？
            <br><br><input type="text" name="q3" value="" id="q3" size="10"> Years 年
            </td>
        </tr>
        <tr class="row1">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                Approximately what is your Trading Return on Investment percentage over the past one year?
                <br>在过去的一年里，您在外汇投资大约赚取了多少回酬？
            <br><br><input type="text" name="q4" value="" id="q4" size="10"> %
            </td>
        </tr>
        <tr class="row0">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                Would you recommend Foreign Exchange trading to your friends/family?
                <br>您会把外汇投资介绍给您的亲戚朋友吗？
            <br><br><input type="radio" name="q5" value="Y" id="q5y"> Yes 会
            <br><input type="radio" name="q5" value="N" id="q5n"> No 不会
            </td>
        </tr>
        <tr class="row1">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                Do you think that trading Foreign Exchange is a very risky investment?
                <br>您觉得外汇投资是个高风险的投资吗？
            <br><br><input type="radio" name="q6" value="Y" id="q6y"> Yes 是
            <br><input type="radio" name="q6" value="N" id="q6n"> No 不是
            </td>
        </tr>
        <tr class="row0">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                Did you trade Foreign Exchange products on MetaTrader 4 Trading Platform?
                <br>请问您有用过 MetaTrader4 做外汇投资吗？
            <br><br><input type="radio" name="q7" value="Y" id="q7y"> Yes 有
            <br><input type="radio" name="q7" value="N" id="q7n"> No 没有
            </td>
        </tr>
        <tr class="row1">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                Would you be interested in Foreign Exchange investments using human Fund Managers?
                <br>请问您有兴趣让专业资金团体管理您的外汇投资户口吗？
            <br><br><input type="radio" name="q8" value="Y" id="q8y"> Yes 有
            <br><input type="radio" name="q8" value="N" id="q8n"> No 没有
            </td>
        </tr>
        </tbody>
    </table>

    <br>
    <br>
    <table cellspacing="3" cellpadding="3" border="1" class="pbl_table">
        <tbody>
        <tr class="pbl_header">
            <td align="left"></td>
            <td align="left" colspan="1">服务选择</td>
        </tr>
        <tr class="row0">
            <td><?php $idx=1;
                echo $idx++;
                ?></td>
            <td align="left">
                We (SIXSTAR) will contact you for any good opportunity of investment in the future, what method you prefer us to contact you?
                <br>如有任何好的外汇投资项目，我们马胜金融集团将会联系您，您想我们用什么方式联系您？
                <br><br><input type="radio" name="s1" value="email" id="s1email">i. email 邮寄联系
                <br><input type="radio" name="s1" value="qq" id="s1qq">ii. QQ
                <br><input type="radio" name="s1" value="call" id="s1call">iii. Direct Call 播电话给您 (if choice iii, pls answer below question 如您选择 iii,请您继续回答以下问题)
            </td>
        </tr>
        <tr class="row1">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                What is the best time for us to contact you?
                <br>什么时间是最合适我们给您打电话？
                <br>
                <br><input type="radio" name="s2" value="11" id="s2besttime11">i. 11a.m 十一点早上
                <br><input type="radio" name="s2" value="13" id="s2besttime13">ii. 1p.m 一点中午
                <br><input type="radio" name="s2" value="17" id="s2besttime17">iii. 5p.m 五点下午
                <br><input type="radio" name="s2" value="20" id="s2besttime20">iv. 8p.m 八点晚上
            </td>
        </tr>
        <tr class="row0">
            <td><?php echo $idx++; ?></td>
            <td align="left">
                SIXSTAR is providing education to train more professional financial consultant, do u interested to be 1 of our big family member?
                <br>马胜金融集团提供高等金融教育提拔更多的专业金融顾问，请问您有兴趣成为我们的一分子吗？
                <br>
                <br><input type="radio" name="s3" value="Y" id="s3joiny">i. yes 有
                <br><input type="radio" name="s3" value="N" id="s3joinn">ii. No 没有
            </td>
        </tr>
        </tbody>
    </table>

    <br>
    <br>

    <table cellspacing="0" cellpadding="0" class="tbl_form">
    <colgroup>
        <col width="1%">
        <col width="30%">
        <col width="69%">
        <col width="1%">
    </colgroup>

    <tbody>
        <tr>
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