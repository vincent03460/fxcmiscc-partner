<?php


abstract class BaseMlmAccountLedger20141231Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_account_ledger_20141231';

	
	const CLASS_DEFAULT = 'lib.model.MlmAccountLedger20141231';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ACCOUNT_ID = 'mlm_account_ledger_20141231.ACCOUNT_ID';

	
	const DIST_ID = 'mlm_account_ledger_20141231.DIST_ID';

	
	const ACCOUNT_TYPE = 'mlm_account_ledger_20141231.ACCOUNT_TYPE';

	
	const TRANSACTION_TYPE = 'mlm_account_ledger_20141231.TRANSACTION_TYPE';

	
	const ROLLING_POINT = 'mlm_account_ledger_20141231.ROLLING_POINT';

	
	const CREDIT = 'mlm_account_ledger_20141231.CREDIT';

	
	const DEBIT = 'mlm_account_ledger_20141231.DEBIT';

	
	const BALANCE = 'mlm_account_ledger_20141231.BALANCE';

	
	const REMARK = 'mlm_account_ledger_20141231.REMARK';

	
	const INTERNAL_REMARK = 'mlm_account_ledger_20141231.INTERNAL_REMARK';

	
	const REFERER_ID = 'mlm_account_ledger_20141231.REFERER_ID';

	
	const REFERER_TYPE = 'mlm_account_ledger_20141231.REFERER_TYPE';

	
	const CREATED_BY = 'mlm_account_ledger_20141231.CREATED_BY';

	
	const CREATED_ON = 'mlm_account_ledger_20141231.CREATED_ON';

	
	const UPDATED_BY = 'mlm_account_ledger_20141231.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_account_ledger_20141231.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AccountId', 'DistId', 'AccountType', 'TransactionType', 'RollingPoint', 'Credit', 'Debit', 'Balance', 'Remark', 'InternalRemark', 'RefererId', 'RefererType', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmAccountLedger20141231Peer::ACCOUNT_ID, MlmAccountLedger20141231Peer::DIST_ID, MlmAccountLedger20141231Peer::ACCOUNT_TYPE, MlmAccountLedger20141231Peer::TRANSACTION_TYPE, MlmAccountLedger20141231Peer::ROLLING_POINT, MlmAccountLedger20141231Peer::CREDIT, MlmAccountLedger20141231Peer::DEBIT, MlmAccountLedger20141231Peer::BALANCE, MlmAccountLedger20141231Peer::REMARK, MlmAccountLedger20141231Peer::INTERNAL_REMARK, MlmAccountLedger20141231Peer::REFERER_ID, MlmAccountLedger20141231Peer::REFERER_TYPE, MlmAccountLedger20141231Peer::CREATED_BY, MlmAccountLedger20141231Peer::CREATED_ON, MlmAccountLedger20141231Peer::UPDATED_BY, MlmAccountLedger20141231Peer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('account_id', 'dist_id', 'account_type', 'transaction_type', 'rolling_point', 'credit', 'debit', 'balance', 'remark', 'internal_remark', 'referer_id', 'referer_type', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AccountId' => 0, 'DistId' => 1, 'AccountType' => 2, 'TransactionType' => 3, 'RollingPoint' => 4, 'Credit' => 5, 'Debit' => 6, 'Balance' => 7, 'Remark' => 8, 'InternalRemark' => 9, 'RefererId' => 10, 'RefererType' => 11, 'CreatedBy' => 12, 'CreatedOn' => 13, 'UpdatedBy' => 14, 'UpdatedOn' => 15, ),
		BasePeer::TYPE_COLNAME => array (MlmAccountLedger20141231Peer::ACCOUNT_ID => 0, MlmAccountLedger20141231Peer::DIST_ID => 1, MlmAccountLedger20141231Peer::ACCOUNT_TYPE => 2, MlmAccountLedger20141231Peer::TRANSACTION_TYPE => 3, MlmAccountLedger20141231Peer::ROLLING_POINT => 4, MlmAccountLedger20141231Peer::CREDIT => 5, MlmAccountLedger20141231Peer::DEBIT => 6, MlmAccountLedger20141231Peer::BALANCE => 7, MlmAccountLedger20141231Peer::REMARK => 8, MlmAccountLedger20141231Peer::INTERNAL_REMARK => 9, MlmAccountLedger20141231Peer::REFERER_ID => 10, MlmAccountLedger20141231Peer::REFERER_TYPE => 11, MlmAccountLedger20141231Peer::CREATED_BY => 12, MlmAccountLedger20141231Peer::CREATED_ON => 13, MlmAccountLedger20141231Peer::UPDATED_BY => 14, MlmAccountLedger20141231Peer::UPDATED_ON => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('account_id' => 0, 'dist_id' => 1, 'account_type' => 2, 'transaction_type' => 3, 'rolling_point' => 4, 'credit' => 5, 'debit' => 6, 'balance' => 7, 'remark' => 8, 'internal_remark' => 9, 'referer_id' => 10, 'referer_type' => 11, 'created_by' => 12, 'created_on' => 13, 'updated_by' => 14, 'updated_on' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmAccountLedger20141231MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmAccountLedger20141231MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmAccountLedger20141231Peer::getTableMap();
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
		return str_replace(MlmAccountLedger20141231Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::ACCOUNT_ID);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::DIST_ID);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::ACCOUNT_TYPE);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::ROLLING_POINT);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::CREDIT);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::DEBIT);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::BALANCE);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::REMARK);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::INTERNAL_REMARK);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::REFERER_ID);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::REFERER_TYPE);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::CREATED_BY);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::CREATED_ON);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::UPDATED_BY);

		$criteria->addSelectColumn(MlmAccountLedger20141231Peer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_account_ledger_20141231.ACCOUNT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_account_ledger_20141231.ACCOUNT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmAccountLedger20141231Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmAccountLedger20141231Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmAccountLedger20141231Peer::doSelectRS($criteria, $con);
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
		$objects = MlmAccountLedger20141231Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmAccountLedger20141231Peer::populateObjects(MlmAccountLedger20141231Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmAccountLedger20141231Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmAccountLedger20141231Peer::getOMClass();
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
		return MlmAccountLedger20141231Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmAccountLedger20141231Peer::ACCOUNT_ID); 

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
			$comparison = $criteria->getComparison(MlmAccountLedger20141231Peer::ACCOUNT_ID);
			$selectCriteria->add(MlmAccountLedger20141231Peer::ACCOUNT_ID, $criteria->remove(MlmAccountLedger20141231Peer::ACCOUNT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmAccountLedger20141231Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmAccountLedger20141231Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmAccountLedger20141231) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmAccountLedger20141231Peer::ACCOUNT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmAccountLedger20141231 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmAccountLedger20141231Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmAccountLedger20141231Peer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmAccountLedger20141231Peer::DATABASE_NAME, MlmAccountLedger20141231Peer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmAccountLedger20141231Peer::DATABASE_NAME);

		$criteria->add(MlmAccountLedger20141231Peer::ACCOUNT_ID, $pk);


		$v = MlmAccountLedger20141231Peer::doSelect($criteria, $con);

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
			$criteria->add(MlmAccountLedger20141231Peer::ACCOUNT_ID, $pks, Criteria::IN);
			$objs = MlmAccountLedger20141231Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmAccountLedger20141231Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmAccountLedger20141231MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmAccountLedger20141231MapBuilder');
}
