<?php



class LuckyDrawMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LuckyDrawMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lucky_draw');
		$tMap->setPhpName('LuckyDraw');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('LUCKY_ID', 'LuckyId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FULL_NAME', 'FullName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MT4_USERNAME', 'Mt4Username', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MT4_PASSWORD', 'Mt4Password', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('AMOUNT', 'Amount', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DRAW_TYPE', 'DrawType', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 