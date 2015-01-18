<?php



class GgShareTargetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgShareTargetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_share_target');
		$tMap->setPhpName('GgShareTarget');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('SHARE_PRICE', 'SharePrice', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BALANCE', 'Balance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('SELL_BALANCE', 'SellBalance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('BUY_BALANCE', 'BuyBalance', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('FAKE_SELL', 'FakeSell', 'double', CreoleTypes::DECIMAL, true, 12);

	} 
} 