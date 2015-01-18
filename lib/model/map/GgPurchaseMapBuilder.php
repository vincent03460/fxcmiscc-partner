<?php



class GgPurchaseMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GgPurchaseMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gg_purchase');
		$tMap->setPhpName('GgPurchase');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('CREATOR', 'Creator', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CID', 'Cid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('REFNO', 'Refno', 'string', CreoleTypes::VARCHAR, true, 22);

		$tMap->addColumn('MEMBER_SALE', 'MemberSale', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NM_NAME', 'NmName', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NM_CONTACT', 'NmContact', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('UID', 'Uid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('SID', 'Sid', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('STOCKIST_SALE', 'StockistSale', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('COLLECT_ADDRESS', 'CollectAddress', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('COLLECT_CITY', 'CollectCity', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('COLLECT_ZIP', 'CollectZip', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('COLLECT_STATE', 'CollectState', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('COLLECT_COUNTRY', 'CollectCountry', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('MAIL_TYPE', 'MailType', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('SHARE_PRICE', 'SharePrice', 'double', CreoleTypes::DECIMAL, true, 12);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL_BV', 'TotalBv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('ACTUAL_BV', 'ActualBv', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL_DP', 'TotalDp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('ACTUAL_DP', 'ActualDp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL_RP', 'TotalRp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('ACTUAL_RP', 'ActualRp', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('TOTAL_CP', 'TotalCp', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('DELIVERY_COST', 'DeliveryCost', 'double', CreoleTypes::DECIMAL, true, 15);

		$tMap->addColumn('PAYMENT_TYPE', 'PaymentType', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('COLLECTED', 'Collected', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('COLLECTED_DATE', 'CollectedDate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('FIRST_SALE', 'FirstSale', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NO_BV', 'NoBv', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('RANK_A', 'RankA', 'double', CreoleTypes::DECIMAL, true, 4);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('REMARK', 'Remark', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CDATE', 'Cdate', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('EDATE', 'Edate', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 