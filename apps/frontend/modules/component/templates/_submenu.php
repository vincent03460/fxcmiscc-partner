<div class="menu">
    <ul>
        <li><a href="/member/index" class="active">
            <div>Account Summary</div>
        </a></li>
        <li><a href="/member/password">
            <div>Change Password</div>
        </a></li>
        <li><a href="/member/registration">
            <div>Registration</div>
        </a></li>
        <li><a href="/member/genealogy">
            <div>Sponsor Genealogy</div>
        </a></li>
        <li><a href="/member/epoint">
            <div>EP Transfer</div>
        </a></li>
        <li><a href="/member/withdrawal">
            <div>Withdrawal</div>
        </a></li>
        <li><a href="/member/download">
            <div>Download</div>
        </a></li>
        <li><a href="/member/agreement">
            <div>Agreement</div>
        </a></li>
    </ul>
    <div class="logout"><a href="/home/logout">
        <div>Log Out</div>
    </a></div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
  $("a").click(function(){
    $("a:first").addClass("active");
  });
});
</script>