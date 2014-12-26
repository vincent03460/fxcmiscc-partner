<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
$(function() {
    $("#ecreditForm").validate({
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
            "epointAmount" : {
                required : true
            }
        },
        submitHandler: function(form) {
            waiting();
            var ecashBalance = $('#ecashBalance').autoNumericGet();
            var epointAmount = $('#epointAmount').autoNumericGet();
            //var epointAmount = parseFloat($("#cbo_epointAmount").val());

            if (epointAmount > parseFloat(ecashBalance)) {
                alert("In-sufficient CP3 Credit");
                return false;
            }
            $("#epointAmount").val(epointAmount);
            form.submit();
        }
    });
    $('#epointAmount').autoNumeric({
        mDec: 0
    }).keyup(function(){
        var convertedAmount = 0;
        var epointAmount = $('#epointAmount').autoNumericGet();
        convertedAmount = parseFloat(epointAmount) * 1.05;
        convertedAmount = Math.floor(convertedAmount);

        $("#epointConvertedAmount").val(convertedAmount);
    });
    $('#epointConvertedAmount').autoNumeric({
        mDec: 0
    });
});
</script>

<div class="ewallet_li">
	<a target="_self" class="navcontainer" href="<?php echo url_for("/member/epointPurchase")?>" style="color: rgb(0, 93, 154);">
        <?php echo __('Funds Deposit'); ?>
    </a>
    &nbsp;&nbsp;
    <img src="/images/arrow_blue_single_tab.gif">
    &nbsp;&nbsp;
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/convertEcashToEpoint") ?>" style="color: rgb(0, 93, 154);">
        <?php echo __('Convert CP2 To CP1'); ?>
    </a>
    &nbsp;&nbsp;
    <img src="/images/arrow_blue_single_tab.gif">
    &nbsp;&nbsp;
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/transferEpoint")?>" style="color: rgb(0, 93, 154);">
        <?php echo __('CP1 Transfer'); ?>
    </a>
    &nbsp;&nbsp;
    <img src="/images/arrow_blue_single_tab.gif">
    &nbsp;&nbsp;
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/convertCp3ToCp1")?>" style="color: rgb(134, 197, 51);">
        <?php echo __('Convert CP3 To CP1'); ?>
    </a>
</div>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Convert CP3 To CP1') ?></span></td>
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
            <form action="<?php echo url_for("/member/convertCp3ToCp1") ?>" id="ecreditForm" name="ecreditForm" method="post">
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
                    <th colspan="2"><?php echo __('Convert CP3 To CP1') ?></th>
<!--                    <th class="tbl_content_right"></th>-->
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('CP3 Balance'); ?></td>
                    <td>
                        <input name="ecashBalance" id="ecashBalance" tabindex="1" disabled="disabled"
                                           value="<?php echo number_format($ledgerAccountBalance, 2); ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('CP3 Amount'); ?></td>
                    <td>
                        <input name="epointAmount" id="epointAmount" tabindex="3"/>
                        <!--<select name="epointAmount" id="cbo_epointAmount" tabindex="2">
                            <option value="50">50</option>
                            <option value="200">200</option>
                            <option value="500">500</option>
                            <option value="1000">1,000</option>
                            <option value="1500">1,500</option>
                            <option value="2000">2,000</option>
                            <option value="2500">2,500</option>
                            <option value="3000">3,000</option>
                            <option value="3500">3,500</option>
                            <option value="4000">4,000</option>
                            <option value="4500">4,500</option>
                            <option value="5000">5,000</option>
                            <?php
/*                                for ($i = 6000; $i <= 100000; $i = $i + 1000) {
                                    echo "<option value='".$i."'>".number_format($i, 0)."</option>";
                                }

                            */?>
                        </select>-->
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('CP1 Converted Amount'); ?></td>
                    <td>
                        <input name="epointConvertedAmount" id="epointConvertedAmount" tabindex="3" readonly="readonly"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

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
                        <font color="#dc143c">NOTE: CP1 is ONLY for package purchase, package upgrade, MT4 account reload and is NON-WITHDRAWABLE.
                        <br>CP3 convert to CP1 will get extra 5%
                        </font>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td></td>
                    <td align="right">
                        <button id="btnTransfer"><?php echo __('Submit') ?></button>
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