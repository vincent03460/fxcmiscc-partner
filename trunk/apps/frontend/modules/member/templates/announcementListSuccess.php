<?php include('scripts.php'); ?>

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('Announcement List') ?></p></div>

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
        <?php
        $culture = $sf_user->getCulture();
        foreach ($announcements as $announcement) { ?>
        <div class="popinfo1">
            <a href="<?php echo url_for("/member/announcement?id=".$announcement->getAnnouncementId())?>">
                <div class="poptitle"><?php
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
                    echo $announcement->getShortContent();
                else if ($culture == "jp")
                    echo $announcement->getShortContentJp();
                else
                    echo $announcement->getShortContentCn();
                ?>
            </div>
            <a href="<?php echo url_for("/member/announcement?id=".$announcement->getAnnouncementId())?>"><?php echo __('Read More') ?> &gt;&gt;</a>
        </div>
        <div class="popdivider"></div>
        <?php } ?>
        <p></p>
    </td>
</tr>
</tbody>
</table>

    <td width="15px">&nbsp;</td>
    </tr>
</table>