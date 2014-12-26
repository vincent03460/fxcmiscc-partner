<?php
use_helper('I18N');
?>
<script type="text/javascript">
$(function() {
    $("#submitLink").click(function(event){
        event.preventDefault();

        $("#transferForm").submit();
    });
    $("#btnUpload").click(function(event){
        event.preventDefault();

        $("#uploadForm").submit();
    });
    $("#btnPrint").click(function(event){
        event.preventDefault();

        var params  = 'width=891';
        params += ', scrollbars=yes';
        params += ', top=0, left=0';

        newwin = window.open("<?php echo url_for("/member/printBankInformation?q=1231j32lkhljkewrw&p=")."/";?>" + $("#purchaseId").val(),'Bank Information', params);
        if (window.focus)
        {
            newwin.focus();
        }
    });
    $("#transferForm").validate({
        messages : {
            transactionPassword: {
                remote: "<?php echo __("Security Password is not valid")?>"
            }
        },
        rules : {
            "fundAmount" : {
                required : true
            },
            "transactionPassword" : {
                required : true,
                remote: "/member/verifyTransactionPassword"
            }
        },
        submitHandler: function(form) {
            var answer = confirm("<?php echo __('Are you sure you want to funds deposit?')?>")
            if (answer == true) {
                waiting();
                var amount = $('#fundAmount').autoNumericGet();
                $("#fundAmount").val(amount);
                form.submit();
            }
        }
    });
    $('#fundAmount').autoNumeric({
        mDec: 2
    });

    $('#paymentMethod').change(function(){
        var paymentMethod = $(this).val();
        if (paymentMethod == "GOZ") {
            $("#tr_channelid").show();
        } else {
            $("#tr_channelid").hide();
        }
    });

    /*$("#dgBankReceipt").dialog("destroy");
    $("#dgBankReceipt").dialog({
        autoOpen : false,
        modal : true,
        resizable : false,
        hide: 'clip',
        show: 'slide',
        width: 700,
        height: 430,
        buttons: {
            "<?php echo __('Print') ?>": function() {
                var params  = 'width=891';
                params += ', height=637';
                params += ', top=0, left=0';

                newwin = window.open("<?php echo url_for("/member/printBankInformation?q=1231j32lkhljkewrw&p=")."/";?>" + $("#purchaseId").val(),'Bank Information', params);
                if (window.focus)
                {
                    newwin.focus();
                }
            }
            *//*, "<?php //echo __('Submit') ?>": function() {
                $("#uploadForm").submit();
            }*//*
        },
        open: function() {
        },
        close: function() {

        }
    });*/

    <?php if ($sf_flash->has('successMsg') && $pg == "N") { ?>
        $('#dgBankReceipt').modal('show');
    <?php } ?>
});
</script>

<style type="text/css">
  #datagrid th {
    vertical-align: top !important;
  }
</style>

