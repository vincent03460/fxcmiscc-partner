<?php


abstract class BaseGgStckProdQtyRecord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pid;


	
	protected $slid;


	
	protected $sslid;


	
	protected $sid;


	
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

	
	public function getSlid()
	{

		return $this->slid;
	}

	
	public function getSslid()
	{

		return $this->sslid;
	}

	
	public function getSid()
	{

		return $this->sid;
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
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::ID;
		}

	} 
	
	public function setPid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pid !== $v) {
			$this->pid = $v;
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::PID;
		}

	} 
	
	public function setSlid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slid !== $v) {
			$this->slid = $v;
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::SLID;
		}

	} 
	
	public function setSslid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sslid !== $v) {
			$this->sslid = $v;
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::SSLID;
		}

	} 
	
	public function setSid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sid !== $v) {
			$this->sid = $v;
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::SID;
		}

	} 
	
	public function setTtype($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ttype !== $v) {
			$this->ttype = $v;
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::TTYPE;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::TYPE;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::QTY;
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
			$this->modifiedColumns[] = GgStckProdQtyRecordPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->pid = $rs->getString($startcol + 1);

			$this->slid = $rs->getString($startcol + 2);

			$this->sslid = $rs->getString($startcol + 3);

			$this->sid = $rs->getString($startcol + 4);

			$this->ttype = $rs->getString($startcol + 5);

			$this->type = $rs->getString($startcol + 6);

			$this->qty = $rs->getInt($startcol + 7);

			$this->cdate = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgStckProdQtyRecord object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgStckProdQtyRecordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgStckProdQtyRecordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgStckProdQtyRecordPeer::DATABASE_NAME);
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
					$pk = GgStckProdQtyRecordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgStckProdQtyRecordPeer::doUpdate($this, $con);
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


			if (($retval = GgStckProdQtyRecordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgStckProdQtyRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSlid();
				break;
			case 3:
				return $this->getSslid();
				break;
			case 4:
				return $this->getSid();
				break;
			case 5:
				return $this->getTtype();
				break;
			case 6:
				return $this->getType();
				break;
			case 7:
				return $this->getQty();
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
		$keys = GgStckProdQtyRecordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPid(),
			$keys[2] => $this->getSlid(),
			$keys[3] => $this->getSslid(),
			$keys[4] => $this->getSid(),
			$keys[5] => $this->getTtype(),
			$keys[6] => $this->getType(),
			$keys[7] => $this->getQty(),
			$keys[8] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgStckProdQtyRecordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSlid($value);
				break;
			case 3:
				$this->setSslid($value);
				break;
			case 4:
				$this->setSid($value);
				break;
			case 5:
				$this->setTtype($value);
				break;
			case 6:
				$this->setType($value);
				break;
			case 7:
				$this->setQty($value);
				break;
			case 8:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgStckProdQtyRecordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSslid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTtype($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setType($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setQty($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCdate($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgStckProdQtyRecordPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgStckProdQtyRecordPeer::ID)) $criteria->add(GgStckProdQtyRecordPeer::ID, $this->id);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::PID)) $criteria->add(GgStckProdQtyRecordPeer::PID, $this->pid);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::SLID)) $criteria->add(GgStckProdQtyRecordPeer::SLID, $this->slid);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::SSLID)) $criteria->add(GgStckProdQtyRecordPeer::SSLID, $this->sslid);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::SID)) $criteria->add(GgStckProdQtyRecordPeer::SID, $this->sid);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::TTYPE)) $criteria->add(GgStckProdQtyRecordPeer::TTYPE, $this->ttype);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::TYPE)) $criteria->add(GgStckProdQtyRecordPeer::TYPE, $this->type);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::QTY)) $criteria->add(GgStckProdQtyRecordPeer::QTY, $this->qty);
		if ($this->isColumnModified(GgStckProdQtyRecordPeer::CDATE)) $criteria->add(GgStckProdQtyRecordPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgStckProdQtyRecordPeer::DATABASE_NAME);

		$criteria->add(GgStckProdQtyRecordPeer::ID, $this->id);

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

		$copyObj->setSlid($this->slid);

		$copyObj->setSslid($this->sslid);

		$copyObj->setSid($this->sid);

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
			self::$peer = new GgStckProdQtyRecordPeer();
		}
		return self::$peer;
	}

} 