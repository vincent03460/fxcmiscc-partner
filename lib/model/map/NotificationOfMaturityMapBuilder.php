<?php



class NotificationOfMaturityMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NotificationOfMaturityMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('notification_of_maturity');
		$tMap->setPhpName('NotificationOfMaturity');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('NOTICE_ID', 'NoticeId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DIST_ID', 'DistId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MT4_USER_NAME', 'Mt4UserName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIVIDEND_DATE', 'DividendDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('MATURITY_TYPE', 'MaturityType', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RETRY', 'Retry', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('INTERNAL_REMARK', 'InternalRemark', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('EMAIL_STATUS', 'EmailStatus', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('APPROVE_REJECT_DATETIME', 'ApproveRejectDatetime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CLIENT_RESPONSE_DATATIME', 'ClientResponseDatatime', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MT4_BALANCE', 'Mt4Balance', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('PACKAGE_PRICE', 'PackagePrice', 'double', CreoleTypes::DECIMAL, false, 12);

		$tMap->addColumn('LEADER_DIST_ID', 'LeaderDistId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 