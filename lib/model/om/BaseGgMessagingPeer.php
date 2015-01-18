<?php


abstract class BaseGgMessagingPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_messaging';

	
	const CLASS_DEFAULT = 'lib.model.GgMessaging';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_messaging.ID';

	
	const FROM_TYPE = 'gg_messaging.FROM_TYPE';

	
	const FROM_UID = 'gg_messaging.FROM_UID';

	
	const FROM_DELETED = 'gg_messaging.FROM_DELETED';

	
	const TO_TYPE = 'gg_messaging.TO_TYPE';

	
	const TO_UID = 'gg_messaging.TO_UID';

	
	const TO_READ = 'gg_messaging.TO_READ';

	
	const TO_DELETED = 'gg_messaging.TO_DELETED';

	
	const SUBJECT = 'gg_messaging.SUBJECT';

	
	const MESSAGE = 'gg_messaging.MESSAGE';

	
	const CDATE = 'gg_messaging.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FromType', 'FromUid', 'FromDeleted', 'ToType', 'ToUid', 'ToRead', 'ToDeleted', 'Subject', 'Message', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgMessagingPeer::ID, GgMessagingPeer::FROM_TYPE, GgMessagingPeer::FROM_UID, GgMessagingPeer::FROM_DELETED, GgMessagingPeer::TO_TYPE, GgMessagingPeer::TO_UID, GgMessagingPeer::TO_READ, GgMessagingPeer::TO_DELETED, GgMessagingPeer::SUBJECT, GgMessagingPeer::MESSAGE, GgMessagingPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'from_type', 'from_uid', 'from_deleted', 'to_type', 'to_uid', 'to_read', 'to_deleted', 'subject', 'message', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FromType' => 1, 'FromUid' => 2, 'FromDeleted' => 3, 'ToType' => 4, 'ToUid' => 5, 'ToRead' => 6, 'ToDeleted' => 7, 'Subject' => 8, 'Message' => 9, 'Cdate' => 10, ),
		BasePeer::TYPE_COLNAME => array (GgMessagingPeer::ID => 0, GgMessagingPeer::FROM_TYPE => 1, GgMessagingPeer::FROM_UID => 2, GgMessagingPeer::FROM_DELETED => 3, GgMessagingPeer::TO_TYPE => 4, GgMessagingPeer::TO_UID => 5, GgMessagingPeer::TO_READ => 6, GgMessagingPeer::TO_DELETED => 7, GgMessagingPeer::SUBJECT => 8, GgMessagingPeer::MESSAGE => 9, GgMessagingPeer::CDATE => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'from_type' => 1, 'from_uid' => 2, 'from_deleted' => 3, 'to_type' => 4, 'to_uid' => 5, 'to_read' => 6, 'to_deleted' => 7, 'subject' => 8, 'message' => 9, 'cdate' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMessagingMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMessagingMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMessagingPeer::getTableMap();
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
		return str_replace(GgMessagingPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMessagingPeer::ID);

		$criteria->addSelectColumn(GgMessagingPeer::FROM_TYPE);

		$criteria->addSelectColumn(GgMessagingPeer::FROM_UID);

		$criteria->addSelectColumn(GgMessagingPeer::FROM_DELETED);

		$criteria->addSelectColumn(GgMessagingPeer::TO_TYPE);

		$criteria->addSelectColumn(GgMessagingPeer::TO_UID);

		$criteria->addSelectColumn(GgMessagingPeer::TO_READ);

		$criteria->addSelectColumn(GgMessagingPeer::TO_DELETED);

		$criteria->addSelectColumn(GgMessagingPeer::SUBJECT);

		$criteria->addSelectColumn(GgMessagingPeer::MESSAGE);

		$criteria->addSelectColumn(GgMessagingPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_messaging.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_messaging.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMessagingPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMessagingPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMessagingPeer::doSelectRS($criteria, $con);
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
		$objects = GgMessagingPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMessagingPeer::populateObjects(GgMessagingPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMessagingPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMessagingPeer::getOMClass();
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
		return GgMessagingPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMessagingPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMessagingPeer::ID);
			$selectCriteria->add(GgMessagingPeer::ID, $criteria->remove(GgMessagingPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMessagingPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMessagingPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMessaging) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMessagingPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMessaging $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMessagingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMessagingPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMessagingPeer::DATABASE_NAME, GgMessagingPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMessagingPeer::DATABASE_NAME);

		$criteria->add(GgMessagingPeer::ID, $pk);


		$v = GgMessagingPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMessagingPeer::ID, $pks, Criteria::IN);
			$objs = GgMessagingPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMessagingPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMessagingMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMessagingMapBuilder');
}
