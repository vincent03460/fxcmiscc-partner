<?php



class MlmRoiForecastMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmRoiForecastMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_roi_forecast');
		$tMap->setPhpName('MlmRoiForecast');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ROI_ID', 'RoiId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DATE_YEAR', 'DateYear', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DATE_MONTH', 'DateMonth', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ROI_3K_5K', 'Roi3k5k', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('ROI_10K_15K', 'Roi10k15k', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('ROI_30K_50K', 'Roi30k50k', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 