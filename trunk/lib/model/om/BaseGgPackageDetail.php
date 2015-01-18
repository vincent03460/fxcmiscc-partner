<?php


abstract class BaseGgPackageDetail extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pkid;


	
	protected $pid;


	
	protected $refno;


	
	protected $qty;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getPkid()
	{

		return $this->pkid;
	}

	
	public function getPid()
	{

		return $this->pid;
	}

	
	public function getRefno()
	{

		return $this->refno;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgPackageDetailPeer::ID;
		}

	} 
	
	public function setPkid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pkid !== $v) {
			$this->pkid = $v;
			$this->modifiedColumns[] = GgPackageDetailPeer::PKID;
		}

	} 
	
	public function setPid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pid !== $v) {
			$this->pid = $v;
			$this->modifiedColumns[] = GgPackageDetailPeer::PID;
		}

	} 
	
	public function setRefno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->refno !== $v) {
			$this->refno = $v;
			$this->modifiedColumns[] = GgPackageDetailPeer::REFNO;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgPackageDetailPeer::QTY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->pkid = $rs->getString($startcol + 1);

			$this->pid = $rs->getString($startcol + 2);

			$this->refno = $rs->getString($startcol + 3);

			$this->qty = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgPackageDetail object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgPackageDetailPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgPackageDetailPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgPackageDetailPeer::DATABASE_NAME);
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
					$pk = GgPackageDetailPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgPackageDetailPeer::doUpdate($this, $con);
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


			if (($retval = GgPackageDetailPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPackageDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPkid();
				break;
			case 2:
				return $this->getPid();
				break;
			case 3:
				return $this->getRefno();
				break;
			case 4:
				return $this->getQty();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPackageDetailPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPkid(),
			$keys[2] => $this->getPid(),
			$keys[3] => $this->getRefno(),
			$keys[4] => $this->getQty(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPackageDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPkid($value);
				break;
			case 2:
				$this->setPid($value);
				break;
			case 3:
				$this->setRefno($value);
				break;
			case 4:
				$this->setQty($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPackageDetailPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPkid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefno($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setQty($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgPackageDetailPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgPackageDetailPeer::ID)) $criteria->add(GgPackageDetailPeer::ID, $this->id);
		if ($this->isColumnModified(GgPackageDetailPeer::PKID)) $criteria->add(GgPackageDetailPeer::PKID, $this->pkid);
		if ($this->isColumnModified(GgPackageDetailPeer::PID)) $criteria->add(GgPackageDetailPeer::PID, $this->pid);
		if ($this->isColumnModified(GgPackageDetailPeer::REFNO)) $criteria->add(GgPackageDetailPeer::REFNO, $this->refno);
		if ($this->isColumnModified(GgPackageDetailPeer::QTY)) $criteria->add(GgPackageDetailPeer::QTY, $this->qty);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgPackageDetailPeer::DATABASE_NAME);

		$criteria->add(GgPackageDetailPeer::ID, $this->id);

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

		$copyObj->setPkid($this->pkid);

		$copyObj->setPid($this->pid);

		$copyObj->setRefno($this->refno);

		$copyObj->setQty($this->qty);


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
			self::$peer = new GgPackageDetailPeer();
		}
		return self::$peer;
	}

} 