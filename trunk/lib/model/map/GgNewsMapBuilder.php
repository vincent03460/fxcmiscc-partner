<?php



class GgNewsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgNewsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_news');
		$tMap->setPhpName('GgNews');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('F_ID', 'FId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('F_TITLE', 'FTitle', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('F_TITLE_CN', 'FTitleCn', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('F_CONTENT', 'FContent', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('F_CONTENT_CN', 'FContentCn', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('F_DATE', 'FDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('F_STATUS', 'FStatus', 'string', CreoleTypes::VARCHAR, true, 50);

	} 
} 