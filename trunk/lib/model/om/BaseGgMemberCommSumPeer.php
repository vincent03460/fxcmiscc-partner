<?php


abstract class BaseGgMemberCommSumPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_member_comm_sum';

	
	const CLASS_DEFAULT = 'lib.model.GgMemberCommSum';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_member_comm_sum.ID';

	
	const UID = 'gg_member_comm_sum.UID';

	
	const PGS = 'gg_member_comm_sum.PGS';

	
	const LCF = 'gg_member_comm_sum.LCF';

	
	const RCF = 'gg_member_comm_sum.RCF';

	
	const PBV = 'gg_member_comm_sum.PBV';

	
	const FBV = 'gg_member_comm_sum.FBV';

	
	const S = 'gg_member_comm_sum.S';

	
	const P = 'gg_member_comm_sum.P';

	
	const M = 'gg_member_comm_sum.M';

	
	const W = 'gg_member_comm_sum.W';

	
	const DLOT = 'gg_member_comm_sum.DLOT';

	
	const BONUS_DATE = 'gg_member_comm_sum.BONUS_DATE';

	
	const CDATE = 'gg_member_comm_sum.CDATE';

	
	const FLAG = 'gg_member_comm_sum.FLAG';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Pgs', 'Lcf', 'Rcf', 'Pbv', 'Fbv', 'S', 'P', 'M', 'W', 'Dlot', 'BonusDate', 'Cdate', 'Flag', ),
		BasePeer::TYPE_COLNAME => array (GgMemberCommSumPeer::ID, GgMemberCommSumPeer::UID, GgMemberCommSumPeer::PGS, GgMemberCommSumPeer::LCF, GgMemberCommSumPeer::RCF, GgMemberCommSumPeer::PBV, GgMemberCommSumPeer::FBV, GgMemberCommSumPeer::S, GgMemberCommSumPeer::P, GgMemberCommSumPeer::M, GgMemberCommSumPeer::W, GgMemberCommSumPeer::DLOT, GgMemberCommSumPeer::BONUS_DATE, GgMemberCommSumPeer::CDATE, GgMemberCommSumPeer::FLAG, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'pgs', 'lcf', 'rcf', 'pbv', 'fbv', 's', 'p', 'm', 'w', 'dlot', 'bonus_date', 'cdate', 'flag', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Pgs' => 2, 'Lcf' => 3, 'Rcf' => 4, 'Pbv' => 5, 'Fbv' => 6, 'S' => 7, 'P' => 8, 'M' => 9, 'W' => 10, 'Dlot' => 11, 'BonusDate' => 12, 'Cdate' => 13, 'Flag' => 14, ),
		BasePeer::TYPE_COLNAME => array (GgMemberCommSumPeer::ID => 0, GgMemberCommSumPeer::UID => 1, GgMemberCommSumPeer::PGS => 2, GgMemberCommSumPeer::LCF => 3, GgMemberCommSumPeer::RCF => 4, GgMemberCommSumPeer::PBV => 5, GgMemberCommSumPeer::FBV => 6, GgMemberCommSumPeer::S => 7, GgMemberCommSumPeer::P => 8, GgMemberCommSumPeer::M => 9, GgMemberCommSumPeer::W => 10, GgMemberCommSumPeer::DLOT => 11, GgMemberCommSumPeer::BONUS_DATE => 12, GgMemberCommSumPeer::CDATE => 13, GgMemberCommSumPeer::FLAG => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'pgs' => 2, 'lcf' => 3, 'rcf' => 4, 'pbv' => 5, 'fbv' => 6, 's' => 7, 'p' => 8, 'm' => 9, 'w' => 10, 'dlot' => 11, 'bonus_date' => 12, 'cdate' => 13, 'flag' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMemberCommSumMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMemberCommSumMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMemberCommSumPeer::getTableMap();
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
		return str_replace(GgMemberCommSumPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMemberCommSumPeer::ID);

		$criteria->addSelectColumn(GgMemberCommSumPeer::UID);

		$criteria->addSelectColumn(GgMemberCommSumPeer::PGS);

		$criteria->addSelectColumn(GgMemberCommSumPeer::LCF);

		$criteria->addSelectColumn(GgMemberCommSumPeer::RCF);

		$criteria->addSelectColumn(GgMemberCommSumPeer::PBV);

		$criteria->addSelectColumn(GgMemberCommSumPeer::FBV);

		$criteria->addSelectColumn(GgMemberCommSumPeer::S);

		$criteria->addSelectColumn(GgMemberCommSumPeer::P);

		$criteria->addSelectColumn(GgMemberCommSumPeer::M);

		$criteria->addSelectColumn(GgMemberCommSumPeer::W);

		$criteria->addSelectColumn(GgMemberCommSumPeer::DLOT);

		$criteria->addSelectColumn(GgMemberCommSumPeer::BONUS_DATE);

		$criteria->addSelectColumn(GgMemberCommSumPeer::CDATE);

		$criteria->addSelectColumn(GgMemberCommSumPeer::FLAG);

	}

	const COUNT = 'COUNT(gg_member_comm_sum.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_member_comm_sum.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMemberCommSumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMemberCommSumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMemberCommSumPeer::doSelectRS($criteria, $con);
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
		$objects = GgMemberCommSumPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMemberCommSumPeer::populateObjects(GgMemberCommSumPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMemberCommSumPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMemberCommSumPeer::getOMClass();
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
		return GgMemberCommSumPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMemberCommSumPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMemberCommSumPeer::ID);
			$selectCriteria->add(GgMemberCommSumPeer::ID, $criteria->remove(GgMemberCommSumPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMemberCommSumPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMemberCommSumPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMemberCommSum) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMemberCommSumPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMemberCommSum $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMemberCommSumPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMemberCommSumPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMemberCommSumPeer::DATABASE_NAME, GgMemberCommSumPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMemberCommSumPeer::DATABASE_NAME);

		$criteria->add(GgMemberCommSumPeer::ID, $pk);


		$v = GgMemberCommSumPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMemberCommSumPeer::ID, $pks, Criteria::IN);
			$objs = GgMemberCommSumPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMemberCommSumPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMemberCommSumMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMemberCommSumMapBuilder');
}
