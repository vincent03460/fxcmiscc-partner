<?php


abstract class BaseAppEmailDatabasePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'app_email_database';

	
	const CLASS_DEFAULT = 'lib.model.AppEmailDatabase';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const EMAIL_ID = 'app_email_database.EMAIL_ID';

	
	const EMAIL = 'app_email_database.EMAIL';

	
	const STATUS_CODE = 'app_email_database.STATUS_CODE';

	
	const CREATED_BY = 'app_email_database.CREATED_BY';

	
	const CREATED_ON = 'app_email_database.CREATED_ON';

	
	const UPDATED_BY = 'app_email_database.UPDATED_BY';

	
	const UPDATED_ON = 'app_email_database.UPDATED_ON';

	
	const REMARK = 'app_email_database.REMARK';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EmailId', 'Email', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', 'Remark', ),
		BasePeer::TYPE_COLNAME => array (AppEmailDatabasePeer::EMAIL_ID, AppEmailDatabasePeer::EMAIL, AppEmailDatabasePeer::STATUS_CODE, AppEmailDatabasePeer::CREATED_BY, AppEmailDatabasePeer::CREATED_ON, AppEmailDatabasePeer::UPDATED_BY, AppEmailDatabasePeer::UPDATED_ON, AppEmailDatabasePeer::REMARK, ),
		BasePeer::TYPE_FIELDNAME => array ('email_id', 'email', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', 'remark', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EmailId' => 0, 'Email' => 1, 'StatusCode' => 2, 'CreatedBy' => 3, 'CreatedOn' => 4, 'UpdatedBy' => 5, 'UpdatedOn' => 6, 'Remark' => 7, ),
		BasePeer::TYPE_COLNAME => array (AppEmailDatabasePeer::EMAIL_ID => 0, AppEmailDatabasePeer::EMAIL => 1, AppEmailDatabasePeer::STATUS_CODE => 2, AppEmailDatabasePeer::CREATED_BY => 3, AppEmailDatabasePeer::CREATED_ON => 4, AppEmailDatabasePeer::UPDATED_BY => 5, AppEmailDatabasePeer::UPDATED_ON => 6, AppEmailDatabasePeer::REMARK => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('email_id' => 0, 'email' => 1, 'status_code' => 2, 'created_by' => 3, 'created_on' => 4, 'updated_by' => 5, 'updated_on' => 6, 'remark' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AppEmailDatabaseMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AppEmailDatabaseMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AppEmailDatabasePeer::getTableMap();
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
		return str_replace(AppEmailDatabasePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AppEmailDatabasePeer::EMAIL_ID);

		$criteria->addSelectColumn(AppEmailDatabasePeer::EMAIL);

		$criteria->addSelectColumn(AppEmailDatabasePeer::STATUS_CODE);

		$criteria->addSelectColumn(AppEmailDatabasePeer::CREATED_BY);

		$criteria->addSelectColumn(AppEmailDatabasePeer::CREATED_ON);

		$criteria->addSelectColumn(AppEmailDatabasePeer::UPDATED_BY);

		$criteria->addSelectColumn(AppEmailDatabasePeer::UPDATED_ON);

		$criteria->addSelectColumn(AppEmailDatabasePeer::REMARK);

	}

	const COUNT = 'COUNT(app_email_database.EMAIL_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT app_email_database.EMAIL_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AppEmailDatabasePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AppEmailDatabasePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AppEmailDatabasePeer::doSelectRS($criteria, $con);
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
		$objects = AppEmailDatabasePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AppEmailDatabasePeer::populateObjects(AppEmailDatabasePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AppEmailDatabasePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AppEmailDatabasePeer::getOMClass();
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
		return AppEmailDatabasePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AppEmailDatabasePeer::EMAIL_ID); 

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
			$comparison = $criteria->getComparison(AppEmailDatabasePeer::EMAIL_ID);
			$selectCriteria->add(AppEmailDatabasePeer::EMAIL_ID, $criteria->remove(AppEmailDatabasePeer::EMAIL_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AppEmailDatabasePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AppEmailDatabasePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AppEmailDatabase) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AppEmailDatabasePeer::EMAIL_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AppEmailDatabase $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AppEmailDatabasePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AppEmailDatabasePeer::TABLE_NAME);

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

		return BasePeer::doValidate(AppEmailDatabasePeer::DATABASE_NAME, AppEmailDatabasePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AppEmailDatabasePeer::DATABASE_NAME);

		$criteria->add(AppEmailDatabasePeer::EMAIL_ID, $pk);


		$v = AppEmailDatabasePeer::doSelect($criteria, $con);

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
			$criteria->add(AppEmailDatabasePeer::EMAIL_ID, $pks, Criteria::IN);
			$objs = AppEmailDatabasePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAppEmailDatabasePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AppEmailDatabaseMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AppEmailDatabaseMapBuilder');
}
