<?php


abstract class BaseMlmEzyCashCardPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_ezy_cash_card';

	
	const CLASS_DEFAULT = 'lib.model.MlmEzyCashCard';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CARD_ID = 'mlm_ezy_cash_card.CARD_ID';

	
	const DIST_ID = 'mlm_ezy_cash_card.DIST_ID';

	
	const ACCOUNT_ID = 'mlm_ezy_cash_card.ACCOUNT_ID';

	
	const QTY = 'mlm_ezy_cash_card.QTY';

	
	const SUB_TOTAL = 'mlm_ezy_cash_card.SUB_TOTAL';

	
	const STATUS_CODE = 'mlm_ezy_cash_card.STATUS_CODE';

	
	const REMARK = 'mlm_ezy_cash_card.REMARK';

	
	const CREATED_BY = 'mlm_ezy_cash_card.CREATED_BY';

	
	const CREATED_ON = 'mlm_ezy_cash_card.CREATED_ON';

	
	const UPDATED_BY = 'mlm_ezy_cash_card.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_ezy_cash_card.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CardId', 'DistId', 'AccountId', 'Qty', 'SubTotal', 'StatusCode', 'Remark', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmEzyCashCardPeer::CARD_ID, MlmEzyCashCardPeer::DIST_ID, MlmEzyCashCardPeer::ACCOUNT_ID, MlmEzyCashCardPeer::QTY, MlmEzyCashCardPeer::SUB_TOTAL, MlmEzyCashCardPeer::STATUS_CODE, MlmEzyCashCardPeer::REMARK, MlmEzyCashCardPeer::CREATED_BY, MlmEzyCashCardPeer::CREATED_ON, MlmEzyCashCardPeer::UPDATED_BY, MlmEzyCashCardPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('card_id', 'dist_id', 'account_id', 'qty', 'sub_total', 'status_code', 'remark', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CardId' => 0, 'DistId' => 1, 'AccountId' => 2, 'Qty' => 3, 'SubTotal' => 4, 'StatusCode' => 5, 'Remark' => 6, 'CreatedBy' => 7, 'CreatedOn' => 8, 'UpdatedBy' => 9, 'UpdatedOn' => 10, ),
		BasePeer::TYPE_COLNAME => array (MlmEzyCashCardPeer::CARD_ID => 0, MlmEzyCashCardPeer::DIST_ID => 1, MlmEzyCashCardPeer::ACCOUNT_ID => 2, MlmEzyCashCardPeer::QTY => 3, MlmEzyCashCardPeer::SUB_TOTAL => 4, MlmEzyCashCardPeer::STATUS_CODE => 5, MlmEzyCashCardPeer::REMARK => 6, MlmEzyCashCardPeer::CREATED_BY => 7, MlmEzyCashCardPeer::CREATED_ON => 8, MlmEzyCashCardPeer::UPDATED_BY => 9, MlmEzyCashCardPeer::UPDATED_ON => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('card_id' => 0, 'dist_id' => 1, 'account_id' => 2, 'qty' => 3, 'sub_total' => 4, 'status_code' => 5, 'remark' => 6, 'created_by' => 7, 'created_on' => 8, 'updated_by' => 9, 'updated_on' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmEzyCashCardMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmEzyCashCardMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmEzyCashCardPeer::getTableMap();
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
		return str_replace(MlmEzyCashCardPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmEzyCashCardPeer::CARD_ID);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::DIST_ID);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::ACCOUNT_ID);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::QTY);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::SUB_TOTAL);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::REMARK);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmEzyCashCardPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_ezy_cash_card.CARD_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_ezy_cash_card.CARD_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmEzyCashCardPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmEzyCashCardPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmEzyCashCardPeer::doSelectRS($criteria, $con);
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
		$objects = MlmEzyCashCardPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmEzyCashCardPeer::populateObjects(MlmEzyCashCardPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmEzyCashCardPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmEzyCashCardPeer::getOMClass();
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
		return MlmEzyCashCardPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmEzyCashCardPeer::CARD_ID); 

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
			$comparison = $criteria->getComparison(MlmEzyCashCardPeer::CARD_ID);
			$selectCriteria->add(MlmEzyCashCardPeer::CARD_ID, $criteria->remove(MlmEzyCashCardPeer::CARD_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmEzyCashCardPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmEzyCashCardPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmEzyCashCard) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmEzyCashCardPeer::CARD_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmEzyCashCard $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmEzyCashCardPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmEzyCashCardPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmEzyCashCardPeer::DATABASE_NAME, MlmEzyCashCardPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmEzyCashCardPeer::DATABASE_NAME);

		$criteria->add(MlmEzyCashCardPeer::CARD_ID, $pk);


		$v = MlmEzyCashCardPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmEzyCashCardPeer::CARD_ID, $pks, Criteria::IN);
			$objs = MlmEzyCashCardPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmEzyCashCardPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmEzyCashCardMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmEzyCashCardMapBuilder');
}
