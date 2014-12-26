<?php
use_helper('I18N');
?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch(e) {
        }

        $(function() {
            $("#btnSubmit").click(function(){
                $("#topupForm").submit();
            });
            $("#topupForm").validate({
                messages : {
                    transactionPassword: {
                        remote: "Password is not valid."
                    }
                },
                rules : {
                    "transactionPassword" : {
                        required : true
                    }
                },
                submitHandler: function(form) {
                    waiting();
                    form.submit();
                }
            });
        });
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="/member/summary">Home</a>
        </li>

        <li class="active"><?php echo __("Security Password")?></li>
    </ul>
    <!-- .breadcrumb -->


    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input"
                       id="nav-search-input" autocomplete="off"/>
                <i class="icon-search nav-search-icon"></i>
            </span>
        </form>
    </div>
    <!-- #nav-search -->
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
            <?php echo __("Security Password")?>
            <small>
                <i class="icon-double-angle-right"></i>
                <?php echo __("Please key in your password")?>
            </small>
        </h1>
    </div>
    <!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

            <form action="/member/securityPasswordRequired" id="topupForm" name="topupForm" method="post" class="form-horizontal" role="form">
                <input type="hidden" name="doAction" value="<?php echo $doAction?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right"><?php echo __("Password")?></label>

                    <div class="col-sm-9">
                        <span class="input-icon input-icon-left">
                            <input type="password" id="transactionPassword" name="transactionPassword" />
                            <i class="icon-leaf green"></i>
                        </span>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button" id="btnSubmit">
                            <i class="icon-ok bigger-110"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </form>

            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>