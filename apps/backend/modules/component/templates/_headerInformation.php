<div id="header">
    <div class="left middle" id="logo-title" style="padding: 5px">
        <div style="float: left; width: 30%">
            <a id="logo" rel="home" title="Tune Hotels" href="/">
                <img alt="Tune" src="/images/logo.png">
            </a>
        </div>
        <div style="float: right; width: 70%">
            <table cellpadding="1" cellspacing="2" border="0">
                <tr>
                    <td width="20%"><?php echo __('Member Id') ?>:</td>
                    <td width="20%"><strong><?php echo $sf_user->getAttribute(Globals::SESSION_USERNAME); ?></strong></td>
                    <td width="10%">&nbsp;</td>
                    <td width="30%"><?php echo __('MT4 Credit') ?>:</td>
                    <td width="20%"><strong><?php echo number_format($ecash,2) ?></strong></td>
                </tr>
                <tr>
                    <td><?php echo __('Name') ?>:</td>
                    <td><strong><?php echo $componentDistributor->getNickname(); ?></strong></td>
                    <td>&nbsp;</td>
                    <td><?php echo __('e-Point Wallet') ?>:</td>
                    <td><strong><?php echo number_format($epoint,2) ?></strong></td>
                </tr>
                <tr>
                    <td><?php echo __('Package Rank') ?>:</td>
                    <td><strong><?php echo __($componentDistributor->getRankCode()); ?></strong></td>
                    <td>&nbsp;</td>
                    <td><?php echo __('e-Share Balance') ?>:</td>
                    <td><strong><?php echo number_format($eshare,2) ?></strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>&nbsp;</td>
                    <td><?php echo __('Maintenance Balance') ?>:</td>
                    <td><strong>
                        <?php
                            if ($maintenance >= Globals::ESHARE_REINVEST_AMOUNT) {
                                echo "<a href='".url_for("/eshare/reinvestEshare")."' title='Reinvest e-Share' style='color:red'>".number_format($maintenance,2)."</a>";
                            } else {
                                echo number_format($maintenance,2);
                            }
                        ?>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td><?php echo __('Last Login') ?>:</td>
                    <td><strong><?php echo $lastLogin ?></strong></td>
                    <td>&nbsp;</td>
                    <td><?php echo __('This Month Sales') ?>:</td>
                    <td><strong><?php echo number_format($monthlySales,2) ?></strong></td>
                </tr>
            </table>
        </div>
    </div>
</div>