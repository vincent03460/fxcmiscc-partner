<?php


abstract class BaseMlmDistPairing extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pairing_id;


	
	protected $dist_id;


	
	protected $left_balance = 0;


	
	protected $right_balance = 0;


	
	protected $flush_limit = 0;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPairingId()
	{

		return $this->pairing_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getLeftBalance()
	{

		return $this->left_balance;
	}

	
	public function getRightBalance()
	{

		return $this->right_balance;
	}

	
	public function getFlushLimit()
	{

		return $this->flush_limit;
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

	
	public function setPairingId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pairing_id !== $v) {
			$this->pairing_id = $v;
			$this->modifiedColumns[] = MlmDistPairingPeer::PAIRING_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDistPairingPeer::DIST_ID;
		}

	} 
	
	public function setLeftBalance($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->left_balance !== $v || $v === 0) {
			$this->left_balance = $v;
			$this->modifiedColumns[] = MlmDistPairingPeer::LEFT_BALANCE;
		}

	} 
	
	public function setRightBalance($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->right_balance !== $v || $v === 0) {
			$this->right_balance = $v;
			$this->modifiedColumns[] = MlmDistPairingPeer::RIGHT_BALANCE;
		}

	} 
	
	public function setFlushLimit($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->flush_limit !== $v || $v === 0) {
			$this->flush_limit = $v;
			$this->modifiedColumns[] = MlmDistPairingPeer::FLUSH_LIMIT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDistPairingPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDistPairingPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDistPairingPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDistPairingPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->pairing_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->left_balance = $rs->getInt($startcol + 2);

			$this->right_balance = $rs->getInt($startcol + 3);

			$this->flush_limit = $rs->getInt($startcol + 4);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->created_on = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->updated_on = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDistPairing object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistPairingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDistPairingPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDistPairingPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDistPairingPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistPairingPeer::DATABASE_NAME);
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
					$pk = MlmDistPairingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPairingId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDistPairingPeer::doUpdate($this, $con);
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


			if (($retval = MlmDistPairingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistPairingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPairingId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getLeftBalance();
				break;
			case 3:
				return $this->getRightBalance();
				break;
			case 4:
				return $this->getFlushLimit();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getCreatedOn();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			case 8:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistPairingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPairingId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getLeftBalance(),
			$keys[3] => $this->getRightBalance(),
			$keys[4] => $this->getFlushLimit(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getCreatedOn(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistPairingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPairingId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setLeftBalance($value);
				break;
			case 3:
				$this->setRightBalance($value);
				break;
			case 4:
				$this->setFlushLimit($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setCreatedOn($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
			case 8:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistPairingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPairingId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLeftBalance($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRightBalance($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFlushLimit($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedOn($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedOn($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDistPairingPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDistPairingPeer::PAIRING_ID)) $criteria->add(MlmDistPairingPeer::PAIRING_ID, $this->pairing_id);
		if ($this->isColumnModified(MlmDistPairingPeer::DIST_ID)) $criteria->add(MlmDistPairingPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDistPairingPeer::LEFT_BALANCE)) $criteria->add(MlmDistPairingPeer::LEFT_BALANCE, $this->left_balance);
		if ($this->isColumnModified(MlmDistPairingPeer::RIGHT_BALANCE)) $criteria->add(MlmDistPairingPeer::RIGHT_BALANCE, $this->right_balance);
		if ($this->isColumnModified(MlmDistPairingPeer::FLUSH_LIMIT)) $criteria->add(MlmDistPairingPeer::FLUSH_LIMIT, $this->flush_limit);
		if ($this->isColumnModified(MlmDistPairingPeer::CREATED_BY)) $criteria->add(MlmDistPairingPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDistPairingPeer::CREATED_ON)) $criteria->add(MlmDistPairingPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDistPairingPeer::UPDATED_BY)) $criteria->add(MlmDistPairingPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDistPairingPeer::UPDATED_ON)) $criteria->add(MlmDistPairingPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDistPairingPeer::DATABASE_NAME);

		$criteria->add(MlmDistPairingPeer::PAIRING_ID, $this->pairing_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPairingId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPairingId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setLeftBalance($this->left_balance);

		$copyObj->setRightBalance($this->right_balance);

		$copyObj->setFlushLimit($this->flush_limit);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setPairingId(NULL); 
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
			self::$peer = new MlmDistPairingPeer();
		}
		return self::$peer;
	}

} 