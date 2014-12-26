<?php use_helper('I18N') ?>

<table cellpadding="0" cellspacing="5" align="center" border="0" width='100%'>
    <tr>
        <td>
			<table border='1' width='100%'>
			<tr valign="middle" style="background-color:#f1f1f1;height:32px;">
				<td align='center'><?php echo __('Member ID') ?></td><td align='center'><?php echo __('Trader Name') ?></td><td align='center'><?php echo __('Activation Date') ?></td><td align='center'><?php echo __('Registered Date') ?></td><td align='center'><?php echo __('Position') ?></td>
			</tr>
			<?php 
			foreach($TblDist as $dist){
				echo "<tr style=\"background:#ccc;\" onmouseover=\"currentcolor=this.style.backgroundColor;this.style.backgroundColor='#f1f1f1';\" onmouseout=\"this.style.backgroundColor=currentcolor\" style=\"height:25px;\">"
				."<td align='center'>".$dist->getFCode()."</td><td align='center'>".$dist->getFName()."</td><td align='center'>".$dist->getFActiveDatetime()."</td><td align='center'>".$dist->getFCreatedDatetime()."</td>"
				."<td align='center'>".button_to(__('Left'), 'member/doPlacement?position=1&distid='.$dist->getFId(), array ('class' => 'activeLink', 'style' => 'width:80px', 'confirm' => 'Place Trader to left leg?'))."&nbsp;&nbsp;&nbsp;".button_to(__('Right'), 'member/doPlacement?position=2&distid='.$dist->getFId(), array ('class' => 'activeLink', 'style' => 'width:80px', 'confirm' => 'Place Trader to right leg?'))
				."</td></tr>";
			}	
			?>
			</table>
		</td>
    </tr>
</table>
<br><br>
<script type="text/javascript" language="javascript">
var datagrid = null;
$(function() {
     datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData){ // pass extra params to server
        	aoData.push( { "name": "filterDistcode", "value": $("#search_distcode").val() } );
        	aoData.push( { "name": "filterDistname", "value": $("#search_distname").val() } );
            aoData.push( { "name": "filterPlacementCode", "value": $("#search_placementcode").val() } );
            aoData.push( { "name": "filterPosition", "value": $("#search_position").val() } );
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
        "sAjaxSource": "/business/placementLogList",
        "sPaginationType": "full_numbers",
        "aaSorting": [[4,'desc']],
        "aoColumns": [
                      { "sName" : "placement.f_dist_code2", "bVisible" : true,  "bSortable": true},
                      { "sName" : "distributor.f_name",  "bSortable": true},
                      { "sName" : "placement.f_parentid_code2",  "bSortable": true},
                      { "sName" : "placement.f_position",  "bSortable": true},
                      { "sName" : "placement.f_created_datetime",  "bSortable": true}
        ]
    });
}); // end function

function reassignDatagridEventAttr(){
	$("a[id=editLink]").click(function(event){

	});
}
</script>

<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable" style="width: 800px;">
<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title" id="ui-dialog-title-dgReinvestCps"><?php echo __('Place Trader History') ?></span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button">
    <span class="ui-icon ui-icon-closethick"><?php echo __('close') ?></span></a></div>
<div class="ui-dialog-content ui-widget-content">
    <table class="display" id="datagrid" border="0" width="100%">
        <thead>
        <tr>
            <th><?php echo __('Member ID') ?></th>
            <th><?php echo __('Trader Name') ?></th>
            <th><?php echo __('Placement ID') ?></th>
            <th><?php echo __('Position') ?></th>
            <th><?php echo __('Placement Date') ?></th>
        </tr>
        <tr>
            <td><input size="15" type="text" id="search_distcode" value="" class="search_init" /></td>
            <td><input size="15" type="text" id="search_distname" value="" class="search_init" /></td>
            <td><input size="15" type="text" id="search_placementcode" value="" class="search_init" /></td>
            <td><input size="15" type="text" id="search_position" value="" class="search_init" /></td>
            <td></td>
        </tr>
        </thead>
    </table>
</div>
</div>
