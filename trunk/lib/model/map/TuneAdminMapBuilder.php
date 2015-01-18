<?php



class TuneAdminMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TuneAdminMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tune_admin');
		$tMap->setPhpName('TuneAdmin');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ADMIN_ID', 'AdminId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ADMIN_CODE', 'AdminCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ADMIN_ROLE', 'AdminRole', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 