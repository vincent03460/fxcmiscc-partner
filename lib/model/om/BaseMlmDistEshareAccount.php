<?php


abstract class BaseMlmDistEshareAccount extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $eshare_id;


	
	protected $dist_id;


	
	protected $buy_price = 0;


	
	protected $credit;


	
	protected $sell_price = 0;


	
	protected $debit;


	
	protected $profit = 0;


	
	protected $share_balance;


	
	protected $remark;


	
	protected $valid_sell_date;


	
	protected $sell_date;


	
	protected $status_code;


	
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

	
	public function getBuyPrice()
	{

		return $this->buy_price;
	}

	
	public function getCredit()
	{

		return $this->credit;
	}

	
	public function getSellPrice()
	{

		return $this->sell_price;
	}

	
	public function getDebit()
	{

		return $this->debit;
	}

	
	public function getProfit()
	{

		return $this->profit;
	}

	
	public function getShareBalance()
	{

		return $this->share_balance;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getValidSellDate($format = 'Y-m-d H:i:s')
	{

		if ($this->valid_sell_date === null || $this->valid_sell_date === '') {
			return null;
		} elseif (!is_int($this->valid_sell_date)) {
						$ts = strtotime($this->valid_sell_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [valid_sell_date] as date/time value: " . var_export($this->valid_sell_date, true));
			}
		} else {
			$ts = $this->valid_sell_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getSellDate($format = 'Y-m-d H:i:s')
	{

		if ($this->sell_date === null || $this->sell_date === '') {
			return null;
		} elseif (!is_int($this->sell_date)) {
						$ts = strtotime($this->sell_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [sell_date] as date/time value: " . var_export($this->sell_date, true));
			}
		} else {
			$ts = $this->sell_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

	
	public function setEshareId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->eshare_id !== $v) {
			$this->eshare_id = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::ESHARE_ID;
		}

	} 

	
	public function setDistId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::DIST_ID;
		}

	} 

	
	public function setBuyPrice($v)
	{

		if ($this->buy_price !== $v || $v === 0) {
			$this->buy_price = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::BUY_PRICE;
		}

	} 

	
	public function setCredit($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->credit !== $v) {
			$this->credit = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::CREDIT;
		}

	} 

	
	public function setSellPrice($v)
	{

		if ($this->sell_price !== $v || $v === 0) {
			$this->sell_price = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::SELL_PRICE;
		}

	} 

	
	public function setDebit($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->debit !== $v) {
			$this->debit = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::DEBIT;
		}

	} 

	
	public function setProfit($v)
	{

		if ($this->profit !== $v || $v === 0) {
			$this->profit = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::PROFIT;
		}

	} 

	
	public function setShareBalance($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->share_balance !== $v) {
			$this->share_balance = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::SHARE_BALANCE;
		}

	} 

	
	public function setRemark($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::REMARK;
		}

	} 

	
	public function setValidSellDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [valid_sell_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->valid_sell_date !== $ts) {
			$this->valid_sell_date = $ts;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::VALID_SELL_DATE;
		}

	} 

	
	public function setSellDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [sell_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->sell_date !== $ts) {
			$this->sell_date = $ts;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::SELL_DATE;
		}

	} 

	
	public function setStatusCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::STATUS_CODE;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDistEshareAccountPeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->eshare_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->buy_price = $rs->getFloat($startcol + 2);

			$this->credit = $rs->getInt($startcol + 3);

			$this->sell_price = $rs->getFloat($startcol + 4);

			$this->debit = $rs->getInt($startcol + 5);

			$this->profit = $rs->getFloat($startcol + 6);

			$this->share_balance = $rs->getInt($startcol + 7);

			$this->remark = $rs->getString($startcol + 8);

			$this->valid_sell_date = $rs->getTimestamp($startcol + 9, null);

			$this->sell_date = $rs->getTimestamp($startcol + 10, null);

			$this->status_code = $rs->getString($startcol + 11);

			$this->created_by = $rs->getInt($startcol + 12);

			$this->created_on = $rs->getTimestamp($startcol + 13, null);

			$this->updated_by = $rs->getInt($startcol + 14);

			$this->updated_on = $rs->getTimestamp($startcol + 15, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDistEshareAccount object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistEshareAccountPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDistEshareAccountPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDistEshareAccountPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDistEshareAccountPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistEshareAccountPeer::DATABASE_NAME);
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
					$pk = MlmDistEshareAccountPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setEshareId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += MlmDistEshareAccountPeer::doUpdate($this, $con);
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


			if (($retval = MlmDistEshareAccountPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistEshareAccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getBuyPrice();
				break;
			case 3:
				return $this->getCredit();
				break;
			case 4:
				return $this->getSellPrice();
				break;
			case 5:
				return $this->getDebit();
				break;
			case 6:
				return $this->getProfit();
				break;
			case 7:
				return $this->getShareBalance();
				break;
			case 8:
				return $this->getRemark();
				break;
			case 9:
				return $this->getValidSellDate();
				break;
			case 10:
				return $this->getSellDate();
				break;
			case 11:
				return $this->getStatusCode();
				break;
			case 12:
				return $this->getCreatedBy();
				break;
			case 13:
				return $this->getCreatedOn();
				break;
			case 14:
				return $this->getUpdatedBy();
				break;
			case 15:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistEshareAccountPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEshareId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getBuyPrice(),
			$keys[3] => $this->getCredit(),
			$keys[4] => $this->getSellPrice(),
			$keys[5] => $this->getDebit(),
			$keys[6] => $this->getProfit(),
			$keys[7] => $this->getShareBalance(),
			$keys[8] => $this->getRemark(),
			$keys[9] => $this->getValidSellDate(),
			$keys[10] => $this->getSellDate(),
			$keys[11] => $this->getStatusCode(),
			$keys[12] => $this->getCreatedBy(),
			$keys[13] => $this->getCreatedOn(),
			$keys[14] => $this->getUpdatedBy(),
			$keys[15] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistEshareAccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setBuyPrice($value);
				break;
			case 3:
				$this->setCredit($value);
				break;
			case 4:
				$this->setSellPrice($value);
				break;
			case 5:
				$this->setDebit($value);
				break;
			case 6:
				$this->setProfit($value);
				break;
			case 7:
				$this->setShareBalance($value);
				break;
			case 8:
				$this->setRemark($value);
				break;
			case 9:
				$this->setValidSellDate($value);
				break;
			case 10:
				$this->setSellDate($value);
				break;
			case 11:
				$this->setStatusCode($value);
				break;
			case 12:
				$this->setCreatedBy($value);
				break;
			case 13:
				$this->setCreatedOn($value);
				break;
			case 14:
				$this->setUpdatedBy($value);
				break;
			case 15:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistEshareAccountPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEshareId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBuyPrice($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCredit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSellPrice($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDebit($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setProfit($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setShareBalance($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRemark($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setValidSellDate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSellDate($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatusCode($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedOn($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedOn($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDistEshareAccountPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDistEshareAccountPeer::ESHARE_ID)) $criteria->add(MlmDistEshareAccountPeer::ESHARE_ID, $this->eshare_id);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::DIST_ID)) $criteria->add(MlmDistEshareAccountPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::BUY_PRICE)) $criteria->add(MlmDistEshareAccountPeer::BUY_PRICE, $this->buy_price);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::CREDIT)) $criteria->add(MlmDistEshareAccountPeer::CREDIT, $this->credit);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::SELL_PRICE)) $criteria->add(MlmDistEshareAccountPeer::SELL_PRICE, $this->sell_price);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::DEBIT)) $criteria->add(MlmDistEshareAccountPeer::DEBIT, $this->debit);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::PROFIT)) $criteria->add(MlmDistEshareAccountPeer::PROFIT, $this->profit);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::SHARE_BALANCE)) $criteria->add(MlmDistEshareAccountPeer::SHARE_BALANCE, $this->share_balance);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::REMARK)) $criteria->add(MlmDistEshareAccountPeer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::VALID_SELL_DATE)) $criteria->add(MlmDistEshareAccountPeer::VALID_SELL_DATE, $this->valid_sell_date);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::SELL_DATE)) $criteria->add(MlmDistEshareAccountPeer::SELL_DATE, $this->sell_date);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::STATUS_CODE)) $criteria->add(MlmDistEshareAccountPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::CREATED_BY)) $criteria->add(MlmDistEshareAccountPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::CREATED_ON)) $criteria->add(MlmDistEshareAccountPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::UPDATED_BY)) $criteria->add(MlmDistEshareAccountPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDistEshareAccountPeer::UPDATED_ON)) $criteria->add(MlmDistEshareAccountPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDistEshareAccountPeer::DATABASE_NAME);

		$criteria->add(MlmDistEshareAccountPeer::ESHARE_ID, $this->eshare_id);

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

		$copyObj->setBuyPrice($this->buy_price);

		$copyObj->setCredit($this->credit);

		$copyObj->setSellPrice($this->sell_price);

		$copyObj->setDebit($this->debit);

		$copyObj->setProfit($this->profit);

		$copyObj->setShareBalance($this->share_balance);

		$copyObj->setRemark($this->remark);

		$copyObj->setValidSellDate($this->valid_sell_date);

		$copyObj->setSellDate($this->sell_date);

		$copyObj->setStatusCode($this->status_code);

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
			self::$peer = new MlmDistEshareAccountPeer();
		}
		return self::$peer;
	}

} 