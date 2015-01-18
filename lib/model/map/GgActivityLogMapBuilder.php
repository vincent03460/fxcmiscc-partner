<?php



class GgActivityLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgActivityLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_activity_log');
		$tMap->setPhpName('GgActivityLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('INITIATOR', 'Initiator', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('IID', 'Iid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('WID', 'Wid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('AFFECTED_USER_TYPE', 'AffectedUserType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AFFECTED_UID', 'AffectedUid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PID', 'Pid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('SLID', 'Slid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('CODE', 'Code', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCR', 'Descr', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 