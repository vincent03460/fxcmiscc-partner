<?php



class MlmProductPurchaseHistoryDetailMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmProductPurchaseHistoryDetailMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_product_purchase_history_detail');
		$tMap->setPhpName('MlmProductPurchaseHistoryDetail');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('HISTORY_DETAIL_ID', 'HistoryDetailId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('HISTORY_ID', 'HistoryId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PRODUCT_ID', 'ProductId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PRICE', 'Price', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('QTY', 'Qty', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('TOTAL_AMOUNT', 'TotalAmount', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 