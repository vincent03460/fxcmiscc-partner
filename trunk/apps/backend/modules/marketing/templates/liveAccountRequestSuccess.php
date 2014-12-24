<script type="text/javascript">
var jform = null;
var datagrid = null;
var companyIdSelectedArr = new Array();
$(function () {
    $("#btnSearch").button({
        icons: {
            primary: "ui-icon-circle-zoomin"
        }
    }).click(function(event){
        event.preventDefault();
        datagridRefresh();
    });
    $("#btnUpdate").button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    }).click(function(event){
        event.preventDefault();
        var checkedArr = new Array();

        var answer = confirm("Are you sure want to update the View Status.")
        if (answer){
            var idString = "";
            var rows = $('#datagrid').datagrid('getChecked');
            var count = 0;
            for(var i=0;i<rows.length;i++){
                idString += "&request_id_" + i + "=" + rows[i].request_id;
                count++ ;
            }
            if (idString != "") {
                $.ajax({
                    type:'POST',
                    url:"<?php echo url_for('marketing/updateAccountStatus') ?>?ref=9472344" + idString,
                    dataType:'json',
                    cache:false,
                    data:{
                        count : count
                    },
                    success:function (data) {
                        datagridRefresh();
                        alert("Record update Successfully.");
                    },
                    error:function (XMLHttpRequest, textStatus, errorThrown) {
                        error("Server connection error.");
                    }
                });
            } else {
                error("Please select at least one member.");
            }
        }
    });

    $('#datagrid').datagrid({
        striped : true,
        selectOnCheck : true,
        checkOnSelect : true,
        sortName: "created_on",
        sortOrder: "desc",
        url:'<?php echo url_for('marketingList/liveAccountRequestList') ?>',
        rowStyler:function(index,row){
            if (row.status_code != 'ACTIVE'){
                return 'background-color:#6293BB;color:#fff;font-weight:bold;';
            }
        },
        columns:[[
            {field:'request_id',checkbox:true},
            {field:'created_on', width:"200",title:'Created On', sortable:"true"},
            {field:'first_name', width:"200",title:'First Name', sortable:"true"},
            {field:'last_name', width:"200",title:'Last Name', sortable:"true"},
            {field:'email', width:"200",title:'Email', sortable:"true"},
            {field:'status_code', width:"200",title:'Status', sortable:"true"},
            {field:'country', width:"200",title:'Country', sortable:"true"},
            {field:'phone_number', width:"200",title:'Phone Number', sortable:"true"},
            {field:'title', width:"200",title:'Title', sortable:"true"},
            {field:'live_demo', width:"200",title:'Live Demo', hidden:"true"},
            {field:'address1', width:"200",title:'Address 1', sortable:"true"},
            {field:'address2', width:"200",title:'Address 2', sortable:"true"},
            {field:'country_of_citizen', width:"200",title:'Country of Citizen', sortable:"true"},
            {field:'dob_day', width:"200",title:'DOB Day', sortable:"true"},
            {field:'dob_month', width:"200",title:'DOB Month', sortable:"true"},
            {field:'dob_year', width:"200",title:'DOB Year', sortable:"true"},
            {field:'ref_id', width:"200",title:'Referral Id', sortable:"true"},
            {field:'passport', width:"200",title:'Passport', sortable:"true"},
            {field:'subject', width:"200",title:'Subject', sortable:"true"},
            {field:'city', width:"200",title:'City', sortable:"true"},
            {field:'address_state', width:"200",title:'State', sortable:"true"}
        ]],
        onBeforeLoad:function(param){
            /*param.templateId= $("#search_templateId").val();
            param.templateTitle = $("#search_templateTitle").val();
            param.departmentName = $("#search_department").val();
            param.moduleCode = $("#search_module").val();*/
        },
        onLoadSuccess:function(data){
            jQuery.each(data.rows, function(key, value) {
                if (value.status_code != 'ACTIVE')
                    $("input[name='request_id'][value='" + value.request_id + "']").remove();
            });
        }
    });

}); // end $(function())

function datagridRefresh() {
    $('#datagrid').datagrid('load',{
        /*templateId: $('#search_templateId').val(),
        templateTitle: $('#search_templateTitle').val(),
        departmentName: $('#search_department').val(),
        moduleCode: $('#search_module').val()*/
    });
}
</script>

<table id="datagrid" style="width:1000px;height:360px"
       title="Live Account Request Listing" iconCls="icon-search"
       rownumbers="true" pagination="true"></table>

<!--toolbar="#toolbarDatagrid"-->
<br>
<button id="btnUpdate">Update View Status</button>

<!--<div id="toolbarDatagrid" style="padding:5px;height:auto">
    <table cellpadding="3" cellspacing="3" style="width: 80%;">
        <tr>
            <td>Template:</td>
            <td><input title="" size="15" type="text" id="search_templateId"
                       value="" class="search_init"
                       placeholder="Template"/>
            </td>
            <td>Template Title:</td>
            <td><input title="" size="15" type="text" id="search_templateTitle"
                       value="" class="search_init"
                       placeholder="Template"/>
            </td>
        </tr>
        <tr>
            <td>Department:</td>
            <td><input title="" size="15" type="text" id="search_department"
                       value="" class="search_init"
                       placeholder="Template"/>
            </td>
            <td>Module:</td>
            <td><input title="" size="15" type="text" id="search_module"
                       value="" class="search_init"
                       placeholder="Template"/>
            </td>
            <td>
                <button id="btnSearch">Search</button>
            </td>
        </tr>
    </table>
</div>-->