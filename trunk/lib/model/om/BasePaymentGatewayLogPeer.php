<?php


abstract class BasePaymentGatewayLogPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'payment_gateway_log';

	
	const CLASS_DEFAULT = 'lib.model.PaymentGatewayLog';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LOG_ID = 'payment_gateway_log.LOG_ID';

	
	const AMOUNT = 'payment_gateway_log.AMOUNT';

	
	const HANDLING_AMOUNT = 'payment_gateway_log.HANDLING_AMOUNT';

	
	const SUBMIT_STRING = 'payment_gateway_log.SUBMIT_STRING';

	
	const TRANSACTION_TYPE = 'payment_gateway_log.TRANSACTION_TYPE';

	
	const STATUS_CODE = 'payment_gateway_log.STATUS_CODE';

	
	const CREATED_BY = 'payment_gateway_log.CREATED_BY';

	
	const CREATED_ON = 'payment_gateway_log.CREATED_ON';

	
	const UPDATED_BY = 'payment_gateway_log.UPDATED_BY';

	
	const UPDATED_ON = 'payment_gateway_log.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LogId', 'Amount', 'HandlingAmount', 'SubmitString', 'TransactionType', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (PaymentGatewayLogPeer::LOG_ID, PaymentGatewayLogPeer::AMOUNT, PaymentGatewayLogPeer::HANDLING_AMOUNT, PaymentGatewayLogPeer::SUBMIT_STRING, PaymentGatewayLogPeer::TRANSACTION_TYPE, PaymentGatewayLogPeer::STATUS_CODE, PaymentGatewayLogPeer::CREATED_BY, PaymentGatewayLogPeer::CREATED_ON, PaymentGatewayLogPeer::UPDATED_BY, PaymentGatewayLogPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id', 'amount', 'handling_amount', 'submit_string', 'transaction_type', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LogId' => 0, 'Amount' => 1, 'HandlingAmount' => 2, 'SubmitString' => 3, 'TransactionType' => 4, 'StatusCode' => 5, 'CreatedBy' => 6, 'CreatedOn' => 7, 'UpdatedBy' => 8, 'UpdatedOn' => 9, ),
		BasePeer::TYPE_COLNAME => array (PaymentGatewayLogPeer::LOG_ID => 0, PaymentGatewayLogPeer::AMOUNT => 1, PaymentGatewayLogPeer::HANDLING_AMOUNT => 2, PaymentGatewayLogPeer::SUBMIT_STRING => 3, PaymentGatewayLogPeer::TRANSACTION_TYPE => 4, PaymentGatewayLogPeer::STATUS_CODE => 5, PaymentGatewayLogPeer::CREATED_BY => 6, PaymentGatewayLogPeer::CREATED_ON => 7, PaymentGatewayLogPeer::UPDATED_BY => 8, PaymentGatewayLogPeer::UPDATED_ON => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('log_id' => 0, 'amount' => 1, 'handling_amount' => 2, 'submit_string' => 3, 'transaction_type' => 4, 'status_code' => 5, 'created_by' => 6, 'created_on' => 7, 'updated_by' => 8, 'updated_on' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PaymentGatewayLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PaymentGatewayLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PaymentGatewayLogPeer::getTableMap();
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
		return str_replace(PaymentGatewayLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PaymentGatewayLogPeer::LOG_ID);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::AMOUNT);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::HANDLING_AMOUNT);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::SUBMIT_STRING);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::STATUS_CODE);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::CREATED_BY);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::CREATED_ON);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::UPDATED_BY);

		$criteria->addSelectColumn(PaymentGatewayLogPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(payment_gateway_log.LOG_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT payment_gateway_log.LOG_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PaymentGatewayLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PaymentGatewayLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PaymentGatewayLogPeer::doSelectRS($criteria, $con);
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
		$objects = PaymentGatewayLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PaymentGatewayLogPeer::populateObjects(PaymentGatewayLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PaymentGatewayLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PaymentGatewayLogPeer::getOMClass();
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
		return PaymentGatewayLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PaymentGatewayLogPeer::LOG_ID); 

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
			$comparison = $criteria->getComparison(PaymentGatewayLogPeer::LOG_ID);
			$selectCriteria->add(PaymentGatewayLogPeer::LOG_ID, $criteria->remove(PaymentGatewayLogPeer::LOG_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PaymentGatewayLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PaymentGatewayLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PaymentGatewayLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PaymentGatewayLogPeer::LOG_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(PaymentGatewayLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PaymentGatewayLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PaymentGatewayLogPeer::TABLE_NAME);

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

		return BasePeer::doValidate(PaymentGatewayLogPeer::DATABASE_NAME, PaymentGatewayLogPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(PaymentGatewayLogPeer::DATABASE_NAME);

		$criteria->add(PaymentGatewayLogPeer::LOG_ID, $pk);


		$v = PaymentGatewayLogPeer::doSelect($criteria, $con);

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
			$criteria->add(PaymentGatewayLogPeer::LOG_ID, $pks, Criteria::IN);
			$objs = PaymentGatewayLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePaymentGatewayLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PaymentGatewayLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PaymentGatewayLogMapBuilder');
}
