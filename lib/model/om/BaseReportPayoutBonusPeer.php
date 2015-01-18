<?php


abstract class BaseReportPayoutBonusPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'report_payout_bonus';

	
	const CLASS_DEFAULT = 'lib.model.ReportPayoutBonus';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ACCOUNT_ID = 'report_payout_bonus.ACCOUNT_ID';

	
	const BONUS_DATE = 'report_payout_bonus.BONUS_DATE';

	
	const TOTAL_SALES = 'report_payout_bonus.TOTAL_SALES';

	
	const TOTAL_DRB = 'report_payout_bonus.TOTAL_DRB';

	
	const TOTAL_GDB = 'report_payout_bonus.TOTAL_GDB';

	
	const GDB_PERCENTAGE = 'report_payout_bonus.GDB_PERCENTAGE';

	
	const CREATED_BY = 'report_payout_bonus.CREATED_BY';

	
	const CREATED_ON = 'report_payout_bonus.CREATED_ON';

	
	const UPDATED_BY = 'report_payout_bonus.UPDATED_BY';

	
	const UPDATED_ON = 'report_payout_bonus.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AccountId', 'BonusDate', 'TotalSales', 'TotalDrb', 'TotalGdb', 'GdbPercentage', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (ReportPayoutBonusPeer::ACCOUNT_ID, ReportPayoutBonusPeer::BONUS_DATE, ReportPayoutBonusPeer::TOTAL_SALES, ReportPayoutBonusPeer::TOTAL_DRB, ReportPayoutBonusPeer::TOTAL_GDB, ReportPayoutBonusPeer::GDB_PERCENTAGE, ReportPayoutBonusPeer::CREATED_BY, ReportPayoutBonusPeer::CREATED_ON, ReportPayoutBonusPeer::UPDATED_BY, ReportPayoutBonusPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('account_id', 'bonus_date', 'total_sales', 'total_drb', 'total_gdb', 'gdb_percentage', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AccountId' => 0, 'BonusDate' => 1, 'TotalSales' => 2, 'TotalDrb' => 3, 'TotalGdb' => 4, 'GdbPercentage' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (ReportPayoutBonusPeer::ACCOUNT_ID => 0, ReportPayoutBonusPeer::BONUS_DATE => 1, ReportPayoutBonusPeer::TOTAL_SALES => 2, ReportPayoutBonusPeer::TOTAL_DRB => 3, ReportPayoutBonusPeer::TOTAL_GDB => 4, ReportPayoutBonusPeer::GDB_PERCENTAGE => 5, ReportPayoutBonusPeer::CREATED_BY => 6, ReportPayoutBonusPeer::CREATED_ON => 7, ReportPayoutBonusPeer::UPDATED_BY => 8, ReportPayoutBonusPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('account_id' => 0, 'bonus_date' => 1, 'total_sales' => 2, 'total_drb' => 3, 'total_gdb' => 4, 'gdb_percentage' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ReportPayoutBonusMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ReportPayoutBonusMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ReportPayoutBonusPeer::getTableMap();
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
		return str_replace(ReportPayoutBonusPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ReportPayoutBonusPeer::ACCOUNT_ID);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::BONUS_DATE);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::TOTAL_SALES);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::TOTAL_DRB);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::TOTAL_GDB);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::GDB_PERCENTAGE);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::CREATED_BY);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::CREATED_ON);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::UPDATED_BY);

		$criteria->addSelectColumn(ReportPayoutBonusPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(report_payout_bonus.ACCOUNT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT report_payout_bonus.ACCOUNT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ReportPayoutBonusPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ReportPayoutBonusPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ReportPayoutBonusPeer::doSelectRS($criteria, $con);
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
		$objects = ReportPayoutBonusPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ReportPayoutBonusPeer::populateObjects(ReportPayoutBonusPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ReportPayoutBonusPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ReportPayoutBonusPeer::getOMClass();
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
		return ReportPayoutBonusPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ReportPayoutBonusPeer::ACCOUNT_ID); 

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
			$comparison = $criteria->getComparison(ReportPayoutBonusPeer::ACCOUNT_ID);
			$selectCriteria->add(ReportPayoutBonusPeer::ACCOUNT_ID, $criteria->remove(ReportPayoutBonusPeer::ACCOUNT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ReportPayoutBonusPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ReportPayoutBonusPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ReportPayoutBonus) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ReportPayoutBonusPeer::ACCOUNT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ReportPayoutBonus $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ReportPayoutBonusPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ReportPayoutBonusPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ReportPayoutBonusPeer::DATABASE_NAME, ReportPayoutBonusPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ReportPayoutBonusPeer::DATABASE_NAME);

		$criteria->add(ReportPayoutBonusPeer::ACCOUNT_ID, $pk);


		$v = ReportPayoutBonusPeer::doSelect($criteria, $con);

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
			$criteria->add(ReportPayoutBonusPeer::ACCOUNT_ID, $pks, Criteria::IN);
			$objs = ReportPayoutBonusPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseReportPayoutBonusPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ReportPayoutBonusMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ReportPayoutBonusMapBuilder');
}
