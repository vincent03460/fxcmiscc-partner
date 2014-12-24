<?php


abstract class BaseDemoDistCommissionLedgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'demo_dist_commission_ledger';

	
	const CLASS_DEFAULT = 'lib.model.DemoDistCommissionLedger';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const COMMISSION_ID = 'demo_dist_commission_ledger.COMMISSION_ID';

	
	const DIST_ID = 'demo_dist_commission_ledger.DIST_ID';

	
	const COMMISSION_TYPE = 'demo_dist_commission_ledger.COMMISSION_TYPE';

	
	const TRANSACTION_TYPE = 'demo_dist_commission_ledger.TRANSACTION_TYPE';

	
	const REF_ID = 'demo_dist_commission_ledger.REF_ID';

	
	const MONTH_TRADED = 'demo_dist_commission_ledger.MONTH_TRADED';

	
	const YEAR_TRADED = 'demo_dist_commission_ledger.YEAR_TRADED';

	
	const CREDIT = 'demo_dist_commission_ledger.CREDIT';

	
	const DEBIT = 'demo_dist_commission_ledger.DEBIT';

	
	const BALANCE = 'demo_dist_commission_ledger.BALANCE';

	
	const REMARK = 'demo_dist_commission_ledger.REMARK';

	
	const PIPS_DOWNLINE_USERNAME = 'demo_dist_commission_ledger.PIPS_DOWNLINE_USERNAME';

	
	const PIPS_MT4_ID = 'demo_dist_commission_ledger.PIPS_MT4_ID';

	
	const PIPS_REBATE = 'demo_dist_commission_ledger.PIPS_REBATE';

	
	const PIPS_LEVEL = 'demo_dist_commission_ledger.PIPS_LEVEL';

	
	const PIPS_LOTS_TRADED = 'demo_dist_commission_ledger.PIPS_LOTS_TRADED';

	
	const CREATED_BY = 'demo_dist_commission_ledger.CREATED_BY';

	
	const CREATED_ON = 'demo_dist_commission_ledger.CREATED_ON';

	
	const UPDATED_BY = 'demo_dist_commission_ledger.UPDATED_BY';

	
	const UPDATED_ON = 'demo_dist_commission_ledger.UPDATED_ON';

	
	const STATUS_CODE = 'demo_dist_commission_ledger.STATUS_CODE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CommissionId', 'DistId', 'CommissionType', 'TransactionType', 'RefId', 'MonthTraded', 'YearTraded', 'Credit', 'Debit', 'Balance', 'Remark', 'PipsDownlineUsername', 'PipsMt4Id', 'PipsRebate', 'PipsLevel', 'PipsLotsTraded', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', 'StatusCode', ),
		BasePeer::TYPE_COLNAME => array (DemoDistCommissionLedgerPeer::COMMISSION_ID, DemoDistCommissionLedgerPeer::DIST_ID, DemoDistCommissionLedgerPeer::COMMISSION_TYPE, DemoDistCommissionLedgerPeer::TRANSACTION_TYPE, DemoDistCommissionLedgerPeer::REF_ID, DemoDistCommissionLedgerPeer::MONTH_TRADED, DemoDistCommissionLedgerPeer::YEAR_TRADED, DemoDistCommissionLedgerPeer::CREDIT, DemoDistCommissionLedgerPeer::DEBIT, DemoDistCommissionLedgerPeer::BALANCE, DemoDistCommissionLedgerPeer::REMARK, DemoDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME, DemoDistCommissionLedgerPeer::PIPS_MT4_ID, DemoDistCommissionLedgerPeer::PIPS_REBATE, DemoDistCommissionLedgerPeer::PIPS_LEVEL, DemoDistCommissionLedgerPeer::PIPS_LOTS_TRADED, DemoDistCommissionLedgerPeer::CREATED_BY, DemoDistCommissionLedgerPeer::CREATED_ON, DemoDistCommissionLedgerPeer::UPDATED_BY, DemoDistCommissionLedgerPeer::UPDATED_ON, DemoDistCommissionLedgerPeer::STATUS_CODE, ),
		BasePeer::TYPE_FIELDNAME => array ('commission_id', 'dist_id', 'commission_type', 'transaction_type', 'ref_id', 'month_traded', 'year_traded', 'credit', 'debit', 'balance', 'remark', 'pips_downline_username', 'pips_mt4_id', 'pips_rebate', 'pips_level', 'pips_lots_traded', 'created_by', 'created_on', 'updated_by', 'updated_on', 'status_code', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CommissionId' => 0, 'DistId' => 1, 'CommissionType' => 2, 'TransactionType' => 3, 'RefId' => 4, 'MonthTraded' => 5, 'YearTraded' => 6, 'Credit' => 7, 'Debit' => 8, 'Balance' => 9, 'Remark' => 10, 'PipsDownlineUsername' => 11, 'PipsMt4Id' => 12, 'PipsRebate' => 13, 'PipsLevel' => 14, 'PipsLotsTraded' => 15, 'CreatedBy' => 16, 'CreatedOn' => 17, 'UpdatedBy' => 18, 'UpdatedOn' => 19, 'StatusCode' => 20, ),
		BasePeer::TYPE_COLNAME => array (DemoDistCommissionLedgerPeer::COMMISSION_ID => 0, DemoDistCommissionLedgerPeer::DIST_ID => 1, DemoDistCommissionLedgerPeer::COMMISSION_TYPE => 2, DemoDistCommissionLedgerPeer::TRANSACTION_TYPE => 3, DemoDistCommissionLedgerPeer::REF_ID => 4, DemoDistCommissionLedgerPeer::MONTH_TRADED => 5, DemoDistCommissionLedgerPeer::YEAR_TRADED => 6, DemoDistCommissionLedgerPeer::CREDIT => 7, DemoDistCommissionLedgerPeer::DEBIT => 8, DemoDistCommissionLedgerPeer::BALANCE => 9, DemoDistCommissionLedgerPeer::REMARK => 10, DemoDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME => 11, DemoDistCommissionLedgerPeer::PIPS_MT4_ID => 12, DemoDistCommissionLedgerPeer::PIPS_REBATE => 13, DemoDistCommissionLedgerPeer::PIPS_LEVEL => 14, DemoDistCommissionLedgerPeer::PIPS_LOTS_TRADED => 15, DemoDistCommissionLedgerPeer::CREATED_BY => 16, DemoDistCommissionLedgerPeer::CREATED_ON => 17, DemoDistCommissionLedgerPeer::UPDATED_BY => 18, DemoDistCommissionLedgerPeer::UPDATED_ON => 19, DemoDistCommissionLedgerPeer::STATUS_CODE => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('commission_id' => 0, 'dist_id' => 1, 'commission_type' => 2, 'transaction_type' => 3, 'ref_id' => 4, 'month_traded' => 5, 'year_traded' => 6, 'credit' => 7, 'debit' => 8, 'balance' => 9, 'remark' => 10, 'pips_downline_username' => 11, 'pips_mt4_id' => 12, 'pips_rebate' => 13, 'pips_level' => 14, 'pips_lots_traded' => 15, 'created_by' => 16, 'created_on' => 17, 'updated_by' => 18, 'updated_on' => 19, 'status_code' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DemoDistCommissionLedgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DemoDistCommissionLedgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DemoDistCommissionLedgerPeer::getTableMap();
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
		return str_replace(DemoDistCommissionLedgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::COMMISSION_ID);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::DIST_ID);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::COMMISSION_TYPE);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::REF_ID);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::MONTH_TRADED);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::YEAR_TRADED);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::CREDIT);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::DEBIT);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::BALANCE);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::REMARK);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::PIPS_MT4_ID);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::PIPS_REBATE);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::PIPS_LEVEL);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::PIPS_LOTS_TRADED);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::CREATED_BY);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::CREATED_ON);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::UPDATED_BY);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::UPDATED_ON);

		$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::STATUS_CODE);

	}

	const COUNT = 'COUNT(demo_dist_commission_ledger.COMMISSION_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT demo_dist_commission_ledger.COMMISSION_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DemoDistCommissionLedgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DemoDistCommissionLedgerPeer::doSelectRS($criteria, $con);
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
		$objects = DemoDistCommissionLedgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DemoDistCommissionLedgerPeer::populateObjects(DemoDistCommissionLedgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DemoDistCommissionLedgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DemoDistCommissionLedgerPeer::getOMClass();
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
		return DemoDistCommissionLedgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DemoDistCommissionLedgerPeer::COMMISSION_ID); 

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
			$comparison = $criteria->getComparison(DemoDistCommissionLedgerPeer::COMMISSION_ID);
			$selectCriteria->add(DemoDistCommissionLedgerPeer::COMMISSION_ID, $criteria->remove(DemoDistCommissionLedgerPeer::COMMISSION_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DemoDistCommissionLedgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DemoDistCommissionLedgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof DemoDistCommissionLedger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DemoDistCommissionLedgerPeer::COMMISSION_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(DemoDistCommissionLedger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DemoDistCommissionLedgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DemoDistCommissionLedgerPeer::TABLE_NAME);

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

		return BasePeer::doValidate(DemoDistCommissionLedgerPeer::DATABASE_NAME, DemoDistCommissionLedgerPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(DemoDistCommissionLedgerPeer::DATABASE_NAME);

		$criteria->add(DemoDistCommissionLedgerPeer::COMMISSION_ID, $pk);


		$v = DemoDistCommissionLedgerPeer::doSelect($criteria, $con);

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
			$criteria->add(DemoDistCommissionLedgerPeer::COMMISSION_ID, $pks, Criteria::IN);
			$objs = DemoDistCommissionLedgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDemoDistCommissionLedgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DemoDistCommissionLedgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DemoDistCommissionLedgerMapBuilder');
}
