<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
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
                    "sAjaxSource": "/finance/tradingLogList",
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
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title"><?php echo __("Trading Account Log"); ?>
            <small></small>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <section class="widget">
            <header>
                <h4>
                    <i class="icon-ok-sign"></i>
                    <?php echo __("Trading Account Transaction Log"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <fieldset>
                    <legend class="section">
                        <?php echo __("Trading Account Log")?>
                    </legend>
                    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <section class="widget">
                                <header>
                                    <h4>
                                        <i class="icon-file-alt"></i>
                                        <?php echo __("Trading Account Listing")?>
                                    </h4>
                                </header>
                                <div class="body">
                                    <div>
                                        <table class="table table-striped" id="datagrid" border="0" width="100%">
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
                                                <td><input size="15" type="text" id="search_action" value=""
                                                           class="search_init" style="padding: 1px;"/></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                        </table>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </fieldset>
                <!--<div class="form-actions">
                    <a href="/member/summary" class="btn btn-default"><?php /*echo __("Cancel");*/?></a>
                </div>-->
            </div>
        </section>
    </div>
</div>