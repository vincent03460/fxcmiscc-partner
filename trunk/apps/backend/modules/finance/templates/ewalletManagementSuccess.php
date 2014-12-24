<?php
use_helper('I18N');
?>

<?php echo form_tag('admin/doLogin', 'id=loginForm') ?>

<script type="text/javascript">
var walletDatagrid = null;
$(function() {
    $('#ewalletAmount').autoNumeric({
        mDec: 2
    });

    $("#btnSubmit").button().click(function(event){
        event.preventDefault();

        var amount = $('#ewalletAmount').autoNumericGet();

        if (amount <= 0) {
            alert("Amount must be greater than 0");
            return false;
        }

        waiting();
    	$.ajax({
        	type : 'POST',
            url : "<?php echo url_for("/finance/doUpdateWallet"); ?>",
            dataType : 'json',
            cache: false,
            data: {
            	amount : amount
            	, walletType : "ECASH"
            	, distId : $('#optMember').val()
            	, externalRemark : $('#externalRemark').val()
            	, internalRemark : $('#internalRemark').val()
                , creditDebit : $('#creditDebit').val()
            },
            success : function(data) {
                alert("Update Successful");
                $("#ewalletAmount").val(0).focus();
                //$("#externalRemark").val("");
                //$("#internalRemark").val("");
                walletDatagrid.fnDraw();
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Your login attempt was not successful. Please try again.");
            }
        });
    });
});
</script>

<input type="hidden" id="distId" value="0">
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
    <div class="portlet">
        <div class="portlet-header"><?php echo __('e-Wallet Management') ?></div>
        <div class="portlet-content">
            <div id="divPIPS">
                <table class="display" id="datagridByMonth" border="0" width="100%">

                    <tr>
                        <td class="caption">Member ID</td>
                        <td class="value">
                            <select id="optMember">
                                <?php
                                    foreach ($dists as $dist) {
                                ?>
                                    <option value="<?php echo $dist->getDistributorId();?>"><?php echo $dist->getDistributorCode()."-".$dist->getFullname();?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption" style="width: 25%">e-Point</td>
                        <td class="value">
                            <input type="text" name="ewalletAmount" id="ewalletAmount" value="0" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">Credit / Debit</td>
                        <td class="value">
                            <select id="creditDebit" name="creditDebit">
                                <option value="CREDIT">CREDIT</option>
                                <option value="DEBIT">DEBIT</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">External Remarks</td>
                        <td class="value">
                            <input type="text" name="externalRemark" id="externalRemark" value="" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td class="caption">Internal Remarks</td>
                        <td class="value">
                            <input type="text" name="internalRemark" id="internalRemark" value="" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button id="btnSubmit"><?php echo __('Submit') ?></button>
                        </td>
                    </tr>
                </table>
            </div>
            <script type="text/javascript">

                $(function() {


                    walletDatagrid = $("#walletDatagrid").r9jasonDataTable({
                        // online1DataTable extra params
                        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                        "extraParam" : function(aoData) { // pass extra params to server
                            aoData.push({ "name": "filterSearch_walletType", "value": "ECASH"  });
                            aoData.push({ "name": "filterSearch_distCode", "value": $("#search_distCode").val()  });
                            aoData.push({ "name": "filterSearch_fullname", "value": $("#search_fullname").val()  });
                        },
                        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
                        },

                        // datatables params
                        "bLengthChange": true,
                        "bFilter": false,
                        "bProcessing": true,
                        "bServerSide": true,
                        "bAutoWidth": false,
                        "sAjaxSource": "<?php echo url_for('financeList/walletList') ?>",
                        "sPaginationType": "full_numbers",
                        "aaSorting": [
                            [0,'desc']
                        ],
                        "aoColumns": [
                            { "sName" : "account.account_id", "bVisible" : false},
                            { "sName" : "dist.distributor_code",  "bSortable": true},
                            { "sName" : "dist.full_name",  "bSortable": true},
                            { "sName" : "account.transaction_type",  "bSortable": true},
                            { "sName" : "account.credit",  "bSortable": true},
                            { "sName" : "account.debit",  "bSortable": true},
                            { "sName" : "account.balance",  "bSortable": true},
                            { "sName" : "account.remark",  "bSortable": true},
                            { "sName" : "account.internal_remark",  "bSortable": true},
                            { "sName" : "account.created_on",  "bSortable": true}
                        ]
                    });

                }); // end $(function())

            </script>
            <br>

            <div id="tabs-pipsBonus">
                <input type="hidden" id="search_date" value="<?php echo $firstDate;?>">
                <table class="display" id="walletDatagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id [hidden]</th>
                        <th>Member ID</th>
                        <th>Full Name</th>
                        <th>Transaction Type</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Last Balance</th>
                        <th>Remark</th>
                        <th>Internal Remark</th>
                        <th>Created On</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input title="" size="10" type="text" id="search_distCode" value="" class="search_init"/></td>
                        <td><input title="" size="10" type="text" id="search_fullname" value="" class="search_init"/></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
</div>

</form>