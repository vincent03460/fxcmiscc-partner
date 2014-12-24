<?php use_helper('I18N') ?>
<html>
<head>
    <?php include('scripts_backend.php'); ?>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/colors.css">

    <style type="text/css">

    .regsussful3 {
        float: left;
        font-size: 14px;
        font-weight: bold;
    }
    .regsussful3 em {
        color: #C49922;
        padding-left: 10px;
    }
    em {
        font-style: normal;
    }
    </style>
    <!-- Google WebFonts -->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet'
          type='text/css'>

    <script>
        $(function() {
            $("#lang").change(function() {
                $("#doAction").val("lang");
                $("#loginForm").submit();
            });

            $("#btnLogin").click(function() {

            });

            $("#captchaimage").bind('click', function() {
                $.post('/captcha/newSession');
                $("#captchaimage").load('/captcha/imageRequest');
                return false;
            });

            $("#loginForm").validate({
                    rules: {
                    <?php if (sfConfig::get('sf_environment') == Globals::SF_ENVIRONMENT_PROD) { ?>
                        captcha: {
                            required: true,
                            remote: "/captcha/process"
                        }
                        <?php } ?>
                    },
                    messages: {
                        captcha: "Correct captcha is required."
                    },
                    submitHandler: function(form) {
                    <?php if (sfConfig::get('sf_environment') == Globals::SF_ENVIRONMENT_PROD) { ?>
                        waiting();
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
                        form.submit();
                    }
                });
        });
    </script>
</head>
<body class="login">
<section role="main">
    <!-- Login box -->
    <article id="login-box">

        <div class="article-container">

            <form action="/home/login" id="loginForm" method="post">
                <input type="hidden" name="doAction" id="doAction" value="">
                <fieldset>
                    <div class="regsussful1">
                        <div class="regsussful3">
                            <br>
                            <span id="LabelInfo"><?php echo __('Trader has been registered successfully.') ?>
                                <br><?php echo __('Your Trader ID') ?>:</span>
                            <em><span id="LabelMemberName"><?php echo $sf_user->getAttribute(Globals::SESSION_USERNAME) ?></span></em>
                        </div>
                        <br>
                        <br>
                    </div>
                </fieldset>
                <?php if ($sf_flash->has('errorMsg')): ?>
                <div class="notification error">
                    <p><strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
                </div>
                <?php endif; ?>
                <button type="submit" class="right"><?php echo __('Login Now') ?></button>
            </form>

        </div>

    </article>
</section>
</body>
</html>