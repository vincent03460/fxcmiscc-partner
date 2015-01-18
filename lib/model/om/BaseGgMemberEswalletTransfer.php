<?php


abstract class BaseGgMemberEswalletTransfer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $from_uid = '0';


	
	protected $to_uid = '0';


	
	protected $amount = 0;


	
	protected $remark;


	
	protected $cdate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFromUid()
	{

		return $this->from_uid;
	}

	
	public function getToUid()
	{

		return $this->to_uid;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getRemark()
	{

		return $this->remark;
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
			$this->modifiedColumns[] = GgMemberEswalletTransferPeer::ID;
		}

	} 
	
	public function setFromUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->from_uid !== $v || $v === '0') {
			$this->from_uid = $v;
			$this->modifiedColumns[] = GgMemberEswalletTransferPeer::FROM_UID;
		}

	} 
	
	public function setToUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->to_uid !== $v || $v === '0') {
			$this->to_uid = $v;
			$this->modifiedColumns[] = GgMemberEswalletTransferPeer::TO_UID;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgMemberEswalletTransferPeer::AMOUNT;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = GgMemberEswalletTransferPeer::REMARK;
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
			$this->modifiedColumns[] = GgMemberEswalletTransferPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->from_uid = $rs->getString($startcol + 1);

			$this->to_uid = $rs->getString($startcol + 2);

			$this->amount = $rs->getFloat($startcol + 3);

			$this->remark = $rs->getString($startcol + 4);

			$this->cdate = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMemberEswalletTransfer object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMemberEswalletTransferPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMemberEswalletTransferPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMemberEswalletTransferPeer::DATABASE_NAME);
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
					$pk = GgMemberEswalletTransferPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMemberEswalletTransferPeer::doUpdate($this, $con);
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


			if (($retval = GgMemberEswalletTransferPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberEswalletTransferPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFromUid();
				break;
			case 2:
				return $this->getToUid();
				break;
			case 3:
				return $this->getAmount();
				break;
			case 4:
				return $this->getRemark();
				break;
			case 5:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberEswalletTransferPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFromUid(),
			$keys[2] => $this->getToUid(),
			$keys[3] => $this->getAmount(),
			$keys[4] => $this->getRemark(),
			$keys[5] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberEswalletTransferPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFromUid($value);
				break;
			case 2:
				$this->setToUid($value);
				break;
			case 3:
				$this->setAmount($value);
				break;
			case 4:
				$this->setRemark($value);
				break;
			case 5:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberEswalletTransferPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFromUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setToUid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAmount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRemark($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCdate($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMemberEswalletTransferPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMemberEswalletTransferPeer::ID)) $criteria->add(GgMemberEswalletTransferPeer::ID, $this->id);
		if ($this->isColumnModified(GgMemberEswalletTransferPeer::FROM_UID)) $criteria->add(GgMemberEswalletTransferPeer::FROM_UID, $this->from_uid);
		if ($this->isColumnModified(GgMemberEswalletTransferPeer::TO_UID)) $criteria->add(GgMemberEswalletTransferPeer::TO_UID, $this->to_uid);
		if ($this->isColumnModified(GgMemberEswalletTransferPeer::AMOUNT)) $criteria->add(GgMemberEswalletTransferPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgMemberEswalletTransferPeer::REMARK)) $criteria->add(GgMemberEswalletTransferPeer::REMARK, $this->remark);
		if ($this->isColumnModified(GgMemberEswalletTransferPeer::CDATE)) $criteria->add(GgMemberEswalletTransferPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMemberEswalletTransferPeer::DATABASE_NAME);

		$criteria->add(GgMemberEswalletTransferPeer::ID, $this->id);

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

		$copyObj->setFromUid($this->from_uid);

		$copyObj->setToUid($this->to_uid);

		$copyObj->setAmount($this->amount);

		$copyObj->setRemark($this->remark);

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
			self::$peer = new GgMemberEswalletTransferPeer();
		}
		return self::$peer;
	}

} 