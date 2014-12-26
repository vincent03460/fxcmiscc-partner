<?php include('scripts.php'); ?>

<script type="text/javascript" language="javascript">
    $(function() {
        $("#ecreditForm").validate({
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
                var ecashBalance = $('#ecashBalance').autoNumericGet();
                var ecreditAmount = parseFloat($("#cbo_ecreditAmount").val());

                if (ecreditAmount > parseFloat(ecashBalance)) {
                    alert("In-sufficient MT4 Credit");
                    return false;
                }

                form.submit();
            }
        });
    });
</script>

<div class="aside">
    <?php //include_component('component', 'headerInformation', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
    <!-- #BeginLibraryItem "/Library/side_navi.lbi" -->
    <div class="sidenavi">
        <ul>
            <li><a href="/member/viewProfile"><span><?php echo __('Account Information'); ?></span></a></li>
            <li><a href="/member/viewBankInformation"><span><?php echo __('Bank Account Information'); ?></span></a></li>
            <li><a href="/member/loginPassword"><span><?php echo __('Change Password'); ?></span></a></li>
            <li><a href="/member/transactionPassword"><span><?php echo __('Change Security Password'); ?></span></a></li>
        </ul>
    </div>

    <?php //include_component('component', 'submenu', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
    <!-- #EndLibraryItem -->
</div>

<div class="areaContent">
    <div class="resultsWrap">
        <form action="/member/ecreditPurchase" id="ecreditForm" name="ecreditForm" method="post">

            <table cellpadding="3" cellspacing="3" border="0" width="100%" class="tablelist" bgcolor="#f90;"
                    align="center">
                <caption><?php echo __('Point Purchase') ?></caption>
                <tr>
                    <td colspan=2 align='center'>
                        <?php if ($sf_flash->has('successMsg')): ?>
                        <div class="ui-widget">
                            <div style="margin-top: 20px; padding: 0 .7em;"
                                 class="ui-state-highlight ui-corner-all">
                                <p><span style="float: left; margin-right: .3em;"
                                         class="ui-icon ui-icon-info"></span>
                                    <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($sf_flash->has('errorMsg')): ?>
                        <div class="ui-widget">
                            <div style="margin-top: 20px; padding: 0 .7em;"
                                 class="ui-state-error ui-corner-all">
                                <p><span style="float: left; margin-right: .3em;"
                                         class="ui-icon ui-icon-alert"></span>
                                    <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" width="650px" style="margin:0 auto">
                            <tr>
                                <td class="caption">
                                    <strong><?php echo __('e-Wallet'); ?></strong>
                                </td>
                                <td class="value">
                                    <input name="ecashBalance" id="ecashBalance" tabindex="1" disabled="disabled"
                                           value="<?php echo number_format($ledgerAccountBalance, 2); ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="caption">
                                    <strong><?php echo __('Point Amount'); ?></strong>
                                </td>
                                <td class="value">
                                    <select name="ecreditAmount" id="cbo_ecreditAmount" tabindex="2">
                                        <option value="250">250</option>
                                        <option value="500">500</option>
                                        <option value="1000">1,000</option>
                                        <option value="3000">3,000</option>
                                        <option value="5000">5,000</option>
                                        <option value="15000">15,000</option>
                                        <option value="30000">30,000</option>
                                        <option value="50000">50,000</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="caption">
                                    <strong><?php echo __('Security Password'); ?></strong>
                                </td>
                                <td class="value">
                                    <input name="transactionPassword" type="password" id="transactionPassword"
                                           tabindex="3"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2' align="center">
                                    &nbsp;
                                </td>
                            </tr>

                            <tr>
                                <td colspan=2 align='center'>
                                    <input type="submit" name="Button1" value="<?php echo __('Submit') ?>"
                                           language="javascript"
                                           id="btnTransfer" tabindex="5"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>

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
                            "sAjaxSource": "/finance/ecreditPurchaseList",
                            "sPaginationType": "full_numbers",
                            "aaSorting": [
                                [4,'desc']
                            ],
                            "aoColumns": [
                                { "sName" : "dist_id", "bVisible" : false,  "bSortable": true},
                                { "sName" : "amount",  "bSortable": true},
                                { "sName" : "status_code",  "bSortable": true},
                                { "sName" : "remarks",  "bSortable": true},
                                { "sName" : "created_on",  "bSortable": true}
                            ]
                        });
            }); // end function

            function reassignDatagridEventAttr() {
            }
        </script>

        <div class="portlet">
            <div class="portlet-header"><?php echo __('Point Purchase Status') ?></div>
            <div class="portlet-content">

                <table class="display" id="datagrid" border="0" width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th><?php echo __('Total Point') ?></th>
                        <th><?php echo __('Status') ?></th>
                        <th><?php echo __('Remarks') ?></th>
                        <th><?php echo __('Date') ?></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
