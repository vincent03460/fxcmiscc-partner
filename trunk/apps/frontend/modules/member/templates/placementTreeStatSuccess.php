<?php use_helper('I18N') ?>
<?php include('scripts.php'); ?>

<style type="text/css">
.stats-node table {
    border-collapse: collapse;
    width: 200px;
}
.stats-node-header {
    background: none repeat scroll 0 0 #BC8F3E;
    overflow: hidden;
    padding: 5px;
    text-align: center;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: bold;
}
.total-downlines {
    background: none repeat scroll 0 0 #979697;
    overflow: hidden;
    height: 22px;
    text-align: center;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: bold;
}
.stats-node .rank {
    color: #BC8F3E;
    font-weight: bold;
}

.stats-node td {
    font-size: 11px;
    font-weight: bold;
    padding: 2px;
    text-align: center;
    width: 50%;
}
.total-downlines {
    background: none repeat scroll 0 0 #979697;
    color: #FFFFFF;
}
.total-downlines-no {
    background: none repeat scroll 0 0 #979697;
    border-top: 1px solid white;
    color: #FFFFFF;
}

/*stat tree*/
.stats-node table {
    border-collapse: collapse;
    width: 200px;
}
.stats-node-header {
    background: none repeat scroll 0 0 #BC8F3E;
    overflow: hidden;
    padding: 5px;
    text-align: center;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: bold;
}
.total-downlines {
    background: none repeat scroll 0 0 #979697;
    overflow: hidden;
    height: 22px;
    text-align: center;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: bold;
}
.stats-node .rank {
    color: #BC8F3E;
    font-weight: bold;
}

.stats-node td {
    font-size: 11px;
    font-weight: bold;
    padding: 2px;
    text-align: center;
    width: 50%;
}
.total-downlines {
    background: none repeat scroll 0 0 #979697;
    color: #FFFFFF;
}
.total-downlines-no {
    background: none repeat scroll 0 0 #979697;
    border-top: 1px solid white;
    color: #FFFFFF;
}
</style>

<script type="text/javascript">
var packageStrings = "<option value=''></option>";
var datagrid = null;
$(function() {
    datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData){ // pass extra params to server
            aoData.push( { "name": "filterFullname", "value": $("#search_fullname").val()  } );
            aoData.push( { "name": "filterNickname", "value": $("#search_nickname").val()  } );
        },
        "reassignEvent" : function(){ // extra function for reassignEvent when JSON is back from server
            reassignDatagridEventAttr();
        },

        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sAjaxSource": "<?php echo url_for('member/pendingMemberList') ?>",
        "sPaginationType": "full_numbers",
        "aaSorting": [[7,'desc']],
        "aoColumns": [
		              { "sName" : "distributor_id", "bVisible" : false},
		              { "sName" : "distributor_id",  "bSortable": false, "fnRender": function ( oObj ) {
                            return "<a class='placementLink' id='placementLink' href='#'><?php echo __('Place Here');?></a>";
		  				}},
		              { "sName" : "distributor_code",  "bSortable": true},
		              { "sName" : "full_name",  "bSortable": true},
		              { "sName" : "nickname",  "bSortable": true},
		              { "sName" : "ic",  "bSortable": true},
		              { "sName" : "rank_code",  "bSortable": true},
		              { "sName" : "created_on",  "bSortable": true}
		]
    });

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
        $("#dgActivateMember").dialog("open");
        $("#uplineDistCode").val($(this).attr("uplineDistCode"));
        $("#uplinePosition").val($(this).attr("uplinePosition"));
    });
    $("#dgActivateMember").dialog("destroy");
    $("#dgActivateMember").dialog({
        autoOpen : false,
        modal : true,
        resizable : false,
        hide: 'clip',
        show: 'slide',
        width: 800,
        open: function() {
            datagrid.fnDraw();
        },
        close: function() {

        }
    });
    <?php
        if ($errorSearch == true) {
            echo "alert('Invalid Member ID.');";
        }
    ?>
});

