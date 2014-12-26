<?php
use_helper('I18N');
?>
<script type="text/javascript">
$(function() {

});
</script>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title"><?php echo __("Download MT4"); ?>
            <small></small>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <section class="widget">
            <header>
                <!--<h4>
                    <i class="icon-ok-sign"></i>
                    <?php /*echo __("MT4 for desktop – is an all-in-one trading application combining fast functionality with fully customizable interface."); */?>
                    <small></small>
                </h4>-->
            </header>
            <div class="body">
                <form class="form-horizontal label-left" method="post"
                      action="#"
                      data-validate="parsley"
                      id="topupForm" name="topupForm">
                    <input type="hidden" name="doAction" value="<?php echo $doAction?>">
                    <fieldset>
                        <legend class="section">
                        <?php echo __("MT4 for desktop")?>
                        </legend>
                        <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="box">
                                    <a href="/download/mt4" target="_blank" style="color: white">
                                        <div class="icon">
                                            <i class="icon-download-alt"></i>
                                        </div>
                                    </a>
                                    <div class="description">
                                        <strong>MT4 (Window version)</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="section">
                        <?php echo __("MT4 for web")?>
                        </legend>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="box">
                                    <a href="http://webtrader.fxcmiscc.com" target="_blank" style="color: white">
                                        <div class="icon">
                                            <i class="icon-cloud"></i>
                                        </div>
                                    </a>
                                    <div class="description">
                                        <strong><?php echo __("MT4 for web")?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="section">
                        <?php echo __("MT4 for mobile")?>
                        </legend>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="box">
                                    <a href="http://www.fxcmiscc.com/index.php/trading-platform-2/mt4-for-mobile/" target="_blank" style="color: white">
                                        <div class="icon">
                                            <i class="icon-mobile-phone"></i>
                                        </div>
                                    </a>
                                    <div class="description">
                                        <strong><?php echo __("MT4 for mobile")?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <a href="/member/summary" class="btn btn-default"><?php echo __("Cancel");?></a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>