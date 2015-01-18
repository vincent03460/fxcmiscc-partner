<?php


abstract class BaseGgMemberCf extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $leg;


	
	protected $volume_type;


	
	protected $bv = 0;


	
	protected $amount;


	
	protected $pair_amount = 0;


	
	protected $flash_amount = 0;


	
	protected $cdate;

	
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

	
	public function getLeg()
	{

		return $this->leg;
	}

	
	public function getVolumeType()
	{

		return $this->volume_type;
	}

	
	public function getBv()
	{

		return $this->bv;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getPairAmount()
	{

		return $this->pair_amount;
	}

	
	public function getFlashAmount()
	{

		return $this->flash_amount;
	}

	
	public function getCdate($format = 'Y-m-d')
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

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::UID;
		}

	} 
	
	public function setLeg($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->leg !== $v) {
			$this->leg = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::LEG;
		}

	} 
	
	public function setVolumeType($v)
	{

		if ($this->volume_type !== $v) {
			$this->volume_type = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::VOLUME_TYPE;
		}

	} 
	
	public function setBv($v)
	{

		if ($this->bv !== $v || $v === 0) {
			$this->bv = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::BV;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::AMOUNT;
		}

	} 
	
	public function setPairAmount($v)
	{

		if ($this->pair_amount !== $v || $v === 0) {
			$this->pair_amount = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::PAIR_AMOUNT;
		}

	} 
	
	public function setFlashAmount($v)
	{

		if ($this->flash_amount !== $v || $v === 0) {
			$this->flash_amount = $v;
			$this->modifiedColumns[] = GgMemberCfPeer::FLASH_AMOUNT;
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
			$this->modifiedColumns[] = GgMemberCfPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->leg = $rs->getInt($startcol + 2);

			$this->volume_type = $rs->getFloat($startcol + 3);

			$this->bv = $rs->getFloat($startcol + 4);

			$this->amount = $rs->getFloat($startcol + 5);

			$this->pair_amount = $rs->getFloat($startcol + 6);

			$this->flash_amount = $rs->getFloat($startcol + 7);

			$this->cdate = $rs->getDate($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMemberCf object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMemberCfPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMemberCfPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMemberCfPeer::DATABASE_NAME);
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
					$pk = GgMemberCfPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMemberCfPeer::doUpdate($this, $con);
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


			if (($retval = GgMemberCfPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLeg();
				break;
			case 3:
				return $this->getVolumeType();
				break;
			case 4:
				return $this->getBv();
				break;
			case 5:
				return $this->getAmount();
				break;
			case 6:
				return $this->getPairAmount();
				break;
			case 7:
				return $this->getFlashAmount();
				break;
			case 8:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberCfPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getLeg(),
			$keys[3] => $this->getVolumeType(),
			$keys[4] => $this->getBv(),
			$keys[5] => $this->getAmount(),
			$keys[6] => $this->getPairAmount(),
			$keys[7] => $this->getFlashAmount(),
			$keys[8] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setLeg($value);
				break;
			case 3:
				$this->setVolumeType($value);
				break;
			case 4:
				$this->setBv($value);
				break;
			case 5:
				$this->setAmount($value);
				break;
			case 6:
				$this->setPairAmount($value);
				break;
			case 7:
				$this->setFlashAmount($value);
				break;
			case 8:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberCfPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLeg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setVolumeType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPairAmount($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFlashAmount($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCdate($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMemberCfPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMemberCfPeer::ID)) $criteria->add(GgMemberCfPeer::ID, $this->id);
		if ($this->isColumnModified(GgMemberCfPeer::UID)) $criteria->add(GgMemberCfPeer::UID, $this->uid);
		if ($this->isColumnModified(GgMemberCfPeer::LEG)) $criteria->add(GgMemberCfPeer::LEG, $this->leg);
		if ($this->isColumnModified(GgMemberCfPeer::VOLUME_TYPE)) $criteria->add(GgMemberCfPeer::VOLUME_TYPE, $this->volume_type);
		if ($this->isColumnModified(GgMemberCfPeer::BV)) $criteria->add(GgMemberCfPeer::BV, $this->bv);
		if ($this->isColumnModified(GgMemberCfPeer::AMOUNT)) $criteria->add(GgMemberCfPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgMemberCfPeer::PAIR_AMOUNT)) $criteria->add(GgMemberCfPeer::PAIR_AMOUNT, $this->pair_amount);
		if ($this->isColumnModified(GgMemberCfPeer::FLASH_AMOUNT)) $criteria->add(GgMemberCfPeer::FLASH_AMOUNT, $this->flash_amount);
		if ($this->isColumnModified(GgMemberCfPeer::CDATE)) $criteria->add(GgMemberCfPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMemberCfPeer::DATABASE_NAME);

		$criteria->add(GgMemberCfPeer::ID, $this->id);

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

		$copyObj->setLeg($this->leg);

		$copyObj->setVolumeType($this->volume_type);

		$copyObj->setBv($this->bv);

		$copyObj->setAmount($this->amount);

		$copyObj->setPairAmount($this->pair_amount);

		$copyObj->setFlashAmount($this->flash_amount);

		$copyObj->setCdate($this->cdate);


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
			self::$peer = new GgMemberCfPeer();
		}
		return self::$peer;
	}

} 