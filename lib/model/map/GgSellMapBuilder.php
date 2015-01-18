<?php



class GgSellMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgSellMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_sell');
		$tMap->setPhpName('GgSell');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TOTAL_SELL', 'TotalSell', 'double', CreoleTypes::DECIMAL, false, 59);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 