<?php


abstract class BaseMlmRoiForecastPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_roi_forecast';

	
	const CLASS_DEFAULT = 'lib.model.MlmRoiForecast';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ROI_ID = 'mlm_roi_forecast.ROI_ID';

	
	const DATE_YEAR = 'mlm_roi_forecast.DATE_YEAR';

	
	const DATE_MONTH = 'mlm_roi_forecast.DATE_MONTH';

	
	const ROI_3K_5K = 'mlm_roi_forecast.ROI_3K_5K';

	
	const ROI_10K_15K = 'mlm_roi_forecast.ROI_10K_15K';

	
	const ROI_30K_50K = 'mlm_roi_forecast.ROI_30K_50K';

	
	const CREATED_BY = 'mlm_roi_forecast.CREATED_BY';

	
	const CREATED_ON = 'mlm_roi_forecast.CREATED_ON';

	
	const UPDATED_BY = 'mlm_roi_forecast.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_roi_forecast.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RoiId', 'DateYear', 'DateMonth', 'Roi3k5k', 'Roi10k15k', 'Roi30k50k', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmRoiForecastPeer::ROI_ID, MlmRoiForecastPeer::DATE_YEAR, MlmRoiForecastPeer::DATE_MONTH, MlmRoiForecastPeer::ROI_3K_5K, MlmRoiForecastPeer::ROI_10K_15K, MlmRoiForecastPeer::ROI_30K_50K, MlmRoiForecastPeer::CREATED_BY, MlmRoiForecastPeer::CREATED_ON, MlmRoiForecastPeer::UPDATED_BY, MlmRoiForecastPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('roi_id', 'date_year', 'date_month', 'roi_3k_5k', 'roi_10k_15k', 'roi_30k_50k', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RoiId' => 0, 'DateYear' => 1, 'DateMonth' => 2, 'Roi3k5k' => 3, 'Roi10k15k' => 4, 'Roi30k50k' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (MlmRoiForecastPeer::ROI_ID => 0, MlmRoiForecastPeer::DATE_YEAR => 1, MlmRoiForecastPeer::DATE_MONTH => 2, MlmRoiForecastPeer::ROI_3K_5K => 3, MlmRoiForecastPeer::ROI_10K_15K => 4, MlmRoiForecastPeer::ROI_30K_50K => 5, MlmRoiForecastPeer::CREATED_BY => 6, MlmRoiForecastPeer::CREATED_ON => 7, MlmRoiForecastPeer::UPDATED_BY => 8, MlmRoiForecastPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('roi_id' => 0, 'date_year' => 1, 'date_month' => 2, 'roi_3k_5k' => 3, 'roi_10k_15k' => 4, 'roi_30k_50k' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmRoiForecastMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmRoiForecastMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmRoiForecastPeer::getTableMap();
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
		return str_replace(MlmRoiForecastPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmRoiForecastPeer::ROI_ID);

		$criteria->addSelectColumn(MlmRoiForecastPeer::DATE_YEAR);

		$criteria->addSelectColumn(MlmRoiForecastPeer::DATE_MONTH);

		$criteria->addSelectColumn(MlmRoiForecastPeer::ROI_3K_5K);

		$criteria->addSelectColumn(MlmRoiForecastPeer::ROI_10K_15K);

		$criteria->addSelectColumn(MlmRoiForecastPeer::ROI_30K_50K);

		$criteria->addSelectColumn(MlmRoiForecastPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmRoiForecastPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmRoiForecastPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmRoiForecastPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_roi_forecast.ROI_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_roi_forecast.ROI_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmRoiForecastPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmRoiForecastPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmRoiForecastPeer::doSelectRS($criteria, $con);
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
		$objects = MlmRoiForecastPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmRoiForecastPeer::populateObjects(MlmRoiForecastPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmRoiForecastPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmRoiForecastPeer::getOMClass();
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
		return MlmRoiForecastPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmRoiForecastPeer::ROI_ID); 

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
			$comparison = $criteria->getComparison(MlmRoiForecastPeer::ROI_ID);
			$selectCriteria->add(MlmRoiForecastPeer::ROI_ID, $criteria->remove(MlmRoiForecastPeer::ROI_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmRoiForecastPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmRoiForecastPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmRoiForecast) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmRoiForecastPeer::ROI_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmRoiForecast $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmRoiForecastPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmRoiForecastPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmRoiForecastPeer::DATABASE_NAME, MlmRoiForecastPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmRoiForecastPeer::DATABASE_NAME);

		$criteria->add(MlmRoiForecastPeer::ROI_ID, $pk);


		$v = MlmRoiForecastPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmRoiForecastPeer::ROI_ID, $pks, Criteria::IN);
			$objs = MlmRoiForecastPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmRoiForecastPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmRoiForecastMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmRoiForecastMapBuilder');
}
