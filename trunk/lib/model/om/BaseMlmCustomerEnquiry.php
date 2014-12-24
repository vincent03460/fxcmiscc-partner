<?php


abstract class BaseMlmCustomerEnquiry extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $enquiry_id;


	
	protected $distributor_id;


	
	protected $contact_no;


	
	protected $title;


	
	protected $admin_read;


	
	protected $admin_updated;


	
	protected $distributor_read;


	
	protected $distributor_updated;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getEnquiryId()
	{

		return $this->enquiry_id;
	}

	
	public function getDistributorId()
	{

		return $this->distributor_id;
	}

	
	public function getContactNo()
	{

		return $this->contact_no;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getAdminRead()
	{

		return $this->admin_read;
	}

	
	public function getAdminUpdated()
	{

		return $this->admin_updated;
	}

	
	public function getDistributorRead()
	{

		return $this->distributor_read;
	}

	
	public function getDistributorUpdated()
	{

		return $this->distributor_updated;
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

	
	public function setEnquiryId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->enquiry_id !== $v) {
			$this->enquiry_id = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::ENQUIRY_ID;
		}

	} 
	
	public function setDistributorId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->distributor_id !== $v) {
			$this->distributor_id = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::DISTRIBUTOR_ID;
		}

	} 
	
	public function setContactNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact_no !== $v) {
			$this->contact_no = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::CONTACT_NO;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::TITLE;
		}

	} 
	
	public function setAdminRead($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->admin_read !== $v) {
			$this->admin_read = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::ADMIN_READ;
		}

	} 
	
	public function setAdminUpdated($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->admin_updated !== $v) {
			$this->admin_updated = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::ADMIN_UPDATED;
		}

	} 
	
	public function setDistributorRead($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->distributor_read !== $v) {
			$this->distributor_read = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::DISTRIBUTOR_READ;
		}

	} 
	
	public function setDistributorUpdated($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->distributor_updated !== $v) {
			$this->distributor_updated = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::DISTRIBUTOR_UPDATED;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmCustomerEnquiryPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->enquiry_id = $rs->getInt($startcol + 0);

			$this->distributor_id = $rs->getInt($startcol + 1);

			$this->contact_no = $rs->getString($startcol + 2);

			$this->title = $rs->getString($startcol + 3);

			$this->admin_read = $rs->getString($startcol + 4);

			$this->admin_updated = $rs->getString($startcol + 5);

			$this->distributor_read = $rs->getString($startcol + 6);

			$this->distributor_updated = $rs->getString($startcol + 7);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->created_on = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmCustomerEnquiry object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmCustomerEnquiryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmCustomerEnquiryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmCustomerEnquiryPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmCustomerEnquiryPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmCustomerEnquiryPeer::DATABASE_NAME);
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
					$pk = MlmCustomerEnquiryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setEnquiryId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmCustomerEnquiryPeer::doUpdate($this, $con);
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


			if (($retval = MlmCustomerEnquiryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmCustomerEnquiryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getEnquiryId();
				break;
			case 1:
				return $this->getDistributorId();
				break;
			case 2:
				return $this->getContactNo();
				break;
			case 3:
				return $this->getTitle();
				break;
			case 4:
				return $this->getAdminRead();
				break;
			case 5:
				return $this->getAdminUpdated();
				break;
			case 6:
				return $this->getDistributorRead();
				break;
			case 7:
				return $this->getDistributorUpdated();
				break;
			case 8:
				return $this->getCreatedBy();
				break;
			case 9:
				return $this->getCreatedOn();
				break;
			case 10:
				return $this->getUpdatedBy();
				break;
			case 11:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmCustomerEnquiryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEnquiryId(),
			$keys[1] => $this->getDistributorId(),
			$keys[2] => $this->getContactNo(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getAdminRead(),
			$keys[5] => $this->getAdminUpdated(),
			$keys[6] => $this->getDistributorRead(),
			$keys[7] => $this->getDistributorUpdated(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedBy(),
			$keys[11] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmCustomerEnquiryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setEnquiryId($value);
				break;
			case 1:
				$this->setDistributorId($value);
				break;
			case 2:
				$this->setContactNo($value);
				break;
			case 3:
				$this->setTitle($value);
				break;
			case 4:
				$this->setAdminRead($value);
				break;
			case 5:
				$this->setAdminUpdated($value);
				break;
			case 6:
				$this->setDistributorRead($value);
				break;
			case 7:
				$this->setDistributorUpdated($value);
				break;
			case 8:
				$this->setCreatedBy($value);
				break;
			case 9:
				$this->setCreatedOn($value);
				break;
			case 10:
				$this->setUpdatedBy($value);
				break;
			case 11:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmCustomerEnquiryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEnquiryId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistributorId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setContactNo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAdminRead($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdminUpdated($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDistributorRead($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDistributorUpdated($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmCustomerEnquiryPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmCustomerEnquiryPeer::ENQUIRY_ID)) $criteria->add(MlmCustomerEnquiryPeer::ENQUIRY_ID, $this->enquiry_id);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::DISTRIBUTOR_ID)) $criteria->add(MlmCustomerEnquiryPeer::DISTRIBUTOR_ID, $this->distributor_id);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::CONTACT_NO)) $criteria->add(MlmCustomerEnquiryPeer::CONTACT_NO, $this->contact_no);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::TITLE)) $criteria->add(MlmCustomerEnquiryPeer::TITLE, $this->title);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::ADMIN_READ)) $criteria->add(MlmCustomerEnquiryPeer::ADMIN_READ, $this->admin_read);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::ADMIN_UPDATED)) $criteria->add(MlmCustomerEnquiryPeer::ADMIN_UPDATED, $this->admin_updated);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::DISTRIBUTOR_READ)) $criteria->add(MlmCustomerEnquiryPeer::DISTRIBUTOR_READ, $this->distributor_read);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::DISTRIBUTOR_UPDATED)) $criteria->add(MlmCustomerEnquiryPeer::DISTRIBUTOR_UPDATED, $this->distributor_updated);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::CREATED_BY)) $criteria->add(MlmCustomerEnquiryPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::CREATED_ON)) $criteria->add(MlmCustomerEnquiryPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::UPDATED_BY)) $criteria->add(MlmCustomerEnquiryPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmCustomerEnquiryPeer::UPDATED_ON)) $criteria->add(MlmCustomerEnquiryPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmCustomerEnquiryPeer::DATABASE_NAME);

		$criteria->add(MlmCustomerEnquiryPeer::ENQUIRY_ID, $this->enquiry_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getEnquiryId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setEnquiryId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistributorId($this->distributor_id);

		$copyObj->setContactNo($this->contact_no);

		$copyObj->setTitle($this->title);

		$copyObj->setAdminRead($this->admin_read);

		$copyObj->setAdminUpdated($this->admin_updated);

		$copyObj->setDistributorRead($this->distributor_read);

		$copyObj->setDistributorUpdated($this->distributor_updated);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setEnquiryId(NULL); 
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
			self::$peer = new MlmCustomerEnquiryPeer();
		}
		return self::$peer;
	}

} 