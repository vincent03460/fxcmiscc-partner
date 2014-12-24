<?php



class AppUserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AppUserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('app_user');
		$tMap->setPhpName('AppUser');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('KEEP_PASSWORD', 'KeepPassword', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('USERPASSWORD', 'Userpassword', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('KEEP_PASSWORD2', 'KeepPassword2', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('USERPASSWORD2', 'Userpassword2', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('USER_ROLE', 'UserRole', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('LAST_LOGIN_DATETIME', 'LastLoginDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('ACCESS_IP', 'AccessIp', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 1000);

	} 
} 