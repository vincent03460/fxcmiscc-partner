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
//            aoData.push( { "name": "filterEmail", "value": $("#search_email").val() } );
//            aoData.push( { "name": "filterParentCode", "value": $("#search_parentCode").val() } );
//            aoData.push( { "name": "filterStatusCode", "value": $("#search_statusCode").val() } );
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
		"sAjaxSource": "<?php echo url_for('marketingList/ibList') ?>",
		"sPaginationType": "full_numbers",
		"aoColumns": [
		              { "sName" : "dist.distributor_id", "bVisible" : false},
		              { "sName" : "dist.distributor_id",  "bVisible": false, "fnRender": function ( oObj ) {
                          var idx = 2;
                          $("#dgAddPanel").data("data_" + oObj.aData[0], {
                                distributor_id : oObj.aData[0]
                                , distributor_code : oObj.aData[idx++]
                                , rank_code : oObj.aData[idx++]
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
                          });
		  				  return "<a id='editLink' href='#'>Edit</a>";
		  				}},
		              { "sName" : "dist.distributor_code",  "bSortable": true},
		              { "sName" : "dist.rank_code",  "bSortable": true},
		              { "sName" : "tblUser.userpassword",  "bSortable": true},
		              { "sName" : "tblUser.userpassword2",  "bSortable": true},
		              { "sName" : "tblUser.userpassword2",  "bSortable": true},
		              { "sName" : "tblUser.userpassword2",  "bSortable": true},
		              /*{ "sName" : "dist.mt4_user_name",  "bSortable": true},
		              { "sName" : "dist.mt4_password",  "bSortable": true},*/
		              { "sName" : "dist.full_name",  "bSortable": true},
		              { "sName" : "dist.nickname",  "bVisible": false},
		              { "sName" : "dist.ic",  "bVisible": false},
		              { "sName" : "dist.country",  "bVisible": false},
		              { "sName" : "dist.address",  "bVisible": false},
		              { "sName" : "dist.postcode",  "bVisible": false},
		              { "sName" : "dist.email",  "bVisible": false},
		              { "sName" : "dist.contact",  "bVisible": false},
		              { "sName" : "dist.gender",  "bVisible": false},
		              { "sName" : "dist.dob",  "bVisible": false},
		              { "sName" : "dist.bank_name",  "bVisible": false},
		              { "sName" : "dist.bank_acc_no",  "bVisible": false},
		              { "sName" : "dist.bank_holder_name",  "bVisible": false},
		              { "sName" : "dist.bank_swift_code",  "bVisible": false},
		              { "sName" : "dist.visa_debit_card",  "bVisible": false},
		              { "sName" : "dist.upline_dist_code",  "bVisible": false},
		              { "sName" : "dist.status_code",  "bVisible": false},
		              { "sName" : "dist.created_on",  "bVisible": false},
		              { "sName" : "dist.ib_commission",  "bVisible": true}
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
	$("a[id=editLink]").click(function(event){
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
    <div class="portlet-header">Super IB Listing</div>
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
								<th>IB Commission</th>
							</tr>
                            <tr>
                                <td></td>
                                <td></td>
								<td><input title="" size="10" type="text" id="search_distCode" value="" class="search_init"/></td>
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
							</tr>
                        </thead>
                    </table>
                    </div>
                    <div>
                        <button id="btnAdd" style="display: none">Add</button>
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
            Submit: function() {
                waiting();
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url_for('marketing/doSaveDist') ?>",
                    dataType : 'json',
                    cache: false,
                    data: {
                        distId : $('#dgAddPanelId').val()
                        , password : $('#dgAddPanelPassword').val()
                        , password2 : $('#dgAddPanelPassword2').val()
                        , mt4_user_name : $('#dgAddPanelmt4_user_name').val()
                        , mt4_password : $('#dgAddPanelmt4_password').val()
                        , fullname : $('#dgAddPanelName').val()
                        , nickname : $('#dgAddPanelNickName').val()
                        , ic : $('#dgAddPanelIc').val()
                        , country : $('#dgAddPanelCountry').val()
                        , address : $('#dgAddPanelAddress').val()
                        , postcode : $('#dgAddPanelPostcode').val()
                        , email : $('#dgAddPanelEmail').val()
                        , contact : $('#dgAddPanelContact').val()
                        , gender : $('#dgAddPanelGender').val()
                        , dob : $('#dgAddPanelDob').val()
                        , bankName : $('#dgAddPanelBankName').val()
                        , bankAccNo : $('#dgAddPanelBankAccountNo').val()
                        , bankHolderName : $('#dgAddPanelBankHolderName').val()
                        , bank_swift_code : $('#dgAddPanelbank_swift_code').val()
                        , visa_debit_card : $('#dgAddPanelvisa_debit_card').val()
                        , status : $('#dgAddPanelStatus').val()
                    },
                    success : function(data) {
                        if (data.error) {
                            alert(data.errorMsg);
                        } else {
                            $("#dgAddPanel").dialog('close');
                            datagrid.fnDraw();
                            alert("Record Save Successfully.");
                        }
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                        $('#waiting').hide(500);
                        alert("Server connection error.");
                    }
                });
            },
            Cancel: function() {
                $(this).dialog('close');
            }
        }
    });
});

