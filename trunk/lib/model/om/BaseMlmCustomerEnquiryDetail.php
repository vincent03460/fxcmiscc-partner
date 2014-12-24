<?php


abstract class BaseMlmCustomerEnquiryDetail extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $detail_id;


	
	protected $customer_enquiry_id;


	
	protected $message;


	
	protected $reply_from;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDetailId()
	{

		return $this->detail_id;
	}

	
	public function getCustomerEnquiryId()
	{

		return $this->customer_enquiry_id;
	}

	
	public function getMessage()
	{

		return $this->message;
	}

	
	public function getReplyFrom()
	{

		return $this->reply_from;
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

	
	public function setDetailId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->detail_id !== $v) {
			$this->detail_id = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::DETAIL_ID;
		}

	} 
	
	public function setCustomerEnquiryId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->customer_enquiry_id !== $v) {
			$this->customer_enquiry_id = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID;
		}

	} 
	
	public function setMessage($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->message !== $v) {
			$this->message = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::MESSAGE;
		}

	} 
	
	public function setReplyFrom($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->reply_from !== $v) {
			$this->reply_from = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::REPLY_FROM;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmCustomerEnquiryDetailPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->detail_id = $rs->getInt($startcol + 0);

			$this->customer_enquiry_id = $rs->getInt($startcol + 1);

			$this->message = $rs->getString($startcol + 2);

			$this->reply_from = $rs->getString($startcol + 3);

			$this->status_code = $rs->getString($startcol + 4);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->created_on = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->updated_on = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmCustomerEnquiryDetail object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmCustomerEnquiryDetailPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmCustomerEnquiryDetailPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmCustomerEnquiryDetailPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmCustomerEnquiryDetailPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmCustomerEnquiryDetailPeer::DATABASE_NAME);
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
					$pk = MlmCustomerEnquiryDetailPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setDetailId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmCustomerEnquiryDetailPeer::doUpdate($this, $con);
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


			if (($retval = MlmCustomerEnquiryDetailPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmCustomerEnquiryDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDetailId();
				break;
			case 1:
				return $this->getCustomerEnquiryId();
				break;
			case 2:
				return $this->getMessage();
				break;
			case 3:
				return $this->getReplyFrom();
				break;
			case 4:
				return $this->getStatusCode();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getCreatedOn();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			case 8:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmCustomerEnquiryDetailPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDetailId(),
			$keys[1] => $this->getCustomerEnquiryId(),
			$keys[2] => $this->getMessage(),
			$keys[3] => $this->getReplyFrom(),
			$keys[4] => $this->getStatusCode(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getCreatedOn(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmCustomerEnquiryDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDetailId($value);
				break;
			case 1:
				$this->setCustomerEnquiryId($value);
				break;
			case 2:
				$this->setMessage($value);
				break;
			case 3:
				$this->setReplyFrom($value);
				break;
			case 4:
				$this->setStatusCode($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setCreatedOn($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
			case 8:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmCustomerEnquiryDetailPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDetailId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCustomerEnquiryId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMessage($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setReplyFrom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStatusCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedOn($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedOn($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmCustomerEnquiryDetailPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::DETAIL_ID)) $criteria->add(MlmCustomerEnquiryDetailPeer::DETAIL_ID, $this->detail_id);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID)) $criteria->add(MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID, $this->customer_enquiry_id);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::MESSAGE)) $criteria->add(MlmCustomerEnquiryDetailPeer::MESSAGE, $this->message);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::REPLY_FROM)) $criteria->add(MlmCustomerEnquiryDetailPeer::REPLY_FROM, $this->reply_from);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::STATUS_CODE)) $criteria->add(MlmCustomerEnquiryDetailPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::CREATED_BY)) $criteria->add(MlmCustomerEnquiryDetailPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::CREATED_ON)) $criteria->add(MlmCustomerEnquiryDetailPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::UPDATED_BY)) $criteria->add(MlmCustomerEnquiryDetailPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmCustomerEnquiryDetailPeer::UPDATED_ON)) $criteria->add(MlmCustomerEnquiryDetailPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmCustomerEnquiryDetailPeer::DATABASE_NAME);

		$criteria->add(MlmCustomerEnquiryDetailPeer::DETAIL_ID, $this->detail_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getDetailId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setDetailId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCustomerEnquiryId($this->customer_enquiry_id);

		$copyObj->setMessage($this->message);

		$copyObj->setReplyFrom($this->reply_from);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setDetailId(NULL); 
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
			self::$peer = new MlmCustomerEnquiryDetailPeer();
		}
		return self::$peer;
	}

} 