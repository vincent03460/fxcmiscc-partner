<?php
use_helper('I18N');
?>

<script type="text/javascript" language="javascript">
$(function() {
    $("#btnSubmit").click(function() {
        $("#convertForm").submit();
    });

    $("#convertForm").validate({
        messages : {
            transactionPassword: {
                remote: "Security Password is not valid."
            }
        },
        rules : {
            "transactionPassword" : {
                required : true
                , remote: "/member/verifyTransactionPassword"
            },
            "ecashAmount" : {
                required : true
            }
        },
        submitHandler: function(form) {
            waiting();
            var ecashBalance = $('#ecashBalance').autoNumericGet();
            var ecashAmount = $('#ecashAmount').autoNumericGet();

            if (ecashAmount > parseFloat(ecashBalance)) {
                alert("In-sufficient e-Wallet credit");
                return false;
            }
            $("#ecashAmount").val(ecashAmount);
            form.submit();
        }
    });

    $('#ecashAmount').autoNumeric({
        mDec: 0
    }).keyup(function(){
        var convertedAmount = 0;
        var ecashAmount = $('#ecashAmount').autoNumericGet();
        convertedAmount = parseFloat(ecashAmount) * 1.05;
        convertedAmount = Math.floor(convertedAmount);

        $("#promoAmount").val(convertedAmount);
        $("#promoAmountDisplay").html(convertedAmount);
    });

    $('#promoAmount').autoNumeric({
        mDec: 0
    });

    $('#ecashBalance').autoNumeric({
        mDec: 0
    });
});
</script>

<td valign="top">

    <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

    <form class="form-horizontal label-left" method="post"
          action="/member/convertEcashToPromo"
          data-validate="parsley"
          id="convertForm" name="convertForm">

        <h2><?php echo __("Convert e-Wallet To EP"); ?></h2>

        <table cellpadding="5" cellspacing="1">
            <tbody>
            <tr>
                <th>
                    <label class="control-label">
                        <?php echo __("e-Wallet Balance")?>
                    </label>
                </th>
                <td>
                    <strong><?php echo number_format($ledgerAccountBalance, 2); ?></strong>
                    <input type="hidden" id="ecashBalance" name="ecashBalance" value="<?php echo number_format($ledgerAccountBalance, 2); ?>" />
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="ecashAmount">
                        <?php echo __("e-Wallet Amount To Transfer")?>
                    </label>
                </th>
                <td>
                    <input type="text" name="ecashAmount" id="ecashAmount" class="form-control" />
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="promoAmount">
                        <?php echo __("EP Converted Amount")?>
                    </label>
                </th>
                <td>
                    <strong id="promoAmountDisplay">0</strong>
                    <input type="hidden" name="promoAmount" id="promoAmount" readonly="readonly" class="form-control" value="0" />
                </td>
            </tr>
            <tr>
                <th>
                    <label class="control-label" for="transactionPassword">
                        <?php echo __("Security Password")?>
                    </label>
                </th>
                <td>
                    <input name="transactionPassword" type="password" id="transactionPassword" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo __('NOTE :'); ?>
                    <ol class="help-block" style="list-style: decimal; padding-left: 20px;">
                        <li><?php echo __('Convert e-Wallet to EP will get extra 5%'); ?></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="pt10" align="right">
                    <input type="submit" id="btnSubmit" class="btn btn-danger" value="<?php echo __("Submit") ?>" />
                </td>
            </tr>
            </tbody>
        </table>

    </form>

</td>
