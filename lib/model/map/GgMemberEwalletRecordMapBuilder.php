<?php



class GgMemberEwalletRecordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMemberEwalletRecordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_member_ewallet_record');
		$tMap->setPhpName('GgMemberEwalletRecord');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('AID', 'Aid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('BAL', 'Bal', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('DESCR', 'Descr', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 