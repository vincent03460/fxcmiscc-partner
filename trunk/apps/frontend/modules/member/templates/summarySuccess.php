<?php
use_helper('I18N');
?>

<style type="text/css">
    #announcement .page_content img {
        max-width: 536px;
    }
    #announcement h4.modal-title {
        color: #AF0001;
        font-size: large;
        margin: 20px 0px;
    }
    #announcement .modal-body {
        padding-top: 20px;
    }
    #announcement button.close {
        cursor: pointer;
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgb(255, 92, 92);
        border: 3px rgb(240, 50, 50) solid;
        color: white;
        padding: 5px 9px;
    }
    #announcement button.close2 {
        background-color: rgb(255, 92, 92);
        border: 3px rgb(240, 50, 50) solid;
        color: white;
        margin: 14px 0px;
        padding: 6px 14px;
        display: none;
    }
</style>

<script type="text/javascript">
    $(function($) {
        $("#announcement").dialog("destroy");
        $("#announcement").dialog({
            autoOpen : false,
            modal : true,
            resizable : false,
            hide: 'clip',
            show: 'slide',
            width: 700,
            height: 580,
            open: function() {
            },
            close: function() {

            }
        });
        $("#announcement").dialog("open");
    }); // end function
</script>

<style type="text/css">
    #announcement .page_content img {
        max-width: 536px;
    }
</style>

<td valign="top">
    <a href="javascript:void(0);" id="showAnnouncement" style="display: none;">#</a>

    <h2><?php echo __("Account Summary"); ?></h2>

    <fieldset>
        <legend class="section">
            <h3><?php echo __("Member Profile")?></h3>
        </legend>

        <table cellpadding="7" cellspacing="1">
            <tbody>
            <tr>
                <th width="150px"><?php echo __("Partner ID"); ?></th>
                <td><?php echo $distributor_code ?></td>
            </tr>
            <tr>
                <th><?php echo __("Package Rank")?></th>
                <td><?php echo __($ranking);?></td>
            </tr>
            <?php
            $ibRanking = "IB";
            if ($distributor->getIsIb() == 1) {
                $ibRanking = "MASTER";
            }
            ?>
            <tr>
                <th><?php echo __("IB Rank")?></th>
                <td><?php echo __($ibRanking);?></td>
            </tr>
            <tr style="display: none;">
                <th><?php echo __("MT4 Rank")?></th>
                <td><?php echo __($mt4Ranking);?></td>
            </tr>
            <tr>
                <th><?php echo __("EP Wallet")?></th>
                <td><?php echo number_format($promo, 2)?></td>
            </tr>
            <tr>
                <th><?php echo __("RP Wallet")?></th>
                <td><?php echo number_format($epoint, 2)?></td>
            </tr>
            <tr>
                <th><?php echo __("e-Wallet")?></th>
                <td><?php echo number_format($ecash, 2)?></td>
            </tr>
            <tr>
                <th><?php echo __("Email") ?></th>
                <td><?php echo $email ?></td>
            </tr>
            <tr>
                <th><?php echo __("Contact Number") ?></th>
                <td><?php echo $contact ?></td>
            </tr>
            <tr>
                <th><?php echo __("Country") ?></th>
                <td><?php echo $country ?></td>
            </tr>
            <tr>
                <th><?php echo __("Bank Holder Name") ?></th>
                <td><?php echo $bankHolderName ?></td>
            </tr>
            <tr>
                <th><?php echo __("Bank Name") ?></th>
                <td><?php echo $bankName ?></td>
            </tr>
            <tr>
                <th><?php echo __("Bank Account No.") ?></th>
                <td><?php echo $bankAccNo ?></td>
            </tr>

            <tr>
                <th><?php echo __("Networks")?></th>
                <td><?php echo $totalNetworks ?></td>
            </tr>
            <tr>
                <th><?php echo __("Last Login")?></th>
                <td><?php echo $lastLogin;?></td>
            </tr>
            </tbody>
        </table>

    </fieldset>

    <div id="announcement" style="display: none;" title="<?php echo __('Announcement') ?>">
        <div class="page_content">
            <h4 style="font-weight: bold;">New exchange rates for investment in CMIS Trader packages</h4>
            <h5>31 March 2015</h5>
            <table style="width: 100%" class="table">
                <tr>
                    <td>
                        <br>Dear ALL,
                        <br>
                        <br>Further to our recent announcement, kindly note the new exchange rates for investment in CMIS Trader packages, will take effect from 31st March 2015. Please note these rates are inclusive of FMC charge. Please follow these rates so that your RP Wallet will be credited correctly and promptly:
                        <br>
                        <br>1. Malaysia RM - RM4.00
                        <br>2. Thailand Baht - B36
                        <br>3. Indonesia Rupiah - IDR13,500
                        <br>4. China RMB - RMB7.00
                        <br>5. Taiwan New Dollar - NTD34
                        <br>6. Hong Kong Dollar - HKD8.5
                        <br>7. Japanese Yen - Bank rate + 10%
                        <br>8. Korean Won - KRW1,250
                        <br>9. Phillipine Peso - PHP50
                        <br>10. Singapore Dollar - SGD1.46
                        <br>11. Cambodia Riel - KHR4,500
                        <br>12. Vietnam Dong - VND24,000
                        <br>13. India Rupee - INR69
                        <br>14. USD - USD1.1
                        <br>
                        <br>Best regards,
                        <br>Brandon Lee
                        <br>Director of Asia Pacific
                        <br>CMIS Trader
                    </td>
                </tr>
            </table>
        </div>

    </div>
</td>
<td valign="top" align="right"><img src="/images/pic_account-summary.jpg"></td>