<?php



class MlmDailyBonusLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDailyBonusLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_daily_bonus_log');
		$tMap->setPhpName('MlmDailyBonusLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('LOG_ID', 'LogId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCESS_IP', 'AccessIp', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('BONUS_TYPE', 'BonusType', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('BONUS_DATE', 'BonusDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 