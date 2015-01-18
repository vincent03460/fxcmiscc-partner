<?php


abstract class BaseTuneDistributorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tune_distributor';

	
	const CLASS_DEFAULT = 'lib.model.TuneDistributor';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DISTRIBUTOR_ID = 'tune_distributor.DISTRIBUTOR_ID';

	
	const DISTRIBUTOR_CODE = 'tune_distributor.DISTRIBUTOR_CODE';

	
	const USER_ID = 'tune_distributor.USER_ID';

	
	const STATUS_CODE = 'tune_distributor.STATUS_CODE';

	
	const FULL_NAME = 'tune_distributor.FULL_NAME';

	
	const NICKNAME = 'tune_distributor.NICKNAME';

	
	const IC = 'tune_distributor.IC';

	
	const COUNTRY = 'tune_distributor.COUNTRY';

	
	const ADDRESS = 'tune_distributor.ADDRESS';

	
	const POSTCODE = 'tune_distributor.POSTCODE';

	
	const EMAIL = 'tune_distributor.EMAIL';

	
	const CONTACT = 'tune_distributor.CONTACT';

	
	const GENDER = 'tune_distributor.GENDER';

	
	const DOB = 'tune_distributor.DOB';

	
	const BANK_NAME = 'tune_distributor.BANK_NAME';

	
	const BANK_ACC_NO = 'tune_distributor.BANK_ACC_NO';

	
	const BANK_HOLDER_NAME = 'tune_distributor.BANK_HOLDER_NAME';

	
	const PARENT_ID = 'tune_distributor.PARENT_ID';

	
	const TOTAL_LEFT = 'tune_distributor.TOTAL_LEFT';

	
	const TOTAL_RIGHT = 'tune_distributor.TOTAL_RIGHT';

	
	const TREE_LEVEL = 'tune_distributor.TREE_LEVEL';

	
	const TREE_STRUCTURE = 'tune_distributor.TREE_STRUCTURE';

	
	const UPLINE_DIST_ID = 'tune_distributor.UPLINE_DIST_ID';

	
	const PLACEMENT_DATETIME = 'tune_distributor.PLACEMENT_DATETIME';

	
	const ACTIVE_DATETIME = 'tune_distributor.ACTIVE_DATETIME';

	
	const CREATED_BY = 'tune_distributor.CREATED_BY';

	
	const CREATED_ON = 'tune_distributor.CREATED_ON';

	
	const UPDATED_BY = 'tune_distributor.UPDATED_BY';

	
	const UPDATED_ON = 'tune_distributor.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DistributorId', 'DistributorCode', 'UserId', 'StatusCode', 'FullName', 'Nickname', 'Ic', 'Country', 'Address', 'Postcode', 'Email', 'Contact', 'Gender', 'Dob', 'BankName', 'BankAccNo', 'BankHolderName', 'ParentId', 'TotalLeft', 'TotalRight', 'TreeLevel', 'TreeStructure', 'UplineDistId', 'PlacementDatetime', 'ActiveDatetime', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (TuneDistributorPeer::DISTRIBUTOR_ID, TuneDistributorPeer::DISTRIBUTOR_CODE, TuneDistributorPeer::USER_ID, TuneDistributorPeer::STATUS_CODE, TuneDistributorPeer::FULL_NAME, TuneDistributorPeer::NICKNAME, TuneDistributorPeer::IC, TuneDistributorPeer::COUNTRY, TuneDistributorPeer::ADDRESS, TuneDistributorPeer::POSTCODE, TuneDistributorPeer::EMAIL, TuneDistributorPeer::CONTACT, TuneDistributorPeer::GENDER, TuneDistributorPeer::DOB, TuneDistributorPeer::BANK_NAME, TuneDistributorPeer::BANK_ACC_NO, TuneDistributorPeer::BANK_HOLDER_NAME, TuneDistributorPeer::PARENT_ID, TuneDistributorPeer::TOTAL_LEFT, TuneDistributorPeer::TOTAL_RIGHT, TuneDistributorPeer::TREE_LEVEL, TuneDistributorPeer::TREE_STRUCTURE, TuneDistributorPeer::UPLINE_DIST_ID, TuneDistributorPeer::PLACEMENT_DATETIME, TuneDistributorPeer::ACTIVE_DATETIME, TuneDistributorPeer::CREATED_BY, TuneDistributorPeer::CREATED_ON, TuneDistributorPeer::UPDATED_BY, TuneDistributorPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('distributor_id', 'distributor_code', 'user_id', 'status_code', 'full_name', 'nickname', 'ic', 'country', 'address', 'postcode', 'email', 'contact', 'gender', 'dob', 'bank_name', 'bank_acc_no', 'bank_holder_name', 'parent_id', 'total_left', 'total_right', 'tree_level', 'tree_structure', 'upline_dist_id', 'placement_datetime', 'active_datetime', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DistributorId' => 0, 'DistributorCode' => 1, 'UserId' => 2, 'StatusCode' => 3, 'FullName' => 4, 'Nickname' => 5, 'Ic' => 6, 'Country' => 7, 'Address' => 8, 'Postcode' => 9, 'Email' => 10, 'Contact' => 11, 'Gender' => 12, 'Dob' => 13, 'BankName' => 14, 'BankAccNo' => 15, 'BankHolderName' => 16, 'ParentId' => 17, 'TotalLeft' => 18, 'TotalRight' => 19, 'TreeLevel' => 20, 'TreeStructure' => 21, 'UplineDistId' => 22, 'PlacementDatetime' => 23, 'ActiveDatetime' => 24, 'CreatedBy' => 25, 'CreatedOn' => 26, 'UpdatedBy' => 27, 'UpdatedOn' => 28, ),
		BasePeer::TYPE_COLNAME => array (TuneDistributorPeer::DISTRIBUTOR_ID => 0, TuneDistributorPeer::DISTRIBUTOR_CODE => 1, TuneDistributorPeer::USER_ID => 2, TuneDistributorPeer::STATUS_CODE => 3, TuneDistributorPeer::FULL_NAME => 4, TuneDistributorPeer::NICKNAME => 5, TuneDistributorPeer::IC => 6, TuneDistributorPeer::COUNTRY => 7, TuneDistributorPeer::ADDRESS => 8, TuneDistributorPeer::POSTCODE => 9, TuneDistributorPeer::EMAIL => 10, TuneDistributorPeer::CONTACT => 11, TuneDistributorPeer::GENDER => 12, TuneDistributorPeer::DOB => 13, TuneDistributorPeer::BANK_NAME => 14, TuneDistributorPeer::BANK_ACC_NO => 15, TuneDistributorPeer::BANK_HOLDER_NAME => 16, TuneDistributorPeer::PARENT_ID => 17, TuneDistributorPeer::TOTAL_LEFT => 18, TuneDistributorPeer::TOTAL_RIGHT => 19, TuneDistributorPeer::TREE_LEVEL => 20, TuneDistributorPeer::TREE_STRUCTURE => 21, TuneDistributorPeer::UPLINE_DIST_ID => 22, TuneDistributorPeer::PLACEMENT_DATETIME => 23, TuneDistributorPeer::ACTIVE_DATETIME => 24, TuneDistributorPeer::CREATED_BY => 25, TuneDistributorPeer::CREATED_ON => 26, TuneDistributorPeer::UPDATED_BY => 27, TuneDistributorPeer::UPDATED_ON => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('distributor_id' => 0, 'distributor_code' => 1, 'user_id' => 2, 'status_code' => 3, 'full_name' => 4, 'nickname' => 5, 'ic' => 6, 'country' => 7, 'address' => 8, 'postcode' => 9, 'email' => 10, 'contact' => 11, 'gender' => 12, 'dob' => 13, 'bank_name' => 14, 'bank_acc_no' => 15, 'bank_holder_name' => 16, 'parent_id' => 17, 'total_left' => 18, 'total_right' => 19, 'tree_level' => 20, 'tree_structure' => 21, 'upline_dist_id' => 22, 'placement_datetime' => 23, 'active_datetime' => 24, 'created_by' => 25, 'created_on' => 26, 'updated_by' => 27, 'updated_on' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TuneDistributorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TuneDistributorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TuneDistributorPeer::getTableMap();
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
		return str_replace(TuneDistributorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TuneDistributorPeer::DISTRIBUTOR_ID);

		$criteria->addSelectColumn(TuneDistributorPeer::DISTRIBUTOR_CODE);

		$criteria->addSelectColumn(TuneDistributorPeer::USER_ID);

		$criteria->addSelectColumn(TuneDistributorPeer::STATUS_CODE);

		$criteria->addSelectColumn(TuneDistributorPeer::FULL_NAME);

		$criteria->addSelectColumn(TuneDistributorPeer::NICKNAME);

		$criteria->addSelectColumn(TuneDistributorPeer::IC);

		$criteria->addSelectColumn(TuneDistributorPeer::COUNTRY);

		$criteria->addSelectColumn(TuneDistributorPeer::ADDRESS);

		$criteria->addSelectColumn(TuneDistributorPeer::POSTCODE);

		$criteria->addSelectColumn(TuneDistributorPeer::EMAIL);

		$criteria->addSelectColumn(TuneDistributorPeer::CONTACT);

		$criteria->addSelectColumn(TuneDistributorPeer::GENDER);

		$criteria->addSelectColumn(TuneDistributorPeer::DOB);

		$criteria->addSelectColumn(TuneDistributorPeer::BANK_NAME);

		$criteria->addSelectColumn(TuneDistributorPeer::BANK_ACC_NO);

		$criteria->addSelectColumn(TuneDistributorPeer::BANK_HOLDER_NAME);

		$criteria->addSelectColumn(TuneDistributorPeer::PARENT_ID);

		$criteria->addSelectColumn(TuneDistributorPeer::TOTAL_LEFT);

		$criteria->addSelectColumn(TuneDistributorPeer::TOTAL_RIGHT);

		$criteria->addSelectColumn(TuneDistributorPeer::TREE_LEVEL);

		$criteria->addSelectColumn(TuneDistributorPeer::TREE_STRUCTURE);

		$criteria->addSelectColumn(TuneDistributorPeer::UPLINE_DIST_ID);

		$criteria->addSelectColumn(TuneDistributorPeer::PLACEMENT_DATETIME);

		$criteria->addSelectColumn(TuneDistributorPeer::ACTIVE_DATETIME);

		$criteria->addSelectColumn(TuneDistributorPeer::CREATED_BY);

		$criteria->addSelectColumn(TuneDistributorPeer::CREATED_ON);

		$criteria->addSelectColumn(TuneDistributorPeer::UPDATED_BY);

		$criteria->addSelectColumn(TuneDistributorPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(tune_distributor.DISTRIBUTOR_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tune_distributor.DISTRIBUTOR_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TuneDistributorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TuneDistributorPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TuneDistributorPeer::doSelectRS($criteria, $con);
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
		$objects = TuneDistributorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TuneDistributorPeer::populateObjects(TuneDistributorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TuneDistributorPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = TuneDistributorPeer::getOMClass();
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
		return TuneDistributorPeer::CLASS_DEFAULT;
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

		$criteria->remove(TuneDistributorPeer::DISTRIBUTOR_ID); 


		
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

			$comparison = $criteria->getComparison(TuneDistributorPeer::DISTRIBUTOR_ID);
			$selectCriteria->add(TuneDistributorPeer::DISTRIBUTOR_ID, $criteria->remove(TuneDistributorPeer::DISTRIBUTOR_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TuneDistributorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TuneDistributorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof TuneDistributor) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TuneDistributorPeer::DISTRIBUTOR_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TuneDistributor $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TuneDistributorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TuneDistributorPeer::TABLE_NAME);

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

		return BasePeer::doValidate(TuneDistributorPeer::DATABASE_NAME, TuneDistributorPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(TuneDistributorPeer::DATABASE_NAME);

		$criteria->add(TuneDistributorPeer::DISTRIBUTOR_ID, $pk);


		$v = TuneDistributorPeer::doSelect($criteria, $con);

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
			$criteria->add(TuneDistributorPeer::DISTRIBUTOR_ID, $pks, Criteria::IN);
			$objs = TuneDistributorPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseTuneDistributorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/TuneDistributorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TuneDistributorMapBuilder');
}
