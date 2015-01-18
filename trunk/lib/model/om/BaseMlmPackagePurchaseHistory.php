<?php


abstract class BaseMlmPackagePurchaseHistory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $purchase_id;


	
	protected $dist_id;


	
	protected $package_id;


	
	protected $mt4_user_name;


	
	protected $mt4_password;


	
	protected $amount = 0;


	
	protected $status_code;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPurchaseId()
	{

		return $this->purchase_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getPackageId()
	{

		return $this->package_id;
	}

	
	public function getMt4UserName()
	{

		return $this->mt4_user_name;
	}

	
	public function getMt4Password()
	{

		return $this->mt4_password;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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

	
	public function setPurchaseId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->purchase_id !== $v) {
			$this->purchase_id = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::PURCHASE_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::DIST_ID;
		}

	} 
	
	public function setPackageId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->package_id !== $v) {
			$this->package_id = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::PACKAGE_ID;
		}

	} 
	
	public function setMt4UserName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_user_name !== $v) {
			$this->mt4_user_name = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::MT4_USER_NAME;
		}

	} 
	
	public function setMt4Password($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_password !== $v) {
			$this->mt4_password = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::MT4_PASSWORD;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::AMOUNT;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::STATUS_CODE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePurchaseHistoryPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->purchase_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->package_id = $rs->getInt($startcol + 2);

			$this->mt4_user_name = $rs->getString($startcol + 3);

			$this->mt4_password = $rs->getString($startcol + 4);

			$this->amount = $rs->getFloat($startcol + 5);

			$this->status_code = $rs->getString($startcol + 6);

			$this->remarks = $rs->getString($startcol + 7);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->created_on = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackagePurchaseHistory object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePurchaseHistoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackagePurchaseHistoryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackagePurchaseHistoryPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackagePurchaseHistoryPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePurchaseHistoryPeer::DATABASE_NAME);
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
					$pk = MlmPackagePurchaseHistoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPurchaseId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmPackagePurchaseHistoryPeer::doUpdate($this, $con);
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


			if (($retval = MlmPackagePurchaseHistoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePurchaseHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPurchaseId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getPackageId();
				break;
			case 3:
				return $this->getMt4UserName();
				break;
			case 4:
				return $this->getMt4Password();
				break;
			case 5:
				return $this->getAmount();
				break;
			case 6:
				return $this->getStatusCode();
				break;
			case 7:
				return $this->getRemarks();
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
		$keys = MlmPackagePurchaseHistoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPurchaseId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getPackageId(),
			$keys[3] => $this->getMt4UserName(),
			$keys[4] => $this->getMt4Password(),
			$keys[5] => $this->getAmount(),
			$keys[6] => $this->getStatusCode(),
			$keys[7] => $this->getRemarks(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedBy(),
			$keys[11] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePurchaseHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPurchaseId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setPackageId($value);
				break;
			case 3:
				$this->setMt4UserName($value);
				break;
			case 4:
				$this->setMt4Password($value);
				break;
			case 5:
				$this->setAmount($value);
				break;
			case 6:
				$this->setStatusCode($value);
				break;
			case 7:
				$this->setRemarks($value);
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
		$keys = MlmPackagePurchaseHistoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPurchaseId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPackageId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMt4UserName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMt4Password($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatusCode($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRemarks($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackagePurchaseHistoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::PURCHASE_ID)) $criteria->add(MlmPackagePurchaseHistoryPeer::PURCHASE_ID, $this->purchase_id);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::DIST_ID)) $criteria->add(MlmPackagePurchaseHistoryPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::PACKAGE_ID)) $criteria->add(MlmPackagePurchaseHistoryPeer::PACKAGE_ID, $this->package_id);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::MT4_USER_NAME)) $criteria->add(MlmPackagePurchaseHistoryPeer::MT4_USER_NAME, $this->mt4_user_name);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::MT4_PASSWORD)) $criteria->add(MlmPackagePurchaseHistoryPeer::MT4_PASSWORD, $this->mt4_password);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::AMOUNT)) $criteria->add(MlmPackagePurchaseHistoryPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::STATUS_CODE)) $criteria->add(MlmPackagePurchaseHistoryPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::REMARKS)) $criteria->add(MlmPackagePurchaseHistoryPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::CREATED_BY)) $criteria->add(MlmPackagePurchaseHistoryPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::CREATED_ON)) $criteria->add(MlmPackagePurchaseHistoryPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::UPDATED_BY)) $criteria->add(MlmPackagePurchaseHistoryPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackagePurchaseHistoryPeer::UPDATED_ON)) $criteria->add(MlmPackagePurchaseHistoryPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackagePurchaseHistoryPeer::DATABASE_NAME);

		$criteria->add(MlmPackagePurchaseHistoryPeer::PURCHASE_ID, $this->purchase_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPurchaseId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPurchaseId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setPackageId($this->package_id);

		$copyObj->setMt4UserName($this->mt4_user_name);

		$copyObj->setMt4Password($this->mt4_password);

		$copyObj->setAmount($this->amount);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setPurchaseId(NULL); 
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
			self::$peer = new MlmPackagePurchaseHistoryPeer();
		}
		return self::$peer;
	}

} 