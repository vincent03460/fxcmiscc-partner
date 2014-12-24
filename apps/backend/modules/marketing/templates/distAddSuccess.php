<?php include('scripts_backend.php'); ?>
<style type="text/css">
    .caption {
        background: none repeat scroll 0 0 #E8E8E8;
        width: 25%;
        border-bottom: 2px solid #FFFFFF;
        padding: 5px;
    }

    .value {
        background: none repeat scroll 0 0 #F4F4F4;
        width: 75%;
        border-bottom: 2px solid #FFFFFF;
        padding: 5px;
    }
</style>
<script type="text/javascript">
$(function() {
    $.populateDOB({
        dobYear : $("#dob_year")
        ,dobMonth : $("#dob_month")
        ,dobDay : $("#dob_day")
        ,dobFull : $("#dob")
    });

    $("#sponsorId").change(function() {
        if ($.trim($('#sponsorId').val()) != "") {
            verifySponsorId();
        }
    });
    $("#masterIbCode").change(function() {
        if ($.trim($('#masterIbCode').val()) != "") {
            verifyMasterIBId();
        }
    });

    $("#btnRegister").button({
        icons: {
            primary: "ui-icon-circle-plus"
        }
    });
    $("#registerForm").validate({
        messages : {
            confirmPassword: {
                equalTo: "<?php echo __('Please enter the same password as above') ?>"
            },
            nickName: {
                remote: "<?php echo __('Alias already in use') ?>."
            }
        },
        rules : {
            "sponsorId" : {
                required: true
            },
            "masterIbCode" : {
                required: true
            },
            "userpassword" : {
                required : true,
                minlength : 2
            },
            "confirmPassword" : {
                required : true,
                minlength : 2,
                equalTo: "#userpassword"
            },
            "fullname" : {
                required : true,
                minlength : 2
            },
            "nickName" : {
                required : true,
                minlength : 2,
                remote: "<?php echo url_for('marketing/verifyNickName') ?>"
            },
            "ic" : {
                required : true,
                minlength : 3
            },
            "address" : {
                required : true,
                minlength : 3
            },
            "postcode" : {
                required : true,
                minlength : 3
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
            if ($.trim($('#sponsorId').val()) == "") {
                alert("<?php echo __('Sponsor ID cannot be blank') ?>.");
                $('#sponsorId').focus();
            } else {
                waiting();
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url_for('marketing/verifySponsorId') ?>",
                    dataType : 'json',
                    cache: false,
                    data: {
                        sponsorId : $('#sponsorId').val()
                    },
                    success : function(data) {
                        waiting();
                        if (data == null || data == "") {
                            alert("<?php echo __('Invalid Sponsor ID') ?>");
                            $('#sponsorId').focus();
                            $("#sponsorName").val("");
                        } else {
                            form.submit();
                        }
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Your login attempt was not successful. Please try again.");
                    }
                });
            }
        },
        success: function(label) {
        }
    });

    $.ajax({
        type : 'POST',
        url : "<?php echo url_for('marketing/fetchPackage') ?>",
        dataType : 'json',
        cache: false,
        data: {
        },
        success : function(data) {
            $.unblockUI();
            packageStrings = "";
            jQuery.each(data.package, function(key, value) {
                packageStrings += "<option value='" + value.packageId + "' ref='" + value.price + "'>" + value.name + "</option>";
            });

            $("#rankId").html(packageStrings).trigger("change");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Server connection error.");
        }
    });
    $("#rankId").change(function(){
        $("#pointNeeded").val($("#rankId option:selected").attr("ref"));
    });
}); // end $(function())

