<?php


abstract class BaseMlmPackageContractPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_package_contract';

	
	const CLASS_DEFAULT = 'lib.model.MlmPackageContract';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CONTRACT_ID = 'mlm_package_contract.CONTRACT_ID';

	
	const DIST_ID = 'mlm_package_contract.DIST_ID';

	
	const FULL_NAME = 'mlm_package_contract.FULL_NAME';

	
	const USERNAME = 'mlm_package_contract.USERNAME';

	
	const MT4_ID = 'mlm_package_contract.MT4_ID';

	
	const DIST_MT4_ID = 'mlm_package_contract.DIST_MT4_ID';

	
	const PACKAGE_PRICE = 'mlm_package_contract.PACKAGE_PRICE';

	
	const SIGN_DATE_DAY = 'mlm_package_contract.SIGN_DATE_DAY';

	
	const SIGN_DATE_MONTH = 'mlm_package_contract.SIGN_DATE_MONTH';

	
	const SIGN_DATE_YEAR = 'mlm_package_contract.SIGN_DATE_YEAR';

	
	const INITIAL_SIGNATURE = 'mlm_package_contract.INITIAL_SIGNATURE';

	
	const REMARKS = 'mlm_package_contract.REMARKS';

	
	const STATUS_CODE = 'mlm_package_contract.STATUS_CODE';

	
	const CREATED_BY = 'mlm_package_contract.CREATED_BY';

	
	const CREATED_ON = 'mlm_package_contract.CREATED_ON';

	
	const UPDATED_BY = 'mlm_package_contract.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_package_contract.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ContractId', 'DistId', 'FullName', 'Username', 'Mt4Id', 'DistMt4Id', 'PackagePrice', 'SignDateDay', 'SignDateMonth', 'SignDateYear', 'InitialSignature', 'Remarks', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmPackageContractPeer::CONTRACT_ID, MlmPackageContractPeer::DIST_ID, MlmPackageContractPeer::FULL_NAME, MlmPackageContractPeer::USERNAME, MlmPackageContractPeer::MT4_ID, MlmPackageContractPeer::DIST_MT4_ID, MlmPackageContractPeer::PACKAGE_PRICE, MlmPackageContractPeer::SIGN_DATE_DAY, MlmPackageContractPeer::SIGN_DATE_MONTH, MlmPackageContractPeer::SIGN_DATE_YEAR, MlmPackageContractPeer::INITIAL_SIGNATURE, MlmPackageContractPeer::REMARKS, MlmPackageContractPeer::STATUS_CODE, MlmPackageContractPeer::CREATED_BY, MlmPackageContractPeer::CREATED_ON, MlmPackageContractPeer::UPDATED_BY, MlmPackageContractPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('contract_id', 'dist_id', 'full_name', 'username', 'mt4_id', 'dist_mt4_id', 'package_price', 'sign_date_day', 'sign_date_month', 'sign_date_year', 'initial_signature', 'remarks', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ContractId' => 0, 'DistId' => 1, 'FullName' => 2, 'Username' => 3, 'Mt4Id' => 4, 'DistMt4Id' => 5, 'PackagePrice' => 6, 'SignDateDay' => 7, 'SignDateMonth' => 8, 'SignDateYear' => 9, 'InitialSignature' => 10, 'Remarks' => 11, 'StatusCode' => 12, 'CreatedBy' => 13, 'CreatedOn' => 14, 'UpdatedBy' => 15, 'UpdatedOn' => 16, ),
		BasePeer::TYPE_COLNAME => array (MlmPackageContractPeer::CONTRACT_ID => 0, MlmPackageContractPeer::DIST_ID => 1, MlmPackageContractPeer::FULL_NAME => 2, MlmPackageContractPeer::USERNAME => 3, MlmPackageContractPeer::MT4_ID => 4, MlmPackageContractPeer::DIST_MT4_ID => 5, MlmPackageContractPeer::PACKAGE_PRICE => 6, MlmPackageContractPeer::SIGN_DATE_DAY => 7, MlmPackageContractPeer::SIGN_DATE_MONTH => 8, MlmPackageContractPeer::SIGN_DATE_YEAR => 9, MlmPackageContractPeer::INITIAL_SIGNATURE => 10, MlmPackageContractPeer::REMARKS => 11, MlmPackageContractPeer::STATUS_CODE => 12, MlmPackageContractPeer::CREATED_BY => 13, MlmPackageContractPeer::CREATED_ON => 14, MlmPackageContractPeer::UPDATED_BY => 15, MlmPackageContractPeer::UPDATED_ON => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('contract_id' => 0, 'dist_id' => 1, 'full_name' => 2, 'username' => 3, 'mt4_id' => 4, 'dist_mt4_id' => 5, 'package_price' => 6, 'sign_date_day' => 7, 'sign_date_month' => 8, 'sign_date_year' => 9, 'initial_signature' => 10, 'remarks' => 11, 'status_code' => 12, 'created_by' => 13, 'created_on' => 14, 'updated_by' => 15, 'updated_on' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPackageContractMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPackageContractMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPackageContractPeer::getTableMap();
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
		return str_replace(MlmPackageContractPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPackageContractPeer::CONTRACT_ID);

		$criteria->addSelectColumn(MlmPackageContractPeer::DIST_ID);

		$criteria->addSelectColumn(MlmPackageContractPeer::FULL_NAME);

		$criteria->addSelectColumn(MlmPackageContractPeer::USERNAME);

		$criteria->addSelectColumn(MlmPackageContractPeer::MT4_ID);

		$criteria->addSelectColumn(MlmPackageContractPeer::DIST_MT4_ID);

		$criteria->addSelectColumn(MlmPackageContractPeer::PACKAGE_PRICE);

		$criteria->addSelectColumn(MlmPackageContractPeer::SIGN_DATE_DAY);

		$criteria->addSelectColumn(MlmPackageContractPeer::SIGN_DATE_MONTH);

		$criteria->addSelectColumn(MlmPackageContractPeer::SIGN_DATE_YEAR);

		$criteria->addSelectColumn(MlmPackageContractPeer::INITIAL_SIGNATURE);

		$criteria->addSelectColumn(MlmPackageContractPeer::REMARKS);

		$criteria->addSelectColumn(MlmPackageContractPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmPackageContractPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPackageContractPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPackageContractPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPackageContractPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_package_contract.CONTRACT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_package_contract.CONTRACT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPackageContractPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPackageContractPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPackageContractPeer::doSelectRS($criteria, $con);
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
		$objects = MlmPackageContractPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPackageContractPeer::populateObjects(MlmPackageContractPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPackageContractPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmPackageContractPeer::getOMClass();
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
		return MlmPackageContractPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmPackageContractPeer::CONTRACT_ID); 

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
			$comparison = $criteria->getComparison(MlmPackageContractPeer::CONTRACT_ID);
			$selectCriteria->add(MlmPackageContractPeer::CONTRACT_ID, $criteria->remove(MlmPackageContractPeer::CONTRACT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmPackageContractPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPackageContractPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmPackageContract) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPackageContractPeer::CONTRACT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPackageContract $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPackageContractPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPackageContractPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPackageContractPeer::DATABASE_NAME, MlmPackageContractPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPackageContractPeer::DATABASE_NAME);

		$criteria->add(MlmPackageContractPeer::CONTRACT_ID, $pk);


		$v = MlmPackageContractPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPackageContractPeer::CONTRACT_ID, $pks, Criteria::IN);
			$objs = MlmPackageContractPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmPackageContractPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmPackageContractMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPackageContractMapBuilder');
}
