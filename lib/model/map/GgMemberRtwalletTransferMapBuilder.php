<?php



class GgMemberRtwalletTransferMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgMemberRtwalletTransferMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_member_rtwallet_transfer');
		$tMap->setPhpName('GgMemberRtwalletTransfer');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('FROM_UID', 'FromUid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TO_UID', 'ToUid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 