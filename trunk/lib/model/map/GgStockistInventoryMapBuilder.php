<?php



class GgStockistInventoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgStockistInventoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_stockist_inventory');
		$tMap->setPhpName('GgStockistInventory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('SID', 'Sid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PID', 'Pid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('REFNO', 'Refno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('BV', 'Bv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('DP', 'Dp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('RP', 'Rp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::SMALLINT, true, null);

	} 
} 