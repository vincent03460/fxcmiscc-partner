<?php


abstract class BaseAppLoginLogPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'app_login_log';

	
	const CLASS_DEFAULT = 'lib.model.AppLoginLog';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LOG_ID = 'app_login_log.LOG_ID';

	
	const ACCESS_IP = 'app_login_log.ACCESS_IP';

	
	const USER_ID = 'app_login_log.USER_ID';

	
	const REMARK = 'app_login_log.REMARK';

	
	const CREATED_BY = 'app_login_log.CREATED_BY';

	
	const CREATED_ON = 'app_login_log.CREATED_ON';

	
	const UPDATED_BY = 'app_login_log.UPDATED_BY';

	
	const UPDATED_ON = 'app_login_log.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LogId', 'AccessIp', 'UserId', 'Remark', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (AppLoginLogPeer::LOG_ID, AppLoginLogPeer::ACCESS_IP, AppLoginLogPeer::USER_ID, AppLoginLogPeer::REMARK, AppLoginLogPeer::CREATED_BY, AppLoginLogPeer::CREATED_ON, AppLoginLogPeer::UPDATED_BY, AppLoginLogPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id', 'access_ip', 'user_id', 'remark', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LogId' => 0, 'AccessIp' => 1, 'UserId' => 2, 'Remark' => 3, 'CreatedBy' => 4, 'CreatedOn' => 5, 'UpdatedBy' => 6, 'UpdatedOn' => 7, ),
		BasePeer::TYPE_COLNAME => array (AppLoginLogPeer::LOG_ID => 0, AppLoginLogPeer::ACCESS_IP => 1, AppLoginLogPeer::USER_ID => 2, AppLoginLogPeer::REMARK => 3, AppLoginLogPeer::CREATED_BY => 4, AppLoginLogPeer::CREATED_ON => 5, AppLoginLogPeer::UPDATED_BY => 6, AppLoginLogPeer::UPDATED_ON => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id' => 0, 'access_ip' => 1, 'user_id' => 2, 'remark' => 3, 'created_by' => 4, 'created_on' => 5, 'updated_by' => 6, 'updated_on' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AppLoginLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AppLoginLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AppLoginLogPeer::getTableMap();
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
		return str_replace(AppLoginLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AppLoginLogPeer::LOG_ID);

		$criteria->addSelectColumn(AppLoginLogPeer::ACCESS_IP);

		$criteria->addSelectColumn(AppLoginLogPeer::USER_ID);

		$criteria->addSelectColumn(AppLoginLogPeer::REMARK);

		$criteria->addSelectColumn(AppLoginLogPeer::CREATED_BY);

		$criteria->addSelectColumn(AppLoginLogPeer::CREATED_ON);

		$criteria->addSelectColumn(AppLoginLogPeer::UPDATED_BY);

		$criteria->addSelectColumn(AppLoginLogPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(app_login_log.LOG_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT app_login_log.LOG_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AppLoginLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AppLoginLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AppLoginLogPeer::doSelectRS($criteria, $con);
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
		$objects = AppLoginLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AppLoginLogPeer::populateObjects(AppLoginLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AppLoginLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AppLoginLogPeer::getOMClass();
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
		return AppLoginLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AppLoginLogPeer::LOG_ID); 

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
			$comparison = $criteria->getComparison(AppLoginLogPeer::LOG_ID);
			$selectCriteria->add(AppLoginLogPeer::LOG_ID, $criteria->remove(AppLoginLogPeer::LOG_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AppLoginLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AppLoginLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AppLoginLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AppLoginLogPeer::LOG_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AppLoginLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AppLoginLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AppLoginLogPeer::TABLE_NAME);

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

		return BasePeer::doValidate(AppLoginLogPeer::DATABASE_NAME, AppLoginLogPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AppLoginLogPeer::DATABASE_NAME);

		$criteria->add(AppLoginLogPeer::LOG_ID, $pk);


		$v = AppLoginLogPeer::doSelect($criteria, $con);

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
			$criteria->add(AppLoginLogPeer::LOG_ID, $pks, Criteria::IN);
			$objs = AppLoginLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAppLoginLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AppLoginLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AppLoginLogMapBuilder');
}
