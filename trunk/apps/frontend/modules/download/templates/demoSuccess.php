<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->
<head>
<?php use_helper('I18N') ?>
<?php include('scripts.php'); ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSS Styles -->
<link rel="stylesheet" href="/css/style.css">
<style type="text/css">
h2 {
    padding: 5;
    margin: 0;
}
</style>
<script>
$(function() {
    $("#registerForm").validate({
        messages : {

        },
        rules : {
            "requesterName" : {
                required : true,
                minlength : 6
            },
            "email" : {
                required : true
                , email: true
            }
        },
        submitHandler: function(form) {
            window.open("<?php echo url_for("/download/downloadDemoMt4")."?q=".rand() ?>&email=" + $("#email").val() + "&requesterName=" + $("#requesterName").val());
            $("#email").val("");
            $("#requesterName").val("");
            alert("Thank you!");
        },
        success: function(label) {
        }
    });
});

function waiting() {
    $("#waitingLB h3").html("<h3>Loading...</h3><div id='loader' class='loader'><img id='img-loader' src='/images/loading.gif' alt='Loading'/></div>");

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

    var alertPanel = "<div style='margin-bottom: 20px; padding: 1em;' class='ui-state-highlight ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-info'></span>";
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

    var errorPanel = "<div style='padding: 1em' class='ui-state-error ui-corner-all'>";
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
</script>
</head>
<body>
<div id="waitingLB" style="display:none; cursor: default">
    <h3>We are processing your request.  Please be patient.</h3>
</div>
<div id="wrapp_v2">
<div class="wrapper">
<!--this is header--><!-- #BeginLibraryItem "/Library/header.lbi" -->
<div id="header">
    <div id="logo"><a href="/home/login"><img src="/images/ofxglobal/logo.jpg"/></a></div>
    <!--<span class="titleSpan"><strong>Serving Traders in <em class="titleEm">205</em> Countries Across <em
            class="titleEm">6</em> Continents</strong></span>-->

    <div class="clear"></div>
</div>
<!-- #EndLibraryItem --><!--header end here-->
<div class="clear"></div>
<!--- this is content--->
<div class="content">

<!--- aside end --->
<!--- content --->
<div class="areaContent">
<div class="clear"></div>
<div class="resultsWrap">
<!---form start--->
<form action="/download/downloadDemoMt4" id="registerForm" method="post">
<table class='pbt_table' cellspacing="0" cellpadding="0">
<tr>
    <td colspan='2'>
        <div class="split_section">
            <h2><?php echo __('Open a FREE MT4 Demo Account') ?></h2>
        </div>
    </td>
</tr>
<tr align="left" valign="top" id='input_ref'>
    <td class='td_1st'><?php echo __('Name') ?>&nbsp;</td>
    <td class='td_2nd'>
        <div>
            <div class='none' id='div_ref'>
                <input name="requesterName" type="text" id="requesterName" class="inputbox"/>
            </div>
        </div>
    </td>
</tr>
<tr align="left" valign="top">
    <td class='td_1st'><?php echo __('Email') ?>&nbsp;</td>
    <td class='td_2nd'>
        <div>
            <div>
                <input name="email" type="text" id="email" class="inputbox"/>
            </div>
        </div>
    </td>
</tr>

<tr id='input_captcha'>
    <td colspan="2" valign="top" class='td_1st'>
        <div style="margin:0 auto; width:100px;">
            <input style="padding:4px;" name="" type="submit" value="Submit"/>
        </div>
    </td>
    <td class='td_3rd'></td>
</tr>
</table>
<div class="clear"></div>
</form>
<div class="clear"></
<!---form end --->
</div>
</div>
<!--- contend end --->
<div class="push"></div>
<div class="clear"></div>
</div>
<!--- content end here--->
</div>
<div class="clear"></div>
<!--this is footer-->
<div id="footer" class="footer" style="position: fixed; bottom: 0">
    <div class="copy">
        <address>
            Copyright © SIXSTAR, Privacy Statement | Terms and Conditions.
        </address>
    </div>
    <div class="clear"></div>
</div>
<!--footer is end here-->
<div class="clear"></div>
</div>
</body>


</html>