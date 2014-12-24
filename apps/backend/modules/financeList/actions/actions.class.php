<?php

/**
 * financeList actions.
 *
 * @package    sf_sandbox
 * @subpackage financeList
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class financeListActions extends sfActions
{

    public function executeWalletList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " 	FROM mlm_account_ledger account
        LEFT JOIN mlm_distributor dist ON dist.distributor_id = account.dist_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterSearch_walletType') != "") {
            $sWhere .= " AND account.account_type ='" . $this->getRequestParameter('filterSearch_walletType') . "'";
        }
        if ($this->getRequestParameter('filterSearch_distCode') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . $this->getRequestParameter('filterSearch_distCode') . "%'";
        }
        if ($this->getRequestParameter('filterSearch_fullname') != "") {
            $sWhere .= " AND dist.full_name LIKE'%" . $this->getRequestParameter('filterSearch_fullname') . "%'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;

        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $arr[] = array(
                $resultArr['account_id'] == null ? "" : $resultArr['account_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['transaction_type'] == null ? "" : $resultArr['transaction_type'],
                $resultArr['credit'] == null ? "" : number_format($resultArr['credit'],2),
                $resultArr['debit'] == null ? "" : number_format($resultArr['debit'],2),
                $resultArr['balance'] == null ? "" : number_format($resultArr['balance'],2),
                $resultArr['remark'] == null ? "" : $resultArr['remark'],
                $resultArr['internal_remark'] == null ? "" : $resultArr['internal_remark'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on']
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }
    public function executeEcashLogList()
    {
        // request parameter *****************************
        /*            $bSortable_0	false
          bSortable_1	false
          bSortable_2	true
          bSortable_3	false
          iColumns	4
          iDisplayLength	10
          iDisplayStart	0
          iSortCol_0	2
          iSortDir_0	asc
          iSortingCols	1
          sColumns	userId,userName,email1,lastName
          sEcho	2*/
        // end request parameter *****************************
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        /******   total records  *******/
        $c = new Criteria();
        $c->add(MlmAccountLedgerPeer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $c->addAnd(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
        $totalRecords = MlmAccountLedgerPeer::doCount($c);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterAction') != "") {
            $c->addAnd(MlmAccountLedgerPeer::TRANSACTION_TYPE, "%" . $this->getRequestParameter('filterAction') . "%", Criteria::LIKE);
        }
        $totalFilteredRecords = MlmAccountLedgerPeer::doCount($c);

        /******   sorting  *******/
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                if ("asc" == $this->getRequestParameter('sSortDir_' . $i)) {
                    $c->addAscendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                } else {
                    $c->addDescendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                }
            }
        }

        /******   pagination  *******/
        $pager = new sfPropelPager('MlmAccountLedger', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $arr[] = array(
                $result->getCredit() == null ? "0" : $result->getCredit(),
                $result->getDebit() == null ? "0" : $result->getDebit(),
                $result->getBalance() == null ? "0" : $result->getBalance(),
                $result->getTransactionType() == null ? "" : $this->getContext()->getI18N()->__($result->getTransactionType()),
                $result->getCreatedOn()  == null ? "" : $result->getCreatedOn(),
                $result->getRemark()  == null ? "" : $result->getRemark()
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }
    public function executePipsRebateList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " 	FROM mlm_pips_rebate rebate
        LEFT JOIN mlm_distributor dist ON dist.distributor_id = rebate.dist_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterSearch_date') != "") {
            $sWhere .= " AND rebate.pips_date ='" . $this->getRequestParameter('filterSearch_date') . "'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;

        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $arr[] = array(
                $resultArr['rebate_id'] == null ? "" : $resultArr['rebate_id'],
                $resultArr['pips_date'] == null ? "" : $resultArr['pips_date'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['package_name'] == null ? "" : $resultArr['package_name'],
                $resultArr['pips_rebate'] == null ? "" : number_format($resultArr['pips_rebate'],2),
                $resultArr['volume'] == null ? "" : number_format($resultArr['volume'],2),
                $resultArr['amount'] == null ? "" : number_format($resultArr['amount'],2)
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }
    public function executePipsRebateDetailList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_pips_rebate_detail detail";

        /******   total records  *******/
        $sWhere = " WHERE 1=1";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterSearch_rebateId') != "") {
            $sWhere .= " AND detail.rebate_id =" . $this->getRequestParameter('filterSearch_rebateId');
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;

        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $arr[] = array(
                $resultArr['detail_id'] == null ? "" : $resultArr['detail_id'],
                $resultArr['left_side'] == null ? "" : $resultArr['left_side'],
                $resultArr['left_volume'] == null ? "" : number_format($resultArr['left_volume'],2),
                $resultArr['right_side'] == null ? "" : $resultArr['right_side'],
                $resultArr['right_volume'] == null ? "" : number_format($resultArr['right_volume'],2),
                $resultArr['amount'] == null ? "" : number_format($resultArr['amount'],2)
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }
    public function executeEPointTransactionList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_account account
        LEFT JOIN mlm_distributor dist ON account.dist_id = dist.distributor_id ";

        /******   total records  *******/
        $sWhere = " WHERE account_type = '" . Globals::ACCOUNT_TYPE_EPOINT . "' ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $distId = $resultArr['dist_id'] == null ? "" : $resultArr['dist_id'];
            $distCode = $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'];
            if ($distId == 0) {
                $distCode = "COMPANY";
            }
            $arr[] = array(
                $distId,
                $resultArr['dist_id'] == null ? "" : $resultArr['dist_id'],
                $distCode,
                $resultArr['balance'] == null ? "" : $resultArr['balance'],
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeEPointTransactionDetailList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_account account
        LEFT JOIN mlm_distributor dist ON account.dist_id = dist.distributor_id ";

        /******   total records  *******/
        $sWhere = " WHERE account_type = '" . Globals::ACCOUNT_TYPE_EPOINT . "' ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $distId = $resultArr['dist_id'] == null ? "" : $resultArr['dist_id'];
            $distCode = $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'];
            if ($distId == 0) {
                $distCode = "TUNE COMPANY";
            }
            $arr[] = array(
                $distId,
                $resultArr['dist_id'] == null ? "" : $resultArr['dist_id'],
                $distCode,
                $resultArr['balance'] == null ? "" : $resultArr['balance'],
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeEpointPurchaseList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure FROM mlm_dist_epoint_purchase purchase
        LEFT JOIN mlm_distributor dist ON purchase.dist_id = dist.distributor_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND purchase.status_code = '" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $leaderArrs = explode(",", Globals::GROUP_LEADER);

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $leader = "";
            for ($i = 0; $i < count($leaderArrs); $i++) {
                $pos = strrpos($resultArr['tree_structure'], $leaderArrs[$i]);
                if ($pos === false) { // note: three equal signs

                } else {
                    $leader = $leaderArrs[$i];
                    break;
                }
            }

            $arr[] = array(
                $resultArr['purchase_id'] == null ? "" : $resultArr['purchase_id'],
                $resultArr['purchase_id'] == null ? "" : $resultArr['purchase_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['amount'] == null ? "" : $resultArr['amount'],
                $resultArr['transaction_type'] == null ? "" : $resultArr['transaction_type'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['image_src'] == null ? "" : $resultArr['image_src'],
                $resultArr['payment_reference'] == null ? "" : $resultArr['payment_reference'],
                $resultArr['approve_reject_datetime'] == null ? "" : $resultArr['approve_reject_datetime'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $leader
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executePackagePurchaseList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure FROM mlm_distributor dist
            INNER JOIN mlm_package package ON package.package_id = dist.init_rank_id
            LEFT JOIN mlm_dist_mt4 mt4 ON dist.distributor_id = mt4.dist_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }
        if ($this->getRequestParameter('filterPurchaseFlag') != "") {
            $sWhere .= " AND dist.package_purchase_flag = '" . mysql_real_escape_string($this->getRequestParameter('filterPurchaseFlag')) . "'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $leaderArrs = explode(",", Globals::GROUP_LEADER);

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $userStatus = $resultArr['package_purchase_flag'] == null ? "" : $resultArr['package_purchase_flag'];

            /*if ($userStatus == "Y") {
                $userStatus = "Old User";
            } elseif ($userStatus == "N") {
                $userStatus = "New User";
            }*/
            $leader = "";
            for ($i = 0; $i < count($leaderArrs); $i++) {
                $pos = strrpos($resultArr['tree_structure'], $leaderArrs[$i]);
                if ($pos === false) { // note: three equal signs

                } else {
                    $leader = $leaderArrs[$i];
                    break;
                }
            }

            $arr[] = array(
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['email'] == null ? "" : $resultArr['email'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['mt4_password'] == null ? "" : $resultArr['mt4_password'],
                $resultArr['package_name'] == null ? "" : $resultArr['package_name'],
                $resultArr['price'] == null ? "" : $resultArr['price'],
                $resultArr['active_datetime'] == null ? "" : $resultArr['active_datetime'],
                $userStatus,
                $leader
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeUpgradePackageList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure FROM mlm_package_upgrade_history upgrade
        LEFT JOIN mlm_distributor dist ON upgrade.dist_id = dist.distributor_id";
        /*LEFT JOIN mlm_dist_mt4 mt4 ON dist.distributor_id = mt4.dist_id ";*/

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND upgrade.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND upgrade.status_code = '" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);
        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $leaderArrs = explode(",", Globals::GROUP_LEADER);

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $leader = "";
            for ($i = 0; $i < count($leaderArrs); $i++) {
                $pos = strrpos($resultArr['tree_structure'], $leaderArrs[$i]);
                if ($pos === false) { // note: three equal signs

                } else {
                    $leader = $leaderArrs[$i];
                    break;
                }
            }

            $arr[] = array(
                $resultArr['upgrade_id'] == null ? "" : $resultArr['upgrade_id'],
                $resultArr['upgrade_id'] == null ? "" : $resultArr['upgrade_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['amount'] == null ? "" : $resultArr['amount'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['remarks'] == null ? "" : $resultArr['remarks'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $leader
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeReloadMt4FundList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure FROM mlm_mt4_reload_fund reload
        LEFT JOIN mlm_distributor dist ON reload.dist_id = dist.distributor_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND reload.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND reload.status_code = '" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $leaderArrs = explode(",", Globals::GROUP_LEADER);

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $leader = "";
            for ($i = 0; $i < count($leaderArrs); $i++) {
                $pos = strrpos($resultArr['tree_structure'], $leaderArrs[$i]);
                if ($pos === false) { // note: three equal signs

                } else {
                    $leader = $leaderArrs[$i];
                    break;
                }
            }

            $arr[] = array(
                $resultArr['reload_id'] == null ? "" : $resultArr['reload_id'],
                $resultArr['reload_id'] == null ? "" : $resultArr['reload_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['amount'] == null ? "" : $resultArr['amount'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['remarks'] == null ? "" : $resultArr['remarks'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $leader
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeReferralBonusList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure,dist.distributor_id FROM mlm_dist_commission_ledger bonus
        LEFT JOIN mlm_distributor dist ON bonus.dist_id = dist.distributor_id ";
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        /******   total records  *******/
        $sWhere = " WHERE commission_type = '". Globals::COMMISSION_TYPE_DRB."' ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " AND dist.mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }

        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        /*if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }*/
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND bonus.status_code = '" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "'";
        }
        if ($this->getRequestParameter('filterReferId') != "") {
            $sWhere .= " AND bonus.ref_id = " . mysql_real_escape_string($this->getRequestParameter('filterReferId'));
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

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

        $leaderArrs = explode(",", Globals::GROUP_LEADER);

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $leader = "";
            for ($i = 0; $i < count($leaderArrs); $i++) {
                $pos = strrpos($resultArr['tree_structure'], $leaderArrs[$i]);
                if ($pos === false) { // note: three equal signs

                } else {
                    $leader = $leaderArrs[$i];
                    break;
                }
            }

            $arr[] = array(
                $resultArr['commission_id'] == null ? "" : $resultArr['commission_id'],
                $resultArr['commission_id'] == null ? "" : $resultArr['commission_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['credit'] == null ? "" : $resultArr['credit'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['remark'] == null ? "" : $resultArr['remark'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['month_traded'] == null ? "" : $month[$resultArr['month_traded']],
                $leader
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executePipsBonusList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = ", dist.distributor_id, bonus.pips_downline_username, bonus.pips_mt4_id, bonus.pips_rebate, bonus.pips_level, bonus.pips_lots_traded
            FROM mlm_dist_commission_ledger bonus
        LEFT JOIN mlm_distributor dist ON bonus.dist_id = dist.distributor_id
        LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        if ($this->getRequestParameter('filterCommissionType') == "") {
            $sWhere .= " AND commission_type IN ('". Globals::COMMISSION_TYPE_PIPS_BONUS."','".Globals::COMMISSION_TYPE_CREDIT_REFUND."','".Globals::COMMISSION_TYPE_FUND_MANAGEMENT."') ";
        } else {
            $sWhere .= " AND commission_type  = '". $this->getRequestParameter('filterCommissionType')."'";
        }
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND bonus.status_code = '" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "'";
        }
        if ($this->getRequestParameter('filterReferId') != "") {
            $sWhere .= " AND csv.file_id = " . mysql_real_escape_string($this->getRequestParameter('filterReferId'));
        }
        if ($this->getRequestParameter('filterDistId') != "") {
            $sWhere .= " AND dist.distributor_id = " . mysql_real_escape_string($this->getRequestParameter('filterDistId'));
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY dist.distributor_id, bonus.pips_level, ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

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
        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $commissionType = $resultArr['commission_type'] == null ? "" : $resultArr['commission_type'];

            $desc = "";
            if ($commissionType == Globals::COMMISSION_TYPE_PIPS_BONUS) {
                $commissionType = "PIPS BONUS";

                $desc = "Downline Username :".$resultArr['pips_downline_username']
                        ."<br>MT4 ID :".$resultArr['pips_mt4_id']
                        ."<br>Rebate :".$resultArr['pips_rebate']
                        ."<br>Level :".$resultArr['pips_level']
                        ."<br>"
                        ."<br>Lots Traded :".$resultArr['pips_lots_traded'];
            } elseif ($commissionType == Globals::COMMISSION_TYPE_CREDIT_REFUND) {
                $commissionType = "CREDIT REFUND";

                $desc = $resultArr['remark'];
            } elseif ($commissionType == Globals::COMMISSION_TYPE_FUND_MANAGEMENT) {
                $commissionType = "FUND MANAGEMENT";

                $desc = $resultArr['remark'];
            }

            $arr[] = array(
                $resultArr['commission_id'] == null ? "" : $resultArr['commission_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $commissionType,
                $resultArr['credit'] == null ? "" : $resultArr['credit'],
                $resultArr['remark'] == null ? "" : $resultArr['remark'],
                $desc,
                $resultArr['month_traded'] == null ? "" : $month[$resultArr['month_traded']],
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeDemoPipsBonusList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = ", dist.distributor_id, bonus.pips_downline_username, bonus.pips_mt4_id, bonus.pips_rebate, bonus.pips_level, bonus.pips_lots_traded
            FROM demo_dist_commission_ledger bonus
        LEFT JOIN mlm_distributor dist ON bonus.dist_id = dist.distributor_id
        LEFT JOIN demo_pip_csv csv ON csv.pip_id = bonus.ref_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        if ($this->getRequestParameter('filterCommissionType') == "") {
            $sWhere .= " AND commission_type IN ('". Globals::COMMISSION_TYPE_PIPS_BONUS."','".Globals::COMMISSION_TYPE_CREDIT_REFUND."','".Globals::COMMISSION_TYPE_FUND_MANAGEMENT."') ";
        } else {
            $sWhere .= " AND commission_type  = '". $this->getRequestParameter('filterCommissionType')."'";
        }
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND bonus.status_code = '" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "'";
        }
        if ($this->getRequestParameter('filterReferId') != "") {
            $sWhere .= " AND csv.file_id = " . mysql_real_escape_string($this->getRequestParameter('filterReferId'));
        }
        if ($this->getRequestParameter('filterDistId') != "") {
            $sWhere .= " AND dist.distributor_id = " . mysql_real_escape_string($this->getRequestParameter('filterDistId'));
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY dist.distributor_id, bonus.pips_level, ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

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
        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $commissionType = $resultArr['commission_type'] == null ? "" : $resultArr['commission_type'];

            $desc = "";
            if ($commissionType == Globals::COMMISSION_TYPE_PIPS_BONUS) {
                $commissionType = "PIPS BONUS";

                $desc = "Downline Username :".$resultArr['pips_downline_username']
                        ."<br>MT4 ID :".$resultArr['pips_mt4_id']
                        ."<br>Rebate :".$resultArr['pips_rebate']
                        ."<br>Level :".$resultArr['pips_level']
                        ."<br>"
                        ."<br>Lots Traded :".$resultArr['pips_lots_traded'];
            } elseif ($commissionType == Globals::COMMISSION_TYPE_CREDIT_REFUND) {
                $commissionType = "CREDIT REFUND";

                $desc = $resultArr['remark'];
            } elseif ($commissionType == Globals::COMMISSION_TYPE_FUND_MANAGEMENT) {
                $commissionType = "FUND MANAGEMENT";

                $desc = $resultArr['remark'];
            }

            $arr[] = array(
                $resultArr['commission_id'] == null ? "" : $resultArr['commission_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $commissionType,
                $resultArr['credit'] == null ? "" : $resultArr['credit'],
                $resultArr['remark'] == null ? "" : $resultArr['remark'],
                $desc,
                $resultArr['month_traded'] == null ? "" : $month[$resultArr['month_traded']],
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeMt4BonusGroupList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $sColumns = str_replace("pipsBonus", "pips.bonusAmount AS pipsBonus", $sColumns);
        $sColumns = str_replace("creditRefund", "creditRefund.bonusAmount AS creditRefund", $sColumns);
        $sColumns = str_replace("fundDividend", "fundManagement.bonusAmount AS fundDividend", $sColumns);
        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure FROM mlm_dist_commission_ledger bonus
        LEFT JOIN mlm_distributor dist ON bonus.dist_id = dist.distributor_id
        LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id
        LEFT JOIN
            (
                SELECT SUM(bonus.credit-bonus.debit) AS bonusAmount, bonus.dist_id
                    FROM mlm_dist_commission_ledger bonus
                    LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id
                    WHERE bonus.commission_type = 'PIPS_BONUS'
                    AND csv.file_id = " . $this->getRequestParameter('filterReferId')
                ." GROUP BY bonus.dist_id
            ) pips ON pips.dist_id  = bonus.dist_id
        LEFT JOIN
            (
                SELECT SUM(bonus.credit-bonus.debit) AS bonusAmount, bonus.dist_id
                    FROM mlm_dist_commission_ledger bonus
                    LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id
                    WHERE bonus.commission_type = 'CREDIT_REFUND'
                    AND csv.file_id = " . $this->getRequestParameter('filterReferId')
                ." GROUP BY bonus.dist_id
            ) creditRefund ON creditRefund.dist_id  = bonus.dist_id
        LEFT JOIN
            (
                SELECT SUM(bonus.credit-bonus.debit) AS bonusAmount, bonus.dist_id
                    FROM mlm_dist_commission_ledger bonus
                    LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id
                    WHERE bonus.commission_type = '".Globals::COMMISSION_TYPE_FUND_MANAGEMENT."'
                    AND csv.file_id = " . $this->getRequestParameter('filterReferId')
                ." GROUP BY bonus.dist_id
            ) fundManagement ON fundManagement.dist_id  = bonus.dist_id  ";

        /******   total records  *******/
        $sWhere = " WHERE bonus.commission_type IN ('PIPS_BONUS', 'CREDIT_REFUND', '".Globals::COMMISSION_TYPE_FUND_MANAGEMENT."')  AND csv.file_id = ". $this->getRequestParameter('filterReferId');

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . $this->getRequestParameter('filterUsername') . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . $this->getRequestParameter('filterFullname') . "%'";
        }
        $sGroupBy = " GROUP BY bonus.dist_id";

        $totalRecords = $this->getTotalRecordsExt($sql . $sWhere . $sGroupBy);
        $totalFilteredRecords = $totalRecords;

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sGroupBy . " " . $sOrder . " " . $sLimit;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

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

        $leaderArrs = explode(",", Globals::GROUP_LEADER);
        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $leader = "";
            for ($i = 0; $i < count($leaderArrs); $i++) {
                $pos = strrpos($resultArr['tree_structure'], $leaderArrs[$i]);
                if ($pos === false) { // note: three equal signs

                } else {
                    $leader = $leaderArrs[$i];
                    break;
                }
            }

            $pipsBonus = $resultArr['pipsBonus'] == null ? "0" : $resultArr['pipsBonus'];
            $creditRefund = $resultArr['creditRefund'] == null ? "0" : $resultArr['creditRefund'];
            $fund = $resultArr['fundDividend'] == null ? "0" : $resultArr['fundDividend'];
            $totalAmount = $pipsBonus + $creditRefund + $fund;

            $arr[] = array(
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $pipsBonus,
                $creditRefund,
                $fund,
                $totalAmount,
                $resultArr['month_traded'] == null ? "" : $month[$resultArr['month_traded']],
                $leader
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executePipsBonusGroupList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $sColumns = str_replace("bonusAmount", "SUM(bonus.credit-bonus.debit) AS bonusAmount", $sColumns);
        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_dist_commission_ledger bonus
        LEFT JOIN mlm_distributor dist ON bonus.dist_id = dist.distributor_id
        LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id ";

        /******   total records  *******/
        $sWhere = " WHERE bonus.commission_type = '" . Globals::COMMISSION_TYPE_PIPS_BONUS . "' ";

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . $this->getRequestParameter('filterUsername') . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }
        if ($this->getRequestParameter('filterReferId') != "") {
            $sWhere .= " AND csv.file_id = " . $this->getRequestParameter('filterReferId');
        }
        $sGroupBy = " GROUP BY bonus.dist_id";

        $totalRecords = $this->getTotalRecordsExt($sql . $sWhere . $sGroupBy);
        $totalFilteredRecords = $totalRecords;

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sGroupBy . " " . $sOrder . " " . $sLimit;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

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
        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $arr[] = array(
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['bonusAmount'] == null ? "" : $resultArr['bonusAmount'],
                $resultArr['month_traded'] == null ? "" : $month[$resultArr['month_traded']],
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeCreditRefundGroupList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $sColumns = str_replace("bonusAmount", "SUM(bonus.credit-bonus.debit) AS bonusAmount", $sColumns);
        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_dist_commission_ledger bonus
        LEFT JOIN mlm_distributor dist ON bonus.dist_id = dist.distributor_id
        LEFT JOIN mlm_pip_csv csv ON csv.pip_id = bonus.ref_id ";

        /******   total records  *******/
        $sWhere = " WHERE bonus.commission_type = '" . Globals::COMMISSION_TYPE_CREDIT_REFUND . "' ";

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . $this->getRequestParameter('filterUsername') . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }
        if ($this->getRequestParameter('filterReferId') != "") {
            $sWhere .= " AND csv.file_id = " . $this->getRequestParameter('filterReferId');
        }
        $sGroupBy = " GROUP BY bonus.dist_id";

        $totalRecords = $this->getTotalRecordsExt($sql . $sWhere . $sGroupBy);
        $totalFilteredRecords = $totalRecords;

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sGroupBy . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

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
        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $arr[] = array(
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['bonusAmount'] == null ? "" : $resultArr['bonusAmount'],
                $resultArr['month_traded'] == null ? "" : $month[$resultArr['month_traded']],
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeMt4WithdrawalList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure,rank.package_name FROM mlm_mt4_withdraw withdraw
        LEFT JOIN mlm_distributor dist ON withdraw.dist_id = dist.distributor_id
        LEFT JOIN mlm_package rank ON rank.package_id = dist.mt4_rank_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND withdraw.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND withdraw.status_code = '" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "'";
        }
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $leaderArrs = explode(",", Globals::GROUP_LEADER);

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();

            $paymentType = $resultArr['payment_type'] == null ? "" : $resultArr['payment_type'];
            if ($paymentType == "VISA") {
                $paymentType = "VISA Cash Card";
            } elseif ($paymentType == "BANK") {
                $paymentType = "Local Bank Transfer";
            }

            $leader = "";
            for ($i = 0; $i < count($leaderArrs); $i++) {
                $pos = strrpos($resultArr['tree_structure'], $leaderArrs[$i]);
                if ($pos === false) { // note: three equal signs

                } else {
                    $leader = $leaderArrs[$i];
                    break;
                }
            }

            $isYoyo = "N";
            $pos = strrpos($resultArr['tree_structure'], "|5|");
            if ($pos === false) { // note: three equal signs

            } else {
                $isYoyo = "Y";
            }

            $arr[] = array(
                $resultArr['withdraw_id'] == null ? "" : $resultArr['withdraw_id'],
                $resultArr['withdraw_id'] == null ? "" : $resultArr['withdraw_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['price'] == null ? "" : $resultArr['package_name']."(".number_format($resultArr['price']).")",
                $resultArr['currency_code'] == null ? "" : $resultArr['currency_code'],
                $resultArr['amount_requested'] == null ? "" : $resultArr['amount_requested'],
                $resultArr['handling_fee'] == null ? "" : $resultArr['handling_fee'],
                $resultArr['grand_amount'] == null ? "" : $resultArr['grand_amount'],
                $paymentType,
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['bank_name'] == null ? "" : $resultArr['bank_name'],
                $resultArr['bank_acc_no'] == null ? "" : $resultArr['bank_acc_no'],
                $resultArr['bank_holder_name'] == null ? "" : $resultArr['bank_holder_name'],
                $resultArr['bank_swift_code'] == null ? "" : $resultArr['bank_swift_code'],
                $resultArr['visa_debit_card'] == null ? "" : $resultArr['visa_debit_card'],
                $resultArr['remarks'] == null ? "" : $resultArr['remarks'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $leader,
                $isYoyo
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeEcashWithdrawList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " ,dist.tree_structure ,rank.package_name FROM mlm_ecash_withdraw withdraw
                LEFT JOIN mlm_distributor dist ON withdraw.dist_id = dist.distributor_id
                LEFT JOIN mlm_package rank ON rank.package_id = dist.mt4_rank_id
                LEFT JOIN
            (
            SELECT SUM(credit-debit) AS _ecash, dist_id
                FROM mlm_account_ledger accountLedger WHERE account_type = 'ECASH' GROUP BY dist_id
            ) accountLedger ON accountLedger.dist_id = withdraw.dist_id
                WHERE 1=1
        ";

        /******   total records  *******/
        if ($this->getRequestParameter('statusCode') != "") {
            $sWhere = " AND withdraw.status_code = '" . $this->getRequestParameter('statusCode') . "'";
        }

        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . $this->getRequestParameter('filterUsername') . "%'";
        }
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        /*if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }*/
        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_' . $i))] . "
                    " . mysql_real_escape_string($this->getRequestParameter('sSortDir_' . $i)) . ", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY") {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);

        $query = "SELECT tree_structure, accountLedger._ecash, " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
        //var_dump($query);

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $distId = $resultArr['dist_id'] == null ? "" : $resultArr['dist_id'];
            $distCode = $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'];

            $isYoyo = "N";
            $pos = strrpos($resultArr['tree_structure'], "|5|");
            if ($pos === false) { // note: three equal signs

            } else {
                $isYoyo = "Y";
            }

            $arr[] = array(
                $resultArr['withdraw_id'] == null ? "" : $resultArr['withdraw_id'],
                $distId,
                $distCode,
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['price'] == null ? "" : $resultArr['package_name']."(".number_format($resultArr['price']).")",
                $resultArr['deduct'] == null ? "" : $resultArr['deduct'],
                $resultArr['amount'] == null ? "" : $resultArr['amount'],
                $resultArr['_ecash'] == null ? "" : $resultArr['_ecash'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['ic'] == null ? "" : $resultArr['ic'],
                $resultArr['email'] == null ? "" : $resultArr['email'],
                $resultArr['contact'] == null ? "" : $resultArr['contact'],
                $resultArr['bank_name'] == null ? "" : $resultArr['bank_name'],
                $resultArr['bank_acc_no'] == null ? "" : $resultArr['bank_acc_no'],
                $resultArr['bank_holder_name'] == null ? "" : $resultArr['bank_holder_name'],
                $resultArr['bank_branch'] == null ? "" : $resultArr['bank_branch'],
                $resultArr['bank_address'] == null ? "" : $resultArr['bank_address'],
                $resultArr['remarks'] == null ? "" : $resultArr['remarks']
                , $resultArr['file_bank_pass_book'] == null ? "" : $resultArr['file_bank_pass_book']
                , $resultArr['file_proof_of_residence'] == null ? "" : $resultArr['file_proof_of_residence']
                , $resultArr['file_nric'] == null ? "" : $resultArr['file_nric']
                , $distId
                , $isYoyo
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeBonusDetailList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        /******   total records  *******/
        $c = new Criteria();
        if ($this->getRequestParameter('filterDistId') != "") {
            $c->addAnd(MlmDistCommissionLedgerPeer::DIST_ID, $this->getRequestParameter('filterDistId'));
        }
        $totalRecords = MlmDistCommissionLedgerPeer::doCount($c);

        /******   total filtered records  *******/
        $c->addAnd(MlmDistCommissionLedgerPeer::COMMISSION_TYPE, Globals::COMMISSION_TYPE_PIPS_BONUS);

        $totalFilteredRecords = MlmDistCommissionLedgerPeer::doCount($c);

        /******   sorting  *******/
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                if ("asc" == $this->getRequestParameter('sSortDir_' . $i)) {
                    $c->addAscendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                } else {
                    $c->addDescendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                }
            }
        }

        /******   pagination  *******/
        $pager = new sfPropelPager('MlmDistCommissionLedger', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $extraRemark = "";
            if (Globals::STATUS_COMPLETE == $result->getStatusCode()) {
                $dateString = $result->getUpdatedOn();
                $dateArr = explode(" ", $dateString);
                $extraRemark = "Successful credited into MT4 Fund (".$dateArr[0].")";
            }
            $arr[] = array(
                $result->getCommissionId() == null ? "0" : $result->getCommissionId(),
                $result->getCreatedOn() == null ? "" : $result->getCreatedOn(),
                $result->getCommissionType() == null ? ""
                        : $this->getContext()->getI18N()->__($result->getCommissionType()),
                $result->getCredit() == null ? "0" : number_format($result->getCredit(), 2),
                $result->getDebit() == null ? "0" : number_format($result->getDebit(), 2),
                $result->getRemark() == null ? "" : $result->getRemark(),
                $extraRemark
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeAdvanceEpointLogList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        /******   total records  *******/
        $c = new Criteria();
        $c->add(MlmAccountLedgerPeer::DIST_ID, Globals::SYSTEM_COMPANY_DIST_ID);
        $c->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_EPOINT);
        $totalRecords = MlmAccountLedgerPeer::doCount($c);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterAction') != "") {
            $c->add(MlmAccountLedgerPeer::TRANSACTION_TYPE, $this->getRequestParameter('filterAction'));
        }
        $totalFilteredRecords = MlmAccountLedgerPeer::doCount($c);

        /******   sorting  *******/
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                if ("asc" == $this->getRequestParameter('sSortDir_' . $i)) {
                    $c->addAscendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                } else {
                    $c->addDescendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                }
            }
        }

        /******   pagination  *******/
        $pager = new sfPropelPager('MlmAccountLedger', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $arr[] = array(
                $result->getCreatedOn()  == null ? "" : $result->getCreatedOn(),
                $result->getCredit() == null ? "0" : $result->getCredit(),
                $result->getDebit() == null ? "0" : $result->getDebit(),
                $result->getBalance() == null ? "0" : $result->getBalance(),
                $result->getTransactionType() == null ? "" : $this->getContext()->getI18N()->__($result->getTransactionType()),
                $result->getRemark()  == null ? "" : $result->getRemark()
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }
    /**********************************************************************************************************/
    /********                                        FUNCTION                                         *********/
    /**********************************************************************************************************/
    function getTotalRecords($sql)
    {
        $query = "SELECT COUNT(*) AS _TOTAL " . $sql;
        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $count = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_TOTAL"] != null) {
                $count = $arr["_TOTAL"];
            } else {
                $count = 0;
            }
        }
        return $count;
    }

    function getTotalRecordsExt($sql)
    {
        $query = "SELECT COUNT(*) AS _TOTAL FROM ( SELECT 1 " . $sql . ") bonus ";
        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $count = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_TOTAL"] != null) {
                $count = $arr["_TOTAL"];
            } else {
                $count = 0;
            }
        }
        return $count;
    }
}
