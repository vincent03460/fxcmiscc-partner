<?php


abstract class BaseGgMemberCfPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_member_cf';

	
	const CLASS_DEFAULT = 'lib.model.GgMemberCf';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_member_cf.ID';

	
	const UID = 'gg_member_cf.UID';

	
	const LEG = 'gg_member_cf.LEG';

	
	const VOLUME_TYPE = 'gg_member_cf.VOLUME_TYPE';

	
	const BV = 'gg_member_cf.BV';

	
	const AMOUNT = 'gg_member_cf.AMOUNT';

	
	const PAIR_AMOUNT = 'gg_member_cf.PAIR_AMOUNT';

	
	const FLASH_AMOUNT = 'gg_member_cf.FLASH_AMOUNT';

	
	const CDATE = 'gg_member_cf.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Leg', 'VolumeType', 'Bv', 'Amount', 'PairAmount', 'FlashAmount', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgMemberCfPeer::ID, GgMemberCfPeer::UID, GgMemberCfPeer::LEG, GgMemberCfPeer::VOLUME_TYPE, GgMemberCfPeer::BV, GgMemberCfPeer::AMOUNT, GgMemberCfPeer::PAIR_AMOUNT, GgMemberCfPeer::FLASH_AMOUNT, GgMemberCfPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'leg', 'volume_type', 'bv', 'amount', 'pair_amount', 'flash_amount', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Leg' => 2, 'VolumeType' => 3, 'Bv' => 4, 'Amount' => 5, 'PairAmount' => 6, 'FlashAmount' => 7, 'Cdate' => 8, ),
		BasePeer::TYPE_COLNAME => array (GgMemberCfPeer::ID => 0, GgMemberCfPeer::UID => 1, GgMemberCfPeer::LEG => 2, GgMemberCfPeer::VOLUME_TYPE => 3, GgMemberCfPeer::BV => 4, GgMemberCfPeer::AMOUNT => 5, GgMemberCfPeer::PAIR_AMOUNT => 6, GgMemberCfPeer::FLASH_AMOUNT => 7, GgMemberCfPeer::CDATE => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'leg' => 2, 'volume_type' => 3, 'bv' => 4, 'amount' => 5, 'pair_amount' => 6, 'flash_amount' => 7, 'cdate' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMemberCfMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMemberCfMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMemberCfPeer::getTableMap();
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
		return str_replace(GgMemberCfPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMemberCfPeer::ID);

		$criteria->addSelectColumn(GgMemberCfPeer::UID);

		$criteria->addSelectColumn(GgMemberCfPeer::LEG);

		$criteria->addSelectColumn(GgMemberCfPeer::VOLUME_TYPE);

		$criteria->addSelectColumn(GgMemberCfPeer::BV);

		$criteria->addSelectColumn(GgMemberCfPeer::AMOUNT);

		$criteria->addSelectColumn(GgMemberCfPeer::PAIR_AMOUNT);

		$criteria->addSelectColumn(GgMemberCfPeer::FLASH_AMOUNT);

		$criteria->addSelectColumn(GgMemberCfPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_member_cf.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_member_cf.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMemberCfPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMemberCfPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMemberCfPeer::doSelectRS($criteria, $con);
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
		$objects = GgMemberCfPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMemberCfPeer::populateObjects(GgMemberCfPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMemberCfPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMemberCfPeer::getOMClass();
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
		return GgMemberCfPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMemberCfPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMemberCfPeer::ID);
			$selectCriteria->add(GgMemberCfPeer::ID, $criteria->remove(GgMemberCfPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMemberCfPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMemberCfPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMemberCf) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMemberCfPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMemberCf $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMemberCfPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMemberCfPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMemberCfPeer::DATABASE_NAME, GgMemberCfPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMemberCfPeer::DATABASE_NAME);

		$criteria->add(GgMemberCfPeer::ID, $pk);


		$v = GgMemberCfPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMemberCfPeer::ID, $pks, Criteria::IN);
			$objs = GgMemberCfPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMemberCfPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMemberCfMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMemberCfMapBuilder');
}
