<?php



class MlmDistPairingLedger2MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDistPairingLedger2MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_dist_pairing_ledger2');
		$tMap->setPhpName('MlmDistPairingLedger2');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('PAIRING_ID', 'PairingId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LEFT_RIGHT', 'LeftRight', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('TRANSACTION_TYPE', 'TransactionType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREDIT', 'Credit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('CREDIT_ACTUAL', 'CreditActual', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('DEBIT', 'Debit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('BALANCE', 'Balance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 