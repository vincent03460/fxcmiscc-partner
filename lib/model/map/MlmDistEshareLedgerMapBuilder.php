<?php



class MlmDistEshareLedgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDistEshareLedgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_dist_eshare_ledger');
		$tMap->setPhpName('MlmDistEshareLedger');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ESHARE_ID', 'EshareId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BUY_PRICE', 'BuyPrice', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('CREDIT', 'Credit', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('SELL_PRICE', 'SellPrice', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('DEBIT', 'Debit', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PROFIT', 'Profit', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('SHARE_BALANCE', 'ShareBalance', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('VALID_SELL_DATE', 'ValidSellDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('SELL_DATE', 'SellDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 