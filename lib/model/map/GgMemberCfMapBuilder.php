<?php



class GgMemberCfMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMemberCfMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_member_cf');
		$tMap->setPhpName('GgMemberCf');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('LEG', 'Leg', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('VOLUME_TYPE', 'VolumeType', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('BV', 'Bv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PAIR_AMOUNT', 'PairAmount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('FLASH_AMOUNT', 'FlashAmount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::DATE, true, null);

	} 
} 