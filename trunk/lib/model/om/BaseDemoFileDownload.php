<?php


abstract class BaseDemoFileDownload extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $file_id;


	
	protected $file_type;


	
	protected $file_src;


	
	protected $file_name;


	
	protected $content_type;


	
	protected $status_code;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFileId()
	{

		return $this->file_id;
	}

	
	public function getFileType()
	{

		return $this->file_type;
	}

	
	public function getFileSrc()
	{

		return $this->file_src;
	}

	
	public function getFileName()
	{

		return $this->file_name;
	}

	
	public function getContentType()
	{

		return $this->content_type;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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

	
	public function setFileId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_id !== $v) {
			$this->file_id = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::FILE_ID;
		}

	} 
	
	public function setFileType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_type !== $v) {
			$this->file_type = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::FILE_TYPE;
		}

	} 
	
	public function setFileSrc($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_src !== $v) {
			$this->file_src = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::FILE_SRC;
		}

	} 
	
	public function setFileName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_name !== $v) {
			$this->file_name = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::FILE_NAME;
		}

	} 
	
	public function setContentType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->content_type !== $v) {
			$this->content_type = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::CONTENT_TYPE;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::STATUS_CODE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::CREATED_BY;
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
			$this->modifiedColumns[] = DemoFileDownloadPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = DemoFileDownloadPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = DemoFileDownloadPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->file_id = $rs->getInt($startcol + 0);

			$this->file_type = $rs->getString($startcol + 1);

			$this->file_src = $rs->getString($startcol + 2);

			$this->file_name = $rs->getString($startcol + 3);

			$this->content_type = $rs->getString($startcol + 4);

			$this->status_code = $rs->getString($startcol + 5);

			$this->remarks = $rs->getString($startcol + 6);

			$this->created_by = $rs->getInt($startcol + 7);

			$this->created_on = $rs->getTimestamp($startcol + 8, null);

			$this->updated_by = $rs->getInt($startcol + 9);

			$this->updated_on = $rs->getTimestamp($startcol + 10, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DemoFileDownload object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DemoFileDownloadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DemoFileDownloadPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(DemoFileDownloadPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(DemoFileDownloadPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DemoFileDownloadPeer::DATABASE_NAME);
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
					$pk = DemoFileDownloadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setFileId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DemoFileDownloadPeer::doUpdate($this, $con);
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


			if (($retval = DemoFileDownloadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DemoFileDownloadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFileId();
				break;
			case 1:
				return $this->getFileType();
				break;
			case 2:
				return $this->getFileSrc();
				break;
			case 3:
				return $this->getFileName();
				break;
			case 4:
				return $this->getContentType();
				break;
			case 5:
				return $this->getStatusCode();
				break;
			case 6:
				return $this->getRemarks();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getCreatedOn();
				break;
			case 9:
				return $this->getUpdatedBy();
				break;
			case 10:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DemoFileDownloadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFileId(),
			$keys[1] => $this->getFileType(),
			$keys[2] => $this->getFileSrc(),
			$keys[3] => $this->getFileName(),
			$keys[4] => $this->getContentType(),
			$keys[5] => $this->getStatusCode(),
			$keys[6] => $this->getRemarks(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getCreatedOn(),
			$keys[9] => $this->getUpdatedBy(),
			$keys[10] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DemoFileDownloadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFileId($value);
				break;
			case 1:
				$this->setFileType($value);
				break;
			case 2:
				$this->setFileSrc($value);
				break;
			case 3:
				$this->setFileName($value);
				break;
			case 4:
				$this->setContentType($value);
				break;
			case 5:
				$this->setStatusCode($value);
				break;
			case 6:
				$this->setRemarks($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setCreatedOn($value);
				break;
			case 9:
				$this->setUpdatedBy($value);
				break;
			case 10:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DemoFileDownloadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFileId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFileType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFileSrc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFileName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContentType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatusCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRemarks($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedOn($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedOn($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DemoFileDownloadPeer::DATABASE_NAME);

		if ($this->isColumnModified(DemoFileDownloadPeer::FILE_ID)) $criteria->add(DemoFileDownloadPeer::FILE_ID, $this->file_id);
		if ($this->isColumnModified(DemoFileDownloadPeer::FILE_TYPE)) $criteria->add(DemoFileDownloadPeer::FILE_TYPE, $this->file_type);
		if ($this->isColumnModified(DemoFileDownloadPeer::FILE_SRC)) $criteria->add(DemoFileDownloadPeer::FILE_SRC, $this->file_src);
		if ($this->isColumnModified(DemoFileDownloadPeer::FILE_NAME)) $criteria->add(DemoFileDownloadPeer::FILE_NAME, $this->file_name);
		if ($this->isColumnModified(DemoFileDownloadPeer::CONTENT_TYPE)) $criteria->add(DemoFileDownloadPeer::CONTENT_TYPE, $this->content_type);
		if ($this->isColumnModified(DemoFileDownloadPeer::STATUS_CODE)) $criteria->add(DemoFileDownloadPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(DemoFileDownloadPeer::REMARKS)) $criteria->add(DemoFileDownloadPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(DemoFileDownloadPeer::CREATED_BY)) $criteria->add(DemoFileDownloadPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(DemoFileDownloadPeer::CREATED_ON)) $criteria->add(DemoFileDownloadPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(DemoFileDownloadPeer::UPDATED_BY)) $criteria->add(DemoFileDownloadPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(DemoFileDownloadPeer::UPDATED_ON)) $criteria->add(DemoFileDownloadPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DemoFileDownloadPeer::DATABASE_NAME);

		$criteria->add(DemoFileDownloadPeer::FILE_ID, $this->file_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getFileId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setFileId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFileType($this->file_type);

		$copyObj->setFileSrc($this->file_src);

		$copyObj->setFileName($this->file_name);

		$copyObj->setContentType($this->content_type);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setFileId(NULL); 
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
			self::$peer = new DemoFileDownloadPeer();
		}
		return self::$peer;
	}

} 