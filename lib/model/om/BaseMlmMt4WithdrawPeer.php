<?php


abstract class BaseMlmMt4WithdrawPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_mt4_withdraw';

	
	const CLASS_DEFAULT = 'lib.model.MlmMt4Withdraw';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const WITHDRAW_ID = 'mlm_mt4_withdraw.WITHDRAW_ID';

	
	const DIST_ID = 'mlm_mt4_withdraw.DIST_ID';

	
	const MT4_USER_NAME = 'mlm_mt4_withdraw.MT4_USER_NAME';

	
	const AMOUNT_REQUESTED = 'mlm_mt4_withdraw.AMOUNT_REQUESTED';

	
	const HANDLING_FEE = 'mlm_mt4_withdraw.HANDLING_FEE';

	
	const GRAND_AMOUNT = 'mlm_mt4_withdraw.GRAND_AMOUNT';

	
	const CURRENCY_CODE = 'mlm_mt4_withdraw.CURRENCY_CODE';

	
	const PAYMENT_TYPE = 'mlm_mt4_withdraw.PAYMENT_TYPE';

	
	const STATUS_CODE = 'mlm_mt4_withdraw.STATUS_CODE';

	
	const APPROVE_REJECT_DATETIME = 'mlm_mt4_withdraw.APPROVE_REJECT_DATETIME';

	
	const REMARKS = 'mlm_mt4_withdraw.REMARKS';

	
	const CREATED_BY = 'mlm_mt4_withdraw.CREATED_BY';

	
	const CREATED_ON = 'mlm_mt4_withdraw.CREATED_ON';

	
	const UPDATED_BY = 'mlm_mt4_withdraw.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_mt4_withdraw.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('WithdrawId', 'DistId', 'Mt4UserName', 'AmountRequested', 'HandlingFee', 'GrandAmount', 'CurrencyCode', 'PaymentType', 'StatusCode', 'ApproveRejectDatetime', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmMt4WithdrawPeer::WITHDRAW_ID, MlmMt4WithdrawPeer::DIST_ID, MlmMt4WithdrawPeer::MT4_USER_NAME, MlmMt4WithdrawPeer::AMOUNT_REQUESTED, MlmMt4WithdrawPeer::HANDLING_FEE, MlmMt4WithdrawPeer::GRAND_AMOUNT, MlmMt4WithdrawPeer::CURRENCY_CODE, MlmMt4WithdrawPeer::PAYMENT_TYPE, MlmMt4WithdrawPeer::STATUS_CODE, MlmMt4WithdrawPeer::APPROVE_REJECT_DATETIME, MlmMt4WithdrawPeer::REMARKS, MlmMt4WithdrawPeer::CREATED_BY, MlmMt4WithdrawPeer::CREATED_ON, MlmMt4WithdrawPeer::UPDATED_BY, MlmMt4WithdrawPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('withdraw_id', 'dist_id', 'mt4_user_name', 'amount_requested', 'handling_fee', 'grand_amount', 'currency_code', 'payment_type', 'status_code', 'approve_reject_datetime', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('WithdrawId' => 0, 'DistId' => 1, 'Mt4UserName' => 2, 'AmountRequested' => 3, 'HandlingFee' => 4, 'GrandAmount' => 5, 'CurrencyCode' => 6, 'PaymentType' => 7, 'StatusCode' => 8, 'ApproveRejectDatetime' => 9, 'Remarks' => 10, 'CreatedBy' => 11, 'CreatedOn' => 12, 'UpdatedBy' => 13, 'UpdatedOn' => 14, ),
		BasePeer::TYPE_COLNAME => array (MlmMt4WithdrawPeer::WITHDRAW_ID => 0, MlmMt4WithdrawPeer::DIST_ID => 1, MlmMt4WithdrawPeer::MT4_USER_NAME => 2, MlmMt4WithdrawPeer::AMOUNT_REQUESTED => 3, MlmMt4WithdrawPeer::HANDLING_FEE => 4, MlmMt4WithdrawPeer::GRAND_AMOUNT => 5, MlmMt4WithdrawPeer::CURRENCY_CODE => 6, MlmMt4WithdrawPeer::PAYMENT_TYPE => 7, MlmMt4WithdrawPeer::STATUS_CODE => 8, MlmMt4WithdrawPeer::APPROVE_REJECT_DATETIME => 9, MlmMt4WithdrawPeer::REMARKS => 10, MlmMt4WithdrawPeer::CREATED_BY => 11, MlmMt4WithdrawPeer::CREATED_ON => 12, MlmMt4WithdrawPeer::UPDATED_BY => 13, MlmMt4WithdrawPeer::UPDATED_ON => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('withdraw_id' => 0, 'dist_id' => 1, 'mt4_user_name' => 2, 'amount_requested' => 3, 'handling_fee' => 4, 'grand_amount' => 5, 'currency_code' => 6, 'payment_type' => 7, 'status_code' => 8, 'approve_reject_datetime' => 9, 'remarks' => 10, 'created_by' => 11, 'created_on' => 12, 'updated_by' => 13, 'updated_on' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmMt4WithdrawMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmMt4WithdrawMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmMt4WithdrawPeer::getTableMap();
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
		return str_replace(MlmMt4WithdrawPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::WITHDRAW_ID);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::DIST_ID);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::MT4_USER_NAME);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::AMOUNT_REQUESTED);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::HANDLING_FEE);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::GRAND_AMOUNT);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::CURRENCY_CODE);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::PAYMENT_TYPE);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::APPROVE_REJECT_DATETIME);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::REMARKS);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmMt4WithdrawPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_mt4_withdraw.WITHDRAW_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_mt4_withdraw.WITHDRAW_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmMt4WithdrawPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmMt4WithdrawPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmMt4WithdrawPeer::doSelectRS($criteria, $con);
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
		$objects = MlmMt4WithdrawPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmMt4WithdrawPeer::populateObjects(MlmMt4WithdrawPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmMt4WithdrawPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmMt4WithdrawPeer::getOMClass();
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
		return MlmMt4WithdrawPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmMt4WithdrawPeer::WITHDRAW_ID); 

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
			$comparison = $criteria->getComparison(MlmMt4WithdrawPeer::WITHDRAW_ID);
			$selectCriteria->add(MlmMt4WithdrawPeer::WITHDRAW_ID, $criteria->remove(MlmMt4WithdrawPeer::WITHDRAW_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmMt4WithdrawPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmMt4WithdrawPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmMt4Withdraw) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmMt4WithdrawPeer::WITHDRAW_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmMt4Withdraw $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmMt4WithdrawPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmMt4WithdrawPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmMt4WithdrawPeer::DATABASE_NAME, MlmMt4WithdrawPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmMt4WithdrawPeer::DATABASE_NAME);

		$criteria->add(MlmMt4WithdrawPeer::WITHDRAW_ID, $pk);


		$v = MlmMt4WithdrawPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmMt4WithdrawPeer::WITHDRAW_ID, $pks, Criteria::IN);
			$objs = MlmMt4WithdrawPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmMt4WithdrawPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmMt4WithdrawMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmMt4WithdrawMapBuilder');
}
