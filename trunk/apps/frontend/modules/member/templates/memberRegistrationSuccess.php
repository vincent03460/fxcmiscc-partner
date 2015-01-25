<?php
use_helper('I18N');
?>
<script type="text/javascript">
    $(function() {
        $("#topupForm").validate({
            messages : {
                transactionPassword: {
                    remote: "<?php echo __("Security Password is not valid")?>"
                }
            },
            rules : {

            },
            submitHandler: function(form) {
                if ($('#agreement').is(':checked') == false) {
                    error("Please accept the Private Investment Agreement!");
                    return false;
                }

                var radioId = $('input:radio[name=radio_packageId]:checked').val();
                $("#list option[value='2']").text();
                //$('#formattedTextField').autoNumericSet($('#specialPackageId_' + packageId).val());
                //console.log("packageId", packageId);
                var packageId = $('#specialPackageId_' + radioId).val();
                var pointPackageDisplay = $('#specialPackageId_' + radioId + " option[value='" + packageId + "']").text();
                $("#formattedTextField").val(pointPackageDisplay);
                var pointPackageNeeded = $("#formattedTextField").autoNumericGet();
                var pointAvail = parseFloat($('#epointAvailable').autoNumericGet());
                var promoAvailable = parseFloat($('#promoAvailable').autoNumericGet());
                var epoint = parseFloat($('#ePointPaid').autoNumericGet());
                var promo = parseFloat($('#promoPaid').autoNumericGet());
                var epointEcashPaid = epoint + promo;
                $("#packageId").val(packageId);
//            console.log("pointAvail", pointAvail);
//            console.log("pointPackageNeeded", pointPackageNeeded);
//            console.log("pointPackageDisplay", pointPackageDisplay);
                var sure = confirm("<?php echo __('Are you sure want to purchase this package')?> " + pointPackageDisplay + "?");
                if (sure) {
                    if (epointEcashPaid == 0 || epointEcashPaid == "" || parseFloat(epointEcashPaid) < (parseFloat(pointPackageNeeded))) {
                        error("<?php echo __("In-sufficient fund to purchase package");?>");
                    } else if ((pointPackageNeeded * 0.7) > epoint) {
                        error("<?php echo __("Minimum RP Wallet required is ");?>" + (pointPackageNeeded * 0.7));
                    } else if (parseFloat(epointEcashPaid) > (parseFloat(pointPackageNeeded))) {
                        error("<?php echo __("The total funds is not match with package price");?>");
                    }   else if (parseFloat(promoAvailable) < (parseFloat(promo))) {
                        error("<?php echo __("In-sufficient EP Wallet");?>");
                    } else {
                        waiting();
                        form.submit();
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

<td valign="top">
    <input type="hidden" id="formattedTextField">

	<?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <form class="form-horizontal"
          method="post"
          action="/member/memberRegistration2"
          data-validate="parsley"
          id="topupForm"
          name="topupForm"
          style="width: 800px;">

        <input type="hidden" name="packageId" id="packageId">

        <h2><?php echo __("Member Registration"); ?></h2>
        <i><?php echo __("Member Registration - Step 1"); ?></i>

        <br><br>

        <h3><?php echo __("Package Purchase"); ?></h3>

        <table cellpadding="7" cellspacing="1" width="500px;">
            <tbody>
            <tr>
                <th>
                    <label class="control-label">
                        <?php echo __("RP Wallet")?>
                    </label>
                </th>
                <td>
                    <strong><?php echo number_format($pointAvailable, 2); ?><input type="hidden" id="epointAvailable" value="<?php echo number_format($pointAvailable, 2); ?>"></strong>
                </td>
            </tr>
            
            <tr>
                <th>
                    <label class="control-label">
                        <?php echo __("EP Wallet")?>
                    </label>
                </th>
                <td>
                    <strong><?php echo number_format($promoAvailable, 2); ?><input type="hidden" id="promoAvailable" value="<?php echo number_format($pointAvailable, 2); ?>"></strong>
                </td>
            </tr>
            </tbody>
        </table>

        <hr>

        <table cellpadding="7" cellspacing="1" width="470px;">
            <thead>
            <tr>
                <th class="tblabel">#</th>
                <th class="tblabel"><?php echo __('Join Package') ?></th>
                <th class="tblabel"><?php echo __('Price') ?>(<?php echo $systemCurrency; ?>)</th>
            </tr>
            </thead>
            <tbody>
            <?php $checkString = "checked='checked'";

            if (count($packageDBs) > 0) {
                $idx = 1;
                $packageName = "";
                $combo = "";

                foreach ($packageDBs as $packageDB) {
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
            } else
            {
                echo "<tr class='odd' align='center'><td class='tb' colspan='4'>" . __('No data available in table') . "</td></tr>";
            }?>
            </tbody>
        </table>

        <hr>

        <table cellpadding="7" cellspacing="1" width="500px;">
            <tr>
                <th>
                    <label class="control-label">
                        <?php echo __("Paid by RP Wallet")?>
                    </label>
                </th>
                <td>
                    <select id="ePointPaid" name="ePointPaid" style="text-align: right" style="width:150px; text-align:right" class="packageSelect">
                        <?php for ($i = 0; $i <= $pointAvailable; $i += 100) {
                        echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
                    }?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <th>
                    <label class="control-label">
                        <?php echo __("Paid by EP Wallet")?>
                    </label>
                </th>
                <td>
                    <select id="promoPaid" name="promoPaid" style="text-align: right" style="width:150px; text-align:right" class="packageSelect">
                        <?php for ($i = 0; $i <= $promoAvailable; $i += 100) {
                        echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
                    } ?>
                    </select>
                </td>
            </tr>
        </table>
        <div style="margin-top:5px;">
            <input type="checkbox" name="agreement" id="agreement"><label
            for="agreement">
            &nbsp;<?php echo __("Private Investment Agreement")?></label>&nbsp;&nbsp;&nbsp;<a
            target="_blank"
            href="/uploads/agreements/agreement.pdf"><?php echo __('Download PDF') ?>
            (643kb)</a>
        </div>
        <div class="pt10" align="right">
            <input type="submit" id="btnSubmit" class="btn btn-danger">
            <i class="icon-ok bigger-110"></i>
        </div>
        </input>
    </form>
</td>
