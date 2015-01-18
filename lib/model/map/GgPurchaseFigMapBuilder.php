<?php



class GgPurchaseFigMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgPurchaseFigMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_purchase_fig');
		$tMap->setPhpName('GgPurchaseFig');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('NETWORK', 'Network', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('PS_BV', 'PsBv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PS_DP', 'PsDp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PS_RP', 'PsRp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PGS_BV', 'PgsBv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PGS_DP', 'PgsDp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PGS_RP', 'PgsRp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('YEAR', 'Year', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('MONTH', 'Month', 'int', CreoleTypes::TINYINT, true, null);

	} 
} 