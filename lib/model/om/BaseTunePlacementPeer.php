<?php


abstract class BaseTunePlacementPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tune_placement';

	
	const CLASS_DEFAULT = 'lib.model.TunePlacement';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PLACEMENT_ID = 'tune_placement.PLACEMENT_ID';

	
	const DIST_ID = 'tune_placement.DIST_ID';

	
	const DIST_CODE = 'tune_placement.DIST_CODE';

	
	const UPLINE_DIST_ID = 'tune_placement.UPLINE_DIST_ID';

	
	const UPLINE_DIST_CODE = 'tune_placement.UPLINE_DIST_CODE';

	
	const PLACE_POSITION = 'tune_placement.PLACE_POSITION';

	
	const CREATED_BY = 'tune_placement.CREATED_BY';

	
	const CREATED_ON = 'tune_placement.CREATED_ON';

	
	const UPDATED_BY = 'tune_placement.UPDATED_BY';

	
	const UPDATED_ON = 'tune_placement.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PlacementId', 'DistId', 'DistCode', 'UplineDistId', 'UplineDistCode', 'PlacePosition', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (TunePlacementPeer::PLACEMENT_ID, TunePlacementPeer::DIST_ID, TunePlacementPeer::DIST_CODE, TunePlacementPeer::UPLINE_DIST_ID, TunePlacementPeer::UPLINE_DIST_CODE, TunePlacementPeer::PLACE_POSITION, TunePlacementPeer::CREATED_BY, TunePlacementPeer::CREATED_ON, TunePlacementPeer::UPDATED_BY, TunePlacementPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('placement_id', 'dist_id', 'dist_code', 'upline_dist_id', 'upline_dist_code', 'place_position', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PlacementId' => 0, 'DistId' => 1, 'DistCode' => 2, 'UplineDistId' => 3, 'UplineDistCode' => 4, 'PlacePosition' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (TunePlacementPeer::PLACEMENT_ID => 0, TunePlacementPeer::DIST_ID => 1, TunePlacementPeer::DIST_CODE => 2, TunePlacementPeer::UPLINE_DIST_ID => 3, TunePlacementPeer::UPLINE_DIST_CODE => 4, TunePlacementPeer::PLACE_POSITION => 5, TunePlacementPeer::CREATED_BY => 6, TunePlacementPeer::CREATED_ON => 7, TunePlacementPeer::UPDATED_BY => 8, TunePlacementPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('placement_id' => 0, 'dist_id' => 1, 'dist_code' => 2, 'upline_dist_id' => 3, 'upline_dist_code' => 4, 'place_position' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TunePlacementMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TunePlacementMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TunePlacementPeer::getTableMap();
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
		return str_replace(TunePlacementPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TunePlacementPeer::PLACEMENT_ID);

		$criteria->addSelectColumn(TunePlacementPeer::DIST_ID);

		$criteria->addSelectColumn(TunePlacementPeer::DIST_CODE);

		$criteria->addSelectColumn(TunePlacementPeer::UPLINE_DIST_ID);

		$criteria->addSelectColumn(TunePlacementPeer::UPLINE_DIST_CODE);

		$criteria->addSelectColumn(TunePlacementPeer::PLACE_POSITION);

		$criteria->addSelectColumn(TunePlacementPeer::CREATED_BY);

		$criteria->addSelectColumn(TunePlacementPeer::CREATED_ON);

		$criteria->addSelectColumn(TunePlacementPeer::UPDATED_BY);

		$criteria->addSelectColumn(TunePlacementPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(tune_placement.PLACEMENT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tune_placement.PLACEMENT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TunePlacementPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TunePlacementPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TunePlacementPeer::doSelectRS($criteria, $con);
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
		$objects = TunePlacementPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TunePlacementPeer::populateObjects(TunePlacementPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TunePlacementPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = TunePlacementPeer::getOMClass();
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
		return TunePlacementPeer::CLASS_DEFAULT;
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

		$criteria->remove(TunePlacementPeer::PLACEMENT_ID); 


		
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

			$comparison = $criteria->getComparison(TunePlacementPeer::PLACEMENT_ID);
			$selectCriteria->add(TunePlacementPeer::PLACEMENT_ID, $criteria->remove(TunePlacementPeer::PLACEMENT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TunePlacementPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TunePlacementPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof TunePlacement) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TunePlacementPeer::PLACEMENT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(TunePlacement $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TunePlacementPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TunePlacementPeer::TABLE_NAME);

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

		return BasePeer::doValidate(TunePlacementPeer::DATABASE_NAME, TunePlacementPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(TunePlacementPeer::DATABASE_NAME);

		$criteria->add(TunePlacementPeer::PLACEMENT_ID, $pk);


		$v = TunePlacementPeer::doSelect($criteria, $con);

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
			$criteria->add(TunePlacementPeer::PLACEMENT_ID, $pks, Criteria::IN);
			$objs = TunePlacementPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseTunePlacementPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/TunePlacementMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TunePlacementMapBuilder');
}
