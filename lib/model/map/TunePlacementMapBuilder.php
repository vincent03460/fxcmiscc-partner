<?php



class TunePlacementMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TunePlacementMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tune_placement');
		$tMap->setPhpName('TunePlacement');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('PLACEMENT_ID', 'PlacementId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_CODE', 'DistCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('UPLINE_DIST_ID', 'UplineDistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPLINE_DIST_CODE', 'UplineDistCode', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PLACE_POSITION', 'PlacePosition', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 