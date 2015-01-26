<?php
use_helper('I18N');
?>

<style type="text/css">
    #announcement .page_content img {
        max-width: 536px;
    }
</style>

<script type="text/javascript">
    $(function($) {
        var btn_html = '';
        //var page_selected_id = Math.floor((Math.random() * 3) + 1);
        var page_selected_id = 1;
        var page_id = 1;

        $('#announcement .page_content').each(function() {
            $(this).attr('id', 'page_' + page_id);

            if (page_id != page_selected_id) {
                $(this).css('display', 'none');
            }

            btn_html += '<button class="btn btn-info pager_button" type="button" data-original-title="" title="" ref="' + page_id + '">' + page_id + '</button>';
            page_id++;
        });

        $('#announcement .btn-group').html(btn_html);
//        $('#announcement').modal('show');

        $(".pager_button").click(function(event) {
            event.preventDefault();
            var pager = $(this).attr("ref");

            $(".page_content").hide(500);
            $("#page_" + pager).show(500);
        });
    }); // end function
</script>

<style type="text/css">
    #announcement .page_content img {
        max-width: 536px;
    }
</style>

<td valign="top">
    <h2><?php echo __("Account Summary"); ?></h2>
    <table cellpadding="7" cellspacing="1">
        <tbody>
        <tr>
            <th width="150px"><?php echo __("Partner ID"); ?></th>
            <td><?php echo $distributor_code ?></td>
        </tr>
        <tr style="display: none;">
            <th><?php echo __("MT4 Rank")?></th>
            <td><?php echo __($mt4Ranking);?></td>
        </tr>
        <tr>
            <th><?php echo __("RP Wallet")?></th>
            <td><?php echo number_format($epoint, 2)?></td>
        </tr>
        <tr>
            <th><?php echo __("Email") ?></th>
            <td><?php echo $email ?></td>
        </tr>
        <tr>
            <th><?php echo __("Contact Number") ?></th>
            <td><?php echo $contact ?></td>
        </tr>
        <tr>
            <th><?php echo __("Country") ?></th>
            <td><?php echo $country ?></td>
        </tr>
        <tr>
            <th><?php echo __("Bank Holder Name") ?></th>
            <td><?php echo $bankHolderName ?></td>
        </tr>
        <tr>
            <th><?php echo __("Bank Name") ?></th>
            <td><?php echo $bankName ?></td>
        </tr>
        <tr>
            <th><?php echo __("Bank Account No.") ?></th>
            <td><?php echo $bankAccNo ?></td>
        </tr>
        <tr>
            <th><?php echo __("Package Rank")?></th>
            <td><?php echo __($ranking);?></td>
        </tr>
        <tr>
            <th><?php echo __("Networks")?></th>
            <td><?php echo $totalNetworks ?></td>
        </tr>
        <tr>
            <th><?php echo __("Last Login")?></th>
            <td><?php echo $lastLogin;?></td>
        </tr>
        </tbody>
    </table>

    <div id="announcement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="false" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel2"><strong
                            style="color: #fff;"><?php echo __('Announcement') ?></strong></h4>
                </div>
                <div class="modal-body" style="overflow: auto">
                    <div class="row margin-bottom text-align-center">
                        <div class="col-md-12">
                            <div class="btn-group">
                            </div>
                        </div>
                    </div>

                    <div class="page_content">
                        <h4 style="font-weight: bold;">More content is coming soon</h4>
                        <h5>26 January 2015</h5>
                        <table style="width: 100%" class="table">
                            <tr>
                                <td>
                                    <br>More content is coming soon
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close') ?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</td>
<td valign="top" align="right"><img src="/images/pic_account-summary.jpg"></td>