<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
    $(function() {
        $("#btnSubmit").click(function(){
            $("#transferForm").submit();
        });
        $("#transferForm").validate({
            messages : {
                transactionPassword: {
                    remote: "Security Password is not valid."
                }
            },
            rules : {
                "sponsorId" : {
                    required: true
                    //, minlength : 8
                },
                "ecashAmount" : {
                    required : true
                },
                "transactionPassword" : {
                    required : true,
                    remote: "/member/verifyTransactionPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                var amount = $('#ecashAmount').autoNumericGet();
                var epointBalance = $('#epointBalance').autoNumericGet();
                //console.log(amount);
                //console.log(epointBalance);
                if (parseFloat(epointBalance) < (parseFloat(amount) + parseFloat($("#processFee").val()))) {
                    alert("<?php echo __("In-sufficient e-Wallet")?>");
                    return false;
                }

                $("#ecashAmount").val(amount);
                form.submit();
            }
        });

        $("#sponsorId").change(function() {
            if ($.trim($('#sponsorId').val()) != "") {
                verifySponsorId();
            }
        });

        $('#ecashAmount').autoNumeric({
            mDec: 2
        });
    });

    function verifySponsorId() {
        waiting();
        $.ajax({
            type : 'POST',
            url : "/member/verifySameGroupSponsorId",
            dataType : 'json',
            cache: false,
            data: {
                sponsorId : $('#sponsorId').val()
            },
            success : function(data) {
                if (data == null || data == "") {
                    error("<?php echo __("Invalid username.")?>");
                    $('#sponsorId').focus();
                    $("#sponsorName").html("");
                } else {
                    $.unblockUI();
                    $("#sponsorName").html(data.fullname);
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Your login attempt was not successful. Please try again.");
            }
        });
    }
</script>

<div class="title">
  <h1><?php echo __("e-Wallet Transfer"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("e-Wallet Transfer")?></th>
          </tr>
          <tr>
            <td class="tablebg">

              <form class="form-horizontal label-left" method="post"
                    action="/member/transferEcash"
                    data-validate="parsley"
                    id="transferForm" name="transferForm">

                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("Transfer To Trader ID")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" name="sponsorId" id="sponsorId" class="form-control" value=""/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="sponsorName">
                          <?php echo __("Trader Name")?>
                        </label>

                        <div class="controls form-group">
                          <strong><span id="sponsorName"></span></strong>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="ecashFinal">
                          <?php echo __("e-Wallet Balance")?>
                        </label>

                        <div class="controls form-group">
                          <input name="epointBalance" type="text" id="epointBalance" readonly="readonly" value="<?php echo number_format($ledgerAccountBalance, 2); ?>" class="form-control"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="ecashAmount">
                          <?php echo __("Transfer e-Wallet Amount")?>
                        </label>

                        <div class="controls form-group">
                          <input name="ecashAmount" type="text" id="ecashAmount" class="form-control"/>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="transactionPassword">
                          <?php echo __("Security Password")?>
                        </label>

                        <div class="controls form-group">
                          <input name="transactionPassword" type="password" id="transactionPassword" class="form-control"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="btnSubmit" class="btn btn-danger"><?php echo __("Submit");?></button>
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
            <th colspan="2"><?php echo __("e-Wallet Transfer History")?></th>
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
            aoData.push({ "name": "filterAction", "value": "TRANSFER TO" });
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
        "sAjaxSource": "/finance/ecashLogList",
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
