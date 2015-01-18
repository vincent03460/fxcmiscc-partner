<?php



class MlmMasterIbMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmMasterIbMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_master_ib');
		$tMap->setPhpName('MlmMasterIb');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('MASTER_IB_ID', 'MasterIbId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MASTER_IB_CODE', 'MasterIbCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MASTER_IB_NAME', 'MasterIbName', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 