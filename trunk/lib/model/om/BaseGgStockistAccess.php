<?php


abstract class BaseGgStockistAccess extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $password;


	
	protected $uid = 0;


	
	protected $cid = 0;


	
	protected $udate;


	
	protected $cdate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPassword()
	{

		return $this->password;
	}

	
	public function getUid()
	{

		return $this->uid;
	}

	
	public function getCid()
	{

		return $this->cid;
	}

	
	public function getUdate($format = 'Y-m-d')
	{

		if ($this->udate === null || $this->udate === '') {
			return null;
		} elseif (!is_int($this->udate)) {
						$ts = strtotime($this->udate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [udate] as date/time value: " . var_export($this->udate, true));
			}
		} else {
			$ts = $this->udate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgStockistAccessPeer::ID;
		}

	} 
	
	public function setPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = GgStockistAccessPeer::PASSWORD;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uid !== $v || $v === 0) {
			$this->uid = $v;
			$this->modifiedColumns[] = GgStockistAccessPeer::UID;
		}

	} 
	
	public function setCid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->cid !== $v || $v === 0) {
			$this->cid = $v;
			$this->modifiedColumns[] = GgStockistAccessPeer::CID;
		}

	} 
	
	public function setUdate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [udate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->udate !== $ts) {
			$this->udate = $ts;
			$this->modifiedColumns[] = GgStockistAccessPeer::UDATE;
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
			$this->modifiedColumns[] = GgStockistAccessPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->password = $rs->getString($startcol + 1);

			$this->uid = $rs->getInt($startcol + 2);

			$this->cid = $rs->getInt($startcol + 3);

			$this->udate = $rs->getDate($startcol + 4, null);

			$this->cdate = $rs->getDate($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgStockistAccess object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgStockistAccessPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgStockistAccessPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgStockistAccessPeer::DATABASE_NAME);
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
					$pk = GgStockistAccessPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgStockistAccessPeer::doUpdate($this, $con);
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


			if (($retval = GgStockistAccessPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgStockistAccessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPassword();
				break;
			case 2:
				return $this->getUid();
				break;
			case 3:
				return $this->getCid();
				break;
			case 4:
				return $this->getUdate();
				break;
			case 5:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgStockistAccessPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPassword(),
			$keys[2] => $this->getUid(),
			$keys[3] => $this->getCid(),
			$keys[4] => $this->getUdate(),
			$keys[5] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgStockistAccessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPassword($value);
				break;
			case 2:
				$this->setUid($value);
				break;
			case 3:
				$this->setCid($value);
				break;
			case 4:
				$this->setUdate($value);
				break;
			case 5:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgStockistAccessPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPassword($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUdate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCdate($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgStockistAccessPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgStockistAccessPeer::ID)) $criteria->add(GgStockistAccessPeer::ID, $this->id);
		if ($this->isColumnModified(GgStockistAccessPeer::PASSWORD)) $criteria->add(GgStockistAccessPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(GgStockistAccessPeer::UID)) $criteria->add(GgStockistAccessPeer::UID, $this->uid);
		if ($this->isColumnModified(GgStockistAccessPeer::CID)) $criteria->add(GgStockistAccessPeer::CID, $this->cid);
		if ($this->isColumnModified(GgStockistAccessPeer::UDATE)) $criteria->add(GgStockistAccessPeer::UDATE, $this->udate);
		if ($this->isColumnModified(GgStockistAccessPeer::CDATE)) $criteria->add(GgStockistAccessPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgStockistAccessPeer::DATABASE_NAME);

		$criteria->add(GgStockistAccessPeer::ID, $this->id);

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

		$copyObj->setPassword($this->password);

		$copyObj->setUid($this->uid);

		$copyObj->setCid($this->cid);

		$copyObj->setUdate($this->udate);

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
			self::$peer = new GgStockistAccessPeer();
		}
		return self::$peer;
	}

} 