<?php


abstract class BaseGgMemberCommPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_member_comm';

	
	const CLASS_DEFAULT = 'lib.model.GgMemberComm';

	
	const NUM_COLUMNS = 31;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_member_comm.ID';

	
	const MID = 'gg_member_comm.MID';

	
	const PID = 'gg_member_comm.PID';

	
	const CID = 'gg_member_comm.CID';

	
	const NID = 'gg_member_comm.NID';

	
	const UID = 'gg_member_comm.UID';

	
	const FROM_UID = 'gg_member_comm.FROM_UID';

	
	const TYPE = 'gg_member_comm.TYPE';

	
	const VOLUME_TYPE = 'gg_member_comm.VOLUME_TYPE';

	
	const AMOUNT = 'gg_member_comm.AMOUNT';

	
	const AMOUNT2 = 'gg_member_comm.AMOUNT2';

	
	const PERCENT = 'gg_member_comm.PERCENT';

	
	const PERCENT2 = 'gg_member_comm.PERCENT2';

	
	const LEG1 = 'gg_member_comm.LEG1';

	
	const LEG1_ID = 'gg_member_comm.LEG1_ID';

	
	const LEG1_AMOUNT = 'gg_member_comm.LEG1_AMOUNT';

	
	const LEG2 = 'gg_member_comm.LEG2';

	
	const LEG2_ID = 'gg_member_comm.LEG2_ID';

	
	const LEG2_AMOUNT = 'gg_member_comm.LEG2_AMOUNT';

	
	const PAIRED_UNIT = 'gg_member_comm.PAIRED_UNIT';

	
	const LEVEL = 'gg_member_comm.LEVEL';

	
	const LEVEL2 = 'gg_member_comm.LEVEL2';

	
	const YEAR = 'gg_member_comm.YEAR';

	
	const MONTH = 'gg_member_comm.MONTH';

	
	const WEEK = 'gg_member_comm.WEEK';

	
	const DAY = 'gg_member_comm.DAY';

	
	const STATUS = 'gg_member_comm.STATUS';

	
	const DESCR = 'gg_member_comm.DESCR';

	
	const BONUS_DATE = 'gg_member_comm.BONUS_DATE';

	
	const CDATE = 'gg_member_comm.CDATE';

	
	const FLAG = 'gg_member_comm.FLAG';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Mid', 'Pid', 'Cid', 'Nid', 'Uid', 'FromUid', 'Type', 'VolumeType', 'Amount', 'Amount2', 'Percent', 'Percent2', 'Leg1', 'Leg1Id', 'Leg1Amount', 'Leg2', 'Leg2Id', 'Leg2Amount', 'PairedUnit', 'Level', 'Level2', 'Year', 'Month', 'Week', 'Day', 'Status', 'Descr', 'BonusDate', 'Cdate', 'Flag', ),
		BasePeer::TYPE_COLNAME => array (GgMemberCommPeer::ID, GgMemberCommPeer::MID, GgMemberCommPeer::PID, GgMemberCommPeer::CID, GgMemberCommPeer::NID, GgMemberCommPeer::UID, GgMemberCommPeer::FROM_UID, GgMemberCommPeer::TYPE, GgMemberCommPeer::VOLUME_TYPE, GgMemberCommPeer::AMOUNT, GgMemberCommPeer::AMOUNT2, GgMemberCommPeer::PERCENT, GgMemberCommPeer::PERCENT2, GgMemberCommPeer::LEG1, GgMemberCommPeer::LEG1_ID, GgMemberCommPeer::LEG1_AMOUNT, GgMemberCommPeer::LEG2, GgMemberCommPeer::LEG2_ID, GgMemberCommPeer::LEG2_AMOUNT, GgMemberCommPeer::PAIRED_UNIT, GgMemberCommPeer::LEVEL, GgMemberCommPeer::LEVEL2, GgMemberCommPeer::YEAR, GgMemberCommPeer::MONTH, GgMemberCommPeer::WEEK, GgMemberCommPeer::DAY, GgMemberCommPeer::STATUS, GgMemberCommPeer::DESCR, GgMemberCommPeer::BONUS_DATE, GgMemberCommPeer::CDATE, GgMemberCommPeer::FLAG, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'mid', 'pid', 'cid', 'nid', 'uid', 'from_uid', 'type', 'volume_type', 'amount', 'amount2', 'percent', 'percent2', 'leg1', 'leg1_id', 'leg1_amount', 'leg2', 'leg2_id', 'leg2_amount', 'paired_unit', 'level', 'level2', 'year', 'month', 'week', 'day', 'status', 'descr', 'bonus_date', 'cdate', 'flag', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Mid' => 1, 'Pid' => 2, 'Cid' => 3, 'Nid' => 4, 'Uid' => 5, 'FromUid' => 6, 'Type' => 7, 'VolumeType' => 8, 'Amount' => 9, 'Amount2' => 10, 'Percent' => 11, 'Percent2' => 12, 'Leg1' => 13, 'Leg1Id' => 14, 'Leg1Amount' => 15, 'Leg2' => 16, 'Leg2Id' => 17, 'Leg2Amount' => 18, 'PairedUnit' => 19, 'Level' => 20, 'Level2' => 21, 'Year' => 22, 'Month' => 23, 'Week' => 24, 'Day' => 25, 'Status' => 26, 'Descr' => 27, 'BonusDate' => 28, 'Cdate' => 29, 'Flag' => 30, ),
		BasePeer::TYPE_COLNAME => array (GgMemberCommPeer::ID => 0, GgMemberCommPeer::MID => 1, GgMemberCommPeer::PID => 2, GgMemberCommPeer::CID => 3, GgMemberCommPeer::NID => 4, GgMemberCommPeer::UID => 5, GgMemberCommPeer::FROM_UID => 6, GgMemberCommPeer::TYPE => 7, GgMemberCommPeer::VOLUME_TYPE => 8, GgMemberCommPeer::AMOUNT => 9, GgMemberCommPeer::AMOUNT2 => 10, GgMemberCommPeer::PERCENT => 11, GgMemberCommPeer::PERCENT2 => 12, GgMemberCommPeer::LEG1 => 13, GgMemberCommPeer::LEG1_ID => 14, GgMemberCommPeer::LEG1_AMOUNT => 15, GgMemberCommPeer::LEG2 => 16, GgMemberCommPeer::LEG2_ID => 17, GgMemberCommPeer::LEG2_AMOUNT => 18, GgMemberCommPeer::PAIRED_UNIT => 19, GgMemberCommPeer::LEVEL => 20, GgMemberCommPeer::LEVEL2 => 21, GgMemberCommPeer::YEAR => 22, GgMemberCommPeer::MONTH => 23, GgMemberCommPeer::WEEK => 24, GgMemberCommPeer::DAY => 25, GgMemberCommPeer::STATUS => 26, GgMemberCommPeer::DESCR => 27, GgMemberCommPeer::BONUS_DATE => 28, GgMemberCommPeer::CDATE => 29, GgMemberCommPeer::FLAG => 30, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'mid' => 1, 'pid' => 2, 'cid' => 3, 'nid' => 4, 'uid' => 5, 'from_uid' => 6, 'type' => 7, 'volume_type' => 8, 'amount' => 9, 'amount2' => 10, 'percent' => 11, 'percent2' => 12, 'leg1' => 13, 'leg1_id' => 14, 'leg1_amount' => 15, 'leg2' => 16, 'leg2_id' => 17, 'leg2_amount' => 18, 'paired_unit' => 19, 'level' => 20, 'level2' => 21, 'year' => 22, 'month' => 23, 'week' => 24, 'day' => 25, 'status' => 26, 'descr' => 27, 'bonus_date' => 28, 'cdate' => 29, 'flag' => 30, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMemberCommMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMemberCommMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMemberCommPeer::getTableMap();
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
		return str_replace(GgMemberCommPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMemberCommPeer::ID);

		$criteria->addSelectColumn(GgMemberCommPeer::MID);

		$criteria->addSelectColumn(GgMemberCommPeer::PID);

		$criteria->addSelectColumn(GgMemberCommPeer::CID);

		$criteria->addSelectColumn(GgMemberCommPeer::NID);

		$criteria->addSelectColumn(GgMemberCommPeer::UID);

		$criteria->addSelectColumn(GgMemberCommPeer::FROM_UID);

		$criteria->addSelectColumn(GgMemberCommPeer::TYPE);

		$criteria->addSelectColumn(GgMemberCommPeer::VOLUME_TYPE);

		$criteria->addSelectColumn(GgMemberCommPeer::AMOUNT);

		$criteria->addSelectColumn(GgMemberCommPeer::AMOUNT2);

		$criteria->addSelectColumn(GgMemberCommPeer::PERCENT);

		$criteria->addSelectColumn(GgMemberCommPeer::PERCENT2);

		$criteria->addSelectColumn(GgMemberCommPeer::LEG1);

		$criteria->addSelectColumn(GgMemberCommPeer::LEG1_ID);

		$criteria->addSelectColumn(GgMemberCommPeer::LEG1_AMOUNT);

		$criteria->addSelectColumn(GgMemberCommPeer::LEG2);

		$criteria->addSelectColumn(GgMemberCommPeer::LEG2_ID);

		$criteria->addSelectColumn(GgMemberCommPeer::LEG2_AMOUNT);

		$criteria->addSelectColumn(GgMemberCommPeer::PAIRED_UNIT);

		$criteria->addSelectColumn(GgMemberCommPeer::LEVEL);

		$criteria->addSelectColumn(GgMemberCommPeer::LEVEL2);

		$criteria->addSelectColumn(GgMemberCommPeer::YEAR);

		$criteria->addSelectColumn(GgMemberCommPeer::MONTH);

		$criteria->addSelectColumn(GgMemberCommPeer::WEEK);

		$criteria->addSelectColumn(GgMemberCommPeer::DAY);

		$criteria->addSelectColumn(GgMemberCommPeer::STATUS);

		$criteria->addSelectColumn(GgMemberCommPeer::DESCR);

		$criteria->addSelectColumn(GgMemberCommPeer::BONUS_DATE);

		$criteria->addSelectColumn(GgMemberCommPeer::CDATE);

		$criteria->addSelectColumn(GgMemberCommPeer::FLAG);

	}

	const COUNT = 'COUNT(gg_member_comm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_member_comm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMemberCommPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMemberCommPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMemberCommPeer::doSelectRS($criteria, $con);
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
		$objects = GgMemberCommPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMemberCommPeer::populateObjects(GgMemberCommPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMemberCommPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMemberCommPeer::getOMClass();
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
		return GgMemberCommPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMemberCommPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMemberCommPeer::ID);
			$selectCriteria->add(GgMemberCommPeer::ID, $criteria->remove(GgMemberCommPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMemberCommPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMemberCommPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMemberComm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMemberCommPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMemberComm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMemberCommPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMemberCommPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMemberCommPeer::DATABASE_NAME, GgMemberCommPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMemberCommPeer::DATABASE_NAME);

		$criteria->add(GgMemberCommPeer::ID, $pk);


		$v = GgMemberCommPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMemberCommPeer::ID, $pks, Criteria::IN);
			$objs = GgMemberCommPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMemberCommPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMemberCommMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMemberCommMapBuilder');
}
