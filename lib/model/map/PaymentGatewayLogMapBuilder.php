<?php



class PaymentGatewayLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PaymentGatewayLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('payment_gateway_log');
		$tMap->setPhpName('PaymentGatewayLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('LOG_ID', 'LogId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('HANDLING_AMOUNT', 'HandlingAmount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('SUBMIT_STRING', 'SubmitString', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TRANSACTION_TYPE', 'TransactionType', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 