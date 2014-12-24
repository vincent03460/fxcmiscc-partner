<?php



class AppUserRoleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AppUserRoleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('app_user_role');
		$tMap->setPhpName('AppUserRole');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ROLE_ID', 'RoleId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ROLE_CODE', 'RoleCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ROLE_DESC', 'RoleDesc', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 