<?php


abstract class BaseMlmAdminPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_admin';

	
	const CLASS_DEFAULT = 'lib.model.MlmAdmin';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ADMIN_ID = 'mlm_admin.ADMIN_ID';

	
	const ADMIN_CODE = 'mlm_admin.ADMIN_CODE';

	
	const USER_ID = 'mlm_admin.USER_ID';

	
	const STATUS_CODE = 'mlm_admin.STATUS_CODE';

	
	const ADMIN_ROLE = 'mlm_admin.ADMIN_ROLE';

	
	const CREATED_BY = 'mlm_admin.CREATED_BY';

	
	const CREATED_ON = 'mlm_admin.CREATED_ON';

	
	const UPDATED_BY = 'mlm_admin.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_admin.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AdminId', 'AdminCode', 'UserId', 'StatusCode', 'AdminRole', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmAdminPeer::ADMIN_ID, MlmAdminPeer::ADMIN_CODE, MlmAdminPeer::USER_ID, MlmAdminPeer::STATUS_CODE, MlmAdminPeer::ADMIN_ROLE, MlmAdminPeer::CREATED_BY, MlmAdminPeer::CREATED_ON, MlmAdminPeer::UPDATED_BY, MlmAdminPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('admin_id', 'admin_code', 'user_id', 'status_code', 'admin_role', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AdminId' => 0, 'AdminCode' => 1, 'UserId' => 2, 'StatusCode' => 3, 'AdminRole' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (MlmAdminPeer::ADMIN_ID => 0, MlmAdminPeer::ADMIN_CODE => 1, MlmAdminPeer::USER_ID => 2, MlmAdminPeer::STATUS_CODE => 3, MlmAdminPeer::ADMIN_ROLE => 4, MlmAdminPeer::CREATED_BY => 5, MlmAdminPeer::CREATED_ON => 6, MlmAdminPeer::UPDATED_BY => 7, MlmAdminPeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('admin_id' => 0, 'admin_code' => 1, 'user_id' => 2, 'status_code' => 3, 'admin_role' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmAdminMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmAdminMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmAdminPeer::getTableMap();
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
		return str_replace(MlmAdminPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmAdminPeer::ADMIN_ID);

		$criteria->addSelectColumn(MlmAdminPeer::ADMIN_CODE);

		$criteria->addSelectColumn(MlmAdminPeer::USER_ID);

		$criteria->addSelectColumn(MlmAdminPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmAdminPeer::ADMIN_ROLE);

		$criteria->addSelectColumn(MlmAdminPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmAdminPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmAdminPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmAdminPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_admin.ADMIN_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_admin.ADMIN_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmAdminPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmAdminPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmAdminPeer::doSelectRS($criteria, $con);
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
		$objects = MlmAdminPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmAdminPeer::populateObjects(MlmAdminPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmAdminPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmAdminPeer::getOMClass();
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
		return MlmAdminPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmAdminPeer::ADMIN_ID); 

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
			$comparison = $criteria->getComparison(MlmAdminPeer::ADMIN_ID);
			$selectCriteria->add(MlmAdminPeer::ADMIN_ID, $criteria->remove(MlmAdminPeer::ADMIN_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmAdminPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmAdminPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmAdmin) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmAdminPeer::ADMIN_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmAdmin $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmAdminPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmAdminPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmAdminPeer::DATABASE_NAME, MlmAdminPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmAdminPeer::DATABASE_NAME);

		$criteria->add(MlmAdminPeer::ADMIN_ID, $pk);


		$v = MlmAdminPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmAdminPeer::ADMIN_ID, $pks, Criteria::IN);
			$objs = MlmAdminPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmAdminPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmAdminMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmAdminMapBuilder');
}