function reassignDatagridEventAttr(){
    $(".placementLink").button({
        icons: {
            primary: "ui-icon-arrowthickstop-1-s"
        },
        text: false
    }).click(function(event){
		// stop event
		event.preventDefault();

		// event.target is <a> itself, parent() is <td>, while parent().parent() get <tr>
		//var id = alert("id = " +$(event.target).parent().parent().attr("id"));
		var id = $(this).parent().parent().attr("id");
        $("#sponsorDistId").val(id);

        var sure = confirm("<?php echo __('Are you sure want to place this member into this position?') ?>");
        if (sure) {
            waiting();
            $("#doAction").val("save");
            $("#transferForm").submit();
        }
	});
}
</script>

<div id="sub_title" class="highlight"><span class="taller red"></span>

<p style="font-size: 16px; font-weight: bold;"><?php echo __('Downline Stat') ?></p></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td width="15px" style="min-height: 600px;">&nbsp;</td>
        <td>

<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
    <td><br></td>
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
</tbody>
</table>

<form action="/member/placementTree" id="transferForm" method="post">
    <input type="hidden" name="uplineDistCode" id="uplineDistCode">
    <input type="hidden" name="uplinePosition" id="uplinePosition">
    <input type="hidden" name="sponsorDistId" id="sponsorDistId">
    <input type="hidden" name="doAction" id="doAction">
    <input type="hidden" name="p" value="<?php echo $pageDirection; ?>">

    <?php echo __("Member ID")?>&nbsp;<input size="8" id="distcode" name="distcode" value="<?php echo $distcode ?>"/>&nbsp;<button id="btnSearch"><?php echo __('Search') ?></button>

    <br>
</form>

<div id="dgActivateMember" title="<?php echo __('Activate Trader') ?>" style="display:none;">
    <table class="display" id="datagrid" border="0" width="100%">
        <thead>
        <tr>
            <th>distributor_id[hidden]</th>
            <th width="30px"></th>
            <th><?php echo __('Member Id') ?></th>
            <th><?php echo __('Full Name') ?></th>
            <th><?php echo __('Alias') ?></th>
            <th><?php echo __('Passport/ID Card No') ?></th>
            <th><?php echo __('Package Rank') ?></th>
            <th><?php echo __('Registered Date') ?></th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input size="15" type="text" id="search_fullname" value="" class="search_init" /></td>
            <td><input size="15" type="text" id="search_nickname" value="" class="search_init" /></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
    </table>
</div>

<link rel='stylesheet' type='text/css' media='screen' href='/css/network/stat.css'/>

