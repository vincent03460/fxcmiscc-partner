<?php


abstract class BaseMlmProductPurchaseHistoryDetailPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_product_purchase_history_detail';

	
	const CLASS_DEFAULT = 'lib.model.MlmProductPurchaseHistoryDetail';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const HISTORY_DETAIL_ID = 'mlm_product_purchase_history_detail.HISTORY_DETAIL_ID';

	
	const HISTORY_ID = 'mlm_product_purchase_history_detail.HISTORY_ID';

	
	const PRODUCT_ID = 'mlm_product_purchase_history_detail.PRODUCT_ID';

	
	const ACCOUNT_ID = 'mlm_product_purchase_history_detail.ACCOUNT_ID';

	
	const PRICE = 'mlm_product_purchase_history_detail.PRICE';

	
	const QTY = 'mlm_product_purchase_history_detail.QTY';

	
	const TOTAL_AMOUNT = 'mlm_product_purchase_history_detail.TOTAL_AMOUNT';

	
	const CREATED_BY = 'mlm_product_purchase_history_detail.CREATED_BY';

	
	const CREATED_ON = 'mlm_product_purchase_history_detail.CREATED_ON';

	
	const UPDATED_BY = 'mlm_product_purchase_history_detail.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_product_purchase_history_detail.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('HistoryDetailId', 'HistoryId', 'ProductId', 'AccountId', 'Price', 'Qty', 'TotalAmount', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID, MlmProductPurchaseHistoryDetailPeer::HISTORY_ID, MlmProductPurchaseHistoryDetailPeer::PRODUCT_ID, MlmProductPurchaseHistoryDetailPeer::ACCOUNT_ID, MlmProductPurchaseHistoryDetailPeer::PRICE, MlmProductPurchaseHistoryDetailPeer::QTY, MlmProductPurchaseHistoryDetailPeer::TOTAL_AMOUNT, MlmProductPurchaseHistoryDetailPeer::CREATED_BY, MlmProductPurchaseHistoryDetailPeer::CREATED_ON, MlmProductPurchaseHistoryDetailPeer::UPDATED_BY, MlmProductPurchaseHistoryDetailPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('history_detail_id', 'history_id', 'product_id', 'account_id', 'price', 'qty', 'total_amount', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('HistoryDetailId' => 0, 'HistoryId' => 1, 'ProductId' => 2, 'AccountId' => 3, 'Price' => 4, 'Qty' => 5, 'TotalAmount' => 6, 'CreatedBy' => 7, 'CreatedOn' => 8, 'UpdatedBy' => 9, 'UpdatedOn' => 10, ),
		BasePeer::TYPE_COLNAME => array (MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID => 0, MlmProductPurchaseHistoryDetailPeer::HISTORY_ID => 1, MlmProductPurchaseHistoryDetailPeer::PRODUCT_ID => 2, MlmProductPurchaseHistoryDetailPeer::ACCOUNT_ID => 3, MlmProductPurchaseHistoryDetailPeer::PRICE => 4, MlmProductPurchaseHistoryDetailPeer::QTY => 5, MlmProductPurchaseHistoryDetailPeer::TOTAL_AMOUNT => 6, MlmProductPurchaseHistoryDetailPeer::CREATED_BY => 7, MlmProductPurchaseHistoryDetailPeer::CREATED_ON => 8, MlmProductPurchaseHistoryDetailPeer::UPDATED_BY => 9, MlmProductPurchaseHistoryDetailPeer::UPDATED_ON => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('history_detail_id' => 0, 'history_id' => 1, 'product_id' => 2, 'account_id' => 3, 'price' => 4, 'qty' => 5, 'total_amount' => 6, 'created_by' => 7, 'created_on' => 8, 'updated_by' => 9, 'updated_on' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmProductPurchaseHistoryDetailMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmProductPurchaseHistoryDetailMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmProductPurchaseHistoryDetailPeer::getTableMap();
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
		return str_replace(MlmProductPurchaseHistoryDetailPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::HISTORY_ID);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::PRODUCT_ID);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::ACCOUNT_ID);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::PRICE);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::QTY);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::TOTAL_AMOUNT);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_product_purchase_history_detail.HISTORY_DETAIL_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_product_purchase_history_detail.HISTORY_DETAIL_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmProductPurchaseHistoryDetailPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmProductPurchaseHistoryDetailPeer::doSelectRS($criteria, $con);
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
		$objects = MlmProductPurchaseHistoryDetailPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmProductPurchaseHistoryDetailPeer::populateObjects(MlmProductPurchaseHistoryDetailPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmProductPurchaseHistoryDetailPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmProductPurchaseHistoryDetailPeer::getOMClass();
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
		return MlmProductPurchaseHistoryDetailPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID); 

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
			$comparison = $criteria->getComparison(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID);
			$selectCriteria->add(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID, $criteria->remove(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmProductPurchaseHistoryDetailPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmProductPurchaseHistoryDetail) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmProductPurchaseHistoryDetail $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmProductPurchaseHistoryDetailPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME, MlmProductPurchaseHistoryDetailPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME);

		$criteria->add(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID, $pk);


		$v = MlmProductPurchaseHistoryDetailPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID, $pks, Criteria::IN);
			$objs = MlmProductPurchaseHistoryDetailPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmProductPurchaseHistoryDetailPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmProductPurchaseHistoryDetailMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmProductPurchaseHistoryDetailMapBuilder');
}
