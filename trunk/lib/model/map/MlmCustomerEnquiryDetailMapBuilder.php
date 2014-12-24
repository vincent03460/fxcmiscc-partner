<?php



class MlmCustomerEnquiryDetailMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmCustomerEnquiryDetailMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_customer_enquiry_detail');
		$tMap->setPhpName('MlmCustomerEnquiryDetail');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('DETAIL_ID', 'DetailId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CUSTOMER_ENQUIRY_ID', 'CustomerEnquiryId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MESSAGE', 'Message', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('REPLY_FROM', 'ReplyFrom', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 