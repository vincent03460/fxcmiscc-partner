<script type="text/javascript">
var isSubmitAjax = true;
var jform = null;
var datagrid = null;

$(function(){
	jform = $("#enquiryForm").validate({
		submitHandler: function(form) {
			if(isSubmitAjax){
				//alert("submit ajax");
				datagrid.fnDraw();
			}else {
				//alert("not submit ajax");
				form.submit();
			}
		}
	});

	datagrid = $("#datagrid").r9jasonDataTable({
		// online1DataTable extra params
		"idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
		"extraParam" : function(aoData){ // pass extra params to server
			aoData.push( { "name": "filterDistcode", "value": $("#search_distCode").val()  } );
            aoData.push( { "name": "filterMt4Userame", "value": $("#search_mt4Username").val() } );
            aoData.push( { "name": "filterFullName", "value": $("#search_fullName").val() } );
            aoData.push( { "name": "filterEmail", "value": $("#search_email").val() } );
            aoData.push( { "name": "filterParentCode", "value": $("#search_parentCode").val() } );
            aoData.push( { "name": "filterStatusCode", "value": $("#search_statusCode").val() } );
		},
		"reassignEvent" : function(){ // extra function for reassignEvent when JSON is back from server
			reassignDatagridEventAttr();
		},
		
		// datatables params
		"bLengthChange": true,
		"bFilter": false,
		"bProcessing": true,
		"bServerSide": true,
        "bAutoWidth": false,
        "sScrollX": "100%",
        //"sScrollXInner": "150%",
		"sAjaxSource": "<?php echo url_for('marketingList/distList') ?>",
		"sPaginationType": "full_numbers",
		"aoColumns": [
		              { "sName" : "dist.distributor_id", "bVisible" : false},
		              { "sName" : "dist.distributor_id",  "bSortable": false, "fnRender": function ( oObj ) {
                          var idx = 2;
                          $("#dgAddPanel").data("data_" + oObj.aData[0], {
                                distributor_id : oObj.aData[0]
                                , distributor_code : oObj.aData[idx++]
                                , rank_code : oObj.aData[idx++]
                                , SUM_EPOINT : oObj.aData[idx++]
                                , SUM_ECASH : oObj.aData[idx++]
                                , userpassword : oObj.aData[idx++]
                                , userpassword2 : oObj.aData[idx++]
                                , mt4_user_name : oObj.aData[idx++]
                                , mt4_password : oObj.aData[idx++]
                                , full_name : oObj.aData[idx++]
                                , nickname : oObj.aData[idx++]
                                , ic : oObj.aData[idx++]
                                , country : oObj.aData[idx++]
                                , address : oObj.aData[idx++]
                                , postcode : oObj.aData[idx++]
                                , email : oObj.aData[idx++]
                                , contact : oObj.aData[idx++]
                                , gender : oObj.aData[idx++]
                                , dob : oObj.aData[idx++]
                                , bank_name : oObj.aData[idx++]
                                , bank_acc_no : oObj.aData[idx++]
                                , bank_holder_name : oObj.aData[idx++]
                                , bank_swift_code : oObj.aData[idx++]
                                , visa_debit_card : oObj.aData[idx++]
                                , parent_nickname : oObj.aData[idx++]
                                , status_code : oObj.aData[idx++]
                                , created_on : oObj.aData[idx++]
                                , file_bank_pass_book : oObj.aData[idx++]
                                , file_proof_of_residence : oObj.aData[idx++]
                                , file_nric : oObj.aData[idx++]
                                , bank_branch : oObj.aData[idx++]
                                , bank_address : oObj.aData[idx++]
                          });
		  				  return "<a id='transferEpointLink' href='#' title='Transfer e-Point'>Transfer</a>";
		  				}},
		              { "sName" : "dist.distributor_code",  "bSortable": true},
		              { "sName" : "package.price",  "bSortable": true},
		              { "sName" : "epointWallet.SUM_EPOINT",  "bSortable": true},
		              { "sName" : "ewalletWallet.SUM_ECASH",  "bSortable": true},
		              { "sName" : "tblUser.userpassword",  "bSortable": true},
		              { "sName" : "tblUser.userpassword2",  "bSortable": true},
		              { "sName" : "tblUser.userpassword2",  "bSortable": true},
		              { "sName" : "tblUser.userpassword2",  "bSortable": true},
		              { "sName" : "dist.full_name",  "bSortable": true},
		              { "sName" : "dist.nickname",  "bSortable": true},
		              { "sName" : "dist.ic",  "bSortable": true},
		              { "sName" : "dist.country",  "bSortable": true},
		              { "sName" : "dist.address",  "bSortable": true},
		              { "sName" : "dist.postcode",  "bSortable": true},
		              { "sName" : "dist.email",  "bSortable": true},
		              { "sName" : "dist.contact",  "bSortable": true},
		              { "sName" : "dist.gender",  "bSortable": true},
		              { "sName" : "dist.dob",  "bSortable": true},
		              { "sName" : "dist.bank_name",  "bSortable": true},
		              { "sName" : "dist.bank_acc_no",  "bSortable": true},
		              { "sName" : "dist.bank_holder_name",  "bSortable": true},
		              { "sName" : "dist.bank_swift_code",  "bSortable": true},
		              { "sName" : "dist.visa_debit_card",  "bSortable": true},
		              { "sName" : "dist.upline_dist_code",  "bSortable": true},
		              { "sName" : "dist.status_code",  "bSortable": true},
		              { "sName" : "dist.created_on",  "bSortable": true}
		              , { "sName" : "dist.file_bank_pass_book",  "bSortable": true, "fnRender": function ( oObj ) {
                            if (oObj.aData[28] != "") {
                                return "<a href='<?php echo url_for("/marketing/downloadBankPassBook") ?>?q=" + oObj.aData[0] + "'><img src='/images/common/fileopen.png' alt='view file'></a>";
                            } else {
                                return "";
                            }
                      }}
		              , { "sName" : "dist.file_proof_of_residence",  "bSortable": true, "fnRender": function ( oObj ) {
                            if (oObj.aData[29] != "") {
                                return "<a href='<?php echo url_for("/marketing/downloadProofOfResidence") ?>?q=" + oObj.aData[0] + "'><img src='/images/common/fileopen.png' alt='view file'></a>";
                            } else {
                                return "";
                            }
                      }}
		              , { "sName" : "dist.file_nric",  "bSortable": true, "fnRender": function ( oObj ) {
                            if (oObj.aData[30] != "") {
                                return "<a href='<?php echo url_for("/marketing/downloadNric") ?>?q=" + oObj.aData[0] + "'><img src='/images/common/fileopen.png' alt='view file'></a>";
                            } else {
                                return "";
                            }
                      }},
                    { "sName" : "dist.bank_branch",  "bSortable": true},
                    { "sName" : "dist.bank_address",  "bSortable": true}
		]
	});

    $("#btnAdd").button({
        text: true
        , icons: {
            primary: 'ui-icon-circle-plus'
        }
    }).click(function(event){
        event.preventDefault();

        $("#dgAddPanelId").val("");
        $("#dgAddPanel").dialog("open");
    });
}); // end $(function())

