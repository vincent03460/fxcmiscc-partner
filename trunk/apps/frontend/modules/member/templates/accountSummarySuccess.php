<?php
use_helper('I18N');
?>
<script type="text/javascript" language="javascript">
    $(function($) {
        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
        });
    }); // end function
</script>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title"><?php echo __("Account Summary"); ?>
            <small></small>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <section class="widget">
            <header>
                <h4>
                    <i class="icon-ok-sign"></i>
                    <?php echo __("Membership Summary"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <fieldset>
                    <legend class="section">
                    <?php echo __("Membership Summary")?>
                    </legend>
                    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="control-group">
                                <label class="control-label" for="memberId">
                                <?php echo __("Member ID")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="memberId" name="memberId" class="form-control" value="<?php echo $distributor->getDistributorCode();?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="status">
                                <?php echo __("Status")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="status" name="status" class="form-control" value="<?php echo $distributor->getStatusCode();?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="lastLogin">
                                <?php echo __("Last Login")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="lastLogin" name="lastLogin" value="<?php echo $lastLogin;?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <section class="widget">
            <header>
                <h4>
                    <i class="icon-ok-sign"></i>
                    <?php echo __("Account Summary"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <fieldset>
                    <legend class="section">
                    <?php echo __("Account Summary")?>
                    </legend>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="control-group">
                                <label class="control-label" for="memberId">
                                <?php echo __("Networks")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="networks" name="networks" value="<?php echo $totalNetworks ?>" class="form-control">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="status">
                                <?php echo __("Trading Account")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="tradingBalance" name="tradingBalance" value="<?php echo number_format($tradingBalance, 2)?>" class="form-control">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="lastLogin">
                                <?php echo __("Current Account")?>
                                </label>

                                <div class="controls form-group">
                                    <input type="text" readonly="readonly" id="currentBalance" name="currentBalance" value="<?php echo number_format($currentBalance, 2);?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </section>
    </div>
</div>