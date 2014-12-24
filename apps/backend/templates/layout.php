<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>

<?php include('scripts_backend.php'); date_default_timezone_set('America/New_York'); ?>
<style type="text/css">
.caption{
background:#e8e8e8;
width:25%;
}
.ui-widget-content .display a, .ui-widget-content a{
    color: #0066bb !important;
}
.value{
background:#f4f4f4;
width:75%;
}
.hiddenPic {
    display:none;
}
.text {
    padding: 5px;
}
body {
    font: 12px "Arial";
}
.middle {
    margin: 0 auto;
    width: 1000px;
}
#top-nav h3.title {
    color: #969696;
    cursor: pointer;
    float: left;
    margin: 6px 0 0;
}
#top-nav, #top-nav a, #top-nav h3 {
    font-size: 11px;
}
#top-nav, #top-nav a, #top-nav h3 {
    font-size: 10px !important;
    letter-spacing: 0 !important;
}
#top-nav {
    background: url("/images/top-nav-bg.gif") repeat-x scroll 0 0 #181818;
    height: 26px;
    position: relative;
    text-transform: uppercase;
    top: 0;
    width: 100%;
}
#top-nav, #top-nav a, #top-nav h3 {
    font-size: 11px;
}
a:link {
    text-decoration: none;
    font: 12px "Arial";
    font-weight: bold;
}
.ui-widget {
    font-family: Segoe UI,Arial,sans-serif;
    font-size: 0.9em;
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
.topMenu {
    background: none repeat scroll 0 0 #D19405;
    color: #f9c81e;
    padding: 5px 10px 5px 30px;
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
.display a {
    color: blue;
    text-decoration: underline;
}

.portlet-content {
    padding: 1em;
}
.ui-button { margin-left: -1px; }
.ui-button-icon-only .ui-button-text { padding: 0.35em; }
.ui-autocomplete-input { margin: 0; padding: 0.42em 0 0.47em 0.45em; }
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

</style>

<script type="text/javascript">
var infoStyle= "<div style='margin-bottom: 20px; padding: 0 .7em;' class='ui-state-highlight ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-info'></span><strong id='_msg'></strong></p></div>";
var errorStyle= "<div style='padding: 0 .7em;' class='ui-state-error ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-alert'></span><strong id='_msg'></strong></p></div>";

$(function(){
    $("button, input:submit, input:button").button();

    $(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
            .find(".portlet-header")
            .addClass("ui-widget-header ui-corner-all")
            .prepend("<a href='#' class='ui-dialog-titlebar-close ui-corner-all' role='button'><span class='ui-icon ui-icon-circle-triangle-n' style='padding-right: 2px'></span></a>")
            .end()
            .find(".portlet-content");

    $(".portlet-header .ui-icon").click(function() {
        $(this).toggleClass("ui-icon-circle-triangle-n").toggleClass("ui-icon-circle-triangle-s");
        $(this).parents(".portlet:first").find(".portlet-content").toggle("fast");
    });
});
 (function( $ ) {
    $.widget("ui.combobox", {
        _create: function() {
            var self = this,
                select = this.element.hide(),
                selected = select.children( ":selected" ),
                value = selected.val() ? selected.text() : "";
            var input = this.input = $("<input id='autocompletecbo_" + $(select).attr("id") + "'>")
                .insertAfter( select )
                .val( value )
                .autocomplete({
                    delay: 0,
                    minLength: 0,
                    source: function( request, response ) {
                        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                        response( select.children( "option" ).map(function() {
                            var text = $( this ).text();
                            if ( this.value && ( !request.term || matcher.test(text) ) )
                                return {
                                    label: text.replace(
                                        new RegExp(
                                            "(?![^&;]+;)(?!<[^<>]*)(" +
                                            $.ui.autocomplete.escapeRegex(request.term) +
                                            ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                        ), "<strong>$1</strong>" ),
                                    value: text,
                                    option: this
                                };
                        }) );
                    },
                    select: function( event, ui ) {
                        ui.item.option.selected = true;
                        self._trigger( "selected", event, {
                            item: ui.item.option
                        });
                        $(select).trigger("change");
                    },
                    change: function( event, ui ) {
                        if ( !ui.item ) {
                            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
                                valid = false;
                            select.children( "option" ).each(function() {
                                if ( $( this ).text().match( matcher ) ) {
                                    this.selected = valid = true;
                                    return false;
                                }
                            });
                            if ( !valid ) {
                                // remove invalid value, as it didn't match anything
                                $( this ).val( "" );
                                select.val( "" );
                                input.data( "autocomplete" ).term = "";
                                return false;
                            }
                        }
                    }
                })
                .addClass( "ui-widget ui-widget-content ui-corner-left" );

            input.data( "autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<a>" + item.label + "</a>" )
                    .appendTo( ul );
            };

            this.button = $( "<button type='button'>&nbsp;</button>" )
                .attr( "tabIndex", -1 )
                .attr( "title", "Show All Items" )
                .insertAfter( input )
                .button({
                    icons: {
                        primary: "ui-icon-triangle-1-s"
                    },
                    text: false
                })
                .removeClass( "ui-corner-all" )
                .addClass( "ui-corner-right ui-button-icon" )
                .click(function() {
                    // close if already visible
                    if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
                        input.autocomplete( "close" );
                        return;
                    }

                    // work around a bug (likely same cause as #5265)
                    $( this ).blur();

                    // pass empty string as value to search for, displaying all results
                    input.autocomplete( "search", "" );
                    input.focus();
                });
        },

        destroy: function() {
            this.input.remove();
            this.button.remove();
            this.element.show();
            $.Widget.prototype.destroy.call( this );
        }
    });
})( jQuery );

function alert(data) {
    var msgs = "";
    if ($.isArray(data)) {
        jQuery.each(data, function(key, value) {
            msgs = value + "<br>";
        });
    } else {
        msgs = data + "<br>";
    }

    var alertPanel = "<div style='margin-bottom: 20px; padding: 0 .7em;' class='ui-state-highlight ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-info'></span>";
    alertPanel += msgs +"</p></div>";
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
    $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
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

    var errorPanel = "<div style='padding: 0 .7em;' class='ui-state-error ui-corner-all'>";
    errorPanel += "<p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-alert'></span>";
    errorPanel += msgs +"</p></div>";
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
    $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
}
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
function _errorMsg(msg){
    $("#dgMsg").html(errorStyle);
    $("#_msg").html(msg);
    $("#dgMsg").show(500);
}
function _infoMsg(msg){
    $("#dgMsg").html(infoStyle);
    $("#_msg").html(msg);
    $("#dgMsg").show(500);
}
function _clearMsg(){
    $("#dgMsg").hide(500);
}
</script>
<script>
$(function() {
    $("#menu").accordion({
        active : <?php echo $sf_user->getAttribute(Globals::SESSION_ADMIN_MENU_IDX, 0) ?>,
        autoHeight:false,
        change: function(event, ui) {
            $.ajax({
                type : 'POST',
                url : "<?php echo url_for('admin/updateMenuIdx') ?>",
                dataType : 'json',
                cache: false,
                data: {
                    menuIdx : $("#menu").accordion("option", "active")
                },
                success : function(data) {
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert("Your login attempt was not successful. Please try again.");
                }
            });
        }
    });
    $(':input[readonly], input:disabled').css({
        'background-color':'#D8D8D8',
        'color':'#686868'
    });
});
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<img src="/images/loading.gif" class="hiddenPic">
<div id="waiting" style="display: none; position: fixed; right: 10px; top: 10px; z-index: 999;">
    <img src="/images/common/indicator.gif" title="Loader" alt="Loader" />
</div>
<div id="waitingLB" style="display:none; cursor: default">
    <h3>We are processing your request.  Please be patient.</h3>
</div>
<div id="top-nav">
    <div class="middle">
        <div class="block block-custom_mod block-top_bar block-id-132 clearfix  odd" id="block-custom_mod-0">
            <div class="block-inner">
                <h3 title="" class="title block-title">User Name : &nbsp;&nbsp;<a href="<?php echo url_for("#")?>" style="color: #ffffff;"><?php echo $sf_user->getAttribute(Globals::SESSION_USERNAME); ?></a> </h3>
            </div>
            <!-- /block-inner -->
            <div class="block-inner" style="float: right">
                <h3 title="" class="title block-title">
                    <a target="_parent" class="topMenuItem" href="<?php echo url_for('admin/dashboard') ?>" style="color : #ffffff">Dashboard</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                    <a target="_parent" class="topMenuItem" href="<?php echo url_for('admin/logout') ?>" style="color : #ffffff">Logout</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </h3>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
<table width="100%" border="0" cellpadding="2" cellspacing="2">
    <tr>
        <td valign="top" width="250">
            <div id="menu">
                <?php if ($sf_user->hasCredential(Globals::PROJECT_NAME.AP::MOD_ADMIN) || $sf_user->hasCredential(Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN)) { ?>
                <h3><a href="#"><?php echo __('Admin'); ?></a></h3>
                <div>
                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_USER_LIST, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('admin/userList') ?>" title="<?php echo __('User List'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('User List'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_USER_ROLE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('admin/userRole') ?>" title="<?php echo __('User Role'); ?>">

                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('User Role'); ?></a><br/>
                    <?php } ?>
                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_CHANGE_PASSWORD, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('admin/changePassword') ?>" title="<?php echo __('Change Password'); ?>">

                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Change Password'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_SETTING, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('admin/applicationSetting') ?>" title="<?php echo __('Application Setting'); ?>">

                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Application Setting'); ?></a><br/>
                    <?php } ?>

                    <?php /*if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_PACKAGE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { */?><!--
                    <a href="<?php /*echo url_for('admin/packageList') */?>" title="<?php /*echo __('Package'); */?>">

                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Package'); */?></a><br/>
                    --><?php //} ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_BONUS, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('admin/bonusList') ?>" title="<?php echo __('Bonus List'); ?>">

                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Bonus List'); ?></a><br/>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php
                //var_dump($sf_user->hasCredential(AP::MOD_MARKETING));
                //var_dump($sf_user->hasCredential(Globals::USERTYPE_SUPERADMIN));
                if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::MOD_MARKETING, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                <h3><a href="#"><?php echo __('Marketing'); ?></a></h3>
                <div>
                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_DIST_ADD, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <!--<a href="<?php /*echo url_for('marketing/distAdd') */?>" title="<?php /*echo __('Distributor Listing'); */?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Register Distributor'); */?></a><br/>-->
                    <?php } ?>
                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_DIST_LIST, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('marketing/distList') ?>" title="<?php echo __('Distributor Listing'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Distributor Listing'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_SUPER_IB_LIST, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                        <!--<a href="<?php /*echo url_for('marketing/superIbList') */?>" title="<?php /*echo __('Super IB Listing'); */?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Super IB Listing'); */?></a><br/>-->
                    <?php } ?>

                    <?php /*if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_SPONSOR_TREE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { */?><!--
                    <a href="<?php /*echo url_for('marketing/sponsorTree') */?>" title="Hierarchy">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Hierarchy'); */?></a><br/>
                    --><?php //} ?>

                    <?php
                    /*if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_FILE_UPLOAD, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { */?><!--
                    <a href="<?php /*echo url_for('marketing/fxGuideUpload') */?>" title="FX Guide Upload">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('FX Guide Upload'); */?></a><br/>
                    --><?php /*
                    }*/
                    ?>

                    <?php /*if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_FUND_MANAGEMENT_UPLOAD, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { */?><!--
                    <a href="<?php /*echo url_for('marketing/fundManagementUpload') */?>" title="Fund Management Upload">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Fund Management Upload'); */?></a><br/>
                    --><?php //} ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_PIPS_CALCULATOR, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('marketing/pipsUpload') ?>" title="Pips Upload">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Pips Upload'); ?></a><br/>

                    <a href="<?php echo url_for('marketing/demoPipsUpload') ?>" title="Pips Upload">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Pips Upload (Demo)'); ?></a><br/>
                    <?php } ?>

                    <?php /*if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_DAILY_PIPS_CALCULATOR, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { */?><!--
                    <a href="<?php /*echo url_for('marketing/dailyPipsUpload') */?>" title="Daily Pips Upload">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Daily Pips Upload'); */?></a><br/>
                    --><?php //} ?>

                    <a href="<?php echo url_for('marketing/customerEnquiryList') ?>" title="Customer Enquiry">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Customer Enquiry'); ?></a><br/>

                    <a href="<?php echo url_for('marketing/fxGuideUpload') ?>" title="FxGuide Upload">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('FxGuide Upload'); ?></a><br/>

                    <!--<a href="<?php /*echo url_for('marketing/uploadMT4') */?>" title="FxGuide Upload">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('MT4 Client Upload'); */?></a><br/>-->

                    <!--<a href="<?php /*echo url_for('marketing/demoAccountRequest') */?>" title="Demo Account Request">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Demo Account Request'); */?></a><br/>

                    <a href="<?php /*echo url_for('marketing/liveAccountRequest') */?>" title="Live Account Request">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Live Account Request'); */?></a><br/>-->

                    <!--<a href="<?php /*echo url_for('marketing/debitCardApplication') */?>" title="Debit Card Application">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Debit Card Application'); */?></a><br/>

                    <a href="<?php /*echo url_for('marketing/ezyCashCardApplication') */?>" title="EzyCash Card Application">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('EzyCash Card Application'); */?></a><br/>-->
                </div>
                <?php } ?>

                <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::MOD_FINANCE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                <h3><a href="#"><?php echo __('Finance'); ?></a></h3>
                <div>
                    <?php
                    if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_ECASH_WITHDRAWAL, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('finance/ecashWithdrawal') ?>"
                       title="<?php echo __('e-Cash Withdrawal'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('e-Cash Withdrawal'); ?></a><br/>
                    <?php
                    }
                    ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_EPOINT_PURCHASE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('finance/epointPurchase') ?>" title="e-Point Purchase">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('e-Point Purchase'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_EPOINT_TRANSFER, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('finance/epointTransfer') ?>" title="e-Point Transfer">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('e-Point Transfer'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_PACKAGE_PURCHASE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('finance/packagePurchase') ?>" title="Package Purchase">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Package Purchase'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_PACKAGE_UPGRADE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('finance/packageUpgradeHistory') ?>" title="e-Point Purchase">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Package Upgrade History'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_RELOAD_MT4_FUND, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('finance/reloadMt4Fund') ?>" title="Reload MT4 Fund">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Reload MT4 Fund'); ?></a><br/>
                    <?php } ?>

                    <?php /*if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REFERRAL_BONUS, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { */?><!--
                    <a href="<?php /*echo url_for('finance/referralBonus') */?>" title="Referral Bonus">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Referral Bonus'); */?></a><br/>
                    --><?php //} ?>

                    <?php /*if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_PIPS_BONUS, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { */?><!--
                    <a href="<?php /*echo url_for('finance/pipsBonusDetail') */?>" title="Pips Bonus">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php /*echo __('Pips Bonus'); */?></a><br/>
                    --><?php //} ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_MT4_WITHDRAWAL, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('finance/mt4Withdrawal') ?>" title="MT4 Withdrawal">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('MT4 Withdrawal'); ?></a><br/>
                    <?php } ?>
                </div>
                <?php } ?>

                <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::MOD_REPORT, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                <h3><a href="#"><?php echo __('Report'); ?></a></h3>
                <div>
                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_CONVERT_ECASH_TO_EPOINT, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/convertEcashToEpoint') ?>"
                       title="<?php echo __('Convert e-Cash To e-Point'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Convert e-Cash To e-Point'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_EPOINT_TRANSFER, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/epointTransfer') ?>"
                       title="<?php echo __('e-Point Transfer'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('e-Point Transfer'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_GROUP_SALES, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/groupSales') ?>"
                       title="<?php echo __('Group Sales'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Group Sales'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_INDIVIDUAL_TRADER_SALES, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/individualTraderSales') ?>"
                       title="<?php echo __('Individual Trader Sales'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Individual Trader Sales'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_MT4_WITHDRAWAL, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/mt4Withdrawal') ?>"
                       title="<?php echo __('MT4 Withdrawal'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('MT4 Withdrawal'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_REFERRAL_BONUS, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/referralBonus') ?>"
                       title="<?php echo __('Referral Bonus'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Referral Bonus'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_TOTAL_MT4_RELOAD, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/totalMt4Reload') ?>"
                       title="<?php echo __('totalMt4Reload'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Total MT4 Reload'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_PACKAGE_PURCHASE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/totalPackagePurchase') ?>"
                       title="<?php echo __('Package Purchase'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Total Package Purchase'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_PACKAGE_UPGRADE, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/totalPackageUpgrade') ?>"
                       title="<?php echo __('Package Upgrade'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Total Package Upgrade'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.AP::AL_REPORT_TOTAL_VOLUME_TRADED, Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/totalVolumeTraded') ?>"
                       title="<?php echo __('Total Volume Traded'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Total Volume Traded'); ?></a><br/>
                    <?php } ?>

                    <?php if ($sf_user->hasCredential(array(Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN), false)) { ?>
                    <a href="<?php echo url_for('report/leaderSales') ?>"
                       title="<?php echo __('Leader Sales'); ?>">
                        <img src="/images/common/fileopen.png" style="padding-bottom: 4px; vertical-align: middle;"
                             border="0">
                        &nbsp;<?php echo __('Leader Sales'); ?></a><br/>
                    <?php } ?>
                </div>
                <?php } ?>


                <?php if ($sf_user->hasCredential(Globals::PROJECT_NAME.Globals::ROLE_SUPERADMIN)) { ?>
                <h3><a href="#"><?php echo __('Super Admin'); ?></a></h3>
                <div>
                    <a href="<?php echo url_for('zAppSetting') ?>" title="<?php echo __('zAppSetting'); ?>">
                        &nbsp;<?php echo __('zAppSetting'); ?></a><br/>
                    <a href="<?php echo url_for('zAppUser') ?>" title="<?php echo __('zAppUser'); ?>">
                        &nbsp;<?php echo __('zAppUser'); ?></a><br/>
                    <a href="<?php echo url_for('zAppUserAccess') ?>" title="<?php echo __('zAppUserAccess'); ?>">
                        &nbsp;<?php echo __('zAppUserAccess'); ?></a><br/>
                    <a href="<?php echo url_for('zAppUserInRole') ?>" title="<?php echo __('zAppUserInRole'); ?>">
                        &nbsp;<?php echo __('zAppUserInRole'); ?></a><br/>
                    <a href="<?php echo url_for('zAppUserRole') ?>" title="<?php echo __('zAppUserRole'); ?>">
                        &nbsp;<?php echo __('zAppUserRole'); ?></a><br/>
                    <a href="<?php echo url_for('zAppUserRoleAccess') ?>" title="<?php echo __('zAppUserRoleAccess'); ?>">
                        &nbsp;<?php echo __('zAppUserRoleAccess'); ?></a><br/>

                    <a href="<?php echo url_for('zMlmAccount') ?>" title="<?php echo __('zMlmAccount'); ?>">
                        &nbsp;<?php echo __('zMlmAccount'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmAccountLedger') ?>" title="<?php echo __('zMlmAccountLedger'); ?>">
                        &nbsp;<?php echo __('zMlmAccountLedger'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmAdmin') ?>" title="<?php echo __('zMlmAdmin'); ?>">
                        &nbsp;<?php echo __('zMlmAdmin'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmAnnouncement') ?>" title="<?php echo __('zMlmAnnouncement'); ?>">
                        &nbsp;<?php echo __('zMlmAnnouncement'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmDailyBonusLog') ?>" title="<?php echo __('zMlmDailyBonusLog'); ?>">
                        &nbsp;<?php echo __('zMlmDailyBonusLog'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmDistCommission') ?>" title="<?php echo __('zMlmDistCommission'); ?>">
                        &nbsp;<?php echo __('zMlmDistCommission'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmDistCommissionLedger') ?>" title="<?php echo __('zMlmDistCommissionLedger'); ?>">
                        &nbsp;<?php echo __('zMlmDistCommissionLedger'); ?></a><br/>

                    <a href="<?php echo url_for('zMlmDistEpointPurchase') ?>" title="<?php echo __('zMlmDistEpointPurchase'); ?>">
                        &nbsp;<?php echo __('zMlmDistEpointPurchase'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmDistPackagePurchase') ?>" title="<?php echo __('zMlmDistPackagePurchase'); ?>">
                        &nbsp;<?php echo __('zMlmDistPackagePurchase'); ?></a><br/>

                    <a href="<?php echo url_for('zMlmDistributor') ?>" title="<?php echo __('zMlmDistributor'); ?>">
                        &nbsp;<?php echo __('zMlmDistributor'); ?></a><br/>

                    <a href="<?php echo url_for('zMlmEcashWithdraw') ?>" title="<?php echo __('zMlmEcashWithdraw'); ?>">
                        &nbsp;<?php echo __('zMlmEcashWithdraw'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmIbPackage') ?>" title="<?php echo __('zMlmIbPackage'); ?>">
                        &nbsp;<?php echo __('zMlmIbPackage'); ?></a><br/>

                    <a href="<?php echo url_for('zMlmMt4Account') ?>" title="<?php echo __('zMlmMt4Account'); ?>">
                        &nbsp;<?php echo __('zMlmMt4Account'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmMt4DemoRequest') ?>" title="<?php echo __('zMlmMt4DemoRequest'); ?>">
                        &nbsp;<?php echo __('zMlmMt4DemoRequest'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmMt4ReloadFund') ?>" title="<?php echo __('zMlmMt4ReloadFund'); ?>">
                        &nbsp;<?php echo __('zMlmMt4ReloadFund'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmMt4Withdraw') ?>" title="<?php echo __('zMlmMt4Withdraw'); ?>">
                        &nbsp;<?php echo __('zMlmMt4Withdraw'); ?></a><br/>

                    <a href="<?php echo url_for('zMlmPackage') ?>" title="<?php echo __('zMlmPackage'); ?>">
                        &nbsp;<?php echo __('zMlmPackage'); ?></a><br/>
                    <a href="<?php echo url_for('zMlmPackageUpgradeHistory') ?>" title="<?php echo __('zMlmPackageUpgradeHistory'); ?>">
                        &nbsp;<?php echo __('zMlmPackageUpgradeHistory'); ?></a><br/>

                    <a href="<?php echo url_for('finance/advanceEpoint') ?>" title="<?php echo __('zAdvanceEpoint'); ?>">
                        &nbsp;<?php echo __('zAdvanceEpoint'); ?></a><br/>
                </div>
                <?php } ?>
            </div>
            <?php include_component('component', 'packageInformation') ?>
        </td>
        <td valign="top">
            <?php echo $sf_data->getRaw('sf_content') ?>
        </td>
    </tr>
</table>
</body>
</html>
