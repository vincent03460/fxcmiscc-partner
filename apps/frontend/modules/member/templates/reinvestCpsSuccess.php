<?php use_helper('I18N') ?>

<script>
    $(function() {
        $("#reinvestForm").validate({
            messages : {
                transactionPassword: {
                    remote: "Security Password is not valid."
                }
            },
            rules : {
                "transactionPassword" : {
                    required : true,
                    remote: "/member/verifyTransactionPassword"
                },
                "pinRequired" : {
                    required : true
                }
            },
            submitHandler: function(form) {
                if ($("#pinRequired").val() == 0 || $("#pinRequired").val() == 0) {
                    alert("Pin cannot be zero.");
                    $("#pinRequired").focus();
                } else {
                    form.submit();
                }
            }
        });

        /*$("#pinRequired").numeric({
            decimal:false
            , minValue:0
            , maxValue:<?php echo $pin; ?>
        }).focus().select();*/
    });
</script>

<form action="/member/doReinvestCps" id="reinvestForm" method="post">
    <input type="hidden" name="distributorId" id="distributorId">
    <table cellpadding="0" cellspacing="5" align="center" border="0">
        <tr>
            <td>
                <font color='white'><?php echo __('PIN Available'); ?></font>
            </td>
            <td>
                <input name="pinAvail" type="text" id="pinAvail" tabindex="-1" disabled="disabled" value="<?php echo $pin ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <font color='white'><?php echo __('No. of PIN required'); ?></font>
            </td>
            <td>
<!--                <input name="pinRequired" type="text" id="pinRequired" tabindex="1"/>-->
                <select name="pinRequired" id="pinRequired" class='textbox'>
                    <?php
                        foreach($arrs as $arr)
                            echo "<option value='".$arr."'>".$arr."</option>";
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <font color='white'><?php echo __('Security Password'); ?></font>
            </td>
            <td>
                <input name="transactionPassword" type="password" id="transactionPassword" tabindex="2"/>
            </td>
        </tr>
        <tr>
            <td colspan=2 align='center'>
                <?php if ($sf_flash->has('errorMsg')): ?>
                <span class="error-font"><?php echo $sf_flash->get('errorMsg') ?></span>
                <?php endif; ?>
                <?php if ($sf_flash->has('successMsg')): ?>
                <span class="font"><?php echo $sf_flash->get('successMsg') ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 align='center'>
                <input type="submit" name="Button1" value="<?php echo __('Submit') ?>" language="javascript"
                       id="btnConfirm" tabindex="4"/>
            </td>
        </tr>
    </table>
</form>