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
        <h2 class="page-title"><?php echo __("Monthly Report"); ?>
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
                    <?php echo __("Monthly Report"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <fieldset>
                    <legend class="section">
                        <?php echo __("Monthly Report")?>
                    </legend>
                    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

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
$month = array();
$month["01"] = "January";
$month["02"] = "February";
$month["03"] = "March";
$month["04"] = "April";
$month["05"] = "May";
$month["06"] = "June";
$month["07"] = "July";
$month["08"] = "August";
$month["09"] = "September";
$month["10"] = "October";
$month["11"] = "November";
$month["12"] = "December";

$total = 0;
$totalRate = 0;
if (count($anodes)) {
    foreach ($anodes as $result) {
        ?>
    <tr>
        <td><?php
            echo $result["year"]." ". __($month[$result["month"]]); ?></td>
        <td align="right"><?php echo number_format($result['amount']); ?></td>
        <?php if ($result['total_rate'] > 0) { ?>
        <td align="right"><strong class="color-green"><?php echo $result['total_rate']; ?></strong></td>
        <?php } else { ?>
        <td align="right"><strong class="color-red"><?php echo $result['total_rate']; ?></strong></td>
        <?php } ?>
        <?php if ($result['total_return'] > 0) { ?>
        <td align="right"><strong
                class="color-green"><?php echo "+" . number_format($result['total_return'], 2); ?></strong>
        </td>
        <?php } else { ?>
        <td align="right"><strong
                class="color-red"><?php echo number_format($result['total_return'], 2); ?></strong>
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
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>