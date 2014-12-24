<link rel="stylesheet" type="text/css" href="/js/uploadify-v3.1/uploadify.css" />

<script type="text/javascript" src="/js/uploadify-v3.1/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript">
var jform = null;

$(function(){

}); // end $(function())

</script>

<div style="padding: 10px; top: 30px; position: absolute; width: 1100px">
<div class="portlet">
    <div class="portlet-header">MT4 Upload</div>
    <div class="portlet-content">
	<table width="100%" border="0">
		<tr>
            <th class="caption">Standard Version</th>
			<td class="value">
                <form id="uploadForm" method="post" action="<?php echo url_for("/marketing/doUploadMT4");?>" enctype="multipart/form-data">
                    <table width="100%" border="0">
                        <tr>
                            <td class="value">
                                <?php echo input_file_tag('mt4Client', array("id" => "mt4Client", "name" => "mt4Client")); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="value" id="tdValue">
                                <button id="btnUpload">Upload</button>&nbsp;<font color="#dc143c"><?php if ($sf_flash->has('successMsg')): ?><?php echo $sf_flash->get('successMsg') ?><?php endif; ?></font>
                            </td>
                        </tr>
                    </table>
                </form>
			</td>
		</tr>
	</table>
    </div>
</div>
</div>
