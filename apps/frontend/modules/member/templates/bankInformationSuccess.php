<?php include('scripts.php'); ?>
<style type="text/css">
.tbl_form td {
    height: 20px;
}
</style>

<table cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td class="tbl_sprt_bottom"><span class="txt_title"><?php echo __('Bank Account Information') ?></span></td>
    </tr>
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
                    <th colspan="2"><?php echo __('Maxim Capital Limited USD Account') ?></th>
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Bank Name') ?></td>
                    <td class="value"><?php echo $bankName; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Bank Swift Code'); ?>
                    </td>
                    <td class="value"><?php echo $bankSwiftCode; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('IBAN'); ?>
                    </td>
                    <td class="value"><?php echo $iban; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Bank Account Holder'); ?>
                    </td>
                    <td class="value"><?php echo $bankAccountHolder; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Bank Account Number'); ?>
                    </td>
                    <td class="value"><?php echo $bankAccountNumber; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('City of Bank'); ?>
                    </td>
                    <td class="value"><?php echo $cityOfBank; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Country of Bank'); ?>
                    </td>
                    <td class="value"><?php echo $countryOfBank; ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td class="caption" colspan="2">
                        <span style="color: #dc143c">PS: Please write at REFERENCE : Maxim Capital Limited - 9120028849 and payment reference number</span>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>

            <?php if ($distDB->getCountry() != "Thailand") { ?>
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
                    <th class="tbl_header_left">
                        <div class="border_left_grey">&nbsp;</div>
                    </th>
                    <th colspan="2"><?php echo __('Maxim Capital Limited Thai Bath  Account') ?></th>
                    <th class="tbl_header_right">
                        <div class="border_right_grey">&nbsp;</div>
                    </th>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td><?php echo __('Bank Name') ?></td>
                    <td class="value"><?php echo $bankName2; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Bank Swift Code'); ?>
                    </td>
                    <td class="value"><?php echo $bankSwiftCode2; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('IBAN'); ?>
                    </td>
                    <td class="value"><?php echo $iban2; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Bank Account Holder'); ?>
                    </td>
                    <td class="value"><?php echo $bankAccountHolder2; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Bank Account Number'); ?>
                    </td>
                    <td class="value"><?php echo $bankAccountNumber2; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_even">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('City of Bank'); ?>
                    </td>
                    <td class="value"><?php echo $cityOfBank2; ?></td>
                    <td>&nbsp;</td>
                </tr>

                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td width="160px" class="caption">
                        <?php echo __('Country of Bank'); ?>
                    </td>
                    <td class="value"><?php echo $countryOfBank2; ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="tbl_form_row_odd">
                    <td>&nbsp;</td>
                    <td class="caption" colspan="2">
                        <span style="color: #dc143c">
                            PS: Please write at REFERENCE : Payment reference number
                            <br>
                            Note: USD1 : Bath31
                        </span>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <?php } ?>
        </td>
    </tr>
    </tbody>
</table>