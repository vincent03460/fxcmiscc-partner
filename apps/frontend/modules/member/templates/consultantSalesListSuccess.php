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
                        aoData.push({ "name": "filter_newMember", "value": $("#search_newMember").val() });
                        aoData.push({ "name": "filter_payBy", "value": $("#search_payBy").val() });
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
                    "sAjaxSource": "/finance/consultantSalesList",
                    "sPaginationType": "full_numbers",
                    "aaSorting": [
                        [0,'desc']
                    ],
                    "aoColumns": [
                        { "sName" : "newMember.active_datetime",  "bSortable": true},
                    <?php
                        if ($distDB->getDistributorId() == 1) {
                            echo "{ \"sName\" : \"newMember_distributor_code\",  \"bSortable\": false},";
                        }
                    ?>
                        { "sName" : "newMember_distributor_code",  "bSortable": false},
                        { "sName" : "newMember.full_name",  "bSortable": false},
                        { "sName" : "payby_distributor_code",  "bSortable": false},
                        { "sName" : "epoint_debit",  "bSortable": false},
                        { "sName" : "ewallet_debit",  "bSortable": false},
                        { "sName" : "_total",  "bSortable": false}
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
  <h1><?php echo __("Consultant Sales List"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Consultant Downline Sales List")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Consultant Downline Sales Listing"); ?>
              <small></small>
              <br/><br/>

              <fieldset>
                <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                <section class="widget" style="background: none;"
                        >
                  <div class="body">
                    <div>
                      <table class="table table-striped" id="datagrid" border="0" width="100%">
                        <thead>
                        <tr>
                          <th class="nbg"><?php echo __('Date') ?></th>
                            <?php
                                if ($distDB->getDistributorId() == 1) {
                                    echo "<th class=\"nbg\">". __('Consultant')."</th>";
                                }
                            ?>
                          <th class="nbg"><?php echo __('New Member') ?></th>
                          <th class="nbg"><?php echo __('Full Name') ?></th>
                          <th class="nbg"><?php echo __('Pay By') ?></th>
                          <th class="nbg"><?php echo __('e-Point') ?></th>
                          <th class="nbg"><?php echo __('e-Wallet') ?></th>
                          <th class="nbg"><?php echo __('Total') ?></th>
                        </tr>
                        <tr>
                            <td></td>
                            <?php
                                if ($distDB->getDistributorId() == 1) {
                                    echo "<td></td>";
                                }
                            ?>
                          <td><input size="15" type="text" id="search_newMember" value=""
                                     class="search_init" style="padding: 1px;"/></td>
                          <td></td>
                          <td><input size="15" type="text" id="search_payBy" value=""
                                     class="search_init" style="padding: 1px;"/></td>
                          <td></td>
                          <td></td>
                          <td></td>
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
  </table>
</div>
