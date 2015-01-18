<?php


abstract class BaseGgShareTradingLedger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $trading_id = 0;


	
	protected $uid = 0;


	
	protected $buy_uid = 0;


	
	protected $sell_uid = 0;


	
	protected $price = 0;


	
	protected $qty = 0;


	
	protected $type;


	
	protected $cdate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTradingId()
	{

		return $this->trading_id;
	}

	
	public function getUid()
	{

		return $this->uid;
	}

	
	public function getBuyUid()
	{

		return $this->buy_uid;
	}

	
	public function getSellUid()
	{

		return $this->sell_uid;
	}

	
	public function getPrice()
	{

		return $this->price;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getCdate($format = 'Y-m-d H:i:s')
	{

		if ($this->cdate === null || $this->cdate === '') {
			return null;
		} elseif (!is_int($this->cdate)) {
						$ts = strtotime($this->cdate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [cdate] as date/time value: " . var_export($this->cdate, true));
			}
		} else {
			$ts = $this->cdate;
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
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::ID;
		}

	} 
	
	public function setTradingId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->trading_id !== $v || $v === 0) {
			$this->trading_id = $v;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::TRADING_ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uid !== $v || $v === 0) {
			$this->uid = $v;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::UID;
		}

	} 
	
	public function setBuyUid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->buy_uid !== $v || $v === 0) {
			$this->buy_uid = $v;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::BUY_UID;
		}

	} 
	
	public function setSellUid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sell_uid !== $v || $v === 0) {
			$this->sell_uid = $v;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::SELL_UID;
		}

	} 
	
	public function setPrice($v)
	{

		if ($this->price !== $v || $v === 0) {
			$this->price = $v;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::PRICE;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v || $v === 0) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::QTY;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::TYPE;
		}

	} 
	
	public function setCdate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [cdate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->cdate !== $ts) {
			$this->cdate = $ts;
			$this->modifiedColumns[] = GgShareTradingLedgerPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->trading_id = $rs->getInt($startcol + 1);

			$this->uid = $rs->getInt($startcol + 2);

			$this->buy_uid = $rs->getInt($startcol + 3);

			$this->sell_uid = $rs->getInt($startcol + 4);

			$this->price = $rs->getFloat($startcol + 5);

			$this->qty = $rs->getInt($startcol + 6);

			$this->type = $rs->getString($startcol + 7);

			$this->cdate = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgShareTradingLedger object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgShareTradingLedgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgShareTradingLedgerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgShareTradingLedgerPeer::DATABASE_NAME);
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
					$pk = GgShareTradingLedgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgShareTradingLedgerPeer::doUpdate($this, $con);
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


			if (($retval = GgShareTradingLedgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgShareTradingLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTradingId();
				break;
			case 2:
				return $this->getUid();
				break;
			case 3:
				return $this->getBuyUid();
				break;
			case 4:
				return $this->getSellUid();
				break;
			case 5:
				return $this->getPrice();
				break;
			case 6:
				return $this->getQty();
				break;
			case 7:
				return $this->getType();
				break;
			case 8:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgShareTradingLedgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTradingId(),
			$keys[2] => $this->getUid(),
			$keys[3] => $this->getBuyUid(),
			$keys[4] => $this->getSellUid(),
			$keys[5] => $this->getPrice(),
			$keys[6] => $this->getQty(),
			$keys[7] => $this->getType(),
			$keys[8] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgShareTradingLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTradingId($value);
				break;
			case 2:
				$this->setUid($value);
				break;
			case 3:
				$this->setBuyUid($value);
				break;
			case 4:
				$this->setSellUid($value);
				break;
			case 5:
				$this->setPrice($value);
				break;
			case 6:
				$this->setQty($value);
				break;
			case 7:
				$this->setType($value);
				break;
			case 8:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgShareTradingLedgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTradingId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBuyUid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSellUid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrice($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setQty($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCdate($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgShareTradingLedgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgShareTradingLedgerPeer::ID)) $criteria->add(GgShareTradingLedgerPeer::ID, $this->id);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::TRADING_ID)) $criteria->add(GgShareTradingLedgerPeer::TRADING_ID, $this->trading_id);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::UID)) $criteria->add(GgShareTradingLedgerPeer::UID, $this->uid);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::BUY_UID)) $criteria->add(GgShareTradingLedgerPeer::BUY_UID, $this->buy_uid);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::SELL_UID)) $criteria->add(GgShareTradingLedgerPeer::SELL_UID, $this->sell_uid);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::PRICE)) $criteria->add(GgShareTradingLedgerPeer::PRICE, $this->price);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::QTY)) $criteria->add(GgShareTradingLedgerPeer::QTY, $this->qty);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::TYPE)) $criteria->add(GgShareTradingLedgerPeer::TYPE, $this->type);
		if ($this->isColumnModified(GgShareTradingLedgerPeer::CDATE)) $criteria->add(GgShareTradingLedgerPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgShareTradingLedgerPeer::DATABASE_NAME);

		$criteria->add(GgShareTradingLedgerPeer::ID, $this->id);

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

		$copyObj->setTradingId($this->trading_id);

		$copyObj->setUid($this->uid);

		$copyObj->setBuyUid($this->buy_uid);

		$copyObj->setSellUid($this->sell_uid);

		$copyObj->setPrice($this->price);

		$copyObj->setQty($this->qty);

		$copyObj->setType($this->type);

		$copyObj->setCdate($this->cdate);


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
			self::$peer = new GgShareTradingLedgerPeer();
		}
		return self::$peer;
	}

} 