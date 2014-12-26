<?php include('scripts.php'); ?>
<script>
var cardCharges = <?php echo Globals::DEBIT_CARD_CHARGES; ?>;
$(function() {
    $.populateDOB({
        dobYear : $("#dob_year")
        ,dobMonth : $("#dob_month")
        ,dobDay : $("#dob_day")
        ,dobFull : $("#dob")
        ,defaultValue : $("#dob").val()
    });

    $("#registerForm").validate({
        messages : {
            transactionPassword: {
                remote: "Security Password is not valid."
            }
        },
        rules : {
            "fullname" : {
                required : true,
                minlength : 2
            },
            "ic" : {
                required : true
            },
            "motherMaidenName" : {
                required : true
            },
            "nameOnCard" : {
                required : true
            },
            "address" : {
                required : true
            },
            "postcode" : {
                required : true
            },
            "email" : {
                required : true
                , email: true
            },
            "contact" : {
                required : true
            },
            "transactionPassword" : {
                required : true,
                remote: "/member/verifyTransactionPassword"
            }
        },
        submitHandler: function(form) {
            waiting();
            var epointBalance = $('#txtCp1').autoNumericGet();
            var ecashBalance = $('#txtCp2').autoNumericGet();

            if ($("#payByOption").val() == "CP1") {
                if (cardCharges > parseFloat(epointBalance)) {
                    alert("In-sufficient CP1");
                    return false;
                }
            } else {
                if (cardCharges > parseFloat(ecashBalance)) {
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
                accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            },
            "nric" : {
                required: "#bankPassBook.length > 0",
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

    $("#btnUpdate").button({
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
});
</script>

<div class="ewallet_li">
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/applyDebitCard") ?>" style="color: rgb(134, 197, 51);">
        <?php echo __('Apply SIXSTAR VISA Debit Card'); ?>
    </a>
    &nbsp;&nbsp;
    <img src="/images/arrow_blue_single_tab.gif">
    &nbsp;&nbsp;
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/applyDebitCardHistory")?>" style="color: rgb(0, 93, 154);">
        <?php echo __('Apply SIXSTAR VISA Debit Card History'); ?>
    </a>
</div>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Apply SIXSTAR VISA Debit Card') ?></span></td>
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
            <form id="registerForm" method="post" action="/member/doApplyDebitCard">
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
                    <th><?php echo __('Personal Detail') ?></th>
                    <th class="tbl_content_right"></th>
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Full Name') ?></td>
                    <td><input name="fullname"  type="text" id="fullname"
                                             size="30" value="<?php echo $mlm_debit_card_registration->getFullName() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('NRIC / Passport') ?></td>
                    <td><input name="ic"  type="text" id="ic"
                                             size="30" value="<?php echo $mlm_debit_card_registration->getIc() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __("Mother's Maiden Name") ?></td>
                    <td><input name="motherMaidenName"  type="text" id="motherMaidenName"
                                             size="30" value="<?php echo $mlm_debit_card_registration->getMotherMaidenName() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Desired Name On Card') ?></td>
                    <td><input name="nameOnCard"  type="text" id="nameOnCard"
                                             size="30" value="<?php echo $mlm_debit_card_registration->getNameOnCard() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Date of Birth') ?></td>
                    <td><select id="dob_year"></select>
                        <select id="dob_month"></select>
                        <select id="dob_day"></select>
                        <input name="dob"  value="<?php echo $mlm_debit_card_registration->getDob() ?>" type="hidden" id="dob" class="bp_05"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Country') ?></td>
                    <td><?php include_component('component', 'countrySelectOption', array('countrySelected' => $mlm_debit_card_registration->getCountry(), 'countryName' => 'country', 'countryId' => 'country')) ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Address') ?></td>
                    <td>
                        <input name="address" type="text" id="address" size="30"
                                             value="<?php echo $mlm_debit_card_registration->getAddress() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Address') ?> 2</td>
                    <td>
                        <input name="address2" type="text" id="address2" size="30"
                                             value="<?php echo $mlm_debit_card_registration->getAddress2() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('City / Town') ?></td>
                    <td>
                        <input name="city" type="text" id="city" size="30"
                                             value="<?php echo $mlm_debit_card_registration->getCity() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('State / Province') ?></td>
                    <td>
                        <input name="state" type="text" id="state" size="30"
                                             value="<?php echo $mlm_debit_card_registration->getState() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Zip / Postal Code') ?></td>
                    <td>
                        <input name="postcode" type="text" id="postcode" size="30"
                                             value="<?php echo $mlm_debit_card_registration->getPostcode() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Email') ?></td>
                    <td>
                        <input name="email" type="text" id="email" size="30"
                                             value="<?php echo $mlm_debit_card_registration->getEmail() ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Contact Number') ?></td>
                    <td>
                        <input name="contact" type="text" id="contact" size="30"
                                             value="<?php echo $mlm_debit_card_registration->getContact() ?>"/>
                    </td>
                    <td>&nbsp;</td>
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
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th><?php echo __('Account Information') ?></th>
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
                        <font color="#dc143c"> <?php echo __('Note: Kindly upload (1) copy of ID/Passport and (1) copy of proof of residency') ?></font>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td></td>
                    <td align="right">
                        <button id="btnUpdate"><?php echo __('Submit') ?></button>
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
                <input type="hidden" name="doAction" value="DEBIT_CARD">
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
    </tbody>
</table>