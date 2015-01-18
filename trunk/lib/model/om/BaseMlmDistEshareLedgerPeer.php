<?php


abstract class BaseMlmDistEshareLedgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_dist_eshare_ledger';

	
	const CLASS_DEFAULT = 'lib.model.MlmDistEshareLedger';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ESHARE_ID = 'mlm_dist_eshare_ledger.ESHARE_ID';

	
	const DIST_ID = 'mlm_dist_eshare_ledger.DIST_ID';

	
	const BUY_PRICE = 'mlm_dist_eshare_ledger.BUY_PRICE';

	
	const CREDIT = 'mlm_dist_eshare_ledger.CREDIT';

	
	const SELL_PRICE = 'mlm_dist_eshare_ledger.SELL_PRICE';

	
	const DEBIT = 'mlm_dist_eshare_ledger.DEBIT';

	
	const PROFIT = 'mlm_dist_eshare_ledger.PROFIT';

	
	const SHARE_BALANCE = 'mlm_dist_eshare_ledger.SHARE_BALANCE';

	
	const REMARK = 'mlm_dist_eshare_ledger.REMARK';

	
	const VALID_SELL_DATE = 'mlm_dist_eshare_ledger.VALID_SELL_DATE';

	
	const SELL_DATE = 'mlm_dist_eshare_ledger.SELL_DATE';

	
	const STATUS_CODE = 'mlm_dist_eshare_ledger.STATUS_CODE';

	
	const CREATED_BY = 'mlm_dist_eshare_ledger.CREATED_BY';

	
	const CREATED_ON = 'mlm_dist_eshare_ledger.CREATED_ON';

	
	const UPDATED_BY = 'mlm_dist_eshare_ledger.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_dist_eshare_ledger.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EshareId', 'DistId', 'BuyPrice', 'Credit', 'SellPrice', 'Debit', 'Profit', 'ShareBalance', 'Remark', 'ValidSellDate', 'SellDate', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDistEshareLedgerPeer::ESHARE_ID, MlmDistEshareLedgerPeer::DIST_ID, MlmDistEshareLedgerPeer::BUY_PRICE, MlmDistEshareLedgerPeer::CREDIT, MlmDistEshareLedgerPeer::SELL_PRICE, MlmDistEshareLedgerPeer::DEBIT, MlmDistEshareLedgerPeer::PROFIT, MlmDistEshareLedgerPeer::SHARE_BALANCE, MlmDistEshareLedgerPeer::REMARK, MlmDistEshareLedgerPeer::VALID_SELL_DATE, MlmDistEshareLedgerPeer::SELL_DATE, MlmDistEshareLedgerPeer::STATUS_CODE, MlmDistEshareLedgerPeer::CREATED_BY, MlmDistEshareLedgerPeer::CREATED_ON, MlmDistEshareLedgerPeer::UPDATED_BY, MlmDistEshareLedgerPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('eshare_id', 'dist_id', 'buy_price', 'credit', 'sell_price', 'debit', 'profit', 'share_balance', 'remark', 'valid_sell_date', 'sell_date', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EshareId' => 0, 'DistId' => 1, 'BuyPrice' => 2, 'Credit' => 3, 'SellPrice' => 4, 'Debit' => 5, 'Profit' => 6, 'ShareBalance' => 7, 'Remark' => 8, 'ValidSellDate' => 9, 'SellDate' => 10, 'StatusCode' => 11, 'CreatedBy' => 12, 'CreatedOn' => 13, 'UpdatedBy' => 14, 'UpdatedOn' => 15, ),
		BasePeer::TYPE_COLNAME => array (MlmDistEshareLedgerPeer::ESHARE_ID => 0, MlmDistEshareLedgerPeer::DIST_ID => 1, MlmDistEshareLedgerPeer::BUY_PRICE => 2, MlmDistEshareLedgerPeer::CREDIT => 3, MlmDistEshareLedgerPeer::SELL_PRICE => 4, MlmDistEshareLedgerPeer::DEBIT => 5, MlmDistEshareLedgerPeer::PROFIT => 6, MlmDistEshareLedgerPeer::SHARE_BALANCE => 7, MlmDistEshareLedgerPeer::REMARK => 8, MlmDistEshareLedgerPeer::VALID_SELL_DATE => 9, MlmDistEshareLedgerPeer::SELL_DATE => 10, MlmDistEshareLedgerPeer::STATUS_CODE => 11, MlmDistEshareLedgerPeer::CREATED_BY => 12, MlmDistEshareLedgerPeer::CREATED_ON => 13, MlmDistEshareLedgerPeer::UPDATED_BY => 14, MlmDistEshareLedgerPeer::UPDATED_ON => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('eshare_id' => 0, 'dist_id' => 1, 'buy_price' => 2, 'credit' => 3, 'sell_price' => 4, 'debit' => 5, 'profit' => 6, 'share_balance' => 7, 'remark' => 8, 'valid_sell_date' => 9, 'sell_date' => 10, 'status_code' => 11, 'created_by' => 12, 'created_on' => 13, 'updated_by' => 14, 'updated_on' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDistEshareLedgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDistEshareLedgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDistEshareLedgerPeer::getTableMap();
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
		return str_replace(MlmDistEshareLedgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::ESHARE_ID);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::DIST_ID);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::BUY_PRICE);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::CREDIT);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::SELL_PRICE);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::DEBIT);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::PROFIT);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::SHARE_BALANCE);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::REMARK);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::VALID_SELL_DATE);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::SELL_DATE);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDistEshareLedgerPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_dist_eshare_ledger.ESHARE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_dist_eshare_ledger.ESHARE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDistEshareLedgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDistEshareLedgerPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDistEshareLedgerPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDistEshareLedgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDistEshareLedgerPeer::populateObjects(MlmDistEshareLedgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDistEshareLedgerPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmDistEshareLedgerPeer::getOMClass();
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
		return MlmDistEshareLedgerPeer::CLASS_DEFAULT;
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

		$criteria->remove(MlmDistEshareLedgerPeer::ESHARE_ID); 


		
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

			$comparison = $criteria->getComparison(MlmDistEshareLedgerPeer::ESHARE_ID);
			$selectCriteria->add(MlmDistEshareLedgerPeer::ESHARE_ID, $criteria->remove(MlmDistEshareLedgerPeer::ESHARE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDistEshareLedgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDistEshareLedgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmDistEshareLedger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDistEshareLedgerPeer::ESHARE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDistEshareLedger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDistEshareLedgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDistEshareLedgerPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDistEshareLedgerPeer::DATABASE_NAME, MlmDistEshareLedgerPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDistEshareLedgerPeer::DATABASE_NAME);

		$criteria->add(MlmDistEshareLedgerPeer::ESHARE_ID, $pk);


		$v = MlmDistEshareLedgerPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDistEshareLedgerPeer::ESHARE_ID, $pks, Criteria::IN);
			$objs = MlmDistEshareLedgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmDistEshareLedgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmDistEshareLedgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDistEshareLedgerMapBuilder');
}
