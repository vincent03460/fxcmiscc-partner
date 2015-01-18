<?php


abstract class BaseLogLoginLogPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'log_login_log';

	
	const CLASS_DEFAULT = 'lib.model.LogLoginLog';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LOG_ID = 'log_login_log.LOG_ID';

	
	const LOG_LOGIN_ID = 'log_login_log.LOG_LOGIN_ID';

	
	const ACCESS_IP = 'log_login_log.ACCESS_IP';

	
	const USER_ID = 'log_login_log.USER_ID';

	
	const REMARK = 'log_login_log.REMARK';

	
	const CREATED_BY = 'log_login_log.CREATED_BY';

	
	const CREATED_ON = 'log_login_log.CREATED_ON';

	
	const UPDATED_BY = 'log_login_log.UPDATED_BY';

	
	const UPDATED_ON = 'log_login_log.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LogId', 'LogLoginId', 'AccessIp', 'UserId', 'Remark', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (LogLoginLogPeer::LOG_ID, LogLoginLogPeer::LOG_LOGIN_ID, LogLoginLogPeer::ACCESS_IP, LogLoginLogPeer::USER_ID, LogLoginLogPeer::REMARK, LogLoginLogPeer::CREATED_BY, LogLoginLogPeer::CREATED_ON, LogLoginLogPeer::UPDATED_BY, LogLoginLogPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id', 'log_login_id', 'access_ip', 'user_id', 'remark', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LogId' => 0, 'LogLoginId' => 1, 'AccessIp' => 2, 'UserId' => 3, 'Remark' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (LogLoginLogPeer::LOG_ID => 0, LogLoginLogPeer::LOG_LOGIN_ID => 1, LogLoginLogPeer::ACCESS_IP => 2, LogLoginLogPeer::USER_ID => 3, LogLoginLogPeer::REMARK => 4, LogLoginLogPeer::CREATED_BY => 5, LogLoginLogPeer::CREATED_ON => 6, LogLoginLogPeer::UPDATED_BY => 7, LogLoginLogPeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id' => 0, 'log_login_id' => 1, 'access_ip' => 2, 'user_id' => 3, 'remark' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LogLoginLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LogLoginLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LogLoginLogPeer::getTableMap();
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
		return str_replace(LogLoginLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LogLoginLogPeer::LOG_ID);

		$criteria->addSelectColumn(LogLoginLogPeer::LOG_LOGIN_ID);

		$criteria->addSelectColumn(LogLoginLogPeer::ACCESS_IP);

		$criteria->addSelectColumn(LogLoginLogPeer::USER_ID);

		$criteria->addSelectColumn(LogLoginLogPeer::REMARK);

		$criteria->addSelectColumn(LogLoginLogPeer::CREATED_BY);

		$criteria->addSelectColumn(LogLoginLogPeer::CREATED_ON);

		$criteria->addSelectColumn(LogLoginLogPeer::UPDATED_BY);

		$criteria->addSelectColumn(LogLoginLogPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(log_login_log.LOG_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT log_login_log.LOG_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LogLoginLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LogLoginLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LogLoginLogPeer::doSelectRS($criteria, $con);
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
		$objects = LogLoginLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LogLoginLogPeer::populateObjects(LogLoginLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LogLoginLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LogLoginLogPeer::getOMClass();
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
		return LogLoginLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LogLoginLogPeer::LOG_ID); 

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
			$comparison = $criteria->getComparison(LogLoginLogPeer::LOG_ID);
			$selectCriteria->add(LogLoginLogPeer::LOG_ID, $criteria->remove(LogLoginLogPeer::LOG_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LogLoginLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LogLoginLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof LogLoginLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LogLoginLogPeer::LOG_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(LogLoginLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LogLoginLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LogLoginLogPeer::TABLE_NAME);

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

		return BasePeer::doValidate(LogLoginLogPeer::DATABASE_NAME, LogLoginLogPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(LogLoginLogPeer::DATABASE_NAME);

		$criteria->add(LogLoginLogPeer::LOG_ID, $pk);


		$v = LogLoginLogPeer::doSelect($criteria, $con);

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
			$criteria->add(LogLoginLogPeer::LOG_ID, $pks, Criteria::IN);
			$objs = LogLoginLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLogLoginLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LogLoginLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LogLoginLogMapBuilder');
}
