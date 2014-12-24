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
        url:'<?php echo url_for('marketingList/ezyCashCardApplicationList') ?>',
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
            {field:'qty', width:"100",title:'Qty', sortable:"true"},
            {field:'sub_total', width:"100",title:'Sub Total', sortable:"true"},
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
            url:"<?php echo url_for('marketing/updateEzyCashCardApplicationStatus') ?>?ref=9472344" + idString,
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
       title="EzyCash Card Application Listing" iconCls="icon-search"
       rownumbers="true" pagination="true"></table>

<!--toolbar="#toolbarDatagrid"-->
<br>
<button id="btnUpdate">Update Success Status</button>
<button id="btnReject">Update Reject Status</button>
