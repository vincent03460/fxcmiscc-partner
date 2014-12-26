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

<style type="text/css">
    fieldset {
        width: 800px;
        margin-bottom: 20px;
    }

    fieldset th {
        width: 150px;
    }
</style>

<td valign="top">

    <h2><?php echo __("Password Settings")?></h2>

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <fieldset>
        <legend class="section">
            <h3><?php echo __("Login Password")?></h3>
        </legend>
        <form action="/member/loginPassword"
                        id="passwordForm"
                        name="passwordForm"
                        method="post" class="form-horizontal" role="form">

            <i><?php echo __("Change Account login Password"); ?></i>

            <br><br>

            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="oldPassword">
                            <?php echo __("Old Login Password")?>
                        </label>
                    </th>
                    <td>
                        <input type="password" name="oldPassword" id="oldPassword"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="newPassword">
                            <?php echo __("New Login Password")?>
                        </label>
                    </th>
                    <td>
                        <input type="password" name="newPassword" id="newPassword"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="newPassword2">
                            <?php echo __("Re-enter Login Password")?>
                        </label>
                    </th>
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
    </fieldset>
    
    <fieldset>
        <legend class="section">
            <h3><?php echo __("Security Password")?></h3>
        </legend>
        <form action="/member/transactionPassword"
            id="securityPasswordForm"
            name="securityPasswordForm"
            method="post" class="form-horizontal" role="form">

            <i><?php echo __("Change Security Password"); ?></i>

            <br><br>

            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="oldSecurityPassword">
                            <?php echo __("Old Security Password")?>
                        </label>
                    </th>
                    <td>
                        <input type="password" name="oldSecurityPassword" id="oldSecurityPassword"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="newSecurityPassword">
                            <?php echo __("New Security Password")?>
                        </label>
                    </th>
                    <td>
                        <input type="password" name="newSecurityPassword" id="newSecurityPassword"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="newSecurityPassword2">
                            <?php echo __("Re-enter Security Password")?>
                        </label>
                    </th>
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
    </fieldset>
    
</td>
