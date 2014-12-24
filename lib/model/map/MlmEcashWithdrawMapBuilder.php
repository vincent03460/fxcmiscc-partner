<?php



class MlmEcashWithdrawMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmEcashWithdrawMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_ecash_withdraw');
		$tMap->setPhpName('MlmEcashWithdraw');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('WITHDRAW_ID', 'WithdrawId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DEDUCT', 'Deduct', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('BANK_IN_TO', 'BankInTo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('APPROVE_REJECT_DATETIME', 'ApproveRejectDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 