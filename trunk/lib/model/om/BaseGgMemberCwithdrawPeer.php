<?php


abstract class BaseGgMemberCwithdrawPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_member_cwithdraw';

	
	const CLASS_DEFAULT = 'lib.model.GgMemberCwithdraw';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_member_cwithdraw.ID';

	
	const UID = 'gg_member_cwithdraw.UID';

	
	const AMOUNT = 'gg_member_cwithdraw.AMOUNT';

	
	const CODE = 'gg_member_cwithdraw.CODE';

	
	const PAYMENT_DATE = 'gg_member_cwithdraw.PAYMENT_DATE';

	
	const PAYMENT_REMARK = 'gg_member_cwithdraw.PAYMENT_REMARK';

	
	const REMARK = 'gg_member_cwithdraw.REMARK';

	
	const STATUS = 'gg_member_cwithdraw.STATUS';

	
	const CDATE = 'gg_member_cwithdraw.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Amount', 'Code', 'PaymentDate', 'PaymentRemark', 'Remark', 'Status', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgMemberCwithdrawPeer::ID, GgMemberCwithdrawPeer::UID, GgMemberCwithdrawPeer::AMOUNT, GgMemberCwithdrawPeer::CODE, GgMemberCwithdrawPeer::PAYMENT_DATE, GgMemberCwithdrawPeer::PAYMENT_REMARK, GgMemberCwithdrawPeer::REMARK, GgMemberCwithdrawPeer::STATUS, GgMemberCwithdrawPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'amount', 'code', 'payment_date', 'payment_remark', 'remark', 'status', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Amount' => 2, 'Code' => 3, 'PaymentDate' => 4, 'PaymentRemark' => 5, 'Remark' => 6, 'Status' => 7, 'Cdate' => 8, ),
		BasePeer::TYPE_COLNAME => array (GgMemberCwithdrawPeer::ID => 0, GgMemberCwithdrawPeer::UID => 1, GgMemberCwithdrawPeer::AMOUNT => 2, GgMemberCwithdrawPeer::CODE => 3, GgMemberCwithdrawPeer::PAYMENT_DATE => 4, GgMemberCwithdrawPeer::PAYMENT_REMARK => 5, GgMemberCwithdrawPeer::REMARK => 6, GgMemberCwithdrawPeer::STATUS => 7, GgMemberCwithdrawPeer::CDATE => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'amount' => 2, 'code' => 3, 'payment_date' => 4, 'payment_remark' => 5, 'remark' => 6, 'status' => 7, 'cdate' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMemberCwithdrawMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMemberCwithdrawMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMemberCwithdrawPeer::getTableMap();
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
		return str_replace(GgMemberCwithdrawPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::ID);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::UID);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::AMOUNT);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::CODE);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::PAYMENT_DATE);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::PAYMENT_REMARK);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::REMARK);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::STATUS);

		$criteria->addSelectColumn(GgMemberCwithdrawPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_member_cwithdraw.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_member_cwithdraw.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMemberCwithdrawPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMemberCwithdrawPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMemberCwithdrawPeer::doSelectRS($criteria, $con);
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
		$objects = GgMemberCwithdrawPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMemberCwithdrawPeer::populateObjects(GgMemberCwithdrawPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMemberCwithdrawPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMemberCwithdrawPeer::getOMClass();
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
		return GgMemberCwithdrawPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMemberCwithdrawPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMemberCwithdrawPeer::ID);
			$selectCriteria->add(GgMemberCwithdrawPeer::ID, $criteria->remove(GgMemberCwithdrawPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMemberCwithdrawPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMemberCwithdrawPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMemberCwithdraw) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMemberCwithdrawPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMemberCwithdraw $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMemberCwithdrawPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMemberCwithdrawPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMemberCwithdrawPeer::DATABASE_NAME, GgMemberCwithdrawPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMemberCwithdrawPeer::DATABASE_NAME);

		$criteria->add(GgMemberCwithdrawPeer::ID, $pk);


		$v = GgMemberCwithdrawPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMemberCwithdrawPeer::ID, $pks, Criteria::IN);
			$objs = GgMemberCwithdrawPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMemberCwithdrawPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMemberCwithdrawMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMemberCwithdrawMapBuilder');
}
