<?php



class MlmDailyDistMt4CreditMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDailyDistMt4CreditMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_daily_dist_mt4_credit');
		$tMap->setPhpName('MlmDailyDistMt4Credit');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('CREDIT_ID', 'CreditId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MT4_USER_NAME', 'Mt4UserName', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MT4_CREDIT', 'Mt4Credit', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('TRADED_DATETIME', 'TradedDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IDX', 'Idx', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 