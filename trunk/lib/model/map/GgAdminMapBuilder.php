<?php



class GgAdminMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgAdminMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_admin');
		$tMap->setPhpName('GgAdmin');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('ENC_PASSWORD', 'EncPassword', 'string', CreoleTypes::VARCHAR, true, 65);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('MASTER', 'Master', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PV_DB', 'PvDb', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('PV_TASK', 'PvTask', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('RE_CONTACT', 'ReContact', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('RE_SYSTEM', 'ReSystem', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('RE_ERROR', 'ReError', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('LAST_LOGIN', 'LastLogin', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('LAST_LOGIN2', 'LastLogin2', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 