<?php use_helper('I18N') ?>

<script>
var datagrid = null;
$(function() {
    $("#financeForm").validate({
        messages : {
            total_epoint: {
                equalTo: "Please enter e-point"
            }
        },
        rules : {
            "total_epoint" : {
                required : true
            }
        },
        submitHandler: function(form) {
            var amount = $('#total_epoint').autoNumericGet();
            $("#total_epoint").val(amount);
            form.submit();
        }
    });

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
        "sAjaxSource": "<?php echo url_for("/financeList/advanceEpointLogList");?>",
        "sPaginationType": "full_numbers",
        "aaSorting": [
            [0,'desc']
        ],
        "aoColumns": [
            { "sName" : "created_on",  "bSortable": true},
            { "sName" : "credit", "bVisible" : true,  "bSortable": true},
            { "sName" : "debit",  "bSortable": true},
            { "sName" : "balance",  "bSortable": true},
            { "sName" : "transaction_type",  "bSortable": true},
            { "sName" : "remark",  "bSortable": true}
        ]
    });

    $('#total_epoint').autoNumeric({
        mDec: 0
    });
});

function reassignDatagridEventAttr() {
    $("a[id=editLink]").click(function(event) {

    });
}
</script>

<?php echo form_tag('finance/doAdvanceEpoint', 'id=financeForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 800px">
<div class="portlet">
    <div class="portlet-header">Advance e-Point</div>
    <div class="portlet-content">
        <table cellpadding="3" cellspacing="3" border="0" width="100%" class="tablelist">
            <tr>
                <td colspan=2 align='center'>
                    <?php if ($sf_flash->has('successMsg')): ?>
                    <div class="ui-widget">
                        <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
                            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                                <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($sf_flash->has('errorMsg')): ?>
                    <div class="ui-widget">
                        <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-error ui-corner-all">
                            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                                <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" width="650px" style="margin:0 auto">
                        <tr>
                            <td width="20%">
                                <strong><?php echo __('e-Point Amount'); ?></strong>
                            </td>
                            <td>
                                <input name="total_epoint" id="total_epoint" tabindex="3"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan='3' align='center'>
                    <button><?php echo __('Submit') ?></button>
                </td>
            </tr>
        </table>

        <table class="display" id="datagrid" border="0" width="100%">
            <thead>
            <tr>
                <th><?php echo __('Date') ?></th>
                <th><?php echo __('In') ?></th>
                <th><?php echo __('Out') ?></th>
                <th><?php echo __('Balance') ?></th>
                <th><?php echo __('Transaction Type') ?></th>
                <th><?php echo __('Remarks') ?></th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <select id="search_action">
                        <option value="">ALL</option>
                        <option value="ADVANCE">ADVANCE</option>
                        <option value="POINT PURCHASE">POINT PURCHASE</option>
                    </select>
                </td>
                <td></td>
            </tr>
            </thead>
        </table>
    </div>
</div>
</div>
</form>