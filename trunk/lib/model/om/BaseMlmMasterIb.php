<?php


abstract class BaseMlmMasterIb extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $master_ib_id;


	
	protected $master_ib_code;


	
	protected $user_id;


	
	protected $status_code;


	
	protected $master_ib_name;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMasterIbId()
	{

		return $this->master_ib_id;
	}

	
	public function getMasterIbCode()
	{

		return $this->master_ib_code;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getMasterIbName()
	{

		return $this->master_ib_name;
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

	
	public function setMasterIbId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->master_ib_id !== $v) {
			$this->master_ib_id = $v;
			$this->modifiedColumns[] = MlmMasterIbPeer::MASTER_IB_ID;
		}

	} 

	
	public function setMasterIbCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->master_ib_code !== $v) {
			$this->master_ib_code = $v;
			$this->modifiedColumns[] = MlmMasterIbPeer::MASTER_IB_CODE;
		}

	} 

	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = MlmMasterIbPeer::USER_ID;
		}

	} 

	
	public function setStatusCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmMasterIbPeer::STATUS_CODE;
		}

	} 

	
	public function setMasterIbName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->master_ib_name !== $v) {
			$this->master_ib_name = $v;
			$this->modifiedColumns[] = MlmMasterIbPeer::MASTER_IB_NAME;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmMasterIbPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmMasterIbPeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmMasterIbPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmMasterIbPeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->master_ib_id = $rs->getInt($startcol + 0);

			$this->master_ib_code = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->master_ib_name = $rs->getString($startcol + 4);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->created_on = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->updated_on = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmMasterIb object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMasterIbPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmMasterIbPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmMasterIbPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmMasterIbPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMasterIbPeer::DATABASE_NAME);
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
		$affectedRows = 0; 
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MlmMasterIbPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setMasterIbId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += MlmMasterIbPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 
			}

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


			if (($retval = MlmMasterIbPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMasterIbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMasterIbId();
				break;
			case 1:
				return $this->getMasterIbCode();
				break;
			case 2:
				return $this->getUserId();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getMasterIbName();
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
		$keys = MlmMasterIbPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMasterIbId(),
			$keys[1] => $this->getMasterIbCode(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getMasterIbName(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getCreatedOn(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMasterIbPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMasterIbId($value);
				break;
			case 1:
				$this->setMasterIbCode($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setMasterIbName($value);
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
		$keys = MlmMasterIbPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMasterIbId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMasterIbCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMasterIbName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedOn($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedOn($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmMasterIbPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmMasterIbPeer::MASTER_IB_ID)) $criteria->add(MlmMasterIbPeer::MASTER_IB_ID, $this->master_ib_id);
		if ($this->isColumnModified(MlmMasterIbPeer::MASTER_IB_CODE)) $criteria->add(MlmMasterIbPeer::MASTER_IB_CODE, $this->master_ib_code);
		if ($this->isColumnModified(MlmMasterIbPeer::USER_ID)) $criteria->add(MlmMasterIbPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(MlmMasterIbPeer::STATUS_CODE)) $criteria->add(MlmMasterIbPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmMasterIbPeer::MASTER_IB_NAME)) $criteria->add(MlmMasterIbPeer::MASTER_IB_NAME, $this->master_ib_name);
		if ($this->isColumnModified(MlmMasterIbPeer::CREATED_BY)) $criteria->add(MlmMasterIbPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmMasterIbPeer::CREATED_ON)) $criteria->add(MlmMasterIbPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmMasterIbPeer::UPDATED_BY)) $criteria->add(MlmMasterIbPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmMasterIbPeer::UPDATED_ON)) $criteria->add(MlmMasterIbPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmMasterIbPeer::DATABASE_NAME);

		$criteria->add(MlmMasterIbPeer::MASTER_IB_ID, $this->master_ib_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getMasterIbId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setMasterIbId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setMasterIbCode($this->master_ib_code);

		$copyObj->setUserId($this->user_id);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setMasterIbName($this->master_ib_name);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setMasterIbId(NULL); 

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
			self::$peer = new MlmMasterIbPeer();
		}
		return self::$peer;
	}

} 