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
    <?php include('scripts.php'); ?>

    <title>Welcome to fxcmiscc.com.uk</title>
    <link href="/css/shop/default.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/css/shop/nivo-slider.css" rel="stylesheet" type="text/css" media="screen"/>
    <script type="text/javascript" src="/css/shop/ddaccordion.js"></script>
    <script type="text/javascript" src="/css/shop/jquery.nivo.slider.js"></script>
    <script type="text/javascript" src="/css/shop/jquery.bxSlider.min.js"></script>
    <script type="text/javascript" src="/css/shop/jquery.cross-slide.js"></script>

    <script type="text/javascript">
    $(function() {
        $("#submitLink").click(function(event) {
            $("#loginForm").submit();
        });

        $("#username, #userpassword").keydown(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code == 13) { //Enter keycode
                $("#submitLink").trigger("click");
            }
        });
        /*$("#captchaimage").bind('click', function() {
            $.post('/captcha/newSession');
            $("#captchaimage").load('/captcha/imageRequest');
            return false;
        });*/
        $("#loginForm").validate({
            rules: {
                /*"captcha" : {
                    required: true,
                    remote: "/captcha/process"
                }*/
            },
            messages: {
                captcha: "<br><?php echo __('Correct captcha is required') ?>."
            },
            submitHandler: function(form) {
                if ("" == $("#doAction").val()) {
                <?php if (sfConfig::get('sf_environment') == Globals::SF_ENVIRONMENT_PROD) { ?>
                    if ($.trim($("#username").val()) == "") {
                        alert("Trader ID cannot be blank.");
                        $("#username").focus();
                        return false;
                    }
                    if ($.trim($("#userpassword").val()) == "") {
                        alert("Password cannot be blank.");
                        $("#userpassword").focus();
                        return false;
                    }
                    <?php } ?>
                }
                form.submit();
            }
        });
    });

    </script>
</head>
<body class="product_result">
<!--------------------------------HEADER-------------------------------------->
<div id="header_contianer">
    <div id="header">
        <a href="http://www.fxcmiscc.com.uk" id="logo"><img src="/images/logo_bg.png" style="height: 90px"></a>

        <div style="float: right;">
            <ul id="header_menu">
<!--                <li><a href="#"><span class="menu-icon register"></span>Register Now</a></li>-->
                <li><a href="#"><?php echo __('Language') ?> :</a></li>
                <?php include_component('component', 'multiLanguage', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
            </ul>

        </div>
        <!--end of language-->
    </div>
    <!--end of header-->
</div>
<!--end of header container-->
<!--------------------------------CONTENT-------------------------------------->
<div id="content">

<!--------------------------------Side Menu------------------------------------->
    <div id="login">
        <div id="login_heading" style="color: black">Request Password</div>
        <!--end of login header-->
        <span class="shadow_mid"></span>

        <div id="login_content">
            <div class="clear"></div>
            <!-- use it if needed
      <span id="warning">Please fill in the username field</span>--->

            <form action="/home/forgetPassword" method="post" name="loginForm" id="loginForm">
                <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                    <tbody>
                    <tr>
                        <td style="color: black; font-weight: bold;"><?php echo __('User Name') ?></td>
                        <td>
                            <div>
                                <input type="text" autocomplete="off" size="38" id="username" name="username" value="<?php echo $username ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="color: black; font-weight: bold;"><?php echo __('Email') ?></td>
                        <td>
                            <div>
                                <input type="text" autocomplete="off" style="width: 200px; margin: auto; display: block;" id="email" name="email" value="<?php echo $email ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!--end of login content-->

        <div id="login_btn">
            <?php if ($sf_flash->has('errorMsg')) { ?>
            <span class="txt_error" style="font-size: 12px; color: red;">&nbsp; <?php echo $sf_flash->get('errorMsg'); ?></span>
            <?php } ?>
            <?php if ($sf_flash->has('successMsg')) { ?>
            <span class="txt_success" style="font-size: 12px; color: #009900;">&nbsp; <?php echo $sf_flash->get('successMsg'); ?></span>
            <?php } ?>
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td valign="middle" height="45" align="right">
                        <span class="link">
                        </span>&nbsp;&nbsp;&nbsp;
                    </td>
                    <td width="90" valign="middle" height="45" align="center">
                        <button type="submit" id="submitLink" style="width: 80px; background-color: #e5eef5"><?php echo __('Send') ?></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--end of login btn-->
    </div>
<!--end of main content-->
</div>
<!--end of content-->
<!--------------------------------Glossy menu------------------------------------->

<div id="footer">Copyright &copy; 2012 fxcmiscc.com. All right reserved.&nbsp;&nbsp;</div>
<!--end of footer-->

</div>

</body>
</html>