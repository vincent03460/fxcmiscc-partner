<?php


abstract class BaseLegalWatch extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $watch_id;


	
	protected $dist_id;


	
	protected $full_name;


	
	protected $dist_code;


	
	protected $age;


	
	protected $educationlevel;


	
	protected $email;


	
	protected $contact;


	
	protected $message;


	
	protected $title;


	
	protected $file_name;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getWatchId()
	{

		return $this->watch_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getDistCode()
	{

		return $this->dist_code;
	}

	
	public function getAge()
	{

		return $this->age;
	}

	
	public function getEducationlevel()
	{

		return $this->educationlevel;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getContact()
	{

		return $this->contact;
	}

	
	public function getMessage()
	{

		return $this->message;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getFileName()
	{

		return $this->file_name;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getCreatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->created_on === null || $this->created_on === '') {
			return null;
		} elseif (!is_int($this->created_on)) {
						$ts = strtotime($this->created_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_on] as date/time value: " . var_export($this->created_on, true));
			}
		} else {
			$ts = $this->created_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function getUpdatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_on === null || $this->updated_on === '') {
			return null;
		} elseif (!is_int($this->updated_on)) {
						$ts = strtotime($this->updated_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_on] as date/time value: " . var_export($this->updated_on, true));
			}
		} else {
			$ts = $this->updated_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setWatchId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->watch_id !== $v) {
			$this->watch_id = $v;
			$this->modifiedColumns[] = LegalWatchPeer::WATCH_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = LegalWatchPeer::DIST_ID;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = LegalWatchPeer::FULL_NAME;
		}

	} 
	
	public function setDistCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dist_code !== $v) {
			$this->dist_code = $v;
			$this->modifiedColumns[] = LegalWatchPeer::DIST_CODE;
		}

	} 
	
	public function setAge($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->age !== $v) {
			$this->age = $v;
			$this->modifiedColumns[] = LegalWatchPeer::AGE;
		}

	} 
	
	public function setEducationlevel($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->educationlevel !== $v) {
			$this->educationlevel = $v;
			$this->modifiedColumns[] = LegalWatchPeer::EDUCATIONLEVEL;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = LegalWatchPeer::EMAIL;
		}

	} 
	
	public function setContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = LegalWatchPeer::CONTACT;
		}

	} 
	
	public function setMessage($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->message !== $v) {
			$this->message = $v;
			$this->modifiedColumns[] = LegalWatchPeer::MESSAGE;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = LegalWatchPeer::TITLE;
		}

	} 
	
	public function setFileName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_name !== $v) {
			$this->file_name = $v;
			$this->modifiedColumns[] = LegalWatchPeer::FILE_NAME;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = LegalWatchPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = LegalWatchPeer::CREATED_BY;
		}

	} 
	
	public function setCreatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_on !== $ts) {
			$this->created_on = $ts;
			$this->modifiedColumns[] = LegalWatchPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = LegalWatchPeer::UPDATED_BY;
		}

	} 
	
	public function setUpdatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_on !== $ts) {
			$this->updated_on = $ts;
			$this->modifiedColumns[] = LegalWatchPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->watch_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->full_name = $rs->getString($startcol + 2);

			$this->dist_code = $rs->getString($startcol + 3);

			$this->age = $rs->getString($startcol + 4);

			$this->educationlevel = $rs->getString($startcol + 5);

			$this->email = $rs->getString($startcol + 6);

			$this->contact = $rs->getString($startcol + 7);

			$this->message = $rs->getString($startcol + 8);

			$this->title = $rs->getString($startcol + 9);

			$this->file_name = $rs->getString($startcol + 10);

			$this->status_code = $rs->getString($startcol + 11);

			$this->created_by = $rs->getInt($startcol + 12);

			$this->created_on = $rs->getTimestamp($startcol + 13, null);

			$this->updated_by = $rs->getInt($startcol + 14);

			$this->updated_on = $rs->getTimestamp($startcol + 15, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating LegalWatch object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegalWatchPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LegalWatchPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(LegalWatchPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(LegalWatchPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LegalWatchPeer::DATABASE_NAME);
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
					$pk = LegalWatchPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setWatchId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LegalWatchPeer::doUpdate($this, $con);
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


			if (($retval = LegalWatchPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LegalWatchPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getWatchId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getFullName();
				break;
			case 3:
				return $this->getDistCode();
				break;
			case 4:
				return $this->getAge();
				break;
			case 5:
				return $this->getEducationlevel();
				break;
			case 6:
				return $this->getEmail();
				break;
			case 7:
				return $this->getContact();
				break;
			case 8:
				return $this->getMessage();
				break;
			case 9:
				return $this->getTitle();
				break;
			case 10:
				return $this->getFileName();
				break;
			case 11:
				return $this->getStatusCode();
				break;
			case 12:
				return $this->getCreatedBy();
				break;
			case 13:
				return $this->getCreatedOn();
				break;
			case 14:
				return $this->getUpdatedBy();
				break;
			case 15:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegalWatchPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getWatchId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getFullName(),
			$keys[3] => $this->getDistCode(),
			$keys[4] => $this->getAge(),
			$keys[5] => $this->getEducationlevel(),
			$keys[6] => $this->getEmail(),
			$keys[7] => $this->getContact(),
			$keys[8] => $this->getMessage(),
			$keys[9] => $this->getTitle(),
			$keys[10] => $this->getFileName(),
			$keys[11] => $this->getStatusCode(),
			$keys[12] => $this->getCreatedBy(),
			$keys[13] => $this->getCreatedOn(),
			$keys[14] => $this->getUpdatedBy(),
			$keys[15] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LegalWatchPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setWatchId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setFullName($value);
				break;
			case 3:
				$this->setDistCode($value);
				break;
			case 4:
				$this->setAge($value);
				break;
			case 5:
				$this->setEducationlevel($value);
				break;
			case 6:
				$this->setEmail($value);
				break;
			case 7:
				$this->setContact($value);
				break;
			case 8:
				$this->setMessage($value);
				break;
			case 9:
				$this->setTitle($value);
				break;
			case 10:
				$this->setFileName($value);
				break;
			case 11:
				$this->setStatusCode($value);
				break;
			case 12:
				$this->setCreatedBy($value);
				break;
			case 13:
				$this->setCreatedOn($value);
				break;
			case 14:
				$this->setUpdatedBy($value);
				break;
			case 15:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LegalWatchPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setWatchId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFullName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDistCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAge($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEducationlevel($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmail($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setContact($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMessage($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTitle($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFileName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatusCode($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedOn($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedOn($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LegalWatchPeer::DATABASE_NAME);

		if ($this->isColumnModified(LegalWatchPeer::WATCH_ID)) $criteria->add(LegalWatchPeer::WATCH_ID, $this->watch_id);
		if ($this->isColumnModified(LegalWatchPeer::DIST_ID)) $criteria->add(LegalWatchPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(LegalWatchPeer::FULL_NAME)) $criteria->add(LegalWatchPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(LegalWatchPeer::DIST_CODE)) $criteria->add(LegalWatchPeer::DIST_CODE, $this->dist_code);
		if ($this->isColumnModified(LegalWatchPeer::AGE)) $criteria->add(LegalWatchPeer::AGE, $this->age);
		if ($this->isColumnModified(LegalWatchPeer::EDUCATIONLEVEL)) $criteria->add(LegalWatchPeer::EDUCATIONLEVEL, $this->educationlevel);
		if ($this->isColumnModified(LegalWatchPeer::EMAIL)) $criteria->add(LegalWatchPeer::EMAIL, $this->email);
		if ($this->isColumnModified(LegalWatchPeer::CONTACT)) $criteria->add(LegalWatchPeer::CONTACT, $this->contact);
		if ($this->isColumnModified(LegalWatchPeer::MESSAGE)) $criteria->add(LegalWatchPeer::MESSAGE, $this->message);
		if ($this->isColumnModified(LegalWatchPeer::TITLE)) $criteria->add(LegalWatchPeer::TITLE, $this->title);
		if ($this->isColumnModified(LegalWatchPeer::FILE_NAME)) $criteria->add(LegalWatchPeer::FILE_NAME, $this->file_name);
		if ($this->isColumnModified(LegalWatchPeer::STATUS_CODE)) $criteria->add(LegalWatchPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(LegalWatchPeer::CREATED_BY)) $criteria->add(LegalWatchPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(LegalWatchPeer::CREATED_ON)) $criteria->add(LegalWatchPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(LegalWatchPeer::UPDATED_BY)) $criteria->add(LegalWatchPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(LegalWatchPeer::UPDATED_ON)) $criteria->add(LegalWatchPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LegalWatchPeer::DATABASE_NAME);

		$criteria->add(LegalWatchPeer::WATCH_ID, $this->watch_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getWatchId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setWatchId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setFullName($this->full_name);

		$copyObj->setDistCode($this->dist_code);

		$copyObj->setAge($this->age);

		$copyObj->setEducationlevel($this->educationlevel);

		$copyObj->setEmail($this->email);

		$copyObj->setContact($this->contact);

		$copyObj->setMessage($this->message);

		$copyObj->setTitle($this->title);

		$copyObj->setFileName($this->file_name);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setWatchId(NULL); 
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
			self::$peer = new LegalWatchPeer();
		}
		return self::$peer;
	}

} 