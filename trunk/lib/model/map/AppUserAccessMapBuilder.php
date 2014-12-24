<?php



class AppUserAccessMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AppUserAccessMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('app_user_access');
		$tMap->setPhpName('AppUserAccess');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ACCESS_CODE', 'AccessCode', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('PARENT_ID', 'ParentId', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MENU_URL', 'MenuUrl', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MENU_LABEL', 'MenuLabel', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('IS_MENU', 'IsMenu', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('IS_AUTH_NEEDED', 'IsAuthNeeded', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TREE_LEVEL', 'TreeLevel', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TREE_SEQ', 'TreeSeq', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TREE_STRUCTURE', 'TreeStructure', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 