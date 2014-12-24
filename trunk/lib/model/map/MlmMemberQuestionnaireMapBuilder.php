<?php



class MlmMemberQuestionnaireMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MlmMemberQuestionnaireMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mlm_member_questionnaire');
		$tMap->setPhpName('MlmMemberQuestionnaire');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('QUESTIONNAIRE_ID', 'QuestionnaireId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MEMBER_ID', 'MemberId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('Q1', 'Q1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('Q2', 'Q2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('Q3', 'Q3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('Q4', 'Q4', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('Q5', 'Q5', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('Q6', 'Q6', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('Q7', 'Q7', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('Q8', 'Q8', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('S1', 'S1', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('S2', 'S2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('S3', 'S3', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STATUS_CODE', 'StatusCode', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 