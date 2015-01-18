<?php



class GgProductCategoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgProductCategoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_product_category');
		$tMap->setPhpName('GgProductCategory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PARENT_ID', 'ParentId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('PLAN', 'Plan', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('ACT', 'Act', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 