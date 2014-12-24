<?php


abstract class BaseAppUserInRolePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'app_user_in_role';

	
	const CLASS_DEFAULT = 'lib.model.AppUserInRole';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const USER_ROLE_ID = 'app_user_in_role.USER_ROLE_ID';

	
	const USER_ID = 'app_user_in_role.USER_ID';

	
	const ROLE_ID = 'app_user_in_role.ROLE_ID';

	
	const CREATED_ON = 'app_user_in_role.CREATED_ON';

	
	const UPDATED_ON = 'app_user_in_role.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('UserRoleId', 'UserId', 'RoleId', 'CreatedOn', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (AppUserInRolePeer::USER_ROLE_ID, AppUserInRolePeer::USER_ID, AppUserInRolePeer::ROLE_ID, AppUserInRolePeer::CREATED_ON, AppUserInRolePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('user_role_id', 'user_id', 'role_id', 'created_on', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('UserRoleId' => 0, 'UserId' => 1, 'RoleId' => 2, 'CreatedOn' => 3, 'UpdatedOn' => 4, ),
		BasePeer::TYPE_COLNAME => array (AppUserInRolePeer::USER_ROLE_ID => 0, AppUserInRolePeer::USER_ID => 1, AppUserInRolePeer::ROLE_ID => 2, AppUserInRolePeer::CREATED_ON => 3, AppUserInRolePeer::UPDATED_ON => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('user_role_id' => 0, 'user_id' => 1, 'role_id' => 2, 'created_on' => 3, 'updated_on' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AppUserInRoleMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AppUserInRoleMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AppUserInRolePeer::getTableMap();
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
		return str_replace(AppUserInRolePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AppUserInRolePeer::USER_ROLE_ID);

		$criteria->addSelectColumn(AppUserInRolePeer::USER_ID);

		$criteria->addSelectColumn(AppUserInRolePeer::ROLE_ID);

		$criteria->addSelectColumn(AppUserInRolePeer::CREATED_ON);

		$criteria->addSelectColumn(AppUserInRolePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(app_user_in_role.USER_ROLE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT app_user_in_role.USER_ROLE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AppUserInRolePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AppUserInRolePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AppUserInRolePeer::doSelectRS($criteria, $con);
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
		$objects = AppUserInRolePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AppUserInRolePeer::populateObjects(AppUserInRolePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AppUserInRolePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AppUserInRolePeer::getOMClass();
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
		return AppUserInRolePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AppUserInRolePeer::USER_ROLE_ID); 

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
			$comparison = $criteria->getComparison(AppUserInRolePeer::USER_ROLE_ID);
			$selectCriteria->add(AppUserInRolePeer::USER_ROLE_ID, $criteria->remove(AppUserInRolePeer::USER_ROLE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AppUserInRolePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AppUserInRolePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AppUserInRole) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AppUserInRolePeer::USER_ROLE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AppUserInRole $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AppUserInRolePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AppUserInRolePeer::TABLE_NAME);

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

		return BasePeer::doValidate(AppUserInRolePeer::DATABASE_NAME, AppUserInRolePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AppUserInRolePeer::DATABASE_NAME);

		$criteria->add(AppUserInRolePeer::USER_ROLE_ID, $pk);


		$v = AppUserInRolePeer::doSelect($criteria, $con);

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
			$criteria->add(AppUserInRolePeer::USER_ROLE_ID, $pks, Criteria::IN);
			$objs = AppUserInRolePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAppUserInRolePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AppUserInRoleMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AppUserInRoleMapBuilder');
}
