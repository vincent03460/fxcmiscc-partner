<?php



class GgShareTradingLedgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgShareTradingLedgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_share_trading_ledger');
		$tMap->setPhpName('GgShareTradingLedger');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TRADING_ID', 'TradingId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UID', 'Uid', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BUY_UID', 'BuyUid', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('SELL_UID', 'SellUid', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PRICE', 'Price', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 