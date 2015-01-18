<?php


abstract class BaseGgMemberTwalletRecordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_member_twallet_record';

	
	const CLASS_DEFAULT = 'lib.model.GgMemberTwalletRecord';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_member_twallet_record.ID';

	
	const UID = 'gg_member_twallet_record.UID';

	
	const AID = 'gg_member_twallet_record.AID';

	
	const TYPE = 'gg_member_twallet_record.TYPE';

	
	const AMOUNT = 'gg_member_twallet_record.AMOUNT';

	
	const BAL = 'gg_member_twallet_record.BAL';

	
	const DESCR = 'gg_member_twallet_record.DESCR';

	
	const CDATE = 'gg_member_twallet_record.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Aid', 'Type', 'Amount', 'Bal', 'Descr', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgMemberTwalletRecordPeer::ID, GgMemberTwalletRecordPeer::UID, GgMemberTwalletRecordPeer::AID, GgMemberTwalletRecordPeer::TYPE, GgMemberTwalletRecordPeer::AMOUNT, GgMemberTwalletRecordPeer::BAL, GgMemberTwalletRecordPeer::DESCR, GgMemberTwalletRecordPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'aid', 'type', 'amount', 'bal', 'descr', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Aid' => 2, 'Type' => 3, 'Amount' => 4, 'Bal' => 5, 'Descr' => 6, 'Cdate' => 7, ),
		BasePeer::TYPE_COLNAME => array (GgMemberTwalletRecordPeer::ID => 0, GgMemberTwalletRecordPeer::UID => 1, GgMemberTwalletRecordPeer::AID => 2, GgMemberTwalletRecordPeer::TYPE => 3, GgMemberTwalletRecordPeer::AMOUNT => 4, GgMemberTwalletRecordPeer::BAL => 5, GgMemberTwalletRecordPeer::DESCR => 6, GgMemberTwalletRecordPeer::CDATE => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'aid' => 2, 'type' => 3, 'amount' => 4, 'bal' => 5, 'descr' => 6, 'cdate' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMemberTwalletRecordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMemberTwalletRecordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMemberTwalletRecordPeer::getTableMap();
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
		return str_replace(GgMemberTwalletRecordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::ID);

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::UID);

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::AID);

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::TYPE);

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::AMOUNT);

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::BAL);

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::DESCR);

		$criteria->addSelectColumn(GgMemberTwalletRecordPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_member_twallet_record.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_member_twallet_record.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMemberTwalletRecordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMemberTwalletRecordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMemberTwalletRecordPeer::doSelectRS($criteria, $con);
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
		$objects = GgMemberTwalletRecordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMemberTwalletRecordPeer::populateObjects(GgMemberTwalletRecordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMemberTwalletRecordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMemberTwalletRecordPeer::getOMClass();
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
		return GgMemberTwalletRecordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMemberTwalletRecordPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMemberTwalletRecordPeer::ID);
			$selectCriteria->add(GgMemberTwalletRecordPeer::ID, $criteria->remove(GgMemberTwalletRecordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMemberTwalletRecordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMemberTwalletRecordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMemberTwalletRecord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMemberTwalletRecordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMemberTwalletRecord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMemberTwalletRecordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMemberTwalletRecordPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMemberTwalletRecordPeer::DATABASE_NAME, GgMemberTwalletRecordPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMemberTwalletRecordPeer::DATABASE_NAME);

		$criteria->add(GgMemberTwalletRecordPeer::ID, $pk);


		$v = GgMemberTwalletRecordPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMemberTwalletRecordPeer::ID, $pks, Criteria::IN);
			$objs = GgMemberTwalletRecordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMemberTwalletRecordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMemberTwalletRecordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMemberTwalletRecordMapBuilder');
}
