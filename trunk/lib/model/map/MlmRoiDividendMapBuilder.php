<?php



class MlmRoiDividendMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmRoiDividendMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_roi_dividend');
		$tMap->setPhpName('MlmRoiDividend');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('DEVIDEND_ID', 'DevidendId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MT4_USER_NAME', 'Mt4UserName', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('IDX', 'Idx', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ACCOUNT_LEDGER_ID', 'AccountLedgerId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DIVIDEND_DATE', 'DividendDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('PACKAGE_ID', 'PackageId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PACKAGE_PRICE', 'PackagePrice', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('ROI_PERCENTAGE', 'RoiPercentage', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('MT4_BALANCE', 'Mt4Balance', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('DIVIDEND_AMOUNT', 'DividendAmount', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('REMARKS', 'Remarks', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('FIRST_DIVIDEND_DATE', 'FirstDividendDate', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 