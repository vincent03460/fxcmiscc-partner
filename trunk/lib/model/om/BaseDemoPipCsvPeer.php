<?php


abstract class BaseDemoPipCsvPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'demo_pip_csv';

	
	const CLASS_DEFAULT = 'lib.model.DemoPipCsv';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PIP_ID = 'demo_pip_csv.PIP_ID';

	
	const MONTH_TRADED = 'demo_pip_csv.MONTH_TRADED';

	
	const YEAR_TRADED = 'demo_pip_csv.YEAR_TRADED';

	
	const FILE_ID = 'demo_pip_csv.FILE_ID';

	
	const PIPS_STRING = 'demo_pip_csv.PIPS_STRING';

	
	const LOGIN_ID = 'demo_pip_csv.LOGIN_ID';

	
	const LOGIN_NAME = 'demo_pip_csv.LOGIN_NAME';

	
	const DEPOSIT = 'demo_pip_csv.DEPOSIT';

	
	const WITHDRAW = 'demo_pip_csv.WITHDRAW';

	
	const IN_OUT = 'demo_pip_csv.IN_OUT';

	
	const CREDIT = 'demo_pip_csv.CREDIT';

	
	const VOLUME = 'demo_pip_csv.VOLUME';

	
	const COMMISSION = 'demo_pip_csv.COMMISSION';

	
	const TAXES = 'demo_pip_csv.TAXES';

	
	const AGENT = 'demo_pip_csv.AGENT';

	
	const STORAGE = 'demo_pip_csv.STORAGE';

	
	const PROFIT = 'demo_pip_csv.PROFIT';

	
	const LAST_BALANCE = 'demo_pip_csv.LAST_BALANCE';

	
	const STATUS_CODE = 'demo_pip_csv.STATUS_CODE';

	
	const REMARKS = 'demo_pip_csv.REMARKS';

	
	const CREATED_BY = 'demo_pip_csv.CREATED_BY';

	
	const CREATED_ON = 'demo_pip_csv.CREATED_ON';

	
	const UPDATED_BY = 'demo_pip_csv.UPDATED_BY';

	
	const UPDATED_ON = 'demo_pip_csv.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PipId', 'MonthTraded', 'YearTraded', 'FileId', 'PipsString', 'LoginId', 'LoginName', 'Deposit', 'Withdraw', 'InOut', 'Credit', 'Volume', 'Commission', 'Taxes', 'Agent', 'Storage', 'Profit', 'LastBalance', 'StatusCode', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (DemoPipCsvPeer::PIP_ID, DemoPipCsvPeer::MONTH_TRADED, DemoPipCsvPeer::YEAR_TRADED, DemoPipCsvPeer::FILE_ID, DemoPipCsvPeer::PIPS_STRING, DemoPipCsvPeer::LOGIN_ID, DemoPipCsvPeer::LOGIN_NAME, DemoPipCsvPeer::DEPOSIT, DemoPipCsvPeer::WITHDRAW, DemoPipCsvPeer::IN_OUT, DemoPipCsvPeer::CREDIT, DemoPipCsvPeer::VOLUME, DemoPipCsvPeer::COMMISSION, DemoPipCsvPeer::TAXES, DemoPipCsvPeer::AGENT, DemoPipCsvPeer::STORAGE, DemoPipCsvPeer::PROFIT, DemoPipCsvPeer::LAST_BALANCE, DemoPipCsvPeer::STATUS_CODE, DemoPipCsvPeer::REMARKS, DemoPipCsvPeer::CREATED_BY, DemoPipCsvPeer::CREATED_ON, DemoPipCsvPeer::UPDATED_BY, DemoPipCsvPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('pip_id', 'month_traded', 'year_traded', 'file_id', 'pips_string', 'login_id', 'login_name', 'deposit', 'withdraw', 'in_out', 'credit', 'volume', 'commission', 'taxes', 'agent', 'storage', 'profit', 'last_balance', 'status_code', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PipId' => 0, 'MonthTraded' => 1, 'YearTraded' => 2, 'FileId' => 3, 'PipsString' => 4, 'LoginId' => 5, 'LoginName' => 6, 'Deposit' => 7, 'Withdraw' => 8, 'InOut' => 9, 'Credit' => 10, 'Volume' => 11, 'Commission' => 12, 'Taxes' => 13, 'Agent' => 14, 'Storage' => 15, 'Profit' => 16, 'LastBalance' => 17, 'StatusCode' => 18, 'Remarks' => 19, 'CreatedBy' => 20, 'CreatedOn' => 21, 'UpdatedBy' => 22, 'UpdatedOn' => 23, ),
		BasePeer::TYPE_COLNAME => array (DemoPipCsvPeer::PIP_ID => 0, DemoPipCsvPeer::MONTH_TRADED => 1, DemoPipCsvPeer::YEAR_TRADED => 2, DemoPipCsvPeer::FILE_ID => 3, DemoPipCsvPeer::PIPS_STRING => 4, DemoPipCsvPeer::LOGIN_ID => 5, DemoPipCsvPeer::LOGIN_NAME => 6, DemoPipCsvPeer::DEPOSIT => 7, DemoPipCsvPeer::WITHDRAW => 8, DemoPipCsvPeer::IN_OUT => 9, DemoPipCsvPeer::CREDIT => 10, DemoPipCsvPeer::VOLUME => 11, DemoPipCsvPeer::COMMISSION => 12, DemoPipCsvPeer::TAXES => 13, DemoPipCsvPeer::AGENT => 14, DemoPipCsvPeer::STORAGE => 15, DemoPipCsvPeer::PROFIT => 16, DemoPipCsvPeer::LAST_BALANCE => 17, DemoPipCsvPeer::STATUS_CODE => 18, DemoPipCsvPeer::REMARKS => 19, DemoPipCsvPeer::CREATED_BY => 20, DemoPipCsvPeer::CREATED_ON => 21, DemoPipCsvPeer::UPDATED_BY => 22, DemoPipCsvPeer::UPDATED_ON => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('pip_id' => 0, 'month_traded' => 1, 'year_traded' => 2, 'file_id' => 3, 'pips_string' => 4, 'login_id' => 5, 'login_name' => 6, 'deposit' => 7, 'withdraw' => 8, 'in_out' => 9, 'credit' => 10, 'volume' => 11, 'commission' => 12, 'taxes' => 13, 'agent' => 14, 'storage' => 15, 'profit' => 16, 'last_balance' => 17, 'status_code' => 18, 'remarks' => 19, 'created_by' => 20, 'created_on' => 21, 'updated_by' => 22, 'updated_on' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DemoPipCsvMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DemoPipCsvMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DemoPipCsvPeer::getTableMap();
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
		return str_replace(DemoPipCsvPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DemoPipCsvPeer::PIP_ID);

		$criteria->addSelectColumn(DemoPipCsvPeer::MONTH_TRADED);

		$criteria->addSelectColumn(DemoPipCsvPeer::YEAR_TRADED);

		$criteria->addSelectColumn(DemoPipCsvPeer::FILE_ID);

		$criteria->addSelectColumn(DemoPipCsvPeer::PIPS_STRING);

		$criteria->addSelectColumn(DemoPipCsvPeer::LOGIN_ID);

		$criteria->addSelectColumn(DemoPipCsvPeer::LOGIN_NAME);

		$criteria->addSelectColumn(DemoPipCsvPeer::DEPOSIT);

		$criteria->addSelectColumn(DemoPipCsvPeer::WITHDRAW);

		$criteria->addSelectColumn(DemoPipCsvPeer::IN_OUT);

		$criteria->addSelectColumn(DemoPipCsvPeer::CREDIT);

		$criteria->addSelectColumn(DemoPipCsvPeer::VOLUME);

		$criteria->addSelectColumn(DemoPipCsvPeer::COMMISSION);

		$criteria->addSelectColumn(DemoPipCsvPeer::TAXES);

		$criteria->addSelectColumn(DemoPipCsvPeer::AGENT);

		$criteria->addSelectColumn(DemoPipCsvPeer::STORAGE);

		$criteria->addSelectColumn(DemoPipCsvPeer::PROFIT);

		$criteria->addSelectColumn(DemoPipCsvPeer::LAST_BALANCE);

		$criteria->addSelectColumn(DemoPipCsvPeer::STATUS_CODE);

		$criteria->addSelectColumn(DemoPipCsvPeer::REMARKS);

		$criteria->addSelectColumn(DemoPipCsvPeer::CREATED_BY);

		$criteria->addSelectColumn(DemoPipCsvPeer::CREATED_ON);

		$criteria->addSelectColumn(DemoPipCsvPeer::UPDATED_BY);

		$criteria->addSelectColumn(DemoPipCsvPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(demo_pip_csv.PIP_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT demo_pip_csv.PIP_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DemoPipCsvPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DemoPipCsvPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DemoPipCsvPeer::doSelectRS($criteria, $con);
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
		$objects = DemoPipCsvPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DemoPipCsvPeer::populateObjects(DemoPipCsvPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DemoPipCsvPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DemoPipCsvPeer::getOMClass();
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
		return DemoPipCsvPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DemoPipCsvPeer::PIP_ID); 

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
			$comparison = $criteria->getComparison(DemoPipCsvPeer::PIP_ID);
			$selectCriteria->add(DemoPipCsvPeer::PIP_ID, $criteria->remove(DemoPipCsvPeer::PIP_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DemoPipCsvPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DemoPipCsvPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof DemoPipCsv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DemoPipCsvPeer::PIP_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(DemoPipCsv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DemoPipCsvPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DemoPipCsvPeer::TABLE_NAME);

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

		return BasePeer::doValidate(DemoPipCsvPeer::DATABASE_NAME, DemoPipCsvPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(DemoPipCsvPeer::DATABASE_NAME);

		$criteria->add(DemoPipCsvPeer::PIP_ID, $pk);


		$v = DemoPipCsvPeer::doSelect($criteria, $con);

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
			$criteria->add(DemoPipCsvPeer::PIP_ID, $pks, Criteria::IN);
			$objs = DemoPipCsvPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDemoPipCsvPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DemoPipCsvMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DemoPipCsvMapBuilder');
}
