<?php use_helper('I18N') ?>

<script type="text/javascript" language="javascript">
var datagrid = null;
$(function() {
     datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData){ // pass extra params to server
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
        "sAjaxSource": "/finance/ecashWithdrawalList",
        "sPaginationType": "full_numbers",
        "aaSorting": [[4,'desc']],
        "aoColumns": [
                      { "sName" : "f_credit", "bVisible" : false,  "bSortable": true},
                      { "sName" : "f_debit",  "bSortable": true},
                      { "sName" : "f_balance",  "bSortable": true},
                      { "sName" : "f_action",  "bSortable": true},
                      { "sName" : "f_created_datetime",  "bSortable": true}
        ]
    });
}); // end function

function reassignDatagridEventAttr(){
}
</script>

<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable" style="width: 800px;">
<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title" id="ui-dialog-title-dgReinvestCps"><?php echo __('Withdrawal Status') ?></span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button">
    <span class="ui-icon ui-icon-closethick"><?php echo __('close') ?></span></a></div>
<div class="ui-dialog-content ui-widget-content">
    <table class="display" id="datagrid" border="0" width="100%">
        <thead>
        <tr>
            <th></th>
            <th><?php echo __('Withdrawal') ?></th>
            <th><?php echo __('Amount') ?></th>
            <th><?php echo __('Status') ?></th>
            <th><?php echo __('Date') ?></th>
        </tr>
        </thead>
    </table>
</div>
</div>
