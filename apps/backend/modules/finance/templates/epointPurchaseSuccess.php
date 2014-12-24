<script type="text/javascript">
var isSubmitAjax = true;
var jform = null;
var datagrid = null;

$(function(){
    $("#checkAll").click(function(){
        $('.purchaseCheckbox').attr('checked', this.checked);
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
            aoData.push({ "name": "filterUsername", "value": $("#search_username").val()  });
            aoData.push({ "name": "filterFullname", "value": $("#search_fullname").val()  });
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
        "sAjaxSource": "<?php echo url_for('financeList/epointPurchaseList') ?>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sName" : "purchase.purchase_id", "bVisible" : false},
            { "sName" : "purchase.purchase_id",  "bSortable": false, "bVisible" : true, "fnRender": function ( oObj ) {
                if (oObj.aData[6] == "<?php echo Globals::STATUS_PENDING?>" || oObj.aData[6] == "<?php echo Globals::STATUS_PROCESSING?>") {
                    return "<input type='checkbox' name='purchaseId[]' value='" + oObj.aData[0] + "' class='purchaseCheckbox'/>";
                }
                return "";
            }},
            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
                if (oObj.aData[6] == "REJECTED")
                    return oObj.aData[2];
                return "<a id='editLink' href='<?php echo url_for('finance/epointPurchaseEdit?q=dsf453fsdfasf1sxfsdfs&purchaseId=') ?>/" + oObj.aData[0] + "'>" + oObj.aData[2] + "</a>";
            }},
            { "sName" : "dist.full_name",  "bSortable": true},
            { "sName" : "purchase.amount",  "bSortable": true},
            { "sName" : "purchase.transaction_type",  "bSortable": true},
            { "sName" : "purchase.status_code",  "bSortable": true},
            { 'sName' : 'purchase.image_src',  'bSortable': true, 'fnRender': function ( oObj ) {
                if (oObj.aData[7] == null || oObj.aData[7] == '') {
                    return '';
                }
                return "<a id='bankPassbookLink' href='" + oObj.aData[7] + "' target='_blank'><img src='/images/common/fileopen.png' alt='view file'></a>";
            }},
            { "sName" : "purchase.payment_reference",  "bSortable": true},
            { "sName" : "purchase.approve_reject_datetime",  "bSortable": true},
            { "sName" : "purchase.created_on",  "bSortable": true},
            { "sName" : "purchase.created_on",  "bSortable": true}
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

<?php echo form_tag('finance/epointPurchase', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
<div class="portlet">
    <div class="portlet-header">e-Point Purchase Listing</div>
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
                            <td><input type="checkbox" id="checkAll" value=""/></td>
                            <td><input title="" size="10" type="text" id="search_username" value="" class="search_init"/></td>
                            <td><input title="" size="10" type="text" id="search_fullname" value="" class="search_init"/></td>
                            <td></td>
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
                            <td></td>
                        </tr>
                        </thead>
                    </table>
                    </div>
					</td>
				</tr>
			</table>
                <select name="purchaseStatus">
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