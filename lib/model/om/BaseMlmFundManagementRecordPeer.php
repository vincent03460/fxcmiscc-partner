<?php


abstract class BaseMlmFundManagementRecordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_fund_management_record';

	
	const CLASS_DEFAULT = 'lib.model.MlmFundManagementRecord';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FUND_ID = 'mlm_fund_management_record.FUND_ID';

	
	const PERCENTAGE = 'mlm_fund_management_record.PERCENTAGE';

	
	const CREATED_BY = 'mlm_fund_management_record.CREATED_BY';

	
	const CREATED_ON = 'mlm_fund_management_record.CREATED_ON';

	
	const UPDATED_BY = 'mlm_fund_management_record.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_fund_management_record.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FundId', 'Percentage', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmFundManagementRecordPeer::FUND_ID, MlmFundManagementRecordPeer::PERCENTAGE, MlmFundManagementRecordPeer::CREATED_BY, MlmFundManagementRecordPeer::CREATED_ON, MlmFundManagementRecordPeer::UPDATED_BY, MlmFundManagementRecordPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('fund_id', 'percentage', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FundId' => 0, 'Percentage' => 1, 'CreatedBy' => 2, 'CreatedOn' => 3, 'UpdatedBy' => 4, 'UpdatedOn' => 5, ),
		BasePeer::TYPE_COLNAME => array (MlmFundManagementRecordPeer::FUND_ID => 0, MlmFundManagementRecordPeer::PERCENTAGE => 1, MlmFundManagementRecordPeer::CREATED_BY => 2, MlmFundManagementRecordPeer::CREATED_ON => 3, MlmFundManagementRecordPeer::UPDATED_BY => 4, MlmFundManagementRecordPeer::UPDATED_ON => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('fund_id' => 0, 'percentage' => 1, 'created_by' => 2, 'created_on' => 3, 'updated_by' => 4, 'updated_on' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmFundManagementRecordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmFundManagementRecordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmFundManagementRecordPeer::getTableMap();
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
		return str_replace(MlmFundManagementRecordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmFundManagementRecordPeer::FUND_ID);

		$criteria->addSelectColumn(MlmFundManagementRecordPeer::PERCENTAGE);

		$criteria->addSelectColumn(MlmFundManagementRecordPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmFundManagementRecordPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmFundManagementRecordPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmFundManagementRecordPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_fund_management_record.FUND_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_fund_management_record.FUND_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmFundManagementRecordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmFundManagementRecordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmFundManagementRecordPeer::doSelectRS($criteria, $con);
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
		$objects = MlmFundManagementRecordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmFundManagementRecordPeer::populateObjects(MlmFundManagementRecordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmFundManagementRecordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmFundManagementRecordPeer::getOMClass();
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
		return MlmFundManagementRecordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmFundManagementRecordPeer::FUND_ID); 

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
			$comparison = $criteria->getComparison(MlmFundManagementRecordPeer::FUND_ID);
			$selectCriteria->add(MlmFundManagementRecordPeer::FUND_ID, $criteria->remove(MlmFundManagementRecordPeer::FUND_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmFundManagementRecordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmFundManagementRecordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmFundManagementRecord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmFundManagementRecordPeer::FUND_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmFundManagementRecord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmFundManagementRecordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmFundManagementRecordPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmFundManagementRecordPeer::DATABASE_NAME, MlmFundManagementRecordPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmFundManagementRecordPeer::DATABASE_NAME);

		$criteria->add(MlmFundManagementRecordPeer::FUND_ID, $pk);


		$v = MlmFundManagementRecordPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmFundManagementRecordPeer::FUND_ID, $pks, Criteria::IN);
			$objs = MlmFundManagementRecordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmFundManagementRecordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmFundManagementRecordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmFundManagementRecordMapBuilder');
}
