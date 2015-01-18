<?php



class MlmMt4DemoRequestMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmMt4DemoRequestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_mt4_demo_request');
		$tMap->setPhpName('MlmMt4DemoRequest');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('REQUEST_ID', 'RequestId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PHONE_NUMBER', 'PhoneNumber', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LAST_NAME', 'LastName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('LIVE_DEMO', 'LiveDemo', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ADDRESS1', 'Address1', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ADDRESS2', 'Address2', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('AGREE_OF_BUSINESS', 'AgreeOfBusiness', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('RISK_DISCLOSURE', 'RiskDisclosure', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('COUNTRY_OF_CITIZEN', 'CountryOfCitizen', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DOB_DAY', 'DobDay', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DOB_MONTH', 'DobMonth', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DOB_YEAR', 'DobYear', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REF_ID', 'RefId', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PASSPORT', 'Passport', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SUBJECT', 'Subject', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ADDRESS_STATE', 'AddressState', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 