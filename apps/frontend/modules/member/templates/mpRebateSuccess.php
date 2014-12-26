<?php
use_helper('I18N');
?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript" language="javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch(e) {
        }
        $(function() {

        }); // end function
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="#"><?php echo __('My Statement') ?></a>
        </li>
        <li class="active"><?php echo __('MP Rebate') ?></li>
    </ul>
    <!-- .breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input"
                       id="nav-search-input" autocomplete="off"/>
                <i class="icon-search nav-search-icon"></i>
            </span>
        </form>
    </div>
    <!-- #nav-search -->
</div>

<div class="page-content">
<div class="page-header">
    <h1>
        <?php echo __('My Statement') ?>
        <small>
            <i class="icon-double-angle-right"></i>
            <?php echo __('MP Rebate') ?>
        </small>
    </h1>
</div>
<!-- /.page-header -->
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->

<?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

<div class="row">
<div class="space-6"></div>

<div class="col-xs-12">
<div class="table-responsive">

<div class="table-responsive">
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
<thead>
<tr>
    <td><?php echo __('') ?></td>
    <td align="center"><?php echo __('Unrealized Profit') ?></td>
    <td align="center"><?php echo __('Realized Profit') ?></td>
    <td><?php echo __('') ?></td>
</tr>
</thead>

<tbody>
<?php
if (count($cardMpReturns) <= 0) {
?>
    <tr><td colspan="8" align="center"><?php echo __("No data available in table") ?></td></tr>
<?php
} else {

$idx = 1;
foreach ($cardMpReturns as $cardMpReturn) { ?>
<tr>
    <td><?php echo $idx++; ?></td>
    <td align="center"><b class="green"><?php echo $cardMpReturn['unrealized_profit']; ?></b></td>
    <td align="center"><b class="green"><?php echo $cardMpReturn['realized_profit']; ?></b></td>
    <td align="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
            <button class="btn btn-xs btn-success linkReturn" ref="<?php echo $cardMpReturn['dist_id']; ?>" title="View Detail">
                <i class="icon-flag bigger-130"></i>
            </button>
        </div>
    </td>
</tr>
<?php
    }
}
?>
</tbody>
</table>
    
<script type="text/javascript">
$(function() {
    $(".linkReturn").click(function(event) {
        event.preventDefault();
        var distId = $(this).attr("ref");

        $("#divMt4Roi").html("<img src='/css/network/spinner.gif'>");
        $("#divMt4Roi").show();

        $.ajax({
            type : 'POST',
            url : "/finance/fetchRoiList",
            dataType : 'json',
            cache: false,
            data: {
                distId : distId
            },
            success : function(data) {
                $.unblockUI();
                var table = "<table class='table table-striped table-bordered table-hover' cellpadding='3' cellspacing='3'><tbody><colgroup>";
                table += "<col width='5%'>";
                table += "<col width='20%'>";
                table += "<col width='20%'>";
                table += "<col width='15%'>";
                table += "</colgroup>";
                table += "<tr class='pbl_header'>";
                table += "<td></td>";
                table += "<td align='center'><?php echo __('Next Rebate Return Date')?></td>";
                table += "<td align='right'><?php echo __('Total Profit')?></td>";
                table += "<td align='center'><?php echo __('Status')?></td>";
                table += "</tr>";

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
                    table += "<td align='center'>" + value[3] + "</td>";
                    table += "</tr>";
                });

                table += "</tbody></table>";
                $("#divMt4Roi").html(table);
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Server connection error.");
            }
        });
    });

    $(".linkReturn:first").trigger("click");
});

</script>
<div id="divMt4Roi" style="display: none;"><img src="/css/network/spinner.gif">
</div>    
    
</div>
<!-- /.table-responsive -->

</div>
</div>

<div class="vspace-sm"></div>

<!-- /span -->
</div>
<!-- /row -->

<div class="hr hr32 hr-dotted"></div>

<!-- /row -->

<!-- PAGE CONTENT ENDS -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.page-content -->