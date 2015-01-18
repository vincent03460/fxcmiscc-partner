<?php


abstract class BaseMlmDistEsharePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_dist_eshare';

	
	const CLASS_DEFAULT = 'lib.model.MlmDistEshare';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ESHARE_ID = 'mlm_dist_eshare.ESHARE_ID';

	
	const DIST_ID = 'mlm_dist_eshare.DIST_ID';

	
	const BALANCE = 'mlm_dist_eshare.BALANCE';

	
	const CREATED_BY = 'mlm_dist_eshare.CREATED_BY';

	
	const CREATED_ON = 'mlm_dist_eshare.CREATED_ON';

	
	const UPDATED_BY = 'mlm_dist_eshare.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_dist_eshare.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EshareId', 'DistId', 'Balance', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDistEsharePeer::ESHARE_ID, MlmDistEsharePeer::DIST_ID, MlmDistEsharePeer::BALANCE, MlmDistEsharePeer::CREATED_BY, MlmDistEsharePeer::CREATED_ON, MlmDistEsharePeer::UPDATED_BY, MlmDistEsharePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('eshare_id', 'dist_id', 'balance', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EshareId' => 0, 'DistId' => 1, 'Balance' => 2, 'CreatedBy' => 3, 'CreatedOn' => 4, 'UpdatedBy' => 5, 'UpdatedOn' => 6, ),
		BasePeer::TYPE_COLNAME => array (MlmDistEsharePeer::ESHARE_ID => 0, MlmDistEsharePeer::DIST_ID => 1, MlmDistEsharePeer::BALANCE => 2, MlmDistEsharePeer::CREATED_BY => 3, MlmDistEsharePeer::CREATED_ON => 4, MlmDistEsharePeer::UPDATED_BY => 5, MlmDistEsharePeer::UPDATED_ON => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('eshare_id' => 0, 'dist_id' => 1, 'balance' => 2, 'created_by' => 3, 'created_on' => 4, 'updated_by' => 5, 'updated_on' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDistEshareMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDistEshareMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDistEsharePeer::getTableMap();
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
		return str_replace(MlmDistEsharePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDistEsharePeer::ESHARE_ID);

		$criteria->addSelectColumn(MlmDistEsharePeer::DIST_ID);

		$criteria->addSelectColumn(MlmDistEsharePeer::BALANCE);

		$criteria->addSelectColumn(MlmDistEsharePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDistEsharePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDistEsharePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDistEsharePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_dist_eshare.ESHARE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_dist_eshare.ESHARE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDistEsharePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDistEsharePeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDistEsharePeer::doSelectRS($criteria, $con);
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
		$objects = MlmDistEsharePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDistEsharePeer::populateObjects(MlmDistEsharePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDistEsharePeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmDistEsharePeer::getOMClass();
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
		return MlmDistEsharePeer::CLASS_DEFAULT;
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

		$criteria->remove(MlmDistEsharePeer::ESHARE_ID); 


		
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

			$comparison = $criteria->getComparison(MlmDistEsharePeer::ESHARE_ID);
			$selectCriteria->add(MlmDistEsharePeer::ESHARE_ID, $criteria->remove(MlmDistEsharePeer::ESHARE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDistEsharePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDistEsharePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmDistEshare) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDistEsharePeer::ESHARE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDistEshare $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDistEsharePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDistEsharePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDistEsharePeer::DATABASE_NAME, MlmDistEsharePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDistEsharePeer::DATABASE_NAME);

		$criteria->add(MlmDistEsharePeer::ESHARE_ID, $pk);


		$v = MlmDistEsharePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDistEsharePeer::ESHARE_ID, $pks, Criteria::IN);
			$objs = MlmDistEsharePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmDistEsharePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmDistEshareMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDistEshareMapBuilder');
}
