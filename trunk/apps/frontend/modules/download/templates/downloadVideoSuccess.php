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

<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
    <td class="tbl_sprt_bottom"><span class="txt_title">Download Video</span></td>
</tr>
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
        <?php //if ($distDB->getStatusCode() == Globals::STATUS_ACTIVE && $distDB->getDistributorCode() != "demo123") { ?>
        <table class="pbt_table">
            <tbody>
            <tr>
                <td rowspan="3"><img src="/images/download_video.jpg" width="160px"></td>
                <td>The forex video's describe the 3 Minutes trading strategy.
                    <br>
                    <!--<br>
                    premium download login: workhardclub@gmail.com
                    <br>
                    password: cm9c97fd-->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <a href="https://filepost.com/files/3bf537m2/Forexalpha_Final_171112.mp4/" target="_blank">Click to DOWNLOAD Forex Video</a>
                    <br>
                </td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>
</tbody>
</table>