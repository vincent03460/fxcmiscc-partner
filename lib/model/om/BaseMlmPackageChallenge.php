<?php


abstract class BaseMlmPackageChallenge extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $challenge_id;


	
	protected $dist_id;


	
	protected $challenge_type;


	
	protected $date_from;


	
	protected $date_to;


	
	protected $total_sales = 0;


	
	protected $remark;


	
	protected $internal_remark;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getChallengeId()
	{

		return $this->challenge_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getChallengeType()
	{

		return $this->challenge_type;
	}

	
	public function getDateFrom($format = 'Y-m-d H:i:s')
	{

		if ($this->date_from === null || $this->date_from === '') {
			return null;
		} elseif (!is_int($this->date_from)) {
						$ts = strtotime($this->date_from);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_from] as date/time value: " . var_export($this->date_from, true));
			}
		} else {
			$ts = $this->date_from;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDateTo($format = 'Y-m-d H:i:s')
	{

		if ($this->date_to === null || $this->date_to === '') {
			return null;
		} elseif (!is_int($this->date_to)) {
						$ts = strtotime($this->date_to);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date_to] as date/time value: " . var_export($this->date_to, true));
			}
		} else {
			$ts = $this->date_to;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTotalSales()
	{

		return $this->total_sales;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getInternalRemark()
	{

		return $this->internal_remark;
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

	
	public function setChallengeId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->challenge_id !== $v) {
			$this->challenge_id = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::CHALLENGE_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::DIST_ID;
		}

	} 
	
	public function setChallengeType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->challenge_type !== $v) {
			$this->challenge_type = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::CHALLENGE_TYPE;
		}

	} 
	
	public function setDateFrom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_from] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_from !== $ts) {
			$this->date_from = $ts;
			$this->modifiedColumns[] = MlmPackageChallengePeer::DATE_FROM;
		}

	} 
	
	public function setDateTo($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date_to] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date_to !== $ts) {
			$this->date_to = $ts;
			$this->modifiedColumns[] = MlmPackageChallengePeer::DATE_TO;
		}

	} 
	
	public function setTotalSales($v)
	{

		if ($this->total_sales !== $v || $v === 0) {
			$this->total_sales = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::TOTAL_SALES;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::REMARK;
		}

	} 
	
	public function setInternalRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->internal_remark !== $v) {
			$this->internal_remark = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::INTERNAL_REMARK;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmPackageChallengePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackageChallengePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmPackageChallengePeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->challenge_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->challenge_type = $rs->getString($startcol + 2);

			$this->date_from = $rs->getTimestamp($startcol + 3, null);

			$this->date_to = $rs->getTimestamp($startcol + 4, null);

			$this->total_sales = $rs->getFloat($startcol + 5);

			$this->remark = $rs->getString($startcol + 6);

			$this->internal_remark = $rs->getString($startcol + 7);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->created_on = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackageChallenge object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackageChallengePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackageChallengePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackageChallengePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackageChallengePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackageChallengePeer::DATABASE_NAME);
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
					$pk = MlmPackageChallengePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setChallengeId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmPackageChallengePeer::doUpdate($this, $con);
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


			if (($retval = MlmPackageChallengePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackageChallengePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getChallengeId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getChallengeType();
				break;
			case 3:
				return $this->getDateFrom();
				break;
			case 4:
				return $this->getDateTo();
				break;
			case 5:
				return $this->getTotalSales();
				break;
			case 6:
				return $this->getRemark();
				break;
			case 7:
				return $this->getInternalRemark();
				break;
			case 8:
				return $this->getCreatedBy();
				break;
			case 9:
				return $this->getCreatedOn();
				break;
			case 10:
				return $this->getUpdatedBy();
				break;
			case 11:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackageChallengePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getChallengeId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getChallengeType(),
			$keys[3] => $this->getDateFrom(),
			$keys[4] => $this->getDateTo(),
			$keys[5] => $this->getTotalSales(),
			$keys[6] => $this->getRemark(),
			$keys[7] => $this->getInternalRemark(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedBy(),
			$keys[11] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackageChallengePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setChallengeId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setChallengeType($value);
				break;
			case 3:
				$this->setDateFrom($value);
				break;
			case 4:
				$this->setDateTo($value);
				break;
			case 5:
				$this->setTotalSales($value);
				break;
			case 6:
				$this->setRemark($value);
				break;
			case 7:
				$this->setInternalRemark($value);
				break;
			case 8:
				$this->setCreatedBy($value);
				break;
			case 9:
				$this->setCreatedOn($value);
				break;
			case 10:
				$this->setUpdatedBy($value);
				break;
			case 11:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackageChallengePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setChallengeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setChallengeType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDateFrom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDateTo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotalSales($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRemark($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setInternalRemark($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackageChallengePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackageChallengePeer::CHALLENGE_ID)) $criteria->add(MlmPackageChallengePeer::CHALLENGE_ID, $this->challenge_id);
		if ($this->isColumnModified(MlmPackageChallengePeer::DIST_ID)) $criteria->add(MlmPackageChallengePeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmPackageChallengePeer::CHALLENGE_TYPE)) $criteria->add(MlmPackageChallengePeer::CHALLENGE_TYPE, $this->challenge_type);
		if ($this->isColumnModified(MlmPackageChallengePeer::DATE_FROM)) $criteria->add(MlmPackageChallengePeer::DATE_FROM, $this->date_from);
		if ($this->isColumnModified(MlmPackageChallengePeer::DATE_TO)) $criteria->add(MlmPackageChallengePeer::DATE_TO, $this->date_to);
		if ($this->isColumnModified(MlmPackageChallengePeer::TOTAL_SALES)) $criteria->add(MlmPackageChallengePeer::TOTAL_SALES, $this->total_sales);
		if ($this->isColumnModified(MlmPackageChallengePeer::REMARK)) $criteria->add(MlmPackageChallengePeer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmPackageChallengePeer::INTERNAL_REMARK)) $criteria->add(MlmPackageChallengePeer::INTERNAL_REMARK, $this->internal_remark);
		if ($this->isColumnModified(MlmPackageChallengePeer::CREATED_BY)) $criteria->add(MlmPackageChallengePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackageChallengePeer::CREATED_ON)) $criteria->add(MlmPackageChallengePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackageChallengePeer::UPDATED_BY)) $criteria->add(MlmPackageChallengePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackageChallengePeer::UPDATED_ON)) $criteria->add(MlmPackageChallengePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackageChallengePeer::DATABASE_NAME);

		$criteria->add(MlmPackageChallengePeer::CHALLENGE_ID, $this->challenge_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getChallengeId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setChallengeId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setChallengeType($this->challenge_type);

		$copyObj->setDateFrom($this->date_from);

		$copyObj->setDateTo($this->date_to);

		$copyObj->setTotalSales($this->total_sales);

		$copyObj->setRemark($this->remark);

		$copyObj->setInternalRemark($this->internal_remark);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setChallengeId(NULL); 
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
			self::$peer = new MlmPackageChallengePeer();
		}
		return self::$peer;
	}

} 