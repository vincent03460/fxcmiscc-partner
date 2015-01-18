<?php


abstract class BaseGgProdQtyRecord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pid;


	
	protected $sid;


	
	protected $ssid;


	
	protected $ttype;


	
	protected $type;


	
	protected $qty;


	
	protected $cdate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPid()
	{

		return $this->pid;
	}

	
	public function getSid()
	{

		return $this->sid;
	}

	
	public function getSsid()
	{

		return $this->ssid;
	}

	
	public function getTtype()
	{

		return $this->ttype;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getQty()
	{

		return $this->qty;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgProdQtyRecordPeer::ID;
		}

	} 
	
	public function setPid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pid !== $v) {
			$this->pid = $v;
			$this->modifiedColumns[] = GgProdQtyRecordPeer::PID;
		}

	} 
	
	public function setSid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sid !== $v) {
			$this->sid = $v;
			$this->modifiedColumns[] = GgProdQtyRecordPeer::SID;
		}

	} 
	
	public function setSsid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ssid !== $v) {
			$this->ssid = $v;
			$this->modifiedColumns[] = GgProdQtyRecordPeer::SSID;
		}

	} 
	
	public function setTtype($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ttype !== $v) {
			$this->ttype = $v;
			$this->modifiedColumns[] = GgProdQtyRecordPeer::TTYPE;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = GgProdQtyRecordPeer::TYPE;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgProdQtyRecordPeer::QTY;
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
			$this->modifiedColumns[] = GgProdQtyRecordPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->pid = $rs->getString($startcol + 1);

			$this->sid = $rs->getString($startcol + 2);

			$this->ssid = $rs->getString($startcol + 3);

			$this->ttype = $rs->getString($startcol + 4);

			$this->type = $rs->getString($startcol + 5);

			$this->qty = $rs->getInt($startcol + 6);

			$this->cdate = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgProdQtyRecord object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgProdQtyRecordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgProdQtyRecordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgProdQtyRecordPeer::DATABASE_NAME);
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
					$pk = GgProdQtyRecordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgProdQtyRecordPeer::doUpdate($this, $con);
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


			if (($retval = GgProdQtyRecordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgProdQtyRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPid();
				break;
			case 2:
				return $this->getSid();
				break;
			case 3:
				return $this->getSsid();
				break;
			case 4:
				return $this->getTtype();
				break;
			case 5:
				return $this->getType();
				break;
			case 6:
				return $this->getQty();
				break;
			case 7:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgProdQtyRecordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPid(),
			$keys[2] => $this->getSid(),
			$keys[3] => $this->getSsid(),
			$keys[4] => $this->getTtype(),
			$keys[5] => $this->getType(),
			$keys[6] => $this->getQty(),
			$keys[7] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgProdQtyRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPid($value);
				break;
			case 2:
				$this->setSid($value);
				break;
			case 3:
				$this->setSsid($value);
				break;
			case 4:
				$this->setTtype($value);
				break;
			case 5:
				$this->setType($value);
				break;
			case 6:
				$this->setQty($value);
				break;
			case 7:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgProdQtyRecordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSsid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTtype($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setQty($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCdate($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgProdQtyRecordPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgProdQtyRecordPeer::ID)) $criteria->add(GgProdQtyRecordPeer::ID, $this->id);
		if ($this->isColumnModified(GgProdQtyRecordPeer::PID)) $criteria->add(GgProdQtyRecordPeer::PID, $this->pid);
		if ($this->isColumnModified(GgProdQtyRecordPeer::SID)) $criteria->add(GgProdQtyRecordPeer::SID, $this->sid);
		if ($this->isColumnModified(GgProdQtyRecordPeer::SSID)) $criteria->add(GgProdQtyRecordPeer::SSID, $this->ssid);
		if ($this->isColumnModified(GgProdQtyRecordPeer::TTYPE)) $criteria->add(GgProdQtyRecordPeer::TTYPE, $this->ttype);
		if ($this->isColumnModified(GgProdQtyRecordPeer::TYPE)) $criteria->add(GgProdQtyRecordPeer::TYPE, $this->type);
		if ($this->isColumnModified(GgProdQtyRecordPeer::QTY)) $criteria->add(GgProdQtyRecordPeer::QTY, $this->qty);
		if ($this->isColumnModified(GgProdQtyRecordPeer::CDATE)) $criteria->add(GgProdQtyRecordPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgProdQtyRecordPeer::DATABASE_NAME);

		$criteria->add(GgProdQtyRecordPeer::ID, $this->id);

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

		$copyObj->setPid($this->pid);

		$copyObj->setSid($this->sid);

		$copyObj->setSsid($this->ssid);

		$copyObj->setTtype($this->ttype);

		$copyObj->setType($this->type);

		$copyObj->setQty($this->qty);

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
			self::$peer = new GgProdQtyRecordPeer();
		}
		return self::$peer;
	}

} 