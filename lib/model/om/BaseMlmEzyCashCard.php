<?php


abstract class BaseMlmEzyCashCard extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $card_id;


	
	protected $dist_id;


	
	protected $account_id;


	
	protected $qty;


	
	protected $sub_total = 0;


	
	protected $status_code;


	
	protected $remark;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCardId()
	{

		return $this->card_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getAccountId()
	{

		return $this->account_id;
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

	
	public function setCardId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->card_id !== $v) {
			$this->card_id = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::CARD_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::DIST_ID;
		}

	} 
	
	public function setAccountId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::ACCOUNT_ID;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::QTY;
		}

	} 
	
	public function setSubTotal($v)
	{

		if ($this->sub_total !== $v || $v === 0) {
			$this->sub_total = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::SUB_TOTAL;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::STATUS_CODE;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::REMARK;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmEzyCashCardPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmEzyCashCardPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmEzyCashCardPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->card_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->account_id = $rs->getInt($startcol + 2);

			$this->qty = $rs->getInt($startcol + 3);

			$this->sub_total = $rs->getFloat($startcol + 4);

			$this->status_code = $rs->getString($startcol + 5);

			$this->remark = $rs->getString($startcol + 6);

			$this->created_by = $rs->getInt($startcol + 7);

			$this->created_on = $rs->getTimestamp($startcol + 8, null);

			$this->updated_by = $rs->getInt($startcol + 9);

			$this->updated_on = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmEzyCashCard object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmEzyCashCardPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmEzyCashCardPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmEzyCashCardPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmEzyCashCardPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmEzyCashCardPeer::DATABASE_NAME);
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
					$pk = MlmEzyCashCardPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setCardId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmEzyCashCardPeer::doUpdate($this, $con);
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


			if (($retval = MlmEzyCashCardPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmEzyCashCardPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCardId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getAccountId();
				break;
			case 3:
				return $this->getQty();
				break;
			case 4:
				return $this->getSubTotal();
				break;
			case 5:
				return $this->getStatusCode();
				break;
			case 6:
				return $this->getRemark();
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
		$keys = MlmEzyCashCardPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCardId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getAccountId(),
			$keys[3] => $this->getQty(),
			$keys[4] => $this->getSubTotal(),
			$keys[5] => $this->getStatusCode(),
			$keys[6] => $this->getRemark(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getCreatedOn(),
			$keys[9] => $this->getUpdatedBy(),
			$keys[10] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmEzyCashCardPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCardId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setAccountId($value);
				break;
			case 3:
				$this->setQty($value);
				break;
			case 4:
				$this->setSubTotal($value);
				break;
			case 5:
				$this->setStatusCode($value);
				break;
			case 6:
				$this->setRemark($value);
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
		$keys = MlmEzyCashCardPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCardId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAccountId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setQty($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSubTotal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatusCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRemark($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedOn($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedOn($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmEzyCashCardPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmEzyCashCardPeer::CARD_ID)) $criteria->add(MlmEzyCashCardPeer::CARD_ID, $this->card_id);
		if ($this->isColumnModified(MlmEzyCashCardPeer::DIST_ID)) $criteria->add(MlmEzyCashCardPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmEzyCashCardPeer::ACCOUNT_ID)) $criteria->add(MlmEzyCashCardPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(MlmEzyCashCardPeer::QTY)) $criteria->add(MlmEzyCashCardPeer::QTY, $this->qty);
		if ($this->isColumnModified(MlmEzyCashCardPeer::SUB_TOTAL)) $criteria->add(MlmEzyCashCardPeer::SUB_TOTAL, $this->sub_total);
		if ($this->isColumnModified(MlmEzyCashCardPeer::STATUS_CODE)) $criteria->add(MlmEzyCashCardPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmEzyCashCardPeer::REMARK)) $criteria->add(MlmEzyCashCardPeer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmEzyCashCardPeer::CREATED_BY)) $criteria->add(MlmEzyCashCardPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmEzyCashCardPeer::CREATED_ON)) $criteria->add(MlmEzyCashCardPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmEzyCashCardPeer::UPDATED_BY)) $criteria->add(MlmEzyCashCardPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmEzyCashCardPeer::UPDATED_ON)) $criteria->add(MlmEzyCashCardPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmEzyCashCardPeer::DATABASE_NAME);

		$criteria->add(MlmEzyCashCardPeer::CARD_ID, $this->card_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCardId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCardId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setAccountId($this->account_id);

		$copyObj->setQty($this->qty);

		$copyObj->setSubTotal($this->sub_total);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemark($this->remark);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setCardId(NULL); 
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
			self::$peer = new MlmEzyCashCardPeer();
		}
		return self::$peer;
	}

} 