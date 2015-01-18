<?php


abstract class BaseGgMemberOwalletRecordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_member_owallet_record';

	
	const CLASS_DEFAULT = 'lib.model.GgMemberOwalletRecord';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_member_owallet_record.ID';

	
	const UID = 'gg_member_owallet_record.UID';

	
	const AID = 'gg_member_owallet_record.AID';

	
	const TYPE = 'gg_member_owallet_record.TYPE';

	
	const AMOUNT = 'gg_member_owallet_record.AMOUNT';

	
	const BAL = 'gg_member_owallet_record.BAL';

	
	const DESCR = 'gg_member_owallet_record.DESCR';

	
	const CDATE = 'gg_member_owallet_record.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Aid', 'Type', 'Amount', 'Bal', 'Descr', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgMemberOwalletRecordPeer::ID, GgMemberOwalletRecordPeer::UID, GgMemberOwalletRecordPeer::AID, GgMemberOwalletRecordPeer::TYPE, GgMemberOwalletRecordPeer::AMOUNT, GgMemberOwalletRecordPeer::BAL, GgMemberOwalletRecordPeer::DESCR, GgMemberOwalletRecordPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'aid', 'type', 'amount', 'bal', 'descr', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Aid' => 2, 'Type' => 3, 'Amount' => 4, 'Bal' => 5, 'Descr' => 6, 'Cdate' => 7, ),
		BasePeer::TYPE_COLNAME => array (GgMemberOwalletRecordPeer::ID => 0, GgMemberOwalletRecordPeer::UID => 1, GgMemberOwalletRecordPeer::AID => 2, GgMemberOwalletRecordPeer::TYPE => 3, GgMemberOwalletRecordPeer::AMOUNT => 4, GgMemberOwalletRecordPeer::BAL => 5, GgMemberOwalletRecordPeer::DESCR => 6, GgMemberOwalletRecordPeer::CDATE => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'aid' => 2, 'type' => 3, 'amount' => 4, 'bal' => 5, 'descr' => 6, 'cdate' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMemberOwalletRecordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMemberOwalletRecordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMemberOwalletRecordPeer::getTableMap();
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
		return str_replace(GgMemberOwalletRecordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::ID);

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::UID);

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::AID);

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::TYPE);

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::AMOUNT);

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::BAL);

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::DESCR);

		$criteria->addSelectColumn(GgMemberOwalletRecordPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_member_owallet_record.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_member_owallet_record.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMemberOwalletRecordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMemberOwalletRecordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMemberOwalletRecordPeer::doSelectRS($criteria, $con);
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
		$objects = GgMemberOwalletRecordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMemberOwalletRecordPeer::populateObjects(GgMemberOwalletRecordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMemberOwalletRecordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMemberOwalletRecordPeer::getOMClass();
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
		return GgMemberOwalletRecordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMemberOwalletRecordPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMemberOwalletRecordPeer::ID);
			$selectCriteria->add(GgMemberOwalletRecordPeer::ID, $criteria->remove(GgMemberOwalletRecordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMemberOwalletRecordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMemberOwalletRecordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMemberOwalletRecord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMemberOwalletRecordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMemberOwalletRecord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMemberOwalletRecordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMemberOwalletRecordPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMemberOwalletRecordPeer::DATABASE_NAME, GgMemberOwalletRecordPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMemberOwalletRecordPeer::DATABASE_NAME);

		$criteria->add(GgMemberOwalletRecordPeer::ID, $pk);


		$v = GgMemberOwalletRecordPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMemberOwalletRecordPeer::ID, $pks, Criteria::IN);
			$objs = GgMemberOwalletRecordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMemberOwalletRecordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMemberOwalletRecordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMemberOwalletRecordMapBuilder');
}
