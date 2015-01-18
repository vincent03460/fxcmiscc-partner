<?php


abstract class BaseMlmIbPackagePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_ib_package';

	
	const CLASS_DEFAULT = 'lib.model.MlmIbPackage';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const IB_PACKAGE_ID = 'mlm_ib_package.IB_PACKAGE_ID';

	
	const PACKAGE_NAME = 'mlm_ib_package.PACKAGE_NAME';

	
	const COMMISSION = 'mlm_ib_package.COMMISSION';

	
	const CREATED_BY = 'mlm_ib_package.CREATED_BY';

	
	const CREATED_ON = 'mlm_ib_package.CREATED_ON';

	
	const UPDATED_BY = 'mlm_ib_package.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_ib_package.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IbPackageId', 'PackageName', 'Commission', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmIbPackagePeer::IB_PACKAGE_ID, MlmIbPackagePeer::PACKAGE_NAME, MlmIbPackagePeer::COMMISSION, MlmIbPackagePeer::CREATED_BY, MlmIbPackagePeer::CREATED_ON, MlmIbPackagePeer::UPDATED_BY, MlmIbPackagePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('ib_package_id', 'package_name', 'commission', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IbPackageId' => 0, 'PackageName' => 1, 'Commission' => 2, 'CreatedBy' => 3, 'CreatedOn' => 4, 'UpdatedBy' => 5, 'UpdatedOn' => 6, ),
		BasePeer::TYPE_COLNAME => array (MlmIbPackagePeer::IB_PACKAGE_ID => 0, MlmIbPackagePeer::PACKAGE_NAME => 1, MlmIbPackagePeer::COMMISSION => 2, MlmIbPackagePeer::CREATED_BY => 3, MlmIbPackagePeer::CREATED_ON => 4, MlmIbPackagePeer::UPDATED_BY => 5, MlmIbPackagePeer::UPDATED_ON => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('ib_package_id' => 0, 'package_name' => 1, 'commission' => 2, 'created_by' => 3, 'created_on' => 4, 'updated_by' => 5, 'updated_on' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmIbPackageMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmIbPackageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmIbPackagePeer::getTableMap();
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
		return str_replace(MlmIbPackagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmIbPackagePeer::IB_PACKAGE_ID);

		$criteria->addSelectColumn(MlmIbPackagePeer::PACKAGE_NAME);

		$criteria->addSelectColumn(MlmIbPackagePeer::COMMISSION);

		$criteria->addSelectColumn(MlmIbPackagePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmIbPackagePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmIbPackagePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmIbPackagePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_ib_package.IB_PACKAGE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_ib_package.IB_PACKAGE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmIbPackagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmIbPackagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmIbPackagePeer::doSelectRS($criteria, $con);
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
		$objects = MlmIbPackagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmIbPackagePeer::populateObjects(MlmIbPackagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmIbPackagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmIbPackagePeer::getOMClass();
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
		return MlmIbPackagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmIbPackagePeer::IB_PACKAGE_ID); 

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
			$comparison = $criteria->getComparison(MlmIbPackagePeer::IB_PACKAGE_ID);
			$selectCriteria->add(MlmIbPackagePeer::IB_PACKAGE_ID, $criteria->remove(MlmIbPackagePeer::IB_PACKAGE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmIbPackagePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmIbPackagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmIbPackage) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmIbPackagePeer::IB_PACKAGE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmIbPackage $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmIbPackagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmIbPackagePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmIbPackagePeer::DATABASE_NAME, MlmIbPackagePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmIbPackagePeer::DATABASE_NAME);

		$criteria->add(MlmIbPackagePeer::IB_PACKAGE_ID, $pk);


		$v = MlmIbPackagePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmIbPackagePeer::IB_PACKAGE_ID, $pks, Criteria::IN);
			$objs = MlmIbPackagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmIbPackagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmIbPackageMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmIbPackageMapBuilder');
}
