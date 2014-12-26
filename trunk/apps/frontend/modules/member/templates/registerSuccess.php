<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html style="display: block;">
<head>
    <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
    <meta http-equiv="CACHE-CONTROL" content="NO-STORE">
    <meta http-equiv="PRAGMA" content="NO-CACHE">
    <meta http-equiv="EXPIRES" content="-1">
    <link rel="shortcut icon" href="/favicon.ico"/>

    <?php use_helper('I18N') ?>
    <?php include('scripts.php'); ?>

    <link rel='stylesheet' id='nivocss-css'  href='/css/pages/nivo-slider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='styler-farbtastic-css'  href='/css/pages/styler-farbtastic.css' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-paginate-css'  href='/css/pages/wp-paginate.css' type='text/css' media='screen' />

    <link rel="stylesheet" href="/css/style.css">

    <script type='text/javascript' src='/css/pages/comment-reply.js'></script>
    <script type='text/javascript' src='/css/pages/preloader.js'></script>
    <script type='text/javascript' src='/css/pages/jquery.nivo.slider.js'></script>
    <script type='text/javascript' src='/css/pages/bottomfix.js'></script>
    <script type='text/javascript' src='/css/pages/jquery.quicksand.js'></script>
    <script type='text/javascript' src='/css/pages/farbtastic.js'></script>

    <meta http-equiv="Content-Language" content="en-US">
    <style type="text/css" media="screen">
    #content p {
        clear: none;
        margin-bottom: 0px !important ;
    }
    .qtrans_flag span { display:none }
    .qtrans_flag { height:12px; width:18px; display:block }
    .qtrans_flag_and_text { padding-left:20px }
    </style>
    <link rel="stylesheet" type="text/css" media="all" href="/css/pages/style.css">

	<script>
$(function() {
    $("#lang").change(function() {
        $("#langForm").submit();
    });

    $.populateDOB({
                dobYear : $("#dob_year")
                ,dobMonth : $("#dob_month")
                ,dobDay : $("#dob_day")
                ,dobFull : $("#dob")
            });

    $("#captchaimage").bind('click', function() {
        $.post('/captcha/newSession');
        $("#captchaimage").load('/captcha/imageRequest');
        return false;
    });

    $("#sponsorId").change(function() {
        if ($.trim($('#sponsorId').val()) != "") {
            verifySponsorId();
        }
    });

    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    $("#registerForm").validate({
                messages : {
                    confirmPassword: {
                        equalTo: "<?php echo __('Please enter the same password as above') ?>"
                    },
                    userName: {
                        remote: "<?php echo __('User Name already in use') ?>."
                    },
                    fullname: {
                        remote: "<?php echo __('Full Name already in use') ?>."
                    }
                },
                rules : {
                    "sponsorId" : {
                        required: true
                    },
                    "userName" : {
                        required : true,
                        noSpace: true,
                        minlength : 6,
                        remote: "/member/verifyUserName"
                    },
                    "userpassword" : {
                        required : true,
                        minlength : 6
                    },
                    "confirmPassword" : {
                        required : true,
                        minlength : 6,
                        equalTo: "#userpassword"
                    },
                    "securityPassword" : {
                        required : true,
                        minlength : 6
                    },
                    "confirmSecurityPassword" : {
                        required : true,
                        minlength : 6,
                        equalTo: "#securityPassword"
                    },
                    "leverage" : {
                        required : true
                    },
                    "spread" : {
                        required : true
                    },
                    "deposit_amount" : {
                        required : true
                    },
                    "fullname" : {
                        required : true,
                        minlength : 2,
                        remote: "/member/verifyFullName"
                    },
                    "dob" : {
                        required : true
                    },
                    "address" : {
                        required : true
                    },
                    "gender" : {
                        required : true
                    },
                    "contactNumber" : {
                        required : true
                        , minlength : 10
                    },
                    "email" : {
                        required : true
                        , email: true
                    },
                    "email2" : {
                        required : true,
                        equalTo: "#email"
                    },
                    "terms_cust_agreement" : {
                        required : true
                    },
                    "terms_bis" : {
                        required : true
                    },
                    "terms_risk" : {
                        required : true
                    },
                    "terms_aml" : {
                        required : true
                    },
                    "term_condition" : {
                        required : true
                    },
                    "sig_name" : {
                        required : true
                    }
                },
                submitHandler: function(form) {
                    if ($.trim($('#sponsorId').val()) == "") {
                        alert("<?php echo __('Referrer ID cannot be blank') ?>.");
                        $('#sponsorId').focus();
                    } else {
                        waiting();
                        $.ajax({
                                    type : 'POST',
                                    url : "/member/verifySponsorId",
                                    dataType : 'json',
                                    cache: false,
                                    data: {
                                        sponsorId : $('#sponsorId').val()
                                    },
                                    success : function(data) {
                                        waiting();
                                        if (data == null || data == "") {
                                            alert("<?php echo __('Invalid Referrer ID') ?>");
                                            $('#sponsorId').focus();
                                            $("#sponsorName").val("");
                                        } else {
                                            form.submit();
                                        }
                                    },
                                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("Your login attempt was not successful. Please try again.");
                                    }
                                });
                    }
                },
                success: function(label) {
                }
            });
});

