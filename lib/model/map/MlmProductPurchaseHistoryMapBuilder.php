<?php



class MlmProductPurchaseHistoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmProductPurchaseHistoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_product_purchase_history');
		$tMap->setPhpName('MlmProductPurchaseHistory');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('HISTORY_ID', 'HistoryId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_AMOUNT', 'TotalAmount', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('APPROVE_REJECT_DATETIME', 'ApproveRejectDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 