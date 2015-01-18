<?php


abstract class BaseImeRegistrationPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ime_registration';

	
	const CLASS_DEFAULT = 'lib.model.ImeRegistration';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const IME_ID = 'ime_registration.IME_ID';

	
	const FULL_NAME = 'ime_registration.FULL_NAME';

	
	const FULL_NAME_CHINESE = 'ime_registration.FULL_NAME_CHINESE';

	
	const DISTRIBUTOR_CODE = 'ime_registration.DISTRIBUTOR_CODE';

	
	const PASSPORT_NUMBER = 'ime_registration.PASSPORT_NUMBER';

	
	const NATIONALITY = 'ime_registration.NATIONALITY';

	
	const MOBILE_NO = 'ime_registration.MOBILE_NO';

	
	const EMAIL = 'ime_registration.EMAIL';

	
	const DIST_ID = 'ime_registration.DIST_ID';

	
	const ACCOUNT_ID = 'ime_registration.ACCOUNT_ID';

	
	const ACCOUNT_TYPE = 'ime_registration.ACCOUNT_TYPE';

	
	const QTY = 'ime_registration.QTY';

	
	const SUB_TOTAL = 'ime_registration.SUB_TOTAL';

	
	const STATUS_CODE = 'ime_registration.STATUS_CODE';

	
	const CREATED_BY = 'ime_registration.CREATED_BY';

	
	const CREATED_ON = 'ime_registration.CREATED_ON';

	
	const UPDATED_BY = 'ime_registration.UPDATED_BY';

	
	const UPDATED_ON = 'ime_registration.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ImeId', 'FullName', 'FullNameChinese', 'DistributorCode', 'PassportNumber', 'Nationality', 'MobileNo', 'Email', 'DistId', 'AccountId', 'AccountType', 'Qty', 'SubTotal', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (ImeRegistrationPeer::IME_ID, ImeRegistrationPeer::FULL_NAME, ImeRegistrationPeer::FULL_NAME_CHINESE, ImeRegistrationPeer::DISTRIBUTOR_CODE, ImeRegistrationPeer::PASSPORT_NUMBER, ImeRegistrationPeer::NATIONALITY, ImeRegistrationPeer::MOBILE_NO, ImeRegistrationPeer::EMAIL, ImeRegistrationPeer::DIST_ID, ImeRegistrationPeer::ACCOUNT_ID, ImeRegistrationPeer::ACCOUNT_TYPE, ImeRegistrationPeer::QTY, ImeRegistrationPeer::SUB_TOTAL, ImeRegistrationPeer::STATUS_CODE, ImeRegistrationPeer::CREATED_BY, ImeRegistrationPeer::CREATED_ON, ImeRegistrationPeer::UPDATED_BY, ImeRegistrationPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('ime_id', 'full_name', 'full_name_chinese', 'distributor_code', 'passport_number', 'nationality', 'mobile_no', 'email', 'dist_id', 'account_id', 'account_type', 'qty', 'sub_total', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ImeId' => 0, 'FullName' => 1, 'FullNameChinese' => 2, 'DistributorCode' => 3, 'PassportNumber' => 4, 'Nationality' => 5, 'MobileNo' => 6, 'Email' => 7, 'DistId' => 8, 'AccountId' => 9, 'AccountType' => 10, 'Qty' => 11, 'SubTotal' => 12, 'StatusCode' => 13, 'CreatedBy' => 14, 'CreatedOn' => 15, 'UpdatedBy' => 16, 'UpdatedOn' => 17, ),
		BasePeer::TYPE_COLNAME => array (ImeRegistrationPeer::IME_ID => 0, ImeRegistrationPeer::FULL_NAME => 1, ImeRegistrationPeer::FULL_NAME_CHINESE => 2, ImeRegistrationPeer::DISTRIBUTOR_CODE => 3, ImeRegistrationPeer::PASSPORT_NUMBER => 4, ImeRegistrationPeer::NATIONALITY => 5, ImeRegistrationPeer::MOBILE_NO => 6, ImeRegistrationPeer::EMAIL => 7, ImeRegistrationPeer::DIST_ID => 8, ImeRegistrationPeer::ACCOUNT_ID => 9, ImeRegistrationPeer::ACCOUNT_TYPE => 10, ImeRegistrationPeer::QTY => 11, ImeRegistrationPeer::SUB_TOTAL => 12, ImeRegistrationPeer::STATUS_CODE => 13, ImeRegistrationPeer::CREATED_BY => 14, ImeRegistrationPeer::CREATED_ON => 15, ImeRegistrationPeer::UPDATED_BY => 16, ImeRegistrationPeer::UPDATED_ON => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('ime_id' => 0, 'full_name' => 1, 'full_name_chinese' => 2, 'distributor_code' => 3, 'passport_number' => 4, 'nationality' => 5, 'mobile_no' => 6, 'email' => 7, 'dist_id' => 8, 'account_id' => 9, 'account_type' => 10, 'qty' => 11, 'sub_total' => 12, 'status_code' => 13, 'created_by' => 14, 'created_on' => 15, 'updated_by' => 16, 'updated_on' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ImeRegistrationMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ImeRegistrationMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ImeRegistrationPeer::getTableMap();
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
		return str_replace(ImeRegistrationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ImeRegistrationPeer::IME_ID);

		$criteria->addSelectColumn(ImeRegistrationPeer::FULL_NAME);

		$criteria->addSelectColumn(ImeRegistrationPeer::FULL_NAME_CHINESE);

		$criteria->addSelectColumn(ImeRegistrationPeer::DISTRIBUTOR_CODE);

		$criteria->addSelectColumn(ImeRegistrationPeer::PASSPORT_NUMBER);

		$criteria->addSelectColumn(ImeRegistrationPeer::NATIONALITY);

		$criteria->addSelectColumn(ImeRegistrationPeer::MOBILE_NO);

		$criteria->addSelectColumn(ImeRegistrationPeer::EMAIL);

		$criteria->addSelectColumn(ImeRegistrationPeer::DIST_ID);

		$criteria->addSelectColumn(ImeRegistrationPeer::ACCOUNT_ID);

		$criteria->addSelectColumn(ImeRegistrationPeer::ACCOUNT_TYPE);

		$criteria->addSelectColumn(ImeRegistrationPeer::QTY);

		$criteria->addSelectColumn(ImeRegistrationPeer::SUB_TOTAL);

		$criteria->addSelectColumn(ImeRegistrationPeer::STATUS_CODE);

		$criteria->addSelectColumn(ImeRegistrationPeer::CREATED_BY);

		$criteria->addSelectColumn(ImeRegistrationPeer::CREATED_ON);

		$criteria->addSelectColumn(ImeRegistrationPeer::UPDATED_BY);

		$criteria->addSelectColumn(ImeRegistrationPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(ime_registration.IME_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ime_registration.IME_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ImeRegistrationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ImeRegistrationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ImeRegistrationPeer::doSelectRS($criteria, $con);
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
		$objects = ImeRegistrationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ImeRegistrationPeer::populateObjects(ImeRegistrationPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ImeRegistrationPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ImeRegistrationPeer::getOMClass();
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
		return ImeRegistrationPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ImeRegistrationPeer::IME_ID); 

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
			$comparison = $criteria->getComparison(ImeRegistrationPeer::IME_ID);
			$selectCriteria->add(ImeRegistrationPeer::IME_ID, $criteria->remove(ImeRegistrationPeer::IME_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ImeRegistrationPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ImeRegistrationPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ImeRegistration) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ImeRegistrationPeer::IME_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ImeRegistration $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ImeRegistrationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ImeRegistrationPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ImeRegistrationPeer::DATABASE_NAME, ImeRegistrationPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ImeRegistrationPeer::DATABASE_NAME);

		$criteria->add(ImeRegistrationPeer::IME_ID, $pk);


		$v = ImeRegistrationPeer::doSelect($criteria, $con);

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
			$criteria->add(ImeRegistrationPeer::IME_ID, $pks, Criteria::IN);
			$objs = ImeRegistrationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseImeRegistrationPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ImeRegistrationMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ImeRegistrationMapBuilder');
}
