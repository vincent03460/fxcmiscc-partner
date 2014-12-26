<?php use_helper('I18N') ?>

<style type="text/css">
.uploadbox {
font-family: verdana, arial, sans-serif;
font-size: 100%;
color: #800000;
font-weight: normal;
border: #797979 1px solid;
background-color: #F3F781;
border-color: brown;
width: 292px;
height: 22px;
}
</style>

	<script>
	function formchecking() {
		if (document.getElementById('upload_file').value == '') {
			alert('Please select file to upload');
			return false;
		}
	}
	</script>

<form action="/member/uploadVerification" id="verificationForm" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="5" border="0">
    <tr>
        <td>
			<font color='white'><?php echo __('Upload Document'); ?></font>
		</td>
        <?php if (count($TblVerification) == 0 ) {?>
		<td>
			<font color='white'><input name="upload_file" id="upload_file" type="file" class="uploadbox" onkeypress="return false" /></font>
		</td>
		<td>
			<input type="submit" value="<?php echo __('Submit') ?>" class="upload" name="btnImage" id="btnImage" onclick="return formchecking()">
		</td>
        <?php } ?>
    </tr>
</table>
</form>
<br>
<table cellpadding="0" cellspacing="5" align="center" border="0" width='100%'>
    <tr>
        <td>
			<table border='1' width='100%'>
			<tr valign="middle" style="background-color:#f1f1f1;height:32px;">
				<td align='center'><?php echo __('Documents') ?></td><td align='center'><?php echo __('Date Submitted') ?></td><td align='center'><?php echo __('Status') ?></td><td align='center'><?php echo __('Verified by') ?></td><td align='center'><?php echo __('Date Verified') ?></td><td align='center'><?php echo __('Remarks') ?></td>
			</tr>
			<?php 
			foreach($TblVerification as $verification){
				echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\">"
				."<td align='center'>".link_to(__('Download'), 'member/verificationFile?id='.$verification->getFId(), array (
                          'class' => 'activeLink'
                        ))."</td><td align='center'>".$verification->getFCreatedDatetime()."</td><td align='center'>".$verification->getFStatus()."</td><td align='center'></td><td align='center'></td><td align='center'></td></tr>";
			}	
			?>
			</table>
		</td>
    </tr>
</table>
