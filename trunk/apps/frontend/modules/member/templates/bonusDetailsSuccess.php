<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
    var datagrid = null;
    var datagridDetail = null;
    $(function() {
        datagrid = $("#datagrid").r9jasonDataTable({
            // online1DataTable extra params
            "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
            "extraParam" : function(aoData) { // pass extra params to server

            },
            "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
                reassignDatagridDetailEventAttr();
            },

            // datatables params
            "bLengthChange": true,
            "bFilter": false,
            "bProcessing": true,
            "bServerSide": true,
            "bAutoWidth": false,
            "sAjaxSource": "/finance/bonusDetailLogList",
            "sPaginationType": "full_numbers",
            "aaSorting": [
                [0,'desc']
            ],
            "aoColumns": [
                { "sName" : "commission.created_on",  "bSortable": true},
                { "sName" : "_DRB",  "bSortable": true, "fnRender": function ( oObj ) {
                    return "<a class='detailLink' ref='" + oObj.aData[0] + "' transaction='DRB' href='#'>" + oObj.aData[1] + "</a>";
                }},
                { "sName" : "_OVERRIDING_BONUS",  "bSortable": true, "fnRender": function ( oObj ) {
                    return "<a class='detailLink' ref='" + oObj.aData[0] + "' transaction='OVERRIDING BONUS' href='#'>" + oObj.aData[2] + "</a>";
                }},
                { "sName" : "_PIPS_BONUS",  "bSortable": true, "fnRender": function ( oObj ) {
                    return "<a class='detailLink' ref='" + oObj.aData[0] + "' transaction='PIPS BONUS' href='#'>" + oObj.aData[3] + "</a>";
                }},
                { "sName" : "SUB_TOTAL",  "bSortable": true}
            ]
        });

        datagridDetail = $("#datagridDetail").r9jasonDataTable({
            // online1DataTable extra params
            "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
            "extraParam" : function(aoData) { // pass extra params to server
                aoData.push({ "name": "filterAction", "value": $("#textboxQueryAction").val() });
                aoData.push({ "name": "filterDate", "value": $("#textboxQueryDate").val() });
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
            "sAjaxSource": "/finance/bonusDetailList",
            "sPaginationType": "full_numbers",
            "aaSorting": [
                [0,'desc']
            ],
            "aoColumns": [
                { "sName" : "created_on",  "bSortable": true},
                { "sName" : "credit", "bVisible" : true,  "bSortable": true},
                { "sName" : "debit",  "bSortable": true},
                { "sName" : "balance",  "bSortable": true},
                { "sName" : "remark",  "bSortable": true}
            ]
        });
    }); // end function

    function reassignDatagridDetailEventAttr() {
        $(".detailLink").click(function(event) {
            event.preventDefault();

            $("#textboxQueryDate").val($(this).attr("ref"));
            $("#textboxQueryAction").val($(this).attr("transaction"));
            $("#divBonusDetail").show();
            datagridDetail.fnDraw();
        });
    }

    function reassignDatagridEventAttr() {
        $("a[id=editLink]").click(function(event) {

        });
    }

    $(document).ready(function () {
        $('#datagrid thead>tr>th').css('border-bottom', ' 2px rgba(189, 167, 102, 0.4) solid');
    });
</script>

<div class="title">
  <h1><?php echo __("Bonus Commission"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Bonus Commission Listing")?></th>
          </tr>
          <tr>
            <td class="tablebg">
<!--              <i class="icon-ok-sign"></i>-->
<!--              --><?php //echo __("Bonus Commission"); ?>
<!--              <small></small>-->
<!--              <br/><br/>-->

              <fieldset>
                <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                <section class="widget" style="background: none;">
                  <div class="body">
                    <div>
                      <table class="table table-striped" id="datagrid" border="0" width="100%">
                        <thead>
                        <tr>
                          <th><?php echo __('Date') ?></th>
                          <th><?php echo __('DRB') ?></th>
                          <th><?php echo __('Overriding Bonus') ?></th>
                          <th><?php echo __('Pips Bonus') ?></th>
                          <th><?php echo __('Sub Total') ?></th>
                        </tr>
                        </thead>
                      </table>
                      <br>
                      <br>
                    </div>
                  </div>
                </section>
              </fieldset>
              <!--<div class="form-actions">
                  <a href="/member/summary" class="btn btn-default"><?php /*echo __("Cancel");*/?></a>
              </div>-->
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Bonus Commission Detail")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <fieldset>
                <section class="widget" style="background: none;">
                  <div class="body">
                    <div id="divBonusDetail" style="display: none">
                      <input type="hidden" id="textboxQueryDate">
                      <input type="hidden" id="textboxQueryAction">
                      <table class="table table-striped" id="datagridDetail" border="0" width="100%">
                        <thead>
                        <tr>
                          <th><?php echo __('Date') ?></th>
                          <th><?php echo __('In') ?></th>
                          <th><?php echo __('Out') ?></th>
                          <th><?php echo __('Balance') ?></th>
                          <th><?php echo __('Remarks') ?></th>
                        </tr>
                        </thead>
                      </table>
                      <br>
                      <br>
                    </div>
                  </div>
                </section>
              </fieldset>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
