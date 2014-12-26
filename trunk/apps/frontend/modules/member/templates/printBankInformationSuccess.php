<?php
use_helper('I18N');
?>
<!DOCTYPE html>
<html>
<head>
    <title>FX-CMISC</title>
    <link href="/light-blue/css/application.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <!-- jquery and friends -->
    <script src="/light-blue/lib/jquery/jquery.1.9.0.min.js"> </script>
    <script src="/light-blue/lib/jquery/jquery-migrate-1.1.0.min.js"> </script>

    <script type='text/javascript' src='/js/jquery/jquery-ui-1.8.11.custom.min.js'></script>
    <link rel='stylesheet' href='/css/smoothness/jquery-ui-1.8.18.custom.css' type='text/css'/>
    <!-- jquery plugins -->
    <script src="/light-blue/lib/jquery-maskedinput/jquery.maskedinput.js"></script>
    <script src="/light-blue/lib/parsley/parsley.js"> </script>
    <script src="/light-blue/lib/icheck.js/jquery.icheck.js"></script>
    <script src="/light-blue/lib/select2.js"></script>
    
    
    <!--backbone and friends -->
    <script src="/light-blue/lib/backbone/underscore-min.js"></script>
    
    <!-- bootstrap default plugins -->
    <script src="/light-blue/lib/bootstrap/transition.js"></script>
    <script src="/light-blue/lib/bootstrap/collapse.js"></script>
    <script src="/light-blue/lib/bootstrap/alert.js"></script>
    <script src="/light-blue/lib/bootstrap/tooltip.js"></script>
    <script src="/light-blue/lib/bootstrap/popover.js"></script>
    <script src="/light-blue/lib/bootstrap/button.js"></script>
    <script src="/light-blue/lib/bootstrap/dropdown.js"></script>
    <script src="/light-blue/lib/bootstrap/modal.js"></script>
    
    <!-- bootstrap custom plugins -->
    <script src="/light-blue/lib/bootstrap-datepicker.js"></script>
    <script src="/light-blue/lib/bootstrap-select/bootstrap-select.js"></script>
    <script src="/light-blue/lib/wysihtml5/wysihtml5-0.3.0_rc2.js"></script>
    <script src="/light-blue/lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    
    <!-- basic application js-->
    <script src="/light-blue/js/app.js"></script>
    <script src="/light-blue/js/settings.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/validate/validate.css'/>

    <script type='text/javascript' src='/js/jquery/jquery.dataTables.js'></script>
    <script type='text/javascript' src='/js/jquery/jquery.r9jason.dataTables.extend.js'></script>
    <script type='text/javascript' src='/js/jquery/autoNumeric-1.7.1.js'></script>
    <link rel='stylesheet' type='text/css' media='screen' href='/light-blue/css/datatable.css'/>
</head>
<body class="background-dark">

