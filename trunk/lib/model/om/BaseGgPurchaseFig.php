<?php


abstract class BaseGgPurchaseFig extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $network;


	
	protected $ps_bv = 0;


	
	protected $ps_dp = 0;


	
	protected $ps_rp = 0;


	
	protected $pgs_bv = 0;


	
	protected $pgs_dp = 0;


	
	protected $pgs_rp = 0;


	
	protected $year;


	
	protected $month;

	
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

	
	public function getNetwork()
	{

		return $this->network;
	}

	
	public function getPsBv()
	{

		return $this->ps_bv;
	}

	
	public function getPsDp()
	{

		return $this->ps_dp;
	}

	
	public function getPsRp()
	{

		return $this->ps_rp;
	}

	
	public function getPgsBv()
	{

		return $this->pgs_bv;
	}

	
	public function getPgsDp()
	{

		return $this->pgs_dp;
	}

	
	public function getPgsRp()
	{

		return $this->pgs_rp;
	}

	
	public function getYear()
	{

		return $this->year;
	}

	
	public function getMonth()
	{

		return $this->month;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::UID;
		}

	} 
	
	public function setNetwork($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->network !== $v) {
			$this->network = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::NETWORK;
		}

	} 
	
	public function setPsBv($v)
	{

		if ($this->ps_bv !== $v || $v === 0) {
			$this->ps_bv = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::PS_BV;
		}

	} 
	
	public function setPsDp($v)
	{

		if ($this->ps_dp !== $v || $v === 0) {
			$this->ps_dp = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::PS_DP;
		}

	} 
	
	public function setPsRp($v)
	{

		if ($this->ps_rp !== $v || $v === 0) {
			$this->ps_rp = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::PS_RP;
		}

	} 
	
	public function setPgsBv($v)
	{

		if ($this->pgs_bv !== $v || $v === 0) {
			$this->pgs_bv = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::PGS_BV;
		}

	} 
	
	public function setPgsDp($v)
	{

		if ($this->pgs_dp !== $v || $v === 0) {
			$this->pgs_dp = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::PGS_DP;
		}

	} 
	
	public function setPgsRp($v)
	{

		if ($this->pgs_rp !== $v || $v === 0) {
			$this->pgs_rp = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::PGS_RP;
		}

	} 
	
	public function setYear($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->year !== $v) {
			$this->year = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::YEAR;
		}

	} 
	
	public function setMonth($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->month !== $v) {
			$this->month = $v;
			$this->modifiedColumns[] = GgPurchaseFigPeer::MONTH;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->network = $rs->getString($startcol + 2);

			$this->ps_bv = $rs->getFloat($startcol + 3);

			$this->ps_dp = $rs->getFloat($startcol + 4);

			$this->ps_rp = $rs->getFloat($startcol + 5);

			$this->pgs_bv = $rs->getFloat($startcol + 6);

			$this->pgs_dp = $rs->getFloat($startcol + 7);

			$this->pgs_rp = $rs->getFloat($startcol + 8);

			$this->year = $rs->getInt($startcol + 9);

			$this->month = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgPurchaseFig object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgPurchaseFigPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgPurchaseFigPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgPurchaseFigPeer::DATABASE_NAME);
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
					$pk = GgPurchaseFigPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgPurchaseFigPeer::doUpdate($this, $con);
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


			if (($retval = GgPurchaseFigPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchaseFigPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNetwork();
				break;
			case 3:
				return $this->getPsBv();
				break;
			case 4:
				return $this->getPsDp();
				break;
			case 5:
				return $this->getPsRp();
				break;
			case 6:
				return $this->getPgsBv();
				break;
			case 7:
				return $this->getPgsDp();
				break;
			case 8:
				return $this->getPgsRp();
				break;
			case 9:
				return $this->getYear();
				break;
			case 10:
				return $this->getMonth();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchaseFigPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getNetwork(),
			$keys[3] => $this->getPsBv(),
			$keys[4] => $this->getPsDp(),
			$keys[5] => $this->getPsRp(),
			$keys[6] => $this->getPgsBv(),
			$keys[7] => $this->getPgsDp(),
			$keys[8] => $this->getPgsRp(),
			$keys[9] => $this->getYear(),
			$keys[10] => $this->getMonth(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchaseFigPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNetwork($value);
				break;
			case 3:
				$this->setPsBv($value);
				break;
			case 4:
				$this->setPsDp($value);
				break;
			case 5:
				$this->setPsRp($value);
				break;
			case 6:
				$this->setPgsBv($value);
				break;
			case 7:
				$this->setPgsDp($value);
				break;
			case 8:
				$this->setPgsRp($value);
				break;
			case 9:
				$this->setYear($value);
				break;
			case 10:
				$this->setMonth($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchaseFigPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNetwork($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPsBv($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPsDp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPsRp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPgsBv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPgsDp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPgsRp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setYear($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonth($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgPurchaseFigPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgPurchaseFigPeer::ID)) $criteria->add(GgPurchaseFigPeer::ID, $this->id);
		if ($this->isColumnModified(GgPurchaseFigPeer::UID)) $criteria->add(GgPurchaseFigPeer::UID, $this->uid);
		if ($this->isColumnModified(GgPurchaseFigPeer::NETWORK)) $criteria->add(GgPurchaseFigPeer::NETWORK, $this->network);
		if ($this->isColumnModified(GgPurchaseFigPeer::PS_BV)) $criteria->add(GgPurchaseFigPeer::PS_BV, $this->ps_bv);
		if ($this->isColumnModified(GgPurchaseFigPeer::PS_DP)) $criteria->add(GgPurchaseFigPeer::PS_DP, $this->ps_dp);
		if ($this->isColumnModified(GgPurchaseFigPeer::PS_RP)) $criteria->add(GgPurchaseFigPeer::PS_RP, $this->ps_rp);
		if ($this->isColumnModified(GgPurchaseFigPeer::PGS_BV)) $criteria->add(GgPurchaseFigPeer::PGS_BV, $this->pgs_bv);
		if ($this->isColumnModified(GgPurchaseFigPeer::PGS_DP)) $criteria->add(GgPurchaseFigPeer::PGS_DP, $this->pgs_dp);
		if ($this->isColumnModified(GgPurchaseFigPeer::PGS_RP)) $criteria->add(GgPurchaseFigPeer::PGS_RP, $this->pgs_rp);
		if ($this->isColumnModified(GgPurchaseFigPeer::YEAR)) $criteria->add(GgPurchaseFigPeer::YEAR, $this->year);
		if ($this->isColumnModified(GgPurchaseFigPeer::MONTH)) $criteria->add(GgPurchaseFigPeer::MONTH, $this->month);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgPurchaseFigPeer::DATABASE_NAME);

		$criteria->add(GgPurchaseFigPeer::ID, $this->id);

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

		$copyObj->setNetwork($this->network);

		$copyObj->setPsBv($this->ps_bv);

		$copyObj->setPsDp($this->ps_dp);

		$copyObj->setPsRp($this->ps_rp);

		$copyObj->setPgsBv($this->pgs_bv);

		$copyObj->setPgsDp($this->pgs_dp);

		$copyObj->setPgsRp($this->pgs_rp);

		$copyObj->setYear($this->year);

		$copyObj->setMonth($this->month);


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
			self::$peer = new GgPurchaseFigPeer();
		}
		return self::$peer;
	}

} 