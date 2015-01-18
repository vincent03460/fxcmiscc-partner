<?php


abstract class BaseMlmPackagePurchasePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_package_purchase';

	
	const CLASS_DEFAULT = 'lib.model.MlmPackagePurchase';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const BANKSLIP_ID = 'mlm_package_purchase.BANKSLIP_ID';

	
	const DIST_ID = 'mlm_package_purchase.DIST_ID';

	
	const RANK_ID = 'mlm_package_purchase.RANK_ID';

	
	const RANK_CODE = 'mlm_package_purchase.RANK_CODE';

	
	const AMOUNT = 'mlm_package_purchase.AMOUNT';

	
	const TRANSACTION_TYPE = 'mlm_package_purchase.TRANSACTION_TYPE';

	
	const IMAGE_SRC = 'mlm_package_purchase.IMAGE_SRC';

	
	const STATUS_CODE = 'mlm_package_purchase.STATUS_CODE';

	
	const REMARKS = 'mlm_package_purchase.REMARKS';

	
	const APPROVE_REJECT_DATETIME = 'mlm_package_purchase.APPROVE_REJECT_DATETIME';

	
	const APPROVED_BY_USERID = 'mlm_package_purchase.APPROVED_BY_USERID';

	
	const CREATED_BY = 'mlm_package_purchase.CREATED_BY';

	
	const CREATED_ON = 'mlm_package_purchase.CREATED_ON';

	
	const UPDATED_BY = 'mlm_package_purchase.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_package_purchase.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('BankslipId', 'DistId', 'RankId', 'RankCode', 'Amount', 'TransactionType', 'ImageSrc', 'StatusCode', 'Remarks', 'ApproveRejectDatetime', 'ApprovedByUserid', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePurchasePeer::BANKSLIP_ID, MlmPackagePurchasePeer::DIST_ID, MlmPackagePurchasePeer::RANK_ID, MlmPackagePurchasePeer::RANK_CODE, MlmPackagePurchasePeer::AMOUNT, MlmPackagePurchasePeer::TRANSACTION_TYPE, MlmPackagePurchasePeer::IMAGE_SRC, MlmPackagePurchasePeer::STATUS_CODE, MlmPackagePurchasePeer::REMARKS, MlmPackagePurchasePeer::APPROVE_REJECT_DATETIME, MlmPackagePurchasePeer::APPROVED_BY_USERID, MlmPackagePurchasePeer::CREATED_BY, MlmPackagePurchasePeer::CREATED_ON, MlmPackagePurchasePeer::UPDATED_BY, MlmPackagePurchasePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('bankslip_id', 'dist_id', 'rank_id', 'rank_code', 'amount', 'transaction_type', 'image_src', 'status_code', 'remarks', 'approve_reject_datetime', 'approved_by_userid', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('BankslipId' => 0, 'DistId' => 1, 'RankId' => 2, 'RankCode' => 3, 'Amount' => 4, 'TransactionType' => 5, 'ImageSrc' => 6, 'StatusCode' => 7, 'Remarks' => 8, 'ApproveRejectDatetime' => 9, 'ApprovedByUserid' => 10, 'CreatedBy' => 11, 'CreatedOn' => 12, 'UpdatedBy' => 13, 'UpdatedOn' => 14, ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePurchasePeer::BANKSLIP_ID => 0, MlmPackagePurchasePeer::DIST_ID => 1, MlmPackagePurchasePeer::RANK_ID => 2, MlmPackagePurchasePeer::RANK_CODE => 3, MlmPackagePurchasePeer::AMOUNT => 4, MlmPackagePurchasePeer::TRANSACTION_TYPE => 5, MlmPackagePurchasePeer::IMAGE_SRC => 6, MlmPackagePurchasePeer::STATUS_CODE => 7, MlmPackagePurchasePeer::REMARKS => 8, MlmPackagePurchasePeer::APPROVE_REJECT_DATETIME => 9, MlmPackagePurchasePeer::APPROVED_BY_USERID => 10, MlmPackagePurchasePeer::CREATED_BY => 11, MlmPackagePurchasePeer::CREATED_ON => 12, MlmPackagePurchasePeer::UPDATED_BY => 13, MlmPackagePurchasePeer::UPDATED_ON => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('bankslip_id' => 0, 'dist_id' => 1, 'rank_id' => 2, 'rank_code' => 3, 'amount' => 4, 'transaction_type' => 5, 'image_src' => 6, 'status_code' => 7, 'remarks' => 8, 'approve_reject_datetime' => 9, 'approved_by_userid' => 10, 'created_by' => 11, 'created_on' => 12, 'updated_by' => 13, 'updated_on' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPackagePurchaseMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPackagePurchaseMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPackagePurchasePeer::getTableMap();
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
		return str_replace(MlmPackagePurchasePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPackagePurchasePeer::BANKSLIP_ID);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::DIST_ID);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::RANK_ID);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::RANK_CODE);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::AMOUNT);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::IMAGE_SRC);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::REMARKS);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::APPROVE_REJECT_DATETIME);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::APPROVED_BY_USERID);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPackagePurchasePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_package_purchase.BANKSLIP_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_package_purchase.BANKSLIP_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPackagePurchasePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPackagePurchasePeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPackagePurchasePeer::doSelectRS($criteria, $con);
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
		$objects = MlmPackagePurchasePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPackagePurchasePeer::populateObjects(MlmPackagePurchasePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPackagePurchasePeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmPackagePurchasePeer::getOMClass();
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
		return MlmPackagePurchasePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} else {
			$criteria = $values->buildCriteria(); 
		}

		$criteria->remove(MlmPackagePurchasePeer::BANKSLIP_ID); 


		
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

			$comparison = $criteria->getComparison(MlmPackagePurchasePeer::BANKSLIP_ID);
			$selectCriteria->add(MlmPackagePurchasePeer::BANKSLIP_ID, $criteria->remove(MlmPackagePurchasePeer::BANKSLIP_ID), $comparison);

		} else { 
			$criteria = $values->buildCriteria(); 
			$selectCriteria = $values->buildPkeyCriteria(); 
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 
		try {
			
			
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(MlmPackagePurchasePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPackagePurchasePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmPackagePurchase) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPackagePurchasePeer::BANKSLIP_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPackagePurchase $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPackagePurchasePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPackagePurchasePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPackagePurchasePeer::DATABASE_NAME, MlmPackagePurchasePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPackagePurchasePeer::DATABASE_NAME);

		$criteria->add(MlmPackagePurchasePeer::BANKSLIP_ID, $pk);


		$v = MlmPackagePurchasePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPackagePurchasePeer::BANKSLIP_ID, $pks, Criteria::IN);
			$objs = MlmPackagePurchasePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmPackagePurchasePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmPackagePurchaseMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPackagePurchaseMapBuilder');
}
