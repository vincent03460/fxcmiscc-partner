<?php



class TuneDistributorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TuneDistributorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tune_distributor');
		$tMap->setPhpName('TuneDistributor');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('DISTRIBUTOR_ID', 'DistributorId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DISTRIBUTOR_CODE', 'DistributorCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FULL_NAME', 'FullName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NICKNAME', 'Nickname', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('IC', 'Ic', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ADDRESS', 'Address', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('POSTCODE', 'Postcode', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CONTACT', 'Contact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('GENDER', 'Gender', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DOB', 'Dob', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('BANK_NAME', 'BankName', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('BANK_ACC_NO', 'BankAccNo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('BANK_HOLDER_NAME', 'BankHolderName', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PARENT_ID', 'ParentId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TOTAL_LEFT', 'TotalLeft', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TOTAL_RIGHT', 'TotalRight', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TREE_LEVEL', 'TreeLevel', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TREE_STRUCTURE', 'TreeStructure', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('UPLINE_DIST_ID', 'UplineDistId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLACEMENT_DATETIME', 'PlacementDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('ACTIVE_DATETIME', 'ActiveDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 