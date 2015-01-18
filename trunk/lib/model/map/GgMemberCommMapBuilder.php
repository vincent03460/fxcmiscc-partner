<?php



class GgMemberCommMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMemberCommMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_member_comm');
		$tMap->setPhpName('GgMemberComm');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('MID', 'Mid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PID', 'Pid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('CID', 'Cid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('NID', 'Nid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('FROM_UID', 'FromUid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('VOLUME_TYPE', 'VolumeType', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('AMOUNT2', 'Amount2', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PERCENT', 'Percent', 'double', CreoleTypes::DECIMAL, true, 5);

		$tMap->addColumn('PERCENT2', 'Percent2', 'double', CreoleTypes::DECIMAL, true, 5);

		$tMap->addColumn('LEG1', 'Leg1', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('LEG1_ID', 'Leg1Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('LEG1_AMOUNT', 'Leg1Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('LEG2', 'Leg2', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('LEG2_ID', 'Leg2Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('LEG2_AMOUNT', 'Leg2Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PAIRED_UNIT', 'PairedUnit', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('LEVEL', 'Level', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('LEVEL2', 'Level2', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('YEAR', 'Year', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('MONTH', 'Month', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('WEEK', 'Week', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DAY', 'Day', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESCR', 'Descr', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('BONUS_DATE', 'BonusDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('FLAG', 'Flag', 'int', CreoleTypes::TINYINT, true, null);

	} 
} 