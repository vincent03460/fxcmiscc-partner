<?php



class AppUserRoleAccessMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AppUserRoleAccessMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('app_user_role_access');
		$tMap->setPhpName('AppUserRoleAccess');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ROLE_ACCESS_ID', 'RoleAccessId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCESS_CODE', 'AccessCode', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('ROLE_ID', 'RoleId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 