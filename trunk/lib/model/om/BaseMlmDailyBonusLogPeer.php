<?php


abstract class BaseMlmDailyBonusLogPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_daily_bonus_log';

	
	const CLASS_DEFAULT = 'lib.model.MlmDailyBonusLog';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LOG_ID = 'mlm_daily_bonus_log.LOG_ID';

	
	const ACCESS_IP = 'mlm_daily_bonus_log.ACCESS_IP';

	
	const BONUS_TYPE = 'mlm_daily_bonus_log.BONUS_TYPE';

	
	const BONUS_DATE = 'mlm_daily_bonus_log.BONUS_DATE';

	
	const CREATED_BY = 'mlm_daily_bonus_log.CREATED_BY';

	
	const CREATED_ON = 'mlm_daily_bonus_log.CREATED_ON';

	
	const UPDATED_BY = 'mlm_daily_bonus_log.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_daily_bonus_log.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LogId', 'AccessIp', 'BonusType', 'BonusDate', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDailyBonusLogPeer::LOG_ID, MlmDailyBonusLogPeer::ACCESS_IP, MlmDailyBonusLogPeer::BONUS_TYPE, MlmDailyBonusLogPeer::BONUS_DATE, MlmDailyBonusLogPeer::CREATED_BY, MlmDailyBonusLogPeer::CREATED_ON, MlmDailyBonusLogPeer::UPDATED_BY, MlmDailyBonusLogPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id', 'access_ip', 'bonus_type', 'bonus_date', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LogId' => 0, 'AccessIp' => 1, 'BonusType' => 2, 'BonusDate' => 3, 'CreatedBy' => 4, 'CreatedOn' => 5, 'UpdatedBy' => 6, 'UpdatedOn' => 7, ),
		BasePeer::TYPE_COLNAME => array (MlmDailyBonusLogPeer::LOG_ID => 0, MlmDailyBonusLogPeer::ACCESS_IP => 1, MlmDailyBonusLogPeer::BONUS_TYPE => 2, MlmDailyBonusLogPeer::BONUS_DATE => 3, MlmDailyBonusLogPeer::CREATED_BY => 4, MlmDailyBonusLogPeer::CREATED_ON => 5, MlmDailyBonusLogPeer::UPDATED_BY => 6, MlmDailyBonusLogPeer::UPDATED_ON => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id' => 0, 'access_ip' => 1, 'bonus_type' => 2, 'bonus_date' => 3, 'created_by' => 4, 'created_on' => 5, 'updated_by' => 6, 'updated_on' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDailyBonusLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDailyBonusLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDailyBonusLogPeer::getTableMap();
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
		return str_replace(MlmDailyBonusLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::LOG_ID);

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::ACCESS_IP);

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::BONUS_TYPE);

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::BONUS_DATE);

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDailyBonusLogPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_daily_bonus_log.LOG_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_daily_bonus_log.LOG_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDailyBonusLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDailyBonusLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDailyBonusLogPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDailyBonusLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDailyBonusLogPeer::populateObjects(MlmDailyBonusLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDailyBonusLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDailyBonusLogPeer::getOMClass();
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
		return MlmDailyBonusLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDailyBonusLogPeer::LOG_ID); 

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
			$comparison = $criteria->getComparison(MlmDailyBonusLogPeer::LOG_ID);
			$selectCriteria->add(MlmDailyBonusLogPeer::LOG_ID, $criteria->remove(MlmDailyBonusLogPeer::LOG_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDailyBonusLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDailyBonusLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDailyBonusLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDailyBonusLogPeer::LOG_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDailyBonusLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDailyBonusLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDailyBonusLogPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDailyBonusLogPeer::DATABASE_NAME, MlmDailyBonusLogPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDailyBonusLogPeer::DATABASE_NAME);

		$criteria->add(MlmDailyBonusLogPeer::LOG_ID, $pk);


		$v = MlmDailyBonusLogPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDailyBonusLogPeer::LOG_ID, $pks, Criteria::IN);
			$objs = MlmDailyBonusLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDailyBonusLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDailyBonusLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDailyBonusLogMapBuilder');
}
