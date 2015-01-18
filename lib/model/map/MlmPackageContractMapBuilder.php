<?php



class MlmPackageContractMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmPackageContractMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_package_contract');
		$tMap->setPhpName('MlmPackageContract');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('CONTRACT_ID', 'ContractId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FULL_NAME', 'FullName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MT4_ID', 'Mt4Id', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIST_MT4_ID', 'DistMt4Id', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PACKAGE_PRICE', 'PackagePrice', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SIGN_DATE_DAY', 'SignDateDay', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SIGN_DATE_MONTH', 'SignDateMonth', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SIGN_DATE_YEAR', 'SignDateYear', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('INITIAL_SIGNATURE', 'InitialSignature', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 