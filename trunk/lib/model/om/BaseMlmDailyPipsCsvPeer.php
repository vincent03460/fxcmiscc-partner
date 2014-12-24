<?php


abstract class BaseMlmDailyPipsCsvPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_daily_pips_csv';

	
	const CLASS_DEFAULT = 'lib.model.MlmDailyPipsCsv';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PIP_ID = 'mlm_daily_pips_csv.PIP_ID';

	
	const TRADED_DATETIME = 'mlm_daily_pips_csv.TRADED_DATETIME';

	
	const FILE_ID = 'mlm_daily_pips_csv.FILE_ID';

	
	const PIPS_STRING = 'mlm_daily_pips_csv.PIPS_STRING';

	
	const LOGIN_ID = 'mlm_daily_pips_csv.LOGIN_ID';

	
	const LOGIN_NAME = 'mlm_daily_pips_csv.LOGIN_NAME';

	
	const BALANCE = 'mlm_daily_pips_csv.BALANCE';

	
	const CREDIT = 'mlm_daily_pips_csv.CREDIT';

	
	const COMMISSIONS = 'mlm_daily_pips_csv.COMMISSIONS';

	
	const TAXES = 'mlm_daily_pips_csv.TAXES';

	
	const STORAGE = 'mlm_daily_pips_csv.STORAGE';

	
	const PROFIT = 'mlm_daily_pips_csv.PROFIT';

	
	const INTEREST = 'mlm_daily_pips_csv.INTEREST';

	
	const TAX = 'mlm_daily_pips_csv.TAX';

	
	const UNREALIZEDPL = 'mlm_daily_pips_csv.UNREALIZEDPL';

	
	const EQUITY = 'mlm_daily_pips_csv.EQUITY';

	
	const STATUS_CODE = 'mlm_daily_pips_csv.STATUS_CODE';

	
	const REMARKS = 'mlm_daily_pips_csv.REMARKS';

	
	const CREATED_BY = 'mlm_daily_pips_csv.CREATED_BY';

	
	const CREATED_ON = 'mlm_daily_pips_csv.CREATED_ON';

	
	const UPDATED_BY = 'mlm_daily_pips_csv.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_daily_pips_csv.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PipId', 'TradedDatetime', 'FileId', 'PipsString', 'LoginId', 'LoginName', 'Balance', 'Credit', 'Commissions', 'Taxes', 'Storage', 'Profit', 'Interest', 'Tax', 'Unrealizedpl', 'Equity', 'StatusCode', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDailyPipsCsvPeer::PIP_ID, MlmDailyPipsCsvPeer::TRADED_DATETIME, MlmDailyPipsCsvPeer::FILE_ID, MlmDailyPipsCsvPeer::PIPS_STRING, MlmDailyPipsCsvPeer::LOGIN_ID, MlmDailyPipsCsvPeer::LOGIN_NAME, MlmDailyPipsCsvPeer::BALANCE, MlmDailyPipsCsvPeer::CREDIT, MlmDailyPipsCsvPeer::COMMISSIONS, MlmDailyPipsCsvPeer::TAXES, MlmDailyPipsCsvPeer::STORAGE, MlmDailyPipsCsvPeer::PROFIT, MlmDailyPipsCsvPeer::INTEREST, MlmDailyPipsCsvPeer::TAX, MlmDailyPipsCsvPeer::UNREALIZEDPL, MlmDailyPipsCsvPeer::EQUITY, MlmDailyPipsCsvPeer::STATUS_CODE, MlmDailyPipsCsvPeer::REMARKS, MlmDailyPipsCsvPeer::CREATED_BY, MlmDailyPipsCsvPeer::CREATED_ON, MlmDailyPipsCsvPeer::UPDATED_BY, MlmDailyPipsCsvPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('pip_id', 'traded_datetime', 'file_id', 'pips_string', 'login_id', 'login_name', 'balance', 'credit', 'commissions', 'taxes', 'storage', 'profit', 'interest', 'tax', 'unrealizedPL', 'equity', 'status_code', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PipId' => 0, 'TradedDatetime' => 1, 'FileId' => 2, 'PipsString' => 3, 'LoginId' => 4, 'LoginName' => 5, 'Balance' => 6, 'Credit' => 7, 'Commissions' => 8, 'Taxes' => 9, 'Storage' => 10, 'Profit' => 11, 'Interest' => 12, 'Tax' => 13, 'Unrealizedpl' => 14, 'Equity' => 15, 'StatusCode' => 16, 'Remarks' => 17, 'CreatedBy' => 18, 'CreatedOn' => 19, 'UpdatedBy' => 20, 'UpdatedOn' => 21, ),
		BasePeer::TYPE_COLNAME => array (MlmDailyPipsCsvPeer::PIP_ID => 0, MlmDailyPipsCsvPeer::TRADED_DATETIME => 1, MlmDailyPipsCsvPeer::FILE_ID => 2, MlmDailyPipsCsvPeer::PIPS_STRING => 3, MlmDailyPipsCsvPeer::LOGIN_ID => 4, MlmDailyPipsCsvPeer::LOGIN_NAME => 5, MlmDailyPipsCsvPeer::BALANCE => 6, MlmDailyPipsCsvPeer::CREDIT => 7, MlmDailyPipsCsvPeer::COMMISSIONS => 8, MlmDailyPipsCsvPeer::TAXES => 9, MlmDailyPipsCsvPeer::STORAGE => 10, MlmDailyPipsCsvPeer::PROFIT => 11, MlmDailyPipsCsvPeer::INTEREST => 12, MlmDailyPipsCsvPeer::TAX => 13, MlmDailyPipsCsvPeer::UNREALIZEDPL => 14, MlmDailyPipsCsvPeer::EQUITY => 15, MlmDailyPipsCsvPeer::STATUS_CODE => 16, MlmDailyPipsCsvPeer::REMARKS => 17, MlmDailyPipsCsvPeer::CREATED_BY => 18, MlmDailyPipsCsvPeer::CREATED_ON => 19, MlmDailyPipsCsvPeer::UPDATED_BY => 20, MlmDailyPipsCsvPeer::UPDATED_ON => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('pip_id' => 0, 'traded_datetime' => 1, 'file_id' => 2, 'pips_string' => 3, 'login_id' => 4, 'login_name' => 5, 'balance' => 6, 'credit' => 7, 'commissions' => 8, 'taxes' => 9, 'storage' => 10, 'profit' => 11, 'interest' => 12, 'tax' => 13, 'unrealizedPL' => 14, 'equity' => 15, 'status_code' => 16, 'remarks' => 17, 'created_by' => 18, 'created_on' => 19, 'updated_by' => 20, 'updated_on' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDailyPipsCsvMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDailyPipsCsvMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDailyPipsCsvPeer::getTableMap();
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
		return str_replace(MlmDailyPipsCsvPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::PIP_ID);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::TRADED_DATETIME);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::FILE_ID);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::PIPS_STRING);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::LOGIN_ID);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::LOGIN_NAME);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::BALANCE);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::CREDIT);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::COMMISSIONS);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::TAXES);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::STORAGE);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::PROFIT);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::INTEREST);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::TAX);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::UNREALIZEDPL);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::EQUITY);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::REMARKS);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDailyPipsCsvPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_daily_pips_csv.PIP_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_daily_pips_csv.PIP_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDailyPipsCsvPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDailyPipsCsvPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDailyPipsCsvPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDailyPipsCsvPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDailyPipsCsvPeer::populateObjects(MlmDailyPipsCsvPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDailyPipsCsvPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDailyPipsCsvPeer::getOMClass();
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
		return MlmDailyPipsCsvPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDailyPipsCsvPeer::PIP_ID); 

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
			$comparison = $criteria->getComparison(MlmDailyPipsCsvPeer::PIP_ID);
			$selectCriteria->add(MlmDailyPipsCsvPeer::PIP_ID, $criteria->remove(MlmDailyPipsCsvPeer::PIP_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDailyPipsCsvPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDailyPipsCsvPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDailyPipsCsv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDailyPipsCsvPeer::PIP_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDailyPipsCsv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDailyPipsCsvPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDailyPipsCsvPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDailyPipsCsvPeer::DATABASE_NAME, MlmDailyPipsCsvPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDailyPipsCsvPeer::DATABASE_NAME);

		$criteria->add(MlmDailyPipsCsvPeer::PIP_ID, $pk);


		$v = MlmDailyPipsCsvPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDailyPipsCsvPeer::PIP_ID, $pks, Criteria::IN);
			$objs = MlmDailyPipsCsvPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDailyPipsCsvPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDailyPipsCsvMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDailyPipsCsvMapBuilder');
}
