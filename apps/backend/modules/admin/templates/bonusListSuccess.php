<?php use_helper('I18N');
echo "<link href='/sf/sf_admin/css/main.css' media='screen' type='text/css' rel='stylesheet'>";
?>

<script type="text/javascript">
$(function() {
    $("#txtDateFrom").datepicker();
});
</script>

<div style="padding: 10px; top: 10px; width: 98%">
    <div class="portlet" id="sf_admin_container">
        <div class="portlet-header">Bonus List</div>
        <div class="portlet-content" id="sf_admin_content" style="width: 98%">
            <?php echo form_tag('admin/bonusList', 'id=financeForm') ?>
            <table class="sf_admin_list" width="100%" style="border-style: none">
                <tr>
                    <td width="100" style="border-style: none">Date</td>
                    <td width="1" style="border-style: none">:</td>
                    <td style="border-style: none"><input id="txtDateFrom" name="txtDateFrom" size="20" readonly="readonly" value="<?php echo $dateFrom;?>"></td>
                </tr>
                <!--<tr>
                    <td style="border-style: none">Date To</td>
                    <td style="border-style: none">:</td>
                    <td style="border-style: none"><input id="txtDateTo" size="20" readonly="readonly" value="<?php /*echo $dateTo;*/?>"></td>
                </tr>-->
                <tr>
                    <td style="border-style: none"></td>
                    <td style="border-style: none"></td>
                    <td style="border-style: none"><button id="btnSearch">Search</button>&nbsp;<button id="btnExport" style="display: none">Export</button></td>
                </tr>
            </table>
            </form>
            <table class="sf_admin_list" width="100%">
                <thead>
                <tr>
                    <th style="width: 30%">Bonus Type</th>
                    <th align="right" style="text-align:right">Qty</th>
                    <th align="right" style="text-align:right; width: 10%;">Price</th>
                    <th align="right" style="text-align:right; width: 10%;">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($packageArrs as $packageArr) {
                ?>
                <tr class="sf_admin_row_1">
                    <td><?php echo $packageArr["name"] ?></td>
                    <td align="right"><?php echo $packageArr["qty"] ?></td>
                    <td align="right"><?php echo $packageArr["price"] ?></td>
                    <td align="right" style="color: green"><?php echo ($packageArr["qty"] * $packageArr["price"]) ?></td>
                </tr>
                <?php } ?>
                <tr class="sf_admin_row_0">
                    <td>Direct Referral Bonus</td>
                    <td colspan="3" align="right" style="color: red">
                        <?php
                        if ($totalDrb > 0)
                            echo "(-".$totalDrb.")";
                        else
                            echo $totalDrb;
                        ?>
                    </td>
                </tr>
                <tr class="sf_admin_row_1">
                    <td>Group Development Bonus</td>
                    <td colspan="3" align="right" style="color: red">
                        <?php
                        if ($totalGrb > 0)
                            echo "(-".$totalGrb.")";
                        else
                            echo $totalGrb;
                        ?>
                    </td>
                </tr>
                <tr class="sf_admin_row_0">
                    <td>Generation Bonus</td>
                    <td colspan="3" align="right" style="color: red">
                        <?php
                        if ($totalGenerationBonus > 0)
                            echo "(-".$totalGenerationBonus.")";
                        else
                            echo $totalGenerationBonus;
                        ?>
                    </td>
                </tr>
                <tr class="sf_admin_row_1">
                    <td>Pips Rebate</td>
                    <td colspan="3" align="right" style="color: red">
                        <?php
                        if ($pipsRebate > 0)
                            echo "(-".$pipsRebate.")";
                        else
                            echo $pipsRebate;
                        ?>
                    </td>
                </tr>
                <tr class="sf_admin_row_0">
                    <td>Fund Management Performance</td>
                    <td colspan="3" align="right" style="color: red">
                        <?php
                        if ($fundManagementBonus > 0)
                            echo "(-".$fundManagementBonus.")";
                        else
                            echo $fundManagementBonus;
                        ?>
                    </td>
                </tr>
                <tr class="sf_admin_row_1">
                    <td>Special Bonus</td>
                    <td colspan="3" align="right" style="color: red">
                        <?php
                        if ($specialBonus > 0)
                            echo "(-".$specialBonus.")";
                        else
                            echo $specialBonus;
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>