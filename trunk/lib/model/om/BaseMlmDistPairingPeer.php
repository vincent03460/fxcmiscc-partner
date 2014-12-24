<?php


abstract class BaseMlmDistPairingPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_dist_pairing';

	
	const CLASS_DEFAULT = 'lib.model.MlmDistPairing';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PAIRING_ID = 'mlm_dist_pairing.PAIRING_ID';

	
	const DIST_ID = 'mlm_dist_pairing.DIST_ID';

	
	const LEFT_BALANCE = 'mlm_dist_pairing.LEFT_BALANCE';

	
	const RIGHT_BALANCE = 'mlm_dist_pairing.RIGHT_BALANCE';

	
	const FLUSH_LIMIT = 'mlm_dist_pairing.FLUSH_LIMIT';

	
	const CREATED_BY = 'mlm_dist_pairing.CREATED_BY';

	
	const CREATED_ON = 'mlm_dist_pairing.CREATED_ON';

	
	const UPDATED_BY = 'mlm_dist_pairing.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_dist_pairing.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PairingId', 'DistId', 'LeftBalance', 'RightBalance', 'FlushLimit', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDistPairingPeer::PAIRING_ID, MlmDistPairingPeer::DIST_ID, MlmDistPairingPeer::LEFT_BALANCE, MlmDistPairingPeer::RIGHT_BALANCE, MlmDistPairingPeer::FLUSH_LIMIT, MlmDistPairingPeer::CREATED_BY, MlmDistPairingPeer::CREATED_ON, MlmDistPairingPeer::UPDATED_BY, MlmDistPairingPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('pairing_id', 'dist_id', 'left_balance', 'right_balance', 'flush_limit', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PairingId' => 0, 'DistId' => 1, 'LeftBalance' => 2, 'RightBalance' => 3, 'FlushLimit' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (MlmDistPairingPeer::PAIRING_ID => 0, MlmDistPairingPeer::DIST_ID => 1, MlmDistPairingPeer::LEFT_BALANCE => 2, MlmDistPairingPeer::RIGHT_BALANCE => 3, MlmDistPairingPeer::FLUSH_LIMIT => 4, MlmDistPairingPeer::CREATED_BY => 5, MlmDistPairingPeer::CREATED_ON => 6, MlmDistPairingPeer::UPDATED_BY => 7, MlmDistPairingPeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('pairing_id' => 0, 'dist_id' => 1, 'left_balance' => 2, 'right_balance' => 3, 'flush_limit' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDistPairingMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDistPairingMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDistPairingPeer::getTableMap();
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
		return str_replace(MlmDistPairingPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDistPairingPeer::PAIRING_ID);

		$criteria->addSelectColumn(MlmDistPairingPeer::DIST_ID);

		$criteria->addSelectColumn(MlmDistPairingPeer::LEFT_BALANCE);

		$criteria->addSelectColumn(MlmDistPairingPeer::RIGHT_BALANCE);

		$criteria->addSelectColumn(MlmDistPairingPeer::FLUSH_LIMIT);

		$criteria->addSelectColumn(MlmDistPairingPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDistPairingPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDistPairingPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDistPairingPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_dist_pairing.PAIRING_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_dist_pairing.PAIRING_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDistPairingPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDistPairingPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDistPairingPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDistPairingPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDistPairingPeer::populateObjects(MlmDistPairingPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDistPairingPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDistPairingPeer::getOMClass();
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
		return MlmDistPairingPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDistPairingPeer::PAIRING_ID); 

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
			$comparison = $criteria->getComparison(MlmDistPairingPeer::PAIRING_ID);
			$selectCriteria->add(MlmDistPairingPeer::PAIRING_ID, $criteria->remove(MlmDistPairingPeer::PAIRING_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDistPairingPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDistPairingPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDistPairing) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDistPairingPeer::PAIRING_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDistPairing $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDistPairingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDistPairingPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDistPairingPeer::DATABASE_NAME, MlmDistPairingPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDistPairingPeer::DATABASE_NAME);

		$criteria->add(MlmDistPairingPeer::PAIRING_ID, $pk);


		$v = MlmDistPairingPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDistPairingPeer::PAIRING_ID, $pks, Criteria::IN);
			$objs = MlmDistPairingPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDistPairingPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDistPairingMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDistPairingMapBuilder');
}
