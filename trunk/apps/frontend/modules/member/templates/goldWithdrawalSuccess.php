<?php use_helper('I18N') ?>

	<script>	
	$(function() {
		$("#withdrawForm").validate({
            messages : {
                transactionPassword: {
                    remote: "Security Password is not valid."
                }
            },
            rules : {
                "goldAmount" : {
                    required : true
                },
                /*"trxPassword" : {
                    required : true
                },*/
                "transactionPassword" : {
                    required : true
                    , remote: "/member/verifyTransactionPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                var amount = $('#goldAmount').autoNumericGet();
                if (parseFloat($("#goldBalance").val()) < parseFloat(amount)) {
					alert("In-sufficient gold");
					return false;
				}
				
				$("#goldAmount").val(amount);
                form.submit();
            }
        });
        
        $('#goldAmount').autoNumeric({
			mDec: 0
            //,vMin:500
		});
	});
	</script>

<form action="/member/goldWithdrawal" id="withdrawForm" method="post">
<table cellpadding="0" cellspacing="5" align="center" border="0">
    <tr>
        <td>
			<font color='white'><?php echo __('Gold Dividend Balance'); ?></font>
		</td>
		<td>
			<input name="goldBalance" id="goldBalance" tabindex="1" disabled="disabled" value="<?php echo number_format($TblAccount->getFBalance(),2,'.',''); ?>"/>
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Gold Amount'); ?></font>
		</td>
		<td>
			<input name="goldAmount" id="goldAmount" tabindex="2"/>
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Security Password'); ?></font>
		</td>
		<td>
			<input name="transactionPassword" type="password" id="transactionPassword" tabindex="3" />
		</td>
    </tr>
    <tr>
    	<td colspan=2 align='center'>
    	<?php if ($sf_flash->has('errorMsg')): ?>
			<span class="error-font"><?php echo __($sf_flash->get('errorMsg')) ?></span>
		<?php endif; ?>
		<?php if ($sf_flash->has('successMsg')): ?>
			<span class="font"><?php echo __($sf_flash->get('successMsg')) ?></span>
		<?php endif; ?>
    	</td>
    </tr>
    <tr>
        <td colspan=2 align='center'>
			<input type="submit" name="Button1" value="<?php echo __('Submit') ?>" language="javascript" id="btnWithdraw" tabindex="5"/>
		</td>
    </tr>
</table>
</form>