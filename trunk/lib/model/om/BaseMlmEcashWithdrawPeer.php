<?php


abstract class BaseMlmEcashWithdrawPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_ecash_withdraw';

	
	const CLASS_DEFAULT = 'lib.model.MlmEcashWithdraw';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const WITHDRAW_ID = 'mlm_ecash_withdraw.WITHDRAW_ID';

	
	const DIST_ID = 'mlm_ecash_withdraw.DIST_ID';

	
	const DEDUCT = 'mlm_ecash_withdraw.DEDUCT';

	
	const AMOUNT = 'mlm_ecash_withdraw.AMOUNT';

	
	const BANK_IN_TO = 'mlm_ecash_withdraw.BANK_IN_TO';

	
	const STATUS_CODE = 'mlm_ecash_withdraw.STATUS_CODE';

	
	const APPROVE_REJECT_DATETIME = 'mlm_ecash_withdraw.APPROVE_REJECT_DATETIME';

	
	const REMARKS = 'mlm_ecash_withdraw.REMARKS';

	
	const CREATED_BY = 'mlm_ecash_withdraw.CREATED_BY';

	
	const CREATED_ON = 'mlm_ecash_withdraw.CREATED_ON';

	
	const UPDATED_BY = 'mlm_ecash_withdraw.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_ecash_withdraw.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('WithdrawId', 'DistId', 'Deduct', 'Amount', 'BankInTo', 'StatusCode', 'ApproveRejectDatetime', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmEcashWithdrawPeer::WITHDRAW_ID, MlmEcashWithdrawPeer::DIST_ID, MlmEcashWithdrawPeer::DEDUCT, MlmEcashWithdrawPeer::AMOUNT, MlmEcashWithdrawPeer::BANK_IN_TO, MlmEcashWithdrawPeer::STATUS_CODE, MlmEcashWithdrawPeer::APPROVE_REJECT_DATETIME, MlmEcashWithdrawPeer::REMARKS, MlmEcashWithdrawPeer::CREATED_BY, MlmEcashWithdrawPeer::CREATED_ON, MlmEcashWithdrawPeer::UPDATED_BY, MlmEcashWithdrawPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('withdraw_id', 'dist_id', 'deduct', 'amount', 'bank_in_to', 'status_code', 'approve_reject_datetime', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('WithdrawId' => 0, 'DistId' => 1, 'Deduct' => 2, 'Amount' => 3, 'BankInTo' => 4, 'StatusCode' => 5, 'ApproveRejectDatetime' => 6, 'Remarks' => 7, 'CreatedBy' => 8, 'CreatedOn' => 9, 'UpdatedBy' => 10, 'UpdatedOn' => 11, ),
		BasePeer::TYPE_COLNAME => array (MlmEcashWithdrawPeer::WITHDRAW_ID => 0, MlmEcashWithdrawPeer::DIST_ID => 1, MlmEcashWithdrawPeer::DEDUCT => 2, MlmEcashWithdrawPeer::AMOUNT => 3, MlmEcashWithdrawPeer::BANK_IN_TO => 4, MlmEcashWithdrawPeer::STATUS_CODE => 5, MlmEcashWithdrawPeer::APPROVE_REJECT_DATETIME => 6, MlmEcashWithdrawPeer::REMARKS => 7, MlmEcashWithdrawPeer::CREATED_BY => 8, MlmEcashWithdrawPeer::CREATED_ON => 9, MlmEcashWithdrawPeer::UPDATED_BY => 10, MlmEcashWithdrawPeer::UPDATED_ON => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('withdraw_id' => 0, 'dist_id' => 1, 'deduct' => 2, 'amount' => 3, 'bank_in_to' => 4, 'status_code' => 5, 'approve_reject_datetime' => 6, 'remarks' => 7, 'created_by' => 8, 'created_on' => 9, 'updated_by' => 10, 'updated_on' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmEcashWithdrawMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmEcashWithdrawMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmEcashWithdrawPeer::getTableMap();
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
		return str_replace(MlmEcashWithdrawPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::WITHDRAW_ID);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::DIST_ID);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::DEDUCT);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::AMOUNT);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::BANK_IN_TO);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::APPROVE_REJECT_DATETIME);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::REMARKS);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmEcashWithdrawPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_ecash_withdraw.WITHDRAW_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_ecash_withdraw.WITHDRAW_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmEcashWithdrawPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmEcashWithdrawPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmEcashWithdrawPeer::doSelectRS($criteria, $con);
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
		$objects = MlmEcashWithdrawPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmEcashWithdrawPeer::populateObjects(MlmEcashWithdrawPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmEcashWithdrawPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmEcashWithdrawPeer::getOMClass();
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
		return MlmEcashWithdrawPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmEcashWithdrawPeer::WITHDRAW_ID); 

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
			$comparison = $criteria->getComparison(MlmEcashWithdrawPeer::WITHDRAW_ID);
			$selectCriteria->add(MlmEcashWithdrawPeer::WITHDRAW_ID, $criteria->remove(MlmEcashWithdrawPeer::WITHDRAW_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmEcashWithdrawPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmEcashWithdrawPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmEcashWithdraw) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmEcashWithdrawPeer::WITHDRAW_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmEcashWithdraw $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmEcashWithdrawPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmEcashWithdrawPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmEcashWithdrawPeer::DATABASE_NAME, MlmEcashWithdrawPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmEcashWithdrawPeer::DATABASE_NAME);

		$criteria->add(MlmEcashWithdrawPeer::WITHDRAW_ID, $pk);


		$v = MlmEcashWithdrawPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmEcashWithdrawPeer::WITHDRAW_ID, $pks, Criteria::IN);
			$objs = MlmEcashWithdrawPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmEcashWithdrawPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmEcashWithdrawMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmEcashWithdrawMapBuilder');
}
