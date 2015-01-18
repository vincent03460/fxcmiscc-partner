<?php



class GgStckProdQtyRecordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgStckProdQtyRecordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_stck_prod_qty_record');
		$tMap->setPhpName('GgStckProdQtyRecord');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PID', 'Pid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('SLID', 'Slid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('SSLID', 'Sslid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('SID', 'Sid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TTYPE', 'Ttype', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 