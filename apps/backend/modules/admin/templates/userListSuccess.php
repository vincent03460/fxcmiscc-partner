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
			aoData.push( { "name": "filterUsername", "value": $("#search_username").val()  } );
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
		"sAjaxSource": "<?php echo url_for('marketingList/adminUserList') ?>",
		"sPaginationType": "full_numbers",
		"aoColumns": [
		              { "sName" : "u.user_id", "bVisible" : false},
		              { "sName" : "u.user_id",  "bSortable": false, "fnRender": function ( oObj ) {
                          $("#dgAddPanel").data("data_" + oObj.aData[0], {
                                f_id : oObj.aData[0]
                                , f_username : oObj.aData[2]
                                , f_password : oObj.aData[3]
                                , f_status : oObj.aData[4]
                                , f_role : oObj.aData[5]
                                , createdBy : oObj.aData[6]
                                , f_created_datetime : oObj.aData[7]
                          });
		  				  return "<a id='editLink' ref='" + oObj.aData[0] + "' href='#'>Edit</a>";
		  				}
		  			  },
                      { "sName" : "u.username",  "bSortable": true},
		              { "sName" : "u.userpassword",  "bSortable": true},
		              { "sName" : "a.status_code",  "bSortable": true},
		              { "sName" : "a.admin_role",  "bSortable": true},
		              { "sName" : "createdBy",  "bSortable": true},
		              { "sName" : "a.created_on",  "bSortable": true}
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

    waiting();
    $.ajax({
        type : 'POST',
        url : "<?php echo url_for('admin/fetchRole') ?>",
        dataType : 'json',
        cache: false,
        data: {
        },
        success : function(data) {
            $.unblockUI();
            var options = "";
            jQuery.each(data, function(key, value) {
                options += "<option value='" + value + "'>" + value + "</option>";
            });

            $("#dgAddPanelRole").html(options);
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Server connection error.");
        }
    });
}); // end $(function())

//all event in detail datagrid need to reassign because, every remote call, the DOM will be restructure again.
function reassignDatagridEventAttr(){
	$("a[id=editLink]").button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    }).click(function(event){
		// stop event
		event.preventDefault();

		// event.target is <a> itself, parent() is <td>, while parent().parent() get <tr>
		//var id = alert("id = " +$(event.target).parent().parent().attr("id"));
		var id = $(this).attr("ref");
        $("#dgAddPanelId").val(id);
        $("#dgAddPanel").dialog("open");
	});
}

</script>

<?php echo form_tag('admin/doLogin', 'id=loginForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 900px">
<div class="portlet">
    <div class="portlet-header">Admin Listing</div>
    <div class="portlet-content">
	<table width="100%" border="0">
		<tr>
			<td>
			<table width="100%">
				<tr>
					<td>
                    <div>
					<table class="display" id="datagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
								<th>id [hidden]</th>
                                <th>&nbsp;</th>
								<th>User Name</th>
								<th>Password</th>
								<th>Status</th>
								<th>Role</th>
								<th>Created By</th>
								<th>Created Date</th>
							</tr>
                            <tr>
                                <td></td>
                                <td></td>
								<td><input title="" size="10" type="text" id="search_username" value="" class="search_init"/></td>
								<td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
							</tr>
                        </thead>
                    </table>
                    </div>
                    <div>
                        <button id="btnAdd">Add</button>
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
                    url : "<?php echo url_for('admin/doSaveUser') ?>",
                    dataType : 'json',
                    cache: false,
                    data: {
                        userId : $('#dgAddPanelId').val()
                        , userName : $('#dgAddPanelUserName').val()
                        , userPassword : $('#dgAddPanelPassword').val()
                        , status : $('#dgAddPanelStatus').val()
                        , role : $('#dgAddPanelRole').val()
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

        $("#dgAddPanelUserName").val(data.f_username);
        $("#dgAddPanelPassword").val(data.f_password);
        $("#dgAddPanelStatus").val(data.f_status);
        $("#dgAddPanelRole").val(data.f_role);
        $("#dgAddPanelPassword").focus().select();
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
            <td width="30%">User Name</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelUserName" class="text ui-widget-content ui-corner-all" readonly="readonly" size="25"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" id="dgAddPanelPassword" class="text ui-widget-content ui-corner-all" size="25"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td><select id="dgAddPanelStatus" class="text ui-widget-content ui-corner-all">
                    <option value="ACTIVE">Active</option>
                    <option value="INACTIVE">In-active</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Role</td>
            <td>:</td>
            <td><select id="dgAddPanelRole" class="text ui-widget-content ui-corner-all"></select></td>
        </tr>
    </table>
    </fieldset>
</div>
</form>