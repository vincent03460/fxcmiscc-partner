<?php include('scripts.php'); ?>
<script type="text/javascript">
$(function() {
    $.populateDOB({
        dobYear : $("#dob_year")
        ,dobMonth : $("#dob_month")
        ,dobDay : $("#dob_day")
        ,dobFull : $("#dob")
    });

    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    /*jQuery.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s\_]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");*/

    $("#registerForm").validate({
        messages : {
            confirmPassword: {
                equalTo: "<?php echo __('Please enter the same password as above') ?>"
            },
            nickName: {
                remote: "<?php echo __('Nick Name already in use') ?>."
            },
            fullname: {
                remote: "<?php echo __('Full Name already in use') ?>."
            }
        },
        rules : {
            /*"userName" : {
                required : true,
                noSpace: true,
                loginRegex: true,
                <?php if ($sf_user->getAttribute(Globals::SESSION_MASTER_LOGIN) == Globals::TRUE && $sf_user->getAttribute(Globals::SESSION_DISTID) == Globals::LOAN_ACCOUNT_CREATOR_DIST_ID) {

                } else {?>
                minlength : 6,
                <?php } ?>
                remote: "/member/verifyUserName"
            },*/
            "nickName" : {
                required : true,
                noSpace: true,
                remote: "/member/verifyNickName"
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
            "fullname" : {
                required : true,
                minlength : 2
//                , remote: "/member/verifyFullName"
            },
            "address" : {
                required : true
            },
            /*"gender" : {
                required : true
            },
            "contactNumber" : {
                required : true
                , minlength : 10
            },*/
            "email" : {
                required : true
                /*, email: true*/
            },
            "qq" : {
                required : true
            }
        },
        submitHandler: function(form) {
            if ($.trim($('#sponsorId').val()) == "") {
                alert("<?php echo __('Referrer ID cannot be blank') ?>.");
                $('#sponsorId').focus();
            } else {
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
                        waiting();
                        if (data == null || data == "") {
                            alert("<?php echo __('Invalid Referrer ID') ?>");
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
            /*waiting();
            form.submit();*/
        },
        success: function(label) {
        }
    });

    $("#sponsorId").change(function() {
        if ($.trim($('#sponsorId').val()) != "") {
            verifySponsorId();
        }
    });
});

function verifySponsorId() {
    waiting();
    $.ajax({
        type : 'POST',
        url : "/member/verifyActiveSponsorId",
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

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('Member Registration') ?></p></div>


<form action="/member/doMemberRegistration" id="registerForm" method="post">
<input type="hidden" class="inputbox" id="packageId" name="packageId" value="<?php echo $selectedPackage->getPackageId();?>" readonly="readonly">
<input type="hidden" class="inputbox" id="productCode" name="productCode" value="<?php echo $productCode;?>" readonly="readonly">
<input type="hidden" name="uplineDistCode" id="uplineDistCode" value="<?php echo $uplineDistCode;?>"/>
<input type="hidden" name="treePosition" id="position" value="<?php echo $position;?>"/>

<table cellspacing="0" cellpadding="0">
<colgroup>
    <col width="1%">
    <col width="99%">
    <col width="1%">
</colgroup>
<tbody>
<tr>
    <td rowspan="3">&nbsp;</td>
    <td class=""></td>
    <td rowspan="3">&nbsp;</td>
</tr>
<tr>
    <td><br>
    </td>
</tr>
<tr>
<td>

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

<table cellspacing="0" cellpadding="0" class="textarea1">
<tbody>
<tr>
<td>
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
        <th colspan="2"><?php echo __('Referrer and Placement Position') ?></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Referrer ID') ?></td>
        <td>
            <input type="text" class="inputbox" id="sponsorId" name="sponsorId" value="<?php echo $sponsorId;?>" readonly="readonly">
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Referrer Name') ?></td>
        <td>
            <input type="text" class="inputbox" id="sponsorName" name="sponsorName" value="<?php echo $sponsorName;?>" readonly="readonly">
            &nbsp;
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
        <th><?php echo __('Account Login Details') ?></th>
        <th class="tbl_content_right"><!--Step 1 of 3--></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>

    <!--<tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php /*echo __('User Name') */?></td>
        <td>
            <input type="text" class="inputbox" id="userName" name="userName">
            &nbsp;
            <br>
            <?php /*echo __('Please choose a unique username for your account. Username accepts 3-32 characters, a-z, 0-9 and underscore (_) only.') */?>
        </td>
        <td>&nbsp;</td>
    </tr>-->

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Member Nick Name') ?></td>
        <td>
            <input type="text" class="inputbox" id="nickName" name="nickName">
            &nbsp;
            <br>
            <font color="#cc3333">*必填</font>
        </td>
        <td>&nbsp;</td>
    </tr>
    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Set Password') ?></td>
        <td>
            <input type="password" class="inputbox" id="userpassword" name="userpassword" value="111111">
            <br>
            <font color="#cc3333">*必填，6-20位！默认：111111</font>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Confirm Password') ?></td>
        <td>
            <input type="password" class="inputbox" id="confirmPassword" name="confirmPassword" value="111111">
            <br>
            <font color="#cc3333">*必填，校验两遍密码一致性！</font>
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Security Password') ?></td>
        <td>
            <input type="password" class="inputbox" id="securityPassword" name="securityPassword" value="222222">
            <br>
            <font color="#cc3333">*必填，6-20位！默认：222222</font>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Confirm Security Password') ?></td>
        <td>
            <input type="password" class="inputbox" id="confirmSecurityPassword" name="confirmSecurityPassword" value="222222">
            <br>
            <font color="#cc3333">*必填，校验两遍密码一致性！</font>
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
    <tr class="row_header">
        <th class="tbl_header_left">
            <div class="border_left_grey">&nbsp;</div>
        </th>
        <th><?php echo __('Personal Information') ?></th>
        <th></th>
    </tr>


    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Full Name') ?></td>
        <td>
            <input name="fullname" type="text" id="fullname" class="inputbox" value="我的盘"/>
            <font color="#cc3333">*必填</font>
        </td>
        <td>&nbsp;</td>
    </tr>

    <!--<tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php /*echo __('NRIC') */?></td>
        <td>
            <input name="ic" type="text" id="ic" class="inputbox"/>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>-->


    <!--<tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php /*echo __('Date of Birth') */?></td>
        <td>
            <select id="dob_year"></select>
            <select id="dob_month"></select>
            <select id="dob_day"></select>
            <input name="dob" readonly="readonly" type="hidden" id="dob" class="bp_05"/>
        </td>
        <td>&nbsp;</td>
    </tr>-->

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php echo __('Address') ?></td>
        <td>
            <input type="text" name="address" class='inputbox' id="address" value="中国"/>
            <font color="#cc3333">*必填</font>
        </td>
        <td>&nbsp;</td>
    </tr>


    <!--<tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php /*echo __('Address') */?> 2&nbsp;</td>
        <td>
            <input type="text" name="address2" class='inputbox' value=""/>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php /*echo __('City / Town') */?></td>
        <td>
            <input type="text" name="city" class='inputbox' value="" id="city"/>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php /*echo __('Zip / Postal Code') */?></td>
        <td>
            <input type="text" name="zip" class='inputbox' value="" id="zip"/>
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php /*echo __('State / Province') */?></td>
        <td>
            <input type="text" name="state" class='inputbox' value="" id="state"/>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php /*echo __('Country') */?></td>
        <td>
            <?php /*include_component('component', 'countrySelectOption', array('countrySelected' => "China (PRC)", 'countryName' => 'country', 'countryId' => 'country')) */?>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>

    <tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php /*echo __('Gender') */?></td>
        <td>
            <select name="gender" class='inputbox'>
                <option value="" selected="selected"><?php /*echo __('Please Select') */?></option>
                <option value="M"><?php /*echo __('Male') */?></option>
                <option value="F"><?php /*echo __('Female') */?></option>
            </select>
            &nbsp;
        </td>
        <td>&nbsp;</td>
    </tr>-->

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Telephone Number') ?></td>
        <td>
            <input type="text" class="inputbox" id="contactNumber" name="contactNumber" value="111111">
        </td>
        <td>&nbsp;</td>
    </tr>


    <!--<tr class="tbl_form_row_even">
        <td>&nbsp;</td>
        <td><?php /*echo __('Email') */?></td>
        <td>
            <input type="text" class="inputbox" id="email" name="email">
            <br>
            <font color="#cc3333">*必填</font>
        </td>
        <td>&nbsp;</td>
    </tr>-->

    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('QQ') ?></td>
        <td>
            <input type="text" class="inputbox" id="email" name="email" value="我的QQ">
            <!--<input type="text" id="qq" value="" class="inputbox" name="qq">-->
            <font color="#cc3333">*必填</font>
            &nbsp;
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
    <tr class="row_header">
        <th class="tbl_header_left">
            <div class="border_left_grey">&nbsp;</div>
        </th>
        <th><?php echo __('Selected Package') ?></th>
        <th></th>
        <th class="tbl_header_right">
            <div class="border_right_grey">&nbsp;</div>
        </th>
    </tr>


    <tr class="tbl_form_row_odd">
        <td>&nbsp;</td>
        <td><?php echo __('Package') ?></td>
        <td>
            <input type="text" class="inputbox" id="packageName" name="packageName" value="<?php echo $selectedPackage->getPackageName();?>" readonly="readonly">
            &nbsp;
            <input type="hidden" class="inputbox" id="amountNeeded" name="amountNeeded" value="<?php echo $amountNeeded;?>" readonly="readonly">
            &nbsp;<input type="hidden" class="inputbox" id="amountNeeded2" name="amountNeeded2" value="<?php echo $systemCurrency; ?>&nbsp;<?php echo number_format($amountNeeded,2);?>" readonly="readonly">

            <input type="hidden" class="inputbox" id="ecashPaid" name="ecashPaid" value="<?php echo $ecashPaid;?>" readonly="readonly">
            <input type="hidden" class="inputbox" id="epointPaid" name="epointPaid" value="<?php echo $epointPaid;?>" readonly="readonly">
        </td>
        <td>&nbsp;</td>
    </tr>


    <tr class="tbl_form_row_even" style="display: none">
        <td>&nbsp;</td>
        <td><?php echo __('Placement Position') ?></td>
        <td>
            <div style="width:350px;">
                <input type="radio" id="radio_position1_0" checked="checked" value="0" name="position1"><label for="radio_position1_2" style="display: inline; font-size: 12px !important;"><?php echo __('Manual') ?></label>&nbsp;
                <input type="radio" id="radio_position1_1" value="1" name="position1"><label for="radio_position1_1" style="display: inline; font-size: 12px !important;"><?php echo __('Auto Left') ?></label>&nbsp;
                <input type="radio" id="radio_position1_2" value="2" name="position1"> <label for="radio_position1_2" style="display: inline; font-size: 12px !important;"><?php echo __('Auto Right') ?></label>
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>

    </tbody>
</table>
<br>
<table cellspacing="0" cellpadding="0" class="tbl_form">
<colgroup>
    <col width="1%">
    <col width="53%">
    <col width="18%">
    <col width="3%">
    <col width="8%">
    <col width="8%">
    <col width="1%">
</colgroup>

<tbody>

<tr class="tbl_listing_end">
    <td>&nbsp;</td>
    <td colspan="5" class="tbl_content_right">
             <input type="submit" name="" value="<?php echo __('Submit') ?>">
    </td>
    <td>&nbsp;</td>
</tr>
</tbody>
</table>   </td></tr></tbody></table></td></tr></tbody></table>

</form>