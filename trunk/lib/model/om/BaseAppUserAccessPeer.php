<?php


abstract class BaseAppUserAccessPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'app_user_access';

	
	const CLASS_DEFAULT = 'lib.model.AppUserAccess';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ACCESS_CODE = 'app_user_access.ACCESS_CODE';

	
	const PARENT_ID = 'app_user_access.PARENT_ID';

	
	const MENU_URL = 'app_user_access.MENU_URL';

	
	const MENU_LABEL = 'app_user_access.MENU_LABEL';

	
	const IS_MENU = 'app_user_access.IS_MENU';

	
	const IS_AUTH_NEEDED = 'app_user_access.IS_AUTH_NEEDED';

	
	const TREE_LEVEL = 'app_user_access.TREE_LEVEL';

	
	const TREE_SEQ = 'app_user_access.TREE_SEQ';

	
	const TREE_STRUCTURE = 'app_user_access.TREE_STRUCTURE';

	
	const STATUS_CODE = 'app_user_access.STATUS_CODE';

	
	const CREATED_ON = 'app_user_access.CREATED_ON';

	
	const UPDATED_ON = 'app_user_access.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AccessCode', 'ParentId', 'MenuUrl', 'MenuLabel', 'IsMenu', 'IsAuthNeeded', 'TreeLevel', 'TreeSeq', 'TreeStructure', 'StatusCode', 'CreatedOn', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (AppUserAccessPeer::ACCESS_CODE, AppUserAccessPeer::PARENT_ID, AppUserAccessPeer::MENU_URL, AppUserAccessPeer::MENU_LABEL, AppUserAccessPeer::IS_MENU, AppUserAccessPeer::IS_AUTH_NEEDED, AppUserAccessPeer::TREE_LEVEL, AppUserAccessPeer::TREE_SEQ, AppUserAccessPeer::TREE_STRUCTURE, AppUserAccessPeer::STATUS_CODE, AppUserAccessPeer::CREATED_ON, AppUserAccessPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('access_code', 'parent_id', 'menu_url', 'menu_label', 'is_menu', 'is_auth_needed', 'tree_level', 'tree_seq', 'tree_structure', 'status_code', 'created_on', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AccessCode' => 0, 'ParentId' => 1, 'MenuUrl' => 2, 'MenuLabel' => 3, 'IsMenu' => 4, 'IsAuthNeeded' => 5, 'TreeLevel' => 6, 'TreeSeq' => 7, 'TreeStructure' => 8, 'StatusCode' => 9, 'CreatedOn' => 10, 'UpdatedOn' => 11, ),
		BasePeer::TYPE_COLNAME => array (AppUserAccessPeer::ACCESS_CODE => 0, AppUserAccessPeer::PARENT_ID => 1, AppUserAccessPeer::MENU_URL => 2, AppUserAccessPeer::MENU_LABEL => 3, AppUserAccessPeer::IS_MENU => 4, AppUserAccessPeer::IS_AUTH_NEEDED => 5, AppUserAccessPeer::TREE_LEVEL => 6, AppUserAccessPeer::TREE_SEQ => 7, AppUserAccessPeer::TREE_STRUCTURE => 8, AppUserAccessPeer::STATUS_CODE => 9, AppUserAccessPeer::CREATED_ON => 10, AppUserAccessPeer::UPDATED_ON => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('access_code' => 0, 'parent_id' => 1, 'menu_url' => 2, 'menu_label' => 3, 'is_menu' => 4, 'is_auth_needed' => 5, 'tree_level' => 6, 'tree_seq' => 7, 'tree_structure' => 8, 'status_code' => 9, 'created_on' => 10, 'updated_on' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AppUserAccessMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AppUserAccessMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AppUserAccessPeer::getTableMap();
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
		return str_replace(AppUserAccessPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AppUserAccessPeer::ACCESS_CODE);

		$criteria->addSelectColumn(AppUserAccessPeer::PARENT_ID);

		$criteria->addSelectColumn(AppUserAccessPeer::MENU_URL);

		$criteria->addSelectColumn(AppUserAccessPeer::MENU_LABEL);

		$criteria->addSelectColumn(AppUserAccessPeer::IS_MENU);

		$criteria->addSelectColumn(AppUserAccessPeer::IS_AUTH_NEEDED);

		$criteria->addSelectColumn(AppUserAccessPeer::TREE_LEVEL);

		$criteria->addSelectColumn(AppUserAccessPeer::TREE_SEQ);

		$criteria->addSelectColumn(AppUserAccessPeer::TREE_STRUCTURE);

		$criteria->addSelectColumn(AppUserAccessPeer::STATUS_CODE);

		$criteria->addSelectColumn(AppUserAccessPeer::CREATED_ON);

		$criteria->addSelectColumn(AppUserAccessPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(app_user_access.ACCESS_CODE)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT app_user_access.ACCESS_CODE)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AppUserAccessPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AppUserAccessPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AppUserAccessPeer::doSelectRS($criteria, $con);
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
		$objects = AppUserAccessPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AppUserAccessPeer::populateObjects(AppUserAccessPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AppUserAccessPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AppUserAccessPeer::getOMClass();
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
		return AppUserAccessPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(AppUserAccessPeer::ACCESS_CODE);
			$selectCriteria->add(AppUserAccessPeer::ACCESS_CODE, $criteria->remove(AppUserAccessPeer::ACCESS_CODE), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AppUserAccessPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AppUserAccessPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AppUserAccess) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AppUserAccessPeer::ACCESS_CODE, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AppUserAccess $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AppUserAccessPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AppUserAccessPeer::TABLE_NAME);

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

		return BasePeer::doValidate(AppUserAccessPeer::DATABASE_NAME, AppUserAccessPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AppUserAccessPeer::DATABASE_NAME);

		$criteria->add(AppUserAccessPeer::ACCESS_CODE, $pk);


		$v = AppUserAccessPeer::doSelect($criteria, $con);

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
			$criteria->add(AppUserAccessPeer::ACCESS_CODE, $pks, Criteria::IN);
			$objs = AppUserAccessPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAppUserAccessPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AppUserAccessMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AppUserAccessMapBuilder');
}
