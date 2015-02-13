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

    <style type="text/css">
        body {
            background:url('/images/bg.jpg');
            background-size: cover;
            background-position: -10px -10px;
            background-repeat:no-repeat;
            background-attachment:fixed;
            /*background: url('/images/bg1.jpg') no-repeat 0 0 scroll;*/
            /*background-size: cover;*/
            /*height: auto;*/
            /*left: 0;*/
            /*min-height: 100%;*/
            /*min-width: 1024px;*/
            /*overflow: hidden;*/
            /*position: fixed;*/
            /*top: 0;*/
        }
    </style>

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

            initBg();

            function initBg() {
                $(document).mousemove(function(e){
                    var mousePosX = 50 + (e.pageX/$(window).width())*25;
                    var mousePosY = 50 + (e.pageY/$(window).height())*25;
                    $('body').css('backgroundPosition', mousePosX + '% ' +  mousePosY + '%');
                });
            }
        });
    </script>
</head>

<body>
<form id="loginForm" name="loginForm" method="post" action="/home/doLogin">
    <div class="login_box">
        <img src="/images/logo.png">

        <?php
                                    $closeLogin = true;
                                    if ($closeLogin == true) {
                                    ?>

                                    <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
                         class="ui-state-highlight ui-corner-all">
                        <p style="margin: 10px; width: 450px;"><span style="float: left; margin-right: .3em;"
                                                      class="ui-icon ui-icon-info"></span>
                            <strong>Dear Members,
<br>
<br>Please NOTE that the company server will be SHUT DOWN at 2359hrs February 13th 2015 for a period of 10 hours.

<br>
<br>This is necessary because we are UPGRADING our servers to better serve our IMs and to keep up abreast with the demands of our continued growth.

<br>
<br>We seek your kind understanding and apologize for any inconvenience caused.
<br>

<br>亲爱的会员们:
                                <br>
<br>请注意公司将于2015.02.13日晚23:59分关闭服务器, 时长为10小时.
                                <br>
                                <br>这一操作是因为我们需要升级服务器,也是为了满足我们不断快速成长的需求, 更好地服务所有代理及会员.
                                <br>
                                <br>敬请留意,谢谢大家的理解!为此造成任何不便,我们深表歉意.
                            </strong>
                                    </p></div>
<?php } else { ?>
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
    <?php }  ?>
    </div>
</form>

</body>
</html>