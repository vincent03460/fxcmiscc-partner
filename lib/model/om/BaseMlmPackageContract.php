<?php


abstract class BaseMlmPackageContract extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $contract_id;


	
	protected $dist_id;


	
	protected $full_name;


	
	protected $username;


	
	protected $mt4_id;


	
	protected $dist_mt4_id;


	
	protected $package_price;


	
	protected $sign_date_day;


	
	protected $sign_date_month;


	
	protected $sign_date_year;


	
	protected $initial_signature;


	
	protected $remarks;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getContractId()
	{

		return $this->contract_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getMt4Id()
	{

		return $this->mt4_id;
	}

	
	public function getDistMt4Id()
	{

		return $this->dist_mt4_id;
	}

	
	public function getPackagePrice()
	{

		return $this->package_price;
	}

	
	public function getSignDateDay()
	{

		return $this->sign_date_day;
	}

	
	public function getSignDateMonth()
	{

		return $this->sign_date_month;
	}

	
	public function getSignDateYear()
	{

		return $this->sign_date_year;
	}

	
	public function getInitialSignature()
	{

		return $this->initial_signature;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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

	
	public function setContractId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->contract_id !== $v) {
			$this->contract_id = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::CONTRACT_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::DIST_ID;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::FULL_NAME;
		}

	} 
	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::USERNAME;
		}

	} 
	
	public function setMt4Id($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_id !== $v) {
			$this->mt4_id = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::MT4_ID;
		}

	} 
	
	public function setDistMt4Id($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_mt4_id !== $v) {
			$this->dist_mt4_id = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::DIST_MT4_ID;
		}

	} 
	
	public function setPackagePrice($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->package_price !== $v) {
			$this->package_price = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::PACKAGE_PRICE;
		}

	} 
	
	public function setSignDateDay($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sign_date_day !== $v) {
			$this->sign_date_day = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::SIGN_DATE_DAY;
		}

	} 
	
	public function setSignDateMonth($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sign_date_month !== $v) {
			$this->sign_date_month = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::SIGN_DATE_MONTH;
		}

	} 
	
	public function setSignDateYear($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sign_date_year !== $v) {
			$this->sign_date_year = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::SIGN_DATE_YEAR;
		}

	} 
	
	public function setInitialSignature($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->initial_signature !== $v) {
			$this->initial_signature = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::INITIAL_SIGNATURE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::REMARKS;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmPackageContractPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackageContractPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmPackageContractPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->contract_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->full_name = $rs->getString($startcol + 2);

			$this->username = $rs->getString($startcol + 3);

			$this->mt4_id = $rs->getString($startcol + 4);

			$this->dist_mt4_id = $rs->getInt($startcol + 5);

			$this->package_price = $rs->getString($startcol + 6);

			$this->sign_date_day = $rs->getString($startcol + 7);

			$this->sign_date_month = $rs->getString($startcol + 8);

			$this->sign_date_year = $rs->getString($startcol + 9);

			$this->initial_signature = $rs->getString($startcol + 10);

			$this->remarks = $rs->getString($startcol + 11);

			$this->status_code = $rs->getString($startcol + 12);

			$this->created_by = $rs->getInt($startcol + 13);

			$this->created_on = $rs->getTimestamp($startcol + 14, null);

			$this->updated_by = $rs->getInt($startcol + 15);

			$this->updated_on = $rs->getTimestamp($startcol + 16, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackageContract object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackageContractPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackageContractPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackageContractPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackageContractPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackageContractPeer::DATABASE_NAME);
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
					$pk = MlmPackageContractPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setContractId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmPackageContractPeer::doUpdate($this, $con);
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


			if (($retval = MlmPackageContractPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackageContractPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getContractId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getFullName();
				break;
			case 3:
				return $this->getUsername();
				break;
			case 4:
				return $this->getMt4Id();
				break;
			case 5:
				return $this->getDistMt4Id();
				break;
			case 6:
				return $this->getPackagePrice();
				break;
			case 7:
				return $this->getSignDateDay();
				break;
			case 8:
				return $this->getSignDateMonth();
				break;
			case 9:
				return $this->getSignDateYear();
				break;
			case 10:
				return $this->getInitialSignature();
				break;
			case 11:
				return $this->getRemarks();
				break;
			case 12:
				return $this->getStatusCode();
				break;
			case 13:
				return $this->getCreatedBy();
				break;
			case 14:
				return $this->getCreatedOn();
				break;
			case 15:
				return $this->getUpdatedBy();
				break;
			case 16:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackageContractPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getContractId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getFullName(),
			$keys[3] => $this->getUsername(),
			$keys[4] => $this->getMt4Id(),
			$keys[5] => $this->getDistMt4Id(),
			$keys[6] => $this->getPackagePrice(),
			$keys[7] => $this->getSignDateDay(),
			$keys[8] => $this->getSignDateMonth(),
			$keys[9] => $this->getSignDateYear(),
			$keys[10] => $this->getInitialSignature(),
			$keys[11] => $this->getRemarks(),
			$keys[12] => $this->getStatusCode(),
			$keys[13] => $this->getCreatedBy(),
			$keys[14] => $this->getCreatedOn(),
			$keys[15] => $this->getUpdatedBy(),
			$keys[16] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackageContractPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setContractId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setFullName($value);
				break;
			case 3:
				$this->setUsername($value);
				break;
			case 4:
				$this->setMt4Id($value);
				break;
			case 5:
				$this->setDistMt4Id($value);
				break;
			case 6:
				$this->setPackagePrice($value);
				break;
			case 7:
				$this->setSignDateDay($value);
				break;
			case 8:
				$this->setSignDateMonth($value);
				break;
			case 9:
				$this->setSignDateYear($value);
				break;
			case 10:
				$this->setInitialSignature($value);
				break;
			case 11:
				$this->setRemarks($value);
				break;
			case 12:
				$this->setStatusCode($value);
				break;
			case 13:
				$this->setCreatedBy($value);
				break;
			case 14:
				$this->setCreatedOn($value);
				break;
			case 15:
				$this->setUpdatedBy($value);
				break;
			case 16:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackageContractPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setContractId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFullName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUsername($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMt4Id($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDistMt4Id($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPackagePrice($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSignDateDay($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSignDateMonth($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSignDateYear($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setInitialSignature($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRemarks($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStatusCode($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedOn($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedBy($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedOn($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackageContractPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackageContractPeer::CONTRACT_ID)) $criteria->add(MlmPackageContractPeer::CONTRACT_ID, $this->contract_id);
		if ($this->isColumnModified(MlmPackageContractPeer::DIST_ID)) $criteria->add(MlmPackageContractPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmPackageContractPeer::FULL_NAME)) $criteria->add(MlmPackageContractPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(MlmPackageContractPeer::USERNAME)) $criteria->add(MlmPackageContractPeer::USERNAME, $this->username);
		if ($this->isColumnModified(MlmPackageContractPeer::MT4_ID)) $criteria->add(MlmPackageContractPeer::MT4_ID, $this->mt4_id);
		if ($this->isColumnModified(MlmPackageContractPeer::DIST_MT4_ID)) $criteria->add(MlmPackageContractPeer::DIST_MT4_ID, $this->dist_mt4_id);
		if ($this->isColumnModified(MlmPackageContractPeer::PACKAGE_PRICE)) $criteria->add(MlmPackageContractPeer::PACKAGE_PRICE, $this->package_price);
		if ($this->isColumnModified(MlmPackageContractPeer::SIGN_DATE_DAY)) $criteria->add(MlmPackageContractPeer::SIGN_DATE_DAY, $this->sign_date_day);
		if ($this->isColumnModified(MlmPackageContractPeer::SIGN_DATE_MONTH)) $criteria->add(MlmPackageContractPeer::SIGN_DATE_MONTH, $this->sign_date_month);
		if ($this->isColumnModified(MlmPackageContractPeer::SIGN_DATE_YEAR)) $criteria->add(MlmPackageContractPeer::SIGN_DATE_YEAR, $this->sign_date_year);
		if ($this->isColumnModified(MlmPackageContractPeer::INITIAL_SIGNATURE)) $criteria->add(MlmPackageContractPeer::INITIAL_SIGNATURE, $this->initial_signature);
		if ($this->isColumnModified(MlmPackageContractPeer::REMARKS)) $criteria->add(MlmPackageContractPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmPackageContractPeer::STATUS_CODE)) $criteria->add(MlmPackageContractPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmPackageContractPeer::CREATED_BY)) $criteria->add(MlmPackageContractPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackageContractPeer::CREATED_ON)) $criteria->add(MlmPackageContractPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackageContractPeer::UPDATED_BY)) $criteria->add(MlmPackageContractPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackageContractPeer::UPDATED_ON)) $criteria->add(MlmPackageContractPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackageContractPeer::DATABASE_NAME);

		$criteria->add(MlmPackageContractPeer::CONTRACT_ID, $this->contract_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getContractId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setContractId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setFullName($this->full_name);

		$copyObj->setUsername($this->username);

		$copyObj->setMt4Id($this->mt4_id);

		$copyObj->setDistMt4Id($this->dist_mt4_id);

		$copyObj->setPackagePrice($this->package_price);

		$copyObj->setSignDateDay($this->sign_date_day);

		$copyObj->setSignDateMonth($this->sign_date_month);

		$copyObj->setSignDateYear($this->sign_date_year);

		$copyObj->setInitialSignature($this->initial_signature);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setContractId(NULL); 
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
			self::$peer = new MlmPackageContractPeer();
		}
		return self::$peer;
	}

} 