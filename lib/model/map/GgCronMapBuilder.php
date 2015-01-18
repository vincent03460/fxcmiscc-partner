<?php



class GgCronMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgCronMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_cron');
		$tMap->setPhpName('GgCron');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('STARTED', 'Started', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('COMPLETED', 'Completed', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SUCCESS', 'Success', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ENDED', 'Ended', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('YEAR', 'Year', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('MONTH', 'Month', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DAY', 'Day', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('WEEK', 'Week', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('MESSAGE', 'Message', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 