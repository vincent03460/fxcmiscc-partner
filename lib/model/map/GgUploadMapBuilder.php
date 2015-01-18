<?php



class GgUploadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgUploadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_upload');
		$tMap->setPhpName('GgUpload');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('AID', 'Aid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UREMARK', 'Uremark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('AREMARK', 'Aremark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('FILENAME', 'Filename', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('ADATE', 'Adate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 