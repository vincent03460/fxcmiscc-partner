<?php



class MlmPackageUpgradeHistoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmPackageUpgradeHistoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_package_upgrade_history');
		$tMap->setPhpName('MlmPackageUpgradeHistory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('UPGRADE_ID', 'UpgradeId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PACKAGE_ID', 'PackageId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MT4_USER_NAME', 'Mt4UserName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('MT4_PASSWORD', 'Mt4Password', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TRANSACTION_CODE', 'TransactionCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 