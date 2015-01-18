<?php


abstract class BaseMlmPackagePurchaseHistoryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_package_purchase_history';

	
	const CLASS_DEFAULT = 'lib.model.MlmPackagePurchaseHistory';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PURCHASE_ID = 'mlm_package_purchase_history.PURCHASE_ID';

	
	const DIST_ID = 'mlm_package_purchase_history.DIST_ID';

	
	const PACKAGE_ID = 'mlm_package_purchase_history.PACKAGE_ID';

	
	const MT4_USER_NAME = 'mlm_package_purchase_history.MT4_USER_NAME';

	
	const MT4_PASSWORD = 'mlm_package_purchase_history.MT4_PASSWORD';

	
	const AMOUNT = 'mlm_package_purchase_history.AMOUNT';

	
	const STATUS_CODE = 'mlm_package_purchase_history.STATUS_CODE';

	
	const REMARKS = 'mlm_package_purchase_history.REMARKS';

	
	const CREATED_BY = 'mlm_package_purchase_history.CREATED_BY';

	
	const CREATED_ON = 'mlm_package_purchase_history.CREATED_ON';

	
	const UPDATED_BY = 'mlm_package_purchase_history.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_package_purchase_history.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PurchaseId', 'DistId', 'PackageId', 'Mt4UserName', 'Mt4Password', 'Amount', 'StatusCode', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePurchaseHistoryPeer::PURCHASE_ID, MlmPackagePurchaseHistoryPeer::DIST_ID, MlmPackagePurchaseHistoryPeer::PACKAGE_ID, MlmPackagePurchaseHistoryPeer::MT4_USER_NAME, MlmPackagePurchaseHistoryPeer::MT4_PASSWORD, MlmPackagePurchaseHistoryPeer::AMOUNT, MlmPackagePurchaseHistoryPeer::STATUS_CODE, MlmPackagePurchaseHistoryPeer::REMARKS, MlmPackagePurchaseHistoryPeer::CREATED_BY, MlmPackagePurchaseHistoryPeer::CREATED_ON, MlmPackagePurchaseHistoryPeer::UPDATED_BY, MlmPackagePurchaseHistoryPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('purchase_id', 'dist_id', 'package_id', 'mt4_user_name', 'mt4_password', 'amount', 'status_code', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PurchaseId' => 0, 'DistId' => 1, 'PackageId' => 2, 'Mt4UserName' => 3, 'Mt4Password' => 4, 'Amount' => 5, 'StatusCode' => 6, 'Remarks' => 7, 'CreatedBy' => 8, 'CreatedOn' => 9, 'UpdatedBy' => 10, 'UpdatedOn' => 11, ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePurchaseHistoryPeer::PURCHASE_ID => 0, MlmPackagePurchaseHistoryPeer::DIST_ID => 1, MlmPackagePurchaseHistoryPeer::PACKAGE_ID => 2, MlmPackagePurchaseHistoryPeer::MT4_USER_NAME => 3, MlmPackagePurchaseHistoryPeer::MT4_PASSWORD => 4, MlmPackagePurchaseHistoryPeer::AMOUNT => 5, MlmPackagePurchaseHistoryPeer::STATUS_CODE => 6, MlmPackagePurchaseHistoryPeer::REMARKS => 7, MlmPackagePurchaseHistoryPeer::CREATED_BY => 8, MlmPackagePurchaseHistoryPeer::CREATED_ON => 9, MlmPackagePurchaseHistoryPeer::UPDATED_BY => 10, MlmPackagePurchaseHistoryPeer::UPDATED_ON => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('purchase_id' => 0, 'dist_id' => 1, 'package_id' => 2, 'mt4_user_name' => 3, 'mt4_password' => 4, 'amount' => 5, 'status_code' => 6, 'remarks' => 7, 'created_by' => 8, 'created_on' => 9, 'updated_by' => 10, 'updated_on' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPackagePurchaseHistoryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPackagePurchaseHistoryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPackagePurchaseHistoryPeer::getTableMap();
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
		return str_replace(MlmPackagePurchaseHistoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::PURCHASE_ID);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::DIST_ID);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::PACKAGE_ID);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::MT4_USER_NAME);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::MT4_PASSWORD);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::AMOUNT);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::REMARKS);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_package_purchase_history.PURCHASE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_package_purchase_history.PURCHASE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPackagePurchaseHistoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPackagePurchaseHistoryPeer::doSelectRS($criteria, $con);
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
		$objects = MlmPackagePurchaseHistoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPackagePurchaseHistoryPeer::populateObjects(MlmPackagePurchaseHistoryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPackagePurchaseHistoryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmPackagePurchaseHistoryPeer::getOMClass();
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
		return MlmPackagePurchaseHistoryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmPackagePurchaseHistoryPeer::PURCHASE_ID); 

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
			$comparison = $criteria->getComparison(MlmPackagePurchaseHistoryPeer::PURCHASE_ID);
			$selectCriteria->add(MlmPackagePurchaseHistoryPeer::PURCHASE_ID, $criteria->remove(MlmPackagePurchaseHistoryPeer::PURCHASE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmPackagePurchaseHistoryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPackagePurchaseHistoryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmPackagePurchaseHistory) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPackagePurchaseHistoryPeer::PURCHASE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPackagePurchaseHistory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPackagePurchaseHistoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPackagePurchaseHistoryPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPackagePurchaseHistoryPeer::DATABASE_NAME, MlmPackagePurchaseHistoryPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPackagePurchaseHistoryPeer::DATABASE_NAME);

		$criteria->add(MlmPackagePurchaseHistoryPeer::PURCHASE_ID, $pk);


		$v = MlmPackagePurchaseHistoryPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPackagePurchaseHistoryPeer::PURCHASE_ID, $pks, Criteria::IN);
			$objs = MlmPackagePurchaseHistoryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmPackagePurchaseHistoryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmPackagePurchaseHistoryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPackagePurchaseHistoryMapBuilder');
}
