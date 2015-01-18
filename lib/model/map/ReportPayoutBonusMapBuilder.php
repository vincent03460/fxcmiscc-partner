<?php



class ReportPayoutBonusMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ReportPayoutBonusMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('report_payout_bonus');
		$tMap->setPhpName('ReportPayoutBonus');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BONUS_DATE', 'BonusDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('TOTAL_SALES', 'TotalSales', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('TOTAL_DRB', 'TotalDrb', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('TOTAL_GDB', 'TotalGdb', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('GDB_PERCENTAGE', 'GdbPercentage', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 