//all event in detail datagrid need to reassign because, every remote call, the DOM will be restructure again.
function reassignDatagridEventAttr(){
	$("a[id=transferEpointLink]").click(function(event){
		// stop event
		event.preventDefault();

		// event.target is <a> itself, parent() is <td>, while parent().parent() get <tr>
		//var id = alert("id = " +$(event.target).parent().parent().attr("id"));
		var id = $(event.target).parent().parent().attr("id");
        $("#dgAddPanelId").val(id);
        $("#dgAddPanel").dialog("open");
	});
}

</script>

<?php echo form_tag('admin/doLogin', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 1100px">
<div class="portlet">
    <div class="portlet-header">e-Point Transfer</div>
    <div class="portlet-content">
	<table width="100%" border="0">
		<tr>
			<td>
			<table width="100%">
				<tr>
					<td>
                    <div style="width: 1050px">
					<table class="display" id="datagrid" border="0" width="100%">
                        <thead>
                            <tr>
								<th>id [hidden]</th>
                                <th>&nbsp;</th>
								<th>Distributor Code</th>
								<th>Package</th>
								<th>ePoint</th>
								<th>eWallet</th>
								<th>Password</th>
								<th>Security Password</th>
								<th>MT4 ID</th>
								<th>MT4 Password</th>
								<th>Full Name</th>
								<th>Nick Name</th>
								<th>IC</th>
								<th>Country</th>
								<th>Address</th>
								<th>Postcode</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Gender</th>
								<th>DOB</th>
								<th>Bank Name</th>
								<th>Bank Account No.</th>
								<th>Bank Holder Name</th>
								<th>Bank Swift Code</th>
								<th>Visa Debit Card</th>
								<th>Referral</th>
								<th>Status</th>
								<th>Add Date</th>
								<th>Bank Account Proof</th>
								<th>Proof of Residence</th>
								<th>NRIC</th>
								<th>Bank Branch</th>
								<th>Bank Address</th>
							</tr>
                            <tr>
                                <td></td>
                                <td></td>
								<td><input title="" size="10" type="text" id="search_distCode" value="" class="search_init"/></td>
								<td></td>
								<td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input title="" size="10" type="text" id="search_mt4Username" value="" class="search_init"/></td>
                                <td></td>
                                <td><input title="" size="10" type="text" id="search_fullName" value="" class="search_init"/></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input title="" size="10" type="text" id="search_email" value="" class="search_init"/></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input title="" size="10" type="text" id="search_parentCode" value="" class="search_init"/></td>
                                <td><input title="" size="10" type="text" id="search_statusCode" value="" class="search_init"/></td>
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
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
    </div>
</div>
</div>
<script type="text/javascript">
$(function(){
    $("#dgAddPanel").dialog("destroy");
    $("#dgAddPanel").theoneDialog({
        width:700,
        open: function() {
            populateDgAddPanel();
        },
        close: function() {

        },
        buttons: {
            <?php if ($sf_user->hasCredential(array(AP::AL_READONLY), false)) {
            } else {
            ?>
            Submit: function() {
                waiting();

                var doAction = $("#doAction").val();
                var doTransactionType = $("#doTransactionType").val();
                var amount = $('#epointAmount').autoNumericGet();
                $("#epointAmount").val(amount);

                if (amount == "" || amount <= 0) {
                    alert("Amount cannot be blank.");
                    $("#epointAmount").focus().select();
                } else {
                    $.ajax({
                        type : 'POST',
                        url : "<?php echo url_for('finance/doEpointTransfer') ?>",
                        dataType : 'json',
                        cache: false,
                        data: {
                            distId : $('#dgAddPanelId').val()
                            , epointAmount : $('#epointAmount').val()
                            , internalRemark : $('#internalRemark').val()
                            , remark : $('#remark').val()
                            , doAction : doAction
                            , doTransactionType : doTransactionType
                        },
                        success : function(data) {
                            if (data.error) {
                                alert(data.errorMsg);
                            } else {
                                $("#dgAddPanel").dialog('close');
                                //datagrid.fnDraw();
                                alert("Record Save Successfully.");
                            }
                        },
                        error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("Server connection error.");
                        }
                    });
                }
            },
            <?php } ?>
            Cancel: function() {
                $(this).dialog('close');
            }
        }
    });

    $('#epointAmount').autoNumeric({
        mDec: 2
    });
});

