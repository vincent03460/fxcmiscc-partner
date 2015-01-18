<?php


abstract class BaseGgMemberSwalletRecord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $aid = '0';


	
	protected $type;


	
	protected $amount = 0;


	
	protected $bal;


	
	protected $descr;


	
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

	
	public function getAid()
	{

		return $this->aid;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getBal()
	{

		return $this->bal;
	}

	
	public function getDescr()
	{

		return $this->descr;
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
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::UID;
		}

	} 
	
	public function setAid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->aid !== $v || $v === '0') {
			$this->aid = $v;
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::AID;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::TYPE;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::AMOUNT;
		}

	} 
	
	public function setBal($v)
	{

		if ($this->bal !== $v) {
			$this->bal = $v;
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::BAL;
		}

	} 
	
	public function setDescr($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descr !== $v) {
			$this->descr = $v;
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::DESCR;
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
			$this->modifiedColumns[] = GgMemberSwalletRecordPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->aid = $rs->getString($startcol + 2);

			$this->type = $rs->getString($startcol + 3);

			$this->amount = $rs->getFloat($startcol + 4);

			$this->bal = $rs->getFloat($startcol + 5);

			$this->descr = $rs->getString($startcol + 6);

			$this->cdate = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMemberSwalletRecord object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMemberSwalletRecordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMemberSwalletRecordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMemberSwalletRecordPeer::DATABASE_NAME);
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
					$pk = GgMemberSwalletRecordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMemberSwalletRecordPeer::doUpdate($this, $con);
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


			if (($retval = GgMemberSwalletRecordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberSwalletRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAid();
				break;
			case 3:
				return $this->getType();
				break;
			case 4:
				return $this->getAmount();
				break;
			case 5:
				return $this->getBal();
				break;
			case 6:
				return $this->getDescr();
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
		$keys = GgMemberSwalletRecordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getAid(),
			$keys[3] => $this->getType(),
			$keys[4] => $this->getAmount(),
			$keys[5] => $this->getBal(),
			$keys[6] => $this->getDescr(),
			$keys[7] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberSwalletRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAid($value);
				break;
			case 3:
				$this->setType($value);
				break;
			case 4:
				$this->setAmount($value);
				break;
			case 5:
				$this->setBal($value);
				break;
			case 6:
				$this->setDescr($value);
				break;
			case 7:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberSwalletRecordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAmount($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescr($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCdate($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMemberSwalletRecordPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMemberSwalletRecordPeer::ID)) $criteria->add(GgMemberSwalletRecordPeer::ID, $this->id);
		if ($this->isColumnModified(GgMemberSwalletRecordPeer::UID)) $criteria->add(GgMemberSwalletRecordPeer::UID, $this->uid);
		if ($this->isColumnModified(GgMemberSwalletRecordPeer::AID)) $criteria->add(GgMemberSwalletRecordPeer::AID, $this->aid);
		if ($this->isColumnModified(GgMemberSwalletRecordPeer::TYPE)) $criteria->add(GgMemberSwalletRecordPeer::TYPE, $this->type);
		if ($this->isColumnModified(GgMemberSwalletRecordPeer::AMOUNT)) $criteria->add(GgMemberSwalletRecordPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgMemberSwalletRecordPeer::BAL)) $criteria->add(GgMemberSwalletRecordPeer::BAL, $this->bal);
		if ($this->isColumnModified(GgMemberSwalletRecordPeer::DESCR)) $criteria->add(GgMemberSwalletRecordPeer::DESCR, $this->descr);
		if ($this->isColumnModified(GgMemberSwalletRecordPeer::CDATE)) $criteria->add(GgMemberSwalletRecordPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMemberSwalletRecordPeer::DATABASE_NAME);

		$criteria->add(GgMemberSwalletRecordPeer::ID, $this->id);

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

		$copyObj->setAid($this->aid);

		$copyObj->setType($this->type);

		$copyObj->setAmount($this->amount);

		$copyObj->setBal($this->bal);

		$copyObj->setDescr($this->descr);

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
			self::$peer = new GgMemberSwalletRecordPeer();
		}
		return self::$peer;
	}

} 