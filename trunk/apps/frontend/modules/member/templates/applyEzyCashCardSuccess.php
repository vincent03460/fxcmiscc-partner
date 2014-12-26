<?php include('scripts.php'); ?>
<script>
var cardCharges = <?php echo Globals::EZY_CASH_CARD_CHARGES; ?>;
$(function() {
    $("#registerForm").validate({
        messages : {
            transactionPassword: {
                remote: "Security Password is not valid."
            }
        },
        rules : {
            "transactionPassword" : {
                required : true,
                remote: "/member/verifyTransactionPassword"
            }
        },
        submitHandler: function(form) {
            waiting();
            var epointBalance = $('#txtCp1').autoNumericGet();
            var ecashBalance = $('#txtCp2').autoNumericGet();

            var value = $("#cardQty").val();
            var result = cardCharges * parseFloat(value);

            if ($("#payByOption").val() == "CP1") {
                if (result > parseFloat(epointBalance)) {
                    alert("In-sufficient CP1");
                    return false;
                }
            } else {
                if (result > parseFloat(ecashBalance)) {
                    alert("In-sufficient CP2");
                    return false;
                }
            }

            form.submit();
        },
        success: function(label) {
            //label.addClass("valid").text("Valid captcha!")
        }
    });

    $("#uploadForm").validate({
        rules : {
            "proofOfResidence" : {
                required: "#bankPassBook.length > 0",
                minlength : 3,
                accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            },
            "nric" : {
                required: "#bankPassBook.length > 0",
                minlength : 3,
                accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        },
        success: function(label) {
            //label.addClass("valid").text("Valid captcha!")
        }
    });

    $("#btnSubmit").button({
        icons: {
            primary: "ui-icon-circle-arrow-n"
        }
    });

    $("#btnUpload").button({
        icons: {
            primary: "ui-icon-circle-arrow-n"
        }
    });

    $("#payByOption").change(function(event){
        var value = $(this).val();
        if (value == "CP1") {
            $("#trCP1").show();
            $("#trCP2").hide();
        } else if (value == "CP2") {
            $("#trCP1").hide();
            $("#trCP2").show();
        }
    });

    $("#cardQty").change(function(event){
        var value = $(this).val();
        var result = cardCharges * parseFloat(value);
        $("#subtotal").autoNumericSet(result);
    });

    $('#subtotal').autoNumeric({
        mDec: 2
    });
});
</script>

<div class="ewallet_li">
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/applyEzyCashCard") ?>" style="color: rgb(134, 197, 51);">
        <?php echo __('Apply Ezy Cash Card'); ?>
    </a>
    &nbsp;&nbsp;
    <img src="/images/arrow_blue_single_tab.gif">
    &nbsp;&nbsp;
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/applyEzyCashCardHistory")?>" style="color: rgb(0, 93, 154);">
        <?php echo __('Apply Ezy Cash Card History'); ?>
    </a>
</div>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Apply Ezy Cash Card') ?></span></td>
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
            <table>
                <tr>
                    <td align="center">
                        <img src="/images/ezy-cash-card.png" alt="EZY Cash Card">
<!--                        <a href="https://www.ezybonds.com/members/join.asp?affiliateid=36496" target="_blank"><img src="http://www.ezybonds.com/images/banners/ezy_join_small.gif"></a>-->
                    </td>
                </tr>
            </table>
            <br>
            <form id="registerForm" method="post" action="/member/doApplyEzyCashCard">
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
                    <th><?php echo __('Apply Ezy Cash Card') ?></th>
                    <th class="tbl_content_right"></th>
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Charges (USD)') ?></td>
                    <td>
                        <input type="text" id="debitCardCharges" size="30" readonly="readonly"
                                             value="<?php echo number_format($debitCardCharges, 2) ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Total Cards Applied') ?></td>
                    <td>
                        <select id="cardQty" name="cardQty">
                            <?php for ($i=1; $i<=10; $i++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Sub Total') ?></td>
                    <td>
                        <input type="text" id="subtotal" size="30" readonly="readonly"
                                             value="<?php echo number_format($debitCardCharges, 2) ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Pay By') ?></td>
                    <td>
                        <select id="payByOption" name="payByOption">
                            <option value="CP1">CP1</option>
                            <option value="CP2">CP2</option>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd" id="trCP1">
                    <td>&nbsp;</td>
                    <td><?php echo __('CP1 Account') ?></td>
                    <td>
                        <input type="text" id="txtCp1" size="30" readonly="readonly"
                                             value="<?php echo number_format($epointBalance,2) ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd" id="trCP2" style="display: none;">
                    <td>&nbsp;</td>
                    <td><?php echo __('CP2 Account') ?></td>
                    <td>
                        <input type="text" id="txtCp2" size="30" readonly="readonly"
                                             value="<?php echo number_format($ecashBalance,2) ?>"/>
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

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td colspan="2" align="center">
                        <font color="#dc143c"> <?php echo __('Note: Kindly upload (1) copy of ID/Passport and (1) copy of proof of residency<br>The card will be delivered within 14 working days') ?></font>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td></td>
                    <td align="right">
                        <button id="btnSubmit"><?php echo __('Submit') ?></button>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
            </form>
            <div class="info_bottom_bg"></div>
            <div class="clear"></div>
            <br>

            <form id="uploadForm" method="post" action="/member/doUploadFile" enctype="multipart/form-data">
                <input type="hidden" name="doAction" value="EZY_CASH_CARD">
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
                    <th colspan="2"><?php echo __('Upload Proof of Residence and Passport/Photo ID') ?></th>
                    <!--<th class="tbl_content_right"></th>-->
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td>
                        <?php echo __('Proof of Residence') ?>
                    </td>
                    <td>
                        <?php echo input_file_tag('proofOfResidence', array("id" => "proofOfResidence", "name" => "proofOfResidence")); ?>
                        <?php
                        if ($distDB->getFileProofOfResidence() != "") {
                        ?>
                            <a href="<?php echo url_for("/download/proofOfResidence?q=".rand()) ?>">
                                <img src="/images/common/fileopen.png" alt="view file">
                            </a>
                        <?php
                        }
                        ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td>
                        <?php echo __('Passport/Photo ID') ?>
                    </td>
                    <td>
                        <?php echo input_file_tag('nric', array("id" => "nric", "name" => "nric")); ?>
                        <?php
                        if ($distDB->getFileNric() != "") {
                        ?>
                            <a href="<?php echo url_for("/download/nric?q=".rand()) ?>">
                                <img src="/images/common/fileopen.png" alt="view file">
                            </a>
                        <?php
                        }
                        ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td colspan="5">
                        <font color="#dc143c">
                        <?php echo __('Note: Maximum upload size per file is 5 MB. Only pdf / bmp / jpg / jpeg / gif / png / tif / tiff / doc / docx / xls / xlsx formats are accepted.') ?>
                        </font>
                    </td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td></td>
                    <td align="right">
                        <button id="btnUpload"><?php echo __('Update') ?></button>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <br>
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
                    <th colspan="2"><?php echo __('EzyAccount Registration SOP') ?></th>
                    <!--<th class="tbl_content_right"></th>-->
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php echo url_for("/download/downloadEzybondsRegisterProcedure?p=English") ?>"><span>Click to DOWNLOAD Ezybonds Register Procedure (English)</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php echo url_for("/download/downloadEzybondsRegisterProcedure?p=Chinese") ?>"><span>Click to DOWNLOAD Ezybonds Register Procedure (Chinese)</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php echo url_for("/download/downloadEzybondsRegisterProcedure?p=Korean") ?>"><span>Click to DOWNLOAD Ezybonds Register Procedure (Korean)</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php echo url_for("/download/downloadEzybondsRegisterProcedure?p=Japanese") ?>"><span>Click to DOWNLOAD Ezybonds Register Procedure (Japanese)</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>

            <br>
            <table cellspacing="3" cellpadding="3" class="pbl_table">
                <tbody>
                <tr class="pbl_header">
                    <td align="left">EZYACCOUNT CHARGES</td>
                    <td>FEE</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left" width="80%">Card Load SMS</td>
                    <td>$3.95</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Card Load Online</td>
                    <td>$3.95</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Card Load App</td>
                    <td>$3.95</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Card Load App</td>
                    <td>$3.95</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Card to Card Transfer</td>
                    <td>$3.95</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Ezyaccount Transfer SMS</td>
                    <td>$2.95</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Ezyaccount Transfer Online</td>
                    <td>$1.95</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Bank Deposit into EzyAccount</td>
                    <td>$2.45</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Bank Withdrawal from EzyAccount</td>
                    <td>$2.45</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Merchant Payment Button Percentage</td>
                    <td>0.8%</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Merchant Payment Button Fee</td>
                    <td>$1.95</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Currency Conversion Fee</td>
                    <td>$0.50</td>
                </tr>
                </tbody>
            </table>

            <br>
            <table cellspacing="3" cellpadding="3" class="pbl_table">
                <tbody>
                <tr class="pbl_header">
                    <td align="left" width="80%">MASTER CARD CHARGES</td>
                    <td>FEE</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">ATM Withdrawal</td>
                    <td>$3.00</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">POS Purchase</td>
                    <td>$0.60</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Balance Inquiry - Online</td>
                    <td>$0.30</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Balance Inquiry - SMS</td>
                    <td>$0.30</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Balance Inquiry - IVR</td>
                    <td>$1.50</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Transaction Inquiry - Online</td>
                    <td>$0.30</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Transaction Inquiry - SMS</td>
                    <td>$0.30</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">Transaction Inquiry - IVR</td>
                    <td>$1.50</td>
                </tr>
                <tr align="center" class="odd">
                    <td align="left">Monthly Maintenance</td>
                    <td>$2.00</td>
                </tr>
                <tr align="center" class="even">
                    <td align="left">FX Currency Conversion Rate</td>
                    <td>2.5%</td>
                </tr>
                </tbody>
            </table>

            <h3>EzyBonds Bank List</h3>
            <br>
            Below are the banks available for your transaction. There are a lot more available SOON.
            <table cellspacing="3" cellpadding="3" class="pbl_table">
                <tbody>
                <tr class="pbl_header">
                    <td align="left">Country</td>
                    <td>BANK</td>
                    <td>DEPOSIT</td>
                    <td>RECEIVE</td>
                    <td>Availability</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">China</td>
                    <td>ANZ BANK</td>
                    <td>NO</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left"></td>
                    <td>CHINA CONSTRUCTION BANK</td>
                    <td>NO</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">Indonesia</td>
                    <td>CIMB NIAGA</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left">India</td>
                    <td>ICICI BANK</td>
                    <td>NO</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">Korea</td>
                    <td style="font-style: italic;">Pending</td>
                    <td>NO</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left">Japan</td>
                    <td style="font-style: italic;">Pending</td>
                    <td>NO</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">Malaysia</td>
                    <td>CIMB</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left">Thailand</td>
                    <td style="font-style: italic;">Pending</td>
                    <td>NO</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">Hong Kong</td>
                    <td>HSBC</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left">Singapore</td>
                    <td>CIMB</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">Taiwan</td>
                    <td>ANZ BANK</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left">USA</td>
                    <td>BANK OF AMERICA</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">Australia</td>
                    <td>NATIONAL AUSTRALIA BANK</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left">UK</td>
                    <td>NATWEST</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">CANADA</td>
                    <td>RBC ROYAL BANK</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="even" align="center">
                    <td align="left">BAHAMAS</td>
                    <td>SCOTIA BANK</td>
                    <td style="color: red">YES</td>
                    <td>Any ATM</td>
                    <td style="color: red">NOW</td>
                </tr>
                <tr class="odd" align="center">
                    <td align="left">Vietnam</td>
                    <td style="font-style: italic;">Pending</td>
                    <td>NO</td>
                    <td>Any ATM</td>
                    <td>Pending</td>
                </tr>
                </tbody>
            </table>

            <br>
            <table cellspacing="0" cellpadding="0" class="tbl_form">
                <colgroup>
                    <col width="1%">
                    <col width="30%">
                    <col width="69%">
                    <col width="1%">
                </colgroup>
                <tbody>
                <tr>
                    <td><br></td>
                </tr>
                <!--<tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php /*echo url_for("/download/downloadEzyFile?p=EzyAccount_Charges&e=pptx") */?>"><span>Click to DOWNLOAD EzyAccount Charges.pptx</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php /*echo url_for("/download/downloadEzyFile?p=Ezybonds_banks&e=pdf") */?>"><span>Click to DOWNLOAD Ezybonds banks.pdf</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>-->
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php echo url_for("/download/downloadEzyFile?p=EzyBonds_Presentation&e=ppsx") ?>"><span>Click to DOWNLOAD EzyBonds Presentation.ppsx</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <!--<tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <a target='_blank' href="<?php /*echo url_for("/download/downloadEzyFile?p=Mastercard_Charges&e=pptx") */?>"><span>Click to DOWNLOAD Mastercard Charges.pptx</span></a>
                    </td>
                    <td>&nbsp;</td>
                </tr>-->
                </tbody>
            </table>

        </td>
    </tr>
    </tbody>
</table>