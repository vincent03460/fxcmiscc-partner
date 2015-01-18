<?php


abstract class BaseMlmMd4AccountPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_md4_account';

	
	const CLASS_DEFAULT = 'lib.model.MlmMd4Account';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MD4_ID = 'mlm_md4_account.MD4_ID';

	
	const DISTRIBUTOR_ID = 'mlm_md4_account.DISTRIBUTOR_ID';

	
	const PACKAGE_ID = 'mlm_md4_account.PACKAGE_ID';

	
	const MD_USER_NAME = 'mlm_md4_account.MD_USER_NAME';

	
	const INVESTOR_PASSWORD = 'mlm_md4_account.INVESTOR_PASSWORD';

	
	const NORMAL_PASSWORD = 'mlm_md4_account.NORMAL_PASSWORD';

	
	const SERIAL_NO = 'mlm_md4_account.SERIAL_NO';

	
	const STATUS_CODE = 'mlm_md4_account.STATUS_CODE';

	
	const CREATED_BY = 'mlm_md4_account.CREATED_BY';

	
	const CREATED_ON = 'mlm_md4_account.CREATED_ON';

	
	const UPDATED_BY = 'mlm_md4_account.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_md4_account.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Md4Id', 'DistributorId', 'PackageId', 'MdUserName', 'InvestorPassword', 'NormalPassword', 'SerialNo', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmMd4AccountPeer::MD4_ID, MlmMd4AccountPeer::DISTRIBUTOR_ID, MlmMd4AccountPeer::PACKAGE_ID, MlmMd4AccountPeer::MD_USER_NAME, MlmMd4AccountPeer::INVESTOR_PASSWORD, MlmMd4AccountPeer::NORMAL_PASSWORD, MlmMd4AccountPeer::SERIAL_NO, MlmMd4AccountPeer::STATUS_CODE, MlmMd4AccountPeer::CREATED_BY, MlmMd4AccountPeer::CREATED_ON, MlmMd4AccountPeer::UPDATED_BY, MlmMd4AccountPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('md4_id', 'distributor_id', 'package_id', 'md_user_name', 'investor_password', 'normal_password', 'serial_no', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Md4Id' => 0, 'DistributorId' => 1, 'PackageId' => 2, 'MdUserName' => 3, 'InvestorPassword' => 4, 'NormalPassword' => 5, 'SerialNo' => 6, 'StatusCode' => 7, 'CreatedBy' => 8, 'CreatedOn' => 9, 'UpdatedBy' => 10, 'UpdatedOn' => 11, ),
		BasePeer::TYPE_COLNAME => array (MlmMd4AccountPeer::MD4_ID => 0, MlmMd4AccountPeer::DISTRIBUTOR_ID => 1, MlmMd4AccountPeer::PACKAGE_ID => 2, MlmMd4AccountPeer::MD_USER_NAME => 3, MlmMd4AccountPeer::INVESTOR_PASSWORD => 4, MlmMd4AccountPeer::NORMAL_PASSWORD => 5, MlmMd4AccountPeer::SERIAL_NO => 6, MlmMd4AccountPeer::STATUS_CODE => 7, MlmMd4AccountPeer::CREATED_BY => 8, MlmMd4AccountPeer::CREATED_ON => 9, MlmMd4AccountPeer::UPDATED_BY => 10, MlmMd4AccountPeer::UPDATED_ON => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('md4_id' => 0, 'distributor_id' => 1, 'package_id' => 2, 'md_user_name' => 3, 'investor_password' => 4, 'normal_password' => 5, 'serial_no' => 6, 'status_code' => 7, 'created_by' => 8, 'created_on' => 9, 'updated_by' => 10, 'updated_on' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmMd4AccountMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmMd4AccountMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmMd4AccountPeer::getTableMap();
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
		return str_replace(MlmMd4AccountPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmMd4AccountPeer::MD4_ID);

		$criteria->addSelectColumn(MlmMd4AccountPeer::DISTRIBUTOR_ID);

		$criteria->addSelectColumn(MlmMd4AccountPeer::PACKAGE_ID);

		$criteria->addSelectColumn(MlmMd4AccountPeer::MD_USER_NAME);

		$criteria->addSelectColumn(MlmMd4AccountPeer::INVESTOR_PASSWORD);

		$criteria->addSelectColumn(MlmMd4AccountPeer::NORMAL_PASSWORD);

		$criteria->addSelectColumn(MlmMd4AccountPeer::SERIAL_NO);

		$criteria->addSelectColumn(MlmMd4AccountPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmMd4AccountPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmMd4AccountPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmMd4AccountPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmMd4AccountPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_md4_account.MD4_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_md4_account.MD4_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmMd4AccountPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmMd4AccountPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmMd4AccountPeer::doSelectRS($criteria, $con);
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
		$objects = MlmMd4AccountPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmMd4AccountPeer::populateObjects(MlmMd4AccountPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmMd4AccountPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmMd4AccountPeer::getOMClass();
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
		return MlmMd4AccountPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} else {
			$criteria = $values->buildCriteria(); 
		}

		$criteria->remove(MlmMd4AccountPeer::MD4_ID); 


		
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

			$comparison = $criteria->getComparison(MlmMd4AccountPeer::MD4_ID);
			$selectCriteria->add(MlmMd4AccountPeer::MD4_ID, $criteria->remove(MlmMd4AccountPeer::MD4_ID), $comparison);

		} else { 
			$criteria = $values->buildCriteria(); 
			$selectCriteria = $values->buildPkeyCriteria(); 
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 
		try {
			
			
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(MlmMd4AccountPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmMd4AccountPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmMd4Account) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmMd4AccountPeer::MD4_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmMd4Account $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmMd4AccountPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmMd4AccountPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmMd4AccountPeer::DATABASE_NAME, MlmMd4AccountPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmMd4AccountPeer::DATABASE_NAME);

		$criteria->add(MlmMd4AccountPeer::MD4_ID, $pk);


		$v = MlmMd4AccountPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmMd4AccountPeer::MD4_ID, $pks, Criteria::IN);
			$objs = MlmMd4AccountPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmMd4AccountPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmMd4AccountMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmMd4AccountMapBuilder');
}
