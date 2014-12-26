<?php include('scripts.php'); ?>

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('Pips Rebate Statement') ?></p></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td width="15px" style="min-height: 600px;">&nbsp;</td>
        <td>

            <br>

<table cellspacing="0" cellpadding="0" class="tbl_form">
    <colgroup>
        <col width="1%">
        <col width="30%">
        <col width="69%">
        <col width="1%">
    </colgroup>
    <tbody>
    <tr>
        <td colspan="4">
            <table class="pbl_table" cellpadding="3" cellspacing="3">
                <tbody>
                <colgroup>
                    <col width="5%">
                    <col width="35%">
                    <col width="30%">
                    <col width="30%">
                </colgroup>
                <tr class="pbl_header">
                    <td><?php echo __('') ?></td>
                    <td><?php echo __('Date') ?></td>
                    <td><?php echo __('Volume') ?></td>
                    <td><?php echo __('Amount') ?></td>
                </tr>
                <?php
                    if (count($mlmPipsRebates) > 0) {
                        $trStyle = "1";
                        $idx = 1;
                        foreach ($mlmPipsRebates as $mlmPipsRebate) {
                            if ($trStyle == "1") {
                                $trStyle = "0";
                            } else {
                                $trStyle = "1";
                            }

                            $dateDisplayArr = explode(" ", $mlmPipsRebate->getPipsDate());

                                echo "<tr class='row" . $trStyle . "'>
                                <td align='center'>" . $idx++ . "</td>
                                <td align='center'><a href='#' class='linkMt4' ref='".$mlmPipsRebate->getRebateId()."'>" . $dateDisplayArr[0] . "</a></td>
                                <td align='right'>" . number_format($mlmPipsRebate->getVolume(), 2) . "</td>
                                <td align='right'>" . number_format($mlmPipsRebate->getAmount(), 2) . "</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr class='odd' align='center'><td colspan='4'>" . __('No data available in table') . "</td></tr>";
                        }
                ?>
                </tbody>
            </table>
            <script type="text/javascript">
                $(function() {
                    $(".linkMt4").click(function(event){
                        event.preventDefault();
                        var rebateId = $(this).attr("ref");

                        $("#divMt4Roi").html("<img src='/css/network/spinner.gif'>");
                        $("#divMt4Roi").show();

                        $.ajax({
                            type : 'POST',
                            url : "/finance/fetchPipsRebateList",
                            dataType : 'json',
                            cache: false,
                            data: {
                                rebateId : rebateId
                            },
                            success : function(data) {
                                $.unblockUI();
                                var table = "<table class='pbl_table' cellpadding='3' cellspacing='3'><tbody><colgroup>";
                                table += "<col width='4%'>";
                                table += "<col width='20%'>";
                                table += "<col width='20%'>";
                                table += "<col width='20%'>";
                                table += "<col width='20%'>";
                                table += "<col width='20%'>";
                                table += "</colgroup>";
                                table += "<tr class='pbl_header'>";
                                table += "<td></td>";
                                table += "<td>Left</td>";
                                table += "<td>Left Volume</td>";
                                table += "<td>Right</td>";
                                table += "<td>Right Volume</td>";
                                table += "<td>Amount</td>";
                                table += "</tr>";

                                var trStyle = "1";
                                var idx = 1;
                                jQuery.each(data.mlmPipsRebateDetails, function(key, value) {
                                    if (trStyle == "1") {
                                        trStyle = "0";
                                    } else {
                                        trStyle = "1";
                                    }
                                    table += "<tr class='row" + trStyle + "'>";
                                    table += "<td align='center'>" + value[0] + "</td>";
                                    table += "<td align='center'>" + value[1] + "</td>";
                                    table += "<td align='right'>" + value[2] + "</td>";
                                    table += "<td align='center'>" + value[3] + "</td>";
                                    table += "<td align='right'>" + value[4] + "</td>";
                                    table += "<td align='right'>" + value[5] + "</td>";
                                    table += "</tr>";
                                });

                                table += "</tbody></table>";
                                $("#divMt4Roi").html(table);
                            },
                            error : function(XMLHttpRequest, textStatus, errorThrown) {
                                alert("Server connection error.");
                            }
                        });
                    });
                });

            </script>
            <div id="divMt4Roi" style="display: none;"><img src="/css/network/spinner.gif"></div>
        </td>
    </tr>
    </tbody>
</table>


    <td width="15px">&nbsp;</td>
    </tr>
</table>