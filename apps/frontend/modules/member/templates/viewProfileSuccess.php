<?php
use_helper('I18N');
?>
<script>
$(function() {
    $("#registerForm").validate({
        rules : {
            "fullname" : {
                required : true
            },
            "nric" : {
                required : true
            },
            "address" : {
                required : true
            },
            "postcode" : {
                required : true
            },
            "email" : {
                required : true
                , email: true
            },
            "contactNumber" : {
                required : true
                , minlength : 10
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        },
        success: function(label) {
            //label.addClass("valid").text("Valid captcha!")
        }
    });

    $("#btnSubmit").click(function(){
        $("#registerForm").submit();
    });

    $("#bankForm").validate({
        messages : {
            transactionPassword: {
                remote: "<?php echo __("Security Password is not valid")?>."
            }
        },
        rules : {
            "bankName" : {
                required : true
            },
            "bankAccNo" : {
                required : true
            },
            "bankHolderName" : {
                required : true
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        },
        success: function(label) {
            //label.addClass("valid").text("Valid captcha!")
        }
    });

    $("#btnBankUpdate").click(function(){
        $("#bankForm").submit();
    });

    $("#uploadForm").validate({
        rules : {
            "bankPassBook" : {
                required: "#bankPassBook.length > 0",
                accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            },
            "proofOfResidence" : {
                required: "#bankPassBook.length > 0",
                accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            },
            "nric" : {
                required: "#bankPassBook.length > 0",
                accept:'docx?|pdf|bmp|jpg|jpeg|gif|png|tif|tiff|xls|xlsx'
            }
        },
        submitHandler: function(form) {
            waiting();
            form.submit();
        },
        success: function(label) {
            //label.addClass("valid").text("Valid captcha!")
        }
    });

    $("#btnUpload").click(function(){
        $("#uploadForm").submit();
    });
});
</script>
<div class="title">
  <h1><?php echo __("Personal Information"); ?></h1>
</div>
<div class="table">
  <table cellpadding="0" cellspacing="10" width="100%">
    <tr>
      <td width="100%">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <th colspan="2"><?php echo __("Personal Information")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Please fill in all the personal information"); ?>
              <small></small>
              <br/><br/>

              <form action="/member/updateProfile"
                      id="registerForm"
                      name="registerForm"
                      method="post" class="form-horizontal" role="form">

                <fieldset>
                  <?php include_component('component', 'alert', array('param' => $sf_user->getAttribute(Globals::SESSION_DISTID, 0))) ?>

                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="fullname">
                        <?php echo __("Full Name")?>
                        </label>

                        <div class="controls form-group">
                          <input name="fullname" type="text" id="fullname" readonly="readonly" class="form-control" size="30" value="<?php echo $distDB->getFullName() ?>"/>
                        </div>
                      </div>
                        <div class="control-group">
                          <label class="control-label" for="nric">
                          <?php echo __("NRIC")?>
                          </label>

                          <?php
                          $toReadonly = "readonly='readonly'";
                          if ($distDB->getIc() == "") {
                            $toReadonly = "";
                          }
                          ?>
                          <div class="controls form-group">
                            <input name="nric" type="text" id="nric" class="form-control" size="30" value="<?php echo $distDB->getIc() ?>" <?php echo $toReadonly ?>/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="country">
                          <?php echo __("Country")?>
                          </label>

                          <div class="controls form-group">
                            <?php include_component('component', 'countrySelectOption', array('countrySelected' => $distDB->getCountry(), 'countryName' => 'country', 'countryId' => 'country')) ?>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="address">
                          <?php echo __("Address")?>
                          </label>

                          <div class="controls form-group">
                            <input name="address" type="text" id="address" size="30" class="form-control" value="<?php echo $distDB->getAddress() ?>"/>
                          </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="address2">
                            <?php echo __("Address")?> 2
                            </label>

                            <div class="controls form-group">
                              <input name="address2" type="text" id="address2" size="30" class="form-control" value="<?php echo $distDB->getAddress2() ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="city">
                          <?php echo __("City / Town")?>
                          </label>

                          <div class="controls form-group">
                            <input name="city" type="text" id="city" size="30" class="form-control" value="<?php echo $distDB->getCity() ?>"/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="state">
                          <?php echo __("State / Province")?>
                          </label>

                          <div class="controls form-group">
                            <input name="state" type="text" id="state" size="30" class="form-control" value="<?php echo $distDB->getState() ?>"/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="zip">
                          <?php echo __("Zip / Postal Code")?>
                          </label>

                          <div class="controls form-group">
                            <input name="zip" type="text" id="zip" size="30" class="form-control" value="<?php echo $distDB->getPostcode() ?>"/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="email">
                          <?php echo __("Email")?>
                          </label>

                          <div class="controls form-group">
                            <input name="email" type="text" id="email" size="30" class="form-control" value="<?php echo $distDB->getEmail() ?>"/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="contactNumber">
                          <?php echo __("Contact Number")?>
                          </label>

                          <div class="controls form-group">
                            <input name="contactNumber" type="text" id="contactNumber" size="30" class="form-control" value="<?php echo $distDB->getContact() ?>"/>
                          </div>
                        </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="btnSubmit" class="btn btn-info">
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
            <th colspan="4"><?php echo __("Bank Account Details")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-ok-sign"></i>
              <?php echo __("Please fill in all the Bank Account Details"); ?>
              <small></small>
              <br/><br/>

              <form action="/member/updateBankInformation"
                    id="bankForm"
                    name="bankForm"
                    method="post" class="form-horizontal" role="form">

                <fieldset>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="control-group">
                        <label class="control-label" for="bankName">
                          <?php echo __("Bank Name")?>
                        </label>

                        <div class="controls form-group">
                          <input name="bankName" type="text" id="bankName"
                                 size="30" value="<?php echo $distDB->getBankName() ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="bankBranch">
                          <?php echo __("Bank Branch")?>
                        </label>

                        <div class="controls form-group">
                          <input name="bankBranch" type="text" id="bankBranch" size="30"
                                 value="<?php echo $distDB->getBankBranch() ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="bankState">
                          <?php echo __("Bank Address")?>
                        </label>

                        <div class="controls form-group">
                          <input name="bankState" type="text" id="bankState" size="30"
                                 value="<?php echo $distDB->getBankAddress() ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="bankState">
                          <?php echo __("Bank Swift Code")?>
                        </label>

                        <div class="controls form-group">
                          <input name="bankSwiftCode" type="text" id="bankSwiftCode" size="30"
                                 value="<?php echo $distDB->getBankSwiftCode() ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="bankAccNo">
                          <?php echo __("Bank Account Number")?>
                        </label>

                        <div class="controls form-group">
                          <input name="bankAccNo" type="text" id="bankAccNo" size="30"
                                 value="<?php echo $distDB->getBankAccNo() ?>"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="bankHolderName">
                          <?php echo __("Bank Account Holder Name")?>
                        </label>

                        <div class="controls form-group">
                          <input name="bankHolderName" type="text" id="bankHolderName" size="30"
                                 value="<?php echo $distDB->getBankHolderName() ?>"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-actions">
                  <button type="button" id="btnBankUpdate" class="btn btn-info">
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
            <th colspan="4"><?php echo __("Bank Account Proof")?></th>
          </tr>
          <tr>
            <td class="tablebg">
              <i class="icon-cogs"></i>
              <?php echo __("Upload Bank Account Proof, Proof of Residence and Passport/Photo ID"); ?>
              <small></small>
              <br/><br/>

              <form id="uploadForm" name="uploadForm"
                    action="/member/doUploadFile" enctype="multipart/form-data"
                    method="post">

                <fieldset>
                  <div class="form-group">
                    <label><?php echo __('Bank Account Proof') ?></label>
                    <?php echo input_file_tag('bankPassBook', array("id" => "bankPassBook", "name" => "bankPassBook")); ?>
                    <?php
                    if ($distDB->getFileBankPassBook() != "") {
                    ?>
                    <a href="<?php echo url_for("/download/bankPassBook?q=" . rand()) ?>">
                      <img src="/images/common/fileopen.png" alt="view file">
                    </a>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label><?php echo __('Proof of Residence') ?></label>
                    <?php echo input_file_tag('proofOfResidence', array("id" => "proofOfResidence", "name" => "proofOfResidence")); ?>
                    <?php
                    if ($distDB->getFileProofOfResidence() != "") {
                    ?>
                    <a href="<?php echo url_for("/download/proofOfResidence?q=" . rand()) ?>">
                      <img src="/images/common/fileopen.png" alt="view file">
                    </a>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label><?php echo __('Passport/Photo ID') ?></label>
                    <?php echo input_file_tag('nric', array("id" => "nric", "name" => "nric")); ?>
                    <?php
                    if ($distDB->getFileNric() != "") {
                    ?>
                    <a href="<?php echo url_for("/download/nric?q=" . rand()) ?>">
                      <img src="/images/common/fileopen.png" alt="view file">
                    </a>
                    <?php
                    }
                    ?>
                  </div>

                  <div class="form-actions" style="padding-left: 180px;">
                    <button type="button" id="btnUpload" class="btn btn-info">
                      <i class="icon-upload-alt bigger-110"></i>
                      <?php echo __("Upload");?>
                    </button>
                    <a href="/member/summary" class="btn btn-default"><?php echo __("Cancel");?></a>
                  </div>
                </fieldset>
              </form>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
