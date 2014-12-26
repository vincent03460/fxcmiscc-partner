<?php
use_helper('I18N');
?>
<script type="text/javascript">
$(function() {
    $("#submitLink").click(function(event){
        event.preventDefault();

        $("#transferForm").submit();
    });
    $("#btnUpload").click(function(event){
        event.preventDefault();

        $("#uploadForm").submit();
    });
    $("#btnPrint").click(function(event){
        event.preventDefault();

        var params  = 'width=891';
        params += ', scrollbars=yes';
        params += ', top=0, left=0';

        newwin = window.open("<?php echo url_for("/member/printBankInformation?q=1231j32lkhljkewrw&p=")."/";?>" + $("#purchaseId").val(),'Bank Information', params);
        if (window.focus)
        {
            newwin.focus();
        }
    });
    $("#transferForm").validate({
        messages : {
            transactionPassword: {
                remote: "<?php echo __("Security Password is not valid")?>"
            }
        },
        rules : {
            "fundAmount" : {
                required : true
            },
            "transactionPassword" : {
                required : true,
                remote: "/member/verifyTransactionPassword"
            }
        },
        submitHandler: function(form) {
            var answer = confirm("<?php echo __('Are you sure you want to funds deposit?')?>")
            if (answer == true) {
                waiting();
                //var amount = $('#fundAmount').autoNumericGet();
                //$("#fundAmount").val(amount);
                form.submit();
            }
        }
    });
    /*$('#fundAmount').autoNumeric({
        mDec: 2
    });*/

    $('#paymentMethod').change(function(){
        var paymentMethod = $(this).val();
        if (paymentMethod == "GOZ") {
            $("#tr_channelid").show();
        } else {
            $("#tr_channelid").hide();
        }
    });

    /*$("#dgBankReceipt").dialog("destroy");
    $("#dgBankReceipt").dialog({
        autoOpen : false,
        modal : true,
        resizable : false,
        hide: 'clip',
        show: 'slide',
        width: 700,
        height: 430,
        buttons: {
            "<?php echo __('Print') ?>": function() {
                var params  = 'width=891';
                params += ', height=637';
                params += ', top=0, left=0';

                newwin = window.open("<?php echo url_for("/member/printBankInformation?q=1231j32lkhljkewrw&p=")."/";?>" + $("#purchaseId").val(),'Bank Information', params);
                if (window.focus)
                {
                    newwin.focus();
                }
            }
            *//*, "<?php //echo __('Submit') ?>": function() {
                $("#uploadForm").submit();
            }*//*
        },
        open: function() {
        },
        close: function() {

        }
    });*/

    <?php if ($sf_flash->has('successMsg') && $pg == "N") { ?>
        $('#dgBankReceipt').modal('show');
    <?php } ?>
});
</script>
<div class="row">
    <div class="col-md-12">
        <h2 class="page-title"><?php echo __("Funds Deposit"); ?>
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
                    <?php echo __("Deposit funds into your trading account today"); ?>
                    <small></small>
                </h4>
            </header>
            <div class="body">
                <form class="form-horizontal label-left" method="post"
                      action="/member/fundsDepositTesting"
                      data-validate="parsley"
                      id="transferForm" name="transferForm">
                    <fieldset>
                        <legend class="section">
                        <?php echo __("Funds Deposit")?>
                        </legend>
                        <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="control-group">
                                    <label class="control-label" for="memberId">
                                    <?php echo __("Member ID")?>
                                    </label>

                                    <div class="controls form-group">
                                        <input name="memberId" type="text" id="memberId" placeholder="<?php echo __('Member ID'); ?>" value=""  class="form-control"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fullname">
                                    <?php echo __("Full Name")?>
                                    </label>

                                    <div class="controls form-group">
                                        <input name="fullname" type="text" id="fullname" class="form-control"
                                            placeholder="<?php echo __('Full Name'); ?>" value="" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fundAmount">
                                    <?php echo __("Total Fund Deposited")?>
                                    </label>

                                    <div class="controls form-group">
<!--                                        <input name="fundAmount" type="text" id="fundAmount" value="" />-->
                                        <select id="fundAmount" name="fundAmount" style="text-align: right;" class="form-control">
                                            <?php
                                                for ($i = 1; $i <= 100; $i = $i + 1) {
                                                    echo "<option value='".$i."'>".number_format($i, 0)."&nbsp;</option>";
                                                }
                                                for ($i = 200; $i <= 30000; $i = $i + 100) {
                                                    echo "<option value='".$i."'>".number_format($i, 0)."&nbsp;</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="paymentMethod">
                                    <?php echo __("Payment Method")?>
                                    </label>

                                    <div class="controls form-group">
                                        <select name="paymentMethod" id="paymentMethod" class="form-control">
                                            <option value="PG"><?php echo __("Union Pay");?></option>
                                            <option value="LB" disabled="disabled"><?php echo __("Bank Transfer");?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="paymentMethod">
                                    <?php echo __("Bank Name")?>
                                    </label>

                                    <div class="controls form-group">
                                        <select name="bank_type" class="form-control">
                                            <option value="CCB" selected>建设银行</option>
                                            <option value="ICBC">工商银行</option>
                                            <option value="ABC">农业银行</option>
                                            <option value="BOC">中国银行</option>

                                            <option value="BCOM">交通银行</option>
                                            <option value="PSBC">邮政储蓄</option>
                                            <option value="CITIC">中信银行</option>
                                            <option value="CMBC">民生银行</option>

                                            <option value="CEB">光大银行</option>
                                            <option value="CMB">招商银行</option>
                                            <option value="SPDB">浦发银行</option>
                                            <option value="HXB">华夏银行</option>

                                            <option value="CIB">兴业银行</option>
                                            <option value="GDB">广发银行</option>
                                            <option value="BEA">东亚银行</option>
                                            <option value="SRCB">农商银行</option>

                                            <option value="CBHB">渤海银行</option>
                                            <option value="BJRCB">北京农商银行</option>
                                            <option value="NJCB">南京银行</option>
                                            <option value="NBCB">宁波银行</option>

                                            <option value="HZB">杭州银行</option>
                                            <option value="PAB">平安银行</option>
                                            <option value="HSB">徽商银行</option>
                                            <option value="CZB">浙商银行</option>

                                            <option value="SHB">上海银行</option>
                                            <option value="GZCB">广州银行</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <button type="button" id="submitLink" class="btn btn-danger"><?php echo __("Submit");?></button>
                        <a href="/member/summary" class="btn btn-default"><?php echo __("Cancel");?></a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>