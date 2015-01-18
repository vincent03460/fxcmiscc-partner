<?php


abstract class BaseMlmMd4Account extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $md4_id;


	
	protected $distributor_id;


	
	protected $package_id;


	
	protected $md_user_name;


	
	protected $investor_password;


	
	protected $normal_password;


	
	protected $serial_no;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMd4Id()
	{

		return $this->md4_id;
	}

	
	public function getDistributorId()
	{

		return $this->distributor_id;
	}

	
	public function getPackageId()
	{

		return $this->package_id;
	}

	
	public function getMdUserName()
	{

		return $this->md_user_name;
	}

	
	public function getInvestorPassword()
	{

		return $this->investor_password;
	}

	
	public function getNormalPassword()
	{

		return $this->normal_password;
	}

	
	public function getSerialNo()
	{

		return $this->serial_no;
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

	
	public function setMd4Id($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->md4_id !== $v) {
			$this->md4_id = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::MD4_ID;
		}

	} 

	
	public function setDistributorId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->distributor_id !== $v) {
			$this->distributor_id = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::DISTRIBUTOR_ID;
		}

	} 

	
	public function setPackageId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->package_id !== $v) {
			$this->package_id = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::PACKAGE_ID;
		}

	} 

	
	public function setMdUserName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->md_user_name !== $v) {
			$this->md_user_name = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::MD_USER_NAME;
		}

	} 

	
	public function setInvestorPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->investor_password !== $v) {
			$this->investor_password = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::INVESTOR_PASSWORD;
		}

	} 

	
	public function setNormalPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->normal_password !== $v) {
			$this->normal_password = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::NORMAL_PASSWORD;
		}

	} 

	
	public function setSerialNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->serial_no !== $v) {
			$this->serial_no = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::SERIAL_NO;
		}

	} 

	
	public function setStatusCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::STATUS_CODE;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmMd4AccountPeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmMd4AccountPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmMd4AccountPeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->md4_id = $rs->getInt($startcol + 0);

			$this->distributor_id = $rs->getInt($startcol + 1);

			$this->package_id = $rs->getInt($startcol + 2);

			$this->md_user_name = $rs->getString($startcol + 3);

			$this->investor_password = $rs->getString($startcol + 4);

			$this->normal_password = $rs->getString($startcol + 5);

			$this->serial_no = $rs->getString($startcol + 6);

			$this->status_code = $rs->getString($startcol + 7);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->created_on = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmMd4Account object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMd4AccountPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmMd4AccountPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmMd4AccountPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmMd4AccountPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmMd4AccountPeer::DATABASE_NAME);
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
					$pk = MlmMd4AccountPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setMd4Id($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += MlmMd4AccountPeer::doUpdate($this, $con);
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


			if (($retval = MlmMd4AccountPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMd4AccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMd4Id();
				break;
			case 1:
				return $this->getDistributorId();
				break;
			case 2:
				return $this->getPackageId();
				break;
			case 3:
				return $this->getMdUserName();
				break;
			case 4:
				return $this->getInvestorPassword();
				break;
			case 5:
				return $this->getNormalPassword();
				break;
			case 6:
				return $this->getSerialNo();
				break;
			case 7:
				return $this->getStatusCode();
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
		$keys = MlmMd4AccountPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMd4Id(),
			$keys[1] => $this->getDistributorId(),
			$keys[2] => $this->getPackageId(),
			$keys[3] => $this->getMdUserName(),
			$keys[4] => $this->getInvestorPassword(),
			$keys[5] => $this->getNormalPassword(),
			$keys[6] => $this->getSerialNo(),
			$keys[7] => $this->getStatusCode(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedBy(),
			$keys[11] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmMd4AccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMd4Id($value);
				break;
			case 1:
				$this->setDistributorId($value);
				break;
			case 2:
				$this->setPackageId($value);
				break;
			case 3:
				$this->setMdUserName($value);
				break;
			case 4:
				$this->setInvestorPassword($value);
				break;
			case 5:
				$this->setNormalPassword($value);
				break;
			case 6:
				$this->setSerialNo($value);
				break;
			case 7:
				$this->setStatusCode($value);
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
		$keys = MlmMd4AccountPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMd4Id($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistributorId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPackageId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMdUserName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInvestorPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNormalPassword($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSerialNo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatusCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmMd4AccountPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmMd4AccountPeer::MD4_ID)) $criteria->add(MlmMd4AccountPeer::MD4_ID, $this->md4_id);
		if ($this->isColumnModified(MlmMd4AccountPeer::DISTRIBUTOR_ID)) $criteria->add(MlmMd4AccountPeer::DISTRIBUTOR_ID, $this->distributor_id);
		if ($this->isColumnModified(MlmMd4AccountPeer::PACKAGE_ID)) $criteria->add(MlmMd4AccountPeer::PACKAGE_ID, $this->package_id);
		if ($this->isColumnModified(MlmMd4AccountPeer::MD_USER_NAME)) $criteria->add(MlmMd4AccountPeer::MD_USER_NAME, $this->md_user_name);
		if ($this->isColumnModified(MlmMd4AccountPeer::INVESTOR_PASSWORD)) $criteria->add(MlmMd4AccountPeer::INVESTOR_PASSWORD, $this->investor_password);
		if ($this->isColumnModified(MlmMd4AccountPeer::NORMAL_PASSWORD)) $criteria->add(MlmMd4AccountPeer::NORMAL_PASSWORD, $this->normal_password);
		if ($this->isColumnModified(MlmMd4AccountPeer::SERIAL_NO)) $criteria->add(MlmMd4AccountPeer::SERIAL_NO, $this->serial_no);
		if ($this->isColumnModified(MlmMd4AccountPeer::STATUS_CODE)) $criteria->add(MlmMd4AccountPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmMd4AccountPeer::CREATED_BY)) $criteria->add(MlmMd4AccountPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmMd4AccountPeer::CREATED_ON)) $criteria->add(MlmMd4AccountPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmMd4AccountPeer::UPDATED_BY)) $criteria->add(MlmMd4AccountPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmMd4AccountPeer::UPDATED_ON)) $criteria->add(MlmMd4AccountPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmMd4AccountPeer::DATABASE_NAME);

		$criteria->add(MlmMd4AccountPeer::MD4_ID, $this->md4_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getMd4Id();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setMd4Id($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistributorId($this->distributor_id);

		$copyObj->setPackageId($this->package_id);

		$copyObj->setMdUserName($this->md_user_name);

		$copyObj->setInvestorPassword($this->investor_password);

		$copyObj->setNormalPassword($this->normal_password);

		$copyObj->setSerialNo($this->serial_no);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setMd4Id(NULL); 

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
			self::$peer = new MlmMd4AccountPeer();
		}
		return self::$peer;
	}

} 