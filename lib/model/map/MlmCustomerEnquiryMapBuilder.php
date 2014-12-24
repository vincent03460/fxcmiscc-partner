<?php



class MlmCustomerEnquiryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmCustomerEnquiryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_customer_enquiry');
		$tMap->setPhpName('MlmCustomerEnquiry');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ENQUIRY_ID', 'EnquiryId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DISTRIBUTOR_ID', 'DistributorId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CONTACT_NO', 'ContactNo', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ADMIN_READ', 'AdminRead', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ADMIN_UPDATED', 'AdminUpdated', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DISTRIBUTOR_READ', 'DistributorRead', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DISTRIBUTOR_UPDATED', 'DistributorUpdated', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 