<?php



class MlmPackagePipsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmPackagePipsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_package_pips');
		$tMap->setPhpName('MlmPackagePips');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('PIPS_ID', 'PipsId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTOL_SPONSOR', 'TotolSponsor', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PIPS', 'Pips', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('GENERATION', 'Generation', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('PIPS2', 'Pips2', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('GENERATION2', 'Generation2', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 