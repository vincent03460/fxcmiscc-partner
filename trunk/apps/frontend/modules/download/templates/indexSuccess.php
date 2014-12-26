<?php include('scripts_backend.php'); date_default_timezone_set('America/New_York'); ?>
<link rel="stylesheet" type="text/css" href="/js/uploadify-v3.1/uploadify.css" />

<script type="text/javascript" src="/js/uploadify-v3.1/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript">
var jform = null;

$(function(){
    $('#file_upload_ofxglobal').uploadify({
        'swf'      : '/js/uploadify-v3.1/uploadify.swf',
        'uploader' : '<?php echo url_for("/download/uploadify") ?>'
        // Put your options here
    });
}); // end $(function())

</script>

<?php echo form_tag('download/uploadify', 'id=uploadForm') ?>
<table width="100%" border="0">
    <tr>
        <td class="value">
            <input type="file" name="file_upload" id="file_upload_ofxglobal" />
        </td>
    </tr>
</table>
</form>