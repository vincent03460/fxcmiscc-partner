<?php


abstract class BaseAbfxDistMt4Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'abfx_dist_mt4';

	
	const CLASS_DEFAULT = 'lib.model.AbfxDistMt4';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ABFX_ID = 'abfx_dist_mt4.ABFX_ID';

	
	const DIST_ID = 'abfx_dist_mt4.DIST_ID';

	
	const DIST_CODE = 'abfx_dist_mt4.DIST_CODE';

	
	const EMAIL = 'abfx_dist_mt4.EMAIL';

	
	const FULL_NAME = 'abfx_dist_mt4.FULL_NAME';

	
	const MT4_USER_NAME = 'abfx_dist_mt4.MT4_USER_NAME';

	
	const MT4_PASSWORD = 'abfx_dist_mt4.MT4_PASSWORD';

	
	const FILE_NAME = 'abfx_dist_mt4.FILE_NAME';

	
	const STATUS_CODE = 'abfx_dist_mt4.STATUS_CODE';

	
	const CREATED_BY = 'abfx_dist_mt4.CREATED_BY';

	
	const CREATED_ON = 'abfx_dist_mt4.CREATED_ON';

	
	const UPDATED_BY = 'abfx_dist_mt4.UPDATED_BY';

	
	const UPDATED_ON = 'abfx_dist_mt4.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AbfxId', 'DistId', 'DistCode', 'Email', 'FullName', 'Mt4UserName', 'Mt4Password', 'FileName', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (AbfxDistMt4Peer::ABFX_ID, AbfxDistMt4Peer::DIST_ID, AbfxDistMt4Peer::DIST_CODE, AbfxDistMt4Peer::EMAIL, AbfxDistMt4Peer::FULL_NAME, AbfxDistMt4Peer::MT4_USER_NAME, AbfxDistMt4Peer::MT4_PASSWORD, AbfxDistMt4Peer::FILE_NAME, AbfxDistMt4Peer::STATUS_CODE, AbfxDistMt4Peer::CREATED_BY, AbfxDistMt4Peer::CREATED_ON, AbfxDistMt4Peer::UPDATED_BY, AbfxDistMt4Peer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('abfx_id', 'dist_id', 'dist_code', 'email', 'full_name', 'mt4_user_name', 'mt4_password', 'file_name', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AbfxId' => 0, 'DistId' => 1, 'DistCode' => 2, 'Email' => 3, 'FullName' => 4, 'Mt4UserName' => 5, 'Mt4Password' => 6, 'FileName' => 7, 'StatusCode' => 8, 'CreatedBy' => 9, 'CreatedOn' => 10, 'UpdatedBy' => 11, 'UpdatedOn' => 12, ),
		BasePeer::TYPE_COLNAME => array (AbfxDistMt4Peer::ABFX_ID => 0, AbfxDistMt4Peer::DIST_ID => 1, AbfxDistMt4Peer::DIST_CODE => 2, AbfxDistMt4Peer::EMAIL => 3, AbfxDistMt4Peer::FULL_NAME => 4, AbfxDistMt4Peer::MT4_USER_NAME => 5, AbfxDistMt4Peer::MT4_PASSWORD => 6, AbfxDistMt4Peer::FILE_NAME => 7, AbfxDistMt4Peer::STATUS_CODE => 8, AbfxDistMt4Peer::CREATED_BY => 9, AbfxDistMt4Peer::CREATED_ON => 10, AbfxDistMt4Peer::UPDATED_BY => 11, AbfxDistMt4Peer::UPDATED_ON => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('abfx_id' => 0, 'dist_id' => 1, 'dist_code' => 2, 'email' => 3, 'full_name' => 4, 'mt4_user_name' => 5, 'mt4_password' => 6, 'file_name' => 7, 'status_code' => 8, 'created_by' => 9, 'created_on' => 10, 'updated_by' => 11, 'updated_on' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AbfxDistMt4MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AbfxDistMt4MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AbfxDistMt4Peer::getTableMap();
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
		return str_replace(AbfxDistMt4Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AbfxDistMt4Peer::ABFX_ID);

		$criteria->addSelectColumn(AbfxDistMt4Peer::DIST_ID);

		$criteria->addSelectColumn(AbfxDistMt4Peer::DIST_CODE);

		$criteria->addSelectColumn(AbfxDistMt4Peer::EMAIL);

		$criteria->addSelectColumn(AbfxDistMt4Peer::FULL_NAME);

		$criteria->addSelectColumn(AbfxDistMt4Peer::MT4_USER_NAME);

		$criteria->addSelectColumn(AbfxDistMt4Peer::MT4_PASSWORD);

		$criteria->addSelectColumn(AbfxDistMt4Peer::FILE_NAME);

		$criteria->addSelectColumn(AbfxDistMt4Peer::STATUS_CODE);

		$criteria->addSelectColumn(AbfxDistMt4Peer::CREATED_BY);

		$criteria->addSelectColumn(AbfxDistMt4Peer::CREATED_ON);

		$criteria->addSelectColumn(AbfxDistMt4Peer::UPDATED_BY);

		$criteria->addSelectColumn(AbfxDistMt4Peer::UPDATED_ON);

	}

	const COUNT = 'COUNT(abfx_dist_mt4.ABFX_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT abfx_dist_mt4.ABFX_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbfxDistMt4Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbfxDistMt4Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AbfxDistMt4Peer::doSelectRS($criteria, $con);
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
		$objects = AbfxDistMt4Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AbfxDistMt4Peer::populateObjects(AbfxDistMt4Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AbfxDistMt4Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AbfxDistMt4Peer::getOMClass();
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
		return AbfxDistMt4Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AbfxDistMt4Peer::ABFX_ID); 

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
			$comparison = $criteria->getComparison(AbfxDistMt4Peer::ABFX_ID);
			$selectCriteria->add(AbfxDistMt4Peer::ABFX_ID, $criteria->remove(AbfxDistMt4Peer::ABFX_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AbfxDistMt4Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AbfxDistMt4Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AbfxDistMt4) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AbfxDistMt4Peer::ABFX_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AbfxDistMt4 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AbfxDistMt4Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AbfxDistMt4Peer::TABLE_NAME);

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

		return BasePeer::doValidate(AbfxDistMt4Peer::DATABASE_NAME, AbfxDistMt4Peer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AbfxDistMt4Peer::DATABASE_NAME);

		$criteria->add(AbfxDistMt4Peer::ABFX_ID, $pk);


		$v = AbfxDistMt4Peer::doSelect($criteria, $con);

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
			$criteria->add(AbfxDistMt4Peer::ABFX_ID, $pks, Criteria::IN);
			$objs = AbfxDistMt4Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAbfxDistMt4Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AbfxDistMt4MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AbfxDistMt4MapBuilder');
}
