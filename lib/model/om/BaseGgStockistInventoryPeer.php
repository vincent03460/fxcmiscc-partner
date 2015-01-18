<?php


abstract class BaseGgStockistInventoryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_stockist_inventory';

	
	const CLASS_DEFAULT = 'lib.model.GgStockistInventory';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_stockist_inventory.ID';

	
	const SID = 'gg_stockist_inventory.SID';

	
	const PID = 'gg_stockist_inventory.PID';

	
	const REFNO = 'gg_stockist_inventory.REFNO';

	
	const TITLE = 'gg_stockist_inventory.TITLE';

	
	const BV = 'gg_stockist_inventory.BV';

	
	const DP = 'gg_stockist_inventory.DP';

	
	const RP = 'gg_stockist_inventory.RP';

	
	const QTY = 'gg_stockist_inventory.QTY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Sid', 'Pid', 'Refno', 'Title', 'Bv', 'Dp', 'Rp', 'Qty', ),
		BasePeer::TYPE_COLNAME => array (GgStockistInventoryPeer::ID, GgStockistInventoryPeer::SID, GgStockistInventoryPeer::PID, GgStockistInventoryPeer::REFNO, GgStockistInventoryPeer::TITLE, GgStockistInventoryPeer::BV, GgStockistInventoryPeer::DP, GgStockistInventoryPeer::RP, GgStockistInventoryPeer::QTY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'sid', 'pid', 'refno', 'title', 'bv', 'dp', 'rp', 'qty', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Sid' => 1, 'Pid' => 2, 'Refno' => 3, 'Title' => 4, 'Bv' => 5, 'Dp' => 6, 'Rp' => 7, 'Qty' => 8, ),
		BasePeer::TYPE_COLNAME => array (GgStockistInventoryPeer::ID => 0, GgStockistInventoryPeer::SID => 1, GgStockistInventoryPeer::PID => 2, GgStockistInventoryPeer::REFNO => 3, GgStockistInventoryPeer::TITLE => 4, GgStockistInventoryPeer::BV => 5, GgStockistInventoryPeer::DP => 6, GgStockistInventoryPeer::RP => 7, GgStockistInventoryPeer::QTY => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'sid' => 1, 'pid' => 2, 'refno' => 3, 'title' => 4, 'bv' => 5, 'dp' => 6, 'rp' => 7, 'qty' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgStockistInventoryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgStockistInventoryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgStockistInventoryPeer::getTableMap();
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
		return str_replace(GgStockistInventoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgStockistInventoryPeer::ID);

		$criteria->addSelectColumn(GgStockistInventoryPeer::SID);

		$criteria->addSelectColumn(GgStockistInventoryPeer::PID);

		$criteria->addSelectColumn(GgStockistInventoryPeer::REFNO);

		$criteria->addSelectColumn(GgStockistInventoryPeer::TITLE);

		$criteria->addSelectColumn(GgStockistInventoryPeer::BV);

		$criteria->addSelectColumn(GgStockistInventoryPeer::DP);

		$criteria->addSelectColumn(GgStockistInventoryPeer::RP);

		$criteria->addSelectColumn(GgStockistInventoryPeer::QTY);

	}

	const COUNT = 'COUNT(gg_stockist_inventory.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_stockist_inventory.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgStockistInventoryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgStockistInventoryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgStockistInventoryPeer::doSelectRS($criteria, $con);
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
		$objects = GgStockistInventoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgStockistInventoryPeer::populateObjects(GgStockistInventoryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgStockistInventoryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgStockistInventoryPeer::getOMClass();
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
		return GgStockistInventoryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgStockistInventoryPeer::ID); 

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
			$comparison = $criteria->getComparison(GgStockistInventoryPeer::ID);
			$selectCriteria->add(GgStockistInventoryPeer::ID, $criteria->remove(GgStockistInventoryPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgStockistInventoryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgStockistInventoryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgStockistInventory) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgStockistInventoryPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgStockistInventory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgStockistInventoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgStockistInventoryPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgStockistInventoryPeer::DATABASE_NAME, GgStockistInventoryPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgStockistInventoryPeer::DATABASE_NAME);

		$criteria->add(GgStockistInventoryPeer::ID, $pk);


		$v = GgStockistInventoryPeer::doSelect($criteria, $con);

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
			$criteria->add(GgStockistInventoryPeer::ID, $pks, Criteria::IN);
			$objs = GgStockistInventoryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgStockistInventoryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgStockistInventoryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgStockistInventoryMapBuilder');
}
