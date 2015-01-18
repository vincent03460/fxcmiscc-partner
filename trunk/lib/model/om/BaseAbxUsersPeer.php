<?php


abstract class BaseAbxUsersPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'abx_users';

	
	const CLASS_DEFAULT = 'lib.model.AbxUsers';

	
	const NUM_COLUMNS = 66;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'abx_users.ID';

	
	const NAME = 'abx_users.NAME';

	
	const CHINESE_NAME = 'abx_users.CHINESE_NAME';

	
	const ENGLISH_NAME = 'abx_users.ENGLISH_NAME';

	
	const USERNAME = 'abx_users.USERNAME';

	
	const PASSWORD = 'abx_users.PASSWORD';

	
	const ENC_PASSWORD = 'abx_users.ENC_PASSWORD';

	
	const SEC_PASSWORD = 'abx_users.SEC_PASSWORD';

	
	const ENC_SEC_PASSWORD = 'abx_users.ENC_SEC_PASSWORD';

	
	const CUSTODIANKEY = 'abx_users.CUSTODIANKEY';

	
	const ENC_CUSTODIANKEY = 'abx_users.ENC_CUSTODIANKEY';

	
	const CUST_DATA = 'abx_users.CUST_DATA';

	
	const MT4_DATA = 'abx_users.MT4_DATA';

	
	const MT4_BATCH = 'abx_users.MT4_BATCH';

	
	const COUNT_LOGIN = 'abx_users.COUNT_LOGIN';

	
	const ADMIN_RANK = 'abx_users.ADMIN_RANK';

	
	const REF = 'abx_users.REF';

	
	const PRIMARY_ACC = 'abx_users.PRIMARY_ACC';

	
	const PRIMARY_ID = 'abx_users.PRIMARY_ID';

	
	const UPLINE1 = 'abx_users.UPLINE1';

	
	const POSITION1 = 'abx_users.POSITION1';

	
	const EMAIL = 'abx_users.EMAIL';

	
	const EWALLET = 'abx_users.EWALLET';

	
	const CWALLET = 'abx_users.CWALLET';

	
	const MT4WALLET = 'abx_users.MT4WALLET';

	
	const FWALLET = 'abx_users.FWALLET';

	
	const EPOINT = 'abx_users.EPOINT';

	
	const ECASH = 'abx_users.ECASH';

	
	const EWALLET_DEBT = 'abx_users.EWALLET_DEBT';

	
	const REINVEST = 'abx_users.REINVEST';

	
	const SEWALLET = 'abx_users.SEWALLET';

	
	const SEPOINT = 'abx_users.SEPOINT';

	
	const EWALLET_MANDATORY = 'abx_users.EWALLET_MANDATORY';

	
	const IC = 'abx_users.IC';

	
	const EEP = 'abx_users.EEP';

	
	const ENGLISH_ADDRESS = 'abx_users.ENGLISH_ADDRESS';

	
	const ENGLISH_ADDRESS2 = 'abx_users.ENGLISH_ADDRESS2';

	
	const NATIONALITY = 'abx_users.NATIONALITY';

	
	const STREET1 = 'abx_users.STREET1';

	
	const STREET2 = 'abx_users.STREET2';

	
	const CITY = 'abx_users.CITY';

	
	const ZIP = 'abx_users.ZIP';

	
	const STATE = 'abx_users.STATE';

	
	const COUNTRY = 'abx_users.COUNTRY';

	
	const MOBILENO = 'abx_users.MOBILENO';

	
	const DOB = 'abx_users.DOB';

	
	const GENDER = 'abx_users.GENDER';

	
	const BANK_NAME = 'abx_users.BANK_NAME';

	
	const BANK_BRANCH_NAME = 'abx_users.BANK_BRANCH_NAME';

	
	const BANK_PAYEE_NAME = 'abx_users.BANK_PAYEE_NAME';

	
	const BANK_ACC_NO = 'abx_users.BANK_ACC_NO';

	
	const BANK_SORTING_CODE = 'abx_users.BANK_SORTING_CODE';

	
	const BANK_IBAN = 'abx_users.BANK_IBAN';

	
	const ACC_TYPE = 'abx_users.ACC_TYPE';

	
	const USER_ROLE = 'abx_users.USER_ROLE';

	
	const LANGUAGE = 'abx_users.LANGUAGE';

	
	const STATUS = 'abx_users.STATUS';

	
	const DEBT_STATUS = 'abx_users.DEBT_STATUS';

	
	const DEBT_DEDUCT_PERCENT = 'abx_users.DEBT_DEDUCT_PERCENT';

	
	const SUMMARY_MODE = 'abx_users.SUMMARY_MODE';

	
	const GENEALOGY_LOCK = 'abx_users.GENEALOGY_LOCK';

	
	const PROFILE_LOCK = 'abx_users.PROFILE_LOCK';

	
	const LEVEL = 'abx_users.LEVEL';

	
	const CDATE = 'abx_users.CDATE';

	
	const PROFILE_UPDATED = 'abx_users.PROFILE_UPDATED';

	
	const STATUS_CODE = 'abx_users.STATUS_CODE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'ChineseName', 'EnglishName', 'Username', 'Password', 'EncPassword', 'SecPassword', 'EncSecPassword', 'Custodiankey', 'EncCustodiankey', 'CustData', 'Mt4Data', 'Mt4Batch', 'CountLogin', 'AdminRank', 'Ref', 'PrimaryAcc', 'PrimaryId', 'Upline1', 'Position1', 'Email', 'Ewallet', 'Cwallet', 'Mt4wallet', 'Fwallet', 'Epoint', 'Ecash', 'EwalletDebt', 'Reinvest', 'Sewallet', 'Sepoint', 'EwalletMandatory', 'Ic', 'Eep', 'EnglishAddress', 'EnglishAddress2', 'Nationality', 'Street1', 'Street2', 'City', 'Zip', 'State', 'Country', 'Mobileno', 'Dob', 'Gender', 'BankName', 'BankBranchName', 'BankPayeeName', 'BankAccNo', 'BankSortingCode', 'BankIban', 'AccType', 'UserRole', 'Language', 'Status', 'DebtStatus', 'DebtDeductPercent', 'SummaryMode', 'GenealogyLock', 'ProfileLock', 'Level', 'Cdate', 'ProfileUpdated', 'StatusCode', ),
		BasePeer::TYPE_COLNAME => array (AbxUsersPeer::ID, AbxUsersPeer::NAME, AbxUsersPeer::CHINESE_NAME, AbxUsersPeer::ENGLISH_NAME, AbxUsersPeer::USERNAME, AbxUsersPeer::PASSWORD, AbxUsersPeer::ENC_PASSWORD, AbxUsersPeer::SEC_PASSWORD, AbxUsersPeer::ENC_SEC_PASSWORD, AbxUsersPeer::CUSTODIANKEY, AbxUsersPeer::ENC_CUSTODIANKEY, AbxUsersPeer::CUST_DATA, AbxUsersPeer::MT4_DATA, AbxUsersPeer::MT4_BATCH, AbxUsersPeer::COUNT_LOGIN, AbxUsersPeer::ADMIN_RANK, AbxUsersPeer::REF, AbxUsersPeer::PRIMARY_ACC, AbxUsersPeer::PRIMARY_ID, AbxUsersPeer::UPLINE1, AbxUsersPeer::POSITION1, AbxUsersPeer::EMAIL, AbxUsersPeer::EWALLET, AbxUsersPeer::CWALLET, AbxUsersPeer::MT4WALLET, AbxUsersPeer::FWALLET, AbxUsersPeer::EPOINT, AbxUsersPeer::ECASH, AbxUsersPeer::EWALLET_DEBT, AbxUsersPeer::REINVEST, AbxUsersPeer::SEWALLET, AbxUsersPeer::SEPOINT, AbxUsersPeer::EWALLET_MANDATORY, AbxUsersPeer::IC, AbxUsersPeer::EEP, AbxUsersPeer::ENGLISH_ADDRESS, AbxUsersPeer::ENGLISH_ADDRESS2, AbxUsersPeer::NATIONALITY, AbxUsersPeer::STREET1, AbxUsersPeer::STREET2, AbxUsersPeer::CITY, AbxUsersPeer::ZIP, AbxUsersPeer::STATE, AbxUsersPeer::COUNTRY, AbxUsersPeer::MOBILENO, AbxUsersPeer::DOB, AbxUsersPeer::GENDER, AbxUsersPeer::BANK_NAME, AbxUsersPeer::BANK_BRANCH_NAME, AbxUsersPeer::BANK_PAYEE_NAME, AbxUsersPeer::BANK_ACC_NO, AbxUsersPeer::BANK_SORTING_CODE, AbxUsersPeer::BANK_IBAN, AbxUsersPeer::ACC_TYPE, AbxUsersPeer::USER_ROLE, AbxUsersPeer::LANGUAGE, AbxUsersPeer::STATUS, AbxUsersPeer::DEBT_STATUS, AbxUsersPeer::DEBT_DEDUCT_PERCENT, AbxUsersPeer::SUMMARY_MODE, AbxUsersPeer::GENEALOGY_LOCK, AbxUsersPeer::PROFILE_LOCK, AbxUsersPeer::LEVEL, AbxUsersPeer::CDATE, AbxUsersPeer::PROFILE_UPDATED, AbxUsersPeer::STATUS_CODE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'chinese_name', 'english_name', 'username', 'password', 'enc_password', 'sec_password', 'enc_sec_password', 'custodiankey', 'enc_custodiankey', 'cust_data', 'mt4_data', 'mt4_batch', 'count_login', 'admin_rank', 'ref', 'primary_acc', 'primary_id', 'upline1', 'position1', 'email', 'ewallet', 'cwallet', 'mt4wallet', 'fwallet', 'epoint', 'ecash', 'ewallet_debt', 'reinvest', 'sewallet', 'sepoint', 'ewallet_mandatory', 'ic', 'eep', 'english_address', 'english_address2', 'nationality', 'street1', 'street2', 'city', 'zip', 'state', 'country', 'mobileno', 'dob', 'gender', 'bank_name', 'bank_branch_name', 'bank_payee_name', 'bank_acc_no', 'bank_sorting_code', 'bank_iban', 'acc_type', 'user_role', 'language', 'status', 'debt_status', 'debt_deduct_percent', 'summary_mode', 'genealogy_lock', 'profile_lock', 'level', 'cdate', 'profile_updated', 'status_code', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'ChineseName' => 2, 'EnglishName' => 3, 'Username' => 4, 'Password' => 5, 'EncPassword' => 6, 'SecPassword' => 7, 'EncSecPassword' => 8, 'Custodiankey' => 9, 'EncCustodiankey' => 10, 'CustData' => 11, 'Mt4Data' => 12, 'Mt4Batch' => 13, 'CountLogin' => 14, 'AdminRank' => 15, 'Ref' => 16, 'PrimaryAcc' => 17, 'PrimaryId' => 18, 'Upline1' => 19, 'Position1' => 20, 'Email' => 21, 'Ewallet' => 22, 'Cwallet' => 23, 'Mt4wallet' => 24, 'Fwallet' => 25, 'Epoint' => 26, 'Ecash' => 27, 'EwalletDebt' => 28, 'Reinvest' => 29, 'Sewallet' => 30, 'Sepoint' => 31, 'EwalletMandatory' => 32, 'Ic' => 33, 'Eep' => 34, 'EnglishAddress' => 35, 'EnglishAddress2' => 36, 'Nationality' => 37, 'Street1' => 38, 'Street2' => 39, 'City' => 40, 'Zip' => 41, 'State' => 42, 'Country' => 43, 'Mobileno' => 44, 'Dob' => 45, 'Gender' => 46, 'BankName' => 47, 'BankBranchName' => 48, 'BankPayeeName' => 49, 'BankAccNo' => 50, 'BankSortingCode' => 51, 'BankIban' => 52, 'AccType' => 53, 'UserRole' => 54, 'Language' => 55, 'Status' => 56, 'DebtStatus' => 57, 'DebtDeductPercent' => 58, 'SummaryMode' => 59, 'GenealogyLock' => 60, 'ProfileLock' => 61, 'Level' => 62, 'Cdate' => 63, 'ProfileUpdated' => 64, 'StatusCode' => 65, ),
		BasePeer::TYPE_COLNAME => array (AbxUsersPeer::ID => 0, AbxUsersPeer::NAME => 1, AbxUsersPeer::CHINESE_NAME => 2, AbxUsersPeer::ENGLISH_NAME => 3, AbxUsersPeer::USERNAME => 4, AbxUsersPeer::PASSWORD => 5, AbxUsersPeer::ENC_PASSWORD => 6, AbxUsersPeer::SEC_PASSWORD => 7, AbxUsersPeer::ENC_SEC_PASSWORD => 8, AbxUsersPeer::CUSTODIANKEY => 9, AbxUsersPeer::ENC_CUSTODIANKEY => 10, AbxUsersPeer::CUST_DATA => 11, AbxUsersPeer::MT4_DATA => 12, AbxUsersPeer::MT4_BATCH => 13, AbxUsersPeer::COUNT_LOGIN => 14, AbxUsersPeer::ADMIN_RANK => 15, AbxUsersPeer::REF => 16, AbxUsersPeer::PRIMARY_ACC => 17, AbxUsersPeer::PRIMARY_ID => 18, AbxUsersPeer::UPLINE1 => 19, AbxUsersPeer::POSITION1 => 20, AbxUsersPeer::EMAIL => 21, AbxUsersPeer::EWALLET => 22, AbxUsersPeer::CWALLET => 23, AbxUsersPeer::MT4WALLET => 24, AbxUsersPeer::FWALLET => 25, AbxUsersPeer::EPOINT => 26, AbxUsersPeer::ECASH => 27, AbxUsersPeer::EWALLET_DEBT => 28, AbxUsersPeer::REINVEST => 29, AbxUsersPeer::SEWALLET => 30, AbxUsersPeer::SEPOINT => 31, AbxUsersPeer::EWALLET_MANDATORY => 32, AbxUsersPeer::IC => 33, AbxUsersPeer::EEP => 34, AbxUsersPeer::ENGLISH_ADDRESS => 35, AbxUsersPeer::ENGLISH_ADDRESS2 => 36, AbxUsersPeer::NATIONALITY => 37, AbxUsersPeer::STREET1 => 38, AbxUsersPeer::STREET2 => 39, AbxUsersPeer::CITY => 40, AbxUsersPeer::ZIP => 41, AbxUsersPeer::STATE => 42, AbxUsersPeer::COUNTRY => 43, AbxUsersPeer::MOBILENO => 44, AbxUsersPeer::DOB => 45, AbxUsersPeer::GENDER => 46, AbxUsersPeer::BANK_NAME => 47, AbxUsersPeer::BANK_BRANCH_NAME => 48, AbxUsersPeer::BANK_PAYEE_NAME => 49, AbxUsersPeer::BANK_ACC_NO => 50, AbxUsersPeer::BANK_SORTING_CODE => 51, AbxUsersPeer::BANK_IBAN => 52, AbxUsersPeer::ACC_TYPE => 53, AbxUsersPeer::USER_ROLE => 54, AbxUsersPeer::LANGUAGE => 55, AbxUsersPeer::STATUS => 56, AbxUsersPeer::DEBT_STATUS => 57, AbxUsersPeer::DEBT_DEDUCT_PERCENT => 58, AbxUsersPeer::SUMMARY_MODE => 59, AbxUsersPeer::GENEALOGY_LOCK => 60, AbxUsersPeer::PROFILE_LOCK => 61, AbxUsersPeer::LEVEL => 62, AbxUsersPeer::CDATE => 63, AbxUsersPeer::PROFILE_UPDATED => 64, AbxUsersPeer::STATUS_CODE => 65, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'chinese_name' => 2, 'english_name' => 3, 'username' => 4, 'password' => 5, 'enc_password' => 6, 'sec_password' => 7, 'enc_sec_password' => 8, 'custodiankey' => 9, 'enc_custodiankey' => 10, 'cust_data' => 11, 'mt4_data' => 12, 'mt4_batch' => 13, 'count_login' => 14, 'admin_rank' => 15, 'ref' => 16, 'primary_acc' => 17, 'primary_id' => 18, 'upline1' => 19, 'position1' => 20, 'email' => 21, 'ewallet' => 22, 'cwallet' => 23, 'mt4wallet' => 24, 'fwallet' => 25, 'epoint' => 26, 'ecash' => 27, 'ewallet_debt' => 28, 'reinvest' => 29, 'sewallet' => 30, 'sepoint' => 31, 'ewallet_mandatory' => 32, 'ic' => 33, 'eep' => 34, 'english_address' => 35, 'english_address2' => 36, 'nationality' => 37, 'street1' => 38, 'street2' => 39, 'city' => 40, 'zip' => 41, 'state' => 42, 'country' => 43, 'mobileno' => 44, 'dob' => 45, 'gender' => 46, 'bank_name' => 47, 'bank_branch_name' => 48, 'bank_payee_name' => 49, 'bank_acc_no' => 50, 'bank_sorting_code' => 51, 'bank_iban' => 52, 'acc_type' => 53, 'user_role' => 54, 'language' => 55, 'status' => 56, 'debt_status' => 57, 'debt_deduct_percent' => 58, 'summary_mode' => 59, 'genealogy_lock' => 60, 'profile_lock' => 61, 'level' => 62, 'cdate' => 63, 'profile_updated' => 64, 'status_code' => 65, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AbxUsersMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AbxUsersMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AbxUsersPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(AbxUsersPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AbxUsersPeer::ID);

		$criteria->addSelectColumn(AbxUsersPeer::NAME);

		$criteria->addSelectColumn(AbxUsersPeer::CHINESE_NAME);

		$criteria->addSelectColumn(AbxUsersPeer::ENGLISH_NAME);

		$criteria->addSelectColumn(AbxUsersPeer::USERNAME);

		$criteria->addSelectColumn(AbxUsersPeer::PASSWORD);

		$criteria->addSelectColumn(AbxUsersPeer::ENC_PASSWORD);

		$criteria->addSelectColumn(AbxUsersPeer::SEC_PASSWORD);

		$criteria->addSelectColumn(AbxUsersPeer::ENC_SEC_PASSWORD);

		$criteria->addSelectColumn(AbxUsersPeer::CUSTODIANKEY);

		$criteria->addSelectColumn(AbxUsersPeer::ENC_CUSTODIANKEY);

		$criteria->addSelectColumn(AbxUsersPeer::CUST_DATA);

		$criteria->addSelectColumn(AbxUsersPeer::MT4_DATA);

		$criteria->addSelectColumn(AbxUsersPeer::MT4_BATCH);

		$criteria->addSelectColumn(AbxUsersPeer::COUNT_LOGIN);

		$criteria->addSelectColumn(AbxUsersPeer::ADMIN_RANK);

		$criteria->addSelectColumn(AbxUsersPeer::REF);

		$criteria->addSelectColumn(AbxUsersPeer::PRIMARY_ACC);

		$criteria->addSelectColumn(AbxUsersPeer::PRIMARY_ID);

		$criteria->addSelectColumn(AbxUsersPeer::UPLINE1);

		$criteria->addSelectColumn(AbxUsersPeer::POSITION1);

		$criteria->addSelectColumn(AbxUsersPeer::EMAIL);

		$criteria->addSelectColumn(AbxUsersPeer::EWALLET);

		$criteria->addSelectColumn(AbxUsersPeer::CWALLET);

		$criteria->addSelectColumn(AbxUsersPeer::MT4WALLET);

		$criteria->addSelectColumn(AbxUsersPeer::FWALLET);

		$criteria->addSelectColumn(AbxUsersPeer::EPOINT);

		$criteria->addSelectColumn(AbxUsersPeer::ECASH);

		$criteria->addSelectColumn(AbxUsersPeer::EWALLET_DEBT);

		$criteria->addSelectColumn(AbxUsersPeer::REINVEST);

		$criteria->addSelectColumn(AbxUsersPeer::SEWALLET);

		$criteria->addSelectColumn(AbxUsersPeer::SEPOINT);

		$criteria->addSelectColumn(AbxUsersPeer::EWALLET_MANDATORY);

		$criteria->addSelectColumn(AbxUsersPeer::IC);

		$criteria->addSelectColumn(AbxUsersPeer::EEP);

		$criteria->addSelectColumn(AbxUsersPeer::ENGLISH_ADDRESS);

		$criteria->addSelectColumn(AbxUsersPeer::ENGLISH_ADDRESS2);

		$criteria->addSelectColumn(AbxUsersPeer::NATIONALITY);

		$criteria->addSelectColumn(AbxUsersPeer::STREET1);

		$criteria->addSelectColumn(AbxUsersPeer::STREET2);

		$criteria->addSelectColumn(AbxUsersPeer::CITY);

		$criteria->addSelectColumn(AbxUsersPeer::ZIP);

		$criteria->addSelectColumn(AbxUsersPeer::STATE);

		$criteria->addSelectColumn(AbxUsersPeer::COUNTRY);

		$criteria->addSelectColumn(AbxUsersPeer::MOBILENO);

		$criteria->addSelectColumn(AbxUsersPeer::DOB);

		$criteria->addSelectColumn(AbxUsersPeer::GENDER);

		$criteria->addSelectColumn(AbxUsersPeer::BANK_NAME);

		$criteria->addSelectColumn(AbxUsersPeer::BANK_BRANCH_NAME);

		$criteria->addSelectColumn(AbxUsersPeer::BANK_PAYEE_NAME);

		$criteria->addSelectColumn(AbxUsersPeer::BANK_ACC_NO);

		$criteria->addSelectColumn(AbxUsersPeer::BANK_SORTING_CODE);

		$criteria->addSelectColumn(AbxUsersPeer::BANK_IBAN);

		$criteria->addSelectColumn(AbxUsersPeer::ACC_TYPE);

		$criteria->addSelectColumn(AbxUsersPeer::USER_ROLE);

		$criteria->addSelectColumn(AbxUsersPeer::LANGUAGE);

		$criteria->addSelectColumn(AbxUsersPeer::STATUS);

		$criteria->addSelectColumn(AbxUsersPeer::DEBT_STATUS);

		$criteria->addSelectColumn(AbxUsersPeer::DEBT_DEDUCT_PERCENT);

		$criteria->addSelectColumn(AbxUsersPeer::SUMMARY_MODE);

		$criteria->addSelectColumn(AbxUsersPeer::GENEALOGY_LOCK);

		$criteria->addSelectColumn(AbxUsersPeer::PROFILE_LOCK);

		$criteria->addSelectColumn(AbxUsersPeer::LEVEL);

		$criteria->addSelectColumn(AbxUsersPeer::CDATE);

		$criteria->addSelectColumn(AbxUsersPeer::PROFILE_UPDATED);

		$criteria->addSelectColumn(AbxUsersPeer::STATUS_CODE);

	}

	const COUNT = 'COUNT(abx_users.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT abx_users.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
		
		$criteria = clone $criteria;

		
		$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AbxUsersPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AbxUsersPeer::COUNT);
		}

		
		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AbxUsersPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
			
			return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = AbxUsersPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AbxUsersPeer::populateObjects(AbxUsersPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AbxUsersPeer::addSelectColumns($criteria);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		
		
		return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
		
		$cls = AbxUsersPeer::getOMClass();
		$cls = Propel::import($cls);
		
		while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return AbxUsersPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} else {
			$criteria = $values->buildCriteria(); 
		}

		$criteria->remove(AbxUsersPeer::ID); 


		
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			
			
			$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 

			$comparison = $criteria->getComparison(AbxUsersPeer::ID);
			$selectCriteria->add(AbxUsersPeer::ID, $criteria->remove(AbxUsersPeer::ID), $comparison);

		} else { 
			$criteria = $values->buildCriteria(); 
			$selectCriteria = $values->buildPkeyCriteria(); 
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 
		try {
			
			
			$con->begin();
			$affectedRows += BasePeer::doDeleteAll(AbxUsersPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(AbxUsersPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
		} elseif ($values instanceof AbxUsers) {

			$criteria = $values->buildPkeyCriteria();
		} else {
			
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AbxUsersPeer::ID, (array) $values, Criteria::IN);
		}

		
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 

		try {
			
			
			$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(AbxUsers $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AbxUsersPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AbxUsersPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(AbxUsersPeer::DATABASE_NAME, AbxUsersPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AbxUsersPeer::DATABASE_NAME);

		$criteria->add(AbxUsersPeer::ID, $pk);


		$v = AbxUsersPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(AbxUsersPeer::ID, $pks, Criteria::IN);
			$objs = AbxUsersPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 


if (Propel::isInit()) {
	
	
	try {
		BaseAbxUsersPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
	
	
	require_once 'lib/model/map/AbxUsersMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AbxUsersMapBuilder');
}
