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

input[readonly] {
    background-color: #EEEEEE;
    cursor: not-allowed;
}
</style>

<script type="text/javascript" language="javascript">
    var datagrid = null;
    $(function() {
        $.populateDOB({
            dobYear : $("#dob_year")
            ,dobMonth : $("#dob_month")
            ,dobDay : $("#dob_day")
            ,dobFull : $("#dob")
        });

        $("#btnSubmit").click(function(event) {
            event.preventDefault();
            $("#registerForm").submit();
        });

        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        }, "No space please and don't leave it empty");

        jQuery.validator.addMethod("loginRegex", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-\s\_]+$/i.test(value);
        }, "This field only accept latin word, numbers, or dashes.");

        jQuery.validator.addMethod("latinRegex", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-\s\_\/\.]+$/i.test(value);
        }, "This field only accept latin word, numbers, or dashes.");

        $("#registerForm").validate({
            messages : {
                "confirmPassword": {
                    equalTo: "<?php echo __('Please enter the same password as above') ?>"
                },
                userName: {
                    remote: "<?php echo __('User Name already in use') ?>."
                }
            },
            rules: {
                /*"userName" : {
                    required : true,
                    noSpace: true,
                    loginRegex: true,
                    minlength : 6,
                    remote: "/member/verifyUserName"
                },*/
                "fullname" : {
                    required: true
                },
                "nric" : {
                    required : true
                },
                "sponsorId" : {
                    required : true
                },
                "email" : {
                    required: true
                    , email: true
                },
                "contactNumber" : {
                    required: true
                },
                "address" : {
                    required: true
                },
                "state" : {
                    required: true
                },
                "userpassword" : {
                    required : true,
                    minlength : 6
                },
                "confirmPassword" : {
                    required : true,
                    minlength : 6,
                    equalTo: "#userpassword"
                },
                "securityPassword" : {
                    required : true,
                    minlength : 6
                },
                "confirmSecurityPassword" : {
                    required : true,
                    minlength : 6,
                    equalTo: "#securityPassword"
                },
                "contact" : {
                    required: true
                }
            },
            submitHandler: function(form) {
                var sure = confirm("<?php echo __('Are you sure want to submit the application')?>?");
                if (sure) {
                    waiting();
                    $.ajax({
                        type : 'POST',
                        url : "/member/verifySponsorId",
                        dataType : 'json',
                        cache: false,
                        data: {
                            sponsorId : $('#sponsorId').val()
                        },
                        success : function(data) {
                            if (data == null || data == "") {
                                error("<?php echo __('Invalid Referrer ID') ?>");
                                $('#sponsorId').focus();
                                $("#sponsorName").val("");
                            } else {
                                form.submit();
                                /*$.ajax({
                                    type : 'POST',
                                    url : "/member/verifyNric",
                                    dataType : 'json',
                                    cache: false,
                                    data: {
                                        sponsorId : $('#sponsorId').val()
                                        , nric : $('#nric').val()
                                    },
                                    success : function(data) {
                                        if (data == null || data == "" || data.result == "false") {
                                            error("<?php echo __('NRIC already exist in other group') ?>");
                                            $('#nric').focus();
                                        } else {
                                            form.submit();
                                        }
                                    },
                                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                                        error("Your login attempt was not successful. Please try again.");
                                    }
                                });*/
                            }
                        },
                        error : function(XMLHttpRequest, textStatus, errorThrown) {
                            error("Your login attempt was not successful. Please try again.");
                        }
                    });
                }
            }
        });

        $("#sponsorId").change(function() {
            if ($.trim($('#sponsorId').val()) != "") {
                verifySponsorId();
            }
        });
    }); // end function

    function verifySponsorId() {
        waiting();
        $.ajax({
            type : 'POST',
            url : "/member/verifySponsorId",
            dataType : 'json',
            cache: false,
            data: {
                sponsorId : $('#sponsorId').val()
                , verifySameGroup : "Y"
            },
            success : function(data) {
                if (data == null || data == "") {
                    error("<?php echo __('Invalid Referrer ID') ?>");
                    $('#sponsorId').focus();
                    $("#sponsorName").val("");
                } else {
                    $.unblockUI();
                    $("#sponsorName").val(data.fullname);
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Your login attempt was not successful. Please try again.");
            }
        });
    }
</script>

<td valign="top">

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <form class="form-horizontal label-left" method="post"
                    action="/member/doMemberRegistration"
                    data-validate="parsley"
                    id="registerForm" name="registerForm">

        <input type="hidden" value="<?php echo $ePointPaid?>" id="ePointPaid" name="ePointPaid">
        <input type="hidden" value="<?php echo $eCashPaid?>" id="eCashPaid" name="eCashPaid">
        <input type="hidden" value="<?php echo $promoPaid?>" id="promoPaid" name="promoPaid">

        <h2><?php echo __("Member Registration"); ?></h2>
        <i><?php echo __("Member Registration - Step 2"); ?></i>

        <br><br>

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Referrer")?></h3>
            </legend>
            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Referrer ID")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="sponsorId" name="sponsorId" value="<?php //echo $sponsorId;?>">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorName">
                            <?php echo __("Referrer Name")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="sponsorName" name="sponsorName" value="<?php //echo $sponsorName;?>" readonly="readonly">
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Account Login Details")?></h3>
            </legend>
            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorName">
                            <?php echo __("Set Password")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="password" class="col-sm-6 col-xs-12" id="userpassword" name="userpassword">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorName">
                            <?php echo __("Confirm Password")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="password" class="col-sm-6 col-xs-12" id="confirmPassword" name="confirmPassword">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorName">
                            <?php echo __("Security Password")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="password" class="col-sm-6 col-xs-12" id="securityPassword" name="securityPassword">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorName">
                            <?php echo __("Confirm Security Password")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="password" class="col-sm-6 col-xs-12" id="confirmSecurityPassword" name="confirmSecurityPassword">
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Personal Information")?></h3>
            </legend>
            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="fullname">
                            <?php echo __("Full Name")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input name="fullname" type="text" id="fullname" class="col-sm-6 col-xs-12"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="nric">
                            <?php echo __("NRIC")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input name="nric" type="text" id="nric" class="col-sm-6 col-xs-12"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Date of Birth")?>
                        </label>
                    </th>
                    <td>
                        <select id="dob_year" style="width: 120px;"></select>
                        <select id="dob_month" style="width: 120px;"></select>
                        <select id="dob_day" style="width: 120px;"></select>
                        <input name="dob" readonly="readonly" type="hidden" id="dob" class="bp_05"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Address")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="address" class='col-sm-6 col-xs-12' value="" id="address"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Address")?> 2
                        </label>
                    </th>
                    <td>
                        <input type="text" name="address2" class='col-sm-6 col-xs-12' value=""/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("City / Town")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="city" class='col-sm-6 col-xs-12' value="" id="city"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("City / Town")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="city" class='col-sm-6 col-xs-12' value="" id="city"/>
                        <small><i><?php echo __('Please enter \'0\' if postal code is not applicable in your country.') ?></i></small>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Zip / Postal Code")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="zip" class='col-sm-6 col-xs-12' value="" id="zip"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("State / Province")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="state" class='col-sm-6 col-xs-12' value="" id="state"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Country")?>
                        </label>
                    </th>
                    <td>
                        <?php include_component('component', 'countrySelectOption', array('countrySelected' => "China (PRC)", 'countryName' => 'country', 'countryId' => 'country')) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Gender")?>
                        </label>
                    </th>
                    <td>
                        <select name="gender" class='col-sm-6 col-xs-12'>
                            <option value="" selected="selected"><?php echo __('Please Select') ?></option>
                            <option value="M"><?php echo __('Male') ?></option>
                            <option value="F"><?php echo __('Female') ?></option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Contact Details")?></h3>
            </legend>
            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Telephone Number")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="contactNumber" name="contactNumber">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Primary Email")?><span class="mandatory">*</span>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="col-sm-6 col-xs-12" id="email" name="email">
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <legend class="section">
                <h3><?php echo __("Selected Package")?></h3>
            </legend>
            <table cellpadding="5" cellspacing="1">
                <tbody>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Package")?>
                        </label>
                    </th>
                    <td>
                        <input type="text" class="inputbox" id="packageName" name="packageName" value="<?php echo __($selectedPackage->getPackageName());?>" readonly="readonly">
                        <input type="hidden" class="col-sm-6 col-xs-12" id="packageId" name="packageId" value="<?php echo $selectedPackage->getPackageId();?>" readonly="readonly">
                        <input type="hidden" class="col-sm-6 col-xs-12" id="amountNeeded" name="amountNeeded" value="<?php echo $amountNeeded;?>" readonly="readonly">
                        &nbsp;<input type="text" class="inputbox" id="amountNeeded2" name="amountNeeded2" value="<?php echo $systemCurrency; ?>&nbsp;<?php echo number_format($amountNeeded, 2);?>" readonly="readonly">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th>
                        <label class="control-label" for="sponsorId">
                            <?php echo __("Register Remark")?>
                        </label>
                    </th>
                    <td>
                        <textarea rows="3" cols="50" name="registerRemark" id="registerRemark"></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit");?>" style="margin-left: 712px;" />

    </form>
</td>
