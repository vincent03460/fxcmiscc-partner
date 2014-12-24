<?php


abstract class BaseMlmPackagePipsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_package_pips';

	
	const CLASS_DEFAULT = 'lib.model.MlmPackagePips';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PIPS_ID = 'mlm_package_pips.PIPS_ID';

	
	const TOTOL_SPONSOR = 'mlm_package_pips.TOTOL_SPONSOR';

	
	const PIPS = 'mlm_package_pips.PIPS';

	
	const GENERATION = 'mlm_package_pips.GENERATION';

	
	const PIPS2 = 'mlm_package_pips.PIPS2';

	
	const GENERATION2 = 'mlm_package_pips.GENERATION2';

	
	const CREATED_BY = 'mlm_package_pips.CREATED_BY';

	
	const CREATED_ON = 'mlm_package_pips.CREATED_ON';

	
	const UPDATED_BY = 'mlm_package_pips.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_package_pips.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PipsId', 'TotolSponsor', 'Pips', 'Generation', 'Pips2', 'Generation2', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePipsPeer::PIPS_ID, MlmPackagePipsPeer::TOTOL_SPONSOR, MlmPackagePipsPeer::PIPS, MlmPackagePipsPeer::GENERATION, MlmPackagePipsPeer::PIPS2, MlmPackagePipsPeer::GENERATION2, MlmPackagePipsPeer::CREATED_BY, MlmPackagePipsPeer::CREATED_ON, MlmPackagePipsPeer::UPDATED_BY, MlmPackagePipsPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('pips_id', 'totol_sponsor', 'pips', 'generation', 'pips2', 'generation2', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PipsId' => 0, 'TotolSponsor' => 1, 'Pips' => 2, 'Generation' => 3, 'Pips2' => 4, 'Generation2' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePipsPeer::PIPS_ID => 0, MlmPackagePipsPeer::TOTOL_SPONSOR => 1, MlmPackagePipsPeer::PIPS => 2, MlmPackagePipsPeer::GENERATION => 3, MlmPackagePipsPeer::PIPS2 => 4, MlmPackagePipsPeer::GENERATION2 => 5, MlmPackagePipsPeer::CREATED_BY => 6, MlmPackagePipsPeer::CREATED_ON => 7, MlmPackagePipsPeer::UPDATED_BY => 8, MlmPackagePipsPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('pips_id' => 0, 'totol_sponsor' => 1, 'pips' => 2, 'generation' => 3, 'pips2' => 4, 'generation2' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPackagePipsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPackagePipsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPackagePipsPeer::getTableMap();
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
		return str_replace(MlmPackagePipsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPackagePipsPeer::PIPS_ID);

		$criteria->addSelectColumn(MlmPackagePipsPeer::TOTOL_SPONSOR);

		$criteria->addSelectColumn(MlmPackagePipsPeer::PIPS);

		$criteria->addSelectColumn(MlmPackagePipsPeer::GENERATION);

		$criteria->addSelectColumn(MlmPackagePipsPeer::PIPS2);

		$criteria->addSelectColumn(MlmPackagePipsPeer::GENERATION2);

		$criteria->addSelectColumn(MlmPackagePipsPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPackagePipsPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPackagePipsPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPackagePipsPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_package_pips.PIPS_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_package_pips.PIPS_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPackagePipsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPackagePipsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPackagePipsPeer::doSelectRS($criteria, $con);
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
		$objects = MlmPackagePipsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPackagePipsPeer::populateObjects(MlmPackagePipsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPackagePipsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmPackagePipsPeer::getOMClass();
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
		return MlmPackagePipsPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmPackagePipsPeer::PIPS_ID); 

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
			$comparison = $criteria->getComparison(MlmPackagePipsPeer::PIPS_ID);
			$selectCriteria->add(MlmPackagePipsPeer::PIPS_ID, $criteria->remove(MlmPackagePipsPeer::PIPS_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmPackagePipsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPackagePipsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmPackagePips) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPackagePipsPeer::PIPS_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPackagePips $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPackagePipsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPackagePipsPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPackagePipsPeer::DATABASE_NAME, MlmPackagePipsPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPackagePipsPeer::DATABASE_NAME);

		$criteria->add(MlmPackagePipsPeer::PIPS_ID, $pk);


		$v = MlmPackagePipsPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPackagePipsPeer::PIPS_ID, $pks, Criteria::IN);
			$objs = MlmPackagePipsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmPackagePipsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmPackagePipsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPackagePipsMapBuilder');
}
