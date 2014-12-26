<?php use_helper('I18N') ?>

<!--<table cellpadding="0" cellspacing="5" align="center" border="0" width='100%'>
    <tr>
        <td>
			<table border='1' width='100%'>
			<tr valign="middle" style="background-color:#f1f1f1;height:32px;">
				<td align='center'>Pin Code</td><td align='center'>CPS</td><td align='center'>Type</td><td align='center'>Action</td><td align='center'>Action Date</td><td align='center'>Purchase Date</td>
			</tr>
			<?php /*
			foreach($TblLedger as $ledger){
				echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\">"
				."</td><td align='center'>".$ledger->getFPin()."</td><td align='center'>".$ledger->getFCps()."</td><td align='center'>".$ledger->getFType()."</td><td align='center'>".$ledger->getFAction()."</td><td align='center'>".$ledger->getFActionDatetime()."</td><td align='center'>".$ledger->getFCreatedDatetime()."</td></tr>";
			}	
			*/?>
			</table>
		</td>
    </tr>
</table>-->

<script type="text/javascript" language="javascript">
var datagrid = null;
$(function() {
     datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData){ // pass extra params to server
                aoData.push( { "name": "filterPinCode", "value": $("#search_pinCode").val() } );
                aoData.push( { "name": "filterType", "value": $("#search_type").val() } );
                aoData.push( { "name": "filterAction", "value": $("#search_action").val() } );
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
        "sAjaxSource": "/business/pinTransactionLogList",
        "sPaginationType": "full_numbers",
        "aaSorting": [[5,'desc']],
        "aoColumns": [
                      { "sName" : "f_pin", "bVisible" : true,  "bSortable": true},
                      { "sName" : "f_cps",  "bSortable": true},
                      { "sName" : "f_type",  "bSortable": true},
                      { "sName" : "f_action",  "bSortable": true},
                      { "sName" : "f_action_datetime",  "bSortable": true},
                      { "sName" : "f_created_datetime",  "bSortable": true}
        ]
    });
}); // end function

function reassignDatagridEventAttr(){
	$("a[id=editLink]").click(function(event){

	});
}
</script>

<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable" style="width: 800px;">
<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title" id="ui-dialog-title-dgReinvestCps">Pin Transaction Log</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button">
    <span class="ui-icon ui-icon-closethick"><?php echo __('close') ?></span></a></div>
<div class="ui-dialog-content ui-widget-content">
    <table class="display" id="datagrid" border="0" width="100%">
        <thead>
        <tr>
            <th><?php echo __('PIN') ?></th>
            <th><?php echo __('CPS Price') ?></th>
            <th><?php echo __('Type') ?></th>
            <th><?php echo __('Action') ?></th>
            <th><?php echo __('Action Date') ?></th>
            <th><?php echo __('Purchase Date') ?></th>
        </tr>
        <tr>
            <td><input size="15" type="text" id="search_pinCode" value="" class="search_init" /></td>
            <td></td>
            <td><input size="15" type="text" id="search_type" value="" class="search_init" /></td>
            <td><input size="15" type="text" id="search_action" value="" class="search_init" /></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
    </table>
</div>
</div>
