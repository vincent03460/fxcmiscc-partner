<?php


abstract class BaseMlmMasterIbPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_master_ib';

	
	const CLASS_DEFAULT = 'lib.model.MlmMasterIb';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MASTER_IB_ID = 'mlm_master_ib.MASTER_IB_ID';

	
	const MASTER_IB_CODE = 'mlm_master_ib.MASTER_IB_CODE';

	
	const USER_ID = 'mlm_master_ib.USER_ID';

	
	const STATUS_CODE = 'mlm_master_ib.STATUS_CODE';

	
	const MASTER_IB_NAME = 'mlm_master_ib.MASTER_IB_NAME';

	
	const CREATED_BY = 'mlm_master_ib.CREATED_BY';

	
	const CREATED_ON = 'mlm_master_ib.CREATED_ON';

	
	const UPDATED_BY = 'mlm_master_ib.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_master_ib.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MasterIbId', 'MasterIbCode', 'UserId', 'StatusCode', 'MasterIbName', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmMasterIbPeer::MASTER_IB_ID, MlmMasterIbPeer::MASTER_IB_CODE, MlmMasterIbPeer::USER_ID, MlmMasterIbPeer::STATUS_CODE, MlmMasterIbPeer::MASTER_IB_NAME, MlmMasterIbPeer::CREATED_BY, MlmMasterIbPeer::CREATED_ON, MlmMasterIbPeer::UPDATED_BY, MlmMasterIbPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('master_ib_id', 'master_ib_code', 'user_id', 'status_code', 'master_ib_name', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MasterIbId' => 0, 'MasterIbCode' => 1, 'UserId' => 2, 'StatusCode' => 3, 'MasterIbName' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (MlmMasterIbPeer::MASTER_IB_ID => 0, MlmMasterIbPeer::MASTER_IB_CODE => 1, MlmMasterIbPeer::USER_ID => 2, MlmMasterIbPeer::STATUS_CODE => 3, MlmMasterIbPeer::MASTER_IB_NAME => 4, MlmMasterIbPeer::CREATED_BY => 5, MlmMasterIbPeer::CREATED_ON => 6, MlmMasterIbPeer::UPDATED_BY => 7, MlmMasterIbPeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('master_ib_id' => 0, 'master_ib_code' => 1, 'user_id' => 2, 'status_code' => 3, 'master_ib_name' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmMasterIbMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmMasterIbMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmMasterIbPeer::getTableMap();
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
		return str_replace(MlmMasterIbPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmMasterIbPeer::MASTER_IB_ID);

		$criteria->addSelectColumn(MlmMasterIbPeer::MASTER_IB_CODE);

		$criteria->addSelectColumn(MlmMasterIbPeer::USER_ID);

		$criteria->addSelectColumn(MlmMasterIbPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmMasterIbPeer::MASTER_IB_NAME);

		$criteria->addSelectColumn(MlmMasterIbPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmMasterIbPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmMasterIbPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmMasterIbPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_master_ib.MASTER_IB_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_master_ib.MASTER_IB_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmMasterIbPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmMasterIbPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmMasterIbPeer::doSelectRS($criteria, $con);
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
		$objects = MlmMasterIbPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmMasterIbPeer::populateObjects(MlmMasterIbPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmMasterIbPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmMasterIbPeer::getOMClass();
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
		return MlmMasterIbPeer::CLASS_DEFAULT;
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

		$criteria->remove(MlmMasterIbPeer::MASTER_IB_ID); 


		
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

			$comparison = $criteria->getComparison(MlmMasterIbPeer::MASTER_IB_ID);
			$selectCriteria->add(MlmMasterIbPeer::MASTER_IB_ID, $criteria->remove(MlmMasterIbPeer::MASTER_IB_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmMasterIbPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmMasterIbPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmMasterIb) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmMasterIbPeer::MASTER_IB_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmMasterIb $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmMasterIbPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmMasterIbPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmMasterIbPeer::DATABASE_NAME, MlmMasterIbPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmMasterIbPeer::DATABASE_NAME);

		$criteria->add(MlmMasterIbPeer::MASTER_IB_ID, $pk);


		$v = MlmMasterIbPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmMasterIbPeer::MASTER_IB_ID, $pks, Criteria::IN);
			$objs = MlmMasterIbPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmMasterIbPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmMasterIbMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmMasterIbMapBuilder');
}
