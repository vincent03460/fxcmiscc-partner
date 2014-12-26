<?php include('scripts.php'); ?>

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
            "sAjaxSource": "/finance/SIXSTARWalletLogList",
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

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('SIXSTAR Wallet Account') ?></p></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td width="15px" style="min-height: 600px;">&nbsp;</td>
        <td>



<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td>
            <table cellspacing="0" cellpadding="0" class="tbl_form">
                <colgroup>
                    <col width="1%">
                    <col width="30%">
                    <col width="69%">
                    <col width="1%">
                </colgroup>
                <tbody>
                <tr>
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th><?php echo __('SIXSTAR Wallet Statement') ?></th>
                    <th class="tbl_content_right"></th>
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>
                </tbody>
            </table>
            <table cellspacing="0" cellpadding="0">
                <colgroup>
                    <col width="1%">
                    <col width="30%">
                    <col width="69%">
                    <col width="1%">
                </colgroup>
                <tbody>
                <!--<tr>
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th colspan="2"><?php /*echo __('Forex Point Statement') */?></th>
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>-->

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <br>
                        <table class="display" id="datagrid" border="0" width="100%">
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
                                <td><input size="15" type="text" id="search_action" value="" class="search_init"/></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                        </table>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>


<td width="15px">&nbsp;</td>
    </tr>
</table>