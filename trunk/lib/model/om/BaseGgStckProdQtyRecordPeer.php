<?php


abstract class BaseGgStckProdQtyRecordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_stck_prod_qty_record';

	
	const CLASS_DEFAULT = 'lib.model.GgStckProdQtyRecord';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_stck_prod_qty_record.ID';

	
	const PID = 'gg_stck_prod_qty_record.PID';

	
	const SLID = 'gg_stck_prod_qty_record.SLID';

	
	const SSLID = 'gg_stck_prod_qty_record.SSLID';

	
	const SID = 'gg_stck_prod_qty_record.SID';

	
	const TTYPE = 'gg_stck_prod_qty_record.TTYPE';

	
	const TYPE = 'gg_stck_prod_qty_record.TYPE';

	
	const QTY = 'gg_stck_prod_qty_record.QTY';

	
	const CDATE = 'gg_stck_prod_qty_record.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Pid', 'Slid', 'Sslid', 'Sid', 'Ttype', 'Type', 'Qty', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgStckProdQtyRecordPeer::ID, GgStckProdQtyRecordPeer::PID, GgStckProdQtyRecordPeer::SLID, GgStckProdQtyRecordPeer::SSLID, GgStckProdQtyRecordPeer::SID, GgStckProdQtyRecordPeer::TTYPE, GgStckProdQtyRecordPeer::TYPE, GgStckProdQtyRecordPeer::QTY, GgStckProdQtyRecordPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'pid', 'slid', 'sslid', 'sid', 'ttype', 'type', 'qty', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Pid' => 1, 'Slid' => 2, 'Sslid' => 3, 'Sid' => 4, 'Ttype' => 5, 'Type' => 6, 'Qty' => 7, 'Cdate' => 8, ),
		BasePeer::TYPE_COLNAME => array (GgStckProdQtyRecordPeer::ID => 0, GgStckProdQtyRecordPeer::PID => 1, GgStckProdQtyRecordPeer::SLID => 2, GgStckProdQtyRecordPeer::SSLID => 3, GgStckProdQtyRecordPeer::SID => 4, GgStckProdQtyRecordPeer::TTYPE => 5, GgStckProdQtyRecordPeer::TYPE => 6, GgStckProdQtyRecordPeer::QTY => 7, GgStckProdQtyRecordPeer::CDATE => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'pid' => 1, 'slid' => 2, 'sslid' => 3, 'sid' => 4, 'ttype' => 5, 'type' => 6, 'qty' => 7, 'cdate' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgStckProdQtyRecordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgStckProdQtyRecordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgStckProdQtyRecordPeer::getTableMap();
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
		return str_replace(GgStckProdQtyRecordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::ID);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::PID);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::SLID);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::SSLID);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::SID);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::TTYPE);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::TYPE);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::QTY);

		$criteria->addSelectColumn(GgStckProdQtyRecordPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_stck_prod_qty_record.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_stck_prod_qty_record.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgStckProdQtyRecordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgStckProdQtyRecordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgStckProdQtyRecordPeer::doSelectRS($criteria, $con);
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
		$objects = GgStckProdQtyRecordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgStckProdQtyRecordPeer::populateObjects(GgStckProdQtyRecordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgStckProdQtyRecordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgStckProdQtyRecordPeer::getOMClass();
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
		return GgStckProdQtyRecordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgStckProdQtyRecordPeer::ID); 

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
			$comparison = $criteria->getComparison(GgStckProdQtyRecordPeer::ID);
			$selectCriteria->add(GgStckProdQtyRecordPeer::ID, $criteria->remove(GgStckProdQtyRecordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgStckProdQtyRecordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgStckProdQtyRecordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgStckProdQtyRecord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgStckProdQtyRecordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgStckProdQtyRecord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgStckProdQtyRecordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgStckProdQtyRecordPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgStckProdQtyRecordPeer::DATABASE_NAME, GgStckProdQtyRecordPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgStckProdQtyRecordPeer::DATABASE_NAME);

		$criteria->add(GgStckProdQtyRecordPeer::ID, $pk);


		$v = GgStckProdQtyRecordPeer::doSelect($criteria, $con);

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
			$criteria->add(GgStckProdQtyRecordPeer::ID, $pks, Criteria::IN);
			$objs = GgStckProdQtyRecordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgStckProdQtyRecordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgStckProdQtyRecordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgStckProdQtyRecordMapBuilder');
}
