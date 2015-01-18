<?php


abstract class BaseImeRegistration extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ime_id;


	
	protected $full_name;


	
	protected $full_name_chinese;


	
	protected $distributor_code;


	
	protected $passport_number;


	
	protected $nationality;


	
	protected $mobile_no;


	
	protected $email;


	
	protected $dist_id;


	
	protected $account_id;


	
	protected $account_type;


	
	protected $qty;


	
	protected $sub_total = 0;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getImeId()
	{

		return $this->ime_id;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getFullNameChinese()
	{

		return $this->full_name_chinese;
	}

	
	public function getDistributorCode()
	{

		return $this->distributor_code;
	}

	
	public function getPassportNumber()
	{

		return $this->passport_number;
	}

	
	public function getNationality()
	{

		return $this->nationality;
	}

	
	public function getMobileNo()
	{

		return $this->mobile_no;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getAccountId()
	{

		return $this->account_id;
	}

	
	public function getAccountType()
	{

		return $this->account_type;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function getSubTotal()
	{

		return $this->sub_total;
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

	
	public function setImeId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ime_id !== $v) {
			$this->ime_id = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::IME_ID;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::FULL_NAME;
		}

	} 
	
	public function setFullNameChinese($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name_chinese !== $v) {
			$this->full_name_chinese = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::FULL_NAME_CHINESE;
		}

	} 
	
	public function setDistributorCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->distributor_code !== $v) {
			$this->distributor_code = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::DISTRIBUTOR_CODE;
		}

	} 
	
	public function setPassportNumber($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->passport_number !== $v) {
			$this->passport_number = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::PASSPORT_NUMBER;
		}

	} 
	
	public function setNationality($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nationality !== $v) {
			$this->nationality = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::NATIONALITY;
		}

	} 
	
	public function setMobileNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mobile_no !== $v) {
			$this->mobile_no = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::MOBILE_NO;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::EMAIL;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::DIST_ID;
		}

	} 
	
	public function setAccountId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::ACCOUNT_ID;
		}

	} 
	
	public function setAccountType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->account_type !== $v) {
			$this->account_type = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::ACCOUNT_TYPE;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::QTY;
		}

	} 
	
	public function setSubTotal($v)
	{

		if ($this->sub_total !== $v || $v === 0) {
			$this->sub_total = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::SUB_TOTAL;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ImeRegistrationPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ImeRegistrationPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = ImeRegistrationPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ime_id = $rs->getInt($startcol + 0);

			$this->full_name = $rs->getString($startcol + 1);

			$this->full_name_chinese = $rs->getString($startcol + 2);

			$this->distributor_code = $rs->getString($startcol + 3);

			$this->passport_number = $rs->getString($startcol + 4);

			$this->nationality = $rs->getString($startcol + 5);

			$this->mobile_no = $rs->getString($startcol + 6);

			$this->email = $rs->getString($startcol + 7);

			$this->dist_id = $rs->getInt($startcol + 8);

			$this->account_id = $rs->getInt($startcol + 9);

			$this->account_type = $rs->getString($startcol + 10);

			$this->qty = $rs->getInt($startcol + 11);

			$this->sub_total = $rs->getFloat($startcol + 12);

			$this->status_code = $rs->getString($startcol + 13);

			$this->created_by = $rs->getInt($startcol + 14);

			$this->created_on = $rs->getTimestamp($startcol + 15, null);

			$this->updated_by = $rs->getInt($startcol + 16);

			$this->updated_on = $rs->getTimestamp($startcol + 17, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ImeRegistration object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImeRegistrationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ImeRegistrationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ImeRegistrationPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ImeRegistrationPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImeRegistrationPeer::DATABASE_NAME);
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
					$pk = ImeRegistrationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setImeId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ImeRegistrationPeer::doUpdate($this, $con);
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


			if (($retval = ImeRegistrationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ImeRegistrationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getImeId();
				break;
			case 1:
				return $this->getFullName();
				break;
			case 2:
				return $this->getFullNameChinese();
				break;
			case 3:
				return $this->getDistributorCode();
				break;
			case 4:
				return $this->getPassportNumber();
				break;
			case 5:
				return $this->getNationality();
				break;
			case 6:
				return $this->getMobileNo();
				break;
			case 7:
				return $this->getEmail();
				break;
			case 8:
				return $this->getDistId();
				break;
			case 9:
				return $this->getAccountId();
				break;
			case 10:
				return $this->getAccountType();
				break;
			case 11:
				return $this->getQty();
				break;
			case 12:
				return $this->getSubTotal();
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
		$keys = ImeRegistrationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getImeId(),
			$keys[1] => $this->getFullName(),
			$keys[2] => $this->getFullNameChinese(),
			$keys[3] => $this->getDistributorCode(),
			$keys[4] => $this->getPassportNumber(),
			$keys[5] => $this->getNationality(),
			$keys[6] => $this->getMobileNo(),
			$keys[7] => $this->getEmail(),
			$keys[8] => $this->getDistId(),
			$keys[9] => $this->getAccountId(),
			$keys[10] => $this->getAccountType(),
			$keys[11] => $this->getQty(),
			$keys[12] => $this->getSubTotal(),
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
		$pos = ImeRegistrationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setImeId($value);
				break;
			case 1:
				$this->setFullName($value);
				break;
			case 2:
				$this->setFullNameChinese($value);
				break;
			case 3:
				$this->setDistributorCode($value);
				break;
			case 4:
				$this->setPassportNumber($value);
				break;
			case 5:
				$this->setNationality($value);
				break;
			case 6:
				$this->setMobileNo($value);
				break;
			case 7:
				$this->setEmail($value);
				break;
			case 8:
				$this->setDistId($value);
				break;
			case 9:
				$this->setAccountId($value);
				break;
			case 10:
				$this->setAccountType($value);
				break;
			case 11:
				$this->setQty($value);
				break;
			case 12:
				$this->setSubTotal($value);
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
		$keys = ImeRegistrationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setImeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFullName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFullNameChinese($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDistributorCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassportNumber($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNationality($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMobileNo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDistId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAccountId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAccountType($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setQty($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSubTotal($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatusCode($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedOn($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedOn($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ImeRegistrationPeer::DATABASE_NAME);

		if ($this->isColumnModified(ImeRegistrationPeer::IME_ID)) $criteria->add(ImeRegistrationPeer::IME_ID, $this->ime_id);
		if ($this->isColumnModified(ImeRegistrationPeer::FULL_NAME)) $criteria->add(ImeRegistrationPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(ImeRegistrationPeer::FULL_NAME_CHINESE)) $criteria->add(ImeRegistrationPeer::FULL_NAME_CHINESE, $this->full_name_chinese);
		if ($this->isColumnModified(ImeRegistrationPeer::DISTRIBUTOR_CODE)) $criteria->add(ImeRegistrationPeer::DISTRIBUTOR_CODE, $this->distributor_code);
		if ($this->isColumnModified(ImeRegistrationPeer::PASSPORT_NUMBER)) $criteria->add(ImeRegistrationPeer::PASSPORT_NUMBER, $this->passport_number);
		if ($this->isColumnModified(ImeRegistrationPeer::NATIONALITY)) $criteria->add(ImeRegistrationPeer::NATIONALITY, $this->nationality);
		if ($this->isColumnModified(ImeRegistrationPeer::MOBILE_NO)) $criteria->add(ImeRegistrationPeer::MOBILE_NO, $this->mobile_no);
		if ($this->isColumnModified(ImeRegistrationPeer::EMAIL)) $criteria->add(ImeRegistrationPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ImeRegistrationPeer::DIST_ID)) $criteria->add(ImeRegistrationPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(ImeRegistrationPeer::ACCOUNT_ID)) $criteria->add(ImeRegistrationPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(ImeRegistrationPeer::ACCOUNT_TYPE)) $criteria->add(ImeRegistrationPeer::ACCOUNT_TYPE, $this->account_type);
		if ($this->isColumnModified(ImeRegistrationPeer::QTY)) $criteria->add(ImeRegistrationPeer::QTY, $this->qty);
		if ($this->isColumnModified(ImeRegistrationPeer::SUB_TOTAL)) $criteria->add(ImeRegistrationPeer::SUB_TOTAL, $this->sub_total);
		if ($this->isColumnModified(ImeRegistrationPeer::STATUS_CODE)) $criteria->add(ImeRegistrationPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(ImeRegistrationPeer::CREATED_BY)) $criteria->add(ImeRegistrationPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ImeRegistrationPeer::CREATED_ON)) $criteria->add(ImeRegistrationPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(ImeRegistrationPeer::UPDATED_BY)) $criteria->add(ImeRegistrationPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ImeRegistrationPeer::UPDATED_ON)) $criteria->add(ImeRegistrationPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ImeRegistrationPeer::DATABASE_NAME);

		$criteria->add(ImeRegistrationPeer::IME_ID, $this->ime_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getImeId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setImeId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFullName($this->full_name);

		$copyObj->setFullNameChinese($this->full_name_chinese);

		$copyObj->setDistributorCode($this->distributor_code);

		$copyObj->setPassportNumber($this->passport_number);

		$copyObj->setNationality($this->nationality);

		$copyObj->setMobileNo($this->mobile_no);

		$copyObj->setEmail($this->email);

		$copyObj->setDistId($this->dist_id);

		$copyObj->setAccountId($this->account_id);

		$copyObj->setAccountType($this->account_type);

		$copyObj->setQty($this->qty);

		$copyObj->setSubTotal($this->sub_total);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setImeId(NULL); 
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
			self::$peer = new ImeRegistrationPeer();
		}
		return self::$peer;
	}

} 