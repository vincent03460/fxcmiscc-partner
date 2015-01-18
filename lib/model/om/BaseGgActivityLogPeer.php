<?php


abstract class BaseGgActivityLogPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_activity_log';

	
	const CLASS_DEFAULT = 'lib.model.GgActivityLog';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_activity_log.ID';

	
	const TYPE = 'gg_activity_log.TYPE';

	
	const INITIATOR = 'gg_activity_log.INITIATOR';

	
	const IID = 'gg_activity_log.IID';

	
	const WID = 'gg_activity_log.WID';

	
	const AFFECTED_USER_TYPE = 'gg_activity_log.AFFECTED_USER_TYPE';

	
	const AFFECTED_UID = 'gg_activity_log.AFFECTED_UID';

	
	const PID = 'gg_activity_log.PID';

	
	const SLID = 'gg_activity_log.SLID';

	
	const CODE = 'gg_activity_log.CODE';

	
	const DESCR = 'gg_activity_log.DESCR';

	
	const CDATE = 'gg_activity_log.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Type', 'Initiator', 'Iid', 'Wid', 'AffectedUserType', 'AffectedUid', 'Pid', 'Slid', 'Code', 'Descr', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgActivityLogPeer::ID, GgActivityLogPeer::TYPE, GgActivityLogPeer::INITIATOR, GgActivityLogPeer::IID, GgActivityLogPeer::WID, GgActivityLogPeer::AFFECTED_USER_TYPE, GgActivityLogPeer::AFFECTED_UID, GgActivityLogPeer::PID, GgActivityLogPeer::SLID, GgActivityLogPeer::CODE, GgActivityLogPeer::DESCR, GgActivityLogPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'type', 'initiator', 'iid', 'wid', 'affected_user_type', 'affected_uid', 'pid', 'slid', 'code', 'descr', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Type' => 1, 'Initiator' => 2, 'Iid' => 3, 'Wid' => 4, 'AffectedUserType' => 5, 'AffectedUid' => 6, 'Pid' => 7, 'Slid' => 8, 'Code' => 9, 'Descr' => 10, 'Cdate' => 11, ),
		BasePeer::TYPE_COLNAME => array (GgActivityLogPeer::ID => 0, GgActivityLogPeer::TYPE => 1, GgActivityLogPeer::INITIATOR => 2, GgActivityLogPeer::IID => 3, GgActivityLogPeer::WID => 4, GgActivityLogPeer::AFFECTED_USER_TYPE => 5, GgActivityLogPeer::AFFECTED_UID => 6, GgActivityLogPeer::PID => 7, GgActivityLogPeer::SLID => 8, GgActivityLogPeer::CODE => 9, GgActivityLogPeer::DESCR => 10, GgActivityLogPeer::CDATE => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'type' => 1, 'initiator' => 2, 'iid' => 3, 'wid' => 4, 'affected_user_type' => 5, 'affected_uid' => 6, 'pid' => 7, 'slid' => 8, 'code' => 9, 'descr' => 10, 'cdate' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgActivityLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgActivityLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgActivityLogPeer::getTableMap();
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
		return str_replace(GgActivityLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgActivityLogPeer::ID);

		$criteria->addSelectColumn(GgActivityLogPeer::TYPE);

		$criteria->addSelectColumn(GgActivityLogPeer::INITIATOR);

		$criteria->addSelectColumn(GgActivityLogPeer::IID);

		$criteria->addSelectColumn(GgActivityLogPeer::WID);

		$criteria->addSelectColumn(GgActivityLogPeer::AFFECTED_USER_TYPE);

		$criteria->addSelectColumn(GgActivityLogPeer::AFFECTED_UID);

		$criteria->addSelectColumn(GgActivityLogPeer::PID);

		$criteria->addSelectColumn(GgActivityLogPeer::SLID);

		$criteria->addSelectColumn(GgActivityLogPeer::CODE);

		$criteria->addSelectColumn(GgActivityLogPeer::DESCR);

		$criteria->addSelectColumn(GgActivityLogPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_activity_log.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_activity_log.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgActivityLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgActivityLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgActivityLogPeer::doSelectRS($criteria, $con);
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
		$objects = GgActivityLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgActivityLogPeer::populateObjects(GgActivityLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgActivityLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgActivityLogPeer::getOMClass();
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
		return GgActivityLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgActivityLogPeer::ID); 

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
			$comparison = $criteria->getComparison(GgActivityLogPeer::ID);
			$selectCriteria->add(GgActivityLogPeer::ID, $criteria->remove(GgActivityLogPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgActivityLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgActivityLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgActivityLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgActivityLogPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgActivityLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgActivityLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgActivityLogPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgActivityLogPeer::DATABASE_NAME, GgActivityLogPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgActivityLogPeer::DATABASE_NAME);

		$criteria->add(GgActivityLogPeer::ID, $pk);


		$v = GgActivityLogPeer::doSelect($criteria, $con);

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
			$criteria->add(GgActivityLogPeer::ID, $pks, Criteria::IN);
			$objs = GgActivityLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgActivityLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgActivityLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgActivityLogMapBuilder');
}
