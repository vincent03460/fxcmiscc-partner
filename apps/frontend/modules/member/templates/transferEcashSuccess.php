<?php
use_helper('I18N');
?>

<script type="text/javascript" language="javascript">
    $(function() {
        $("#btnSubmit").click(function(){
            $("#transferForm").submit();
        });
        $("#transferForm").validate({
            messages : {
                transactionPassword: {
                    remote: "Security Password is not valid."
                }
            },
            rules : {
                "sponsorId" : {
                    required: true
                    //, minlength : 8
                },
                "ecashAmount" : {
                    required : true
                },
                "transactionPassword" : {
                    required : true,
                    remote: "/member/verifyTransactionPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                var amount = $('#ecashAmount').autoNumericGet();
                var epointBalance = $('#epointBalance').autoNumericGet();
                //console.log(amount);
                //console.log(epointBalance);
                if (parseFloat(epointBalance) < (parseFloat(amount) + parseFloat($("#processFee").val()))) {
                    alert("<?php echo __("In-sufficient e-Wallet")?>");
                    return false;
                }

                $("#ecashAmount").val(amount);
                form.submit();
            }
        });

        $("#sponsorId").change(function() {
            if ($.trim($('#sponsorId').val()) != "") {
                verifySponsorId();
            }
        });

        $('#ecashAmount').autoNumeric({
            mDec: 2
        });
    });

    function verifySponsorId() {
        waiting();
        $.ajax({
            type : 'POST',
            url : "/member/verifySameGroupSponsorId",
            dataType : 'json',
            cache: false,
            data: {
                sponsorId : $('#sponsorId').val()
            },
            success : function(data) {
                if (data == null || data == "") {
                    error("<?php echo __("Invalid username.")?>");
                    $('#sponsorId').focus();
                    $("#sponsorName").html("");
                } else {
                    $.unblockUI();
                    $("#sponsorName").html(data.fullname);
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Your login attempt was not successful. Please try again.");
            }
        });
    }
</script>

<td valign="top">

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <form class="form-horizontal label-left" method="post"
          action="/member/transferEcash"
          data-validate="parsley"
          id="transferForm" name="transferForm">

        <h2><?php echo __("e-Wallet Transfer"); ?></h2>

        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <th>
                    <label class="control-label" for="sponsorId">
                        <?php echo __("Transfer To Trader ID")?>
                    </label>
                </th>
                <td>
                    <input type="text" name="sponsorId" id="sponsorId" class="form-control" />
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="sponsorName">
                        <?php echo __("Trader Name")?>
                    </label>
                </th>
                <td>
                    <strong><span id="sponsorName"></span></strong>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="epointBalance">
                        <?php echo __("e-Wallet Balance")?>
                    </label>
                </th>
                <td>
                    <input name="epointBalance" type="text" id="epointBalance" readonly="readonly" value="<?php echo number_format($ledgerAccountBalance, 2); ?>" class="form-control"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="ecashAmount">
                        <?php echo __("Transfer e-Wallet Amount")?>
                    </label>
                </th>
                <td>
                    <input name="ecashAmount" type="text" id="ecashAmount" class="form-control"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="transactionPassword">
                        <?php echo __("Security Password")?>
                    </label>
                </th>
                <td>
                    <input name="transactionPassword" type="password" id="transactionPassword" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="pt10" align="right">
                    <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit") ?>" />
                </td>
            </tr>
            </tbody>
        </table>

    </form>
    <hr/>

    <h2><?php echo __("e-Wallet Transfer History")?></h2>

    <script type="text/javascript" language="javascript">
        var datagrid = null;
        $(function() {
            datagrid = $("#datagrid").r9jasonDataTable({
                // online1DataTable extra params
                "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                "extraParam" : function(aoData) { // pass extra params to server
                    aoData.push({ "name": "filterAction", "value": "TRANSFER TO" });
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
                "sAjaxSource": "/finance/ecashLogList",
                "sPaginationType": "full_numbers",
                "aaSorting": [
                    [0,'desc']
                ],
                "aoColumns": [
                    { "sName" : "created_on",  "bSortable": true},
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

        $(document).ready(function () {
            $('#datagrid thead>tr>th').css('border-bottom', ' 2px rgba(189, 167, 102, 0.4) solid');
        });
    </script>

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
        </thead>
    </table>

</td>