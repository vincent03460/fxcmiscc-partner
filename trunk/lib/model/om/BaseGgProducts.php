<?php


abstract class BaseGgProducts extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $catid;


	
	protected $country;


	
	protected $prod_type;


	
	protected $refno;


	
	protected $title;


	
	protected $bv;


	
	protected $bv_fix;


	
	protected $dp;


	
	protected $dp_fix;


	
	protected $rp;


	
	protected $rp_fix;


	
	protected $qty_type;


	
	protected $qty;


	
	protected $image_file;


	
	protected $status;


	
	protected $remark;


	
	protected $descr;


	
	protected $cdate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getCatid()
	{

		return $this->catid;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getProdType()
	{

		return $this->prod_type;
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

	
	public function getBvFix()
	{

		return $this->bv_fix;
	}

	
	public function getDp()
	{

		return $this->dp;
	}

	
	public function getDpFix()
	{

		return $this->dp_fix;
	}

	
	public function getRp()
	{

		return $this->rp;
	}

	
	public function getRpFix()
	{

		return $this->rp_fix;
	}

	
	public function getQtyType()
	{

		return $this->qty_type;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function getImageFile()
	{

		return $this->image_file;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getDescr()
	{

		return $this->descr;
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
			$this->modifiedColumns[] = GgProductsPeer::ID;
		}

	} 
	
	public function setCatid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->catid !== $v) {
			$this->catid = $v;
			$this->modifiedColumns[] = GgProductsPeer::CATID;
		}

	} 
	
	public function setCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = GgProductsPeer::COUNTRY;
		}

	} 
	
	public function setProdType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->prod_type !== $v) {
			$this->prod_type = $v;
			$this->modifiedColumns[] = GgProductsPeer::PROD_TYPE;
		}

	} 
	
	public function setRefno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->refno !== $v) {
			$this->refno = $v;
			$this->modifiedColumns[] = GgProductsPeer::REFNO;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = GgProductsPeer::TITLE;
		}

	} 
	
	public function setBv($v)
	{

		if ($this->bv !== $v) {
			$this->bv = $v;
			$this->modifiedColumns[] = GgProductsPeer::BV;
		}

	} 
	
	public function setBvFix($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bv_fix !== $v) {
			$this->bv_fix = $v;
			$this->modifiedColumns[] = GgProductsPeer::BV_FIX;
		}

	} 
	
	public function setDp($v)
	{

		if ($this->dp !== $v) {
			$this->dp = $v;
			$this->modifiedColumns[] = GgProductsPeer::DP;
		}

	} 
	
	public function setDpFix($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dp_fix !== $v) {
			$this->dp_fix = $v;
			$this->modifiedColumns[] = GgProductsPeer::DP_FIX;
		}

	} 
	
	public function setRp($v)
	{

		if ($this->rp !== $v) {
			$this->rp = $v;
			$this->modifiedColumns[] = GgProductsPeer::RP;
		}

	} 
	
	public function setRpFix($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->rp_fix !== $v) {
			$this->rp_fix = $v;
			$this->modifiedColumns[] = GgProductsPeer::RP_FIX;
		}

	} 
	
	public function setQtyType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->qty_type !== $v) {
			$this->qty_type = $v;
			$this->modifiedColumns[] = GgProductsPeer::QTY_TYPE;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgProductsPeer::QTY;
		}

	} 
	
	public function setImageFile($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->image_file !== $v) {
			$this->image_file = $v;
			$this->modifiedColumns[] = GgProductsPeer::IMAGE_FILE;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GgProductsPeer::STATUS;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = GgProductsPeer::REMARK;
		}

	} 
	
	public function setDescr($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descr !== $v) {
			$this->descr = $v;
			$this->modifiedColumns[] = GgProductsPeer::DESCR;
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
			$this->modifiedColumns[] = GgProductsPeer::CDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->catid = $rs->getString($startcol + 1);

			$this->country = $rs->getString($startcol + 2);

			$this->prod_type = $rs->getString($startcol + 3);

			$this->refno = $rs->getString($startcol + 4);

			$this->title = $rs->getString($startcol + 5);

			$this->bv = $rs->getFloat($startcol + 6);

			$this->bv_fix = $rs->getString($startcol + 7);

			$this->dp = $rs->getFloat($startcol + 8);

			$this->dp_fix = $rs->getString($startcol + 9);

			$this->rp = $rs->getFloat($startcol + 10);

			$this->rp_fix = $rs->getString($startcol + 11);

			$this->qty_type = $rs->getString($startcol + 12);

			$this->qty = $rs->getInt($startcol + 13);

			$this->image_file = $rs->getString($startcol + 14);

			$this->status = $rs->getString($startcol + 15);

			$this->remark = $rs->getString($startcol + 16);

			$this->descr = $rs->getString($startcol + 17);

			$this->cdate = $rs->getTimestamp($startcol + 18, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgProducts object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgProductsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgProductsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgProductsPeer::DATABASE_NAME);
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
					$pk = GgProductsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgProductsPeer::doUpdate($this, $con);
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


			if (($retval = GgProductsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgProductsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCatid();
				break;
			case 2:
				return $this->getCountry();
				break;
			case 3:
				return $this->getProdType();
				break;
			case 4:
				return $this->getRefno();
				break;
			case 5:
				return $this->getTitle();
				break;
			case 6:
				return $this->getBv();
				break;
			case 7:
				return $this->getBvFix();
				break;
			case 8:
				return $this->getDp();
				break;
			case 9:
				return $this->getDpFix();
				break;
			case 10:
				return $this->getRp();
				break;
			case 11:
				return $this->getRpFix();
				break;
			case 12:
				return $this->getQtyType();
				break;
			case 13:
				return $this->getQty();
				break;
			case 14:
				return $this->getImageFile();
				break;
			case 15:
				return $this->getStatus();
				break;
			case 16:
				return $this->getRemark();
				break;
			case 17:
				return $this->getDescr();
				break;
			case 18:
				return $this->getCdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgProductsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCatid(),
			$keys[2] => $this->getCountry(),
			$keys[3] => $this->getProdType(),
			$keys[4] => $this->getRefno(),
			$keys[5] => $this->getTitle(),
			$keys[6] => $this->getBv(),
			$keys[7] => $this->getBvFix(),
			$keys[8] => $this->getDp(),
			$keys[9] => $this->getDpFix(),
			$keys[10] => $this->getRp(),
			$keys[11] => $this->getRpFix(),
			$keys[12] => $this->getQtyType(),
			$keys[13] => $this->getQty(),
			$keys[14] => $this->getImageFile(),
			$keys[15] => $this->getStatus(),
			$keys[16] => $this->getRemark(),
			$keys[17] => $this->getDescr(),
			$keys[18] => $this->getCdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgProductsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCatid($value);
				break;
			case 2:
				$this->setCountry($value);
				break;
			case 3:
				$this->setProdType($value);
				break;
			case 4:
				$this->setRefno($value);
				break;
			case 5:
				$this->setTitle($value);
				break;
			case 6:
				$this->setBv($value);
				break;
			case 7:
				$this->setBvFix($value);
				break;
			case 8:
				$this->setDp($value);
				break;
			case 9:
				$this->setDpFix($value);
				break;
			case 10:
				$this->setRp($value);
				break;
			case 11:
				$this->setRpFix($value);
				break;
			case 12:
				$this->setQtyType($value);
				break;
			case 13:
				$this->setQty($value);
				break;
			case 14:
				$this->setImageFile($value);
				break;
			case 15:
				$this->setStatus($value);
				break;
			case 16:
				$this->setRemark($value);
				break;
			case 17:
				$this->setDescr($value);
				break;
			case 18:
				$this->setCdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgProductsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCountry($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setProdType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefno($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTitle($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBvFix($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDpFix($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRpFix($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setQtyType($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setQty($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setImageFile($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStatus($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setRemark($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDescr($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCdate($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgProductsPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgProductsPeer::ID)) $criteria->add(GgProductsPeer::ID, $this->id);
		if ($this->isColumnModified(GgProductsPeer::CATID)) $criteria->add(GgProductsPeer::CATID, $this->catid);
		if ($this->isColumnModified(GgProductsPeer::COUNTRY)) $criteria->add(GgProductsPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(GgProductsPeer::PROD_TYPE)) $criteria->add(GgProductsPeer::PROD_TYPE, $this->prod_type);
		if ($this->isColumnModified(GgProductsPeer::REFNO)) $criteria->add(GgProductsPeer::REFNO, $this->refno);
		if ($this->isColumnModified(GgProductsPeer::TITLE)) $criteria->add(GgProductsPeer::TITLE, $this->title);
		if ($this->isColumnModified(GgProductsPeer::BV)) $criteria->add(GgProductsPeer::BV, $this->bv);
		if ($this->isColumnModified(GgProductsPeer::BV_FIX)) $criteria->add(GgProductsPeer::BV_FIX, $this->bv_fix);
		if ($this->isColumnModified(GgProductsPeer::DP)) $criteria->add(GgProductsPeer::DP, $this->dp);
		if ($this->isColumnModified(GgProductsPeer::DP_FIX)) $criteria->add(GgProductsPeer::DP_FIX, $this->dp_fix);
		if ($this->isColumnModified(GgProductsPeer::RP)) $criteria->add(GgProductsPeer::RP, $this->rp);
		if ($this->isColumnModified(GgProductsPeer::RP_FIX)) $criteria->add(GgProductsPeer::RP_FIX, $this->rp_fix);
		if ($this->isColumnModified(GgProductsPeer::QTY_TYPE)) $criteria->add(GgProductsPeer::QTY_TYPE, $this->qty_type);
		if ($this->isColumnModified(GgProductsPeer::QTY)) $criteria->add(GgProductsPeer::QTY, $this->qty);
		if ($this->isColumnModified(GgProductsPeer::IMAGE_FILE)) $criteria->add(GgProductsPeer::IMAGE_FILE, $this->image_file);
		if ($this->isColumnModified(GgProductsPeer::STATUS)) $criteria->add(GgProductsPeer::STATUS, $this->status);
		if ($this->isColumnModified(GgProductsPeer::REMARK)) $criteria->add(GgProductsPeer::REMARK, $this->remark);
		if ($this->isColumnModified(GgProductsPeer::DESCR)) $criteria->add(GgProductsPeer::DESCR, $this->descr);
		if ($this->isColumnModified(GgProductsPeer::CDATE)) $criteria->add(GgProductsPeer::CDATE, $this->cdate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgProductsPeer::DATABASE_NAME);

		$criteria->add(GgProductsPeer::ID, $this->id);

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

		$copyObj->setCatid($this->catid);

		$copyObj->setCountry($this->country);

		$copyObj->setProdType($this->prod_type);

		$copyObj->setRefno($this->refno);

		$copyObj->setTitle($this->title);

		$copyObj->setBv($this->bv);

		$copyObj->setBvFix($this->bv_fix);

		$copyObj->setDp($this->dp);

		$copyObj->setDpFix($this->dp_fix);

		$copyObj->setRp($this->rp);

		$copyObj->setRpFix($this->rp_fix);

		$copyObj->setQtyType($this->qty_type);

		$copyObj->setQty($this->qty);

		$copyObj->setImageFile($this->image_file);

		$copyObj->setStatus($this->status);

		$copyObj->setRemark($this->remark);

		$copyObj->setDescr($this->descr);

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
			self::$peer = new GgProductsPeer();
		}
		return self::$peer;
	}

} 