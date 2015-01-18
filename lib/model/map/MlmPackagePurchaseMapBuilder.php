<?php



class MlmPackagePurchaseMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmPackagePurchaseMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_package_purchase');
		$tMap->setPhpName('MlmPackagePurchase');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('BANKSLIP_ID', 'BankslipId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('RANK_ID', 'RankId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('RANK_CODE', 'RankCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('TRANSACTION_TYPE', 'TransactionType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('IMAGE_SRC', 'ImageSrc', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('APPROVE_REJECT_DATETIME', 'ApproveRejectDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('APPROVED_BY_USERID', 'ApprovedByUserid', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 