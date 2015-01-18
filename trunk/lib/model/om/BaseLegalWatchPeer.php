<?php


abstract class BaseLegalWatchPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'legal_watch';

	
	const CLASS_DEFAULT = 'lib.model.LegalWatch';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const WATCH_ID = 'legal_watch.WATCH_ID';

	
	const DIST_ID = 'legal_watch.DIST_ID';

	
	const FULL_NAME = 'legal_watch.FULL_NAME';

	
	const DIST_CODE = 'legal_watch.DIST_CODE';

	
	const AGE = 'legal_watch.AGE';

	
	const EDUCATIONLEVEL = 'legal_watch.EDUCATIONLEVEL';

	
	const EMAIL = 'legal_watch.EMAIL';

	
	const CONTACT = 'legal_watch.CONTACT';

	
	const MESSAGE = 'legal_watch.MESSAGE';

	
	const TITLE = 'legal_watch.TITLE';

	
	const FILE_NAME = 'legal_watch.FILE_NAME';

	
	const STATUS_CODE = 'legal_watch.STATUS_CODE';

	
	const CREATED_BY = 'legal_watch.CREATED_BY';

	
	const CREATED_ON = 'legal_watch.CREATED_ON';

	
	const UPDATED_BY = 'legal_watch.UPDATED_BY';

	
	const UPDATED_ON = 'legal_watch.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('WatchId', 'DistId', 'FullName', 'DistCode', 'Age', 'Educationlevel', 'Email', 'Contact', 'Message', 'Title', 'FileName', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (LegalWatchPeer::WATCH_ID, LegalWatchPeer::DIST_ID, LegalWatchPeer::FULL_NAME, LegalWatchPeer::DIST_CODE, LegalWatchPeer::AGE, LegalWatchPeer::EDUCATIONLEVEL, LegalWatchPeer::EMAIL, LegalWatchPeer::CONTACT, LegalWatchPeer::MESSAGE, LegalWatchPeer::TITLE, LegalWatchPeer::FILE_NAME, LegalWatchPeer::STATUS_CODE, LegalWatchPeer::CREATED_BY, LegalWatchPeer::CREATED_ON, LegalWatchPeer::UPDATED_BY, LegalWatchPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('watch_id', 'dist_id', 'full_name', 'dist_code', 'age', 'educationLevel', 'email', 'contact', 'message', 'title', 'file_name', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('WatchId' => 0, 'DistId' => 1, 'FullName' => 2, 'DistCode' => 3, 'Age' => 4, 'Educationlevel' => 5, 'Email' => 6, 'Contact' => 7, 'Message' => 8, 'Title' => 9, 'FileName' => 10, 'StatusCode' => 11, 'CreatedBy' => 12, 'CreatedOn' => 13, 'UpdatedBy' => 14, 'UpdatedOn' => 15, ),
		BasePeer::TYPE_COLNAME => array (LegalWatchPeer::WATCH_ID => 0, LegalWatchPeer::DIST_ID => 1, LegalWatchPeer::FULL_NAME => 2, LegalWatchPeer::DIST_CODE => 3, LegalWatchPeer::AGE => 4, LegalWatchPeer::EDUCATIONLEVEL => 5, LegalWatchPeer::EMAIL => 6, LegalWatchPeer::CONTACT => 7, LegalWatchPeer::MESSAGE => 8, LegalWatchPeer::TITLE => 9, LegalWatchPeer::FILE_NAME => 10, LegalWatchPeer::STATUS_CODE => 11, LegalWatchPeer::CREATED_BY => 12, LegalWatchPeer::CREATED_ON => 13, LegalWatchPeer::UPDATED_BY => 14, LegalWatchPeer::UPDATED_ON => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('watch_id' => 0, 'dist_id' => 1, 'full_name' => 2, 'dist_code' => 3, 'age' => 4, 'educationLevel' => 5, 'email' => 6, 'contact' => 7, 'message' => 8, 'title' => 9, 'file_name' => 10, 'status_code' => 11, 'created_by' => 12, 'created_on' => 13, 'updated_by' => 14, 'updated_on' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LegalWatchMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LegalWatchMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LegalWatchPeer::getTableMap();
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
		return str_replace(LegalWatchPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LegalWatchPeer::WATCH_ID);

		$criteria->addSelectColumn(LegalWatchPeer::DIST_ID);

		$criteria->addSelectColumn(LegalWatchPeer::FULL_NAME);

		$criteria->addSelectColumn(LegalWatchPeer::DIST_CODE);

		$criteria->addSelectColumn(LegalWatchPeer::AGE);

		$criteria->addSelectColumn(LegalWatchPeer::EDUCATIONLEVEL);

		$criteria->addSelectColumn(LegalWatchPeer::EMAIL);

		$criteria->addSelectColumn(LegalWatchPeer::CONTACT);

		$criteria->addSelectColumn(LegalWatchPeer::MESSAGE);

		$criteria->addSelectColumn(LegalWatchPeer::TITLE);

		$criteria->addSelectColumn(LegalWatchPeer::FILE_NAME);

		$criteria->addSelectColumn(LegalWatchPeer::STATUS_CODE);

		$criteria->addSelectColumn(LegalWatchPeer::CREATED_BY);

		$criteria->addSelectColumn(LegalWatchPeer::CREATED_ON);

		$criteria->addSelectColumn(LegalWatchPeer::UPDATED_BY);

		$criteria->addSelectColumn(LegalWatchPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(legal_watch.WATCH_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT legal_watch.WATCH_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LegalWatchPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LegalWatchPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LegalWatchPeer::doSelectRS($criteria, $con);
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
		$objects = LegalWatchPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LegalWatchPeer::populateObjects(LegalWatchPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LegalWatchPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LegalWatchPeer::getOMClass();
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
		return LegalWatchPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LegalWatchPeer::WATCH_ID); 

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
			$comparison = $criteria->getComparison(LegalWatchPeer::WATCH_ID);
			$selectCriteria->add(LegalWatchPeer::WATCH_ID, $criteria->remove(LegalWatchPeer::WATCH_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LegalWatchPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LegalWatchPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof LegalWatch) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LegalWatchPeer::WATCH_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(LegalWatch $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LegalWatchPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LegalWatchPeer::TABLE_NAME);

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

		return BasePeer::doValidate(LegalWatchPeer::DATABASE_NAME, LegalWatchPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(LegalWatchPeer::DATABASE_NAME);

		$criteria->add(LegalWatchPeer::WATCH_ID, $pk);


		$v = LegalWatchPeer::doSelect($criteria, $con);

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
			$criteria->add(LegalWatchPeer::WATCH_ID, $pks, Criteria::IN);
			$objs = LegalWatchPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLegalWatchPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LegalWatchMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LegalWatchMapBuilder');
}
