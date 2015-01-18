<?php



class LogAccountLedgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LogAccountLedgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('log_account_ledger');
		$tMap->setPhpName('LogAccountLedger');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('LOG_ID', 'LogId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_TYPE', 'AccountType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TRANSACTION_TYPE', 'TransactionType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ROLLING_POINT', 'RollingPoint', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CREDIT', 'Credit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('DEBIT', 'Debit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('BALANCE', 'Balance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('INTERNAL_REMARK', 'InternalRemark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('REFERER_ID', 'RefererId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('REFERER_TYPE', 'RefererType', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ACCESS_IP', 'AccessIp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 