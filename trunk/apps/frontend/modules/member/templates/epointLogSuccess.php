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
                        aoData.push({ "name": "filterAction", "value": $("#search_action").val() });
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
                    "sAjaxSource": "/finance/epointLogList",
                    "sPaginationType": "full_numbers",
                    "aaSorting": [
                        [0,'desc']
                    ],
                    "aoColumns": [
                        { "sName" : "account_id",  "bSortable": true},
                        { "sName" : "transaction_type",  "bSortable": true},
                        { "sName" : "credit", "bVisible" : true,  "bSortable": true},
                        { "sName" : "debit",  "bSortable": true},
                        { "sName" : "balance",  "bSortable": true},
                        { "sName" : "remark",  "bSortable": true}
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

<div class="title">
  <h1><?php echo __("e-Point Log"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("e-Point Transaction Log")?></th>
          </tr>
          <tr>
            <td class="tablebg">

              <fieldset>
                <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                <section class="widget" style="background: none;">
                  <header>
                    <i class="icon-file-alt"></i>
                    <?php echo __("e-Point Listing")?>
                    <br/><br/>
                  </header>
                  <div class="body">
                    <div>
                      <table class="table table-striped" id="datagrid" border="0" width="100%">
                        <thead>
                        <tr>
                          <th><?php echo __('Date') ?></th>
                          <th><?php echo __('Transaction Type') ?></th>
                          <th><?php echo __('In') ?></th>
                          <th><?php echo __('Out') ?></th>
                          <th><?php echo __('Balance') ?></th>
                          <th><?php echo __('Remarks') ?></th>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input size="15" type="text" id="search_action" value=""
                                     class="search_init" style="padding: 1px;"/></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        </thead>
                      </table>
                      <br/>
                      <br/>
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
