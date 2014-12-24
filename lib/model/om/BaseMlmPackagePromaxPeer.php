<?php


abstract class BaseMlmPackagePromaxPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_package_promax';

	
	const CLASS_DEFAULT = 'lib.model.MlmPackagePromax';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const PACKAGE_ID = 'mlm_package_promax.PACKAGE_ID';

	
	const PACKAGE_NAME = 'mlm_package_promax.PACKAGE_NAME';

	
	const PRICE = 'mlm_package_promax.PRICE';

	
	const COLOR = 'mlm_package_promax.COLOR';

	
	const COMMISSION = 'mlm_package_promax.COMMISSION';

	
	const MONTHLY_ROI = 'mlm_package_promax.MONTHLY_ROI';

	
	const PIPS_GEN = 'mlm_package_promax.PIPS_GEN';

	
	const PUBLIC_PURCHASE = 'mlm_package_promax.PUBLIC_PURCHASE';

	
	const CREATED_BY = 'mlm_package_promax.CREATED_BY';

	
	const CREATED_ON = 'mlm_package_promax.CREATED_ON';

	
	const UPDATED_BY = 'mlm_package_promax.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_package_promax.UPDATED_ON';

	
	const PIPS = 'mlm_package_promax.PIPS';

	
	const GENERATION = 'mlm_package_promax.GENERATION';

	
	const PIPS2 = 'mlm_package_promax.PIPS2';

	
	const GENERATION2 = 'mlm_package_promax.GENERATION2';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PackageId', 'PackageName', 'Price', 'Color', 'Commission', 'MonthlyRoi', 'PipsGen', 'PublicPurchase', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', 'Pips', 'Generation', 'Pips2', 'Generation2', ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePromaxPeer::PACKAGE_ID, MlmPackagePromaxPeer::PACKAGE_NAME, MlmPackagePromaxPeer::PRICE, MlmPackagePromaxPeer::COLOR, MlmPackagePromaxPeer::COMMISSION, MlmPackagePromaxPeer::MONTHLY_ROI, MlmPackagePromaxPeer::PIPS_GEN, MlmPackagePromaxPeer::PUBLIC_PURCHASE, MlmPackagePromaxPeer::CREATED_BY, MlmPackagePromaxPeer::CREATED_ON, MlmPackagePromaxPeer::UPDATED_BY, MlmPackagePromaxPeer::UPDATED_ON, MlmPackagePromaxPeer::PIPS, MlmPackagePromaxPeer::GENERATION, MlmPackagePromaxPeer::PIPS2, MlmPackagePromaxPeer::GENERATION2, ),
		BasePeer::TYPE_FIELDNAME => array ('package_id', 'package_name', 'price', 'color', 'commission', 'monthly_roi', 'pips_gen', 'public_purchase', 'created_by', 'created_on', 'updated_by', 'updated_on', 'pips', 'generation', 'pips2', 'generation2', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PackageId' => 0, 'PackageName' => 1, 'Price' => 2, 'Color' => 3, 'Commission' => 4, 'MonthlyRoi' => 5, 'PipsGen' => 6, 'PublicPurchase' => 7, 'CreatedBy' => 8, 'CreatedOn' => 9, 'UpdatedBy' => 10, 'UpdatedOn' => 11, 'Pips' => 12, 'Generation' => 13, 'Pips2' => 14, 'Generation2' => 15, ),
		BasePeer::TYPE_COLNAME => array (MlmPackagePromaxPeer::PACKAGE_ID => 0, MlmPackagePromaxPeer::PACKAGE_NAME => 1, MlmPackagePromaxPeer::PRICE => 2, MlmPackagePromaxPeer::COLOR => 3, MlmPackagePromaxPeer::COMMISSION => 4, MlmPackagePromaxPeer::MONTHLY_ROI => 5, MlmPackagePromaxPeer::PIPS_GEN => 6, MlmPackagePromaxPeer::PUBLIC_PURCHASE => 7, MlmPackagePromaxPeer::CREATED_BY => 8, MlmPackagePromaxPeer::CREATED_ON => 9, MlmPackagePromaxPeer::UPDATED_BY => 10, MlmPackagePromaxPeer::UPDATED_ON => 11, MlmPackagePromaxPeer::PIPS => 12, MlmPackagePromaxPeer::GENERATION => 13, MlmPackagePromaxPeer::PIPS2 => 14, MlmPackagePromaxPeer::GENERATION2 => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('package_id' => 0, 'package_name' => 1, 'price' => 2, 'color' => 3, 'commission' => 4, 'monthly_roi' => 5, 'pips_gen' => 6, 'public_purchase' => 7, 'created_by' => 8, 'created_on' => 9, 'updated_by' => 10, 'updated_on' => 11, 'pips' => 12, 'generation' => 13, 'pips2' => 14, 'generation2' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmPackagePromaxMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmPackagePromaxMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmPackagePromaxPeer::getTableMap();
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
		return str_replace(MlmPackagePromaxPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmPackagePromaxPeer::PACKAGE_ID);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::PACKAGE_NAME);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::PRICE);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::COLOR);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::COMMISSION);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::MONTHLY_ROI);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::PIPS_GEN);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::PUBLIC_PURCHASE);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::UPDATED_ON);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::PIPS);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::GENERATION);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::PIPS2);

		$criteria->addSelectColumn(MlmPackagePromaxPeer::GENERATION2);

	}

	const COUNT = 'COUNT(mlm_package_promax.PACKAGE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_package_promax.PACKAGE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmPackagePromaxPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmPackagePromaxPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmPackagePromaxPeer::doSelectRS($criteria, $con);
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
		$objects = MlmPackagePromaxPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmPackagePromaxPeer::populateObjects(MlmPackagePromaxPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmPackagePromaxPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmPackagePromaxPeer::getOMClass();
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
		return MlmPackagePromaxPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmPackagePromaxPeer::PACKAGE_ID); 

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
			$comparison = $criteria->getComparison(MlmPackagePromaxPeer::PACKAGE_ID);
			$selectCriteria->add(MlmPackagePromaxPeer::PACKAGE_ID, $criteria->remove(MlmPackagePromaxPeer::PACKAGE_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmPackagePromaxPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmPackagePromaxPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmPackagePromax) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmPackagePromaxPeer::PACKAGE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmPackagePromax $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmPackagePromaxPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmPackagePromaxPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmPackagePromaxPeer::DATABASE_NAME, MlmPackagePromaxPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmPackagePromaxPeer::DATABASE_NAME);

		$criteria->add(MlmPackagePromaxPeer::PACKAGE_ID, $pk);


		$v = MlmPackagePromaxPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmPackagePromaxPeer::PACKAGE_ID, $pks, Criteria::IN);
			$objs = MlmPackagePromaxPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmPackagePromaxPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmPackagePromaxMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmPackagePromaxMapBuilder');
}
