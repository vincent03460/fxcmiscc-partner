<?php
use_helper('I18N');
?>

<style type="text/css">
    .page_content {
        border-bottom: 2px grey solid;
        padding-bottom: 28px;
        margin-bottom: 28px;
    }

    .page_content td {
        padding-left: 0px;
    }
</style>

<td valign="top">
    <h2><?php echo __("Fund Management Report"); ?></h2>
    <table cellpadding="7" cellspacing="1" style="width: 825px;">
        <tbody>
        <tr>
            <td>

                <div class="page_content">
                    <h4 style="font-weight: bold;"></h4>
                    <!--<h5>26 January 2015</h5>-->
                    <table style="width: 100%" class="table">
                        <tr>
                            <td>
                                <a href="<?php echo url_for("/download/downloadFundManagementReport?p=2015_Jan") ?>"><span>Click to DOWNLOAD Fund Management Report Jan 2015</span></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</td>
