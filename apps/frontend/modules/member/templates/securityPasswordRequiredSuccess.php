<?php
use_helper('I18N');
?>
<script type="text/javascript">
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

<td valign="top">
    <h2><?php echo __("Security Password"); ?></h2>

    <?php echo __("Please key in your password")?>

    <form class="form-horizontal label-left" method="post"
                    action="/member/securityPasswordRequired"
                    data-validate="parsley"
                    id="topupForm" name="topupForm">

        <input type="hidden" name="doAction" value="<?php echo $doAction?>">
        <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <td>
                    <label class="control-label" for="transactionPassword">
                        <?php echo __("Security Password")?>
                    </label>
                </td>
                <td>
                    <input type="password" id="transactionPassword" name="transactionPassword" class="form-control">
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="pt10" align="right">
                    <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit");?>" />
                </td>
            </tr>
            </tbody>
        </table>

    </form>
</td>
