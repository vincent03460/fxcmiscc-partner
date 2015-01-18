<?php


abstract class BaseGgPurchaseDetailPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_purchase_detail';

	
	const CLASS_DEFAULT = 'lib.model.GgPurchaseDetail';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_purchase_detail.ID';

	
	const SLID = 'gg_purchase_detail.SLID';

	
	const PID = 'gg_purchase_detail.PID';

	
	const PKID = 'gg_purchase_detail.PKID';

	
	const PROD_TYPE = 'gg_purchase_detail.PROD_TYPE';

	
	const REFNO = 'gg_purchase_detail.REFNO';

	
	const TITLE = 'gg_purchase_detail.TITLE';

	
	const PRODUCT_CODE = 'gg_purchase_detail.PRODUCT_CODE';

	
	const PRODUCT_NAME = 'gg_purchase_detail.PRODUCT_NAME';

	
	const QTY = 'gg_purchase_detail.QTY';

	
	const AMOUNT = 'gg_purchase_detail.AMOUNT';

	
	const BV = 'gg_purchase_detail.BV';

	
	const DP = 'gg_purchase_detail.DP';

	
	const RP = 'gg_purchase_detail.RP';

	
	const TOTAL = 'gg_purchase_detail.TOTAL';

	
	const TOTAL_BV = 'gg_purchase_detail.TOTAL_BV';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Slid', 'Pid', 'Pkid', 'ProdType', 'Refno', 'Title', 'ProductCode', 'ProductName', 'Qty', 'Amount', 'Bv', 'Dp', 'Rp', 'Total', 'TotalBv', ),
		BasePeer::TYPE_COLNAME => array (GgPurchaseDetailPeer::ID, GgPurchaseDetailPeer::SLID, GgPurchaseDetailPeer::PID, GgPurchaseDetailPeer::PKID, GgPurchaseDetailPeer::PROD_TYPE, GgPurchaseDetailPeer::REFNO, GgPurchaseDetailPeer::TITLE, GgPurchaseDetailPeer::PRODUCT_CODE, GgPurchaseDetailPeer::PRODUCT_NAME, GgPurchaseDetailPeer::QTY, GgPurchaseDetailPeer::AMOUNT, GgPurchaseDetailPeer::BV, GgPurchaseDetailPeer::DP, GgPurchaseDetailPeer::RP, GgPurchaseDetailPeer::TOTAL, GgPurchaseDetailPeer::TOTAL_BV, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'slid', 'pid', 'pkid', 'prod_type', 'refno', 'title', 'product_code', 'product_name', 'qty', 'amount', 'bv', 'dp', 'rp', 'total', 'total_bv', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Slid' => 1, 'Pid' => 2, 'Pkid' => 3, 'ProdType' => 4, 'Refno' => 5, 'Title' => 6, 'ProductCode' => 7, 'ProductName' => 8, 'Qty' => 9, 'Amount' => 10, 'Bv' => 11, 'Dp' => 12, 'Rp' => 13, 'Total' => 14, 'TotalBv' => 15, ),
		BasePeer::TYPE_COLNAME => array (GgPurchaseDetailPeer::ID => 0, GgPurchaseDetailPeer::SLID => 1, GgPurchaseDetailPeer::PID => 2, GgPurchaseDetailPeer::PKID => 3, GgPurchaseDetailPeer::PROD_TYPE => 4, GgPurchaseDetailPeer::REFNO => 5, GgPurchaseDetailPeer::TITLE => 6, GgPurchaseDetailPeer::PRODUCT_CODE => 7, GgPurchaseDetailPeer::PRODUCT_NAME => 8, GgPurchaseDetailPeer::QTY => 9, GgPurchaseDetailPeer::AMOUNT => 10, GgPurchaseDetailPeer::BV => 11, GgPurchaseDetailPeer::DP => 12, GgPurchaseDetailPeer::RP => 13, GgPurchaseDetailPeer::TOTAL => 14, GgPurchaseDetailPeer::TOTAL_BV => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'slid' => 1, 'pid' => 2, 'pkid' => 3, 'prod_type' => 4, 'refno' => 5, 'title' => 6, 'product_code' => 7, 'product_name' => 8, 'qty' => 9, 'amount' => 10, 'bv' => 11, 'dp' => 12, 'rp' => 13, 'total' => 14, 'total_bv' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgPurchaseDetailMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgPurchaseDetailMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgPurchaseDetailPeer::getTableMap();
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
		return str_replace(GgPurchaseDetailPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgPurchaseDetailPeer::ID);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::SLID);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::PID);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::PKID);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::PROD_TYPE);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::REFNO);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::TITLE);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::PRODUCT_CODE);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::PRODUCT_NAME);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::QTY);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::AMOUNT);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::BV);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::DP);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::RP);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::TOTAL);

		$criteria->addSelectColumn(GgPurchaseDetailPeer::TOTAL_BV);

	}

	const COUNT = 'COUNT(gg_purchase_detail.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_purchase_detail.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgPurchaseDetailPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgPurchaseDetailPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgPurchaseDetailPeer::doSelectRS($criteria, $con);
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
		$objects = GgPurchaseDetailPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgPurchaseDetailPeer::populateObjects(GgPurchaseDetailPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgPurchaseDetailPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgPurchaseDetailPeer::getOMClass();
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
		return GgPurchaseDetailPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgPurchaseDetailPeer::ID); 

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
			$comparison = $criteria->getComparison(GgPurchaseDetailPeer::ID);
			$selectCriteria->add(GgPurchaseDetailPeer::ID, $criteria->remove(GgPurchaseDetailPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgPurchaseDetailPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgPurchaseDetailPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgPurchaseDetail) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgPurchaseDetailPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgPurchaseDetail $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgPurchaseDetailPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgPurchaseDetailPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgPurchaseDetailPeer::DATABASE_NAME, GgPurchaseDetailPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgPurchaseDetailPeer::DATABASE_NAME);

		$criteria->add(GgPurchaseDetailPeer::ID, $pk);


		$v = GgPurchaseDetailPeer::doSelect($criteria, $con);

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
			$criteria->add(GgPurchaseDetailPeer::ID, $pks, Criteria::IN);
			$objs = GgPurchaseDetailPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgPurchaseDetailPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgPurchaseDetailMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgPurchaseDetailMapBuilder');
}
