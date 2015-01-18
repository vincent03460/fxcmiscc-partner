<?php


abstract class BaseTmpMt4AccountPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tmp_mt4_account';

	
	const CLASS_DEFAULT = 'lib.model.TmpMt4Account';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MT4_ID = 'tmp_mt4_account.MT4_ID';

	
	const FULLNAME = 'tmp_mt4_account.FULLNAME';

	
	const EMAIL = 'tmp_mt4_account.EMAIL';

	
	const MT4_USERNAME = 'tmp_mt4_account.MT4_USERNAME';

	
	const MT4_PASSWORD = 'tmp_mt4_account.MT4_PASSWORD';

	
	const STATUS_CODE = 'tmp_mt4_account.STATUS_CODE';

	
	const CREATED_BY = 'tmp_mt4_account.CREATED_BY';

	
	const CREATED_ON = 'tmp_mt4_account.CREATED_ON';

	
	const UPDATED_BY = 'tmp_mt4_account.UPDATED_BY';

	
	const UPDATED_ON = 'tmp_mt4_account.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Mt4Id', 'Fullname', 'Email', 'Mt4Username', 'Mt4Password', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (TmpMt4AccountPeer::MT4_ID, TmpMt4AccountPeer::FULLNAME, TmpMt4AccountPeer::EMAIL, TmpMt4AccountPeer::MT4_USERNAME, TmpMt4AccountPeer::MT4_PASSWORD, TmpMt4AccountPeer::STATUS_CODE, TmpMt4AccountPeer::CREATED_BY, TmpMt4AccountPeer::CREATED_ON, TmpMt4AccountPeer::UPDATED_BY, TmpMt4AccountPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('mt4_id', 'fullname', 'email', 'mt4_username', 'mt4_password', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Mt4Id' => 0, 'Fullname' => 1, 'Email' => 2, 'Mt4Username' => 3, 'Mt4Password' => 4, 'StatusCode' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (TmpMt4AccountPeer::MT4_ID => 0, TmpMt4AccountPeer::FULLNAME => 1, TmpMt4AccountPeer::EMAIL => 2, TmpMt4AccountPeer::MT4_USERNAME => 3, TmpMt4AccountPeer::MT4_PASSWORD => 4, TmpMt4AccountPeer::STATUS_CODE => 5, TmpMt4AccountPeer::CREATED_BY => 6, TmpMt4AccountPeer::CREATED_ON => 7, TmpMt4AccountPeer::UPDATED_BY => 8, TmpMt4AccountPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('mt4_id' => 0, 'fullname' => 1, 'email' => 2, 'mt4_username' => 3, 'mt4_password' => 4, 'status_code' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TmpMt4AccountMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TmpMt4AccountMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TmpMt4AccountPeer::getTableMap();
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
		return str_replace(TmpMt4AccountPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TmpMt4AccountPeer::MT4_ID);

		$criteria->addSelectColumn(TmpMt4AccountPeer::FULLNAME);

		$criteria->addSelectColumn(TmpMt4AccountPeer::EMAIL);

		$criteria->addSelectColumn(TmpMt4AccountPeer::MT4_USERNAME);

		$criteria->addSelectColumn(TmpMt4AccountPeer::MT4_PASSWORD);

		$criteria->addSelectColumn(TmpMt4AccountPeer::STATUS_CODE);

		$criteria->addSelectColumn(TmpMt4AccountPeer::CREATED_BY);

		$criteria->addSelectColumn(TmpMt4AccountPeer::CREATED_ON);

		$criteria->addSelectColumn(TmpMt4AccountPeer::UPDATED_BY);

		$criteria->addSelectColumn(TmpMt4AccountPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(tmp_mt4_account.MT4_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tmp_mt4_account.MT4_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TmpMt4AccountPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TmpMt4AccountPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TmpMt4AccountPeer::doSelectRS($criteria, $con);
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
		$objects = TmpMt4AccountPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TmpMt4AccountPeer::populateObjects(TmpMt4AccountPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TmpMt4AccountPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TmpMt4AccountPeer::getOMClass();
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
		return TmpMt4AccountPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TmpMt4AccountPeer::MT4_ID); 

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
			$comparison = $criteria->getComparison(TmpMt4AccountPeer::MT4_ID);
			$selectCriteria->add(TmpMt4AccountPeer::MT4_ID, $criteria->remove(TmpMt4AccountPeer::MT4_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TmpMt4AccountPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TmpMt4AccountPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof TmpMt4Account) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TmpMt4AccountPeer::MT4_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TmpMt4Account $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TmpMt4AccountPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TmpMt4AccountPeer::TABLE_NAME);

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

		return BasePeer::doValidate(TmpMt4AccountPeer::DATABASE_NAME, TmpMt4AccountPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(TmpMt4AccountPeer::DATABASE_NAME);

		$criteria->add(TmpMt4AccountPeer::MT4_ID, $pk);


		$v = TmpMt4AccountPeer::doSelect($criteria, $con);

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
			$criteria->add(TmpMt4AccountPeer::MT4_ID, $pks, Criteria::IN);
			$objs = TmpMt4AccountPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTmpMt4AccountPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TmpMt4AccountMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TmpMt4AccountMapBuilder');
}
