<?php


abstract class BaseMlmPackageUpgradeHistoryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_package_upgrade_history';

	
	const CLASS_DEFAULT = 'lib.model.MlmPackageUpgradeHistory';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const UPGRADE_ID = 'mlm_package_upgrade_history.UPGRADE_ID';

	
	const DIST_ID = 'mlm_package_upgrade_history.DIST_ID';

	
	const PACKAGE_ID = 'mlm_package_upgrade_history.PACKAGE_ID';

	
	const MT4_USER_NAME = 'mlm_package_upgrade_history.MT4_USER_NAME';

	
	const MT4_PASSWORD = 'mlm_package_upgrade_history.MT4_PASSWORD';

	
	const TRANSACTION_CODE = 'mlm_package_upgrade_history.TRANSACTION_CODE';

	
	const AMOUNT = 'mlm_package_upgrade_history.AMOUNT';

	
	const STATUS_CODE = 'mlm_package_upgrade_history.STATUS_CODE';

	
	const REMARKS = 'mlm_package_upgrade_history.REMARKS';

	
	const CREATED_BY = 'mlm_package_upgrade_history.CREATED_BY';

	
	const CREATED_ON = 'mlm_package_upgrade_history.CREATED_ON';

	
	const UPDATED_BY = 'mlm_package_upgrade_history.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_package_upgrade_history.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('UpgradeId', 'DistId', 'PackageId', 'Mt4UserName', 'Mt4Password', 'TransactionCode', 'Amount', 'StatusCode', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmPackageUpgradeHistoryPeer::UPGRADE_ID, MlmPackageUpgradeHistoryPeer::DIST_ID, MlmPackageUpgradeHistoryPeer::PACKAGE_ID, MlmPackageUpgradeHistoryPeer::MT4_USER_NAME, MlmPackageUpgradeHistoryPeer::MT4_PASSWORD, MlmPackageUpgradeHistoryPeer::TRANSACTION_CODE, MlmPackageUpgradeHistoryPeer::AMOUNT, MlmPackageUpgradeHistoryPeer::STATUS_CODE, MlmPackageUpgradeHistoryPeer::REMARKS, MlmPackageUpgradeHistoryPeer::CREATED_BY, MlmPackageUpgradeHistoryPeer::CREATED_ON, MlmPackageUpgradeHistoryPeer::UPDATED_BY, MlmPackageUpgradeHistoryPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('upgrade_id', 'dist_id', 'package_id', 'mt4_user_name', 'mt4_password', 'transaction_code', 'amount', 'status_code', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('UpgradeId' => 0, 'DistId' => 1, 'PackageId' => 2, 'Mt4UserName' => 3, 'Mt4Password' => 4, 'TransactionCode' => 5, 'Amount' => 6, 'StatusCode' => 7, 'Remarks' => 8, 'CreatedBy' => 9, 'CreatedOn' => 10, 'UpdatedBy' => 11, 'UpdatedOn' => 12, ),
		BasePeer::TYPE_COLNAME => array (MlmPackageUpgradeHistoryPeer::UPGRADE_ID => 0, MlmPackageUpgradeHistoryPeer::DIST_ID => 1, MlmPackageUpgradeHistoryPeer::PACKAGE_ID => 2, MlmPackageUpgradeHistoryPeer::MT4_USER_NAME => 3, MlmPackageUpgradeHistoryPeer::MT4_PASSWORD => 4, MlmPackageUpgradeHistoryPeer::TRANSACTION_CODE => 5, MlmPackageUpgradeHistoryPeer::AMOUNT => 6, MlmPackageUpgradeHistoryPeer::STATUS_CODE => 7, MlmPackageUpgradeHistoryPeer::REMARKS => 8, MlmPackageUpgradeHistoryPeer::CREATED_BY => 9, MlmPackageUpgradeHistoryPeer::CREATED_ON => 10, MlmPackageUpgradeHistoryPeer::UPDATED_BY => 11, MlmPackageUpgradeHistoryPeer::UPDATED_ON => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('upgrade_id' => 0, 'dist_id' => 1, 'package_id' => 2, 'mt4_user_name' => 3, 'mt4_password' => 4, 'transaction_code' => 5, 'amount' => 6, 'status_code' => 7, 'remarks' => 8, 'created_by' => 9, 'created_on' => 10, 'updated_by' => 11, 'updated_on' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPackageUpgradeHistoryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPackageUpgradeHistoryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPackageUpgradeHistoryPeer::getTableMap();
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
		return str_replace(MlmPackageUpgradeHistoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::UPGRADE_ID);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::DIST_ID);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::PACKAGE_ID);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::MT4_USER_NAME);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::MT4_PASSWORD);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::TRANSACTION_CODE);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::AMOUNT);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::REMARKS);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_package_upgrade_history.UPGRADE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_package_upgrade_history.UPGRADE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPackageUpgradeHistoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPackageUpgradeHistoryPeer::doSelectRS($criteria, $con);
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
		$objects = MlmPackageUpgradeHistoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPackageUpgradeHistoryPeer::populateObjects(MlmPackageUpgradeHistoryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPackageUpgradeHistoryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmPackageUpgradeHistoryPeer::getOMClass();
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
		return MlmPackageUpgradeHistoryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmPackageUpgradeHistoryPeer::UPGRADE_ID); 

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
			$comparison = $criteria->getComparison(MlmPackageUpgradeHistoryPeer::UPGRADE_ID);
			$selectCriteria->add(MlmPackageUpgradeHistoryPeer::UPGRADE_ID, $criteria->remove(MlmPackageUpgradeHistoryPeer::UPGRADE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmPackageUpgradeHistoryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmPackageUpgradeHistory) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPackageUpgradeHistoryPeer::UPGRADE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPackageUpgradeHistory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPackageUpgradeHistoryPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPackageUpgradeHistoryPeer::DATABASE_NAME, MlmPackageUpgradeHistoryPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);

		$criteria->add(MlmPackageUpgradeHistoryPeer::UPGRADE_ID, $pk);


		$v = MlmPackageUpgradeHistoryPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPackageUpgradeHistoryPeer::UPGRADE_ID, $pks, Criteria::IN);
			$objs = MlmPackageUpgradeHistoryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmPackageUpgradeHistoryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmPackageUpgradeHistoryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPackageUpgradeHistoryMapBuilder');
}
