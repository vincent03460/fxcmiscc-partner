<?php
use_helper('I18N');
?>

<style>
    .column {
        width: 50%;
        float: left;
        padding-bottom: 100px;
    }

    .portlet {
        margin: 0 1em 1em 0;
    }

    .portlet-header {
        margin: 0.3em;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0.5em;
    }

    .portlet-header .ui-icon {
        float: right;
    }

    .portlet-content {
        padding: 1em;
    }

    .ui-sortable-placeholder {
        border: 1px dotted black;
        visibility: visible !important;
        height: 50px !important;
    }

    .ui-sortable-placeholder * {
        visibility: hidden;
    }
</style>
<script type="text/javascript">
var datagrid = null;
var datagridEPointPurchase = null;
var datagridPackageUpgradeHistory = null;
var datagridPackagePurchase = null;
$(function() {
    $(".column").sortable({
        connectWith: ".column"
    });
    //$(".column").disableSelection();
    /*datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push({ "name": "statusCode", "value": $("#search_combo_statusCode").val()  });
        },
        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
        },

        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sAjaxSource": "<?php echo url_for('admin/withdrawList') ?>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sName" : "withdraw.withdraw_id", "bVisible" : false},
            { "sName" : "withdraw.dist_id", "bVisible" : false},
            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
              return "<a id='editLink' href='<?php echo url_for('finance/withdrawalEdit?q=dsf453fsdfasf1sxfsdfs&withdrawId=') ?>/" + oObj.aData[0] + "'>" + oObj.aData[2] + "</a>";
            }},
            { "sName" : "dist.full_name",  "bSortable": true},
            { "sName" : "withdraw.deduct",  "bSortable": true},
            { "sName" : "withdraw.amount",  "bSortable": true},
            { "sName" : "withdraw.status_code",  "bSortable": true},
            { "sName" : "withdraw.created_on",  "bSortable": true}
            , { "sName" : "dist.ic",  "bVisible": false}
            , { "sName" : "dist.email",  "bVisible": false}
            , { "sName" : "dist.contact",  "bVisible": false}
            , { "sName" : "dist.bank_name",  "bVisible": false}
            , { "sName" : "dist.bank_acc_no",  "bVisible": false}
            , { "sName" : "dist.bank_holder_name",  "bVisible": false}
            , { "sName" : "dist.rank_code",  "bVisible": false}
            , { "sName" : "withdraw.remarks",  "bVisible": false}
            , { "sName" : "withdraw.dist_id",  "bVisible": true}
        ]
    });*/

    datagridEPointPurchase = $("#datagridEPointPurchase").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push({ "name": "filterUsername", "value": $("#search_username").val()  });
            aoData.push({ "name": "filterStatusCode", "value": '<?php echo Globals::STATUS_PENDING;?>'  });
        },
        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
        },

        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sAjaxSource": "<?php echo url_for('financeList/epointPurchaseList') ?>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sName" : "purchase.purchase_id", "bVisible" : false},
            { "sName" : "purchase.purchase_id", "bVisible" : false},
            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
                return "<a id='editLink' href='<?php echo url_for('finance/epointPurchaseEdit?q=dsf453fsdfasf1sxfsdfs&purchaseId=') ?>/" + oObj.aData[0] + "'>" + oObj.aData[2] + "</a>";
            }},
            { "sName" : "dist.full_name",  "bVisible": false},
            { "sName" : "purchase.amount",  "bSortable": true},
            { "sName" : "purchase.transaction_type",  "bSortable": true},
            { "sName" : "purchase.status_code",  "bVisible": false},
            { "sName" : "purchase.image_src",  "bVisible": false},
            { "sName" : "purchase.payment_reference",  "bVisible": false},
            { "sName" : "purchase.approve_reject_datetime",  "bVisible": false},
            { "sName" : "purchase.created_on",  "bSortable": true},
            { "sName" : "purchase.created_on",  "bVisible": false}
        ]
    });

    datagridPackageUpgradeHistory = $("#datagridPackageUpgradeHistory").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push({ "name": "filterUsername", "value": $("#search_upgradeUsername").val()  });
            aoData.push({ "name": "filterMt4Id", "value": $("#search_mt4").val()  });
            aoData.push({ "name": "filterStatusCode", "value": '<?php echo Globals::STATUS_ACTIVE;?>'  });
        },
        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
        },

        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sAjaxSource": "<?php echo url_for('financeList/upgradePackageList') ?>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sName" : "upgrade.upgrade_id", "bVisible" : false},
            { "sName" : "upgrade.upgrade_id", "bVisible" : false},
            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
                return "<a id='editLink' href='<?php echo url_for('finance/packageUpgradeHistoryEdit?q=dsf453fsdfasf1sxfsdfs&upgradeId=') ?>/" + oObj.aData[0] + "'>" + oObj.aData[2] + "</a>";
            }},
            { "sName" : "upgrade.mt4_user_name",  "bSortable": true},
            { "sName" : "dist.full_name",  "bVisible": false},
            { "sName" : "upgrade.amount",  "bSortable": true},
            { "sName" : "upgrade.status_code",  "bVisible": false},
            { "sName" : "upgrade.remarks",  "bVisible": false},
            { "sName" : "upgrade.created_on",  "bSortable": true},
            { "sName" : "upgrade.created_on",  "bSortable": true}
        ]
    });

    datagridPackagePurchase = $("#datagridPackagePurchase").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push({ "name": "filterUsername", "value": $("#search_packagePurchaseUsername").val()  });
            aoData.push({ "name": "filterPurchaseFlag", "value": "Y"  });
        },
        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
            reassignDatagridEventAttr()
        },

        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sScrollX": "100%",
        "sAjaxSource": "<?php echo url_for('financeList/packagePurchaseList') ?>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sName" : "dist.distributor_id", "bVisible" : false},
            { "sName" : "dist.distributor_id",  "bSortable": false, "bVisible" : false, "fnRender": function ( oObj ) {
                var idx = 2;
                $("#dgAddPanel").data("data_" + oObj.aData[0], {
                    distributor_id : oObj.aData[0]
                    , distributor_code : oObj.aData[idx++]
                    , full_name : oObj.aData[idx++]
                    , email : oObj.aData[idx++]
                    , mt4_user_name : oObj.aData[idx++]
                    , mt4_password : oObj.aData[idx++]
                    , package_name : oObj.aData[idx++]
                    , price : oObj.aData[idx++]
                    , active_datetime : oObj.aData[idx++]
              });

                if (oObj.aData[10] == "Y") {
                    return "<a id='updateMT4Link' href='#'>Update MT4</a>";
                } else {
                    return "";
                }
            }},
            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
                var idx = 2;
                $("#dgAddPanel").data("data_" + oObj.aData[0], {
                    distributor_id : oObj.aData[0]
                    , distributor_code : oObj.aData[idx++]
                    , full_name : oObj.aData[idx++]
                    , email : oObj.aData[idx++]
                    , mt4_user_name : oObj.aData[idx++]
                    , mt4_password : oObj.aData[idx++]
                    , package_name : oObj.aData[idx++]
                    , price : oObj.aData[idx++]
                    , active_datetime : oObj.aData[idx++]
              });

                if (oObj.aData[10] == "Y") {
                    return "<a id='updateMT4Link' href='#'>" + oObj.aData[2] + "</a>";
                } else {
                    return "";
                }
            }},
            { "sName" : "dist.full_name",  "bSortable": true},
            { "sName" : "dist.email",  "bVisible": false},
            { "sName" : "mt4.mt4_user_name",  "bVisible": false},
            { "sName" : "mt4.mt4_password",  "bVisible": false},
            { "sName" : "package.package_name",  "bSortable": true},
            { "sName" : "package.price",  "bVisible": false},
            { "sName" : "dist.active_datetime",  "bVisible": false},
            { "sName" : "dist.package_purchase_flag",  "bVisible": false, "fnRender": function ( oObj ) {
                if (oObj.aData[10] == "Y") {
                    return "New user";
                } else if (oObj.aData[10] == "N") {
                    return "Old user";
                } else {
                    return oObj.aData[10];
                }
            }},
            { "sName" : "dist.active_datetime",  "bVisible": false}
        ]
    });
});

