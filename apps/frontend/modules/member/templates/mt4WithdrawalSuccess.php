<?php
use_helper('I18N');
?>

<script type="text/javascript" language="javascript">
    var usdToMyr = "";
    $(function() {
        $("#paymentType").change(function() {
            /*if ($(this).val() == "BANK") {
                $(".bankDisplay").show();
            } else {
                $(".bankDisplay").hide();
            }*/
            $("#cbo_pt2Amount").change();
        }).trigger("change");

        $("#btnSubmit").click(function(){
            $("#withdrawForm").submit();
        });

        $("#cbo_pt2Amount").change(function() {
            var pt2Final = $("#cbo_pt2Amount").val() - 50;
            pt2Final = $("#cbo_pt2Amount").val();
            var handlingCharge = $("#cbo_pt2Amount").val() * 0.95;
            handlingCharge = $("#cbo_pt2Amount").val();

            if (parseFloat(handlingCharge) < pt2Final)
                pt2Final = handlingCharge;

            $("#pt2Final").autoNumericSet(pt2Final);
        }).trigger("change");

        $("#withdrawForm").validate({
            messages : {
                transactionPassword: {
                    remote: "Security Password is not valid."
                }
            },
            rules : {
                "transactionPassword" : {
                    required : true
                    , remote: "/member/verifyTransactionPassword"
                }
            },
            submitHandler: function(form) {
                if ($("#pt2Id").val() == "") {
                    alert("MT4 status is pending.");
                    return false;
                }
                waiting();

                form.submit();
            }
        });
    }); // end function
</script>

<?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

<form class="form-horizontal" method="post" action="/member/mt4Withdrawal" id="withdrawForm" name="withdrawForm">

    <h2><?php echo __("MT4 Withdrawal"); ?></h2>

    <table cellpadding="5" cellspacing="1">
        <tbody>
        <tr>
            <th>
                <label class="control-label" for="pt2Id">
                    <?php echo __("MT4 ID")?>
                </label>
            </th>
            <td>
                <select name="pt2Id" id="pt2Id">
                    <?php
                    if (count($distMt4DBs) >= 1) {
                        foreach ($distMt4DBs as $distMt4DB) {
                            echo "<option value='" . $distMt4DB->getMt4UserName() . "'>" . $distMt4DB->getMt4UserName() . "</option>";
                        }
                    } else {
                        echo "<option value=''>--</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr style="display: none;">
            <th>
                <label class="control-label" for="paymentType">
                    <?php echo __("Payment Type")?>
                </label>
            </th>
            <td>
                <select name="paymentType" id="paymentType">
                    <option value='VISA'>VISA Cash Card</option>
                    <option value='BANK'>Local Bank Transfer</option>
                </select>
                <input name="myrCurrency" id="myrCurrency" disabled="disabled" value=""/>
                <input name="handlingFee" id="handlingFee" disabled="disabled" value=""/>
            </td>
        </tr>
        <tr>
            <th>
                <label class="control-label" for="cbo_pt2Amount">
                    <?php echo __("MT4 Withdrawal Amount")?>
                </label>
            </th>
            <td>
                <select name="pt2Amount" id="cbo_pt2Amount">
                    <?php
                    //if ($distributorDB->getMt4UserName() != null) {
                    for ($i = 100; $i <= 10000; $i = $i + 100) {
                        echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
                    }

                    for ($i = 20000; $i <= 50000; $i = $i + 10000) {
                        echo "<option value='" . $i . "'>" . number_format($i, 0) . "</option>";
                    }
                    //}
                    ?>
                </select>
            </td>
        </tr>
        <tr style="display: none;">
            <th>
                <label class="control-label" for="pt2Final">
                    <?php echo __("After handling fee")?>
                </label>
            </th>
            <td>
                <input type="text" name="pt2Final" id="pt2Final" readonly="readonly" value="" class="form-control" />
            </td>
        </tr>
        <tr style="display: none;">
            <th>
                <label class="control-label" for="grandAmount">
                    <?php echo __("Grand Amount")?>
                </label>
            </th>
            <td>
                <input type="text" name="grandAmount" id="grandAmount" readonly="readonly" value="" class="form-control" />
                <span class="currencyCode"></span>
            </td>
        </tr>
        <tr>
            <th>
                <label class="control-label" for="transactionPassword">
                    <?php echo __("Security Password")?>
                </label>
            </th>
            <td>
                <input type="password" name="transactionPassword" id="transactionPassword" class="form-control" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo __('NOTE :'); ?>
                <ol class="help-block" style="list-style: decimal; padding-left: 20px;">
                    <li><?php echo __('Minimum withdrawal amount : USD 100'); ?></li>
                    <li><?php echo __('Withdrawal Amount will be credited to e-Wallet'); ?></li>
                    <!--  <li>--><?php //echo __('Handling fee USD50 or 5% whichever is higher'); ?><!--</li>-->
                    <li><?php echo __('Processing time : 5 working days'); ?></li>
                </ol>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td class="pt10" align="right">
                <input type="button" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit");?>" />
            </td>
        </tr>
        </tbody>
    </table>

</form>
<hr/>

<h2><?php echo __("MT4 Withdrawal Status")?></h2>

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
            "sAjaxSource": "/finance/pt2WithdrawalList",
            "sPaginationType": "full_numbers",
            "aaSorting": [
                [2,'desc']
            ],
            "aoColumns": [
                { "sName" : "dist_id", "bVisible" : false,  "bSortable": true},
                { "sName" : "currency_code", "bVisible" : false,  "bSortable": true},
                { "sName" : "created_on",  "bSortable": true},
                { "sName" : "mt4_user_name",  "bSortable": true},
                { "sName" : "amount_requested",  "bSortable": true},
                { "sName" : "handling_fee",  "bVisible": false},
                { "sName" : "grand_amount",  "bVisible": false},
                { "sName" : "payment_type",  "bVisible": false},
                { "sName" : "status_code",  "bSortable": true},
                { "sName" : "remarks",  "bSortable": true}
            ]
        });
    }); // end function

    function reassignDatagridEventAttr() {
    }

    $(document).ready(function () {
        $('#datagrid thead>tr>th').css('border-bottom', ' 2px rgba(189, 167, 102, 0.4) solid');
    });
</script>

<table class="table table-striped" id="datagrid" border="0" width="100%">
    <thead>
    <tr>
        <th></th>
        <th><?php echo __('Currency Code') ?></th>
        <th><?php echo __('Date') ?></th>
        <th><?php echo __('MT4 ID') ?></th>
        <th><?php echo __('Amount Requested (USD)') ?></th>
        <th><?php echo __('Bank Charges (USD)') ?></th>
        <th><?php echo __('Grand Amount (USD)') ?></th>
        <th><?php echo __('Payment Type') ?></th>
        <th><?php echo __('Status') ?></th>
        <th><?php echo __('Remarks') ?></th>
    </tr>
    </thead>
</table>