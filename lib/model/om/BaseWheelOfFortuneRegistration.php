<?php


abstract class BaseWheelOfFortuneRegistration extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fortune_id;


	
	protected $full_name;


	
	protected $country;


	
	protected $mobile_no;


	
	protected $email;


	
	protected $qq;


	
	protected $referrer;


	
	protected $lucky_draw;


	
	protected $serial_no;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFortuneId()
	{

		return $this->fortune_id;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getMobileNo()
	{

		return $this->mobile_no;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getQq()
	{

		return $this->qq;
	}

	
	public function getReferrer()
	{

		return $this->referrer;
	}

	
	public function getLuckyDraw()
	{

		return $this->lucky_draw;
	}

	
	public function getSerialNo()
	{

		return $this->serial_no;
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

	
	public function setFortuneId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fortune_id !== $v) {
			$this->fortune_id = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::FORTUNE_ID;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::FULL_NAME;
		}

	} 
	
	public function setCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::COUNTRY;
		}

	} 
	
	public function setMobileNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mobile_no !== $v) {
			$this->mobile_no = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::MOBILE_NO;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::EMAIL;
		}

	} 
	
	public function setQq($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->qq !== $v) {
			$this->qq = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::QQ;
		}

	} 
	
	public function setReferrer($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->referrer !== $v) {
			$this->referrer = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::REFERRER;
		}

	} 
	
	public function setLuckyDraw($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->lucky_draw !== $v) {
			$this->lucky_draw = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::LUCKY_DRAW;
		}

	} 
	
	public function setSerialNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->serial_no !== $v) {
			$this->serial_no = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::SERIAL_NO;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::CREATED_BY;
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
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = WheelOfFortuneRegistrationPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fortune_id = $rs->getInt($startcol + 0);

			$this->full_name = $rs->getString($startcol + 1);

			$this->country = $rs->getString($startcol + 2);

			$this->mobile_no = $rs->getString($startcol + 3);

			$this->email = $rs->getString($startcol + 4);

			$this->qq = $rs->getString($startcol + 5);

			$this->referrer = $rs->getString($startcol + 6);

			$this->lucky_draw = $rs->getString($startcol + 7);

			$this->serial_no = $rs->getString($startcol + 8);

			$this->status_code = $rs->getString($startcol + 9);

			$this->created_by = $rs->getInt($startcol + 10);

			$this->created_on = $rs->getTimestamp($startcol + 11, null);

			$this->updated_by = $rs->getInt($startcol + 12);

			$this->updated_on = $rs->getTimestamp($startcol + 13, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating WheelOfFortuneRegistration object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WheelOfFortuneRegistrationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			WheelOfFortuneRegistrationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(WheelOfFortuneRegistrationPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(WheelOfFortuneRegistrationPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WheelOfFortuneRegistrationPeer::DATABASE_NAME);
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
					$pk = WheelOfFortuneRegistrationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setFortuneId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += WheelOfFortuneRegistrationPeer::doUpdate($this, $con);
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


			if (($retval = WheelOfFortuneRegistrationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = WheelOfFortuneRegistrationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFortuneId();
				break;
			case 1:
				return $this->getFullName();
				break;
			case 2:
				return $this->getCountry();
				break;
			case 3:
				return $this->getMobileNo();
				break;
			case 4:
				return $this->getEmail();
				break;
			case 5:
				return $this->getQq();
				break;
			case 6:
				return $this->getReferrer();
				break;
			case 7:
				return $this->getLuckyDraw();
				break;
			case 8:
				return $this->getSerialNo();
				break;
			case 9:
				return $this->getStatusCode();
				break;
			case 10:
				return $this->getCreatedBy();
				break;
			case 11:
				return $this->getCreatedOn();
				break;
			case 12:
				return $this->getUpdatedBy();
				break;
			case 13:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = WheelOfFortuneRegistrationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFortuneId(),
			$keys[1] => $this->getFullName(),
			$keys[2] => $this->getCountry(),
			$keys[3] => $this->getMobileNo(),
			$keys[4] => $this->getEmail(),
			$keys[5] => $this->getQq(),
			$keys[6] => $this->getReferrer(),
			$keys[7] => $this->getLuckyDraw(),
			$keys[8] => $this->getSerialNo(),
			$keys[9] => $this->getStatusCode(),
			$keys[10] => $this->getCreatedBy(),
			$keys[11] => $this->getCreatedOn(),
			$keys[12] => $this->getUpdatedBy(),
			$keys[13] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = WheelOfFortuneRegistrationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFortuneId($value);
				break;
			case 1:
				$this->setFullName($value);
				break;
			case 2:
				$this->setCountry($value);
				break;
			case 3:
				$this->setMobileNo($value);
				break;
			case 4:
				$this->setEmail($value);
				break;
			case 5:
				$this->setQq($value);
				break;
			case 6:
				$this->setReferrer($value);
				break;
			case 7:
				$this->setLuckyDraw($value);
				break;
			case 8:
				$this->setSerialNo($value);
				break;
			case 9:
				$this->setStatusCode($value);
				break;
			case 10:
				$this->setCreatedBy($value);
				break;
			case 11:
				$this->setCreatedOn($value);
				break;
			case 12:
				$this->setUpdatedBy($value);
				break;
			case 13:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = WheelOfFortuneRegistrationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFortuneId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFullName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCountry($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMobileNo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmail($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQq($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReferrer($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLuckyDraw($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSerialNo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStatusCode($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedOn($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedOn($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(WheelOfFortuneRegistrationPeer::DATABASE_NAME);

		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::FORTUNE_ID)) $criteria->add(WheelOfFortuneRegistrationPeer::FORTUNE_ID, $this->fortune_id);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::FULL_NAME)) $criteria->add(WheelOfFortuneRegistrationPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::COUNTRY)) $criteria->add(WheelOfFortuneRegistrationPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::MOBILE_NO)) $criteria->add(WheelOfFortuneRegistrationPeer::MOBILE_NO, $this->mobile_no);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::EMAIL)) $criteria->add(WheelOfFortuneRegistrationPeer::EMAIL, $this->email);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::QQ)) $criteria->add(WheelOfFortuneRegistrationPeer::QQ, $this->qq);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::REFERRER)) $criteria->add(WheelOfFortuneRegistrationPeer::REFERRER, $this->referrer);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::LUCKY_DRAW)) $criteria->add(WheelOfFortuneRegistrationPeer::LUCKY_DRAW, $this->lucky_draw);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::SERIAL_NO)) $criteria->add(WheelOfFortuneRegistrationPeer::SERIAL_NO, $this->serial_no);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::STATUS_CODE)) $criteria->add(WheelOfFortuneRegistrationPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::CREATED_BY)) $criteria->add(WheelOfFortuneRegistrationPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::CREATED_ON)) $criteria->add(WheelOfFortuneRegistrationPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::UPDATED_BY)) $criteria->add(WheelOfFortuneRegistrationPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(WheelOfFortuneRegistrationPeer::UPDATED_ON)) $criteria->add(WheelOfFortuneRegistrationPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(WheelOfFortuneRegistrationPeer::DATABASE_NAME);

		$criteria->add(WheelOfFortuneRegistrationPeer::FORTUNE_ID, $this->fortune_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getFortuneId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setFortuneId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFullName($this->full_name);

		$copyObj->setCountry($this->country);

		$copyObj->setMobileNo($this->mobile_no);

		$copyObj->setEmail($this->email);

		$copyObj->setQq($this->qq);

		$copyObj->setReferrer($this->referrer);

		$copyObj->setLuckyDraw($this->lucky_draw);

		$copyObj->setSerialNo($this->serial_no);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setFortuneId(NULL); 
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
			self::$peer = new WheelOfFortuneRegistrationPeer();
		}
		return self::$peer;
	}

} 