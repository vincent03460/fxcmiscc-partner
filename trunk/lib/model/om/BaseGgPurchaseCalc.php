<?php


abstract class BaseGgPurchaseCalc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $total_bv = 0;


	
	protected $total_dp = 0;


	
	protected $total_rp = 0;

	
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

	
	public function getTotalBv()
	{

		return $this->total_bv;
	}

	
	public function getTotalDp()
	{

		return $this->total_dp;
	}

	
	public function getTotalRp()
	{

		return $this->total_rp;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgPurchaseCalcPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgPurchaseCalcPeer::UID;
		}

	} 
	
	public function setTotalBv($v)
	{

		if ($this->total_bv !== $v || $v === 0) {
			$this->total_bv = $v;
			$this->modifiedColumns[] = GgPurchaseCalcPeer::TOTAL_BV;
		}

	} 
	
	public function setTotalDp($v)
	{

		if ($this->total_dp !== $v || $v === 0) {
			$this->total_dp = $v;
			$this->modifiedColumns[] = GgPurchaseCalcPeer::TOTAL_DP;
		}

	} 
	
	public function setTotalRp($v)
	{

		if ($this->total_rp !== $v || $v === 0) {
			$this->total_rp = $v;
			$this->modifiedColumns[] = GgPurchaseCalcPeer::TOTAL_RP;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->total_bv = $rs->getFloat($startcol + 2);

			$this->total_dp = $rs->getFloat($startcol + 3);

			$this->total_rp = $rs->getFloat($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgPurchaseCalc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgPurchaseCalcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgPurchaseCalcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgPurchaseCalcPeer::DATABASE_NAME);
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
					$pk = GgPurchaseCalcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgPurchaseCalcPeer::doUpdate($this, $con);
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


			if (($retval = GgPurchaseCalcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchaseCalcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTotalBv();
				break;
			case 3:
				return $this->getTotalDp();
				break;
			case 4:
				return $this->getTotalRp();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchaseCalcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getTotalBv(),
			$keys[3] => $this->getTotalDp(),
			$keys[4] => $this->getTotalRp(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchaseCalcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTotalBv($value);
				break;
			case 3:
				$this->setTotalDp($value);
				break;
			case 4:
				$this->setTotalRp($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchaseCalcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTotalBv($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotalDp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotalRp($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgPurchaseCalcPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgPurchaseCalcPeer::ID)) $criteria->add(GgPurchaseCalcPeer::ID, $this->id);
		if ($this->isColumnModified(GgPurchaseCalcPeer::UID)) $criteria->add(GgPurchaseCalcPeer::UID, $this->uid);
		if ($this->isColumnModified(GgPurchaseCalcPeer::TOTAL_BV)) $criteria->add(GgPurchaseCalcPeer::TOTAL_BV, $this->total_bv);
		if ($this->isColumnModified(GgPurchaseCalcPeer::TOTAL_DP)) $criteria->add(GgPurchaseCalcPeer::TOTAL_DP, $this->total_dp);
		if ($this->isColumnModified(GgPurchaseCalcPeer::TOTAL_RP)) $criteria->add(GgPurchaseCalcPeer::TOTAL_RP, $this->total_rp);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgPurchaseCalcPeer::DATABASE_NAME);

		$criteria->add(GgPurchaseCalcPeer::ID, $this->id);

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

		$copyObj->setTotalBv($this->total_bv);

		$copyObj->setTotalDp($this->total_dp);

		$copyObj->setTotalRp($this->total_rp);


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
			self::$peer = new GgPurchaseCalcPeer();
		}
		return self::$peer;
	}

} 