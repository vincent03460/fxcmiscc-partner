<?php use_helper('I18N') ?>
<?php include('scripts.php'); ?>

	<script>
	$(function() {
		$("#enquiryForm").validate({
            submitHandler: function(form) {
                waiting();
                if ($.trim($("#title").val()) == "") {
                    alert("Title cannot be blank.");
                    $("#title").focus();
                    return false;
                }
                if ($.trim($("#message").val()) == "") {
                    alert("Message cannot be blank.");
                    $("#message").focus();
                    return false;
                }
                form.submit();
            }
        });
	});
	</script>

<form action="/member/enquiry" method="post" id="enquiryForm" class="cmxform">
<table cellpadding="0" cellspacing="5" align="center" border="0">
<tr>
	<td><font color='white'><?php echo __('Title'); ?></font></td>
	<td><?php echo input_tag('title', '', 'size=50') ?></td>
</tr>
<tr>
	<td><font color='white'><?php echo __('Message'); ?></font></td>
	<td><?php echo textarea_tag('message', '', 'size=50x5') ?></td>
</tr>
<tr>
	<td colspan=2 align='center'><?php echo submit_tag(__('Submit')) ?></td>
</tr>
</table>
</form>
<br><br>
<table border='1' width='100%'>
	<tr valign="middle" style="background-color:#f1f1f1;height:32px;">
		<td align='center'><?php echo __('Title') ?></td><td align='center'><?php echo __('Status') ?></td><td align='center'><?php echo __('Reply By') ?></td><td align='center'><?php echo __('Reply Date') ?></td><td align='center'><?php echo __('View') ?></td>
	</tr>
	<?php
		foreach($TblEnquiry as $enquiry){
			$TblUser = TblUserPeer::retrieveByPk($enquiry->getFUserId());
			if($TblUser) $username = $TblUser->getFUsername();
			else $username = "";
			echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\"><td align='center'>".$enquiry->getFTitle()."</td><td align='center'>".$enquiry->getFStatus()."</td><td align='center'>".$username."</td><td align='center'>".$enquiry->getFCreatedDatetime()."</td><td align='center'>".link_to('View', 'member/viewEnquiry?id='.$enquiry->getFId())."</td></tr>";
		}	
	?>
</table>