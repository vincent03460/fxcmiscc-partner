<?php



class MlmAccountLedgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmAccountLedgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_account_ledger');
		$tMap->setPhpName('MlmAccountLedger');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_TYPE', 'AccountType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TRANSACTION_TYPE', 'TransactionType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREDIT', 'Credit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('DEBIT', 'Debit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('BALANCE', 'Balance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('INTERNAL_REMARK', 'InternalRemark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('REF_ID', 'RefId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('REF_TYPE', 'RefType', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 