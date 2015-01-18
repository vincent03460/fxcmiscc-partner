<?php


abstract class BaseGgPurchaseDetail extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $slid;


	
	protected $pid = '0';


	
	protected $pkid;


	
	protected $prod_type;


	
	protected $refno;


	
	protected $title;


	
	protected $product_code;


	
	protected $product_name;


	
	protected $qty = 0;


	
	protected $amount = 0;


	
	protected $bv;


	
	protected $dp;


	
	protected $rp;


	
	protected $total;


	
	protected $total_bv;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getSlid()
	{

		return $this->slid;
	}

	
	public function getPid()
	{

		return $this->pid;
	}

	
	public function getPkid()
	{

		return $this->pkid;
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

	
	public function getProductCode()
	{

		return $this->product_code;
	}

	
	public function getProductName()
	{

		return $this->product_name;
	}

	
	public function getQty()
	{

		return $this->qty;
	}

	
	public function getAmount()
	{

		return $this->amount;
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

	
	public function getTotal()
	{

		return $this->total;
	}

	
	public function getTotalBv()
	{

		return $this->total_bv;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::ID;
		}

	} 
	
	public function setSlid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slid !== $v) {
			$this->slid = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::SLID;
		}

	} 
	
	public function setPid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pid !== $v || $v === '0') {
			$this->pid = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::PID;
		}

	} 
	
	public function setPkid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pkid !== $v) {
			$this->pkid = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::PKID;
		}

	} 
	
	public function setProdType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->prod_type !== $v) {
			$this->prod_type = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::PROD_TYPE;
		}

	} 
	
	public function setRefno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->refno !== $v) {
			$this->refno = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::REFNO;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::TITLE;
		}

	} 
	
	public function setProductCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->product_code !== $v) {
			$this->product_code = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::PRODUCT_CODE;
		}

	} 
	
	public function setProductName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->product_name !== $v) {
			$this->product_name = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::PRODUCT_NAME;
		}

	} 
	
	public function setQty($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->qty !== $v || $v === 0) {
			$this->qty = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::QTY;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::AMOUNT;
		}

	} 
	
	public function setBv($v)
	{

		if ($this->bv !== $v) {
			$this->bv = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::BV;
		}

	} 
	
	public function setDp($v)
	{

		if ($this->dp !== $v) {
			$this->dp = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::DP;
		}

	} 
	
	public function setRp($v)
	{

		if ($this->rp !== $v) {
			$this->rp = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::RP;
		}

	} 
	
	public function setTotal($v)
	{

		if ($this->total !== $v) {
			$this->total = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::TOTAL;
		}

	} 
	
	public function setTotalBv($v)
	{

		if ($this->total_bv !== $v) {
			$this->total_bv = $v;
			$this->modifiedColumns[] = GgPurchaseDetailPeer::TOTAL_BV;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->slid = $rs->getString($startcol + 1);

			$this->pid = $rs->getString($startcol + 2);

			$this->pkid = $rs->getString($startcol + 3);

			$this->prod_type = $rs->getString($startcol + 4);

			$this->refno = $rs->getString($startcol + 5);

			$this->title = $rs->getString($startcol + 6);

			$this->product_code = $rs->getString($startcol + 7);

			$this->product_name = $rs->getString($startcol + 8);

			$this->qty = $rs->getInt($startcol + 9);

			$this->amount = $rs->getFloat($startcol + 10);

			$this->bv = $rs->getFloat($startcol + 11);

			$this->dp = $rs->getFloat($startcol + 12);

			$this->rp = $rs->getFloat($startcol + 13);

			$this->total = $rs->getFloat($startcol + 14);

			$this->total_bv = $rs->getFloat($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgPurchaseDetail object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgPurchaseDetailPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgPurchaseDetailPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgPurchaseDetailPeer::DATABASE_NAME);
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
					$pk = GgPurchaseDetailPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgPurchaseDetailPeer::doUpdate($this, $con);
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


			if (($retval = GgPurchaseDetailPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchaseDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSlid();
				break;
			case 2:
				return $this->getPid();
				break;
			case 3:
				return $this->getPkid();
				break;
			case 4:
				return $this->getProdType();
				break;
			case 5:
				return $this->getRefno();
				break;
			case 6:
				return $this->getTitle();
				break;
			case 7:
				return $this->getProductCode();
				break;
			case 8:
				return $this->getProductName();
				break;
			case 9:
				return $this->getQty();
				break;
			case 10:
				return $this->getAmount();
				break;
			case 11:
				return $this->getBv();
				break;
			case 12:
				return $this->getDp();
				break;
			case 13:
				return $this->getRp();
				break;
			case 14:
				return $this->getTotal();
				break;
			case 15:
				return $this->getTotalBv();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchaseDetailPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSlid(),
			$keys[2] => $this->getPid(),
			$keys[3] => $this->getPkid(),
			$keys[4] => $this->getProdType(),
			$keys[5] => $this->getRefno(),
			$keys[6] => $this->getTitle(),
			$keys[7] => $this->getProductCode(),
			$keys[8] => $this->getProductName(),
			$keys[9] => $this->getQty(),
			$keys[10] => $this->getAmount(),
			$keys[11] => $this->getBv(),
			$keys[12] => $this->getDp(),
			$keys[13] => $this->getRp(),
			$keys[14] => $this->getTotal(),
			$keys[15] => $this->getTotalBv(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchaseDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSlid($value);
				break;
			case 2:
				$this->setPid($value);
				break;
			case 3:
				$this->setPkid($value);
				break;
			case 4:
				$this->setProdType($value);
				break;
			case 5:
				$this->setRefno($value);
				break;
			case 6:
				$this->setTitle($value);
				break;
			case 7:
				$this->setProductCode($value);
				break;
			case 8:
				$this->setProductName($value);
				break;
			case 9:
				$this->setQty($value);
				break;
			case 10:
				$this->setAmount($value);
				break;
			case 11:
				$this->setBv($value);
				break;
			case 12:
				$this->setDp($value);
				break;
			case 13:
				$this->setRp($value);
				break;
			case 14:
				$this->setTotal($value);
				break;
			case 15:
				$this->setTotalBv($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchaseDetailPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSlid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPkid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setProdType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefno($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTitle($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setProductCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProductName($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setQty($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAmount($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBv($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDp($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTotal($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTotalBv($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgPurchaseDetailPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgPurchaseDetailPeer::ID)) $criteria->add(GgPurchaseDetailPeer::ID, $this->id);
		if ($this->isColumnModified(GgPurchaseDetailPeer::SLID)) $criteria->add(GgPurchaseDetailPeer::SLID, $this->slid);
		if ($this->isColumnModified(GgPurchaseDetailPeer::PID)) $criteria->add(GgPurchaseDetailPeer::PID, $this->pid);
		if ($this->isColumnModified(GgPurchaseDetailPeer::PKID)) $criteria->add(GgPurchaseDetailPeer::PKID, $this->pkid);
		if ($this->isColumnModified(GgPurchaseDetailPeer::PROD_TYPE)) $criteria->add(GgPurchaseDetailPeer::PROD_TYPE, $this->prod_type);
		if ($this->isColumnModified(GgPurchaseDetailPeer::REFNO)) $criteria->add(GgPurchaseDetailPeer::REFNO, $this->refno);
		if ($this->isColumnModified(GgPurchaseDetailPeer::TITLE)) $criteria->add(GgPurchaseDetailPeer::TITLE, $this->title);
		if ($this->isColumnModified(GgPurchaseDetailPeer::PRODUCT_CODE)) $criteria->add(GgPurchaseDetailPeer::PRODUCT_CODE, $this->product_code);
		if ($this->isColumnModified(GgPurchaseDetailPeer::PRODUCT_NAME)) $criteria->add(GgPurchaseDetailPeer::PRODUCT_NAME, $this->product_name);
		if ($this->isColumnModified(GgPurchaseDetailPeer::QTY)) $criteria->add(GgPurchaseDetailPeer::QTY, $this->qty);
		if ($this->isColumnModified(GgPurchaseDetailPeer::AMOUNT)) $criteria->add(GgPurchaseDetailPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgPurchaseDetailPeer::BV)) $criteria->add(GgPurchaseDetailPeer::BV, $this->bv);
		if ($this->isColumnModified(GgPurchaseDetailPeer::DP)) $criteria->add(GgPurchaseDetailPeer::DP, $this->dp);
		if ($this->isColumnModified(GgPurchaseDetailPeer::RP)) $criteria->add(GgPurchaseDetailPeer::RP, $this->rp);
		if ($this->isColumnModified(GgPurchaseDetailPeer::TOTAL)) $criteria->add(GgPurchaseDetailPeer::TOTAL, $this->total);
		if ($this->isColumnModified(GgPurchaseDetailPeer::TOTAL_BV)) $criteria->add(GgPurchaseDetailPeer::TOTAL_BV, $this->total_bv);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgPurchaseDetailPeer::DATABASE_NAME);

		$criteria->add(GgPurchaseDetailPeer::ID, $this->id);

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

		$copyObj->setSlid($this->slid);

		$copyObj->setPid($this->pid);

		$copyObj->setPkid($this->pkid);

		$copyObj->setProdType($this->prod_type);

		$copyObj->setRefno($this->refno);

		$copyObj->setTitle($this->title);

		$copyObj->setProductCode($this->product_code);

		$copyObj->setProductName($this->product_name);

		$copyObj->setQty($this->qty);

		$copyObj->setAmount($this->amount);

		$copyObj->setBv($this->bv);

		$copyObj->setDp($this->dp);

		$copyObj->setRp($this->rp);

		$copyObj->setTotal($this->total);

		$copyObj->setTotalBv($this->total_bv);


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
			self::$peer = new GgPurchaseDetailPeer();
		}
		return self::$peer;
	}

} 