<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
$(function() {
    $(".linkPt2").click(function(event) {
        event.preventDefault();
        var pt2 = $(this).attr("ref");
    
        $("#divPt2Roi").html("<img src='/css/network/spinner.gif'>");
        $("#divPt2Roi").show();
    
        $.ajax({
            type : 'POST',
            url : "/finance/fetchRoiList",
            dataType : 'json',
            cache: false,
            data: {
                mt4UserId : pt2
            },
            success : function(data) {
                $.unblockUI();
                var table = "<table class='table table-bordered table-striped' cellpadding='3' cellspacing='3'><thead>";
                table += "<tr>";
                table += "<td></td>";
                table += "<td><?php echo __('Next Performance Return Date')?></td>";
                table += "<td><?php echo __('Package')?></td>";
                table += "<td><?php echo __('MT4 Balance')?></td>";
                table += "<td><?php echo __('Performance')?> %</td>";
                table += "<td><?php echo __('Total Profit')?></td>";
                table += "<td><?php echo __('Status')?></td>";
                table += "</tr>";
                table += "</thead>";
                table += "</tbody>";

                var trStyle = "1";
                var idx = 1;
                jQuery.each(data.mlmRoiDividends, function(key, value) {
                    if (trStyle == "1") {
                        trStyle = "0";
                    } else {
                        trStyle = "1";
                    }
                    table += "<tr class='row" + trStyle + "'>";
                    table += "<td align='center'>" + value[0] + "</td>";
                    table += "<td align='center'>" + value[1] + "</td>";
                    table += "<td align='right'>" + value[2] + "</td>";
                    table += "<td align='right'>" + value[3] + "</td>";
                    table += "<td align='right'>" + value[4] + "</td>";
                    table += "<td align='right'>" + value[5] + "</td>";
                    table += "<td align='center'>" + value[6] + "</td>";
                    table += "</tr>";
                });
    
                table += "</tbody></table>";
                $("#divPt2Roi").html(table);
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Server connection error.");
            }
        });
    });

    $(".linkPt2:first").trigger("click");
});
</script>

<div class="title">
  <h1><?php echo __("Fund Management Return"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Fund Management Return List")?></th>
          </tr>
          <tr>
            <td class="tablebg">

              <form class="form-horizontal label-left" method="post"
                    action="#"
                    data-validate="parsley"
                    id="topupForm" name="topupForm">

                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <div id="divPt2Roi" style="display: none;"><img src="/css/network/spinner.gif">
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Fund Management Summary")?></th>
          </tr>
          <tr>
            <td class="tablebg">

              <form class="form-horizontal label-left" method="post"
                    action="#"
                    data-validate="parsley"
                    id="topupForm2" name="topupForm2">

                <fieldset>
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th class="tblabel">#</th>
                          <th class="tblabel" style="text-align: center;"><?php echo __('MT4 ID') ?></th>
                          <th class="tblabel" style="text-align: center;"><?php echo __('Unrealized Profit') ?></th>
                          <th class="tblabel" style="text-align: center;"><?php echo __('Realized Profit') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($fundManagements) > 0) {
                          $idx = 1;

                          foreach ($fundManagements as $fundManagement) {
                            echo "<tr>
                              <td class='tb'>" . $idx++ . "</td>
                              <td class='tb'><a href='#' class='linkPt2' ref='" . $fundManagement['mt4_user_name'] . "'>" . $fundManagement['mt4_user_name'] . "</a></td>
                              <td class='tb'>" . number_format($fundManagement['unrealized_profit'], 2) . "</td>
                              <td class='tb'>" . number_format($fundManagement['realized_rofit'], 2) . "</td>
                              </tr>";
                          }
                        } else {
                          echo "<tr class='odd' align='center'><td class='tb' colspan='4'>" . __('No data available in table') . "</td></tr>";
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </fieldset>
              </form>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
