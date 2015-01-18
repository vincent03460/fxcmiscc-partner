<?php



class GgProductsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgProductsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_products');
		$tMap->setPhpName('GgProducts');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('CATID', 'Catid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('PROD_TYPE', 'ProdType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('REFNO', 'Refno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('BV', 'Bv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('BV_FIX', 'BvFix', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('DP', 'Dp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('DP_FIX', 'DpFix', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('RP', 'Rp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('RP_FIX', 'RpFix', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('QTY_TYPE', 'QtyType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('IMAGE_FILE', 'ImageFile', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('DESCR', 'Descr', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 