<div class="wrap">
    <div class="content container">
    <div class="row hidden-print">
        <div class="col-md-12">
            <h2 class="page-title">Invoice <small>Print optimized page</small></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="widget">
                <div class="body no-margin">
                    <div class="row">
                        <div class="col-sm-6 col-print-6">
                            <h4>FX-CMISC</h4>
                            <!-- <img src="img/logo.png" alt="Logo" class="invoice-logo"/>-->
                        </div>
                        <div class="col-sm-6 col-print-6">
                            <div class="invoice-number text-align-right">
                                #<?php echo $distEpointPurchase->getPaymentReference()?> / <?php echo $currentDate?>
                            </div>
                            <div class="invoice-number-info text-align-right">
                                Some Invoice number description or whatever
                            </div>
                        </div>
                    </div>
                    <hr>
                    <section class="invoice-info well">
                        <div class="row">
                            <div class="col-sm-6 col-print-6">
                                <h4 class="details-title">Company Information</h4>
                                <h3 class="company-name">
                                    FX-CMISC
                                </h3>
                                <address>
                                    <strong>St Martins Tower</strong><br>
                                    2202/level22, 31 Market Street,<br>
                                    Sydney, NSW 2000<br>
                                    <br>
                                    <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">support@fxcmiscc.com</a><br>
                                    <abbr title="Work Phone">phone:</abbr> +64 223436260<br>
                                </address>
                            </div>
                            <div class="col-sm-6 col-print-6 client-details">
                                <h4 class="details-title">Client Information</h4>
                                <h3 class="client-name">
                                    <?php echo $mlmDistributorDB->getFullName()?>
                                </h3>
                                <address>
                                    <strong><?php echo $mlmDistributorDB->getDistributorCode()?></strong><br>
                                    <abbr title="Work email">e-mail:</abbr> <a href="mailto:#"><?php echo $mlmDistributorDB->getEmail()?></a><br>
                                    <abbr title="Work Phone">phone:</abbr> <?php echo $mlmDistributorDB->getContact()?><br>
                                    <div class="separator line"></div>
                                    <p class="margin-none"><strong>Note:</strong><br></p>
                                </address>
                            </div>
                        </div>
                    </section>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Funds Deposit</th>
                            <th>Quantity</th>
                            <th class="hidden-xs">Remark</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><?php echo number_format($distEpointPurchase->getAmount(),2)?></td>
                            <td>1</td>
                            <td class="hidden-xs"></td>
                            <td><?php echo number_format($distEpointPurchase->getAmount(),2)?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6 col-print-6">
                            <blockquote>
                                <strong>Note:</strong>
                            </blockquote>
                        </div>
                        <div class="col-sm-6 col-print-6">
                            <div class="row text-align-right">
                                <div class="col-xs-6"></div> <!-- instead of offset -->
                                <div class="col-xs-3">
                                    <p>Subtotal</p>
                                    <p>Tax(0%)</p>
                                    <p class="no-margin"><strong>Total</strong></p>
                                </div>
                                <div class="col-xs-3">
                                    <p><?php echo number_format($distEpointPurchase->getAmount(),2)?></p>
                                    <p>0.00</p>
                                    <p class="no-margin"><strong><?php echo number_format($distEpointPurchase->getAmount(),2)?></strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-actions text-align-right hidden-print">
                        <button id="print" class="btn btn-inverse">
                            <i class="icon-print"></i>
                            &nbsp;&nbsp;
                            Print
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>

<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Background</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-sm btn-transparent <%= dark? 'active' : '' %>">Dark</button>
            <button type="button" data-value="light" class="btn btn-sm btn-transparent <%= light? 'active' : '' %>">Light</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-transparent <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-transparent <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-transparent <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-transparent <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm eicon-switch"></button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm eicon-resize-full"></button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm eicon-resize-full"></button>
    <% } %>
</script>

<script type='text/javascript' src='/js/jquery/jquery.blockUI.js'></script>
<script type="text/javascript">
function waiting() {
    /*$("#waitingLB h3").html("<h3>Loading...</h3><div id='loader' class='loader'><img id='img-loader' src='/images/loading.gif' alt='Loading'/></div>");*/
    $("#waitingLB h3").html("<h3 style='font-size: 16px; width: 100%; padding-left: 0px; background-color:inherit; color: black; line-height:0px; margin-top: 20px; font-weight: bold;'>Loading...</h3><div id='loader' class='loader'><img id='img-loader' src='/images/loading.gif' alt='Loading'/></div>");

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

    var alertPanel = "<div style='padding: 10px; line-height :normal; font-weight: bold;' class='ui-state-highlight ui-corner-all'><p><span style='float: left; margin-right: .3em;' class='ui-icon ui-icon-info'></span>";
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

    var errorPanel = "<div style='padding: 10px; line-height :normal; font-weight: bold;' class='ui-state-error ui-corner-all'>";
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
        opacity: .9
    }});
    $(".blockOverlay").css("z-index", 1010);
    $(".blockPage").css("z-index", 1011);
    $('.blockOverlay').attr('title', 'Click to unblock').click($.unblockUI);
}
</script>
<img src="/images/loading.gif" style="display: none;">
<div id="waitingLB" style="display:none; cursor: default">
    <h3 style="font-size: 16px; width: 100%; padding-left: 0px; background-color:inherit; color: black; line-height:0px; margin-top: 0px">We are processing your request. Please be patient.</h3>
</div>
</body>
</html>