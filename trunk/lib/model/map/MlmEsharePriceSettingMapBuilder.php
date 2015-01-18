<?php



class MlmEsharePriceSettingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmEsharePriceSettingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_eshare_price_setting');
		$tMap->setPhpName('MlmEsharePriceSetting');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('SETTING_ID', 'SettingId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('SHARE_VALUE', 'ShareValue', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('VOLUME', 'Volume', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 