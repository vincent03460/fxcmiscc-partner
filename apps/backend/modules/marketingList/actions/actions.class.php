<?php

/**
 * marketingList actions.
 *
 * @package    sf_sandbox
 * @subpackage marketingList
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class marketingListActions extends sfActions
{
    public function executeEzyCashCardApplicationList()
    {
        $page = intval($this->getRequestParameter('page'));
	    $limit = intval($this->getRequestParameter('displayLength'));

        $offset = ($page-1) * $limit;
        $result = array();

        $sWhere = " WHERE 1=1";
        $sql = " FROM mlm_ezy_cash_card debit
                    LEFT JOIN mlm_distributor dist ON debit.dist_id = dist.distributor_id";

        $result["total"] = $this->getTotalRecords($sql.$sWhere);

        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);
        $sColumns = "debit.card_id, debit.dist_id, debit.qty, debit.sub_total, debit.status_code, debit.remark, debit.created_on
            , debit.remark, dist.distributor_code, dist.full_name, dist.email, dist.contact";
        /******   sorting  *******/
        $sOrder = " ";
        $order = $this->getRequestParameter('order');
        $sortField = $this->getRequestParameter('sort');
        if ($this->getRequestParameter('sort')) {
            $sOrder = " ORDER BY ".$sortField." ".$order;
        }

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $items = array();
        while ($resultset->next())
        {
            $row = $resultset->getRow();
            array_push($items, $row);
        }
        $result["rows"] = $items;

        echo json_encode($result);

        return sfView::HEADER_ONLY;
    }
    public function executeDebitCardApplicationList()
    {
        $page = intval($this->getRequestParameter('page'));
	    $limit = intval($this->getRequestParameter('displayLength'));

        $offset = ($page-1) * $limit;
        $result = array();

        $sWhere = " WHERE 1=1";
        $sql = " FROM mlm_debit_card_registration debit
                    LEFT JOIN mlm_distributor dist ON debit.dist_id = dist.distributor_id";

        $result["total"] = $this->getTotalRecords($sql.$sWhere);

        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);
        $sColumns = "debit.card_id, debit.dist_id, debit.account_id, debit.status_code, debit.full_name, debit.dob, debit.ic, debit.mother_maiden_name
        , debit.name_on_card, debit.address, debit.address2, debit.city, debit.state, debit.postcode, debit.country, debit.email, debit.contact
        , debit.created_by, debit.created_on, debit.updated_by, debit.updated_on, debit.remark, dist.distributor_code";
        /******   sorting  *******/
        $sOrder = " ";
        $order = $this->getRequestParameter('order');
        $sortField = $this->getRequestParameter('sort');
        if ($this->getRequestParameter('sort')) {
            $sOrder = " ORDER BY ".$sortField." ".$order;
        }

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $items = array();
        while ($resultset->next())
        {
            $row = $resultset->getRow();
            array_push($items, $row);
        }
        $result["rows"] = $items;

        echo json_encode($result);

        return sfView::HEADER_ONLY;
    }
    public function executeLiveAccountRequestList()
    {
        $page = intval($this->getRequestParameter('page'));
	    $limit = intval($this->getRequestParameter('displayLength'));

        $offset = ($page-1) * $limit;
        $result = array();

        $sWhere = " WHERE live_demo = 'LIVE'";
        $sql = " FROM mlm_mt4_demo_request ";

        $result["total"] = $this->getTotalRecords($sql.$sWhere);

        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);
        $sColumns = "request_id, first_name, email, status_code, created_by, created_on, updated_by, updated_on, country, phone_number, last_name, title, live_demo, address1, address2, agree_of_business, risk_disclosure, country_of_citizen, dob_day, dob_month, dob_year, ref_id, passport, subject, city, address_state";
        /******   sorting  *******/
        $sOrder = " ";
        $order = $this->getRequestParameter('order');
        $sortField = $this->getRequestParameter('sort');
        if ($this->getRequestParameter('sort')) {
            $sOrder = " ORDER BY ".$sortField." ".$order;
        }

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $items = array();
        while ($resultset->next())
        {
            $row = $resultset->getRow();
            array_push($items, $row);
        }
        $result["rows"] = $items;

        echo json_encode($result);

        return sfView::HEADER_ONLY;
    }
    public function executeDemoAccountRequestList()
    {
        $page = intval($this->getRequestParameter('page'));
	    $limit = intval($this->getRequestParameter('displayLength'));

        $offset = ($page-1) * $limit;
        $result = array();

        $sWhere = " WHERE live_demo = 'DEMO'";
        $sql = " FROM mlm_mt4_demo_request ";

        $result["total"] = $this->getTotalRecords($sql.$sWhere);

        $sLimit = " LIMIT " . mysql_real_escape_string($offset) . ", " . mysql_real_escape_string($limit);
        $sColumns = "request_id, first_name, email, status_code, created_by, created_on, updated_by, updated_on, country, phone_number, last_name, title, live_demo, address1, address2, agree_of_business, risk_disclosure, country_of_citizen, dob_day, dob_month, dob_year, ref_id, passport, subject, city, address_state";
        /******   sorting  *******/
        $sOrder = " ";
        $order = $this->getRequestParameter('order');
        $sortField = $this->getRequestParameter('sort');
        if ($this->getRequestParameter('sort')) {
            $sOrder = " ORDER BY ".$sortField." ".$order;
        }

        $query = "SELECT " . $sColumns . " " . $sql . " " . $sWhere . " " . $sOrder . " " . $sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $items = array();
        while ($resultset->next())
        {
            $row = $resultset->getRow();
            array_push($items, $row);
        }
        $result["rows"] = $items;

        echo json_encode($result);

        return sfView::HEADER_ONLY;
    }
    public function executeCustomerEnquiryList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        $sql = " FROM mlm_customer_enquiry customer
                    LEFT JOIN mlm_distributor dist ON customer.distributor_id = dist.distributor_id";

        /******   total records  *******/
        $sWhere = " WHERE 1=1";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterSubject') != "") {
            $sWhere .= " AND customer.title like '%" . $this->getRequestParameter('filterSubject') ."%'";
        }
        if ($this->getRequestParameter('filterDistCode') != "") {
            $sWhere .= " AND dist.distributor_code like '%" . $this->getRequestParameter('filterDistCode') ."%'";
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
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $lastReply = "";
            $read = "";

            if ($resultArr['distributor_updated'] == "T") {
                $lastReply = "<font style='color:red'>Yes</font>";
            }
            if ($resultArr['admin_read'] == "T") {
                $read = "Read";
            } else {
                $read = "Unread";
            }
            $arr[] = array(
                $resultArr['enquiry_id'] == null ? "" : $resultArr['enquiry_id'],
                $resultArr['updated_on'] == null ? "" : $resultArr['updated_on'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['title'] == null ? "" : $resultArr['title'],
                $lastReply,
                $read
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
    public function executeAdminUserList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);
        $sColumns = str_replace("createdBy", "createdBy.username as createdBy", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        $sql = " FROM mlm_admin a
            LEFT JOIN app_user u ON a.user_id = u.user_id
            LEFT JOIN app_user createdBy ON createdBy.user_id = a.created_by";

        /******   total records  *******/
        $sWhere = " WHERE a.admin_role <> 'SUPERADMIN' ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterUsername') != "") {
            $sWhere .= " AND u.username LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterUsername')) . "%'";
            //$c->addAnd(sfPropelPager::F_DIST_CODE2, "%" . $this->getRequestParameter('filterDistcode') . "%", Criteria::LIKE);
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

            $arr[] = array(
                $resultArr['user_id'] == null ? "" : $resultArr['user_id'],
                $resultArr['user_id'] == null ? "" : $resultArr['user_id'],
                $resultArr['username'] == null ? "" : $resultArr['username'],
                $resultArr['userpassword'] == null ? "" : $resultArr['userpassword'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['admin_role'] == null ? "" : $resultArr['admin_role'],
                $resultArr['createdBy'] == null ? "" : $resultArr['createdBy'],
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

    public function executeRoleList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);
        //$sColumns = str_replace("createdBy", "createdBy.username as createdBy", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        $sql = " FROM app_user_role ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterRoleCode') != "") {
            $sWhere .= " AND role_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterRoleCode')) . "%'";
            //$c->addAnd(sfPropelPager::F_DIST_CODE2, "%" . $this->getRequestParameter('filterDistcode') . "%", Criteria::LIKE);
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

            $arr[] = array(
                $resultArr['role_id'] == null ? "" : $resultArr['role_id'],
                $resultArr['role_id'] == null ? "" : $resultArr['role_id'],
                $resultArr['role_code'] == null ? "" : $resultArr['role_code'],
                $resultArr['role_desc'] == null ? "" : $resultArr['role_desc'],
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

    public function executeDistList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        //$sColumns = "dist.distributor_id,dist.distributor_id,dist.distributor_code,dist.rank_code,epointWallet.SUM_EPOINT,ewalletWallet.SUM_ECASH,mt4Wallet.SUM_MT4,tblUser.userpassword,tblUser.userpassword2,dist.mt4_user_name,dist.mt4_password,dist.full_name,dist.nickname,dist.ic,dist.country,dist.address,dist.postcode,dist.email,dist.contact,dist.gender,dist.dob,dist.bank_name,dist.bank_acc_no,dist.bank_holder_name,dist.bank_swift_code,dist.visa_debit_card,dist.upline_dist_code,dist.status_code,dist.created_on,dist.file_bank_pass_book,dist.file_proof_of_residence,dist.file_nric";
        //var_dump($this->getRequestParameter('iSortingCols'));
        $aColumns = explode(",", $sColumns);


        //$sColumns = str_replace("parent_nickname", "parentUser.distributor_code as parent_nickname", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        $sql = " FROM mlm_distributor dist
            LEFT JOIN
            (
                SELECT SUM(credit - debit) AS SUM_EPOINT, dist_id FROM mlm_account_ledger WHERE account_type = 'EPOINT' GROUP BY dist_id
            ) epointWallet ON epointWallet.dist_id = dist.distributor_id
            LEFT JOIN
            (
                SELECT SUM(credit - debit) AS SUM_ECASH, dist_id FROM mlm_account_ledger WHERE account_type = 'ECASH' GROUP BY dist_id
            ) ewalletWallet ON ewalletWallet.dist_id = dist.distributor_id
            LEFT JOIN app_user tblUser ON dist.user_id = tblUser.user_id
            LEFT JOIN mlm_package package ON dist.init_rank_id = package.package_id
            LEFT JOIN mlm_distributor parentUser ON dist.upline_dist_id = parentUser.distributor_id ";

         if ($this->getRequestParameter('filterMt4Userame') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        $sql .= " (
                    select dist_id, mt4_user_name, mt4_password from mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Userame') != "") {
            $sql .= " where mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Userame') . "%'";
        }

        $sql .= " group by dist_id
        ) mt4 ON mt4.dist_id = dist.distributor_id ";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);
        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterDistcode') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterDistcode')) . "%'";
        }

        /*if ($this->getRequestParameter('filterMt4Userame') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Userame') . "%'";
        }*/

        if ($this->getRequestParameter('filterFullName') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullName')) . "%'";
        }
        if ($this->getRequestParameter('filterEmail') != "") {
            $sWhere .= " AND dist.email LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterEmail')) . "%'";
        }
        if ($this->getRequestParameter('filterParentCode') != "") {
            $sWhere .= " AND dist.upline_dist_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterParentCode')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND dist.status_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "%'";
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

            $packageAmount = $resultArr['price'] == null ? 0 : $resultArr['price'];
            $totalUpgradeAmount = $this->getTotalUpgradeAmount($resultArr['distributor_id']);

            $packageAmount = $packageAmount + $totalUpgradeAmount;

            $arr[] = array(
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                number_format($packageAmount,0),
                $resultArr['SUM_EPOINT'] == null ? "0" : number_format($resultArr['SUM_EPOINT'], 2),
                $resultArr['SUM_ECASH'] == null ? "0" : number_format($resultArr['SUM_ECASH'], 2),
                $resultArr['userpassword'] == null ? "" : $resultArr['userpassword'],
                $resultArr['userpassword2'] == null ? "" : $resultArr['userpassword2'],
                $mt4Id,
                $mt4Password,
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['nickname'] == null ? "" : $resultArr['nickname'],
                $resultArr['ic'] == null ? "" : $resultArr['ic'],
                $resultArr['country'] == null ? "" : $resultArr['country'],
                $resultArr['address'] == null ? "" : $resultArr['address'],
                $resultArr['postcode'] == null ? "" : $resultArr['postcode'],
                $resultArr['email'] == null ? "" : $resultArr['email'],
                $resultArr['contact'] == null ? "" : $resultArr['contact'],
                $resultArr['gender'] == null ? "" : $resultArr['gender'],
                $resultArr['dob'] == null ? "" : $resultArr['dob'],
                $resultArr['bank_name'] == null ? "" : $resultArr['bank_name'],
                $resultArr['bank_acc_no'] == null ? "" : $resultArr['bank_acc_no'],
                $resultArr['bank_holder_name'] == null ? "" : $resultArr['bank_holder_name'],
                $resultArr['bank_swift_code'] == null ? "" : $resultArr['bank_swift_code'],
                $resultArr['visa_debit_card'] == null ? "" : $resultArr['visa_debit_card'],
                $resultArr['upline_dist_code'] == null ? "" : $resultArr['upline_dist_code'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on']
                , $resultArr['file_bank_pass_book'] == null ? "" : $resultArr['file_bank_pass_book']
                , $resultArr['file_proof_of_residence'] == null ? "" : $resultArr['file_proof_of_residence']
                , $resultArr['file_nric'] == null ? "" : $resultArr['file_nric']
                , $resultArr['bank_branch'] == null ? "" : $resultArr['bank_branch']
                , $resultArr['bank_address'] == null ? "" : $resultArr['bank_address']
                , $resultArr['remark'] == null ? "" : $resultArr['remark']
                , $resultArr['register_remark'] == null ? "" : $resultArr['register_remark']
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

    public function executeIbList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);
        //$sColumns = str_replace("parent_nickname", "parentUser.distributor_code as parent_nickname", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        $sql = "FROM mlm_distributor dist
            LEFT JOIN app_user tblUser ON dist.user_id = tblUser.user_id
            LEFT JOIN mlm_distributor parentUser ON dist.upline_dist_id = parentUser.distributor_id ";

        if ($this->getRequestParameter('filterMt4Userame') != "") {
            $sql .= " INNER JOIN ";
        } else {
            $sql .= " LEFT JOIN ";
        }

        $sql .= " (
                    select dist_id, mt4_user_name, mt4_password from mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Userame') != "") {
            $sql .= " where mt4_user_name LIKE '%" . $this->getRequestParameter('filterMt4Userame') . "%'";
        }

        $sql .= " group by dist_id
        ) mt4 ON mt4.dist_id = dist.distributor_id ";

        /******   total records  *******/
        $sWhere = " WHERE dist.IS_IB =".Globals::YES;
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterDistcode') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterDistcode')) . "%'";
        }
        /*if ($this->getRequestParameter('filterMt4Userame') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Userame')) . "%'";
        }*/
        if ($this->getRequestParameter('filterFullName') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullName')) . "%'";
        }
        if ($this->getRequestParameter('filterEmail') != "") {
            $sWhere .= " AND dist.email LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterEmail')) . "%'";
        }
        if ($this->getRequestParameter('filterParentCode') != "") {
            $sWhere .= " AND dist.upline_dist_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterParentCode')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND dist.status_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "%'";
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
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['rank_code'] == null ? "" : $resultArr['rank_code'],
                $resultArr['userpassword'] == null ? "" : $resultArr['userpassword'],
                $resultArr['userpassword2'] == null ? "" : $resultArr['userpassword2'],
                $mt4Id,
                $mt4Password,
                //$resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                //$resultArr['mt4_password'] == null ? "" : $resultArr['mt4_password'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['nickname'] == null ? "" : $resultArr['nickname'],
                $resultArr['ic'] == null ? "" : $resultArr['ic'],
                $resultArr['country'] == null ? "" : $resultArr['country'],
                $resultArr['address'] == null ? "" : $resultArr['address'],
                $resultArr['postcode'] == null ? "" : $resultArr['postcode'],
                $resultArr['email'] == null ? "" : $resultArr['email'],
                $resultArr['contact'] == null ? "" : $resultArr['contact'],
                $resultArr['gender'] == null ? "" : $resultArr['gender'],
                $resultArr['dob'] == null ? "" : $resultArr['dob'],
                $resultArr['bank_name'] == null ? "" : $resultArr['bank_name'],
                $resultArr['bank_acc_no'] == null ? "" : $resultArr['bank_acc_no'],
                $resultArr['bank_holder_name'] == null ? "" : $resultArr['bank_holder_name'],
                $resultArr['bank_swift_code'] == null ? "" : $resultArr['bank_swift_code'],
                $resultArr['visa_debit_card'] == null ? "" : $resultArr['visa_debit_card'],
                $resultArr['upline_dist_code'] == null ? "" : $resultArr['upline_dist_code'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['ib_commission'] == null ? "" : $resultArr['ib_commission']
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

    public function executeDistPipsList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);
        //$sColumns = str_replace("parent_nickname", "parentUser.distributor_code as parent_nickname", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        $sql = "FROM mlm_distributor dist
            LEFT JOIN app_user tblUser ON dist.user_id = tblUser.user_id
            LEFT JOIN mlm_distributor parentUser ON dist.upline_dist_id = parentUser.distributor_id
            LEFT JOIN (
                SELECT SUM(credit-debit) AS SUB_TOTAL, dist_id FROM mlm_dist_commission_ledger WHERE commission_type = '" . Globals::COMMISSION_TYPE_PIPS_BONUS . "' GROUP BY dist_id
            ) comm ON dist.distributor_id = comm.dist_id";

        /******   total records  *******/
        $sWhere = " WHERE 1=1 ";
        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterDistcode') != "") {
            $sWhere .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterDistcode')) . "%'";
        }
        if ($this->getRequestParameter('filterMt4Userame') != "") {
            $sWhere .= " AND dist.mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Userame')) . "%'";
        }
        if ($this->getRequestParameter('filterFullName') != "") {
            $sWhere .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullName')) . "%'";
        }
        if ($this->getRequestParameter('filterEmail') != "") {
            $sWhere .= " AND dist.email LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterEmail')) . "%'";
        }
        if ($this->getRequestParameter('filterParentCode') != "") {
            $sWhere .= " AND dist.upline_dist_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterParentCode')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sWhere .= " AND dist.status_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "%'";
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

            $arr[] = array(
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_id'] == null ? "" : $resultArr['distributor_id'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['rank_code'] == null ? "" : $resultArr['rank_code'],
                $resultArr['userpassword'] == null ? "" : $resultArr['userpassword'],
                $resultArr['userpassword2'] == null ? "" : $resultArr['userpassword2'],
                $resultArr['mt4_user_name'] == null ? "" : $resultArr['mt4_user_name'],
                $resultArr['mt4_password'] == null ? "" : $resultArr['mt4_password'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['nickname'] == null ? "" : $resultArr['nickname'],
                $resultArr['ic'] == null ? "" : $resultArr['ic'],
                $resultArr['country'] == null ? "" : $resultArr['country'],
                $resultArr['address'] == null ? "" : $resultArr['address'],
                $resultArr['postcode'] == null ? "" : $resultArr['postcode'],
                $resultArr['email'] == null ? "" : $resultArr['email'],
                $resultArr['contact'] == null ? "" : $resultArr['contact'],
                $resultArr['gender'] == null ? "" : $resultArr['gender'],
                $resultArr['dob'] == null ? "" : $resultArr['dob'],
                $resultArr['bank_name'] == null ? "" : $resultArr['bank_name'],
                $resultArr['bank_acc_no'] == null ? "" : $resultArr['bank_acc_no'],
                $resultArr['bank_holder_name'] == null ? "" : $resultArr['bank_holder_name'],
                $resultArr['bank_swift_code'] == null ? "" : $resultArr['bank_swift_code'],
                $resultArr['visa_debit_card'] == null ? "" : $resultArr['visa_debit_card'],
                $resultArr['upline_dist_code'] == null ? "" : $resultArr['upline_dist_code'],
                $resultArr['status_code'] == null ? "" : $resultArr['status_code'],
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['SUB_TOTAL'] == null ? "" : $resultArr['SUB_TOTAL']
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

    /************************************/
    /********   FUNCTION        *********/
    /************************************/
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

    function getTotalUpgradeAmount($distId)
    {
        $query = "SELECT SUM(package.price) AS _sum
                        FROM grandegoldens.mlm_distributor newDist
                            LEFT JOIN grandegoldens.mlm_package_upgrade_history history ON history.dist_id = newDist.distributor_id
                            LEFT JOIN grandegoldens.mlm_package package ON package.package_id = history.package_id
                        WHERE newDist.loan_account = 'N'
                            AND history.transaction_code = 'PACKAGE UPGRADE' AND newDist.distributor_id = ".$distId."
                        group by dist_id";
        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $count = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_sum"] != null) {
                $count = $arr["_sum"];
            } else {
                $count = 0;
            }
        }
        return $count;
    }
}
