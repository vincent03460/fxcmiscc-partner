<?php



class GgMemberCwithdrawMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMemberCwithdrawMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_member_cwithdraw');
		$tMap->setPhpName('GgMemberCwithdraw');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('CODE', 'Code', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('PAYMENT_DATE', 'PaymentDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('PAYMENT_REMARK', 'PaymentRemark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 