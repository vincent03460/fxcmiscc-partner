<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
    var datagrid = null;
    $(function() {
        datagrid = $("#datagrid").r9jasonDataTable({
            // online1DataTable extra params
            "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
            "extraParam" : function(aoData) { // pass extra params to server
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
            "sAjaxSource": "/finance/ezyCashCardHistoryList",
            "sPaginationType": "full_numbers",
            "aaSorting": [
                [0,'desc']
            ],
            "aoColumns": [
                { "sName" : "card_id", "bVisible" : false,  "bSortable": true},
                { "sName" : "created_on", "bVisible" : true,  "bSortable": true},
                { "sName" : "status_code",  "bSortable": true},
                { "sName" : "qty",  "bSortable": true},
                { "sName" : "sub_total",  "bSortable": true},
                { "sName" : "remark",  "bSortable": true}
            ]
        });
    }); // end function

    function reassignDatagridEventAttr() {
        $("a[id=editLink]").click(function(event) {

        });
    }
</script>

<div class="ewallet_li">
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/applyEzyCashCard") ?>" style="color: rgb(0, 93, 154);">
        <?php echo __('Apply Ezy Cash Card'); ?>
    </a>
    &nbsp;&nbsp;
    <img src="/images/arrow_blue_single_tab.gif">
    &nbsp;&nbsp;
    <a target="_self" class="navcontainer" href="<?php echo url_for("/member/applyEzyCashCardHistory")?>" style="color: rgb(134, 197, 51);">
        <?php echo __('Apply Ezy Cash Card History'); ?>
    </a>
</div>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Apply Ezy Cash Card History') ?></span></td>
    </tr>
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
                    <th colspan="2"><?php echo __('Apply Ezy Cash Card History') ?></th>
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
                                <th>id</th>
                                <th><?php echo __('Date') ?></th>
                                <th><?php echo __('Total Cards Applied') ?></th>
                                <th><?php echo __('Sub Total') ?></th>
                                <th><?php echo __('Status') ?></th>
                                <th><?php echo __('Remarks') ?></th>
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