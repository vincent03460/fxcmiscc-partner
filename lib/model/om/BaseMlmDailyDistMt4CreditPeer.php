<?php


abstract class BaseMlmDailyDistMt4CreditPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_daily_dist_mt4_credit';

	
	const CLASS_DEFAULT = 'lib.model.MlmDailyDistMt4Credit';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CREDIT_ID = 'mlm_daily_dist_mt4_credit.CREDIT_ID';

	
	const DIST_ID = 'mlm_daily_dist_mt4_credit.DIST_ID';

	
	const MT4_USER_NAME = 'mlm_daily_dist_mt4_credit.MT4_USER_NAME';

	
	const MT4_CREDIT = 'mlm_daily_dist_mt4_credit.MT4_CREDIT';

	
	const TRADED_DATETIME = 'mlm_daily_dist_mt4_credit.TRADED_DATETIME';

	
	const CREATED_BY = 'mlm_daily_dist_mt4_credit.CREATED_BY';

	
	const CREATED_ON = 'mlm_daily_dist_mt4_credit.CREATED_ON';

	
	const UPDATED_BY = 'mlm_daily_dist_mt4_credit.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_daily_dist_mt4_credit.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CreditId', 'DistId', 'Mt4UserName', 'Mt4Credit', 'TradedDatetime', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDailyDistMt4CreditPeer::CREDIT_ID, MlmDailyDistMt4CreditPeer::DIST_ID, MlmDailyDistMt4CreditPeer::MT4_USER_NAME, MlmDailyDistMt4CreditPeer::MT4_CREDIT, MlmDailyDistMt4CreditPeer::TRADED_DATETIME, MlmDailyDistMt4CreditPeer::CREATED_BY, MlmDailyDistMt4CreditPeer::CREATED_ON, MlmDailyDistMt4CreditPeer::UPDATED_BY, MlmDailyDistMt4CreditPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('credit_id', 'dist_id', 'mt4_user_name', 'mt4_credit', 'traded_datetime', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CreditId' => 0, 'DistId' => 1, 'Mt4UserName' => 2, 'Mt4Credit' => 3, 'TradedDatetime' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (MlmDailyDistMt4CreditPeer::CREDIT_ID => 0, MlmDailyDistMt4CreditPeer::DIST_ID => 1, MlmDailyDistMt4CreditPeer::MT4_USER_NAME => 2, MlmDailyDistMt4CreditPeer::MT4_CREDIT => 3, MlmDailyDistMt4CreditPeer::TRADED_DATETIME => 4, MlmDailyDistMt4CreditPeer::CREATED_BY => 5, MlmDailyDistMt4CreditPeer::CREATED_ON => 6, MlmDailyDistMt4CreditPeer::UPDATED_BY => 7, MlmDailyDistMt4CreditPeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('credit_id' => 0, 'dist_id' => 1, 'mt4_user_name' => 2, 'mt4_credit' => 3, 'traded_datetime' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDailyDistMt4CreditMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDailyDistMt4CreditMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDailyDistMt4CreditPeer::getTableMap();
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
		return str_replace(MlmDailyDistMt4CreditPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::CREDIT_ID);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::DIST_ID);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::MT4_USER_NAME);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::MT4_CREDIT);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::TRADED_DATETIME);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_daily_dist_mt4_credit.CREDIT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_daily_dist_mt4_credit.CREDIT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDailyDistMt4CreditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDailyDistMt4CreditPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDailyDistMt4CreditPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDailyDistMt4CreditPeer::populateObjects(MlmDailyDistMt4CreditPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDailyDistMt4CreditPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDailyDistMt4CreditPeer::getOMClass();
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
		return MlmDailyDistMt4CreditPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDailyDistMt4CreditPeer::CREDIT_ID); 

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
			$comparison = $criteria->getComparison(MlmDailyDistMt4CreditPeer::CREDIT_ID);
			$selectCriteria->add(MlmDailyDistMt4CreditPeer::CREDIT_ID, $criteria->remove(MlmDailyDistMt4CreditPeer::CREDIT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDailyDistMt4CreditPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDailyDistMt4CreditPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDailyDistMt4Credit) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDailyDistMt4CreditPeer::CREDIT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDailyDistMt4Credit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDailyDistMt4CreditPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDailyDistMt4CreditPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDailyDistMt4CreditPeer::DATABASE_NAME, MlmDailyDistMt4CreditPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDailyDistMt4CreditPeer::DATABASE_NAME);

		$criteria->add(MlmDailyDistMt4CreditPeer::CREDIT_ID, $pk);


		$v = MlmDailyDistMt4CreditPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDailyDistMt4CreditPeer::CREDIT_ID, $pks, Criteria::IN);
			$objs = MlmDailyDistMt4CreditPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDailyDistMt4CreditPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDailyDistMt4CreditMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDailyDistMt4CreditMapBuilder');
}
