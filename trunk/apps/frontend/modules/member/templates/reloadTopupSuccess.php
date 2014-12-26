<?php
use_helper('I18N');
?>
<script type="text/javascript">
    $(function() {
        /*$("#cbo_topupAmount").change(function(){
            var result = parseFloat($(this).val());
            var epointBalance = $('#epointBalance').val();
            $("#convertedAmount").autoNumericSet(result);
            $("#epointBalanceDisplay").autoNumericSet(epointBalance - result);
        });*/

        $("#submitLink").click(function(event){
            event.preventDefault();
            var answer = confirm("<?php echo __('Are you sure you want to reload MT4 Funds?')?>")
            if (answer == true) {
                waiting();
                $("#withdrawForm").submit();
            }
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
                if ($("#pt2UserName").val() == "") {
                    alert("MT4 status is pending.");
                    return false;
                }
                var epointBalance = $('#epointBalance').val();
                var pt2Amount = $('#cbo_topupAmount').val();

                if (parseFloat(pt2Amount) <= 0) {
                    alert("MT4 Amount cannot be zero");
                    return false;
                }
                
                if (parseFloat(pt2Amount) > parseFloat(epointBalance)) {
                    alert("In-sufficient e-Point");
                    return false;
                }
                waiting();

                form.submit();
            }
        });
        //$("#cbo_topupAmount").trigger("change");
    });
</script>

<div class="title">
  <h1><?php echo __("Reload MT4 Funds"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Reload MT4 Funds")?></th>
          </tr>
          <tr>
            <td class="tablebg">

              <form class="form-horizontal label-left" method="post"
                    action="/member/reloadTopup"
                    data-validate="parsley"
                    id="withdrawForm" name="withdrawForm">
                
                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                  <div class="row">
                    <div class="col-sm-8">

                      <div class="control-group">
                        <label class="control-label" for="pt2UserName">
                          <?php echo __("MT4 Account")?>
                        </label>

                        <div class="controls form-group">
                          <select name="pt2UserName" id="pt2UserName" tabindex="1">
                          <?php
                          if (count($distMt4DBs) >= 1) {
                            foreach ($distMt4DBs as $distMt4DB) {
                              echo "<option value='" . $distMt4DB->getMt4UserName() . "'>" . $distMt4DB->getMt4UserName() . "</option>";
                            }
                          } else {
                            echo "<option value=''>--</option>";
                          }
                          ?>
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="epointBalanceDisplay">
                          <?php echo __("e-Point Balance")?>
                        </label>

                        <div class="controls form-group">
                          <input name="epointBalanceDisplay" type="text" id="epointBalanceDisplay" readonly="readonly" value="<?php echo $ledgerBalance; ?>"/>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="epointBalance">
                          <?php echo __("Reload MT4 Fund")?>
                        </label>

                        <div class="controls form-group">
                          <input name="epointBalance" id="epointBalance" type="hidden" value="<?php echo $ledgerBalance; ?>"/>

                          <select name="pt2Amount" id="cbo_topupAmount" tabindex="2">
                          <?php
                          for ($i = 100; $i <= 10000; $i = $i + 100) {
                            echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
                          }

                          for ($i = 20000; $i <= 50000; $i = $i + 10000) {
                            echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
                          }
                          ?>
                          </select>&nbsp;<?php echo __("USD")?>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="transactionPassword">
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
                      <!--  <ol style="background-color: #F9F2F4; color: #C7254E; list-style: decimal; padding-left: 20px;" class="help-block">-->
                      <ol class="help-block" style="list-style: decimal; padding-left: 20px;">
                        <li><?php echo __('MT4 Fund Reload will take 2 business days'); ?></li>
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
            <th colspan="2"><?php echo __("Reload MT4 Funds Status")?></th>
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
        "sAjaxSource": "/finance/reloadMT4FundList",
        "sPaginationType": "full_numbers",
        "aaSorting": [
            [1,'desc']
        ],
        "aoColumns": [
            { "sName" : "dist_id", "bVisible" : false,  "bSortable": true},
            { "sName" : "created_on",  "bSortable": true},
            { "sName" : "mt4_user_name",  "bSortable": true},
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
                  <th><?php echo __('MT4 ID') ?></th>
                  <th><?php echo __('Amount') ?></th>
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
