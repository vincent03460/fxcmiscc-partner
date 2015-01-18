<?php


abstract class BaseMlmDistEshare extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $eshare_id;


	
	protected $dist_id;


	
	protected $balance = 0;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEshareId()
	{

		return $this->eshare_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getBalance()
	{

		return $this->balance;
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

	
	public function setEshareId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->eshare_id !== $v) {
			$this->eshare_id = $v;
			$this->modifiedColumns[] = MlmDistEsharePeer::ESHARE_ID;
		}

	} 

	
	public function setDistId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDistEsharePeer::DIST_ID;
		}

	} 

	
	public function setBalance($v)
	{

		if ($this->balance !== $v || $v === 0) {
			$this->balance = $v;
			$this->modifiedColumns[] = MlmDistEsharePeer::BALANCE;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDistEsharePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDistEsharePeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDistEsharePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDistEsharePeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->eshare_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->balance = $rs->getFloat($startcol + 2);

			$this->created_by = $rs->getInt($startcol + 3);

			$this->created_on = $rs->getTimestamp($startcol + 4, null);

			$this->updated_by = $rs->getInt($startcol + 5);

			$this->updated_on = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDistEshare object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistEsharePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDistEsharePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDistEsharePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDistEsharePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistEsharePeer::DATABASE_NAME);
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
					$pk = MlmDistEsharePeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setEshareId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += MlmDistEsharePeer::doUpdate($this, $con);
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


			if (($retval = MlmDistEsharePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistEsharePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEshareId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getBalance();
				break;
			case 3:
				return $this->getCreatedBy();
				break;
			case 4:
				return $this->getCreatedOn();
				break;
			case 5:
				return $this->getUpdatedBy();
				break;
			case 6:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistEsharePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEshareId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getBalance(),
			$keys[3] => $this->getCreatedBy(),
			$keys[4] => $this->getCreatedOn(),
			$keys[5] => $this->getUpdatedBy(),
			$keys[6] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistEsharePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEshareId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setBalance($value);
				break;
			case 3:
				$this->setCreatedBy($value);
				break;
			case 4:
				$this->setCreatedOn($value);
				break;
			case 5:
				$this->setUpdatedBy($value);
				break;
			case 6:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistEsharePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEshareId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBalance($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedOn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedOn($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDistEsharePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDistEsharePeer::ESHARE_ID)) $criteria->add(MlmDistEsharePeer::ESHARE_ID, $this->eshare_id);
		if ($this->isColumnModified(MlmDistEsharePeer::DIST_ID)) $criteria->add(MlmDistEsharePeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDistEsharePeer::BALANCE)) $criteria->add(MlmDistEsharePeer::BALANCE, $this->balance);
		if ($this->isColumnModified(MlmDistEsharePeer::CREATED_BY)) $criteria->add(MlmDistEsharePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDistEsharePeer::CREATED_ON)) $criteria->add(MlmDistEsharePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDistEsharePeer::UPDATED_BY)) $criteria->add(MlmDistEsharePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDistEsharePeer::UPDATED_ON)) $criteria->add(MlmDistEsharePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDistEsharePeer::DATABASE_NAME);

		$criteria->add(MlmDistEsharePeer::ESHARE_ID, $this->eshare_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getEshareId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setEshareId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setBalance($this->balance);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setEshareId(NULL); 

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
			self::$peer = new MlmDistEsharePeer();
		}
		return self::$peer;
	}

} 