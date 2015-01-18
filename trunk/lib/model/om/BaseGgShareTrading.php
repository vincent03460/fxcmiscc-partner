<?php


abstract class BaseGgShareTrading extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = 0;


	
	protected $price = 0;


	
	protected $qty = 0;


	
	protected $match_qty = 0;


	
	protected $type;


	
	protected $payment_type;


	
	protected $cdate;

	
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

	
	public function getPrice()
	{

		return $this->price;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function getMatchQty()
	{

		return $this->match_qty;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getPaymentType()
	{

		return $this->payment_type;
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
			$this->modifiedColumns[] = GgShareTradingPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uid !== $v || $v === 0) {
			$this->uid = $v;
			$this->modifiedColumns[] = GgShareTradingPeer::UID;
		}

	} 
	
	public function setPrice($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->price !== $v || $v === 0) {
			$this->price = $v;
			$this->modifiedColumns[] = GgShareTradingPeer::PRICE;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v || $v === 0) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgShareTradingPeer::QTY;
		}

	} 
	
	public function setMatchQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->match_qty !== $v || $v === 0) {
			$this->match_qty = $v;
			$this->modifiedColumns[] = GgShareTradingPeer::MATCH_QTY;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = GgShareTradingPeer::TYPE;
		}

	} 
	
	public function setPaymentType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_type !== $v) {
			$this->payment_type = $v;
			$this->modifiedColumns[] = GgShareTradingPeer::PAYMENT_TYPE;
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
			$this->modifiedColumns[] = GgShareTradingPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->uid = $rs->getInt($startcol + 1);

			$this->price = $rs->getInt($startcol + 2);

			$this->qty = $rs->getInt($startcol + 3);

			$this->match_qty = $rs->getInt($startcol + 4);

			$this->type = $rs->getString($startcol + 5);

			$this->payment_type = $rs->getString($startcol + 6);

			$this->cdate = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgShareTrading object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgShareTradingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgShareTradingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgShareTradingPeer::DATABASE_NAME);
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
					$pk = GgShareTradingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgShareTradingPeer::doUpdate($this, $con);
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


			if (($retval = GgShareTradingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgShareTradingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPrice();
				break;
			case 3:
				return $this->getQty();
				break;
			case 4:
				return $this->getMatchQty();
				break;
			case 5:
				return $this->getType();
				break;
			case 6:
				return $this->getPaymentType();
				break;
			case 7:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgShareTradingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getPrice(),
			$keys[3] => $this->getQty(),
			$keys[4] => $this->getMatchQty(),
			$keys[5] => $this->getType(),
			$keys[6] => $this->getPaymentType(),
			$keys[7] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgShareTradingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPrice($value);
				break;
			case 3:
				$this->setQty($value);
				break;
			case 4:
				$this->setMatchQty($value);
				break;
			case 5:
				$this->setType($value);
				break;
			case 6:
				$this->setPaymentType($value);
				break;
			case 7:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgShareTradingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrice($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setQty($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMatchQty($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPaymentType($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCdate($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgShareTradingPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgShareTradingPeer::ID)) $criteria->add(GgShareTradingPeer::ID, $this->id);
		if ($this->isColumnModified(GgShareTradingPeer::UID)) $criteria->add(GgShareTradingPeer::UID, $this->uid);
		if ($this->isColumnModified(GgShareTradingPeer::PRICE)) $criteria->add(GgShareTradingPeer::PRICE, $this->price);
		if ($this->isColumnModified(GgShareTradingPeer::QTY)) $criteria->add(GgShareTradingPeer::QTY, $this->qty);
		if ($this->isColumnModified(GgShareTradingPeer::MATCH_QTY)) $criteria->add(GgShareTradingPeer::MATCH_QTY, $this->match_qty);
		if ($this->isColumnModified(GgShareTradingPeer::TYPE)) $criteria->add(GgShareTradingPeer::TYPE, $this->type);
		if ($this->isColumnModified(GgShareTradingPeer::PAYMENT_TYPE)) $criteria->add(GgShareTradingPeer::PAYMENT_TYPE, $this->payment_type);
		if ($this->isColumnModified(GgShareTradingPeer::CDATE)) $criteria->add(GgShareTradingPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgShareTradingPeer::DATABASE_NAME);

		$criteria->add(GgShareTradingPeer::ID, $this->id);

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

		$copyObj->setPrice($this->price);

		$copyObj->setQty($this->qty);

		$copyObj->setMatchQty($this->match_qty);

		$copyObj->setType($this->type);

		$copyObj->setPaymentType($this->payment_type);

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
			self::$peer = new GgShareTradingPeer();
		}
		return self::$peer;
	}

} 