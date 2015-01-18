<?php



class GgSettingsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgSettingsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_settings');
		$tMap->setPhpName('GgSettings');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('PARAM', 'Param', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('VALUE', 'Value', 'string', CreoleTypes::LONGVARCHAR, true, null);

	} 
} 