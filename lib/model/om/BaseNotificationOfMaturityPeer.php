<?php


abstract class BaseNotificationOfMaturityPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'notification_of_maturity';

	
	const CLASS_DEFAULT = 'lib.model.NotificationOfMaturity';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NOTICE_ID = 'notification_of_maturity.NOTICE_ID';

	
	const DIST_ID = 'notification_of_maturity.DIST_ID';

	
	const MT4_USER_NAME = 'notification_of_maturity.MT4_USER_NAME';

	
	const DIVIDEND_DATE = 'notification_of_maturity.DIVIDEND_DATE';

	
	const MATURITY_TYPE = 'notification_of_maturity.MATURITY_TYPE';

	
	const EMAIL = 'notification_of_maturity.EMAIL';

	
	const RETRY = 'notification_of_maturity.RETRY';

	
	const REMARK = 'notification_of_maturity.REMARK';

	
	const INTERNAL_REMARK = 'notification_of_maturity.INTERNAL_REMARK';

	
	const EMAIL_STATUS = 'notification_of_maturity.EMAIL_STATUS';

	
	const STATUS_CODE = 'notification_of_maturity.STATUS_CODE';

	
	const APPROVE_REJECT_DATETIME = 'notification_of_maturity.APPROVE_REJECT_DATETIME';

	
	const CLIENT_RESPONSE_DATATIME = 'notification_of_maturity.CLIENT_RESPONSE_DATATIME';

	
	const MT4_BALANCE = 'notification_of_maturity.MT4_BALANCE';

	
	const PACKAGE_PRICE = 'notification_of_maturity.PACKAGE_PRICE';

	
	const LEADER_DIST_ID = 'notification_of_maturity.LEADER_DIST_ID';

	
	const CREATED_BY = 'notification_of_maturity.CREATED_BY';

	
	const CREATED_ON = 'notification_of_maturity.CREATED_ON';

	
	const UPDATED_BY = 'notification_of_maturity.UPDATED_BY';

	
	const UPDATED_ON = 'notification_of_maturity.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('NoticeId', 'DistId', 'Mt4UserName', 'DividendDate', 'MaturityType', 'Email', 'Retry', 'Remark', 'InternalRemark', 'EmailStatus', 'StatusCode', 'ApproveRejectDatetime', 'ClientResponseDatatime', 'Mt4Balance', 'PackagePrice', 'LeaderDistId', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (NotificationOfMaturityPeer::NOTICE_ID, NotificationOfMaturityPeer::DIST_ID, NotificationOfMaturityPeer::MT4_USER_NAME, NotificationOfMaturityPeer::DIVIDEND_DATE, NotificationOfMaturityPeer::MATURITY_TYPE, NotificationOfMaturityPeer::EMAIL, NotificationOfMaturityPeer::RETRY, NotificationOfMaturityPeer::REMARK, NotificationOfMaturityPeer::INTERNAL_REMARK, NotificationOfMaturityPeer::EMAIL_STATUS, NotificationOfMaturityPeer::STATUS_CODE, NotificationOfMaturityPeer::APPROVE_REJECT_DATETIME, NotificationOfMaturityPeer::CLIENT_RESPONSE_DATATIME, NotificationOfMaturityPeer::MT4_BALANCE, NotificationOfMaturityPeer::PACKAGE_PRICE, NotificationOfMaturityPeer::LEADER_DIST_ID, NotificationOfMaturityPeer::CREATED_BY, NotificationOfMaturityPeer::CREATED_ON, NotificationOfMaturityPeer::UPDATED_BY, NotificationOfMaturityPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('notice_id', 'dist_id', 'mt4_user_name', 'dividend_date', 'maturity_type', 'email', 'retry', 'remark', 'internal_remark', 'email_status', 'status_code', 'approve_reject_datetime', 'client_response_datatime', 'mt4_balance', 'package_price', 'leader_dist_id', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('NoticeId' => 0, 'DistId' => 1, 'Mt4UserName' => 2, 'DividendDate' => 3, 'MaturityType' => 4, 'Email' => 5, 'Retry' => 6, 'Remark' => 7, 'InternalRemark' => 8, 'EmailStatus' => 9, 'StatusCode' => 10, 'ApproveRejectDatetime' => 11, 'ClientResponseDatatime' => 12, 'Mt4Balance' => 13, 'PackagePrice' => 14, 'LeaderDistId' => 15, 'CreatedBy' => 16, 'CreatedOn' => 17, 'UpdatedBy' => 18, 'UpdatedOn' => 19, ),
		BasePeer::TYPE_COLNAME => array (NotificationOfMaturityPeer::NOTICE_ID => 0, NotificationOfMaturityPeer::DIST_ID => 1, NotificationOfMaturityPeer::MT4_USER_NAME => 2, NotificationOfMaturityPeer::DIVIDEND_DATE => 3, NotificationOfMaturityPeer::MATURITY_TYPE => 4, NotificationOfMaturityPeer::EMAIL => 5, NotificationOfMaturityPeer::RETRY => 6, NotificationOfMaturityPeer::REMARK => 7, NotificationOfMaturityPeer::INTERNAL_REMARK => 8, NotificationOfMaturityPeer::EMAIL_STATUS => 9, NotificationOfMaturityPeer::STATUS_CODE => 10, NotificationOfMaturityPeer::APPROVE_REJECT_DATETIME => 11, NotificationOfMaturityPeer::CLIENT_RESPONSE_DATATIME => 12, NotificationOfMaturityPeer::MT4_BALANCE => 13, NotificationOfMaturityPeer::PACKAGE_PRICE => 14, NotificationOfMaturityPeer::LEADER_DIST_ID => 15, NotificationOfMaturityPeer::CREATED_BY => 16, NotificationOfMaturityPeer::CREATED_ON => 17, NotificationOfMaturityPeer::UPDATED_BY => 18, NotificationOfMaturityPeer::UPDATED_ON => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('notice_id' => 0, 'dist_id' => 1, 'mt4_user_name' => 2, 'dividend_date' => 3, 'maturity_type' => 4, 'email' => 5, 'retry' => 6, 'remark' => 7, 'internal_remark' => 8, 'email_status' => 9, 'status_code' => 10, 'approve_reject_datetime' => 11, 'client_response_datatime' => 12, 'mt4_balance' => 13, 'package_price' => 14, 'leader_dist_id' => 15, 'created_by' => 16, 'created_on' => 17, 'updated_by' => 18, 'updated_on' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NotificationOfMaturityMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NotificationOfMaturityMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NotificationOfMaturityPeer::getTableMap();
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
		return str_replace(NotificationOfMaturityPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NotificationOfMaturityPeer::NOTICE_ID);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::DIST_ID);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::MT4_USER_NAME);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::DIVIDEND_DATE);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::MATURITY_TYPE);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::EMAIL);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::RETRY);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::REMARK);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::INTERNAL_REMARK);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::EMAIL_STATUS);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::STATUS_CODE);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::APPROVE_REJECT_DATETIME);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::CLIENT_RESPONSE_DATATIME);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::MT4_BALANCE);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::PACKAGE_PRICE);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::LEADER_DIST_ID);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::CREATED_BY);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::CREATED_ON);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::UPDATED_BY);

		$criteria->addSelectColumn(NotificationOfMaturityPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(notification_of_maturity.NOTICE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT notification_of_maturity.NOTICE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NotificationOfMaturityPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationOfMaturityPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NotificationOfMaturityPeer::doSelectRS($criteria, $con);
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
		$objects = NotificationOfMaturityPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NotificationOfMaturityPeer::populateObjects(NotificationOfMaturityPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NotificationOfMaturityPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NotificationOfMaturityPeer::getOMClass();
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
		return NotificationOfMaturityPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NotificationOfMaturityPeer::NOTICE_ID); 

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
			$comparison = $criteria->getComparison(NotificationOfMaturityPeer::NOTICE_ID);
			$selectCriteria->add(NotificationOfMaturityPeer::NOTICE_ID, $criteria->remove(NotificationOfMaturityPeer::NOTICE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NotificationOfMaturityPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NotificationOfMaturityPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NotificationOfMaturity) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NotificationOfMaturityPeer::NOTICE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NotificationOfMaturity $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NotificationOfMaturityPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NotificationOfMaturityPeer::TABLE_NAME);

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

		return BasePeer::doValidate(NotificationOfMaturityPeer::DATABASE_NAME, NotificationOfMaturityPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(NotificationOfMaturityPeer::DATABASE_NAME);

		$criteria->add(NotificationOfMaturityPeer::NOTICE_ID, $pk);


		$v = NotificationOfMaturityPeer::doSelect($criteria, $con);

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
			$criteria->add(NotificationOfMaturityPeer::NOTICE_ID, $pks, Criteria::IN);
			$objs = NotificationOfMaturityPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNotificationOfMaturityPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NotificationOfMaturityMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NotificationOfMaturityMapBuilder');
}
