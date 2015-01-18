<?php


abstract class BaseImeReport extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $report_id;


	
	protected $dist_id;


	
	protected $bonus_type;


	
	protected $small_leg = 0;


	
	protected $personal_sales = 0;


	
	protected $ticket_qty = 0;


	
	protected $distributor_code;


	
	protected $full_name;


	
	protected $email;


	
	protected $contact;


	
	protected $country;


	
	protected $registered_on;


	
	protected $leader;


	
	protected $remark;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReportId()
	{

		return $this->report_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getBonusType()
	{

		return $this->bonus_type;
	}

	
	public function getSmallLeg()
	{

		return $this->small_leg;
	}

	
	public function getPersonalSales()
	{

		return $this->personal_sales;
	}

	
	public function getTicketQty()
	{

		return $this->ticket_qty;
	}

	
	public function getDistributorCode()
	{

		return $this->distributor_code;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getContact()
	{

		return $this->contact;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getRegisteredOn($format = 'Y-m-d H:i:s')
	{

		if ($this->registered_on === null || $this->registered_on === '') {
			return null;
		} elseif (!is_int($this->registered_on)) {
						$ts = strtotime($this->registered_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [registered_on] as date/time value: " . var_export($this->registered_on, true));
			}
		} else {
			$ts = $this->registered_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getLeader()
	{

		return $this->leader;
	}

	
	public function getRemark()
	{

		return $this->remark;
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

	
	public function setReportId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = ImeReportPeer::REPORT_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = ImeReportPeer::DIST_ID;
		}

	} 
	
	public function setBonusType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bonus_type !== $v) {
			$this->bonus_type = $v;
			$this->modifiedColumns[] = ImeReportPeer::BONUS_TYPE;
		}

	} 
	
	public function setSmallLeg($v)
	{

		if ($this->small_leg !== $v || $v === 0) {
			$this->small_leg = $v;
			$this->modifiedColumns[] = ImeReportPeer::SMALL_LEG;
		}

	} 
	
	public function setPersonalSales($v)
	{

		if ($this->personal_sales !== $v || $v === 0) {
			$this->personal_sales = $v;
			$this->modifiedColumns[] = ImeReportPeer::PERSONAL_SALES;
		}

	} 
	
	public function setTicketQty($v)
	{

		if ($this->ticket_qty !== $v || $v === 0) {
			$this->ticket_qty = $v;
			$this->modifiedColumns[] = ImeReportPeer::TICKET_QTY;
		}

	} 
	
	public function setDistributorCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->distributor_code !== $v) {
			$this->distributor_code = $v;
			$this->modifiedColumns[] = ImeReportPeer::DISTRIBUTOR_CODE;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = ImeReportPeer::FULL_NAME;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ImeReportPeer::EMAIL;
		}

	} 
	
	public function setContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = ImeReportPeer::CONTACT;
		}

	} 
	
	public function setCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = ImeReportPeer::COUNTRY;
		}

	} 
	
	public function setRegisteredOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [registered_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->registered_on !== $ts) {
			$this->registered_on = $ts;
			$this->modifiedColumns[] = ImeReportPeer::REGISTERED_ON;
		}

	} 
	
	public function setLeader($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->leader !== $v) {
			$this->leader = $v;
			$this->modifiedColumns[] = ImeReportPeer::LEADER;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = ImeReportPeer::REMARK;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ImeReportPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ImeReportPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ImeReportPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = ImeReportPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->report_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->bonus_type = $rs->getString($startcol + 2);

			$this->small_leg = $rs->getFloat($startcol + 3);

			$this->personal_sales = $rs->getFloat($startcol + 4);

			$this->ticket_qty = $rs->getFloat($startcol + 5);

			$this->distributor_code = $rs->getString($startcol + 6);

			$this->full_name = $rs->getString($startcol + 7);

			$this->email = $rs->getString($startcol + 8);

			$this->contact = $rs->getString($startcol + 9);

			$this->country = $rs->getString($startcol + 10);

			$this->registered_on = $rs->getTimestamp($startcol + 11, null);

			$this->leader = $rs->getString($startcol + 12);

			$this->remark = $rs->getString($startcol + 13);

			$this->created_by = $rs->getInt($startcol + 14);

			$this->created_on = $rs->getTimestamp($startcol + 15, null);

			$this->updated_by = $rs->getInt($startcol + 16);

			$this->updated_on = $rs->getTimestamp($startcol + 17, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ImeReport object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImeReportPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ImeReportPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ImeReportPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ImeReportPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImeReportPeer::DATABASE_NAME);
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
					$pk = ImeReportPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setReportId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ImeReportPeer::doUpdate($this, $con);
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


			if (($retval = ImeReportPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ImeReportPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReportId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getBonusType();
				break;
			case 3:
				return $this->getSmallLeg();
				break;
			case 4:
				return $this->getPersonalSales();
				break;
			case 5:
				return $this->getTicketQty();
				break;
			case 6:
				return $this->getDistributorCode();
				break;
			case 7:
				return $this->getFullName();
				break;
			case 8:
				return $this->getEmail();
				break;
			case 9:
				return $this->getContact();
				break;
			case 10:
				return $this->getCountry();
				break;
			case 11:
				return $this->getRegisteredOn();
				break;
			case 12:
				return $this->getLeader();
				break;
			case 13:
				return $this->getRemark();
				break;
			case 14:
				return $this->getCreatedBy();
				break;
			case 15:
				return $this->getCreatedOn();
				break;
			case 16:
				return $this->getUpdatedBy();
				break;
			case 17:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ImeReportPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReportId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getBonusType(),
			$keys[3] => $this->getSmallLeg(),
			$keys[4] => $this->getPersonalSales(),
			$keys[5] => $this->getTicketQty(),
			$keys[6] => $this->getDistributorCode(),
			$keys[7] => $this->getFullName(),
			$keys[8] => $this->getEmail(),
			$keys[9] => $this->getContact(),
			$keys[10] => $this->getCountry(),
			$keys[11] => $this->getRegisteredOn(),
			$keys[12] => $this->getLeader(),
			$keys[13] => $this->getRemark(),
			$keys[14] => $this->getCreatedBy(),
			$keys[15] => $this->getCreatedOn(),
			$keys[16] => $this->getUpdatedBy(),
			$keys[17] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ImeReportPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReportId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setBonusType($value);
				break;
			case 3:
				$this->setSmallLeg($value);
				break;
			case 4:
				$this->setPersonalSales($value);
				break;
			case 5:
				$this->setTicketQty($value);
				break;
			case 6:
				$this->setDistributorCode($value);
				break;
			case 7:
				$this->setFullName($value);
				break;
			case 8:
				$this->setEmail($value);
				break;
			case 9:
				$this->setContact($value);
				break;
			case 10:
				$this->setCountry($value);
				break;
			case 11:
				$this->setRegisteredOn($value);
				break;
			case 12:
				$this->setLeader($value);
				break;
			case 13:
				$this->setRemark($value);
				break;
			case 14:
				$this->setCreatedBy($value);
				break;
			case 15:
				$this->setCreatedOn($value);
				break;
			case 16:
				$this->setUpdatedBy($value);
				break;
			case 17:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ImeReportPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReportId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBonusType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSmallLeg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPersonalSales($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTicketQty($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDistributorCode($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFullName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEmail($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setContact($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCountry($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRegisteredOn($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLeader($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRemark($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedOn($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedOn($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ImeReportPeer::DATABASE_NAME);

		if ($this->isColumnModified(ImeReportPeer::REPORT_ID)) $criteria->add(ImeReportPeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(ImeReportPeer::DIST_ID)) $criteria->add(ImeReportPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(ImeReportPeer::BONUS_TYPE)) $criteria->add(ImeReportPeer::BONUS_TYPE, $this->bonus_type);
		if ($this->isColumnModified(ImeReportPeer::SMALL_LEG)) $criteria->add(ImeReportPeer::SMALL_LEG, $this->small_leg);
		if ($this->isColumnModified(ImeReportPeer::PERSONAL_SALES)) $criteria->add(ImeReportPeer::PERSONAL_SALES, $this->personal_sales);
		if ($this->isColumnModified(ImeReportPeer::TICKET_QTY)) $criteria->add(ImeReportPeer::TICKET_QTY, $this->ticket_qty);
		if ($this->isColumnModified(ImeReportPeer::DISTRIBUTOR_CODE)) $criteria->add(ImeReportPeer::DISTRIBUTOR_CODE, $this->distributor_code);
		if ($this->isColumnModified(ImeReportPeer::FULL_NAME)) $criteria->add(ImeReportPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(ImeReportPeer::EMAIL)) $criteria->add(ImeReportPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ImeReportPeer::CONTACT)) $criteria->add(ImeReportPeer::CONTACT, $this->contact);
		if ($this->isColumnModified(ImeReportPeer::COUNTRY)) $criteria->add(ImeReportPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(ImeReportPeer::REGISTERED_ON)) $criteria->add(ImeReportPeer::REGISTERED_ON, $this->registered_on);
		if ($this->isColumnModified(ImeReportPeer::LEADER)) $criteria->add(ImeReportPeer::LEADER, $this->leader);
		if ($this->isColumnModified(ImeReportPeer::REMARK)) $criteria->add(ImeReportPeer::REMARK, $this->remark);
		if ($this->isColumnModified(ImeReportPeer::CREATED_BY)) $criteria->add(ImeReportPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ImeReportPeer::CREATED_ON)) $criteria->add(ImeReportPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(ImeReportPeer::UPDATED_BY)) $criteria->add(ImeReportPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ImeReportPeer::UPDATED_ON)) $criteria->add(ImeReportPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ImeReportPeer::DATABASE_NAME);

		$criteria->add(ImeReportPeer::REPORT_ID, $this->report_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getReportId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setReportId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setBonusType($this->bonus_type);

		$copyObj->setSmallLeg($this->small_leg);

		$copyObj->setPersonalSales($this->personal_sales);

		$copyObj->setTicketQty($this->ticket_qty);

		$copyObj->setDistributorCode($this->distributor_code);

		$copyObj->setFullName($this->full_name);

		$copyObj->setEmail($this->email);

		$copyObj->setContact($this->contact);

		$copyObj->setCountry($this->country);

		$copyObj->setRegisteredOn($this->registered_on);

		$copyObj->setLeader($this->leader);

		$copyObj->setRemark($this->remark);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setReportId(NULL); 
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
			self::$peer = new ImeReportPeer();
		}
		return self::$peer;
	}

} 