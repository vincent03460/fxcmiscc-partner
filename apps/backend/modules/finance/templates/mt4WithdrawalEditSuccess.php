<?php
// auto-generated by sfPropelCrud
// date: 2012/04/20 19:13:40
?>
<?php use_helper('Object') ?>
<?php use_helper('I18N') ?>
<!-- TinyMCE -->
<script type="text/javascript">
$(function() {
    $("#btnSave").button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    })
    $("#btnCancel").button({
        icons: {
            primary: "ui-icon-circle-arrow-w"
        }
    }).click(function(){
        $("#upgradeForm").attr("action", "<?php echo url_for("/finance/mt4Withdrawal")?>");
    });
    $("#cboStatusCode").change(function(){
        if ($(this).val() == "REJECT") {
            $("#txtRemarks").val($("#rejectReason").val());
        } else if ($(this).val() == "COMPLETE") {
            $("#txtRemarks").val("");
        }
    });
    $("#rejectReason").change(function(){
        if ($("#cboStatusCode").val() == "REJECT") {
            $("#txtRemarks").val($("#rejectReason").val());
        }
    });
});
</script>

<?php echo form_tag('finance/updateMt4Withdrawal', 'id=upgradeForm') ?>

<?php echo object_input_hidden_tag($mt4Withdraw, 'getWithdrawId') ?>

<div style="padding: 10px; top: 10px; width: 95%">
    <div class="portlet">
        <div class="portlet-header">MT4 Withdrawal Details</div>
        <div class="portlet-content">
            <table class="sf_admin_list" cellpadding="3" width="100%">
                <tbody>
                <tr>
                    <td colspan="2">
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
                <?php
                    $existDist = MlmDistributorPeer::retrieveByPK($mt4Withdraw->getDistId());
                    $existPackage = MlmPackagePeer::retrieveByPK($existDist->getMt4RankId());
                ?>
                <tr>
                    <th class="caption">Distributor Code :</th>
                    <td class="value"><?php
                        echo $existDist->getDistributorCode() ?></td>
                </tr>
                <tr>
                    <th class="caption">Full Name :</th>
                    <td class="value"><?php
                        echo $existDist->getFullName() ?></td>
                </tr>
                <tr>
                    <th class="caption">MT4 ID :</th>
                    <td class="value"><?php
                        echo $mt4Withdraw->getMt4UserName() ?></td>
                </tr>
                <tr>
                    <th class="caption">Ranking :</th>
                    <td class="value"><?php
                        echo $existPackage->getPackageName()." (".number_format($existPackage->getPrice(),2).")" ?></td>
                </tr>
                <tr>
                    <th class="caption">Requested Date Time :</th>
                    <td class="value"><?php
                        echo $mt4Withdraw->getCreatedOn() ?></td>
                </tr>
                <tr>
                    <th class="caption">Approve / Reject Date Time :</th>
                    <td class="value"><?php
                        echo $mt4Withdraw->getApproveRejectDatetime() ?></td>
                </tr>
                <tr>
                    <th class="caption">Amount Requested:</th>
                    <td class="value"><?php echo object_input_tag($mt4Withdraw, 'getAmountRequested', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Handling Fee:</th>
                    <td class="value"><?php echo object_input_tag($mt4Withdraw, 'getHandlingFee', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Grand Amount:</th>
                    <td class="value"><?php echo object_input_tag($mt4Withdraw, 'getGrandAmount', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Currency Code:</th>
                    <td class="value"><?php echo object_input_tag($mt4Withdraw, 'getCurrencyCode', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Payment Type:</th>
                    <td class="value"><?php echo object_input_tag($mt4Withdraw, 'getPaymentType', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr>
                    <th class="caption">Status code:</th>
                    <td class="value"><?php
                        $arr = array();
                        $arr['PENDING'] = 'PENDING';
                        $arr['REJECT'] = 'REJECT';
                        $arr['COMPLETE'] = 'SUCCESSFUL';
                        echo select_tag('status_code', options_for_select($arr, $mt4Withdraw->getStatusCode()), array(
                                                                                           'id' => "cboStatusCode"
                                                                                      ));
                     ?></td>
                </tr>
                <tr>
                    <th class="caption">Reject Reason:</th>
                    <td class="value">
                        <select id="rejectReason">
                            <option value="IN-SUFFICIENT FUND">IN-SUFFICIENT FUND</option>
                            <option value="CREDIT IS NON-WITHDRAWABLE">CREDIT IS NON-WITHDRAWABLE</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="caption">Remarks:</th>
                    <td class="value"><?php echo object_textarea_tag($mt4Withdraw, 'getRemarks', array(
                                                                                                          'id' => 'txtRemarks',
                                                                                                          'size' => '30x3',
                                                                                                     )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Bank Name:</th>
                    <td class="value"><?php echo object_input_tag($existDist, 'getBankName', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Bank Account No:</th>
                    <td class="value"><?php echo object_input_tag($existDist, 'getBankAccNo', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Bank Holder Name:</th>
                    <td class="value"><?php echo object_input_tag($existDist, 'getBankHolderName', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Swift Code:</th>
                    <td class="value"><?php echo object_input_tag($existDist, 'getBankSwiftCode', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr style="display: none">
                    <th class="caption">Visa Debit Card:</th>
                    <td class="value"><?php echo object_input_tag($existDist, 'getVisaDebitCard', array(
                                                                                           'size' => 30,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                </tbody>
            </table>
            <hr/>
            <?php
            if ($mt4Withdraw->getStatusCode() == Globals::STATUS_PENDING) {
            ?>
            <button id="btnSave">Save</button>
            <?php } ?>
            <button id="btnCancel">Cancel</button>
<!--            &nbsp;--><?php //echo link_to('cancel', 'finance/ecashWithdrawal', array("id" => "btnCancel")) ?>

            <br>
            <br>
            <table class="sf_admin_list" cellpadding="3" width="100%">
                <tbody>

                <tr>
                    <th class="caption">Bank Name :</th>
                    <td class="value"><?php
                        echo $existDist->getBankName() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Account Number :</th>
                    <td class="value"><?php
                        echo $existDist->getBankAccNo() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Account Holder Name :</th>
                    <td class="value"><?php
                        echo $existDist->getBankHolderName() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Swift Code / ABA :</th>
                    <td class="value"><?php
                        echo $existDist->getBankSwiftCode() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Address :</th>
                    <td class="value"><?php
                        echo $existDist->getBankAddress() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Branch :</th>
                    <td class="value"><?php
                        echo $existDist->getBankBranch() ?></td>
                </tr>
                <tr>
                    <th class="caption">Maxim Trader Visa Debit Card :</th>
                    <td class="value"><?php
                        echo $existDist->getVisaDebitCard() ?></td>
                </tr>
                <tr>
                    <th class="caption">EZY Account ID :</th>
                    <td class="value"><?php
                        echo $existDist->getEzyCashCard() ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</form>