<?php


abstract class BaseMlmDistributorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mlm_distributor';

	
	const CLASS_DEFAULT = 'lib.model.MlmDistributor';

	
	const NUM_COLUMNS = 93;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DISTRIBUTOR_ID = 'mlm_distributor.DISTRIBUTOR_ID';

	
	const DISTRIBUTOR_CODE = 'mlm_distributor.DISTRIBUTOR_CODE';

	
	const USER_ID = 'mlm_distributor.USER_ID';

	
	const ACCOUNT_TYPE = 'mlm_distributor.ACCOUNT_TYPE';

	
	const MT4_INVESTOR_PASSWORD = 'mlm_distributor.MT4_INVESTOR_PASSWORD';

	
	const INTERNAL_REMARK = 'mlm_distributor.INTERNAL_REMARK';

	
	const STATUS_CODE = 'mlm_distributor.STATUS_CODE';

	
	const FULL_NAME = 'mlm_distributor.FULL_NAME';

	
	const NICKNAME = 'mlm_distributor.NICKNAME';

	
	const MT4_USER_NAME = 'mlm_distributor.MT4_USER_NAME';

	
	const MT4_PASSWORD = 'mlm_distributor.MT4_PASSWORD';

	
	const IC = 'mlm_distributor.IC';

	
	const COUNTRY = 'mlm_distributor.COUNTRY';

	
	const ADDRESS = 'mlm_distributor.ADDRESS';

	
	const ADDRESS2 = 'mlm_distributor.ADDRESS2';

	
	const CITY = 'mlm_distributor.CITY';

	
	const STATE = 'mlm_distributor.STATE';

	
	const POSTCODE = 'mlm_distributor.POSTCODE';

	
	const EMAIL = 'mlm_distributor.EMAIL';

	
	const ALTERNATE_EMAIL = 'mlm_distributor.ALTERNATE_EMAIL';

	
	const CONTACT = 'mlm_distributor.CONTACT';

	
	const GENDER = 'mlm_distributor.GENDER';

	
	const DOB = 'mlm_distributor.DOB';

	
	const BANK_NAME = 'mlm_distributor.BANK_NAME';

	
	const BANK_ACC_NO = 'mlm_distributor.BANK_ACC_NO';

	
	const BANK_HOLDER_NAME = 'mlm_distributor.BANK_HOLDER_NAME';

	
	const BANK_SWIFT_CODE = 'mlm_distributor.BANK_SWIFT_CODE';

	
	const BANK_BRANCH = 'mlm_distributor.BANK_BRANCH';

	
	const BANK_ADDRESS = 'mlm_distributor.BANK_ADDRESS';

	
	const VISA_DEBIT_CARD = 'mlm_distributor.VISA_DEBIT_CARD';

	
	const EZY_CASH_CARD = 'mlm_distributor.EZY_CASH_CARD';

	
	const TREE_LEVEL = 'mlm_distributor.TREE_LEVEL';

	
	const TREE_STRUCTURE = 'mlm_distributor.TREE_STRUCTURE';

	
	const PLACEMENT_TREE_LEVEL = 'mlm_distributor.PLACEMENT_TREE_LEVEL';

	
	const PLACEMENT_TREE_STRUCTURE = 'mlm_distributor.PLACEMENT_TREE_STRUCTURE';

	
	const INIT_RANK_ID = 'mlm_distributor.INIT_RANK_ID';

	
	const INIT_RANK_CODE = 'mlm_distributor.INIT_RANK_CODE';

	
	const UPLINE_DIST_ID = 'mlm_distributor.UPLINE_DIST_ID';

	
	const UPLINE_DIST_CODE = 'mlm_distributor.UPLINE_DIST_CODE';

	
	const TREE_UPLINE_DIST_ID = 'mlm_distributor.TREE_UPLINE_DIST_ID';

	
	const TREE_UPLINE_DIST_CODE = 'mlm_distributor.TREE_UPLINE_DIST_CODE';

	
	const TOTAL_LEFT = 'mlm_distributor.TOTAL_LEFT';

	
	const TOTAL_RIGHT = 'mlm_distributor.TOTAL_RIGHT';

	
	const PLACEMENT_POSITION = 'mlm_distributor.PLACEMENT_POSITION';

	
	const PLACEMENT_DATETIME = 'mlm_distributor.PLACEMENT_DATETIME';

	
	const RANK_ID = 'mlm_distributor.RANK_ID';

	
	const PROMAX_RANK_ID = 'mlm_distributor.PROMAX_RANK_ID';

	
	const RANK_CODE = 'mlm_distributor.RANK_CODE';

	
	const MT4_RANK_ID = 'mlm_distributor.MT4_RANK_ID';

	
	const ACTIVE_DATETIME = 'mlm_distributor.ACTIVE_DATETIME';

	
	const ACTIVATED_BY = 'mlm_distributor.ACTIVATED_BY';

	
	const LEVERAGE = 'mlm_distributor.LEVERAGE';

	
	const SPREAD = 'mlm_distributor.SPREAD';

	
	const DEPOSIT_CURRENCY = 'mlm_distributor.DEPOSIT_CURRENCY';

	
	const DEPOSIT_AMOUNT = 'mlm_distributor.DEPOSIT_AMOUNT';

	
	const SIGN_NAME = 'mlm_distributor.SIGN_NAME';

	
	const SIGN_DATE = 'mlm_distributor.SIGN_DATE';

	
	const TERM_CONDITION = 'mlm_distributor.TERM_CONDITION';

	
	const IB_COMMISSION = 'mlm_distributor.IB_COMMISSION';

	
	const IS_IB = 'mlm_distributor.IS_IB';

	
	const CREATED_BY = 'mlm_distributor.CREATED_BY';

	
	const CREATED_ON = 'mlm_distributor.CREATED_ON';

	
	const UPDATED_BY = 'mlm_distributor.UPDATED_BY';

	
	const UPDATED_ON = 'mlm_distributor.UPDATED_ON';

	
	const PACKAGE_PURCHASE_FLAG = 'mlm_distributor.PACKAGE_PURCHASE_FLAG';

	
	const FILE_BANK_PASS_BOOK = 'mlm_distributor.FILE_BANK_PASS_BOOK';

	
	const FILE_PROOF_OF_RESIDENCE = 'mlm_distributor.FILE_PROOF_OF_RESIDENCE';

	
	const FILE_NRIC = 'mlm_distributor.FILE_NRIC';

	
	const EXCLUDED_STRUCTURE = 'mlm_distributor.EXCLUDED_STRUCTURE';

	
	const PRODUCT_MTE = 'mlm_distributor.PRODUCT_MTE';

	
	const PRODUCT_FXGOLD = 'mlm_distributor.PRODUCT_FXGOLD';

	
	const REMARK = 'mlm_distributor.REMARK';

	
	const REGISTER_REMARK = 'mlm_distributor.REGISTER_REMARK';

	
	const LOAN_ACCOUNT = 'mlm_distributor.LOAN_ACCOUNT';

	
	const DIAMOND_DOWNLINE_ID = 'mlm_distributor.DIAMOND_DOWNLINE_ID';

	
	const DIAMOND_STATUS = 'mlm_distributor.DIAMOND_STATUS';

	
	const DIAMOND_DATE_START = 'mlm_distributor.DIAMOND_DATE_START';

	
	const DIAMOND_DATE_END = 'mlm_distributor.DIAMOND_DATE_END';

	
	const DIAMOND_DATE_ACHIEVE = 'mlm_distributor.DIAMOND_DATE_ACHIEVE';

	
	const DIAMOND_SALES = 'mlm_distributor.DIAMOND_SALES';

	
	const VIP_DOWNLINE_ID = 'mlm_distributor.VIP_DOWNLINE_ID';

	
	const VIP_STATUS = 'mlm_distributor.VIP_STATUS';

	
	const VIP_DATE_START = 'mlm_distributor.VIP_DATE_START';

	
	const VIP_DATE_END = 'mlm_distributor.VIP_DATE_END';

	
	const VIP_DATE_ACHIEVE = 'mlm_distributor.VIP_DATE_ACHIEVE';

	
	const VIP_SALES = 'mlm_distributor.VIP_SALES';

	
	const DEGOLD_DOWNLINE_ID = 'mlm_distributor.DEGOLD_DOWNLINE_ID';

	
	const DEGOLD_STATUS = 'mlm_distributor.DEGOLD_STATUS';

	
	const DEGOLD_DATE_START = 'mlm_distributor.DEGOLD_DATE_START';

	
	const DEGOLD_DATE_END = 'mlm_distributor.DEGOLD_DATE_END';

	
	const DEGOLD_DATE_ACHIEVE = 'mlm_distributor.DEGOLD_DATE_ACHIEVE';

	
	const DEGOLD_SALES = 'mlm_distributor.DEGOLD_SALES';

	
	const ADDITIONAL_SALES = 'mlm_distributor.ADDITIONAL_SALES';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('DistributorId', 'DistributorCode', 'UserId', 'AccountType', 'Mt4InvestorPassword', 'InternalRemark', 'StatusCode', 'FullName', 'Nickname', 'Mt4UserName', 'Mt4Password', 'Ic', 'Country', 'Address', 'Address2', 'City', 'State', 'Postcode', 'Email', 'AlternateEmail', 'Contact', 'Gender', 'Dob', 'BankName', 'BankAccNo', 'BankHolderName', 'BankSwiftCode', 'BankBranch', 'BankAddress', 'VisaDebitCard', 'EzyCashCard', 'TreeLevel', 'TreeStructure', 'PlacementTreeLevel', 'PlacementTreeStructure', 'InitRankId', 'InitRankCode', 'UplineDistId', 'UplineDistCode', 'TreeUplineDistId', 'TreeUplineDistCode', 'TotalLeft', 'TotalRight', 'PlacementPosition', 'PlacementDatetime', 'RankId', 'PromaxRankId', 'RankCode', 'Mt4RankId', 'ActiveDatetime', 'ActivatedBy', 'Leverage', 'Spread', 'DepositCurrency', 'DepositAmount', 'SignName', 'SignDate', 'TermCondition', 'IbCommission', 'IsIb', 'CreatedBy', 'CreatedOn', 'UpdatedBy', 'UpdatedOn', 'PackagePurchaseFlag', 'FileBankPassBook', 'FileProofOfResidence', 'FileNric', 'ExcludedStructure', 'ProductMte', 'ProductFxgold', 'Remark', 'RegisterRemark', 'LoanAccount', 'DiamondDownlineId', 'DiamondStatus', 'DiamondDateStart', 'DiamondDateEnd', 'DiamondDateAchieve', 'DiamondSales', 'VipDownlineId', 'VipStatus', 'VipDateStart', 'VipDateEnd', 'VipDateAchieve', 'VipSales', 'DegoldDownlineId', 'DegoldStatus', 'DegoldDateStart', 'DegoldDateEnd', 'DegoldDateAchieve', 'DegoldSales', 'AdditionalSales', ),
		BasePeer::TYPE_COLNAME => array (MlmDistributorPeer::DISTRIBUTOR_ID, MlmDistributorPeer::DISTRIBUTOR_CODE, MlmDistributorPeer::USER_ID, MlmDistributorPeer::ACCOUNT_TYPE, MlmDistributorPeer::MT4_INVESTOR_PASSWORD, MlmDistributorPeer::INTERNAL_REMARK, MlmDistributorPeer::STATUS_CODE, MlmDistributorPeer::FULL_NAME, MlmDistributorPeer::NICKNAME, MlmDistributorPeer::MT4_USER_NAME, MlmDistributorPeer::MT4_PASSWORD, MlmDistributorPeer::IC, MlmDistributorPeer::COUNTRY, MlmDistributorPeer::ADDRESS, MlmDistributorPeer::ADDRESS2, MlmDistributorPeer::CITY, MlmDistributorPeer::STATE, MlmDistributorPeer::POSTCODE, MlmDistributorPeer::EMAIL, MlmDistributorPeer::ALTERNATE_EMAIL, MlmDistributorPeer::CONTACT, MlmDistributorPeer::GENDER, MlmDistributorPeer::DOB, MlmDistributorPeer::BANK_NAME, MlmDistributorPeer::BANK_ACC_NO, MlmDistributorPeer::BANK_HOLDER_NAME, MlmDistributorPeer::BANK_SWIFT_CODE, MlmDistributorPeer::BANK_BRANCH, MlmDistributorPeer::BANK_ADDRESS, MlmDistributorPeer::VISA_DEBIT_CARD, MlmDistributorPeer::EZY_CASH_CARD, MlmDistributorPeer::TREE_LEVEL, MlmDistributorPeer::TREE_STRUCTURE, MlmDistributorPeer::PLACEMENT_TREE_LEVEL, MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE, MlmDistributorPeer::INIT_RANK_ID, MlmDistributorPeer::INIT_RANK_CODE, MlmDistributorPeer::UPLINE_DIST_ID, MlmDistributorPeer::UPLINE_DIST_CODE, MlmDistributorPeer::TREE_UPLINE_DIST_ID, MlmDistributorPeer::TREE_UPLINE_DIST_CODE, MlmDistributorPeer::TOTAL_LEFT, MlmDistributorPeer::TOTAL_RIGHT, MlmDistributorPeer::PLACEMENT_POSITION, MlmDistributorPeer::PLACEMENT_DATETIME, MlmDistributorPeer::RANK_ID, MlmDistributorPeer::PROMAX_RANK_ID, MlmDistributorPeer::RANK_CODE, MlmDistributorPeer::MT4_RANK_ID, MlmDistributorPeer::ACTIVE_DATETIME, MlmDistributorPeer::ACTIVATED_BY, MlmDistributorPeer::LEVERAGE, MlmDistributorPeer::SPREAD, MlmDistributorPeer::DEPOSIT_CURRENCY, MlmDistributorPeer::DEPOSIT_AMOUNT, MlmDistributorPeer::SIGN_NAME, MlmDistributorPeer::SIGN_DATE, MlmDistributorPeer::TERM_CONDITION, MlmDistributorPeer::IB_COMMISSION, MlmDistributorPeer::IS_IB, MlmDistributorPeer::CREATED_BY, MlmDistributorPeer::CREATED_ON, MlmDistributorPeer::UPDATED_BY, MlmDistributorPeer::UPDATED_ON, MlmDistributorPeer::PACKAGE_PURCHASE_FLAG, MlmDistributorPeer::FILE_BANK_PASS_BOOK, MlmDistributorPeer::FILE_PROOF_OF_RESIDENCE, MlmDistributorPeer::FILE_NRIC, MlmDistributorPeer::EXCLUDED_STRUCTURE, MlmDistributorPeer::PRODUCT_MTE, MlmDistributorPeer::PRODUCT_FXGOLD, MlmDistributorPeer::REMARK, MlmDistributorPeer::REGISTER_REMARK, MlmDistributorPeer::LOAN_ACCOUNT, MlmDistributorPeer::DIAMOND_DOWNLINE_ID, MlmDistributorPeer::DIAMOND_STATUS, MlmDistributorPeer::DIAMOND_DATE_START, MlmDistributorPeer::DIAMOND_DATE_END, MlmDistributorPeer::DIAMOND_DATE_ACHIEVE, MlmDistributorPeer::DIAMOND_SALES, MlmDistributorPeer::VIP_DOWNLINE_ID, MlmDistributorPeer::VIP_STATUS, MlmDistributorPeer::VIP_DATE_START, MlmDistributorPeer::VIP_DATE_END, MlmDistributorPeer::VIP_DATE_ACHIEVE, MlmDistributorPeer::VIP_SALES, MlmDistributorPeer::DEGOLD_DOWNLINE_ID, MlmDistributorPeer::DEGOLD_STATUS, MlmDistributorPeer::DEGOLD_DATE_START, MlmDistributorPeer::DEGOLD_DATE_END, MlmDistributorPeer::DEGOLD_DATE_ACHIEVE, MlmDistributorPeer::DEGOLD_SALES, MlmDistributorPeer::ADDITIONAL_SALES, ),
		BasePeer::TYPE_FIELDNAME => array ('distributor_id', 'distributor_code', 'user_id', 'account_type', 'mt4_investor_password', 'internal_remark', 'status_code', 'full_name', 'nickname', 'mt4_user_name', 'mt4_password', 'ic', 'country', 'address', 'address2', 'city', 'state', 'postcode', 'email', 'alternate_email', 'contact', 'gender', 'dob', 'bank_name', 'bank_acc_no', 'bank_holder_name', 'bank_swift_code', 'bank_branch', 'bank_address', 'visa_debit_card', 'ezy_cash_card', 'tree_level', 'tree_structure', 'placement_tree_level', 'placement_tree_structure', 'init_rank_id', 'init_rank_code', 'upline_dist_id', 'upline_dist_code', 'tree_upline_dist_id', 'tree_upline_dist_code', 'total_left', 'total_right', 'placement_position', 'placement_datetime', 'rank_id', 'promax_rank_id', 'rank_code', 'mt4_rank_id', 'active_datetime', 'activated_by', 'leverage', 'spread', 'deposit_currency', 'deposit_amount', 'sign_name', 'sign_date', 'term_condition', 'ib_commission', 'is_ib', 'created_by', 'created_on', 'updated_by', 'updated_on', 'package_purchase_flag', 'file_bank_pass_book', 'file_proof_of_residence', 'file_nric', 'excluded_structure', 'product_mte', 'product_fxgold', 'remark', 'register_remark', 'loan_account', 'diamond_downline_id', 'diamond_status', 'diamond_date_start', 'diamond_date_end', 'diamond_date_achieve', 'diamond_sales', 'vip_downline_id', 'vip_status', 'vip_date_start', 'vip_date_end', 'vip_date_achieve', 'vip_sales', 'degold_downline_id', 'degold_status', 'degold_date_start', 'degold_date_end', 'degold_date_achieve', 'degold_sales', 'additional_sales', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('DistributorId' => 0, 'DistributorCode' => 1, 'UserId' => 2, 'AccountType' => 3, 'Mt4InvestorPassword' => 4, 'InternalRemark' => 5, 'StatusCode' => 6, 'FullName' => 7, 'Nickname' => 8, 'Mt4UserName' => 9, 'Mt4Password' => 10, 'Ic' => 11, 'Country' => 12, 'Address' => 13, 'Address2' => 14, 'City' => 15, 'State' => 16, 'Postcode' => 17, 'Email' => 18, 'AlternateEmail' => 19, 'Contact' => 20, 'Gender' => 21, 'Dob' => 22, 'BankName' => 23, 'BankAccNo' => 24, 'BankHolderName' => 25, 'BankSwiftCode' => 26, 'BankBranch' => 27, 'BankAddress' => 28, 'VisaDebitCard' => 29, 'EzyCashCard' => 30, 'TreeLevel' => 31, 'TreeStructure' => 32, 'PlacementTreeLevel' => 33, 'PlacementTreeStructure' => 34, 'InitRankId' => 35, 'InitRankCode' => 36, 'UplineDistId' => 37, 'UplineDistCode' => 38, 'TreeUplineDistId' => 39, 'TreeUplineDistCode' => 40, 'TotalLeft' => 41, 'TotalRight' => 42, 'PlacementPosition' => 43, 'PlacementDatetime' => 44, 'RankId' => 45, 'PromaxRankId' => 46, 'RankCode' => 47, 'Mt4RankId' => 48, 'ActiveDatetime' => 49, 'ActivatedBy' => 50, 'Leverage' => 51, 'Spread' => 52, 'DepositCurrency' => 53, 'DepositAmount' => 54, 'SignName' => 55, 'SignDate' => 56, 'TermCondition' => 57, 'IbCommission' => 58, 'IsIb' => 59, 'CreatedBy' => 60, 'CreatedOn' => 61, 'UpdatedBy' => 62, 'UpdatedOn' => 63, 'PackagePurchaseFlag' => 64, 'FileBankPassBook' => 65, 'FileProofOfResidence' => 66, 'FileNric' => 67, 'ExcludedStructure' => 68, 'ProductMte' => 69, 'ProductFxgold' => 70, 'Remark' => 71, 'RegisterRemark' => 72, 'LoanAccount' => 73, 'DiamondDownlineId' => 74, 'DiamondStatus' => 75, 'DiamondDateStart' => 76, 'DiamondDateEnd' => 77, 'DiamondDateAchieve' => 78, 'DiamondSales' => 79, 'VipDownlineId' => 80, 'VipStatus' => 81, 'VipDateStart' => 82, 'VipDateEnd' => 83, 'VipDateAchieve' => 84, 'VipSales' => 85, 'DegoldDownlineId' => 86, 'DegoldStatus' => 87, 'DegoldDateStart' => 88, 'DegoldDateEnd' => 89, 'DegoldDateAchieve' => 90, 'DegoldSales' => 91, 'AdditionalSales' => 92, ),
		BasePeer::TYPE_COLNAME => array (MlmDistributorPeer::DISTRIBUTOR_ID => 0, MlmDistributorPeer::DISTRIBUTOR_CODE => 1, MlmDistributorPeer::USER_ID => 2, MlmDistributorPeer::ACCOUNT_TYPE => 3, MlmDistributorPeer::MT4_INVESTOR_PASSWORD => 4, MlmDistributorPeer::INTERNAL_REMARK => 5, MlmDistributorPeer::STATUS_CODE => 6, MlmDistributorPeer::FULL_NAME => 7, MlmDistributorPeer::NICKNAME => 8, MlmDistributorPeer::MT4_USER_NAME => 9, MlmDistributorPeer::MT4_PASSWORD => 10, MlmDistributorPeer::IC => 11, MlmDistributorPeer::COUNTRY => 12, MlmDistributorPeer::ADDRESS => 13, MlmDistributorPeer::ADDRESS2 => 14, MlmDistributorPeer::CITY => 15, MlmDistributorPeer::STATE => 16, MlmDistributorPeer::POSTCODE => 17, MlmDistributorPeer::EMAIL => 18, MlmDistributorPeer::ALTERNATE_EMAIL => 19, MlmDistributorPeer::CONTACT => 20, MlmDistributorPeer::GENDER => 21, MlmDistributorPeer::DOB => 22, MlmDistributorPeer::BANK_NAME => 23, MlmDistributorPeer::BANK_ACC_NO => 24, MlmDistributorPeer::BANK_HOLDER_NAME => 25, MlmDistributorPeer::BANK_SWIFT_CODE => 26, MlmDistributorPeer::BANK_BRANCH => 27, MlmDistributorPeer::BANK_ADDRESS => 28, MlmDistributorPeer::VISA_DEBIT_CARD => 29, MlmDistributorPeer::EZY_CASH_CARD => 30, MlmDistributorPeer::TREE_LEVEL => 31, MlmDistributorPeer::TREE_STRUCTURE => 32, MlmDistributorPeer::PLACEMENT_TREE_LEVEL => 33, MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE => 34, MlmDistributorPeer::INIT_RANK_ID => 35, MlmDistributorPeer::INIT_RANK_CODE => 36, MlmDistributorPeer::UPLINE_DIST_ID => 37, MlmDistributorPeer::UPLINE_DIST_CODE => 38, MlmDistributorPeer::TREE_UPLINE_DIST_ID => 39, MlmDistributorPeer::TREE_UPLINE_DIST_CODE => 40, MlmDistributorPeer::TOTAL_LEFT => 41, MlmDistributorPeer::TOTAL_RIGHT => 42, MlmDistributorPeer::PLACEMENT_POSITION => 43, MlmDistributorPeer::PLACEMENT_DATETIME => 44, MlmDistributorPeer::RANK_ID => 45, MlmDistributorPeer::PROMAX_RANK_ID => 46, MlmDistributorPeer::RANK_CODE => 47, MlmDistributorPeer::MT4_RANK_ID => 48, MlmDistributorPeer::ACTIVE_DATETIME => 49, MlmDistributorPeer::ACTIVATED_BY => 50, MlmDistributorPeer::LEVERAGE => 51, MlmDistributorPeer::SPREAD => 52, MlmDistributorPeer::DEPOSIT_CURRENCY => 53, MlmDistributorPeer::DEPOSIT_AMOUNT => 54, MlmDistributorPeer::SIGN_NAME => 55, MlmDistributorPeer::SIGN_DATE => 56, MlmDistributorPeer::TERM_CONDITION => 57, MlmDistributorPeer::IB_COMMISSION => 58, MlmDistributorPeer::IS_IB => 59, MlmDistributorPeer::CREATED_BY => 60, MlmDistributorPeer::CREATED_ON => 61, MlmDistributorPeer::UPDATED_BY => 62, MlmDistributorPeer::UPDATED_ON => 63, MlmDistributorPeer::PACKAGE_PURCHASE_FLAG => 64, MlmDistributorPeer::FILE_BANK_PASS_BOOK => 65, MlmDistributorPeer::FILE_PROOF_OF_RESIDENCE => 66, MlmDistributorPeer::FILE_NRIC => 67, MlmDistributorPeer::EXCLUDED_STRUCTURE => 68, MlmDistributorPeer::PRODUCT_MTE => 69, MlmDistributorPeer::PRODUCT_FXGOLD => 70, MlmDistributorPeer::REMARK => 71, MlmDistributorPeer::REGISTER_REMARK => 72, MlmDistributorPeer::LOAN_ACCOUNT => 73, MlmDistributorPeer::DIAMOND_DOWNLINE_ID => 74, MlmDistributorPeer::DIAMOND_STATUS => 75, MlmDistributorPeer::DIAMOND_DATE_START => 76, MlmDistributorPeer::DIAMOND_DATE_END => 77, MlmDistributorPeer::DIAMOND_DATE_ACHIEVE => 78, MlmDistributorPeer::DIAMOND_SALES => 79, MlmDistributorPeer::VIP_DOWNLINE_ID => 80, MlmDistributorPeer::VIP_STATUS => 81, MlmDistributorPeer::VIP_DATE_START => 82, MlmDistributorPeer::VIP_DATE_END => 83, MlmDistributorPeer::VIP_DATE_ACHIEVE => 84, MlmDistributorPeer::VIP_SALES => 85, MlmDistributorPeer::DEGOLD_DOWNLINE_ID => 86, MlmDistributorPeer::DEGOLD_STATUS => 87, MlmDistributorPeer::DEGOLD_DATE_START => 88, MlmDistributorPeer::DEGOLD_DATE_END => 89, MlmDistributorPeer::DEGOLD_DATE_ACHIEVE => 90, MlmDistributorPeer::DEGOLD_SALES => 91, MlmDistributorPeer::ADDITIONAL_SALES => 92, ),
		BasePeer::TYPE_FIELDNAME => array ('distributor_id' => 0, 'distributor_code' => 1, 'user_id' => 2, 'account_type' => 3, 'mt4_investor_password' => 4, 'internal_remark' => 5, 'status_code' => 6, 'full_name' => 7, 'nickname' => 8, 'mt4_user_name' => 9, 'mt4_password' => 10, 'ic' => 11, 'country' => 12, 'address' => 13, 'address2' => 14, 'city' => 15, 'state' => 16, 'postcode' => 17, 'email' => 18, 'alternate_email' => 19, 'contact' => 20, 'gender' => 21, 'dob' => 22, 'bank_name' => 23, 'bank_acc_no' => 24, 'bank_holder_name' => 25, 'bank_swift_code' => 26, 'bank_branch' => 27, 'bank_address' => 28, 'visa_debit_card' => 29, 'ezy_cash_card' => 30, 'tree_level' => 31, 'tree_structure' => 32, 'placement_tree_level' => 33, 'placement_tree_structure' => 34, 'init_rank_id' => 35, 'init_rank_code' => 36, 'upline_dist_id' => 37, 'upline_dist_code' => 38, 'tree_upline_dist_id' => 39, 'tree_upline_dist_code' => 40, 'total_left' => 41, 'total_right' => 42, 'placement_position' => 43, 'placement_datetime' => 44, 'rank_id' => 45, 'promax_rank_id' => 46, 'rank_code' => 47, 'mt4_rank_id' => 48, 'active_datetime' => 49, 'activated_by' => 50, 'leverage' => 51, 'spread' => 52, 'deposit_currency' => 53, 'deposit_amount' => 54, 'sign_name' => 55, 'sign_date' => 56, 'term_condition' => 57, 'ib_commission' => 58, 'is_ib' => 59, 'created_by' => 60, 'created_on' => 61, 'updated_by' => 62, 'updated_on' => 63, 'package_purchase_flag' => 64, 'file_bank_pass_book' => 65, 'file_proof_of_residence' => 66, 'file_nric' => 67, 'excluded_structure' => 68, 'product_mte' => 69, 'product_fxgold' => 70, 'remark' => 71, 'register_remark' => 72, 'loan_account' => 73, 'diamond_downline_id' => 74, 'diamond_status' => 75, 'diamond_date_start' => 76, 'diamond_date_end' => 77, 'diamond_date_achieve' => 78, 'diamond_sales' => 79, 'vip_downline_id' => 80, 'vip_status' => 81, 'vip_date_start' => 82, 'vip_date_end' => 83, 'vip_date_achieve' => 84, 'vip_sales' => 85, 'degold_downline_id' => 86, 'degold_status' => 87, 'degold_date_start' => 88, 'degold_date_end' => 89, 'degold_date_achieve' => 90, 'degold_sales' => 91, 'additional_sales' => 92, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MlmDistributorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MlmDistributorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MlmDistributorPeer::getTableMap();
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
		return str_replace(MlmDistributorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MlmDistributorPeer::DISTRIBUTOR_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::DISTRIBUTOR_CODE);

		$criteria->addSelectColumn(MlmDistributorPeer::USER_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::ACCOUNT_TYPE);

		$criteria->addSelectColumn(MlmDistributorPeer::MT4_INVESTOR_PASSWORD);

		$criteria->addSelectColumn(MlmDistributorPeer::INTERNAL_REMARK);

		$criteria->addSelectColumn(MlmDistributorPeer::STATUS_CODE);

		$criteria->addSelectColumn(MlmDistributorPeer::FULL_NAME);

		$criteria->addSelectColumn(MlmDistributorPeer::NICKNAME);

		$criteria->addSelectColumn(MlmDistributorPeer::MT4_USER_NAME);

		$criteria->addSelectColumn(MlmDistributorPeer::MT4_PASSWORD);

		$criteria->addSelectColumn(MlmDistributorPeer::IC);

		$criteria->addSelectColumn(MlmDistributorPeer::COUNTRY);

		$criteria->addSelectColumn(MlmDistributorPeer::ADDRESS);

		$criteria->addSelectColumn(MlmDistributorPeer::ADDRESS2);

		$criteria->addSelectColumn(MlmDistributorPeer::CITY);

		$criteria->addSelectColumn(MlmDistributorPeer::STATE);

		$criteria->addSelectColumn(MlmDistributorPeer::POSTCODE);

		$criteria->addSelectColumn(MlmDistributorPeer::EMAIL);

		$criteria->addSelectColumn(MlmDistributorPeer::ALTERNATE_EMAIL);

		$criteria->addSelectColumn(MlmDistributorPeer::CONTACT);

		$criteria->addSelectColumn(MlmDistributorPeer::GENDER);

		$criteria->addSelectColumn(MlmDistributorPeer::DOB);

		$criteria->addSelectColumn(MlmDistributorPeer::BANK_NAME);

		$criteria->addSelectColumn(MlmDistributorPeer::BANK_ACC_NO);

		$criteria->addSelectColumn(MlmDistributorPeer::BANK_HOLDER_NAME);

		$criteria->addSelectColumn(MlmDistributorPeer::BANK_SWIFT_CODE);

		$criteria->addSelectColumn(MlmDistributorPeer::BANK_BRANCH);

		$criteria->addSelectColumn(MlmDistributorPeer::BANK_ADDRESS);

		$criteria->addSelectColumn(MlmDistributorPeer::VISA_DEBIT_CARD);

		$criteria->addSelectColumn(MlmDistributorPeer::EZY_CASH_CARD);

		$criteria->addSelectColumn(MlmDistributorPeer::TREE_LEVEL);

		$criteria->addSelectColumn(MlmDistributorPeer::TREE_STRUCTURE);

		$criteria->addSelectColumn(MlmDistributorPeer::PLACEMENT_TREE_LEVEL);

		$criteria->addSelectColumn(MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE);

		$criteria->addSelectColumn(MlmDistributorPeer::INIT_RANK_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::INIT_RANK_CODE);

		$criteria->addSelectColumn(MlmDistributorPeer::UPLINE_DIST_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::UPLINE_DIST_CODE);

		$criteria->addSelectColumn(MlmDistributorPeer::TREE_UPLINE_DIST_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::TREE_UPLINE_DIST_CODE);

		$criteria->addSelectColumn(MlmDistributorPeer::TOTAL_LEFT);

		$criteria->addSelectColumn(MlmDistributorPeer::TOTAL_RIGHT);

		$criteria->addSelectColumn(MlmDistributorPeer::PLACEMENT_POSITION);

		$criteria->addSelectColumn(MlmDistributorPeer::PLACEMENT_DATETIME);

		$criteria->addSelectColumn(MlmDistributorPeer::RANK_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::PROMAX_RANK_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::RANK_CODE);

		$criteria->addSelectColumn(MlmDistributorPeer::MT4_RANK_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::ACTIVE_DATETIME);

		$criteria->addSelectColumn(MlmDistributorPeer::ACTIVATED_BY);

		$criteria->addSelectColumn(MlmDistributorPeer::LEVERAGE);

		$criteria->addSelectColumn(MlmDistributorPeer::SPREAD);

		$criteria->addSelectColumn(MlmDistributorPeer::DEPOSIT_CURRENCY);

		$criteria->addSelectColumn(MlmDistributorPeer::DEPOSIT_AMOUNT);

		$criteria->addSelectColumn(MlmDistributorPeer::SIGN_NAME);

		$criteria->addSelectColumn(MlmDistributorPeer::SIGN_DATE);

		$criteria->addSelectColumn(MlmDistributorPeer::TERM_CONDITION);

		$criteria->addSelectColumn(MlmDistributorPeer::IB_COMMISSION);

		$criteria->addSelectColumn(MlmDistributorPeer::IS_IB);

		$criteria->addSelectColumn(MlmDistributorPeer::CREATED_BY);

		$criteria->addSelectColumn(MlmDistributorPeer::CREATED_ON);

		$criteria->addSelectColumn(MlmDistributorPeer::UPDATED_BY);

		$criteria->addSelectColumn(MlmDistributorPeer::UPDATED_ON);

		$criteria->addSelectColumn(MlmDistributorPeer::PACKAGE_PURCHASE_FLAG);

		$criteria->addSelectColumn(MlmDistributorPeer::FILE_BANK_PASS_BOOK);

		$criteria->addSelectColumn(MlmDistributorPeer::FILE_PROOF_OF_RESIDENCE);

		$criteria->addSelectColumn(MlmDistributorPeer::FILE_NRIC);

		$criteria->addSelectColumn(MlmDistributorPeer::EXCLUDED_STRUCTURE);

		$criteria->addSelectColumn(MlmDistributorPeer::PRODUCT_MTE);

		$criteria->addSelectColumn(MlmDistributorPeer::PRODUCT_FXGOLD);

		$criteria->addSelectColumn(MlmDistributorPeer::REMARK);

		$criteria->addSelectColumn(MlmDistributorPeer::REGISTER_REMARK);

		$criteria->addSelectColumn(MlmDistributorPeer::LOAN_ACCOUNT);

		$criteria->addSelectColumn(MlmDistributorPeer::DIAMOND_DOWNLINE_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::DIAMOND_STATUS);

		$criteria->addSelectColumn(MlmDistributorPeer::DIAMOND_DATE_START);

		$criteria->addSelectColumn(MlmDistributorPeer::DIAMOND_DATE_END);

		$criteria->addSelectColumn(MlmDistributorPeer::DIAMOND_DATE_ACHIEVE);

		$criteria->addSelectColumn(MlmDistributorPeer::DIAMOND_SALES);

		$criteria->addSelectColumn(MlmDistributorPeer::VIP_DOWNLINE_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::VIP_STATUS);

		$criteria->addSelectColumn(MlmDistributorPeer::VIP_DATE_START);

		$criteria->addSelectColumn(MlmDistributorPeer::VIP_DATE_END);

		$criteria->addSelectColumn(MlmDistributorPeer::VIP_DATE_ACHIEVE);

		$criteria->addSelectColumn(MlmDistributorPeer::VIP_SALES);

		$criteria->addSelectColumn(MlmDistributorPeer::DEGOLD_DOWNLINE_ID);

		$criteria->addSelectColumn(MlmDistributorPeer::DEGOLD_STATUS);

		$criteria->addSelectColumn(MlmDistributorPeer::DEGOLD_DATE_START);

		$criteria->addSelectColumn(MlmDistributorPeer::DEGOLD_DATE_END);

		$criteria->addSelectColumn(MlmDistributorPeer::DEGOLD_DATE_ACHIEVE);

		$criteria->addSelectColumn(MlmDistributorPeer::DEGOLD_SALES);

		$criteria->addSelectColumn(MlmDistributorPeer::ADDITIONAL_SALES);

	}

	const COUNT = 'COUNT(mlm_distributor.DISTRIBUTOR_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mlm_distributor.DISTRIBUTOR_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MlmDistributorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MlmDistributorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MlmDistributorPeer::doSelectRS($criteria, $con);
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
		$objects = MlmDistributorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MlmDistributorPeer::populateObjects(MlmDistributorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MlmDistributorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MlmDistributorPeer::getOMClass();
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
		return MlmDistributorPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MlmDistributorPeer::DISTRIBUTOR_ID); 

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
			$comparison = $criteria->getComparison(MlmDistributorPeer::DISTRIBUTOR_ID);
			$selectCriteria->add(MlmDistributorPeer::DISTRIBUTOR_ID, $criteria->remove(MlmDistributorPeer::DISTRIBUTOR_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MlmDistributorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MlmDistributorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MlmDistributor) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MlmDistributorPeer::DISTRIBUTOR_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MlmDistributor $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MlmDistributorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MlmDistributorPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MlmDistributorPeer::DATABASE_NAME, MlmDistributorPeer::TABLE_NAME, $columns);
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(MlmDistributorPeer::DATABASE_NAME);

		$criteria->add(MlmDistributorPeer::DISTRIBUTOR_ID, $pk);


		$v = MlmDistributorPeer::doSelect($criteria, $con);

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
			$criteria->add(MlmDistributorPeer::DISTRIBUTOR_ID, $pks, Criteria::IN);
			$objs = MlmDistributorPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMlmDistributorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MlmDistributorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MlmDistributorMapBuilder');
}
