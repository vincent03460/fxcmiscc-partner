<?php
use_helper('I18N');
?>
<div class="menu">
    <ul>
        <li><a href="/member/summary">
            <div><?php echo __("Account Summary") ?></div>
        </a></li>
        <li><a href="/member/passwordSetting">
            <div><?php echo __("Password Settings") ?></div>
        </a></li>
        <li><a href="/member/memberRegistration">
            <div><?php echo __("Registration") ?></div>
        </a></li>
        <li><a href="/member/sponsorTree">
            <div><?php echo __("Sponsor Genealogy") ?></div>
        </a></li>
        <li><a href="/member/transferEpoint">
            <div><?php echo __("RP Wallet Transfer") ?></div>
        </a></li>
        <li><a href="/member/withdrawal">
            <div><?php echo __("Withdrawal") ?></div>
        </a></li>
        <li><a href="/member/download">
            <div><?php echo __("Download") ?></div>
        </a></li>
        <li><a href="/member/agreement">
            <div><?php echo __("Agreement") ?></div>
        </a></li>
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
