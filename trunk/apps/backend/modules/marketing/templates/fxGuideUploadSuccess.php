<link rel="stylesheet" type="text/css" href="/js/uploadify-v3.1/uploadify.css" />

<script type="text/javascript" src="/js/uploadify-v3.1/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript">
var jform = null;

$(function(){

}); // end $(function())

</script>

<?php //echo form_tag('marketing/uploadify', 'id=uploadForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1100px">
<div class="portlet">
    <div class="portlet-header">Fx Guide Upload</div>
    <div class="portlet-content">
	<table width="100%" border="0">
		<tr>
            <th class="caption">English Version</th>
			<td class="value">
                <iframe name="englishframe" src="/download/uploadFxGuideEN" frameborder="0" scrolling="auto" width="500" height="100" marginwidth="5" marginheight="5" ></iframe>
			</td>
		</tr>
		<tr>
            <th class="caption">Chinese Version</th>
			<td class="value">
                <iframe name="chineseframe" src="/download/uploadFxGuideCN" frameborder="0" scrolling="auto" width="500" height="100" marginwidth="5" marginheight="5" ></iframe>
			</td>
		</tr>
	</table>
    </div>
</div>
</div>

<!--</form>-->