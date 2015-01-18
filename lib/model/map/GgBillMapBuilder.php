<?php



class GgBillMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgBillMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_bill');
		$tMap->setPhpName('GgBill');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TOTAL_BILL', 'TotalBill', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TOTAL_OLD_BILL', 'TotalOldBill', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 