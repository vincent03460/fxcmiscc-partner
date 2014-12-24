<?php



class EmailContactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EmailContactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('email_contact');
		$tMap->setPhpName('EmailContact');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('EMAIL_ID', 'EmailId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SEND_STATUS', 'SendStatus', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('RECEIVER_NAME', 'ReceiverName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RECEIVER_COUNTRY', 'ReceiverCountry', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RECEIVER_EMAIL', 'ReceiverEmail', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RECEIVER_CONTACT', 'ReceiverContact', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, true, 20);

	} 
} 