<?php



class GgPurchaseDetailMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgPurchaseDetailMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_purchase_detail');
		$tMap->setPhpName('GgPurchaseDetail');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('SLID', 'Slid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PID', 'Pid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PKID', 'Pkid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PROD_TYPE', 'ProdType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('REFNO', 'Refno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('PRODUCT_CODE', 'ProductCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('PRODUCT_NAME', 'ProductName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('BV', 'Bv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('DP', 'Dp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('RP', 'Rp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL', 'Total', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL_BV', 'TotalBv', 'double', CreoleTypes::DECIMAL, true, 15);

	} 
} 