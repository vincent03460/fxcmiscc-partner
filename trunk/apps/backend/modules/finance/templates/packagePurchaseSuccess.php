<script type="text/javascript">
var isSubmitAjax = true;
var jform = null;
var datagrid = null;

$(function(){
	jform = $("#enquiryForm").validate({
		submitHandler: function(form) {
			if(isSubmitAjax){
				datagrid.fnDraw();
			}else {
				form.submit();
			}
		}
	});

    datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push({ "name": "filterUsername", "value": $("#search_username").val()  });
            aoData.push({ "name": "filterMt4Id", "value": $("#search_mt4id").val()  });
            aoData.push({ "name": "filterPurchaseFlag", "value": $("#filterPurchaseFlag").val()  });
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
            { "sName" : "dist.distributor_id",  "bSortable": false, "bVisible" : true, "fnRender": function ( oObj ) {
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
                    return "<a id='editLink' href='#'>Update MT4</a>";
                } else {
                    return "";
                }
            }},
            { "sName" : "dist.distributor_code",  "bSortable": true},
            { "sName" : "dist.full_name",  "bSortable": true},
            { "sName" : "dist.email",  "bSortable": true},
            { "sName" : "mt4.mt4_user_name",  "bSortable": true},
            { "sName" : "mt4.mt4_password",  "bSortable": true},
            { "sName" : "package.package_name",  "bSortable": true},
            { "sName" : "package.price",  "bSortable": true},
            { "sName" : "dist.active_datetime",  "bSortable": true},
            { "sName" : "dist.package_purchase_flag",  "bSortable": true, "fnRender": function ( oObj ) {
                if (oObj.aData[10] == "Y") {
                    return "New user";
                } else if (oObj.aData[10] == "N") {
                    return "Old user";
                } else {
                    return oObj.aData[10];
                }
            }},
            { "sName" : "dist.active_datetime",  "bSortable": true}
        ]
    });
}); // end $(function())

//all event in detail datagrid need to reassign because, every remote call, the DOM will be restructure again.
function reassignDatagridEventAttr(){
    $("a[id=editLink]").click(function(event){
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

<?php echo form_tag('finance/epointPurchase', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
<div class="portlet">
    <div class="portlet-header">Package Purchase Listing</div>
    <div class="portlet-content">
        <?php if ($sf_flash->has('successMsg')): ?>
        <div class="ui-widget">
            <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                    <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($sf_flash->has('errorMsg')): ?>
        <div class="ui-widget">
            <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-error ui-corner-all">
                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                    <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
            </div>
        </div>
        <?php endif; ?>
	<table width="100%" border="0">
		<tr>
			<td>
			<table width="100%">
				<tr>
					<td>
                    <div style="width: 950px">
					<table class="display" id="datagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
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
                            <td><input title="" size="10" type="text" id="search_username" value="" class="search_init"/></td>
                            <td></td>
                            <td></td>
                            <td><input title="" size="10" type="text" id="search_mt4id" value="" class="search_init"/></td>
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
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
    </div>
</div>
</div>

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
                                datagrid.fnDraw();
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
</form>