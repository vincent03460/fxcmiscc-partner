<?php



class GgMemberWithdrawMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMemberWithdrawMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_member_withdraw');
		$tMap->setPhpName('GgMemberWithdraw');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('WITHDRAW_AMOUNT', 'WithdrawAmount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('CHARGES', 'Charges', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('RATE', 'Rate', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('CONVERT_AMOUNT', 'ConvertAmount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PAYMENT_TYPE', 'PaymentType', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ACC_NAME', 'AccName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ACC_PAYEE_NAME', 'AccPayeeName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ACC_NO', 'AccNo', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('PAYMENT_DATE', 'PaymentDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('PAYMENT_REMARK', 'PaymentRemark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('AUTOWIT', 'Autowit', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 