<?php


abstract class BaseMlmAccountLedgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_account_ledger';

	
	const CLASS_DEFAULT = 'lib.model.MlmAccountLedger';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ACCOUNT_ID = 'mlm_account_ledger.ACCOUNT_ID';

	
	const DIST_ID = 'mlm_account_ledger.DIST_ID';

	
	const ACCOUNT_TYPE = 'mlm_account_ledger.ACCOUNT_TYPE';

	
	const TRANSACTION_TYPE = 'mlm_account_ledger.TRANSACTION_TYPE';

	
	const CREDIT = 'mlm_account_ledger.CREDIT';

	
	const DEBIT = 'mlm_account_ledger.DEBIT';

	
	const BALANCE = 'mlm_account_ledger.BALANCE';

	
	const REMARK = 'mlm_account_ledger.REMARK';

	
	const INTERNAL_REMARK = 'mlm_account_ledger.INTERNAL_REMARK';

	
	const REF_ID = 'mlm_account_ledger.REF_ID';

	
	const REF_TYPE = 'mlm_account_ledger.REF_TYPE';

	
	const CREATED_BY = 'mlm_account_ledger.CREATED_BY';

	
	const CREATED_ON = 'mlm_account_ledger.CREATED_ON';

	
	const UPDATED_BY = 'mlm_account_ledger.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_account_ledger.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AccountId', 'DistId', 'AccountType', 'TransactionType', 'Credit', 'Debit', 'Balance', 'Remark', 'InternalRemark', 'RefId', 'RefType', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmAccountLedgerPeer::ACCOUNT_ID, MlmAccountLedgerPeer::DIST_ID, MlmAccountLedgerPeer::ACCOUNT_TYPE, MlmAccountLedgerPeer::TRANSACTION_TYPE, MlmAccountLedgerPeer::CREDIT, MlmAccountLedgerPeer::DEBIT, MlmAccountLedgerPeer::BALANCE, MlmAccountLedgerPeer::REMARK, MlmAccountLedgerPeer::INTERNAL_REMARK, MlmAccountLedgerPeer::REF_ID, MlmAccountLedgerPeer::REF_TYPE, MlmAccountLedgerPeer::CREATED_BY, MlmAccountLedgerPeer::CREATED_ON, MlmAccountLedgerPeer::UPDATED_BY, MlmAccountLedgerPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('account_id', 'dist_id', 'account_type', 'transaction_type', 'credit', 'debit', 'balance', 'remark', 'internal_remark', 'ref_id', 'ref_type', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AccountId' => 0, 'DistId' => 1, 'AccountType' => 2, 'TransactionType' => 3, 'Credit' => 4, 'Debit' => 5, 'Balance' => 6, 'Remark' => 7, 'InternalRemark' => 8, 'RefId' => 9, 'RefType' => 10, 'CreatedBy' => 11, 'CreatedOn' => 12, 'UpdatedBy' => 13, 'UpdatedOn' => 14, ),
		BasePeer::TYPE_COLNAME => array (MlmAccountLedgerPeer::ACCOUNT_ID => 0, MlmAccountLedgerPeer::DIST_ID => 1, MlmAccountLedgerPeer::ACCOUNT_TYPE => 2, MlmAccountLedgerPeer::TRANSACTION_TYPE => 3, MlmAccountLedgerPeer::CREDIT => 4, MlmAccountLedgerPeer::DEBIT => 5, MlmAccountLedgerPeer::BALANCE => 6, MlmAccountLedgerPeer::REMARK => 7, MlmAccountLedgerPeer::INTERNAL_REMARK => 8, MlmAccountLedgerPeer::REF_ID => 9, MlmAccountLedgerPeer::REF_TYPE => 10, MlmAccountLedgerPeer::CREATED_BY => 11, MlmAccountLedgerPeer::CREATED_ON => 12, MlmAccountLedgerPeer::UPDATED_BY => 13, MlmAccountLedgerPeer::UPDATED_ON => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('account_id' => 0, 'dist_id' => 1, 'account_type' => 2, 'transaction_type' => 3, 'credit' => 4, 'debit' => 5, 'balance' => 6, 'remark' => 7, 'internal_remark' => 8, 'ref_id' => 9, 'ref_type' => 10, 'created_by' => 11, 'created_on' => 12, 'updated_by' => 13, 'updated_on' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmAccountLedgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmAccountLedgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmAccountLedgerPeer::getTableMap();
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
		return str_replace(MlmAccountLedgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmAccountLedgerPeer::ACCOUNT_ID);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::DIST_ID);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::ACCOUNT_TYPE);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::CREDIT);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::DEBIT);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::BALANCE);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::REMARK);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::INTERNAL_REMARK);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::REF_ID);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::REF_TYPE);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmAccountLedgerPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_account_ledger.ACCOUNT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_account_ledger.ACCOUNT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmAccountLedgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmAccountLedgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmAccountLedgerPeer::doSelectRS($criteria, $con);
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
		$objects = MlmAccountLedgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmAccountLedgerPeer::populateObjects(MlmAccountLedgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmAccountLedgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmAccountLedgerPeer::getOMClass();
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
		return MlmAccountLedgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmAccountLedgerPeer::ACCOUNT_ID); 

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
			$comparison = $criteria->getComparison(MlmAccountLedgerPeer::ACCOUNT_ID);
			$selectCriteria->add(MlmAccountLedgerPeer::ACCOUNT_ID, $criteria->remove(MlmAccountLedgerPeer::ACCOUNT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmAccountLedgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmAccountLedgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmAccountLedger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmAccountLedgerPeer::ACCOUNT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmAccountLedger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmAccountLedgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmAccountLedgerPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmAccountLedgerPeer::DATABASE_NAME, MlmAccountLedgerPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmAccountLedgerPeer::DATABASE_NAME);

		$criteria->add(MlmAccountLedgerPeer::ACCOUNT_ID, $pk);


		$v = MlmAccountLedgerPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmAccountLedgerPeer::ACCOUNT_ID, $pks, Criteria::IN);
			$objs = MlmAccountLedgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmAccountLedgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmAccountLedgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmAccountLedgerMapBuilder');
}
