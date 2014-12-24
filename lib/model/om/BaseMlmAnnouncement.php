<?php


abstract class BaseMlmAnnouncement extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $announcement_id;


	
	protected $title;


	
	protected $title_cn;


	
	protected $title_jp;


	
	protected $content;


	
	protected $content_cn;


	
	protected $content_jp;


	
	protected $short_content;


	
	protected $short_content_cn;


	
	protected $short_content_jp;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAnnouncementId()
	{

		return $this->announcement_id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getTitleCn()
	{

		return $this->title_cn;
	}

	
	public function getTitleJp()
	{

		return $this->title_jp;
	}

	
	public function getContent()
	{

		return $this->content;
	}

	
	public function getContentCn()
	{

		return $this->content_cn;
	}

	
	public function getContentJp()
	{

		return $this->content_jp;
	}

	
	public function getShortContent()
	{

		return $this->short_content;
	}

	
	public function getShortContentCn()
	{

		return $this->short_content_cn;
	}

	
	public function getShortContentJp()
	{

		return $this->short_content_jp;
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

	
	public function setAnnouncementId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->announcement_id !== $v) {
			$this->announcement_id = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::ANNOUNCEMENT_ID;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::TITLE;
		}

	} 
	
	public function setTitleCn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title_cn !== $v) {
			$this->title_cn = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::TITLE_CN;
		}

	} 
	
	public function setTitleJp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title_jp !== $v) {
			$this->title_jp = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::TITLE_JP;
		}

	} 
	
	public function setContent($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->content !== $v) {
			$this->content = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::CONTENT;
		}

	} 
	
	public function setContentCn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->content_cn !== $v) {
			$this->content_cn = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::CONTENT_CN;
		}

	} 
	
	public function setContentJp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->content_jp !== $v) {
			$this->content_jp = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::CONTENT_JP;
		}

	} 
	
	public function setShortContent($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->short_content !== $v) {
			$this->short_content = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::SHORT_CONTENT;
		}

	} 
	
	public function setShortContentCn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->short_content_cn !== $v) {
			$this->short_content_cn = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::SHORT_CONTENT_CN;
		}

	} 
	
	public function setShortContentJp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->short_content_jp !== $v) {
			$this->short_content_jp = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::SHORT_CONTENT_JP;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmAnnouncementPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmAnnouncementPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmAnnouncementPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->announcement_id = $rs->getInt($startcol + 0);

			$this->title = $rs->getString($startcol + 1);

			$this->title_cn = $rs->getString($startcol + 2);

			$this->title_jp = $rs->getString($startcol + 3);

			$this->content = $rs->getString($startcol + 4);

			$this->content_cn = $rs->getString($startcol + 5);

			$this->content_jp = $rs->getString($startcol + 6);

			$this->short_content = $rs->getString($startcol + 7);

			$this->short_content_cn = $rs->getString($startcol + 8);

			$this->short_content_jp = $rs->getString($startcol + 9);

			$this->status_code = $rs->getString($startcol + 10);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->created_on = $rs->getTimestamp($startcol + 12, null);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->updated_on = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmAnnouncement object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmAnnouncementPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmAnnouncementPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmAnnouncementPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmAnnouncementPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmAnnouncementPeer::DATABASE_NAME);
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
					$pk = MlmAnnouncementPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setAnnouncementId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmAnnouncementPeer::doUpdate($this, $con);
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


			if (($retval = MlmAnnouncementPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmAnnouncementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAnnouncementId();
				break;
			case 1:
				return $this->getTitle();
				break;
			case 2:
				return $this->getTitleCn();
				break;
			case 3:
				return $this->getTitleJp();
				break;
			case 4:
				return $this->getContent();
				break;
			case 5:
				return $this->getContentCn();
				break;
			case 6:
				return $this->getContentJp();
				break;
			case 7:
				return $this->getShortContent();
				break;
			case 8:
				return $this->getShortContentCn();
				break;
			case 9:
				return $this->getShortContentJp();
				break;
			case 10:
				return $this->getStatusCode();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getCreatedOn();
				break;
			case 13:
				return $this->getUpdatedBy();
				break;
			case 14:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmAnnouncementPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAnnouncementId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getTitleCn(),
			$keys[3] => $this->getTitleJp(),
			$keys[4] => $this->getContent(),
			$keys[5] => $this->getContentCn(),
			$keys[6] => $this->getContentJp(),
			$keys[7] => $this->getShortContent(),
			$keys[8] => $this->getShortContentCn(),
			$keys[9] => $this->getShortContentJp(),
			$keys[10] => $this->getStatusCode(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getCreatedOn(),
			$keys[13] => $this->getUpdatedBy(),
			$keys[14] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmAnnouncementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAnnouncementId($value);
				break;
			case 1:
				$this->setTitle($value);
				break;
			case 2:
				$this->setTitleCn($value);
				break;
			case 3:
				$this->setTitleJp($value);
				break;
			case 4:
				$this->setContent($value);
				break;
			case 5:
				$this->setContentCn($value);
				break;
			case 6:
				$this->setContentJp($value);
				break;
			case 7:
				$this->setShortContent($value);
				break;
			case 8:
				$this->setShortContentCn($value);
				break;
			case 9:
				$this->setShortContentJp($value);
				break;
			case 10:
				$this->setStatusCode($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setCreatedOn($value);
				break;
			case 13:
				$this->setUpdatedBy($value);
				break;
			case 14:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmAnnouncementPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAnnouncementId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitleCn($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitleJp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setContentCn($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setContentJp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setShortContent($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setShortContentCn($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setShortContentJp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStatusCode($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedOn($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedOn($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmAnnouncementPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmAnnouncementPeer::ANNOUNCEMENT_ID)) $criteria->add(MlmAnnouncementPeer::ANNOUNCEMENT_ID, $this->announcement_id);
		if ($this->isColumnModified(MlmAnnouncementPeer::TITLE)) $criteria->add(MlmAnnouncementPeer::TITLE, $this->title);
		if ($this->isColumnModified(MlmAnnouncementPeer::TITLE_CN)) $criteria->add(MlmAnnouncementPeer::TITLE_CN, $this->title_cn);
		if ($this->isColumnModified(MlmAnnouncementPeer::TITLE_JP)) $criteria->add(MlmAnnouncementPeer::TITLE_JP, $this->title_jp);
		if ($this->isColumnModified(MlmAnnouncementPeer::CONTENT)) $criteria->add(MlmAnnouncementPeer::CONTENT, $this->content);
		if ($this->isColumnModified(MlmAnnouncementPeer::CONTENT_CN)) $criteria->add(MlmAnnouncementPeer::CONTENT_CN, $this->content_cn);
		if ($this->isColumnModified(MlmAnnouncementPeer::CONTENT_JP)) $criteria->add(MlmAnnouncementPeer::CONTENT_JP, $this->content_jp);
		if ($this->isColumnModified(MlmAnnouncementPeer::SHORT_CONTENT)) $criteria->add(MlmAnnouncementPeer::SHORT_CONTENT, $this->short_content);
		if ($this->isColumnModified(MlmAnnouncementPeer::SHORT_CONTENT_CN)) $criteria->add(MlmAnnouncementPeer::SHORT_CONTENT_CN, $this->short_content_cn);
		if ($this->isColumnModified(MlmAnnouncementPeer::SHORT_CONTENT_JP)) $criteria->add(MlmAnnouncementPeer::SHORT_CONTENT_JP, $this->short_content_jp);
		if ($this->isColumnModified(MlmAnnouncementPeer::STATUS_CODE)) $criteria->add(MlmAnnouncementPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmAnnouncementPeer::CREATED_BY)) $criteria->add(MlmAnnouncementPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmAnnouncementPeer::CREATED_ON)) $criteria->add(MlmAnnouncementPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmAnnouncementPeer::UPDATED_BY)) $criteria->add(MlmAnnouncementPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmAnnouncementPeer::UPDATED_ON)) $criteria->add(MlmAnnouncementPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmAnnouncementPeer::DATABASE_NAME);

		$criteria->add(MlmAnnouncementPeer::ANNOUNCEMENT_ID, $this->announcement_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAnnouncementId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAnnouncementId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTitle($this->title);

		$copyObj->setTitleCn($this->title_cn);

		$copyObj->setTitleJp($this->title_jp);

		$copyObj->setContent($this->content);

		$copyObj->setContentCn($this->content_cn);

		$copyObj->setContentJp($this->content_jp);

		$copyObj->setShortContent($this->short_content);

		$copyObj->setShortContentCn($this->short_content_cn);

		$copyObj->setShortContentJp($this->short_content_jp);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setAnnouncementId(NULL); 
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
			self::$peer = new MlmAnnouncementPeer();
		}
		return self::$peer;
	}

} 