<div style="width: 600px;"><div style="width: 140px; margin-left: 230px; float:left; overflow-x:hidden;" class="stats-node">
     <?php
        $distCode = $anode[0]['distCode'];
        $availableButton = $anode[0]['_available'];
        $textStr = "";
        $headColor = "";
        if ($distCode != "") {
            $distDB = $anode[0]['_self'];
            if ($hideDistGroup == true) {
                $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
                if ($pos === false) { // note: three equal signs

                } else {
                    $distCode = "Restricted to view member information";
                    $distDB->setDistributorCode($distCode);
                }
            }
            $headColor = $colorArr[$distDB->getRankId()]."_";
            $distPairingLedgerDB = $anode[0]['_dist_pairing_ledger'];
            //$timeStamp = strtotime($distDB->getCreatedOn());
            //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

            $textStr = $distDB->getNickName();
            $textStr .= "<br><a href='".url_for("/member/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
            $textStr .= "<br>".$distDB->getCreatedOn();
            $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
            $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
            $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
            $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[0]['_left_this_month_sales'],0)." | ".number_format($anode[0]['_right_this_month_sales'],0);
            $textStr .= "<br>";
        }
    ?>

    <div class="stats-top-more-node">
        <?php if ($isTop == false) { ?>
            <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distDB->getTreeUplineDistCode()) ?>"></a>
        <?php } ?>
    </div>
    <table cellspacing="0" cellpadding="0" border="1" class="statsNode">
        <tbody><tr>
            <td class="header" colspan="2">
                <img rel="<?php echo $distDB->getDistributorCode()?>" src="/css/network/<?php echo $headColor; ?>head.png" <?php echo $classAndAttr;?>></a>
                <div>
                <?php echo __('Username'); ?>: <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"><?php echo $distDB->getDistributorCode()?></a>
                <br><?php echo __('Nick Name'); ?>: <?php echo $distDB->getNickname()?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rank" colspan="2">
                <?php echo __('Rank'); ?>: <?php echo __($distDB->getRankCode())?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Left'); ?></td>
            <td><?php echo __('Right'); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('Total Group Member'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo number_format($anode[0]['_accumulate_left'],0) ?></td>
            <td><?php echo number_format($anode[0]['_accumulate_right'],0)?></td>
        </tr>
    </tbody></table>
</div>
    <div style="clear:both;"></div>
    <div style="width: 302px; margin-left: 149px; float:left; height: 24px;">
        <div style="width: 4px; overflow-x: hidden; margin-left: 149px; height: 20px;" class="stats-node-line-up stats-node-line"></div>
        <div style="width: 306px; margin-left:-2px; overflow-y: hidden; height: 4px;" class="stats-node-line-side stats-node-line"></div>
    </div>
<div style="clear:both;"></div>
<div style="width: 4px; overflow-x: hidden; margin-left: 147px; float:left; height: 20px;" class="stats-node-line-up stats-node-line"></div>
<div style="width: 4px; overflow-x: hidden; margin-left: 298px; float:left; height: 20px;" class="stats-node-line-up stats-node-line"></div>
<div style="clear:both;"></div>

<?php
    $distCode = $anode[1]['distCode'];
    $availableButton = $anode[1]['_available'];
    $textStr = "";
    $headColor = "";
    if ($distCode != "") {
        $distDB = $anode[1]['_self'];
        if ($hideDistGroup == true) {
            $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
            if ($pos === false) { // note: three equal signs

            } else {
                $distCode = "Restricted to view member information";
                $distDB->setDistributorCode($distCode);
            }
        }
        $distPairingLedgerDB = $anode[1]['_dist_pairing_ledger'];
        $headColor = $colorArr[$distDB->getRankId()]."_";
        //$timeStamp = strtotime($distDB->getCreatedOn());
        //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

        $textStr = $distDB->getNickName();
        $textStr .= "<br><a href='".url_for("/member/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
        $textStr .= "<br>".$distDB->getCreatedOn();
        $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
        $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
        $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
        $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[1]['_left_this_month_sales'],0)." | ".number_format($anode[1]['_right_this_month_sales'],0);
        $textStr .= "<br>";
    } else {
        $distDB = new MlmDistributor();
        $distPairingLedgerDB = new MlmDistPairing();
        $headColor = "black_";
    }
?>
<div style="width: 140px; margin-left: 79px; float:left; overflow-x:hidden;" class="stats-node">

    <table cellspacing="0" cellpadding="0" border="1" class="statsNode">
        <tbody><tr>
            <td class="header" colspan="2">
                <img rel="<?php echo $distDB->getDistributorCode()?>" src="/css/network/<?php echo $headColor; ?>head.png" <?php echo $classAndAttr;?>></a>
                <div>
                <?php echo __('Username'); ?>: <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"><?php echo $distDB->getDistributorCode()?></a>
                <br><?php echo __('Nick Name'); ?>: <?php echo $distDB->getNickname()?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rank" colspan="2">
                <?php echo __('Rank'); ?>: <?php echo __($distDB->getRankCode())?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Left'); ?></td>
            <td><?php echo __('Right'); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('Total Group Member'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo number_format($anode[1]['_accumulate_left'],0) ?></td>
            <td><?php echo number_format($anode[1]['_accumulate_right'],0)?></td>
        </tr>
    </tbody></table>

</div>

<?php
    $distCode = $anode[2]['distCode'];
    $availableButton = $anode[2]['_available'];
    $textStr = "";
    $headColor = "";
    if ($distCode != "") {
        $distDB = $anode[2]['_self'];
        if ($hideDistGroup == true) {
            $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
            if ($pos === false) { // note: three equal signs

            } else {
                $distCode = "Restricted to view member information";
                $distDB->setDistributorCode($distCode);
            }
        }
        $distPairingLedgerDB = $anode[2]['_dist_pairing_ledger'];
        $headColor = $colorArr[$distDB->getRankId()]."_";
        //$timeStamp = strtotime($distDB->getCreatedOn());
        //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

        $textStr = $distDB->getNickName();
        $textStr .= "<br><a href='".url_for("/member/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
        $textStr .= "<br>".$distDB->getCreatedOn();
        $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
        $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
        $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
        $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[2]['_left_this_month_sales'],0)." | ".number_format($anode[2]['_right_this_month_sales'],0);
        $textStr .= "<br>";
    } else {
        $distDB = new MlmDistributor();
        $distPairingLedgerDB = new MlmDistPairing();
        $headColor = "black_";
    }
?>
<div style="width: 140px; margin-left: 162px; float:left; overflow-x:hidden;" class="stats-node">

    <table cellspacing="0" cellpadding="0" border="1" class="statsNode">
        <tbody><tr>
            <td class="header" colspan="2">
                <img rel="<?php echo $distDB->getDistributorCode()?>" src="/css/network/<?php echo $headColor; ?>head.png" <?php echo $classAndAttr;?>></a>
                <div>
                <?php echo __('Username'); ?>: <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"><?php echo $distDB->getDistributorCode()?></a>
                <br><?php echo __('Nick Name'); ?>: <?php echo $distDB->getNickname()?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rank" colspan="2">
                <?php echo __('Rank'); ?>: <?php echo __($distDB->getRankCode())?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Left'); ?></td>
            <td><?php echo __('Right'); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('Total Group Member'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo number_format($anode[2]['_accumulate_left'],0) ?></td>
            <td><?php echo number_format($anode[2]['_accumulate_right'],0)?></td>
        </tr>
    </tbody></table>

</div>
<div style="clear:both;"></div>
    <div style="width: 79px; margin-left: 70px; float:left; height: 24px;">
        <div style="width: 4px; overflow-x: hidden; margin-left: 77px; height: 20px;" class="stats-node-line-up stats-node-line"></div>
        <div style="width: 166px; margin-left:-2px; overflow-y: hidden; height: 4px;" class="stats-node-line-side stats-node-line"></div>
    </div>
    <div style="width: 79px; margin-left: 223px; float:left; height: 24px;">
        <div style="width: 4px; overflow-x: hidden; margin-left: 77px; height: 20px;" class="stats-node-line-up stats-node-line"></div>
        <div style="width: 166px; margin-left:-2px; overflow-y: hidden; height: 4px;" class="stats-node-line-side stats-node-line"></div>
    </div>
<div style="clear:both;"></div>
<div style="width: 4px; overflow-x: hidden; margin-left: 68px; float:left; height: 20px;" class="stats-node-line-up stats-node-line"></div>
<div style="width: 4px; overflow-x: hidden; margin-left: 158px; float:left; height: 20px;" class="stats-node-line-up stats-node-line"></div>
<div style="width: 4px; overflow-x: hidden; margin-left: 136px; float:left; height: 20px;" class="stats-node-line-up stats-node-line"></div>
<div style="width: 4px; overflow-x: hidden; margin-left: 158px; float:left; height: 20px;" class="stats-node-line-up stats-node-line"></div>
<div style="clear:both;"></div>
<div style="width: 140px; margin-left: 0px; float:left; overflow-x:hidden;" class="stats-node">
    <?php
        $distCode = $anode[3]['distCode'];
        $availableButton = $anode[3]['_available'];
        $textStr = "";
        $headColor = "";
        if ($distCode != "") {
            $distDB = $anode[3]['_self'];
            if ($hideDistGroup == true) {
                $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
                if ($pos === false) { // note: three equal signs

                } else {
                    $distCode = "Restricted to view member information";
                    $distDB->setDistributorCode($distCode);
                }
            }
            $headColor = $colorArr[$distDB->getRankId()]."_";
            $distPairingLedgerDB = $anode[3]['_dist_pairing_ledger'];
            //$timeStamp = strtotime($distDB->getCreatedOn());
            //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

            $textStr = $distDB->getNickName();
            $textStr .= "<br><a href='".url_for("/member/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
            $textStr .= "<br>".$distDB->getCreatedOn();
            $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
            $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
            $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
            $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[3]['_left_this_month_sales'],0)." | ".number_format($anode[3]['_right_this_month_sales'],0);
            $textStr .= "<br>";
        } else {
            $distDB = new MlmDistributor();
            $distPairingLedgerDB = new MlmDistPairing();
            $headColor = "black_";
        }
    ?>

    <table cellspacing="0" cellpadding="0" border="1" class="statsNode">
        <tbody><tr>
            <td class="header" colspan="2">
                <img rel="<?php echo $distDB->getDistributorCode()?>" src="/css/network/<?php echo $headColor; ?>head.png" <?php echo $classAndAttr;?>></a>
                <div>
                <?php echo __('Username'); ?>: <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"><?php echo $distDB->getDistributorCode()?></a>
                <br><?php echo __('Nick Name'); ?>: <?php echo $distDB->getNickname()?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rank" colspan="2">
                <?php echo __('Rank'); ?>: <?php echo __($distDB->getRankCode())?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Left'); ?></td>
            <td><?php echo __('Right'); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('Total Group Member'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo number_format($anode[3]['_accumulate_left'],0) ?></td>
            <td><?php echo number_format($anode[3]['_accumulate_right'],0)?></td>
        </tr>
    </tbody></table>
    <?php if ($distCode != "") { ?>
    <div class="stats-bottom-more-node"><a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"></a></div>
    <?php } ?>
</div>

<div style="width: 140px; margin-left: 12px; float:left; overflow-x:hidden;" class="stats-node">
    <?php
        $distCode = $anode[4]['distCode'];
        $availableButton = $anode[4]['_available'];
        $textStr = "";
        $headColor = "";
        if ($distCode != "") {
            $distDB = $anode[4]['_self'];
            if ($hideDistGroup == true) {
                $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
                if ($pos === false) { // note: three equal signs

                } else {
                    $distCode = "Restricted to view member information";
                    $distDB->setDistributorCode($distCode);
                }
            }
            $headColor = $colorArr[$distDB->getRankId()]."_";
            $distPairingLedgerDB = $anode[4]['_dist_pairing_ledger'];
            //$timeStamp = strtotime($distDB->getCreatedOn());
            //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

            $textStr = $distDB->getNickName();
            $textStr .= "<br><a href='".url_for("/member/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
            $textStr .= "<br>".$distDB->getCreatedOn();
            $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
            $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
            $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
            $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[4]['_left_this_month_sales'],0)." | ".number_format($anode[4]['_right_this_month_sales'],0);
            $textStr .= "<br>";
        } else {
            $distDB = new MlmDistributor();
            $distPairingLedgerDB = new MlmDistPairing();
            $headColor = "black_";
        }
    ?>
    <table cellspacing="0" cellpadding="0" border="1" class="statsNode">
        <tbody><tr>
            <td class="header" colspan="2">
                <img rel="<?php echo $distDB->getDistributorCode()?>" src="/css/network/<?php echo $headColor; ?>head.png" <?php echo $classAndAttr;?>></a>
                <div>
                <?php echo __('Username'); ?>: <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"><?php echo $distDB->getDistributorCode()?></a>
                <br><?php echo __('Nick Name'); ?>: <?php echo $distDB->getNickname()?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rank" colspan="2">
                <?php echo __('Rank'); ?>: <?php echo __($distDB->getRankCode())?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Left'); ?></td>
            <td><?php echo __('Right'); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('Total Group Member'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo number_format($anode[4]['_accumulate_left'],0) ?></td>
            <td><?php echo number_format($anode[4]['_accumulate_right'],0)?></td>
        </tr>
    </tbody></table>
    <?php if ($distCode != "") { ?>
    <div class="stats-bottom-more-node"><a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"></a></div>
    <?php } ?>
</div>

<div style="width: 140px; margin-left: 12px; float:left; overflow-x:hidden;" class="stats-node">
    <?php
        $distCode = $anode[5]['distCode'];
        $availableButton = $anode[5]['_available'];
        $textStr = "";
        $headColor = "";
        if ($distCode != "") {
            $distDB = $anode[5]['_self'];
            if ($hideDistGroup == true) {
                $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
                if ($pos === false) { // note: three equal signs

                } else {
                    $distCode = "Restricted to view member information";
                    $distDB->setDistributorCode($distCode);
                }
            }
            $headColor = $colorArr[$distDB->getRankId()]."_";
            $distPairingLedgerDB = $anode[5]['_dist_pairing_ledger'];
            //$timeStamp = strtotime($distDB->getCreatedOn());
            //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

            $textStr = $distDB->getNickName();
            $textStr .= "<br><a href='".url_for("/member/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
            $textStr .= "<br>".$distDB->getCreatedOn();
            $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
            $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
            $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
            $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[5]['_left_this_month_sales'],0)." | ".number_format($anode[5]['_right_this_month_sales'],0);
            $textStr .= "<br>";
        } else {
            $distDB = new MlmDistributor();
            $distPairingLedgerDB = new MlmDistPairing();
            $headColor = "black_";
        }
    ?>
    <table cellspacing="0" cellpadding="0" border="1" class="statsNode">
        <tbody><tr>
            <td class="header" colspan="2">
                <img rel="<?php echo $distDB->getDistributorCode()?>" src="/css/network/<?php echo $headColor; ?>head.png" <?php echo $classAndAttr;?>></a>
                <div>
                <?php echo __('Username'); ?>: <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"><?php echo $distDB->getDistributorCode()?></a>
                <br><?php echo __('Nick Name'); ?>: <?php echo $distDB->getNickname()?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rank" colspan="2">
                <?php echo __('Rank'); ?>: <?php echo __($distDB->getRankCode())?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Left'); ?></td>
            <td><?php echo __('Right'); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('Total Group Member'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo number_format($anode[5]['_accumulate_left'],0) ?></td>
            <td><?php echo number_format($anode[5]['_accumulate_right'],0)?></td>
        </tr>
    </tbody></table>
    <?php if ($distCode != "") { ?>
    <div class="stats-bottom-more-node"><a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"></a></div>
    <?php } ?>
</div>

<div style="width: 140px; margin-left: 12px; float:left; overflow-x:hidden;" class="stats-node">
    <?php
        $distCode = $anode[6]['distCode'];
        $availableButton = $anode[6]['_available'];
        $textStr = "";
        $headColor = "";
        if ($distCode != "") {
            $distDB = $anode[6]['_self'];
            if ($hideDistGroup == true) {
                $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
                if ($pos === false) { // note: three equal signs

                } else {
                    $distCode = "Restricted to view member information";
                    $distDB->setDistributorCode($distCode);
                }
            }
            $headColor = $colorArr[$distDB->getRankId()]."_";
            $distPairingLedgerDB = $anode[6]['_dist_pairing_ledger'];
            //$timeStamp = strtotime($distDB->getCreatedOn());
            //$dateString = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);

            $textStr = $distDB->getNickName();
            $textStr .= "<br><a href='".url_for("/member/placementTree?distcode=".$distCode)."' class='viewDetail'>".$distCode."</a>";
            $textStr .= "<br>".$distDB->getCreatedOn();
            $textStr .= "<br>".__('Package Rank').": ".__($distDB->getRankCode());
            $textStr .= "<br>".__('Daily Max').": ".number_format($distPairingLedgerDB->getFlushLimit(),0);
            $textStr .= "<br>".__('Carry Forward CPS').": ".number_format($distPairingLedgerDB->getLeftBalance(),0)." | ".number_format($distPairingLedgerDB->getRightBalance(),0);
            $textStr .= "<br>".__('This Month CPS').": ".number_format($anode[6]['_left_this_month_sales'],0)." | ".number_format($anode[6]['_right_this_month_sales'],0);
            $textStr .= "<br>";
        } else {
            $distDB = new MlmDistributor();
            $distPairingLedgerDB = new MlmDistPairing();
            $headColor = "black_";
        }
    ?>
    <table cellspacing="0" cellpadding="0" border="1" class="statsNode">
        <tbody><tr>
            <td class="header" colspan="2">
                <img rel="<?php echo $distDB->getDistributorCode()?>" src="/css/network/<?php echo $headColor; ?>head.png" <?php echo $classAndAttr;?>></a>
                <div>
                <?php echo __('Username'); ?>: <a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"><?php echo $distDB->getDistributorCode()?></a>
                <br><?php echo __('Nick Name'); ?>: <?php echo $distDB->getNickname()?>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rank" colspan="2">
                <?php echo __('Rank'); ?>: <?php echo __($distDB->getRankCode())?>
            </td>
        </tr>
        <tr>
            <td><?php echo __('Left'); ?></td>
            <td><?php echo __('Right'); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('Total Group Member'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo number_format($anode[6]['_accumulate_left'],0) ?></td>
            <td><?php echo number_format($anode[6]['_accumulate_right'],0)?></td>
        </tr>
    </tbody></table>
    <?php if ($distCode != "") { ?>
    <div class="stats-bottom-more-node"><a href="<?php echo url_for("/member/placementTree?p=stat&distcode=".$distCode)?>"></a></div>
    <?php } ?>
</div>
<div style="clear:both;"></div>
<div style="clear:both;"></div></div>

<td width="15px">&nbsp;</td>
    </tr>
</table>