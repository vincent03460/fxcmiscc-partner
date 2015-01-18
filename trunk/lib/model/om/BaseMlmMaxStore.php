<?php


abstract class BaseMlmMaxStore extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $store_id;


	
	protected $price = 0;


	
	protected $product_name;


	
	protected $status_code;


	
	protected $remark;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getStoreId()
	{

		return $this->store_id;
	}

	
	public function getPrice()
	{

		return $this->price;
	}

	
	public function getProductName()
	{

		return $this->product_name;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getRemark()
	{

		return $this->remark;
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

	
	public function setStoreId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->store_id !== $v) {
			$this->store_id = $v;
			$this->modifiedColumns[] = MlmMaxStorePeer::STORE_ID;
		}

	} 
	
	public function setPrice($v)
	{

		if ($this->price !== $v || $v === 0) {
			$this->price = $v;
			$this->modifiedColumns[] = MlmMaxStorePeer::PRICE;
		}

	} 
	
	public function setProductName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->product_name !== $v) {
			$this->product_name = $v;
			$this->modifiedColumns[] = MlmMaxStorePeer::PRODUCT_NAME;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmMaxStorePeer::STATUS_CODE;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmMaxStorePeer::REMARK;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmMaxStorePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmMaxStorePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmMaxStorePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmMaxStorePeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->store_id = $rs->getInt($startcol + 0);

			$this->price = $rs->getFloat($startcol + 1);

			$this->product_name = $rs->getString($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->remark = $rs->getString($startcol + 4);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->created_on = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->updated_on = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmMaxStore object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMaxStorePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmMaxStorePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmMaxStorePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmMaxStorePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMaxStorePeer::DATABASE_NAME);
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
					$pk = MlmMaxStorePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setStoreId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmMaxStorePeer::doUpdate($this, $con);
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


			if (($retval = MlmMaxStorePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMaxStorePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getStoreId();
				break;
			case 1:
				return $this->getPrice();
				break;
			case 2:
				return $this->getProductName();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getRemark();
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
		$keys = MlmMaxStorePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getStoreId(),
			$keys[1] => $this->getPrice(),
			$keys[2] => $this->getProductName(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getRemark(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getCreatedOn(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMaxStorePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setStoreId($value);
				break;
			case 1:
				$this->setPrice($value);
				break;
			case 2:
				$this->setProductName($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setRemark($value);
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
		$keys = MlmMaxStorePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setStoreId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPrice($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProductName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRemark($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedOn($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedOn($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmMaxStorePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmMaxStorePeer::STORE_ID)) $criteria->add(MlmMaxStorePeer::STORE_ID, $this->store_id);
		if ($this->isColumnModified(MlmMaxStorePeer::PRICE)) $criteria->add(MlmMaxStorePeer::PRICE, $this->price);
		if ($this->isColumnModified(MlmMaxStorePeer::PRODUCT_NAME)) $criteria->add(MlmMaxStorePeer::PRODUCT_NAME, $this->product_name);
		if ($this->isColumnModified(MlmMaxStorePeer::STATUS_CODE)) $criteria->add(MlmMaxStorePeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmMaxStorePeer::REMARK)) $criteria->add(MlmMaxStorePeer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmMaxStorePeer::CREATED_BY)) $criteria->add(MlmMaxStorePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmMaxStorePeer::CREATED_ON)) $criteria->add(MlmMaxStorePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmMaxStorePeer::UPDATED_BY)) $criteria->add(MlmMaxStorePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmMaxStorePeer::UPDATED_ON)) $criteria->add(MlmMaxStorePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmMaxStorePeer::DATABASE_NAME);

		$criteria->add(MlmMaxStorePeer::STORE_ID, $this->store_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getStoreId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setStoreId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setPrice($this->price);

		$copyObj->setProductName($this->product_name);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemark($this->remark);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setStoreId(NULL); 
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
			self::$peer = new MlmMaxStorePeer();
		}
		return self::$peer;
	}

} 