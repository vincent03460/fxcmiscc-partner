<?php


abstract class BaseMlmDebitCardRegistration extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $card_id;


	
	protected $dist_id;


	
	protected $account_id;


	
	protected $status_code;


	
	protected $full_name;


	
	protected $dob;


	
	protected $ic;


	
	protected $mother_maiden_name;


	
	protected $name_on_card;


	
	protected $address;


	
	protected $address2;


	
	protected $city;


	
	protected $state;


	
	protected $postcode;


	
	protected $country;


	
	protected $email;


	
	protected $contact;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $remark;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCardId()
	{

		return $this->card_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getAccountId()
	{

		return $this->account_id;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getDob($format = 'Y-m-d')
	{

		if ($this->dob === null || $this->dob === '') {
			return null;
		} elseif (!is_int($this->dob)) {
						$ts = strtotime($this->dob);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [dob] as date/time value: " . var_export($this->dob, true));
			}
		} else {
			$ts = $this->dob;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIc()
	{

		return $this->ic;
	}

	
	public function getMotherMaidenName()
	{

		return $this->mother_maiden_name;
	}

	
	public function getNameOnCard()
	{

		return $this->name_on_card;
	}

	
	public function getAddress()
	{

		return $this->address;
	}

	
	public function getAddress2()
	{

		return $this->address2;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getState()
	{

		return $this->state;
	}

	
	public function getPostcode()
	{

		return $this->postcode;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getContact()
	{

		return $this->contact;
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

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function setCardId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->card_id !== $v) {
			$this->card_id = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::CARD_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::DIST_ID;
		}

	} 
	
	public function setAccountId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::ACCOUNT_ID;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::STATUS_CODE;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::FULL_NAME;
		}

	} 
	
	public function setDob($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [dob] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->dob !== $ts) {
			$this->dob = $ts;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::DOB;
		}

	} 
	
	public function setIc($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ic !== $v) {
			$this->ic = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::IC;
		}

	} 
	
	public function setMotherMaidenName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mother_maiden_name !== $v) {
			$this->mother_maiden_name = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::MOTHER_MAIDEN_NAME;
		}

	} 
	
	public function setNameOnCard($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name_on_card !== $v) {
			$this->name_on_card = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::NAME_ON_CARD;
		}

	} 
	
	public function setAddress($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::ADDRESS;
		}

	} 
	
	public function setAddress2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address2 !== $v) {
			$this->address2 = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::ADDRESS2;
		}

	} 
	
	public function setCity($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::CITY;
		}

	} 
	
	public function setState($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::STATE;
		}

	} 
	
	public function setPostcode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->postcode !== $v) {
			$this->postcode = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::POSTCODE;
		}

	} 
	
	public function setCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::COUNTRY;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::EMAIL;
		}

	} 
	
	public function setContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::CONTACT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::UPDATED_ON;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmDebitCardRegistrationPeer::REMARK;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->card_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->account_id = $rs->getInt($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->full_name = $rs->getString($startcol + 4);

			$this->dob = $rs->getDate($startcol + 5, null);

			$this->ic = $rs->getString($startcol + 6);

			$this->mother_maiden_name = $rs->getString($startcol + 7);

			$this->name_on_card = $rs->getString($startcol + 8);

			$this->address = $rs->getString($startcol + 9);

			$this->address2 = $rs->getString($startcol + 10);

			$this->city = $rs->getString($startcol + 11);

			$this->state = $rs->getString($startcol + 12);

			$this->postcode = $rs->getString($startcol + 13);

			$this->country = $rs->getString($startcol + 14);

			$this->email = $rs->getString($startcol + 15);

			$this->contact = $rs->getString($startcol + 16);

			$this->created_by = $rs->getInt($startcol + 17);

			$this->created_on = $rs->getTimestamp($startcol + 18, null);

			$this->updated_by = $rs->getInt($startcol + 19);

			$this->updated_on = $rs->getTimestamp($startcol + 20, null);

			$this->remark = $rs->getString($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDebitCardRegistration object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDebitCardRegistrationPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDebitCardRegistrationPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDebitCardRegistrationPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDebitCardRegistrationPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDebitCardRegistrationPeer::DATABASE_NAME);
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
					$pk = MlmDebitCardRegistrationPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setCardId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDebitCardRegistrationPeer::doUpdate($this, $con);
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


			if (($retval = MlmDebitCardRegistrationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDebitCardRegistrationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCardId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getAccountId();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getFullName();
				break;
			case 5:
				return $this->getDob();
				break;
			case 6:
				return $this->getIc();
				break;
			case 7:
				return $this->getMotherMaidenName();
				break;
			case 8:
				return $this->getNameOnCard();
				break;
			case 9:
				return $this->getAddress();
				break;
			case 10:
				return $this->getAddress2();
				break;
			case 11:
				return $this->getCity();
				break;
			case 12:
				return $this->getState();
				break;
			case 13:
				return $this->getPostcode();
				break;
			case 14:
				return $this->getCountry();
				break;
			case 15:
				return $this->getEmail();
				break;
			case 16:
				return $this->getContact();
				break;
			case 17:
				return $this->getCreatedBy();
				break;
			case 18:
				return $this->getCreatedOn();
				break;
			case 19:
				return $this->getUpdatedBy();
				break;
			case 20:
				return $this->getUpdatedOn();
				break;
			case 21:
				return $this->getRemark();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDebitCardRegistrationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCardId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getAccountId(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getFullName(),
			$keys[5] => $this->getDob(),
			$keys[6] => $this->getIc(),
			$keys[7] => $this->getMotherMaidenName(),
			$keys[8] => $this->getNameOnCard(),
			$keys[9] => $this->getAddress(),
			$keys[10] => $this->getAddress2(),
			$keys[11] => $this->getCity(),
			$keys[12] => $this->getState(),
			$keys[13] => $this->getPostcode(),
			$keys[14] => $this->getCountry(),
			$keys[15] => $this->getEmail(),
			$keys[16] => $this->getContact(),
			$keys[17] => $this->getCreatedBy(),
			$keys[18] => $this->getCreatedOn(),
			$keys[19] => $this->getUpdatedBy(),
			$keys[20] => $this->getUpdatedOn(),
			$keys[21] => $this->getRemark(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDebitCardRegistrationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCardId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setAccountId($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setFullName($value);
				break;
			case 5:
				$this->setDob($value);
				break;
			case 6:
				$this->setIc($value);
				break;
			case 7:
				$this->setMotherMaidenName($value);
				break;
			case 8:
				$this->setNameOnCard($value);
				break;
			case 9:
				$this->setAddress($value);
				break;
			case 10:
				$this->setAddress2($value);
				break;
			case 11:
				$this->setCity($value);
				break;
			case 12:
				$this->setState($value);
				break;
			case 13:
				$this->setPostcode($value);
				break;
			case 14:
				$this->setCountry($value);
				break;
			case 15:
				$this->setEmail($value);
				break;
			case 16:
				$this->setContact($value);
				break;
			case 17:
				$this->setCreatedBy($value);
				break;
			case 18:
				$this->setCreatedOn($value);
				break;
			case 19:
				$this->setUpdatedBy($value);
				break;
			case 20:
				$this->setUpdatedOn($value);
				break;
			case 21:
				$this->setRemark($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDebitCardRegistrationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCardId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAccountId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFullName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDob($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMotherMaidenName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNameOnCard($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAddress($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAddress2($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCity($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setState($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPostcode($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCountry($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEmail($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setContact($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCreatedBy($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCreatedOn($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUpdatedBy($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setUpdatedOn($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setRemark($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDebitCardRegistrationPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::CARD_ID)) $criteria->add(MlmDebitCardRegistrationPeer::CARD_ID, $this->card_id);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::DIST_ID)) $criteria->add(MlmDebitCardRegistrationPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::ACCOUNT_ID)) $criteria->add(MlmDebitCardRegistrationPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::STATUS_CODE)) $criteria->add(MlmDebitCardRegistrationPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::FULL_NAME)) $criteria->add(MlmDebitCardRegistrationPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::DOB)) $criteria->add(MlmDebitCardRegistrationPeer::DOB, $this->dob);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::IC)) $criteria->add(MlmDebitCardRegistrationPeer::IC, $this->ic);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::MOTHER_MAIDEN_NAME)) $criteria->add(MlmDebitCardRegistrationPeer::MOTHER_MAIDEN_NAME, $this->mother_maiden_name);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::NAME_ON_CARD)) $criteria->add(MlmDebitCardRegistrationPeer::NAME_ON_CARD, $this->name_on_card);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::ADDRESS)) $criteria->add(MlmDebitCardRegistrationPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::ADDRESS2)) $criteria->add(MlmDebitCardRegistrationPeer::ADDRESS2, $this->address2);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::CITY)) $criteria->add(MlmDebitCardRegistrationPeer::CITY, $this->city);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::STATE)) $criteria->add(MlmDebitCardRegistrationPeer::STATE, $this->state);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::POSTCODE)) $criteria->add(MlmDebitCardRegistrationPeer::POSTCODE, $this->postcode);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::COUNTRY)) $criteria->add(MlmDebitCardRegistrationPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::EMAIL)) $criteria->add(MlmDebitCardRegistrationPeer::EMAIL, $this->email);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::CONTACT)) $criteria->add(MlmDebitCardRegistrationPeer::CONTACT, $this->contact);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::CREATED_BY)) $criteria->add(MlmDebitCardRegistrationPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::CREATED_ON)) $criteria->add(MlmDebitCardRegistrationPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::UPDATED_BY)) $criteria->add(MlmDebitCardRegistrationPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::UPDATED_ON)) $criteria->add(MlmDebitCardRegistrationPeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(MlmDebitCardRegistrationPeer::REMARK)) $criteria->add(MlmDebitCardRegistrationPeer::REMARK, $this->remark);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDebitCardRegistrationPeer::DATABASE_NAME);

		$criteria->add(MlmDebitCardRegistrationPeer::CARD_ID, $this->card_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCardId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCardId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setAccountId($this->account_id);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setFullName($this->full_name);

		$copyObj->setDob($this->dob);

		$copyObj->setIc($this->ic);

		$copyObj->setMotherMaidenName($this->mother_maiden_name);

		$copyObj->setNameOnCard($this->name_on_card);

		$copyObj->setAddress($this->address);

		$copyObj->setAddress2($this->address2);

		$copyObj->setCity($this->city);

		$copyObj->setState($this->state);

		$copyObj->setPostcode($this->postcode);

		$copyObj->setCountry($this->country);

		$copyObj->setEmail($this->email);

		$copyObj->setContact($this->contact);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setRemark($this->remark);


		$copyObj->setNew(true);

		$copyObj->setCardId(NULL); 
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
			self::$peer = new MlmDebitCardRegistrationPeer();
		}
		return self::$peer;
	}

} 