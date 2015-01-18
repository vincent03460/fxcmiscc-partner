<?php



class GgPackageDetailMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgPackageDetailMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_package_detail');
		$tMap->setPhpName('GgPackageDetail');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PKID', 'Pkid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PID', 'Pid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('REFNO', 'Refno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::SMALLINT, true, null);

	} 
} 