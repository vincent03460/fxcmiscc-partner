<?php


abstract class BaseGgMessaging extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $from_type;


	
	protected $from_uid = '0';


	
	protected $from_deleted;


	
	protected $to_type;


	
	protected $to_uid = '0';


	
	protected $to_read;


	
	protected $to_deleted;


	
	protected $subject;


	
	protected $message;


	
	protected $cdate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFromType()
	{

		return $this->from_type;
	}

	
	public function getFromUid()
	{

		return $this->from_uid;
	}

	
	public function getFromDeleted()
	{

		return $this->from_deleted;
	}

	
	public function getToType()
	{

		return $this->to_type;
	}

	
	public function getToUid()
	{

		return $this->to_uid;
	}

	
	public function getToRead()
	{

		return $this->to_read;
	}

	
	public function getToDeleted()
	{

		return $this->to_deleted;
	}

	
	public function getSubject()
	{

		return $this->subject;
	}

	
	public function getMessage()
	{

		return $this->message;
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
			$this->modifiedColumns[] = GgMessagingPeer::ID;
		}

	} 
	
	public function setFromType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->from_type !== $v) {
			$this->from_type = $v;
			$this->modifiedColumns[] = GgMessagingPeer::FROM_TYPE;
		}

	} 
	
	public function setFromUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->from_uid !== $v || $v === '0') {
			$this->from_uid = $v;
			$this->modifiedColumns[] = GgMessagingPeer::FROM_UID;
		}

	} 
	
	public function setFromDeleted($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->from_deleted !== $v) {
			$this->from_deleted = $v;
			$this->modifiedColumns[] = GgMessagingPeer::FROM_DELETED;
		}

	} 
	
	public function setToType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->to_type !== $v) {
			$this->to_type = $v;
			$this->modifiedColumns[] = GgMessagingPeer::TO_TYPE;
		}

	} 
	
	public function setToUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->to_uid !== $v || $v === '0') {
			$this->to_uid = $v;
			$this->modifiedColumns[] = GgMessagingPeer::TO_UID;
		}

	} 
	
	public function setToRead($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->to_read !== $v) {
			$this->to_read = $v;
			$this->modifiedColumns[] = GgMessagingPeer::TO_READ;
		}

	} 
	
	public function setToDeleted($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->to_deleted !== $v) {
			$this->to_deleted = $v;
			$this->modifiedColumns[] = GgMessagingPeer::TO_DELETED;
		}

	} 
	
	public function setSubject($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = GgMessagingPeer::SUBJECT;
		}

	} 
	
	public function setMessage($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->message !== $v) {
			$this->message = $v;
			$this->modifiedColumns[] = GgMessagingPeer::MESSAGE;
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
			$this->modifiedColumns[] = GgMessagingPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->from_type = $rs->getString($startcol + 1);

			$this->from_uid = $rs->getString($startcol + 2);

			$this->from_deleted = $rs->getString($startcol + 3);

			$this->to_type = $rs->getString($startcol + 4);

			$this->to_uid = $rs->getString($startcol + 5);

			$this->to_read = $rs->getString($startcol + 6);

			$this->to_deleted = $rs->getString($startcol + 7);

			$this->subject = $rs->getString($startcol + 8);

			$this->message = $rs->getString($startcol + 9);

			$this->cdate = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMessaging object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMessagingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMessagingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMessagingPeer::DATABASE_NAME);
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
					$pk = GgMessagingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMessagingPeer::doUpdate($this, $con);
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


			if (($retval = GgMessagingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMessagingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFromType();
				break;
			case 2:
				return $this->getFromUid();
				break;
			case 3:
				return $this->getFromDeleted();
				break;
			case 4:
				return $this->getToType();
				break;
			case 5:
				return $this->getToUid();
				break;
			case 6:
				return $this->getToRead();
				break;
			case 7:
				return $this->getToDeleted();
				break;
			case 8:
				return $this->getSubject();
				break;
			case 9:
				return $this->getMessage();
				break;
			case 10:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMessagingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFromType(),
			$keys[2] => $this->getFromUid(),
			$keys[3] => $this->getFromDeleted(),
			$keys[4] => $this->getToType(),
			$keys[5] => $this->getToUid(),
			$keys[6] => $this->getToRead(),
			$keys[7] => $this->getToDeleted(),
			$keys[8] => $this->getSubject(),
			$keys[9] => $this->getMessage(),
			$keys[10] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMessagingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFromType($value);
				break;
			case 2:
				$this->setFromUid($value);
				break;
			case 3:
				$this->setFromDeleted($value);
				break;
			case 4:
				$this->setToType($value);
				break;
			case 5:
				$this->setToUid($value);
				break;
			case 6:
				$this->setToRead($value);
				break;
			case 7:
				$this->setToDeleted($value);
				break;
			case 8:
				$this->setSubject($value);
				break;
			case 9:
				$this->setMessage($value);
				break;
			case 10:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMessagingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFromType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFromUid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFromDeleted($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setToType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setToUid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setToRead($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setToDeleted($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSubject($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMessage($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCdate($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMessagingPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMessagingPeer::ID)) $criteria->add(GgMessagingPeer::ID, $this->id);
		if ($this->isColumnModified(GgMessagingPeer::FROM_TYPE)) $criteria->add(GgMessagingPeer::FROM_TYPE, $this->from_type);
		if ($this->isColumnModified(GgMessagingPeer::FROM_UID)) $criteria->add(GgMessagingPeer::FROM_UID, $this->from_uid);
		if ($this->isColumnModified(GgMessagingPeer::FROM_DELETED)) $criteria->add(GgMessagingPeer::FROM_DELETED, $this->from_deleted);
		if ($this->isColumnModified(GgMessagingPeer::TO_TYPE)) $criteria->add(GgMessagingPeer::TO_TYPE, $this->to_type);
		if ($this->isColumnModified(GgMessagingPeer::TO_UID)) $criteria->add(GgMessagingPeer::TO_UID, $this->to_uid);
		if ($this->isColumnModified(GgMessagingPeer::TO_READ)) $criteria->add(GgMessagingPeer::TO_READ, $this->to_read);
		if ($this->isColumnModified(GgMessagingPeer::TO_DELETED)) $criteria->add(GgMessagingPeer::TO_DELETED, $this->to_deleted);
		if ($this->isColumnModified(GgMessagingPeer::SUBJECT)) $criteria->add(GgMessagingPeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(GgMessagingPeer::MESSAGE)) $criteria->add(GgMessagingPeer::MESSAGE, $this->message);
		if ($this->isColumnModified(GgMessagingPeer::CDATE)) $criteria->add(GgMessagingPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMessagingPeer::DATABASE_NAME);

		$criteria->add(GgMessagingPeer::ID, $this->id);

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

		$copyObj->setFromType($this->from_type);

		$copyObj->setFromUid($this->from_uid);

		$copyObj->setFromDeleted($this->from_deleted);

		$copyObj->setToType($this->to_type);

		$copyObj->setToUid($this->to_uid);

		$copyObj->setToRead($this->to_read);

		$copyObj->setToDeleted($this->to_deleted);

		$copyObj->setSubject($this->subject);

		$copyObj->setMessage($this->message);

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
			self::$peer = new GgMessagingPeer();
		}
		return self::$peer;
	}

} 