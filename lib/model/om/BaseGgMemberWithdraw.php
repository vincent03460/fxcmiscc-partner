<?php


abstract class BaseGgMemberWithdraw extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $amount = 0;


	
	protected $withdraw_amount = 0;


	
	protected $charges = 0;


	
	protected $rate = 0;


	
	protected $convert_amount = 0;


	
	protected $payment_type;


	
	protected $acc_name;


	
	protected $acc_payee_name;


	
	protected $acc_no;


	
	protected $payment_date;


	
	protected $payment_remark;


	
	protected $remark;


	
	protected $autowit;


	
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

	
	public function getWithdrawAmount()
	{

		return $this->withdraw_amount;
	}

	
	public function getCharges()
	{

		return $this->charges;
	}

	
	public function getRate()
	{

		return $this->rate;
	}

	
	public function getConvertAmount()
	{

		return $this->convert_amount;
	}

	
	public function getPaymentType()
	{

		return $this->payment_type;
	}

	
	public function getAccName()
	{

		return $this->acc_name;
	}

	
	public function getAccPayeeName()
	{

		return $this->acc_payee_name;
	}

	
	public function getAccNo()
	{

		return $this->acc_no;
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

	
	public function getAutowit()
	{

		return $this->autowit;
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
			$this->modifiedColumns[] = GgMemberWithdrawPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::UID;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::AMOUNT;
		}

	} 
	
	public function setWithdrawAmount($v)
	{

		if ($this->withdraw_amount !== $v || $v === 0) {
			$this->withdraw_amount = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::WITHDRAW_AMOUNT;
		}

	} 
	
	public function setCharges($v)
	{

		if ($this->charges !== $v || $v === 0) {
			$this->charges = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::CHARGES;
		}

	} 
	
	public function setRate($v)
	{

		if ($this->rate !== $v || $v === 0) {
			$this->rate = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::RATE;
		}

	} 
	
	public function setConvertAmount($v)
	{

		if ($this->convert_amount !== $v || $v === 0) {
			$this->convert_amount = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::CONVERT_AMOUNT;
		}

	} 
	
	public function setPaymentType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_type !== $v) {
			$this->payment_type = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::PAYMENT_TYPE;
		}

	} 
	
	public function setAccName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acc_name !== $v) {
			$this->acc_name = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::ACC_NAME;
		}

	} 
	
	public function setAccPayeeName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acc_payee_name !== $v) {
			$this->acc_payee_name = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::ACC_PAYEE_NAME;
		}

	} 
	
	public function setAccNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acc_no !== $v) {
			$this->acc_no = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::ACC_NO;
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
			$this->modifiedColumns[] = GgMemberWithdrawPeer::PAYMENT_DATE;
		}

	} 
	
	public function setPaymentRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_remark !== $v) {
			$this->payment_remark = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::PAYMENT_REMARK;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::REMARK;
		}

	} 
	
	public function setAutowit($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->autowit !== $v) {
			$this->autowit = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::AUTOWIT;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GgMemberWithdrawPeer::STATUS;
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
			$this->modifiedColumns[] = GgMemberWithdrawPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->amount = $rs->getFloat($startcol + 2);

			$this->withdraw_amount = $rs->getFloat($startcol + 3);

			$this->charges = $rs->getFloat($startcol + 4);

			$this->rate = $rs->getFloat($startcol + 5);

			$this->convert_amount = $rs->getFloat($startcol + 6);

			$this->payment_type = $rs->getString($startcol + 7);

			$this->acc_name = $rs->getString($startcol + 8);

			$this->acc_payee_name = $rs->getString($startcol + 9);

			$this->acc_no = $rs->getString($startcol + 10);

			$this->payment_date = $rs->getTimestamp($startcol + 11, null);

			$this->payment_remark = $rs->getString($startcol + 12);

			$this->remark = $rs->getString($startcol + 13);

			$this->autowit = $rs->getString($startcol + 14);

			$this->status = $rs->getString($startcol + 15);

			$this->cdate = $rs->getTimestamp($startcol + 16, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMemberWithdraw object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMemberWithdrawPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMemberWithdrawPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMemberWithdrawPeer::DATABASE_NAME);
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
					$pk = GgMemberWithdrawPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMemberWithdrawPeer::doUpdate($this, $con);
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


			if (($retval = GgMemberWithdrawPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberWithdrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getWithdrawAmount();
				break;
			case 4:
				return $this->getCharges();
				break;
			case 5:
				return $this->getRate();
				break;
			case 6:
				return $this->getConvertAmount();
				break;
			case 7:
				return $this->getPaymentType();
				break;
			case 8:
				return $this->getAccName();
				break;
			case 9:
				return $this->getAccPayeeName();
				break;
			case 10:
				return $this->getAccNo();
				break;
			case 11:
				return $this->getPaymentDate();
				break;
			case 12:
				return $this->getPaymentRemark();
				break;
			case 13:
				return $this->getRemark();
				break;
			case 14:
				return $this->getAutowit();
				break;
			case 15:
				return $this->getStatus();
				break;
			case 16:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberWithdrawPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getAmount(),
			$keys[3] => $this->getWithdrawAmount(),
			$keys[4] => $this->getCharges(),
			$keys[5] => $this->getRate(),
			$keys[6] => $this->getConvertAmount(),
			$keys[7] => $this->getPaymentType(),
			$keys[8] => $this->getAccName(),
			$keys[9] => $this->getAccPayeeName(),
			$keys[10] => $this->getAccNo(),
			$keys[11] => $this->getPaymentDate(),
			$keys[12] => $this->getPaymentRemark(),
			$keys[13] => $this->getRemark(),
			$keys[14] => $this->getAutowit(),
			$keys[15] => $this->getStatus(),
			$keys[16] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberWithdrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setWithdrawAmount($value);
				break;
			case 4:
				$this->setCharges($value);
				break;
			case 5:
				$this->setRate($value);
				break;
			case 6:
				$this->setConvertAmount($value);
				break;
			case 7:
				$this->setPaymentType($value);
				break;
			case 8:
				$this->setAccName($value);
				break;
			case 9:
				$this->setAccPayeeName($value);
				break;
			case 10:
				$this->setAccNo($value);
				break;
			case 11:
				$this->setPaymentDate($value);
				break;
			case 12:
				$this->setPaymentRemark($value);
				break;
			case 13:
				$this->setRemark($value);
				break;
			case 14:
				$this->setAutowit($value);
				break;
			case 15:
				$this->setStatus($value);
				break;
			case 16:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberWithdrawPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAmount($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setWithdrawAmount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCharges($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConvertAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPaymentType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAccName($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAccPayeeName($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAccNo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPaymentDate($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPaymentRemark($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRemark($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAutowit($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStatus($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCdate($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMemberWithdrawPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMemberWithdrawPeer::ID)) $criteria->add(GgMemberWithdrawPeer::ID, $this->id);
		if ($this->isColumnModified(GgMemberWithdrawPeer::UID)) $criteria->add(GgMemberWithdrawPeer::UID, $this->uid);
		if ($this->isColumnModified(GgMemberWithdrawPeer::AMOUNT)) $criteria->add(GgMemberWithdrawPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgMemberWithdrawPeer::WITHDRAW_AMOUNT)) $criteria->add(GgMemberWithdrawPeer::WITHDRAW_AMOUNT, $this->withdraw_amount);
		if ($this->isColumnModified(GgMemberWithdrawPeer::CHARGES)) $criteria->add(GgMemberWithdrawPeer::CHARGES, $this->charges);
		if ($this->isColumnModified(GgMemberWithdrawPeer::RATE)) $criteria->add(GgMemberWithdrawPeer::RATE, $this->rate);
		if ($this->isColumnModified(GgMemberWithdrawPeer::CONVERT_AMOUNT)) $criteria->add(GgMemberWithdrawPeer::CONVERT_AMOUNT, $this->convert_amount);
		if ($this->isColumnModified(GgMemberWithdrawPeer::PAYMENT_TYPE)) $criteria->add(GgMemberWithdrawPeer::PAYMENT_TYPE, $this->payment_type);
		if ($this->isColumnModified(GgMemberWithdrawPeer::ACC_NAME)) $criteria->add(GgMemberWithdrawPeer::ACC_NAME, $this->acc_name);
		if ($this->isColumnModified(GgMemberWithdrawPeer::ACC_PAYEE_NAME)) $criteria->add(GgMemberWithdrawPeer::ACC_PAYEE_NAME, $this->acc_payee_name);
		if ($this->isColumnModified(GgMemberWithdrawPeer::ACC_NO)) $criteria->add(GgMemberWithdrawPeer::ACC_NO, $this->acc_no);
		if ($this->isColumnModified(GgMemberWithdrawPeer::PAYMENT_DATE)) $criteria->add(GgMemberWithdrawPeer::PAYMENT_DATE, $this->payment_date);
		if ($this->isColumnModified(GgMemberWithdrawPeer::PAYMENT_REMARK)) $criteria->add(GgMemberWithdrawPeer::PAYMENT_REMARK, $this->payment_remark);
		if ($this->isColumnModified(GgMemberWithdrawPeer::REMARK)) $criteria->add(GgMemberWithdrawPeer::REMARK, $this->remark);
		if ($this->isColumnModified(GgMemberWithdrawPeer::AUTOWIT)) $criteria->add(GgMemberWithdrawPeer::AUTOWIT, $this->autowit);
		if ($this->isColumnModified(GgMemberWithdrawPeer::STATUS)) $criteria->add(GgMemberWithdrawPeer::STATUS, $this->status);
		if ($this->isColumnModified(GgMemberWithdrawPeer::CDATE)) $criteria->add(GgMemberWithdrawPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMemberWithdrawPeer::DATABASE_NAME);

		$criteria->add(GgMemberWithdrawPeer::ID, $this->id);

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

		$copyObj->setWithdrawAmount($this->withdraw_amount);

		$copyObj->setCharges($this->charges);

		$copyObj->setRate($this->rate);

		$copyObj->setConvertAmount($this->convert_amount);

		$copyObj->setPaymentType($this->payment_type);

		$copyObj->setAccName($this->acc_name);

		$copyObj->setAccPayeeName($this->acc_payee_name);

		$copyObj->setAccNo($this->acc_no);

		$copyObj->setPaymentDate($this->payment_date);

		$copyObj->setPaymentRemark($this->payment_remark);

		$copyObj->setRemark($this->remark);

		$copyObj->setAutowit($this->autowit);

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
			self::$peer = new GgMemberWithdrawPeer();
		}
		return self::$peer;
	}

} 