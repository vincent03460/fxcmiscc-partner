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
        "sAjaxSource": "<?php echo url_for('financeList/referralBonusList') ?>",
        "sPaginationType": "full_numbers",
        "aaSorting": [
            [0,'desc']
        ],
        "aoColumns": [
            { "sName" : "bonus.commission_id", "bVisible" : false},
            { "sName" : "bonus.commission_id",  "bSortable": false, "bVisible" : true, "fnRender": function ( oObj ) {
                if (oObj.aData[6] == "<?php echo Globals::STATUS_PENDING?>") {
                    return "<input type='checkbox' name='upgradeId[]' value='" + oObj.aData[0] + "' class='upgradeCheckbox'/>";
                }
                return "";
            }},
            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
                if (oObj.aData[6] == "REJECTED")
                    return oObj.aData[2];
                return "<a id='editLink' href='<?php echo url_for('finance/referralBonusEdit?q=dsf453fsdfasf1sxfsdfs&upgradeId=') ?>/" + oObj.aData[0] + "'>" + oObj.aData[2] + "</a>";
            }},
            { "sName" : "dist.full_name",  "bSortable": true},
            /*{ "sName" : "dist.mt4_user_name",  "bSortable": true},*/
            { "sName" : "dist.full_name",  "bSortable": true},
            { "sName" : "bonus.credit",  "bSortable": true},
            { "sName" : "bonus.status_code",  "bSortable": true},
            { "sName" : "bonus.remark",  "bSortable": true},
            { "sName" : "bonus.created_on",  "bSortable": true},
            { "sName" : "bonus.month_traded",  "bVisible": false},
            { "sName" : "bonus.month_traded",  "bSortable": false}
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

}

</script>

<?php echo form_tag('finance/referralBonus', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
<div class="portlet">
    <div class="portlet-header">Referral Bonus Listing</div>
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
                            <th style="width: 20px"></th>
                            <th style="width: 50px">e-Trader</th>
                            <th style="width: 50px">MT4</th>
                            <th style="width: 50px">Full Name</th>
                            <th style="width: 20px">Amount</th>
                            <th style="width: 20px">Status</th>
                            <th>Remarks</th>
                            <th>Creation Date</th>
                            <th>Month</th>
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
                                    <option value="PENDING">PENDING</option>
                                    <!--<option value="PROCESSING">PROCESSING</option>-->
                                    <option value="REJECT">REJECT</option>
                                    <option value="COMPLETE">COMPLETE</option>
                                    <option value="">ALL</option>
                                </select>
                            </td>
                            <td></td>
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
                <select name="upgradeStatus">
                    <!--<option value="PROCESSING">PROCESSING</option>-->
                    <!--<option value="REJECTED">REJECTED</option>-->
                    <option value="COMPLETE">COMPLETE</option>
                </select>
                <button id="btnUpdate">Update</button>
			</td>
		</tr>
	</table>
    </div>
</div>
</div>

</form>