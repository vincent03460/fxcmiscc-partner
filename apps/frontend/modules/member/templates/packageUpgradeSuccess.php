<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
$(function() {
    $("#topupForm").validate({
        messages : {
            transactionPassword: {
                remote: "Security Password is not valid."
            }
        },
        rules : {

        },
        submitHandler: function(form) {
            var radioId = $('input:radio[name=radio_packageId]:checked').val();
            $("#list option[value='2']").text()
            //$('#formattedTextField').autoNumericSet($('#specialPackageId_' + packageId).val());
            //console.log("packageId", packageId);
            var packageId = $('#specialPackageId_' + radioId).val();
            var pointPackageDisplay = $('#specialPackageId_' + radioId + " option[value='" + packageId + "']").text();
            $("#formattedTextField").val(pointPackageDisplay);
            var pointPackageNeeded = $("#formattedTextField").autoNumericGet();
            var pointAvail = parseFloat($('#epointAvailable').autoNumericGet());
            var ecashAvail = parseFloat($('#ecashAvailable').autoNumericGet());
            var promoAvailable = parseFloat($('#promoAvailable').autoNumericGet());
            var epoint = parseFloat($('#ePointPaid').autoNumericGet());
            var ecash = parseFloat($('#eCashPaid').autoNumericGet());
            var promo = parseFloat($('#promoPaid').autoNumericGet());
            var epointEcashPaid = epoint + ecash + promo;
            $("#packageId").val(packageId);

            var sure = confirm("<?php echo __('Are you sure want to upgrade this package')?> " + pointPackageDisplay + "?");
            if (sure) {
                var registerFee = <?php echo Globals::REGISTER_FEE;?>;
                    sure = confirm("<?php echo __('You need to pay for register fee')?> " + registerFee + " (<?php echo __('e-Point')?>).");
                    if (sure) {
                        if (epointEcashPaid == 0 || epointEcashPaid == "" || parseFloat(epointEcashPaid) < (parseFloat(pointPackageNeeded))) {
                            error("<?php echo __("In-sufficient fund to upgrade package");?>");
                        } else if ((pointPackageNeeded / 2) > epoint) {
                            error("<?php echo __("Minimum e-Point required is ");?>" + (pointPackageNeeded / 2));
                        } else if (parseFloat(epointEcashPaid) > (parseFloat(pointPackageNeeded))) {
                            error("<?php echo __("The total funds is not match with package price");?>");
                        }  else if (parseFloat(pointAvail) < (parseFloat(epoint) + registerFee)) {
                            /*error("<?php echo __("In-sufficient e-Point to pay for register fee");?>" + pointAvail + "," + epoint + "," + registerFee);*/
                            error("<?php echo __("In-sufficient e-Point to pay for register fee");?>");
                        }  else if (parseFloat(ecashAvail) < (parseFloat(ecash))) {
                            error("<?php echo __("In-sufficient e-Wallet");?>");
                        }   else if (parseFloat(promoAvailable) < (parseFloat(promo))) {
                            error("<?php echo __("In-sufficient Promo Wallet");?>");
                        } else {
                            waiting();
                            form.submit();
                        }
                    }
            }
        }
    });

    $(".packageSelect").change(function(event) {
        event.preventDefault();

        var packageNameArr = $(this).attr("id").split("_");
        var packageName = packageNameArr[1];
        $("#packageId_" + packageName).prop('checked', true);
    });
    $("#btnSubmit").click(function(event) {
        event.preventDefault();

        $("#topupForm").submit();
    });
});
</script>

<input type="hidden" id="formattedTextField">

<div class="title">
  <h1><?php echo __("Package Upgrade"); ?></h1>
</div>

<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2">
              <?php echo __("Package Upgrade")?>
            </th>
          </tr>
          <tr>
            <td class="tablebg">