function populateDgAddPanel() {
    $("#dgMsg").hide();
    $("#dgAddPanelUserName").attr("readonly", "readonly");
    var data = $("#dgAddPanel").data("data_" + $("#dgAddPanelId").val());
    $("#dgAddPanelDistCode").val(data.distributor_code);
    $("#dgAddPanelmt4_user_name").val(data.mt4_user_name);
    $("#dgAddPanelmt4_password").val(data.mt4_password);
    $("#dgAddPanelName").val(data.full_name);
    $("#dgAddPanelEmail").val(data.email);
    $("#epointAmount").val("0").focus().select();

    $(".indicator").show();
    $.ajax({
        type : 'POST',
        url : "<?php echo url_for('finance/enquiryCP') ?>",
        dataType : 'json',
        cache: false,
        data: {
            distId : $('#dgAddPanelId').val()
        },
        success : function(data) {
            if (data.error) {
                alert(data.errorMsg);
            } else {
                $(".indicator").hide();
                $("#cp1").val(data.cp1);
                $("#cp2").val(data.cp2);
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Server connection error.");
        }
    });
}
</script>
<div id="dgAddPanel" style="display:none; width: 850px" title="e-Point Transfer">
    <input type="hidden" id="dgAddPanelId">
    <table width="100%">
        <tr>
            <td colspan="3">
                <div class="ui-widget" id="dgMsg" style="display:none;">
                </div>
            </td>
        </tr>
    </table>
    <fieldset class="collapsible">
    <legend class="collapsible">Details</legend>
    <table cellpadding="3" cellspacing="3">
        <tr>
            <td width="30%">Distributor Code</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelDistCode" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
        <tr>
            <td>MT4 ID</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelmt4_user_name" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
            <td>MT4 Password</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelmt4_password" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelName" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelEmail" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>

        <tr>
            <td>Remark</td>
            <td>:</td>
            <td><input name="remark" id="remark" value="TRANSFER FROM COMPANY" class="text ui-widget-content ui-corner-all" size="25"/></td>
            <td style="color: blue; font-weight: bold;">E-POINT<img src="/images/common/indicator.gif" class="indicator" style="display: none;"></td>
            <td>:</td>
            <td><input name="cp1" id="cp1" class="text ui-widget-content ui-corner-all" size="25" disabled="disabled" style="color: yellow;"/></td>
        </tr>

        <tr>
            <td>Internal Remark</td>
            <td>:</td>
            <td><input name="internalRemark" id="internalRemark" class="text ui-widget-content ui-corner-all" size="25"/></td>
            <td style="color: blue; font-weight: bold;">E-WALLET<img src="/images/common/indicator.gif" class="indicator" style="display: none;"></td>
            <td>:</td>
            <td><input name="cp2" id="cp2" class="text ui-widget-content ui-corner-all" size="25" disabled="disabled" style="color: yellow;"/></td>
        </tr>

        <tr id="tr_action">
            <td>Action</td>
            <td>:</td>
            <td>
                <select id="doAction" name="doAction">
                    <option value="EPOINT">Transfer e-Point</option>
                    <option value="ECASH">Transfer e-Wallet</option>
<!--                    <option value="FXCMISCC">Transfer FXCMISCC</option>-->
                    <option value="PROMO">Transfer Promo</option>
                </select>
            </td>
            <td>To be Transfer e-Point</td>
            <td>:</td>
            <td><input name="epointAmount" id="epointAmount" class="text ui-widget-content ui-corner-all" size="25"/></td>
        </tr>

        <tr>
            <td>Transaction Type</td>
            <td>:</td>
            <td>
                <select id="doTransactionType" name="doTransactionType">
                    <option value="ADJUSTMENT">ADJUSTMENT</option>
                    <option value="ADVANCE">ADVANCE</option>
                    <option value="REIMBURSEMENT">REIMBURSEMENT</option>
                    <option value="TRANSFER FROM" selected="selected">TRANSFER FROM</option>
                    <option value="GROUP BONUS">GROUP BONUS</option>
                </select>
            </td>
        </tr>
    </table>
    </fieldset>
</div>
</form>