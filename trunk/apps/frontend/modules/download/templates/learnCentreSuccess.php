<?php include('scripts.php'); ?>
<style type="text/css">
    td.caption {
        background: none repeat scroll 0 0 #D9D9D9;
        border: 1px solid #FFFFFF;
        padding: 5px;
        width: 150px;
    }

    td.value {
        background: none repeat scroll 0 0 #E9E9E9;
        border: 1px solid #FFFFFF;
        padding: 5px;
    }
</style>
<script type="text/javascript">
    $(function() {

    });
</script>

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('Learn Centre'); ?></p></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td width="15px" style="min-height: 600px;">&nbsp;</td>
        <td>



<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
    <td><br>
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
    <td>
        <div style="overflow: hidden; width: 98%;" align="left">
            <!--<font size="6">手机MP4版本和苹果版本下载地址。<a href="http://pan.baidu.com/share/link?shareid=450521&amp;uk=2553714253 "></a><a
                href="http://pan.baidu.com/share/link?shareid=450521&amp;uk=2553714253 ">http://pan.baidu.com/share/link?shareid=450521&amp;uk=2553714253 </a></font>
            <a href="http://pan.baidu.com/share/link?shareid=450521&amp;uk=2553714253 "></a>-->
            <iframe src="http://player.youku.com/embed/XNTQ1MjU3MDg4" allowfullscreen="" frameborder="0" height="375"
                    width="600"></iframe>
        </div>
    </td>
</tr>
<tr>
    <tr>
        <br>
        <a href="/download/guide?p=en">核资本-英语版本翻译</a><br>
        <a href="/download/guide?p=ru">核资本-俄语版本翻译</a><br>
        <a href="/download/guide?p=ko">核资本-韩语版本翻译</a><br>
        <a href="/download/guide?p=ja">核资本-日语版本翻译</a><br>
    </tr>
</tr>
</tbody>
</table>

<div class="info_bottom_bg"></div>


    <td width="15px">&nbsp;</td>
    </tr>
</table>