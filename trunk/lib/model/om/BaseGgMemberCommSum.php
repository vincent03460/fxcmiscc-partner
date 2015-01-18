<?php


abstract class BaseGgMemberCommSum extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $uid = '0';


	
	protected $pgs = 0;


	
	protected $lcf = 0;


	
	protected $rcf = 0;


	
	protected $pbv = 0;


	
	protected $fbv = 0;


	
	protected $s = 0;


	
	protected $p = 0;


	
	protected $m = 0;


	
	protected $w = 0;


	
	protected $dlot = 0;


	
	protected $bonus_date;


	
	protected $cdate;


	
	protected $flag = 0;

	
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

	
	public function getPgs()
	{

		return $this->pgs;
	}

	
	public function getLcf()
	{

		return $this->lcf;
	}

	
	public function getRcf()
	{

		return $this->rcf;
	}

	
	public function getPbv()
	{

		return $this->pbv;
	}

	
	public function getFbv()
	{

		return $this->fbv;
	}

	
	public function getS()
	{

		return $this->s;
	}

	
	public function getP()
	{

		return $this->p;
	}

	
	public function getM()
	{

		return $this->m;
	}

	
	public function getW()
	{

		return $this->w;
	}

	
	public function getDlot()
	{

		return $this->dlot;
	}

	
	public function getBonusDate($format = 'Y-m-d')
	{

		if ($this->bonus_date === null || $this->bonus_date === '') {
			return null;
		} elseif (!is_int($this->bonus_date)) {
						$ts = strtotime($this->bonus_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [bonus_date] as date/time value: " . var_export($this->bonus_date, true));
			}
		} else {
			$ts = $this->bonus_date;
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

	
	public function getFlag()
	{

		return $this->flag;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::ID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::UID;
		}

	} 
	
	public function setPgs($v)
	{

		if ($this->pgs !== $v || $v === 0) {
			$this->pgs = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::PGS;
		}

	} 
	
	public function setLcf($v)
	{

		if ($this->lcf !== $v || $v === 0) {
			$this->lcf = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::LCF;
		}

	} 
	
	public function setRcf($v)
	{

		if ($this->rcf !== $v || $v === 0) {
			$this->rcf = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::RCF;
		}

	} 
	
	public function setPbv($v)
	{

		if ($this->pbv !== $v || $v === 0) {
			$this->pbv = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::PBV;
		}

	} 
	
	public function setFbv($v)
	{

		if ($this->fbv !== $v || $v === 0) {
			$this->fbv = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::FBV;
		}

	} 
	
	public function setS($v)
	{

		if ($this->s !== $v || $v === 0) {
			$this->s = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::S;
		}

	} 
	
	public function setP($v)
	{

		if ($this->p !== $v || $v === 0) {
			$this->p = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::P;
		}

	} 
	
	public function setM($v)
	{

		if ($this->m !== $v || $v === 0) {
			$this->m = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::M;
		}

	} 
	
	public function setW($v)
	{

		if ($this->w !== $v || $v === 0) {
			$this->w = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::W;
		}

	} 
	
	public function setDlot($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dlot !== $v || $v === 0) {
			$this->dlot = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::DLOT;
		}

	} 
	
	public function setBonusDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [bonus_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->bonus_date !== $ts) {
			$this->bonus_date = $ts;
			$this->modifiedColumns[] = GgMemberCommSumPeer::BONUS_DATE;
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
			$this->modifiedColumns[] = GgMemberCommSumPeer::CDATE;
		}

	} 
	
	public function setFlag($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->flag !== $v || $v === 0) {
			$this->flag = $v;
			$this->modifiedColumns[] = GgMemberCommSumPeer::FLAG;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->uid = $rs->getString($startcol + 1);

			$this->pgs = $rs->getFloat($startcol + 2);

			$this->lcf = $rs->getFloat($startcol + 3);

			$this->rcf = $rs->getFloat($startcol + 4);

			$this->pbv = $rs->getFloat($startcol + 5);

			$this->fbv = $rs->getFloat($startcol + 6);

			$this->s = $rs->getFloat($startcol + 7);

			$this->p = $rs->getFloat($startcol + 8);

			$this->m = $rs->getFloat($startcol + 9);

			$this->w = $rs->getFloat($startcol + 10);

			$this->dlot = $rs->getInt($startcol + 11);

			$this->bonus_date = $rs->getDate($startcol + 12, null);

			$this->cdate = $rs->getTimestamp($startcol + 13, null);

			$this->flag = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMemberCommSum object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMemberCommSumPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMemberCommSumPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMemberCommSumPeer::DATABASE_NAME);
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
					$pk = GgMemberCommSumPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMemberCommSumPeer::doUpdate($this, $con);
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


			if (($retval = GgMemberCommSumPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCommSumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPgs();
				break;
			case 3:
				return $this->getLcf();
				break;
			case 4:
				return $this->getRcf();
				break;
			case 5:
				return $this->getPbv();
				break;
			case 6:
				return $this->getFbv();
				break;
			case 7:
				return $this->getS();
				break;
			case 8:
				return $this->getP();
				break;
			case 9:
				return $this->getM();
				break;
			case 10:
				return $this->getW();
				break;
			case 11:
				return $this->getDlot();
				break;
			case 12:
				return $this->getBonusDate();
				break;
			case 13:
				return $this->getCdate();
				break;
			case 14:
				return $this->getFlag();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberCommSumPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUid(),
			$keys[2] => $this->getPgs(),
			$keys[3] => $this->getLcf(),
			$keys[4] => $this->getRcf(),
			$keys[5] => $this->getPbv(),
			$keys[6] => $this->getFbv(),
			$keys[7] => $this->getS(),
			$keys[8] => $this->getP(),
			$keys[9] => $this->getM(),
			$keys[10] => $this->getW(),
			$keys[11] => $this->getDlot(),
			$keys[12] => $this->getBonusDate(),
			$keys[13] => $this->getCdate(),
			$keys[14] => $this->getFlag(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCommSumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPgs($value);
				break;
			case 3:
				$this->setLcf($value);
				break;
			case 4:
				$this->setRcf($value);
				break;
			case 5:
				$this->setPbv($value);
				break;
			case 6:
				$this->setFbv($value);
				break;
			case 7:
				$this->setS($value);
				break;
			case 8:
				$this->setP($value);
				break;
			case 9:
				$this->setM($value);
				break;
			case 10:
				$this->setW($value);
				break;
			case 11:
				$this->setDlot($value);
				break;
			case 12:
				$this->setBonusDate($value);
				break;
			case 13:
				$this->setCdate($value);
				break;
			case 14:
				$this->setFlag($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberCommSumPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPgs($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLcf($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRcf($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPbv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFbv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setS($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setP($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setM($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setW($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDlot($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setBonusDate($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCdate($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFlag($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMemberCommSumPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMemberCommSumPeer::ID)) $criteria->add(GgMemberCommSumPeer::ID, $this->id);
		if ($this->isColumnModified(GgMemberCommSumPeer::UID)) $criteria->add(GgMemberCommSumPeer::UID, $this->uid);
		if ($this->isColumnModified(GgMemberCommSumPeer::PGS)) $criteria->add(GgMemberCommSumPeer::PGS, $this->pgs);
		if ($this->isColumnModified(GgMemberCommSumPeer::LCF)) $criteria->add(GgMemberCommSumPeer::LCF, $this->lcf);
		if ($this->isColumnModified(GgMemberCommSumPeer::RCF)) $criteria->add(GgMemberCommSumPeer::RCF, $this->rcf);
		if ($this->isColumnModified(GgMemberCommSumPeer::PBV)) $criteria->add(GgMemberCommSumPeer::PBV, $this->pbv);
		if ($this->isColumnModified(GgMemberCommSumPeer::FBV)) $criteria->add(GgMemberCommSumPeer::FBV, $this->fbv);
		if ($this->isColumnModified(GgMemberCommSumPeer::S)) $criteria->add(GgMemberCommSumPeer::S, $this->s);
		if ($this->isColumnModified(GgMemberCommSumPeer::P)) $criteria->add(GgMemberCommSumPeer::P, $this->p);
		if ($this->isColumnModified(GgMemberCommSumPeer::M)) $criteria->add(GgMemberCommSumPeer::M, $this->m);
		if ($this->isColumnModified(GgMemberCommSumPeer::W)) $criteria->add(GgMemberCommSumPeer::W, $this->w);
		if ($this->isColumnModified(GgMemberCommSumPeer::DLOT)) $criteria->add(GgMemberCommSumPeer::DLOT, $this->dlot);
		if ($this->isColumnModified(GgMemberCommSumPeer::BONUS_DATE)) $criteria->add(GgMemberCommSumPeer::BONUS_DATE, $this->bonus_date);
		if ($this->isColumnModified(GgMemberCommSumPeer::CDATE)) $criteria->add(GgMemberCommSumPeer::CDATE, $this->cdate);
		if ($this->isColumnModified(GgMemberCommSumPeer::FLAG)) $criteria->add(GgMemberCommSumPeer::FLAG, $this->flag);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMemberCommSumPeer::DATABASE_NAME);

		$criteria->add(GgMemberCommSumPeer::ID, $this->id);

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

		$copyObj->setPgs($this->pgs);

		$copyObj->setLcf($this->lcf);

		$copyObj->setRcf($this->rcf);

		$copyObj->setPbv($this->pbv);

		$copyObj->setFbv($this->fbv);

		$copyObj->setS($this->s);

		$copyObj->setP($this->p);

		$copyObj->setM($this->m);

		$copyObj->setW($this->w);

		$copyObj->setDlot($this->dlot);

		$copyObj->setBonusDate($this->bonus_date);

		$copyObj->setCdate($this->cdate);

		$copyObj->setFlag($this->flag);


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
			self::$peer = new GgMemberCommSumPeer();
		}
		return self::$peer;
	}

} 