function verifySponsorId() {
    waiting();
    $.ajax({
        type : 'POST',
        url : "<?php echo url_for('marketing/verifySponsorId') ?>",
        dataType : 'json',
        cache: false,
        data: {
            sponsorId : $('#sponsorId').val()
        },
        success : function(data) {
            if (data == null || data == "") {
                alert("<?php echo __('Invalid Sponsor ID') ?>");
                $('#sponsorId').focus();
                $("#sponsorName").val("");
            } else {
                $.unblockUI();
                $("#sponsorName").val(data.nickname);
                $("#sponsorId").val(data.userName);
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Your login attempt was not successful. Please try again.");
        }
    });
}
function verifyMasterIBId() {
    waiting();
    $.ajax({
        type : 'POST',
        url : "<?php echo url_for('marketing/verifyMasterIBId') ?>",
        dataType : 'json',
        cache: false,
        data: {
            masterIbCode : $('#masterIbCode').val()
        },
        success : function(data) {
            if (data == null || data == "") {
                alert("<?php echo __('Invalid Master IB Code') ?>");
                $('#masterIbCode').focus();
                $("#masterIbName").val("");
            } else {
                $.unblockUI();
                $("#masterIbName").val(data.masterIbName);
                $("#masterIbCode").val(data.masterIbCode);
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Your login attempt was not successful. Please try again.");
        }
    });
}
</script>
<?php echo form_tag('marketing/doRegister', 'id=registerForm') ?>
    <div style="padding: 5px; position: relative; width: 100%">
        <div class="portlet">
            <div class="portlet-header">Distributor Listing</div>
            <div class="portlet-content">
                <table width="100%" cellspacing="0" cellpadding="0" class="tablelist">
                    <tbody>
                    <?php if ($sf_flash->has('successMsg')): ?>
                    <tr>
                        <td colspan="2">
                            <div class="ui-widget">
                                <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
                                    <p><span style="float: left; margin:0 7px 50px 0;" class="ui-icon ui-icon-info"></span>
                                    <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <?php endif; ?>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Sponsor ID') ?></label>
                        </td>
                        <td class="value">
                            <input name="sponsorId" type="text" id="sponsorId" maxlength="8"
                                   class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Sponsor Name') ?></label>
                        </td>
                        <td class="value">
                            <input name="sponsorName" type="text" id="sponsorName" readonly="readonly"
                                   style="border: none"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Master IB Code') ?></label>
                        </td>
                        <td class="value">
                            <input name="masterIbCode" type="text" id="masterIbCode" maxlength="8"
                                   class="login_t73"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="caption">
                            <label><?php echo __('Master IB Name') ?></label>
                        </td>
                        <td class="value">
                            <input name="masterIbName" type="text" id="masterIbName" readonly="readonly"
                                   style="border: none"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="caption">
                            <label><?php echo __('Package') ?></label>
                        </td>
                        <td class="value">
                            <select name="rankId" id="rankId" ></select>
                            <input type="text" disabled="disabled" id="pointNeeded" size="10px"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="caption">
                            <label><?php echo __('Set Password') ?></label>
                        </td>
                        <td class="value">
                            <input name="userpassword" type="password" id="userpassword" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Confirm Password') ?></label>
                        </td>
                        <td class="value">
                            <input name="confirmPassword" type="password" id="confirmPassword"
                                   class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Full Name') ?></label>
                        </td>
                        <td class="value">
                            <input name="fullname" type="text" id="fullname" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><span id="LabelNickName"><?php echo __('Alias') ?></span></label>
                        </td>
                        <td class="value">
                            <input name="nickName" type="text" id="nickName" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Passport/ID Card No') ?></label>
                        </td>
                        <td class="value">
                            <input name="ic" type="text" id="ic" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Country') ?></label>
                        </td>
                        <td class="value">
                            <?php include_component('component', 'countrySelectOption', array('countrySelected' => "China (PRC)", 'countryName' => 'country', 'countryId' => 'country')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Address') ?></label>
                        </td>
                        <td class="value">
                            <input name="address" type="text" id="address" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Postal Code') ?></label>
                        </td>
                        <td class="value">
                            <input name="postcode" type="text" id="postcode" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Email') ?></label>
                        </td>
                        <td class="value">
                            <input name="email" type="text" id="email" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Contact No') ?></label>
                        </td>
                        <td class="value">
                            <input name="contactNumber" type="text" id="contactNumber" class="bp_05"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Gender') ?></label>
                        </td>
                        <td class="value">
                            <input id="rdoGender_0" type="radio" name="gender" value="M" checked="checked"/>&nbsp;
                            <label for="rdoGender_0"><?php echo __('Male') ?></label>&nbsp;
                            <input id="rdoGender_1" type="radio" name="gender" value="F"/>&nbsp;
                            <label for="rdoGender_1"><?php echo __('Female') ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Date of Birth') ?></label>
                        </td>
                        <td class="value">
                            <select id="dob_year"></select>
                            <select id="dob_month"></select>
                            <select id="dob_day"></select>
                            <input name="dob" readonly="readonly" type="hidden" id="dob" class="bp_05"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Bank Name') ?></label>
                        </td>
                        <td class="value">
                            <input name="bankName" type="text" id="bankName" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Bank Holder Name') ?></label>
                        </td>
                        <td class="value">
                            <input name="bankHolderName" type="text" id="bankHolderName" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">
                            <label><?php echo __('Bank Account No') ?></label>
                        </td>
                        <td class="value">
                            <input name="bankAccountNo" type="text" id="bankAccountNo" class="login_t73"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr class="value">
                        <td colspan="2" style="padding: 10px" align="center">
                            <button type="submit" class="right"
                                    id="btnRegister"><?php echo __('Register') ?></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>