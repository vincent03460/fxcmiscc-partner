<?php


abstract class BaseMlmMt4DemoRequest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $request_id;


	
	protected $first_name;


	
	protected $email;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $country;


	
	protected $phone_number;


	
	protected $last_name;


	
	protected $title;


	
	protected $live_demo;


	
	protected $address1;


	
	protected $address2;


	
	protected $agree_of_business;


	
	protected $risk_disclosure;


	
	protected $country_of_citizen;


	
	protected $dob_day;


	
	protected $dob_month;


	
	protected $dob_year;


	
	protected $ref_id;


	
	protected $passport;


	
	protected $subject;


	
	protected $city;


	
	protected $address_state;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRequestId()
	{

		return $this->request_id;
	}

	
	public function getFirstName()
	{

		return $this->first_name;
	}

	
	public function getEmail()
	{

		return $this->email;
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

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getPhoneNumber()
	{

		return $this->phone_number;
	}

	
	public function getLastName()
	{

		return $this->last_name;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getLiveDemo()
	{

		return $this->live_demo;
	}

	
	public function getAddress1()
	{

		return $this->address1;
	}

	
	public function getAddress2()
	{

		return $this->address2;
	}

	
	public function getAgreeOfBusiness()
	{

		return $this->agree_of_business;
	}

	
	public function getRiskDisclosure()
	{

		return $this->risk_disclosure;
	}

	
	public function getCountryOfCitizen()
	{

		return $this->country_of_citizen;
	}

	
	public function getDobDay()
	{

		return $this->dob_day;
	}

	
	public function getDobMonth()
	{

		return $this->dob_month;
	}

	
	public function getDobYear()
	{

		return $this->dob_year;
	}

	
	public function getRefId()
	{

		return $this->ref_id;
	}

	
	public function getPassport()
	{

		return $this->passport;
	}

	
	public function getSubject()
	{

		return $this->subject;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getAddressState()
	{

		return $this->address_state;
	}

	
	public function setRequestId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->request_id !== $v) {
			$this->request_id = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::REQUEST_ID;
		}

	} 
	
	public function setFirstName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::FIRST_NAME;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::EMAIL;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::UPDATED_ON;
		}

	} 
	
	public function setCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::COUNTRY;
		}

	} 
	
	public function setPhoneNumber($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->phone_number !== $v) {
			$this->phone_number = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::PHONE_NUMBER;
		}

	} 
	
	public function setLastName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::LAST_NAME;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::TITLE;
		}

	} 
	
	public function setLiveDemo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->live_demo !== $v) {
			$this->live_demo = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::LIVE_DEMO;
		}

	} 
	
	public function setAddress1($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address1 !== $v) {
			$this->address1 = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::ADDRESS1;
		}

	} 
	
	public function setAddress2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address2 !== $v) {
			$this->address2 = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::ADDRESS2;
		}

	} 
	
	public function setAgreeOfBusiness($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->agree_of_business !== $v) {
			$this->agree_of_business = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::AGREE_OF_BUSINESS;
		}

	} 
	
	public function setRiskDisclosure($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->risk_disclosure !== $v) {
			$this->risk_disclosure = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::RISK_DISCLOSURE;
		}

	} 
	
	public function setCountryOfCitizen($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country_of_citizen !== $v) {
			$this->country_of_citizen = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::COUNTRY_OF_CITIZEN;
		}

	} 
	
	public function setDobDay($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dob_day !== $v) {
			$this->dob_day = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::DOB_DAY;
		}

	} 
	
	public function setDobMonth($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dob_month !== $v) {
			$this->dob_month = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::DOB_MONTH;
		}

	} 
	
	public function setDobYear($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dob_year !== $v) {
			$this->dob_year = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::DOB_YEAR;
		}

	} 
	
	public function setRefId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ref_id !== $v) {
			$this->ref_id = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::REF_ID;
		}

	} 
	
	public function setPassport($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->passport !== $v) {
			$this->passport = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::PASSPORT;
		}

	} 
	
	public function setSubject($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::SUBJECT;
		}

	} 
	
	public function setCity($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::CITY;
		}

	} 
	
	public function setAddressState($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->address_state !== $v) {
			$this->address_state = $v;
			$this->modifiedColumns[] = MlmMt4DemoRequestPeer::ADDRESS_STATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->request_id = $rs->getInt($startcol + 0);

			$this->first_name = $rs->getString($startcol + 1);

			$this->email = $rs->getString($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->created_by = $rs->getInt($startcol + 4);

			$this->created_on = $rs->getTimestamp($startcol + 5, null);

			$this->updated_by = $rs->getInt($startcol + 6);

			$this->updated_on = $rs->getTimestamp($startcol + 7, null);

			$this->country = $rs->getString($startcol + 8);

			$this->phone_number = $rs->getString($startcol + 9);

			$this->last_name = $rs->getString($startcol + 10);

			$this->title = $rs->getString($startcol + 11);

			$this->live_demo = $rs->getString($startcol + 12);

			$this->address1 = $rs->getString($startcol + 13);

			$this->address2 = $rs->getString($startcol + 14);

			$this->agree_of_business = $rs->getString($startcol + 15);

			$this->risk_disclosure = $rs->getString($startcol + 16);

			$this->country_of_citizen = $rs->getString($startcol + 17);

			$this->dob_day = $rs->getString($startcol + 18);

			$this->dob_month = $rs->getString($startcol + 19);

			$this->dob_year = $rs->getString($startcol + 20);

			$this->ref_id = $rs->getString($startcol + 21);

			$this->passport = $rs->getString($startcol + 22);

			$this->subject = $rs->getString($startcol + 23);

			$this->city = $rs->getString($startcol + 24);

			$this->address_state = $rs->getInt($startcol + 25);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 26; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmMt4DemoRequest object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMt4DemoRequestPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmMt4DemoRequestPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmMt4DemoRequestPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmMt4DemoRequestPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMt4DemoRequestPeer::DATABASE_NAME);
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
					$pk = MlmMt4DemoRequestPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setRequestId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmMt4DemoRequestPeer::doUpdate($this, $con);
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


			if (($retval = MlmMt4DemoRequestPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMt4DemoRequestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRequestId();
				break;
			case 1:
				return $this->getFirstName();
				break;
			case 2:
				return $this->getEmail();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getCreatedOn();
				break;
			case 6:
				return $this->getUpdatedBy();
				break;
			case 7:
				return $this->getUpdatedOn();
				break;
			case 8:
				return $this->getCountry();
				break;
			case 9:
				return $this->getPhoneNumber();
				break;
			case 10:
				return $this->getLastName();
				break;
			case 11:
				return $this->getTitle();
				break;
			case 12:
				return $this->getLiveDemo();
				break;
			case 13:
				return $this->getAddress1();
				break;
			case 14:
				return $this->getAddress2();
				break;
			case 15:
				return $this->getAgreeOfBusiness();
				break;
			case 16:
				return $this->getRiskDisclosure();
				break;
			case 17:
				return $this->getCountryOfCitizen();
				break;
			case 18:
				return $this->getDobDay();
				break;
			case 19:
				return $this->getDobMonth();
				break;
			case 20:
				return $this->getDobYear();
				break;
			case 21:
				return $this->getRefId();
				break;
			case 22:
				return $this->getPassport();
				break;
			case 23:
				return $this->getSubject();
				break;
			case 24:
				return $this->getCity();
				break;
			case 25:
				return $this->getAddressState();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmMt4DemoRequestPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRequestId(),
			$keys[1] => $this->getFirstName(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getCreatedOn(),
			$keys[6] => $this->getUpdatedBy(),
			$keys[7] => $this->getUpdatedOn(),
			$keys[8] => $this->getCountry(),
			$keys[9] => $this->getPhoneNumber(),
			$keys[10] => $this->getLastName(),
			$keys[11] => $this->getTitle(),
			$keys[12] => $this->getLiveDemo(),
			$keys[13] => $this->getAddress1(),
			$keys[14] => $this->getAddress2(),
			$keys[15] => $this->getAgreeOfBusiness(),
			$keys[16] => $this->getRiskDisclosure(),
			$keys[17] => $this->getCountryOfCitizen(),
			$keys[18] => $this->getDobDay(),
			$keys[19] => $this->getDobMonth(),
			$keys[20] => $this->getDobYear(),
			$keys[21] => $this->getRefId(),
			$keys[22] => $this->getPassport(),
			$keys[23] => $this->getSubject(),
			$keys[24] => $this->getCity(),
			$keys[25] => $this->getAddressState(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMt4DemoRequestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRequestId($value);
				break;
			case 1:
				$this->setFirstName($value);
				break;
			case 2:
				$this->setEmail($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setCreatedOn($value);
				break;
			case 6:
				$this->setUpdatedBy($value);
				break;
			case 7:
				$this->setUpdatedOn($value);
				break;
			case 8:
				$this->setCountry($value);
				break;
			case 9:
				$this->setPhoneNumber($value);
				break;
			case 10:
				$this->setLastName($value);
				break;
			case 11:
				$this->setTitle($value);
				break;
			case 12:
				$this->setLiveDemo($value);
				break;
			case 13:
				$this->setAddress1($value);
				break;
			case 14:
				$this->setAddress2($value);
				break;
			case 15:
				$this->setAgreeOfBusiness($value);
				break;
			case 16:
				$this->setRiskDisclosure($value);
				break;
			case 17:
				$this->setCountryOfCitizen($value);
				break;
			case 18:
				$this->setDobDay($value);
				break;
			case 19:
				$this->setDobMonth($value);
				break;
			case 20:
				$this->setDobYear($value);
				break;
			case 21:
				$this->setRefId($value);
				break;
			case 22:
				$this->setPassport($value);
				break;
			case 23:
				$this->setSubject($value);
				break;
			case 24:
				$this->setCity($value);
				break;
			case 25:
				$this->setAddressState($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmMt4DemoRequestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRequestId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFirstName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedOn($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCountry($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPhoneNumber($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLastName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTitle($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLiveDemo($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAddress1($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAddress2($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAgreeOfBusiness($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setRiskDisclosure($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCountryOfCitizen($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDobDay($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDobMonth($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDobYear($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setRefId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPassport($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setSubject($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCity($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setAddressState($arr[$keys[25]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmMt4DemoRequestPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmMt4DemoRequestPeer::REQUEST_ID)) $criteria->add(MlmMt4DemoRequestPeer::REQUEST_ID, $this->request_id);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::FIRST_NAME)) $criteria->add(MlmMt4DemoRequestPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::EMAIL)) $criteria->add(MlmMt4DemoRequestPeer::EMAIL, $this->email);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::STATUS_CODE)) $criteria->add(MlmMt4DemoRequestPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::CREATED_BY)) $criteria->add(MlmMt4DemoRequestPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::CREATED_ON)) $criteria->add(MlmMt4DemoRequestPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::UPDATED_BY)) $criteria->add(MlmMt4DemoRequestPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::UPDATED_ON)) $criteria->add(MlmMt4DemoRequestPeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::COUNTRY)) $criteria->add(MlmMt4DemoRequestPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::PHONE_NUMBER)) $criteria->add(MlmMt4DemoRequestPeer::PHONE_NUMBER, $this->phone_number);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::LAST_NAME)) $criteria->add(MlmMt4DemoRequestPeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::TITLE)) $criteria->add(MlmMt4DemoRequestPeer::TITLE, $this->title);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::LIVE_DEMO)) $criteria->add(MlmMt4DemoRequestPeer::LIVE_DEMO, $this->live_demo);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::ADDRESS1)) $criteria->add(MlmMt4DemoRequestPeer::ADDRESS1, $this->address1);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::ADDRESS2)) $criteria->add(MlmMt4DemoRequestPeer::ADDRESS2, $this->address2);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::AGREE_OF_BUSINESS)) $criteria->add(MlmMt4DemoRequestPeer::AGREE_OF_BUSINESS, $this->agree_of_business);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::RISK_DISCLOSURE)) $criteria->add(MlmMt4DemoRequestPeer::RISK_DISCLOSURE, $this->risk_disclosure);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::COUNTRY_OF_CITIZEN)) $criteria->add(MlmMt4DemoRequestPeer::COUNTRY_OF_CITIZEN, $this->country_of_citizen);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::DOB_DAY)) $criteria->add(MlmMt4DemoRequestPeer::DOB_DAY, $this->dob_day);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::DOB_MONTH)) $criteria->add(MlmMt4DemoRequestPeer::DOB_MONTH, $this->dob_month);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::DOB_YEAR)) $criteria->add(MlmMt4DemoRequestPeer::DOB_YEAR, $this->dob_year);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::REF_ID)) $criteria->add(MlmMt4DemoRequestPeer::REF_ID, $this->ref_id);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::PASSPORT)) $criteria->add(MlmMt4DemoRequestPeer::PASSPORT, $this->passport);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::SUBJECT)) $criteria->add(MlmMt4DemoRequestPeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::CITY)) $criteria->add(MlmMt4DemoRequestPeer::CITY, $this->city);
		if ($this->isColumnModified(MlmMt4DemoRequestPeer::ADDRESS_STATE)) $criteria->add(MlmMt4DemoRequestPeer::ADDRESS_STATE, $this->address_state);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmMt4DemoRequestPeer::DATABASE_NAME);

		$criteria->add(MlmMt4DemoRequestPeer::REQUEST_ID, $this->request_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRequestId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRequestId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFirstName($this->first_name);

		$copyObj->setEmail($this->email);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setCountry($this->country);

		$copyObj->setPhoneNumber($this->phone_number);

		$copyObj->setLastName($this->last_name);

		$copyObj->setTitle($this->title);

		$copyObj->setLiveDemo($this->live_demo);

		$copyObj->setAddress1($this->address1);

		$copyObj->setAddress2($this->address2);

		$copyObj->setAgreeOfBusiness($this->agree_of_business);

		$copyObj->setRiskDisclosure($this->risk_disclosure);

		$copyObj->setCountryOfCitizen($this->country_of_citizen);

		$copyObj->setDobDay($this->dob_day);

		$copyObj->setDobMonth($this->dob_month);

		$copyObj->setDobYear($this->dob_year);

		$copyObj->setRefId($this->ref_id);

		$copyObj->setPassport($this->passport);

		$copyObj->setSubject($this->subject);

		$copyObj->setCity($this->city);

		$copyObj->setAddressState($this->address_state);


		$copyObj->setNew(true);

		$copyObj->setRequestId(NULL); 
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
			self::$peer = new MlmMt4DemoRequestPeer();
		}
		return self::$peer;
	}

} 