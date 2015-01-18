<?php


abstract class BaseGgPurchaseFigPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_purchase_fig';

	
	const CLASS_DEFAULT = 'lib.model.GgPurchaseFig';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_purchase_fig.ID';

	
	const UID = 'gg_purchase_fig.UID';

	
	const NETWORK = 'gg_purchase_fig.NETWORK';

	
	const PS_BV = 'gg_purchase_fig.PS_BV';

	
	const PS_DP = 'gg_purchase_fig.PS_DP';

	
	const PS_RP = 'gg_purchase_fig.PS_RP';

	
	const PGS_BV = 'gg_purchase_fig.PGS_BV';

	
	const PGS_DP = 'gg_purchase_fig.PGS_DP';

	
	const PGS_RP = 'gg_purchase_fig.PGS_RP';

	
	const YEAR = 'gg_purchase_fig.YEAR';

	
	const MONTH = 'gg_purchase_fig.MONTH';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Uid', 'Network', 'PsBv', 'PsDp', 'PsRp', 'PgsBv', 'PgsDp', 'PgsRp', 'Year', 'Month', ),
		BasePeer::TYPE_COLNAME => array (GgPurchaseFigPeer::ID, GgPurchaseFigPeer::UID, GgPurchaseFigPeer::NETWORK, GgPurchaseFigPeer::PS_BV, GgPurchaseFigPeer::PS_DP, GgPurchaseFigPeer::PS_RP, GgPurchaseFigPeer::PGS_BV, GgPurchaseFigPeer::PGS_DP, GgPurchaseFigPeer::PGS_RP, GgPurchaseFigPeer::YEAR, GgPurchaseFigPeer::MONTH, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'uid', 'network', 'ps_bv', 'ps_dp', 'ps_rp', 'pgs_bv', 'pgs_dp', 'pgs_rp', 'year', 'month', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Uid' => 1, 'Network' => 2, 'PsBv' => 3, 'PsDp' => 4, 'PsRp' => 5, 'PgsBv' => 6, 'PgsDp' => 7, 'PgsRp' => 8, 'Year' => 9, 'Month' => 10, ),
		BasePeer::TYPE_COLNAME => array (GgPurchaseFigPeer::ID => 0, GgPurchaseFigPeer::UID => 1, GgPurchaseFigPeer::NETWORK => 2, GgPurchaseFigPeer::PS_BV => 3, GgPurchaseFigPeer::PS_DP => 4, GgPurchaseFigPeer::PS_RP => 5, GgPurchaseFigPeer::PGS_BV => 6, GgPurchaseFigPeer::PGS_DP => 7, GgPurchaseFigPeer::PGS_RP => 8, GgPurchaseFigPeer::YEAR => 9, GgPurchaseFigPeer::MONTH => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'uid' => 1, 'network' => 2, 'ps_bv' => 3, 'ps_dp' => 4, 'ps_rp' => 5, 'pgs_bv' => 6, 'pgs_dp' => 7, 'pgs_rp' => 8, 'year' => 9, 'month' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgPurchaseFigMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgPurchaseFigMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgPurchaseFigPeer::getTableMap();
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
		return str_replace(GgPurchaseFigPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgPurchaseFigPeer::ID);

		$criteria->addSelectColumn(GgPurchaseFigPeer::UID);

		$criteria->addSelectColumn(GgPurchaseFigPeer::NETWORK);

		$criteria->addSelectColumn(GgPurchaseFigPeer::PS_BV);

		$criteria->addSelectColumn(GgPurchaseFigPeer::PS_DP);

		$criteria->addSelectColumn(GgPurchaseFigPeer::PS_RP);

		$criteria->addSelectColumn(GgPurchaseFigPeer::PGS_BV);

		$criteria->addSelectColumn(GgPurchaseFigPeer::PGS_DP);

		$criteria->addSelectColumn(GgPurchaseFigPeer::PGS_RP);

		$criteria->addSelectColumn(GgPurchaseFigPeer::YEAR);

		$criteria->addSelectColumn(GgPurchaseFigPeer::MONTH);

	}

	const COUNT = 'COUNT(gg_purchase_fig.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_purchase_fig.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgPurchaseFigPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgPurchaseFigPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgPurchaseFigPeer::doSelectRS($criteria, $con);
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
		$objects = GgPurchaseFigPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgPurchaseFigPeer::populateObjects(GgPurchaseFigPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgPurchaseFigPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgPurchaseFigPeer::getOMClass();
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
		return GgPurchaseFigPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgPurchaseFigPeer::ID); 

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
			$comparison = $criteria->getComparison(GgPurchaseFigPeer::ID);
			$selectCriteria->add(GgPurchaseFigPeer::ID, $criteria->remove(GgPurchaseFigPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(GgPurchaseFigPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgPurchaseFigPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgPurchaseFig) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgPurchaseFigPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgPurchaseFig $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgPurchaseFigPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgPurchaseFigPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgPurchaseFigPeer::DATABASE_NAME, GgPurchaseFigPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgPurchaseFigPeer::DATABASE_NAME);

		$criteria->add(GgPurchaseFigPeer::ID, $pk);


		$v = GgPurchaseFigPeer::doSelect($criteria, $con);

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
			$criteria->add(GgPurchaseFigPeer::ID, $pks, Criteria::IN);
			$objs = GgPurchaseFigPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgPurchaseFigPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgPurchaseFigMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgPurchaseFigMapBuilder');
}
