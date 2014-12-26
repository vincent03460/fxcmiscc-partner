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
            url : "/member/verifyActiveSponsorId",
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

<div class="title">
  <h1><?php echo __("Member Registration"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Personal Information")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Member Registration - Step 2"); ?>
              <small></small>
              <br/><br/>

              <form class="form-horizontal label-left" method="post"
                    action="/member/doMemberRegistration"
                    data-validate="parsley"
                    id="registerForm" name="registerForm">

              <input type="hidden" value="<?php echo $ePointPaid?>" id="ePointPaid" name="ePointPaid">
              <input type="hidden" value="<?php echo $eCashPaid?>" id="eCashPaid" name="eCashPaid">
              <input type="hidden" value="<?php echo $promoPaid?>" id="promoPaid" name="promoPaid">
              <fieldset>
                <legend class="section">
                  <?php echo __("Referrer")?>
                </legend>
                <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="control-group">
                      <label class="control-label" for="sponsorId">
                        <?php echo __("Referrer ID")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input type="text" class="col-sm-6 col-xs-12" id="sponsorId" name="sponsorId" value="<?php //echo $sponsorId;?>">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="sponsorName">
                        <?php echo __("Referrer Name")?>
                      </label>

                      <div class="controls form-group">
                        <input type="text" class="col-sm-6 col-xs-12" id="sponsorName" name="sponsorName" value="<?php //echo $sponsorName;?>" readonly="readonly">
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend class="section">
                  <?php echo __("Account Login Details")?>
                </legend>
                <div class="row">
                  <div class="col-sm-12">
                    <!--<span class="help-block" style="color: #D2D2D2">
                                <?php /*echo __('Please choose a unique username for your account. Username accepts 3-32 characters, a-z, 0-9 and underscore (_) only.') */?>
                                </span>
                                <div class="control-group">
                                    <label class="control-label" for="sponsorId">
                                    <?php /*echo __("User Name")*/?><span class="mandatory">*</span>
                                    </label>

                                    <div class="controls form-group">
                                        <input type="text" class="col-sm-6 col-xs-12" id="userName" name="userName">
                                    </div>
                                </div>-->
                    <div class="control-group">
                      <label class="control-label" for="sponsorName">
                        <?php echo __("Set Password")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input type="password" class="col-sm-6 col-xs-12" id="userpassword" name="userpassword">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="sponsorName">
                        <?php echo __("Confirm Password")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input type="password" class="col-sm-6 col-xs-12" id="confirmPassword" name="confirmPassword">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="sponsorName">
                        <?php echo __("Security Password")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input type="password" class="col-sm-6 col-xs-12" id="securityPassword" name="securityPassword">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="sponsorName">
                        <?php echo __("Confirm Security Password")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input type="password" class="col-sm-6 col-xs-12" id="confirmSecurityPassword" name="confirmSecurityPassword">
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend class="section">
                  <?php echo __("Personal Information")?>
                </legend>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="control-group">
                      <label class="control-label" for="fullname">
                        <?php echo __("Full Name")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input name="fullname" type="text" id="fullname" class="col-sm-6 col-xs-12"/>
                      </div
                      <div class="control-group">
                        <label class="control-label" for="nric">
                          <?php echo __("NRIC")?><span class="mandatory">*</span>
                        </label>

                        <div class="controls form-group">
                          <input name="nric" type="text" id="nric" class="col-sm-6 col-xs-12"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("Date of Birth")?>
                        </label>

                        <div class="controls form-group">
                          <select id="dob_year"></select>
                          <select id="dob_month"></select>
                          <select id="dob_day"></select>
                          <input name="dob" readonly="readonly" type="hidden" id="dob" class="bp_05"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("Address")?><span class="mandatory">*</span>
                        </label>

                        <div class="controls form-group">
                          <input type="text" name="address" class='col-sm-6 col-xs-12' value="" id="address"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("Address")?> 2
                        </label>

                        <div class="controls form-group">
                          <input type="text" name="address2" class='col-sm-6 col-xs-12' value=""/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("City / Town")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" name="city" class='col-sm-6 col-xs-12' value="" id="city"/>
                        </div>
                      </div>

                                <span class="help-block" style="color: #D2D2D2">
                                <?php echo __('Please enter \'0\' if postal code is not applicable in your country.') ?>
                                </span>

                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("Zip / Postal Code")?>
                        </label>

                        <div class="controls form-group">
                          <input type="text" name="zip" class='col-sm-6 col-xs-12' value="" id="zip"/>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("State / Province")?><span class="mandatory">*</span>
                        </label>

                        <div class="controls form-group">
                          <input type="text" name="state" class='col-sm-6 col-xs-12' value="" id="state"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("Country")?>
                        </label>

                        <div class="controls form-group">
                          <?php include_component('component', 'countrySelectOption', array('countrySelected' => "China (PRC)", 'countryName' => 'country', 'countryId' => 'country')) ?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="sponsorId">
                          <?php echo __("Gender")?>
                        </label>

                        <div class="controls form-group">
                          <select name="gender" class='col-sm-6 col-xs-12'>
                            <option value="" selected="selected"><?php echo __('Please Select') ?></option>
                            <option value="M"><?php echo __('Male') ?></option>
                            <option value="F"><?php echo __('Female') ?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
              </fieldset>
              <fieldset>
                <legend class="section">
                  <?php echo __("Contact Details")?>
                </legend>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="control-group">
                      <label class="control-label" for="sponsorId">
                        <?php echo __("Telephone Number")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input type="text" class="col-sm-6 col-xs-12" id="contactNumber" name="contactNumber">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="sponsorId">
                        <?php echo __("Primary Email")?><span class="mandatory">*</span>
                      </label>

                      <div class="controls form-group">
                        <input type="text" class="col-sm-6 col-xs-12" id="email" name="email">
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend class="section">
                  <?php echo __("Selected Package")?>
                </legend>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="control-group">
                      <label class="control-label" for="sponsorId">
                        <?php echo __("Package")?>
                      </label>

                      <div class="controls form-group">
                        <input type="text" class="inputbox" id="packageName" name="packageName" value="<?php echo __($selectedPackage->getPackageName());?>" readonly="readonly">
                        <input type="hidden" class="col-sm-6 col-xs-12" id="packageId" name="packageId" value="<?php echo $selectedPackage->getPackageId();?>" readonly="readonly">
                        <input type="hidden" class="col-sm-6 col-xs-12" id="amountNeeded" name="amountNeeded" value="<?php echo $amountNeeded;?>" readonly="readonly">
                        &nbsp;<input type="text" class="inputbox" id="amountNeeded2" name="amountNeeded2" value="<?php echo $systemCurrency; ?>&nbsp;<?php echo number_format($amountNeeded, 2);?>" readonly="readonly">
                        &nbsp;
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="control-group">
                      <label class="control-label" for="sponsorId">
                        <?php echo __("Register Remark")?>
                      </label>

                      <div class="controls form-group">
                        <textarea rows="3" cols="50" name="registerRemark" id="registerRemark"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="form-actions">
                <button type="button" id="btnSubmit" class="btn btn-danger">
                  <i class="icon-ok bigger-110"></i>
                  <?php echo __("Submit");?>
                </button>
                <a href="/member/summary" class="btn btn-default"><?php echo __("Cancel");?></a>
              </div>
              </form>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
