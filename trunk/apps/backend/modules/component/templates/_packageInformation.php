<div class="ui-widget ui-widget-content ui-helper-clearfix ui-corner-all ui-accordion-header ui-helper-reset ui-state-default" style="width: 99%;">
    <div class="portlet-content">
        <table cellpadding="3" cellspacing="3" width="100%">
            <?php
            foreach ($packageArray as $arr) {
            $package = $arr['package'];
            ?>
            <tr>
                <td><strong><?php echo $package->getPackageName()." ".number_format($package->getPrice(),0) ?></strong></td>
                <td align="right"><?php echo $arr['total']; ?></td>
            </tr>
            <?php
        }
            ?>
        </table>
    </div>
</div>