function reassignDatagridEventAttr(){
    $("a[id=updateMT4Link]").click(function(event){
		// stop event
		event.preventDefault();

		// event.target is <a> itself, parent() is <td>, while parent().parent() get <tr>
		//var id = alert("id = " +$(event.target).parent().parent().attr("id"));
		var id = $(event.target).parent().parent().attr("id");
        $("#dgAddPanelId").val(id);
        $("#dgAddPanel").dialog("open");
	});
}
</script>

<div class="demo" style="padding:6px">
    <div class="column">
        <div class="portlet">
            <div class="portlet-header">Company Information</div>
            <div class="portlet-content">
                <table cellpadding="3" cellspacing="3" width="100%">
                    <tr>
                        <td><strong>Company e-Point</strong></td>
                        <td align="right"><?php echo number_format($companyEpoint, 2); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total Active Member</strong></td>
                        <td align="right"><?php echo $totalActiveMember; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total Pending Member</strong></td>
                        <td align="right"><?php echo $totalPendingMember; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
                        <td><strong>MT4 Withdrawal</strong></td>
                        <td align="right">
                        <?php
                            if ($mt4Withdrawal > 0)
                                echo "<a id='editLink' href='".url_for('finance/mt4Withdrawal')."'>".$mt4Withdrawal."</a>";
                            else
                                echo $mt4Withdrawal;
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Reload MT4 Fund</strong></td>
                        <td align="right"><?php
                            if ($reloadMt4Fund > 0)
                                echo "<a id='editLink' href='".url_for('finance/reloadMt4Fund')."'>".$reloadMt4Fund."</a>";
                            else
                                echo $reloadMt4Fund;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Referral Bonus</strong></td>
                        <td align="right"><?php
                            if ($referralBonus > 0)
                                echo "<a id='editLink' href='".url_for('finance/referralBonus')."'>".$referralBonus."</a>";
                            else
                                echo $referralBonus;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>e-Cash Withdrawal</strong></td>
                        <td align="right"><?php
                            if ($ecashWithdrawal > 0)
                                echo "<a id='editLink' href='".url_for('finance/ecashWithdrawal')."'>".$ecashWithdrawal."</a>";
                            else
                                echo $ecashWithdrawal;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
                        <td><strong>Customer Enquiry</strong></td>
                        <td align="right"><?php
                            if ($customerEnquiry > 0)
                                echo "<a id='customerEnquiryLink' href='".url_for('marketing/customerEnquiryList')."'>".$customerEnquiry."</a>";
                            else
                                echo $customerEnquiry;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="portlet">
            <div class="portlet-header">e-Point Purchase</div>
            <div class="portlet-content">
                <table class="display" id="datagridEPointPurchase" border="0" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>purchase id [hidden]</th>
                        <th></th>
                        <th>e-Trader</th>
                        <th>Full Name</th>
                        <th>Amount</th>
                        <th>Transaction Type</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Payment Reference</th>
                        <th>Approved/Reject Date</th>
                        <th>Purchased Date</th>
                        <th>Leader</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input title="" size="10" type="text" id="search_username" value="" class="search_init"/></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>

    <div class="column">
        <!--<div class="portlet">
            <div class="portlet-header">Package Information</div>
            <div class="portlet-content">
                <table cellpadding="3" cellspacing="3" width="100%">
                    <?php
