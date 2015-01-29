
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- app_login_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `app_login_log`;


CREATE TABLE `app_login_log`
(
	`log_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`access_ip` VARCHAR(50)  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`remark` TEXT,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`log_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- app_setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `app_setting`;


CREATE TABLE `app_setting`
(
	`setting_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`setting_parameter` VARCHAR(50)  NOT NULL,
	`setting_value` TEXT  NOT NULL,
	`setting_remark` TEXT  NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`setting_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- app_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `app_user`;


CREATE TABLE `app_user`
(
	`user_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50)  NOT NULL,
	`keep_password` VARCHAR(50)  NOT NULL,
	`userpassword` VARCHAR(50)  NOT NULL,
	`keep_password2` VARCHAR(50)  NOT NULL,
	`userpassword2` VARCHAR(50)  NOT NULL,
	`user_role` VARCHAR(20)  NOT NULL,
	`status_code` VARCHAR(20)  NOT NULL,
	`last_login_datetime` DATETIME,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`access_ip` VARCHAR(45),
	`remark` VARCHAR(1000),
	PRIMARY KEY (`user_id`),
	KEY `username`(`username`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- app_user_access
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `app_user_access`;


CREATE TABLE `app_user_access`
(
	`access_code` VARCHAR(50)  NOT NULL,
	`parent_id` VARCHAR(50),
	`menu_url` VARCHAR(255),
	`menu_label` VARCHAR(255),
	`is_menu` VARCHAR(1)  NOT NULL,
	`is_auth_needed` VARCHAR(1)  NOT NULL,
	`tree_level` INTEGER,
	`tree_seq` INTEGER,
	`tree_structure` VARCHAR(255),
	`status_code` VARCHAR(10),
	`created_on` DATETIME  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`access_code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- app_user_in_role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `app_user_in_role`;


CREATE TABLE `app_user_in_role`
(
	`user_role_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`role_id` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`user_role_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- app_user_role
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `app_user_role`;


CREATE TABLE `app_user_role`
(
	`role_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`role_code` VARCHAR(20)  NOT NULL,
	`role_desc` VARCHAR(50)  NOT NULL,
	`status_code` VARCHAR(10)  NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`role_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- app_user_role_access
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `app_user_role_access`;


CREATE TABLE `app_user_role_access`
(
	`role_access_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`access_code` VARCHAR(50)  NOT NULL,
	`role_id` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`role_access_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- demo_dist_commission_ledger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `demo_dist_commission_ledger`;


CREATE TABLE `demo_dist_commission_ledger`
(
	`commission_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`commission_type` VARCHAR(20)  NOT NULL,
	`transaction_type` VARCHAR(20)  NOT NULL,
	`ref_id` INTEGER,
	`month_traded` INTEGER,
	`year_traded` INTEGER,
	`credit` DECIMAL(12,2) default 0 NOT NULL,
	`debit` DECIMAL(12,2) default 0 NOT NULL,
	`balance` DECIMAL(12,2) default 0 NOT NULL,
	`remark` VARCHAR(255),
	`pips_downline_username` VARCHAR(50),
	`pips_mt4_id` VARCHAR(50),
	`pips_rebate` DECIMAL(12,2),
	`pips_level` INTEGER,
	`pips_lots_traded` DECIMAL(12,2),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`status_code` VARCHAR(25),
	PRIMARY KEY (`commission_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- demo_file_download
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `demo_file_download`;


CREATE TABLE `demo_file_download`
(
	`file_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`file_type` VARCHAR(255),
	`file_src` VARCHAR(255),
	`file_name` VARCHAR(255),
	`content_type` VARCHAR(255),
	`status_code` VARCHAR(20),
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`file_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- demo_pip_csv
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `demo_pip_csv`;


CREATE TABLE `demo_pip_csv`
(
	`pip_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`month_traded` INTEGER,
	`year_traded` INTEGER,
	`file_id` INTEGER,
	`pips_string` TEXT,
	`login_id` INTEGER,
	`login_name` VARCHAR(255),
	`deposit` DECIMAL(12,2),
	`withdraw` DECIMAL(12,2),
	`in_out` DECIMAL(12,2),
	`credit` DECIMAL(12,2),
	`volume` DECIMAL(12,2),
	`commission` DECIMAL(12,2),
	`taxes` DECIMAL(12,2),
	`agent` DECIMAL(12,2),
	`storage` DECIMAL(12,2),
	`profit` DECIMAL(12,2),
	`last_balance` DECIMAL(12,2),
	`status_code` VARCHAR(255)  NOT NULL,
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`pip_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- email_contact
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `email_contact`;


CREATE TABLE `email_contact`
(
	`email_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`remark` VARCHAR(255),
	`send_status` VARCHAR(20),
	`receiver_name` VARCHAR(255)  NOT NULL,
	`receiver_country` VARCHAR(255)  NOT NULL,
	`receiver_email` VARCHAR(255)  NOT NULL,
	`receiver_contact` VARCHAR(255)  NOT NULL,
	`status_code` VARCHAR(20)  NOT NULL,
	PRIMARY KEY (`email_id`),
	KEY `receiver_email`(`receiver_email`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_account
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_account`;


CREATE TABLE `mlm_account`
(
	`account_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`account_type` VARCHAR(20)  NOT NULL,
	`balance` DECIMAL(12,2) default 0 NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`account_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_account_ledger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_account_ledger`;


CREATE TABLE `mlm_account_ledger`
(
	`account_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`account_type` VARCHAR(20)  NOT NULL,
	`transaction_type` VARCHAR(20)  NOT NULL,
	`credit` DECIMAL(12,2) default 0 NOT NULL,
	`debit` DECIMAL(12,2) default 0 NOT NULL,
	`balance` DECIMAL(12,2) default 0 NOT NULL,
	`remark` VARCHAR(255),
	`internal_remark` TEXT,
	`ref_id` INTEGER,
	`ref_type` VARCHAR(20),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`account_id`),
	KEY `dist_id`(`dist_id`, `account_type`),
	KEY `dist_id_2`(`dist_id`, `account_type`, `transaction_type`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_admin
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_admin`;


CREATE TABLE `mlm_admin`
(
	`admin_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`admin_code` VARCHAR(20)  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`status_code` VARCHAR(20)  NOT NULL,
	`admin_role` VARCHAR(20)  NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`admin_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_announcement
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_announcement`;


CREATE TABLE `mlm_announcement`
(
	`announcement_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255)  NOT NULL,
	`title_cn` VARCHAR(255)  NOT NULL,
	`title_jp` VARCHAR(255),
	`content` TEXT  NOT NULL,
	`content_cn` TEXT  NOT NULL,
	`content_jp` TEXT,
	`short_content` TEXT,
	`short_content_cn` TEXT,
	`short_content_jp` TEXT,
	`status_code` VARCHAR(20)  NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`announcement_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_customer_enquiry
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_customer_enquiry`;


CREATE TABLE `mlm_customer_enquiry`
(
	`enquiry_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`distributor_id` INTEGER  NOT NULL,
	`contact_no` VARCHAR(255),
	`title` VARCHAR(255),
	`admin_read` VARCHAR(1),
	`admin_updated` VARCHAR(1),
	`distributor_read` VARCHAR(1),
	`distributor_updated` VARCHAR(1),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`enquiry_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_customer_enquiry_detail
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_customer_enquiry_detail`;


CREATE TABLE `mlm_customer_enquiry_detail`
(
	`detail_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`customer_enquiry_id` INTEGER  NOT NULL,
	`message` TEXT,
	`reply_from` VARCHAR(15),
	`status_code` VARCHAR(10),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`detail_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_daily_bonus_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_daily_bonus_log`;


CREATE TABLE `mlm_daily_bonus_log`
(
	`log_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`access_ip` VARCHAR(50)  NOT NULL,
	`bonus_type` VARCHAR(10)  NOT NULL,
	`bonus_date` DATETIME  NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`log_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_daily_dist_mt4_credit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_daily_dist_mt4_credit`;


CREATE TABLE `mlm_daily_dist_mt4_credit`
(
	`credit_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`mt4_user_name` VARCHAR(50),
	`mt4_credit` DECIMAL(12,2),
	`traded_datetime` DATETIME,
	`status_code` VARCHAR(10) default 'ACTIVE',
	`remark` TEXT,
	`idx` INTEGER default 0 NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`credit_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_daily_pips_csv
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_daily_pips_csv`;


CREATE TABLE `mlm_daily_pips_csv`
(
	`pip_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`traded_datetime` DATETIME,
	`file_id` INTEGER,
	`pips_string` TEXT,
	`login_id` INTEGER,
	`login_name` VARCHAR(255)  NOT NULL,
	`balance` DECIMAL(12,2),
	`credit` DECIMAL(12,2),
	`commissions` DECIMAL(12,2),
	`taxes` DECIMAL(12,2),
	`storage` DECIMAL(12,2),
	`profit` DECIMAL(12,2),
	`interest` DECIMAL(12,2),
	`tax` DECIMAL(12,2),
	`unrealizedPL` DECIMAL(12,2),
	`equity` DECIMAL(12,2),
	`status_code` VARCHAR(255)  NOT NULL,
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`pip_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_daily_pips_file
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_daily_pips_file`;


CREATE TABLE `mlm_daily_pips_file`
(
	`file_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`file_type` VARCHAR(255),
	`file_src` VARCHAR(255),
	`file_name` VARCHAR(255),
	`content_type` VARCHAR(255),
	`status_code` VARCHAR(20),
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`file_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_debit_account
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_debit_account`;


CREATE TABLE `mlm_debit_account`
(
	`debit_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`convert_rp_to_cp1` VARCHAR(1) default '1',
	`convert_cp3_to_cp1` VARCHAR(1) default '1',
	`cp3_withdrawal` VARCHAR(1) default '1',
	`ecash_withdrawal` VARCHAR(1) default '1',
	`convert_cp2_to_cp1` VARCHAR(1) default '1',
	`transfer_cp1` VARCHAR(1) default '1' NOT NULL,
	`transfer_cp2` VARCHAR(1) default '1' NOT NULL,
	`transfer_cp3` VARCHAR(1) default '1' NOT NULL,
	`remark` TEXT,
	PRIMARY KEY (`debit_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_dist_commission_ledger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_dist_commission_ledger`;


CREATE TABLE `mlm_dist_commission_ledger`
(
	`commission_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`commission_type` VARCHAR(20)  NOT NULL,
	`transaction_type` VARCHAR(20)  NOT NULL,
	`ref_id` INTEGER,
	`month_traded` INTEGER,
	`year_traded` INTEGER,
	`credit` DECIMAL(12,2) default 0 NOT NULL,
	`debit` DECIMAL(12,2) default 0 NOT NULL,
	`balance` DECIMAL(12,2) default 0 NOT NULL,
	`remark` VARCHAR(255),
	`pips_downline_username` VARCHAR(50),
	`pips_mt4_id` VARCHAR(50),
	`pips_rebate` DECIMAL(12,2),
	`pips_level` INTEGER,
	`pips_lots_traded` DECIMAL(12,2),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`status_code` VARCHAR(25),
	PRIMARY KEY (`commission_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_dist_epoint_purchase
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_dist_epoint_purchase`;


CREATE TABLE `mlm_dist_epoint_purchase`
(
	`purchase_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`currency_type` VARCHAR(10) default 'USD',
	`amount` DECIMAL(12,2) default 0 NOT NULL,
	`transaction_type` VARCHAR(20)  NOT NULL,
	`image_src` VARCHAR(255),
	`status_code` VARCHAR(20),
	`remarks` VARCHAR(255),
	`payment_reference` VARCHAR(50),
	`bank_id` INTEGER default 1,
	`bank_code` VARCHAR(50),
	`bill_create_ip` VARCHAR(50),
	`time_start` VARCHAR(50),
	`time_expire` VARCHAR(50),
	`approve_reject_datetime` DATETIME,
	`approved_by_userid` INTEGER,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`payment_method` VARCHAR(10),
	`pg_success` VARCHAR(10),
	`pg_msg` TEXT,
	`pg_bill_no` VARCHAR(255),
	`pg_ret_encode_type` VARCHAR(255),
	`pg_currency_type` VARCHAR(255),
	`pg_signature` TEXT,
	`return_string` TEXT,
	PRIMARY KEY (`purchase_id`),
	KEY `dist_id`(`dist_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_dist_mt4
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_dist_mt4`;


CREATE TABLE `mlm_dist_mt4`
(
	`mt4_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`mt4_user_name` VARCHAR(50),
	`mt4_password` VARCHAR(50),
	`rank_id` INTEGER,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`mt4_id`),
	KEY `dist_id`(`dist_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_dist_package_purchase
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_dist_package_purchase`;


CREATE TABLE `mlm_dist_package_purchase`
(
	`purchase_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`rank_id` INTEGER,
	`rank_code` VARCHAR(20),
	`amount` DECIMAL(12,2) default 0 NOT NULL,
	`transaction_type` VARCHAR(20)  NOT NULL,
	`image_src` VARCHAR(255),
	`status_code` VARCHAR(20),
	`remarks` VARCHAR(255),
	`approve_reject_datetime` DATETIME,
	`approved_by_userid` INTEGER,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`purchase_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_dist_pairing
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_dist_pairing`;


CREATE TABLE `mlm_dist_pairing`
(
	`pairing_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`left_balance` INTEGER default 0 NOT NULL,
	`right_balance` INTEGER default 0 NOT NULL,
	`flush_limit` INTEGER default 0 NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`pairing_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_dist_pairing_ledger
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_dist_pairing_ledger`;


CREATE TABLE `mlm_dist_pairing_ledger`
(
	`pairing_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`left_right` VARCHAR(10)  NOT NULL,
	`transaction_type` VARCHAR(20)  NOT NULL,
	`credit` DECIMAL(12,2) default 0 NOT NULL,
	`debit` DECIMAL(12,2) default 0 NOT NULL,
	`balance` DECIMAL(12,2) default 0 NOT NULL,
	`remark` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`pairing_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_distributor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_distributor`;


CREATE TABLE `mlm_distributor`
(
	`distributor_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`distributor_code` VARCHAR(50)  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`account_type` VARCHAR(100),
	`mt4_investor_password` VARCHAR(100),
	`internal_remark` TEXT,
	`status_code` VARCHAR(20)  NOT NULL,
	`full_name` VARCHAR(100),
	`nickname` VARCHAR(100),
	`mt4_user_name` VARCHAR(50),
	`mt4_password` VARCHAR(50),
	`ic` VARCHAR(100),
	`country` VARCHAR(100),
	`address` VARCHAR(255),
	`address2` VARCHAR(255),
	`city` VARCHAR(100),
	`state` VARCHAR(100),
	`postcode` VARCHAR(30),
	`email` VARCHAR(100),
	`alternate_email` VARCHAR(100),
	`contact` VARCHAR(30),
	`gender` VARCHAR(10),
	`dob` DATE,
	`bank_name` VARCHAR(50),
	`bank_acc_no` VARCHAR(50),
	`bank_holder_name` VARCHAR(50),
	`bank_swift_code` VARCHAR(50),
	`bank_branch` VARCHAR(255),
	`bank_address` VARCHAR(255),
	`visa_debit_card` VARCHAR(18),
	`ezy_cash_card` VARCHAR(50),
	`tree_level` INTEGER,
	`tree_structure` TEXT,
	`placement_tree_level` INTEGER,
	`placement_tree_structure` TEXT,
	`init_rank_id` INTEGER,
	`init_rank_code` VARCHAR(30),
	`upline_dist_id` INTEGER,
	`upline_dist_code` VARCHAR(50),
	`tree_upline_dist_id` INTEGER,
	`tree_upline_dist_code` VARCHAR(50),
	`total_left` INTEGER default 0,
	`total_right` INTEGER default 0,
	`placement_position` VARCHAR(10),
	`placement_datetime` DATETIME,
	`rank_id` INTEGER,
	`promax_rank_id` INTEGER,
	`rank_code` VARCHAR(30),
	`mt4_rank_id` INTEGER,
	`active_datetime` DATETIME,
	`activated_by` INTEGER,
	`leverage` VARCHAR(10),
	`spread` VARCHAR(10),
	`deposit_currency` VARCHAR(20),
	`deposit_amount` VARCHAR(20),
	`sign_name` VARCHAR(50),
	`sign_date` DATETIME,
	`term_condition` INTEGER default 0,
	`ib_commission` DECIMAL(12,2) default 0 NOT NULL,
	`is_ib` VARCHAR(1) default '0' NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`package_purchase_flag` VARCHAR(1) default '' NOT NULL,
	`file_bank_pass_book` VARCHAR(255),
	`file_proof_of_residence` VARCHAR(255),
	`file_nric` VARCHAR(255),
	`excluded_structure` VARCHAR(1) default '',
	`product_mte` VARCHAR(1) default '',
	`product_fxgold` VARCHAR(1) default '',
	`remark` VARCHAR(255),
	`register_remark` TEXT,
	`loan_account` VARCHAR(1) default '',
	`diamond_downline_id` TEXT,
	`diamond_status` VARCHAR(50),
	`diamond_date_start` DATETIME,
	`diamond_date_end` DATETIME,
	`diamond_date_achieve` DATETIME,
	`diamond_sales` DECIMAL(12,2),
	`vip_downline_id` TEXT,
	`vip_status` VARCHAR(50),
	`vip_date_start` DATETIME,
	`vip_date_end` DATETIME,
	`vip_date_achieve` DATETIME,
	`vip_sales` DECIMAL(12,2),
	`degold_downline_id` TEXT,
	`degold_status` VARCHAR(50),
	`degold_date_start` DATETIME,
	`degold_date_end` DATETIME,
	`degold_date_achieve` DATETIME,
	`degold_sales` DECIMAL(12,2),
	`additional_sales` DECIMAL(12,2) default 0,
	PRIMARY KEY (`distributor_id`),
	KEY `distributor_code`(`distributor_code`),
	KEY `upline_dist_id`(`upline_dist_id`),
	KEY `tree_upline_dist_id`(`tree_upline_dist_id`),
	KEY `distributor_code_2`(`distributor_code`, `status_code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_ecash_withdraw
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_ecash_withdraw`;


CREATE TABLE `mlm_ecash_withdraw`
(
	`withdraw_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`deduct` DECIMAL(12,2) default 0 NOT NULL,
	`amount` DECIMAL(12,2) default 0 NOT NULL,
	`bank_in_to` VARCHAR(50),
	`status_code` VARCHAR(20),
	`approve_reject_datetime` DATETIME,
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`withdraw_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_file_download
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_file_download`;


CREATE TABLE `mlm_file_download`
(
	`file_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`file_type` VARCHAR(255),
	`file_src` VARCHAR(255),
	`file_name` VARCHAR(255),
	`content_type` VARCHAR(255),
	`status_code` VARCHAR(20),
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`file_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_member_application
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_member_application`;


CREATE TABLE `mlm_member_application`
(
	`member_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`full_name` VARCHAR(100),
	`email` VARCHAR(100),
	`contact` VARCHAR(30),
	`qq` VARCHAR(30),
	`gender` VARCHAR(10),
	`country` VARCHAR(100),
	`dob` DATE,
	`status_code` VARCHAR(30),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`member_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_member_questionnaire
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_member_questionnaire`;


CREATE TABLE `mlm_member_questionnaire`
(
	`questionnaire_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`member_id` INTEGER  NOT NULL,
	`q1` VARCHAR(100),
	`q2` VARCHAR(100),
	`q3` VARCHAR(100),
	`q4` VARCHAR(100),
	`q5` VARCHAR(100),
	`q6` VARCHAR(100),
	`q7` VARCHAR(100),
	`q8` VARCHAR(100),
	`s1` VARCHAR(100),
	`s2` VARCHAR(100),
	`s3` VARCHAR(100),
	`status_code` VARCHAR(30),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`questionnaire_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_mt4_reload_fund
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_mt4_reload_fund`;


CREATE TABLE `mlm_mt4_reload_fund`
(
	`reload_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`mt4_user_name` VARCHAR(25)  NOT NULL,
	`amount` DECIMAL(12,2) default 0 NOT NULL,
	`status_code` VARCHAR(20),
	`approve_reject_datetime` DATETIME,
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`reload_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_mt4_withdraw
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_mt4_withdraw`;


CREATE TABLE `mlm_mt4_withdraw`
(
	`withdraw_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`mt4_user_name` VARCHAR(25)  NOT NULL,
	`amount_requested` DECIMAL(12,2) default 0 NOT NULL,
	`handling_fee` DECIMAL(12,2),
	`grand_amount` DECIMAL(12,2),
	`currency_code` VARCHAR(25),
	`payment_type` VARCHAR(25),
	`status_code` VARCHAR(20),
	`approve_reject_datetime` DATETIME,
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`withdraw_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_package
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_package`;


CREATE TABLE `mlm_package`
(
	`package_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`package_name` VARCHAR(50)  NOT NULL,
	`price` DECIMAL(12,2),
	`color` VARCHAR(10),
	`commission` DECIMAL(12,2),
	`monthly_roi` DECIMAL(12,2),
	`pips_gen` DECIMAL(12,2),
	`public_purchase` VARCHAR(1) default '1' NOT NULL,
	`leader_bonus` DECIMAL(12,2),
	`pips` DECIMAL(12,2),
	`generation` DECIMAL(12,2),
	`pips2` DECIMAL(12,2),
	`generation2` DECIMAL(12,2),
	`pips3` DECIMAL(12,2),
	`generation3` DECIMAL(12,2),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`package_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_package_challenge
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_package_challenge`;


CREATE TABLE `mlm_package_challenge`
(
	`challenge_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`challenge_type` VARCHAR(20)  NOT NULL,
	`date_from` DATETIME  NOT NULL,
	`date_to` DATETIME  NOT NULL,
	`total_sales` DECIMAL(12,2) default 0 NOT NULL,
	`remark` VARCHAR(255),
	`internal_remark` TEXT,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`challenge_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_package_pips
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_package_pips`;


CREATE TABLE `mlm_package_pips`
(
	`pips_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`totol_sponsor` INTEGER  NOT NULL,
	`pips` DECIMAL(12,2),
	`generation` DECIMAL(12,2),
	`pips2` DECIMAL(12,2),
	`generation2` DECIMAL(12,2),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`pips_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_package_promax
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_package_promax`;


CREATE TABLE `mlm_package_promax`
(
	`package_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`package_name` VARCHAR(50)  NOT NULL,
	`price` DECIMAL(12,2),
	`color` VARCHAR(10),
	`commission` DECIMAL(12,2),
	`monthly_roi` DECIMAL(12,2),
	`pips_gen` DECIMAL(12,2),
	`public_purchase` VARCHAR(1) default '1' NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`pips` DECIMAL(12,2),
	`generation` DECIMAL(12,2),
	`pips2` DECIMAL(12,2),
	`generation2` DECIMAL(12,2),
	PRIMARY KEY (`package_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_package_upgrade_history
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_package_upgrade_history`;


CREATE TABLE `mlm_package_upgrade_history`
(
	`upgrade_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER  NOT NULL,
	`package_id` INTEGER,
	`mt4_user_name` VARCHAR(255),
	`mt4_password` VARCHAR(255),
	`transaction_code` VARCHAR(20),
	`amount` DECIMAL(12,2) default 0 NOT NULL,
	`status_code` VARCHAR(20),
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`upgrade_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_pip_csv
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_pip_csv`;


CREATE TABLE `mlm_pip_csv`
(
	`pip_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`month_traded` INTEGER,
	`year_traded` INTEGER,
	`file_id` INTEGER,
	`pips_string` TEXT,
	`login_id` INTEGER,
	`login_name` VARCHAR(255),
	`deposit` DECIMAL(12,2),
	`withdraw` DECIMAL(12,2),
	`in_out` DECIMAL(12,2),
	`credit` DECIMAL(12,2),
	`volume` DECIMAL(12,2),
	`commission` DECIMAL(12,2),
	`taxes` DECIMAL(12,2),
	`agent` DECIMAL(12,2),
	`storage` DECIMAL(12,2),
	`profit` DECIMAL(12,2),
	`last_balance` DECIMAL(12,2),
	`status_code` VARCHAR(255)  NOT NULL,
	`remarks` VARCHAR(255),
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	PRIMARY KEY (`pip_id`),
	KEY `file_id`(`file_id`),
	KEY `file_id_2`(`file_id`, `status_code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mlm_roi_dividend
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mlm_roi_dividend`;


CREATE TABLE `mlm_roi_dividend`
(
	`devidend_id` INTEGER  NOT NULL AUTO_INCREMENT,
	`dist_id` INTEGER,
	`mt4_user_name` VARCHAR(50),
	`idx` INTEGER,
	`account_ledger_id` INTEGER,
	`dividend_date` DATETIME  NOT NULL,
	`package_id` INTEGER,
	`package_price` DECIMAL(12,2) default 0 NOT NULL,
	`roi_percentage` DECIMAL(12,2) default 0 NOT NULL,
	`mt4_balance` DECIMAL(12,2) default 0,
	`dividend_amount` DECIMAL(12,2) default 0 NOT NULL,
	`remarks` VARCHAR(255),
	`status_code` VARCHAR(20)  NOT NULL,
	`created_by` INTEGER  NOT NULL,
	`created_on` DATETIME  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`updated_on` DATETIME  NOT NULL,
	`first_dividend_date` DATETIME,
	PRIMARY KEY (`devidend_id`),
	KEY `dist_id`(`dist_id`, `mt4_user_name`, `dividend_date`),
	KEY `mt4_user_name`(`mt4_user_name`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
