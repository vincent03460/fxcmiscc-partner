<?php
use_helper('I18N');
?>

<?php echo form_tag('admin/doLogin', 'id=loginForm') ?>
<input type="hidden" id="distId" value="0">
<div style="padding: 10px; top: 30px; position: absolute; width: 1000px">
    <div class="portlet">
        <div class="portlet-header"><?php echo __('Pips Bonus') ?></div>
        <div class="portlet-content">
            <div id="divPIPS">
                <table class="display" id="datagridByMonth" border="0" width="100%">
                    <thead>
                    <tr>
                        <th style="text-align: left;"><?php echo __('Date') ?></th>
                    </tr>
                    </thead>
                    <tbody id="pipsTbody">
                        <?php
                        $firstDate = "";
                        foreach ($arr as $anode) {
                            if ($firstDate == "") {
                                $firstDate = $anode["pips_date"];
                            }
                            $dateArrs = explode(" ", $anode["pips_date"]);
                            echo "<tr class='odd'>
                                <td align='left'><a href='#' ref='".$anode["pips_date"]."' class='monthLink'>" . $dateArrs[0]. "</a></td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <script type="text/javascript">
                var datagrid = null;
                var bonusGroupDatagrid = null;
                $(function() {
                    $(".monthLink").click(function(event){
                        event.preventDefault();
                        $("#search_date").val($(this).attr("ref"));
                        bonusGroupDatagrid.fnDraw();
                    });

                    bonusGroupDatagrid = $("#bonusGroupDatagrid").r9jasonDataTable({
                        // online1DataTable extra params
                        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                        "extraParam" : function(aoData) { // pass extra params to server
                            aoData.push({ "name": "filterSearch_date", "value": $("#search_date").val()  });
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
                        "sAjaxSource": "<?php echo url_for('financeList/pipsRebateList') ?>",
                        "sPaginationType": "full_numbers",
                        "aoColumns": [
                            { "sName" : "rebate.rebate_id", "bVisible" : false},
                            { "sName" : "rebate.pips_date",  "bSortable": true},
                            { "sName" : "dist.distributor_code",  "bSortable": true, "fnRender": function ( oObj ) {
                                return "<a id='viewLink' href='#' title='View'>" + oObj.aData[2] + "</a>";
                            }},
                            { "sName" : "dist.full_name",  "bSortable": true},
                            { "sName" : "rebate.package_name",  "bSortable": true},
                            { "sName" : "rebate.pips_rebate",  "bSortable": true},
                            { "sName" : "rebate.volume",  "bSortable": true},
                            { "sName" : "rebate.amount",  "bSortable": false}
                        ]
                    });

                    $("#dgBonusPanel").dialog("destroy");
                    $("#dgBonusPanel").theoneDialog({
                        width:800,
                        height:500,
                        open: function() {
                        },
                        close: function() {

                        },
                        buttons: {
                            Close: function() {
                                $(this).dialog('close');
                            }
                        }
                    });

                    /*$("#bonusTabs").tabs().find(".ui-tabs-nav");*/

                     datagrid = $("#datagrid").r9jasonDataTable({
                        // online1DataTable extra params
                        "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                        "extraParam" : function(aoData) { // pass extra params to server
                            aoData.push({ "name": "filterSearch_rebateId", "value": $("#dgRebateId").val()  });
                        },
                        "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
                        },

                        // datatables params
                        "bLengthChange": true,
                        "bFilter": false,
                        "bProcessing": true,
                        "bServerSide": true,
                        "bAutoWidth": false,
                        "sAjaxSource": "<?php echo url_for('financeList/pipsRebateDetailList') ?>",
                        "sPaginationType": "full_numbers",
                        "aoColumns": [
                            { "sName" : "detail.detail_id", "bVisible" : false},
                            { "sName" : "detail.left_side",  "bSortable": true},
                            { "sName" : "detail.left_volume",  "bSortable": true},
                            { "sName" : "detail.right_side",  "bSortable": true},
                            { "sName" : "detail.right_volume",  "bSortable": true},
                            { "sName" : "detail.amount",  "bSortable": true}
                        ]
                    });
                }); // end $(function())

                function reassignDatagridEventAttr(){
                    $("a[id=viewLink]").click(function(event){
                        // stop event
                        event.preventDefault();

                        // event.target is <a> itself, parent() is <td>, while parent().parent() get <tr>
                        //var id = alert("id = " +$(event.target).parent().parent().attr("id"));
                        var id = $(event.target).parent().parent().attr("id");
                        $("#dgRebateId").val(id);
                        datagrid.fnDraw();
                        $("#dgBonusPanel").dialog("open");
                    });
                }
            </script>
            <br>

            <div id="tabs-pipsBonus">
                <input type="hidden" id="search_date" value="<?php echo $firstDate;?>">
                <table class="display" id="bonusGroupDatagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id [hidden]</th>
                        <th>Date</th>
                        <th>Member ID</th>
                        <th>Full Name</th>
                        <th>Package Name</th>
                        <th>Pips Rebate</th>
                        <th>Volume</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>
</div>

<div id="dgBonusPanel" style="display:none; width: 850px" title="Bonus Information Detail">
    <input type="hidden" id="dgRebateId" value="0">
    <table class="display" id="datagrid" border="0" width="100%" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th>id [hidden]</th>
            <th>Left</th>
            <th>Left Volume</th>
            <th>Right</th>
            <th>Right Volume</th>
            <th>Amount</th>
        </tr>
        </thead>
    </table>
</div>
</form>