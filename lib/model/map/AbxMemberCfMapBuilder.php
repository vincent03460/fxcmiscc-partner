<?php



class AbxMemberCfMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AbxMemberCfMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('abx_member_cf');
		$tMap->setPhpName('AbxMemberCf');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('DID', 'Did', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('ODATE', 'Odate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('BACK_AMOUNT', 'BackAmount', 'double', CreoleTypes::DECIMAL, true, 15);

	} 
} 