<?php


abstract class BaseMlmProductPurchaseHistoryDetail extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $history_detail_id;


	
	protected $history_id;


	
	protected $product_id;


	
	protected $account_id;


	
	protected $price;


	
	protected $qty;


	
	protected $total_amount;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getHistoryDetailId()
	{

		return $this->history_detail_id;
	}

	
	public function getHistoryId()
	{

		return $this->history_id;
	}

	
	public function getProductId()
	{

		return $this->product_id;
	}

	
	public function getAccountId()
	{

		return $this->account_id;
	}

	
	public function getPrice()
	{

		return $this->price;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function getTotalAmount()
	{

		return $this->total_amount;
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

	
	public function setHistoryDetailId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->history_detail_id !== $v) {
			$this->history_detail_id = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID;
		}

	} 
	
	public function setHistoryId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->history_id !== $v) {
			$this->history_id = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::HISTORY_ID;
		}

	} 
	
	public function setProductId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->product_id !== $v) {
			$this->product_id = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::PRODUCT_ID;
		}

	} 
	
	public function setAccountId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::ACCOUNT_ID;
		}

	} 
	
	public function setPrice($v)
	{

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::PRICE;
		}

	} 
	
	public function setQty($v)
	{

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::QTY;
		}

	} 
	
	public function setTotalAmount($v)
	{

		if ($this->total_amount !== $v) {
			$this->total_amount = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::TOTAL_AMOUNT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmProductPurchaseHistoryDetailPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->history_detail_id = $rs->getInt($startcol + 0);

			$this->history_id = $rs->getInt($startcol + 1);

			$this->product_id = $rs->getInt($startcol + 2);

			$this->account_id = $rs->getInt($startcol + 3);

			$this->price = $rs->getFloat($startcol + 4);

			$this->qty = $rs->getFloat($startcol + 5);

			$this->total_amount = $rs->getFloat($startcol + 6);

			$this->created_by = $rs->getInt($startcol + 7);

			$this->created_on = $rs->getTimestamp($startcol + 8, null);

			$this->updated_by = $rs->getInt($startcol + 9);

			$this->updated_on = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmProductPurchaseHistoryDetail object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmProductPurchaseHistoryDetailPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME);
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
					$pk = MlmProductPurchaseHistoryDetailPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setHistoryDetailId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmProductPurchaseHistoryDetailPeer::doUpdate($this, $con);
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


			if (($retval = MlmProductPurchaseHistoryDetailPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmProductPurchaseHistoryDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getHistoryDetailId();
				break;
			case 1:
				return $this->getHistoryId();
				break;
			case 2:
				return $this->getProductId();
				break;
			case 3:
				return $this->getAccountId();
				break;
			case 4:
				return $this->getPrice();
				break;
			case 5:
				return $this->getQty();
				break;
			case 6:
				return $this->getTotalAmount();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getCreatedOn();
				break;
			case 9:
				return $this->getUpdatedBy();
				break;
			case 10:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmProductPurchaseHistoryDetailPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getHistoryDetailId(),
			$keys[1] => $this->getHistoryId(),
			$keys[2] => $this->getProductId(),
			$keys[3] => $this->getAccountId(),
			$keys[4] => $this->getPrice(),
			$keys[5] => $this->getQty(),
			$keys[6] => $this->getTotalAmount(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getCreatedOn(),
			$keys[9] => $this->getUpdatedBy(),
			$keys[10] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmProductPurchaseHistoryDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setHistoryDetailId($value);
				break;
			case 1:
				$this->setHistoryId($value);
				break;
			case 2:
				$this->setProductId($value);
				break;
			case 3:
				$this->setAccountId($value);
				break;
			case 4:
				$this->setPrice($value);
				break;
			case 5:
				$this->setQty($value);
				break;
			case 6:
				$this->setTotalAmount($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setCreatedOn($value);
				break;
			case 9:
				$this->setUpdatedBy($value);
				break;
			case 10:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmProductPurchaseHistoryDetailPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setHistoryDetailId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setHistoryId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProductId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAccountId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrice($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQty($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotalAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedOn($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedOn($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID, $this->history_detail_id);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::HISTORY_ID)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::HISTORY_ID, $this->history_id);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::PRODUCT_ID)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::PRODUCT_ID, $this->product_id);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::ACCOUNT_ID)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::PRICE)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::PRICE, $this->price);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::QTY)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::QTY, $this->qty);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::TOTAL_AMOUNT)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::TOTAL_AMOUNT, $this->total_amount);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::CREATED_BY)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::CREATED_ON)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::UPDATED_BY)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmProductPurchaseHistoryDetailPeer::UPDATED_ON)) $criteria->add(MlmProductPurchaseHistoryDetailPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmProductPurchaseHistoryDetailPeer::DATABASE_NAME);

		$criteria->add(MlmProductPurchaseHistoryDetailPeer::HISTORY_DETAIL_ID, $this->history_detail_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getHistoryDetailId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setHistoryDetailId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setHistoryId($this->history_id);

		$copyObj->setProductId($this->product_id);

		$copyObj->setAccountId($this->account_id);

		$copyObj->setPrice($this->price);

		$copyObj->setQty($this->qty);

		$copyObj->setTotalAmount($this->total_amount);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setHistoryDetailId(NULL); 
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
			self::$peer = new MlmProductPurchaseHistoryDetailPeer();
		}
		return self::$peer;
	}

} 