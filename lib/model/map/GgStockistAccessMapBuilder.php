<?php



class GgStockistAccessMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgStockistAccessMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_stockist_access');
		$tMap->setPhpName('GgStockistAccess');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('UID', 'Uid', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CID', 'Cid', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UDATE', 'Udate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::DATE, true, null);

	} 
} 