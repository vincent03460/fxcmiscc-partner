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
    $("#btnReject").button({
        icons: {
            primary: "ui-icon-circle-close"
        }
    }).click(function(event){
        event.preventDefault();
        var answer = confirm("Are you sure want to update the Reject Status.")
        if (answer){
            updateStatus('REJECT');
        }
    });
    $("#btnUpdate").button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    }).click(function(event){
        event.preventDefault();
        var answer = confirm("Are you sure want to update the Success Status.")
        if (answer){
            updateStatus('SUCCESS');
        }
    });

    $('#datagrid').datagrid({
        striped : true,
        selectOnCheck : true,
        checkOnSelect : true,
        sortName: "created_on",
        sortOrder: "desc",
        url:'<?php echo url_for('marketingList/debitCardApplicationList') ?>',
        rowStyler:function(index,row){
            if (row.status_code == 'REJECT'){
                return 'background-color:red;color:#fff;font-weight:bold;';
            } else if (row.status_code == 'SUCCESS'){
                return 'background-color:#6293BB;color:#fff;font-weight:bold;';
            }
        },
        columns:[[
            {field:'card_id',checkbox:true},
            {field:'created_on', width:"200",title:'Created On', sortable:"true"},
            {field:'status_code', width:"200",title:'Status', sortable:"true"},
            {field:'distributor_code', width:"200",title:'Distributor Code', sortable:"true"},
            {field:'full_name', width:"200",title:'Full Name', sortable:"true"},
            {field:'dob', width:"200",title:'DOB', sortable:"true"},
            {field:'ic', width:"200",title:'IC / Passport', sortable:"true"},
            {field:'mother_maiden_name', width:"200",title:"Mother's Maiden Name", sortable:"true"},
            {field:'name_on_card', width:"200",title:' 	Desired Name On Card', sortable:"true"},
            {field:'country', width:"200",title:'Country', sortable:"true"},
            {field:'address', width:"200",title:'Address', sortable:"true"},
            {field:'address2', width:"200",title:'Address 2', sortable:"true"},
            {field:'city', width:"200",title:'City', sortable:"true"},
            {field:'state', width:"200",title:'State', sortable:"true"},
            {field:'postcode', width:"200",title:'Post Code', sortable:"true"},
            {field:'country', width:"200",title:'Country', hidden:"true"},
            {field:'email', width:"200",title:'Email', sortable:"true"},
            {field:'contact', width:"200",title:'Contact', sortable:"true"}
        ]],
        onBeforeLoad:function(param){
            /*param.templateId= $("#search_templateId").val();
            param.templateTitle = $("#search_templateTitle").val();
            param.departmentName = $("#search_department").val();
            param.moduleCode = $("#search_module").val();*/
        },
        onLoadSuccess:function(data){
            jQuery.each(data.rows, function(key, value) {
                if (value.status_code != 'PENDING')
                    $("input[name='card_id'][value='" + value.card_id + "']").remove();
            });
        }
    });

}); // end $(function())

function updateStatus(status) {
    var checkedArr = new Array();
    var idString = "";
    var rows = $('#datagrid').datagrid('getChecked');
    var count = 0;
    for(var i=0;i<rows.length;i++){
        idString += "&card_id" + i + "=" + rows[i].card_id;
        count++ ;
    }
    if (idString != "") {
        $.ajax({
            type:'POST',
            url:"<?php echo url_for('marketing/updateDebitCardApplicationStatus') ?>?ref=9472344" + idString,
            dataType:'json',
            cache:false,
            data:{
                count : count
                , status : status
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
        error("Please select at least one.");
    }
}
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
       title="Debit Card Application Listing" iconCls="icon-search"
       rownumbers="true" pagination="true"></table>

<!--toolbar="#toolbarDatagrid"-->
<br>
<button id="btnUpdate">Update Success Status</button>
<button id="btnReject">Update Reject Status</button>
