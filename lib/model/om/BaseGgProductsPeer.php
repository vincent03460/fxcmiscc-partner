<?php


abstract class BaseGgProductsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_products';

	
	const CLASS_DEFAULT = 'lib.model.GgProducts';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_products.ID';

	
	const CATID = 'gg_products.CATID';

	
	const COUNTRY = 'gg_products.COUNTRY';

	
	const PROD_TYPE = 'gg_products.PROD_TYPE';

	
	const REFNO = 'gg_products.REFNO';

	
	const TITLE = 'gg_products.TITLE';

	
	const BV = 'gg_products.BV';

	
	const BV_FIX = 'gg_products.BV_FIX';

	
	const DP = 'gg_products.DP';

	
	const DP_FIX = 'gg_products.DP_FIX';

	
	const RP = 'gg_products.RP';

	
	const RP_FIX = 'gg_products.RP_FIX';

	
	const QTY_TYPE = 'gg_products.QTY_TYPE';

	
	const QTY = 'gg_products.QTY';

	
	const IMAGE_FILE = 'gg_products.IMAGE_FILE';

	
	const STATUS = 'gg_products.STATUS';

	
	const REMARK = 'gg_products.REMARK';

	
	const DESCR = 'gg_products.DESCR';

	
	const CDATE = 'gg_products.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Catid', 'Country', 'ProdType', 'Refno', 'Title', 'Bv', 'BvFix', 'Dp', 'DpFix', 'Rp', 'RpFix', 'QtyType', 'Qty', 'ImageFile', 'Status', 'Remark', 'Descr', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgProductsPeer::ID, GgProductsPeer::CATID, GgProductsPeer::COUNTRY, GgProductsPeer::PROD_TYPE, GgProductsPeer::REFNO, GgProductsPeer::TITLE, GgProductsPeer::BV, GgProductsPeer::BV_FIX, GgProductsPeer::DP, GgProductsPeer::DP_FIX, GgProductsPeer::RP, GgProductsPeer::RP_FIX, GgProductsPeer::QTY_TYPE, GgProductsPeer::QTY, GgProductsPeer::IMAGE_FILE, GgProductsPeer::STATUS, GgProductsPeer::REMARK, GgProductsPeer::DESCR, GgProductsPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'catid', 'country', 'prod_type', 'refno', 'title', 'bv', 'bv_fix', 'dp', 'dp_fix', 'rp', 'rp_fix', 'qty_type', 'qty', 'image_file', 'status', 'remark', 'descr', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Catid' => 1, 'Country' => 2, 'ProdType' => 3, 'Refno' => 4, 'Title' => 5, 'Bv' => 6, 'BvFix' => 7, 'Dp' => 8, 'DpFix' => 9, 'Rp' => 10, 'RpFix' => 11, 'QtyType' => 12, 'Qty' => 13, 'ImageFile' => 14, 'Status' => 15, 'Remark' => 16, 'Descr' => 17, 'Cdate' => 18, ),
		BasePeer::TYPE_COLNAME => array (GgProductsPeer::ID => 0, GgProductsPeer::CATID => 1, GgProductsPeer::COUNTRY => 2, GgProductsPeer::PROD_TYPE => 3, GgProductsPeer::REFNO => 4, GgProductsPeer::TITLE => 5, GgProductsPeer::BV => 6, GgProductsPeer::BV_FIX => 7, GgProductsPeer::DP => 8, GgProductsPeer::DP_FIX => 9, GgProductsPeer::RP => 10, GgProductsPeer::RP_FIX => 11, GgProductsPeer::QTY_TYPE => 12, GgProductsPeer::QTY => 13, GgProductsPeer::IMAGE_FILE => 14, GgProductsPeer::STATUS => 15, GgProductsPeer::REMARK => 16, GgProductsPeer::DESCR => 17, GgProductsPeer::CDATE => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'catid' => 1, 'country' => 2, 'prod_type' => 3, 'refno' => 4, 'title' => 5, 'bv' => 6, 'bv_fix' => 7, 'dp' => 8, 'dp_fix' => 9, 'rp' => 10, 'rp_fix' => 11, 'qty_type' => 12, 'qty' => 13, 'image_file' => 14, 'status' => 15, 'remark' => 16, 'descr' => 17, 'cdate' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgProductsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgProductsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgProductsPeer::getTableMap();
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
		return str_replace(GgProductsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgProductsPeer::ID);

		$criteria->addSelectColumn(GgProductsPeer::CATID);

		$criteria->addSelectColumn(GgProductsPeer::COUNTRY);

		$criteria->addSelectColumn(GgProductsPeer::PROD_TYPE);

		$criteria->addSelectColumn(GgProductsPeer::REFNO);

		$criteria->addSelectColumn(GgProductsPeer::TITLE);

		$criteria->addSelectColumn(GgProductsPeer::BV);

		$criteria->addSelectColumn(GgProductsPeer::BV_FIX);

		$criteria->addSelectColumn(GgProductsPeer::DP);

		$criteria->addSelectColumn(GgProductsPeer::DP_FIX);

		$criteria->addSelectColumn(GgProductsPeer::RP);

		$criteria->addSelectColumn(GgProductsPeer::RP_FIX);

		$criteria->addSelectColumn(GgProductsPeer::QTY_TYPE);

		$criteria->addSelectColumn(GgProductsPeer::QTY);

		$criteria->addSelectColumn(GgProductsPeer::IMAGE_FILE);

		$criteria->addSelectColumn(GgProductsPeer::STATUS);

		$criteria->addSelectColumn(GgProductsPeer::REMARK);

		$criteria->addSelectColumn(GgProductsPeer::DESCR);

		$criteria->addSelectColumn(GgProductsPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_products.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_products.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgProductsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgProductsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgProductsPeer::doSelectRS($criteria, $con);
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
		$objects = GgProductsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgProductsPeer::populateObjects(GgProductsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgProductsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgProductsPeer::getOMClass();
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
		return GgProductsPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgProductsPeer::ID); 

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
			$comparison = $criteria->getComparison(GgProductsPeer::ID);
			$selectCriteria->add(GgProductsPeer::ID, $criteria->remove(GgProductsPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgProductsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgProductsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgProducts) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgProductsPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgProducts $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgProductsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgProductsPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgProductsPeer::DATABASE_NAME, GgProductsPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgProductsPeer::DATABASE_NAME);

		$criteria->add(GgProductsPeer::ID, $pk);


		$v = GgProductsPeer::doSelect($criteria, $con);

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
			$criteria->add(GgProductsPeer::ID, $pks, Criteria::IN);
			$objs = GgProductsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgProductsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgProductsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgProductsMapBuilder');
}
