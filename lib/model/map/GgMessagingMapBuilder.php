<?php



class GgMessagingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMessagingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_messaging');
		$tMap->setPhpName('GgMessaging');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('FROM_TYPE', 'FromType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FROM_UID', 'FromUid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('FROM_DELETED', 'FromDeleted', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TO_TYPE', 'ToType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TO_UID', 'ToUid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TO_READ', 'ToRead', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TO_DELETED', 'ToDeleted', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SUBJECT', 'Subject', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('MESSAGE', 'Message', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 