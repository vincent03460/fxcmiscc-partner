<?php use_helper('I18N');
echo "<link href='/sf/sf_admin/css/main.css' media='screen' type='text/css' rel='stylesheet'>";
?>

<link rel="stylesheet" type="text/css" href="/js/uploadify-v3.1/uploadify.css" />

<style type="text/css">
#sf_admin_container .sf_admin_row_2 td {
    background-color: #ff6666;
}
</style>

<script type="text/javascript" src="/js/uploadify-v3.1/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript">
var jform = null;

$(function(){
    $("#uploadForm").validate({
        messages : {
            file_upload: {
                accept: "Please select a CSV File (*.csv)"
            }
        },
        rules : {
            "file_upload" : {
                required: function(element) {
                    return $("#doAction").val() == "upload";
                }
                , accept:'csv'
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        }
    });

    $("#pipsDate").datepicker();

    $("#btnSubmit").button({
        text: true
    }).click(function(event){
        $("#uploadForm").attr("action", "<?php echo url_for("/marketing/doUploadPips")?>");
        $("#doAction").val("upload");
    });

    $("#btnShowPipsData").button({
        text: true
        , icons: {
            primary: 'ui-icon-image'
        }
    }).click(function(event){
        $("#uploadForm").attr("action", "<?php echo url_for("/marketing/pipsUpload")?>");
        $("#doAction").val("show_pips");
    });

    $("#btnApprove").button({
        text: true
        , icons: {
            primary: 'ui-icon-circle-check'
        }
    }).click(function(event){
        $("#uploadForm").attr("action", "<?php echo url_for("/marketing/pipsUpload")?>");
        $("#doAction").val("approve_pips");
    });

    $("#btnCalculatePip").button({
        text: true
        , icons: {
            primary: 'ui-icon-contact'
        }
    }).click(function(event){
        $("#uploadForm").attr("action", "<?php echo url_for("/marketing/pipsUpload")?>");
        $("#doAction").val("calc_pips");
    });
}); // end $(function())

</script>

<?php echo form_tag('marketing/doUploadDailyPips', array("enctype" => "multipart/form-data", "id" => "uploadForm")) ?>
<input type="hidden" name="doAction" id="doAction">
<div style="padding: 10px; top: 30px; position: absolute; width: 1100px">
<div class="portlet">
    <div class="portlet-header">Pips Upload</div>
    <div class="portlet-content">
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
	<table width="100%" border="0">
        <tr>
            <th class="caption">Pips Date</th>
            <td class="value"><input type="text" name="pipsDate" id="pipsDate" readonly="readonly"></td>
        </tr>
		<tr>
            <th class="caption">Pips Upload</th>
			<td class="value">
<!--                <input type="file" name="file_upload" id="file_upload" />-->
                <?php echo input_file_tag('file_upload', array("id" => "file_upload", "name" => "file_upload")); ?>
                <button id="btnSubmit">Submit</button>
			</td>
		</tr>
	</table>

    <?php if (count($pipDBs)) { ?>
    <div class="portlet" id="sf_admin_container">
        <table class="sf_admin_list" width="100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Pip</th>
                <th>Login</th>
                <th>Login name</th>
                <th>Deposit</th>
                <th>Withdraw</th>
                <th>In out</th>
                <th>Credit</th>
                <th>Volume</th>
                <th>Commission</th>
                <th>Taxes</th>
                <th>Agent</th>
                <th>Storage</th>
                <th>Profit</th>
                <th>Last balance</th>
                <th>Status code</th>
                <th>Remarks</th>
                <th>Month Traded</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $idx = 1;
                foreach ($pipDBs as $pipDB):
                if ("ERROR" == $pipDB->getStatusCode()) {
                    $className = "sf_admin_row_2";
                } else {
                    if ($className == "sf_admin_row_0") {
                        $className = "sf_admin_row_1";
                    } else {
                        $className = "sf_admin_row_0";
                    }
                }
                ?>
                <tr class="<?php echo $className?>">
                      <td><?php echo $idx++ ?></td>
                      <td><?php echo $pipDB->getPipId() ?></td>
                      <td><?php echo $pipDB->getLoginId() ?></td>
                      <td><?php echo $pipDB->getLoginName() ?></td>
                      <td><?php echo $pipDB->getDeposit() ?></td>
                      <td><?php echo $pipDB->getWithdraw() ?></td>
                      <td><?php echo $pipDB->getInOut() ?></td>
                      <td><?php echo $pipDB->getCredit() ?></td>
                      <td><?php echo $pipDB->getVolume() ?></td>
                      <td><?php echo $pipDB->getCommission() ?></td>
                      <td><?php echo $pipDB->getTaxes() ?></td>
                      <td><?php echo $pipDB->getAgent() ?></td>
                      <td><?php echo $pipDB->getStorage() ?></td>
                      <td><?php echo $pipDB->getProfit() ?></td>
                      <td><?php echo $pipDB->getLastBalance() ?></td>
                      <td><?php echo $pipDB->getStatusCode() ?></td>
                      <td><?php echo $pipDB->getRemarks() ?></td>
                      <td><?php echo $month[$pipDB->getMonthTraded()] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php } elseif ($refId != "") {  ?>
<script type="text/javascript">
var datagrid = null;

$(function(){
    datagrid = $("#datagrid").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push({ "name": "filterUsername", "value": $("#search_upgradeUsername").val()  });
            aoData.push({ "name": "filterMt4Id", "value": $("#search_mt4").val()  });
            aoData.push({ "name": "filterCommissionType", "value": $("#commissionTypeOptions").val()  });
            aoData.push({ "name": "filterStatusCode", "value": ""  });
            aoData.push({ "name": "filterReferId", "value": '<?php echo $refId;?>'  });
        },
        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
        },

        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sAjaxSource": "<?php echo url_for('financeList/pipsBonusList') ?>",
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sName" : "bonus.commission_id", "bVisible" : false},
            { "sName" : "dist.distributor_code",  "bSortable": true},
            { "sName" : "dist.distributor_code",  "bSortable": true},
            /*{ "sName" : "dist.mt4_user_name",  "bSortable": true},*/
            { "sName" : "bonus.commission_type",  "bSortable": true},
            { "sName" : "bonus.credit",  "bSortable": true},
            { "sName" : "bonus.remark",  "bVisible": false},
            { "sName" : "bonus.remark",  "bSortable": false},
            { "sName" : "bonus.month_traded",  "bSortable": true}
        ]
    });
}); // end $(function())

</script>
    <div>
        <table class="display" id="datagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th>id [hidden]</th>
                <th>e-Trader</th>
                <th>MT4</th>
                <th>Commission Type</th>
                <th>Amount</th>
                <th>Remarks</th>
                <th>Description</th>
                <th>Month</th>
            </tr>
            <tr>
                <td></td>
                <td><input title="" size="10" type="text" id="search_upgradeUsername" value="" class="search_init"/></td>
                <td><input title="" size="10" type="text" id="search_mt4" value="" class="search_init"/></td>
                <td>
                    <select id="commissionTypeOptions">
                        <option value="">All</option>
                        <option value="PIPS_BONUS">Pips Bonus</option>
                        <option value="CREDIT_REFUND">Credit Refund</option>
                        <option value="FUND_MANAGEMENT">Fund Management</option>
                    </select>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
        </table>
    </div>
<?php }?>
</div>
</div>
</div>

</form>