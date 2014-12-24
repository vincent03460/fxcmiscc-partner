<?php
use_helper('I18N');
?>
<script type="text/javascript">
var isSubmitAjax = true;
var jform = null;
var datagrid = null;
var datagridDetail = null;
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
		"sAjaxSource": "<?php echo url_for('marketingList/distPipsList') ?>",
		"sPaginationType": "full_numbers",
		"aoColumns": [
		              { "sName" : "dist.distributor_id", "bVisible" : false},
		              { "sName" : "dist.distributor_id",  "bVisible": true, "fnRender": function ( oObj ) {
                          var idx = 2;
                          $("#datagrid").data("data_" + oObj.aData[0], {
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
		  				  return "<a id='editLink' href='#'>Details</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a id='byMonthLink' href='#'>By Months</a>";
		  				}},
		              { "sName" : "dist.distributor_code",  "bSortable": true},
		              { "sName" : "dist.rank_code",  "bSortable": true},
		              { "sName" : "tblUser.userpassword",  "bVisible": false},
		              { "sName" : "tblUser.userpassword2",  "bVisible": false},
		              { "sName" : "dist.mt4_user_name",  "bSortable": true},
		              { "sName" : "dist.mt4_password",  "bVisible": false},
		              { "sName" : "dist.full_name",  "bSortable": true},
		              { "sName" : "dist.nickname",  "bVisible": false},
		              { "sName" : "dist.ic",  "bVisible": false},
		              { "sName" : "dist.country",  "bVisible": false},
		              { "sName" : "dist.address",  "bVisible": false},
		              { "sName" : "dist.postcode",  "bVisible": false},
		              { "sName" : "dist.email",  "bSortable": true},
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
		              { "sName" : "comm.SUB_TOTAL",  "bSortable": true}
		]
	});

    datagridDetail = $("#datagridDetail").r9jasonDataTable({
        // online1DataTable extra params
        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
        "extraParam" : function(aoData) { // pass extra params to server
            aoData.push({ "name": "filterDistId", "value": $("#distId").val() });
        },
        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server

        },
        // datatables params
        "bLengthChange": true,
        "bFilter": false,
        "bProcessing": true,
        "bServerSide": true,
        "bAutoWidth": false,
        "sAjaxSource": "<?php echo url_for('financeList/bonusDetailList') ?>",
        "sPaginationType": "full_numbers",
        "aaSorting": [
            [1,'desc']
        ],
        "aoColumns": [
            { "sName" : "commission_id",  "bVisible": false},
            { "sName" : "created_on",  "bSortable": true},
            { "sName" : "commission_type",  "bSortable": true, "bVisible" : true, "fnRender": function ( oObj ) {
                if (oObj.aData[2] == "DRB") {
                    return "RB";
                }
                return oObj.aData[2];
            }},
            { "sName" : "credit",  "bSortable": true},
            { "sName" : "debit",  "bSortable": true},
            { "sName" : "remark",  "bSortable": false},
            { "sName" : "remark",  "bSortable": false}
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
        var obj = $("#datagrid").data("data_" + id);
        $("#distId").val(id);
        $("#distName").val(obj.distributor_code);

        datagridDetail.fnDraw();
        $("#divDRB").show(500);
        $("#divPIPS").hide(500);
	});
	$("a[id=byMonthLink]").click(function(event){
		// stop event
		event.preventDefault();

		// event.target is <a> itself, parent() is <td>, while parent().parent() get <tr>
		//var id = alert("id = " +$(event.target).parent().parent().attr("id"));
		var id = $(event.target).parent().parent().attr("id");
        $("#divDRB").hide(500);
        $("#divPIPS").show(500);
        waiting();
        $.ajax({
            type : 'POST',
            url : "<?php echo url_for('finance/pipsBonusDetailByDist') ?>",
            dataType : 'json',
            cache: false,
            data: {
                distId : id
            },
            success : function(data) {
                $.unblockUI();
                $("#pipsTbody").html(data);
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Server connection error.");
            }
        });
	});
}

</script>

<?php echo form_tag('admin/doLogin', 'id=loginForm') ?>
<input type="hidden" id="distId" value="0">
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
<div class="portlet">
    <div class="portlet-header">Distributor Listing</div>
    <div class="portlet-content">
	<table width="100%" border="0">
		<tr>
			<td>
                <div style="width: 950px">
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
                            <th>Pips Bonus</th>
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
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="portlet">
    <div class="portlet-header"><?php echo __('Bonus Details') ?></div>
    <div class="portlet-content">
        <div id="divDRB" style="display: none;">
            <input type="text" id="distName" readonly="readonly">
            <table class="display" id="datagridDetail" border="0" width="100%">
                <thead>
                <tr>
                    <th>Detail Id[hidden]</th>
                    <th><?php echo __('Date') ?></th>
                    <th><?php echo __('Commission Type') ?></th>
                    <th><?php echo __('Credit') ?></th>
                    <th><?php echo __('Debit') ?></th>
                    <th><?php echo __('Remark') ?></th>
                    <th><?php echo __('MT4 Status') ?></th>
                </tr>
                </thead>
            </table>
        </div>
        <div id="divPIPS" style="display: none;">
            <table class="display" id="datagridByMonth" border="0" width="100%">
                <thead>
                <tr>
                    <th style="text-align: center;"><?php echo __('Date') ?></th>
                    <th style="text-align: right;"><?php echo __('Amount') ?></th>
                </tr>
                </thead>
                <tbody id="pipsTbody">
                <?php
                    $month = array();
                    $month["1"] = "January";
                    $month["2"] = "February";
                    $month["3"] = "March";
                    $month["4"] = "April";
                    $month["5"] = "May";
                    $month["6"] = "June";
                    $month["7"] = "July";
                    $month["8"] = "August";
                    $month["9"] = "September";
                    $month["10"] = "October";
                    $month["11"] = "November";
                    $month["12"] = "December";
                    foreach ($anode as $arr) {
                        echo "<tr class='odd'>
                            <td align='center'>".__($month[$arr["month"]])."</td>
                            <td align='right'>".number_format($arr["month_sales"], 2)."</td>
                            </tr>";

                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</form>