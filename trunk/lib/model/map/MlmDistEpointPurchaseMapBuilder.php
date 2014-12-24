<?php



class MlmDistEpointPurchaseMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDistEpointPurchaseMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_dist_epoint_purchase');
		$tMap->setPhpName('MlmDistEpointPurchase');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('PURCHASE_ID', 'PurchaseId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CURRENCY_TYPE', 'CurrencyType', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('TRANSACTION_TYPE', 'TransactionType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('IMAGE_SRC', 'ImageSrc', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PAYMENT_REFERENCE', 'PaymentReference', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('BANK_ID', 'BankId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('BANK_CODE', 'BankCode', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('BILL_CREATE_IP', 'BillCreateIp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIME_START', 'TimeStart', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIME_EXPIRE', 'TimeExpire', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('APPROVE_REJECT_DATETIME', 'ApproveRejectDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('APPROVED_BY_USERID', 'ApprovedByUserid', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('PAYMENT_METHOD', 'PaymentMethod', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('PG_SUCCESS', 'PgSuccess', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('PG_MSG', 'PgMsg', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('PG_BILL_NO', 'PgBillNo', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PG_RET_ENCODE_TYPE', 'PgRetEncodeType', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PG_CURRENCY_TYPE', 'PgCurrencyType', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PG_SIGNATURE', 'PgSignature', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('RETURN_STRING', 'ReturnString', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 