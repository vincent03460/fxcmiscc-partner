<?php



class AppSettingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AppSettingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('app_setting');
		$tMap->setPhpName('AppSetting');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('SETTING_ID', 'SettingId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('SETTING_PARAMETER', 'SettingParameter', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('SETTING_VALUE', 'SettingValue', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('SETTING_REMARK', 'SettingRemark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 