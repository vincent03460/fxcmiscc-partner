<?php



class GgShareTradingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgShareTradingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_share_trading');
		$tMap->setPhpName('GgShareTrading');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UID', 'Uid', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PRICE', 'Price', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MATCH_QTY', 'MatchQty', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('PAYMENT_TYPE', 'PaymentType', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 