<?php


abstract class BaseGgProdQtyRecordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_prod_qty_record';

	
	const CLASS_DEFAULT = 'lib.model.GgProdQtyRecord';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_prod_qty_record.ID';

	
	const PID = 'gg_prod_qty_record.PID';

	
	const SID = 'gg_prod_qty_record.SID';

	
	const SSID = 'gg_prod_qty_record.SSID';

	
	const TTYPE = 'gg_prod_qty_record.TTYPE';

	
	const TYPE = 'gg_prod_qty_record.TYPE';

	
	const QTY = 'gg_prod_qty_record.QTY';

	
	const CDATE = 'gg_prod_qty_record.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Pid', 'Sid', 'Ssid', 'Ttype', 'Type', 'Qty', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgProdQtyRecordPeer::ID, GgProdQtyRecordPeer::PID, GgProdQtyRecordPeer::SID, GgProdQtyRecordPeer::SSID, GgProdQtyRecordPeer::TTYPE, GgProdQtyRecordPeer::TYPE, GgProdQtyRecordPeer::QTY, GgProdQtyRecordPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'pid', 'sid', 'ssid', 'ttype', 'type', 'qty', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Pid' => 1, 'Sid' => 2, 'Ssid' => 3, 'Ttype' => 4, 'Type' => 5, 'Qty' => 6, 'Cdate' => 7, ),
		BasePeer::TYPE_COLNAME => array (GgProdQtyRecordPeer::ID => 0, GgProdQtyRecordPeer::PID => 1, GgProdQtyRecordPeer::SID => 2, GgProdQtyRecordPeer::SSID => 3, GgProdQtyRecordPeer::TTYPE => 4, GgProdQtyRecordPeer::TYPE => 5, GgProdQtyRecordPeer::QTY => 6, GgProdQtyRecordPeer::CDATE => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'pid' => 1, 'sid' => 2, 'ssid' => 3, 'ttype' => 4, 'type' => 5, 'qty' => 6, 'cdate' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgProdQtyRecordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgProdQtyRecordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgProdQtyRecordPeer::getTableMap();
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
		return str_replace(GgProdQtyRecordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgProdQtyRecordPeer::ID);

		$criteria->addSelectColumn(GgProdQtyRecordPeer::PID);

		$criteria->addSelectColumn(GgProdQtyRecordPeer::SID);

		$criteria->addSelectColumn(GgProdQtyRecordPeer::SSID);

		$criteria->addSelectColumn(GgProdQtyRecordPeer::TTYPE);

		$criteria->addSelectColumn(GgProdQtyRecordPeer::TYPE);

		$criteria->addSelectColumn(GgProdQtyRecordPeer::QTY);

		$criteria->addSelectColumn(GgProdQtyRecordPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_prod_qty_record.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_prod_qty_record.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgProdQtyRecordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgProdQtyRecordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgProdQtyRecordPeer::doSelectRS($criteria, $con);
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
		$objects = GgProdQtyRecordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgProdQtyRecordPeer::populateObjects(GgProdQtyRecordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgProdQtyRecordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgProdQtyRecordPeer::getOMClass();
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
		return GgProdQtyRecordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgProdQtyRecordPeer::ID); 

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
			$comparison = $criteria->getComparison(GgProdQtyRecordPeer::ID);
			$selectCriteria->add(GgProdQtyRecordPeer::ID, $criteria->remove(GgProdQtyRecordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgProdQtyRecordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgProdQtyRecordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgProdQtyRecord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgProdQtyRecordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgProdQtyRecord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgProdQtyRecordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgProdQtyRecordPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgProdQtyRecordPeer::DATABASE_NAME, GgProdQtyRecordPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgProdQtyRecordPeer::DATABASE_NAME);

		$criteria->add(GgProdQtyRecordPeer::ID, $pk);


		$v = GgProdQtyRecordPeer::doSelect($criteria, $con);

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
			$criteria->add(GgProdQtyRecordPeer::ID, $pks, Criteria::IN);
			$objs = GgProdQtyRecordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgProdQtyRecordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgProdQtyRecordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgProdQtyRecordMapBuilder');
}
