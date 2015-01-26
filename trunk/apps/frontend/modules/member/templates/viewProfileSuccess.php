<?php
use_helper('I18N');
?>
<style>
    label.error{
        padding-top: 4px !important;
        padding-bottom: 0px !important;
    }
    .mandatory {
        color: #E5603B;
    }
</style>

<script>
$(function() {
    $("#registerForm").validate({
        rules : {
            "fullname" : {
                required : true
            },
            "nric" : {
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
            "contactNumber" : {
                required : true
                , minlength : 10
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

    $("#btnSubmit").click(function(){
        $("#registerForm").submit();
    });

    $("#bankForm").validate({
        messages : {
            transactionPassword: {
                remote: "<?php echo __("Security Password is not valid")?>."
            }
        },
        rules : {
            "bankName" : {
                required : true
            },
            "bankAccNo" : {
                required : true
            },
            "bankHolderName" : {
                required : true
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

    $("#btnBankUpdate").click(function(){
        $("#bankForm").submit();
    });

    $("#uploadForm").validate({
        rules : {
            "bankPassBook" : {
                required: "#bankPassBook.length > 0",
                accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            },
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

    $("#btnUpload").click(function(){
        $("#uploadForm").submit();
    });
});
</script>

<td valign="top">

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <h2><?php echo __("Member Profile"); ?></h2>

    <form class="form-horizontal" method="post"
          action="/member/updateProfile"
          id="registerForm" name="registerForm">

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Personal Information")?></h3>
            </legend>

            <i><?php echo __("Please fill in all the personal information"); ?></i>

            <br/><br/>

            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="fullname">
                            <?php echo __("Full Name")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="fullname" name="fullname" readonly="readonly" value="<?php echo $distDB->getFullName() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="nric">
                            <?php echo __("NRIC")?>
                        </label>
                    </th>
                    <td>
                        <?php
                        $toReadonly = "readonly='readonly'";
                        if ($distDB->getIc() == "") {
                            $toReadonly = "";
                        }
                        ?>
                        <input type="text" class="col-sm-6 col-xs-12" id="nric" name="nric" size="30" value="<?php echo $distDB->getIc() ?>" <?php echo $toReadonly ?>>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="country">
                            <?php echo __("Country")?>
                        </label>
                    </th>
                    <td>
                        <?php include_component('component', 'countrySelectOption', array('countrySelected' => $distDB->getCountry(), 'countryName' => 'country', 'countryId' => 'country')) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="address">
                            <?php echo __("Address")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="address" name="address" size="30" value="<?php echo $distDB->getAddress() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="address2">
                            <?php echo __("Address")?> 2
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="address2" name="address2" size="30" value="<?php echo $distDB->getAddress2() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="city">
                            <?php echo __("City / Town")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="city" name="city" size="30" value="<?php echo $distDB->getCity() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="state">
                            <?php echo __("State / Province")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="state" name="state" size="30" value="<?php echo $distDB->getState() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="zip">
                            <?php echo __("Zip / Postal Code")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="zip" name="zip" size="30" value="<?php echo $distDB->getPostcode() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="email">
                            <?php echo __("Email")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="email" name="email" size="30" value="<?php echo $distDB->getEmail() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="contactNumber">
                            <?php echo __("Contact Number")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="contactNumber" name="contactNumber" size="30" value="<?php echo $distDB->getContact() ?>">
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit");?>" style="margin-left: 712px;" />

    </form>

    <br/><br/>

    <form class="form-horizontal" method="post"
          action="/member/updateBankInformation"
          id="bankForm" name="bankForm">

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Bank Account Details")?></h3>
            </legend>

            <i><?php echo __("Please fill in all the Bank Account information"); ?></i>

            <br/><br/>

            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="bankName">
                            <?php echo __("Bank Name")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="bankName" name="bankName" value="<?php echo $distDB->getBankName() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="bankBranch">
                            <?php echo __("Bank Branch")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="bankBranch" name="bankBranch" value="<?php echo $distDB->getBankBranch() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="bankState">
                            <?php echo __("Bank Address")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="bankState" name="bankState" value="<?php echo $distDB->getBankAddress() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="bankSwiftCode">
                            <?php echo __("Bank Swift Code")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="bankSwiftCode" name="bankSwiftCode" size="30" value="<?php echo $distDB->getBankSwiftCode() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="bankAccNo">
                            <?php echo __("Bank Account Number")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="bankAccNo" name="bankAccNo" size="30" value="<?php echo $distDB->getBankAccNo() ?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="bankHolderName">
                            <?php echo __("Bank Account Holder Name")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="bankHolderName" name="bankHolderName" size="30" value="<?php echo $distDB->getBankHolderName() ?>">
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit");?>" style="margin-left: 712px;" />

    </form>

    <br/><br/>

    <form class="form-horizontal" method="post"
          action="/member/doUploadFile" enctype="multipart/form-data"
          id="uploadForm" name="uploadForm">

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Bank Account Proof")?></h3>
            </legend>

            <i><?php echo __("Upload Bank Account Proof, Proof of Residence and Passport/Photo ID"); ?></i>

            <br/><br/>

            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="bankPassBook">
                            <?php echo __("Bank Account Proof")?>
                        </label>
                    </th>
                    <td>
                        <?php echo input_file_tag('bankPassBook', array("id" => "bankPassBook", "name" => "bankPassBook")); ?>
                        <?php if ($distDB->getFileNric() != "") { ?>
                            <span class="ui-icon ui-icon-circle-check" style="display:inline-block;"></span> <span style="color: #468847">Uploaded Successfully</span>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="proofOfResidence">
                            <?php echo __("Proof of Residence")?>
                        </label>
                    </th>
                    <td>
                        <?php echo input_file_tag('proofOfResidence', array("id" => "proofOfResidence", "name" => "proofOfResidence")); ?>
                        <?php if ($distDB->getFileNric() != "") { ?>
                            <span class="ui-icon ui-icon-circle-check" style="display:inline-block;"></span> <span style="color: #468847">Uploaded Successfully</span>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="bankState">
                            <?php echo __("Passport/Photo ID")?>
                        </label>
                    </th>
                    <td>
                        <?php echo input_file_tag('nric', array("id" => "nric", "name" => "nric")); ?>
                        <?php if ($distDB->getFileNric() != "") { ?>
                        <span class="ui-icon ui-icon-circle-check" style="display:inline-block;"></span> <span style="color: #468847">Uploaded Successfully</span>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        &nbsp;
                    </th>
                    <td>
                        <span color="#dc143c">
                            <?php echo __('Note: Maximum upload size per file is 5 MB. Only pdf / bmp / jpg / jpeg / gif / png / tif / tiff / doc / docx / xls / xlsx formats are accepted.') ?>
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Upload");?>" style="margin-left: 712px;" />

    </form>

    <br/><br/>
</td>
