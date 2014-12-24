<link rel="stylesheet" type="text/css" href="/js/uploadify-v3.1/uploadify.css" />

<script type="text/javascript" src="/js/uploadify-v3.1/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript">
var jform = null;

$(function(){
    $("#btnUpload").click(function(){
        waiting();
    });
}); // end $(function())

</script>

<form id="uploadForm" method="post" action="<?php echo url_for("/marketing/fundManagementUpload")?>"  enctype="multipart/form-data">
<div style="padding: 10px; top: 30px; position: absolute; width: 1100px">
<div class="portlet">
    <div class="portlet-header">Fund Management Upload</div>
    <div class="portlet-content">

	<table width="100%" border="0">
        <tr>
            <td colspan="2"><br>
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
            </td>
        </tr>
		<tr>
            <th class="caption">Fund Management</th>
			<td class="value">
                <?php echo input_file_tag('fundManagement', array("id" => "fundManagement", "name" => "fundManagement")); ?>
			</td>
		</tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
		<tr>
            <td colspan="2">
                <button id="btnUpload">Upload</button>
			</td>
		</tr>
	</table>
    </div>
</div>
</div>

</form>