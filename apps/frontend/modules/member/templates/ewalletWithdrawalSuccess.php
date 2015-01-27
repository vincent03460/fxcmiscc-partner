<?php
use_helper('I18N');
?>

<script type="text/javascript" language="javascript">
    var datagrid = null;
    $(function() {
        $("#cbo_ecashAmount").change(function(){
            var ecashFinal = parseFloat($("#cbo_ecashAmount").val());

            var handlingCharge = 50;
            var handlingCharge2 = parseFloat($("#cbo_ecashAmount").val()) * 0.05;

            if (handlingCharge2 > handlingCharge)
                handlingCharge = handlingCharge2;

            $("#ecashFinal").autoNumericSet(ecashFinal + handlingCharge);
        }).change();

        $("#btnSubmit").click(function(){
            $("#withdrawForm").submit();
        });

        $("#withdrawForm").validate({
            messages : {
                transactionPassword: {
                    remote: "Security Password is not valid."
                }
            },
            rules : {
                "transactionPassword" : {
                    required : true
                    , remote: "/member/verifyTransactionPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                var ecashBalance = parseFloat($('#ecashBalance').autoNumericGet());
                var withdrawAmount = parseFloat($("#ecashFinal").autoNumericGet());

                if (withdrawAmount > ecashBalance) {
                    error("In-sufficient e-Wallet");
                    return false;
                }

                form.submit();
            }
        });
    }); // end function
</script>

<td valign="top">

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <form class="form-horizontal label-left" method="post"
          action="/member/ewalletWithdrawal"
          data-validate="parsley"
          id="withdrawForm" name="withdrawForm">

        <h2><?php echo __("e-Wallet Withdrawal"); ?></h2>


        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <th>
                    <label class="control-label" for="ecashBalance">
                        <?php echo __("e-Wallet Balance")?>
                    </label>
                </th>
                <td>
                    <input type="text" name="ecashBalance" id="ecashBalance" readonly="readonly" class="form-control" value="<?php echo number_format($ledgerAccountBalance, 2); ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="cbo_ecashAmount">
                        <?php echo __("Withdrawal Amount")?>
                    </label>
                </th>
                <td>
                    <select name="ecashAmount" id="cbo_ecashAmount" class="form-control">
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="1000">1,000</option>
                        <option value="1500">1,500</option>
                        <option value="2000">2,000</option>
                        <option value="2500">2,500</option>
                        <option value="3000">3,000</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="ecashFinal">
                        <?php echo __("Sub Total (added handling fee)")?>
                    </label>
                </th>
                <td>
                    <input type="text" name="ecashFinal" id="ecashFinal" readonly="readonly" class="form-control"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="transactionPassword">
                        <?php echo __("Security Password")?>
                    </label>
                </th>
                <td>
                    <input type="password" name="transactionPassword" id="transactionPassword" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo __('NOTE :'); ?>
                    <ol class="help-block" style="list-style: decimal; padding-left: 20px;">
                        <li><?php echo __('Minimum withdrawal amount : USD 100'); ?></li>
                        <li><?php echo __('Withdrawal request must be done during the first 7 days of each month') ?></li>
                        <li><?php echo __('Handling fee USD50 or 5% whichever is higher'); ?></li>
                        <!--  <li>--><?php //echo __('Withdrawal request must be done during the first 7 days of each month or 16th - 20th of each month'); ?><!--</li>-->
                        <li><?php echo __('Processing time : 7-10 working days'); ?></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <?php
                if ($distributorDB->getBankAccNo() == "" || $distributorDB->getBankAccNo() == null
                    || $distributorDB->getBankName() == "" || $distributorDB->getBankName() == null
                    || $distributorDB->getBankBranch() == "" || $distributorDB->getBankBranch() == null
                    || $distributorDB->getBankAddress() == "" || $distributorDB->getBankAddress() == null
                    || $distributorDB->getBankHolderName() == "" || $distributorDB->getBankHolderName() == null
                    || $distributorDB->getFileBankPassBook() == "" || $distributorDB->getFileBankPassBook() == null
                    || $distributorDB->getFileNric() == "" || $distributorDB->getFileNric() == null) {
                    ?>
                    <td colspan="2">
                        <div class="ui-widget">
                            <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;" class="ui-state-error ui-corner-all">
                                <p style="margin: 10px"><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                                    <strong><?php echo __('You are not allowed to submit withdrawal, due to') ?> : <br><br><?php echo __('You need to update all your Bank Account Details and upload Bank Account Proof, Proof of Residence and Passport/Photo ID') ?>. <a href="<?php echo url_for("/member/viewProfile")?>" style="color: #0080c8;"><?php echo __('Update Here') ?></a></strong></p>
                            </div>
                        </div>
                    </td>
                <?php } else { ?>
                    <td colspan="2" class="pt10" align="right">
                        <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit") ?>" />
                    </td>
                <?php } ?>
            </tr>
            </tbody>
        </table>
    </form>
    <hr/>

    <h2><?php echo __("e-Wallet Withdrawal Status")?></h2>

    <script type="text/javascript" language="javascript">
        var datagrid = null;
        $(function() {
            datagrid = $("#datagrid").r9jasonDataTable({
                // online1DataTable extra params
                "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                "extraParam" : function(aoData) { // pass extra params to server
                },
                "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
                    reassignDatagridEventAttr();
                },

                // datatables params
                "bLengthChange": true,
                "bFilter": false,
                "bProcessing": true,
                "bServerSide": true,
                "bAutoWidth": false,
                "sAjaxSource": "/finance/currentWithdrawalList",
                "sPaginationType": "full_numbers",
                "aaSorting": [
                    [1,'desc']
                ],
                "aoColumns": [
                    { "sName" : "dist_id", "bVisible" : false,  "bSortable": true},
                    { "sName" : "created_on",  "bSortable": true},
                    { "sName" : "deduct",  "bSortable": true},
                    { "sName" : "amount",  "bSortable": true},
                    { "sName" : "status_code",  "bSortable": true},
                    { "sName" : "remarks",  "bSortable": true}
                ]
            });
        }); // end function

        function reassignDatagridEventAttr() {
        }

        $(document).ready(function () {
            $('#datagrid thead>tr>th').css('border-bottom', ' 2px rgba(189, 167, 102, 0.4) solid');
        });
    </script>

    <table class="table table-striped" id="datagrid" border="0" width="100%">
        <thead>
        <tr>
            <th></th>
            <th><?php echo __('Date') ?></th>
            <th><?php echo __('Withdrawal') ?></th>
            <th><?php echo __('Sub Total') ?></th>
            <th><?php echo __('Status') ?></th>
            <th><?php echo __('Remarks') ?></th>
        </tr>
        </thead>
    </table>

</td>