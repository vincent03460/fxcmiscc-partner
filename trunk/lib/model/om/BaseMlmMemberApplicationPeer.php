<?php


abstract class BaseMlmMemberApplicationPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_member_application';

	
	const CLASS_DEFAULT = 'lib.model.MlmMemberApplication';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MEMBER_ID = 'mlm_member_application.MEMBER_ID';

	
	const FULL_NAME = 'mlm_member_application.FULL_NAME';

	
	const EMAIL = 'mlm_member_application.EMAIL';

	
	const CONTACT = 'mlm_member_application.CONTACT';

	
	const QQ = 'mlm_member_application.QQ';

	
	const GENDER = 'mlm_member_application.GENDER';

	
	const COUNTRY = 'mlm_member_application.COUNTRY';

	
	const DOB = 'mlm_member_application.DOB';

	
	const STATUS_CODE = 'mlm_member_application.STATUS_CODE';

	
	const CREATED_BY = 'mlm_member_application.CREATED_BY';

	
	const CREATED_ON = 'mlm_member_application.CREATED_ON';

	
	const UPDATED_BY = 'mlm_member_application.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_member_application.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MemberId', 'FullName', 'Email', 'Contact', 'Qq', 'Gender', 'Country', 'Dob', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmMemberApplicationPeer::MEMBER_ID, MlmMemberApplicationPeer::FULL_NAME, MlmMemberApplicationPeer::EMAIL, MlmMemberApplicationPeer::CONTACT, MlmMemberApplicationPeer::QQ, MlmMemberApplicationPeer::GENDER, MlmMemberApplicationPeer::COUNTRY, MlmMemberApplicationPeer::DOB, MlmMemberApplicationPeer::STATUS_CODE, MlmMemberApplicationPeer::CREATED_BY, MlmMemberApplicationPeer::CREATED_ON, MlmMemberApplicationPeer::UPDATED_BY, MlmMemberApplicationPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('member_id', 'full_name', 'email', 'contact', 'qq', 'gender', 'country', 'dob', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MemberId' => 0, 'FullName' => 1, 'Email' => 2, 'Contact' => 3, 'Qq' => 4, 'Gender' => 5, 'Country' => 6, 'Dob' => 7, 'StatusCode' => 8, 'CreatedBy' => 9, 'CreatedOn' => 10, 'UpdatedBy' => 11, 'UpdatedOn' => 12, ),
		BasePeer::TYPE_COLNAME => array (MlmMemberApplicationPeer::MEMBER_ID => 0, MlmMemberApplicationPeer::FULL_NAME => 1, MlmMemberApplicationPeer::EMAIL => 2, MlmMemberApplicationPeer::CONTACT => 3, MlmMemberApplicationPeer::QQ => 4, MlmMemberApplicationPeer::GENDER => 5, MlmMemberApplicationPeer::COUNTRY => 6, MlmMemberApplicationPeer::DOB => 7, MlmMemberApplicationPeer::STATUS_CODE => 8, MlmMemberApplicationPeer::CREATED_BY => 9, MlmMemberApplicationPeer::CREATED_ON => 10, MlmMemberApplicationPeer::UPDATED_BY => 11, MlmMemberApplicationPeer::UPDATED_ON => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('member_id' => 0, 'full_name' => 1, 'email' => 2, 'contact' => 3, 'qq' => 4, 'gender' => 5, 'country' => 6, 'dob' => 7, 'status_code' => 8, 'created_by' => 9, 'created_on' => 10, 'updated_by' => 11, 'updated_on' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmMemberApplicationMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmMemberApplicationMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmMemberApplicationPeer::getTableMap();
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
		return str_replace(MlmMemberApplicationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmMemberApplicationPeer::MEMBER_ID);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::FULL_NAME);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::EMAIL);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::CONTACT);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::QQ);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::GENDER);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::COUNTRY);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::DOB);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmMemberApplicationPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_member_application.MEMBER_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_member_application.MEMBER_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmMemberApplicationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmMemberApplicationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmMemberApplicationPeer::doSelectRS($criteria, $con);
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
		$objects = MlmMemberApplicationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmMemberApplicationPeer::populateObjects(MlmMemberApplicationPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmMemberApplicationPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmMemberApplicationPeer::getOMClass();
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
		return MlmMemberApplicationPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmMemberApplicationPeer::MEMBER_ID); 

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
			$comparison = $criteria->getComparison(MlmMemberApplicationPeer::MEMBER_ID);
			$selectCriteria->add(MlmMemberApplicationPeer::MEMBER_ID, $criteria->remove(MlmMemberApplicationPeer::MEMBER_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmMemberApplicationPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmMemberApplicationPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmMemberApplication) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmMemberApplicationPeer::MEMBER_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmMemberApplication $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmMemberApplicationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmMemberApplicationPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmMemberApplicationPeer::DATABASE_NAME, MlmMemberApplicationPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmMemberApplicationPeer::DATABASE_NAME);

		$criteria->add(MlmMemberApplicationPeer::MEMBER_ID, $pk);


		$v = MlmMemberApplicationPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmMemberApplicationPeer::MEMBER_ID, $pks, Criteria::IN);
			$objs = MlmMemberApplicationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmMemberApplicationPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmMemberApplicationMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmMemberApplicationMapBuilder');
}
