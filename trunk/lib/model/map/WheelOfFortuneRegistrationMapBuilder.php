<?php



class WheelOfFortuneRegistrationMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.WheelOfFortuneRegistrationMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('wheel_of_fortune_registration');
		$tMap->setPhpName('WheelOfFortuneRegistration');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('FORTUNE_ID', 'FortuneId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FULL_NAME', 'FullName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MOBILE_NO', 'MobileNo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('QQ', 'Qq', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('REFERRER', 'Referrer', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LUCKY_DRAW', 'LuckyDraw', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SERIAL_NO', 'SerialNo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 