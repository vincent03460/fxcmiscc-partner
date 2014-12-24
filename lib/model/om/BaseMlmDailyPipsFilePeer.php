<?php


abstract class BaseMlmDailyPipsFilePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_daily_pips_file';

	
	const CLASS_DEFAULT = 'lib.model.MlmDailyPipsFile';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FILE_ID = 'mlm_daily_pips_file.FILE_ID';

	
	const FILE_TYPE = 'mlm_daily_pips_file.FILE_TYPE';

	
	const FILE_SRC = 'mlm_daily_pips_file.FILE_SRC';

	
	const FILE_NAME = 'mlm_daily_pips_file.FILE_NAME';

	
	const CONTENT_TYPE = 'mlm_daily_pips_file.CONTENT_TYPE';

	
	const STATUS_CODE = 'mlm_daily_pips_file.STATUS_CODE';

	
	const REMARKS = 'mlm_daily_pips_file.REMARKS';

	
	const CREATED_BY = 'mlm_daily_pips_file.CREATED_BY';

	
	const CREATED_ON = 'mlm_daily_pips_file.CREATED_ON';

	
	const UPDATED_BY = 'mlm_daily_pips_file.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_daily_pips_file.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FileId', 'FileType', 'FileSrc', 'FileName', 'ContentType', 'StatusCode', 'Remarks', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmDailyPipsFilePeer::FILE_ID, MlmDailyPipsFilePeer::FILE_TYPE, MlmDailyPipsFilePeer::FILE_SRC, MlmDailyPipsFilePeer::FILE_NAME, MlmDailyPipsFilePeer::CONTENT_TYPE, MlmDailyPipsFilePeer::STATUS_CODE, MlmDailyPipsFilePeer::REMARKS, MlmDailyPipsFilePeer::CREATED_BY, MlmDailyPipsFilePeer::CREATED_ON, MlmDailyPipsFilePeer::UPDATED_BY, MlmDailyPipsFilePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('file_id', 'file_type', 'file_src', 'file_name', 'content_type', 'status_code', 'remarks', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FileId' => 0, 'FileType' => 1, 'FileSrc' => 2, 'FileName' => 3, 'ContentType' => 4, 'StatusCode' => 5, 'Remarks' => 6, 'CreatedBy' => 7, 'CreatedOn' => 8, 'UpdatedBy' => 9, 'UpdatedOn' => 10, ),
		BasePeer::TYPE_COLNAME => array (MlmDailyPipsFilePeer::FILE_ID => 0, MlmDailyPipsFilePeer::FILE_TYPE => 1, MlmDailyPipsFilePeer::FILE_SRC => 2, MlmDailyPipsFilePeer::FILE_NAME => 3, MlmDailyPipsFilePeer::CONTENT_TYPE => 4, MlmDailyPipsFilePeer::STATUS_CODE => 5, MlmDailyPipsFilePeer::REMARKS => 6, MlmDailyPipsFilePeer::CREATED_BY => 7, MlmDailyPipsFilePeer::CREATED_ON => 8, MlmDailyPipsFilePeer::UPDATED_BY => 9, MlmDailyPipsFilePeer::UPDATED_ON => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('file_id' => 0, 'file_type' => 1, 'file_src' => 2, 'file_name' => 3, 'content_type' => 4, 'status_code' => 5, 'remarks' => 6, 'created_by' => 7, 'created_on' => 8, 'updated_by' => 9, 'updated_on' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDailyPipsFileMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDailyPipsFileMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDailyPipsFilePeer::getTableMap();
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
		return str_replace(MlmDailyPipsFilePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::FILE_ID);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::FILE_TYPE);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::FILE_SRC);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::FILE_NAME);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::CONTENT_TYPE);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::REMARKS);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDailyPipsFilePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_daily_pips_file.FILE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_daily_pips_file.FILE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDailyPipsFilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDailyPipsFilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDailyPipsFilePeer::doSelectRS($criteria, $con);
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
		$objects = MlmDailyPipsFilePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDailyPipsFilePeer::populateObjects(MlmDailyPipsFilePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDailyPipsFilePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDailyPipsFilePeer::getOMClass();
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
		return MlmDailyPipsFilePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDailyPipsFilePeer::FILE_ID); 

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
			$comparison = $criteria->getComparison(MlmDailyPipsFilePeer::FILE_ID);
			$selectCriteria->add(MlmDailyPipsFilePeer::FILE_ID, $criteria->remove(MlmDailyPipsFilePeer::FILE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDailyPipsFilePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDailyPipsFilePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDailyPipsFile) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDailyPipsFilePeer::FILE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDailyPipsFile $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDailyPipsFilePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDailyPipsFilePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDailyPipsFilePeer::DATABASE_NAME, MlmDailyPipsFilePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDailyPipsFilePeer::DATABASE_NAME);

		$criteria->add(MlmDailyPipsFilePeer::FILE_ID, $pk);


		$v = MlmDailyPipsFilePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDailyPipsFilePeer::FILE_ID, $pks, Criteria::IN);
			$objs = MlmDailyPipsFilePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDailyPipsFilePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDailyPipsFileMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDailyPipsFileMapBuilder');
}
