<?php


abstract class BaseGgShareTradingPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_share_trading';

	
	const CLASS_DEFAULT = 'lib.model.GgShareTrading';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_share_trading.ID';

	
	const UID = 'gg_share_trading.UID';

	
	const PRICE = 'gg_share_trading.PRICE';

	
	const QTY = 'gg_share_trading.QTY';

	
	const MATCH_QTY = 'gg_share_trading.MATCH_QTY';

	
	const TYPE = 'gg_share_trading.TYPE';

	
	const PAYMENT_TYPE = 'gg_share_trading.PAYMENT_TYPE';

	
	const CDATE = 'gg_share_trading.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Price', 'Qty', 'MatchQty', 'Type', 'PaymentType', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgShareTradingPeer::ID, GgShareTradingPeer::UID, GgShareTradingPeer::PRICE, GgShareTradingPeer::QTY, GgShareTradingPeer::MATCH_QTY, GgShareTradingPeer::TYPE, GgShareTradingPeer::PAYMENT_TYPE, GgShareTradingPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'price', 'qty', 'match_qty', 'type', 'payment_type', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Price' => 2, 'Qty' => 3, 'MatchQty' => 4, 'Type' => 5, 'PaymentType' => 6, 'Cdate' => 7, ),
		BasePeer::TYPE_COLNAME => array (GgShareTradingPeer::ID => 0, GgShareTradingPeer::UID => 1, GgShareTradingPeer::PRICE => 2, GgShareTradingPeer::QTY => 3, GgShareTradingPeer::MATCH_QTY => 4, GgShareTradingPeer::TYPE => 5, GgShareTradingPeer::PAYMENT_TYPE => 6, GgShareTradingPeer::CDATE => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'price' => 2, 'qty' => 3, 'match_qty' => 4, 'type' => 5, 'payment_type' => 6, 'cdate' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgShareTradingMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgShareTradingMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgShareTradingPeer::getTableMap();
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
		return str_replace(GgShareTradingPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgShareTradingPeer::ID);

		$criteria->addSelectColumn(GgShareTradingPeer::UID);

		$criteria->addSelectColumn(GgShareTradingPeer::PRICE);

		$criteria->addSelectColumn(GgShareTradingPeer::QTY);

		$criteria->addSelectColumn(GgShareTradingPeer::MATCH_QTY);

		$criteria->addSelectColumn(GgShareTradingPeer::TYPE);

		$criteria->addSelectColumn(GgShareTradingPeer::PAYMENT_TYPE);

		$criteria->addSelectColumn(GgShareTradingPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_share_trading.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_share_trading.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgShareTradingPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgShareTradingPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgShareTradingPeer::doSelectRS($criteria, $con);
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
		$objects = GgShareTradingPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgShareTradingPeer::populateObjects(GgShareTradingPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgShareTradingPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgShareTradingPeer::getOMClass();
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
		return GgShareTradingPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgShareTradingPeer::ID); 

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
			$comparison = $criteria->getComparison(GgShareTradingPeer::ID);
			$selectCriteria->add(GgShareTradingPeer::ID, $criteria->remove(GgShareTradingPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgShareTradingPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgShareTradingPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgShareTrading) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgShareTradingPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgShareTrading $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgShareTradingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgShareTradingPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgShareTradingPeer::DATABASE_NAME, GgShareTradingPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgShareTradingPeer::DATABASE_NAME);

		$criteria->add(GgShareTradingPeer::ID, $pk);


		$v = GgShareTradingPeer::doSelect($criteria, $con);

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
			$criteria->add(GgShareTradingPeer::ID, $pks, Criteria::IN);
			$objs = GgShareTradingPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgShareTradingPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgShareTradingMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgShareTradingMapBuilder');
}
