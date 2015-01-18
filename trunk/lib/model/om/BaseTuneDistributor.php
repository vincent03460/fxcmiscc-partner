<?php


abstract class BaseTuneDistributor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $distributor_id;


	
	protected $distributor_code;


	
	protected $user_id;


	
	protected $status_code;


	
	protected $full_name;


	
	protected $nickname;


	
	protected $ic;


	
	protected $country;


	
	protected $address;


	
	protected $postcode;


	
	protected $email;


	
	protected $contact;


	
	protected $gender;


	
	protected $dob;


	
	protected $bank_name;


	
	protected $bank_acc_no;


	
	protected $bank_holder_name;


	
	protected $parent_id;


	
	protected $total_left = 0;


	
	protected $total_right = 0;


	
	protected $tree_level;


	
	protected $tree_structure;


	
	protected $upline_dist_id;


	
	protected $placement_datetime;


	
	protected $active_datetime;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDistributorId()
	{

		return $this->distributor_id;
	}

	
	public function getDistributorCode()
	{

		return $this->distributor_code;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getNickname()
	{

		return $this->nickname;
	}

	
	public function getIc()
	{

		return $this->ic;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getAddress()
	{

		return $this->address;
	}

	
	public function getPostcode()
	{

		return $this->postcode;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getContact()
	{

		return $this->contact;
	}

	
	public function getGender()
	{

		return $this->gender;
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

	
	public function getBankName()
	{

		return $this->bank_name;
	}

	
	public function getBankAccNo()
	{

		return $this->bank_acc_no;
	}

	
	public function getBankHolderName()
	{

		return $this->bank_holder_name;
	}

	
	public function getParentId()
	{

		return $this->parent_id;
	}

	
	public function getTotalLeft()
	{

		return $this->total_left;
	}

	
	public function getTotalRight()
	{

		return $this->total_right;
	}

	
	public function getTreeLevel()
	{

		return $this->tree_level;
	}

	
	public function getTreeStructure()
	{

		return $this->tree_structure;
	}

	
	public function getUplineDistId()
	{

		return $this->upline_dist_id;
	}

	
	public function getPlacementDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->placement_datetime === null || $this->placement_datetime === '') {
			return null;
		} elseif (!is_int($this->placement_datetime)) {
						$ts = strtotime($this->placement_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [placement_datetime] as date/time value: " . var_export($this->placement_datetime, true));
			}
		} else {
			$ts = $this->placement_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getActiveDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->active_datetime === null || $this->active_datetime === '') {
			return null;
		} elseif (!is_int($this->active_datetime)) {
						$ts = strtotime($this->active_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [active_datetime] as date/time value: " . var_export($this->active_datetime, true));
			}
		} else {
			$ts = $this->active_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

	
	public function setDistributorId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->distributor_id !== $v) {
			$this->distributor_id = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::DISTRIBUTOR_ID;
		}

	} 

	
	public function setDistributorCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->distributor_code !== $v) {
			$this->distributor_code = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::DISTRIBUTOR_CODE;
		}

	} 

	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::USER_ID;
		}

	} 

	
	public function setStatusCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::STATUS_CODE;
		}

	} 

	
	public function setFullName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::FULL_NAME;
		}

	} 

	
	public function setNickname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nickname !== $v) {
			$this->nickname = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::NICKNAME;
		}

	} 

	
	public function setIc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ic !== $v) {
			$this->ic = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::IC;
		}

	} 

	
	public function setCountry($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::COUNTRY;
		}

	} 

	
	public function setAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::ADDRESS;
		}

	} 

	
	public function setPostcode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->postcode !== $v) {
			$this->postcode = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::POSTCODE;
		}

	} 

	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::EMAIL;
		}

	} 

	
	public function setContact($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::CONTACT;
		}

	} 

	
	public function setGender($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->gender !== $v) {
			$this->gender = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::GENDER;
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
			$this->modifiedColumns[] = TuneDistributorPeer::DOB;
		}

	} 

	
	public function setBankName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_name !== $v) {
			$this->bank_name = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::BANK_NAME;
		}

	} 

	
	public function setBankAccNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_acc_no !== $v) {
			$this->bank_acc_no = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::BANK_ACC_NO;
		}

	} 

	
	public function setBankHolderName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_holder_name !== $v) {
			$this->bank_holder_name = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::BANK_HOLDER_NAME;
		}

	} 

	
	public function setParentId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->parent_id !== $v) {
			$this->parent_id = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::PARENT_ID;
		}

	} 

	
	public function setTotalLeft($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->total_left !== $v || $v === 0) {
			$this->total_left = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::TOTAL_LEFT;
		}

	} 

	
	public function setTotalRight($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->total_right !== $v || $v === 0) {
			$this->total_right = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::TOTAL_RIGHT;
		}

	} 

	
	public function setTreeLevel($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_level !== $v) {
			$this->tree_level = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::TREE_LEVEL;
		}

	} 

	
	public function setTreeStructure($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tree_structure !== $v) {
			$this->tree_structure = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::TREE_STRUCTURE;
		}

	} 

	
	public function setUplineDistId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->upline_dist_id !== $v) {
			$this->upline_dist_id = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::UPLINE_DIST_ID;
		}

	} 

	
	public function setPlacementDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [placement_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->placement_datetime !== $ts) {
			$this->placement_datetime = $ts;
			$this->modifiedColumns[] = TuneDistributorPeer::PLACEMENT_DATETIME;
		}

	} 

	
	public function setActiveDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [active_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->active_datetime !== $ts) {
			$this->active_datetime = $ts;
			$this->modifiedColumns[] = TuneDistributorPeer::ACTIVE_DATETIME;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::CREATED_BY;
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
			$this->modifiedColumns[] = TuneDistributorPeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = TuneDistributorPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = TuneDistributorPeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->distributor_id = $rs->getInt($startcol + 0);

			$this->distributor_code = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->status_code = $rs->getString($startcol + 3);

			$this->full_name = $rs->getString($startcol + 4);

			$this->nickname = $rs->getString($startcol + 5);

			$this->ic = $rs->getString($startcol + 6);

			$this->country = $rs->getString($startcol + 7);

			$this->address = $rs->getString($startcol + 8);

			$this->postcode = $rs->getString($startcol + 9);

			$this->email = $rs->getString($startcol + 10);

			$this->contact = $rs->getString($startcol + 11);

			$this->gender = $rs->getString($startcol + 12);

			$this->dob = $rs->getDate($startcol + 13, null);

			$this->bank_name = $rs->getString($startcol + 14);

			$this->bank_acc_no = $rs->getString($startcol + 15);

			$this->bank_holder_name = $rs->getString($startcol + 16);

			$this->parent_id = $rs->getInt($startcol + 17);

			$this->total_left = $rs->getInt($startcol + 18);

			$this->total_right = $rs->getInt($startcol + 19);

			$this->tree_level = $rs->getInt($startcol + 20);

			$this->tree_structure = $rs->getString($startcol + 21);

			$this->upline_dist_id = $rs->getInt($startcol + 22);

			$this->placement_datetime = $rs->getTimestamp($startcol + 23, null);

			$this->active_datetime = $rs->getTimestamp($startcol + 24, null);

			$this->created_by = $rs->getInt($startcol + 25);

			$this->created_on = $rs->getTimestamp($startcol + 26, null);

			$this->updated_by = $rs->getInt($startcol + 27);

			$this->updated_on = $rs->getTimestamp($startcol + 28, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 29; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TuneDistributor object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TuneDistributorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TuneDistributorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(TuneDistributorPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TuneDistributorPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TuneDistributorPeer::DATABASE_NAME);
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
		$affectedRows = 0; 
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TuneDistributorPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setDistributorId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += TuneDistributorPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 
			}

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


			if (($retval = TuneDistributorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TuneDistributorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDistributorId();
				break;
			case 1:
				return $this->getDistributorCode();
				break;
			case 2:
				return $this->getUserId();
				break;
			case 3:
				return $this->getStatusCode();
				break;
			case 4:
				return $this->getFullName();
				break;
			case 5:
				return $this->getNickname();
				break;
			case 6:
				return $this->getIc();
				break;
			case 7:
				return $this->getCountry();
				break;
			case 8:
				return $this->getAddress();
				break;
			case 9:
				return $this->getPostcode();
				break;
			case 10:
				return $this->getEmail();
				break;
			case 11:
				return $this->getContact();
				break;
			case 12:
				return $this->getGender();
				break;
			case 13:
				return $this->getDob();
				break;
			case 14:
				return $this->getBankName();
				break;
			case 15:
				return $this->getBankAccNo();
				break;
			case 16:
				return $this->getBankHolderName();
				break;
			case 17:
				return $this->getParentId();
				break;
			case 18:
				return $this->getTotalLeft();
				break;
			case 19:
				return $this->getTotalRight();
				break;
			case 20:
				return $this->getTreeLevel();
				break;
			case 21:
				return $this->getTreeStructure();
				break;
			case 22:
				return $this->getUplineDistId();
				break;
			case 23:
				return $this->getPlacementDatetime();
				break;
			case 24:
				return $this->getActiveDatetime();
				break;
			case 25:
				return $this->getCreatedBy();
				break;
			case 26:
				return $this->getCreatedOn();
				break;
			case 27:
				return $this->getUpdatedBy();
				break;
			case 28:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TuneDistributorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDistributorId(),
			$keys[1] => $this->getDistributorCode(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getStatusCode(),
			$keys[4] => $this->getFullName(),
			$keys[5] => $this->getNickname(),
			$keys[6] => $this->getIc(),
			$keys[7] => $this->getCountry(),
			$keys[8] => $this->getAddress(),
			$keys[9] => $this->getPostcode(),
			$keys[10] => $this->getEmail(),
			$keys[11] => $this->getContact(),
			$keys[12] => $this->getGender(),
			$keys[13] => $this->getDob(),
			$keys[14] => $this->getBankName(),
			$keys[15] => $this->getBankAccNo(),
			$keys[16] => $this->getBankHolderName(),
			$keys[17] => $this->getParentId(),
			$keys[18] => $this->getTotalLeft(),
			$keys[19] => $this->getTotalRight(),
			$keys[20] => $this->getTreeLevel(),
			$keys[21] => $this->getTreeStructure(),
			$keys[22] => $this->getUplineDistId(),
			$keys[23] => $this->getPlacementDatetime(),
			$keys[24] => $this->getActiveDatetime(),
			$keys[25] => $this->getCreatedBy(),
			$keys[26] => $this->getCreatedOn(),
			$keys[27] => $this->getUpdatedBy(),
			$keys[28] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TuneDistributorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDistributorId($value);
				break;
			case 1:
				$this->setDistributorCode($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
			case 3:
				$this->setStatusCode($value);
				break;
			case 4:
				$this->setFullName($value);
				break;
			case 5:
				$this->setNickname($value);
				break;
			case 6:
				$this->setIc($value);
				break;
			case 7:
				$this->setCountry($value);
				break;
			case 8:
				$this->setAddress($value);
				break;
			case 9:
				$this->setPostcode($value);
				break;
			case 10:
				$this->setEmail($value);
				break;
			case 11:
				$this->setContact($value);
				break;
			case 12:
				$this->setGender($value);
				break;
			case 13:
				$this->setDob($value);
				break;
			case 14:
				$this->setBankName($value);
				break;
			case 15:
				$this->setBankAccNo($value);
				break;
			case 16:
				$this->setBankHolderName($value);
				break;
			case 17:
				$this->setParentId($value);
				break;
			case 18:
				$this->setTotalLeft($value);
				break;
			case 19:
				$this->setTotalRight($value);
				break;
			case 20:
				$this->setTreeLevel($value);
				break;
			case 21:
				$this->setTreeStructure($value);
				break;
			case 22:
				$this->setUplineDistId($value);
				break;
			case 23:
				$this->setPlacementDatetime($value);
				break;
			case 24:
				$this->setActiveDatetime($value);
				break;
			case 25:
				$this->setCreatedBy($value);
				break;
			case 26:
				$this->setCreatedOn($value);
				break;
			case 27:
				$this->setUpdatedBy($value);
				break;
			case 28:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TuneDistributorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDistributorId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistributorCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatusCode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFullName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNickname($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCountry($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAddress($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPostcode($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmail($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setContact($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setGender($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDob($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBankName($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setBankAccNo($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBankHolderName($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setParentId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTotalLeft($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTotalRight($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setTreeLevel($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setTreeStructure($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setUplineDistId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setPlacementDatetime($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setActiveDatetime($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCreatedBy($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCreatedOn($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setUpdatedBy($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setUpdatedOn($arr[$keys[28]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TuneDistributorPeer::DATABASE_NAME);

		if ($this->isColumnModified(TuneDistributorPeer::DISTRIBUTOR_ID)) $criteria->add(TuneDistributorPeer::DISTRIBUTOR_ID, $this->distributor_id);
		if ($this->isColumnModified(TuneDistributorPeer::DISTRIBUTOR_CODE)) $criteria->add(TuneDistributorPeer::DISTRIBUTOR_CODE, $this->distributor_code);
		if ($this->isColumnModified(TuneDistributorPeer::USER_ID)) $criteria->add(TuneDistributorPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(TuneDistributorPeer::STATUS_CODE)) $criteria->add(TuneDistributorPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(TuneDistributorPeer::FULL_NAME)) $criteria->add(TuneDistributorPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(TuneDistributorPeer::NICKNAME)) $criteria->add(TuneDistributorPeer::NICKNAME, $this->nickname);
		if ($this->isColumnModified(TuneDistributorPeer::IC)) $criteria->add(TuneDistributorPeer::IC, $this->ic);
		if ($this->isColumnModified(TuneDistributorPeer::COUNTRY)) $criteria->add(TuneDistributorPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(TuneDistributorPeer::ADDRESS)) $criteria->add(TuneDistributorPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(TuneDistributorPeer::POSTCODE)) $criteria->add(TuneDistributorPeer::POSTCODE, $this->postcode);
		if ($this->isColumnModified(TuneDistributorPeer::EMAIL)) $criteria->add(TuneDistributorPeer::EMAIL, $this->email);
		if ($this->isColumnModified(TuneDistributorPeer::CONTACT)) $criteria->add(TuneDistributorPeer::CONTACT, $this->contact);
		if ($this->isColumnModified(TuneDistributorPeer::GENDER)) $criteria->add(TuneDistributorPeer::GENDER, $this->gender);
		if ($this->isColumnModified(TuneDistributorPeer::DOB)) $criteria->add(TuneDistributorPeer::DOB, $this->dob);
		if ($this->isColumnModified(TuneDistributorPeer::BANK_NAME)) $criteria->add(TuneDistributorPeer::BANK_NAME, $this->bank_name);
		if ($this->isColumnModified(TuneDistributorPeer::BANK_ACC_NO)) $criteria->add(TuneDistributorPeer::BANK_ACC_NO, $this->bank_acc_no);
		if ($this->isColumnModified(TuneDistributorPeer::BANK_HOLDER_NAME)) $criteria->add(TuneDistributorPeer::BANK_HOLDER_NAME, $this->bank_holder_name);
		if ($this->isColumnModified(TuneDistributorPeer::PARENT_ID)) $criteria->add(TuneDistributorPeer::PARENT_ID, $this->parent_id);
		if ($this->isColumnModified(TuneDistributorPeer::TOTAL_LEFT)) $criteria->add(TuneDistributorPeer::TOTAL_LEFT, $this->total_left);
		if ($this->isColumnModified(TuneDistributorPeer::TOTAL_RIGHT)) $criteria->add(TuneDistributorPeer::TOTAL_RIGHT, $this->total_right);
		if ($this->isColumnModified(TuneDistributorPeer::TREE_LEVEL)) $criteria->add(TuneDistributorPeer::TREE_LEVEL, $this->tree_level);
		if ($this->isColumnModified(TuneDistributorPeer::TREE_STRUCTURE)) $criteria->add(TuneDistributorPeer::TREE_STRUCTURE, $this->tree_structure);
		if ($this->isColumnModified(TuneDistributorPeer::UPLINE_DIST_ID)) $criteria->add(TuneDistributorPeer::UPLINE_DIST_ID, $this->upline_dist_id);
		if ($this->isColumnModified(TuneDistributorPeer::PLACEMENT_DATETIME)) $criteria->add(TuneDistributorPeer::PLACEMENT_DATETIME, $this->placement_datetime);
		if ($this->isColumnModified(TuneDistributorPeer::ACTIVE_DATETIME)) $criteria->add(TuneDistributorPeer::ACTIVE_DATETIME, $this->active_datetime);
		if ($this->isColumnModified(TuneDistributorPeer::CREATED_BY)) $criteria->add(TuneDistributorPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TuneDistributorPeer::CREATED_ON)) $criteria->add(TuneDistributorPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(TuneDistributorPeer::UPDATED_BY)) $criteria->add(TuneDistributorPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(TuneDistributorPeer::UPDATED_ON)) $criteria->add(TuneDistributorPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TuneDistributorPeer::DATABASE_NAME);

		$criteria->add(TuneDistributorPeer::DISTRIBUTOR_ID, $this->distributor_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getDistributorId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setDistributorId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistributorCode($this->distributor_code);

		$copyObj->setUserId($this->user_id);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setFullName($this->full_name);

		$copyObj->setNickname($this->nickname);

		$copyObj->setIc($this->ic);

		$copyObj->setCountry($this->country);

		$copyObj->setAddress($this->address);

		$copyObj->setPostcode($this->postcode);

		$copyObj->setEmail($this->email);

		$copyObj->setContact($this->contact);

		$copyObj->setGender($this->gender);

		$copyObj->setDob($this->dob);

		$copyObj->setBankName($this->bank_name);

		$copyObj->setBankAccNo($this->bank_acc_no);

		$copyObj->setBankHolderName($this->bank_holder_name);

		$copyObj->setParentId($this->parent_id);

		$copyObj->setTotalLeft($this->total_left);

		$copyObj->setTotalRight($this->total_right);

		$copyObj->setTreeLevel($this->tree_level);

		$copyObj->setTreeStructure($this->tree_structure);

		$copyObj->setUplineDistId($this->upline_dist_id);

		$copyObj->setPlacementDatetime($this->placement_datetime);

		$copyObj->setActiveDatetime($this->active_datetime);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setDistributorId(NULL); 

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
			self::$peer = new TuneDistributorPeer();
		}
		return self::$peer;
	}

} 