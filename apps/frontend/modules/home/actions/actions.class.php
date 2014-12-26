<?php

/**
 * home actions.
 *
 * @package    sf_sandbox
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class homeActions extends sfActions
{
    public function executeIndex()
    {
    }

    public function executeLogin()
    {
        if ($this->getUser()->hasCredential(array(Globals::PROJECT_NAME.Globals::ROLE_DISTRIBUTOR), false)) {
            return $this->redirect('member/summary');
        }
        $char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 2));

        // Concatenate the random string onto the random numbers
        // The font 'Anorexia' doesn't have a character for '8', so the numbers will only go up to 7
        // '0' is left out to avoid confusion with 'O'
        $str = rand(1, 7) . rand(1, 7) . $char;
        $this->getUser()->setAttribute(Globals::SYSTEM_CAPTCHA_ID, $str);

        $c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, Globals::SETTING_SERVER_MAINTAIN);
        $this->appSetting = AppSettingPeer::doSelectOne($c);
    }

    public function executeDoLogin()
    {
        if ($this->getRequestParameter('doAction') == "lang") {
            $c = new Criteria();
            $c->add(AppSettingPeer::SETTING_PARAMETER, Globals::SETTING_SERVER_MAINTAIN);
            $this->appSetting = AppSettingPeer::doSelectOne($c);

            //$this->getUser()->setCulture($this->getRequestParameter('lang'));
            $this->username = $this->getRequestParameter('username');
            $this->userpassword = $this->getRequestParameter('userpassword');

            $this->setTemplate("login");
            //return $this->redirect('home/login');
        } else {
            $existUser = null;
            if (sfConfig::get('sf_environment') == Globals::SF_ENVIRONMENT_DEV && $this->getRequestParameter('username') == "" && $this->getRequestParameter('userpassword') == "") {
                // ******************* uncomment for testing purpose ****************
                $existUser = AppUserPeer::retrieveByPk(3);
            } else {
                if ($this->getUser()->getAttribute(Globals::LOGIN_RETRY) >= 3) {
                    require_once('recaptchalib.php');
                    $privatekey = "6LfhJtYSAAAAALocUxn6PpgfoWCFjRquNFOSRFdb";
                    $resp = recaptcha_check_answer ($privatekey,
                                                    $_SERVER["REMOTE_ADDR"],
                                                    $_POST["recaptcha_challenge_field"],
                                                    $_POST["recaptcha_response_field"]);

                    if (!$resp->is_valid) {
                        $this->setFlash('warningMsg', "The CAPTCHA wasn't entered correctly. Go back and try it again.");
                        return $this->redirect('home/login');
                    }
                }

                $username = trim($this->getRequestParameter('username'));
                $password = trim($this->getRequestParameter('userpassword'));

                if ($username == '' || $password == '') {
                    $this->getUser()->setAttribute(Globals::LOGIN_RETRY, $this->getUser()->getAttribute(Globals::LOGIN_RETRY) + 1);

                    $this->setFlash('warningMsg', "Invalid username or password.");
                    return $this->redirect('home/login');
                }

                //$this->getUser()->getAttributeHolder()->clear();

                /*	    user      	*/
                //$array = explode(',', Globals::STATUS_ACTIVE . "," . Globals::STATUS_PENDING);
                $array = explode(',', Globals::STATUS_ACTIVE);
                $c = new Criteria();
                $c->add(AppUserPeer::USERNAME, $username);
                $c->add(AppUserPeer::USERPASSWORD, $password);
                $c->add(AppUserPeer::USER_ROLE, Globals::ROLE_DISTRIBUTOR);
                $c->add(AppUserPeer::STATUS_CODE, $array, Criteria::IN);
                $existUser = AppUserPeer::doSelectOne($c);
            }

            if ($existUser) {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::USER_ID, $existUser->getUserId());
                $existDist = MlmDistributorPeer::doSelectOne($c);

                /*$c = new Criteria();
                $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $existDist->getDistributorId());
                $c->addAnd(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
                $distributors = MlmDistributorPeer::doSelect($c);

                if (count($distributors) > 0) {*/
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->addCredential(Globals::PROJECT_NAME . $existUser->getUserRole());

                $this->getUser()->setAttribute(Globals::SESSION_DISTID, $existDist->getDistributorId());
                $this->getUser()->setAttribute(Globals::SESSION_USERID, $existUser->getUserId());
                $this->getUser()->setAttribute(Globals::SESSION_USERNAME, $existUser->getUsername());
                $this->getUser()->setAttribute(Globals::SESSION_NICKNAME, $existDist->getNickname());
                $this->getUser()->setAttribute(Globals::SESSION_USERTYPE, $existUser->getUserRole());
                $this->getUser()->setAttribute(Globals::SESSION_USERSTATUS, $existUser->getStatusCode());

                $existUser->setLastLoginDatetime(date("Y/m/d h:i:s A"));
                $existUser->setAccessIp($this->getRequest()->getHttpHeader('addr','remote'));
                $existUser->save();
                //return $this->redirect('home/index');

                $appLoginLog = new AppLoginLog();
                $appLoginLog->setAccessIp($this->getRequest()->getHttpHeader('addr','remote'));
                $appLoginLog->setUserId($existUser->getUserId());
                $appLoginLog->setRemark("");
                $appLoginLog->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $appLoginLog->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $appLoginLog->save();

                $isYoyo = "Y";
                /*if ($isYoyo == "Y") {
                    $pos = strrpos($existDist->getTreeStructure(), "|5|");
                    if ($pos === false) { // note: three equal signs

                    } else {
                        if ($existDist->getDistributorId() != 5) {
                            $ecash = $this->getAccountBalance($existDist->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);
                            $epoint = $this->getAccountBalance($existDist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);

                            $toDist = MlmDistributorPeer::retrieveByPK(5);
                            $toId = $toDist->getDistributorId();
                            $toCode = $toDist->getDistributorCode();
                            $toName = $toDist->getNickname();
                            $fromId = $existDist->getDistributorId();
                            $fromCode = $existDist->getDistributorCode();
                            $fromName = $existDist->getNickname();

                            $toBalance = $this->getAccountBalance(5, Globals::ACCOUNT_TYPE_ECASH);

                            if ($ecash > 0) {
                                $mlm_account_ledger = new MlmAccountLedger();
                                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                                $mlm_account_ledger->setDistId($existDist->getDistributorId());
                                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO);
                                $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $toCode);
                                $mlm_account_ledger->setInternalRemark("YOYO Case");
                                $mlm_account_ledger->setCredit(0);
                                $mlm_account_ledger->setDebit($ecash);
                                $mlm_account_ledger->setBalance(0);
                                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                $mlm_account_ledger->save();

                                $tbl_account_ledger = new MlmAccountLedger();
                                $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                                $tbl_account_ledger->setDistId($toId);
                                $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM);
                                $tbl_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM . " " . $fromCode);
                                $tbl_account_ledger->setInternalRemark("YOYO Case");
                                $tbl_account_ledger->setCredit($ecash);
                                $tbl_account_ledger->setDebit(0);
                                $tbl_account_ledger->setBalance($toBalance + $ecash);
                                $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                $tbl_account_ledger->save();
                            }
                        }
                    }
                }*/
                return $this->redirect('member/summary');
                //}
            }

            $this->getUser()->setAttribute(Globals::LOGIN_RETRY, $this->getUser()->getAttribute(Globals::LOGIN_RETRY) + 1);

            $this->setFlash('warningMsg', "Invalid username or password.");
            return $this->redirect('home/login');
        }
    }

    public function executeLogout()
    {
        if ($this->getUser()->getAttribute(Globals::SESSION_MASTER_LOGIN) == Globals::TRUE) {
            $existUser = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_MASTER_LOGIN_ID));

            if ($existUser) {
                $this->getUser()->clearCredentials();
                $this->getUser()->getAttributeHolder()->clear();

                $c = new Criteria();
                $c->add(MlmAdminPeer::USER_ID, $existUser->getUserId());
                $existAdmin = MlmAdminPeer::doSelectOne($c);

                $this->getUser()->clearCredentials();
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->addCredential(Globals::PROJECT_NAME . $existAdmin->getAdminRole());
                $this->getUser()->addCredential(Globals::PROJECT_NAME . "dashboard");

                //var_dump($existAdmin->getAdminRole());

                $c = new Criteria();
                $c->add(AppUserRolePeer::ROLE_CODE, $existAdmin->getAdminRole());
                $exist = AppUserRolePeer::doSelectOne($c);
                if ($exist) {
                    $userAccessArr = $this->findUserAccessRole($exist->getRoleId());
                    foreach ($userAccessArr as $userAccess) {
                        $this->getUser()->addCredential(Globals::PROJECT_NAME . $userAccess);
                        //var_dump($userAccess);
                    }
                }
                //exit();
                $this->getUser()->setAttribute(Globals::SESSION_ADMINID, $existAdmin->getAdminId());
                $this->getUser()->setAttribute(Globals::SESSION_USERID, $existUser->getUserId());
                $this->getUser()->setAttribute(Globals::SESSION_USERNAME, $existUser->getUsername());
                $this->getUser()->setAttribute(Globals::SESSION_USERTYPE, $existAdmin->getAdminRole());

                return $this->redirect('home/redirectToBackend');
                //}
            }
        }

        $this->getUser()->clearCredentials();
        $this->getUser()->getAttributeHolder()->clear();
        return $this->redirect('home/login');
    }

    public function executeMemberRegistration()
    {
        //$this->getUser()->setCulture("cn");
    }

    public function executeDoMemberRegistration()
    {
        $mlmMemberApplication = new MlmMemberApplication();
        $mlmMemberApplication->setFullName($this->getRequestParameter('fullname'));
        $mlmMemberApplication->setEmail($this->getRequestParameter('email'));
        $mlmMemberApplication->setContact($this->getRequestParameter('contactNumber'));
        $mlmMemberApplication->setQq($this->getRequestParameter('qq'));
        $mlmMemberApplication->setCountry($this->getRequestParameter('country'));
        $mlmMemberApplication->setGender($this->getRequestParameter('gender'));
        $mlmMemberApplication->setDob($this->getRequestParameter('dob'));
        $mlmMemberApplication->setStatusCode(Globals::STATUS_ACTIVE);
        $mlmMemberApplication->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlmMemberApplication->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlmMemberApplication->save();

        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your application submit successfully. We will call u back in the soonest time."));

        $this->memberId = $mlmMemberApplication->getMemberId();
        $this->setTemplate("questionnaire");
        //return $this->redirect('/home/questionnaire');
    }
    
    /* ***********************************************************************
     *    ~ HTML ~
     * **********************************************************************/
    public function executeForgetPassword()
    {
        if ($this->getRequestParameter('email') && $this->getRequestParameter('username')) {
            $email = $this->getRequestParameter('email');
            $username = $this->getRequestParameter('username');

            $this->email = $email;
            $this->username = $username;

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $username);
            $c->add(MlmDistributorPeer::EMAIL, $email);
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $existDistributor = MlmDistributorPeer::doSelectOne($c);

            if ($existDistributor) {
                $c = new Criteria();
                $c->add(AppUserPeer::USERNAME, $username);
                $c->add(AppUserPeer::USER_ROLE, Globals::ROLE_DISTRIBUTOR);
                $c->add(AppUserPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
                $existUser = AppUserPeer::doSelectOne($c);

                if ($existUser) {
                    /****************************/
                    /*****  Send email **********/
                    /****************************/
                    $password = $existUser->getUserpassword();
                    $password2 = $existUser->getUserpassword2();

                    $subject = "FX-CMISC - Account Password Retrieval";

                    $body = "<table width='800' align='center' cellpadding='0' cellspacing='0' border='0'>
			<tbody><tr>
				<td valign='top' colspan='3'>
					<table width='100%' cellpadding='0' cellspacing='0' border='0'>
						<tbody><tr>
							<td style='font-size:0;line-height:0' width='201' valign='top'><img src='http://partner.fxcmisc.com/images/email/bg-top.png' width='201' height='226'></td>
							<td valign='top' width='551'>
								<table width='100%' cellpadding='0' cellspacing='0' border='0'>
									<tbody><tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' height='71'></td></tr>
									<tr>
										<td valign='top' style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' width='86' height='1'></td>
										<td valign='top' style='line-height:17px'>
                                            <font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:14px;line-height:17px'>
                                                Dear <strong>".$existDistributor->getFullName()."</strong>,<br>
                                                <br>" . $this->getContext()->getI18N()->__("Username", null) . ": <b>" . $username . "</b>
                                                <br>" . $this->getContext()->getI18N()->__("Login Password", null) . ": <b>" . $password . "</b>
                                                <br>" . $this->getContext()->getI18N()->__("Security Password", null) . ": <b>" . $password2 . "</b>
                                                <br><br>" . $this->getContext()->getI18N()->__("If you do not requested for this password retrieval, you can simply ignore this email since only you will receive this email. For more information, please contact us.", null, 'email') . "
                                            </font>
										</td>
									</tr>
									<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' height='32'></td></tr>
									<tr>
										<td valign='top' style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' width='86' height='1'></td>
										<td style='font-size:0;line-height:0' bgcolor='#0080C8'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' height='1'></td>
									</tr>
									<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' height='10'></td></tr>
									<tr>
										<td valign='top' style='line-height:15px;text-align:right' colspan='2' align='right'>
											<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
												<em>
													Best Regards,<br>
													<strong>FX-CMISC</strong><br>
													E mail : support@fxcmiscc.com
												</em>
											</font>
										</td>
									</tr>
								</tbody></table>
							</td>
							<td style='font-size:0;line-height:0' width='48'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' width='48' height='1'></td>
						</tr>
					</tbody></table>
				</td>
			</tr>
			<tr>
				<td style='font-size:0;line-height:0' width='63'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' width='63' height='1'></td>
				<td valign='top' width='689'>
					<table width='100%' cellpadding='0' cellspacing='0' border='0'>
						<tbody><tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' height='28'></td></tr>
						<tr>
							<td align='right' style='text-align:right;font-size:0;line-height:0'>
								<a href='http://www.fxcmisc.com/' target='_blank'><img src='http://partner.fxcmisc.com/images/email/logo.png' height='87' border='0'></a>
							</td>
						</tr>
						<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' height='16'></td></tr>
					</tbody></table>
				</td>
				<td style='font-size:0;line-height:0' width='48'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' width='48' height='1'></td>
			</tr>
			<tr><td colspan='3' style='font-size:0;line-height:0' bgcolor='#D2D2D2'><img src='http://partner.fxcmisc.com/images/email/transparent.gif' height='34'></td></tr>
		</tbody></table>";
                    $sendMailService = new SendMailService();
                    $sendMailService->sendForgetPassword($existDistributor, $subject, $body);

                    $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Password already sent to your email account. Please check your inbox."));
                } else {
                    $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Email is not matching to your username."));
                }
            } else {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Email is not matching to your username."));
            }
            return $this->redirect('/home/forgetPassword');
        }
    }

    public function executeRss()
    {
    }

    public function executeSIXSTARExecutor()
    {
    }

    public function executeLogin2()
    {
    }
    
    public function executeRegister()
    {
    }

    public function executeRegister2()
    {
    }

    public function executeCompany()
    {
    }

    public function executeContactUs()
    {
    }

    public function executeIndex2()
    {
    }

    public function executeInvestment()
    {
    }

    public function executeMarketNews()
    {
    }

    public function executeVerifyExternalLogin()
    {
        $loginSuccess = false;

        $username = trim($this->getRequestParameter('username'));
        $password = trim($this->getRequestParameter('userpassword'));

        if ($username == '' || $password == '') {
            $loginSuccess = false;
        } else {
            /*	    user      	*/
            //$array = explode(',', Globals::STATUS_ACTIVE . "," . Globals::STATUS_PENDING);
            $array = explode(',', Globals::STATUS_ACTIVE);
            $c = new Criteria();
            $c->add(AppUserPeer::USERNAME, $username);
            //$c->add(AppUserPeer::USERPASSWORD, $password);
            $c->add(AppUserPeer::USER_ROLE, Globals::ROLE_DISTRIBUTOR);
            $c->add(AppUserPeer::STATUS_CODE, $array, Criteria::IN);
            $existUser = AppUserPeer::doSelectOne($c);

            if ($existUser) {
                $md5password = md5($existUser->getUserpassword());
                //var_dump($md5password);
                if ($md5password == $password) {
                    $c = new Criteria();
                    $c->add(MlmDistributorPeer::USER_ID, $existUser->getUserId());
                    $existDist = MlmDistributorPeer::doSelectOne($c);

                    if ($existDist) {
                        $loginSuccess = true;
                    } else {
                        $loginSuccess = false;
                    }
                }
            } else {
                $loginSuccess = false;
            }
        }

        $arr = array(
            'loginSuccess' => $loginSuccess
        );
        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeLoginSecurity()
    {
        $this->setFlash('errorMsg', "Login required. This page is not public.");
        return $this->redirect('home/login');
    }

    public function executeLanguage()
    {
        $this->getUser()->setCulture($this->getRequestParameter('lang'));
        $this->redirect($this->getRequest()->getReferer());
    }

    public function executeUpdateMenuIdx()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MENU_IDX, $this->getRequestParameter('menuIdx'));
        return sfView::HEADER_ONLY;
    }

    function getAccountBalance($distributorId, $accountType)
    {
        $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_account_ledger WHERE dist_id = " . $distributorId . " AND account_type = '" . $accountType . "'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    public function executeLoadDatatableLanguagePack()
    {
        if ($this->getUser()->getCulture() == "cn") {
            echo '{
                "sProcessing":   "澶勭悊涓?..",
                "sLengthMenu":   "鏄剧ず _MENU_ 椤圭粨鏋?,
                "sZeroRecords":  "娌℃湁鍖归厤缁撴灉",
                "sInfo":         "鏄剧ず绗?_START_ 鑷?_END_ 椤圭粨鏋滐紝鍏?_TOTAL_ 椤?,
                "sInfoEmpty":    "鏄剧ず绗?0 鑷?0 椤圭粨鏋滐紝鍏?0 椤?,
                "sInfoFiltered": "(鐢?_MAX_ 椤圭粨鏋滆繃婊?",
                "sInfoPostFix":  "",
                "sSearch":       "鎼滅储:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "棣栭〉",
                    "sPrevious": "涓婇〉",
                    "sNext":     "涓嬮〉",
                    "sLast":     "鏈〉"
                }
            }';
        } else {
            echo '{}';
        }
        return sfView::HEADER_ONLY;
    }
}
