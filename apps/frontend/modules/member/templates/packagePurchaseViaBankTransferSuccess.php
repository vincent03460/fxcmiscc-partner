<?php include('scripts.php'); ?>

<script type="text/javascript">
$(function() {
    $("#packageType").change(function() {
        $("#packageTypePrice").autoNumericSet($("#packageType").val());
        $("#packageTypeId").val($("#packageType option:selected").attr("ref"));
    }).trigger("change");

    $("#transferForm").validate({
        messages : {
            transactionPassword: {
                remote: "Security Password is not valid."
            }
        },
        rules : {
            "bankSlip" : {
                required : true
                , accept:true
            },
            "transactionPassword" : {
                required : true,
                remote: "/member/verifyTransactionPassword"
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        }
    });
});
</script>

<div class="aside">
    <?php //include_component('component', 'headerInformation', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
    <?php //include_component('component', 'submenu', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
    <!-- #EndLibraryItem -->
</div>

<div class="areaContent">
    <div class="resultsWrap">
        <?php echo form_tag('member/packagePurchaseViaBankTransfer', array("enctype"=>"multipart/form-data", "id"=>"transferForm")) ?>
            <table cellpadding="3" cellspacing="3" border="0" width="100%" class="tablelist">
                <caption><?php echo __('Package Purchase via Bank Transfer') ?></caption>
                <tr>
                    <td colspan=2 align='center'>
                        <?php if ($sf_flash->has('successMsg')): ?>
                        <div class="ui-widget">
                            <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
                                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                                    <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($sf_flash->has('errorMsg')): ?>
                        <div class="ui-widget">
                            <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-error ui-corner-all">
                                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                                    <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" width="650px" style="margin:0 auto">
                            <tr>
                                <td width="160px" class="caption">
                                    <strong><?php echo __('Member ID'); ?></strong>
                                </td>
                                <td class="value">
                                    <input name="traderId" type="text" id="traderId" tabindex="1" maxlength="50" disabled="disabled" value="<?php echo $distDB->getDistributorCode(); ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="caption">
                                    <strong><?php echo __('Trader Name'); ?></strong>
                                </td>
                                <td class="value">
                                    <input name="traderName" type="text" id="traderName" tabindex="1" maxlength="50" disabled="disabled" value="<?php echo $distDB->getFullname(); ?>"/>
                                </td>
                            </tr>
                            <!--<tr>
                                <td class="caption">
                                    <strong><?php /*echo __('Registered Time'); */?></strong>
                                </td>
                                <td class="value">
                                    <input name="registeredTime" type="text" id="registeredTime" tabindex="1" maxlength="50" disabled="disabled" value="<?php /*echo $distDB->getCreatedOn(); */?>"/>
                                </td>
                            </tr>-->
                            <tr>
                                <td class="caption">
                                    <strong><?php echo __('Package Type'); ?></strong>
                                </td>
                                <td class="value">
                                    <select name="packageType" id="packageType">
                                        <?php
                                        foreach ($packages as $package) {
                                            echo "<option value='". $package->getPrice() . "' ref='" . $package->getPackageId() . "'>" . __($package->getPackageName()) . "</option>";
                                        }
                                        ?>

                                    </select>
                                    &nbsp;
                                    <input name="packageTypePrice" type="text" id="packageTypePrice" disabled="disabled"/>
                                    <input name="packageTypeId" type="hidden" id="packageTypeId" />
                                </td>
                            </tr>
                            <tr>
                                <td class="caption">
                                    <strong><?php echo __('Upload Bank Transfer Slip'); ?></strong>
                                </td>
                                <td class="value">
                                    <?php echo input_file_tag('fileNew', array("id"=>"bankSlip", "name"=>"bankSlip")) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="caption">
                                    <strong><?php echo __('Security Password'); ?></strong>
                                </td>
                                <td class="value">
                                    <input name="transactionPassword" type="password" id="transactionPassword"
                                           tabindex="4"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan=3><font color="#dc143c">&nbsp;</font></td>
                </tr>
                <tr>
                    <td colspan='3' align='center'>
                        <input type="submit" name="Button1" value="<?php echo __('Submit') ?>" language="javascript"
                               id="btnTransfer" tabindex="5"/>
                    </td>
                </tr>
            </table>
        </form>
        <div class="clear"></div>
    </div>
</div>