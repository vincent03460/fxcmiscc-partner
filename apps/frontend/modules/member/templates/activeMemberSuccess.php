<?php
use_helper('I18N');
?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript" language="javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch(e) {
        }
        $(function() {
            $(".activeMember").click(function(event){
                event.preventDefault();
                var memberId = $(this).attr("ref");

                var answer = confirm("<?php echo __('Are you sure you want to activate this member?')?>")
                if (answer == true) {
                    waiting();

                    $("#doAction").val("ACTIVE");
                    $("#memberId").val(memberId);

                    $("#memberForm").submit();
                }
            });
            $(".deleteMember").click(function(event){
                event.preventDefault();
                var memberId = $(this).attr("ref");

                var answer = confirm("<?php echo __('Are you sure you want to delete this member?')?>")
                if (answer == true) {
                    waiting();

                    $("#doAction").val("DELETE");
                    $("#memberId").val(memberId);

                    $("#memberForm").submit();
                }
            });
        }); // end function
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="#"><?php echo __('Registration') ?></a>
        </li>
        <li class="active"><?php echo __('Activate Member') ?></li>
    </ul>
    <!-- .breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input"
                       id="nav-search-input" autocomplete="off"/>
                <i class="icon-search nav-search-icon"></i>
            </span>
        </form>
    </div>
    <!-- #nav-search -->
</div>

<div class="page-content">
<!--<div class="page-header">
    <h1>
        <?php /*echo __('Registration') */?>
        <small>
            <i class="icon-double-angle-right"></i>
            <?php /*echo __('Activate Member') */?>
        </small>
    </h1>
</div>-->
<!-- /.page-header -->
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->

<?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

<div class="row">
<div class="space-6"></div>

<div class="col-xs-12">
<h3 class="header smaller lighter green"><?php echo __('Activate Member') ?></h3>
<div class="table-responsive">
<form method="post" id="memberForm" action="/member/activateMember">
    <input type="hidden" id="doAction" name="doAction">
    <input type="hidden" id="memberId" name="memberId">
</form>

<div class="table-responsive">
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
<thead>
<tr>
    <th><?php echo __('Date') ?></th>
    <th><?php echo __('User Name') ?></th>
    <th><?php echo __('Full Name') ?></th>
    <th><?php echo __('Package') ?></th>
    <th class="hidden-480"><?php echo __('Email') ?></th>
    <th class="hidden-480"><?php echo __('Phone Number') ?></th>
    <th class="hidden-480"><?php echo __('Referrer ID') ?></th>
    <th></th>
</tr>
</thead>

<tbody>
<?php
if (count($pendingDistributors) <= 0) {
?>
    <tr><td colspan="8" align="center"><?php echo __("No data available in table") ?></td></tr>
<?php
} else {

foreach ($pendingDistributors as $pendingDistributor) { ?>
<tr>
    <td><?php echo $pendingDistributor->getCreatedOn(); ?></td>
    <td><b class="green"><?php echo $pendingDistributor->getDistributorCode(); ?></b></td>
    <td><?php echo $pendingDistributor->getFullName(); ?></td>
    <td>
        <?php
        $packageName = "";

        $packageDB = MlmPackagePeer::retrieveByPK($pendingDistributor->getRankId());
        if ($packageDB) {
            $packageName = $packageDB->getPackageName();
        }
        echo $packageName; ?>
    </td>
    <td class="hidden-480"><?php echo $pendingDistributor->getEmail(); ?></td>
    <td class="hidden-480"><?php echo $pendingDistributor->getContact(); ?></td>
    <td class="hidden-480"><?php
        $uplineDistCode = "";
        $uplineDistributor = MlmDistributorPeer::retrieveByPK($pendingDistributor->getUplineDistId());

        if ($uplineDistributor) {
            $uplineDistCode = $uplineDistributor->getDistributorCode();
        }
        echo $uplineDistCode; ?></td>
    <td>
        <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
            <button class="btn btn-xs btn-danger deleteMember" ref="<?php echo $pendingDistributor->getDistributorId(); ?>">
                <i class="icon-trash bigger-130"></i>
            </button>

            <button class="btn btn-xs btn-success activeMember" ref="<?php echo $pendingDistributor->getDistributorId(); ?>">
                <i class="icon-flag bigger-130"></i>
            </button>
        </div>

        <!--<div class="visible-xs visible-sm hidden-md hidden-lg">
            <div class="inline position-relative">
                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cog icon-only bigger-110"></i>
                </button>

                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                    <li>
                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                            <span class="blue">
                                <i class="icon-zoom-in bigger-120"></i>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                            <span class="green">
                                <i class="icon-edit bigger-120"></i>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                            <span class="red">
                                <i class="icon-trash bigger-120"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>-->
    </td>
</tr>
<?php
    }
}
?>
</tbody>
</table>
</div>
<!-- /.table-responsive -->

</div>
</div>

<div class="vspace-sm"></div>

<!-- /span -->
</div>
<!-- /row -->

<div class="hr hr32 hr-dotted"></div>

<!-- /row -->

<!-- PAGE CONTENT ENDS -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.page-content -->