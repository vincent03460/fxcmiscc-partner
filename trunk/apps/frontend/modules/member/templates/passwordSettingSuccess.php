<?php
use_helper('I18N');
?>
<script type="text/javascript">
    $(function() {
        $("#btnSubmitPasswordForm").click(function(){
            $("#passwordForm").submit();
        });
        $("#passwordForm").validate({
            messages : {
                newPassword2: {
                    equalTo: "Please enter the same password as above"
                }
            },
            rules : {
                "oldPassword" : {
                    required : true,
                    minlength : 3
                },
                "newPassword" : {
                    required : true,
                    minlength : 3
                },
                "newPassword2" : {
                    required : true,
                    minlength : 3,
                    equalTo: "#newPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                form.submit();
            }
        });

        $("#securityPasswordForm").validate({
            messages : {
                newSecurityPassword2: {
                    equalTo: "Please enter the same password as above"
                }
            },
            rules : {
                "oldSecurityPassword" : {
                    required : true,
                    minlength : 3
                },
                "newSecurityPassword" : {
                    required : true,
                    minlength : 3
                },
                "newSecurityPassword2" : {
                    required : true,
                    minlength : 3,
                    equalTo: "#newSecurityPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                form.submit();
            }
        });
        $("#btnSecurityUpdate").click(function(){
            $("#securityPasswordForm").submit();
        });
    });
</script>

<td valign="top">

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <form action="/member/loginPassword"
                    id="passwordForm"
                    name="passwordForm"
                    method="post" class="form-horizontal" role="form">

        <h2><?php echo __("Login Password")?></h2>
        <i><?php echo __("Change Account login Password"); ?></i>

        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <td>
                    <label class="control-label" for="oldPassword">
                        <?php echo __("Old Login Password")?>
                    </label>
                </td>
                <td>
                    <input type="password" name="oldPassword" id="oldPassword"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label" for="newPassword">
                        <?php echo __("New Login Password")?>
                    </label>
                </td>
                <td>
                    <input type="password" name="newPassword" id="newPassword"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label" for="newPassword2">
                        <?php echo __("Re-enter Login Password")?>
                    </label>
                </td>
                <td>
                    <input type="password" name="newPassword2" id="newPassword2"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="pt10" align="right">
                    <input type="submit" id="btnSubmitPasswordForm" class="btn btn-danger" value="<?php echo __("Submit");?>" />
                </td>
            </tr>
            </tbody>
        </table>

    </form>
    
    <hr/>

    <form action="/member/transactionPassword"
        id="securityPasswordForm"
        name="securityPasswordForm"
        method="post" class="form-horizontal" role="form">

        <h2><?php echo __("Security Password")?></h2>
        <i><?php echo __("Change Security Password"); ?></i>

        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <td>
                    <label class="control-label" for="oldSecurityPassword">
                        <?php echo __("Old Security Password")?>
                    </label>
                </td>
                <td>
                    <input type="password" name="oldSecurityPassword" id="oldSecurityPassword"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label" for="newSecurityPassword">
                        <?php echo __("New Security Password")?>
                    </label>
                </td>
                <td>
                    <input type="password" name="newSecurityPassword" id="newSecurityPassword"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label" for="newSecurityPassword2">
                        <?php echo __("Re-enter Security Password")?>
                    </label>
                </td>
                <td>
                    <input type="password" name="newSecurityPassword2" id="newSecurityPassword2"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="pt10" align="right">
                    <input type="submit" id="btnSecurityUpdate" class="btn btn-danger" value="<?php echo __("Submit");?>" />
                </td>
            </tr>
            </tbody>
        </table>

    </form>
</td>
