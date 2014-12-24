<?php


abstract class BaseMlmMemberQuestionnairePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_member_questionnaire';

	
	const CLASS_DEFAULT = 'lib.model.MlmMemberQuestionnaire';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const QUESTIONNAIRE_ID = 'mlm_member_questionnaire.QUESTIONNAIRE_ID';

	
	const MEMBER_ID = 'mlm_member_questionnaire.MEMBER_ID';

	
	const Q1 = 'mlm_member_questionnaire.Q1';

	
	const Q2 = 'mlm_member_questionnaire.Q2';

	
	const Q3 = 'mlm_member_questionnaire.Q3';

	
	const Q4 = 'mlm_member_questionnaire.Q4';

	
	const Q5 = 'mlm_member_questionnaire.Q5';

	
	const Q6 = 'mlm_member_questionnaire.Q6';

	
	const Q7 = 'mlm_member_questionnaire.Q7';

	
	const Q8 = 'mlm_member_questionnaire.Q8';

	
	const S1 = 'mlm_member_questionnaire.S1';

	
	const S2 = 'mlm_member_questionnaire.S2';

	
	const S3 = 'mlm_member_questionnaire.S3';

	
	const STATUS_CODE = 'mlm_member_questionnaire.STATUS_CODE';

	
	const CREATED_BY = 'mlm_member_questionnaire.CREATED_BY';

	
	const CREATED_ON = 'mlm_member_questionnaire.CREATED_ON';

	
	const UPDATED_BY = 'mlm_member_questionnaire.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_member_questionnaire.UPDATED_ON';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('QuestionnaireId', 'MemberId', 'Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'S1', 'S2', 'S3', 'StatusCode', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', ),
		BasePeer::TYPE_COLNAME => array (MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID, MlmMemberQuestionnairePeer::MEMBER_ID, MlmMemberQuestionnairePeer::Q1, MlmMemberQuestionnairePeer::Q2, MlmMemberQuestionnairePeer::Q3, MlmMemberQuestionnairePeer::Q4, MlmMemberQuestionnairePeer::Q5, MlmMemberQuestionnairePeer::Q6, MlmMemberQuestionnairePeer::Q7, MlmMemberQuestionnairePeer::Q8, MlmMemberQuestionnairePeer::S1, MlmMemberQuestionnairePeer::S2, MlmMemberQuestionnairePeer::S3, MlmMemberQuestionnairePeer::STATUS_CODE, MlmMemberQuestionnairePeer::CREATED_BY, MlmMemberQuestionnairePeer::CREATED_ON, MlmMemberQuestionnairePeer::UPDATED_BY, MlmMemberQuestionnairePeer::UPDATED_ON, ),
		BasePeer::TYPE_FIELDNAME => array ('questionnaire_id', 'member_id', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 's1', 's2', 's3', 'status_code', 'created_by', 'created_on', 'updated_by', 'updated_on', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('QuestionnaireId' => 0, 'MemberId' => 1, 'Q1' => 2, 'Q2' => 3, 'Q3' => 4, 'Q4' => 5, 'Q5' => 6, 'Q6' => 7, 'Q7' => 8, 'Q8' => 9, 'S1' => 10, 'S2' => 11, 'S3' => 12, 'StatusCode' => 13, 'CreatedBy' => 14, 'CreatedOn' => 15, 'UpdatedBy' => 16, 'UpdatedOn' => 17, ),
		BasePeer::TYPE_COLNAME => array (MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID => 0, MlmMemberQuestionnairePeer::MEMBER_ID => 1, MlmMemberQuestionnairePeer::Q1 => 2, MlmMemberQuestionnairePeer::Q2 => 3, MlmMemberQuestionnairePeer::Q3 => 4, MlmMemberQuestionnairePeer::Q4 => 5, MlmMemberQuestionnairePeer::Q5 => 6, MlmMemberQuestionnairePeer::Q6 => 7, MlmMemberQuestionnairePeer::Q7 => 8, MlmMemberQuestionnairePeer::Q8 => 9, MlmMemberQuestionnairePeer::S1 => 10, MlmMemberQuestionnairePeer::S2 => 11, MlmMemberQuestionnairePeer::S3 => 12, MlmMemberQuestionnairePeer::STATUS_CODE => 13, MlmMemberQuestionnairePeer::CREATED_BY => 14, MlmMemberQuestionnairePeer::CREATED_ON => 15, MlmMemberQuestionnairePeer::UPDATED_BY => 16, MlmMemberQuestionnairePeer::UPDATED_ON => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('questionnaire_id' => 0, 'member_id' => 1, 'q1' => 2, 'q2' => 3, 'q3' => 4, 'q4' => 5, 'q5' => 6, 'q6' => 7, 'q7' => 8, 'q8' => 9, 's1' => 10, 's2' => 11, 's3' => 12, 'status_code' => 13, 'created_by' => 14, 'created_on' => 15, 'updated_by' => 16, 'updated_on' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmMemberQuestionnaireMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmMemberQuestionnaireMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmMemberQuestionnairePeer::getTableMap();
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
		return str_replace(MlmMemberQuestionnairePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::MEMBER_ID);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q1);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q2);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q3);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q4);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q5);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q6);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q7);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::Q8);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::S1);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::S2);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::S3);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::CREATED_BY);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::CREATED_ON);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmMemberQuestionnairePeer::UPDATED_ON);

	}

	const COUNT = 'COUNT(mlm_member_questionnaire.QUESTIONNAIRE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_member_questionnaire.QUESTIONNAIRE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmMemberQuestionnairePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmMemberQuestionnairePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmMemberQuestionnairePeer::doSelectRS($criteria, $con);
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
		$objects = MlmMemberQuestionnairePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmMemberQuestionnairePeer::populateObjects(MlmMemberQuestionnairePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmMemberQuestionnairePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmMemberQuestionnairePeer::getOMClass();
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
		return MlmMemberQuestionnairePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID); 

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
			$comparison = $criteria->getComparison(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID);
			$selectCriteria->add(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID, $criteria->remove(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmMemberQuestionnairePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmMemberQuestionnairePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmMemberQuestionnaire) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmMemberQuestionnaire $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmMemberQuestionnairePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmMemberQuestionnairePeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmMemberQuestionnairePeer::DATABASE_NAME, MlmMemberQuestionnairePeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmMemberQuestionnairePeer::DATABASE_NAME);

		$criteria->add(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID, $pk);


		$v = MlmMemberQuestionnairePeer::doSelect($criteria, $con);

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
			$criteria->add(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID, $pks, Criteria::IN);
			$objs = MlmMemberQuestionnairePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmMemberQuestionnairePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmMemberQuestionnaireMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmMemberQuestionnaireMapBuilder');
}
