<?php


abstract class BaseMlmCustomerEnquiryPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_customer_enquiry';

	
	const CLASS_DEFAULT = 'lib.model.MlmCustomerEnquiry';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ENQUIRY_ID = 'mlm_customer_enquiry.ENQUIRY_ID';

	
	const DISTRIBUTOR_ID = 'mlm_customer_enquiry.DISTRIBUTOR_ID';

	
	const CONTACT_NO = 'mlm_customer_enquiry.CONTACT_NO';

	
	const TITLE = 'mlm_customer_enquiry.TITLE';

	
	const ADMIN_READ = 'mlm_customer_enquiry.ADMIN_READ';

	
	const ADMIN_UPDATED = 'mlm_customer_enquiry.ADMIN_UPDATED';

	
	const DISTRIBUTOR_READ = 'mlm_customer_enquiry.DISTRIBUTOR_READ';

	
	const DISTRIBUTOR_UPDATED = 'mlm_customer_enquiry.DISTRIBUTOR_UPDATED';

	
	const CREATED_BY = 'mlm_customer_enquiry.CREATED_BY';

	
	const CREATED_ON = 'mlm_customer_enquiry.CREATED_ON';

	
	const UPDATED_BY = 'mlm_customer_enquiry.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_customer_enquiry.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('EnquiryId', 'DistributorId', 'ContactNo', 'Title', 'AdminRead', 'AdminUpdated', 'DistributorRead', 'DistributorUpdated', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmCustomerEnquiryPeer::ENQUIRY_ID, MlmCustomerEnquiryPeer::DISTRIBUTOR_ID, MlmCustomerEnquiryPeer::CONTACT_NO, MlmCustomerEnquiryPeer::TITLE, MlmCustomerEnquiryPeer::ADMIN_READ, MlmCustomerEnquiryPeer::ADMIN_UPDATED, MlmCustomerEnquiryPeer::DISTRIBUTOR_READ, MlmCustomerEnquiryPeer::DISTRIBUTOR_UPDATED, MlmCustomerEnquiryPeer::CREATED_BY, MlmCustomerEnquiryPeer::CREATED_ON, MlmCustomerEnquiryPeer::UPDATED_BY, MlmCustomerEnquiryPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('enquiry_id', 'distributor_id', 'contact_no', 'title', 'admin_read', 'admin_updated', 'distributor_read', 'distributor_updated', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('EnquiryId' => 0, 'DistributorId' => 1, 'ContactNo' => 2, 'Title' => 3, 'AdminRead' => 4, 'AdminUpdated' => 5, 'DistributorRead' => 6, 'DistributorUpdated' => 7, 'CreatedBy' => 8, 'CreatedOn' => 9, 'UpdatedBy' => 10, 'UpdatedOn' => 11, ),
		BasePeer::TYPE_COLNAME => array (MlmCustomerEnquiryPeer::ENQUIRY_ID => 0, MlmCustomerEnquiryPeer::DISTRIBUTOR_ID => 1, MlmCustomerEnquiryPeer::CONTACT_NO => 2, MlmCustomerEnquiryPeer::TITLE => 3, MlmCustomerEnquiryPeer::ADMIN_READ => 4, MlmCustomerEnquiryPeer::ADMIN_UPDATED => 5, MlmCustomerEnquiryPeer::DISTRIBUTOR_READ => 6, MlmCustomerEnquiryPeer::DISTRIBUTOR_UPDATED => 7, MlmCustomerEnquiryPeer::CREATED_BY => 8, MlmCustomerEnquiryPeer::CREATED_ON => 9, MlmCustomerEnquiryPeer::UPDATED_BY => 10, MlmCustomerEnquiryPeer::UPDATED_ON => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('enquiry_id' => 0, 'distributor_id' => 1, 'contact_no' => 2, 'title' => 3, 'admin_read' => 4, 'admin_updated' => 5, 'distributor_read' => 6, 'distributor_updated' => 7, 'created_by' => 8, 'created_on' => 9, 'updated_by' => 10, 'updated_on' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmCustomerEnquiryMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmCustomerEnquiryMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmCustomerEnquiryPeer::getTableMap();
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
		return str_replace(MlmCustomerEnquiryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::ENQUIRY_ID);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::DISTRIBUTOR_ID);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::CONTACT_NO);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::TITLE);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::ADMIN_READ);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::ADMIN_UPDATED);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::DISTRIBUTOR_READ);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::DISTRIBUTOR_UPDATED);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmCustomerEnquiryPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_customer_enquiry.ENQUIRY_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_customer_enquiry.ENQUIRY_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmCustomerEnquiryPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmCustomerEnquiryPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmCustomerEnquiryPeer::doSelectRS($criteria, $con);
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
		$objects = MlmCustomerEnquiryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmCustomerEnquiryPeer::populateObjects(MlmCustomerEnquiryPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmCustomerEnquiryPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmCustomerEnquiryPeer::getOMClass();
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
		return MlmCustomerEnquiryPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmCustomerEnquiryPeer::ENQUIRY_ID); 

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
			$comparison = $criteria->getComparison(MlmCustomerEnquiryPeer::ENQUIRY_ID);
			$selectCriteria->add(MlmCustomerEnquiryPeer::ENQUIRY_ID, $criteria->remove(MlmCustomerEnquiryPeer::ENQUIRY_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmCustomerEnquiryPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmCustomerEnquiryPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmCustomerEnquiry) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmCustomerEnquiryPeer::ENQUIRY_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmCustomerEnquiry $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmCustomerEnquiryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmCustomerEnquiryPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmCustomerEnquiryPeer::DATABASE_NAME, MlmCustomerEnquiryPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmCustomerEnquiryPeer::DATABASE_NAME);

		$criteria->add(MlmCustomerEnquiryPeer::ENQUIRY_ID, $pk);


		$v = MlmCustomerEnquiryPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmCustomerEnquiryPeer::ENQUIRY_ID, $pks, Criteria::IN);
			$objs = MlmCustomerEnquiryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmCustomerEnquiryPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmCustomerEnquiryMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmCustomerEnquiryMapBuilder');
}
