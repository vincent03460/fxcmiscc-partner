<?php use_helper('I18N') ?>

	<script>
	$(function() {
		$("#transferForm").validate({
            messages : {
                newPassword2: {
                    equalTo: "Please enter the same password as above"
                }
            },
            rules : {
                "sponsorId" : {
                    required: true,
                    minlength : 8
                },
                "ecashAmount" : {
                    required : true
                },
                "trxPassword" : {
                    required : true,
                    equalTo: "#newPassword"
                }
            },
            submitHandler: function(form) {
                /*if ($.trim($("#oldPassword").val()) == "") {
                    alert("Old password cannot be blank.");
                    $("#oldPassword").focus();
                    return false;
                }
                if ($.trim($("#newPassword").val()) == "") {
                    alert("New password cannot be blank.");
                    $("#newpassword").focus();
                    return false;
                }
                if ($.trim($("#newPassword2").val()) == "") {
                    alert("Re-enter password cannot be blank.");
                    $("#newpassword").focus();
                    return false;
                }
                if ($.trim($("#newPassword").val()) != $.trim($("#newPassword2").val())) {
					alert("New password do not match.");
					$("#newPassword").val("").focus();
					$("#newPassword2").val("");
					return false;
				}*/
                waiting();
                form.submit();
            }
        });
        
        $("ecashAmount").decimalMask({
			separator: ".",
		  	decSize: 2,
		  	intSize: 8,
		  	minValue:0,
            maxValue:<?php echo $ecash-1; ?>
		});
	});
	
	function verifySponsorId() {
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
                        error("Invalid Member ID");
                        $('#sponsorId').focus();
                        $("#sponsorName").html("");
                    } else {
                        $.unblockUI();
                        $("#sponsorName").html(data.fullname);
                    }
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Your login attempt was not successful. Please try again.");
                }
            });
    }
	</script>

<form action="/member/doEcashTransfer" id="transferForm" method="post">

<table cellpadding="0" cellspacing="5" align="center" border="0">
    <tr>
        <td>
			<font color='white'><?php echo __('Member ID'); ?></font>
		</td>
		<td>
			<input name="sponsorId" type="text" id="sponsorId" tabindex="1" />
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Trader Name'); ?></font>
		</td>
		<td>
			<span id="sponsorName"></span>
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('e-Wallet'); ?></font>
		</td>
		<td>
			<input name="ecashBalance" id="ecashBalance" tabindex="2" />
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Transfer MT4 Credit Amount'); ?></font>
		</td>
		<td>
			<input name="ecashAmount" id="ecashAmount" tabindex="3" />
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Security Password'); ?></font>
		</td>
		<td>
			<input name="trxPassword" type="password" id="trxPassword" tabindex="4" />
		</td>
    </tr>
    <tr>
    	<td colspan=2><font color="#dc143c"> <?php echo __('every transfer action need to pay USD1.00 processing fees') ?></font></td>
    </tr>
    <tr>
    	<td colspan=2 align='center'>
    	<?php if ($sf_flash->has('errorMsg')): ?>
			<span class="error-font"><?php echo $sf_flash->get('errorMsg') ?></span>
		<?php endif; ?>
		<?php if ($sf_flash->has('successMsg')): ?>
			<span class="font"><?php echo $sf_flash->get('successMsg') ?></span>
		<?php endif; ?>
    	</td>
    </tr>
    <tr>
        <td colspan=2 align='center'>
			<input type="submit" name="Button1" value="<?php echo __('Submit') ?>" language="javascript" id="btnTransfer" tabindex="5"/>
		</td>
    </tr>
</table>
</form>