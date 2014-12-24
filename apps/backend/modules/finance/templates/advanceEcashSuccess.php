<?php use_helper('I18N') ?>

<script>
	$(function() {
		$("#financeForm").validate({
            messages : {
                sponsorId: {
                    equalTo: "Please enter Trader name"
                },
                total_ecash: {
                    equalTo: "Please enter MT4 Credit quantity"
                }
            },
            rules : {
                "sponsorId" : {
                    required : true
                },
                "total_ecash" : {
                    required : true
                }
            },
            submitHandler: function(form) {
                var amount = $('#total_ecash').autoNumericGet();
                $("#total_ecash").val(amount);
                form.submit();
            }
        });
        
        $("#sponsorId").change(function(){
        	if ($.trim($('#sponsorId').val()) != "") {
            	verifySponsorId();
            }
        });

        $('#total_ecash').autoNumeric({
            mDec: 0
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
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Your login attempt was not successful. Please try again.");
            }
        });
    }
</script>

<?php echo form_tag('finance/advanceEcash', 'id=financeForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 800px">
<div class="portlet">
    <div class="portlet-header">Advance MT4 Credit</div>
    <div class="portlet-content">
<table cellpadding="2" cellspacing="5" align="center" border="0">
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
			<font color='black'><?php echo __('MT4 Credit'); ?></font>
		</td>
		<td>
			<input name="total_ecash" type="text" id="total_ecash" tabindex="2"/>
		</td>
    </tr>
    <tr>
    	<td colspan=2 align='center'>
    	<?php if ($sf_flash->has('errorMsg')): ?>
			<span style="font-weight: bold;; color: #ff0000;"><?php echo $sf_flash->get('errorMsg') ?></span>
		<?php endif; ?>
		<?php if ($sf_flash->has('successMsg')): ?>
			<span style="font-weight: bold;; color: #000088;"><?php echo $sf_flash->get('successMsg') ?></span>
		<?php endif; ?>
    	</td>
    </tr>
    <tr>
        <td colspan=2 align='center'>
			<input type="submit" name="Button1" value="<?php echo __('Submit') ?>" language="javascript" id="btnSubmit" tabindex="3"/>
            <div id="ValidationSummary1" style="color:Red;width:200px;display:none;">
            </div>
		</td>
    </tr>
</table>
    </div>
</div>
</div>
</form>