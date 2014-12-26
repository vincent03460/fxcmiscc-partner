<?php include('scripts_backend.php'); date_default_timezone_set('America/New_York'); ?>
<script type="text/javascript">
var jform = null;

</script>

<form id="uploadForm" method="post" action="/download/doUploadChineseGuide" enctype="multipart/form-data">
<table width="100%" border="0">
    <tr>
        <td class="value">
            <?php echo input_file_tag('fxguide', array("id" => "fxguide", "name" => "fxguide")); ?>
        </td>
    </tr>
    <tr>
        <td class="value" id="tdValue">
            <button id="btnUpload">Upload</button>&nbsp;<font color="#dc143c"><?php if ($sf_flash->has('successMsg')): ?><?php echo $sf_flash->get('successMsg') ?><?php endif; ?></font>
        </td>
    </tr>
</table>
</form>