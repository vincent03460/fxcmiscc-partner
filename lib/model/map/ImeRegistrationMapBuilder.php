<?php



class ImeRegistrationMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ImeRegistrationMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ime_registration');
		$tMap->setPhpName('ImeRegistration');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('IME_ID', 'ImeId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FULL_NAME', 'FullName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FULL_NAME_CHINESE', 'FullNameChinese', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DISTRIBUTOR_CODE', 'DistributorCode', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PASSPORT_NUMBER', 'PassportNumber', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NATIONALITY', 'Nationality', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MOBILE_NO', 'MobileNo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_TYPE', 'AccountType', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SUB_TOTAL', 'SubTotal', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 