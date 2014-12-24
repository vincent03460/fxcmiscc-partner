<?php


abstract class BaseMlmDistMt4Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_dist_mt4';

	
	const CLASS_DEFAULT = 'lib.model.MlmDistMt4';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MT4_ID = 'mlm_dist_mt4.MT4_ID';

	
	const DIST_ID = 'mlm_dist_mt4.DIST_ID';

	
	const MT4_USER_NAME = 'mlm_dist_mt4.MT4_USER_NAME';

	
	const MT4_PASSWORD = 'mlm_dist_mt4.MT4_PASSWORD';

	
	const RANK_ID = 'mlm_dist_mt4.RANK_ID';

	
	const CREATED_BY = 'mlm_dist_mt4.CREATED_BY';

	
	const CREATED_ON = 'mlm_dist_mt4.CREATED_ON';

	
	const UPDATED_BY = 'mlm_dist_mt4.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_dist_mt4.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Mt4Id', 'DistId', 'Mt4UserName', 'Mt4Password', 'RankId', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDistMt4Peer::MT4_ID, MlmDistMt4Peer::DIST_ID, MlmDistMt4Peer::MT4_USER_NAME, MlmDistMt4Peer::MT4_PASSWORD, MlmDistMt4Peer::RANK_ID, MlmDistMt4Peer::CREATED_BY, MlmDistMt4Peer::CREATED_ON, MlmDistMt4Peer::UPDATED_BY, MlmDistMt4Peer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('mt4_id', 'dist_id', 'mt4_user_name', 'mt4_password', 'rank_id', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Mt4Id' => 0, 'DistId' => 1, 'Mt4UserName' => 2, 'Mt4Password' => 3, 'RankId' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (MlmDistMt4Peer::MT4_ID => 0, MlmDistMt4Peer::DIST_ID => 1, MlmDistMt4Peer::MT4_USER_NAME => 2, MlmDistMt4Peer::MT4_PASSWORD => 3, MlmDistMt4Peer::RANK_ID => 4, MlmDistMt4Peer::CREATED_BY => 5, MlmDistMt4Peer::CREATED_ON => 6, MlmDistMt4Peer::UPDATED_BY => 7, MlmDistMt4Peer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('mt4_id' => 0, 'dist_id' => 1, 'mt4_user_name' => 2, 'mt4_password' => 3, 'rank_id' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDistMt4MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDistMt4MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDistMt4Peer::getTableMap();
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
		return str_replace(MlmDistMt4Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDistMt4Peer::MT4_ID);

		$criteria->addSelectColumn(MlmDistMt4Peer::DIST_ID);

		$criteria->addSelectColumn(MlmDistMt4Peer::MT4_USER_NAME);

		$criteria->addSelectColumn(MlmDistMt4Peer::MT4_PASSWORD);

		$criteria->addSelectColumn(MlmDistMt4Peer::RANK_ID);

		$criteria->addSelectColumn(MlmDistMt4Peer::CREATED_BY);

		$criteria->addSelectColumn(MlmDistMt4Peer::CREATED_ON);

		$criteria->addSelectColumn(MlmDistMt4Peer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDistMt4Peer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_dist_mt4.MT4_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_dist_mt4.MT4_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDistMt4Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDistMt4Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDistMt4Peer::doSelectRS($criteria, $con);
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
		$objects = MlmDistMt4Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDistMt4Peer::populateObjects(MlmDistMt4Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDistMt4Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDistMt4Peer::getOMClass();
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
		return MlmDistMt4Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDistMt4Peer::MT4_ID); 

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
			$comparison = $criteria->getComparison(MlmDistMt4Peer::MT4_ID);
			$selectCriteria->add(MlmDistMt4Peer::MT4_ID, $criteria->remove(MlmDistMt4Peer::MT4_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDistMt4Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDistMt4Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDistMt4) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDistMt4Peer::MT4_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDistMt4 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDistMt4Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDistMt4Peer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDistMt4Peer::DATABASE_NAME, MlmDistMt4Peer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDistMt4Peer::DATABASE_NAME);

		$criteria->add(MlmDistMt4Peer::MT4_ID, $pk);


		$v = MlmDistMt4Peer::doSelect($criteria, $con);

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
			$criteria->add(MlmDistMt4Peer::MT4_ID, $pks, Criteria::IN);
			$objs = MlmDistMt4Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDistMt4Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDistMt4MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDistMt4MapBuilder');
}
