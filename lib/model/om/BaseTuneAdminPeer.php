<?php


abstract class BaseTuneAdminPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tune_admin';

	
	const CLASS_DEFAULT = 'lib.model.TuneAdmin';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ADMIN_ID = 'tune_admin.ADMIN_ID';

	
	const ADMIN_CODE = 'tune_admin.ADMIN_CODE';

	
	const USER_ID = 'tune_admin.USER_ID';

	
	const STATUS_CODE = 'tune_admin.STATUS_CODE';

	
	const ADMIN_ROLE = 'tune_admin.ADMIN_ROLE';

	
	const CREATED_BY = 'tune_admin.CREATED_BY';

	
	const CREATED_ON = 'tune_admin.CREATED_ON';

	
	const UPDATED_BY = 'tune_admin.UPDATED_BY';

	
	const UPDATED_ON = 'tune_admin.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AdminId', 'AdminCode', 'UserId', 'StatusCode', 'AdminRole', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (TuneAdminPeer::ADMIN_ID, TuneAdminPeer::ADMIN_CODE, TuneAdminPeer::USER_ID, TuneAdminPeer::STATUS_CODE, TuneAdminPeer::ADMIN_ROLE, TuneAdminPeer::CREATED_BY, TuneAdminPeer::CREATED_ON, TuneAdminPeer::UPDATED_BY, TuneAdminPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('admin_id', 'admin_code', 'user_id', 'status_code', 'admin_role', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AdminId' => 0, 'AdminCode' => 1, 'UserId' => 2, 'StatusCode' => 3, 'AdminRole' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (TuneAdminPeer::ADMIN_ID => 0, TuneAdminPeer::ADMIN_CODE => 1, TuneAdminPeer::USER_ID => 2, TuneAdminPeer::STATUS_CODE => 3, TuneAdminPeer::ADMIN_ROLE => 4, TuneAdminPeer::CREATED_BY => 5, TuneAdminPeer::CREATED_ON => 6, TuneAdminPeer::UPDATED_BY => 7, TuneAdminPeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('admin_id' => 0, 'admin_code' => 1, 'user_id' => 2, 'status_code' => 3, 'admin_role' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TuneAdminMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TuneAdminMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TuneAdminPeer::getTableMap();
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
		return str_replace(TuneAdminPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TuneAdminPeer::ADMIN_ID);

		$criteria->addSelectColumn(TuneAdminPeer::ADMIN_CODE);

		$criteria->addSelectColumn(TuneAdminPeer::USER_ID);

		$criteria->addSelectColumn(TuneAdminPeer::STATUS_CODE);

		$criteria->addSelectColumn(TuneAdminPeer::ADMIN_ROLE);

		$criteria->addSelectColumn(TuneAdminPeer::CREATED_BY);

		$criteria->addSelectColumn(TuneAdminPeer::CREATED_ON);

		$criteria->addSelectColumn(TuneAdminPeer::UPDATED_BY);

		$criteria->addSelectColumn(TuneAdminPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(tune_admin.ADMIN_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tune_admin.ADMIN_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TuneAdminPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TuneAdminPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TuneAdminPeer::doSelectRS($criteria, $con);
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
		$objects = TuneAdminPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TuneAdminPeer::populateObjects(TuneAdminPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TuneAdminPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = TuneAdminPeer::getOMClass();
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
		return TuneAdminPeer::CLASS_DEFAULT;
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

		$criteria->remove(TuneAdminPeer::ADMIN_ID); 


		
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

			$comparison = $criteria->getComparison(TuneAdminPeer::ADMIN_ID);
			$selectCriteria->add(TuneAdminPeer::ADMIN_ID, $criteria->remove(TuneAdminPeer::ADMIN_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TuneAdminPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TuneAdminPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof TuneAdmin) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TuneAdminPeer::ADMIN_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TuneAdmin $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TuneAdminPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TuneAdminPeer::TABLE_NAME);

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

		return BasePeer::doValidate(TuneAdminPeer::DATABASE_NAME, TuneAdminPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(TuneAdminPeer::DATABASE_NAME);

		$criteria->add(TuneAdminPeer::ADMIN_ID, $pk);


		$v = TuneAdminPeer::doSelect($criteria, $con);

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
			$criteria->add(TuneAdminPeer::ADMIN_ID, $pks, Criteria::IN);
			$objs = TuneAdminPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseTuneAdminPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/TuneAdminMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TuneAdminMapBuilder');
}
