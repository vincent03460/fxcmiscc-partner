<?php if ($sf_flash->has('errorMsg')): ?>
<div class="alert alert-danger">
<!--    <button type="button" class="close" data-dismiss="alert">-->
<!--        <i class="icon-remove"></i>-->
<!--    </button>-->

    <strong>
<!--        <i class="icon-remove"></i>-->
        <?php echo $sf_flash->get('errorMsg') ?>
    </strong>
    <br/>
</div>
<?php endif; ?>
<?php if ($sf_flash->has('warningMsg')): ?>
<div class="alert alert-warning">
<!--    <button type="button" class="close" data-dismiss="alert">-->
<!--        <i class="icon-remove"></i>-->
<!--    </button>-->
    <strong><?php echo $sf_flash->get('warningMsg') ?></strong>
    <br/>
</div>
<?php endif; ?>
<?php if ($sf_flash->has('successMsg')): ?>
<div class="alert alert-block alert-success">
<!--    <button type="button" class="close" data-dismiss="alert">-->
<!--        <i class="icon-remove"></i>-->
<!--    </button>-->

    <strong>
        <i class="icon-ok"></i>
        <?php echo $sf_flash->get('successMsg') ?>
    </strong>
    <br/>
</div>
<?php endif; ?>
<?php if ($sf_flash->has('infoMsg')): ?>
<div class="alert alert-info">
<!--    <button type="button" class="close" data-dismiss="alert">-->
<!--        <i class="icon-remove"></i>-->
<!--    </button>-->
    <strong><?php echo $sf_flash->get('infoMsg') ?></strong>
    <br/>
</div>
<?php endif; ?>