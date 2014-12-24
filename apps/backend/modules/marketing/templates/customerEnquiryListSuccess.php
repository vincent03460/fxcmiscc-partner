<script type="text/javascript">
var isSubmitAjax = true;
var jform = null;
var datagrid = null;

$(function(){
	jform = $("#enquiryForm").validate({
		submitHandler: function(form) {
			if(isSubmitAjax){
				//alert("submit ajax");
				datagrid.fnDraw();
			}else {
				//alert("not submit ajax");
				form.submit();
			}
		}
	});

	datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push( { "name": "filterDistCode", "value": $("#search_distCode").val()  } );
            aoData.push( { "name": "filterSubject", "value": $("#search_subject").val()  } );
        },
        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
            reassignDatagridEventAttr();
        },

        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sAjaxSource": "<?php echo url_for("/marketingList/customerEnquiryList");?>",
        "sPaginationType": "full_numbers",
        "aaSorting": [
            [1,'desc']
        ],
        "aoColumns": [
            { "sName" : "customer.enquiry_id", "bVisible" : false,  "bSortable": true},
            { "sName" : "customer.updated_on", "bVisible" : true,  "bSortable": true},
            { "sName" : "dist.distributor_code",  "bSortable": true},
            { "sName" : "customer.title",  "bSortable": true},
            { "sName" : "customer.distributor_updated",  "bSortable": true},
            { "sName" : "customer.admin_read",  "bVisible": true, "fnRender": function ( oObj ) {
                if (oObj.aData[5] == "Read") {
                    return "<a href='<?php echo url_for("/marketing/customerEnquiryDetail");?>?enquiryId=" + oObj.aData[0] + "'>Read</a>";
                } else if (oObj.aData[5] == "Unread") {
                    return "<a href='<?php echo url_for("/marketing/customerEnquiryDetail");?>?enquiryId=" + oObj.aData[0] + "' style='color:#0088CF'>Unread</a>";
                }
            }}
        ]
    });

    $("#btnNewMessage").button();
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

<?php echo form_tag('marketing/doCustomerEnquiry', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1100px">
<div class="portlet">
    <div class="portlet-header">Customer Enquiry Listing</div>
    <div class="portlet-content">
	<table width="100%" border="0">
		<tr>
			<td>
			<table width="100%">
				<tr>
					<td>
					<table class="display" id="datagrid" border="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Date</th>
                            <th>Member ID</th>
                            <th>Subject</th>
                            <th>Last Reply</th>
                            <th>Read / Unread</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input title="" size="20" type="text" id="search_distCode" value="" class="search_init"/></td>
                            <td><input title="" size="20" type="text" id="search_subject" value="" class="search_init"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>
                    </table>
					</td>
				</tr>
                <tr>
                    <td>
                        <a href="<?php echo url_for("/marketing/customerEnquiryAdd");?>" id="btnNewMessage">New Message</a>
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