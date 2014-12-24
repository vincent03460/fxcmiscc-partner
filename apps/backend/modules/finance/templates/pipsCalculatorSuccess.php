<?php use_helper('I18N') ?>
<style type="text/css">
.tablelist th {
    background: none repeat scroll 0 0 #555555;
    color: #FFFFFF;
    padding: 7px 10px;
    text-align: left;
}
.caption {
    background: none repeat scroll 0 0 #E8E8E8;
    width: 25%;
    border-bottom: 2px solid #FFFFFF;
    padding: 5px;
}

.value {
    background: none repeat scroll 0 0 #F4F4F4;
    width: 75%;
    border-bottom: 2px solid #FFFFFF;
    padding: 5px;
}
</style>
<script>
$(function() {
    $("#financeForm").validate({
        messages : {
            sponsorId: {
                equalTo: "Please enter Trader name"
            },
            total_amount: {
                equalTo: "Please enter MT4 Credit"
            }
        },
        rules : {
            "sponsorId" : {
                required : true
            },
            "total_amount" : {
                required : true
            }
        },
        submitHandler: function(form) {
            var amount = $('#total_amount').autoNumericGet();
            $("#total_amount").val(amount);
            form.submit();
        }
    });

    $("#sponsorId").change(function(){
        if ($.trim($('#sponsorId').val()) != "") {
            verifySponsorId();
        }
    });

    $('#total_amount').autoNumeric({
        mDec: 0
    });

    $("#btnCalculate").button({
        icons: {
            primary: "ui-icon-image"
        }
    });
});

function verifySponsorId() {
    waiting();
    $.ajax({
        type : 'POST',
        url : "<?php echo url_for('marketing/verifySponsorId') ?>",
        dataType : 'json',
        cache: false,
        data: {
            sponsorId : $('#sponsorId').val()
        },
        success : function(data) {
            if (data == null || data == "") {
                alert("<?php echo __('Invalid Sponsor ID') ?>");
                $('#sponsorId').focus();
                $("#sponsorName").html("");
            } else {
                $.unblockUI();
                $("#sponsorName").html(data.nickname);
                $("#sponsorId").val(data.userName);
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Your login attempt was not successful. Please try again.");
        }
    });
}
</script>

<?php echo form_tag('finance/pipsCalculator', 'id=financeForm') ?>
<div style="padding: 10px; top: 30px; position: absolute; width: 800px">
    <div class="portlet">
        <div class="portlet-header">Pips Calculator</div>
        <div class="portlet-content">
            <table cellpadding="2" cellspacing="5" align="center" border="0">
                <tr>
                    <td>
                        <font color='black'><?php echo __('Trader ID'); ?></font>
                    </td>
                    <td>
                        <input name="sponsorId" type="text" id="sponsorId" tabindex="1" maxlength="8"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color='black'><?php echo __('Trader Name'); ?></font>
                    </td>
                    <td>
                        <span id="sponsorName"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color='black'><?php echo __('Total Amount'); ?></font>
                    </td>
                    <td>
                        <input name="total_amount" type="text" id="total_amount" tabindex="2"/>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 align='center'>
                        <button type="submit" class="right" id="btnCalculate"><?php echo __('Calculate') ?></button>
                    </td>
                </tr>
            </table>
            <?php
                if (count($anode) > 0) {
            ?>
            <table width="100%" cellspacing="0" cellpadding="0" class="tablelist">
                <tr>
                    <th>Distributor Code</th>
                    <th>Tree Level</th>
                    <th>Tree Structure</th>
                    <th>Package</th>
                    <th>Pips Amount</th>
                </tr>
                <?php
                $className = "caption";
                for($i = 0; $i < count($anode); $i++) {
                    if ($className == "caption")
                        $className = "value";
                    else
                        $className = "caption";
                ?>
                <tr class="<?php echo $className;?>">
                    <td><?php echo $anode[$i]["distCode"]?></td>
                    <td><?php echo $anode[$i]["treeLevel"]?></td>
                    <td><?php echo $anode[$i]["treeStructure"]?></td>
                    <td><?php echo $anode[$i]["packageName"]?></td>
                    <td><?php echo $anode[$i]["pipsAmount"]?></td>
                </tr>
                <?php } ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
</form>