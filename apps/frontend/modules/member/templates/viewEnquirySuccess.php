<?php use_helper('I18N') ?>
<?php include('scripts.php'); ?>

<table cellpadding="0" cellspacing="5" align="center" border="0">
<tr>
	<td><font color='white'><?php echo __('Title'); ?></font></td>
	<td><?php echo input_tag('title', $TblEnquiry->getFTitle(), 'size=50') ?></td>
</tr>
<tr>
	<td><font color='white'><?php echo __('Message'); ?></font></td>
	<td><?php echo textarea_tag('message', $TblEnquiry->getFQuestion(), 'size=50x5') ?></td>
</tr>
<tr>
	<td><font color='white'><?php echo __('Reply'); ?></font></td>
	<td><?php echo textarea_tag('message', $TblEnquiry->getFAnswer(), 'size=50x8') ?></td>
</tr>
<tr>
	<td colspan=2 align='center'><INPUT type=button value="Back" onClick="history.back();"></td>
</tr>
</table>
