<?php


abstract class BaseGgShare extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = 0;


	
	protected $total_unit = 0;


	
	protected $buy_price = 0;


	
	protected $sell_price = 0;


	
	protected $buy_date;


	
	protected $sell_date;


	
	protected $trade_date;


	
	protected $replica = 0;


	
	protected $status = 0;


	
	protected $selling_datetime;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUid()
	{

		return $this->uid;
	}

	
	public function getTotalUnit()
	{

		return $this->total_unit;
	}

	
	public function getBuyPrice()
	{

		return $this->buy_price;
	}

	
	public function getSellPrice()
	{

		return $this->sell_price;
	}

	
	public function getBuyDate($format = 'Y-m-d H:i:s')
	{

		if ($this->buy_date === null || $this->buy_date === '') {
			return null;
		} elseif (!is_int($this->buy_date)) {
						$ts = strtotime($this->buy_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [buy_date] as date/time value: " . var_export($this->buy_date, true));
			}
		} else {
			$ts = $this->buy_date;
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

	
	public function getTradeDate($format = 'Y-m-d')
	{

		if ($this->trade_date === null || $this->trade_date === '') {
			return null;
		} elseif (!is_int($this->trade_date)) {
						$ts = strtotime($this->trade_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [trade_date] as date/time value: " . var_export($this->trade_date, true));
			}
		} else {
			$ts = $this->trade_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getReplica()
	{

		return $this->replica;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getSellingDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->selling_datetime === null || $this->selling_datetime === '') {
			return null;
		} elseif (!is_int($this->selling_datetime)) {
						$ts = strtotime($this->selling_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [selling_datetime] as date/time value: " . var_export($this->selling_datetime, true));
			}
		} else {
			$ts = $this->selling_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgSharePeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uid !== $v || $v === 0) {
			$this->uid = $v;
			$this->modifiedColumns[] = GgSharePeer::UID;
		}

	} 
	
	public function setTotalUnit($v)
	{

		if ($this->total_unit !== $v || $v === 0) {
			$this->total_unit = $v;
			$this->modifiedColumns[] = GgSharePeer::TOTAL_UNIT;
		}

	} 
	
	public function setBuyPrice($v)
	{

		if ($this->buy_price !== $v || $v === 0) {
			$this->buy_price = $v;
			$this->modifiedColumns[] = GgSharePeer::BUY_PRICE;
		}

	} 
	
	public function setSellPrice($v)
	{

		if ($this->sell_price !== $v || $v === 0) {
			$this->sell_price = $v;
			$this->modifiedColumns[] = GgSharePeer::SELL_PRICE;
		}

	} 
	
	public function setBuyDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [buy_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->buy_date !== $ts) {
			$this->buy_date = $ts;
			$this->modifiedColumns[] = GgSharePeer::BUY_DATE;
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
			$this->modifiedColumns[] = GgSharePeer::SELL_DATE;
		}

	} 
	
	public function setTradeDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [trade_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->trade_date !== $ts) {
			$this->trade_date = $ts;
			$this->modifiedColumns[] = GgSharePeer::TRADE_DATE;
		}

	} 
	
	public function setReplica($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->replica !== $v || $v === 0) {
			$this->replica = $v;
			$this->modifiedColumns[] = GgSharePeer::REPLICA;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v || $v === 0) {
			$this->status = $v;
			$this->modifiedColumns[] = GgSharePeer::STATUS;
		}

	} 
	
	public function setSellingDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [selling_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->selling_datetime !== $ts) {
			$this->selling_datetime = $ts;
			$this->modifiedColumns[] = GgSharePeer::SELLING_DATETIME;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uid = $rs->getInt($startcol + 1);

			$this->total_unit = $rs->getFloat($startcol + 2);

			$this->buy_price = $rs->getFloat($startcol + 3);

			$this->sell_price = $rs->getFloat($startcol + 4);

			$this->buy_date = $rs->getTimestamp($startcol + 5, null);

			$this->sell_date = $rs->getTimestamp($startcol + 6, null);

			$this->trade_date = $rs->getDate($startcol + 7, null);

			$this->replica = $rs->getInt($startcol + 8);

			$this->status = $rs->getInt($startcol + 9);

			$this->selling_datetime = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgShare object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgSharePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgSharePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgSharePeer::DATABASE_NAME);
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
					$pk = GgSharePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgSharePeer::doUpdate($this, $con);
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


			if (($retval = GgSharePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgSharePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUid();
				break;
			case 2:
				return $this->getTotalUnit();
				break;
			case 3:
				return $this->getBuyPrice();
				break;
			case 4:
				return $this->getSellPrice();
				break;
			case 5:
				return $this->getBuyDate();
				break;
			case 6:
				return $this->getSellDate();
				break;
			case 7:
				return $this->getTradeDate();
				break;
			case 8:
				return $this->getReplica();
				break;
			case 9:
				return $this->getStatus();
				break;
			case 10:
				return $this->getSellingDatetime();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgSharePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getTotalUnit(),
			$keys[3] => $this->getBuyPrice(),
			$keys[4] => $this->getSellPrice(),
			$keys[5] => $this->getBuyDate(),
			$keys[6] => $this->getSellDate(),
			$keys[7] => $this->getTradeDate(),
			$keys[8] => $this->getReplica(),
			$keys[9] => $this->getStatus(),
			$keys[10] => $this->getSellingDatetime(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgSharePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUid($value);
				break;
			case 2:
				$this->setTotalUnit($value);
				break;
			case 3:
				$this->setBuyPrice($value);
				break;
			case 4:
				$this->setSellPrice($value);
				break;
			case 5:
				$this->setBuyDate($value);
				break;
			case 6:
				$this->setSellDate($value);
				break;
			case 7:
				$this->setTradeDate($value);
				break;
			case 8:
				$this->setReplica($value);
				break;
			case 9:
				$this->setStatus($value);
				break;
			case 10:
				$this->setSellingDatetime($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgSharePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTotalUnit($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBuyPrice($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSellPrice($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBuyDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSellDate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTradeDate($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setReplica($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStatus($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSellingDatetime($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgSharePeer::DATABASE_NAME);

		if ($this->isColumnModified(GgSharePeer::ID)) $criteria->add(GgSharePeer::ID, $this->id);
		if ($this->isColumnModified(GgSharePeer::UID)) $criteria->add(GgSharePeer::UID, $this->uid);
		if ($this->isColumnModified(GgSharePeer::TOTAL_UNIT)) $criteria->add(GgSharePeer::TOTAL_UNIT, $this->total_unit);
		if ($this->isColumnModified(GgSharePeer::BUY_PRICE)) $criteria->add(GgSharePeer::BUY_PRICE, $this->buy_price);
		if ($this->isColumnModified(GgSharePeer::SELL_PRICE)) $criteria->add(GgSharePeer::SELL_PRICE, $this->sell_price);
		if ($this->isColumnModified(GgSharePeer::BUY_DATE)) $criteria->add(GgSharePeer::BUY_DATE, $this->buy_date);
		if ($this->isColumnModified(GgSharePeer::SELL_DATE)) $criteria->add(GgSharePeer::SELL_DATE, $this->sell_date);
		if ($this->isColumnModified(GgSharePeer::TRADE_DATE)) $criteria->add(GgSharePeer::TRADE_DATE, $this->trade_date);
		if ($this->isColumnModified(GgSharePeer::REPLICA)) $criteria->add(GgSharePeer::REPLICA, $this->replica);
		if ($this->isColumnModified(GgSharePeer::STATUS)) $criteria->add(GgSharePeer::STATUS, $this->status);
		if ($this->isColumnModified(GgSharePeer::SELLING_DATETIME)) $criteria->add(GgSharePeer::SELLING_DATETIME, $this->selling_datetime);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgSharePeer::DATABASE_NAME);

		$criteria->add(GgSharePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUid($this->uid);

		$copyObj->setTotalUnit($this->total_unit);

		$copyObj->setBuyPrice($this->buy_price);

		$copyObj->setSellPrice($this->sell_price);

		$copyObj->setBuyDate($this->buy_date);

		$copyObj->setSellDate($this->sell_date);

		$copyObj->setTradeDate($this->trade_date);

		$copyObj->setReplica($this->replica);

		$copyObj->setStatus($this->status);

		$copyObj->setSellingDatetime($this->selling_datetime);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
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
			self::$peer = new GgSharePeer();
		}
		return self::$peer;
	}

} 