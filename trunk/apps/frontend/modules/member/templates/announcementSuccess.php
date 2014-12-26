<?php include('scripts.php'); ?>

<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
    <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Announcement') ?></span></td>
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
        <a href="<?php echo url_for("/member/announcement?id=".$announcement->getAnnouncementId())?>">
            <div class="poptitle"><?php
                $culture = $sf_user->getCulture();
                if ($culture == "en")
                    echo $announcement->getTitle();
                else if ($culture == "jp")
                    echo $announcement->getTitleJp();
                else
                    echo $announcement->getTitleCn();
                ?></div>
        </a>

        <div class="news_date">
        <?php
            $dateUtil = new DateUtil();
            $currentDate = $dateUtil->formatDate("Y-m-d", $announcement->getCreatedOn());
            echo $currentDate;
            ?>
        </div>
        <div class="news_desc">
            <?php
            if ($culture == "en")
                echo $announcement->getContent();
            else if ($culture == "jp")
                echo $announcement->getContentJp();
            else
                echo $announcement->getContentCn();
            ?>
            <br>
            <br>
            <br>
            <a href="<?php echo url_for("/member/announcementList")?>"><?php echo __('Back to announcement list') ?></a>
        </div>
    </td>
</tr>
</tbody>
</table>