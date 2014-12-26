<?php use_helper('I18N') ?>
<!DOCTYPE html>
<html>
<head>
    <title>FX-CMISC</title>
    <link href="/light-blue/css/application.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <script src="/light-blue/lib/jquery/jquery.1.9.0.min.js"> </script>
    <script src="/light-blue/lib/backbone/underscore-min.js"></script>
    <script src="/light-blue/js/settings.js"> </script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/validate/validate.css'/>

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
                username: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                captcha: "<br><?php echo __('Correct captcha is required') ?>."
            },
            submitHandler: function(form) {
                <?php //if (sfConfig::get('sf_environment') == Globals::SF_ENVIRONMENT_PROD) { ?>
                if ($.trim($("#username").val()) == "") {
                    alert("User Name cannot be blank.");
                    $("#username").focus();
                    return false;
                }
                if ($.trim($("#email").val()) == "") {
                    alert("Email cannot be blank.");
                    $("#email").focus();
                    return false;
                }
                <?php //} ?>
                form.submit();
            }
        });
    });

    </script>
</head>
<body>
<div class="single-widget-container">
    <section class="widget login-widget">
        <header class="text-align-center">
            <h4><?php echo __("Request Password")?></h4>
        </header>
        <div class="body">
            <form action="/home/forgetPassword" method="post" name="loginForm" id="loginForm" class="no-margin">
                <fieldset>
                    <div class="form-group no-margin">
                        <label for="username" ><?php echo __("User Name")?></label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="eicon-user"></i>
                                </span>
                            <input id="username" name="username" type="text" class="form-control input-lg"
                                   placeholder="<?php echo __("User Name")?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="email" ><?php echo __("Email")?></label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-envelope"></i>
                                </span>
                            <input id="email" name="email" type="text" class="form-control input-lg"
                                   placeholder="<?php echo __("Your Email")?>">
                        </div>

                    </div>

                    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                </fieldset>
                <div class="form-actions">
                    <button type="submit" class="btn btn-block btn-lg btn-danger">
                        <span class="small-circle"><i class="icon-caret-right"></i></span>
                        <small><?php echo __("Send")?></small>
                    </button>
                    <div class="forgot"><a class="forgot" href="/home/login"><?php echo __("Login Page")?></a></div>
                </div>
            </form>
        </div>
    </section>
</div>
</body>
</html>