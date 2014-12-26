<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
$(function() {
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

            if ($("#topup_pointAvail").val() == 0 || $("#topup_pointAvail").val() == "" || parseFloat(epoint) < parseFloat(epointPackageNeeded)) {
                error("In-sufficient fund to upgrade package.");
            } else {
                if ($.trim($("#transactionPassword").val()) == "") {
                    error("Security Password is empty");
                    $("#transactionPassword").focus();
                    return false;
                }
                waiting();
                $.ajax({
                    type : 'POST',
                    url : "/member/activateMember",
                    dataType : 'json',
                    cache: false,
                    data: {
                        packageId : $('#pid').val()
                        , transactionPassword : $('#transactionPassword').val()
                        , sponsorId : $('#distributorId').val()
                    },
                    success : function(data) {
                        if (data.error == false) {
                            $.unblockUI();
                            var sure = confirm("<?php echo __('Member activated successfully.').'\n'.__('Do you want to proceed to member placement?') ?>");
                            if (sure) {
                                window.location = "<?php echo url_for('/member/placementTree') ?>";
                            } else {
                                window.location = "<?php echo url_for('/member/summary') ?>";
                            }
                        } else {
                            alert(data.errorMsg);
                            $("#transactionPassword").focus().select();
                        }
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Server connection error.");
                    }
                });
            }
        }
    });
    $(".activeLink").button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    }).click(function(event) {
        event.preventDefault();
        var epointNeeded = $(this).attr("ref");
        var pid = $(this).attr("pid");
        $('#epointNeeded').val(epointNeeded);
        $('#pid').val(pid);
        $("#topupForm").submit();
    });
});
</script>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Package Purchase') ?></span></td>
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
            <form action="/member/doPurchasePackage" id="topupForm" name="topupForm" method="post">
            <input type="hidden" id="distributorId" name="distributorId" value="<?php echo $pendingDistDB->getDistributorId(); ?>"/>
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
                    <th colspan="2"><?php echo __('Package Purchase') ?></th>
<!--                    <th class="tbl_content_right"></th>-->
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Member ID') ?></td>
                    <td><input type="text" readonly="readonly" id="distributorCode" size="20px" value="<?php echo $pendingDistDB->getDistributorCode(); ?>"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Full Name') ?></td>
                    <td><input type="text" readonly="readonly" id="fullname" size="20px" value="<?php echo $pendingDistDB->getFullName(); ?>"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Registered Time') ?></td>
                    <td><input type="text" readonly="readonly" id="registeredTime" size="20px" value="<?php echo $pendingDistDB->getCreatedOn(); ?>"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('e-Point Account') ?></td>
                    <td><input type="text" readonly="readonly" id="topup_pointAvail" size="20px" value="<?php echo number_format($pointAvailable, 2); ?>"/></td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="4">
                        <table class="pbl_table" border="1" cellspacing="0">
                            <tbody>
                            <tr class="pbl_header">
                                <td valign="middle">Join Package</td>
                                <td valign="middle">Membership</td>
                                <td valign="middle">Price(<?php echo $systemCurrency; ?>)</td>
                            </tr>

                            <?php
                                if (count($packageDBs) > 0) {
                                    $trStyle = "1";
                                    foreach ($packageDBs as $packageDB) {
                                        if ($trStyle == "1") {
                                            $trStyle = "0";
                                        } else {
                                            $trStyle = "1";
                                        }

                                echo "<tr class='row" . $trStyle . "'>
                                    <td align='center'>" . link_to(__('Active'), 'member/doPurchasePackage?packageId=' . $packageDB->getPackageId(), array(
                                               'class' => 'activeLink',
                                               'ref' => $packageDB->getPrice(),
                                               'pid' => $packageDB->getPackageId(),
                                          )) . "</td>
                                    <td align='center'>" . __($packageDB->getPackageName()) . "</td>
                                    <td align='center'>" . $packageDB->getPrice() . "</td>
                                </tr>";
                                    }
                                } else {
                                    echo "<tr class='odd' align='center'><td colspan='3'>" . __('No data available in table') . "</td></tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><input type="checkbox" class="checkbox" id="privateInvestmentAgreement" name="privateInvestmentAgreement">
                        <label for="privateInvestmentAgreement">Private Investment Agreement</label></td>
                    <td colspan="4">
                        <a target="_blank" href="/download/privateInvestmentAgreement">Download Agreement (67 KB Doc)</a>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Security Password'); ?></td>
                    <td>
                        <input name="transactionPassword" type="password" id="transactionPassword"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                </tbody>
            </table>

            </form>
        </td>
    </tr>
    </tbody>
</table>