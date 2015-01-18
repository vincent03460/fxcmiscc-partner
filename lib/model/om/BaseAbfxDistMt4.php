<?php


abstract class BaseAbfxDistMt4 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $abfx_id;


	
	protected $dist_id;


	
	protected $dist_code;


	
	protected $email;


	
	protected $full_name;


	
	protected $mt4_user_name;


	
	protected $mt4_password;


	
	protected $file_name;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAbfxId()
	{

		return $this->abfx_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getDistCode()
	{

		return $this->dist_code;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getMt4UserName()
	{

		return $this->mt4_user_name;
	}

	
	public function getMt4Password()
	{

		return $this->mt4_password;
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

	
	public function setAbfxId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->abfx_id !== $v) {
			$this->abfx_id = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::ABFX_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::DIST_ID;
		}

	} 
	
	public function setDistCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dist_code !== $v) {
			$this->dist_code = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::DIST_CODE;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::EMAIL;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::FULL_NAME;
		}

	} 
	
	public function setMt4UserName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_user_name !== $v) {
			$this->mt4_user_name = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::MT4_USER_NAME;
		}

	} 
	
	public function setMt4Password($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_password !== $v) {
			$this->mt4_password = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::MT4_PASSWORD;
		}

	} 
	
	public function setFileName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_name !== $v) {
			$this->file_name = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::FILE_NAME;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::CREATED_BY;
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
			$this->modifiedColumns[] = AbfxDistMt4Peer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = AbfxDistMt4Peer::UPDATED_BY;
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
			$this->modifiedColumns[] = AbfxDistMt4Peer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->abfx_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->dist_code = $rs->getString($startcol + 2);

			$this->email = $rs->getString($startcol + 3);

			$this->full_name = $rs->getString($startcol + 4);

			$this->mt4_user_name = $rs->getString($startcol + 5);

			$this->mt4_password = $rs->getString($startcol + 6);

			$this->file_name = $rs->getString($startcol + 7);

			$this->status_code = $rs->getString($startcol + 8);

			$this->created_by = $rs->getInt($startcol + 9);

			$this->created_on = $rs->getTimestamp($startcol + 10, null);

			$this->updated_by = $rs->getInt($startcol + 11);

			$this->updated_on = $rs->getTimestamp($startcol + 12, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AbfxDistMt4 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbfxDistMt4Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AbfxDistMt4Peer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AbfxDistMt4Peer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AbfxDistMt4Peer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbfxDistMt4Peer::DATABASE_NAME);
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
					$pk = AbfxDistMt4Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setAbfxId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AbfxDistMt4Peer::doUpdate($this, $con);
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


			if (($retval = AbfxDistMt4Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbfxDistMt4Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAbfxId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getDistCode();
				break;
			case 3:
				return $this->getEmail();
				break;
			case 4:
				return $this->getFullName();
				break;
			case 5:
				return $this->getMt4UserName();
				break;
			case 6:
				return $this->getMt4Password();
				break;
			case 7:
				return $this->getFileName();
				break;
			case 8:
				return $this->getStatusCode();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getCreatedOn();
				break;
			case 11:
				return $this->getUpdatedBy();
				break;
			case 12:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbfxDistMt4Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAbfxId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getDistCode(),
			$keys[3] => $this->getEmail(),
			$keys[4] => $this->getFullName(),
			$keys[5] => $this->getMt4UserName(),
			$keys[6] => $this->getMt4Password(),
			$keys[7] => $this->getFileName(),
			$keys[8] => $this->getStatusCode(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getCreatedOn(),
			$keys[11] => $this->getUpdatedBy(),
			$keys[12] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbfxDistMt4Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAbfxId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setDistCode($value);
				break;
			case 3:
				$this->setEmail($value);
				break;
			case 4:
				$this->setFullName($value);
				break;
			case 5:
				$this->setMt4UserName($value);
				break;
			case 6:
				$this->setMt4Password($value);
				break;
			case 7:
				$this->setFileName($value);
				break;
			case 8:
				$this->setStatusCode($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setCreatedOn($value);
				break;
			case 11:
				$this->setUpdatedBy($value);
				break;
			case 12:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbfxDistMt4Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAbfxId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDistCode($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFullName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMt4UserName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMt4Password($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFileName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatusCode($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedOn($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedOn($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AbfxDistMt4Peer::DATABASE_NAME);

		if ($this->isColumnModified(AbfxDistMt4Peer::ABFX_ID)) $criteria->add(AbfxDistMt4Peer::ABFX_ID, $this->abfx_id);
		if ($this->isColumnModified(AbfxDistMt4Peer::DIST_ID)) $criteria->add(AbfxDistMt4Peer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(AbfxDistMt4Peer::DIST_CODE)) $criteria->add(AbfxDistMt4Peer::DIST_CODE, $this->dist_code);
		if ($this->isColumnModified(AbfxDistMt4Peer::EMAIL)) $criteria->add(AbfxDistMt4Peer::EMAIL, $this->email);
		if ($this->isColumnModified(AbfxDistMt4Peer::FULL_NAME)) $criteria->add(AbfxDistMt4Peer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(AbfxDistMt4Peer::MT4_USER_NAME)) $criteria->add(AbfxDistMt4Peer::MT4_USER_NAME, $this->mt4_user_name);
		if ($this->isColumnModified(AbfxDistMt4Peer::MT4_PASSWORD)) $criteria->add(AbfxDistMt4Peer::MT4_PASSWORD, $this->mt4_password);
		if ($this->isColumnModified(AbfxDistMt4Peer::FILE_NAME)) $criteria->add(AbfxDistMt4Peer::FILE_NAME, $this->file_name);
		if ($this->isColumnModified(AbfxDistMt4Peer::STATUS_CODE)) $criteria->add(AbfxDistMt4Peer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(AbfxDistMt4Peer::CREATED_BY)) $criteria->add(AbfxDistMt4Peer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AbfxDistMt4Peer::CREATED_ON)) $criteria->add(AbfxDistMt4Peer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(AbfxDistMt4Peer::UPDATED_BY)) $criteria->add(AbfxDistMt4Peer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(AbfxDistMt4Peer::UPDATED_ON)) $criteria->add(AbfxDistMt4Peer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AbfxDistMt4Peer::DATABASE_NAME);

		$criteria->add(AbfxDistMt4Peer::ABFX_ID, $this->abfx_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAbfxId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAbfxId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setDistCode($this->dist_code);

		$copyObj->setEmail($this->email);

		$copyObj->setFullName($this->full_name);

		$copyObj->setMt4UserName($this->mt4_user_name);

		$copyObj->setMt4Password($this->mt4_password);

		$copyObj->setFileName($this->file_name);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setAbfxId(NULL); 
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
			self::$peer = new AbfxDistMt4Peer();
		}
		return self::$peer;
	}

} 