<!--              <i class="icon-ok-sign"></i>-->
<!--              --><?php //echo __("Package Upgrade"); ?>
<!--              <small></small>-->
<!--              <br/><br/>-->

              <form class="form-horizontal label-left" method="post"
                    action="/member/packageUpgrade"
                    data-validate="parsley"
                    id="topupForm" name="topupForm">

                <input type="hidden" name="packageId" id="packageId">
                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label">
                          <?php echo __("e-Point Account")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" readonly="readonly" id="epointAvailable" name="epointAvailable" value="<?php echo number_format($pointAvailable, 2); ?>" class="form-control">
                        </div>
                      </div><div class="control-group">
                        <label class="control-label">
                          <?php echo __("e-Wallet Account")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" readonly="readonly" id="ecashAvailable" name="ecashAvailable" value="<?php echo number_format($ecashAvailable, 2); ?>" class="form-control">
                        </div>
                      </div><div class="control-group">
                        <label class="control-label">
                          <?php echo __("Promo Account")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" readonly="readonly" id="promoAvailable" name="promoAvailable" value="<?php echo number_format($promoAvailable, 2); ?>" class="form-control">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">
                          <?php echo __("MT4 Rank")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" readonly="readonly" size="20px" value="<?php echo __($distPackage->getPackageName()); ?>"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th class="tblabel">#</th>
                          <th class="tblabel"><?php echo __('Upgrade Package') ?></th>
                          <th class="tblabel"><?php echo __('Price') ?>(<?php echo $systemCurrency; ?>)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $checkString = "checked='checked'";
                        if (count($packageDBs) > 0 && $distDB->getMt4RankId() < 10) {
                          $idx = 1;
                          $packageName = "";
                          $combo = "";

                          foreach ($packageDBs as $packageDB) {
                            if ($distPackage->getPrice() >= $packageDB->getPrice()) {
                              continue;
                            }

                            if ($packageName != $packageDB->getPackageName()) {
                              if ($packageName != "") {
                                echo "<tr>
                                  <td class='tb' align='center'>" . $idx . "</td>
                                  <td class='tb' align='left'><label class='radio'>
                                  <input class='iCheck' type='radio' id='packageId_" . $idx . "' value='" . $idx . "' name='radio_packageId' " . $checkString . ">" . __($packageName) . "</label></td>
                                  <td class='tb' align='center'>" . $combo . "</td>
                                  </tr>";
                                $checkString = "";
                                $idx++;
                              }

                              $combo = "<select style='width:150px; text-align:right' class='packageSelect' name='specialPackageId_" . $idx . "' id='specialPackageId_" . $idx . "'>";
                              $packagePrice = $packageDB->getPrice();
                              $combo .= "<option value='" . $packageDB->getPackageId() . "'>" . number_format($packagePrice, 0) . "</option>";
                            } else {
                              $packagePrice = $packageDB->getPrice();
                              $combo .= "<option value='" . $packageDB->getPackageId() . "'>" . number_format($packagePrice, 0) . "</option>";
                              continue;
                            }

                            $packageName = $packageDB->getPackageName();
                          }

                          $combo .= "</select>";
                          echo "<tr>
                              <td class='tb' align='center'>" . $idx . "</td>
                              <td class='tb' align='left'><label class='radio'>
                              <input class='iCheck' type='radio' class='packageSelect' id='packageId_" . $idx . "' value='" . $idx . "' name='radio_packageId' " . $checkString . ">" . __($packageName) . "</label></td>
                              <td class='tb' align='center'>" . $combo . "</td>
                              </tr>";
                          $idx++;
                        } else {
                          echo "<tr class='odd' align='center'><td class='tb' colspan='4'>" . __('No data available in table') . "</td></tr>";
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                        <div class="control-group">
                            <label class="control-label">
                                <?php echo __("Paid by e-Point")?>
                            </label>

                            <div class="controls form-group">
                                <select id="ePointPaid" name="ePointPaid"
                                        style="width:100px; text-align: right">
<?php
      for ($i = 0; $i <= $pointAvailable; $i += 100) {
echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
}
?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="control-group">
                            <label class="control-label">
                                <?php echo __("Paid by e-Wallet")?>
                            </label>

                            <div class="controls form-group">
                                <select id="eCashPaid" name="eCashPaid"
                                        style="width:100px; text-align: right">
<?php
      for ($i = 0; $i <= $ecashAvailable; $i += 100) {
echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
}
?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="control-group">
                            <label class="control-label">
                                <?php echo __("Paid by Promo Wallet")?>
                            </label>

                            <div class="controls form-group">
                                <select id="promoPaid" name="promoPaid"
                                        style="width:100px; text-align: right">
<?php
      for ($i = 0; $i <= $promoAvailable; $i += 100) {
echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
}
?>
                                </select>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
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
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="btnSubmit" class="btn btn-danger">
                    <i class="icon-ok bigger-110"></i>
                    <?php echo __("Submit");?>
                  </button>
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
              <?php echo __("Package Upgrade History")?>
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
        "sAjaxSource": "/finance/packageUpgradeList",
        "sPaginationType": "full_numbers",
        "aaSorting": [
            [1,'desc']
        ],
        "aoColumns": [
            { "sName" : "dist_id", "bVisible" : false,  "bSortable": true},
            { "sName" : "created_on",  "bSortable": true},
            { "sName" : "transaction_code",  "bSortable": true},
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

              <table class="table" id="datagrid" style="border: 0px none; width: 100%;">
                <thead>
                <tr>
                  <th></th>
                  <th><?php echo __('Date') ?></th>
                  <th><?php echo __('Transaction Code') ?></th>
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
