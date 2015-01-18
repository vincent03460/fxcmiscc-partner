<?php



class MlmRegistrationCountryCodeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmRegistrationCountryCodeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_registration_country_code');
		$tMap->setPhpName('MlmRegistrationCountryCode');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('COUNTRY_ID', 'CountryId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('COUNTRY_NAME', 'CountryName', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PREFIX', 'Prefix', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 