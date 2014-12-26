<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
    var datagrid = null;
    $(function() {
        datagrid = $("#datagrid").r9jasonDataTable({
                    // online1DataTable extra params
                    "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                    "extraParam" : function(aoData) { // pass extra params to server
                        aoData.push({ "name": "filter_memberId", "value": $("#search_memberId").val() });
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
                    "sAjaxSource": "/finance/salesList",
                    "sPaginationType": "full_numbers",
                    "aoColumns": [
                        { "sName" : "distributor_id",  "bVisible": false},
                        { "sName" : "distributor_code",  "bSortable": true},
                        { "sName" : "this_month",  "bSortable": false},
                        { "sName" : "previous_1month",  "bSortable": false},
                        { "sName" : "previous_2month",  "bSortable": false},
                        { "sName" : "previous_3month",  "bSortable": false}
                    ]
                });
    }); // end function

    function reassignDatagridEventAttr() {
        $("a[id=editLink]").click(function(event) {

        });
    }
  
    $(document).ready(function () {
        $('#datagrid thead>tr>th').css('border-bottom', ' 2px rgba(189, 167, 102, 0.4) solid');
    });
</script>

<style type="text/css">
  #datagrid th.nbg {
    background: none;
  }
</style>

<div class="title">
  <h1><?php echo __("Sales List"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Downline Sales List")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Downline Sales Listing"); ?>
              <small></small>
              <br/><br/>

              <fieldset>
                <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                <section class="widget" style="background: none;">
                  <div class="body">
                    <div>
                      <table class="table table-striped" id="datagrid" border="0" width="100%">
                        <thead>
                        <tr>
                          <td></td>
                          <th><?php echo __('Member ID') ?></th>
                          <th class="nbg"><?php echo __('This Month') ?></th>
                          <th class="nbg"><?php echo __('-1 Month') ?></th>
                          <th class="nbg"><?php echo __('-2 Month') ?></th>
                          <th class="nbg"><?php echo __('-3 Month') ?></th>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input size="15" type="text" id="search_memberId" value=""
                                     class="search_init" style="padding: 1px;"/></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        </thead>
                        <tfoot>
                        <td></td>
                        <td></td>
                        <td><?php echo number_format($totalCurrentMonth, 2); ?></td>
                        <td><?php echo number_format($totalPrevious1Month, 2);?></td>
                        <td><?php echo number_format($totalPrevious2Month, 2);?></td>
                        <td><?php echo number_format($totalPrevious3Month, 2);?></td>
                        </tfoot>
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
  </table>
</div>
