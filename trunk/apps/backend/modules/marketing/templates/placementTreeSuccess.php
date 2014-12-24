<?php use_helper('I18N') ?>
<?php include('scripts_backend.php'); ?>
<script type="text/javascript">
var packageStrings = "<option value=''></option>";
$(function() {
    $(".viewDetail").button({
        icons: {
            primary: "ui-icon-circle-zoomin"
        }
    });
    $(".placement").button({
        icons: {
            primary: "ui-icon-circle-plus"
        }
    }).click(function(event){
        event.preventDefault();
    });
    <?php
        if ($errorSearch == true) {
            echo "alert('Invalid Trader ID.');";
        }
    ?>
});

</script>
<div class="portlet">
    <div class="portlet-header"><?php echo __('Placement Tree') ?></div>
    <div class="portlet-content">

<form action="/marketing/placementTree" id="transferForm" method="post">
    <input type="hidden" name="uplineDistCode" id="uplineDistCode">
    <input type="hidden" name="uplinePosition" id="uplinePosition">
    <input type="hidden" name="sponsorDistId" id="sponsorDistId">
    <input type="hidden" name="doAction" id="doAction">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tbody>
            <tr>
                <td colspan="18" align="left"><?php echo __("Trader ID")?>&nbsp;
                    <input size="8" type="text" id="distcode" name="distcode" value="<?php echo $distcode ?>"/>
                    <input type="submit" value="<?php echo __('Search') ?>" id="btnSearch" name="btnSearch"/>
                </td>
                <td>&nbsp;</td>
            </tr>
        <tr>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="5.5%">&nbsp;</td>
            <td width="1%">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="18" align="center"><img src="/images/logo.png" style="height:80px"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="18" align="center">
                <strong>
                <?php
                $distCode = $anode[0]['distCode'];
                $availableButton = $anode[0]['_available'];
                $textStr = "";
                if ($distCode != "") {
                    $distDB = $anode[0]['_self'];
                    $distPairingLedgerDB = $anode[0]['_dist_pairing_ledger'];
                    //$timeStamp = strtotime($distDB->getCreatedOn());
                    //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

                    $textStr = $distDB->getFullname();
                    $textStr .= "<br><a href='".url_for("/marketing/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
                    $textStr .= "<br>".$distDB->getCreatedOn();
                    $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
                    $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
                    $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
                    $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[0]['_left_this_month_sales'],0)." | ".number_format($anode[0]['_right_this_month_sales'],0);
                    $textStr .= "<br>";
                } else if ($availableButton == true) {
                    $textStr .= "<br><a href='#' class='placement'>".__('Available')."</a>";
                }

                echo $textStr;
                ?>
                </strong>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td colspan="6" style="border-right:1mm solid #2284C6; border-bottom:1mm solid #2284C6">&nbsp;</td>
            <td colspan="6" style="border-bottom:1mm solid #2284C6">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td colspan="6" style="border-left:1mm solid #2284C6">&nbsp;</td>
            <td colspan="6" style="border-right:1mm solid #2284C6">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6" align="center"><img src="/images/logo.png" style="height:80px"></td>
            <td colspan="6" align="center"></td>
            <td colspan="6" align="center"><img src="/images/logo.png" style="height:80px"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="6" align="center">
                <strong>
                <?php
                $distCode = $anode[1]['distCode'];
                $availableButton = $anode[1]['_available'];
                $textStr = "";
                if ($distCode != "") {
                    $distDB = $anode[1]['_self'];
                    $distPairingLedgerDB = $anode[1]['_dist_pairing_ledger'];
                    //$timeStamp = strtotime($distDB->getCreatedOn());
                    //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

                    $textStr = $distDB->getFullname();
                    $textStr .= "<br><a href='".url_for("/marketing/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
                    $textStr .= "<br>".$distDB->getCreatedOn();
                    $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
                    $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
                    $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
                    $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[1]['_left_this_month_sales'],0)." | ".number_format($anode[1]['_right_this_month_sales'],0);
                    $textStr .= "<br>";
                } else if ($availableButton == true) {
                    $textStr .= "<br><a href='#' class='placement' uplinePosition='LEFT' uplineDistCode='".$anode[0]['distCode']."'>".__('Available')."</a>";
                }

                echo $textStr;
                ?>
                </strong>
            </td>
            <td colspan="6" align="center"></td>
            <td colspan="6" align="center">
                <strong>
                <?php
                $distCode = $anode[2]['distCode'];
                $availableButton = $anode[2]['_available'];
                $textStr = "";
                if ($distCode != "") {
                    $distDB = $anode[2]['_self'];
                    $distPairingLedgerDB = $anode[2]['_dist_pairing_ledger'];
                    //$timeStamp = strtotime($distDB->getCreatedOn());
                    //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

                    $textStr = $distDB->getFullname();
                    $textStr .= "<br><a href='".url_for("/marketing/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
                    $textStr .= "<br>".$distDB->getCreatedOn();
                    $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
                    $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
                    $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
                    $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[2]['_left_this_month_sales'],0)." | ".number_format($anode[2]['_right_this_month_sales'],0);
                    $textStr .= "<br>";
                } else if ($availableButton == true) {
                    $textStr .= "<br><a href='#' class='placement' uplinePosition='RIGHT' uplineDistCode='".$anode[0]['distCode']."'>".__('Available')."</a>";
                }

                echo $textStr;
                ?>
                </strong>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2" style="border-right:1mm solid #2284C6; border-bottom:1mm solid #2284C6">&nbsp;</td>
            <td colspan="2" style="border-bottom:1mm solid #2284C6">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2" style="border-right:1mm solid #2284C6; border-bottom:1mm solid #2284C6">&nbsp;</td>
            <td colspan="2" style="border-bottom:1mm solid #2284C6">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="2" style="border-left:1mm solid #2284C6">&nbsp;</td>
            <td colspan="2" style="border-right:1mm solid #2284C6">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2" style="border-left:1mm solid #2284C6">&nbsp;</td>
            <td colspan="2" style="border-right:1mm solid #2284C6">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center"><img src="/images/logo.png" style="height:80px"></td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center"><img src="/images/logo.png" style="height:80px"></td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center"><img src="/images/logo.png" style="height:80px"></td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center"><img src="/images/logo.png" style="height:80px"></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center" >
            <strong>
                <?php
                $distCode = $anode[3]['distCode'];
                $availableButton = $anode[3]['_available'];
                $textStr = "";
                if ($distCode != "") {
                    $distDB = $anode[3]['_self'];
                    $distPairingLedgerDB = $anode[3]['_dist_pairing_ledger'];
                    //$timeStamp = strtotime($distDB->getCreatedOn());
                    //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

                    $textStr = $distDB->getFullname();
                    $textStr .= "<br><a href='".url_for("/marketing/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
                    $textStr .= "<br>".$distDB->getCreatedOn();
                    $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
                    $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
                    $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
                    $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[3]['_left_this_month_sales'],0)." | ".number_format($anode[3]['_right_this_month_sales'],0);
                    $textStr .= "<br>";
                } else if ($availableButton == true) {
                    $textStr .= "<br><a href='#' class='placement' uplinePosition='LEFT' uplineDistCode='".$anode[1]['distCode']."'>".__('Available')."</a>";
                }

                echo $textStr;
                ?>
                </strong>
            </td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center">
                <strong>
                <?php
                $distCode = $anode[4]['distCode'];
                $availableButton = $anode[4]['_available'];
                $textStr = "";
                if ($distCode != "") {
                    $distDB = $anode[4]['_self'];
                    $distPairingLedgerDB = $anode[4]['_dist_pairing_ledger'];
                    //$timeStamp = strtotime($distDB->getCreatedOn());
                    //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

                    $textStr = $distDB->getFullname();
                    $textStr .= "<br><a href='".url_for("/marketing/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
                    $textStr .= "<br>".$distDB->getCreatedOn();
                    $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
                    $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
                    $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
                    $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[4]['_left_this_month_sales'],0)." | ".number_format($anode[4]['_right_this_month_sales'],0);
                    $textStr .= "<br>";
                } else if ($availableButton == true) {
                    $textStr .= "<br><a href='#' class='placement' uplinePosition='RIGHT' uplineDistCode='".$anode[1]['distCode']."'>".__('Available')."</a>";
                }

                echo $textStr;
                ?>
                </strong>
            </td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center">
                <strong>
                <?php
                $distCode = $anode[5]['distCode'];
                $availableButton = $anode[5]['_available'];
                $textStr = "";
                if ($distCode != "") {
                    $distDB = $anode[5]['_self'];
                    $distPairingLedgerDB = $anode[5]['_dist_pairing_ledger'];
                    //$timeStamp = strtotime($distDB->getCreatedOn());
                    //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

                    $textStr = $distDB->getFullname();
                    $textStr .= "<br><a href='".url_for("/marketing/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
                    $textStr .= "<br>".$distDB->getCreatedOn();
                    $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
                    $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
                    $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
                    $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[5]['_left_this_month_sales'],0)." | ".number_format($anode[5]['_right_this_month_sales'],0);
                    $textStr .= "<br>";
                } else if ($availableButton == true) {
                    $textStr .= "<br><a href='#' class='placement' uplinePosition='LEFT' uplineDistCode='".$anode[2]['distCode']."'>".__('Available')."</a>";
                }

                echo $textStr;
                ?>
                </strong>
            </td>
            <td colspan="2" align="center"></td>
            <td colspan="2" align="center">
                <strong>
                <?php
                $distCode = $anode[6]['distCode'];
                $availableButton = $anode[6]['_available'];
                $textStr = "";
                if ($distCode != "") {
                    $distDB = $anode[6]['_self'];
                    $distPairingLedgerDB = $anode[6]['_dist_pairing_ledger'];
                    //$timeStamp = strtotime($distDB->getCreatedOn());
                    //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

                    $textStr = $distDB->getFullname();
                    $textStr .= "<br><a href='".url_for("/marketing/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
                    $textStr .= "<br>".$distDB->getCreatedOn();
                    $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
                    $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
                    $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
                    $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[6]['_left_this_month_sales'],0)." | ".number_format($anode[6]['_right_this_month_sales'],0);
                    $textStr .= "<br>";
                } else if ($availableButton == true) {
                    $textStr .= "<br><a href='#' class='placement' uplinePosition='RIGHT' uplineDistCode='".$anode[2]['distCode']."'>".__('Available')."</a>";
                }

                echo $textStr;
                ?>
                </strong>
            </td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
</form>
</div>
</div>