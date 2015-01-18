<?php



class GgUsersMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgUsersMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_users');
		$tMap->setPhpName('GgUsers');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('CODE', 'Code', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('NICKNAME', 'Nickname', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('ENC_PASSWORD', 'EncPassword', 'string', CreoleTypes::VARCHAR, true, 65);

		$tMap->addColumn('EWALLET_PASSWORD', 'EwalletPassword', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('EWALLET_ENC_PASSWORD', 'EwalletEncPassword', 'string', CreoleTypes::VARCHAR, true, 65);

		$tMap->addColumn('KEEP_EWALLET', 'KeepEwallet', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('EPOINT_PASSWORD', 'EpointPassword', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('EPOINT_ENC_PASSWORD', 'EpointEncPassword', 'string', CreoleTypes::VARCHAR, true, 65);

		$tMap->addColumn('DIVIDEND_COUNT', 'DividendCount', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIVIDEND_AMOUNT', 'DividendAmount', 'double', CreoleTypes::DECIMAL, true, 10);

		$tMap->addColumn('DIVIDEND_BALANCE', 'DividendBalance', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('MAX_DLOT', 'MaxDlot', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MAX_WLOT', 'MaxWlot', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MAINTENANCE_LOT', 'MaintenanceLot', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REF', 'Ref', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('REF_LEFT', 'RefLeft', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REF_RIGHT', 'RefRight', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REF_LEVEL', 'RefLevel', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATOR', 'Creator', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CID', 'Cid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('RANK_A', 'RankA', 'double', CreoleTypes::DECIMAL, true, 4);

		$tMap->addColumn('FUTURE_RANK', 'FutureRank', 'double', CreoleTypes::DECIMAL, true, 4);

		$tMap->addColumn('IS_STOCKIST', 'IsStockist', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('STOCKIST_UID', 'StockistUid', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STOCKIST_CODE', 'StockistCode', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('STOCKIST_ASSIGN_DATE', 'StockistAssignDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MATRIX_UPLINE', 'MatrixUpline', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('MATRIX_LEFT', 'MatrixLeft', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MATRIX_RIGHT', 'MatrixRight', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MATRIX_LEVEL', 'MatrixLevel', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MATRIX_POSITION', 'MatrixPosition', 'int', CreoleTypes::SMALLINT, true, null);

		$tMap->addColumn('PLACEMENT_DATE', 'PlacementDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('PLACEMENT_TYPE', 'PlacementType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('EWALLET', 'Ewallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('ESWALLET', 'Eswallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('SWALLET', 'Swallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('MWALLET', 'Mwallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('CWALLET', 'Cwallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('OWALLET', 'Owallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('RWALLET', 'Rwallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TWALLET', 'Twallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PWALLET', 'Pwallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('RTWALLET', 'Rtwallet', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('REFUND_BV', 'RefundBv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('INCENTIVE_DATE', 'IncentiveDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('INCENTIVE_AMOUNT', 'IncentiveAmount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('IC', 'Ic', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('ADDRESS', 'Address', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('ADDRESS2', 'Address2', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ZIP', 'Zip', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('HOMENO', 'Homeno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MOBILENO', 'Mobileno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('OFFICENO', 'Officeno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FAXNO', 'Faxno', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DOB', 'Dob', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('GENDER', 'Gender', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PAYEE_NAME', 'PayeeName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('BANK_NAME', 'BankName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('BANK_ACC_NO', 'BankAccNo', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('BANK_BRANCH', 'BankBranch', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('BANK_SWIFTCODE', 'BankSwiftcode', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ACC_TYPE', 'AccType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('BIS_REG', 'BisReg', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('PERSON_IN_CHARGE', 'PersonInCharge', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('OCCUPATION', 'Occupation', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('AUTOWIT', 'Autowit', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ACTIVATED', 'Activated', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ACTIVATED_DATE', 'ActivatedDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('RVC', 'Rvc', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('IS_FREE', 'IsFree', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('POOL_SHARE', 'PoolShare', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('MAIN_UID', 'MainUid', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('SPONSOR_PAID', 'SponsorPaid', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('FLASH_DATE', 'FlashDate', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('LAST_LOGIN', 'LastLogin', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('LAST_LOGIN2', 'LastLogin2', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('SITE_VISIT', 'SiteVisit', 'string', CreoleTypes::VARCHAR, true, 1);

	} 
} 