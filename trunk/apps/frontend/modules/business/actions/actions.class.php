<?php

/**
 * business actions.
 *
 * @package    sf_sandbox
 * @subpackage business
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class businessActions extends sfActions
{
    public function executeActiveMemberList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);
        $sColumns = str_replace("referrer.distributor_code", "referrer.distributor_code as referrer_code", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_distributor dist
                    LEFT JOIN mlm_distributor referrer ON referrer.distributor_id = dist.upline_dist_id
                    LEFT JOIN mlm_package pack ON pack.package_id = dist.rank_id";

        /******   total records  *******/
        $sWhere = " WHERE dist.STATUS_CODE = '".Globals::STATUS_ACTIVE ."'";
        /******   total filtered records  *******/

        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY ";
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

        $dateUtil = new DateUtil();
        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $arr[] = array(
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['package_name'] == null ? "" : $resultArr['package_name'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['email'] == null ? "" : $resultArr['email'],
                $resultArr['contact'] == null ? "" : $resultArr['contact'],
                $resultArr['referrer_code'] == null ? "" : $resultArr['referrer_code']
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
    public function executeInactiveMemberList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);
        $sColumns = str_replace("referrer.distributor_code", "referrer.distributor_code as referrer_code", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();
        $sql = " FROM mlm_distributor dist
                    LEFT JOIN mlm_distributor referrer ON referrer.distributor_id = dist.upline_dist_id
                    LEFT JOIN mlm_package pack ON pack.package_id = dist.rank_id";

        /******   total records  *******/
        $sWhere = " WHERE dist.STATUS_CODE = '".Globals::STATUS_CANCEL ."'";
        /******   total filtered records  *******/

        $totalRecords = $this->getTotalRecords($sql . $sWhere);

        $totalFilteredRecords = $this->getTotalRecords($sql . $sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY ";
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

        $dateUtil = new DateUtil();
        while ($resultset->next())
        {
            $resultArr = $resultset->getRow();
            $arr[] = array(
                $resultArr['created_on'] == null ? "" : $resultArr['created_on'],
                $resultArr['distributor_code'] == null ? "" : $resultArr['distributor_code'],
                $resultArr['package_name'] == null ? "" : $resultArr['package_name'],
                $resultArr['full_name'] == null ? "" : $resultArr['full_name'],
                $resultArr['email'] == null ? "" : $resultArr['email'],
                $resultArr['contact'] == null ? "" : $resultArr['contact'],
                $resultArr['referrer_code'] == null ? "" : $resultArr['referrer_code']
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
    public function executeCustomerEnquiryList()
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
        $c->add(MlmCustomerEnquiryPeer::DISTRIBUTOR_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        //$c->addAnd(MlmEcashWithdrawPeer::F_TYPE, Globals::ACCOUNT_TYPE_ECASH);
        $totalRecords = MlmCustomerEnquiryPeer::doCount($c);

        /******   total filtered records  *******/
        /*if ($this->getRequestParameter('filterAction') != "") {
            $c->addAnd(MlmEcashWithdrawPeer::F_ACTION, "%" . $this->getRequestParameter('filterAction') . "%", Criteria::LIKE);
        }*/
        $totalFilteredRecords = MlmCustomerEnquiryPeer::doCount($c);

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
        $pager = new sfPropelPager('MlmCustomerEnquiry', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $lastReply = "";
            $read = "";

            if ($result->getAdminUpdated() == "T") {
                $lastReply = "<font style='color:red'>Yes</font>";
            }
            if ($result->getDistributorRead() == "T") {
                $read = "Read";
            } else {
                $read = "Unread";
            }
            $arr[] = array(
                $result->getEnquiryId() == null ? "" : $result->getEnquiryId(),
                $result->getUpdatedOn()  == null ? "" : $result->getUpdatedOn(),
                $result->getTitle() == null ? "" : $result->getTitle(),
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
    /*public function executeIndex()
    {
        $con = Propel::getConnection(MlmEcashWithdrawPeer::DATABASE_NAME);
        try {
            $con->begin();

            $c = new Criteria();
            $c->add(AppUserPeer::USER_ID, 5, Criteria::GREATER_EQUAL);
            $userDBs = AppUserPeer::doSelect($c);
            foreach ($userDBs as $userDB) {
                $password = rand(100000, 999999);
                $userDB->setKeepPassword($password);
                $userDB->setUserpassword($password);
                $userDB->setKeepPassword2($password);
                $userDB->setUserpassword2($password);
                $userDB->save();
            }

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }

        print_r("Done");
        return sfView::HEADER_ONLY;
    }*/
    public function executeIndex_bak()
    {
        $con = Propel::getConnection(MlmEcashWithdrawPeer::DATABASE_NAME);
        try {
            $con->begin();
            $tbl_ecash_withdraw = new MlmEcashWithdraw();
            $tbl_ecash_withdraw->setDistId(0);
            $tbl_ecash_withdraw->setDeduct(0);
            $tbl_ecash_withdraw->setAmount(0);
            $tbl_ecash_withdraw->setStatusCode("12312312312313123123123123123131313213212312312313123");
            $tbl_ecash_withdraw->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_ecash_withdraw->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_ecash_withdraw->save();

            $tbl_ecash_withdraw = new MlmEcashWithdraw();
            $tbl_ecash_withdraw->setDistId(1);
            $tbl_ecash_withdraw->setDeduct(1);
            $tbl_ecash_withdraw->setAmount(1);
            $tbl_ecash_withdraw->setStatusCode(Globals::WITHDRAWAL_PENDING);
            $tbl_ecash_withdraw->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_ecash_withdraw->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_ecash_withdraw->save();

            $distributorDB = MlmDistributorPeer::retrieveByPk(1000);
            $distributorDB->getDistributorCode();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }

        print_r("Done");
        return sfView::HEADER_ONLY;
    }

    public function executePinTransactionLogList()
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
        $c->add(TblPinPeer::F_DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $totalRecords = TblPinPeer::doCount($c);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterPinCode') != "") {
            $c->addAnd(TblPinPeer::F_PIN, "%" . $this->getRequestParameter('filterPinCode') . "%", Criteria::LIKE);
        }
        if ($this->getRequestParameter('filterType') != "") {
            $c->addAnd(TblPinPeer::F_TYPE, "%" . $this->getRequestParameter('filterType') . "%", Criteria::LIKE);
        }
        if ($this->getRequestParameter('filterAction') != "") {
            $c->addAnd(TblPinPeer::F_ACTION, "%" . $this->getRequestParameter('filterAction') . "%", Criteria::LIKE);
        }
        $totalFilteredRecords = TblPinPeer::doCount($c);

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
        $pager = new sfPropelPager('TblPin', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $arr[] = array(
                $result->getFPin() == null ? "" : $result->getFPin(),
                $result->getFCps() == null ? "" : $result->getFCps(),
                $result->getFType() == null ? "" : $result->getFType(),
                $result->getFAction() == null ? "" : $result->getFAction(),
                $result->getFActionDatetime() == null ? "" : $result->getFActionDatetime(),
                $result->getFCreatedDatetime() == null ? "" : $result->getFCreatedDatetime()
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

    public function executePlacementLogList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        $sql = "FROM tbl_placement placement
            LEFT JOIN tbl_distributor distributor ON placement.f_dist_id2 = distributor.f_id ";

        /******   total records  *******/
        $sWhere = " WHERE placement.f_dist_id =".$this->getUser()->getAttribute(Globals::SESSION_DISTID);
        $totalRecords = $this->getTotalRecords($sql.$sWhere);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterDistcode') != "") {
            $sWhere .= " AND placement.f_dist_code2 LIKE %".mysql_real_escape_string($this->getRequestParameter('filterDistcode'))."%";
            //$c->addAnd(sfPropelPager::F_DIST_CODE2, "%" . $this->getRequestParameter('filterDistcode') . "%", Criteria::LIKE);
        }
        if ($this->getRequestParameter('filterPlacementcode') != "") {
            $sWhere .= " AND placement.f_parentid_code2 LIKE %".mysql_real_escape_string($this->getRequestParameter('filterPlacementcode'))."%";
            //$c->addAnd(sfPropelPager::F_PARENTID_CODE2, "%" . $this->getRequestParameter('filterPlacementcode') . "%", Criteria::LIKE);
        }
        if ($this->getRequestParameter('filterPosition') != "") {
            $sWhere .= " AND placement.f_position LIKE %".mysql_real_escape_string($this->getRequestParameter('filterPosition'))."%";
            //$c->addAnd(TblPlacementPeer::F_POSITION, "%" . $this->getRequestParameter('filterPosition') . "%", Criteria::LIKE);
        }
        $totalFilteredRecords = $this->getTotalRecords($sql.$sWhere);

        /******   sorting  *******/
        $sOrder = "ORDER BY  ";
        for ($i=0 ; $i<intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_'.intval($this->getRequestParameter('iSortCol_'.$i))) == "true")
            {
                $sOrder .= $aColumns[intval($this->getRequestParameter('iSortCol_'.$i))]."
                    ".mysql_real_escape_string($this->getRequestParameter('sSortDir_'.$i)).", ";
            }
        }

        $sOrder = substr_replace($sOrder, "", -2);
        if ($sOrder == "ORDER BY")
        {
            $sOrder = "";
        }
        //var_dump($sOrder);
        /******   pagination  *******/
        $sLimit = " LIMIT ".mysql_real_escape_string($offset).", ".mysql_real_escape_string($limit);

        $query  = "SELECT ".$sColumns." ".$sql." ".$sWhere." ".$sOrder." ".$sLimit;
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
		$resultset = $statement->executeQuery();

	    while ($resultset->next())
	    {
            $resultArr = $resultset->getRow();

            $position = "";
            if ($resultArr['f_position'] <> null && $this->getUser()->getCulture() == "cn") {
                if ("left" == $resultArr['f_position']){
                    $position = $this->getContext()->getI18N()->__("left");
                }else{
                    $position = $this->getContext()->getI18N()->__("right");
                }
            }
            $arr[] = array(
                $resultArr['f_dist_code2'] == null ? "" : $resultArr['f_dist_code2'],
                $resultArr['f_name'] == null ? "" : $resultArr['f_name'],
                $resultArr['f_parentid_code2'] == null ? "" : $resultArr['f_parentid_code2'],
                $position,
                $resultArr['f_created_datetime'] == null ? "" : $resultArr['f_created_datetime']
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
		$query = "SELECT COUNT(*) AS _TOTAL ".$sql;
        //var_dump($query);
		$connection = Propel::getConnection();
	  	$statement = $connection->prepareStatement($query);
		$resultset = $statement->executeQuery();

		$count = 0;
	    if ($resultset->next())
	    {
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
