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
            aoData.push({ "name": "filterFullname", "value": $("#search_fullname").val()  });
            aoData.push({ "name": "filterMt4Id", "value": $("#search_mt4Id").val()  });
            aoData.push({ "name": "filterDateFrom", "value": $("#txtDateFrom").val()  });
            aoData.push({ "name": "filterDateTo", "value": $("#txtDateTo").val()  });
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
        "sAjaxSource": "<?php echo url_for('reportList/totalMt4ReloadList') ?>",
        "sPaginationType": "full_numbers",
        "aaSorting": [[1,'desc']],
        "aoColumns": [
            { "sName" : "reload.reload_id", "bVisible" : false},
            { "sName" : "reload.created_on",  "bSortable": true},
            { "sName" : "dist.full_name",  "bSortable": true},
            { "sName" : "dist.distributor_code",  "bSortable": true},
            { "sName" : "reload.mt4_user_name",  "bSortable": true},
            { "sName" : "reload.amount",  "bSortable": true},
            { "sName" : "reload.status_code",  "bSortable": true},
            { "sName" : "reload.remarks",  "bSortable": true}
        ]
    });

    $("#txtDateFrom").datepicker()
    $("#txtDateTo").datepicker()

    $("#btnSearch").click(function(event){
        event.preventDefault();
        datagrid.fnDraw();
    });
    $("#btnExport").click(function(event){
        event.preventDefault();
        datagrid.fnDraw();
    });
}); // end $(function())

//all event in detail datagrid need to reassign because, every remote call, the DOM will be restructure again.
function reassignDatagridEventAttr(){

}

</script>

<?php echo form_tag('finance/epointPurchase', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
<div class="portlet">
    <div class="portlet-header">Total MT4 Reload Report</div>
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
                    <td width="100">Date From</td>
                    <td width="1">:</td>
                    <td><input id="txtDateFrom" size="20" readonly="readonly" value="<?php echo date('Y-m-d');?>"></td>
                </tr>
                <tr>
                    <td>Date To</td>
                    <td>:</td>
                    <td><input id="txtDateTo" size="20" readonly="readonly" value="<?php echo date('Y-m-d');?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button id="btnSearch">Search</button>&nbsp;<button id="btnExport" style="display: none">Export</button></td>
                </tr>
				<tr>
					<td colspan="3">
                    <div>
					<table class="display" id="datagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id [hidden]</th>
                            <th>Date</th>
                            <th>Full Name</th>
                            <th>e-Trader Code</th>
                            <th>MT4 ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input title="" size="10" type="text" id="search_fullname" value="" class="search_init"/></td>
                            <td><input title="" size="10" type="text" id="search_username" value="" class="search_init"/></td>
                            <td><input title="" size="10" type="text" id="search_mt4Id" value="" class="search_init"/></td>
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
			</td>
		</tr>
	</table>
    </div>
</div>
</div>

</form>