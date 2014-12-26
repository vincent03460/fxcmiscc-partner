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

        }); // end function
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="#"><?php echo __('My Account') ?></a>
        </li>
        <li class="active"><?php echo __('MP Redemption') ?></li>
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
<h3 class="header smaller lighter green"><?php echo __('MP Redemption') ?></h3>
<div class="table-responsive">

<div class="table-responsive">
<table id="sample-table-1" class="table table-striped table-bordered table-hover">
<thead>
<tr>
    <th><?php echo __('Date') ?></th>
    <th><?php echo __('Product') ?></th>
    <th><?php echo __('Quantity') ?></th>
    <th><?php echo __('Amount') ?></th>
    <th></th>
</tr>
</thead>

<tbody>

<tr><td colspan="5" align="center"><?php echo __("No data available in table") ?></td></tr>
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