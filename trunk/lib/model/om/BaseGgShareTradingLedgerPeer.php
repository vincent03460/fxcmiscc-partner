<?php


abstract class BaseGgShareTradingLedgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_share_trading_ledger';

	
	const CLASS_DEFAULT = 'lib.model.GgShareTradingLedger';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_share_trading_ledger.ID';

	
	const TRADING_ID = 'gg_share_trading_ledger.TRADING_ID';

	
	const UID = 'gg_share_trading_ledger.UID';

	
	const BUY_UID = 'gg_share_trading_ledger.BUY_UID';

	
	const SELL_UID = 'gg_share_trading_ledger.SELL_UID';

	
	const PRICE = 'gg_share_trading_ledger.PRICE';

	
	const QTY = 'gg_share_trading_ledger.QTY';

	
	const TYPE = 'gg_share_trading_ledger.TYPE';

	
	const CDATE = 'gg_share_trading_ledger.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TradingId', 'Uid', 'BuyUid', 'SellUid', 'Price', 'Qty', 'Type', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgShareTradingLedgerPeer::ID, GgShareTradingLedgerPeer::TRADING_ID, GgShareTradingLedgerPeer::UID, GgShareTradingLedgerPeer::BUY_UID, GgShareTradingLedgerPeer::SELL_UID, GgShareTradingLedgerPeer::PRICE, GgShareTradingLedgerPeer::QTY, GgShareTradingLedgerPeer::TYPE, GgShareTradingLedgerPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'trading_id', 'uid', 'buy_uid', 'sell_uid', 'price', 'qty', 'type', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TradingId' => 1, 'Uid' => 2, 'BuyUid' => 3, 'SellUid' => 4, 'Price' => 5, 'Qty' => 6, 'Type' => 7, 'Cdate' => 8, ),
		BasePeer::TYPE_COLNAME => array (GgShareTradingLedgerPeer::ID => 0, GgShareTradingLedgerPeer::TRADING_ID => 1, GgShareTradingLedgerPeer::UID => 2, GgShareTradingLedgerPeer::BUY_UID => 3, GgShareTradingLedgerPeer::SELL_UID => 4, GgShareTradingLedgerPeer::PRICE => 5, GgShareTradingLedgerPeer::QTY => 6, GgShareTradingLedgerPeer::TYPE => 7, GgShareTradingLedgerPeer::CDATE => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'trading_id' => 1, 'uid' => 2, 'buy_uid' => 3, 'sell_uid' => 4, 'price' => 5, 'qty' => 6, 'type' => 7, 'cdate' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgShareTradingLedgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgShareTradingLedgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgShareTradingLedgerPeer::getTableMap();
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
		return str_replace(GgShareTradingLedgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::ID);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::TRADING_ID);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::UID);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::BUY_UID);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::SELL_UID);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::PRICE);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::QTY);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::TYPE);

		$criteria->addSelectColumn(GgShareTradingLedgerPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_share_trading_ledger.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_share_trading_ledger.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgShareTradingLedgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgShareTradingLedgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgShareTradingLedgerPeer::doSelectRS($criteria, $con);
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
		$objects = GgShareTradingLedgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgShareTradingLedgerPeer::populateObjects(GgShareTradingLedgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgShareTradingLedgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgShareTradingLedgerPeer::getOMClass();
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
		return GgShareTradingLedgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgShareTradingLedgerPeer::ID); 

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
			$comparison = $criteria->getComparison(GgShareTradingLedgerPeer::ID);
			$selectCriteria->add(GgShareTradingLedgerPeer::ID, $criteria->remove(GgShareTradingLedgerPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgShareTradingLedgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgShareTradingLedgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgShareTradingLedger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgShareTradingLedgerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgShareTradingLedger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgShareTradingLedgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgShareTradingLedgerPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgShareTradingLedgerPeer::DATABASE_NAME, GgShareTradingLedgerPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgShareTradingLedgerPeer::DATABASE_NAME);

		$criteria->add(GgShareTradingLedgerPeer::ID, $pk);


		$v = GgShareTradingLedgerPeer::doSelect($criteria, $con);

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
			$criteria->add(GgShareTradingLedgerPeer::ID, $pks, Criteria::IN);
			$objs = GgShareTradingLedgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgShareTradingLedgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgShareTradingLedgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgShareTradingLedgerMapBuilder');
}
