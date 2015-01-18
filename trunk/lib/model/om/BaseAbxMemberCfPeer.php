<?php


abstract class BaseAbxMemberCfPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'abx_member_cf';

	
	const CLASS_DEFAULT = 'lib.model.AbxMemberCf';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'abx_member_cf.ID';

	
	const UID = 'abx_member_cf.UID';

	
	const DID = 'abx_member_cf.DID';

	
	const AMOUNT = 'abx_member_cf.AMOUNT';

	
	const ODATE = 'abx_member_cf.ODATE';

	
	const CDATE = 'abx_member_cf.CDATE';

	
	const BACK_AMOUNT = 'abx_member_cf.BACK_AMOUNT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Did', 'Amount', 'Odate', 'Cdate', 'BackAmount', ),
		BasePeer::TYPE_COLNAME => array (AbxMemberCfPeer::ID, AbxMemberCfPeer::UID, AbxMemberCfPeer::DID, AbxMemberCfPeer::AMOUNT, AbxMemberCfPeer::ODATE, AbxMemberCfPeer::CDATE, AbxMemberCfPeer::BACK_AMOUNT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'did', 'amount', 'odate', 'cdate', 'back_amount', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Did' => 2, 'Amount' => 3, 'Odate' => 4, 'Cdate' => 5, 'BackAmount' => 6, ),
		BasePeer::TYPE_COLNAME => array (AbxMemberCfPeer::ID => 0, AbxMemberCfPeer::UID => 1, AbxMemberCfPeer::DID => 2, AbxMemberCfPeer::AMOUNT => 3, AbxMemberCfPeer::ODATE => 4, AbxMemberCfPeer::CDATE => 5, AbxMemberCfPeer::BACK_AMOUNT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'did' => 2, 'amount' => 3, 'odate' => 4, 'cdate' => 5, 'back_amount' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AbxMemberCfMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AbxMemberCfMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AbxMemberCfPeer::getTableMap();
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
		return str_replace(AbxMemberCfPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AbxMemberCfPeer::ID);

		$criteria->addSelectColumn(AbxMemberCfPeer::UID);

		$criteria->addSelectColumn(AbxMemberCfPeer::DID);

		$criteria->addSelectColumn(AbxMemberCfPeer::AMOUNT);

		$criteria->addSelectColumn(AbxMemberCfPeer::ODATE);

		$criteria->addSelectColumn(AbxMemberCfPeer::CDATE);

		$criteria->addSelectColumn(AbxMemberCfPeer::BACK_AMOUNT);

	}

	const COUNT = 'COUNT(abx_member_cf.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT abx_member_cf.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbxMemberCfPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbxMemberCfPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AbxMemberCfPeer::doSelectRS($criteria, $con);
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
		$objects = AbxMemberCfPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AbxMemberCfPeer::populateObjects(AbxMemberCfPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AbxMemberCfPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = AbxMemberCfPeer::getOMClass();
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
		return AbxMemberCfPeer::CLASS_DEFAULT;
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

		$criteria->remove(AbxMemberCfPeer::ID); 


		
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

			$comparison = $criteria->getComparison(AbxMemberCfPeer::ID);
			$selectCriteria->add(AbxMemberCfPeer::ID, $criteria->remove(AbxMemberCfPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AbxMemberCfPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AbxMemberCfPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof AbxMemberCf) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AbxMemberCfPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AbxMemberCf $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AbxMemberCfPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AbxMemberCfPeer::TABLE_NAME);

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

		return BasePeer::doValidate(AbxMemberCfPeer::DATABASE_NAME, AbxMemberCfPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AbxMemberCfPeer::DATABASE_NAME);

		$criteria->add(AbxMemberCfPeer::ID, $pk);


		$v = AbxMemberCfPeer::doSelect($criteria, $con);

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
			$criteria->add(AbxMemberCfPeer::ID, $pks, Criteria::IN);
			$objs = AbxMemberCfPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseAbxMemberCfPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/AbxMemberCfMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AbxMemberCfMapBuilder');
}
