<?php


abstract class BaseAppUserRolePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'app_user_role';

	
	const CLASS_DEFAULT = 'lib.model.AppUserRole';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ROLE_ID = 'app_user_role.ROLE_ID';

	
	const ROLE_CODE = 'app_user_role.ROLE_CODE';

	
	const ROLE_DESC = 'app_user_role.ROLE_DESC';

	
	const STATUS_CODE = 'app_user_role.STATUS_CODE';

	
	const CREATED_BY = 'app_user_role.CREATED_BY';

	
	const CREATED_ON = 'app_user_role.CREATED_ON';

	
	const UPDATED_ON = 'app_user_role.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RoleId', 'RoleCode', 'RoleDesc', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (AppUserRolePeer::ROLE_ID, AppUserRolePeer::ROLE_CODE, AppUserRolePeer::ROLE_DESC, AppUserRolePeer::STATUS_CODE, AppUserRolePeer::CREATED_BY, AppUserRolePeer::CREATED_ON, AppUserRolePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('role_id', 'role_code', 'role_desc', 'status_code', 'created_by', 'created_on', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RoleId' => 0, 'RoleCode' => 1, 'RoleDesc' => 2, 'StatusCode' => 3, 'CreatedBy' => 4, 'CreatedOn' => 5, 'UpdatedOn' => 6, ),
		BasePeer::TYPE_COLNAME => array (AppUserRolePeer::ROLE_ID => 0, AppUserRolePeer::ROLE_CODE => 1, AppUserRolePeer::ROLE_DESC => 2, AppUserRolePeer::STATUS_CODE => 3, AppUserRolePeer::CREATED_BY => 4, AppUserRolePeer::CREATED_ON => 5, AppUserRolePeer::UPDATED_ON => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('role_id' => 0, 'role_code' => 1, 'role_desc' => 2, 'status_code' => 3, 'created_by' => 4, 'created_on' => 5, 'updated_on' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AppUserRoleMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AppUserRoleMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AppUserRolePeer::getTableMap();
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
		return str_replace(AppUserRolePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AppUserRolePeer::ROLE_ID);

		$criteria->addSelectColumn(AppUserRolePeer::ROLE_CODE);

		$criteria->addSelectColumn(AppUserRolePeer::ROLE_DESC);

		$criteria->addSelectColumn(AppUserRolePeer::STATUS_CODE);

		$criteria->addSelectColumn(AppUserRolePeer::CREATED_BY);

		$criteria->addSelectColumn(AppUserRolePeer::CREATED_ON);

		$criteria->addSelectColumn(AppUserRolePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(app_user_role.ROLE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT app_user_role.ROLE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AppUserRolePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AppUserRolePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AppUserRolePeer::doSelectRS($criteria, $con);
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
		$objects = AppUserRolePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AppUserRolePeer::populateObjects(AppUserRolePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AppUserRolePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AppUserRolePeer::getOMClass();
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
		return AppUserRolePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AppUserRolePeer::ROLE_ID); 

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
			$comparison = $criteria->getComparison(AppUserRolePeer::ROLE_ID);
			$selectCriteria->add(AppUserRolePeer::ROLE_ID, $criteria->remove(AppUserRolePeer::ROLE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AppUserRolePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AppUserRolePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AppUserRole) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AppUserRolePeer::ROLE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AppUserRole $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AppUserRolePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AppUserRolePeer::TABLE_NAME);

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

		return BasePeer::doValidate(AppUserRolePeer::DATABASE_NAME, AppUserRolePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AppUserRolePeer::DATABASE_NAME);

		$criteria->add(AppUserRolePeer::ROLE_ID, $pk);


		$v = AppUserRolePeer::doSelect($criteria, $con);

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
			$criteria->add(AppUserRolePeer::ROLE_ID, $pks, Criteria::IN);
			$objs = AppUserRolePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAppUserRolePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AppUserRoleMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AppUserRoleMapBuilder');
}
