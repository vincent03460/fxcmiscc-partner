<?php

/**
 * finance actions.
 *
 * @package    sf_sandbox
 * @subpackage finance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class financeActions extends sfActions
{
    public function executeCp3WithdrawalListInDetail()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/xls');
        $response->setHttpHeader('Content-Type', 'application/force-download', TRUE);
        $response->setHttpHeader('Content-Type', 'application/octet-stream', TRUE);
        $response->setHttpHeader('Content-Type', 'application/download', TRUE);
        $response->setHttpHeader('Content-Type', 'charset=UTF-8', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=cp3_withdrawal_list.xls', TRUE);
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Encoding', 'UTF-8', TRUE);

        $response->sendHttpHeaders();

        $query = "SELECT tree_structure, accountLedger._ecash, withdraw.withdraw_id,withdraw.dist_id,dist.distributor_code,dist.full_name,rank.price,withdraw.deduct,withdraw.amount,accountLedger._ecash,withdraw.status_code,withdraw.created_on,dist.ic,dist.email,dist.contact,dist.bank_name,dist.bank_acc_no,dist.bank_holder_name,dist.bank_branch,dist.bank_address,dist.rank_code,withdraw.remarks,dist.file_bank_pass_book,dist.file_proof_of_residence,dist.file_nric,dist.distributor_id,dist.distributor_id  ,dist.tree_structure ,rank.package_name FROM mlm_ecash_withdraw withdraw
                LEFT JOIN mlm_distributor dist ON withdraw.dist_id = dist.distributor_id
                LEFT JOIN mlm_package rank ON rank.package_id = dist.mt4_rank_id
                LEFT JOIN
            (
            SELECT SUM(credit-debit) AS _ecash, dist_id
                FROM mlm_account_ledger accountLedger WHERE account_type = 'ECASH' GROUP BY dist_id

            ) accountLedger ON accountLedger.dist_id = withdraw.dist_id
                WHERE 1=1
          ";

        if ($this->getRequestParameter('statusCode') != "") {
            $query .= " AND withdraw.status_code = '" . $this->getRequestParameter('statusCode') . "'";
        }

        if ($this->getRequestParameter('filterUsername') != "") {
            $query .= " AND dist.distributor_code LIKE '%" . $this->getRequestParameter('filterUsername') . "%'";
        }

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $rs = $statement->executeQuery();

        $xlsRow = 1;

        include("PHPExcel.php");
        include('PHPExcel/Writer/Excel5.php');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();
        $row = '1';
        $col = "A";

        $sheet->setCellValue("A".$xlsRow, "ID");
        $sheet->setCellValue("B".$xlsRow, "Member ID");
        $sheet->setCellValue("C".$xlsRow, "Name");
        $sheet->setCellValue("D".$xlsRow, "Ranking");
        $sheet->setCellValue("E".$xlsRow, "Withdraw");
        $sheet->setCellValue("F".$xlsRow, "Withdraw after Deduction");
        $sheet->setCellValue("G".$xlsRow, "e-Cash in wallet");
        $sheet->setCellValue("H".$xlsRow, "Status");
        $sheet->setCellValue("I".$xlsRow, "Date");
        $sheet->setCellValue("J".$xlsRow, "IC");
        $sheet->setCellValue("K".$xlsRow, "Email");
        $sheet->setCellValue("L".$xlsRow, "Contact No");
        $sheet->setCellValue("M".$xlsRow, "Bank Name");
        $sheet->setCellValue("N".$xlsRow, "Bank Account No");
        $sheet->setCellValue("O".$xlsRow, "Bank Holder Name");
        $sheet->setCellValue("P".$xlsRow, "Bank Branch Name");
        $sheet->setCellValue("Q".$xlsRow, "Bank Address");
        $sheet->setCellValue("R".$xlsRow, "Remarks");

        $xlsRow = 2;
        while ($rs->next()) {
            $arr = $rs->getRow();
            $arrs[] = $arr;
            $columnIdx = 0;

            $sheet->setCellValue("A".$xlsRow, $arr['withdraw_id']);
            $sheet->setCellValue("B".$xlsRow, $arr['distributor_code']);
            $sheet->setCellValue("C".$xlsRow, $arr['full_name']);
            $sheet->setCellValue("D".$xlsRow, $arr['package_name']."(".number_format($arr['price']));
            $sheet->setCellValue("E".$xlsRow, $arr['deduct']);
            $sheet->setCellValue("F".$xlsRow, $arr['amount']);
            $sheet->setCellValue("G".$xlsRow, $arr['_ecash']);
            $sheet->setCellValue("H".$xlsRow, $arr['status_code']);
            $sheet->setCellValue("I".$xlsRow, $arr['created_on']);
            $sheet->setCellValue("J".$xlsRow, $arr['ic']);
            $sheet->setCellValue("K".$xlsRow, $arr['email']);
            $sheet->setCellValue("L".$xlsRow, $arr['contact']);
            $sheet->setCellValue("M".$xlsRow, $arr['bank_name']);
            $sheet->setCellValueExplicit("N".$xlsRow, $arr['bank_acc_no'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue("O".$xlsRow, $arr['bank_holder_name']);
            $sheet->setCellValue("P".$xlsRow, $arr['bank_branch']);
            $sheet->setCellValue("Q".$xlsRow, $arr['bank_address']);
            $sheet->setCellValue("R".$xlsRow, $arr['remarks']);

            //$sheet->setCellValue("A".$xlsRow, $arr['withdraw_id']);
            //$row += 1;
            //$col = "A";

            $xlsRow++;
        }

        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter->save('php://output');
        return sfView::HEADER_ONLY;
    }
    public function executeMt4Management()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(MlmDistributorPeer::DISTRIBUTOR_CODE);
        $this->dists = MlmDistributorPeer::doSelect($c);
    }
    public function executeEwalletManagement()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(MlmDistributorPeer::DISTRIBUTOR_CODE);
        $this->dists = MlmDistributorPeer::doSelect($c);
    }
    public function executeEpointManagement()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(MlmDistributorPeer::DISTRIBUTOR_CODE);
        $this->dists = MlmDistributorPeer::doSelect($c);
    }
    public function executeDoUpdateWallet()
    {
        $distId = $this->getRequestParameter('distId');
        $walletType = $this->getRequestParameter('walletType');
        $amount = $this->getRequestParameter('amount');
        $externalRemark = $this->getRequestParameter('externalRemark');
        $internalRemark = $this->getRequestParameter('internalRemark');
        $creditDebit = $this->getRequestParameter('creditDebit');

        $accountBalance = $this->getAccountBalance($distId, $walletType);

        if ($creditDebit == "CREDIT") {
            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($distId);
            $mlm_account_ledger->setAccountType($walletType);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_ADJUSTMENT);
            $mlm_account_ledger->setRemark($externalRemark);
            $mlm_account_ledger->setInternalRemark($internalRemark);
            $mlm_account_ledger->setCredit($amount);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($accountBalance + $amount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();
        } else {
            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($distId);
            $mlm_account_ledger->setAccountType($walletType);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_ADJUSTMENT);
            $mlm_account_ledger->setRemark($externalRemark);
            $mlm_account_ledger->setInternalRemark($internalRemark);
            $mlm_account_ledger->setCredit(0);
            $mlm_account_ledger->setDebit($amount);
            $mlm_account_ledger->setBalance($accountBalance - $amount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();
        }

        return sfView::HEADER_ONLY;
    }
    /* ****************************************
     *     Epoint Transfer
     * *****************************************/
    public function executeEpointTransfer()
    {
    }

    public function executeDoEpointTransfer()
    {
        $distId = $this->getRequestParameter('distId');
        $epointAmount = $this->getRequestParameter('epointAmount');
        $doAction = $this->getRequestParameter('doAction');
        $internalRemark = $this->getRequestParameter('internalRemark', '');
        $transactionType = $this->getRequestParameter('doTransactionType', '');
        $remark = $this->getRequestParameter('remark', Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM . " COMPANY");

        $existDist = MlmDistributorPeer::retrieveByPK($distId);
        if (!$existDist) {
            $output = array(
                "error" => true,
                "errorMsg" => "Invalid Member Id."
            );
            echo json_encode($output);
            return sfView::HEADER_ONLY;
        }

        $companyEPointBalance = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);
