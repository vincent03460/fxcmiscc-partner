<?php use_helper('I18N') ?>

	<script>
	$(function() {
		$("#passwordForm").validate({
            messages : {
                newPassword2: {
                    equalTo: "Please enter the same password as above"
                }
            },
            rules : {
                "oldPassword" : {
                    required : true,
                    minlength : 3
                },
                "newPassword" : {
                    required : true,
                    minlength : 3
                },
                "newPassword2" : {
                    required : true,
                    minlength : 3,
                    equalTo: "#newPassword"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
	});
	</script>

<?php echo form_tag('admin/changePassword', 'id=passwordForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 800px">
<div class="portlet">
    <div class="portlet-header">Change Password</div>
    <div class="portlet-content">
<table cellpadding="0" cellspacing="5" align="center" border="0">
    <tr>
        <td>
			<font><?php echo __('Old Login Password'); ?></font>
		</td>
		<td>
			<input name="oldPassword" type="password" id="oldPassword" tabindex="1" />
		</td>
    </tr>
    <tr>
        <td>
			<font><?php echo __('New Login Password'); ?></font>
		</td>
		<td>
			<input name="newPassword" type="password" id="newPassword" tabindex="2" />
		</td>
    </tr>
    <tr>
        <td>
			<font><?php echo __('Re-enter Login Password'); ?></font>
		</td>
		<td>
			<input name="newPassword2" type="password" id="newPassword2" tabindex="3" />
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
			<input type="submit" name="Button1" value="<?php echo __('Change Password') ?>" language="javascript" id="btnPassword" tabindex="4"/>
            <div id="ValidationSummary1" style="color:Red;width:200px;display:none;">
            </div>
		</td>
    </tr>
</table>
    </div>
</div>
</div>
</form>