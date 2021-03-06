<?php
use_helper('I18N');
?>

<div class="menu">
    <ul>
        <li>
            <span class="group_header"><?php echo __("Main") ?></span>
            <ul>
                <li>
                    <a href="/member/summary"><div><?php echo __("Account Summary") ?></div></a>
                </li>
                <li>
                    <a href="/member/viewProfile"><div><?php echo __("Member Profile") ?></div></a>
                </li>
                <li>
                    <a href="/member/passwordSetting"><div><?php echo __("Password Settings") ?></div></a>
                </li>
                <li>
                    <a href="/member/memberRegistration"><div><?php echo __("Registration") ?></div></a>
                </li>
            </ul>
            &nbsp;
        </li>
        <li>
            <div>
                <span class="group_header"><?php echo __("Account") ?></span>
            </div>
            <ul>
                <li>
                    <a href="/member/transferPromo"><div><?php echo __("EP Wallet Transfer") ?></div></a>
                </li>
                <li>
                    <a href="/member/transferEpoint"><div><?php echo __("RP Wallet Transfer") ?></div></a>
                </li>
                <li>
                    <a href="/member/convertEcashToPromo"><div><?php echo __("Convert e-Wallet To EP") ?></div></a>
                </li>
                <li>
                    <a href="/member/ewalletWithdrawal"><div><?php echo __("e-Wallet Withdrawal") ?></div></a>
                </li>
                <li>
                    <a href="/member/mt4Withdrawal"><div><?php echo __("MT4 Withdrawal") ?></div></a>
                </li>
            </ul>
            &nbsp;
        </li>
<!--        <li>-->
<!--            <span class="group_header">--><?php //echo __("Hierarchy") ?><!--</span>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <a href="/member/sponsorTree"><div>--><?php //echo __("Sponsor Genealogy") ?><!--</div></a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            &nbsp;-->
<!--        </li>-->
        <li>
            <span class="group_header"><?php echo __("Fund Management") ?></span>
            <ul>
                <li>
                    <a href="/member/fundManagementReport"><div><?php echo __("Fund Management Report") ?>&nbsp;<img src="/images/new_icon.gif"></div></a>
                </li>
            </ul>
            &nbsp;
        </li>
        <li>
            <span class="group_header"><?php echo __("More") ?></span>
            <ul>
                <li>
                    <a href="/member/memo"><div><?php echo __("Memo") ?></div></a>
                </li>
            </ul>
            &nbsp;
        </li>
    </ul>

    <div class="logout"><a href="/home/logout">
            <div><?php echo __("Log Out") ?></div>
        </a></div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        var url = "<?php echo "/" . $module . "/" . $action ?>";
        $("div.menu").find("a[href='"+url+"']").addClass("active");
    });
</script>
