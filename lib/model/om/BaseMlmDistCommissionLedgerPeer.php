<?php


abstract class BaseMlmDistCommissionLedgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_dist_commission_ledger';

	
	const CLASS_DEFAULT = 'lib.model.MlmDistCommissionLedger';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const COMMISSION_ID = 'mlm_dist_commission_ledger.COMMISSION_ID';

	
	const DIST_ID = 'mlm_dist_commission_ledger.DIST_ID';

	
	const COMMISSION_TYPE = 'mlm_dist_commission_ledger.COMMISSION_TYPE';

	
	const TRANSACTION_TYPE = 'mlm_dist_commission_ledger.TRANSACTION_TYPE';

	
	const REF_ID = 'mlm_dist_commission_ledger.REF_ID';

	
	const MONTH_TRADED = 'mlm_dist_commission_ledger.MONTH_TRADED';

	
	const YEAR_TRADED = 'mlm_dist_commission_ledger.YEAR_TRADED';

	
	const CREDIT = 'mlm_dist_commission_ledger.CREDIT';

	
	const DEBIT = 'mlm_dist_commission_ledger.DEBIT';

	
	const BALANCE = 'mlm_dist_commission_ledger.BALANCE';

	
	const REMARK = 'mlm_dist_commission_ledger.REMARK';

	
	const PIPS_DOWNLINE_USERNAME = 'mlm_dist_commission_ledger.PIPS_DOWNLINE_USERNAME';

	
	const PIPS_MT4_ID = 'mlm_dist_commission_ledger.PIPS_MT4_ID';

	
	const PIPS_REBATE = 'mlm_dist_commission_ledger.PIPS_REBATE';

	
	const PIPS_LEVEL = 'mlm_dist_commission_ledger.PIPS_LEVEL';

	
	const PIPS_LOTS_TRADED = 'mlm_dist_commission_ledger.PIPS_LOTS_TRADED';

	
	const CREATED_BY = 'mlm_dist_commission_ledger.CREATED_BY';

	
	const CREATED_ON = 'mlm_dist_commission_ledger.CREATED_ON';

	
	const UPDATED_BY = 'mlm_dist_commission_ledger.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_dist_commission_ledger.UPDATED_ON';

	
	const STATUS_CODE = 'mlm_dist_commission_ledger.STATUS_CODE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CommissionId', 'DistId', 'CommissionType', 'TransactionType', 'RefId', 'MonthTraded', 'YearTraded', 'Credit', 'Debit', 'Balance', 'Remark', 'PipsDownlineUsername', 'PipsMt4Id', 'PipsRebate', 'PipsLevel', 'PipsLotsTraded', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', 'StatusCode', ),
		BasePeer::TYPE_COLNAME => array (MlmDistCommissionLedgerPeer::COMMISSION_ID, MlmDistCommissionLedgerPeer::DIST_ID, MlmDistCommissionLedgerPeer::COMMISSION_TYPE, MlmDistCommissionLedgerPeer::TRANSACTION_TYPE, MlmDistCommissionLedgerPeer::REF_ID, MlmDistCommissionLedgerPeer::MONTH_TRADED, MlmDistCommissionLedgerPeer::YEAR_TRADED, MlmDistCommissionLedgerPeer::CREDIT, MlmDistCommissionLedgerPeer::DEBIT, MlmDistCommissionLedgerPeer::BALANCE, MlmDistCommissionLedgerPeer::REMARK, MlmDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME, MlmDistCommissionLedgerPeer::PIPS_MT4_ID, MlmDistCommissionLedgerPeer::PIPS_REBATE, MlmDistCommissionLedgerPeer::PIPS_LEVEL, MlmDistCommissionLedgerPeer::PIPS_LOTS_TRADED, MlmDistCommissionLedgerPeer::CREATED_BY, MlmDistCommissionLedgerPeer::CREATED_ON, MlmDistCommissionLedgerPeer::UPDATED_BY, MlmDistCommissionLedgerPeer::UPDATED_ON, MlmDistCommissionLedgerPeer::STATUS_CODE, ),
		BasePeer::TYPE_FIELDNAME => array ('commission_id', 'dist_id', 'commission_type', 'transaction_type', 'ref_id', 'month_traded', 'year_traded', 'credit', 'debit', 'balance', 'remark', 'pips_downline_username', 'pips_mt4_id', 'pips_rebate', 'pips_level', 'pips_lots_traded', 'created_by', 'created_on', 'updated_by', 'updated_on', 'status_code', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CommissionId' => 0, 'DistId' => 1, 'CommissionType' => 2, 'TransactionType' => 3, 'RefId' => 4, 'MonthTraded' => 5, 'YearTraded' => 6, 'Credit' => 7, 'Debit' => 8, 'Balance' => 9, 'Remark' => 10, 'PipsDownlineUsername' => 11, 'PipsMt4Id' => 12, 'PipsRebate' => 13, 'PipsLevel' => 14, 'PipsLotsTraded' => 15, 'CreatedBy' => 16, 'CreatedOn' => 17, 'UpdatedBy' => 18, 'UpdatedOn' => 19, 'StatusCode' => 20, ),
		BasePeer::TYPE_COLNAME => array (MlmDistCommissionLedgerPeer::COMMISSION_ID => 0, MlmDistCommissionLedgerPeer::DIST_ID => 1, MlmDistCommissionLedgerPeer::COMMISSION_TYPE => 2, MlmDistCommissionLedgerPeer::TRANSACTION_TYPE => 3, MlmDistCommissionLedgerPeer::REF_ID => 4, MlmDistCommissionLedgerPeer::MONTH_TRADED => 5, MlmDistCommissionLedgerPeer::YEAR_TRADED => 6, MlmDistCommissionLedgerPeer::CREDIT => 7, MlmDistCommissionLedgerPeer::DEBIT => 8, MlmDistCommissionLedgerPeer::BALANCE => 9, MlmDistCommissionLedgerPeer::REMARK => 10, MlmDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME => 11, MlmDistCommissionLedgerPeer::PIPS_MT4_ID => 12, MlmDistCommissionLedgerPeer::PIPS_REBATE => 13, MlmDistCommissionLedgerPeer::PIPS_LEVEL => 14, MlmDistCommissionLedgerPeer::PIPS_LOTS_TRADED => 15, MlmDistCommissionLedgerPeer::CREATED_BY => 16, MlmDistCommissionLedgerPeer::CREATED_ON => 17, MlmDistCommissionLedgerPeer::UPDATED_BY => 18, MlmDistCommissionLedgerPeer::UPDATED_ON => 19, MlmDistCommissionLedgerPeer::STATUS_CODE => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('commission_id' => 0, 'dist_id' => 1, 'commission_type' => 2, 'transaction_type' => 3, 'ref_id' => 4, 'month_traded' => 5, 'year_traded' => 6, 'credit' => 7, 'debit' => 8, 'balance' => 9, 'remark' => 10, 'pips_downline_username' => 11, 'pips_mt4_id' => 12, 'pips_rebate' => 13, 'pips_level' => 14, 'pips_lots_traded' => 15, 'created_by' => 16, 'created_on' => 17, 'updated_by' => 18, 'updated_on' => 19, 'status_code' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDistCommissionLedgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDistCommissionLedgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDistCommissionLedgerPeer::getTableMap();
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
		return str_replace(MlmDistCommissionLedgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::COMMISSION_ID);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::DIST_ID);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::COMMISSION_TYPE);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::REF_ID);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::MONTH_TRADED);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::YEAR_TRADED);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::CREDIT);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::DEBIT);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::BALANCE);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::REMARK);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::PIPS_MT4_ID);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::PIPS_REBATE);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::PIPS_LEVEL);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::PIPS_LOTS_TRADED);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::UPDATED_ON);

		$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::STATUS_CODE);

	}

	const COUNT = 'COUNT(mlm_dist_commission_ledger.COMMISSION_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_dist_commission_ledger.COMMISSION_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDistCommissionLedgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDistCommissionLedgerPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDistCommissionLedgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDistCommissionLedgerPeer::populateObjects(MlmDistCommissionLedgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDistCommissionLedgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDistCommissionLedgerPeer::getOMClass();
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
		return MlmDistCommissionLedgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDistCommissionLedgerPeer::COMMISSION_ID); 

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
			$comparison = $criteria->getComparison(MlmDistCommissionLedgerPeer::COMMISSION_ID);
			$selectCriteria->add(MlmDistCommissionLedgerPeer::COMMISSION_ID, $criteria->remove(MlmDistCommissionLedgerPeer::COMMISSION_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDistCommissionLedgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDistCommissionLedgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDistCommissionLedger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDistCommissionLedgerPeer::COMMISSION_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDistCommissionLedger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDistCommissionLedgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDistCommissionLedgerPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDistCommissionLedgerPeer::DATABASE_NAME, MlmDistCommissionLedgerPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDistCommissionLedgerPeer::DATABASE_NAME);

		$criteria->add(MlmDistCommissionLedgerPeer::COMMISSION_ID, $pk);


		$v = MlmDistCommissionLedgerPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDistCommissionLedgerPeer::COMMISSION_ID, $pks, Criteria::IN);
			$objs = MlmDistCommissionLedgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDistCommissionLedgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDistCommissionLedgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDistCommissionLedgerMapBuilder');
}
