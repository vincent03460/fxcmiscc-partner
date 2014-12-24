<?php


abstract class BaseMlmMemberQuestionnaire extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $questionnaire_id;


	
	protected $member_id;


	
	protected $q1;


	
	protected $q2;


	
	protected $q3;


	
	protected $q4;


	
	protected $q5;


	
	protected $q6;


	
	protected $q7;


	
	protected $q8;


	
	protected $s1;


	
	protected $s2;


	
	protected $s3;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getQuestionnaireId()
	{

		return $this->questionnaire_id;
	}

	
	public function getMemberId()
	{

		return $this->member_id;
	}

	
	public function getQ1()
	{

		return $this->q1;
	}

	
	public function getQ2()
	{

		return $this->q2;
	}

	
	public function getQ3()
	{

		return $this->q3;
	}

	
	public function getQ4()
	{

		return $this->q4;
	}

	
	public function getQ5()
	{

		return $this->q5;
	}

	
	public function getQ6()
	{

		return $this->q6;
	}

	
	public function getQ7()
	{

		return $this->q7;
	}

	
	public function getQ8()
	{

		return $this->q8;
	}

	
	public function getS1()
	{

		return $this->s1;
	}

	
	public function getS2()
	{

		return $this->s2;
	}

	
	public function getS3()
	{

		return $this->s3;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getCreatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->created_on === null || $this->created_on === '') {
			return null;
		} elseif (!is_int($this->created_on)) {
						$ts = strtotime($this->created_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_on] as date/time value: " . var_export($this->created_on, true));
			}
		} else {
			$ts = $this->created_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function getUpdatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_on === null || $this->updated_on === '') {
			return null;
		} elseif (!is_int($this->updated_on)) {
						$ts = strtotime($this->updated_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_on] as date/time value: " . var_export($this->updated_on, true));
			}
		} else {
			$ts = $this->updated_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setQuestionnaireId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->questionnaire_id !== $v) {
			$this->questionnaire_id = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID;
		}

	} 
	
	public function setMemberId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->member_id !== $v) {
			$this->member_id = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::MEMBER_ID;
		}

	} 
	
	public function setQ1($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q1 !== $v) {
			$this->q1 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q1;
		}

	} 
	
	public function setQ2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q2 !== $v) {
			$this->q2 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q2;
		}

	} 
	
	public function setQ3($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q3 !== $v) {
			$this->q3 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q3;
		}

	} 
	
	public function setQ4($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q4 !== $v) {
			$this->q4 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q4;
		}

	} 
	
	public function setQ5($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q5 !== $v) {
			$this->q5 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q5;
		}

	} 
	
	public function setQ6($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q6 !== $v) {
			$this->q6 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q6;
		}

	} 
	
	public function setQ7($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q7 !== $v) {
			$this->q7 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q7;
		}

	} 
	
	public function setQ8($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->q8 !== $v) {
			$this->q8 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::Q8;
		}

	} 
	
	public function setS1($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->s1 !== $v) {
			$this->s1 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::S1;
		}

	} 
	
	public function setS2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->s2 !== $v) {
			$this->s2 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::S2;
		}

	} 
	
	public function setS3($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->s3 !== $v) {
			$this->s3 = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::S3;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::CREATED_BY;
		}

	} 
	
	public function setCreatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_on !== $ts) {
			$this->created_on = $ts;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::UPDATED_BY;
		}

	} 
	
	public function setUpdatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_on !== $ts) {
			$this->updated_on = $ts;
			$this->modifiedColumns[] = MlmMemberQuestionnairePeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->questionnaire_id = $rs->getInt($startcol + 0);

			$this->member_id = $rs->getInt($startcol + 1);

			$this->q1 = $rs->getString($startcol + 2);

			$this->q2 = $rs->getString($startcol + 3);

			$this->q3 = $rs->getString($startcol + 4);

			$this->q4 = $rs->getString($startcol + 5);

			$this->q5 = $rs->getString($startcol + 6);

			$this->q6 = $rs->getString($startcol + 7);

			$this->q7 = $rs->getString($startcol + 8);

			$this->q8 = $rs->getString($startcol + 9);

			$this->s1 = $rs->getString($startcol + 10);

			$this->s2 = $rs->getString($startcol + 11);

			$this->s3 = $rs->getString($startcol + 12);

			$this->status_code = $rs->getString($startcol + 13);

			$this->created_by = $rs->getInt($startcol + 14);

			$this->created_on = $rs->getTimestamp($startcol + 15, null);

			$this->updated_by = $rs->getInt($startcol + 16);

			$this->updated_on = $rs->getTimestamp($startcol + 17, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmMemberQuestionnaire object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMemberQuestionnairePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmMemberQuestionnairePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmMemberQuestionnairePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmMemberQuestionnairePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMemberQuestionnairePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MlmMemberQuestionnairePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setQuestionnaireId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmMemberQuestionnairePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = MlmMemberQuestionnairePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMemberQuestionnairePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getQuestionnaireId();
				break;
			case 1:
				return $this->getMemberId();
				break;
			case 2:
				return $this->getQ1();
				break;
			case 3:
				return $this->getQ2();
				break;
			case 4:
				return $this->getQ3();
				break;
			case 5:
				return $this->getQ4();
				break;
			case 6:
				return $this->getQ5();
				break;
			case 7:
				return $this->getQ6();
				break;
			case 8:
				return $this->getQ7();
				break;
			case 9:
				return $this->getQ8();
				break;
			case 10:
				return $this->getS1();
				break;
			case 11:
				return $this->getS2();
				break;
			case 12:
				return $this->getS3();
				break;
			case 13:
				return $this->getStatusCode();
				break;
			case 14:
				return $this->getCreatedBy();
				break;
			case 15:
				return $this->getCreatedOn();
				break;
			case 16:
				return $this->getUpdatedBy();
				break;
			case 17:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmMemberQuestionnairePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getQuestionnaireId(),
			$keys[1] => $this->getMemberId(),
			$keys[2] => $this->getQ1(),
			$keys[3] => $this->getQ2(),
			$keys[4] => $this->getQ3(),
			$keys[5] => $this->getQ4(),
			$keys[6] => $this->getQ5(),
			$keys[7] => $this->getQ6(),
			$keys[8] => $this->getQ7(),
			$keys[9] => $this->getQ8(),
			$keys[10] => $this->getS1(),
			$keys[11] => $this->getS2(),
			$keys[12] => $this->getS3(),
			$keys[13] => $this->getStatusCode(),
			$keys[14] => $this->getCreatedBy(),
			$keys[15] => $this->getCreatedOn(),
			$keys[16] => $this->getUpdatedBy(),
			$keys[17] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMemberQuestionnairePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setQuestionnaireId($value);
				break;
			case 1:
				$this->setMemberId($value);
				break;
			case 2:
				$this->setQ1($value);
				break;
			case 3:
				$this->setQ2($value);
				break;
			case 4:
				$this->setQ3($value);
				break;
			case 5:
				$this->setQ4($value);
				break;
			case 6:
				$this->setQ5($value);
				break;
			case 7:
				$this->setQ6($value);
				break;
			case 8:
				$this->setQ7($value);
				break;
			case 9:
				$this->setQ8($value);
				break;
			case 10:
				$this->setS1($value);
				break;
			case 11:
				$this->setS2($value);
				break;
			case 12:
				$this->setS3($value);
				break;
			case 13:
				$this->setStatusCode($value);
				break;
			case 14:
				$this->setCreatedBy($value);
				break;
			case 15:
				$this->setCreatedOn($value);
				break;
			case 16:
				$this->setUpdatedBy($value);
				break;
			case 17:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmMemberQuestionnairePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setQuestionnaireId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMemberId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setQ1($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setQ2($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setQ3($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQ4($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setQ5($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setQ6($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setQ7($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setQ8($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setS1($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setS2($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setS3($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatusCode($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedOn($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedOn($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmMemberQuestionnairePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID)) $criteria->add(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID, $this->questionnaire_id);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::MEMBER_ID)) $criteria->add(MlmMemberQuestionnairePeer::MEMBER_ID, $this->member_id);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q1)) $criteria->add(MlmMemberQuestionnairePeer::Q1, $this->q1);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q2)) $criteria->add(MlmMemberQuestionnairePeer::Q2, $this->q2);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q3)) $criteria->add(MlmMemberQuestionnairePeer::Q3, $this->q3);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q4)) $criteria->add(MlmMemberQuestionnairePeer::Q4, $this->q4);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q5)) $criteria->add(MlmMemberQuestionnairePeer::Q5, $this->q5);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q6)) $criteria->add(MlmMemberQuestionnairePeer::Q6, $this->q6);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q7)) $criteria->add(MlmMemberQuestionnairePeer::Q7, $this->q7);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::Q8)) $criteria->add(MlmMemberQuestionnairePeer::Q8, $this->q8);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::S1)) $criteria->add(MlmMemberQuestionnairePeer::S1, $this->s1);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::S2)) $criteria->add(MlmMemberQuestionnairePeer::S2, $this->s2);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::S3)) $criteria->add(MlmMemberQuestionnairePeer::S3, $this->s3);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::STATUS_CODE)) $criteria->add(MlmMemberQuestionnairePeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::CREATED_BY)) $criteria->add(MlmMemberQuestionnairePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::CREATED_ON)) $criteria->add(MlmMemberQuestionnairePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::UPDATED_BY)) $criteria->add(MlmMemberQuestionnairePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmMemberQuestionnairePeer::UPDATED_ON)) $criteria->add(MlmMemberQuestionnairePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmMemberQuestionnairePeer::DATABASE_NAME);

		$criteria->add(MlmMemberQuestionnairePeer::QUESTIONNAIRE_ID, $this->questionnaire_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getQuestionnaireId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setQuestionnaireId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setMemberId($this->member_id);

		$copyObj->setQ1($this->q1);

		$copyObj->setQ2($this->q2);

		$copyObj->setQ3($this->q3);

		$copyObj->setQ4($this->q4);

		$copyObj->setQ5($this->q5);

		$copyObj->setQ6($this->q6);

		$copyObj->setQ7($this->q7);

		$copyObj->setQ8($this->q8);

		$copyObj->setS1($this->s1);

		$copyObj->setS2($this->s2);

		$copyObj->setS3($this->s3);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setQuestionnaireId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MlmMemberQuestionnairePeer();
		}
		return self::$peer;
	}

} 