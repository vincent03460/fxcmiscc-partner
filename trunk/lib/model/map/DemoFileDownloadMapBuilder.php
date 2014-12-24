<?php



class DemoFileDownloadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DemoFileDownloadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('demo_file_download');
		$tMap->setPhpName('DemoFileDownload');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('FILE_ID', 'FileId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FILE_TYPE', 'FileType', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FILE_SRC', 'FileSrc', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FILE_NAME', 'FileName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CONTENT_TYPE', 'ContentType', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 