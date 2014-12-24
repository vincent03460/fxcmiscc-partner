<?php


abstract class BaseAppUserRoleAccessPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'app_user_role_access';

	
	const CLASS_DEFAULT = 'lib.model.AppUserRoleAccess';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ROLE_ACCESS_ID = 'app_user_role_access.ROLE_ACCESS_ID';

	
	const ACCESS_CODE = 'app_user_role_access.ACCESS_CODE';

	
	const ROLE_ID = 'app_user_role_access.ROLE_ID';

	
	const CREATED_ON = 'app_user_role_access.CREATED_ON';

	
	const UPDATED_ON = 'app_user_role_access.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RoleAccessId', 'AccessCode', 'RoleId', 'CreatedOn', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (AppUserRoleAccessPeer::ROLE_ACCESS_ID, AppUserRoleAccessPeer::ACCESS_CODE, AppUserRoleAccessPeer::ROLE_ID, AppUserRoleAccessPeer::CREATED_ON, AppUserRoleAccessPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('role_access_id', 'access_code', 'role_id', 'created_on', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RoleAccessId' => 0, 'AccessCode' => 1, 'RoleId' => 2, 'CreatedOn' => 3, 'UpdatedOn' => 4, ),
		BasePeer::TYPE_COLNAME => array (AppUserRoleAccessPeer::ROLE_ACCESS_ID => 0, AppUserRoleAccessPeer::ACCESS_CODE => 1, AppUserRoleAccessPeer::ROLE_ID => 2, AppUserRoleAccessPeer::CREATED_ON => 3, AppUserRoleAccessPeer::UPDATED_ON => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('role_access_id' => 0, 'access_code' => 1, 'role_id' => 2, 'created_on' => 3, 'updated_on' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AppUserRoleAccessMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AppUserRoleAccessMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AppUserRoleAccessPeer::getTableMap();
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
		return str_replace(AppUserRoleAccessPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AppUserRoleAccessPeer::ROLE_ACCESS_ID);

		$criteria->addSelectColumn(AppUserRoleAccessPeer::ACCESS_CODE);

		$criteria->addSelectColumn(AppUserRoleAccessPeer::ROLE_ID);

		$criteria->addSelectColumn(AppUserRoleAccessPeer::CREATED_ON);

		$criteria->addSelectColumn(AppUserRoleAccessPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(app_user_role_access.ROLE_ACCESS_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT app_user_role_access.ROLE_ACCESS_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AppUserRoleAccessPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AppUserRoleAccessPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AppUserRoleAccessPeer::doSelectRS($criteria, $con);
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
		$objects = AppUserRoleAccessPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AppUserRoleAccessPeer::populateObjects(AppUserRoleAccessPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AppUserRoleAccessPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AppUserRoleAccessPeer::getOMClass();
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
		return AppUserRoleAccessPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AppUserRoleAccessPeer::ROLE_ACCESS_ID); 

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
			$comparison = $criteria->getComparison(AppUserRoleAccessPeer::ROLE_ACCESS_ID);
			$selectCriteria->add(AppUserRoleAccessPeer::ROLE_ACCESS_ID, $criteria->remove(AppUserRoleAccessPeer::ROLE_ACCESS_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AppUserRoleAccessPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AppUserRoleAccessPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AppUserRoleAccess) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AppUserRoleAccessPeer::ROLE_ACCESS_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AppUserRoleAccess $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AppUserRoleAccessPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AppUserRoleAccessPeer::TABLE_NAME);

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

		return BasePeer::doValidate(AppUserRoleAccessPeer::DATABASE_NAME, AppUserRoleAccessPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AppUserRoleAccessPeer::DATABASE_NAME);

		$criteria->add(AppUserRoleAccessPeer::ROLE_ACCESS_ID, $pk);


		$v = AppUserRoleAccessPeer::doSelect($criteria, $con);

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
			$criteria->add(AppUserRoleAccessPeer::ROLE_ACCESS_ID, $pks, Criteria::IN);
			$objs = AppUserRoleAccessPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAppUserRoleAccessPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AppUserRoleAccessMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AppUserRoleAccessMapBuilder');
}
