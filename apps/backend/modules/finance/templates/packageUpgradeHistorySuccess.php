<script type="text/javascript">
var isSubmitAjax = true;
var jform = null;
var datagrid = null;

$(function(){
    $("#checkAll").click(function(){
        $('.upgradeCheckbox').attr('checked', this.checked);
    });
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
            aoData.push({ "name": "filterUsername", "value": $("#search_upgradeUsername").val()  });
            aoData.push({ "name": "filterFullname", "value": $("#search_fullname").val()  });
            aoData.push({ "name": "filterMt4Id", "value": $("#search_mt4").val()  });
            aoData.push({ "name": "filterStatusCode", "value": $("#search_combo_statusCode").val()  });
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
        "sAjaxSource": "<?php echo url_for('financeList/upgradePackageList') ?>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sName" : "upgrade.upgrade_id", "bVisible" : false},
            { "sName" : "upgrade.upgrade_id",  "bSortable": false, "bVisible" : true, "fnRender": function ( oObj ) {
                if (oObj.aData[6] == "<?php echo Globals::STATUS_ACTIVE?>") {
                    return "<input type='checkbox' name='upgradeId[]' value='" + oObj.aData[0] + "' class='upgradeCheckbox'/>";
                }
                return "";
            }},
            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
                if (oObj.aData[6] == "REJECTED")
                    return oObj.aData[2];
                return "<a id='editLink' href='<?php echo url_for('finance/packageUpgradeHistoryEdit?q=dsf453fsdfasf1sxfsdfs&upgradeId=') ?>/" + oObj.aData[0] + "'>" + oObj.aData[2] + "</a>";
            }},
            { "sName" : "upgrade.mt4_user_name",  "bSortable": false},
            { "sName" : "dist.full_name",  "bSortable": true},
            { "sName" : "upgrade.amount",  "bSortable": true},
            { "sName" : "upgrade.status_code",  "bSortable": true},
            { "sName" : "upgrade.remarks",  "bSortable": false},
            { "sName" : "upgrade.created_on",  "bSortable": true},
            { "sName" : "upgrade.created_on",  "bSortable": true}
        ]
    });

    $("#btnUpdate").button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    })
}); // end $(function())

//all event in detail datagrid need to reassign because, every remote call, the DOM will be restructure again.
function reassignDatagridEventAttr(){
    $(".image_group").fancybox({
        'transitionIn' : 'elastic',
        'transitionOut' : 'none'
    });
}

</script>

<?php echo form_tag('finance/packageUpgradeHistory', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
<div class="portlet">
    <div class="portlet-header">Package Upgrade History Listing</div>
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
                    <div>
					<table class="display" id="datagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id [hidden]</th>
                            <th></th>
                            <th>e-Trader</th>
                            <th>MT4</th>
                            <th>Full Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Creation Date</th>
                            <th>Leader</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="checkbox" id="checkAll" value=""/></td>
                            <td><input title="" size="10" type="text" id="search_upgradeUsername" value="" class="search_init"/></td>
                            <td><input title="" size="10" type="text" id="search_mt4" value="" class="search_init"/></td>
                            <td><input title="" size="10" type="text" id="search_fullname" value="" class="search_init"/></td>
                            <td></td>
                            <td>
                                <select id="search_combo_statusCode">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <!--<option value="PROCESSING">PROCESSING</option>-->
                                    <option value="REJECT">REJECT</option>
                                    <option value="COMPLETE">COMPLETE</option>
                                    <option value="">ALL</option>
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>
                    </table>
                    </div>
					</td>
				</tr>
			</table>
                <!--<select name="upgradeStatus">
                    <option value="COMPLETE">COMPLETE</option>
                </select>
                <button id="btnUpdate">Update</button>-->
			</td>
		</tr>
	</table>
    </div>
</div>
</div>

</form>