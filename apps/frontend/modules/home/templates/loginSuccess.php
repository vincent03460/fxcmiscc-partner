<?php
use_helper('I18N');
$culture = $sf_user->getCulture();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <script type='text/javascript' src='/js/jquery/jquery-1.6.2.min.js'></script>
    <script type='text/javascript' src='/js/jquery/jquery.validate.min.js'></script>
    
    <?php if ($sf_user->getCulture() == "cn") { ?>
    <script type='text/javascript' src='/js/jquery/localization/messages_cn.js'></script>
    <?php } ?>

    <link rel='stylesheet' type='text/css' media='screen' href='/css/validate/validate.css'/>
    <link rel="stylesheet" href="/css/layout.css">
    <title><?php echo __("FX-CMISC Administration")?></title>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#loginForm").validate({
                rules : {
                    "username" : {
                        required : true
                    },
                    "userpassword" : {
                        required : true
                    }
                }
            });
        });
    </script>
</head>

<body style="background: url('images/bg.gif') repeat;">
<form id="loginForm" name="loginForm" method="post" action="/home/doLogin">
    <div class="login_box">
        <img src="/images/logo.png">
        <table cellpadding="5" cellspacing="0" align="center">
            <tbody>
            <tr height="20px">
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td><?php echo __("Partner ID")?> :</td>
                <td><input type="text" id="username" name="username" placeholder="<?php echo __("Partner ID")?>"></td>
            </tr>
            <tr>
                <td><?php echo __("Password")?> :</td>
                <td><input type="password" id="userpassword" name="userpassword" placeholder="<?php echo __("Password")?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                    if ($sf_user->getAttribute(Globals::LOGIN_RETRY, 0) >= 3) {
                        require_once('recaptchalib.php');
                        $publickey = "6LfhJtYSAAAAAAMifW42AIEE0qnNgOEFIDB0sqwt"; // you got this from the signup page
                        echo recaptcha_get_html($publickey);
                    }
                    ?>
                    <?php if ($sf_flash->has('warningMsg')) { ?>
                    <div class="alert alert-error" style="width: 285px">
<!--                        <button type="button" class="close" data-dismiss="alert">-->
<!--                            <i class="icon-remove"></i>-->
<!--                        </button>-->
                        <strong style="line-height: 15px;"><?php echo $sf_flash->get('warningMsg') ?></strong>
                        <br/>
                    </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right" class="pt20"><input type="submit" name="login_submit" value="Submit"></td>
            </tr>
            </tbody>
        </table>
    </div>
</form>

</body>
</html>