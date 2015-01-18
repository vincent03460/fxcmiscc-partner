<?php


abstract class BaseLuckyDrawPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lucky_draw';

	
	const CLASS_DEFAULT = 'lib.model.LuckyDraw';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LUCKY_ID = 'lucky_draw.LUCKY_ID';

	
	const FULL_NAME = 'lucky_draw.FULL_NAME';

	
	const EMAIL = 'lucky_draw.EMAIL';

	
	const MT4_USERNAME = 'lucky_draw.MT4_USERNAME';

	
	const MT4_PASSWORD = 'lucky_draw.MT4_PASSWORD';

	
	const AMOUNT = 'lucky_draw.AMOUNT';

	
	const DRAW_TYPE = 'lucky_draw.DRAW_TYPE';

	
	const STATUS_CODE = 'lucky_draw.STATUS_CODE';

	
	const CREATED_BY = 'lucky_draw.CREATED_BY';

	
	const CREATED_ON = 'lucky_draw.CREATED_ON';

	
	const UPDATED_BY = 'lucky_draw.UPDATED_BY';

	
	const UPDATED_ON = 'lucky_draw.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LuckyId', 'FullName', 'Email', 'Mt4Username', 'Mt4Password', 'Amount', 'DrawType', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (LuckyDrawPeer::LUCKY_ID, LuckyDrawPeer::FULL_NAME, LuckyDrawPeer::EMAIL, LuckyDrawPeer::MT4_USERNAME, LuckyDrawPeer::MT4_PASSWORD, LuckyDrawPeer::AMOUNT, LuckyDrawPeer::DRAW_TYPE, LuckyDrawPeer::STATUS_CODE, LuckyDrawPeer::CREATED_BY, LuckyDrawPeer::CREATED_ON, LuckyDrawPeer::UPDATED_BY, LuckyDrawPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('lucky_id', 'full_name', 'email', 'mt4_username', 'mt4_password', 'amount', 'draw_type', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LuckyId' => 0, 'FullName' => 1, 'Email' => 2, 'Mt4Username' => 3, 'Mt4Password' => 4, 'Amount' => 5, 'DrawType' => 6, 'StatusCode' => 7, 'CreatedBy' => 8, 'CreatedOn' => 9, 'UpdatedBy' => 10, 'UpdatedOn' => 11, ),
		BasePeer::TYPE_COLNAME => array (LuckyDrawPeer::LUCKY_ID => 0, LuckyDrawPeer::FULL_NAME => 1, LuckyDrawPeer::EMAIL => 2, LuckyDrawPeer::MT4_USERNAME => 3, LuckyDrawPeer::MT4_PASSWORD => 4, LuckyDrawPeer::AMOUNT => 5, LuckyDrawPeer::DRAW_TYPE => 6, LuckyDrawPeer::STATUS_CODE => 7, LuckyDrawPeer::CREATED_BY => 8, LuckyDrawPeer::CREATED_ON => 9, LuckyDrawPeer::UPDATED_BY => 10, LuckyDrawPeer::UPDATED_ON => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('lucky_id' => 0, 'full_name' => 1, 'email' => 2, 'mt4_username' => 3, 'mt4_password' => 4, 'amount' => 5, 'draw_type' => 6, 'status_code' => 7, 'created_by' => 8, 'created_on' => 9, 'updated_by' => 10, 'updated_on' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LuckyDrawMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LuckyDrawMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LuckyDrawPeer::getTableMap();
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
		return str_replace(LuckyDrawPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LuckyDrawPeer::LUCKY_ID);

		$criteria->addSelectColumn(LuckyDrawPeer::FULL_NAME);

		$criteria->addSelectColumn(LuckyDrawPeer::EMAIL);

		$criteria->addSelectColumn(LuckyDrawPeer::MT4_USERNAME);

		$criteria->addSelectColumn(LuckyDrawPeer::MT4_PASSWORD);

		$criteria->addSelectColumn(LuckyDrawPeer::AMOUNT);

		$criteria->addSelectColumn(LuckyDrawPeer::DRAW_TYPE);

		$criteria->addSelectColumn(LuckyDrawPeer::STATUS_CODE);

		$criteria->addSelectColumn(LuckyDrawPeer::CREATED_BY);

		$criteria->addSelectColumn(LuckyDrawPeer::CREATED_ON);

		$criteria->addSelectColumn(LuckyDrawPeer::UPDATED_BY);

		$criteria->addSelectColumn(LuckyDrawPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(lucky_draw.LUCKY_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lucky_draw.LUCKY_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LuckyDrawPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LuckyDrawPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LuckyDrawPeer::doSelectRS($criteria, $con);
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
		$objects = LuckyDrawPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LuckyDrawPeer::populateObjects(LuckyDrawPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LuckyDrawPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LuckyDrawPeer::getOMClass();
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
		return LuckyDrawPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LuckyDrawPeer::LUCKY_ID); 

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
			$comparison = $criteria->getComparison(LuckyDrawPeer::LUCKY_ID);
			$selectCriteria->add(LuckyDrawPeer::LUCKY_ID, $criteria->remove(LuckyDrawPeer::LUCKY_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LuckyDrawPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LuckyDrawPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof LuckyDraw) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LuckyDrawPeer::LUCKY_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(LuckyDraw $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LuckyDrawPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LuckyDrawPeer::TABLE_NAME);

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

		return BasePeer::doValidate(LuckyDrawPeer::DATABASE_NAME, LuckyDrawPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(LuckyDrawPeer::DATABASE_NAME);

		$criteria->add(LuckyDrawPeer::LUCKY_ID, $pk);


		$v = LuckyDrawPeer::doSelect($criteria, $con);

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
			$criteria->add(LuckyDrawPeer::LUCKY_ID, $pks, Criteria::IN);
			$objs = LuckyDrawPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLuckyDrawPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LuckyDrawMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LuckyDrawMapBuilder');
}
