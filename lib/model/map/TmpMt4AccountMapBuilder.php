<?php



class TmpMt4AccountMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TmpMt4AccountMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tmp_mt4_account');
		$tMap->setPhpName('TmpMt4Account');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('MT4_ID', 'Mt4Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FULLNAME', 'Fullname', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MT4_USERNAME', 'Mt4Username', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('MT4_PASSWORD', 'Mt4Password', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 