/*                    foreach ($packageArray as $arr) {
                        $package = $arr['package'];
                    */?>
                    <tr>
                        <td><strong><?php /*echo $package->getPackageName() */?></strong></td>
                        <td align="right"><?php /*echo $arr['total']; */?></td>
                    </tr>
                    <?php
/*                    }
                    */?>
                </table>
            </div>
        </div>-->

        <div class="portlet">
            <div class="portlet-header">Package Purchase</div>
            <div class="portlet-content">
                <table class="display" id="datagridPackagePurchase" border="0" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Dist id [hidden]</th>
                        <th></th>
                        <th>e-Trader</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>MT4 ID</th>
                        <th>MT4 Password</th>
                        <th>Rank Name</th>
                        <th>Price</th>
                        <th>Activation Date</th>
                        <th></th>
                        <th>Leader</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input title="" size="10" type="text" id="search_packagePurchaseUsername" value="" class="search_init"/></td>
                        <td></td>
                        <td></td>
                        <td><input title="" size="10" type="text" id="search_packagePurchaseMt4id" value="" class="search_init"/></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><select id="filterPurchaseFlag">
                                <option value="Y">New User</option>
                                <option value="N">Old User</option>
                                <option value="">All</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="portlet">
            <div class="portlet-header">Package Upgrade History</div>
            <div class="portlet-content">
                <table class="display" id="datagridPackageUpgradeHistory" border="0" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id [hidden]</th>
                        <th>id [hidden]</th>
                        <th>e-Trader</th>
                        <th>MT4</th>
                        <th>Fullname [hidden]</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Creation Date</th>
                        <th>Leader</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input title="" size="10" type="text" id="search_upgradeUsername" value="" class="search_init"/></td>
                        <td><input title="" size="10" type="text" id="search_mt4" value="" class="search_init"/></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!--######################################################################################-->
