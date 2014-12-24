<?php



class MlmDistCommissionLedgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDistCommissionLedgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_dist_commission_ledger');
		$tMap->setPhpName('MlmDistCommissionLedger');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('COMMISSION_ID', 'CommissionId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('COMMISSION_TYPE', 'CommissionType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TRANSACTION_TYPE', 'TransactionType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('REF_ID', 'RefId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONTH_TRADED', 'MonthTraded', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('YEAR_TRADED', 'YearTraded', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREDIT', 'Credit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('DEBIT', 'Debit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('BALANCE', 'Balance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PIPS_DOWNLINE_USERNAME', 'PipsDownlineUsername', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PIPS_MT4_ID', 'PipsMt4Id', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PIPS_REBATE', 'PipsRebate', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('PIPS_LEVEL', 'PipsLevel', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PIPS_LOTS_TRADED', 'PipsLotsTraded', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 25);

	} 
} 