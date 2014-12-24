<?php



class DemoPipCsvMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DemoPipCsvMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('demo_pip_csv');
		$tMap->setPhpName('DemoPipCsv');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('PIP_ID', 'PipId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONTH_TRADED', 'MonthTraded', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('YEAR_TRADED', 'YearTraded', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FILE_ID', 'FileId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PIPS_STRING', 'PipsString', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('LOGIN_ID', 'LoginId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('LOGIN_NAME', 'LoginName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DEPOSIT', 'Deposit', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('WITHDRAW', 'Withdraw', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('IN_OUT', 'InOut', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('CREDIT', 'Credit', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('VOLUME', 'Volume', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('COMMISSION', 'Commission', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('TAXES', 'Taxes', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('AGENT', 'Agent', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('STORAGE', 'Storage', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('PROFIT', 'Profit', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('LAST_BALANCE', 'LastBalance', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 