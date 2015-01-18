<?php


abstract class BaseMlmProductPurchaseHistoryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_product_purchase_history';

	
	const CLASS_DEFAULT = 'lib.model.MlmProductPurchaseHistory';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const HISTORY_ID = 'mlm_product_purchase_history.HISTORY_ID';

	
	const DIST_ID = 'mlm_product_purchase_history.DIST_ID';

	
	const TOTAL_AMOUNT = 'mlm_product_purchase_history.TOTAL_AMOUNT';

	
	const STATUS_CODE = 'mlm_product_purchase_history.STATUS_CODE';

	
	const APPROVE_REJECT_DATETIME = 'mlm_product_purchase_history.APPROVE_REJECT_DATETIME';

	
	const REMARKS = 'mlm_product_purchase_history.REMARKS';

	
	const CREATED_BY = 'mlm_product_purchase_history.CREATED_BY';

	
	const CREATED_ON = 'mlm_product_purchase_history.CREATED_ON';

	
	const UPDATED_BY = 'mlm_product_purchase_history.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_product_purchase_history.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('HistoryId', 'DistId', 'TotalAmount', 'StatusCode', 'ApproveRejectDatetime', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmProductPurchaseHistoryPeer::HISTORY_ID, MlmProductPurchaseHistoryPeer::DIST_ID, MlmProductPurchaseHistoryPeer::TOTAL_AMOUNT, MlmProductPurchaseHistoryPeer::STATUS_CODE, MlmProductPurchaseHistoryPeer::APPROVE_REJECT_DATETIME, MlmProductPurchaseHistoryPeer::REMARKS, MlmProductPurchaseHistoryPeer::CREATED_BY, MlmProductPurchaseHistoryPeer::CREATED_ON, MlmProductPurchaseHistoryPeer::UPDATED_BY, MlmProductPurchaseHistoryPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('history_id', 'dist_id', 'total_amount', 'status_code', 'approve_reject_datetime', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('HistoryId' => 0, 'DistId' => 1, 'TotalAmount' => 2, 'StatusCode' => 3, 'ApproveRejectDatetime' => 4, 'Remarks' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (MlmProductPurchaseHistoryPeer::HISTORY_ID => 0, MlmProductPurchaseHistoryPeer::DIST_ID => 1, MlmProductPurchaseHistoryPeer::TOTAL_AMOUNT => 2, MlmProductPurchaseHistoryPeer::STATUS_CODE => 3, MlmProductPurchaseHistoryPeer::APPROVE_REJECT_DATETIME => 4, MlmProductPurchaseHistoryPeer::REMARKS => 5, MlmProductPurchaseHistoryPeer::CREATED_BY => 6, MlmProductPurchaseHistoryPeer::CREATED_ON => 7, MlmProductPurchaseHistoryPeer::UPDATED_BY => 8, MlmProductPurchaseHistoryPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('history_id' => 0, 'dist_id' => 1, 'total_amount' => 2, 'status_code' => 3, 'approve_reject_datetime' => 4, 'remarks' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmProductPurchaseHistoryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmProductPurchaseHistoryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmProductPurchaseHistoryPeer::getTableMap();
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
		return str_replace(MlmProductPurchaseHistoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::HISTORY_ID);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::DIST_ID);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::TOTAL_AMOUNT);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::APPROVE_REJECT_DATETIME);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::REMARKS);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_product_purchase_history.HISTORY_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_product_purchase_history.HISTORY_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmProductPurchaseHistoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmProductPurchaseHistoryPeer::doSelectRS($criteria, $con);
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
		$objects = MlmProductPurchaseHistoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmProductPurchaseHistoryPeer::populateObjects(MlmProductPurchaseHistoryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmProductPurchaseHistoryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmProductPurchaseHistoryPeer::getOMClass();
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
		return MlmProductPurchaseHistoryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmProductPurchaseHistoryPeer::HISTORY_ID); 

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
			$comparison = $criteria->getComparison(MlmProductPurchaseHistoryPeer::HISTORY_ID);
			$selectCriteria->add(MlmProductPurchaseHistoryPeer::HISTORY_ID, $criteria->remove(MlmProductPurchaseHistoryPeer::HISTORY_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmProductPurchaseHistoryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmProductPurchaseHistoryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmProductPurchaseHistory) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmProductPurchaseHistoryPeer::HISTORY_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmProductPurchaseHistory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmProductPurchaseHistoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmProductPurchaseHistoryPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmProductPurchaseHistoryPeer::DATABASE_NAME, MlmProductPurchaseHistoryPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmProductPurchaseHistoryPeer::DATABASE_NAME);

		$criteria->add(MlmProductPurchaseHistoryPeer::HISTORY_ID, $pk);


		$v = MlmProductPurchaseHistoryPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmProductPurchaseHistoryPeer::HISTORY_ID, $pks, Criteria::IN);
			$objs = MlmProductPurchaseHistoryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmProductPurchaseHistoryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmProductPurchaseHistoryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmProductPurchaseHistoryMapBuilder');
}
