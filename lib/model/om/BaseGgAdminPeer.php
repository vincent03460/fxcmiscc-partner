<?php


abstract class BaseGgAdminPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_admin';

	
	const CLASS_DEFAULT = 'lib.model.GgAdmin';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_admin.ID';

	
	const NAME = 'gg_admin.NAME';

	
	const USERNAME = 'gg_admin.USERNAME';

	
	const PASSWORD = 'gg_admin.PASSWORD';

	
	const ENC_PASSWORD = 'gg_admin.ENC_PASSWORD';

	
	const EMAIL = 'gg_admin.EMAIL';

	
	const MASTER = 'gg_admin.MASTER';

	
	const PV_DB = 'gg_admin.PV_DB';

	
	const PV_TASK = 'gg_admin.PV_TASK';

	
	const RE_CONTACT = 'gg_admin.RE_CONTACT';

	
	const RE_SYSTEM = 'gg_admin.RE_SYSTEM';

	
	const RE_ERROR = 'gg_admin.RE_ERROR';

	
	const CDATE = 'gg_admin.CDATE';

	
	const LAST_LOGIN = 'gg_admin.LAST_LOGIN';

	
	const LAST_LOGIN2 = 'gg_admin.LAST_LOGIN2';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Username', 'Password', 'EncPassword', 'Email', 'Master', 'PvDb', 'PvTask', 'ReContact', 'ReSystem', 'ReError', 'Cdate', 'LastLogin', 'LastLogin2', ),
		BasePeer::TYPE_COLNAME => array (GgAdminPeer::ID, GgAdminPeer::NAME, GgAdminPeer::USERNAME, GgAdminPeer::PASSWORD, GgAdminPeer::ENC_PASSWORD, GgAdminPeer::EMAIL, GgAdminPeer::MASTER, GgAdminPeer::PV_DB, GgAdminPeer::PV_TASK, GgAdminPeer::RE_CONTACT, GgAdminPeer::RE_SYSTEM, GgAdminPeer::RE_ERROR, GgAdminPeer::CDATE, GgAdminPeer::LAST_LOGIN, GgAdminPeer::LAST_LOGIN2, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'username', 'password', 'enc_password', 'email', 'master', 'pv_db', 'pv_task', 're_contact', 're_system', 're_error', 'cdate', 'last_login', 'last_login2', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Username' => 2, 'Password' => 3, 'EncPassword' => 4, 'Email' => 5, 'Master' => 6, 'PvDb' => 7, 'PvTask' => 8, 'ReContact' => 9, 'ReSystem' => 10, 'ReError' => 11, 'Cdate' => 12, 'LastLogin' => 13, 'LastLogin2' => 14, ),
		BasePeer::TYPE_COLNAME => array (GgAdminPeer::ID => 0, GgAdminPeer::NAME => 1, GgAdminPeer::USERNAME => 2, GgAdminPeer::PASSWORD => 3, GgAdminPeer::ENC_PASSWORD => 4, GgAdminPeer::EMAIL => 5, GgAdminPeer::MASTER => 6, GgAdminPeer::PV_DB => 7, GgAdminPeer::PV_TASK => 8, GgAdminPeer::RE_CONTACT => 9, GgAdminPeer::RE_SYSTEM => 10, GgAdminPeer::RE_ERROR => 11, GgAdminPeer::CDATE => 12, GgAdminPeer::LAST_LOGIN => 13, GgAdminPeer::LAST_LOGIN2 => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'username' => 2, 'password' => 3, 'enc_password' => 4, 'email' => 5, 'master' => 6, 'pv_db' => 7, 'pv_task' => 8, 're_contact' => 9, 're_system' => 10, 're_error' => 11, 'cdate' => 12, 'last_login' => 13, 'last_login2' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgAdminMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgAdminMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgAdminPeer::getTableMap();
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
		return str_replace(GgAdminPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgAdminPeer::ID);

		$criteria->addSelectColumn(GgAdminPeer::NAME);

		$criteria->addSelectColumn(GgAdminPeer::USERNAME);

		$criteria->addSelectColumn(GgAdminPeer::PASSWORD);

		$criteria->addSelectColumn(GgAdminPeer::ENC_PASSWORD);

		$criteria->addSelectColumn(GgAdminPeer::EMAIL);

		$criteria->addSelectColumn(GgAdminPeer::MASTER);

		$criteria->addSelectColumn(GgAdminPeer::PV_DB);

		$criteria->addSelectColumn(GgAdminPeer::PV_TASK);

		$criteria->addSelectColumn(GgAdminPeer::RE_CONTACT);

		$criteria->addSelectColumn(GgAdminPeer::RE_SYSTEM);

		$criteria->addSelectColumn(GgAdminPeer::RE_ERROR);

		$criteria->addSelectColumn(GgAdminPeer::CDATE);

		$criteria->addSelectColumn(GgAdminPeer::LAST_LOGIN);

		$criteria->addSelectColumn(GgAdminPeer::LAST_LOGIN2);

	}

	const COUNT = 'COUNT(gg_admin.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_admin.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgAdminPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgAdminPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgAdminPeer::doSelectRS($criteria, $con);
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
		$objects = GgAdminPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgAdminPeer::populateObjects(GgAdminPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgAdminPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgAdminPeer::getOMClass();
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
		return GgAdminPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgAdminPeer::ID); 

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
			$comparison = $criteria->getComparison(GgAdminPeer::ID);
			$selectCriteria->add(GgAdminPeer::ID, $criteria->remove(GgAdminPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgAdminPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgAdminPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgAdmin) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgAdminPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgAdmin $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgAdminPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgAdminPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgAdminPeer::DATABASE_NAME, GgAdminPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgAdminPeer::DATABASE_NAME);

		$criteria->add(GgAdminPeer::ID, $pk);


		$v = GgAdminPeer::doSelect($criteria, $con);

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
			$criteria->add(GgAdminPeer::ID, $pks, Criteria::IN);
			$objs = GgAdminPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgAdminPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgAdminMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgAdminMapBuilder');
}
