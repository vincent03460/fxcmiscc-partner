<?php



class MlmPackageChallengeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmPackageChallengeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_package_challenge');
		$tMap->setPhpName('MlmPackageChallenge');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('CHALLENGE_ID', 'ChallengeId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CHALLENGE_TYPE', 'ChallengeType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DATE_FROM', 'DateFrom', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('DATE_TO', 'DateTo', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('TOTAL_SALES', 'TotalSales', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('INTERNAL_REMARK', 'InternalRemark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 