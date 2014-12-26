<?php use_helper('I18N') ?>
<?php use_helper('Object') ?>

	<script>
	$(function() {
		$("#purchaseForm").validate({
            messages : {
                transactionPassword: {
                    remote: "Security Password is not valid."
                }
            },
            rules : {
                /*"pinQty" : {
                    required: true
                },*/
                "transactionPassword" : {
                    required : true,
                    remote: "/member/verifyTransactionPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                if (parseFloat($("#ecashBalance").val()) < parseFloat($("#ttlAmount").val())) {
					alert("In-sufficient MT4 Credit.");
					return false;
				}
                
                form.submit();
            },
            onkeyup: false
        });
        
		/*$("#pinQty").numeric({
            decimal:false,
            minValue:0,
            maxValue:1000
        });*/
        $("#pinQty").change(function(){
            calc();
        });
        calc();
	});
	
	function calc(){
		document.getElementById('ttlAmount').value = document.getElementById('pinQty').value * document.getElementById('pinPrice').value;
	}
	</script>

<form action="/member/purchasePin" id="purchaseForm" name="purchaseForm" method="post">
<table cellpadding="0" cellspacing="5" align="center" border="0">
    <tr>
        <td>
			<font color='white'><?php echo __('e-Wallet'); ?></font>
		</td>
		<td>
			<input name="ecashBalance" id="ecashBalance" tabindex="-1" readonly="readonly" value="<?php echo number_format($TblAccount->getFBalance(),2,'.',''); ?>"/>
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Quantity'); ?></font>
		</td>
		<td>
			<!--<input name="pinQty" id="pinQty" tabindex="1" onKeyUp="javascript:calc()"/>-->
            <select name="pinQty" id="pinQty" class='textbox'>
                <?php
                    foreach($arrs as $arr)
                        echo "<option value='".$arr."'>".$arr."</option>";
                ?>
            </select>
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Required Amount'); ?></font>
		</td>
		<td>
			<input name="ttlAmount" id="ttlAmount" tabindex="-1" readonly="readonly" onKeyUp ="javascript:calc()"/>
		</td>
    </tr>
    <tr>
        <td>
			<font color='white'><?php echo __('Security Password'); ?></font>
		</td>
		<td>
			<input name="transactionPassword" type="password" id="transactionPassword" tabindex="2" />
		</td>
    </tr>
    <tr>
    	<td colspan=2 align='center'>
    	<?php if ($sf_flash->has('errorMsg')): ?>
			<span class="error-font"><?php echo $sf_flash->get('errorMsg') ?></span>
		<?php endif; ?>
		<?php if ($sf_flash->has('successMsg')): ?>
			<span class="font"><?php echo $sf_flash->get('successMsg') ?></span>
		<?php endif; ?>
		<span class="font"><?php echo __('Refer to MGIG management')?></span>
    	</td>
    </tr>
    <tr>
        <td colspan=2 align='center'>
			<input type="submit" name="Button1" value="<?php echo __('Submit') ?>" language="javascript" id="btnPurchase" tabindex="5"/>
		</td>
    </tr>
</table>

<input type="hidden" name="pinPrice" id="pinPrice" value="<?php echo $pinPrice; ?>">
</form>