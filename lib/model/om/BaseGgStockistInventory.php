<?php


abstract class BaseGgStockistInventory extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $sid;


	
	protected $pid;


	
	protected $refno;


	
	protected $title;


	
	protected $bv;


	
	protected $dp;


	
	protected $rp;


	
	protected $qty;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getSid()
	{

		return $this->sid;
	}

	
	public function getPid()
	{

		return $this->pid;
	}

	
	public function getRefno()
	{

		return $this->refno;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getBv()
	{

		return $this->bv;
	}

	
	public function getDp()
	{

		return $this->dp;
	}

	
	public function getRp()
	{

		return $this->rp;
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
			$this->modifiedColumns[] = GgStockistInventoryPeer::ID;
		}

	} 
	
	public function setSid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sid !== $v) {
			$this->sid = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::SID;
		}

	} 
	
	public function setPid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pid !== $v) {
			$this->pid = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::PID;
		}

	} 
	
	public function setRefno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->refno !== $v) {
			$this->refno = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::REFNO;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::TITLE;
		}

	} 
	
	public function setBv($v)
	{

		if ($this->bv !== $v) {
			$this->bv = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::BV;
		}

	} 
	
	public function setDp($v)
	{

		if ($this->dp !== $v) {
			$this->dp = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::DP;
		}

	} 
	
	public function setRp($v)
	{

		if ($this->rp !== $v) {
			$this->rp = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::RP;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgStockistInventoryPeer::QTY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->sid = $rs->getString($startcol + 1);

			$this->pid = $rs->getString($startcol + 2);

			$this->refno = $rs->getString($startcol + 3);

			$this->title = $rs->getString($startcol + 4);

			$this->bv = $rs->getFloat($startcol + 5);

			$this->dp = $rs->getFloat($startcol + 6);

			$this->rp = $rs->getFloat($startcol + 7);

			$this->qty = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgStockistInventory object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgStockistInventoryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgStockistInventoryPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgStockistInventoryPeer::DATABASE_NAME);
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
					$pk = GgStockistInventoryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgStockistInventoryPeer::doUpdate($this, $con);
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


			if (($retval = GgStockistInventoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgStockistInventoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSid();
				break;
			case 2:
				return $this->getPid();
				break;
			case 3:
				return $this->getRefno();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getBv();
				break;
			case 6:
				return $this->getDp();
				break;
			case 7:
				return $this->getRp();
				break;
			case 8:
				return $this->getQty();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgStockistInventoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSid(),
			$keys[2] => $this->getPid(),
			$keys[3] => $this->getRefno(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getBv(),
			$keys[6] => $this->getDp(),
			$keys[7] => $this->getRp(),
			$keys[8] => $this->getQty(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgStockistInventoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSid($value);
				break;
			case 2:
				$this->setPid($value);
				break;
			case 3:
				$this->setRefno($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setBv($value);
				break;
			case 6:
				$this->setDp($value);
				break;
			case 7:
				$this->setRp($value);
				break;
			case 8:
				$this->setQty($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgStockistInventoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefno($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setQty($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgStockistInventoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgStockistInventoryPeer::ID)) $criteria->add(GgStockistInventoryPeer::ID, $this->id);
		if ($this->isColumnModified(GgStockistInventoryPeer::SID)) $criteria->add(GgStockistInventoryPeer::SID, $this->sid);
		if ($this->isColumnModified(GgStockistInventoryPeer::PID)) $criteria->add(GgStockistInventoryPeer::PID, $this->pid);
		if ($this->isColumnModified(GgStockistInventoryPeer::REFNO)) $criteria->add(GgStockistInventoryPeer::REFNO, $this->refno);
		if ($this->isColumnModified(GgStockistInventoryPeer::TITLE)) $criteria->add(GgStockistInventoryPeer::TITLE, $this->title);
		if ($this->isColumnModified(GgStockistInventoryPeer::BV)) $criteria->add(GgStockistInventoryPeer::BV, $this->bv);
		if ($this->isColumnModified(GgStockistInventoryPeer::DP)) $criteria->add(GgStockistInventoryPeer::DP, $this->dp);
		if ($this->isColumnModified(GgStockistInventoryPeer::RP)) $criteria->add(GgStockistInventoryPeer::RP, $this->rp);
		if ($this->isColumnModified(GgStockistInventoryPeer::QTY)) $criteria->add(GgStockistInventoryPeer::QTY, $this->qty);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgStockistInventoryPeer::DATABASE_NAME);

		$criteria->add(GgStockistInventoryPeer::ID, $this->id);

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

		$copyObj->setSid($this->sid);

		$copyObj->setPid($this->pid);

		$copyObj->setRefno($this->refno);

		$copyObj->setTitle($this->title);

		$copyObj->setBv($this->bv);

		$copyObj->setDp($this->dp);

		$copyObj->setRp($this->rp);

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
			self::$peer = new GgStockistInventoryPeer();
		}
		return self::$peer;
	}

} 