<?php


abstract class BaseAppSettingPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'app_setting';

	
	const CLASS_DEFAULT = 'lib.model.AppSetting';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const SETTING_ID = 'app_setting.SETTING_ID';

	
	const SETTING_PARAMETER = 'app_setting.SETTING_PARAMETER';

	
	const SETTING_VALUE = 'app_setting.SETTING_VALUE';

	
	const SETTING_REMARK = 'app_setting.SETTING_REMARK';

	
	const CREATED_BY = 'app_setting.CREATED_BY';

	
	const CREATED_ON = 'app_setting.CREATED_ON';

	
	const UPDATED_BY = 'app_setting.UPDATED_BY';

	
	const UPDATED_ON = 'app_setting.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('SettingId', 'SettingParameter', 'SettingValue', 'SettingRemark', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (AppSettingPeer::SETTING_ID, AppSettingPeer::SETTING_PARAMETER, AppSettingPeer::SETTING_VALUE, AppSettingPeer::SETTING_REMARK, AppSettingPeer::CREATED_BY, AppSettingPeer::CREATED_ON, AppSettingPeer::UPDATED_BY, AppSettingPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('setting_id', 'setting_parameter', 'setting_value', 'setting_remark', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('SettingId' => 0, 'SettingParameter' => 1, 'SettingValue' => 2, 'SettingRemark' => 3, 'CreatedBy' => 4, 'CreatedOn' => 5, 'UpdatedBy' => 6, 'UpdatedOn' => 7, ),
		BasePeer::TYPE_COLNAME => array (AppSettingPeer::SETTING_ID => 0, AppSettingPeer::SETTING_PARAMETER => 1, AppSettingPeer::SETTING_VALUE => 2, AppSettingPeer::SETTING_REMARK => 3, AppSettingPeer::CREATED_BY => 4, AppSettingPeer::CREATED_ON => 5, AppSettingPeer::UPDATED_BY => 6, AppSettingPeer::UPDATED_ON => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('setting_id' => 0, 'setting_parameter' => 1, 'setting_value' => 2, 'setting_remark' => 3, 'created_by' => 4, 'created_on' => 5, 'updated_by' => 6, 'updated_on' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AppSettingMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AppSettingMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AppSettingPeer::getTableMap();
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
		return str_replace(AppSettingPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AppSettingPeer::SETTING_ID);

		$criteria->addSelectColumn(AppSettingPeer::SETTING_PARAMETER);

		$criteria->addSelectColumn(AppSettingPeer::SETTING_VALUE);

		$criteria->addSelectColumn(AppSettingPeer::SETTING_REMARK);

		$criteria->addSelectColumn(AppSettingPeer::CREATED_BY);

		$criteria->addSelectColumn(AppSettingPeer::CREATED_ON);

		$criteria->addSelectColumn(AppSettingPeer::UPDATED_BY);

		$criteria->addSelectColumn(AppSettingPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(app_setting.SETTING_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT app_setting.SETTING_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AppSettingPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AppSettingPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AppSettingPeer::doSelectRS($criteria, $con);
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
		$objects = AppSettingPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AppSettingPeer::populateObjects(AppSettingPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AppSettingPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AppSettingPeer::getOMClass();
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
		return AppSettingPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AppSettingPeer::SETTING_ID); 

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
			$comparison = $criteria->getComparison(AppSettingPeer::SETTING_ID);
			$selectCriteria->add(AppSettingPeer::SETTING_ID, $criteria->remove(AppSettingPeer::SETTING_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AppSettingPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AppSettingPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AppSetting) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AppSettingPeer::SETTING_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AppSetting $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AppSettingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AppSettingPeer::TABLE_NAME);

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

		return BasePeer::doValidate(AppSettingPeer::DATABASE_NAME, AppSettingPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AppSettingPeer::DATABASE_NAME);

		$criteria->add(AppSettingPeer::SETTING_ID, $pk);


		$v = AppSettingPeer::doSelect($criteria, $con);

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
			$criteria->add(AppSettingPeer::SETTING_ID, $pks, Criteria::IN);
			$objs = AppSettingPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAppSettingPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AppSettingMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AppSettingMapBuilder');
}
