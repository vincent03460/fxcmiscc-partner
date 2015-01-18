<?php



class MlmFundManagementRecordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmFundManagementRecordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_fund_management_record');
		$tMap->setPhpName('MlmFundManagementRecord');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('FUND_ID', 'FundId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PERCENTAGE', 'Percentage', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 