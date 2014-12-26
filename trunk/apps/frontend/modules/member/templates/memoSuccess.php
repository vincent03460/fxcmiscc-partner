<?php
use_helper('I18N');
?>

<style type="text/css">
    .page_content {
        background: rgba(60, 59, 59, 0.5);
        margin-bottom: 24px;
    }

    .page_content td {
        padding: 8px;
    }

    .page_content h4 {
        background: rgba(189, 167, 102, 0.4);
        padding: 8px;
    }

    .page_content h5 {
        padding: 8px;
    }

    .page_content img {
        max-width: 536px;
    }
</style>

<div class="title">
  <h1><?php echo __("Memo"); ?></h1>
</div>
<div class="table">
    <table cellpadding="0" cellspacing="10" width="100%">
        <tr>
            <td width="100%">

                <div class="page_content">
                    <h4 style="font-weight: bold; color: white">memo image</h4>
                    <h5 style="color: white">26 December 2014</h5>
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <img src="/images/email/201412/xxx.jpg">
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="page_content">
                    <h4 style="font-weight: bold; color: white">memo text</h4>
                    <h5 style="color: white">24 December 2014</h5>
                    <table style="width: 100%" class="table">
                        <tr>
                            <td style="color: white">
<br>memo content
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>
