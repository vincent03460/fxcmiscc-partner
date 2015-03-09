<?php

/**
 * admin actions.
 *
 * @package    sf_sandbox
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class adminActions extends sfActions
{
    public function executeRedirectToFrontend() {

    }
    public function executeMasterLogin()
    {
        $existDist = MlmDistributorPeer::retrieveByPk($this->getRequestParameter("distId"));
        $existUser = AppUserPeer::retrieveByPk($existDist->getUserId());

        if ($existUser) {
            $masterUserId = $this->getUser()->getAttribute(Globals::SESSION_USERID);

            $this->getUser()->clearCredentials();
            $this->getUser()->getAttributeHolder()->clear();

            $this->getUser()->setAuthenticated(true);
            $this->getUser()->addCredential(Globals::PROJECT_NAME . $existUser->getUserRole());

            $this->getUser()->setAttribute(Globals::SESSION_MASTER_LOGIN_ID, $masterUserId);
            $this->getUser()->setAttribute(Globals::SESSION_MASTER_LOGIN, Globals::TRUE);

            $this->getUser()->setAttribute(Globals::SESSION_DISTID, $existDist->getDistributorId());
            $this->getUser()->setAttribute(Globals::SESSION_USERID, $existUser->getUserId());
            $this->getUser()->setAttribute(Globals::SESSION_USERNAME, $existUser->getUsername());
            $this->getUser()->setAttribute(Globals::SESSION_NICKNAME, $existDist->getNickname());
            $this->getUser()->setAttribute(Globals::SESSION_USERTYPE, $existUser->getUserRole());
            $this->getUser()->setAttribute(Globals::SESSION_USERSTATUS, $existUser->getStatusCode());

            $appLoginLog = new AppLoginLog();
            $appLoginLog->setAccessIp($this->getRequest()->getHttpHeader('addr','remote'));
            $appLoginLog->setUserId($existUser->getUserId());
            $appLoginLog->setRemark("Master User Id:".$masterUserId);
            $appLoginLog->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $appLoginLog->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $appLoginLog->save();

            return $this->redirect('admin/redirectToFrontend');
        }

        $this->setFlash('errorMsg', "Invalid action.");
        return $this->redirect('marketing/distList');
    }
    public function executeBonusList()
    {
        $dateUtil = new DateUtil();

        $dateFrom = $this->getRequestParameter("txtDateFrom", date('Y-m-d'));
        $queryDateForGrb = $dateUtil->formatDate("Y-m-d", $dateUtil->addDate($dateFrom, 1, 0, 0));

        $bonusService = new BonusService();

        $this->packageArrs = $bonusService->doCalculatePackage($dateFrom);
        $this->totalDrb = $bonusService->doCalculateDrb($dateFrom);
        $this->totalGrb = $bonusService->doCalculateGrb($queryDateForGrb);
        $this->totalGenerationBonus = $bonusService->doCalculateGenerationBonus($dateFrom);
        $this->pipsRebate = $bonusService->doCalculatePipsRebateBonus($dateFrom);
        $this->fundManagementBonus = $bonusService->doCalculateFundManagementBonus($dateFrom);
        $this->specialBonus = $bonusService->doCalculateSpecialBonus($dateFrom);

        $this->dateFrom = $dateFrom;
    }

    /** ******************************************************
     * Package
     *******************************************************/
    public function executePackageList()
    {
        $this->mlm_packages = MlmPackagePeer::doSelect(new Criteria());
    }

    public function executePackageCreate()
    {
        $this->mlm_package = new MlmPackage();

        $this->setTemplate('packageEdit');
    }

    public function executePackageEdit()
    {
        $this->mlm_package = MlmPackagePeer::retrieveByPk($this->getRequestParameter('package_id'));
        $this->forward404Unless($this->mlm_package);
    }

    public function executePackageUpdate()
    {
        if (!$this->getRequestParameter('package_id')) {
            $mlm_package = new MlmPackage();
        }
        else
        {
            $mlm_package = MlmPackagePeer::retrieveByPk($this->getRequestParameter('package_id'));
            $this->forward404Unless($mlm_package);
        }

        $mlm_package->setPackageId($this->getRequestParameter('package_id'));
        $mlm_package->setPackageName($this->getRequestParameter('package_name'));
        $mlm_package->setPrice($this->getRequestParameter('price'));
        $mlm_package->setCommission($this->getRequestParameter('commission'));
        $mlm_package->setCreditRefund($this->getRequestParameter('credit_refund'));
        $mlm_package->setPairingBonus($this->getRequestParameter('pairing_bonus'));
        $mlm_package->setDailyMaxPairing($this->getRequestParameter('daily_max_pairing'));
        $mlm_package->setPublicPurchase($this->getRequestParameter('public_purchase'));
        $mlm_package->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
        $mlm_package->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
        $mlm_package->save();

        $this->setFlash('successMsg', "Update successfully");
        return $this->redirect('admin/packageEdit?package_id=' . $mlm_package->getPackageId());
    }

    /** ******************************************************
     * Executes index action
     *******************************************************/
    public function executeIndex()
    {
    }

    public function executeDashboard()
    {
        $companyEpoint = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);
        $totalActiveMember = $this->getTotalMember(Globals::STATUS_ACTIVE, null);
        $totalPendingMember = $this->getTotalMember(Globals::STATUS_PENDING, null);
        $reloadMt4Fund = $this->getTotalReloadMt4Fund(Globals::STATUS_PENDING);
        $mt4Withdrawal = $this->getTotalMt4Withdrawal(Globals::STATUS_PENDING);
        $referralBonus = $this->getTotalRefferalBonus(Globals::STATUS_PENDING);
        $ecashWithdrawal = $this->getTotalEcashWithdrawal(Globals::STATUS_PENDING);
        $customerEnquiry = $this->getTotalCustomerEnquiry();
        //$demoAccountRequest = $this->getDemoAccountRequest();
        //$liveAccountRequest = $this->getLiveAccountRequest();
        //$debitCardApplication = $this->getDebitCardApplication();
        //$ezyCashCardApplication = $this->getEzyCashCardApplication();

        /*$c = new Criteria();
        $packages = MlmPackagePeer::doSelect($c);
        $packageArray = array();
        $count = 0;
        foreach ($packages as $package) {
            $packageArray[$count]["package"] = $package;
            $packageArray[$count]["total"] = $this->getTotalMember(null, $package->getPackageId());
            $count++;
        }*/

        $this->companyEpoint = $companyEpoint;
        $this->totalActiveMember = $totalActiveMember;
        $this->totalPendingMember = $totalPendingMember;
        //$this->packageArray = $packageArray;
        $this->reloadMt4Fund = $reloadMt4Fund;
        $this->mt4Withdrawal = $mt4Withdrawal;
        $this->referralBonus = $referralBonus;
        $this->ecashWithdrawal = $ecashWithdrawal;
        $this->customerEnquiry = $customerEnquiry;
        //$this->demoAccountRequest = $demoAccountRequest;
        //$this->liveAccountRequest = $liveAccountRequest;
        //$this->debitCardApplication = $debitCardApplication;
        //$this->ezyCashCardApplication = $ezyCashCardApplication;
    }

    public function executeUserList()
    {
    }

    public function executeAp()
    {
        $apService = new ApService();
        $apService->constructAp();

        echo "SUCCESS";
        return sfView::HEADER_ONLY;
    }

    public function executeDoSaveUser()
    {
        $userId = $this->getRequestParameter('userId');
        $userName = $this->getRequestParameter('userName');
        $userPassword = $this->getRequestParameter('userPassword');
        $status = $this->getRequestParameter('status');
        $role = $this->getRequestParameter('role');

        $c = new Criteria();
        $c->add(AppUserPeer::USERNAME, $userName);
        if (isset($userId) && trim($userId) != '') {
            $c->add(AppUserPeer::USER_ID, $userId, Criteria::NOT_EQUAL);
        }

        $exist = AppUserPeer::doSelectOne($c);
        if ($exist) {
            $output = array(
                "error" => true,
                "errorMsg" => "Username already exist."
            );
            echo json_encode($output);
            return sfView::HEADER_ONLY;
        }

        if (isset($userId) && trim($userId) != '') {
            $tbl_user = AppUserPeer::retrieveByPk($userId);
            if (!isset($tbl_user)) {
                $output = array(
                    "error" => true,
                    "errorMsg" => "Serious Problem happen in server."
                );
                echo json_encode($output);
                return sfView::HEADER_ONLY;
            }

            $c = new Criteria();
            $c->add(MlmAdminPeer::USER_ID, $userId);
            $tbl_admin = MlmAdminPeer::doSelectOne($c);
            if (!isset($tbl_user)) {
                $output = array(
                    "error" => true,
                    "errorMsg" => "Serious Problem happen in server."
                );
                echo json_encode($output);
                return sfView::HEADER_ONLY;
            }
        } else {
            $tbl_admin = new MlmAdmin();
            $tbl_user = new AppUser();

            $tbl_admin->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
            $tbl_admin->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

            $tbl_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
            $tbl_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
        }
        $tbl_user->setUsername($userName);
        $tbl_user->setKeepPassword($userPassword);
        $tbl_user->setUserpassword($userPassword);
        $tbl_user->setKeepPassword2($userPassword);
        $tbl_user->setUserpassword2($userPassword);
        $tbl_user->setUserRole(Globals::ROLE_ADMIN);
        $tbl_user->setStatusCode($status);
        $tbl_user->save();

        $userId = $tbl_user->getUserId();

        $tbl_admin->setAdminCode($userName);
        $tbl_admin->setUserId($userId);
        $tbl_admin->setStatusCode($status);
        $tbl_admin->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
        $tbl_admin->setAdminRole($role);
        $tbl_admin->save();

        $output = array(
            "error" => false
        );
        echo json_encode($output);
        return sfView::HEADER_ONLY;
    }

    public function executeChangePassword()
    {
        if ($this->getRequestParameter('oldPassword')) {
            $c = new Criteria();
            $c->add(AppUserPeer::USER_ID, $this->getUser()->getAttribute(Globals::SESSION_USERID));
            $exist = AppUserPeer::doSelectOne($c);

            if ($exist->getUserpassword() <> $this->getRequestParameter('oldPassword')) {
                $this->setFlash('errorMsg', "Invalid password");
            } else {
                $exist->setUserpassword($this->getRequestParameter('newPassword'));
                $exist->save();
                $this->setFlash('successMsg', "Password updated");
            }
        }
    }

    public function executeFetchRole()
    {
        $c = new Criteria();
        $c->add(AppUserRolePeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->addAscendingOrderByColumn(AppUserRolePeer::ROLE_CODE);
        $appUserRoles = AppUserRolePeer::doSelect($c);

        foreach ($appUserRoles as $appUserRole) {
            $arr[] = $appUserRole->getRoleCode();
        }
        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeUserRole()
    {
        $query = "SELECT userAccess.access_code, userAccess.menu_label, userAccess.parent_id
                    , userAccess.status_code, userAccess.tree_seq, userAccess.tree_level
                FROM app_user_access userAccess
                     WHERE userAccess.status_code = 'ACTIVE' ORDER BY userAccess.tree_seq";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $rs = $statement->executeQuery();

        $idx = 0;
        $resultArr = array();
        while ($rs->next()) {
            $arr = $rs->getRow();
            $resultArr[$idx] = $arr;
            $idx++;
        }
        $this->resultArr = $resultArr;
    }

    public function executeFetchUserAccessRole()
    {
        $roleId = $this->getRequestParameter('roleId');
        if (!isset($roleId))
            $roleId = 0;

        $userAccessArr = $this->findUserAccessRole($roleId);

        echo json_encode($userAccessArr);

        return sfView::HEADER_ONLY;
    }

    public function executeDoSaveRole()
    {
        $roleId = $this->getRequestParameter('roleId');
        $roleCode = $this->getRequestParameter('roleCode');
        $roleDesc = $this->getRequestParameter('roleDesc');
        $status = $this->getRequestParameter('status');
        $roleCodeSelected = $this->getRequestParameter('roleCodeSelected');

        $roleCodeArr = explode("|||", $roleCodeSelected);

        $c = new Criteria();
        $c->add(AppUserRolePeer::ROLE_CODE, $roleCode);
        if (isset($roleId) && trim($roleId) != '') {
            $c->add(AppUserRolePeer::ROLE_ID, $roleId, Criteria::NOT_EQUAL);
        }

        $exist = AppUserRolePeer::doSelectOne($c);
        if ($exist) {
            $output = array(
                "error" => true,
                "errorMsg" => "Role Code already exist."
            );
            echo json_encode($output);
            return sfView::HEADER_ONLY;
        }

        if (isset($roleId) && trim($roleId) != '') {
            $appUserRole = AppUserRolePeer::retrieveByPk($roleId);
            if (!isset($appUserRole)) {
                $output = array(
                    "error" => true,
                    "errorMsg" => "Serious Problem happen in server."
                );
                echo json_encode($output);
                return sfView::HEADER_ONLY;
            }

            $c = new Criteria();
            $c->add(AppUserRolePeer::ROLE_ID, $roleId);
            $appUserRole = AppUserRolePeer::doSelectOne($c);
            if (!isset($appUserRole)) {
                $output = array(
                    "error" => true,
                    "errorMsg" => "Serious Problem happen in server."
                );
                echo json_encode($output);
                return sfView::HEADER_ONLY;
            }
        } else {
            $appUserRole = new AppUserRole();
            $appUserRole->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
        }

        $appUserRole->setRoleCode($roleCode);
        $appUserRole->setRoleDesc($roleDesc);
        $appUserRole->setStatusCode($status);

        $appUserRole->save();

        if (isset($roleId) && trim($roleId) != '') {
            $query = "DELETE FROM app_user_role_access WHERE role_id =" . $roleId;
            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $statement->executeQuery();
        }
        foreach ($roleCodeArr as $accessCode) {
            $app_user_role_access = new AppUserRoleAccess();
            $app_user_role_access->setAccessCode($accessCode);
            $app_user_role_access->setRoleId($roleId);
            $app_user_role_access->save();
        }

        $output = array(
            "error" => false
        );
        echo json_encode($output);
        return sfView::HEADER_ONLY;
    }

    public function executeLogin()
    {
    }

    public function executeDoLogin()
    {
        $existUser = null;
        if (sfConfig::get('sf_environment') == Globals::SF_ENVIRONMENT_DEV && $this->getRequestParameter('modlgn_username') == "" && $this->getRequestParameter('modlgn_passwd') == "") {
            // ******************* uncomment for testing purpose ****************
            $existUser = AppUserPeer::retrieveByPk(1);
        } else {
            if ($this->getUser()->getAttribute(Globals::LOGIN_RETRY) >= 3) {
                require_once('recaptchalib.php');
                $privatekey = "6LfhJtYSAAAAALocUxn6PpgfoWCFjRquNFOSRFdb";
                $resp = recaptcha_check_answer ($privatekey,
                                                $_SERVER["REMOTE_ADDR"],
                                                $_POST["recaptcha_challenge_field"],
                                                $_POST["recaptcha_response_field"]);

                if (!$resp->is_valid) {
                    $this->setFlash('errorMsg', "The CAPTCHA wasn't entered correctly. Go back and try it again.");
                    return $this->redirect('admin/login');
                }
            }

            $username = trim($this->getRequestParameter('modlgn_username'));
            $password = trim($this->getRequestParameter('modlgn_passwd'));

            if ($username == '' || $password == '') {
                $this->getUser()->setAttribute(Globals::LOGIN_RETRY, $this->getUser()->getAttribute(Globals::LOGIN_RETRY) + 1);

                $this->setFlash('errorMsg', "Invalid username or password.");
                return $this->redirect('admin/login');
            }

            //$this->getUser()->getAttributeHolder()->clear();

            /*	    user      	*/
            $c = new Criteria();
            $c->add(AppUserPeer::USERNAME, $username);
            $c->add(AppUserPeer::USERPASSWORD, $password);
            $c->add(AppUserPeer::USER_ROLE, Globals::ROLE_ADMIN);
            $c->add(AppUserPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $existUser = AppUserPeer::doSelectOne($c);
        }

        if ($existUser) {
            $this->getUser()->getAttributeHolder()->clear();

            $c = new Criteria();
            $c->add(MlmAdminPeer::USER_ID, $existUser->getUserId());
            $existAdmin = MlmAdminPeer::doSelectOne($c);

            $this->getUser()->clearCredentials();
            $this->getUser()->setAuthenticated(true);
            $this->getUser()->addCredential(Globals::PROJECT_NAME . $existAdmin->getAdminRole());
            $this->getUser()->addCredential(Globals::PROJECT_NAME . "dashboard");

            $c = new Criteria();
            $c->add(AppUserRolePeer::ROLE_CODE, $existAdmin->getAdminRole());
            $exist = AppUserRolePeer::doSelectOne($c);
            if ($exist) {
                $userAccessArr = $this->findUserAccessRole($exist->getRoleId());
                foreach ($userAccessArr as $userAccess) {
                    $this->getUser()->addCredential(Globals::PROJECT_NAME . $userAccess);
                }
            }

            $this->getUser()->setAttribute(Globals::SESSION_ADMINID, $existAdmin->getAdminId());
            $this->getUser()->setAttribute(Globals::SESSION_USERID, $existUser->getUserId());
            $this->getUser()->setAttribute(Globals::SESSION_USERNAME, $existUser->getUsername());
            $this->getUser()->setAttribute(Globals::SESSION_USERTYPE, $existAdmin->getAdminRole());

            return $this->redirect('admin/dashboard');
        }

        $this->getUser()->setAttribute(Globals::LOGIN_RETRY, $this->getUser()->getAttribute(Globals::LOGIN_RETRY) + 1);

        $this->setFlash('errorMsg', "Invalid username or password.");
        return $this->redirect('admin/login');
    }

    public function executeLoginSecurity()
    {
        $this->setFlash('errorMsg', "Login required. This page is not public.");
        return $this->redirect('admin/login');
    }

    public function executeLogout()
    {
        $this->getUser()->clearCredentials();
        $this->getUser()->getAttributeHolder()->clear();
        return $this->redirect('admin/login');
    }

    public function executeUpdateMenuIdx()
    {
        $this->getUser()->setAttribute(Globals::SESSION_ADMIN_MENU_IDX, $this->getRequestParameter('menuIdx'));
        return sfView::HEADER_ONLY;
    }

    /* ***********************************************
   *      Application Setting
   * ************************************************/
    public function executeApplicationSetting()
    {
        $this->app_settings = AppSettingPeer::doSelect(new Criteria());
    }

    public function executeApplicationSettingUpdate()
    {
        $app_settings = AppSettingPeer::doSelect(new Criteria());
        foreach ($app_settings as $app_setting):
            $app_setting->setSettingValue($this->getRequestParameter($app_setting->getSettingParameter()));
            $app_setting->save();
        endforeach;

        $fundManagementPercentage = $this->getRequestParameter("fundManagementPercentage");
        $mlm_fund_management = new MlmFundManagementRecord();
        $mlm_fund_management->setPercentage($fundManagementPercentage);
        $mlm_fund_management->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_fund_management->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_fund_management->save();

        $this->setFlash('successMsg', "Update successfully");

        return $this->redirect('admin/applicationSetting');
    }

    // #####################################
    function findUserAccessRole($roleId)
    {
        $query = "SELECT userAccess.access_code, userAccess.menu_label, userAccess.parent_id
                    , userAccess.status_code, userAccess.tree_seq, userAccess.tree_level
                    , roleAccess.role_access_id
                FROM app_user_access userAccess
                        INNER JOIN app_user_role_access roleAccess ON userAccess.access_code = roleAccess.access_code AND roleAccess.role_id = " . $roleId .
                 " WHERE userAccess.status_code = 'active' ORDER BY userAccess.tree_seq";
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $rs = $statement->executeQuery();

        while ($rs->next()) {
            $arr = $rs->getRow();
            $userAccessArr[] = $arr['access_code'];
        }

        return $userAccessArr;
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

    function getTotalMember($statusCode, $rankId)
    {
        $c = new Criteria();
        if ($statusCode != null) {
            $c->add(MlmDistributorPeer::STATUS_CODE, $statusCode);
        }
        if ($rankId != null) {
            $c->add(MlmDistributorPeer::RANK_ID, $rankId);
        }
        $totalNetworks = MlmDistributorPeer::doCount($c);

        return $totalNetworks;
    }

    function getTotalReloadMt4Fund($statusCode)
    {
        $c = new Criteria();
        if ($statusCode != null) {
            $c->add(MlmMt4ReloadFundPeer::STATUS_CODE, $statusCode);
        }
        $totalNetworks = MlmMt4ReloadFundPeer::doCount($c);

        return $totalNetworks;
    }

    function getTotalMt4Withdrawal($statusCode)
    {
        $c = new Criteria();
        if ($statusCode != null) {
            $c->add(MlmMt4WithdrawPeer::STATUS_CODE, $statusCode);
        }
        $totalNetworks = MlmMt4WithdrawPeer::doCount($c);

        return $totalNetworks;
    }

    function getTotalRefferalBonus($statusCode)
    {
        $c = new Criteria();
        if ($statusCode != null) {
            $c->add(MlmDistCommissionLedgerPeer::STATUS_CODE, $statusCode);
        }
        $totalNetworks = MlmDistCommissionLedgerPeer::doCount($c);

        return $totalNetworks;
    }
    function getTotalEcashWithdrawal($statusCode)
    {
        $c = new Criteria();
        if ($statusCode != null) {
            $c->add(MlmEcashWithdrawPeer::STATUS_CODE, $statusCode);
        }
        $totalNetworks = MlmEcashWithdrawPeer::doCount($c);

        return $totalNetworks;
    }
    function getTotalCustomerEnquiry()
    {
        $c = new Criteria();
        $c->add(MlmCustomerEnquiryPeer::ADMIN_READ, Globals::FALSE);

        $totalNetworks = MlmCustomerEnquiryPeer::doCount($c);

        return $totalNetworks;
    }
    function getDemoAccountRequest()
    {
        $c = new Criteria();
        $c->add(MlmMt4DemoRequestPeer::LIVE_DEMO, "DEMO");
        $c->add(MlmMt4DemoRequestPeer::STATUS_CODE, Globals::STATUS_ACTIVE);

        $totalNetworks = MlmMt4DemoRequestPeer::doCount($c);

        return $totalNetworks;
    }
    function getLiveAccountRequest()
    {
        $c = new Criteria();
        $c->add(MlmMt4DemoRequestPeer::LIVE_DEMO, "LIVE");
        $c->add(MlmMt4DemoRequestPeer::STATUS_CODE, Globals::STATUS_ACTIVE);

        $totalNetworks = MlmMt4DemoRequestPeer::doCount($c);

        return $totalNetworks;
    }
    function getDebitCardApplication()
    {
        $c = new Criteria();
        $c->add(MlmDebitCardRegistrationPeer::STATUS_CODE, Globals::STATUS_PENDING);

        $totalNetworks = MlmDebitCardRegistrationPeer::doCount($c);

        return $totalNetworks;
    }
    function getEzyCashCardApplication()
    {
        $c = new Criteria();
        $c->add(MlmEzyCashCardPeer::STATUS_CODE, Globals::STATUS_PENDING);

        $totalNetworks = MlmEzyCashCardPeer::doCount($c);

        return $totalNetworks;
    }
}
