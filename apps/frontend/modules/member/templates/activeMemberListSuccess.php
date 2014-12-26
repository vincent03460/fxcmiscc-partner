<?php
use_helper('I18N');
?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch(e) {
        }

        var datagrid = null;
        $(function($) {
            datagrid = $("#datagrid").r9jasonDataTable({
                // online1DataTable extra params
                "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                "extraParam" : function(aoData) { // pass extra params to server

                },
                "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
                    //reassignDatagridDetailEventAttr();
                },

                // datatables params
                "bLengthChange": true,
                "bFilter": false,
                "bProcessing": true,
                "bServerSide": true,
                "bAutoWidth": false,
                "sAjaxSource": "/business/activeMemberList",
                "sPaginationType": "full_numbers",
                "aaSorting": [
                    [0,'desc']
                ],
                "aoColumns": [
                    { "sName" : "dist.created_on",  "bSortable": true},
                    { "sName" : "dist.distributor_code",  "bSortable": true},
                    { "sName" : "pack.package_name",  "bSortable": true},
                    { "sName" : "dist.full_name",  "bSortable": true},
                    { "sName" : "dist.email",  "bSortable": true},
                    { "sName" : "dist.contact",  "bSortable": true},
                    { "sName" : "referrer.distributor_code",  "bSortable": true}
                ]
            });
        });
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="/member/memberRegistration">Registration</a>
        </li>
        <li class="active">Active Member List</li>
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
        Registration
        <small>
            <i class="icon-double-angle-right"></i>
            Active Member List
        </small>
    </h1>
</div>-->
<!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
<h3 class="header smaller lighter green"><?php echo __('Active Member List') ?></h3>
<!-- PAGE CONTENT BEGINS -->

<?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

<div class="row">
<div class="space-6"></div>

<div class="col-xs-12">
    <div class="table-header">
        Results for "Active Member List"
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="datagrid" border="0" width="100%">
            <thead>
            <tr>
                <th><?php echo __('Date') ?></th>
                <th><?php echo __('User Name') ?></th>
                <th><?php echo __('Package Name') ?></th>
                <th><?php echo __('Full Name') ?></th>
                <th><?php echo __('Email') ?></th>
                <th><?php echo __('Phone') ?></th>
                <th><?php echo __('Referrer ID') ?></th>
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