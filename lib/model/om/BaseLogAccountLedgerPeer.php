<?php


abstract class BaseLogAccountLedgerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'log_account_ledger';

	
	const CLASS_DEFAULT = 'lib.model.LogAccountLedger';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LOG_ID = 'log_account_ledger.LOG_ID';

	
	const ACCOUNT_ID = 'log_account_ledger.ACCOUNT_ID';

	
	const DIST_ID = 'log_account_ledger.DIST_ID';

	
	const ACCOUNT_TYPE = 'log_account_ledger.ACCOUNT_TYPE';

	
	const TRANSACTION_TYPE = 'log_account_ledger.TRANSACTION_TYPE';

	
	const ROLLING_POINT = 'log_account_ledger.ROLLING_POINT';

	
	const CREDIT = 'log_account_ledger.CREDIT';

	
	const DEBIT = 'log_account_ledger.DEBIT';

	
	const BALANCE = 'log_account_ledger.BALANCE';

	
	const REMARK = 'log_account_ledger.REMARK';

	
	const INTERNAL_REMARK = 'log_account_ledger.INTERNAL_REMARK';

	
	const REFERER_ID = 'log_account_ledger.REFERER_ID';

	
	const REFERER_TYPE = 'log_account_ledger.REFERER_TYPE';

	
	const ACCESS_IP = 'log_account_ledger.ACCESS_IP';

	
	const CREATED_BY = 'log_account_ledger.CREATED_BY';

	
	const CREATED_ON = 'log_account_ledger.CREATED_ON';

	
	const UPDATED_BY = 'log_account_ledger.UPDATED_BY';

	
	const UPDATED_ON = 'log_account_ledger.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LogId', 'AccountId', 'DistId', 'AccountType', 'TransactionType', 'RollingPoint', 'Credit', 'Debit', 'Balance', 'Remark', 'InternalRemark', 'RefererId', 'RefererType', 'AccessIp', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (LogAccountLedgerPeer::LOG_ID, LogAccountLedgerPeer::ACCOUNT_ID, LogAccountLedgerPeer::DIST_ID, LogAccountLedgerPeer::ACCOUNT_TYPE, LogAccountLedgerPeer::TRANSACTION_TYPE, LogAccountLedgerPeer::ROLLING_POINT, LogAccountLedgerPeer::CREDIT, LogAccountLedgerPeer::DEBIT, LogAccountLedgerPeer::BALANCE, LogAccountLedgerPeer::REMARK, LogAccountLedgerPeer::INTERNAL_REMARK, LogAccountLedgerPeer::REFERER_ID, LogAccountLedgerPeer::REFERER_TYPE, LogAccountLedgerPeer::ACCESS_IP, LogAccountLedgerPeer::CREATED_BY, LogAccountLedgerPeer::CREATED_ON, LogAccountLedgerPeer::UPDATED_BY, LogAccountLedgerPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id', 'account_id', 'dist_id', 'account_type', 'transaction_type', 'rolling_point', 'credit', 'debit', 'balance', 'remark', 'internal_remark', 'referer_id', 'referer_type', 'access_ip', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LogId' => 0, 'AccountId' => 1, 'DistId' => 2, 'AccountType' => 3, 'TransactionType' => 4, 'RollingPoint' => 5, 'Credit' => 6, 'Debit' => 7, 'Balance' => 8, 'Remark' => 9, 'InternalRemark' => 10, 'RefererId' => 11, 'RefererType' => 12, 'AccessIp' => 13, 'CreatedBy' => 14, 'CreatedOn' => 15, 'UpdatedBy' => 16, 'UpdatedOn' => 17, ),
		BasePeer::TYPE_COLNAME => array (LogAccountLedgerPeer::LOG_ID => 0, LogAccountLedgerPeer::ACCOUNT_ID => 1, LogAccountLedgerPeer::DIST_ID => 2, LogAccountLedgerPeer::ACCOUNT_TYPE => 3, LogAccountLedgerPeer::TRANSACTION_TYPE => 4, LogAccountLedgerPeer::ROLLING_POINT => 5, LogAccountLedgerPeer::CREDIT => 6, LogAccountLedgerPeer::DEBIT => 7, LogAccountLedgerPeer::BALANCE => 8, LogAccountLedgerPeer::REMARK => 9, LogAccountLedgerPeer::INTERNAL_REMARK => 10, LogAccountLedgerPeer::REFERER_ID => 11, LogAccountLedgerPeer::REFERER_TYPE => 12, LogAccountLedgerPeer::ACCESS_IP => 13, LogAccountLedgerPeer::CREATED_BY => 14, LogAccountLedgerPeer::CREATED_ON => 15, LogAccountLedgerPeer::UPDATED_BY => 16, LogAccountLedgerPeer::UPDATED_ON => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id' => 0, 'account_id' => 1, 'dist_id' => 2, 'account_type' => 3, 'transaction_type' => 4, 'rolling_point' => 5, 'credit' => 6, 'debit' => 7, 'balance' => 8, 'remark' => 9, 'internal_remark' => 10, 'referer_id' => 11, 'referer_type' => 12, 'access_ip' => 13, 'created_by' => 14, 'created_on' => 15, 'updated_by' => 16, 'updated_on' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LogAccountLedgerMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LogAccountLedgerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LogAccountLedgerPeer::getTableMap();
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
		return str_replace(LogAccountLedgerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LogAccountLedgerPeer::LOG_ID);

		$criteria->addSelectColumn(LogAccountLedgerPeer::ACCOUNT_ID);

		$criteria->addSelectColumn(LogAccountLedgerPeer::DIST_ID);

		$criteria->addSelectColumn(LogAccountLedgerPeer::ACCOUNT_TYPE);

		$criteria->addSelectColumn(LogAccountLedgerPeer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(LogAccountLedgerPeer::ROLLING_POINT);

		$criteria->addSelectColumn(LogAccountLedgerPeer::CREDIT);

		$criteria->addSelectColumn(LogAccountLedgerPeer::DEBIT);

		$criteria->addSelectColumn(LogAccountLedgerPeer::BALANCE);

		$criteria->addSelectColumn(LogAccountLedgerPeer::REMARK);

		$criteria->addSelectColumn(LogAccountLedgerPeer::INTERNAL_REMARK);

		$criteria->addSelectColumn(LogAccountLedgerPeer::REFERER_ID);

		$criteria->addSelectColumn(LogAccountLedgerPeer::REFERER_TYPE);

		$criteria->addSelectColumn(LogAccountLedgerPeer::ACCESS_IP);

		$criteria->addSelectColumn(LogAccountLedgerPeer::CREATED_BY);

		$criteria->addSelectColumn(LogAccountLedgerPeer::CREATED_ON);

		$criteria->addSelectColumn(LogAccountLedgerPeer::UPDATED_BY);

		$criteria->addSelectColumn(LogAccountLedgerPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(log_account_ledger.LOG_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT log_account_ledger.LOG_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LogAccountLedgerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LogAccountLedgerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LogAccountLedgerPeer::doSelectRS($criteria, $con);
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
		$objects = LogAccountLedgerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LogAccountLedgerPeer::populateObjects(LogAccountLedgerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LogAccountLedgerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LogAccountLedgerPeer::getOMClass();
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
		return LogAccountLedgerPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LogAccountLedgerPeer::LOG_ID); 

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
			$comparison = $criteria->getComparison(LogAccountLedgerPeer::LOG_ID);
			$selectCriteria->add(LogAccountLedgerPeer::LOG_ID, $criteria->remove(LogAccountLedgerPeer::LOG_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LogAccountLedgerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LogAccountLedgerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof LogAccountLedger) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LogAccountLedgerPeer::LOG_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(LogAccountLedger $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LogAccountLedgerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LogAccountLedgerPeer::TABLE_NAME);

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

		return BasePeer::doValidate(LogAccountLedgerPeer::DATABASE_NAME, LogAccountLedgerPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(LogAccountLedgerPeer::DATABASE_NAME);

		$criteria->add(LogAccountLedgerPeer::LOG_ID, $pk);


		$v = LogAccountLedgerPeer::doSelect($criteria, $con);

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
			$criteria->add(LogAccountLedgerPeer::LOG_ID, $pks, Criteria::IN);
			$objs = LogAccountLedgerPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLogAccountLedgerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LogAccountLedgerMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LogAccountLedgerMapBuilder');
}