function verifySponsorId() {
    waiting();
    $.ajax({
                type : 'POST',
                url : "/member/verifyActiveSponsorId",
                dataType : 'json',
                cache: false,
                data: {
                    sponsorId : $('#sponsorId').val()
                },
                success : function(data) {
                    if (data == null || data == "") {
                        error("<?php echo __('Invalid Referrer ID') ?>");
                        $('#sponsorId').focus();
                        $("#sponsorName").val("");
                    } else {
                        $.unblockUI();
                        $("#sponsorName").val(data.fullname);
                    }
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Your login attempt was not successful. Please try again.");
                }
            });
}
function waiting() {
    $("#waitingLB h3").html("<h3 style='float: none; text-align: center; font-size: inherit; font-weight: bold;'>Loading...</h3><div id='loader' class='loader' style='text-align: center;'><img id='img-loader' src='/images/loading.gif' alt='Loading' style='text-align: center;'/></div>");

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
<img src="/images/loading.gif" style="display: none;">

<body class="home blog">
<div id="waitingLB" style="display:none; cursor: default">
    <h3>We are processing your request. Please be patient.</h3>
</div>
<noscript>
	<!-- display message if java is turned off -->
	<div id="notification">Please turn on javascript in your browser for the maximum user experience!</div>
</noscript>
<form action="/member/doRegister" id="registerForm" method="post">
<div id="wrapper">
    <div id="page">
        <div id="content">

<table cellspacing="0" cellpadding="0">
<colgroup>
    <col width="1%">
    <col width="99%">
    <col width="1%">
</colgroup>
<tbody>
<tr>
    <td rowspan="3">&nbsp;</td>
    <td class="tbl_sprt_bottom"><span class="txt_title">Member Registration</span></td>
    <td rowspan="3">&nbsp;</td>
</tr>
<tr>
    <td><br>
    </td>
</tr>
<tr>
<td>
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
    <tr>
        <th class="tbl_header_left">
            <div class="border_left_grey">&nbsp;</div>
        </th>
        <th>Account Login Details</th>
        <th class="tbl_content_right"><!--Step 1 of 3--></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>
    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Referrer ID</td>
        <td>
            <input type="text" class="inputbox" id="sponsorId" name="sponsorId">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td>Referrer Name</td>
        <td>
            <input type="text" style="background-color: #d9d9d9;" class="inputbox" readonly="readonly" id="sponsorName" name="sponsorName">
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>User Name</td>
        <td>
            <input type="text" class="inputbox" id="userName" name="userName">
            &nbsp;
            <br>Please choose a unique username for your account. Username accepts
            3-32 characters, a-z, 0-9 and underscore (_) only.
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td>Set Password</td>
        <td>
            <input type="password" class="inputbox" id="userpassword" name="userpassword">
            <br>enter your password. Password accepts 4-32 characters, A-Z,
            a-z, 0-9 and underscore (_) only and must include at least one letter and one number. Password is also case
            sensitive.
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Confirm Password:</td>
        <td>
            <input type="password" class="inputbox" id="confirmPassword" name="confirmPassword">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td>Security Password</td>
        <td>
            <input type="password" class="inputbox" id="securityPassword" name="securityPassword">
            <br>Security Password is a separate password that is required when
            you withdraw money from your account. This is for security purposes to further protect your funds.
            <br>
            Note: We strongly recommend that you choose a Security Password that is different from your login
            password.
            <br>
            Security Password accepts 4-32 characters, A-Z, a-z, 0-9 and underscore (_) only and must include at least
            one letter and one number. Security Password is also case sensitive.
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Confirm Security Password:</td>
        <td>
            <input type="password" class="inputbox" id="confirmSecurityPassword" name="confirmSecurityPassword">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_listing_end">
        <td colspan="4">
            &nbsp;
        </td>
    </tr>
    </tbody>
</table>

<!--<table cellspacing="0" cellpadding="0" class="tbl_form">
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
        <th>Trading Account Details</th>
        <th></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>


    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Leverage</td>
        <td>
            <select id="leverage" class="inputbox" name="leverage">
                <option selected="selected" value="">Please Select</option>
                <option value="50">1:50</option>
                <option value="100">1:100</option>
                <option value="200">1:200</option>
                <option value="300">1:300</option>
                <option value="400">1:400</option>
                <option value="500">1:500</option>
            </select>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td>Spread</td>
        <td>
            <div class="td_desc">
                <select id="spread" class="inputbox" name="spread">
                    <option selected="selected" value="">Please Select</option>
                    <option value="F">Fixed Spread</option>
                    <option value="V">Variable Spread</option>
                    <option value="E">ECN Premier Spread</option>
                </select>
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_listing_end">
        <td colspan="4">
            &nbsp;
        </td>
    </tr>
    </tbody>
</table>

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
        <th>Deposit Information</th>
        <th></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>


    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Deposit Currency</td>
        <td>
            <div>
                <select id="deposit_currency" class="inputbox" name="deposit_currency">
                    <option selected="selected" value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="AUD">AUD</option>
                    <option value="SGD">SGD</option>
                </select>
            </div>
            <div class="td_desc" id="fielddesc__deposit_currency">If a Money Manager handles your account, the currency of
                your account will match the currency that your Money Manager uses to make trades on your behalf. For
                example, if your manager trades in USD, your account will be in USD regardless of which currency you choose.
            </div>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td>Deposit Amount</td>
        <td>
            <div>
                <input type="text" id="deposit_amount" value="" class="inputbox" name="deposit_amount">
            </div>
            <div class="td_desc" id="fielddesc__deposit_amount"></div>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_listing_end">
        <td colspan="4">
            &nbsp;
        </td>
    </tr>
    </tbody>
</table>-->

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
        <td><?php echo __('Date of Birth') ?></td>
        <td>
            <select id="dob_year"></select>
            <select id="dob_month"></select>
            <select id="dob_day"></select>
            <input name="dob" readonly="readonly" type="hidden" id="dob" class="bp_05"/>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Address') ?></td>
        <td>
            <input type="text" name="address" class='inputbox' value="" id="address"/>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Address') ?> 2&nbsp;</td>
        <td>
            <input type="text" name="address2" class='inputbox' value=""/>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('City / Town') ?></td>
        <td>
            <input type="text" name="city" class='inputbox' value="" id="city"/>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Zip / Postal Code') ?></td>
        <td>
            <input type="text" name="zip" class='inputbox' value="" id="zip"/>
            <br>Please enter '0' if postal code is not applicable in your country.
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('State / Province') ?></td>
        <td>
            <input type="text" name="state" class='inputbox' value="" id="state"/>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Country') ?></td>
        <td>
            <?php include_component('component', 'countrySelectOption', array('countrySelected' => "Malaysia", 'countryName' => 'country', 'countryId' => 'country')) ?>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Gender') ?></td>
        <td>
            <select name="gender" class='inputbox'>
                <option value="" selected="selected">Please Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_listing_end">
        <td colspan="4">
            &nbsp;
        </td>
    </tr>
    </tbody>
</table>

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
        <th>Contact Details</th>
        <th></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>


    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Telephone Number</td>
        <td>
            <input type="text" class="inputbox" id="contactNumber" name="contactNumber">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td>Primary Email</td>
        <td>
            <div>
                <input type="text" class="inputbox" id="email" name="email">
            </div>
            <div class="td_desc" id="fielddesc__email">Please enter a valid Email address. Note: If you use a Yahoo! email
                account, please also provide an Alternate Email below.
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Retype your email</td>
        <td>
            <input type="text" id="email2" value="" class="inputbox" name="email2">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td>Alternate Email</td>
        <td>
            <div>
                <input type="text" id="alt_email" value="" class="inputbox" name="alt_email">
            </div>
            <div class="td_desc" id="fielddesc__alt_email">Alternate Email is required ONLY IF you use a Yahoo! email
                account as your primary Email. Note: Your Alternate Email cannot be a Yahoo! account. We recommend <a target="_blank" href="http://mail.google.com">Gmail</a> or <a target="_blank" href="http://www.live.com">Hotmail</a>
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td>Retype alternate email</td>
        <td>
            <input type="text" id="alt_email2" value="" class="inputbox" name="alt_email2">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_listing_end">
        <td colspan="4">
            &nbsp;
        </td>
    </tr>
    </tbody>
</table>

<table cellspacing="0" cellpadding="0" class="tbl_form">
<colgroup>
    <col width="1%">
    <col width="53%">
    <col width="18%">
    <col width="3%">
    <col width="8%">
    <col width="8%">
    <col width="1%">
</colgroup>

<tbody>
<tr class="row_header">
    <th class="tbl_header_left">
        <div class="border_left_grey">&nbsp;</div>
    </th>
    <th colspan="5">
        Accept Terms &amp; Agreements    </th>
    <th class="tbl_header_right">
        <div class="border_right_grey">&nbsp;</div>
    </th>
</tr>


<tr class="tbl_form_row_odd">
    <td>&nbsp;</td>
    <td colspan="5">
        <p>Below are the contractural terms and agreements that you are bound by as a client
        of SIXSTAR. We recommend that you take the time to read each of them carefully.</p>

        <p><strong>Please check the boxes below to acknowledge your acceptance, argeement and
            understanding of these terms and agreements.</strong></p>

    </td>
    <td>&nbsp;</td>
</tr>

<tr class="tbl_form_row_even">
    <td>&nbsp;</td>
    <td><input type="checkbox" class="checkbox" id="terms_cust_agreement" name="terms_cust_agreement">
        <label for="terms_cust_agreement">Customer Agreement</label></td>
    <td colspan="4">
        <a target="_blank" href="/download/customerAgreement">Download Agreement (272 KB PDF)</a>
    </td>
    <td>&nbsp;</td>
</tr>

<tr class="tbl_form_row_odd">
    <td>&nbsp;</td>
    <td><input type="checkbox" class="checkbox" id="terms_bis" name="terms_bis">
        <label for="terms_bis">Terms Of Business, Trading Policies &amp; Procedures</label></td>
    <td colspan="4">
        <a target="_blank" href="/download/termsOfBusiness">Download Agreement (343 KB PDF)</a>
    </td>
    <td>&nbsp;</td>
</tr>

<tr class="tbl_form_row_even">
    <td>&nbsp;</td>
    <td><input type="checkbox" class="checkbox" id="terms_risk" name="terms_risk">
        <label for="terms_cust_agreement">Risk Disclosure Statement</label></td>
    <td colspan="4">
        <a target="_blank" href="/download/riskDisclosureStatement">Download Agreement (175 KB PDF)</a>
    </td>
    <td>&nbsp;</td>
</tr>

<tr class="tbl_form_row_odd">
    <td>&nbsp;</td>
    <td><input type="checkbox" class="checkbox" id="terms_aml" name="terms_aml">
        <label for="terms_bis">AML Policy</label></td>
    <td colspan="4">
        <a target="_blank" href="/download/amlPolicy">Download Agreement (228 KB PDF)</a>
    </td>
    <td>&nbsp;</td>
</tr>

<tr class="tbl_form_row_odd">
    <td>&nbsp;</td>
    <td colspan="5">

        <p>I hereby attest and certify that the above information is complete and accurate and I agree to be bound by
            these terms and conditions. I also authorise <strong>SIXSTAR</strong> to verify any or all of the
            foregoing information. This electronic signature has the same validity and effect as a signature affixed by
            hand.</p>

        <table align="center" cellspacing="0" cellpadding="0" style="border-style:hidden">
            <tbody><tr style="border-style:hidden">
                <td align="right" style="border-style:hidden" class="td_1st">Name:</td>
                <td style="border-style:hidden" class="td_2nd"><input type="text" class="inputbox" value="" name="sig_name"></td>
            </tr>
            <tr>
                <td align="right" style="border-style:hidden" class="td_1st">Date:</td>
                <td style="border-style:hidden" class="td_2nd"><input type="text" style="background-color: #d9d9d9;" readonly="readonly" class="inputbox" value="2012-08-24" name="date"></td>
            </tr>
            <tr>
                <td align="left" valign="top" style="border-style:hidden" colspan="2">
                    <input type="checkbox" style="float:left; margin-right:4px;" value="1" id="term_condition" name="term_condition">

                    <label><p>I understand that as an SIXSTAR customer, it is my responsibility to review all necessary
                        information about currency trading and the SIXSTAR <a target="_blank" href="/download/iBAgreement">Terms and Conditions</a>. I
                        am aware of the risks associated with foreign exchange trading and will seek advice and further my education
                        on foreign exchange prior to starting any trading activity.</p></label>
                </td>
            </tr>
            <tr>
                <td valign="top" style="border-style:hidden" class="td_1st" colspan="2">&nbsp;</td>
            </tr>
        </tbody></table>
    </td>
    <td>&nbsp;</td>
</tr>

<tr class="tbl_form_row_odd">
    <td>&nbsp;</td>
    <td colspan="5" class="tbl_content_right">
        <?php
          require_once('recaptchalib.php');
          $publickey = "6LfhJtYSAAAAAAMifW42AIEE0qnNgOEFIDB0sqwt"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
    </td>
    <td>&nbsp;</td>
</tr>
<tr class="tbl_listing_end">
    <td>&nbsp;</td>
    <td colspan="5" class="tbl_content_right">
        <span class="button">
             <input type="submit" name="" value="Submit">
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



        </div>
    </div>


    <div style="margin-left: 0px;" id="sidebar">
        <div id="sidebar-color"></div>
        <div id="sidebar-border"></div>
        <div id="sidebar-light"></div>
        <div id="sidebar-texture"></div>

        <div id="sidebar-content">

            <div id="logo"><a href="<?php echo url_for("/home")?>"><img src="/images/logo.png"></a></div>
            <div id="menu">
                <?php include_component('component', 'homeLeftMenu', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
            </div>
            <div id="primary" class="widget-area" role="complementary">
                <ul class="xoxo">
                </ul>
            </div>
            <!-- #primary .widget-area -->
        </div>

        <div id="sidebar-bottom">
            <ul></ul>
            <p style="text-align: center;">© 2012 - 2015 grandegoldens.com <br> All rights reserved.</p>
        </div>
    </div>
</div>
</form>
</body>
</html>