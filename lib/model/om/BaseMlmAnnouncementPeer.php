<?php


abstract class BaseMlmAnnouncementPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_announcement';

	
	const CLASS_DEFAULT = 'lib.model.MlmAnnouncement';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ANNOUNCEMENT_ID = 'mlm_announcement.ANNOUNCEMENT_ID';

	
	const TITLE = 'mlm_announcement.TITLE';

	
	const TITLE_CN = 'mlm_announcement.TITLE_CN';

	
	const TITLE_JP = 'mlm_announcement.TITLE_JP';

	
	const CONTENT = 'mlm_announcement.CONTENT';

	
	const CONTENT_CN = 'mlm_announcement.CONTENT_CN';

	
	const CONTENT_JP = 'mlm_announcement.CONTENT_JP';

	
	const SHORT_CONTENT = 'mlm_announcement.SHORT_CONTENT';

	
	const SHORT_CONTENT_CN = 'mlm_announcement.SHORT_CONTENT_CN';

	
	const SHORT_CONTENT_JP = 'mlm_announcement.SHORT_CONTENT_JP';

	
	const STATUS_CODE = 'mlm_announcement.STATUS_CODE';

	
	const CREATED_BY = 'mlm_announcement.CREATED_BY';

	
	const CREATED_ON = 'mlm_announcement.CREATED_ON';

	
	const UPDATED_BY = 'mlm_announcement.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_announcement.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('AnnouncementId', 'Title', 'TitleCn', 'TitleJp', 'Content', 'ContentCn', 'ContentJp', 'ShortContent', 'ShortContentCn', 'ShortContentJp', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmAnnouncementPeer::ANNOUNCEMENT_ID, MlmAnnouncementPeer::TITLE, MlmAnnouncementPeer::TITLE_CN, MlmAnnouncementPeer::TITLE_JP, MlmAnnouncementPeer::CONTENT, MlmAnnouncementPeer::CONTENT_CN, MlmAnnouncementPeer::CONTENT_JP, MlmAnnouncementPeer::SHORT_CONTENT, MlmAnnouncementPeer::SHORT_CONTENT_CN, MlmAnnouncementPeer::SHORT_CONTENT_JP, MlmAnnouncementPeer::STATUS_CODE, MlmAnnouncementPeer::CREATED_BY, MlmAnnouncementPeer::CREATED_ON, MlmAnnouncementPeer::UPDATED_BY, MlmAnnouncementPeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('announcement_id', 'title', 'title_cn', 'title_jp', 'content', 'content_cn', 'content_jp', 'short_content', 'short_content_cn', 'short_content_jp', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('AnnouncementId' => 0, 'Title' => 1, 'TitleCn' => 2, 'TitleJp' => 3, 'Content' => 4, 'ContentCn' => 5, 'ContentJp' => 6, 'ShortContent' => 7, 'ShortContentCn' => 8, 'ShortContentJp' => 9, 'StatusCode' => 10, 'CreatedBy' => 11, 'CreatedOn' => 12, 'UpdatedBy' => 13, 'UpdatedOn' => 14, ),
		BasePeer::TYPE_COLNAME => array (MlmAnnouncementPeer::ANNOUNCEMENT_ID => 0, MlmAnnouncementPeer::TITLE => 1, MlmAnnouncementPeer::TITLE_CN => 2, MlmAnnouncementPeer::TITLE_JP => 3, MlmAnnouncementPeer::CONTENT => 4, MlmAnnouncementPeer::CONTENT_CN => 5, MlmAnnouncementPeer::CONTENT_JP => 6, MlmAnnouncementPeer::SHORT_CONTENT => 7, MlmAnnouncementPeer::SHORT_CONTENT_CN => 8, MlmAnnouncementPeer::SHORT_CONTENT_JP => 9, MlmAnnouncementPeer::STATUS_CODE => 10, MlmAnnouncementPeer::CREATED_BY => 11, MlmAnnouncementPeer::CREATED_ON => 12, MlmAnnouncementPeer::UPDATED_BY => 13, MlmAnnouncementPeer::UPDATED_ON => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('announcement_id' => 0, 'title' => 1, 'title_cn' => 2, 'title_jp' => 3, 'content' => 4, 'content_cn' => 5, 'content_jp' => 6, 'short_content' => 7, 'short_content_cn' => 8, 'short_content_jp' => 9, 'status_code' => 10, 'created_by' => 11, 'created_on' => 12, 'updated_by' => 13, 'updated_on' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmAnnouncementMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmAnnouncementMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmAnnouncementPeer::getTableMap();
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
		return str_replace(MlmAnnouncementPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmAnnouncementPeer::ANNOUNCEMENT_ID);

		$criteria->addSelectColumn(MlmAnnouncementPeer::TITLE);

		$criteria->addSelectColumn(MlmAnnouncementPeer::TITLE_CN);

		$criteria->addSelectColumn(MlmAnnouncementPeer::TITLE_JP);

		$criteria->addSelectColumn(MlmAnnouncementPeer::CONTENT);

		$criteria->addSelectColumn(MlmAnnouncementPeer::CONTENT_CN);

		$criteria->addSelectColumn(MlmAnnouncementPeer::CONTENT_JP);

		$criteria->addSelectColumn(MlmAnnouncementPeer::SHORT_CONTENT);

		$criteria->addSelectColumn(MlmAnnouncementPeer::SHORT_CONTENT_CN);

		$criteria->addSelectColumn(MlmAnnouncementPeer::SHORT_CONTENT_JP);

		$criteria->addSelectColumn(MlmAnnouncementPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmAnnouncementPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmAnnouncementPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmAnnouncementPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmAnnouncementPeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_announcement.ANNOUNCEMENT_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_announcement.ANNOUNCEMENT_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmAnnouncementPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmAnnouncementPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmAnnouncementPeer::doSelectRS($criteria, $con);
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
		$objects = MlmAnnouncementPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmAnnouncementPeer::populateObjects(MlmAnnouncementPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmAnnouncementPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmAnnouncementPeer::getOMClass();
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
		return MlmAnnouncementPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmAnnouncementPeer::ANNOUNCEMENT_ID); 

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
			$comparison = $criteria->getComparison(MlmAnnouncementPeer::ANNOUNCEMENT_ID);
			$selectCriteria->add(MlmAnnouncementPeer::ANNOUNCEMENT_ID, $criteria->remove(MlmAnnouncementPeer::ANNOUNCEMENT_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmAnnouncementPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmAnnouncementPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmAnnouncement) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmAnnouncementPeer::ANNOUNCEMENT_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmAnnouncement $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmAnnouncementPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmAnnouncementPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmAnnouncementPeer::DATABASE_NAME, MlmAnnouncementPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmAnnouncementPeer::DATABASE_NAME);

		$criteria->add(MlmAnnouncementPeer::ANNOUNCEMENT_ID, $pk);


		$v = MlmAnnouncementPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmAnnouncementPeer::ANNOUNCEMENT_ID, $pks, Criteria::IN);
			$objs = MlmAnnouncementPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmAnnouncementPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmAnnouncementMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmAnnouncementMapBuilder');
}
