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
		"extraParam" : function(aoData){ // pass extra params to server
			aoData.push( { "name": "filterUsername", "value": $("#search_username").val()  } );
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
		"sAjaxSource": "<?php echo url_for('financeList/ePointTransactionList') ?>",
		"sPaginationType": "full_numbers",
		"aoColumns": [
		              { "sName" : "account.dist_id", "bVisible" : false},
		              { "sName" : "account.dist_id",  "bSortable": false, "fnRender": function ( oObj ) {
		  				  return "<a id='editLink' ref='" + oObj.aData[0] + "' href='#'>Detail</a>";
		  				}
		  			  },
                      { "sName" : "dist.distributor_code",  "bSortable": true},
                      { "sName" : "account.balance",  "bSortable": true}
		]
	});
}); // end $(function())

//all event in detail datagrid need to reassign because, every remote call, the DOM will be restructure again.
function reassignDatagridEventAttr(){
    /*.button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    })*/
	$("a[id=editLink]").click(function(event){
		// stop event
		event.preventDefault();

		// event.target is <a> itself, parent() is <td>, while parent().parent() get <tr>
		//var id = alert("id = " +$(event.target).parent().parent().attr("id"));
		var id = $(this).attr("ref");
	});
}

</script>

<div style="padding: 10px; top: 30px; position: absolute; width: 900px">
<div class="portlet">
    <div class="portlet-header">e-Point Transaction Listing</div>
    <div class="portlet-content">
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
                                <th width="50px">&nbsp;</th>
								<th>Distributor Code</th>
								<th>Balance</th>
							</tr>
                            <tr>
                                <td></td>
                                <td></td>
								<td><input title="" size="20" type="text" id="search_username" value="" class="search_init"/></td>
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
<div class="portlet" style="display: none">
    <div class="portlet-header">Transaction Detail Listing</div>
    <div class="portlet-content">
	<table width="100%" border="0">
		<tr>
			<td>
			<table width="100%">
				<tr>
					<td>
                    <div>
					<table class="display" id="datagridDetail" border="0" width="100%" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
								<th>id [hidden]</th>
                                <th width="50px">&nbsp;</th>
								<th>Distributor Code</th>
								<th>Balance</th>
							</tr>
                            <tr>
                                <td></td>
                                <td></td>
								<td><input title="" size="20" type="text" id="search_username" value="" class="search_init"/></td>
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