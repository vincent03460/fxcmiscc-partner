<?php



class MlmDebitCardRegistrationMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDebitCardRegistrationMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_debit_card_registration');
		$tMap->setPhpName('MlmDebitCardRegistration');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('CARD_ID', 'CardId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FULL_NAME', 'FullName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DOB', 'Dob', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('IC', 'Ic', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MOTHER_MAIDEN_NAME', 'MotherMaidenName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NAME_ON_CARD', 'NameOnCard', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ADDRESS', 'Address', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ADDRESS2', 'Address2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('POSTCODE', 'Postcode', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CONTACT', 'Contact', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 