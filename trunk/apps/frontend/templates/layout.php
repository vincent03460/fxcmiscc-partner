<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <?php include('scripts.php'); ?>

    <style type="text/css"></style>
</head>

<body>
<link rel="stylesheet" href="./FX-CMISC Administration_files/fancybox.css" media="screen" type="text/css">
<table class="main_table" cellpadding="0" cellspacing="0" width="100%">

    <script type="text/javascript" src="./FX-CMISC Administration_files/jquery.min.js"></script>
    <script type="text/javascript" src="./FX-CMISC Administration_files/fancybox.js"></script>
    <script src="./FX-CMISC Administration_files/date.js" type="text/javascript"></script>
    <script type="text/javascript">
        function DisplayTime() {
            if (!document.all && !document.getElementById)

                return

            timeElement = document.getElementById ? document.getElementById("curTime") : document.all.tick2

            var CurrentDate = new Date()
            var day = CurrentDate.getDate()
            var month = CurrentDate.getMonth() + 1;
            var year = CurrentDate.getFullYear()

            var hours = CurrentDate.getHours();
            var minutes = CurrentDate.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';

            //format
            //hours = hours % 12;
            //hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;

            var hours = hours;
            var minutes = minutes;
            var ampm = ampm;
            var seconds = CurrentDate.getSeconds()

            var currentDateTime = new Date(year, month - 1, day, hours, minutes, seconds);
            var currentDate = currentDateTime.toString("dddd dd MMMM yyyy");
            var currentTime = currentDateTime.toString("HH:mm:ss")
            timeElement.innerHTML = currentDate + " (GMT+8) " + currentTime;
            setTimeout("DisplayTime()", 1000)
        }

        window.onload = DisplayTime;
    </script>

    <tbody>
    <tr class="header_bg">
        <td colspan="2">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr>
                    <td class="header_logo"><a href="./FX-CMISC Administration_files/FX-CMISC Administration.html">
                        <img src="/images/logo_white.png"></a></td>
                    <td class="header_title">Welcome, TENGCHEEKENT.</td>
                    <td align="right" class="header_title" style="font-size:12px"><span id="curTime"></span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td valign="bottom" width="230px" bgcolor="#AE0001">
            <?php include_component('component', 'submenu', array('module' => $sf_context->getModuleName(), 'action' => $sf_context->getActionName())) ?>
            <div class="copyright">
                <div>Copyright © 2011 - 2013<br>FX-CMISC All Rights Reserved.</div>
            </div>
        </td>
        <td valign="top" class="column_right">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr>
                    <?php echo $sf_data->getRaw('sf_content') ?>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<div id="fancybox-tmp"></div>
<div id="fancybox-loading">
    <div></div>
</div>
<div id="fancybox-overlay"></div>
<div id="fancybox-wrap">
    <div id="fancybox-outer">
        <div class="fancybox-bg" id="fancybox-bg-n"></div>
        <div class="fancybox-bg" id="fancybox-bg-ne"></div>
        <div class="fancybox-bg" id="fancybox-bg-e"></div>
        <div class="fancybox-bg" id="fancybox-bg-se"></div>
        <div class="fancybox-bg" id="fancybox-bg-s"></div>
        <div class="fancybox-bg" id="fancybox-bg-sw"></div>
        <div class="fancybox-bg" id="fancybox-bg-w"></div>
        <div class="fancybox-bg" id="fancybox-bg-nw"></div>
        <div id="fancybox-content"></div>
        <a id="fancybox-close"></a>

        <div id="fancybox-title"></div>
        <a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a></div>
</div>
</body>
</html>