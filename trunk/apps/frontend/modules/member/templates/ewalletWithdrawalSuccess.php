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

<div class="title">
  <h1><?php echo __("e-Wallet Withdrawal"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("e-Wallet Withdrawal")?></th>
          </tr>
          <tr>
            <td class="tablebg">

              <form class="form-horizontal label-left" method="post"
                    action="/member/ewalletWithdrawal"
                    data-validate="parsley"
                    id="withdrawForm" name="withdrawForm">
                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="ecashBalance">
                          <?php echo __("e-Wallet Balance")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" name="ecashBalance" id="ecashBalance" disabled="disabled" placeholder="<?php echo __('e-Wallet Balance'); ?>" class="form-control" value="<?php echo number_format($ledgerAccountBalance, 2); ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="cbo_ecashAmount">
                          <?php echo __("Withdrawal Amount")?>
                        </label>

                        <div class="controls form-group">
                          <select name="ecashAmount" id="cbo_ecashAmount" class="form-control">
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                            <option value="700">700</option>
                            <option value="800">800</option>
                            <option value="900">900</option>
                            <option value="1000">1,000</option>
                            <option value="1100">1,100</option>
                            <option value="1200">1,200</option>
                            <option value="1300">1,300</option>
                            <option value="1400">1,400</option>
                            <option value="1500">1,500</option>
                            <option value="1600">1,600</option>
                            <option value="1700">1,700</option>
                            <option value="1800">1,800</option>
                            <option value="1900">1,900</option>
                            <option value="2000">2,000</option>
                            <option value="2500">2,500</option>
                            <option value="3000">3,000</option>
                            <option value="3500">3,500</option>
                            <option value="4000">4,000</option>
                            <option value="4500">4,500</option>
                            <option value="5000">5,000</option>
                            <?php
                            for ($i = 6000; $i <= 100000; $i = $i + 1000) {
                              echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="ecashFinal">
                          <?php echo __("Sub Total (added handling fee)")?>
                        </label>

                        <div class="controls form-group">
                          <input name="ecashFinal" type="text" id="ecashFinal" readonly="readonly" class="form-control"/>
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
                  <div class="row">
                    <div class="col-sm-12">
                      <legend class="section">
                        <?php echo __('NOTE :'); ?>
                      </legend>
                      <!--  <ol style="background-color: #F9F2F4; color: #C7254E; list-style: decimal; padding-left: 20px;" class="help-block">-->
                      <ol class="help-block" style="list-style: decimal; padding-left: 20px;">
                        <li><?php echo __('Minimum withdrawal amount : USD 100'); ?></li>
                        <li><?php echo __('Handling fee USD50 or 5% whichever is higher'); ?></li>
                        <!--  <li>--><?php //echo __('Withdrawal request must be done during the first 7 days of each month or 16th - 20th of each month'); ?><!--</li>-->
                        <li><?php echo __('Processing time : 3-5 working days'); ?></li>
                      </ol>
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
            <th colspan="2"><?php echo __("e-Wallet Withdrawal Status")?></th>
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
              <br/><br/>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
