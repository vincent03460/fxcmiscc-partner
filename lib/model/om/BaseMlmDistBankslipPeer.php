<?php


abstract class BaseMlmDistBankslipPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_dist_bankslip';

	
	const CLASS_DEFAULT = 'lib.model.MlmDistBankslip';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const BANKSLIP_ID = 'mlm_dist_bankslip.BANKSLIP_ID';

	
	const DIST_ID = 'mlm_dist_bankslip.DIST_ID';

	
	const RANK_ID = 'mlm_dist_bankslip.RANK_ID';

	
	const RANK_CODE = 'mlm_dist_bankslip.RANK_CODE';

	
	const AMOUNT = 'mlm_dist_bankslip.AMOUNT';

	
	const TRANSACTION_TYPE = 'mlm_dist_bankslip.TRANSACTION_TYPE';

	
	const IMAGE_SRC = 'mlm_dist_bankslip.IMAGE_SRC';

	
	const STATUS_CODE = 'mlm_dist_bankslip.STATUS_CODE';

	
	const REMARKS = 'mlm_dist_bankslip.REMARKS';

	
	const APPROVE_REJECT_DATETIME = 'mlm_dist_bankslip.APPROVE_REJECT_DATETIME';

	
	const APPROVED_BY_USERID = 'mlm_dist_bankslip.APPROVED_BY_USERID';

	
	const CREATED_BY = 'mlm_dist_bankslip.CREATED_BY';

	
	const CREATED_ON = 'mlm_dist_bankslip.CREATED_ON';

	
	const UPDATED_BY = 'mlm_dist_bankslip.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_dist_bankslip.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('BankslipId', 'DistId', 'RankId', 'RankCode', 'Amount', 'TransactionType', 'ImageSrc', 'StatusCode', 'Remarks', 'ApproveRejectDatetime', 'ApprovedByUserid', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDistBankslipPeer::BANKSLIP_ID, MlmDistBankslipPeer::DIST_ID, MlmDistBankslipPeer::RANK_ID, MlmDistBankslipPeer::RANK_CODE, MlmDistBankslipPeer::AMOUNT, MlmDistBankslipPeer::TRANSACTION_TYPE, MlmDistBankslipPeer::IMAGE_SRC, MlmDistBankslipPeer::STATUS_CODE, MlmDistBankslipPeer::REMARKS, MlmDistBankslipPeer::APPROVE_REJECT_DATETIME, MlmDistBankslipPeer::APPROVED_BY_USERID, MlmDistBankslipPeer::CREATED_BY, MlmDistBankslipPeer::CREATED_ON, MlmDistBankslipPeer::UPDATED_BY, MlmDistBankslipPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('bankslip_id', 'dist_id', 'rank_id', 'rank_code', 'amount', 'transaction_type', 'image_src', 'status_code', 'remarks', 'approve_reject_datetime', 'approved_by_userid', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('BankslipId' => 0, 'DistId' => 1, 'RankId' => 2, 'RankCode' => 3, 'Amount' => 4, 'TransactionType' => 5, 'ImageSrc' => 6, 'StatusCode' => 7, 'Remarks' => 8, 'ApproveRejectDatetime' => 9, 'ApprovedByUserid' => 10, 'CreatedBy' => 11, 'CreatedOn' => 12, 'UpdatedBy' => 13, 'UpdatedOn' => 14, ),
		BasePeer::TYPE_COLNAME => array (MlmDistBankslipPeer::BANKSLIP_ID => 0, MlmDistBankslipPeer::DIST_ID => 1, MlmDistBankslipPeer::RANK_ID => 2, MlmDistBankslipPeer::RANK_CODE => 3, MlmDistBankslipPeer::AMOUNT => 4, MlmDistBankslipPeer::TRANSACTION_TYPE => 5, MlmDistBankslipPeer::IMAGE_SRC => 6, MlmDistBankslipPeer::STATUS_CODE => 7, MlmDistBankslipPeer::REMARKS => 8, MlmDistBankslipPeer::APPROVE_REJECT_DATETIME => 9, MlmDistBankslipPeer::APPROVED_BY_USERID => 10, MlmDistBankslipPeer::CREATED_BY => 11, MlmDistBankslipPeer::CREATED_ON => 12, MlmDistBankslipPeer::UPDATED_BY => 13, MlmDistBankslipPeer::UPDATED_ON => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('bankslip_id' => 0, 'dist_id' => 1, 'rank_id' => 2, 'rank_code' => 3, 'amount' => 4, 'transaction_type' => 5, 'image_src' => 6, 'status_code' => 7, 'remarks' => 8, 'approve_reject_datetime' => 9, 'approved_by_userid' => 10, 'created_by' => 11, 'created_on' => 12, 'updated_by' => 13, 'updated_on' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDistBankslipMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDistBankslipMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDistBankslipPeer::getTableMap();
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
		return str_replace(MlmDistBankslipPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDistBankslipPeer::BANKSLIP_ID);

		$criteria->addSelectColumn(MlmDistBankslipPeer::DIST_ID);

		$criteria->addSelectColumn(MlmDistBankslipPeer::RANK_ID);

		$criteria->addSelectColumn(MlmDistBankslipPeer::RANK_CODE);

		$criteria->addSelectColumn(MlmDistBankslipPeer::AMOUNT);

		$criteria->addSelectColumn(MlmDistBankslipPeer::TRANSACTION_TYPE);

		$criteria->addSelectColumn(MlmDistBankslipPeer::IMAGE_SRC);

		$criteria->addSelectColumn(MlmDistBankslipPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmDistBankslipPeer::REMARKS);

		$criteria->addSelectColumn(MlmDistBankslipPeer::APPROVE_REJECT_DATETIME);

		$criteria->addSelectColumn(MlmDistBankslipPeer::APPROVED_BY_USERID);

		$criteria->addSelectColumn(MlmDistBankslipPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDistBankslipPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDistBankslipPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDistBankslipPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_dist_bankslip.BANKSLIP_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_dist_bankslip.BANKSLIP_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDistBankslipPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDistBankslipPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDistBankslipPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDistBankslipPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDistBankslipPeer::populateObjects(MlmDistBankslipPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDistBankslipPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = MlmDistBankslipPeer::getOMClass();
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
		return MlmDistBankslipPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} else {
			$criteria = $values->buildCriteria(); 
		}

		$criteria->remove(MlmDistBankslipPeer::BANKSLIP_ID); 


		
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

			$comparison = $criteria->getComparison(MlmDistBankslipPeer::BANKSLIP_ID);
			$selectCriteria->add(MlmDistBankslipPeer::BANKSLIP_ID, $criteria->remove(MlmDistBankslipPeer::BANKSLIP_ID), $comparison);

		} else { 
			$criteria = $values->buildCriteria(); 
			$selectCriteria = $values->buildPkeyCriteria(); 
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 
		try {
			
			
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(MlmDistBankslipPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDistBankslipPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof MlmDistBankslip) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDistBankslipPeer::BANKSLIP_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDistBankslip $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDistBankslipPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDistBankslipPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDistBankslipPeer::DATABASE_NAME, MlmDistBankslipPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDistBankslipPeer::DATABASE_NAME);

		$criteria->add(MlmDistBankslipPeer::BANKSLIP_ID, $pk);


		$v = MlmDistBankslipPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDistBankslipPeer::BANKSLIP_ID, $pks, Criteria::IN);
			$objs = MlmDistBankslipPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseMlmDistBankslipPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/MlmDistBankslipMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDistBankslipMapBuilder');
}
