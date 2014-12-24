<?php


abstract class BaseMlmPackageChallengePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_package_challenge';

	
	const CLASS_DEFAULT = 'lib.model.MlmPackageChallenge';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CHALLENGE_ID = 'mlm_package_challenge.CHALLENGE_ID';

	
	const DIST_ID = 'mlm_package_challenge.DIST_ID';

	
	const CHALLENGE_TYPE = 'mlm_package_challenge.CHALLENGE_TYPE';

	
	const DATE_FROM = 'mlm_package_challenge.DATE_FROM';

	
	const DATE_TO = 'mlm_package_challenge.DATE_TO';

	
	const TOTAL_SALES = 'mlm_package_challenge.TOTAL_SALES';

	
	const REMARK = 'mlm_package_challenge.REMARK';

	
	const INTERNAL_REMARK = 'mlm_package_challenge.INTERNAL_REMARK';

	
	const CREATED_BY = 'mlm_package_challenge.CREATED_BY';

	
	const CREATED_ON = 'mlm_package_challenge.CREATED_ON';

	
	const UPDATED_BY = 'mlm_package_challenge.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_package_challenge.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ChallengeId', 'DistId', 'ChallengeType', 'DateFrom', 'DateTo', 'TotalSales', 'Remark', 'InternalRemark', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmPackageChallengePeer::CHALLENGE_ID, MlmPackageChallengePeer::DIST_ID, MlmPackageChallengePeer::CHALLENGE_TYPE, MlmPackageChallengePeer::DATE_FROM, MlmPackageChallengePeer::DATE_TO, MlmPackageChallengePeer::TOTAL_SALES, MlmPackageChallengePeer::REMARK, MlmPackageChallengePeer::INTERNAL_REMARK, MlmPackageChallengePeer::CREATED_BY, MlmPackageChallengePeer::CREATED_ON, MlmPackageChallengePeer::UPDATED_BY, MlmPackageChallengePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('challenge_id', 'dist_id', 'challenge_type', 'date_from', 'date_to', 'total_sales', 'remark', 'internal_remark', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ChallengeId' => 0, 'DistId' => 1, 'ChallengeType' => 2, 'DateFrom' => 3, 'DateTo' => 4, 'TotalSales' => 5, 'Remark' => 6, 'InternalRemark' => 7, 'CreatedBy' => 8, 'CreatedOn' => 9, 'UpdatedBy' => 10, 'UpdatedOn' => 11, ),
		BasePeer::TYPE_COLNAME => array (MlmPackageChallengePeer::CHALLENGE_ID => 0, MlmPackageChallengePeer::DIST_ID => 1, MlmPackageChallengePeer::CHALLENGE_TYPE => 2, MlmPackageChallengePeer::DATE_FROM => 3, MlmPackageChallengePeer::DATE_TO => 4, MlmPackageChallengePeer::TOTAL_SALES => 5, MlmPackageChallengePeer::REMARK => 6, MlmPackageChallengePeer::INTERNAL_REMARK => 7, MlmPackageChallengePeer::CREATED_BY => 8, MlmPackageChallengePeer::CREATED_ON => 9, MlmPackageChallengePeer::UPDATED_BY => 10, MlmPackageChallengePeer::UPDATED_ON => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('challenge_id' => 0, 'dist_id' => 1, 'challenge_type' => 2, 'date_from' => 3, 'date_to' => 4, 'total_sales' => 5, 'remark' => 6, 'internal_remark' => 7, 'created_by' => 8, 'created_on' => 9, 'updated_by' => 10, 'updated_on' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPackageChallengeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPackageChallengeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPackageChallengePeer::getTableMap();
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
		return str_replace(MlmPackageChallengePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPackageChallengePeer::CHALLENGE_ID);

		$criteria->addSelectColumn(MlmPackageChallengePeer::DIST_ID);

		$criteria->addSelectColumn(MlmPackageChallengePeer::CHALLENGE_TYPE);

		$criteria->addSelectColumn(MlmPackageChallengePeer::DATE_FROM);

		$criteria->addSelectColumn(MlmPackageChallengePeer::DATE_TO);

		$criteria->addSelectColumn(MlmPackageChallengePeer::TOTAL_SALES);

		$criteria->addSelectColumn(MlmPackageChallengePeer::REMARK);

		$criteria->addSelectColumn(MlmPackageChallengePeer::INTERNAL_REMARK);

		$criteria->addSelectColumn(MlmPackageChallengePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPackageChallengePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPackageChallengePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPackageChallengePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_package_challenge.CHALLENGE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_package_challenge.CHALLENGE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPackageChallengePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPackageChallengePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPackageChallengePeer::doSelectRS($criteria, $con);
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
		$objects = MlmPackageChallengePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPackageChallengePeer::populateObjects(MlmPackageChallengePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPackageChallengePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmPackageChallengePeer::getOMClass();
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
		return MlmPackageChallengePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmPackageChallengePeer::CHALLENGE_ID); 

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
			$comparison = $criteria->getComparison(MlmPackageChallengePeer::CHALLENGE_ID);
			$selectCriteria->add(MlmPackageChallengePeer::CHALLENGE_ID, $criteria->remove(MlmPackageChallengePeer::CHALLENGE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmPackageChallengePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPackageChallengePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmPackageChallenge) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPackageChallengePeer::CHALLENGE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPackageChallenge $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPackageChallengePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPackageChallengePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPackageChallengePeer::DATABASE_NAME, MlmPackageChallengePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPackageChallengePeer::DATABASE_NAME);

		$criteria->add(MlmPackageChallengePeer::CHALLENGE_ID, $pk);


		$v = MlmPackageChallengePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPackageChallengePeer::CHALLENGE_ID, $pks, Criteria::IN);
			$objs = MlmPackageChallengePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmPackageChallengePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmPackageChallengeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPackageChallengeMapBuilder');
}
