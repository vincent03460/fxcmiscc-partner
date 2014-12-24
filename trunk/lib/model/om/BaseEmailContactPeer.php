<?php


abstract class BaseEmailContactPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'email_contact';

	
	const CLASS_DEFAULT = 'lib.model.EmailContact';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const EMAIL_ID = 'email_contact.EMAIL_ID';

	
	const REMARK = 'email_contact.REMARK';

	
	const SEND_STATUS = 'email_contact.SEND_STATUS';

	
	const RECEIVER_NAME = 'email_contact.RECEIVER_NAME';

	
	const RECEIVER_COUNTRY = 'email_contact.RECEIVER_COUNTRY';

	
	const RECEIVER_EMAIL = 'email_contact.RECEIVER_EMAIL';

	
	const RECEIVER_CONTACT = 'email_contact.RECEIVER_CONTACT';

	
	const STATUS_CODE = 'email_contact.STATUS_CODE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EmailId', 'Remark', 'SendStatus', 'ReceiverName', 'ReceiverCountry', 'ReceiverEmail', 'ReceiverContact', 'StatusCode', ),
		BasePeer::TYPE_COLNAME => array (EmailContactPeer::EMAIL_ID, EmailContactPeer::REMARK, EmailContactPeer::SEND_STATUS, EmailContactPeer::RECEIVER_NAME, EmailContactPeer::RECEIVER_COUNTRY, EmailContactPeer::RECEIVER_EMAIL, EmailContactPeer::RECEIVER_CONTACT, EmailContactPeer::STATUS_CODE, ),
		BasePeer::TYPE_FIELDNAME => array ('email_id', 'remark', 'send_status', 'receiver_name', 'receiver_country', 'receiver_email', 'receiver_contact', 'status_code', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EmailId' => 0, 'Remark' => 1, 'SendStatus' => 2, 'ReceiverName' => 3, 'ReceiverCountry' => 4, 'ReceiverEmail' => 5, 'ReceiverContact' => 6, 'StatusCode' => 7, ),
		BasePeer::TYPE_COLNAME => array (EmailContactPeer::EMAIL_ID => 0, EmailContactPeer::REMARK => 1, EmailContactPeer::SEND_STATUS => 2, EmailContactPeer::RECEIVER_NAME => 3, EmailContactPeer::RECEIVER_COUNTRY => 4, EmailContactPeer::RECEIVER_EMAIL => 5, EmailContactPeer::RECEIVER_CONTACT => 6, EmailContactPeer::STATUS_CODE => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('email_id' => 0, 'remark' => 1, 'send_status' => 2, 'receiver_name' => 3, 'receiver_country' => 4, 'receiver_email' => 5, 'receiver_contact' => 6, 'status_code' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EmailContactMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EmailContactMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EmailContactPeer::getTableMap();
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
		return str_replace(EmailContactPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EmailContactPeer::EMAIL_ID);

		$criteria->addSelectColumn(EmailContactPeer::REMARK);

		$criteria->addSelectColumn(EmailContactPeer::SEND_STATUS);

		$criteria->addSelectColumn(EmailContactPeer::RECEIVER_NAME);

		$criteria->addSelectColumn(EmailContactPeer::RECEIVER_COUNTRY);

		$criteria->addSelectColumn(EmailContactPeer::RECEIVER_EMAIL);

		$criteria->addSelectColumn(EmailContactPeer::RECEIVER_CONTACT);

		$criteria->addSelectColumn(EmailContactPeer::STATUS_CODE);

	}

	const COUNT = 'COUNT(email_contact.EMAIL_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT email_contact.EMAIL_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EmailContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EmailContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EmailContactPeer::doSelectRS($criteria, $con);
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
		$objects = EmailContactPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EmailContactPeer::populateObjects(EmailContactPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EmailContactPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EmailContactPeer::getOMClass();
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
		return EmailContactPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EmailContactPeer::EMAIL_ID); 

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
			$comparison = $criteria->getComparison(EmailContactPeer::EMAIL_ID);
			$selectCriteria->add(EmailContactPeer::EMAIL_ID, $criteria->remove(EmailContactPeer::EMAIL_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EmailContactPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EmailContactPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EmailContact) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EmailContactPeer::EMAIL_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(EmailContact $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EmailContactPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EmailContactPeer::TABLE_NAME);

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

		return BasePeer::doValidate(EmailContactPeer::DATABASE_NAME, EmailContactPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(EmailContactPeer::DATABASE_NAME);

		$criteria->add(EmailContactPeer::EMAIL_ID, $pk);


		$v = EmailContactPeer::doSelect($criteria, $con);

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
			$criteria->add(EmailContactPeer::EMAIL_ID, $pks, Criteria::IN);
			$objs = EmailContactPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEmailContactPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EmailContactMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EmailContactMapBuilder');
}
