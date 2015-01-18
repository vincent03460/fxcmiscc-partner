<?php



class MlmIbPackageMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmIbPackageMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_ib_package');
		$tMap->setPhpName('MlmIbPackage');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('IB_PACKAGE_ID', 'IbPackageId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PACKAGE_NAME', 'PackageName', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('COMMISSION', 'Commission', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 