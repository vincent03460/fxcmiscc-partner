<?php


abstract class BaseAbxMemberCf extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $did = '0';


	
	protected $amount = 0;


	
	protected $odate;


	
	protected $cdate;


	
	protected $back_amount;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUid()
	{

		return $this->uid;
	}

	
	public function getDid()
	{

		return $this->did;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getOdate($format = 'Y-m-d')
	{

		if ($this->odate === null || $this->odate === '') {
			return null;
		} elseif (!is_int($this->odate)) {
						$ts = strtotime($this->odate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [odate] as date/time value: " . var_export($this->odate, true));
			}
		} else {
			$ts = $this->odate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCdate($format = 'Y-m-d H:i:s')
	{

		if ($this->cdate === null || $this->cdate === '') {
			return null;
		} elseif (!is_int($this->cdate)) {
						$ts = strtotime($this->cdate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [cdate] as date/time value: " . var_export($this->cdate, true));
			}
		} else {
			$ts = $this->cdate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getBackAmount()
	{

		return $this->back_amount;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AbxMemberCfPeer::ID;
		}

	} 

	
	public function setUid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = AbxMemberCfPeer::UID;
		}

	} 

	
	public function setDid($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->did !== $v || $v === '0') {
			$this->did = $v;
			$this->modifiedColumns[] = AbxMemberCfPeer::DID;
		}

	} 

	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = AbxMemberCfPeer::AMOUNT;
		}

	} 

	
	public function setOdate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [odate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->odate !== $ts) {
			$this->odate = $ts;
			$this->modifiedColumns[] = AbxMemberCfPeer::ODATE;
		}

	} 

	
	public function setCdate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [cdate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->cdate !== $ts) {
			$this->cdate = $ts;
			$this->modifiedColumns[] = AbxMemberCfPeer::CDATE;
		}

	} 

	
	public function setBackAmount($v)
	{

		if ($this->back_amount !== $v) {
			$this->back_amount = $v;
			$this->modifiedColumns[] = AbxMemberCfPeer::BACK_AMOUNT;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->did = $rs->getString($startcol + 2);

			$this->amount = $rs->getFloat($startcol + 3);

			$this->odate = $rs->getDate($startcol + 4, null);

			$this->cdate = $rs->getTimestamp($startcol + 5, null);

			$this->back_amount = $rs->getFloat($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AbxMemberCf object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbxMemberCfPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AbxMemberCfPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbxMemberCfPeer::DATABASE_NAME);
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
					$pk = AbxMemberCfPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += AbxMemberCfPeer::doUpdate($this, $con);
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


			if (($retval = AbxMemberCfPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbxMemberCfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUid();
				break;
			case 2:
				return $this->getDid();
				break;
			case 3:
				return $this->getAmount();
				break;
			case 4:
				return $this->getOdate();
				break;
			case 5:
				return $this->getCdate();
				break;
			case 6:
				return $this->getBackAmount();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbxMemberCfPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getDid(),
			$keys[3] => $this->getAmount(),
			$keys[4] => $this->getOdate(),
			$keys[5] => $this->getCdate(),
			$keys[6] => $this->getBackAmount(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbxMemberCfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUid($value);
				break;
			case 2:
				$this->setDid($value);
				break;
			case 3:
				$this->setAmount($value);
				break;
			case 4:
				$this->setOdate($value);
				break;
			case 5:
				$this->setCdate($value);
				break;
			case 6:
				$this->setBackAmount($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbxMemberCfPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAmount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOdate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCdate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBackAmount($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AbxMemberCfPeer::DATABASE_NAME);

		if ($this->isColumnModified(AbxMemberCfPeer::ID)) $criteria->add(AbxMemberCfPeer::ID, $this->id);
		if ($this->isColumnModified(AbxMemberCfPeer::UID)) $criteria->add(AbxMemberCfPeer::UID, $this->uid);
		if ($this->isColumnModified(AbxMemberCfPeer::DID)) $criteria->add(AbxMemberCfPeer::DID, $this->did);
		if ($this->isColumnModified(AbxMemberCfPeer::AMOUNT)) $criteria->add(AbxMemberCfPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(AbxMemberCfPeer::ODATE)) $criteria->add(AbxMemberCfPeer::ODATE, $this->odate);
		if ($this->isColumnModified(AbxMemberCfPeer::CDATE)) $criteria->add(AbxMemberCfPeer::CDATE, $this->cdate);
		if ($this->isColumnModified(AbxMemberCfPeer::BACK_AMOUNT)) $criteria->add(AbxMemberCfPeer::BACK_AMOUNT, $this->back_amount);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AbxMemberCfPeer::DATABASE_NAME);

		$criteria->add(AbxMemberCfPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUid($this->uid);

		$copyObj->setDid($this->did);

		$copyObj->setAmount($this->amount);

		$copyObj->setOdate($this->odate);

		$copyObj->setCdate($this->cdate);

		$copyObj->setBackAmount($this->back_amount);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 

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
			self::$peer = new AbxMemberCfPeer();
		}
		return self::$peer;
	}

} 