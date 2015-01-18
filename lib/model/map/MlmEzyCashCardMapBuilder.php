<?php



class MlmEzyCashCardMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmEzyCashCardMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_ezy_cash_card');
		$tMap->setPhpName('MlmEzyCashCard');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('CARD_ID', 'CardId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ACCOUNT_ID', 'AccountId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('QTY', 'Qty', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SUB_TOTAL', 'SubTotal', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 