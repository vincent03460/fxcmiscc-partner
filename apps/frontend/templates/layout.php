<?php use_helper('I18N') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <?php include('scripts.php'); ?>

    <style type="text/css"></style>
</head>

<body>
<table class="main_table" cellpadding="0" cellspacing="0" width="100%">

    <script src="/js/jquery/date.js" type="text/javascript"></script>
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
                    <td class="header_logo" style="width: 120px;"><a href="/member/summary">
                        <img src="/images/logo_white.png" style="height: 80px;"></a></td>
                    <td class="header_title"><?php echo __("Welcome") ?>, <?php echo $sf_user->getAttribute(Globals::SESSION_USERNAME); ?></td>
                    <td align="right" class="header_title" style="font-size:12px"><span id="curTime"></span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td valign="bottom" width="230px" bgcolor="#AE0001" style="vertical-align: top;">
            <?php include_component('component', 'submenu', array('module' => $sf_context->getModuleName(), 'action' => $sf_context->getActionName())) ?>
            <div class="copyright">
                <div>Copyright © 2011 - 2013<br>CMIS Trader | All Rights Reserved.</div>
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

<script type="text/template" id="settings-template">
  <div class="setting clearfix">
    <div>Background</div>
    <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
      <% dark = background == 'dark'; light = background == 'light';%>

      <button type="button" data-value="dark" class="btn btn-sm btn-transparent <%= dark ? 'active' : '' %>">Dark</button>
      <button type="button" data-value="light" class="btn btn-sm btn-transparent <%= light ? 'active' : '' %>">Light</button>
    </div>
  </div>
  <div class="setting clearfix">
    <div>Sidebar on the</div>
    <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
      <% onRight = sidebar == 'right'%>

      <button type="button" data-value="left" class="btn btn-sm btn-transparent <%= onRight ? '' : 'active' %>">Left</button>
      <button type="button" data-value="right" class="btn btn-sm btn-transparent <%= onRight ? 'active' : '' %>">Right</button>
    </div>
  </div>
  <div class="setting clearfix">
    <div>Sidebar</div>
    <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
      <% display = displaySidebar%>

      <button type="button" data-value="true" class="btn btn-sm btn-transparent <%= display ? 'active' : '' %>">Show</button>
      <button type="button" data-value="false" class="btn btn-sm btn-transparent <%= display ? '' : 'active' %>">Hide</button>
    </div>
  </div>
</script>

<script type="text/template" id="sidebar-settings-template">
  <% auto = sidebarState == 'auto'%>
    <% if (auto) { %>

  <button type="button"
          data-value="icons"
          class="btn-icons btn btn-transparent btn-sm eicon-switch"></button>
  <button type="button"
          data-value="auto"
          class="btn-auto btn btn-transparent btn-sm eicon-resize-full"></button>
  <% } else { %>

  <button type="button"
          data-value="auto"
          class="btn btn-transparent btn-sm eicon-resize-full"></button>
  <% } %>
</script>

<script type='text/javascript' src='/js/jquery/jquery.blockUI.js'></script>
<script type="text/javascript">
    function waiting() {
        /*$("#waitingLB h3").html("<h3>Loading...</h3><div id='loader' class='loader'><img id='img-loader' src='/images/loading.gif' alt='Loading'/></div>");*/
        $("#waitingLB h3").html("<h3 style='font-size: 16px; width: 100%; padding-left: 0px; background-color:inherit; color: black; line-height:0px; margin-top: 20px; font-weight: bold;'><?php echo __("Loading");?>...</h3><div id='loader' class='loader'><img id='img-loader' style='margin-top: 16px; padding-bottom: 15px;' src='/images/loading.gif' alt='Loading'/></div>");

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
    function alert(data) {
        var msgs = "";
        if ($.isArray(data)) {
            jQuery.each(data, function(key, value) {
                msgs = value + "<br>";
            });
        } else {
            msgs = data + "<br>";
        }

        var alertPanel = "<div style='padding: 10px; line-height :normal; font-weight: bold; font-size:13px;' class='ui-state-highlight ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-info'></span>";
        alertPanel += msgs + "</p><br><button id='alertPanelCloseButton'  class='btn btn-danger'>Close</button></div>";
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

        var errorPanel = "<div style='padding: 10px; line-height :normal; font-weight: bold; font-size:13px;' class='ui-state-error ui-corner-all'>";
        errorPanel += "<p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-alert'></span>";
        errorPanel += msgs + "</p><br><button id='errorPanelCloseButton'  class='btn btn-danger'>Close</button></div>";
        $("#waitingLB h3").html(errorPanel);
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
    $(function() {
        $("#errorPanelCloseButton").live("click", function(event) {
            event.preventDefault();
            $.unblockUI();
        });
        $("#alertPanelCloseButton").live("click", function(event) {
            event.preventDefault();
            $.unblockUI();
        });
    });
</script>
<img src="/images/loading.gif" style="display: none;">

<div id="waitingLB" style="display: none; cursor: default">
    <h3 style="font-size: 16px; width: 100%; padding-left: 0px; background-color:inherit; color: black; line-height:0px; margin-top: 0px"><?php echo __('We are processing your request. Please be patient.') ?></h3>
</div>
</body>
</html>