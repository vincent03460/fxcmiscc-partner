<?php


abstract class BaseGgPurchasePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_purchase';

	
	const CLASS_DEFAULT = 'lib.model.GgPurchase';

	
	const NUM_COLUMNS = 36;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_purchase.ID';

	
	const CREATOR = 'gg_purchase.CREATOR';

	
	const CID = 'gg_purchase.CID';

	
	const REFNO = 'gg_purchase.REFNO';

	
	const MEMBER_SALE = 'gg_purchase.MEMBER_SALE';

	
	const NM_NAME = 'gg_purchase.NM_NAME';

	
	const NM_CONTACT = 'gg_purchase.NM_CONTACT';

	
	const UID = 'gg_purchase.UID';

	
	const SID = 'gg_purchase.SID';

	
	const STOCKIST_SALE = 'gg_purchase.STOCKIST_SALE';

	
	const COLLECT_ADDRESS = 'gg_purchase.COLLECT_ADDRESS';

	
	const COLLECT_CITY = 'gg_purchase.COLLECT_CITY';

	
	const COLLECT_ZIP = 'gg_purchase.COLLECT_ZIP';

	
	const COLLECT_STATE = 'gg_purchase.COLLECT_STATE';

	
	const COLLECT_COUNTRY = 'gg_purchase.COLLECT_COUNTRY';

	
	const MAIL_TYPE = 'gg_purchase.MAIL_TYPE';

	
	const SHARE_PRICE = 'gg_purchase.SHARE_PRICE';

	
	const AMOUNT = 'gg_purchase.AMOUNT';

	
	const TOTAL_BV = 'gg_purchase.TOTAL_BV';

	
	const ACTUAL_BV = 'gg_purchase.ACTUAL_BV';

	
	const TOTAL_DP = 'gg_purchase.TOTAL_DP';

	
	const ACTUAL_DP = 'gg_purchase.ACTUAL_DP';

	
	const TOTAL_RP = 'gg_purchase.TOTAL_RP';

	
	const ACTUAL_RP = 'gg_purchase.ACTUAL_RP';

	
	const TOTAL_CP = 'gg_purchase.TOTAL_CP';

	
	const DELIVERY_COST = 'gg_purchase.DELIVERY_COST';

	
	const PAYMENT_TYPE = 'gg_purchase.PAYMENT_TYPE';

	
	const COLLECTED = 'gg_purchase.COLLECTED';

	
	const COLLECTED_DATE = 'gg_purchase.COLLECTED_DATE';

	
	const FIRST_SALE = 'gg_purchase.FIRST_SALE';

	
	const NO_BV = 'gg_purchase.NO_BV';

	
	const RANK_A = 'gg_purchase.RANK_A';

	
	const STATUS = 'gg_purchase.STATUS';

	
	const REMARK = 'gg_purchase.REMARK';

	
	const CDATE = 'gg_purchase.CDATE';

	
	const EDATE = 'gg_purchase.EDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Creator', 'Cid', 'Refno', 'MemberSale', 'NmName', 'NmContact', 'Uid', 'Sid', 'StockistSale', 'CollectAddress', 'CollectCity', 'CollectZip', 'CollectState', 'CollectCountry', 'MailType', 'SharePrice', 'Amount', 'TotalBv', 'ActualBv', 'TotalDp', 'ActualDp', 'TotalRp', 'ActualRp', 'TotalCp', 'DeliveryCost', 'PaymentType', 'Collected', 'CollectedDate', 'FirstSale', 'NoBv', 'RankA', 'Status', 'Remark', 'Cdate', 'Edate', ),
		BasePeer::TYPE_COLNAME => array (GgPurchasePeer::ID, GgPurchasePeer::CREATOR, GgPurchasePeer::CID, GgPurchasePeer::REFNO, GgPurchasePeer::MEMBER_SALE, GgPurchasePeer::NM_NAME, GgPurchasePeer::NM_CONTACT, GgPurchasePeer::UID, GgPurchasePeer::SID, GgPurchasePeer::STOCKIST_SALE, GgPurchasePeer::COLLECT_ADDRESS, GgPurchasePeer::COLLECT_CITY, GgPurchasePeer::COLLECT_ZIP, GgPurchasePeer::COLLECT_STATE, GgPurchasePeer::COLLECT_COUNTRY, GgPurchasePeer::MAIL_TYPE, GgPurchasePeer::SHARE_PRICE, GgPurchasePeer::AMOUNT, GgPurchasePeer::TOTAL_BV, GgPurchasePeer::ACTUAL_BV, GgPurchasePeer::TOTAL_DP, GgPurchasePeer::ACTUAL_DP, GgPurchasePeer::TOTAL_RP, GgPurchasePeer::ACTUAL_RP, GgPurchasePeer::TOTAL_CP, GgPurchasePeer::DELIVERY_COST, GgPurchasePeer::PAYMENT_TYPE, GgPurchasePeer::COLLECTED, GgPurchasePeer::COLLECTED_DATE, GgPurchasePeer::FIRST_SALE, GgPurchasePeer::NO_BV, GgPurchasePeer::RANK_A, GgPurchasePeer::STATUS, GgPurchasePeer::REMARK, GgPurchasePeer::CDATE, GgPurchasePeer::EDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'creator', 'cid', 'refno', 'member_sale', 'nm_name', 'nm_contact', 'uid', 'sid', 'stockist_sale', 'collect_address', 'collect_city', 'collect_zip', 'collect_state', 'collect_country', 'mail_type', 'share_price', 'amount', 'total_bv', 'actual_bv', 'total_dp', 'actual_dp', 'total_rp', 'actual_rp', 'total_cp', 'delivery_cost', 'payment_type', 'collected', 'collected_date', 'first_sale', 'no_bv', 'rank_a', 'status', 'remark', 'cdate', 'edate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Creator' => 1, 'Cid' => 2, 'Refno' => 3, 'MemberSale' => 4, 'NmName' => 5, 'NmContact' => 6, 'Uid' => 7, 'Sid' => 8, 'StockistSale' => 9, 'CollectAddress' => 10, 'CollectCity' => 11, 'CollectZip' => 12, 'CollectState' => 13, 'CollectCountry' => 14, 'MailType' => 15, 'SharePrice' => 16, 'Amount' => 17, 'TotalBv' => 18, 'ActualBv' => 19, 'TotalDp' => 20, 'ActualDp' => 21, 'TotalRp' => 22, 'ActualRp' => 23, 'TotalCp' => 24, 'DeliveryCost' => 25, 'PaymentType' => 26, 'Collected' => 27, 'CollectedDate' => 28, 'FirstSale' => 29, 'NoBv' => 30, 'RankA' => 31, 'Status' => 32, 'Remark' => 33, 'Cdate' => 34, 'Edate' => 35, ),
		BasePeer::TYPE_COLNAME => array (GgPurchasePeer::ID => 0, GgPurchasePeer::CREATOR => 1, GgPurchasePeer::CID => 2, GgPurchasePeer::REFNO => 3, GgPurchasePeer::MEMBER_SALE => 4, GgPurchasePeer::NM_NAME => 5, GgPurchasePeer::NM_CONTACT => 6, GgPurchasePeer::UID => 7, GgPurchasePeer::SID => 8, GgPurchasePeer::STOCKIST_SALE => 9, GgPurchasePeer::COLLECT_ADDRESS => 10, GgPurchasePeer::COLLECT_CITY => 11, GgPurchasePeer::COLLECT_ZIP => 12, GgPurchasePeer::COLLECT_STATE => 13, GgPurchasePeer::COLLECT_COUNTRY => 14, GgPurchasePeer::MAIL_TYPE => 15, GgPurchasePeer::SHARE_PRICE => 16, GgPurchasePeer::AMOUNT => 17, GgPurchasePeer::TOTAL_BV => 18, GgPurchasePeer::ACTUAL_BV => 19, GgPurchasePeer::TOTAL_DP => 20, GgPurchasePeer::ACTUAL_DP => 21, GgPurchasePeer::TOTAL_RP => 22, GgPurchasePeer::ACTUAL_RP => 23, GgPurchasePeer::TOTAL_CP => 24, GgPurchasePeer::DELIVERY_COST => 25, GgPurchasePeer::PAYMENT_TYPE => 26, GgPurchasePeer::COLLECTED => 27, GgPurchasePeer::COLLECTED_DATE => 28, GgPurchasePeer::FIRST_SALE => 29, GgPurchasePeer::NO_BV => 30, GgPurchasePeer::RANK_A => 31, GgPurchasePeer::STATUS => 32, GgPurchasePeer::REMARK => 33, GgPurchasePeer::CDATE => 34, GgPurchasePeer::EDATE => 35, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'creator' => 1, 'cid' => 2, 'refno' => 3, 'member_sale' => 4, 'nm_name' => 5, 'nm_contact' => 6, 'uid' => 7, 'sid' => 8, 'stockist_sale' => 9, 'collect_address' => 10, 'collect_city' => 11, 'collect_zip' => 12, 'collect_state' => 13, 'collect_country' => 14, 'mail_type' => 15, 'share_price' => 16, 'amount' => 17, 'total_bv' => 18, 'actual_bv' => 19, 'total_dp' => 20, 'actual_dp' => 21, 'total_rp' => 22, 'actual_rp' => 23, 'total_cp' => 24, 'delivery_cost' => 25, 'payment_type' => 26, 'collected' => 27, 'collected_date' => 28, 'first_sale' => 29, 'no_bv' => 30, 'rank_a' => 31, 'status' => 32, 'remark' => 33, 'cdate' => 34, 'edate' => 35, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgPurchaseMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgPurchaseMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgPurchasePeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(GgPurchasePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgPurchasePeer::ID);

		$criteria->addSelectColumn(GgPurchasePeer::CREATOR);

		$criteria->addSelectColumn(GgPurchasePeer::CID);

		$criteria->addSelectColumn(GgPurchasePeer::REFNO);

		$criteria->addSelectColumn(GgPurchasePeer::MEMBER_SALE);

		$criteria->addSelectColumn(GgPurchasePeer::NM_NAME);

		$criteria->addSelectColumn(GgPurchasePeer::NM_CONTACT);

		$criteria->addSelectColumn(GgPurchasePeer::UID);

		$criteria->addSelectColumn(GgPurchasePeer::SID);

		$criteria->addSelectColumn(GgPurchasePeer::STOCKIST_SALE);

		$criteria->addSelectColumn(GgPurchasePeer::COLLECT_ADDRESS);

		$criteria->addSelectColumn(GgPurchasePeer::COLLECT_CITY);

		$criteria->addSelectColumn(GgPurchasePeer::COLLECT_ZIP);

		$criteria->addSelectColumn(GgPurchasePeer::COLLECT_STATE);

		$criteria->addSelectColumn(GgPurchasePeer::COLLECT_COUNTRY);

		$criteria->addSelectColumn(GgPurchasePeer::MAIL_TYPE);

		$criteria->addSelectColumn(GgPurchasePeer::SHARE_PRICE);

		$criteria->addSelectColumn(GgPurchasePeer::AMOUNT);

		$criteria->addSelectColumn(GgPurchasePeer::TOTAL_BV);

		$criteria->addSelectColumn(GgPurchasePeer::ACTUAL_BV);

		$criteria->addSelectColumn(GgPurchasePeer::TOTAL_DP);

		$criteria->addSelectColumn(GgPurchasePeer::ACTUAL_DP);

		$criteria->addSelectColumn(GgPurchasePeer::TOTAL_RP);

		$criteria->addSelectColumn(GgPurchasePeer::ACTUAL_RP);

		$criteria->addSelectColumn(GgPurchasePeer::TOTAL_CP);

		$criteria->addSelectColumn(GgPurchasePeer::DELIVERY_COST);

		$criteria->addSelectColumn(GgPurchasePeer::PAYMENT_TYPE);

		$criteria->addSelectColumn(GgPurchasePeer::COLLECTED);

		$criteria->addSelectColumn(GgPurchasePeer::COLLECTED_DATE);

		$criteria->addSelectColumn(GgPurchasePeer::FIRST_SALE);

		$criteria->addSelectColumn(GgPurchasePeer::NO_BV);

		$criteria->addSelectColumn(GgPurchasePeer::RANK_A);

		$criteria->addSelectColumn(GgPurchasePeer::STATUS);

		$criteria->addSelectColumn(GgPurchasePeer::REMARK);

		$criteria->addSelectColumn(GgPurchasePeer::CDATE);

		$criteria->addSelectColumn(GgPurchasePeer::EDATE);

	}

	const COUNT = 'COUNT(gg_purchase.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_purchase.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgPurchasePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgPurchasePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgPurchasePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = GgPurchasePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgPurchasePeer::populateObjects(GgPurchasePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgPurchasePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgPurchasePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return GgPurchasePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgPurchasePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(GgPurchasePeer::ID);
			$selectCriteria->add(GgPurchasePeer::ID, $criteria->remove(GgPurchasePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(GgPurchasePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(GgPurchasePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgPurchase) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgPurchasePeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(GgPurchase $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgPurchasePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgPurchasePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(GgPurchasePeer::DATABASE_NAME, GgPurchasePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgPurchasePeer::DATABASE_NAME);

		$criteria->add(GgPurchasePeer::ID, $pk);


		$v = GgPurchasePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(GgPurchasePeer::ID, $pks, Criteria::IN);
			$objs = GgPurchasePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgPurchasePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgPurchaseMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgPurchaseMapBuilder');
}
