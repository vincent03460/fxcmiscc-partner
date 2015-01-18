<?php



class GgMemberCommSumMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMemberCommSumMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_member_comm_sum');
		$tMap->setPhpName('GgMemberCommSum');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PGS', 'Pgs', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('LCF', 'Lcf', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('RCF', 'Rcf', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PBV', 'Pbv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('FBV', 'Fbv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('S', 'S', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('P', 'P', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('M', 'M', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('W', 'W', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('DLOT', 'Dlot', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BONUS_DATE', 'BonusDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('FLAG', 'Flag', 'int', CreoleTypes::TINYINT, true, null);

	} 
} 