<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
    $(function() {
        $("#btnSubmit").click(function() {
            $("#convertForm").submit();
        });
        $('#convertAmount').autoNumeric({
            mDec: 2
        });
        $("#convertForm").validate({
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
                var convertAmount = parseFloat($('#convertAmount').autoNumericGet());
                var ewalletBalance = parseFloat($('#ewalletBalance').autoNumericGet());
                var degoldAccountBalance = parseFloat($('#degoldAccountBalance').autoNumericGet());
                var passiveAccountBalance = parseFloat($('#passiveAccountBalance').autoNumericGet());
                var doAction = $("#doAction").val();

                if (doAction == "CURRENT_TO_EWALLET") {
                    if (convertAmount > degoldAccountBalance) {
                        error("In-sufficient funds from Degold Wallet");
                        return false;
                    }
                } else if (doAction == "PASSIVE_TO_EWALLET") {
                    if (convertAmount > passiveAccountBalance) {
                        error("In-sufficient funds from Passive Wallet");
                        return false;
                    }
                }
                $('#convertAmount').val($('#convertAmount').autoNumericGet());
                form.submit();
            }
        });
    });
</script>


<div class="title">
    <h1><?php echo __("Account Conversion"); ?></h1>
</div>
<div class="table">
    <table cellpadding="0" cellspacing="10" width="100%">
        <tr>
            <td width="100%">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <th colspan="2"><?php echo __("Account Balance")?></th>
                    </tr>
                    <tr>
                        <td class="tablebg">

                            <form class="form-horizontal label-left" method="post"
                                  action="/member/accountConversion"
                                  data-validate="parsley"
                                  id="convertForm" name="convertForm">

                                <fieldset>
                                    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="control-group">
                                                <label class="control-label" for="degoldAccountBalance">
                                                    <?php echo __("Degold Balance")?>
                                                </label>

                                                <div class="controls form-group">
                                                    <input type="text" style="text-align: right;"
                                                           name="degoldAccountBalance" id="degoldAccountBalance"
                                                           disabled="disabled"
                                                           placeholder="<?php echo __('Degold Balance'); ?>"
                                                           class="form-control"
                                                           value="<?php echo number_format($degoldAccountBalance, 2); ?>"/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="passiveAccountBalance">
                                                    <?php echo __("Passive Account Balance")?>
                                                </label>

                                                <div class="controls form-group">
                                                    <input type="text" style="text-align: right;"
                                                           name="passiveAccountBalance" id="passiveAccountBalance"
                                                           disabled="disabled"
                                                           placeholder="<?php echo __('Passive Account Balance'); ?>"
                                                           class="form-control"
                                                           value="<?php echo number_format($passiveAccountBalance, 2); ?>"/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="ewalletBalance">
                                                    <?php echo __("e-Wallet Balance")?>
                                                </label>

                                                <div class="controls form-group">
                                                    <input type="text" style="text-align: right;" name="ewalletBalance"
                                                           id="ewalletBalance" disabled="disabled"
                                                           placeholder="<?php echo __('e-Wallet Balance'); ?>"
                                                           class="form-control"
                                                           value="<?php echo number_format($ecashAccountBalance, 2); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <legend class="section">
                                        <?php echo __("Account Conversion")?>
                                    </legend>
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <div class="control-group">
                                                <label class="control-label" for="transactionPassword">
                                                    <?php echo __("Conversion method")?>
                                                </label>

                                                <div class="controls form-group">
                                                    <select id="doAction" name="doAction" class="form-control">
                                                        <option value="CURRENT_TO_EWALLET"><?php echo __("Convert Degold to e-Wallet")?></option>
                                                        <option value="PASSIVE_TO_EWALLET"><?php echo __("Convert Passive to e-Wallet")?></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="convertAmount">
                                                    <?php echo __("Conversion Amount")?>
                                                </label>

                                                <div class="controls form-group">
                                                    <input name="convertAmount" type="text" id="convertAmount"
                                                           class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="transactionPassword">
                                                    <?php echo __("Security Password")?>
                                                </label>

                                                <div class="controls form-group">
                                                    <input name="transactionPassword" type="password"
                                                           id="transactionPassword" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="row">
                      <div class="col-sm-12">
                          <legend class="section">
                              <?php /*echo __('NOTE :'); */?>
                          </legend>
                          <ol class="help-block" style="list-style: decimal; padding-left: 20px;">
                              <li><?php /*echo __('e-Point is ONLY for package purchase, reinvest package and is NON-WITHDRAWAL'); */?></li>
                          </ol>
                      </div>
                  </div>-->
                                </fieldset>
                                <div class="form-actions">
                                    <button type="button" id="btnSubmit"
                                            class="btn btn-danger"><?php echo __("Submit");?></button>
                                    <a href="/member/summary" class="btn btn-default"><?php echo __("Cancel");?></a>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <th colspan="2"><?php echo __("Account Conversion History")?></th>
                    </tr>
                    <tr>
                        <td class="tablebg">

                            <script type="text/javascript" language="javascript">
                                var datagrid = null;
                                $(function() {
                                    datagrid = $("#datagrid").r9jasonDataTable({
                                        // online1DataTable extra params
                                        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                                        "extraParam" : function(aoData) { // pass extra params to server
                                            //aoData.push({ "name": "filterAction", "value": "CONVERT" });
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
                                        "sAjaxSource": "/finance/convertLogList",
                                        "sPaginationType": "full_numbers",
                                        "aaSorting": [
                                            [0,'desc']
                                        ],
                                        "aoColumns": [
                                            { "sName" : "created_on",  "bSortable": true},
                                            { "sName" : "transaction_type",  "bSortable": true},
                                            { "sName" : "credit", "bVisible" : true,  "bSortable": true},
                                            { "sName" : "debit",  "bSortable": true},
                                            { "sName" : "balance",  "bSortable": true},
                                            { "sName" : "remark",  "bSortable": true}
                                        ]
                                    });
                                }); // end function

                                function reassignDatagridEventAttr() {
                                    $("a[id=editLink]").click(function(event) {

                                    });
                                }

                                $(document).ready(function () {
                                    $('#datagrid thead>tr>th').css('border-bottom', ' 2px rgba(189, 167, 102, 0.4) solid');
                                });
                            </script>

                            <table class="table table-striped" id="datagrid" border="0" width="100%">
                                <thead>
                                <tr>
                                    <th><?php echo __('Date') ?></th>
                                    <th><?php echo __('Transaction Type') ?></th>
                                    <th><?php echo __('In') ?></th>
                                    <th><?php echo __('Out') ?></th>
                                    <th><?php echo __('Balance') ?></th>
                                    <th><?php echo __('Remarks') ?></th>
                                </tr>
                                </thead>
                            </table>
                            <br/>
                            <br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
