<?php


abstract class BaseGgCronPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_cron';

	
	const CLASS_DEFAULT = 'lib.model.GgCron';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_cron.ID';

	
	const TYPE = 'gg_cron.TYPE';

	
	const STARTED = 'gg_cron.STARTED';

	
	const COMPLETED = 'gg_cron.COMPLETED';

	
	const SUCCESS = 'gg_cron.SUCCESS';

	
	const ENDED = 'gg_cron.ENDED';

	
	const YEAR = 'gg_cron.YEAR';

	
	const MONTH = 'gg_cron.MONTH';

	
	const DAY = 'gg_cron.DAY';

	
	const WEEK = 'gg_cron.WEEK';

	
	const MESSAGE = 'gg_cron.MESSAGE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Type', 'Started', 'Completed', 'Success', 'Ended', 'Year', 'Month', 'Day', 'Week', 'Message', ),
		BasePeer::TYPE_COLNAME => array (GgCronPeer::ID, GgCronPeer::TYPE, GgCronPeer::STARTED, GgCronPeer::COMPLETED, GgCronPeer::SUCCESS, GgCronPeer::ENDED, GgCronPeer::YEAR, GgCronPeer::MONTH, GgCronPeer::DAY, GgCronPeer::WEEK, GgCronPeer::MESSAGE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'type', 'started', 'completed', 'success', 'ended', 'year', 'month', 'day', 'week', 'message', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Type' => 1, 'Started' => 2, 'Completed' => 3, 'Success' => 4, 'Ended' => 5, 'Year' => 6, 'Month' => 7, 'Day' => 8, 'Week' => 9, 'Message' => 10, ),
		BasePeer::TYPE_COLNAME => array (GgCronPeer::ID => 0, GgCronPeer::TYPE => 1, GgCronPeer::STARTED => 2, GgCronPeer::COMPLETED => 3, GgCronPeer::SUCCESS => 4, GgCronPeer::ENDED => 5, GgCronPeer::YEAR => 6, GgCronPeer::MONTH => 7, GgCronPeer::DAY => 8, GgCronPeer::WEEK => 9, GgCronPeer::MESSAGE => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'type' => 1, 'started' => 2, 'completed' => 3, 'success' => 4, 'ended' => 5, 'year' => 6, 'month' => 7, 'day' => 8, 'week' => 9, 'message' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgCronMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgCronMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgCronPeer::getTableMap();
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
		return str_replace(GgCronPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgCronPeer::ID);

		$criteria->addSelectColumn(GgCronPeer::TYPE);

		$criteria->addSelectColumn(GgCronPeer::STARTED);

		$criteria->addSelectColumn(GgCronPeer::COMPLETED);

		$criteria->addSelectColumn(GgCronPeer::SUCCESS);

		$criteria->addSelectColumn(GgCronPeer::ENDED);

		$criteria->addSelectColumn(GgCronPeer::YEAR);

		$criteria->addSelectColumn(GgCronPeer::MONTH);

		$criteria->addSelectColumn(GgCronPeer::DAY);

		$criteria->addSelectColumn(GgCronPeer::WEEK);

		$criteria->addSelectColumn(GgCronPeer::MESSAGE);

	}

	const COUNT = 'COUNT(gg_cron.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_cron.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgCronPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgCronPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgCronPeer::doSelectRS($criteria, $con);
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
		$objects = GgCronPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgCronPeer::populateObjects(GgCronPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgCronPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgCronPeer::getOMClass();
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
		return GgCronPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgCronPeer::ID); 

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
			$comparison = $criteria->getComparison(GgCronPeer::ID);
			$selectCriteria->add(GgCronPeer::ID, $criteria->remove(GgCronPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgCronPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgCronPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgCron) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgCronPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgCron $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgCronPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgCronPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgCronPeer::DATABASE_NAME, GgCronPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgCronPeer::DATABASE_NAME);

		$criteria->add(GgCronPeer::ID, $pk);


		$v = GgCronPeer::doSelect($criteria, $con);

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
			$criteria->add(GgCronPeer::ID, $pks, Criteria::IN);
			$objs = GgCronPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgCronPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgCronMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgCronMapBuilder');
}
