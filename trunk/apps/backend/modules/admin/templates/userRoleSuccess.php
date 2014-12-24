<script type="text/javascript">
    var isSubmitAjax = true;
    var jform = null;
    var datagrid = null;

    $(function() {
        jform = $("#enquiryForm").validate({
            submitHandler: function(form) {
                if (isSubmitAjax) {
                    //alert("submit ajax");
                    datagrid.fnDraw();
                } else {
                    //alert("not submit ajax");
                    form.submit();
                }
            }
        });

        datagrid = $("#datagrid").r9jasonDataTable({
            // online1DataTable extra params
            "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
            "extraParam" : function(aoData) { // pass extra params to server
                aoData.push({ "name": "filterRoleCode", "value": $("#search_roleCode").val()  });
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
            "sAjaxSource": "<?php echo url_for('marketingList/roleList') ?>",
            "sPaginationType": "full_numbers",
            "aoColumns": [
                { "sName" : "role_id", "bVisible" : false},
                { "sName" : "role_id",  "bSortable": false, "fnRender": function (oObj) {
                    $("#dgAddPanel").data("data_" + oObj.aData[0], {
                        role_id : oObj.aData[0]
                        , role_code : oObj.aData[2]
                        , role_desc : oObj.aData[3]
                        , status_code : oObj.aData[4]
                    });
                    return "<a id='editLink' href='#'>Edit</a>";
                }
                },
                { "sName" : "role_code",  "bSortable": true},
                { "sName" : "role_desc",  "bSortable": true},
                { "sName" : "status_code",  "bSortable": true}
            ]
        });

        $("#btnAdd").button({
            text: true
            , icons: {
                primary: 'ui-icon-circle-plus'
            }
        }).click(function(event) {
                    event.preventDefault();

                    $("#dgAddPanelId").val("");
                    $("#dgAddPanel").dialog("open");
                });
    }); // end $(function())

    //all event in detail datagrid need to reassign because, every remote call, the DOM will be restructure again.
    function reassignDatagridEventAttr() {
        $("a[id=editLink]").click(function(event) {
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
<div style="padding: 10px; top: 30px; width: 900px">
    <div class="portlet">
        <div class="portlet-header">Role Listing</div>
        <div class="portlet-content">
            <table width="100%" border="0">
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td>
                                    <div>
                                        <table class="display" id="datagrid" border="0" width="100%" cellpadding="0"
                                               cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>id [hidden]</th>
                                                <th width="5%">&nbsp;</th>
                                                <th width="30%">Role Code</th>
                                                <th width="50%">Role Desc</th>
                                                <th width="15%">Status</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><input title="" size="10" type="text" id="search_roleCode" value=""
                                                           class="search_init"/></td>
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
$(function() {
    $("#dgAddPanel").dialog("destroy");
    $("#dgAddPanel").theoneDialog({
        open: function() {
            populateDgAddPanel();
        },
        close: function() {

        },
        buttons: {
            Submit: function() {
                var roleCodeArr = new Array();
                $.each($(".role:checked"), function(key, value) {
                    roleCodeArr.push($(value).val());
                });

                var roleCodeSelected = roleCodeArr.join("|||");
                waiting();
                $.ajax({
                    type : 'POST',
                    url : "<?php echo url_for('admin/doSaveRole') ?>",
                    dataType : 'json',
                    cache: false,
                    data: {
                        roleId : $('#dgAddPanelId').val()
                        , roleCode : $('#dgAddPanelRoleCode').val()
                        , roleDesc : $('#dgAddPanelRoleDesc').val()
                        , status : $('#dgAddPanelStatus').val()
                        , roleCodeSelected : roleCodeSelected
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

    $('#roleTree').checkboxTree({
        initializeChecked: 'expanded'
        , initializeUnchecked: 'collapsed'
        , onCheck: { node: 'expand' }, onUncheck: { node: 'collapse' }
    });
    $('#roleTree-checkAll').click(function(){
        $('#roleTree').checkboxTree('checkAll');
    });

    $('#roleTree-uncheckAll').click(function(){
        $('#roleTree').checkboxTree('uncheckAll');
    });
});

function populateDgAddPanel() {
    $("#dgMsg").hide();
    if ($("#dgAddPanelId").val() == "") {
        $("#dgAddPanelRoleCode").removeAttr("readonly");
        $("#dgAddPanelRoleCode").val("");
        $("#dgAddPanelRoleDesc").val("");
        $("#dgAddPanelStatus").val("A");
        $("#dgAddPanelRoleCode").focus();

        $('#roleTree').checkboxTree('uncheckAll');
    } else {
        $("#dgAddPanelRoleCode").attr("readonly", "readonly");
        var data = $("#dgAddPanel").data("data_" + $("#dgAddPanelId").val());
        $("#dgAddPanelRoleCode").val(data.role_code);
        $("#dgAddPanelRoleDesc").val(data.role_desc);
        $("#dgAddPanelStatus").val(data.status_code);
        $('#roleTree').checkboxTree('uncheckAll');
        waiting();
        $.ajax({
            type : 'POST',
            url : "<?php echo url_for('admin/fetchUserAccessRole') ?>",
            dataType : 'json',
            cache: false,
            data: {
                roleId : data.role_id
            },
            success : function(data) {
                /*if (data.error) {
                    alert(data.errorMsg);
                } else {*/
                    $.unblockUI();
                    var options = "";
                    jQuery.each(data, function(key, value) {
                        $('#' + value).attr('checked', true);
                    });
                //}
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                $('#waiting').hide(500);
                alert("Server connection error.");
            }
        });
    }
}
</script>

<div id="dgAddPanel" style="display:none; width: 850px" title="User Role">
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
                <td width="40%">Role Code</td>
                <td width="1%">:</td>
                <td width="59%"><input type="text" id="dgAddPanelRoleCode" class="text ui-widget-content ui-corner-all"
                           readonly="readonly" size="25"></td>
            </tr>
            <tr>
                <td>Role Description</td>
                <td>:</td>
                <td><input type="text" id="dgAddPanelRoleDesc" class="text ui-widget-content ui-corner-all" size="25">
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><select id="dgAddPanelStatus" class="text ui-widget-content ui-corner-all">
                    <option value="active">active</option>
                    <option value="inactive">in-active</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Role Access</td>
            </tr>
            <tr>
                <td colspan="3">
                    <div style="overflow: auto; height: 280px; width: 100%;border:2px solid grey;">
                        <a href="javascript:void(0);" id="roleTree-checkAll">Check all</a> |
                        <a href="javascript:void(0);" id="roleTree-uncheckAll">Uncheck all</a>
                        <ul id="roleTree">
                        <?php
                            $parentAccessCode = $resultArr[0]['access_code'];
                            $closeUl= false;
                            foreach ($resultArr as $arr) {
                                $checkStr = "";
                                //if ($arr['role_access_id'] != "")
                                //    $checkStr = "checked='checked'";

                                if ($parentAccessCode != $arr['parent_id']) {
                                    if ($closeUl) {
                                        echo "</ul>";
                                        $closeUl = false;
                                    }
                                    echo "<li><input type='checkbox' class='role' ".$checkStr." id='".$arr['access_code']."' value='".$arr['access_code']."'><label>".$arr['menu_label']."</label><ul>";
                                    $closeUl = true;
                                } else {
                                    echo "<li><input type='checkbox' class='role' ".$checkStr." id='".$arr['access_code']."' value='".$arr['access_code']."'><label>".$arr['menu_label']."</label>";
                                }

                                if ($arr['parent_id'] == "" || !isset($arr['parent_id']))
                                    $parentAccessCode = $arr['access_code'];
                            }
                        ?>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
</form>



