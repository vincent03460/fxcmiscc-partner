<?php


abstract class BaseMlmReloadTopupHistoryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_reload_topup_history';

	
	const CLASS_DEFAULT = 'lib.model.MlmReloadTopupHistory';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RELOAD_ID = 'mlm_reload_topup_history.RELOAD_ID';

	
	const DIST_ID = 'mlm_reload_topup_history.DIST_ID';

	
	const TRANSACTION_CODE = 'mlm_reload_topup_history.TRANSACTION_CODE';

	
	const AMOUNT = 'mlm_reload_topup_history.AMOUNT';

	
	const STATUS_CODE = 'mlm_reload_topup_history.STATUS_CODE';

	
	const REMARKS = 'mlm_reload_topup_history.REMARKS';

	
	const CREATED_BY = 'mlm_reload_topup_history.CREATED_BY';

	
	const CREATED_ON = 'mlm_reload_topup_history.CREATED_ON';

	
	const UPDATED_BY = 'mlm_reload_topup_history.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_reload_topup_history.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ReloadId', 'DistId', 'TransactionCode', 'Amount', 'StatusCode', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmReloadTopupHistoryPeer::RELOAD_ID, MlmReloadTopupHistoryPeer::DIST_ID, MlmReloadTopupHistoryPeer::TRANSACTION_CODE, MlmReloadTopupHistoryPeer::AMOUNT, MlmReloadTopupHistoryPeer::STATUS_CODE, MlmReloadTopupHistoryPeer::REMARKS, MlmReloadTopupHistoryPeer::CREATED_BY, MlmReloadTopupHistoryPeer::CREATED_ON, MlmReloadTopupHistoryPeer::UPDATED_BY, MlmReloadTopupHistoryPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('reload_id', 'dist_id', 'transaction_code', 'amount', 'status_code', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ReloadId' => 0, 'DistId' => 1, 'TransactionCode' => 2, 'Amount' => 3, 'StatusCode' => 4, 'Remarks' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (MlmReloadTopupHistoryPeer::RELOAD_ID => 0, MlmReloadTopupHistoryPeer::DIST_ID => 1, MlmReloadTopupHistoryPeer::TRANSACTION_CODE => 2, MlmReloadTopupHistoryPeer::AMOUNT => 3, MlmReloadTopupHistoryPeer::STATUS_CODE => 4, MlmReloadTopupHistoryPeer::REMARKS => 5, MlmReloadTopupHistoryPeer::CREATED_BY => 6, MlmReloadTopupHistoryPeer::CREATED_ON => 7, MlmReloadTopupHistoryPeer::UPDATED_BY => 8, MlmReloadTopupHistoryPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('reload_id' => 0, 'dist_id' => 1, 'transaction_code' => 2, 'amount' => 3, 'status_code' => 4, 'remarks' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmReloadTopupHistoryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmReloadTopupHistoryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmReloadTopupHistoryPeer::getTableMap();
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
		return str_replace(MlmReloadTopupHistoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::RELOAD_ID);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::DIST_ID);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::TRANSACTION_CODE);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::AMOUNT);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::REMARKS);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_reload_topup_history.RELOAD_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_reload_topup_history.RELOAD_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmReloadTopupHistoryPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmReloadTopupHistoryPeer::doSelectRS($criteria, $con);
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
		$objects = MlmReloadTopupHistoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmReloadTopupHistoryPeer::populateObjects(MlmReloadTopupHistoryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmReloadTopupHistoryPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmReloadTopupHistoryPeer::getOMClass();
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
		return MlmReloadTopupHistoryPeer::CLASS_DEFAULT;
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

		$criteria->remove(MlmReloadTopupHistoryPeer::RELOAD_ID); 


		
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

			$comparison = $criteria->getComparison(MlmReloadTopupHistoryPeer::RELOAD_ID);
			$selectCriteria->add(MlmReloadTopupHistoryPeer::RELOAD_ID, $criteria->remove(MlmReloadTopupHistoryPeer::RELOAD_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmReloadTopupHistoryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmReloadTopupHistoryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmReloadTopupHistory) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmReloadTopupHistoryPeer::RELOAD_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmReloadTopupHistory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmReloadTopupHistoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmReloadTopupHistoryPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmReloadTopupHistoryPeer::DATABASE_NAME, MlmReloadTopupHistoryPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmReloadTopupHistoryPeer::DATABASE_NAME);

		$criteria->add(MlmReloadTopupHistoryPeer::RELOAD_ID, $pk);


		$v = MlmReloadTopupHistoryPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmReloadTopupHistoryPeer::RELOAD_ID, $pks, Criteria::IN);
			$objs = MlmReloadTopupHistoryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmReloadTopupHistoryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmReloadTopupHistoryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmReloadTopupHistoryMapBuilder');
}
