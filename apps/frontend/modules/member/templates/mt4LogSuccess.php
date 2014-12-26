<?php
use_helper('I18N');
?>
<div class="breadcrumbs" id="breadcrumbs">
<script type="text/javascript" language="javascript">
    try {
        ace.settings.check('breadcrumbs', 'fixed')
    } catch(e) {
    }
    var datagrid = null;
    $(function() {
        datagrid = $("#datagrid").r9jasonDataTable({
            // online1DataTable extra params
            "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
            "extraParam" : function(aoData) { // pass extra params to server
                aoData.push({ "name": "filterAction", "value": $("#search_action").val() });
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
            "sAjaxSource": "/finance/mt4LogList",
            "sPaginationType": "full_numbers",
            "aaSorting": [
                [0,'desc']
            ],
            "aoColumns": [
                { "sName" : "account_id",  "bSortable": true},
                { "sName" : "transaction_type",  "bSortable": true},
                { "sName" : "credit", "bVisible" : true,  "bSortable": true},
                { "sName" : "debit",  "bSortable": true},
                { "sName" : "balance",  "bSortable": true},
                { "sName" : "remark",  "bSortable": true}
            ]
        });
    }); // end function

    function reassignDatagridEventAttr() {
        $("a[id=editLink]").click(function(event) {

        });
    }
</script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="/member/mgLog"><?php echo __('My Statement'); ?></a>
        </li>
        <li class="active"><?php echo __('MT4 Statement'); ?></li>
    </ul>
    <!-- .breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input"
                       id="nav-search-input" autocomplete="off"/>
                <i class="icon-search nav-search-icon"></i>
            </span>
        </form>
    </div>
    <!-- #nav-search -->
</div>

<div class="page-content">
<!--<div class="page-header">
    <h1>
        <?php /*echo __('My Statement'); */?>
        <small>
            <i class="icon-double-angle-right"></i>
            <?php /*echo __('CP2 Statement'); */?>
        </small>
    </h1>
</div>-->
<!-- /.page-header -->
<div class="row">
<div class="col-xs-12">
<h3 class="header smaller lighter green"><?php echo __('MT4 Statement') ?></h3>
<!-- PAGE CONTENT BEGINS -->

<?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

<div class="row">
<div class="space-6"></div>

<div class="col-xs-12">
    <div class="table-header">
        Results for "MG List"
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="datagrid" border="0" width="100%">
            <thead>
            <tr>
                <th><?php echo __('Date') ?></th>
                <th><?php echo __('Transaction Type') ?></th>
                <th><?php echo __('In') ?></th>
                <th><?php echo __('Out') ?></th>
                <th><?php echo __('Balance') ?></th>
                <th><?php echo __('Remarks') ?></th>
            </tr>
            <tr>
                <td></td>
                <td><input size="15" type="text" id="search_action" value="" class="search_init" style="padding: 1px;"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
        </table>
    </div>
</div>

<div class="vspace-sm"></div>

<!-- /span -->
</div>
<!-- /row -->

<div class="hr hr32 hr-dotted"></div>

<!-- /row -->

<!-- PAGE CONTENT ENDS -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.page-content -->