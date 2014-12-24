<?php



class MlmAnnouncementMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmAnnouncementMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_announcement');
		$tMap->setPhpName('MlmAnnouncement');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ANNOUNCEMENT_ID', 'AnnouncementId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TITLE_CN', 'TitleCn', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TITLE_JP', 'TitleJp', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CONTENT', 'Content', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CONTENT_CN', 'ContentCn', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CONTENT_JP', 'ContentJp', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('SHORT_CONTENT', 'ShortContent', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('SHORT_CONTENT_CN', 'ShortContentCn', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('SHORT_CONTENT_JP', 'ShortContentJp', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 