<?php



class MlmDebitAccountMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmDebitAccountMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_debit_account');
		$tMap->setPhpName('MlmDebitAccount');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('DEBIT_ID', 'DebitId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('CONVERT_RP_TO_CP1', 'ConvertRpToCp1', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CONVERT_CP3_TO_CP1', 'ConvertCp3ToCp1', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CP3_WITHDRAWAL', 'Cp3Withdrawal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ECASH_WITHDRAWAL', 'EcashWithdrawal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CONVERT_CP2_TO_CP1', 'ConvertCp2ToCp1', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TRANSFER_CP1', 'TransferCp1', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TRANSFER_CP2', 'TransferCp2', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TRANSFER_CP3', 'TransferCp3', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 