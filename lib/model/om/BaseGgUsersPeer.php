<?php


abstract class BaseGgUsersPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'gg_users';

	
	const CLASS_DEFAULT = 'lib.model.GgUsers';

	
	const NUM_COLUMNS = 88;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'gg_users.ID';

	
	const CODE = 'gg_users.CODE';

	
	const NAME = 'gg_users.NAME';

	
	const NICKNAME = 'gg_users.NICKNAME';

	
	const USERNAME = 'gg_users.USERNAME';

	
	const PASSWORD = 'gg_users.PASSWORD';

	
	const ENC_PASSWORD = 'gg_users.ENC_PASSWORD';

	
	const EWALLET_PASSWORD = 'gg_users.EWALLET_PASSWORD';

	
	const EWALLET_ENC_PASSWORD = 'gg_users.EWALLET_ENC_PASSWORD';

	
	const KEEP_EWALLET = 'gg_users.KEEP_EWALLET';

	
	const EPOINT_PASSWORD = 'gg_users.EPOINT_PASSWORD';

	
	const EPOINT_ENC_PASSWORD = 'gg_users.EPOINT_ENC_PASSWORD';

	
	const DIVIDEND_COUNT = 'gg_users.DIVIDEND_COUNT';

	
	const DIVIDEND_AMOUNT = 'gg_users.DIVIDEND_AMOUNT';

	
	const DIVIDEND_BALANCE = 'gg_users.DIVIDEND_BALANCE';

	
	const MAX_DLOT = 'gg_users.MAX_DLOT';

	
	const MAX_WLOT = 'gg_users.MAX_WLOT';

	
	const MAINTENANCE_LOT = 'gg_users.MAINTENANCE_LOT';

	
	const REF = 'gg_users.REF';

	
	const REF_LEFT = 'gg_users.REF_LEFT';

	
	const REF_RIGHT = 'gg_users.REF_RIGHT';

	
	const REF_LEVEL = 'gg_users.REF_LEVEL';

	
	const CREATOR = 'gg_users.CREATOR';

	
	const CID = 'gg_users.CID';

	
	const RANK_A = 'gg_users.RANK_A';

	
	const FUTURE_RANK = 'gg_users.FUTURE_RANK';

	
	const IS_STOCKIST = 'gg_users.IS_STOCKIST';

	
	const STOCKIST_UID = 'gg_users.STOCKIST_UID';

	
	const STOCKIST_CODE = 'gg_users.STOCKIST_CODE';

	
	const STOCKIST_ASSIGN_DATE = 'gg_users.STOCKIST_ASSIGN_DATE';

	
	const MATRIX_UPLINE = 'gg_users.MATRIX_UPLINE';

	
	const MATRIX_LEFT = 'gg_users.MATRIX_LEFT';

	
	const MATRIX_RIGHT = 'gg_users.MATRIX_RIGHT';

	
	const MATRIX_LEVEL = 'gg_users.MATRIX_LEVEL';

	
	const MATRIX_POSITION = 'gg_users.MATRIX_POSITION';

	
	const PLACEMENT_DATE = 'gg_users.PLACEMENT_DATE';

	
	const PLACEMENT_TYPE = 'gg_users.PLACEMENT_TYPE';

	
	const EMAIL = 'gg_users.EMAIL';

	
	const EWALLET = 'gg_users.EWALLET';

	
	const ESWALLET = 'gg_users.ESWALLET';

	
	const SWALLET = 'gg_users.SWALLET';

	
	const MWALLET = 'gg_users.MWALLET';

	
	const CWALLET = 'gg_users.CWALLET';

	
	const OWALLET = 'gg_users.OWALLET';

	
	const RWALLET = 'gg_users.RWALLET';

	
	const TWALLET = 'gg_users.TWALLET';

	
	const PWALLET = 'gg_users.PWALLET';

	
	const RTWALLET = 'gg_users.RTWALLET';

	
	const REFUND_BV = 'gg_users.REFUND_BV';

	
	const INCENTIVE_DATE = 'gg_users.INCENTIVE_DATE';

	
	const INCENTIVE_AMOUNT = 'gg_users.INCENTIVE_AMOUNT';

	
	const IC = 'gg_users.IC';

	
	const ADDRESS = 'gg_users.ADDRESS';

	
	const ADDRESS2 = 'gg_users.ADDRESS2';

	
	const CITY = 'gg_users.CITY';

	
	const ZIP = 'gg_users.ZIP';

	
	const STATE = 'gg_users.STATE';

	
	const COUNTRY = 'gg_users.COUNTRY';

	
	const HOMENO = 'gg_users.HOMENO';

	
	const MOBILENO = 'gg_users.MOBILENO';

	
	const OFFICENO = 'gg_users.OFFICENO';

	
	const FAXNO = 'gg_users.FAXNO';

	
	const DOB = 'gg_users.DOB';

	
	const GENDER = 'gg_users.GENDER';

	
	const PAYEE_NAME = 'gg_users.PAYEE_NAME';

	
	const BANK_NAME = 'gg_users.BANK_NAME';

	
	const BANK_ACC_NO = 'gg_users.BANK_ACC_NO';

	
	const BANK_BRANCH = 'gg_users.BANK_BRANCH';

	
	const BANK_SWIFTCODE = 'gg_users.BANK_SWIFTCODE';

	
	const ACC_TYPE = 'gg_users.ACC_TYPE';

	
	const BIS_REG = 'gg_users.BIS_REG';

	
	const PERSON_IN_CHARGE = 'gg_users.PERSON_IN_CHARGE';

	
	const OCCUPATION = 'gg_users.OCCUPATION';

	
	const REMARK = 'gg_users.REMARK';

	
	const AUTOWIT = 'gg_users.AUTOWIT';

	
	const STATUS = 'gg_users.STATUS';

	
	const ACTIVATED = 'gg_users.ACTIVATED';

	
	const ACTIVATED_DATE = 'gg_users.ACTIVATED_DATE';

	
	const RVC = 'gg_users.RVC';

	
	const IS_FREE = 'gg_users.IS_FREE';

	
	const POOL_SHARE = 'gg_users.POOL_SHARE';

	
	const MAIN_UID = 'gg_users.MAIN_UID';

	
	const SPONSOR_PAID = 'gg_users.SPONSOR_PAID';

	
	const FLASH_DATE = 'gg_users.FLASH_DATE';

	
	const CDATE = 'gg_users.CDATE';

	
	const LAST_LOGIN = 'gg_users.LAST_LOGIN';

	
	const LAST_LOGIN2 = 'gg_users.LAST_LOGIN2';

	
	const SITE_VISIT = 'gg_users.SITE_VISIT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Code', 'Name', 'Nickname', 'Username', 'Password', 'EncPassword', 'EwalletPassword', 'EwalletEncPassword', 'KeepEwallet', 'EpointPassword', 'EpointEncPassword', 'DividendCount', 'DividendAmount', 'DividendBalance', 'MaxDlot', 'MaxWlot', 'MaintenanceLot', 'Ref', 'RefLeft', 'RefRight', 'RefLevel', 'Creator', 'Cid', 'RankA', 'FutureRank', 'IsStockist', 'StockistUid', 'StockistCode', 'StockistAssignDate', 'MatrixUpline', 'MatrixLeft', 'MatrixRight', 'MatrixLevel', 'MatrixPosition', 'PlacementDate', 'PlacementType', 'Email', 'Ewallet', 'Eswallet', 'Swallet', 'Mwallet', 'Cwallet', 'Owallet', 'Rwallet', 'Twallet', 'Pwallet', 'Rtwallet', 'RefundBv', 'IncentiveDate', 'IncentiveAmount', 'Ic', 'Address', 'Address2', 'City', 'Zip', 'State', 'Country', 'Homeno', 'Mobileno', 'Officeno', 'Faxno', 'Dob', 'Gender', 'PayeeName', 'BankName', 'BankAccNo', 'BankBranch', 'BankSwiftcode', 'AccType', 'BisReg', 'PersonInCharge', 'Occupation', 'Remark', 'Autowit', 'Status', 'Activated', 'ActivatedDate', 'Rvc', 'IsFree', 'PoolShare', 'MainUid', 'SponsorPaid', 'FlashDate', 'Cdate', 'LastLogin', 'LastLogin2', 'SiteVisit', ),
		BasePeer::TYPE_COLNAME => array (GgUsersPeer::ID, GgUsersPeer::CODE, GgUsersPeer::NAME, GgUsersPeer::NICKNAME, GgUsersPeer::USERNAME, GgUsersPeer::PASSWORD, GgUsersPeer::ENC_PASSWORD, GgUsersPeer::EWALLET_PASSWORD, GgUsersPeer::EWALLET_ENC_PASSWORD, GgUsersPeer::KEEP_EWALLET, GgUsersPeer::EPOINT_PASSWORD, GgUsersPeer::EPOINT_ENC_PASSWORD, GgUsersPeer::DIVIDEND_COUNT, GgUsersPeer::DIVIDEND_AMOUNT, GgUsersPeer::DIVIDEND_BALANCE, GgUsersPeer::MAX_DLOT, GgUsersPeer::MAX_WLOT, GgUsersPeer::MAINTENANCE_LOT, GgUsersPeer::REF, GgUsersPeer::REF_LEFT, GgUsersPeer::REF_RIGHT, GgUsersPeer::REF_LEVEL, GgUsersPeer::CREATOR, GgUsersPeer::CID, GgUsersPeer::RANK_A, GgUsersPeer::FUTURE_RANK, GgUsersPeer::IS_STOCKIST, GgUsersPeer::STOCKIST_UID, GgUsersPeer::STOCKIST_CODE, GgUsersPeer::STOCKIST_ASSIGN_DATE, GgUsersPeer::MATRIX_UPLINE, GgUsersPeer::MATRIX_LEFT, GgUsersPeer::MATRIX_RIGHT, GgUsersPeer::MATRIX_LEVEL, GgUsersPeer::MATRIX_POSITION, GgUsersPeer::PLACEMENT_DATE, GgUsersPeer::PLACEMENT_TYPE, GgUsersPeer::EMAIL, GgUsersPeer::EWALLET, GgUsersPeer::ESWALLET, GgUsersPeer::SWALLET, GgUsersPeer::MWALLET, GgUsersPeer::CWALLET, GgUsersPeer::OWALLET, GgUsersPeer::RWALLET, GgUsersPeer::TWALLET, GgUsersPeer::PWALLET, GgUsersPeer::RTWALLET, GgUsersPeer::REFUND_BV, GgUsersPeer::INCENTIVE_DATE, GgUsersPeer::INCENTIVE_AMOUNT, GgUsersPeer::IC, GgUsersPeer::ADDRESS, GgUsersPeer::ADDRESS2, GgUsersPeer::CITY, GgUsersPeer::ZIP, GgUsersPeer::STATE, GgUsersPeer::COUNTRY, GgUsersPeer::HOMENO, GgUsersPeer::MOBILENO, GgUsersPeer::OFFICENO, GgUsersPeer::FAXNO, GgUsersPeer::DOB, GgUsersPeer::GENDER, GgUsersPeer::PAYEE_NAME, GgUsersPeer::BANK_NAME, GgUsersPeer::BANK_ACC_NO, GgUsersPeer::BANK_BRANCH, GgUsersPeer::BANK_SWIFTCODE, GgUsersPeer::ACC_TYPE, GgUsersPeer::BIS_REG, GgUsersPeer::PERSON_IN_CHARGE, GgUsersPeer::OCCUPATION, GgUsersPeer::REMARK, GgUsersPeer::AUTOWIT, GgUsersPeer::STATUS, GgUsersPeer::ACTIVATED, GgUsersPeer::ACTIVATED_DATE, GgUsersPeer::RVC, GgUsersPeer::IS_FREE, GgUsersPeer::POOL_SHARE, GgUsersPeer::MAIN_UID, GgUsersPeer::SPONSOR_PAID, GgUsersPeer::FLASH_DATE, GgUsersPeer::CDATE, GgUsersPeer::LAST_LOGIN, GgUsersPeer::LAST_LOGIN2, GgUsersPeer::SITE_VISIT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'code', 'name', 'nickname', 'username', 'password', 'enc_password', 'ewallet_password', 'ewallet_enc_password', 'keep_ewallet', 'epoint_password', 'epoint_enc_password', 'dividend_count', 'dividend_amount', 'dividend_balance', 'max_dlot', 'max_wlot', 'maintenance_lot', 'ref', 'ref_left', 'ref_right', 'ref_level', 'creator', 'cid', 'rank_a', 'future_rank', 'is_stockist', 'stockist_uid', 'stockist_code', 'stockist_assign_date', 'matrix_upline', 'matrix_left', 'matrix_right', 'matrix_level', 'matrix_position', 'placement_date', 'placement_type', 'email', 'ewallet', 'eswallet', 'swallet', 'mwallet', 'cwallet', 'owallet', 'rwallet', 'twallet', 'pwallet', 'rtwallet', 'refund_bv', 'incentive_date', 'incentive_amount', 'ic', 'address', 'address2', 'city', 'zip', 'state', 'country', 'homeno', 'mobileno', 'officeno', 'faxno', 'dob', 'gender', 'payee_name', 'bank_name', 'bank_acc_no', 'bank_branch', 'bank_swiftcode', 'acc_type', 'bis_reg', 'person_in_charge', 'occupation', 'remark', 'autowit', 'status', 'activated', 'activated_date', 'rvc', 'is_free', 'pool_share', 'main_uid', 'sponsor_paid', 'flash_date', 'cdate', 'last_login', 'last_login2', 'site_visit', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Code' => 1, 'Name' => 2, 'Nickname' => 3, 'Username' => 4, 'Password' => 5, 'EncPassword' => 6, 'EwalletPassword' => 7, 'EwalletEncPassword' => 8, 'KeepEwallet' => 9, 'EpointPassword' => 10, 'EpointEncPassword' => 11, 'DividendCount' => 12, 'DividendAmount' => 13, 'DividendBalance' => 14, 'MaxDlot' => 15, 'MaxWlot' => 16, 'MaintenanceLot' => 17, 'Ref' => 18, 'RefLeft' => 19, 'RefRight' => 20, 'RefLevel' => 21, 'Creator' => 22, 'Cid' => 23, 'RankA' => 24, 'FutureRank' => 25, 'IsStockist' => 26, 'StockistUid' => 27, 'StockistCode' => 28, 'StockistAssignDate' => 29, 'MatrixUpline' => 30, 'MatrixLeft' => 31, 'MatrixRight' => 32, 'MatrixLevel' => 33, 'MatrixPosition' => 34, 'PlacementDate' => 35, 'PlacementType' => 36, 'Email' => 37, 'Ewallet' => 38, 'Eswallet' => 39, 'Swallet' => 40, 'Mwallet' => 41, 'Cwallet' => 42, 'Owallet' => 43, 'Rwallet' => 44, 'Twallet' => 45, 'Pwallet' => 46, 'Rtwallet' => 47, 'RefundBv' => 48, 'IncentiveDate' => 49, 'IncentiveAmount' => 50, 'Ic' => 51, 'Address' => 52, 'Address2' => 53, 'City' => 54, 'Zip' => 55, 'State' => 56, 'Country' => 57, 'Homeno' => 58, 'Mobileno' => 59, 'Officeno' => 60, 'Faxno' => 61, 'Dob' => 62, 'Gender' => 63, 'PayeeName' => 64, 'BankName' => 65, 'BankAccNo' => 66, 'BankBranch' => 67, 'BankSwiftcode' => 68, 'AccType' => 69, 'BisReg' => 70, 'PersonInCharge' => 71, 'Occupation' => 72, 'Remark' => 73, 'Autowit' => 74, 'Status' => 75, 'Activated' => 76, 'ActivatedDate' => 77, 'Rvc' => 78, 'IsFree' => 79, 'PoolShare' => 80, 'MainUid' => 81, 'SponsorPaid' => 82, 'FlashDate' => 83, 'Cdate' => 84, 'LastLogin' => 85, 'LastLogin2' => 86, 'SiteVisit' => 87, ),
		BasePeer::TYPE_COLNAME => array (GgUsersPeer::ID => 0, GgUsersPeer::CODE => 1, GgUsersPeer::NAME => 2, GgUsersPeer::NICKNAME => 3, GgUsersPeer::USERNAME => 4, GgUsersPeer::PASSWORD => 5, GgUsersPeer::ENC_PASSWORD => 6, GgUsersPeer::EWALLET_PASSWORD => 7, GgUsersPeer::EWALLET_ENC_PASSWORD => 8, GgUsersPeer::KEEP_EWALLET => 9, GgUsersPeer::EPOINT_PASSWORD => 10, GgUsersPeer::EPOINT_ENC_PASSWORD => 11, GgUsersPeer::DIVIDEND_COUNT => 12, GgUsersPeer::DIVIDEND_AMOUNT => 13, GgUsersPeer::DIVIDEND_BALANCE => 14, GgUsersPeer::MAX_DLOT => 15, GgUsersPeer::MAX_WLOT => 16, GgUsersPeer::MAINTENANCE_LOT => 17, GgUsersPeer::REF => 18, GgUsersPeer::REF_LEFT => 19, GgUsersPeer::REF_RIGHT => 20, GgUsersPeer::REF_LEVEL => 21, GgUsersPeer::CREATOR => 22, GgUsersPeer::CID => 23, GgUsersPeer::RANK_A => 24, GgUsersPeer::FUTURE_RANK => 25, GgUsersPeer::IS_STOCKIST => 26, GgUsersPeer::STOCKIST_UID => 27, GgUsersPeer::STOCKIST_CODE => 28, GgUsersPeer::STOCKIST_ASSIGN_DATE => 29, GgUsersPeer::MATRIX_UPLINE => 30, GgUsersPeer::MATRIX_LEFT => 31, GgUsersPeer::MATRIX_RIGHT => 32, GgUsersPeer::MATRIX_LEVEL => 33, GgUsersPeer::MATRIX_POSITION => 34, GgUsersPeer::PLACEMENT_DATE => 35, GgUsersPeer::PLACEMENT_TYPE => 36, GgUsersPeer::EMAIL => 37, GgUsersPeer::EWALLET => 38, GgUsersPeer::ESWALLET => 39, GgUsersPeer::SWALLET => 40, GgUsersPeer::MWALLET => 41, GgUsersPeer::CWALLET => 42, GgUsersPeer::OWALLET => 43, GgUsersPeer::RWALLET => 44, GgUsersPeer::TWALLET => 45, GgUsersPeer::PWALLET => 46, GgUsersPeer::RTWALLET => 47, GgUsersPeer::REFUND_BV => 48, GgUsersPeer::INCENTIVE_DATE => 49, GgUsersPeer::INCENTIVE_AMOUNT => 50, GgUsersPeer::IC => 51, GgUsersPeer::ADDRESS => 52, GgUsersPeer::ADDRESS2 => 53, GgUsersPeer::CITY => 54, GgUsersPeer::ZIP => 55, GgUsersPeer::STATE => 56, GgUsersPeer::COUNTRY => 57, GgUsersPeer::HOMENO => 58, GgUsersPeer::MOBILENO => 59, GgUsersPeer::OFFICENO => 60, GgUsersPeer::FAXNO => 61, GgUsersPeer::DOB => 62, GgUsersPeer::GENDER => 63, GgUsersPeer::PAYEE_NAME => 64, GgUsersPeer::BANK_NAME => 65, GgUsersPeer::BANK_ACC_NO => 66, GgUsersPeer::BANK_BRANCH => 67, GgUsersPeer::BANK_SWIFTCODE => 68, GgUsersPeer::ACC_TYPE => 69, GgUsersPeer::BIS_REG => 70, GgUsersPeer::PERSON_IN_CHARGE => 71, GgUsersPeer::OCCUPATION => 72, GgUsersPeer::REMARK => 73, GgUsersPeer::AUTOWIT => 74, GgUsersPeer::STATUS => 75, GgUsersPeer::ACTIVATED => 76, GgUsersPeer::ACTIVATED_DATE => 77, GgUsersPeer::RVC => 78, GgUsersPeer::IS_FREE => 79, GgUsersPeer::POOL_SHARE => 80, GgUsersPeer::MAIN_UID => 81, GgUsersPeer::SPONSOR_PAID => 82, GgUsersPeer::FLASH_DATE => 83, GgUsersPeer::CDATE => 84, GgUsersPeer::LAST_LOGIN => 85, GgUsersPeer::LAST_LOGIN2 => 86, GgUsersPeer::SITE_VISIT => 87, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'code' => 1, 'name' => 2, 'nickname' => 3, 'username' => 4, 'password' => 5, 'enc_password' => 6, 'ewallet_password' => 7, 'ewallet_enc_password' => 8, 'keep_ewallet' => 9, 'epoint_password' => 10, 'epoint_enc_password' => 11, 'dividend_count' => 12, 'dividend_amount' => 13, 'dividend_balance' => 14, 'max_dlot' => 15, 'max_wlot' => 16, 'maintenance_lot' => 17, 'ref' => 18, 'ref_left' => 19, 'ref_right' => 20, 'ref_level' => 21, 'creator' => 22, 'cid' => 23, 'rank_a' => 24, 'future_rank' => 25, 'is_stockist' => 26, 'stockist_uid' => 27, 'stockist_code' => 28, 'stockist_assign_date' => 29, 'matrix_upline' => 30, 'matrix_left' => 31, 'matrix_right' => 32, 'matrix_level' => 33, 'matrix_position' => 34, 'placement_date' => 35, 'placement_type' => 36, 'email' => 37, 'ewallet' => 38, 'eswallet' => 39, 'swallet' => 40, 'mwallet' => 41, 'cwallet' => 42, 'owallet' => 43, 'rwallet' => 44, 'twallet' => 45, 'pwallet' => 46, 'rtwallet' => 47, 'refund_bv' => 48, 'incentive_date' => 49, 'incentive_amount' => 50, 'ic' => 51, 'address' => 52, 'address2' => 53, 'city' => 54, 'zip' => 55, 'state' => 56, 'country' => 57, 'homeno' => 58, 'mobileno' => 59, 'officeno' => 60, 'faxno' => 61, 'dob' => 62, 'gender' => 63, 'payee_name' => 64, 'bank_name' => 65, 'bank_acc_no' => 66, 'bank_branch' => 67, 'bank_swiftcode' => 68, 'acc_type' => 69, 'bis_reg' => 70, 'person_in_charge' => 71, 'occupation' => 72, 'remark' => 73, 'autowit' => 74, 'status' => 75, 'activated' => 76, 'activated_date' => 77, 'rvc' => 78, 'is_free' => 79, 'pool_share' => 80, 'main_uid' => 81, 'sponsor_paid' => 82, 'flash_date' => 83, 'cdate' => 84, 'last_login' => 85, 'last_login2' => 86, 'site_visit' => 87, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GgUsersMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GgUsersMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GgUsersPeer::getTableMap();
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
		return str_replace(GgUsersPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GgUsersPeer::ID);

		$criteria->addSelectColumn(GgUsersPeer::CODE);

		$criteria->addSelectColumn(GgUsersPeer::NAME);

		$criteria->addSelectColumn(GgUsersPeer::NICKNAME);

		$criteria->addSelectColumn(GgUsersPeer::USERNAME);

		$criteria->addSelectColumn(GgUsersPeer::PASSWORD);

		$criteria->addSelectColumn(GgUsersPeer::ENC_PASSWORD);

		$criteria->addSelectColumn(GgUsersPeer::EWALLET_PASSWORD);

		$criteria->addSelectColumn(GgUsersPeer::EWALLET_ENC_PASSWORD);

		$criteria->addSelectColumn(GgUsersPeer::KEEP_EWALLET);

		$criteria->addSelectColumn(GgUsersPeer::EPOINT_PASSWORD);

		$criteria->addSelectColumn(GgUsersPeer::EPOINT_ENC_PASSWORD);

		$criteria->addSelectColumn(GgUsersPeer::DIVIDEND_COUNT);

		$criteria->addSelectColumn(GgUsersPeer::DIVIDEND_AMOUNT);

		$criteria->addSelectColumn(GgUsersPeer::DIVIDEND_BALANCE);

		$criteria->addSelectColumn(GgUsersPeer::MAX_DLOT);

		$criteria->addSelectColumn(GgUsersPeer::MAX_WLOT);

		$criteria->addSelectColumn(GgUsersPeer::MAINTENANCE_LOT);

		$criteria->addSelectColumn(GgUsersPeer::REF);

		$criteria->addSelectColumn(GgUsersPeer::REF_LEFT);

		$criteria->addSelectColumn(GgUsersPeer::REF_RIGHT);

		$criteria->addSelectColumn(GgUsersPeer::REF_LEVEL);

		$criteria->addSelectColumn(GgUsersPeer::CREATOR);

		$criteria->addSelectColumn(GgUsersPeer::CID);

		$criteria->addSelectColumn(GgUsersPeer::RANK_A);

		$criteria->addSelectColumn(GgUsersPeer::FUTURE_RANK);

		$criteria->addSelectColumn(GgUsersPeer::IS_STOCKIST);

		$criteria->addSelectColumn(GgUsersPeer::STOCKIST_UID);

		$criteria->addSelectColumn(GgUsersPeer::STOCKIST_CODE);

		$criteria->addSelectColumn(GgUsersPeer::STOCKIST_ASSIGN_DATE);

		$criteria->addSelectColumn(GgUsersPeer::MATRIX_UPLINE);

		$criteria->addSelectColumn(GgUsersPeer::MATRIX_LEFT);

		$criteria->addSelectColumn(GgUsersPeer::MATRIX_RIGHT);

		$criteria->addSelectColumn(GgUsersPeer::MATRIX_LEVEL);

		$criteria->addSelectColumn(GgUsersPeer::MATRIX_POSITION);

		$criteria->addSelectColumn(GgUsersPeer::PLACEMENT_DATE);

		$criteria->addSelectColumn(GgUsersPeer::PLACEMENT_TYPE);

		$criteria->addSelectColumn(GgUsersPeer::EMAIL);

		$criteria->addSelectColumn(GgUsersPeer::EWALLET);

		$criteria->addSelectColumn(GgUsersPeer::ESWALLET);

		$criteria->addSelectColumn(GgUsersPeer::SWALLET);

		$criteria->addSelectColumn(GgUsersPeer::MWALLET);

		$criteria->addSelectColumn(GgUsersPeer::CWALLET);

		$criteria->addSelectColumn(GgUsersPeer::OWALLET);

		$criteria->addSelectColumn(GgUsersPeer::RWALLET);

		$criteria->addSelectColumn(GgUsersPeer::TWALLET);

		$criteria->addSelectColumn(GgUsersPeer::PWALLET);

		$criteria->addSelectColumn(GgUsersPeer::RTWALLET);

		$criteria->addSelectColumn(GgUsersPeer::REFUND_BV);

		$criteria->addSelectColumn(GgUsersPeer::INCENTIVE_DATE);

		$criteria->addSelectColumn(GgUsersPeer::INCENTIVE_AMOUNT);

		$criteria->addSelectColumn(GgUsersPeer::IC);

		$criteria->addSelectColumn(GgUsersPeer::ADDRESS);

		$criteria->addSelectColumn(GgUsersPeer::ADDRESS2);

		$criteria->addSelectColumn(GgUsersPeer::CITY);

		$criteria->addSelectColumn(GgUsersPeer::ZIP);

		$criteria->addSelectColumn(GgUsersPeer::STATE);

		$criteria->addSelectColumn(GgUsersPeer::COUNTRY);

		$criteria->addSelectColumn(GgUsersPeer::HOMENO);

		$criteria->addSelectColumn(GgUsersPeer::MOBILENO);

		$criteria->addSelectColumn(GgUsersPeer::OFFICENO);

		$criteria->addSelectColumn(GgUsersPeer::FAXNO);

		$criteria->addSelectColumn(GgUsersPeer::DOB);

		$criteria->addSelectColumn(GgUsersPeer::GENDER);

		$criteria->addSelectColumn(GgUsersPeer::PAYEE_NAME);

		$criteria->addSelectColumn(GgUsersPeer::BANK_NAME);

		$criteria->addSelectColumn(GgUsersPeer::BANK_ACC_NO);

		$criteria->addSelectColumn(GgUsersPeer::BANK_BRANCH);

		$criteria->addSelectColumn(GgUsersPeer::BANK_SWIFTCODE);

		$criteria->addSelectColumn(GgUsersPeer::ACC_TYPE);

		$criteria->addSelectColumn(GgUsersPeer::BIS_REG);

		$criteria->addSelectColumn(GgUsersPeer::PERSON_IN_CHARGE);

		$criteria->addSelectColumn(GgUsersPeer::OCCUPATION);

		$criteria->addSelectColumn(GgUsersPeer::REMARK);

		$criteria->addSelectColumn(GgUsersPeer::AUTOWIT);

		$criteria->addSelectColumn(GgUsersPeer::STATUS);

		$criteria->addSelectColumn(GgUsersPeer::ACTIVATED);

		$criteria->addSelectColumn(GgUsersPeer::ACTIVATED_DATE);

		$criteria->addSelectColumn(GgUsersPeer::RVC);

		$criteria->addSelectColumn(GgUsersPeer::IS_FREE);

		$criteria->addSelectColumn(GgUsersPeer::POOL_SHARE);

		$criteria->addSelectColumn(GgUsersPeer::MAIN_UID);

		$criteria->addSelectColumn(GgUsersPeer::SPONSOR_PAID);

		$criteria->addSelectColumn(GgUsersPeer::FLASH_DATE);

		$criteria->addSelectColumn(GgUsersPeer::CDATE);

		$criteria->addSelectColumn(GgUsersPeer::LAST_LOGIN);

		$criteria->addSelectColumn(GgUsersPeer::LAST_LOGIN2);

		$criteria->addSelectColumn(GgUsersPeer::SITE_VISIT);

	}

	const COUNT = 'COUNT(gg_users.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT gg_users.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GgUsersPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GgUsersPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GgUsersPeer::doSelectRS($criteria, $con);
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
		$objects = GgUsersPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GgUsersPeer::populateObjects(GgUsersPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GgUsersPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GgUsersPeer::getOMClass();
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
		return GgUsersPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(GgUsersPeer::ID); 

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
			$comparison = $criteria->getComparison(GgUsersPeer::ID);
			$selectCriteria->add(GgUsersPeer::ID, $criteria->remove(GgUsersPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(GgUsersPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GgUsersPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GgUsers) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GgUsersPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GgUsers $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GgUsersPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GgUsersPeer::TABLE_NAME);

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

		return BasePeer::doValidate(GgUsersPeer::DATABASE_NAME, GgUsersPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(GgUsersPeer::DATABASE_NAME);

		$criteria->add(GgUsersPeer::ID, $pk);


		$v = GgUsersPeer::doSelect($criteria, $con);

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
			$criteria->add(GgUsersPeer::ID, $pks, Criteria::IN);
			$objs = GgUsersPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseGgUsersPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GgUsersMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GgUsersMapBuilder');
}
