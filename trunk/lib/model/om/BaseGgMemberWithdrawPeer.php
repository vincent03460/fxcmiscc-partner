<?php


abstract class BaseGgMemberWithdrawPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_member_withdraw';

	
	const CLASS_DEFAULT = 'lib.model.GgMemberWithdraw';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_member_withdraw.ID';

	
	const UID = 'gg_member_withdraw.UID';

	
	const AMOUNT = 'gg_member_withdraw.AMOUNT';

	
	const WITHDRAW_AMOUNT = 'gg_member_withdraw.WITHDRAW_AMOUNT';

	
	const CHARGES = 'gg_member_withdraw.CHARGES';

	
	const RATE = 'gg_member_withdraw.RATE';

	
	const CONVERT_AMOUNT = 'gg_member_withdraw.CONVERT_AMOUNT';

	
	const PAYMENT_TYPE = 'gg_member_withdraw.PAYMENT_TYPE';

	
	const ACC_NAME = 'gg_member_withdraw.ACC_NAME';

	
	const ACC_PAYEE_NAME = 'gg_member_withdraw.ACC_PAYEE_NAME';

	
	const ACC_NO = 'gg_member_withdraw.ACC_NO';

	
	const PAYMENT_DATE = 'gg_member_withdraw.PAYMENT_DATE';

	
	const PAYMENT_REMARK = 'gg_member_withdraw.PAYMENT_REMARK';

	
	const REMARK = 'gg_member_withdraw.REMARK';

	
	const AUTOWIT = 'gg_member_withdraw.AUTOWIT';

	
	const STATUS = 'gg_member_withdraw.STATUS';

	
	const CDATE = 'gg_member_withdraw.CDATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Amount', 'WithdrawAmount', 'Charges', 'Rate', 'ConvertAmount', 'PaymentType', 'AccName', 'AccPayeeName', 'AccNo', 'PaymentDate', 'PaymentRemark', 'Remark', 'Autowit', 'Status', 'Cdate', ),
		BasePeer::TYPE_COLNAME => array (GgMemberWithdrawPeer::ID, GgMemberWithdrawPeer::UID, GgMemberWithdrawPeer::AMOUNT, GgMemberWithdrawPeer::WITHDRAW_AMOUNT, GgMemberWithdrawPeer::CHARGES, GgMemberWithdrawPeer::RATE, GgMemberWithdrawPeer::CONVERT_AMOUNT, GgMemberWithdrawPeer::PAYMENT_TYPE, GgMemberWithdrawPeer::ACC_NAME, GgMemberWithdrawPeer::ACC_PAYEE_NAME, GgMemberWithdrawPeer::ACC_NO, GgMemberWithdrawPeer::PAYMENT_DATE, GgMemberWithdrawPeer::PAYMENT_REMARK, GgMemberWithdrawPeer::REMARK, GgMemberWithdrawPeer::AUTOWIT, GgMemberWithdrawPeer::STATUS, GgMemberWithdrawPeer::CDATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'amount', 'withdraw_amount', 'charges', 'rate', 'convert_amount', 'payment_type', 'acc_name', 'acc_payee_name', 'acc_no', 'payment_date', 'payment_remark', 'remark', 'autowit', 'status', 'cdate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Amount' => 2, 'WithdrawAmount' => 3, 'Charges' => 4, 'Rate' => 5, 'ConvertAmount' => 6, 'PaymentType' => 7, 'AccName' => 8, 'AccPayeeName' => 9, 'AccNo' => 10, 'PaymentDate' => 11, 'PaymentRemark' => 12, 'Remark' => 13, 'Autowit' => 14, 'Status' => 15, 'Cdate' => 16, ),
		BasePeer::TYPE_COLNAME => array (GgMemberWithdrawPeer::ID => 0, GgMemberWithdrawPeer::UID => 1, GgMemberWithdrawPeer::AMOUNT => 2, GgMemberWithdrawPeer::WITHDRAW_AMOUNT => 3, GgMemberWithdrawPeer::CHARGES => 4, GgMemberWithdrawPeer::RATE => 5, GgMemberWithdrawPeer::CONVERT_AMOUNT => 6, GgMemberWithdrawPeer::PAYMENT_TYPE => 7, GgMemberWithdrawPeer::ACC_NAME => 8, GgMemberWithdrawPeer::ACC_PAYEE_NAME => 9, GgMemberWithdrawPeer::ACC_NO => 10, GgMemberWithdrawPeer::PAYMENT_DATE => 11, GgMemberWithdrawPeer::PAYMENT_REMARK => 12, GgMemberWithdrawPeer::REMARK => 13, GgMemberWithdrawPeer::AUTOWIT => 14, GgMemberWithdrawPeer::STATUS => 15, GgMemberWithdrawPeer::CDATE => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'amount' => 2, 'withdraw_amount' => 3, 'charges' => 4, 'rate' => 5, 'convert_amount' => 6, 'payment_type' => 7, 'acc_name' => 8, 'acc_payee_name' => 9, 'acc_no' => 10, 'payment_date' => 11, 'payment_remark' => 12, 'remark' => 13, 'autowit' => 14, 'status' => 15, 'cdate' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgMemberWithdrawMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgMemberWithdrawMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgMemberWithdrawPeer::getTableMap();
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
		return str_replace(GgMemberWithdrawPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgMemberWithdrawPeer::ID);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::UID);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::AMOUNT);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::WITHDRAW_AMOUNT);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::CHARGES);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::RATE);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::CONVERT_AMOUNT);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::PAYMENT_TYPE);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::ACC_NAME);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::ACC_PAYEE_NAME);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::ACC_NO);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::PAYMENT_DATE);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::PAYMENT_REMARK);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::REMARK);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::AUTOWIT);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::STATUS);

		$criteria->addSelectColumn(GgMemberWithdrawPeer::CDATE);

	}

	const COUNT = 'COUNT(gg_member_withdraw.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_member_withdraw.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgMemberWithdrawPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgMemberWithdrawPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgMemberWithdrawPeer::doSelectRS($criteria, $con);
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
		$objects = GgMemberWithdrawPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgMemberWithdrawPeer::populateObjects(GgMemberWithdrawPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgMemberWithdrawPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgMemberWithdrawPeer::getOMClass();
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
		return GgMemberWithdrawPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgMemberWithdrawPeer::ID); 

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
			$comparison = $criteria->getComparison(GgMemberWithdrawPeer::ID);
			$selectCriteria->add(GgMemberWithdrawPeer::ID, $criteria->remove(GgMemberWithdrawPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgMemberWithdrawPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgMemberWithdrawPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgMemberWithdraw) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgMemberWithdrawPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgMemberWithdraw $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgMemberWithdrawPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgMemberWithdrawPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgMemberWithdrawPeer::DATABASE_NAME, GgMemberWithdrawPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgMemberWithdrawPeer::DATABASE_NAME);

		$criteria->add(GgMemberWithdrawPeer::ID, $pk);


		$v = GgMemberWithdrawPeer::doSelect($criteria, $con);

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
			$criteria->add(GgMemberWithdrawPeer::ID, $pks, Criteria::IN);
			$objs = GgMemberWithdrawPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgMemberWithdrawPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgMemberWithdrawMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgMemberWithdrawMapBuilder');
}
