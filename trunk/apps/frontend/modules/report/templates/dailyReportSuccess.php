<?php
use_helper('I18N');
?>
<script type="text/javascript">
    $(function() {
        $("#queryDate").val("<?php echo $queryDate;?>");
    });
</script>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title"><?php echo __("Daily Report"); ?>
            <small></small>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <section class="widget">
            <header>
                <h4>
                    <i class="icon-ok-sign"></i>
                    <?php echo __("Daily Report"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <fieldset>
                    <legend class="section">
                        <?php echo __("Daily Report")?>
                    </legend>
                    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

                    <form class="form-horizontal label-left" method="post"
                          action="/report/dailyReport"
                          data-validate="parsley"
                          id="topupForm" name="topupForm">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="control-group">
                                    <label class="control-label" for="queryDate">
                                        <?php echo __("Operated Month")?>
                                    </label>

                                    <div class="controls form-group">
                                        <select class="form-control" name="queryDate" id="queryDate">
                                            <?php
                                            for ($y = date("Y"); $y >= 2012; $y--) {
                                                if ($y == 2012) {
                                                    for ($m = 12; $m >= 8; $m--) {
                                                        if ($m < 10) {
                                                            $m = "0".$m;
                                                        }
                                                        echo "<option value='".$y."-".$m."'>".$y."/".$m."</option>";
                                                    }
                                                } else if ($y = date("Y")) {
                                                    for ($m = date("m"); $m >= 1; $m--) {
                                                        if ($m < 10) {
                                                            $m = "0".$m;
                                                        }
                                                        echo "<option value='".$y."-".$m."'>".$y."/".$m."</option>";
                                                    }
                                                } else {
                                                    for ($m = 12; $m >= 1; $m--) {
                                                        if ($m < 10) {
                                                            $m = "0".$m;
                                                        }
                                                        echo "<option value='".$y."-".$m."'>".$y."/".$m."</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="btnSubmit" class="btn btn-danger">
                                <i class="icon-ok bigger-110"></i>
                                <?php echo __("Search");?>
                            </button>
                            <a href="/member/summary" class="btn btn-default"><?php echo __("Cancel");?></a>
                        </div>
                    </form>
                </fieldset>
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <table id="sample-table-1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th><?php echo __('Date') ?></th>
                                <th><?php echo __('Operation Amount') ?></th>
                                <th><?php echo __('Operation Rate(%)') ?></th>
                                <th><?php echo __('Operating Profit') ?></th>
                            </tr>
                            </thead>

                            <tbody>
<?php
                                $total = 0;
                                $totalRate = 0;
if (count($mlmRoiDividends)) {
    foreach ($mlmRoiDividends as $result) {
        $total += $result['dividend_amount'];
        $totalRate += $result['roi_percentage'];
        ?>
    <tr>
        <td><?php
            $arr = explode(" ", $result['dividend_date']);
            echo $arr[0]; ?></td>
        <td align="right"><?php echo number_format($result['package_price']); ?></td>
        <?php if ($result['roi_percentage'] > 0) { ?>
        <td align="right"><strong class="color-green"><?php echo $result['roi_percentage']; ?></strong></td>
        <?php } else { ?>
        <td align="right"><strong class="color-red"><?php echo $result['roi_percentage']; ?></strong></td>
        <?php } ?>
        <?php if ($result['dividend_amount'] > 0) { ?>
        <td align="right"><strong
                class="color-green"><?php echo "+" . number_format($result['dividend_amount'], 2); ?></strong>
        </td>
        <?php } else { ?>
        <td align="right"><strong
                class="color-red"><?php echo number_format($result['dividend_amount'], 2); ?></strong>
        </td>
        <?php } ?>
    </tr>
        <?php } ?>
    <?php
} else {
    echo "<tr><td align='center' colspan='4'>" . __("No data available in table") . "</td></tr>";
} ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 col-print-12">
                                <div class="row text-align-right">
                                    <div class="col-xs-9"></div>
                                    <!-- instead of offset -->
                                    <div class="col-xs-9">
                                        <p class="no-margin"><strong>Total Operated Rate :</strong></p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p class="no-margin"><strong><?php echo number_format($totalRate, 2)?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-print-12">
                                <div class="row text-align-right">
                                    <div class="col-xs-9"></div>
                                    <!-- instead of offset -->
                                    <div class="col-xs-9">
                                        <p class="no-margin"><strong>Total :</strong></p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p class="no-margin"><strong><?php echo number_format($total, 2)?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>