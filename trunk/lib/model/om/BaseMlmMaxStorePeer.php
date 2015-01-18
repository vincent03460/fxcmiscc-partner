<?php


abstract class BaseMlmMaxStorePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_max_store';

	
	const CLASS_DEFAULT = 'lib.model.MlmMaxStore';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const STORE_ID = 'mlm_max_store.STORE_ID';

	
	const PRICE = 'mlm_max_store.PRICE';

	
	const PRODUCT_NAME = 'mlm_max_store.PRODUCT_NAME';

	
	const STATUS_CODE = 'mlm_max_store.STATUS_CODE';

	
	const REMARK = 'mlm_max_store.REMARK';

	
	const CREATED_BY = 'mlm_max_store.CREATED_BY';

	
	const CREATED_ON = 'mlm_max_store.CREATED_ON';

	
	const UPDATED_BY = 'mlm_max_store.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_max_store.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('StoreId', 'Price', 'ProductName', 'StatusCode', 'Remark', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmMaxStorePeer::STORE_ID, MlmMaxStorePeer::PRICE, MlmMaxStorePeer::PRODUCT_NAME, MlmMaxStorePeer::STATUS_CODE, MlmMaxStorePeer::REMARK, MlmMaxStorePeer::CREATED_BY, MlmMaxStorePeer::CREATED_ON, MlmMaxStorePeer::UPDATED_BY, MlmMaxStorePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('store_id', 'price', 'product_name', 'status_code', 'remark', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('StoreId' => 0, 'Price' => 1, 'ProductName' => 2, 'StatusCode' => 3, 'Remark' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (MlmMaxStorePeer::STORE_ID => 0, MlmMaxStorePeer::PRICE => 1, MlmMaxStorePeer::PRODUCT_NAME => 2, MlmMaxStorePeer::STATUS_CODE => 3, MlmMaxStorePeer::REMARK => 4, MlmMaxStorePeer::CREATED_BY => 5, MlmMaxStorePeer::CREATED_ON => 6, MlmMaxStorePeer::UPDATED_BY => 7, MlmMaxStorePeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('store_id' => 0, 'price' => 1, 'product_name' => 2, 'status_code' => 3, 'remark' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmMaxStoreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmMaxStoreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmMaxStorePeer::getTableMap();
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
		return str_replace(MlmMaxStorePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmMaxStorePeer::STORE_ID);

		$criteria->addSelectColumn(MlmMaxStorePeer::PRICE);

		$criteria->addSelectColumn(MlmMaxStorePeer::PRODUCT_NAME);

		$criteria->addSelectColumn(MlmMaxStorePeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmMaxStorePeer::REMARK);

		$criteria->addSelectColumn(MlmMaxStorePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmMaxStorePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmMaxStorePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmMaxStorePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_max_store.STORE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_max_store.STORE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmMaxStorePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmMaxStorePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmMaxStorePeer::doSelectRS($criteria, $con);
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
		$objects = MlmMaxStorePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmMaxStorePeer::populateObjects(MlmMaxStorePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmMaxStorePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmMaxStorePeer::getOMClass();
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
		return MlmMaxStorePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmMaxStorePeer::STORE_ID); 

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
			$comparison = $criteria->getComparison(MlmMaxStorePeer::STORE_ID);
			$selectCriteria->add(MlmMaxStorePeer::STORE_ID, $criteria->remove(MlmMaxStorePeer::STORE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmMaxStorePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmMaxStorePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmMaxStore) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmMaxStorePeer::STORE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmMaxStore $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmMaxStorePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmMaxStorePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmMaxStorePeer::DATABASE_NAME, MlmMaxStorePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmMaxStorePeer::DATABASE_NAME);

		$criteria->add(MlmMaxStorePeer::STORE_ID, $pk);


		$v = MlmMaxStorePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmMaxStorePeer::STORE_ID, $pks, Criteria::IN);
			$objs = MlmMaxStorePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmMaxStorePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmMaxStoreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmMaxStoreMapBuilder');
}
