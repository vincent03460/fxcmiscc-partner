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
            }
        },
        submitHandler: function(form) {
            var epointAvailable = parseFloat($('#topup_pointAvail').autoNumericGet());
            var epointPaid = parseFloat($('#epointPaid').autoNumericGet());
            var packagePrice = parseFloat($("input[name='pid']:checked").attr("ref"));

            if (epointAvailable < epointPaid) {
                error("In-sufficient e-Point to purchase package.");
                return false;
            }

            var totalPaid = epointPaid;
            if (totalPaid < packagePrice) {
                error("In-sufficient fund to purchase package");
                return false;
            }
            if (totalPaid > packagePrice) {
                error("Amount Paid is not tally with package price");
                return false;
            }

            waiting();

            $('#epointPaid').val(epointPaid);
            form.submit();
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

    $("input[name='pid']").click(function(event){
        $("#epointPaid").autoNumericSet($(this).attr("ref"));
    });
    $("#epointPaid").autoNumeric().focus(function(){
        $(this).select();
    });
});
</script>

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('Member Registration') ?></p></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td width="15px" style="min-height: 600px;">&nbsp;</td>
        <td>



<table cellpadding="0" cellspacing="0">
    <tbody>
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
<form action="/member/purchasePackageViaTree2" id="topupForm" name="topupForm" method="post">
    <input type="hidden" id="epointNeeded" value="0"/>
    <input type="hidden" name="uplineDistCode" id="uplineDistCode" value="<?php echo $uplineDistCode;?>"/>
    <input type="hidden" name="position" id="position" value="<?php echo $position;?>"/>

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
            <th class="tbl_header_right">
                <div class="border_right_grey">&nbsp;</div>
            </th>
        </tr>

        <tr class="tbl_form_row_odd">
            <td>&nbsp;</td>
            <td><?php echo __('e-Point Wallet') ?></td>
            <td><input type="text" readonly="readonly" id="topup_pointAvail" size="20px" value="<?php echo number_format($pointAvailable, 2); ?>"/></td>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td colspan="4">
                <table class="pbl_table" border="1" cellspacing="3" cellpadding="3" style="c">
                    <tbody>
                    <tr class="pbl_header">
                        <td valign="middle"><?php echo __('Join Package') ?></td>
                        <td valign="middle"><?php echo __('Price') ?>(<?php echo $systemCurrency; ?>)</td>
                    </tr>

                    <?php
                        $packagePriceSelected = 0;
                        if (count($packageDBs) > 0) {
                            $trStyle = "1";

                            $defaultChecked = " checked='checked'";
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

                                /*echo "<tr class='row" . $trStyle . "'>
                                        <td align='center'>" . link_to(__('Sign up'), 'member/doPurchasePackage?packageId=' . $packageDB->getPackageId(), array(
                                                                                                                                                               'class' => 'activeLink',
                                                                                                                                                               'ref' => $packageDB->getPrice(),
                                                                                                                                                               'pid' => $packageDB->getPackageId(),
                                                                                                                                                          )) . "</td>
                                        <td align='center'>" . __($packageDB->getPackageName()) . "</td>
                                        <td align='center'>" . $packagePrice . "</td>
                                    </tr>";*/

                                echo "<tr class='row" . $trStyle . "'>
                                        <td align='left'>&nbsp;&nbsp;
                                        <input type='radio' name='pid' value='".$packageDB->getPackageId()."' ref='".$packageDB->getPrice()."' ".$defaultChecked.">&nbsp;&nbsp;". __($packageDB->getPackageName()) . "</td>
                                        <td align='center'>" . $packagePrice . "</td>
                                    </tr>";

                                if ($defaultChecked != "") {
                                    $defaultChecked = "";
                                    $packagePriceSelected = $packageDB->getPrice();
                                }
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
                    <td><?php echo __('e-Point Paid') ?></td>
                    <td><input type="text" id="epointPaid" name="epointPaid" size="20px" value="<?php echo number_format($packagePriceSelected, 2); ?>"/></td>
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
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td></td>
                    <td align="right">
                        <button><?php echo __('Submit'); ?></button>
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


    <td width="15px">&nbsp;</td>
    </tr>
</table>