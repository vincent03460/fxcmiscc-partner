<?php


abstract class BaseGgUpload extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $aid = '0';


	
	protected $uremark;


	
	protected $aremark;


	
	protected $filename;


	
	protected $status = 'pending';


	
	protected $cdate;


	
	protected $adate;

	
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

	
	public function getUremark()
	{

		return $this->uremark;
	}

	
	public function getAremark()
	{

		return $this->aremark;
	}

	
	public function getFilename()
	{

		return $this->filename;
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

	
	public function getAdate($format = 'Y-m-d H:i:s')
	{

		if ($this->adate === null || $this->adate === '') {
			return null;
		} elseif (!is_int($this->adate)) {
						$ts = strtotime($this->adate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [adate] as date/time value: " . var_export($this->adate, true));
			}
		} else {
			$ts = $this->adate;
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
			$this->modifiedColumns[] = GgUploadPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgUploadPeer::UID;
		}

	} 
	
	public function setAid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->aid !== $v || $v === '0') {
			$this->aid = $v;
			$this->modifiedColumns[] = GgUploadPeer::AID;
		}

	} 
	
	public function setUremark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uremark !== $v) {
			$this->uremark = $v;
			$this->modifiedColumns[] = GgUploadPeer::UREMARK;
		}

	} 
	
	public function setAremark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->aremark !== $v) {
			$this->aremark = $v;
			$this->modifiedColumns[] = GgUploadPeer::AREMARK;
		}

	} 
	
	public function setFilename($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->filename !== $v) {
			$this->filename = $v;
			$this->modifiedColumns[] = GgUploadPeer::FILENAME;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v || $v === 'pending') {
			$this->status = $v;
			$this->modifiedColumns[] = GgUploadPeer::STATUS;
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
			$this->modifiedColumns[] = GgUploadPeer::CDATE;
		}

	} 
	
	public function setAdate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [adate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->adate !== $ts) {
			$this->adate = $ts;
			$this->modifiedColumns[] = GgUploadPeer::ADATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->aid = $rs->getString($startcol + 2);

			$this->uremark = $rs->getString($startcol + 3);

			$this->aremark = $rs->getString($startcol + 4);

			$this->filename = $rs->getString($startcol + 5);

			$this->status = $rs->getString($startcol + 6);

			$this->cdate = $rs->getTimestamp($startcol + 7, null);

			$this->adate = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgUpload object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgUploadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgUploadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgUploadPeer::DATABASE_NAME);
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
					$pk = GgUploadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgUploadPeer::doUpdate($this, $con);
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


			if (($retval = GgUploadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgUploadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUremark();
				break;
			case 4:
				return $this->getAremark();
				break;
			case 5:
				return $this->getFilename();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getCdate();
				break;
			case 8:
				return $this->getAdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgUploadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getAid(),
			$keys[3] => $this->getUremark(),
			$keys[4] => $this->getAremark(),
			$keys[5] => $this->getFilename(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getCdate(),
			$keys[8] => $this->getAdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgUploadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUremark($value);
				break;
			case 4:
				$this->setAremark($value);
				break;
			case 5:
				$this->setFilename($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setCdate($value);
				break;
			case 8:
				$this->setAdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgUploadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUremark($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAremark($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFilename($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCdate($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAdate($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgUploadPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgUploadPeer::ID)) $criteria->add(GgUploadPeer::ID, $this->id);
		if ($this->isColumnModified(GgUploadPeer::UID)) $criteria->add(GgUploadPeer::UID, $this->uid);
		if ($this->isColumnModified(GgUploadPeer::AID)) $criteria->add(GgUploadPeer::AID, $this->aid);
		if ($this->isColumnModified(GgUploadPeer::UREMARK)) $criteria->add(GgUploadPeer::UREMARK, $this->uremark);
		if ($this->isColumnModified(GgUploadPeer::AREMARK)) $criteria->add(GgUploadPeer::AREMARK, $this->aremark);
		if ($this->isColumnModified(GgUploadPeer::FILENAME)) $criteria->add(GgUploadPeer::FILENAME, $this->filename);
		if ($this->isColumnModified(GgUploadPeer::STATUS)) $criteria->add(GgUploadPeer::STATUS, $this->status);
		if ($this->isColumnModified(GgUploadPeer::CDATE)) $criteria->add(GgUploadPeer::CDATE, $this->cdate);
		if ($this->isColumnModified(GgUploadPeer::ADATE)) $criteria->add(GgUploadPeer::ADATE, $this->adate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgUploadPeer::DATABASE_NAME);

		$criteria->add(GgUploadPeer::ID, $this->id);

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

		$copyObj->setUremark($this->uremark);

		$copyObj->setAremark($this->aremark);

		$copyObj->setFilename($this->filename);

		$copyObj->setStatus($this->status);

		$copyObj->setCdate($this->cdate);

		$copyObj->setAdate($this->adate);


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
			self::$peer = new GgUploadPeer();
		}
		return self::$peer;
	}

} 