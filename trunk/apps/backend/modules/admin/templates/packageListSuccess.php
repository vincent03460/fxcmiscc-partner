<?php use_helper('I18N');
echo "<link href='/sf/sf_admin/css/main.css' media='screen' type='text/css' rel='stylesheet'>";
?>

<script type="text/javascript">
$(function() {
    $(".editLink").button({
        icons: {
            primary: "ui-icon-circle-check"
        }
    });
    $("#btnCreate").button({
        icons: {
            primary: "ui-icon-circle-plus"
        }
    });
});
</script>

<div style="padding: 10px; top: 10px; width: 98%">
    <div class="portlet" id="sf_admin_container">
        <div class="portlet-header">Package List</div>
        <div class="portlet-content" id="sf_admin_content" style="width: 98%">
            <table class="sf_admin_list" width="100%">
                <thead>
                <tr>
                    <th>Package</th>
                    <th>Package name</th>
                    <th>Price</th>
                    <th>Commission</th>
                    <th>Color</th>
                    <th>Direct Pips Max</th>
                    <th>Direct Pips</th>
                    <th>UP Level</th>
                    <th>UP Level Commission</th>
                    <th>Down Level</th>
                    <th>Down Level Commission</th>
                    <th>Publish</th>
                    <th>Promote Package ID</th>
                    <th>Promote Package Qty</th>
                    <th>Total Sponsor Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($mlm_packages as $mlm_package):
                    if ($className == "sf_admin_row_0") {
                        $className = "sf_admin_row_1";
                    } else {
                        $className = "sf_admin_row_0";
                    }
                    ?>
                <tr class="<?php echo $className?>">
                    <td><?php echo link_to($mlm_package->getPackageId(), 'admin/packageEdit?package_id=' . $mlm_package->getPackageId()) ?></td>
                    <td><?php echo $mlm_package->getPackageName() ?></td>
                    <td><?php echo $mlm_package->getPrice() ?></td>
                    <td><?php echo $mlm_package->getCommission() ?></td>
                    <td><?php echo $mlm_package->getColor() ?></td>
                    <td><?php echo $mlm_package->getDirectPipsMax() ?></td>
                    <td><?php echo $mlm_package->getDirectPips() ?></td>
                    <td><?php echo $mlm_package->getTotalUpLevel() ?></td>
                    <td><?php echo $mlm_package->getUpLevelCommission() ?></td>
                    <td><?php echo $mlm_package->getTotalDownLevel() ?></td>
                    <td><?php echo $mlm_package->getDownLevelCommission() ?></td>
                    <td><?php echo $mlm_package->getPublicPurchase() ?></td>
                    <td><?php echo $mlm_package->getPromotePackageIdNeeded() ?></td>
                    <td><?php echo $mlm_package->getPromotePackageQtyNeeded() ?></td>
                    <td><?php echo $mlm_package->getTotalSponsorAmount() ?></td>
                </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>

            <div style="text-align: right">
                <?php echo link_to('create', 'admin/packageCreate', array("id" => "btnCreate")) ?>
            </div>
        </div>
    </div>
</div>