function populateDgAddPanel() {
    $("#dgMsg").hide();
    if ($("#dgAddPanelId").val() == "") {
        $("#dgAddPanelUserName").removeAttr("readonly");
        $("#dgAddPanelUserName").val("");
        $("#dgAddPanelPassword").val("");
        $("#dgAddPanelStatus").val("A");
        $("#dgAddPanelRole").val("");
        $("#dgAddPanelUserName").focus();
    } else {
        $("#dgAddPanelUserName").attr("readonly", "readonly");
        var data = $("#dgAddPanel").data("data_" + $("#dgAddPanelId").val());
        $("#dgAddPanelDistCode").val(data.distributor_code);
        $("#dgAddPanelrank_code").val(data.rank_code);
        $("#dgAddPanelPassword").val(data.userpassword).focus().select();
        $("#dgAddPanelPassword2").val(data.userpassword2).focus().select();
        $("#dgAddPanelmt4_user_name").val(data.mt4_user_name);
        $("#dgAddPanelmt4_password").val(data.mt4_password);
        $("#dgAddPanelName").val(data.full_name);
        $("#dgAddPanelNickName").val(data.nickname);
        $("#dgAddPanelIc").val(data.ic);
        $("#dgAddPanelCountry").val(data.country);
        $("#dgAddPanelAddress").val(data.address);
        $("#dgAddPanelPostcode").val(data.postcode);
        $("#dgAddPanelEmail").val(data.email);
        $("#dgAddPanelContact").val(data.contact);
        $("#dgAddPanelGender").val(data.gender);
        $("#dgAddPanelDob").val(data.dob);
        $("#dgAddPanelBankName").val(data.bank_name);
        $("#dgAddPanelBankAccountNo").val(data.bank_acc_no);
        $("#dgAddPanelBankHolderName").val(data.bank_holder_name);
        $("#dgAddPanelbank_swift_code").val(data.bank_swift_code);
        $("#dgAddPanelvisa_debit_card").val(data.visa_debit_card);
        $("#dgAddPanelParent").val(data.parent_nickname);
        $("#dgAddPanelStatus").val(data.status_code);
        $("#dgAddPanelAddDate").val(data.created_on);
    }
}
</script>
<div id="dgAddPanel" style="display:none; width: 850px" title="User">
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
            <td width="30%">Rank Code</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelrank_code" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
        <tr>
            <td width="30%">Password</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelPassword" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Security Password</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelPassword2" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>MT4 ID</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelmt4_user_name" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>MT4 Password</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelmt4_password" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelName" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Nick Name</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelNickName" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>IC</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelIc" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Country</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelCountry" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelAddress" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Postcode</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelPostcode" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelEmail" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Contact</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelContact" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelGender" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>DOB</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelDob" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Bank Name</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelBankName" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Bank Account No.</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelBankAccountNo" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Bank Holder Name</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelBankHolderName" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Bank Swift Code</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelbank_swift_code" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Visa Debit Card</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelvisa_debit_card" class="text ui-widget-content ui-corner-all" size="25"></td>
            <td>Referral</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelParent" class="text ui-widget-content ui-corner-all" size="25" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td><select id="dgAddPanelStatus" class="text ui-widget-content ui-corner-all">
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="INACTIVE">IN-ACTIVE</option>
                    <option value="PENDING">PENDING</option>
                </select>
            </td>
            <td>Add Date</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelAddDate" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
    </table>
    </fieldset>
</div>
</form>