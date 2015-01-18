<?php



class GgBonusMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgBonusMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_bonus');
		$tMap->setPhpName('GgBonus');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TOTAL_BONUS', 'TotalBonus', 'double', CreoleTypes::DECIMAL, false, 64);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 