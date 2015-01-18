<?php


abstract class BaseImeReportPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ime_report';

	
	const CLASS_DEFAULT = 'lib.model.ImeReport';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REPORT_ID = 'ime_report.REPORT_ID';

	
	const DIST_ID = 'ime_report.DIST_ID';

	
	const BONUS_TYPE = 'ime_report.BONUS_TYPE';

	
	const SMALL_LEG = 'ime_report.SMALL_LEG';

	
	const PERSONAL_SALES = 'ime_report.PERSONAL_SALES';

	
	const TICKET_QTY = 'ime_report.TICKET_QTY';

	
	const DISTRIBUTOR_CODE = 'ime_report.DISTRIBUTOR_CODE';

	
	const FULL_NAME = 'ime_report.FULL_NAME';

	
	const EMAIL = 'ime_report.EMAIL';

	
	const CONTACT = 'ime_report.CONTACT';

	
	const COUNTRY = 'ime_report.COUNTRY';

	
	const REGISTERED_ON = 'ime_report.REGISTERED_ON';

	
	const LEADER = 'ime_report.LEADER';

	
	const REMARK = 'ime_report.REMARK';

	
	const CREATED_BY = 'ime_report.CREATED_BY';

	
	const CREATED_ON = 'ime_report.CREATED_ON';

	
	const UPDATED_BY = 'ime_report.UPDATED_BY';

	
	const UPDATED_ON = 'ime_report.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ReportId', 'DistId', 'BonusType', 'SmallLeg', 'PersonalSales', 'TicketQty', 'DistributorCode', 'FullName', 'Email', 'Contact', 'Country', 'RegisteredOn', 'Leader', 'Remark', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (ImeReportPeer::REPORT_ID, ImeReportPeer::DIST_ID, ImeReportPeer::BONUS_TYPE, ImeReportPeer::SMALL_LEG, ImeReportPeer::PERSONAL_SALES, ImeReportPeer::TICKET_QTY, ImeReportPeer::DISTRIBUTOR_CODE, ImeReportPeer::FULL_NAME, ImeReportPeer::EMAIL, ImeReportPeer::CONTACT, ImeReportPeer::COUNTRY, ImeReportPeer::REGISTERED_ON, ImeReportPeer::LEADER, ImeReportPeer::REMARK, ImeReportPeer::CREATED_BY, ImeReportPeer::CREATED_ON, ImeReportPeer::UPDATED_BY, ImeReportPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('report_id', 'dist_id', 'bonus_type', 'small_leg', 'personal_sales', 'ticket_qty', 'distributor_code', 'full_name', 'email', 'contact', 'country', 'registered_on', 'leader', 'remark', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ReportId' => 0, 'DistId' => 1, 'BonusType' => 2, 'SmallLeg' => 3, 'PersonalSales' => 4, 'TicketQty' => 5, 'DistributorCode' => 6, 'FullName' => 7, 'Email' => 8, 'Contact' => 9, 'Country' => 10, 'RegisteredOn' => 11, 'Leader' => 12, 'Remark' => 13, 'CreatedBy' => 14, 'CreatedOn' => 15, 'UpdatedBy' => 16, 'UpdatedOn' => 17, ),
		BasePeer::TYPE_COLNAME => array (ImeReportPeer::REPORT_ID => 0, ImeReportPeer::DIST_ID => 1, ImeReportPeer::BONUS_TYPE => 2, ImeReportPeer::SMALL_LEG => 3, ImeReportPeer::PERSONAL_SALES => 4, ImeReportPeer::TICKET_QTY => 5, ImeReportPeer::DISTRIBUTOR_CODE => 6, ImeReportPeer::FULL_NAME => 7, ImeReportPeer::EMAIL => 8, ImeReportPeer::CONTACT => 9, ImeReportPeer::COUNTRY => 10, ImeReportPeer::REGISTERED_ON => 11, ImeReportPeer::LEADER => 12, ImeReportPeer::REMARK => 13, ImeReportPeer::CREATED_BY => 14, ImeReportPeer::CREATED_ON => 15, ImeReportPeer::UPDATED_BY => 16, ImeReportPeer::UPDATED_ON => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('report_id' => 0, 'dist_id' => 1, 'bonus_type' => 2, 'small_leg' => 3, 'personal_sales' => 4, 'ticket_qty' => 5, 'distributor_code' => 6, 'full_name' => 7, 'email' => 8, 'contact' => 9, 'country' => 10, 'registered_on' => 11, 'leader' => 12, 'remark' => 13, 'created_by' => 14, 'created_on' => 15, 'updated_by' => 16, 'updated_on' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ImeReportMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ImeReportMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ImeReportPeer::getTableMap();
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
		return str_replace(ImeReportPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ImeReportPeer::REPORT_ID);

		$criteria->addSelectColumn(ImeReportPeer::DIST_ID);

		$criteria->addSelectColumn(ImeReportPeer::BONUS_TYPE);

		$criteria->addSelectColumn(ImeReportPeer::SMALL_LEG);

		$criteria->addSelectColumn(ImeReportPeer::PERSONAL_SALES);

		$criteria->addSelectColumn(ImeReportPeer::TICKET_QTY);

		$criteria->addSelectColumn(ImeReportPeer::DISTRIBUTOR_CODE);

		$criteria->addSelectColumn(ImeReportPeer::FULL_NAME);

		$criteria->addSelectColumn(ImeReportPeer::EMAIL);

		$criteria->addSelectColumn(ImeReportPeer::CONTACT);

		$criteria->addSelectColumn(ImeReportPeer::COUNTRY);

		$criteria->addSelectColumn(ImeReportPeer::REGISTERED_ON);

		$criteria->addSelectColumn(ImeReportPeer::LEADER);

		$criteria->addSelectColumn(ImeReportPeer::REMARK);

		$criteria->addSelectColumn(ImeReportPeer::CREATED_BY);

		$criteria->addSelectColumn(ImeReportPeer::CREATED_ON);

		$criteria->addSelectColumn(ImeReportPeer::UPDATED_BY);

		$criteria->addSelectColumn(ImeReportPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(ime_report.REPORT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ime_report.REPORT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ImeReportPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ImeReportPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ImeReportPeer::doSelectRS($criteria, $con);
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
		$objects = ImeReportPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ImeReportPeer::populateObjects(ImeReportPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ImeReportPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ImeReportPeer::getOMClass();
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
		return ImeReportPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ImeReportPeer::REPORT_ID); 

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
			$comparison = $criteria->getComparison(ImeReportPeer::REPORT_ID);
			$selectCriteria->add(ImeReportPeer::REPORT_ID, $criteria->remove(ImeReportPeer::REPORT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ImeReportPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ImeReportPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ImeReport) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ImeReportPeer::REPORT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ImeReport $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ImeReportPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ImeReportPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ImeReportPeer::DATABASE_NAME, ImeReportPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ImeReportPeer::DATABASE_NAME);

		$criteria->add(ImeReportPeer::REPORT_ID, $pk);


		$v = ImeReportPeer::doSelect($criteria, $con);

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
			$criteria->add(ImeReportPeer::REPORT_ID, $pks, Criteria::IN);
			$objs = ImeReportPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseImeReportPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ImeReportMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ImeReportMapBuilder');
}
