<?php


abstract class BaseMlmPackageUpgradeHistory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $upgrade_id;


	
	protected $dist_id;


	
	protected $package_id;


	
	protected $mt4_user_name;


	
	protected $mt4_password;


	
	protected $transaction_code;


	
	protected $amount = 0;


	
	protected $status_code;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUpgradeId()
	{

		return $this->upgrade_id;
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

	
	public function getTransactionCode()
	{

		return $this->transaction_code;
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

	
	public function setUpgradeId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->upgrade_id !== $v) {
			$this->upgrade_id = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::UPGRADE_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::DIST_ID;
		}

	} 
	
	public function setPackageId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->package_id !== $v) {
			$this->package_id = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::PACKAGE_ID;
		}

	} 
	
	public function setMt4UserName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_user_name !== $v) {
			$this->mt4_user_name = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::MT4_USER_NAME;
		}

	} 
	
	public function setMt4Password($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_password !== $v) {
			$this->mt4_password = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::MT4_PASSWORD;
		}

	} 
	
	public function setTransactionCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_code !== $v) {
			$this->transaction_code = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::TRANSACTION_CODE;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::AMOUNT;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::STATUS_CODE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmPackageUpgradeHistoryPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->upgrade_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->package_id = $rs->getInt($startcol + 2);

			$this->mt4_user_name = $rs->getString($startcol + 3);

			$this->mt4_password = $rs->getString($startcol + 4);

			$this->transaction_code = $rs->getString($startcol + 5);

			$this->amount = $rs->getFloat($startcol + 6);

			$this->status_code = $rs->getString($startcol + 7);

			$this->remarks = $rs->getString($startcol + 8);

			$this->created_by = $rs->getInt($startcol + 9);

			$this->created_on = $rs->getTimestamp($startcol + 10, null);

			$this->updated_by = $rs->getInt($startcol + 11);

			$this->updated_on = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackageUpgradeHistory object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackageUpgradeHistoryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackageUpgradeHistoryPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackageUpgradeHistoryPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);
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
					$pk = MlmPackageUpgradeHistoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setUpgradeId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmPackageUpgradeHistoryPeer::doUpdate($this, $con);
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


			if (($retval = MlmPackageUpgradeHistoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackageUpgradeHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUpgradeId();
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
				return $this->getTransactionCode();
				break;
			case 6:
				return $this->getAmount();
				break;
			case 7:
				return $this->getStatusCode();
				break;
			case 8:
				return $this->getRemarks();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getCreatedOn();
				break;
			case 11:
				return $this->getUpdatedBy();
				break;
			case 12:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackageUpgradeHistoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUpgradeId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getPackageId(),
			$keys[3] => $this->getMt4UserName(),
			$keys[4] => $this->getMt4Password(),
			$keys[5] => $this->getTransactionCode(),
			$keys[6] => $this->getAmount(),
			$keys[7] => $this->getStatusCode(),
			$keys[8] => $this->getRemarks(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getCreatedOn(),
			$keys[11] => $this->getUpdatedBy(),
			$keys[12] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackageUpgradeHistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUpgradeId($value);
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
				$this->setTransactionCode($value);
				break;
			case 6:
				$this->setAmount($value);
				break;
			case 7:
				$this->setStatusCode($value);
				break;
			case 8:
				$this->setRemarks($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setCreatedOn($value);
				break;
			case 11:
				$this->setUpdatedBy($value);
				break;
			case 12:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackageUpgradeHistoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUpgradeId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPackageId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMt4UserName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMt4Password($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTransactionCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatusCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRemarks($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedOn($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedOn($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::UPGRADE_ID)) $criteria->add(MlmPackageUpgradeHistoryPeer::UPGRADE_ID, $this->upgrade_id);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::DIST_ID)) $criteria->add(MlmPackageUpgradeHistoryPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::PACKAGE_ID)) $criteria->add(MlmPackageUpgradeHistoryPeer::PACKAGE_ID, $this->package_id);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::MT4_USER_NAME)) $criteria->add(MlmPackageUpgradeHistoryPeer::MT4_USER_NAME, $this->mt4_user_name);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::MT4_PASSWORD)) $criteria->add(MlmPackageUpgradeHistoryPeer::MT4_PASSWORD, $this->mt4_password);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::TRANSACTION_CODE)) $criteria->add(MlmPackageUpgradeHistoryPeer::TRANSACTION_CODE, $this->transaction_code);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::AMOUNT)) $criteria->add(MlmPackageUpgradeHistoryPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::STATUS_CODE)) $criteria->add(MlmPackageUpgradeHistoryPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::REMARKS)) $criteria->add(MlmPackageUpgradeHistoryPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::CREATED_BY)) $criteria->add(MlmPackageUpgradeHistoryPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::CREATED_ON)) $criteria->add(MlmPackageUpgradeHistoryPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::UPDATED_BY)) $criteria->add(MlmPackageUpgradeHistoryPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackageUpgradeHistoryPeer::UPDATED_ON)) $criteria->add(MlmPackageUpgradeHistoryPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackageUpgradeHistoryPeer::DATABASE_NAME);

		$criteria->add(MlmPackageUpgradeHistoryPeer::UPGRADE_ID, $this->upgrade_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getUpgradeId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setUpgradeId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setPackageId($this->package_id);

		$copyObj->setMt4UserName($this->mt4_user_name);

		$copyObj->setMt4Password($this->mt4_password);

		$copyObj->setTransactionCode($this->transaction_code);

		$copyObj->setAmount($this->amount);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setUpgradeId(NULL); 
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
			self::$peer = new MlmPackageUpgradeHistoryPeer();
		}
		return self::$peer;
	}

} 