<div class="title">
  <h1><?php echo __("Funds Deposit"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2">
              <?php echo __("Funds Deposit"); ?>
            </th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Deposit funds into your trading account today"); ?>
              <small></small>
              <br/><br/>

              <form class="form-horizontal label-left" method="post"
                    action="/member/fundsDeposit"
                    data-validate="parsley"
                    id="transferForm" name="transferForm">

                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="memberId">
                          <?php echo __("Member ID")?>
                        </label>

                        <div class="controls form-group">
                          <input name="memberId" type="text" id="memberId" placeholder="<?php echo __('Member ID'); ?>" readonly="readonly" value="<?php echo $distDB->getDistributorCode(); ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="fullname">
                          <?php echo __("Full Name")?>
                        </label>

                        <div class="controls form-group">
                          <input name="fullname" type="text" id="fullname"
                                 placeholder="<?php echo __('Full Name'); ?>" readonly="readonly" value="<?php echo $distDB->getFullname(); ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="fundAmount">
                          <?php echo __("Total Fund Deposited")?>
                        </label>

                        <div class="controls form-group">
                          <input name="fundAmount" type="text" id="fundAmount" value=""/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="paymentMethod">
                          <?php echo __("Payment Method")?>
                        </label>

                        <div class="controls form-group">
                          <select name="paymentMethod" id="paymentMethod">
                            <option value="LB"><?php echo __("Bank Transfer");?></option>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="memberId">
                          <?php echo __("Security Password")?>
                        </label>

                        <div class="controls form-group">
                          <input name="transactionPassword" type="password" id="transactionPassword"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <legend class="section">
                        <?php echo __('NOTE :'); ?>
                      </legend>
                      <!--                                <ol style="background-color: #F9F2F4; color: #C7254E; list-style: decimal; padding-left: 20px;" class="help-block">-->
                      <ol class="help-block" style="list-style: decimal; padding-left: 20px;">
                        <li><?php echo __('Funds Deposit will be credited into e-Point Account'); ?></li>
                        <li><?php echo __('e-Point Account is ONLY for package purchase, package upgrade, MT4 account reload and is NON-WITHDRAWABLE'); ?></li>
                        <li><?php echo $systemCurrency?> <?php echo __('1 equals to 1 value of e-Point'); ?></li>
                      </ol>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="submitLink" class="btn btn-danger"><?php echo __("Submit");?></button>
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
            <th colspan="2">
              <?php echo __('Funds Deposit History') ?>
            </th>
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
        "sAjaxSource": "/finance/epointPurchaseHistoryList",
        "sPaginationType": "full_numbers",
        "aaSorting": [
            [1,'desc']
        ],
        "aoColumns": [
            { "sName" : "purchase_id", "bVisible" : false,  "bSortable": true},
            { "sName" : "created_on",  "bSortable": true},
            { "sName" : "amount",  "bSortable": true},
            { "sName" : "payment_reference",  "bSortable": true},
            { "sName" : "status_code",  "bSortable": true},
            { "sName" : "remarks",  "bSortable": true},
            { "sName" : "image_src",  "bSortable": false, "fnRender": function ( oObj ) {
                $("#dgBankReceipt").data("data_" + oObj.aData[0], {
                    purchase_id : oObj.aData[0]
                    , created_on : oObj.aData[1]
                    , amount : oObj.aData[2]
                    , payment_reference : oObj.aData[3]
                    , status_code : oObj.aData[4]
                    , remarks : oObj.aData[5]
                    , image_src : oObj.aData[6]
                    , bank_id : oObj.aData[7]
                });
                return "<img src='" + oObj.aData[6] + "' style='display:none'><a class='detailLink' ref='" + oObj.aData[0] + "' href='#' data-toggle='modal' data-target='#dgBankReceipt'><?php echo __("Details"); ?></a>";
            }},
            { "sName" : "bank_id", "bVisible" : false,  "bSortable": true}
        ]
    });

    function reassignDatagridEventAttr() {
        $(".detailLink").click(function(event) {
            event.preventDefault();
            var data = $("#dgBankReceipt").data("data_" + $(this).attr("ref"));
            $("#depositAmountSpan").html(data.amount);
            $("#paymentReferenceSpan").html(data.payment_reference);
            $("#purchaseId").val(data.purchase_id);
            $("#fancyImageLink").attr("href", data.image_src);
            $("#fancyImageImg").attr("src", data.image_src);

            $("#bankId").val(data.bank_id).change();
            $("#dgBankReceipt").dialog("open");
        });
    }

    $("#uploadForm").validate({
        messages : {
            uploadTransactionPassword: {
                remote: "<?php echo __("Security Password is not valid")?>"
            }
        },
        rules : {
            /*"bankSlip" : {
                required : true
                , accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            },*/
            "transactionPassword" : {
                required : true,
                remote: "/member/verifyTransactionPassword"
            }
        },
        submitHandler: function(form) {
            var answer = confirm("<?php echo __('Are you sure you want to upload Bank Slip?')?>")
            if (answer == true) {
                waiting();
                form.submit();
            }
        }
    });

    $("#bankId").on("change", function() {
        $("#bankSwiftCodeText").html($("#bankId option:selected").attr("bankSwiftCodeText"));
        $("#ibanText").html($("#bankId option:selected").attr("ibanText"));
        $("#bankAccountHolderText").html($("#bankId option:selected").attr("bankAccountHolderText"));
        $("#bankAccountNumberText").html($("#bankId option:selected").attr("bankAccountNumberText"));
        $("#cityOfBankText").html($("#bankId option:selected").attr("cityOfBankText"));
        $("#countryOfBankText").html($("#bankId option:selected").attr("countryOfBankText"));
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
                  <th style="background: none;">&nbsp;</th>
                  <th><?php echo __('Date') ?></th>
                  <th><?php echo __('Funds Deposit') ?></th>
                  <th><?php echo __('Reference No') ?></th>
                  <th><?php echo __('Status') ?></th>
                  <th><?php echo __('Remarks') ?></th>
                  <th style="background: none;">&nbsp;</th>
                  <th style="background: none;">&nbsp;</th>
                </tr>
                </thead>
              </table>
              <br/><br/>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>

<div id="dgBankReceipt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2"><?php echo __('Bank Information Detail') ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_tag('member/uploadBankReceipt', array("enctype" => "multipart/form-data", "id" => "uploadForm")) ?>
                <input type="hidden" id="purchaseId" name="purchaseId" value="<?php echo $sf_flash->get('purchaseId'); ?>">

                <?php echo $sf_flash->get('successMsg') ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Deposit Amount'); ?>
                            </label>

                            <div class="controls form-group">
                                <?php echo $systemCurrency." "; ?>
                                <span id="depositAmountSpan" style="color: red">
                                    <?php echo $sf_flash->get('amount'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Trading Currency on MT4'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo "USD"; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Bank Name'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo $bankName; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Bank Swift Code'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo $bankSwiftCode; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Bank Account Holder'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo $bankAccountHolder; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Bank Account Number'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo $bankAccountNumber; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('BSB'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo $iban; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('City of Bank'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo $cityOfBank; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Country of Bank'); ?>
                            </label>

                            <div class="controls form-group" style="color: red">
                                <?php echo $countryOfBank; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Payment Reference'); ?><br><span id="paymentReferenceSpan" style="color: red"><?php echo $sf_flash->get('paymentReference'); ?></span>
                            </label>

                            <legend class="section">
                                <?php echo __('NOTE :'); ?>
                            </legend>
                            <ol style="background-color: #F9F2F4; color: #C7254E; list-style: decimal; padding-left: 20px;" class="help-block">
                                <li><?php echo __('you must present this Payment Reference when making payment to the bank. THis PAYMENT REFERENCE NUMBER must be placed in the section where it says CAR NO. whenever it is applicable.') ?></li>
                            </ol>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Upload Bank Receipt'); ?>
                            </label>

                            <div class="controls form-group">
                                <?php echo input_file_tag('fileNew', array("id" => "bankSlip", "name" => "bankSlip")); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="memberId">
                            <?php echo __('Security Password'); ?>
                            </label>

                            <div class="controls form-group">
                                <input name="transactionPassword" id="uploadTransactionPassword" type="password"/>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close') ?></button>
                <button type="button" class="btn btn-warning" id="btnPrint"><?php echo __('Print') ?></button>
                <button type="button" class="btn btn-primary" id="btnUpload"><?php echo __('Upload Bank Slip') ?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>