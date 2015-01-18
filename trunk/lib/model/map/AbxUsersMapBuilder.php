<?php



class AbxUsersMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AbxUsersMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('abx_users');
		$tMap->setPhpName('AbxUsers');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CHINESE_NAME', 'ChineseName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('ENGLISH_NAME', 'EnglishName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('ENC_PASSWORD', 'EncPassword', 'string', CreoleTypes::VARCHAR, true, 65);

		$tMap->addColumn('SEC_PASSWORD', 'SecPassword', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('ENC_SEC_PASSWORD', 'EncSecPassword', 'string', CreoleTypes::VARCHAR, true, 65);

		$tMap->addColumn('CUSTODIANKEY', 'Custodiankey', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('ENC_CUSTODIANKEY', 'EncCustodiankey', 'string', CreoleTypes::VARCHAR, true, 65);

		$tMap->addColumn('CUST_DATA', 'CustData', 'string', CreoleTypes::CHAR, true, 1);

		$tMap->addColumn('MT4_DATA', 'Mt4Data', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('MT4_BATCH', 'Mt4Batch', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('COUNT_LOGIN', 'CountLogin', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ADMIN_RANK', 'AdminRank', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REF', 'Ref', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PRIMARY_ACC', 'PrimaryAcc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PRIMARY_ID', 'PrimaryId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UPLINE1', 'Upline1', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('POSITION1', 'Position1', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('EWALLET', 'Ewallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('CWALLET', 'Cwallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('MT4WALLET', 'Mt4wallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('FWALLET', 'Fwallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('EPOINT', 'Epoint', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('ECASH', 'Ecash', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('EWALLET_DEBT', 'EwalletDebt', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('REINVEST', 'Reinvest', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('SEWALLET', 'Sewallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('SEPOINT', 'Sepoint', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('EWALLET_MANDATORY', 'EwalletMandatory', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('IC', 'Ic', 'string', CreoleTypes::VARCHAR, true, 25);

		$tMap->addColumn('EEP', 'Eep', 'string', CreoleTypes::VARCHAR, true, 25);

		$tMap->addColumn('ENGLISH_ADDRESS', 'EnglishAddress', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ENGLISH_ADDRESS2', 'EnglishAddress2', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NATIONALITY', 'Nationality', 'string', CreoleTypes::CHAR, true, 3);

		$tMap->addColumn('STREET1', 'Street1', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('STREET2', 'Street2', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ZIP', 'Zip', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('MOBILENO', 'Mobileno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DOB', 'Dob', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('GENDER', 'Gender', 'string', CreoleTypes::CHAR, true, 1);

		$tMap->addColumn('BANK_NAME', 'BankName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('BANK_BRANCH_NAME', 'BankBranchName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('BANK_PAYEE_NAME', 'BankPayeeName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('BANK_ACC_NO', 'BankAccNo', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('BANK_SORTING_CODE', 'BankSortingCode', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('BANK_IBAN', 'BankIban', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('ACC_TYPE', 'AccType', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('USER_ROLE', 'UserRole', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('LANGUAGE', 'Language', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('STATUS', 'Status', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DEBT_STATUS', 'DebtStatus', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DEBT_DEDUCT_PERCENT', 'DebtDeductPercent', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('SUMMARY_MODE', 'SummaryMode', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('GENEALOGY_LOCK', 'GenealogyLock', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('PROFILE_LOCK', 'ProfileLock', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('LEVEL', 'Level', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('PROFILE_UPDATED', 'ProfileUpdated', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

	} 
} 