<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
$(function() {
    $("#btnUp").button({
        icons: {
            primary: "ui-icon-circle-arrow-n"
        }
    });
    $(".btnZoom").button({
        icons: {
            primary: "ui-icon ui-icon-circle-zoomin"
        }
    });
    $("#gotoTree").click(function(){
        $("#epointNeeded").val("-99");
        $("#topupForm").attr("action", "<?php echo url_for("/member/securityPasswordRequired") ?>");
        $("#topupForm").submit();
    });

    <?php
        if ($errorSearch == true) {
            echo "alert('Invalid Member ID.');";
        }
    ?>
});
</script>

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('Member List') ?></p></div>

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
            <form action="/member/placementTree" id="topupForm" name="topupForm" method="post">
            <input type="hidden" name="epointNeeded" id="epointNeeded" value="0"/>

            <table cellspacing="0" cellpadding="0" class="tbl_form">
                <colgroup>
                    <col width="1%">
                    <col width="30%">
                    <col width="69%">
                    <col width="1%">
                </colgroup>
                <tbody>
                <tr>
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th colspan="2"><?php echo __('Member List') ?></th>
<!--                    <th class="tbl_content_right"></th>-->
                    <th class="tbl_header_right">
                        <div class="border_right_grey" id="gotoTree">&nbsp;</div>
                    </th>
                </tr>

                <tr>
                    <td colspan="4">
                        <table class="pbl_table" border="1" cellspacing="3" cellpadding="3" style="c">
                            <tbody>
                            <tr class="pbl_header">
                                <td valign="middle" colspan="2"><?php echo __('Position') ?></td>
                                <td valign="middle"><?php echo __('Member') ?></td>
                                <td valign="middle"><?php echo __('Full Name') ?></td>
                                <td valign="middle"><?php echo __('Ranking') ?></td>
                                <td valign="middle"><?php echo __('Total Left') ?></td>
                                <td valign="middle"><?php echo __('Total Right') ?></td>
                            </tr>

                            <?php
                                $trStyle = "1";

                                $idx = 0;
                                $distCode = $anode[$idx]['distCode'];
                                if ($distCode != "") {
                                    $distDB = $anode[$idx]['_self'];

                                    $isTopStr = "";
                                    if ($isTop == false) {
                                        $isTopStr = "<a id='btnUp' href='".url_for("/member/placementTree?distcode=".$distDB->getTreeUplineDistCode())."'>UP</a>";
                                    }
                                    echo "<tr class='row" . $trStyle . "'>
                                        <td align='left' colspan='2'>1
                                        </td>
                                        <td align='left'><a class='btnZoom' href='".url_for("/member/placementTree?distcode=".$distDB->getDistributorCode())."'>" . $distDB->getDistributorCode() . "</a>
                                        ".$isTopStr."
                                        </td>
                                        <td align='center'>" . $distDB->getFullName() . "</td>
                                        <td align='center'>" . $distDB->getRankCode() . "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_left'],0). "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_right'],0). "</td>
                                    </tr>";

                                    if ($trStyle == "1") {
                                        $trStyle = "0";
                                    } else {
                                        $trStyle = "1";
                                    }
                                }
                                $idx++;
                                $distCode = $anode[$idx]['distCode'];
                                if ($distCode != "") {
                                    $distDB = $anode[$idx]['_self'];

                                    echo "<tr class='row" . $trStyle . "'>
                                        <td align='left' colspan='2'>1.1</td>
                                        <td align='left'><a class='btnZoom' href='".url_for("/member/placementTree?distcode=".$distDB->getDistributorCode())."'>" . $distDB->getDistributorCode() . "</a></td>
                                        <td align='center'>" . $distDB->getFullName() . "</td>
                                        <td align='center'>" . $distDB->getRankCode() . "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_left'],0). "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_right'],0). "</td>
                                    </tr>";

                                    if ($trStyle == "1") {
                                        $trStyle = "0";
                                    } else {
                                        $trStyle = "1";
                                    }
                                }
                                $idx++;
                                $distCode = $anode[$idx]['distCode'];
                                if ($distCode != "") {
                                    $distDB = $anode[$idx]['_self'];

                                    echo "<tr class='row" . $trStyle . "'>
                                        <td align='left' colspan='2'>1.2</td>
                                        <td align='left'><a class='btnZoom' href='".url_for("/member/placementTree?distcode=".$distDB->getDistributorCode())."'>" . $distDB->getDistributorCode() . "</a></td>
                                        <td align='center'>" . $distDB->getFullName() . "</td>
                                        <td align='center'>" . $distDB->getRankCode() . "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_left'],0). "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_right'],0). "</td>
                                    </tr>";

                                    if ($trStyle == "1") {
                                        $trStyle = "0";
                                    } else {
                                        $trStyle = "1";
                                    }
                                }
                                $idx++;
                                $distCode = $anode[$idx]['distCode'];
                                if ($distCode != "") {
                                    $distDB = $anode[$idx]['_self'];

                                    echo "<tr class='row" . $trStyle . "'>
                                        <td align='left' colspan='2'>1.1.1</td>
                                        <td align='left'><a class='btnZoom' href='".url_for("/member/placementTree?distcode=".$distDB->getDistributorCode())."'>" . $distDB->getDistributorCode() . "</a></td>
                                        <td align='center'>" . $distDB->getFullName() . "</td>
                                        <td align='center'>" . $distDB->getRankCode() . "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_left'],0). "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_right'],0). "</td>
                                    </tr>";

                                    if ($trStyle == "1") {
                                        $trStyle = "0";
                                    } else {
                                        $trStyle = "1";
                                    }
                                }
                                $idx++;
                                $distCode = $anode[$idx]['distCode'];
                                if ($distCode != "") {
                                    $distDB = $anode[$idx]['_self'];

                                    echo "<tr class='row" . $trStyle . "'>
                                        <td align='left' colspan='2'>1.1.2</td>
                                        <td align='left'><a class='btnZoom' href='".url_for("/member/placementTree?distcode=".$distDB->getDistributorCode())."'>" . $distDB->getDistributorCode() . "</a></td>
                                        <td align='center'>" . $distDB->getFullName() . "</td>
                                        <td align='center'>" . $distDB->getRankCode() . "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_left'],0). "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_right'],0). "</td>
                                    </tr>";

                                    if ($trStyle == "1") {
                                        $trStyle = "0";
                                    } else {
                                        $trStyle = "1";
                                    }
                                }
                                $idx++;
                                $distCode = $anode[$idx]['distCode'];
                                if ($distCode != "") {
                                    $distDB = $anode[$idx]['_self'];

                                    echo "<tr class='row" . $trStyle . "'>
                                        <td align='left' colspan='2'>1.2.1</td>
                                        <td align='left'><a class='btnZoom' href='".url_for("/member/placementTree?distcode=".$distDB->getDistributorCode())."'>" . $distDB->getDistributorCode() . "</a></td>
                                        <td align='center'>" . $distDB->getFullName() . "</td>
                                        <td align='center'>" . $distDB->getRankCode() . "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_left'],0). "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_right'],0). "</td>
                                    </tr>";

                                    if ($trStyle == "1") {
                                        $trStyle = "0";
                                    } else {
                                        $trStyle = "1";
                                    }
                                }
                                $idx++;
                                $distCode = $anode[$idx]['distCode'];
                                if ($distCode != "") {
                                    $distDB = $anode[$idx]['_self'];

                                    echo "<tr class='row" . $trStyle . "'>
                                        <td align='left' colspan='2'>1.2.2</td>
                                        <td align='left'><a class='btnZoom' href='".url_for("/member/placementTree?distcode=".$distDB->getDistributorCode())."'>" . $distDB->getDistributorCode() . "</a></td>
                                        <td align='center'>" . $distDB->getFullName() . "</td>
                                        <td align='center'>" . $distDB->getRankCode() . "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_left'],0). "</td>
                                        <td align='center'>" . number_format($anode[$idx]['_accumulate_right'],0). "</td>
                                    </tr>";

                                    if ($trStyle == "1") {
                                        $trStyle = "0";
                                    } else {
                                        $trStyle = "1";
                                    }
                                }
                                $idx++;


                            ?>
                            </tbody>
                        </table>
                    </td>
                </tr>

                </tbody>
            </table>

            </form>
        </td>
    </tr>
    </tbody>
</table>



<td width="15px">&nbsp;</td>
    </tr>
</table>