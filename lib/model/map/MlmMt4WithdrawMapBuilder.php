<?php



class MlmMt4WithdrawMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmMt4WithdrawMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_mt4_withdraw');
		$tMap->setPhpName('MlmMt4Withdraw');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('WITHDRAW_ID', 'WithdrawId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MT4_USER_NAME', 'Mt4UserName', 'string', CreoleTypes::VARCHAR, true, 25);

		$tMap->addColumn('AMOUNT_REQUESTED', 'AmountRequested', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('HANDLING_FEE', 'HandlingFee', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('GRAND_AMOUNT', 'GrandAmount', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CURRENCY_CODE', 'CurrencyCode', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('PAYMENT_TYPE', 'PaymentType', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('APPROVE_REJECT_DATETIME', 'ApproveRejectDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 