<!--######################################################################################-->
<!--######################################################################################-->

<script type="text/javascript">
$(function(){
    $("#dgAddPanel").dialog("destroy");
    $("#dgAddPanel").theoneDialog({
        width:700,
        open: function() {
            populateDgAddPanel();
        },
        close: function() {

        },
        buttons: {
            Submit: function() {
                if ($.trim($('#dgAddPanelmt4_user_name').val()) == "") {
                    alert("MT4 ID is empty.");
                    $('#dgAddPanelmt4_user_name').focus();
                } else {
                    waiting();
                    $.ajax({
                        type : 'POST',
                        url : "<?php echo url_for('marketing/doUpdatePackagePurchase') ?>",
                        dataType : 'json',
                        cache: false,
                        data: {
                            distId : $('#dgAddPanelId').val()
                            , mt4_user_name : $('#dgAddPanelmt4_user_name').val()
                            , mt4_password : $('#dgAddPanelmt4_password').val()
                        },
                        success : function(data) {
                            if (data.error) {
                                alert(data.errorMsg);
                            } else {
                                $("#dgAddPanel").dialog('close');
                                datagridPackagePurchase.fnDraw();
                                alert("Record Save Successfully.");
                            }
                        },
                        error : function(XMLHttpRequest, textStatus, errorThrown) {
                            $('#waiting').hide(500);
                            alert("Server connection error.");
                        }
                    });
                }
            },
            Cancel: function() {
                $(this).dialog('close');
            }
        }
    });
});

function populateDgAddPanel() {
    var data = $("#dgAddPanel").data("data_" + $("#dgAddPanelId").val());
    $("#dgAddPanelDistCode").val(data.distributor_code);
    $("#dgAddPanelFullname").val(data.full_name);
    $("#dgAddPanelEmail").val(data.email);
    $("#dgAddPanelrank_code").val(data.package_name);
    $("#dgAddPanelprice").val(data.price);
    $("#dgAddPanelmt4_user_name").val(data.mt4_user_name).focus().select();
    $("#dgAddPanelmt4_password").val(data.mt4_password);
}
</script>
<div id="dgAddPanel" style="display:none; width: 850px" title="e-Trader Information">
    <input type="hidden" id="dgAddPanelId">
    <table width="100%">
        <tr>
            <td colspan="3">
                <div class="ui-widget" id="dgMsg" style="display:none;">
                </div>
            </td>
        </tr>
    </table>
    <fieldset class="collapsible">
    <legend class="collapsible">Details</legend>
    <table cellpadding="3" cellspacing="3">
        <tr>
            <td width="30%">Distributor Code</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelDistCode" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
            <td width="30%">Full Name</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelFullname" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
        <tr>
            <td width="30%">Email</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelEmail" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
        <tr>
            <td width="30%">Rank Code</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelrank_code" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
            <td width="30%">Price</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelprice" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
        <tr>
            <td>MT4 ID</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelmt4_user_name" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td width="30%">MT4 Password</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelmt4_password" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
    </table>
    </fieldset>
</div>
