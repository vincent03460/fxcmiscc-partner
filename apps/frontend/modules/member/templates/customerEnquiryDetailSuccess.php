<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
$(function() {
    $("#csForm").validate({
        messages : {
            transactionPassword: {
                remote: "Security Password is not valid."
            }
        },
        rules : {
            "transactionPassword" : {
                required : true
                , remote: "/member/verifyTransactionPassword"
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        }
    });
});

tinyMCE.init({
    // General options
    mode : "exact",
    elements : "message",
    theme : "simple",
    width: "100%"
});
</script>

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('Customer Enquery Detail') ?></p></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td width="15px" style="min-height: 600px;">&nbsp;</td>
        <td>


<?php if ($sf_flash->has('successMsg')): ?>
    <div class="ui-widget">
        <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
             class="ui-state-highlight ui-corner-all">
            <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                          class="ui-icon ui-icon-info"></span>
                <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
        </div>
    </div>
    <?php endif; ?>
<?php if ($sf_flash->has('errorMsg')): ?>
    <div class="ui-widget">
        <div style="margin-top: 10px; margin-bottom: 10px; padding: 0 .7em;"
             class="ui-state-error ui-corner-all">
            <p style="margin: 10px"><span style="float: left; margin-right: .3em;"
                                          class="ui-icon ui-icon-alert"></span>
                <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
        </div>
    </div>
<?php endif; ?>
<br>


<form action="/member/doCustomerEnquiryDetail" id="csForm" name="csForm" method="post">
    <input type="hidden" name="enquiryId" value="<?php echo $mlmCustomerEnquiry->getEnquiryId(); ?>">


<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo $mlmCustomerEnquiry->getTitle(); ?></span></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td>

            <table cellspacing="0" cellpadding="0" class="tbl_form">
                <colgroup>
                    <col width="30%">
                    <col width="69%">
                </colgroup>
                <tbody>
                <?php
                foreach ($mlmCustomerEnquiryDetails as $mlmCustomerEnquiryDetail) {
                    if ($mlmCustomerEnquiryDetail->getReplyFrom() == "ADMIN")
                        $class = "tbl_form_row_odd";
                    else
                        $class = "tbl_form_row_even";
                ?>
                <tr class="<?php echo $class;?>">
                    <td>
                        <?php
                            if ($mlmCustomerEnquiryDetail->getReplyFrom() == "ADMIN")
                                echo $mlmCustomerEnquiryDetail->getReplyFrom();
                            else
                                echo $sf_user->getAttribute(Globals::SESSION_USERNAME);
                        ?>
                    </td>
                    <td>
                        <?php echo $mlmCustomerEnquiryDetail->getMessage();?>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

            <br>
            <table cellspacing="0" cellpadding="0" class="tbl_form">
                <colgroup>

                    <col width="30%">
                    <col width="69%">

                </colgroup>
                <tbody>
                <tr class="tbl_form_row_even">
                    <td>
                        <?php echo __('Message') ?>
                    </td>
                    <td>
                        <textarea rows="3" cols="3" id="message" name="message"><?php echo $message; ?></textarea>
                    </td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>
                        <?php echo __('Security Password'); ?>
                    </td>
                    <td>
                        <input name="transactionPassword" type="password" id="transactionPassword"/>
                    </td>
                </tr>

                <tr class="tbl_form_row_odd">

                    <td></td>
                    <td align="right">
                        <button id="btnSubmit"><?php echo __('Submit') ?></button>
                    </td>

                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

</form>


<td width="15px">&nbsp;</td>
    </tr>
</table>