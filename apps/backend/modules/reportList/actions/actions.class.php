<?php

/**
 * reportList actions.
 *
 * @package    sf_sandbox
 * @subpackage reportList
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class reportListActions extends sfActions
{
    public function executeConvertEcashToEpointList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " , dist.distributor_id FROM mlm_account_ledger ledger
                            LEFT JOIN mlm_distributor dist ON dist.distributor_id = ledger.dist_id";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        $sql .= " (
                    select dist_id, mt4_user_name, mt4_password from mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " where mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }

        $sql .= " group by dist_id
        ) mt4 ON mt4.dist_id = dist.distributor_id ";

        $sql .= " WHERE ledger.account_type = '".Globals::ACCOUNT_TYPE_EPOINT."' AND ledger.transaction_type = '".Globals::ACCOUNT_LEDGER_ACTION_CONVERT."' ";
        /******   total records  *******/
        $sWhere = " ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        /*if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }*/
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND ledger.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND ledger.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::DIST_ID, $resultArr['distributor_id']);
            $distMt4s = MlmDistMt4Peer::doSelect($c);

            $mt4Id = "";
            $mt4Password = "";
            if (count($distMt4s)) {
                foreach ($distMt4s as $distMt4) {
                    if ($mt4Id != "")
                        $mt4Id .= ",";
                    if ($mt4Password != "")
                        $mt4Password .= ",";
                    $mt4Id .= $distMt4->getMt4UserName();
                    $mt4Password .= $distMt4->getMt4Password();
                }
            }

            $arr[] = array(
                $resultArr['account_id'] == null ? "" : $resultArr['account_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $mt4Id,
                //$resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['credit'] == null ? "" : $resultArr['credit']
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

    public function executeEpointTransferList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " , dist.distributor_id FROM mlm_account_ledger ledger
                            LEFT JOIN mlm_distributor dist ON dist.distributor_id = ledger.dist_id ";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        $sql .= " (
                    select dist_id, mt4_user_name, mt4_password from mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " where mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }

        $sql .= " group by dist_id
        ) mt4 ON mt4.dist_id = dist.distributor_id ";

        $sql .= " WHERE ledger.account_type = '".Globals::ACCOUNT_TYPE_EPOINT."' ";

        /******   total records  *******/
        $sWhere = " ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        /*if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }*/
        if ($this->getRequestParameter('filterTransaction') != "") {
            $sWhere .= " AND ledger.transaction_type = '" . mysql_real_escape_string($this->getRequestParameter('filterTransaction')) . "'";
        } else {
            $sWhere .= " AND ledger.transaction_type IN ('" . Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM . "','" . Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . "')";
        }
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND ledger.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND ledger.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::DIST_ID, $resultArr['distributor_id']);
            $distMt4s = MlmDistMt4Peer::doSelect($c);

            $mt4Id = "";
            $mt4Password = "";
            if (count($distMt4s)) {
                foreach ($distMt4s as $distMt4) {
                    if ($mt4Id != "")
                        $mt4Id .= ",";
                    if ($mt4Password != "")
                        $mt4Password .= ",";
                    $mt4Id .= $distMt4->getMt4UserName();
                    $mt4Password .= $distMt4->getMt4Password();
                }
            }
            $arr[] = array(
                $resultArr['account_id'] == null ? "" : $resultArr['account_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                /*$resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],*/
                $mt4Id,
                $resultArr['credit'] == null ? "" : $resultArr['credit'],
                $resultArr['debit'] == null ? "" : $resultArr['debit'],
                $resultArr['transaction_type'] == null ? "" : $resultArr['transaction_type'],
                $resultArr['remark'] == null ? "" : $resultArr['remark'],
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

    public function executeGroupSalesList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_dist_commission_ledger ledger
            LEFT JOIN mlm_distributor dist ON dist.distributor_id = ledger.dist_id
                WHERE ledger.remark like 'GRB%'";

        /******   total records  *******/
        $sWhere = " ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND ledger.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND ledger.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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
                $resultArr['commission_id'] == null ? "" : $resultArr['commission_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['credit'] == null ? "" : $resultArr['credit'],
                $resultArr['transaction_type'] == null ? "" : $resultArr['transaction_type'],
                $resultArr['remark'] == null ? "" : $resultArr['remark'],
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
        $sql = " FROM mlm_mt4_withdraw withdraw
            LEFT JOIN mlm_distributor dist ON dist.distributor_id = withdraw.dist_id
                WHERE 1=1 ";

        /******   total records  *******/
        $sWhere = " ";
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
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND withdraw.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND withdraw.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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
                $resultArr['withdraw_id'] == null ? "" : $resultArr['withdraw_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['amount_requested'] == null ? "" : $resultArr['amount_requested'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['remarks'] == null ? "" : $resultArr['remarks'],
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
        $sql = " , dist.distributor_id FROM mlm_dist_commission_ledger bonus
            LEFT JOIN mlm_distributor dist ON dist.distributor_id = bonus.dist_id ";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        $sql .= " (
                    select dist_id, mt4_user_name, mt4_password from mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " where mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }

        $sql .= " group by dist_id
        ) mt4 ON mt4.dist_id = dist.distributor_id ";

        /******   total records  *******/
        $sWhere = " WHERE commission_type = '". Globals::COMMISSION_TYPE_DRB."' ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        /*if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }*/
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND bonus.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND bonus.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::DIST_ID, $resultArr['distributor_id']);
            $distMt4s = MlmDistMt4Peer::doSelect($c);

            $mt4Id = "";
            $mt4Password = "";
            if (count($distMt4s)) {
                foreach ($distMt4s as $distMt4) {
                    if ($mt4Id != "")
                        $mt4Id .= ",";
                    if ($mt4Password != "")
                        $mt4Password .= ",";
                    $mt4Id .= $distMt4->getMt4UserName();
                    $mt4Password .= $distMt4->getMt4Password();
                }
            }

            $arr[] = array(
                $resultArr['commission_id'] == null ? "" : $resultArr['commission_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $mt4Id,
                //$resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['credit'] == null ? "" : $resultArr['credit'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['remark'] == null ? "" : $resultArr['remark'],
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

    public function executeTotalMt4ReloadList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_mt4_reload_fund reload
            LEFT JOIN mlm_distributor dist ON dist.distributor_id = reload.dist_id ";

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
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND reload.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND reload.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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
                $resultArr['reload_id'] == null ? "" : $resultArr['reload_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['amount'] == null ? "" : $resultArr['amount'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['remarks'] == null ? "" : $resultArr['remarks'],
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

    public function executeTotalPackagePurchaseList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_distributor dist
                INNER JOIN mlm_package package ON package.package_id = dist.init_rank_id ";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        $sql .= " (
                    select dist_id, mt4_user_name, mt4_password from mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " where mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }

        $sql .= " group by dist_id
        ) mt4 ON mt4.dist_id = dist.distributor_id ";

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
        /*if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }*/
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND dist.active_datetime >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND dist.active_datetime <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::DIST_ID, $resultArr['distributor_id']);
            $distMt4s = MlmDistMt4Peer::doSelect($c);

            $mt4Id = "";
            $mt4Password = "";
            if (count($distMt4s)) {
                foreach ($distMt4s as $distMt4) {
                    if ($mt4Id != "")
                        $mt4Id .= ",";
                    if ($mt4Password != "")
                        $mt4Password .= ",";
                    $mt4Id .= $distMt4->getMt4UserName();
                    $mt4Password .= $distMt4->getMt4Password();
                }
            }

            $arr[] = array(
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['active_datetime'] == null ? "" : $resultArr['active_datetime'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $mt4Id,
                //$resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['package_name'] == null ? "" : $resultArr['package_name'],
                $resultArr['price'] == null ? "" : $resultArr['price']
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

    public function executeTotalPackageUpgradeList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = "    FROM mlm_package_upgrade_history upgrade
            LEFT JOIN mlm_distributor dist ON dist.distributor_id = upgrade.dist_id";

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
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND upgrade.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND upgrade.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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
                $resultArr['upgrade_id'] == null ? "" : $resultArr['upgrade_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['amount'] == null ? "" : $resultArr['amount'],
                $resultArr['remarks'] == null ? "" : $resultArr['remarks'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code']
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

    public function executeTotalVolumeTradedList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_dist_commission_ledger ledger
            LEFT JOIN mlm_distributor dist ON dist.distributor_id = ledger.dist_id ";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        $sql .= " (
                    select dist_id, mt4_user_name, mt4_password from mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Id') != "") {
            $sql .= " where mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Id') . "%'";
        }

        $sql .= " group by dist_id
        ) mt4 ON mt4.dist_id = dist.distributor_id ";

        $sql .= " WHERE ledger.commission_type = '".Globals::COMMISSION_TYPE_CREDIT_REFUND."' AND ledger.transaction_type = '".Globals::COMMISSION_LEDGER_PIPS_TRADED."'";

        /******   total records  *******/
        $sWhere = " ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
        }
        if ($this->getRequestParameter('filterFullname') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullname')) . "%'";
        }
        /*if ($this->getRequestParameter('filterMt4Id') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Id')) . "%'";
        }*/
        if ($this->getRequestParameter('filterDateFrom') != "") {
            $sWhere .= " AND ledger.created_on >= '" . mysql_real_escape_string($this->getRequestParameter('filterDateFrom')) . " 00:00:00'";
        }
        if ($this->getRequestParameter('filterDateTo') != "") {
            $sWhere .= " AND ledger.created_on <= '" . mysql_real_escape_string($this->getRequestParameter('filterDateTo')) . " 23:59:59'";
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

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::DIST_ID, $resultArr['distributor_id']);
            $distMt4s = MlmDistMt4Peer::doSelect($c);

            $mt4Id = "";
            $mt4Password = "";
            if (count($distMt4s)) {
                foreach ($distMt4s as $distMt4) {
                    if ($mt4Id != "")
                        $mt4Id .= ",";
                    if ($mt4Password != "")
                        $mt4Password .= ",";
                    $mt4Id .= $distMt4->getMt4UserName();
                    $mt4Password .= $distMt4->getMt4Password();
                }
            }

            $arr[] = array(
                $resultArr['commission_id'] == null ? "" : $resultArr['commission_id'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $mt4Id,
                /*$resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],*/
                $resultArr['credit'] == null ? "" : $resultArr['credit'],
                $resultArr['remark'] == null ? "" : $resultArr['remark']
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
}
