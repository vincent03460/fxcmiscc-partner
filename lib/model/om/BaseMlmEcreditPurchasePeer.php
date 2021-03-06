<?php


abstract class BaseMlmEcreditPurchasePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_ecredit_purchase';

	
	const CLASS_DEFAULT = 'lib.model.MlmEcreditPurchase';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ECREDIT_ID = 'mlm_ecredit_purchase.ECREDIT_ID';

	
	const DIST_ID = 'mlm_ecredit_purchase.DIST_ID';

	
	const AMOUNT = 'mlm_ecredit_purchase.AMOUNT';

	
	const STATUS_CODE = 'mlm_ecredit_purchase.STATUS_CODE';

	
	const REMARKS = 'mlm_ecredit_purchase.REMARKS';

	
	const APPROVE_REJECT_DATETIME = 'mlm_ecredit_purchase.APPROVE_REJECT_DATETIME';

	
	const APPROVED_BY_USERID = 'mlm_ecredit_purchase.APPROVED_BY_USERID';

	
	const CREATED_BY = 'mlm_ecredit_purchase.CREATED_BY';

	
	const CREATED_ON = 'mlm_ecredit_purchase.CREATED_ON';

	
	const UPDATED_BY = 'mlm_ecredit_purchase.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_ecredit_purchase.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EcreditId', 'DistId', 'Amount', 'StatusCode', 'Remarks', 'ApproveRejectDatetime', 'ApprovedByUserid', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmEcreditPurchasePeer::ECREDIT_ID, MlmEcreditPurchasePeer::DIST_ID, MlmEcreditPurchasePeer::AMOUNT, MlmEcreditPurchasePeer::STATUS_CODE, MlmEcreditPurchasePeer::REMARKS, MlmEcreditPurchasePeer::APPROVE_REJECT_DATETIME, MlmEcreditPurchasePeer::APPROVED_BY_USERID, MlmEcreditPurchasePeer::CREATED_BY, MlmEcreditPurchasePeer::CREATED_ON, MlmEcreditPurchasePeer::UPDATED_BY, MlmEcreditPurchasePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('ecredit_id', 'dist_id', 'amount', 'status_code', 'remarks', 'approve_reject_datetime', 'approved_by_userid', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EcreditId' => 0, 'DistId' => 1, 'Amount' => 2, 'StatusCode' => 3, 'Remarks' => 4, 'ApproveRejectDatetime' => 5, 'ApprovedByUserid' => 6, 'CreatedBy' => 7, 'CreatedOn' => 8, 'UpdatedBy' => 9, 'UpdatedOn' => 10, ),
		BasePeer::TYPE_COLNAME => array (MlmEcreditPurchasePeer::ECREDIT_ID => 0, MlmEcreditPurchasePeer::DIST_ID => 1, MlmEcreditPurchasePeer::AMOUNT => 2, MlmEcreditPurchasePeer::STATUS_CODE => 3, MlmEcreditPurchasePeer::REMARKS => 4, MlmEcreditPurchasePeer::APPROVE_REJECT_DATETIME => 5, MlmEcreditPurchasePeer::APPROVED_BY_USERID => 6, MlmEcreditPurchasePeer::CREATED_BY => 7, MlmEcreditPurchasePeer::CREATED_ON => 8, MlmEcreditPurchasePeer::UPDATED_BY => 9, MlmEcreditPurchasePeer::UPDATED_ON => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('ecredit_id' => 0, 'dist_id' => 1, 'amount' => 2, 'status_code' => 3, 'remarks' => 4, 'approve_reject_datetime' => 5, 'approved_by_userid' => 6, 'created_by' => 7, 'created_on' => 8, 'updated_by' => 9, 'updated_on' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmEcreditPurchaseMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmEcreditPurchaseMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmEcreditPurchasePeer::getTableMap();
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
		return str_replace(MlmEcreditPurchasePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::ECREDIT_ID);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::DIST_ID);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::AMOUNT);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::REMARKS);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::APPROVE_REJECT_DATETIME);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::APPROVED_BY_USERID);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmEcreditPurchasePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_ecredit_purchase.ECREDIT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_ecredit_purchase.ECREDIT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmEcreditPurchasePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmEcreditPurchasePeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmEcreditPurchasePeer::doSelectRS($criteria, $con);
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
		$objects = MlmEcreditPurchasePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmEcreditPurchasePeer::populateObjects(MlmEcreditPurchasePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmEcreditPurchasePeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmEcreditPurchasePeer::getOMClass();
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
		return MlmEcreditPurchasePeer::CLASS_DEFAULT;
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

		$criteria->remove(MlmEcreditPurchasePeer::ECREDIT_ID); 


		
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

			$comparison = $criteria->getComparison(MlmEcreditPurchasePeer::ECREDIT_ID);
			$selectCriteria->add(MlmEcreditPurchasePeer::ECREDIT_ID, $criteria->remove(MlmEcreditPurchasePeer::ECREDIT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmEcreditPurchasePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmEcreditPurchasePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmEcreditPurchase) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmEcreditPurchasePeer::ECREDIT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmEcreditPurchase $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmEcreditPurchasePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmEcreditPurchasePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmEcreditPurchasePeer::DATABASE_NAME, MlmEcreditPurchasePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmEcreditPurchasePeer::DATABASE_NAME);

		$criteria->add(MlmEcreditPurchasePeer::ECREDIT_ID, $pk);


		$v = MlmEcreditPurchasePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmEcreditPurchasePeer::ECREDIT_ID, $pks, Criteria::IN);
			$objs = MlmEcreditPurchasePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmEcreditPurchasePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmEcreditPurchaseMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmEcreditPurchaseMapBuilder');
}