//        $distEPointBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_FXCMISCC);

        if ($companyEPointBalance < $epointAmount) {
            $output = array(
                "error" => true,
                "errorMsg" => "Insufficient e-Point."
            );
            echo json_encode($output);
            return sfView::HEADER_ONLY;
        }

        if ($doAction == Globals::ACCOUNT_TYPE_EPOINT) {
            $distEPointBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_EPOINT);

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO);
            $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $existDist->getDistributorCode() . " (" . $existDist->getFullName() . ")");
            $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $existDist->getDistributorCode() . " (" . $existDist->getFullName() . ")");
            $mlm_account_ledger->setCredit(0);
            $mlm_account_ledger->setDebit($epointAmount);
            $mlm_account_ledger->setBalance($companyEPointBalance - $epointAmount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($distId);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
            $mlm_account_ledger->setTransactionType($transactionType);
            $mlm_account_ledger->setRemark($remark);
            $mlm_account_ledger->setInternalRemark($internalRemark);
            $mlm_account_ledger->setCredit($epointAmount);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($distEPointBalance + $epointAmount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();
        } ELSE if ($doAction == Globals::ACCOUNT_TYPE_ECASH) {
            $distEPointBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_ECASH);

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($distId);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
            $mlm_account_ledger->setTransactionType($transactionType);
            $mlm_account_ledger->setRemark($remark);
            $mlm_account_ledger->setInternalRemark($internalRemark);
            $mlm_account_ledger->setCredit($epointAmount);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($distEPointBalance + $epointAmount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();
        } else if ($doAction == Globals::ACCOUNT_TYPE_FXCMISCC) {
            $distEPointBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_FXCMISCC);

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO);
            $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $existDist->getDistributorCode() . " (" . $existDist->getFullName() . ")");
            $mlm_account_ledger->setCredit(0);
            $mlm_account_ledger->setDebit($epointAmount);
            $mlm_account_ledger->setBalance($companyEPointBalance - $epointAmount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($distId);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_FXCMISCC);
            $mlm_account_ledger->setTransactionType($transactionType);
            $mlm_account_ledger->setRemark($remark);
            $mlm_account_ledger->setInternalRemark($internalRemark);
            $mlm_account_ledger->setCredit($epointAmount);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($distEPointBalance + $epointAmount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();
        } else if ($doAction == Globals::ACCOUNT_TYPE_PROMO) {
            $distEPointBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_PROMO);

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO);
            $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $existDist->getDistributorCode() . " (" . $existDist->getFullName() . ")");
            $mlm_account_ledger->setCredit(0);
            $mlm_account_ledger->setDebit($epointAmount);
            $mlm_account_ledger->setBalance($companyEPointBalance - $epointAmount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($distId);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_PROMO);
            $mlm_account_ledger->setTransactionType($transactionType);
            $mlm_account_ledger->setRemark($remark);
            $mlm_account_ledger->setInternalRemark($internalRemark);
            $mlm_account_ledger->setCredit($epointAmount);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($distEPointBalance + $epointAmount);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();
        }

        $output = array(
            "error" => false
        );
        echo json_encode($output);
        return sfView::HEADER_ONLY;
    }

    public function executeEnquiryCP()
    {
        $distId = $this->getRequestParameter('distId');

        $cp1 = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_EPOINT);
        $cp2 = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_ECASH);

        $arr = "";
        $arr = array(
            'cp1' => $cp1,
            'cp2' => $cp2
        );

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }
    /* ****************************************
   *     pipsBonus
   * *****************************************/
    public function executePipsBonusDetailByDist()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distId'));
        $this->forward404Unless($distDB);
        $joinDate = $distDB->getActiveDatetime();
        $joinMonth = date('m', strtotime($joinDate));
        $joinYear = date('Y', strtotime($joinDate));

        $currentMonth = date('m');
        $currentYear = date('Y');

        $anode = array();

        $idx = 0;

        $month = array();
        $month["1"] = "January";
        $month["2"] = "February";
        $month["3"] = "March";
        $month["4"] = "April";
        $month["5"] = "May";
        $month["6"] = "June";
        $month["7"] = "July";
        $month["8"] = "August";
        $month["9"] = "September";
        $month["10"] = "October";
        $month["11"] = "November";
        $month["12"] = "December";

        $longString = "";
        for ($i = intval($joinMonth); $i <= intval($currentMonth); $i++) {
            $longString = $longString . "<tr class='odd'>
                <td align='center'>" . $month[$i] . "</td>
                <td align='right'>" . number_format($this->getPipsBonusDetailByMonth($distDB->getDistributorId(), $i, date('Y'), null), 2) . "</td>
                </tr>";
        }
        echo json_encode($longString);
        return sfView::HEADER_ONLY;
    }

    public function executePipsBonusDetail()
    {
        $query = "SELECT pips_date FROM mlm_pips_rebate group by pips_date order by 1";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $arr = array();
        while ($resultset->next()) {
            $arr[] = $resultset->getRow();
        }
        $this->arr = $arr;
    }

    /* ****************************************
   *     Mt4Withdrawal
   * *****************************************/
    public function executeMt4WithdrawalEdit()
    {
        $mt4Withdraw = MlmMt4WithdrawPeer::retrieveByPk($this->getRequestParameter('upgradeId'));
        $this->forward404Unless($mt4Withdraw);

        $this->mt4Withdraw = $mt4Withdraw;
    }

    public function executeUpdateMt4Withdrawal()
    {
        $statusCode = $this->getRequestParameter('status_code');
        $remarks = $this->getRequestParameter('remarks');

        $con = Propel::getConnection(MlmMt4WithdrawPeer::DATABASE_NAME);
        try {
            $con->begin();

            $mt4Withdrawal = MlmMt4WithdrawPeer::retrieveByPk($this->getRequestParameter('withdraw_id'));
            $this->forward404Unless($mt4Withdrawal);

            if ($mt4Withdrawal->getStatusCode() == Globals::STATUS_PENDING) {
                // ******** once mt4 withdrawal has been approved at backend,
                //          the fund will be credited into ecash wallet **********
                if (Globals::STATUS_COMPLETE == $statusCode && $mt4Withdrawal->getStatusCode() == Globals::STATUS_PENDING) {
                    $maintenanceBalance = $this->getAccountBalance($mt4Withdrawal->getDistId(), Globals::ACCOUNT_TYPE_ECASH);
                    $mt4WithdrawalAmount = $mt4Withdrawal->getGrandAmount();
                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $tbl_account_ledger->setDistId($mt4Withdrawal->getDistId());
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_MT4_WITHDRAWAL);
                    $tbl_account_ledger->setRemark("Withdrawal Amount:" . $mt4Withdrawal->getAmountRequested(). ", Handling Fee:" . $mt4Withdrawal->getHandlingFee());
                    $tbl_account_ledger->setInternalRemark("Withdrawal Amount:" . $mt4Withdrawal->getAmountRequested(). ", Handling Fee:" . $mt4Withdrawal->getHandlingFee() . ", ID:" . $mt4Withdrawal->getWithdrawId());
                    $tbl_account_ledger->setCredit($mt4WithdrawalAmount);
                    $tbl_account_ledger->setDebit(0);
                    $tbl_account_ledger->setBalance($maintenanceBalance + $mt4WithdrawalAmount);
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();

                    //$this->revalidateAccount($mt4Withdrawal->getDistId(), Globals::ACCOUNT_TYPE_ECASH);

                    $mt4Withdrawal->setStatusCode(Globals::STATUS_COMPLETE);
                } else {
                    $mt4Withdrawal->setStatusCode(Globals::STATUS_REJECT);
                }
                $mt4Withdrawal->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mt4Withdrawal->setRemarks($remarks);
                if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                    $mt4Withdrawal->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                }
                $mt4Withdrawal->save();
            }

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
        return $this->redirect('finance/mt4Withdrawal');
    }

    public function executeMt4Withdrawal()
    {
        if ($this->getRequestParameter('upgradeStatus') && $this->getRequestParameter('upgradeId')) {
            $error = false;
            $arr = $this->getRequestParameter('upgradeId');
            $statusCode = $this->getRequestParameter('upgradeStatus');

            $con = Propel::getConnection(MlmMt4WithdrawPeer::DATABASE_NAME);
            try {
                $con->begin();

                for ($i = 0; $i < count($arr); $i++) {
                    $mt4Withdrawal = MlmMt4WithdrawPeer::retrieveByPk($arr[$i]);
                    $this->forward404Unless($mt4Withdrawal);

                    if ($mt4Withdrawal->getStatusCode() == Globals::STATUS_PENDING) {

                        if (Globals::STATUS_COMPLETE == $statusCode && $mt4Withdrawal->getStatusCode() == Globals::STATUS_PENDING) {
                            $maintenanceBalance = $this->getAccountBalance($mt4Withdrawal->getDistId(), Globals::ACCOUNT_TYPE_ECASH);
                            $mt4WithdrawalAmount = $mt4Withdrawal->getGrandAmount();
                            $tbl_account_ledger = new MlmAccountLedger();
                            $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                            $tbl_account_ledger->setDistId($mt4Withdrawal->getDistId());
                            $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_MT4_WITHDRAWAL);
                            $tbl_account_ledger->setRemark("Withdrawal Amount:" . $mt4Withdrawal->getAmountRequested(). ", Handling Fee:" . $mt4Withdrawal->getHandlingFee());
                            $tbl_account_ledger->setInternalRemark("Withdrawal Amount:" . $mt4Withdrawal->getAmountRequested(). ", Handling Fee:" . $mt4Withdrawal->getHandlingFee() . ", ID:" . $mt4Withdrawal->getWithdrawId());
                            $tbl_account_ledger->setCredit($mt4WithdrawalAmount);
                            $tbl_account_ledger->setDebit(0);
                            $tbl_account_ledger->setBalance($maintenanceBalance + $mt4WithdrawalAmount);
                            $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $tbl_account_ledger->save();

                            //$this->revalidateAccount($mt4Withdrawal->getDistId(), Globals::ACCOUNT_TYPE_ECASH);

                            $mt4Withdrawal->setStatusCode(Globals::STATUS_COMPLETE);
                        } else {
                            $mt4Withdrawal->setStatusCode(Globals::STATUS_REJECT);
                        }
                        $mt4Withdrawal->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
                        if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                            $mt4Withdrawal->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                        }
                        $mt4Withdrawal->save();
                    }
                }
                $con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }
            if ($error == false)
                $this->setFlash('successMsg', "Update successfully");
            return $this->redirect('finance/mt4Withdrawal');
        }
    }

    /* ****************************************
   *     ReloadMt4Fund
   * *****************************************/
    public function executeReloadMt4FundEdit()
    {
        $mt4ReloadFund = MlmMt4ReloadFundPeer::retrieveByPk($this->getRequestParameter('upgradeId'));
        $this->forward404Unless($mt4ReloadFund);

        $this->mt4ReloadFund = $mt4ReloadFund;
    }

    public function executeUpdateReloadMt4Fund()
    {
        $statusCode = $this->getRequestParameter('status_code');
        $remarks = $this->getRequestParameter('remarks');

        $con = Propel::getConnection(MlmMt4ReloadFundPeer::DATABASE_NAME);
        try {
            $con->begin();

            $mt4ReloadFund = MlmMt4ReloadFundPeer::retrieveByPk($this->getRequestParameter('reload_id'));
            $this->forward404Unless($mt4ReloadFund);

            $mt4ReloadFund->setRemarks($remarks);
            $mt4ReloadFund->setStatusCode($statusCode);
            $mt4ReloadFund->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

            if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                $mt4ReloadFund->setApproveRejectDatetime(date("Y/m/d h:i:s A"));

                if (Globals::STATUS_REJECT == $statusCode) {
                    $refundEpoint = $mt4ReloadFund->getAmount();
                    $distId = $mt4ReloadFund->getDistId();
                    /******************************/
                    /*  Account
                    /******************************/
                    $distAccountEpointBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_EPOINT);

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($distId);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REFUND);
                    $mlm_account_ledger->setRemark("MT4 REFUND (REFERENCE ID " . $mt4ReloadFund->getReloadId() . ")");
                    $mlm_account_ledger->setCredit($refundEpoint);
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($distAccountEpointBalance + $refundEpoint);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    $this->revalidateAccount($distId, Globals::ACCOUNT_TYPE_ECASH);
                }
            }

            $mt4ReloadFund->save();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
        return $this->redirect('finance/reloadMt4Fund');
    }

    public function executeReloadMt4Fund()
    {
        if ($this->getRequestParameter('upgradeStatus') && $this->getRequestParameter('upgradeId')) {
            $error = false;
            $arr = $this->getRequestParameter('upgradeId');
            $statusCode = $this->getRequestParameter('upgradeStatus');

            $con = Propel::getConnection(MlmMt4ReloadFundPeer::DATABASE_NAME);
            try {
                $con->begin();

                for ($i = 0; $i < count($arr); $i++) {
                    $mt4ReloadFund = MlmMt4ReloadFundPeer::retrieveByPk($arr[$i]);
                    $this->forward404Unless($mt4ReloadFund);

                    $mt4ReloadFund->setStatusCode($statusCode);
                    $mt4ReloadFund->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                    if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                        $mt4ReloadFund->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                    }

                    $mt4ReloadFund->save();

                    if (Globals::STATUS_REJECT == $statusCode) {
                        $refundEpoint = $mt4ReloadFund->getAmount();
                        $distId = $mt4ReloadFund->getDistId();
                        /******************************/
                        /*  Account
                        /******************************/
                        $distAccountEpointBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_EPOINT);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($distId);
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REFUND);
                        $mlm_account_ledger->setRemark("MT4 REFUND (REFERENCE ID " . $mt4ReloadFund->getReloadId() . ")");
                        $mlm_account_ledger->setCredit($refundEpoint);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($distAccountEpointBalance + $refundEpoint);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        $this->revalidateAccount($distId, Globals::ACCOUNT_TYPE_ECASH);
                    }
                }
                $con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }
            if ($error == false)
                $this->setFlash('successMsg', "Update successfully");
            return $this->redirect('finance/reloadMt4Fund');
        }
    }

    /* ****************************************
     *     ReferralBonus
     * *****************************************/
    public function executeReferralBonusEdit()
    {
        $distCommissionLedger = MlmDistCommissionLedgerPeer::retrieveByPk($this->getRequestParameter('upgradeId'));
        $this->forward404Unless($distCommissionLedger);

        $this->distCommissionLedger = $distCommissionLedger;
    }

    public function executeUpdateReferralBonus()
    {
        $statusCode = $this->getRequestParameter('status_code');
        $remarks = $this->getRequestParameter('remark');

        $con = Propel::getConnection(MlmMt4ReloadFundPeer::DATABASE_NAME);
        try {
            $con->begin();

            $distCommissionLedger = MlmDistCommissionLedgerPeer::retrieveByPk($this->getRequestParameter('commission_id'));
            $this->forward404Unless($distCommissionLedger);

            $distCommissionLedger->setRemark($remarks);
            $distCommissionLedger->setStatusCode($statusCode);
            $distCommissionLedger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

            $distCommissionLedger->save();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
        return $this->redirect('finance/referralBonus');
    }

    public function executeReferralBonus()
    {
        if ($this->getRequestParameter('upgradeStatus') && $this->getRequestParameter('upgradeId')) {
            $error = false;
            $arr = $this->getRequestParameter('upgradeId');
            $statusCode = $this->getRequestParameter('upgradeStatus');

            $con = Propel::getConnection(MlmDistCommissionLedgerPeer::DATABASE_NAME);
            try {
                $con->begin();

                for ($i = 0; $i < count($arr); $i++) {
                    $distCommissionLedger = MlmDistCommissionLedgerPeer::retrieveByPk($arr[$i]);
                    $this->forward404Unless($distCommissionLedger);

                    $distCommissionLedger->setStatusCode($statusCode);
                    $distCommissionLedger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                    $distCommissionLedger->save();
                }
                $con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }
            if ($error == false)
                $this->setFlash('successMsg', "Update successfully");
            return $this->redirect('finance/referralBonus');
        }
    }

    public function executeEpointPurchase()
    {
        if ($this->getRequestParameter('purchaseStatus') && $this->getRequestParameter('purchaseId')) {
            $error = false;
            $arr = $this->getRequestParameter('purchaseId');
            $statusCode = $this->getRequestParameter('purchaseStatus');

            $con = Propel::getConnection(MlmDistEpointPurchasePeer::DATABASE_NAME);
            try {
                $con->begin();

                for ($i = 0; $i < count($arr); $i++) {
                    $mlm_dist_epoint_purchase = MlmDistEpointPurchasePeer::retrieveByPk($arr[$i]);
                    $this->forward404Unless($mlm_dist_epoint_purchase);

                    $totalEpoint = $mlm_dist_epoint_purchase->getAmount();

                    $dist = MlmDistributorPeer::retrieveByPK($mlm_dist_epoint_purchase->getDistId());
                    $this->forward404Unless($dist);
                    /* ***********************************
                     *   Company Account
                     * ************************************/
                    $companyEpoint = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);
                    $distEpoint = $this->getAccountBalance($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
                    //var_dump($companyEpoint);
                    //var_dump($totalEpoint);
                    //exit();
                    if ($companyEpoint >= $totalEpoint) {
                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                        $mlm_account_ledger->setRemark("EPOINT PURCHASE (" . $dist->getDistributorCode() . ")");
                        $mlm_account_ledger->setCredit(0);
                        $mlm_account_ledger->setDebit($totalEpoint);
                        $mlm_account_ledger->setBalance($companyEpoint - $totalEpoint);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        //$this->revalidateAccount(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($dist->getDistributorId());
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                        $mlm_account_ledger->setRemark("");
                        $mlm_account_ledger->setCredit($totalEpoint);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($distEpoint + $totalEpoint);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        //$this->revalidateAccount($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
                        /* ***********************************
                       *   e-Point
                       * ************************************/
                        $mlm_dist_epoint_purchase->setStatusCode($statusCode);
                        //$mlm_ecash_withdraw->setRemarks($this->getRequestParameter('remarks'));
                        $mlm_dist_epoint_purchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                        if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                            $mlm_dist_epoint_purchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));

                            if (Globals::STATUS_COMPLETE == $statusCode) {
                                $mlm_dist_epoint_purchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                            }
                        }

                        $mlm_dist_epoint_purchase->save();
                    } else {
                        $error = true;

                        $this->setFlash('errorMsg', "Insufficient e-Point.");
                    }
                }
                $con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }
            if ($error == false)
                $this->setFlash('successMsg', "Update successfully");
            return $this->redirect('finance/epointPurchase');
        }
    }

    /* ****************************************
     *     PackagePurchase
     * *****************************************/
    public function executePackagePurchase()
    {
        if ($this->getRequestParameter('purchaseStatus') && $this->getRequestParameter('purchaseId')) {
            $error = false;
            $arr = $this->getRequestParameter('purchaseId');
            $statusCode = $this->getRequestParameter('purchaseStatus');

            $con = Propel::getConnection(MlmDistEpointPurchasePeer::DATABASE_NAME);
            try {
                $con->begin();

                for ($i = 0; $i < count($arr); $i++) {
                    $mlm_dist_epoint_purchase = MlmDistEpointPurchasePeer::retrieveByPk($arr[$i]);
                    $this->forward404Unless($mlm_dist_epoint_purchase);

                    $totalEpoint = $mlm_dist_epoint_purchase->getAmount();

                    $dist = MlmDistributorPeer::retrieveByPK($mlm_dist_epoint_purchase->getDistId());
                    $this->forward404Unless($dist);
                    /* ***********************************
                     *   Company Account
                     * ************************************/
                    $companyEpoint = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);
                    $distEpoint = $this->getAccountBalance($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
                    //var_dump($companyEpoint);
                    //var_dump($totalEpoint);
                    //exit();
                    if ($companyEpoint >= $totalEpoint) {
                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                        $mlm_account_ledger->setRemark("EPOINT PURCHASE (" . $dist->getDistributorCode() . ")");
                        $mlm_account_ledger->setCredit(0);
                        $mlm_account_ledger->setDebit($totalEpoint);
                        $mlm_account_ledger->setBalance($companyEpoint - $totalEpoint);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        //$this->revalidateAccount(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($dist->getDistributorId());
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                        $mlm_account_ledger->setRemark("");
                        $mlm_account_ledger->setCredit($totalEpoint);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($distEpoint + $totalEpoint);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        //$this->revalidateAccount($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
                        /* ***********************************
                       *   e-Point
                       * ************************************/
                        $mlm_dist_epoint_purchase->setStatusCode($statusCode);
                        //$mlm_ecash_withdraw->setRemarks($this->getRequestParameter('remarks'));
                        $mlm_dist_epoint_purchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                        if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                            $mlm_dist_epoint_purchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));

                            if (Globals::STATUS_COMPLETE == $statusCode) {
                                $mlm_dist_epoint_purchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                            }
                        }

                        $mlm_dist_epoint_purchase->save();
                    } else {
                        $error = true;

                        $this->setFlash('errorMsg', "Insufficient e-Point.");
                    }
                }
                $con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }
            if ($error == false)
                $this->setFlash('successMsg', "Update successfully");
            return $this->redirect('finance/epointPurchase');
        }
    }

    public function executePackagePurchaseEdit()
    {
        $mlm_dist_epoint_purchase = MlmDistEpointPurchasePeer::retrieveByPk($this->getRequestParameter('purchaseId'));
        $this->forward404Unless($mlm_dist_epoint_purchase);

        $this->mlm_dist_epoint_purchase = $mlm_dist_epoint_purchase;
    }

    public function executeUpdatePackagePurchase()
    {
        $statusCode = $this->getRequestParameter('status_code');

        $con = Propel::getConnection(MlmDistEpointPurchasePeer::DATABASE_NAME);
        try {
            $con->begin();

            $mlm_dist_epoint_purchase = MlmDistEpointPurchasePeer::retrieveByPk($this->getRequestParameter('purchase_id'));
            $this->forward404Unless($mlm_dist_epoint_purchase);

            $totalEpoint = $mlm_dist_epoint_purchase->getAmount();

            $dist = MlmDistributorPeer::retrieveByPK($mlm_dist_epoint_purchase->getDistId());
            $this->forward404Unless($dist);
            /* ***********************************
             *   Company Account
             * ************************************/
            $companyEpoint = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);
            $distEpoint = $this->getAccountBalance($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);

            //var_dump($companyEpoint);
            //var_dump($totalEpoint);
            //exit();
            if ($companyEpoint >= $totalEpoint) {
                if (Globals::STATUS_COMPLETE == $statusCode) {
                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                    $mlm_account_ledger->setRemark("EPOINT PURCHASE (" . $dist->getDistributorCode() . ")");
                    $mlm_account_ledger->setCredit(0);
                    $mlm_account_ledger->setDebit($totalEpoint);
                    $mlm_account_ledger->setBalance($companyEpoint - $totalEpoint);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    //$this->revalidateAccount(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($dist->getDistributorId());
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                    $mlm_account_ledger->setRemark("");
                    $mlm_account_ledger->setCredit($totalEpoint);
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($distEpoint + $totalEpoint);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    //$this->revalidateAccount($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
                }
                /* ***********************************
               *   e-Point
               * ************************************/
                $mlm_dist_epoint_purchase->setStatusCode($statusCode);
                $mlm_dist_epoint_purchase->setRemarks($this->getRequestParameter('remarks'));
                $mlm_dist_epoint_purchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                    $mlm_dist_epoint_purchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));

                    if (Globals::STATUS_COMPLETE == $statusCode) {
                        $mlm_dist_epoint_purchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                    }
                }

                $mlm_dist_epoint_purchase->save();
            } else {
                $error = true;

                $this->setFlash('errorMsg', "Insufficient e-Point.");
            }
            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
        if ($error == false)
            $this->setFlash('successMsg', "Update successfully");
        return $this->redirect('finance/epointPurchase');
    }

    public function executePackageUpgradeHistory()
    {
        if ($this->getRequestParameter('upgradeStatus') && $this->getRequestParameter('upgradeId')) {
            $error = false;
            $arr = $this->getRequestParameter('upgradeId');
            $statusCode = $this->getRequestParameter('upgradeStatus');

            $con = Propel::getConnection(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);
            try {
                $con->begin();

                for ($i = 0; $i < count($arr); $i++) {
                    $packageUpgradeHistory = MlmPackageUpgradeHistoryPeer::retrieveByPk($arr[$i]);
                    $this->forward404Unless($packageUpgradeHistory);

                    $packageUpgradeHistory->setStatusCode($statusCode);
                    $packageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                    $packageUpgradeHistory->save();
                }
                $con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }
            if ($error == false)
                $this->setFlash('successMsg', "Update successfully");
            return $this->redirect('finance/packageUpgradeHistory');
        }
    }

    public function executeUpdatePurchaseEPoint()
    {
        $statusCode = $this->getRequestParameter('status_code');

        $con = Propel::getConnection(MlmDistEpointPurchasePeer::DATABASE_NAME);
        try {
            $con->begin();

            $mlm_dist_epoint_purchase = MlmDistEpointPurchasePeer::retrieveByPk($this->getRequestParameter('purchase_id'));
            $this->forward404Unless($mlm_dist_epoint_purchase);

            $totalEpoint = $mlm_dist_epoint_purchase->getAmount();

            if (Globals::STATUS_REJECT == $statusCode) {
                $mlm_dist_epoint_purchase->setStatusCode($statusCode);
                $mlm_dist_epoint_purchase->setRemarks($this->getRequestParameter('remarks'));
                $mlm_dist_epoint_purchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlm_dist_epoint_purchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                $mlm_dist_epoint_purchase->save();
            } else {
                $dist = MlmDistributorPeer::retrieveByPK($mlm_dist_epoint_purchase->getDistId());
                $this->forward404Unless($dist);
                /* ***********************************
               *   Company Account
               * ************************************/
                $companyEpoint = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);
                $distEpoint = $this->getAccountBalance($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);

                //var_dump($companyEpoint);
                //var_dump($totalEpoint);
                //exit();
                if ($companyEpoint >= $totalEpoint) {
                    if (Globals::STATUS_COMPLETE == $statusCode && $mlm_dist_epoint_purchase->getStatusCode() != Globals::STATUS_COMPLETE) {
                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                        $mlm_account_ledger->setRemark("EPOINT PURCHASE (" . $dist->getDistributorCode() . ")");
                        $mlm_account_ledger->setCredit(0);
                        $mlm_account_ledger->setDebit($totalEpoint);
                        $mlm_account_ledger->setBalance($companyEpoint - $totalEpoint);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        //$this->revalidateAccount(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($dist->getDistributorId());
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                        $mlm_account_ledger->setRemark("");
                        $mlm_account_ledger->setCredit($totalEpoint);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($distEpoint + $totalEpoint);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        //$this->revalidateAccount($dist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
                    }
                    /* ***********************************
                   *   e-Point
                   * ************************************/
                    $mlm_dist_epoint_purchase->setStatusCode($statusCode);
                    $mlm_dist_epoint_purchase->setRemarks($this->getRequestParameter('remarks'));
                    $mlm_dist_epoint_purchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                    if (Globals::STATUS_COMPLETE == $statusCode || Globals::STATUS_REJECT == $statusCode) {
                        $mlm_dist_epoint_purchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));

                        if (Globals::STATUS_COMPLETE == $statusCode) {
                            $mlm_dist_epoint_purchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                        }
                    }

                    $mlm_dist_epoint_purchase->save();
                } else {
                    $error = true;

                    $this->setFlash('errorMsg', "Insufficient e-Point.");
                }
            }
            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
        if ($error == false)
            $this->setFlash('successMsg', "Update successfully");
        return $this->redirect('finance/epointPurchase');
    }

    public function executeUpdatePackageUpgrade()
    {
        $statusCode = $this->getRequestParameter('status_code');
        $remarks = $this->getRequestParameter('remarks');
        $con = Propel::getConnection(MlmDistEpointPurchasePeer::DATABASE_NAME);
        try {
            $con->begin();

            $packageUpgradeHistory = MlmPackageUpgradeHistoryPeer::retrieveByPk($this->getRequestParameter('upgrade_id'));
            $this->forward404Unless($packageUpgradeHistory);

            $tbl_distributor = MlmDistributorPeer::retrieveByPk($packageUpgradeHistory->getDistId());

            /*if ($mlm_dist_mt4) {
              //$mlm_dist_mt4->setDistId($packageUpgradeHistory->getDistId());
              $mlm_dist_mt4->setMt4UserName($this->getRequestParameter('mt4Id'));
              $mlm_dist_mt4->setMt4Password($this->getRequestParameter('mt4Password'));
              //$mlm_dist_mt4->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
              $mlm_dist_mt4->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
              $mlm_dist_mt4->save();
          } else {*/
            if ($statusCode == Globals::STATUS_COMPLETE && $this->getRequestParameter('mt4Id') != "" && $packageUpgradeHistory->getStatusCode() == Globals::STATUS_ACTIVE) {
                $c = new Criteria();
                $c->add(MlmDistMt4Peer::MT4_USER_NAME, $this->getRequestParameter('mt4Id'));
                $mlmDistMt4DB = MlmDistMt4Peer::doSelectOne($c);

                if (!$mlmDistMt4DB) {
                    $mlm_dist_mt4 = new MlmDistMt4();
                    $mlm_dist_mt4->setDistId($packageUpgradeHistory->getDistId());
                    $mlm_dist_mt4->setMt4UserName($this->getRequestParameter('mt4Id'));
                    $mlm_dist_mt4->setMt4Password($this->getRequestParameter('mt4Password'));
                    $mlm_dist_mt4->setRankId($packageUpgradeHistory->getPackageId());
                    $mlm_dist_mt4->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->save();

                    $packageDB = MlmPackagePeer::retrieveByPK($packageUpgradeHistory->getPackageId());
                    /* ****************************************************
                   * ROI Divident
                   * ***************************************************/
                    $dateUtil = new DateUtil();
                    $currentDate = $dateUtil->formatDate("Y-m-d", $packageUpgradeHistory->getCreatedOn()) . " 00:00:00";
                    $currentDate_timestamp = strtotime($currentDate);
                    $firstDividendDate = strtotime("+1 months", $currentDate_timestamp);
                    for ($x=1; $x <= 18; $x++) {
                        $dividendDate = strtotime("+" . $x . " months", $currentDate_timestamp);

                        $mlm_roi_dividend = new MlmRoiDividend();
                        $mlm_roi_dividend->setDistId($tbl_distributor->getDistributorId());
                        $mlm_roi_dividend->setIdx($x);
                        $mlm_roi_dividend->setMt4UserName($this->getRequestParameter('mt4Id'));
                        //$mlm_roi_dividend->setAccountLedgerId($this->getRequestParameter('account_ledger_id'));
                        $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                        $mlm_roi_dividend->setFirstDividendDate(date("Y-m-d h:i:s", $dividendDate));
                        $mlm_roi_dividend->setPackageId($packageDB->getPackageId());
                        $mlm_roi_dividend->setPackagePrice($packageDB->getPrice());
                        $mlm_roi_dividend->setRoiPercentage($packageDB->getMonthlyRoi());
                        //$mlm_roi_dividend->setDevidendAmount($this->getRequestParameter('devidend_amount'));
                        //$mlm_roi_dividend->setRemarks($this->getRequestParameter('remarks'));
                        $mlm_roi_dividend->setStatusCode(Globals::DIVIDEND_STATUS_PENDING);
                        $mlm_roi_dividend->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_roi_dividend->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_roi_dividend->save();
                    }

                    //$subject = "Your live trading account with Maxim Trader has been activated 您的马胜交易户口已被激活";

                    if ($this->getRequestParameter('mt4Id') != "" && $this->getRequestParameter('mt4Password') != "") {
                        $this->sendEmailForMt4($this->getRequestParameter('mt4Id'), $this->getRequestParameter('mt4Password'), $tbl_distributor->getFullName(), $tbl_distributor->getEmail());
                    }

                    $packageUpgradeHistory->setMt4UserName($this->getRequestParameter('mt4Id'));
                    $packageUpgradeHistory->setMt4Password($this->getRequestParameter('mt4Password'));
                    $packageUpgradeHistory->setRemarks($remarks);
                    $packageUpgradeHistory->setStatusCode($statusCode);
                    $packageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                    $packageUpgradeHistory->save();
                }
            }
            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
        return $this->redirect('finance/packageUpgradeHistory');
    }

    public function executePackageUpgradeHistoryEdit()
    {
        $packageUpgradeHistory = MlmPackageUpgradeHistoryPeer::retrieveByPk($this->getRequestParameter('upgradeId'));
        $this->forward404Unless($packageUpgradeHistory);

        $this->packageUpgradeHistory = $packageUpgradeHistory;
    }

    public function executeEpointPurchaseEdit()
    {
        $mlm_dist_epoint_purchase = MlmDistEpointPurchasePeer::retrieveByPk($this->getRequestParameter('purchaseId'));
        $this->forward404Unless($mlm_dist_epoint_purchase);

        $this->mlm_dist_epoint_purchase = $mlm_dist_epoint_purchase;
    }

    public function executeEPointTransaction()
    {
    }

    /* ****************************************
     *     Ecash Withdrawal
     * *****************************************/
    public function executeEcashWithdrawal()
    {
        if ($this->getRequestParameter('withdrawStatus') && $this->getRequestParameter('withdrawId')) {
            $arr = $this->getRequestParameter('withdrawId');
            $statusCode = $this->getRequestParameter('withdrawStatus');

            for ($i = 0; $i < count($arr); $i++) {
                $mlm_ecash_withdraw = MlmEcashWithdrawPeer::retrieveByPk($arr[$i]);
                $this->forward404Unless($mlm_ecash_withdraw);

                $mlm_ecash_withdraw->setStatusCode($statusCode);
                //$mlm_ecash_withdraw->setRemarks($this->getRequestParameter('remarks'));
                $mlm_ecash_withdraw->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

                if (Globals::WITHDRAWAL_PAID == $statusCode || Globals::WITHDRAWAL_REJECTED == $statusCode) {
                    $mlm_ecash_withdraw->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                }

                $mlm_ecash_withdraw->save();

                $distId = $mlm_ecash_withdraw->getDistId();
                if (Globals::WITHDRAWAL_REJECTED == $statusCode) {
                    $refundEcash = $mlm_ecash_withdraw->getAmount();
                    /******************************/
                    /*  Account
                    /******************************/
                    $c = new Criteria();
                    $c->add(MlmAccountLedgerPeer::DIST_ID, $distId);
                    $c->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
                    $c->addDescendingOrderByColumn(MlmAccountLedgerPeer::CREATED_ON);
                    $accountLedgerDB = MlmAccountLedgerPeer::doSelectOne($c);

                    $this->forward404Unless($accountLedgerDB);
                    $distAccountEcashBalance = $accountLedgerDB->getBalance();

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($distId);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REFUND);
                    $mlm_account_ledger->setRemark("REFUND (REFERENCE ID " . $mlm_ecash_withdraw->getWithdrawId() . ")");
                    $mlm_account_ledger->setCredit($refundEcash);
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($distAccountEcashBalance + $refundEcash);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    //$this->revalidateAccount($distId, Globals::ACCOUNT_TYPE_ECASH);
                }

                /****************************/
                /*****  Send email **********/
                /****************************/
                $mlm_distributor = MlmDistributorPeer::retrieveByPK($distId);
                $receiverEmail = $mlm_distributor->getEmail();
                $receiverFullname = $mlm_distributor->getFullName();
                $subject = "CMIS - 您申请的兑现款项成功转账到您的私人账户";

                $body = "<table border='0' cellpadding='0' cellspacing='0' width='698' align='center' style='border:1px solid #eeeeee'>
            <tbody>
            <tr valign='top'>
                <td>
                    <table border='0' cellpadding='0' cellspacing='0' width='698'>
                        <tbody>
                        <tr valign='top'>
                            <td><img src='http://partner.fxcmiscc.com/images/email/top.jpg'
                                    alt='CMIS' border='0'></td>
                        </tr>
                        <tr valign='top'>
                            <td>
                                <table width='670' border='0' cellpadding='0' cellspacing='0'
                                       style='margin-left:14px;margin-right:14px'>
                                    <tbody>
                                    <tr>
                                        <td style='border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;padding:0 0 23px 0;font-size:12px;line-height:18px;font-family:Arial;color:#222222;padding:0px 24px 18px 24px'>
                                            <p style='font-size:16px;line-height:18px;color:#222222;width:100%;margin:0;padding:0 0 10px 0;font-weight:bold'>
                                                兑现成功</p><br>
                                            尊敬的CMIS会员<br><br>

                                            此邮件是通知您；本公司已经成功把您所申请的款项转账到您的私人账户，请尽快查收。<br>
                                            如果发现所申请的款项没能到帐，请及时联络当地的CMIS顾问或迅速的回复此邮件，让我们能及时为您服务。<br><br>

                                            我们非常感谢您给予本公司的支持与信任。<br>
                                            我们希望未来也能给予您最好的服务。<br><br>
                                            <br><br>
                                            <b> CMIS </b><br>
                                            www.fxcmiscc.com
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='background-color:#f3f3f3;border-top:1px solid #bac1c8;border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;font-size:11px;line-height:16px;padding:26px 24px 18px 24px'>
                                            <p style='color:#ff0000;font-size:12px;line-height:20px;font-weight:normal;text-decoration:none'>
                                                Privileged/confidential information may be contained in this message. If this message is received by anyone other than the intended addressee, please return the message to the sender by replying to it and then delete the message from your computer. Unintended recipients are prohibited from taking action on the basis of information in this e-mail. No confidentiality or privilege is waived or lost by CMIS Group including its affiliates (CMIS Group) by any mistransmission of this e-mail. CMIS Group does not accept responsibility or liability for the accuracy or completeness of, or presence of any virus or disabling code in, this e-mail. CMIS Group reserves the right to monitor e-mail communications through its networks (in accordance with applicable laws). Opinions, conclusions, statements and other information in this message that do not relate to the official business of CMIS Group shall be understood as neither given nor endorsed by it.
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><img src='http://member.fxcmisc.com/images/email/bottom.jpg'
                                    alt='' border='0' usemap='#1461c343c4ce9442_Map2'></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody ></table>";

                if (Globals::WITHDRAWAL_PAID == $statusCode) {
                    $sendMailService = new SendMailService();
                    $sendMailService->sendMailViaFinance($receiverEmail, $receiverFullname, $subject, $body);
                }
            }
            $this->setFlash('successMsg', "Update successfully");
            return $this->redirect('finance/ecashWithdrawal');
        }
    }

    public function executeEcashWithdrawalEdit()
    {
        $this->mlm_ecash_withdraw = MlmEcashWithdrawPeer::retrieveByPk($this->getRequestParameter('withdrawId'));
        $this->forward404Unless($this->mlm_ecash_withdraw);
    }

    public function executeUpdateWithdrawal()
    {
        $mlm_ecash_withdraw = MlmEcashWithdrawPeer::retrieveByPk($this->getRequestParameter('withdraw_id'));
        $this->forward404Unless($mlm_ecash_withdraw);

        $statusCode = $this->getRequestParameter('status_code');

        $mlm_ecash_withdraw->setStatusCode($statusCode);
        $mlm_ecash_withdraw->setRemarks($this->getRequestParameter('remarks'));
        $mlm_ecash_withdraw->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));

        if (Globals::WITHDRAWAL_PAID == $statusCode || Globals::WITHDRAWAL_REJECTED == $statusCode) {
            $mlm_ecash_withdraw->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
        }

        $mlm_ecash_withdraw->save();

        if (Globals::WITHDRAWAL_REJECTED == $statusCode) {
            $refundEcash = $mlm_ecash_withdraw->getAmount();
            $distId = $mlm_ecash_withdraw->getDistId();
            /******************************/
            /*  Account
            /******************************/
            $distAccountEcashBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_ECASH);

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($distId);
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REFUND);
            $mlm_account_ledger->setRemark("REFUND (REFERENCE ID " . $mlm_ecash_withdraw->getWithdrawId() . ")");
            $mlm_account_ledger->setCredit($refundEcash);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($distAccountEcashBalance + $refundEcash);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();

            //$this->revalidateAccount($distId, Globals::ACCOUNT_TYPE_ECASH);
        }
        /****************************/
        /*****  Send email **********/
        /****************************/
        $mlm_distributor = MlmDistributorPeer::retrieveByPK($distId);
        $receiverEmail = $mlm_distributor->getEmail();
        $receiverFullname = $mlm_distributor->getFullName();
        $subject = "CMIS - 您申请的兑现款项成功转账到您的私人账户";

        $body = "<table border='0' cellpadding='0' cellspacing='0' width='698' align='center' style='border:1px solid #eeeeee'>
    <tbody>
    <tr valign='top'>
        <td>
            <table border='0' cellpadding='0' cellspacing='0' width='698'>
                <tbody>
                <tr valign='top'>
                    <td><img src='http://member.fxcmisc.com/images/email/top.jpg'
                            alt='CMIS' border='0'></td>
                </tr>
                <tr valign='top'>
                    <td>
                        <table width='670' border='0' cellpadding='0' cellspacing='0'
                               style='margin-left:14px;margin-right:14px'>
                            <tbody>
                            <tr>
                                <td style='border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;padding:0 0 23px 0;font-size:12px;line-height:18px;font-family:Arial;color:#222222;padding:0px 24px 18px 24px'>
                                    <p style='font-size:16px;line-height:18px;color:#222222;width:100%;margin:0;padding:0 0 10px 0;font-weight:bold'>
                                        兑现成功</p><br>
                                    尊敬的CMIS会员<br><br>

                                    此邮件是通知您；本公司已经成功把您所申请的款项转账到您的私人账户，请尽快查收。<br>
                                    如果发现所申请的款项没能到帐，请及时联络当地的CMIS顾问或迅速的回复此邮件，让我们能及时为您服务。<br><br>

                                    我们非常感谢您给予本公司的支持与信任。<br>
                                    我们希望未来也能给予您最好的服务。<br><br>
                                    <br><br>
                                    <b> CMIS </b><br>
                                    www.fxcmisc.com
                                    <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td style='background-color:#f3f3f3;border-top:1px solid #bac1c8;border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;font-size:11px;line-height:16px;padding:26px 24px 18px 24px'>
                                    <p style='color:#ff0000;font-size:12px;line-height:20px;font-weight:normal;text-decoration:none'>
                                        Privileged/confidential information may be contained in this message. If this message is received by anyone other than the intended addressee, please return the message to the sender by replying to it and then delete the message from your computer. Unintended recipients are prohibited from taking action on the basis of information in this e-mail. No confidentiality or privilege is waived or lost by CMIS Group including its affiliates (CMIS Group) by any mistransmission of this e-mail. CMIS Group does not accept responsibility or liability for the accuracy or completeness of, or presence of any virus or disabling code in, this e-mail. CMIS Group reserves the right to monitor e-mail communications through its networks (in accordance with applicable laws). Opinions, conclusions, statements and other information in this message that do not relate to the official business of CMIS Group shall be understood as neither given nor endorsed by it.
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><img src='http://member.fxcmisc.com/images/email/bottom.jpg'
                            alt='' border='0' usemap='#1461c343c4ce9442_Map2'></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody ></table>";

        if (Globals::WITHDRAWAL_PAID == $statusCode) {
            $sendMailService = new SendMailService();
            $sendMailService->sendMailViaFinance($receiverEmail, $receiverFullname, $subject, $body);
        }
        $this->setFlash('successMsg', "Update successfully");
        return $this->redirect('finance/ecashWithdrawal');
    }

    public function executeECashTransaction()
    {
    }

    public function executePipsCalculator()
    {
        $anode = array();
        if ($this->getRequestParameter('total_amount') <> "" && $this->getRequestParameter('sponsorId') <> "") {
            $totalAmount = $this->getRequestParameter('total_amount');
            $distributorCode = $this->getRequestParameter('sponsorId');

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $distributorCode);
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $existDistributor = MlmDistributorPeer::doSelectOne($c);

            if ($existDistributor) {
                $index = 0;
                /*$affectedDistributorPackageDB = MlmPackagePeer::retrieveByPK($existDistributor->getRankId());
                $anode[$index]["distId"] = $existDistributor->getDistributorId();
                $anode[$index]["distCode"] = $existDistributor->getDistributorCode();
                $anode[$index]["treeLevel"] = $existDistributor->getTreeLevel();
                $anode[$index]["treeStructure"] = $existDistributor->getTreeStructure();
                $anode[$index]["packageId"] = $affectedDistributorPackageDB->getPackageId();
                $anode[$index]["packageName"] = $affectedDistributorPackageDB->getPackageName();
                $anode[$index]["pipsAmount"] = $affectedDistributorPackageDB->getPips() * $totalAmount;
                $index++;*/

                $treeLevel = $existDistributor->getTreeLevel();
                $treeStructure = $existDistributor->getTreeStructure();
                $affectedDistributorArrs = explode("|", $treeStructure);

                for ($y = count($affectedDistributorArrs); $y > 0; $y--) {
                    if ($affectedDistributorArrs[$y] == "") {
                        continue;
                    }
                    $affectedDistributorId = $affectedDistributorArrs[$y];
                    $c = new Criteria();
                    $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $affectedDistributorId, Criteria::EQUAL);
                    $affectedDistributor = MlmDistributorPeer::doSelectOne($c);

                    $affectedDistributorTreeLevel = $affectedDistributor->getTreeLevel();
                    $affectedDistributorPackageDB = MlmPackagePeer::retrieveByPK($affectedDistributor->getRankId());
                    if ($affectedDistributorPackageDB) {
                        $generation = $affectedDistributorPackageDB->getGeneration();

                        $isEntitled = false;
                        if ($generation == null) {
                            $isEntitled = true;
                        } else {
                            if (($treeLevel - $affectedDistributorTreeLevel) <= $generation) {
                                $isEntitled = true;
                            }
                        }

                        if ($isEntitled) {
                            $anode[$index]["distId"] = $affectedDistributor->getDistributorId();
                            $anode[$index]["distCode"] = $affectedDistributor->getDistributorCode();
                            $anode[$index]["treeLevel"] = $affectedDistributor->getTreeLevel();
                            $anode[$index]["treeStructure"] = $affectedDistributor->getTreeStructure();
                            $anode[$index]["packageId"] = $affectedDistributorPackageDB->getPackageId();
                            $anode[$index]["packageName"] = $affectedDistributorPackageDB->getPackageName();
                            $anode[$index]["pipsAmount"] = $affectedDistributorPackageDB->getPips() * $totalAmount;
                            $index++;
                        }
                    }
                }
            }
        }
        $this->anode = $anode;
    }

    public function executeDailyBonus()
    {
        if ($this->getRequestParameter('date_from') <> "" || $this->getRequestParameter('date_to') <> "") {
            $query = "SELECT b.f_id,b.f_code,b.f_name,SUM(a.f_dsb) AS f_dsb, SUM(a.f_gdb) AS f_gdb, SUM(a.f_gap) AS f_gap, SUM(a.f_elb) AS f_elb, SUM(a.f_wpb) AS f_wpb, SUM(a.f_dsb+a.f_gdb+a.f_gap+a.f_elb+a.f_wpb) AS f_total FROM tbl_member_comm_sum a INNER JOIN tbl_distributor b ON b.f_id=a.f_dist_id WHERE 1";
            if ($this->getRequestParameter('date_from') <> "") {
                $query .= " AND f_bonus_date>='" . $this->getRequestParameter('date_from') . "'";
                $this->date_from = $this->getRequestParameter('date_from');
            }
            if ($this->getRequestParameter('date_to') <> "") {
                $query .= " AND f_bonus_date<='" . $this->getRequestParameter('date_to') . "'";
                $this->date_to = $this->getRequestParameter('date_to');
            }
            $query .= " GROUP BY f_dist_id";
            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $this->rs = $statement->executeQuery();
        }
    }

    public function executeAdvanceEpoint()
    {
    }

    public function executeDoAdvanceEpoint()
    {
        if ($this->getRequestParameter('total_epoint') > 0) {
            // ******** Company Account **********
            $companyEPointBalance = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);
            $epointAdvance = $this->getRequestParameter('total_epoint');

            // ******** From Account Ledger [company] **********
            $tbl_account_ledger = new MlmAccountLedger();
            $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
            $tbl_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
            $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_ADVANCE);
            $tbl_account_ledger->setRemark("");
            $tbl_account_ledger->setCredit($epointAdvance);
            $tbl_account_ledger->setDebit(0);
            $tbl_account_ledger->setBalance($companyEPointBalance + $epointAdvance);
            $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_account_ledger->save();

            //$this->revalidateAccount(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_EPOINT);

            $this->setFlash('successMsg', "Advance Payment Success.");
            return $this->redirect('/finance/advanceEpoint');
        }
    }

    public function executeAdvanceEcash()
    {
        if ($this->getRequestParameter('sponsorId') <> "" && $this->getRequestParameter('total_ecash') > 0) {
            // ******** Company Account **********
            $c = new Criteria();
            $c->add(MlmAccountPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
            $c->addAnd(MlmAccountPeer::DIST_ID, Globals::SYSTEM_COMPANY_DIST_ID);
            $companyAccount = MlmAccountPeer::doSelectOne($c);

            $fromBalance = $companyAccount->getBalance();
            $ecashAdvance = $this->getRequestParameter('total_ecash');

            // ******** To Account [distributor] **********
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $this->getRequestParameter('sponsorId'));
            $existDist = MlmDistributorPeer::doSelectOne($c);

            $c = new Criteria();
            $c->add(MlmAccountPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
            $c->addAnd(MlmAccountPeer::DIST_ID, $existDist->getDistributorId());
            $toAccount = MlmAccountPeer::doSelectOne($c);
            $this->forward404Unless($toAccount);
            $toId = $existDist->getDistributorId();

            $c = new Criteria();
            $c->add(MlmAccountLedgerPeer::DIST_ID, $toId);
            $c->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
            $c->addDescendingOrderByColumn(MlmAccountLedgerPeer::CREATED_ON);
            $accountLedgerDB = MlmAccountLedgerPeer::doSelectOne($c);
            $this->forward404Unless($accountLedgerDB);
            $toBalance = $accountLedgerDB->getBalance();

            // ******** To Account Ledger [distributor] **********
            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
            $mlm_account_ledger->setDistId($toId);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_ADVANCE);
            $mlm_account_ledger->setRemark("Advance");
            $mlm_account_ledger->setCredit($ecashAdvance);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($toBalance + $ecashAdvance);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();

            //$this->revalidateAccount($toId, Globals::ACCOUNT_TYPE_ECASH);

            // ******** From Account Ledger [company] **********
            $tbl_account_ledger = new MlmAccountLedger();
            $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
            $tbl_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
            $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_ADVANCE);
            $tbl_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_ADVANCE . " " . $existDist->getDistributorCode());
            $tbl_account_ledger->setCredit(0);
            $tbl_account_ledger->setDebit($ecashAdvance);
            $tbl_account_ledger->setBalance($fromBalance - $ecashAdvance);
            $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_account_ledger->save();

            //$this->revalidateAccount(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_ECASH);

            $this->setFlash('successMsg', "Transfer success");
            return $this->redirect('/finance/advanceEcash');
        }
    }

    public function executeVerifySponsorId()
    {
        $sponsorId = $this->getRequestParameter('sponsorId');

        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $existUser = MlmDistributorPeer::doSelectOne($c);

        $arr = "";
        if ($existUser) {
            if ($existUser->getDistributorId() <> $this->getUser()->getAttribute(Globals::SESSION_DISTID)) {
                $arr = array(
                    'userId' => $existUser->getDistributorId(),
                    'userName' => $existUser->getDistributorCode(),
                    'fullname' => $existUser->getFullName(),
                    'nickname' => $existUser->getNickname()
                );
            }
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    /************************************************************************************************************************
     * function
     ************************************************************************************************************************/
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

    function getCommissionBalance($distributorId, $commissionType)
    {
        $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger WHERE dist_id = " . $distributorId . " AND commission_type = '" . $commissionType . "'";

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

    function getPipsBonusDetailByMonth($distributorId, $month, $year, $fileId)
    {
        //$dateUtil = new DateUtil();

        //$d = $dateUtil->getMonth($month, $year);
        //$firstOfMonth = date('Y-m-j', $d["first_of_month"]) . " 00:00:00";
        //$lastOfMonth = date('Y-m-j', $d["last_of_month"]) . " 23:59:59";

        $query = "SELECT SUM(bonus.credit-bonus.debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger bonus
                LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id
                        WHERE csv.file_id = " . $fileId
                 . " AND bonus.commission_type = '" . Globals::COMMISSION_TYPE_PIPS_BONUS . "'"
                 . " AND bonus.transaction_type = '" . Globals::COMMISSION_LEDGER_PIPS_GAIN . "'"
                 . " AND csv.month_traded = '" . $month . "' AND csv.year_traded = '" . $year . "'";
        //. " AND bonus.created_on >= '" . $firstOfMonth . "' AND bonus.created_on <= '" . $lastOfMonth . "'";

        if ($distributorId != null) {
            $query = $query . " AND bonus.dist_id = " . $distributorId;
        }
        //var_dump($query);
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

    function getCreditRefundBonusDetailByMonth($distributorId, $month, $year, $fileId)
    {
        //$dateUtil = new DateUtil();

        //$d = $dateUtil->getMonth($month, $year);
        //$firstOfMonth = date('Y-m-j', $d["first_of_month"]) . " 00:00:00";
        //$lastOfMonth = date('Y-m-j', $d["last_of_month"]) . " 23:59:59";

        $query = "SELECT SUM(bonus.credit-bonus.debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger bonus
                LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id
                        WHERE csv.file_id = " . $fileId
                 . " AND bonus.commission_type = '" . Globals::COMMISSION_TYPE_CREDIT_REFUND . "'"
                 . " AND csv.month_traded = '" . $month . "' AND csv.year_traded = '" . $year . "'";
        //. " AND bonus.created_on >= '" . $firstOfMonth . "' AND bonus.created_on <= '" . $lastOfMonth . "'";

        if ($distributorId != null) {
            $query = $query . " AND bonus.dist_id = " . $distributorId;
        }
        //var_dump($query);
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

    function getFundManagementBonusDetailByMonth($distributorId, $month, $year, $fileId)
    {
        //$dateUtil = new DateUtil();

        //$d = $dateUtil->getMonth($month, $year);
        //$firstOfMonth = date('Y-m-j', $d["first_of_month"]) . " 00:00:00";
        //$lastOfMonth = date('Y-m-j', $d["last_of_month"]) . " 23:59:59";

        $query = "SELECT SUM(bonus.credit-bonus.debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger bonus
                LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id
                        WHERE csv.file_id = " . $fileId
                 . " AND bonus.commission_type = '" . Globals::COMMISSION_TYPE_FUND_MANAGEMENT . "'"
                 . " AND csv.month_traded = '" . $month . "' AND csv.year_traded = '" . $year . "'";
        //. " AND bonus.created_on >= '" . $firstOfMonth . "' AND bonus.created_on <= '" . $lastOfMonth . "'";

        if ($distributorId != null) {
            $query = $query . " AND bonus.dist_id = " . $distributorId;
        }
        //var_dump($query);
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

    public function executeDownloadBankSlip()
    {
        $c = new Criteria();
        $c->add(MlmDistEpointPurchasePeer::PURCHASE_ID, $this->getRequestParameter('q'));
        $mlmDistEpointPurchaseDB = MlmDistEpointPurchasePeer::doSelectOne($c);

        if ($mlmDistEpointPurchaseDB) {
            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/octet-stream');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$mlmDistEpointPurchaseDB->getImageSrc(), TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/bankslip/".$mlmDistEpointPurchaseDB->getImageSrc());
        }

        return sfView::NONE;
    }

    function sendEmailForMt4($mt4UserName, $mt4Password, $fullName, $email)
    {
        if ($mt4UserName != "" && $mt4Password != "") {
            $subject = "Your live trading account with CMIS has been activated";

            $body = "<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#fff' align='center'>
	<tbody>
		<tr>
			<td style='padding:20px 0px'>
				<table width='606' cellspacing='0' cellpadding='0' align='center' style='background:white;font-family:Arial,Helvetica,sans-serif;border: 1px rgb(0, 128, 200) solid;padding: 10px;border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px;'>
					<tbody>
						<tr>
							<td colspan='2' style='text-align:center;'>
								<a target='_blank' href='#'><img height='41' border='0' src='http://103.230.108.238/logo.jpg' alt='CMIS Trader'></a></td>
						</tr>

						<tr>
							<td colspan='2'>
								<table cellspacing='0' cellpadding='10' border='0'>
									<tbody>
										<tr>
											<td colspan='2'>
												<table>
													<tbody>
														<tr>
															<td valign='top' style='padding-top:15px;padding-left:10px'>
																<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:14px;line-height:17px'>
                                                                    Dear <strong>" . $fullName . "</strong>,<br><br>
                                                                    Congratulations! Your live trading account with CMIS Trader
                                                                    has been activated! Please find the details of your trading account as
                                                                    per below :<br><br>
                                                                    Live MT4 Trading Account ID : <strong>" . $mt4UserName . "</strong><br><br>
                                                                    Live MT4 Trading Account password : <strong>" . $mt4Password . "</strong><br><br>
                                                                    The Login ID and Password is strictly confidential and should not be
                                                                    disclosed to anyone. Should someone with access to your password wish,
                                                                    all of your account information can be changed. You will be held
                                                                    liable for any activity that may occur as a result of you losing your
                                                                    password. Therefore, if you feel that your password has been
                                                                    compromised, you should immediately contact us by email to
                                                                    <strong>info@fxcmisc.com</strong> to rectify the situation.<br><br>
                                                                    We look forward to your custom in the near future. Should you have any
                                                                    queries, please do not hesitate to get back to us.<br>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>

						<tr>
							<td width='606'>
							<img src='http://103.230.108.238/transparent.gif' height='1'>
							</td>
						</tr>
						<tr>
							<td width='606'>
							<table width='100%' cellpadding='0' cellspacing='0' border='0'>
								<tbody>
								<tr>
									<td style='font-size:0;line-height:0' align='center'>
									<a href='http://103.230.108.238/setup.exe' target='_blank'><img src='http://103.230.108.238/img-platform.gif' width='85' height='60'>
									</a>
									</td>
								</tr>
								<tr>
									<td style='text-align:center;line-height:15px' align='center'>
										<a href='http://103.230.108.238/setup.exe' target='_blank'>
										<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
											<strong>CMIS Trader<br> MT4 Terminal</strong>
										</font>
										</a>
									</td>
								</tr>
							</table>
							</td>
						</tr>

						<tr>
							<td width='606'>
							<img src='http://103.230.108.238/transparent.gif' height='1'>
							</td>
						</tr>
						<tr>
							<td width='606' style='font-size:0;line-height:0' colspan='2'>
								<img src='http://103.230.108.238/transparent.gif' height='10'>
							</td>
						</tr>

						<tr>
							<td width='606' style='padding:15px 15px 0px;color:rgb(153,153,153);font-size:11px' colspan='2'>
							<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
								<em>
									<i>Best Regards,</i><br>
									<strong><i>CMIS Trader Account Opening Team</i><</strong><br>
								</em>
							</font>
							<br>
						</tr>

						<tr>
							<td width='606' style='font-size:0;line-height:0' bgcolor='#0080C8'>
							<img src='http://103.230.108.238/transparent.gif' height='1'>
							</td>
						</tr>

						<tr>
							<td width='606' style='padding:5px 15px 20px;color:rgb(153,153,153);font-size:11px' colspan='2'>
							<p align='justify'>
								<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:15px'>
									CONFIDENTIALITY: This e-mail and any files transmitted with it are confidential and intended solely for the use of the recipient(s) only. Any review, retransmission, dissemination or other use of, or taking any action in reliance upon this information by persons or entities other than the intended recipient(s) is prohibited. If you have received this e-mail in error please notify the sender immediately and destroy the material whether stored on a computer or otherwise.
									<br><br>DISCLAIMER: Any views or opinions presented within this e-mail are solely those of the author and do not necessarily represent those of CMIS Trader, unless otherwise specifically stated. The content of this message does not constitute Investment Advice.
									<br><br>RISK WARNING: Forex, spread bets, and CFDs carry a high degree of risk to your capital and it is possible to lose more than your initial investment. Only speculate with money you can afford to lose. As with any trading, you should not engage in it unless you understand the nature of the transaction you are entering into and, the true extent of your exposure to the risk of loss. These products may not be suitable for all investors, therefore if you do not fully understand the risks involved, please seek independent advice.
								</font>
							</p>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>";


            $sendMailService = new SendMailService();
            return $sendMailService->sendMail($email, $fullName, $subject, $body);
        }
    }
}