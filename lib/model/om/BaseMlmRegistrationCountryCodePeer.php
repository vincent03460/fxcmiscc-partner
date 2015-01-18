<?php


abstract class BaseMlmRegistrationCountryCodePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_registration_country_code';

	
	const CLASS_DEFAULT = 'lib.model.MlmRegistrationCountryCode';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const COUNTRY_ID = 'mlm_registration_country_code.COUNTRY_ID';

	
	const COUNTRY_NAME = 'mlm_registration_country_code.COUNTRY_NAME';

	
	const PREFIX = 'mlm_registration_country_code.PREFIX';

	
	const CREATED_BY = 'mlm_registration_country_code.CREATED_BY';

	
	const CREATED_ON = 'mlm_registration_country_code.CREATED_ON';

	
	const UPDATED_BY = 'mlm_registration_country_code.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_registration_country_code.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CountryId', 'CountryName', 'Prefix', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmRegistrationCountryCodePeer::COUNTRY_ID, MlmRegistrationCountryCodePeer::COUNTRY_NAME, MlmRegistrationCountryCodePeer::PREFIX, MlmRegistrationCountryCodePeer::CREATED_BY, MlmRegistrationCountryCodePeer::CREATED_ON, MlmRegistrationCountryCodePeer::UPDATED_BY, MlmRegistrationCountryCodePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('country_id', 'country_name', 'prefix', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CountryId' => 0, 'CountryName' => 1, 'Prefix' => 2, 'CreatedBy' => 3, 'CreatedOn' => 4, 'UpdatedBy' => 5, 'UpdatedOn' => 6, ),
		BasePeer::TYPE_COLNAME => array (MlmRegistrationCountryCodePeer::COUNTRY_ID => 0, MlmRegistrationCountryCodePeer::COUNTRY_NAME => 1, MlmRegistrationCountryCodePeer::PREFIX => 2, MlmRegistrationCountryCodePeer::CREATED_BY => 3, MlmRegistrationCountryCodePeer::CREATED_ON => 4, MlmRegistrationCountryCodePeer::UPDATED_BY => 5, MlmRegistrationCountryCodePeer::UPDATED_ON => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('country_id' => 0, 'country_name' => 1, 'prefix' => 2, 'created_by' => 3, 'created_on' => 4, 'updated_by' => 5, 'updated_on' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmRegistrationCountryCodeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmRegistrationCountryCodeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmRegistrationCountryCodePeer::getTableMap();
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
		return str_replace(MlmRegistrationCountryCodePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::COUNTRY_ID);

		$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::COUNTRY_NAME);

		$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::PREFIX);

		$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_registration_country_code.COUNTRY_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_registration_country_code.COUNTRY_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmRegistrationCountryCodePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmRegistrationCountryCodePeer::doSelectRS($criteria, $con);
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
		$objects = MlmRegistrationCountryCodePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmRegistrationCountryCodePeer::populateObjects(MlmRegistrationCountryCodePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmRegistrationCountryCodePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmRegistrationCountryCodePeer::getOMClass();
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
		return MlmRegistrationCountryCodePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmRegistrationCountryCodePeer::COUNTRY_ID); 

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
			$comparison = $criteria->getComparison(MlmRegistrationCountryCodePeer::COUNTRY_ID);
			$selectCriteria->add(MlmRegistrationCountryCodePeer::COUNTRY_ID, $criteria->remove(MlmRegistrationCountryCodePeer::COUNTRY_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmRegistrationCountryCodePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmRegistrationCountryCodePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmRegistrationCountryCode) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmRegistrationCountryCodePeer::COUNTRY_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmRegistrationCountryCode $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmRegistrationCountryCodePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmRegistrationCountryCodePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmRegistrationCountryCodePeer::DATABASE_NAME, MlmRegistrationCountryCodePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmRegistrationCountryCodePeer::DATABASE_NAME);

		$criteria->add(MlmRegistrationCountryCodePeer::COUNTRY_ID, $pk);


		$v = MlmRegistrationCountryCodePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmRegistrationCountryCodePeer::COUNTRY_ID, $pks, Criteria::IN);
			$objs = MlmRegistrationCountryCodePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmRegistrationCountryCodePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmRegistrationCountryCodeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmRegistrationCountryCodeMapBuilder');
}
