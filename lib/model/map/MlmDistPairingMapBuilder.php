<?php



class MlmDistPairingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDistPairingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_dist_pairing');
		$tMap->setPhpName('MlmDistPairing');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('PAIRING_ID', 'PairingId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LEFT_BALANCE', 'LeftBalance', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('RIGHT_BALANCE', 'RightBalance', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FLUSH_LIMIT', 'FlushLimit', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 