<?php


abstract class BaseMlmMt4DemoRequestPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_mt4_demo_request';

	
	const CLASS_DEFAULT = 'lib.model.MlmMt4DemoRequest';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REQUEST_ID = 'mlm_mt4_demo_request.REQUEST_ID';

	
	const FIRST_NAME = 'mlm_mt4_demo_request.FIRST_NAME';

	
	const EMAIL = 'mlm_mt4_demo_request.EMAIL';

	
	const STATUS_CODE = 'mlm_mt4_demo_request.STATUS_CODE';

	
	const CREATED_BY = 'mlm_mt4_demo_request.CREATED_BY';

	
	const CREATED_ON = 'mlm_mt4_demo_request.CREATED_ON';

	
	const UPDATED_BY = 'mlm_mt4_demo_request.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_mt4_demo_request.UPDATED_ON';

	
	const COUNTRY = 'mlm_mt4_demo_request.COUNTRY';

	
	const PHONE_NUMBER = 'mlm_mt4_demo_request.PHONE_NUMBER';

	
	const LAST_NAME = 'mlm_mt4_demo_request.LAST_NAME';

	
	const TITLE = 'mlm_mt4_demo_request.TITLE';

	
	const LIVE_DEMO = 'mlm_mt4_demo_request.LIVE_DEMO';

	
	const ADDRESS1 = 'mlm_mt4_demo_request.ADDRESS1';

	
	const ADDRESS2 = 'mlm_mt4_demo_request.ADDRESS2';

	
	const AGREE_OF_BUSINESS = 'mlm_mt4_demo_request.AGREE_OF_BUSINESS';

	
	const RISK_DISCLOSURE = 'mlm_mt4_demo_request.RISK_DISCLOSURE';

	
	const COUNTRY_OF_CITIZEN = 'mlm_mt4_demo_request.COUNTRY_OF_CITIZEN';

	
	const DOB_DAY = 'mlm_mt4_demo_request.DOB_DAY';

	
	const DOB_MONTH = 'mlm_mt4_demo_request.DOB_MONTH';

	
	const DOB_YEAR = 'mlm_mt4_demo_request.DOB_YEAR';

	
	const REF_ID = 'mlm_mt4_demo_request.REF_ID';

	
	const PASSPORT = 'mlm_mt4_demo_request.PASSPORT';

	
	const SUBJECT = 'mlm_mt4_demo_request.SUBJECT';

	
	const CITY = 'mlm_mt4_demo_request.CITY';

	
	const ADDRESS_STATE = 'mlm_mt4_demo_request.ADDRESS_STATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RequestId', 'FirstName', 'Email', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', 'Country', 'PhoneNumber', 'LastName', 'Title', 'LiveDemo', 'Address1', 'Address2', 'AgreeOfBusiness', 'RiskDisclosure', 'CountryOfCitizen', 'DobDay', 'DobMonth', 'DobYear', 'RefId', 'Passport', 'Subject', 'City', 'AddressState', ),
		BasePeer::TYPE_COLNAME => array (MlmMt4DemoRequestPeer::REQUEST_ID, MlmMt4DemoRequestPeer::FIRST_NAME, MlmMt4DemoRequestPeer::EMAIL, MlmMt4DemoRequestPeer::STATUS_CODE, MlmMt4DemoRequestPeer::CREATED_BY, MlmMt4DemoRequestPeer::CREATED_ON, MlmMt4DemoRequestPeer::UPDATED_BY, MlmMt4DemoRequestPeer::UPDATED_ON, MlmMt4DemoRequestPeer::COUNTRY, MlmMt4DemoRequestPeer::PHONE_NUMBER, MlmMt4DemoRequestPeer::LAST_NAME, MlmMt4DemoRequestPeer::TITLE, MlmMt4DemoRequestPeer::LIVE_DEMO, MlmMt4DemoRequestPeer::ADDRESS1, MlmMt4DemoRequestPeer::ADDRESS2, MlmMt4DemoRequestPeer::AGREE_OF_BUSINESS, MlmMt4DemoRequestPeer::RISK_DISCLOSURE, MlmMt4DemoRequestPeer::COUNTRY_OF_CITIZEN, MlmMt4DemoRequestPeer::DOB_DAY, MlmMt4DemoRequestPeer::DOB_MONTH, MlmMt4DemoRequestPeer::DOB_YEAR, MlmMt4DemoRequestPeer::REF_ID, MlmMt4DemoRequestPeer::PASSPORT, MlmMt4DemoRequestPeer::SUBJECT, MlmMt4DemoRequestPeer::CITY, MlmMt4DemoRequestPeer::ADDRESS_STATE, ),
		BasePeer::TYPE_FIELDNAME => array ('request_id', 'first_name', 'email', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', 'country', 'phone_number', 'last_name', 'title', 'live_demo', 'address1', 'address2', 'agree_of_business', 'risk_disclosure', 'country_of_citizen', 'dob_day', 'dob_month', 'dob_year', 'ref_id', 'passport', 'subject', 'city', 'address_state', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RequestId' => 0, 'FirstName' => 1, 'Email' => 2, 'StatusCode' => 3, 'CreatedBy' => 4, 'CreatedOn' => 5, 'UpdatedBy' => 6, 'UpdatedOn' => 7, 'Country' => 8, 'PhoneNumber' => 9, 'LastName' => 10, 'Title' => 11, 'LiveDemo' => 12, 'Address1' => 13, 'Address2' => 14, 'AgreeOfBusiness' => 15, 'RiskDisclosure' => 16, 'CountryOfCitizen' => 17, 'DobDay' => 18, 'DobMonth' => 19, 'DobYear' => 20, 'RefId' => 21, 'Passport' => 22, 'Subject' => 23, 'City' => 24, 'AddressState' => 25, ),
		BasePeer::TYPE_COLNAME => array (MlmMt4DemoRequestPeer::REQUEST_ID => 0, MlmMt4DemoRequestPeer::FIRST_NAME => 1, MlmMt4DemoRequestPeer::EMAIL => 2, MlmMt4DemoRequestPeer::STATUS_CODE => 3, MlmMt4DemoRequestPeer::CREATED_BY => 4, MlmMt4DemoRequestPeer::CREATED_ON => 5, MlmMt4DemoRequestPeer::UPDATED_BY => 6, MlmMt4DemoRequestPeer::UPDATED_ON => 7, MlmMt4DemoRequestPeer::COUNTRY => 8, MlmMt4DemoRequestPeer::PHONE_NUMBER => 9, MlmMt4DemoRequestPeer::LAST_NAME => 10, MlmMt4DemoRequestPeer::TITLE => 11, MlmMt4DemoRequestPeer::LIVE_DEMO => 12, MlmMt4DemoRequestPeer::ADDRESS1 => 13, MlmMt4DemoRequestPeer::ADDRESS2 => 14, MlmMt4DemoRequestPeer::AGREE_OF_BUSINESS => 15, MlmMt4DemoRequestPeer::RISK_DISCLOSURE => 16, MlmMt4DemoRequestPeer::COUNTRY_OF_CITIZEN => 17, MlmMt4DemoRequestPeer::DOB_DAY => 18, MlmMt4DemoRequestPeer::DOB_MONTH => 19, MlmMt4DemoRequestPeer::DOB_YEAR => 20, MlmMt4DemoRequestPeer::REF_ID => 21, MlmMt4DemoRequestPeer::PASSPORT => 22, MlmMt4DemoRequestPeer::SUBJECT => 23, MlmMt4DemoRequestPeer::CITY => 24, MlmMt4DemoRequestPeer::ADDRESS_STATE => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('request_id' => 0, 'first_name' => 1, 'email' => 2, 'status_code' => 3, 'created_by' => 4, 'created_on' => 5, 'updated_by' => 6, 'updated_on' => 7, 'country' => 8, 'phone_number' => 9, 'last_name' => 10, 'title' => 11, 'live_demo' => 12, 'address1' => 13, 'address2' => 14, 'agree_of_business' => 15, 'risk_disclosure' => 16, 'country_of_citizen' => 17, 'dob_day' => 18, 'dob_month' => 19, 'dob_year' => 20, 'ref_id' => 21, 'passport' => 22, 'subject' => 23, 'city' => 24, 'address_state' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmMt4DemoRequestMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmMt4DemoRequestMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmMt4DemoRequestPeer::getTableMap();
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
		return str_replace(MlmMt4DemoRequestPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::REQUEST_ID);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::FIRST_NAME);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::EMAIL);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::UPDATED_ON);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::COUNTRY);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::PHONE_NUMBER);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::LAST_NAME);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::TITLE);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::LIVE_DEMO);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::ADDRESS1);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::ADDRESS2);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::AGREE_OF_BUSINESS);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::RISK_DISCLOSURE);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::COUNTRY_OF_CITIZEN);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::DOB_DAY);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::DOB_MONTH);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::DOB_YEAR);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::REF_ID);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::PASSPORT);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::SUBJECT);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::CITY);

		$criteria->addSelectColumn(MlmMt4DemoRequestPeer::ADDRESS_STATE);

	}

	const COUNT = 'COUNT(mlm_mt4_demo_request.REQUEST_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_mt4_demo_request.REQUEST_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmMt4DemoRequestPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmMt4DemoRequestPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmMt4DemoRequestPeer::doSelectRS($criteria, $con);
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
		$objects = MlmMt4DemoRequestPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmMt4DemoRequestPeer::populateObjects(MlmMt4DemoRequestPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmMt4DemoRequestPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmMt4DemoRequestPeer::getOMClass();
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
		return MlmMt4DemoRequestPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmMt4DemoRequestPeer::REQUEST_ID); 

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
			$comparison = $criteria->getComparison(MlmMt4DemoRequestPeer::REQUEST_ID);
			$selectCriteria->add(MlmMt4DemoRequestPeer::REQUEST_ID, $criteria->remove(MlmMt4DemoRequestPeer::REQUEST_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmMt4DemoRequestPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmMt4DemoRequestPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmMt4DemoRequest) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmMt4DemoRequestPeer::REQUEST_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmMt4DemoRequest $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmMt4DemoRequestPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmMt4DemoRequestPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmMt4DemoRequestPeer::DATABASE_NAME, MlmMt4DemoRequestPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmMt4DemoRequestPeer::DATABASE_NAME);

		$criteria->add(MlmMt4DemoRequestPeer::REQUEST_ID, $pk);


		$v = MlmMt4DemoRequestPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmMt4DemoRequestPeer::REQUEST_ID, $pks, Criteria::IN);
			$objs = MlmMt4DemoRequestPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmMt4DemoRequestPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmMt4DemoRequestMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmMt4DemoRequestMapBuilder');
}
