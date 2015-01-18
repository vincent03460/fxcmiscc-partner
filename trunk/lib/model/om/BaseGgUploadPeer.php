<?php


abstract class BaseGgUploadPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_upload';

	
	const CLASS_DEFAULT = 'lib.model.GgUpload';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_upload.ID';

	
	const UID = 'gg_upload.UID';

	
	const AID = 'gg_upload.AID';

	
	const UREMARK = 'gg_upload.UREMARK';

	
	const AREMARK = 'gg_upload.AREMARK';

	
	const FILENAME = 'gg_upload.FILENAME';

	
	const STATUS = 'gg_upload.STATUS';

	
	const CDATE = 'gg_upload.CDATE';

	
	const ADATE = 'gg_upload.ADATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Aid', 'Uremark', 'Aremark', 'Filename', 'Status', 'Cdate', 'Adate', ),
		BasePeer::TYPE_COLNAME => array (GgUploadPeer::ID, GgUploadPeer::UID, GgUploadPeer::AID, GgUploadPeer::UREMARK, GgUploadPeer::AREMARK, GgUploadPeer::FILENAME, GgUploadPeer::STATUS, GgUploadPeer::CDATE, GgUploadPeer::ADATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'aid', 'uremark', 'aremark', 'filename', 'status', 'cdate', 'adate', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Aid' => 2, 'Uremark' => 3, 'Aremark' => 4, 'Filename' => 5, 'Status' => 6, 'Cdate' => 7, 'Adate' => 8, ),
		BasePeer::TYPE_COLNAME => array (GgUploadPeer::ID => 0, GgUploadPeer::UID => 1, GgUploadPeer::AID => 2, GgUploadPeer::UREMARK => 3, GgUploadPeer::AREMARK => 4, GgUploadPeer::FILENAME => 5, GgUploadPeer::STATUS => 6, GgUploadPeer::CDATE => 7, GgUploadPeer::ADATE => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'aid' => 2, 'uremark' => 3, 'aremark' => 4, 'filename' => 5, 'status' => 6, 'cdate' => 7, 'adate' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgUploadMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgUploadMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgUploadPeer::getTableMap();
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
		return str_replace(GgUploadPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgUploadPeer::ID);

		$criteria->addSelectColumn(GgUploadPeer::UID);

		$criteria->addSelectColumn(GgUploadPeer::AID);

		$criteria->addSelectColumn(GgUploadPeer::UREMARK);

		$criteria->addSelectColumn(GgUploadPeer::AREMARK);

		$criteria->addSelectColumn(GgUploadPeer::FILENAME);

		$criteria->addSelectColumn(GgUploadPeer::STATUS);

		$criteria->addSelectColumn(GgUploadPeer::CDATE);

		$criteria->addSelectColumn(GgUploadPeer::ADATE);

	}

	const COUNT = 'COUNT(gg_upload.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_upload.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgUploadPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgUploadPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgUploadPeer::doSelectRS($criteria, $con);
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
		$objects = GgUploadPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgUploadPeer::populateObjects(GgUploadPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgUploadPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgUploadPeer::getOMClass();
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
		return GgUploadPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgUploadPeer::ID); 

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
			$comparison = $criteria->getComparison(GgUploadPeer::ID);
			$selectCriteria->add(GgUploadPeer::ID, $criteria->remove(GgUploadPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgUploadPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgUploadPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgUpload) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgUploadPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgUpload $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgUploadPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgUploadPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgUploadPeer::DATABASE_NAME, GgUploadPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgUploadPeer::DATABASE_NAME);

		$criteria->add(GgUploadPeer::ID, $pk);


		$v = GgUploadPeer::doSelect($criteria, $con);

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
			$criteria->add(GgUploadPeer::ID, $pks, Criteria::IN);
			$objs = GgUploadPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgUploadPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgUploadMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgUploadMapBuilder');
}
