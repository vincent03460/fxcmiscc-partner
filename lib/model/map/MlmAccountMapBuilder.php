<?php



class MlmAccountMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmAccountMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_account');
		$tMap->setPhpName('MlmAccount');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_TYPE', 'AccountType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('BALANCE', 'Balance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 