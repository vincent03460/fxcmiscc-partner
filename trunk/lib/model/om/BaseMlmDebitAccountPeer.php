<?php


abstract class BaseMlmDebitAccountPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_debit_account';

	
	const CLASS_DEFAULT = 'lib.model.MlmDebitAccount';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DEBIT_ID = 'mlm_debit_account.DEBIT_ID';

	
	const DIST_ID = 'mlm_debit_account.DIST_ID';

	
	const CREATED_BY = 'mlm_debit_account.CREATED_BY';

	
	const CREATED_ON = 'mlm_debit_account.CREATED_ON';

	
	const UPDATED_BY = 'mlm_debit_account.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_debit_account.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DebitId', 'DistId', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDebitAccountPeer::DEBIT_ID, MlmDebitAccountPeer::DIST_ID, MlmDebitAccountPeer::CREATED_BY, MlmDebitAccountPeer::CREATED_ON, MlmDebitAccountPeer::UPDATED_BY, MlmDebitAccountPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('debit_id', 'dist_id', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DebitId' => 0, 'DistId' => 1, 'CreatedBy' => 2, 'CreatedOn' => 3, 'UpdatedBy' => 4, 'UpdatedOn' => 5, ),
		BasePeer::TYPE_COLNAME => array (MlmDebitAccountPeer::DEBIT_ID => 0, MlmDebitAccountPeer::DIST_ID => 1, MlmDebitAccountPeer::CREATED_BY => 2, MlmDebitAccountPeer::CREATED_ON => 3, MlmDebitAccountPeer::UPDATED_BY => 4, MlmDebitAccountPeer::UPDATED_ON => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('debit_id' => 0, 'dist_id' => 1, 'created_by' => 2, 'created_on' => 3, 'updated_by' => 4, 'updated_on' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDebitAccountMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDebitAccountMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDebitAccountPeer::getTableMap();
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
		return str_replace(MlmDebitAccountPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDebitAccountPeer::DEBIT_ID);

		$criteria->addSelectColumn(MlmDebitAccountPeer::DIST_ID);

		$criteria->addSelectColumn(MlmDebitAccountPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDebitAccountPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDebitAccountPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDebitAccountPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_debit_account.DEBIT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_debit_account.DEBIT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDebitAccountPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDebitAccountPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDebitAccountPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDebitAccountPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDebitAccountPeer::populateObjects(MlmDebitAccountPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDebitAccountPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDebitAccountPeer::getOMClass();
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
		return MlmDebitAccountPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDebitAccountPeer::DEBIT_ID); 

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
			$comparison = $criteria->getComparison(MlmDebitAccountPeer::DEBIT_ID);
			$selectCriteria->add(MlmDebitAccountPeer::DEBIT_ID, $criteria->remove(MlmDebitAccountPeer::DEBIT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDebitAccountPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDebitAccountPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDebitAccount) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDebitAccountPeer::DEBIT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDebitAccount $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDebitAccountPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDebitAccountPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDebitAccountPeer::DATABASE_NAME, MlmDebitAccountPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDebitAccountPeer::DATABASE_NAME);

		$criteria->add(MlmDebitAccountPeer::DEBIT_ID, $pk);


		$v = MlmDebitAccountPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDebitAccountPeer::DEBIT_ID, $pks, Criteria::IN);
			$objs = MlmDebitAccountPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDebitAccountPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDebitAccountMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDebitAccountMapBuilder');
}
