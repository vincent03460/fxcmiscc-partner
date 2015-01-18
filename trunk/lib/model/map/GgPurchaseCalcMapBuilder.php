<?php



class GgPurchaseCalcMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgPurchaseCalcMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('gg_purchase_calc');
		$tMap->setPhpName('GgPurchaseCalc');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TOTAL_BV', 'TotalBv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL_DP', 'TotalDp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL_RP', 'TotalRp', 'double', CreoleTypes::DECIMAL, true, 15);

	} 
} 