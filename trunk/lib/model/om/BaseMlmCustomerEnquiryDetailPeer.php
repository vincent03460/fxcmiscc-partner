<?php


abstract class BaseMlmCustomerEnquiryDetailPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_customer_enquiry_detail';

	
	const CLASS_DEFAULT = 'lib.model.MlmCustomerEnquiryDetail';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DETAIL_ID = 'mlm_customer_enquiry_detail.DETAIL_ID';

	
	const CUSTOMER_ENQUIRY_ID = 'mlm_customer_enquiry_detail.CUSTOMER_ENQUIRY_ID';

	
	const MESSAGE = 'mlm_customer_enquiry_detail.MESSAGE';

	
	const REPLY_FROM = 'mlm_customer_enquiry_detail.REPLY_FROM';

	
	const STATUS_CODE = 'mlm_customer_enquiry_detail.STATUS_CODE';

	
	const CREATED_BY = 'mlm_customer_enquiry_detail.CREATED_BY';

	
	const CREATED_ON = 'mlm_customer_enquiry_detail.CREATED_ON';

	
	const UPDATED_BY = 'mlm_customer_enquiry_detail.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_customer_enquiry_detail.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DetailId', 'CustomerEnquiryId', 'Message', 'ReplyFrom', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmCustomerEnquiryDetailPeer::DETAIL_ID, MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID, MlmCustomerEnquiryDetailPeer::MESSAGE, MlmCustomerEnquiryDetailPeer::REPLY_FROM, MlmCustomerEnquiryDetailPeer::STATUS_CODE, MlmCustomerEnquiryDetailPeer::CREATED_BY, MlmCustomerEnquiryDetailPeer::CREATED_ON, MlmCustomerEnquiryDetailPeer::UPDATED_BY, MlmCustomerEnquiryDetailPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('detail_id', 'customer_enquiry_id', 'message', 'reply_from', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DetailId' => 0, 'CustomerEnquiryId' => 1, 'Message' => 2, 'ReplyFrom' => 3, 'StatusCode' => 4, 'CreatedBy' => 5, 'CreatedOn' => 6, 'UpdatedBy' => 7, 'UpdatedOn' => 8, ),
		BasePeer::TYPE_COLNAME => array (MlmCustomerEnquiryDetailPeer::DETAIL_ID => 0, MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID => 1, MlmCustomerEnquiryDetailPeer::MESSAGE => 2, MlmCustomerEnquiryDetailPeer::REPLY_FROM => 3, MlmCustomerEnquiryDetailPeer::STATUS_CODE => 4, MlmCustomerEnquiryDetailPeer::CREATED_BY => 5, MlmCustomerEnquiryDetailPeer::CREATED_ON => 6, MlmCustomerEnquiryDetailPeer::UPDATED_BY => 7, MlmCustomerEnquiryDetailPeer::UPDATED_ON => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('detail_id' => 0, 'customer_enquiry_id' => 1, 'message' => 2, 'reply_from' => 3, 'status_code' => 4, 'created_by' => 5, 'created_on' => 6, 'updated_by' => 7, 'updated_on' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmCustomerEnquiryDetailMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmCustomerEnquiryDetailMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmCustomerEnquiryDetailPeer::getTableMap();
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
		return str_replace(MlmCustomerEnquiryDetailPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::DETAIL_ID);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::MESSAGE);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::REPLY_FROM);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_customer_enquiry_detail.DETAIL_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_customer_enquiry_detail.DETAIL_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmCustomerEnquiryDetailPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmCustomerEnquiryDetailPeer::doSelectRS($criteria, $con);
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
		$objects = MlmCustomerEnquiryDetailPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmCustomerEnquiryDetailPeer::populateObjects(MlmCustomerEnquiryDetailPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmCustomerEnquiryDetailPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmCustomerEnquiryDetailPeer::getOMClass();
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
		return MlmCustomerEnquiryDetailPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmCustomerEnquiryDetailPeer::DETAIL_ID); 

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
			$comparison = $criteria->getComparison(MlmCustomerEnquiryDetailPeer::DETAIL_ID);
			$selectCriteria->add(MlmCustomerEnquiryDetailPeer::DETAIL_ID, $criteria->remove(MlmCustomerEnquiryDetailPeer::DETAIL_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmCustomerEnquiryDetailPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmCustomerEnquiryDetailPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmCustomerEnquiryDetail) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmCustomerEnquiryDetailPeer::DETAIL_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmCustomerEnquiryDetail $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmCustomerEnquiryDetailPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmCustomerEnquiryDetailPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmCustomerEnquiryDetailPeer::DATABASE_NAME, MlmCustomerEnquiryDetailPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmCustomerEnquiryDetailPeer::DATABASE_NAME);

		$criteria->add(MlmCustomerEnquiryDetailPeer::DETAIL_ID, $pk);


		$v = MlmCustomerEnquiryDetailPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmCustomerEnquiryDetailPeer::DETAIL_ID, $pks, Criteria::IN);
			$objs = MlmCustomerEnquiryDetailPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmCustomerEnquiryDetailPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmCustomerEnquiryDetailMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmCustomerEnquiryDetailMapBuilder');
}
