<?php
use_helper('I18N');
?>
<script type="text/javascript">
    $(function() {
        $("#btnSubmitPasswordForm").click(function(){
            $("#passwordForm").submit();
        });
        $("#passwordForm").validate({
            messages : {
                newPassword2: {
                    equalTo: "Please enter the same password as above"
                }
            },
            rules : {
                "oldPassword" : {
                    required : true,
                    minlength : 3
                },
                "newPassword" : {
                    required : true,
                    minlength : 3
                },
                "newPassword2" : {
                    required : true,
                    minlength : 3,
                    equalTo: "#newPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                form.submit();
            }
        });

        $("#securityPasswordForm").validate({
            messages : {
                newSecurityPassword2: {
                    equalTo: "Please enter the same password as above"
                }
            },
            rules : {
                "oldSecurityPassword" : {
                    required : true,
                    minlength : 3
                },
                "newSecurityPassword" : {
                    required : true,
                    minlength : 3
                },
                "newSecurityPassword2" : {
                    required : true,
                    minlength : 3,
                    equalTo: "#newSecurityPassword"
                }
            },
            submitHandler: function(form) {
                waiting();
                form.submit();
            }
        });
        $("#btnSecurityUpdate").click(function(){
            $("#securityPasswordForm").submit();
        });
    });
</script>

<div class="title">
  <h1><?php echo __("Password Setting"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Login Password")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Change Account login Password"); ?>
              <small></small>
              <br/><br/>

              <form action="/member/loginPassword"
                    id="passwordForm"
                    name="passwordForm"
                    method="post" class="form-horizontal" role="form">

                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="oldPassword">
                          <?php echo __("Old Login Password")?>
                        </label>

                        <div class="controls form-group">
                          <input type="password" name="oldPassword" id="oldPassword"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="newPassword">
                          <?php echo __("New Login Password")?>
                        </label>

                        <div class="controls form-group">
                          <input type="password" name="newPassword" id="newPassword"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="newPassword2">
                          <?php echo __("Re-enter Login Password")?>
                        </label>

                        <div class="controls form-group">
                          <input type="password" name="newPassword2" id="newPassword2"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="btnSubmitPasswordForm" class="btn btn-info">
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
    <tr>
      <td>
        <table cellpadding="10" cellspacing="0" width="100%">
          <tr>
            <th colspan="4"><?php echo __("Security Password")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Change Security Password"); ?>
              <small></small>
              <br/><br/>

              <form action="/member/transactionPassword"
                    id="securityPasswordForm"
                    name="securityPasswordForm"
                    method="post" class="form-horizontal" role="form">

                <fieldset>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="oldSecurityPassword">
                          <?php echo __("Old Security Password")?>
                        </label>

                        <div class="controls form-group">
                          <input type="password" name="oldSecurityPassword" id="oldSecurityPassword"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="newSecurityPassword">
                          <?php echo __("New Security Password")?>
                        </label>

                        <div class="controls form-group">
                          <input type="password" name="newSecurityPassword" id="newSecurityPassword"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="newSecurityPassword2">
                          <?php echo __("Re-enter Security Password")?>
                        </label>

                        <div class="controls form-group">
                          <input type="password" name="newSecurityPassword2" id="newSecurityPassword2"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="btnSecurityUpdate" class="btn btn-info">
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
