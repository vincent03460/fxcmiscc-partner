<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
$(function() {
    $("#topupPackageTypePaymentTypeEPoint").attr('checked', true);
    $("#topupPackageTypeSpanPaymentType").buttonset();

    $("#topup_packageType").change(function() {
        $("#topup_packageType_pointNeeded").val($("#topup_packageType").val());
        $("#packageTypeSelected").val($('#topup_packageType option:selected').attr("ref"));
    });
    $("#topupForm").validate({
        messages : {
            transactionPassword: {
                remote: "Security Password is not valid."
            }
        },
        rules : {
            "transactionPassword" : {
                required : true
                , remote: "/member/verifyTransactionPassword"
            },
            "privateInvestmentAgreement" : {
                required : true
            }
        },
        submitHandler: function(form) {
            var epoint = $('#topup_pointAvail').autoNumericGet();
            var epointPackageNeeded = $('#epointNeeded').autoNumericGet();

            if ($("#topup_pointAvail").val() == 0 || $("#topup_pointAvail").val() == "" || (parseFloat(epoint) < parseFloat(epointPackageNeeded))) {
                error("In-sufficient fund to upgrade package.");
            } else {
                if ($.trim($("#transactionPassword").val()) == "") {
                    error("Security Password is empty");
                    $("#transactionPassword").focus();
                    return false;
                }
                waiting();
                form.submit();
            }
        }
    });

    $(".activeLink").button({
        icons: {
            primary: "ui-icon-circle-arrow-n"
        }
    }).click(function(event) {
        event.preventDefault();
        var epointNeeded = $(this).attr("ref");
        var pid = $(this).attr("pid");

        if (pid >= <?php echo Globals::MAX_PACKAGE_ID?>) {
            epointNeeded = $("#specialPackageId option:selected").attr("price");
            pid = $("#specialPackageId").val();
        }

        $('#epointNeeded').val(epointNeeded);
        $('#pid').val(pid);
        $("#topupForm").submit();
    });
    /*$.ajax({
        type : 'POST',
        url : "/member/fetchTopupPackage",
        dataType : 'json',
        cache: false,
        data: {
        },
        success : function(data) {
            $.unblockUI();
            packageStrings = "";
            jQuery.each(data.package, function(key, value) {
                packageStrings += "<option value='" + value.price + "' ref='" + value.packageId + "'>" + value.name + "</option>";
            });

            $("#topup_packageType").html(packageStrings).trigger("change");

            $("#topup_pointAvail").val(data.point);
            $("#topup_ecash").val(data.ecash);
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Server connection error.");
        }
    });*/
});
</script>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Package Upgrade') ?></span></td>
    </tr>
    <tr>
        <td><br>
            <?php if ($sf_flash->has('successMsg')): ?>
                <div class="ui-widget">
                    <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
                         class="ui-state-highlight ui-corner-all">
                        <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                                      class="ui-icon ui-icon-info"></span>
                            <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
                    </div>
                </div>
                <?php endif; ?>
            <?php if ($sf_flash->has('errorMsg')): ?>
                <div class="ui-widget">
                    <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
                         class="ui-state-error ui-corner-all">
                        <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                                      class="ui-icon ui-icon-alert"></span>
                            <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
                    </div>
                </div>
                <?php endif; ?>

        </td>
    </tr>
    <tr>
        <td>
            <form action="/member/packageUpgrade" id="topupForm" name="topupForm" method="post">
            <input type="hidden" id="topup_ecash">
            <input type="hidden" id="pid" name="pid" value=""/>
            <input type="hidden" id="epointNeeded" value="0"/>
            <table cellspacing="0" cellpadding="0" class="tbl_form">
                <colgroup>
                    <col width="1%">
                    <col width="30%">
                    <col width="69%">
                    <col width="1%">
                </colgroup>
                <tbody>
                <tr>
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th colspan="2"><?php echo __('Package Upgrade') ?></th>
<!--                    <th class="tbl_content_right"></th>-->
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd" style="display: none;">
                    <td>&nbsp;</td>
                    <td><?php echo __('Package Upgrade To') ?></td>
                    <td>
                        <input type="hidden" name="packageTypeSelected" id="packageTypeSelected">
                        <select name="topup_packageType" id="topup_packageType">

                        </select>
                        <input type="text" disabled="disabled" id="topup_packageType_pointNeeded"size="10px"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('e-Point Account') ?></td>
                    <td><input type="text" readonly="readonly" id="topup_pointAvail" size="20px" value="<?php echo number_format($pointAvailable, 2); ?>"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('e-Trader Code') ?></td>
                    <td><input type="text" name="distCode" readonly="readonly" size="20px" value="<?php echo $distCode; ?>"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Ranking') ?></td>
                    <td><input type="text" readonly="readonly" size="20px" value="<?php echo $distPackage->getPackageName(); ?>"/></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td colspan="4">
                        <table class="pbl_table" border="1" cellspacing="0">
                            <tbody>
                            <tr class="pbl_header">
                                <td valign="middle"><?php echo __('Upgrade Package') ?></td>
                                <td valign="middle"><?php echo __('Membership') ?></td>
                                <td valign="middle"><?php echo __('Price') ?>(<?php echo $systemCurrency; ?>)</td>
                            </tr>
                            <?php
                                if (count($packageDBs) > 0) {
                                    $trStyle = "1";
                                    $combo = "<select name='specialPackageId' id='specialPackageId'>";
                                    foreach ($packageDBs as $packageDB) {
                                        if ($packageDB->getPackageId() >= Globals::MAX_PACKAGE_ID) {
                                            $combo .= "<option value='".$packageDB->getPackageId()."' price='".$packageDB->getPrice()."'>".number_format($packageDB->getPrice(), 0)."</option>";
                                        }
                                    }
                                    $combo .= "</select>";

                                    foreach ($packageDBs as $packageDB) {
                                        if ($packageDB->getPackageId() > Globals::MAX_PACKAGE_ID) {
                                            continue;
                                        }
                                        if ($trStyle == "1") {
                                            $trStyle = "0";
                                        } else {
                                            $trStyle = "1";
                                        }

                                        $packagePrice = number_format($packageDB->getPrice(), 2);
                                        if ($packageDB->getPackageId() == Globals::MAX_PACKAGE_ID) {
                                            $packagePrice = $combo;
                                        }
                                echo "<tr class='row" . $trStyle . "' style='height:35px'>";
                                //$pointNeeded = number_format($packageDB->getPrice() - $distPackage->getPrice(),2);
                                //$pointNeeded = number_format($packageDB->getPrice(),2);
                                $ableUpgrade = false;
                                if ($distPackage->getPrice() < $packageDB->getPrice() || $packageDB->getPackageId() >= Globals::MAX_PACKAGE_ID) {
                                    $ableUpgrade = true;
                                    echo "<td align='center'>" . link_to(__('Upgrade'), 'member/doPurchasePackage?packageId=' . $packageDB->getPackageId(), array(
                                                                                                                                            'class' => 'activeLink',
                                                                                                                                             'ref' => $pointNeeded,
                                                                                                                                                 'pid' => $packageDB->getPackageId(),
                                                                                                                                            )) . "</td>";
                                } else {
                                    echo "<td></td>";
                                }

                                echo "<td align='center'>" . __($packageDB->getPackageName()) . "</td>
                                    <td align='center'>";

                                    if ($ableUpgrade) {
                                        echo $packagePrice;
                                    } else {
                                        echo "--";
                                    }
                                echo "</td>
                                </tr>";
                                    }
                                } else {
                                    echo "<tr class='odd' align='center'><td colspan='7'>" . __('No data available in table') . "</td></tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <!--<tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php /*echo __('Payment Type'); */?></td>
                    <td>
                        <input type="radio" id="topupPackageTypePaymentTypeEPoint" name="topupPackageTypePaymentType" value="epoint"/><label for="topupPackageTypePaymentTypeEPoint"><?php /*echo __('Forex Point') */?></label>
                        <input type="radio" id="topupPackageTypePaymentTypeECash" name="topupPackageTypePaymentType" value="ecash"/><label for="topupPackageTypePaymentTypeECash"><?php /*echo __('MT4 Credit') */?></label>
                    </td>
                    <td>&nbsp;</td>
                </tr>-->

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td colspan="5">
                        <p><?php echo __('Below is the contractural terms and agreements that you are bound by as a client of SIXSTAR for signing up the package above. We recommend that you take the time to read each of them carefully.') ?></p>
                        <br>
                        <p><?php echo __('Please check the boxes below to acknowledge your acceptance, agreement and understanding of the terms and agreements.') ?></p>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            <?php if ($distDB->getProductMte() == "Y") { ?>
                <tr class="tbl_form_row_even tdMte" style="display: none">
                    <td>&nbsp;</td>
                    <td><input type="checkbox" class="checkbox" id="mteAgreement" name="mteAgreement">
                        <label for="mteAgreement"><?php echo __('MTE Agreement') ?></label></td>
                    <td colspan="3">
                        <a target="_blank" href="/download/mteAgreement"><?php echo __('Download Agreement') ?></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd tdMte" style="display: none">
                    <td>&nbsp;</td>
                    <td colspan="5">
                        <br>
                        <p><?php echo __('Please sign and send it to') ?> <a href="mailto:support@grandegoldens.com">support@grandegoldens.com</a>.</p>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            <?php } else { ?>
                <tr class="tbl_form_row_even tdFxGold">
                    <td>&nbsp;</td>
                    <td><input type="checkbox" class="checkbox" id="privateInvestmentAgreement" name="privateInvestmentAgreement">
                        <label for="privateInvestmentAgreement"><?php echo __('Private Investment Agreement') ?></label></td>
                    <td colspan="3">
                        <a target="_blank" href="/download/privateInvestmentAgreement"><?php echo __('Download Agreement') ?></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd tdFxGold">
                    <td>&nbsp;</td>
                    <td colspan="5">
                        <br>
                        <p><?php echo __('Please sign and send it to') ?> <a href="mailto:managedfund@grandegoldens.com">managedfund@grandegoldens.com</a>.</p>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            <?php } ?>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Security Password'); ?></td>
                    <td>
                        <input name="transactionPassword" type="password" id="transactionPassword"
                                           tabindex="3"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td colspan="2" align="center">
                        <font color="#dc143c"> <?php echo __('Note : Please fill up the <I>private investment agreement</I> and send to <b>managedfund@grandegoldens.com</b>') ?></font>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>

            </form>

            <div class="info_bottom_bg"></div>
            <div class="clear"></div>
            <br>
        </td>
    </tr>
    </tbody>
</table>