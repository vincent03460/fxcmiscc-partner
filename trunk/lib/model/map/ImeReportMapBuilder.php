<?php



class ImeReportMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ImeReportMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ime_report');
		$tMap->setPhpName('ImeReport');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('REPORT_ID', 'ReportId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BONUS_TYPE', 'BonusType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('SMALL_LEG', 'SmallLeg', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('PERSONAL_SALES', 'PersonalSales', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('TICKET_QTY', 'TicketQty', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('DISTRIBUTOR_CODE', 'DistributorCode', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FULL_NAME', 'FullName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CONTACT', 'Contact', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REGISTERED_ON', 'RegisteredOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('LEADER', 'Leader', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 