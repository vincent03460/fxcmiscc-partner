<?php
use_helper('I18N');
?>
<script type="text/javascript">
$(function() {
    $("#btnSubmit").click(function(){
        $("#topupForm").submit();
    });
    $("#topupForm").validate({
        messages : {
            transactionPassword: {
                remote: "Password is not valid."
            }
        },
        rules : {
            "transactionPassword" : {
                required : true
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        }
    });
});
</script>

<div class="title">
  <h1><?php echo __("Security Password"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Please key in your password")?></th>
          </tr>
          <tr>
            <td class="tablebg" align="center">
              <form class="form-horizontal label-left" method="post"
                    action="/member/securityPasswordRequired"
                    data-validate="parsley"
                    id="topupForm" name="topupForm">
                <input type="hidden" name="doAction" value="<?php echo $doAction?>">
                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="transactionPassword">
                          <?php echo __("Security Password")?>
                        </label>

                        <div class="controls form-group">
                          <input type="password" id="transactionPassword" name="transactionPassword" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="btnSubmit" class="btn btn-danger">
                    <i class="icon-ok bigger-110"></i>
                    <?php echo __("Submit");?>
                  </button>
                  <a href="/member/summary" class="btn btn-default"><?php echo __("Cancel");?></a>
                </div>
              </form>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
