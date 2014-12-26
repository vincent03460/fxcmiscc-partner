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
            , "contactNoEmail" : {
                required : true
            }
            , "title" : {
                required : true
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
    width: "500px"
});
</script>

<div id="sub_title" class="highlight"><span class="taller red"></span>

    <p style="font-size: 16px; font-weight: bold;"><?php echo __('CS Center') ?></p></div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td width="15px" style="min-height: 600px;">&nbsp;</td>
        <td>


<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td><br>
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

        </td>
    </tr>
    <tr>
        <td>
            <form action="/member/doCustomerEnquiry" id="csForm" name="csForm" method="post">
            <table cellspacing="0" cellpadding="0" class="tbl_form">
                <colgroup>
                    <col width="1%">
                    <col width="30%">
                    <col width="69%">
                    <col width="1%">
                </colgroup>
                <tbody>
                <tr>
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th colspan="2"><?php echo __('Customer Enquiry') ?></th>
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Username'); ?></td>
                    <td><b><?php echo $username; ?></b></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td>
                        <?php echo __('Contact Number / Email') ?>
                    </td>
                    <td>
                        <input name="contactNoEmail" id="contactNoEmail" size="50" value="<?php echo $contactNoEmail; ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td>
                        <?php echo __('Subject') ?>
                    </td>
                    <td>
                        <input name="title" size="50" value="<?php echo $title; ?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td>
                        <?php echo __('Message') ?>
                    </td>
                    <td>
                        <textarea rows="3" cols="3" id="message" name="message"><?php echo $message; ?></textarea>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td>
                        <?php echo __('Security Password'); ?>
                    </td>
                    <td>
                        <input name="transactionPassword" type="password" id="transactionPassword"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td></td>
                    <td align="right">
                        <button id="btnTransfer"><?php echo __('Submit') ?></button>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </form>

        <div class="info_bottom_bg"></div>
        <div class="clear"></div>
        <br>
        <script type="text/javascript" language="javascript">
        var datagrid = null;
        $(function() {
            datagrid = $("#datagrid").r9jasonDataTable({
                // online1DataTable extra params
                "idTr" : true, // assign <tr id='xxx'> from 1st columns array(aoColumns);
                "extraParam" : function(aoData) { // pass extra params to server
                },
                "reassignEvent" : function() { // extra function for reassignEvent when JSON is back from server
                    reassignDatagridEventAttr();
                },

                // datatables params
                "bLengthChange": true,
                "bFilter": false,
                "bProcessing": true,
                "bServerSide": true,
                "bAutoWidth": false,
                "sAjaxSource": "/business/customerEnquiryList",
                "sPaginationType": "full_numbers",
                "aaSorting": [
                    [1,'desc']
                ],
                "aoColumns": [
                    { "sName" : "enquiry_id", "bVisible" : false,  "bSortable": true},
                    { "sName" : "updated_on", "bVisible" : true,  "bSortable": true},
                    { "sName" : "title",  "bSortable": true},
                    { "sName" : "admin_updated",  "bSortable": true},
                    { "sName" : "distributor_read",  "bVisible": true, "fnRender": function ( oObj ) {
                        if (oObj.aData[4] == "Read") {
                            return "<a href='/member/customerEnquiryDetail?enquiryId=" + oObj.aData[0] + "'>Read</a>";
                        } else if (oObj.aData[4] == "Unread") {
                            return "<a href='/member/customerEnquiryDetail?enquiryId=" + oObj.aData[0] + "' style='color:#0088CF'>Unread</a>";
                        }
                    }}
                ]
            });
        }); // end function

        function reassignDatagridEventAttr() {
        }
    </script>

    <table cellspacing="0" cellpadding="0" class="tbl_form">
            <colgroup>
                <col width="1%">
                <col width="30%">
                <col width="69%">
                <col width="1%">
            </colgroup>
            <tbody>
            <tr>
                <th class="tbl_header_left">
                    <div class="border_left_grey">&nbsp;</div>
                </th>
                <th><?php echo __('Enquiry History') ?></th>
                <th class="tbl_content_right"></th>
                <th class="tbl_header_right">
                    <div class="border_right_grey">&nbsp;</div>
                </th>
            </tr>
            </tbody>
        </table>
        <br>

        <table class="display" id="datagrid" border="0" width="100%">
            <thead>
            <tr>
                <th></th>
                <th><?php echo __('Date') ?></th>
                <th><?php echo __('Subject') ?></th>
                <th><?php echo __('Last Reply') ?></th>
                <th><?php echo __('Read / Unread') ?></th>
            </tr>
            </thead>
        </table>
        </td>
    </tr>
    </tbody>
</table>

    <td width="15px">&nbsp;</td>
    </tr>
</table>