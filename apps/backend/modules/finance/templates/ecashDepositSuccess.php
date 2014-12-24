<?php use_helper('I18N') ?>

	<script>
	$(function() {
		$("#financeForm").validate({
            messages : {
                sponsorId: {
                    equalTo: "Please enter Trader name"
                },
                ecash_amount: {
                    equalTo: "Please enter ecash amount"
                }
            },
            rules : {
                "sponsorId" : {
                    required : true,
                    minlength : 8
                },
                "ecash_amount" : {
                    required : true,
                    minlength : 1
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        
        $("#sponsorId").change(function(){
        	if ($.trim($('#sponsorId').val()) != "") {
            	verifySponsorId();
            }
        });
	});
	
	function verifySponsorId() {
        waiting();
    	$.ajax({
        	type : 'POST',
            url : "<?php echo url_for('finance/verifySponsorId') ?>",
            dataType : 'json',
            cache: false,
            data: {
            	sponsorId : $('#sponsorId').val()
            },
                success : function(data) {
                    if (data == null || data == "") {
                        alert("Invalid Trader ID");
                        $('#sponsorId').focus();
                        $("#sponsorName").html("");
                    } else {
                        $.unblockUI();
                        $("#sponsorName").html(data.nickname);
                        $("#sponsorEcash").html(data.ecash);
                    }
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Your login attempt was not successful. Please try again.");
                }
            });
    }
	</script>

<?php echo form_tag('finance/ecashDeposit', 'id=financeForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 800px">
<div class="portlet">
    <div class="portlet-header">Ecash Deposit</div>
    <div class="portlet-content">
<table cellpadding="0" cellspacing="5" align="center" border="0">
    <tr>
        <td>
			<font color='black'><?php echo __('Trader ID'); ?></font>
		</td>
		<td>
			<input name="sponsorId" type="text" id="sponsorId" tabindex="1" maxlength="8" />
		</td>
    </tr>
    <tr>
        <td>
			<font color='black'><?php echo __('Trader Name'); ?></font>
		</td>
		<td>
			<span id="sponsorName"></span>
		</td>
    </tr>
    <tr>
        <td>
			<font color='black'><?php echo __('Trader Ecash Balance'); ?></font>
		</td>
		<td>
			<span id="sponsorEcash"></span>
		</td>
    </tr>
    <tr>
        <td>
			<font color='black'><?php echo __('Deposit Amount'); ?></font>
		</td>
		<td>
			<input name="ecash_amount" type="text" id="ecash_amount" tabindex="3" maxlength="4" />
		</td>
    </tr>
    <tr>
        <td>
			<font color='black'><?php echo __('Remark'); ?></font>
		</td>
		<td>
			<input name="remark" type="text" id="remark" tabindex="4" maxlength="100" />
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
    	</td>
    </tr>
    <tr>
        <td colspan=2 align='center'>
			<input type="submit" name="Button1" value="<?php echo __('Submit') ?>" language="javascript" id="btnSubmit" tabindex="5"/>
            <div id="ValidationSummary1" style="color:Red;width:200px;display:none;">
            </div>
		</td>
    </tr>
</table>
    </div>
</div>
</div>
</form>