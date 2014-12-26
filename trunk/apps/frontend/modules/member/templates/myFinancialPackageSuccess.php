<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
$(function() {

});
</script>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('My Financial Package') ?></span></td>
    </tr>
    <tr>
        <td><br>
            <?php if ($sf_flash->has('successMsg')): ?>
                <div class="ui-widget">
                    <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
                         class="ui-state-highlight ui-corner-all">
                        <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                                      class="ui-icon ui-icon-info"></span>
                            <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
                    </div>
                </div>
                <?php endif; ?>
            <?php if ($sf_flash->has('errorMsg')): ?>
                <div class="ui-widget">
                    <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
                         class="ui-state-error ui-corner-all">
                        <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                                      class="ui-icon ui-icon-alert"></span>
                            <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
                    </div>
                </div>
                <?php endif; ?>

        </td>
    </tr>
    <tr>
        <td>
            <table cellspacing="0" cellpadding="5" class="tbl_form">
                <colgroup>
                    <col width="1%">
                    <col width="30%">
                    <col width="69%">
                    <col width="1%">
                </colgroup>
                <tbody>
                <tr>
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th colspan="2"><?php echo __('My Financial Package') ?></th>
<!--                    <th class="tbl_content_right"></th>-->
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('User ID') ?></td>
                    <td><?php echo $userName; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('e-Point Wallet'); ?></td>
                    <td><?php echo number_format($epointAccount, 2); ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Maintenance Wallet') ?></td>
                    <td><?php echo number_format($maintenanceAccount, 2); ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Total Fund Management Return'); ?></td>
                    <td><?php echo number_format($totalFundManagementReturn, 2); ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Total Investment Package In Wallet') ?></td>
                    <td><?php echo number_format($totalInvestmentPackageInWallet, 0); ?> 个 理财包</td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td><?php echo __('Total Investment Package Sold (Today)'); ?></td>
                    <td><?php echo number_format($totalInvestmentPackageSold, 0); ?> 个 理财包</td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Each Investment Package Fund Return') ?></td>
                    <td><?php echo number_format($eachInvestmentPackageFundReturn, 2); ?> (其中50%进入现金币，50%进入种子币)</td>
                    <td>&nbsp;</td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>