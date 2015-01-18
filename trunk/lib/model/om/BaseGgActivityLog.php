<?php


abstract class BaseGgActivityLog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $type;


	
	protected $initiator;


	
	protected $iid;


	
	protected $wid;


	
	protected $affected_user_type;


	
	protected $affected_uid;


	
	protected $pid;


	
	protected $slid;


	
	protected $code;


	
	protected $descr;


	
	protected $cdate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getInitiator()
	{

		return $this->initiator;
	}

	
	public function getIid()
	{

		return $this->iid;
	}

	
	public function getWid()
	{

		return $this->wid;
	}

	
	public function getAffectedUserType()
	{

		return $this->affected_user_type;
	}

	
	public function getAffectedUid()
	{

		return $this->affected_uid;
	}

	
	public function getPid()
	{

		return $this->pid;
	}

	
	public function getSlid()
	{

		return $this->slid;
	}

	
	public function getCode()
	{

		return $this->code;
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
			$this->modifiedColumns[] = GgActivityLogPeer::ID;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::TYPE;
		}

	} 
	
	public function setInitiator($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->initiator !== $v) {
			$this->initiator = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::INITIATOR;
		}

	} 
	
	public function setIid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->iid !== $v) {
			$this->iid = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::IID;
		}

	} 
	
	public function setWid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->wid !== $v) {
			$this->wid = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::WID;
		}

	} 
	
	public function setAffectedUserType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->affected_user_type !== $v) {
			$this->affected_user_type = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::AFFECTED_USER_TYPE;
		}

	} 
	
	public function setAffectedUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->affected_uid !== $v) {
			$this->affected_uid = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::AFFECTED_UID;
		}

	} 
	
	public function setPid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pid !== $v) {
			$this->pid = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::PID;
		}

	} 
	
	public function setSlid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slid !== $v) {
			$this->slid = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::SLID;
		}

	} 
	
	public function setCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::CODE;
		}

	} 
	
	public function setDescr($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descr !== $v) {
			$this->descr = $v;
			$this->modifiedColumns[] = GgActivityLogPeer::DESCR;
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
			$this->modifiedColumns[] = GgActivityLogPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->type = $rs->getString($startcol + 1);

			$this->initiator = $rs->getString($startcol + 2);

			$this->iid = $rs->getString($startcol + 3);

			$this->wid = $rs->getString($startcol + 4);

			$this->affected_user_type = $rs->getString($startcol + 5);

			$this->affected_uid = $rs->getString($startcol + 6);

			$this->pid = $rs->getString($startcol + 7);

			$this->slid = $rs->getString($startcol + 8);

			$this->code = $rs->getString($startcol + 9);

			$this->descr = $rs->getString($startcol + 10);

			$this->cdate = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgActivityLog object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgActivityLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgActivityLogPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgActivityLogPeer::DATABASE_NAME);
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
					$pk = GgActivityLogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgActivityLogPeer::doUpdate($this, $con);
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


			if (($retval = GgActivityLogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgActivityLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getType();
				break;
			case 2:
				return $this->getInitiator();
				break;
			case 3:
				return $this->getIid();
				break;
			case 4:
				return $this->getWid();
				break;
			case 5:
				return $this->getAffectedUserType();
				break;
			case 6:
				return $this->getAffectedUid();
				break;
			case 7:
				return $this->getPid();
				break;
			case 8:
				return $this->getSlid();
				break;
			case 9:
				return $this->getCode();
				break;
			case 10:
				return $this->getDescr();
				break;
			case 11:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgActivityLogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getType(),
			$keys[2] => $this->getInitiator(),
			$keys[3] => $this->getIid(),
			$keys[4] => $this->getWid(),
			$keys[5] => $this->getAffectedUserType(),
			$keys[6] => $this->getAffectedUid(),
			$keys[7] => $this->getPid(),
			$keys[8] => $this->getSlid(),
			$keys[9] => $this->getCode(),
			$keys[10] => $this->getDescr(),
			$keys[11] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgActivityLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setType($value);
				break;
			case 2:
				$this->setInitiator($value);
				break;
			case 3:
				$this->setIid($value);
				break;
			case 4:
				$this->setWid($value);
				break;
			case 5:
				$this->setAffectedUserType($value);
				break;
			case 6:
				$this->setAffectedUid($value);
				break;
			case 7:
				$this->setPid($value);
				break;
			case 8:
				$this->setSlid($value);
				break;
			case 9:
				$this->setCode($value);
				break;
			case 10:
				$this->setDescr($value);
				break;
			case 11:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgActivityLogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setInitiator($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setWid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAffectedUserType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAffectedUid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSlid($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCode($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDescr($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCdate($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgActivityLogPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgActivityLogPeer::ID)) $criteria->add(GgActivityLogPeer::ID, $this->id);
		if ($this->isColumnModified(GgActivityLogPeer::TYPE)) $criteria->add(GgActivityLogPeer::TYPE, $this->type);
		if ($this->isColumnModified(GgActivityLogPeer::INITIATOR)) $criteria->add(GgActivityLogPeer::INITIATOR, $this->initiator);
		if ($this->isColumnModified(GgActivityLogPeer::IID)) $criteria->add(GgActivityLogPeer::IID, $this->iid);
		if ($this->isColumnModified(GgActivityLogPeer::WID)) $criteria->add(GgActivityLogPeer::WID, $this->wid);
		if ($this->isColumnModified(GgActivityLogPeer::AFFECTED_USER_TYPE)) $criteria->add(GgActivityLogPeer::AFFECTED_USER_TYPE, $this->affected_user_type);
		if ($this->isColumnModified(GgActivityLogPeer::AFFECTED_UID)) $criteria->add(GgActivityLogPeer::AFFECTED_UID, $this->affected_uid);
		if ($this->isColumnModified(GgActivityLogPeer::PID)) $criteria->add(GgActivityLogPeer::PID, $this->pid);
		if ($this->isColumnModified(GgActivityLogPeer::SLID)) $criteria->add(GgActivityLogPeer::SLID, $this->slid);
		if ($this->isColumnModified(GgActivityLogPeer::CODE)) $criteria->add(GgActivityLogPeer::CODE, $this->code);
		if ($this->isColumnModified(GgActivityLogPeer::DESCR)) $criteria->add(GgActivityLogPeer::DESCR, $this->descr);
		if ($this->isColumnModified(GgActivityLogPeer::CDATE)) $criteria->add(GgActivityLogPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgActivityLogPeer::DATABASE_NAME);

		$criteria->add(GgActivityLogPeer::ID, $this->id);

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

		$copyObj->setType($this->type);

		$copyObj->setInitiator($this->initiator);

		$copyObj->setIid($this->iid);

		$copyObj->setWid($this->wid);

		$copyObj->setAffectedUserType($this->affected_user_type);

		$copyObj->setAffectedUid($this->affected_uid);

		$copyObj->setPid($this->pid);

		$copyObj->setSlid($this->slid);

		$copyObj->setCode($this->code);

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
			self::$peer = new GgActivityLogPeer();
		}
		return self::$peer;
	}

} 