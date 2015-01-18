<?php


abstract class BaseGgMemberCwithdraw extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $amount = 0;


	
	protected $code;


	
	protected $payment_date;


	
	protected $payment_remark;


	
	protected $remark;


	
	protected $status;


	
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

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getCode()
	{

		return $this->code;
	}

	
	public function getPaymentDate($format = 'Y-m-d H:i:s')
	{

		if ($this->payment_date === null || $this->payment_date === '') {
			return null;
		} elseif (!is_int($this->payment_date)) {
						$ts = strtotime($this->payment_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [payment_date] as date/time value: " . var_export($this->payment_date, true));
			}
		} else {
			$ts = $this->payment_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPaymentRemark()
	{

		return $this->payment_remark;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getStatus()
	{

		return $this->status;
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

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::UID;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::AMOUNT;
		}

	} 
	
	public function setCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::CODE;
		}

	} 
	
	public function setPaymentDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [payment_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->payment_date !== $ts) {
			$this->payment_date = $ts;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::PAYMENT_DATE;
		}

	} 
	
	public function setPaymentRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_remark !== $v) {
			$this->payment_remark = $v;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::PAYMENT_REMARK;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::REMARK;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::STATUS;
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
			$this->modifiedColumns[] = GgMemberCwithdrawPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->amount = $rs->getFloat($startcol + 2);

			$this->code = $rs->getString($startcol + 3);

			$this->payment_date = $rs->getTimestamp($startcol + 4, null);

			$this->payment_remark = $rs->getString($startcol + 5);

			$this->remark = $rs->getString($startcol + 6);

			$this->status = $rs->getString($startcol + 7);

			$this->cdate = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMemberCwithdraw object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMemberCwithdrawPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMemberCwithdrawPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMemberCwithdrawPeer::DATABASE_NAME);
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
					$pk = GgMemberCwithdrawPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMemberCwithdrawPeer::doUpdate($this, $con);
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


			if (($retval = GgMemberCwithdrawPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCwithdrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAmount();
				break;
			case 3:
				return $this->getCode();
				break;
			case 4:
				return $this->getPaymentDate();
				break;
			case 5:
				return $this->getPaymentRemark();
				break;
			case 6:
				return $this->getRemark();
				break;
			case 7:
				return $this->getStatus();
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
		$keys = GgMemberCwithdrawPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getAmount(),
			$keys[3] => $this->getCode(),
			$keys[4] => $this->getPaymentDate(),
			$keys[5] => $this->getPaymentRemark(),
			$keys[6] => $this->getRemark(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCwithdrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAmount($value);
				break;
			case 3:
				$this->setCode($value);
				break;
			case 4:
				$this->setPaymentDate($value);
				break;
			case 5:
				$this->setPaymentRemark($value);
				break;
			case 6:
				$this->setRemark($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberCwithdrawPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAmount($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPaymentDate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPaymentRemark($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRemark($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCdate($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMemberCwithdrawPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMemberCwithdrawPeer::ID)) $criteria->add(GgMemberCwithdrawPeer::ID, $this->id);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::UID)) $criteria->add(GgMemberCwithdrawPeer::UID, $this->uid);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::AMOUNT)) $criteria->add(GgMemberCwithdrawPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::CODE)) $criteria->add(GgMemberCwithdrawPeer::CODE, $this->code);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::PAYMENT_DATE)) $criteria->add(GgMemberCwithdrawPeer::PAYMENT_DATE, $this->payment_date);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::PAYMENT_REMARK)) $criteria->add(GgMemberCwithdrawPeer::PAYMENT_REMARK, $this->payment_remark);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::REMARK)) $criteria->add(GgMemberCwithdrawPeer::REMARK, $this->remark);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::STATUS)) $criteria->add(GgMemberCwithdrawPeer::STATUS, $this->status);
		if ($this->isColumnModified(GgMemberCwithdrawPeer::CDATE)) $criteria->add(GgMemberCwithdrawPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMemberCwithdrawPeer::DATABASE_NAME);

		$criteria->add(GgMemberCwithdrawPeer::ID, $this->id);

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

		$copyObj->setAmount($this->amount);

		$copyObj->setCode($this->code);

		$copyObj->setPaymentDate($this->payment_date);

		$copyObj->setPaymentRemark($this->payment_remark);

		$copyObj->setRemark($this->remark);

		$copyObj->setStatus($this->status);

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
			self::$peer = new GgMemberCwithdrawPeer();
		}
		return self::$peer;
	}

} 