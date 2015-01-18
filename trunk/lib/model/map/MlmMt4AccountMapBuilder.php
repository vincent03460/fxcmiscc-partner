<?php



class MlmMt4AccountMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmMt4AccountMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_mt4_account');
		$tMap->setPhpName('MlmMt4Account');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('MT4_ID', 'Mt4Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DISTRIBUTOR_ID', 'DistributorId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PACKAGE_ID', 'PackageId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MT_USER_NAME', 'MtUserName', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('INVESTOR_PASSWORD', 'InvestorPassword', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('NORMAL_PASSWORD', 'NormalPassword', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('SERIAL_NO', 'SerialNo', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 