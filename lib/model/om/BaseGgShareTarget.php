<?php


abstract class BaseGgShareTarget extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id = 0;


	
	protected $share_price = 0;


	
	protected $balance;


	
	protected $sell_balance = 0;


	
	protected $buy_balance = 0;


	
	protected $fake_sell;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getSharePrice()
	{

		return $this->share_price;
	}

	
	public function getBalance()
	{

		return $this->balance;
	}

	
	public function getSellBalance()
	{

		return $this->sell_balance;
	}

	
	public function getBuyBalance()
	{

		return $this->buy_balance;
	}

	
	public function getFakeSell()
	{

		return $this->fake_sell;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v || $v === 0) {
			$this->id = $v;
			$this->modifiedColumns[] = GgShareTargetPeer::ID;
		}

	} 
	
	public function setSharePrice($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->share_price !== $v || $v === 0) {
			$this->share_price = $v;
			$this->modifiedColumns[] = GgShareTargetPeer::SHARE_PRICE;
		}

	} 
	
	public function setBalance($v)
	{

		if ($this->balance !== $v) {
			$this->balance = $v;
			$this->modifiedColumns[] = GgShareTargetPeer::BALANCE;
		}

	} 
	
	public function setSellBalance($v)
	{

		if ($this->sell_balance !== $v || $v === 0) {
			$this->sell_balance = $v;
			$this->modifiedColumns[] = GgShareTargetPeer::SELL_BALANCE;
		}

	} 
	
	public function setBuyBalance($v)
	{

		if ($this->buy_balance !== $v || $v === 0) {
			$this->buy_balance = $v;
			$this->modifiedColumns[] = GgShareTargetPeer::BUY_BALANCE;
		}

	} 
	
	public function setFakeSell($v)
	{

		if ($this->fake_sell !== $v) {
			$this->fake_sell = $v;
			$this->modifiedColumns[] = GgShareTargetPeer::FAKE_SELL;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->share_price = $rs->getInt($startcol + 1);

			$this->balance = $rs->getFloat($startcol + 2);

			$this->sell_balance = $rs->getFloat($startcol + 3);

			$this->buy_balance = $rs->getFloat($startcol + 4);

			$this->fake_sell = $rs->getFloat($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgShareTarget object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgShareTargetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgShareTargetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgShareTargetPeer::DATABASE_NAME);
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
					$pk = GgShareTargetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += GgShareTargetPeer::doUpdate($this, $con);
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


			if (($retval = GgShareTargetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgShareTargetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSharePrice();
				break;
			case 2:
				return $this->getBalance();
				break;
			case 3:
				return $this->getSellBalance();
				break;
			case 4:
				return $this->getBuyBalance();
				break;
			case 5:
				return $this->getFakeSell();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgShareTargetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSharePrice(),
			$keys[2] => $this->getBalance(),
			$keys[3] => $this->getSellBalance(),
			$keys[4] => $this->getBuyBalance(),
			$keys[5] => $this->getFakeSell(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgShareTargetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSharePrice($value);
				break;
			case 2:
				$this->setBalance($value);
				break;
			case 3:
				$this->setSellBalance($value);
				break;
			case 4:
				$this->setBuyBalance($value);
				break;
			case 5:
				$this->setFakeSell($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgShareTargetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSharePrice($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBalance($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSellBalance($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBuyBalance($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFakeSell($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgShareTargetPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgShareTargetPeer::ID)) $criteria->add(GgShareTargetPeer::ID, $this->id);
		if ($this->isColumnModified(GgShareTargetPeer::SHARE_PRICE)) $criteria->add(GgShareTargetPeer::SHARE_PRICE, $this->share_price);
		if ($this->isColumnModified(GgShareTargetPeer::BALANCE)) $criteria->add(GgShareTargetPeer::BALANCE, $this->balance);
		if ($this->isColumnModified(GgShareTargetPeer::SELL_BALANCE)) $criteria->add(GgShareTargetPeer::SELL_BALANCE, $this->sell_balance);
		if ($this->isColumnModified(GgShareTargetPeer::BUY_BALANCE)) $criteria->add(GgShareTargetPeer::BUY_BALANCE, $this->buy_balance);
		if ($this->isColumnModified(GgShareTargetPeer::FAKE_SELL)) $criteria->add(GgShareTargetPeer::FAKE_SELL, $this->fake_sell);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgShareTargetPeer::DATABASE_NAME);

		$criteria->add(GgShareTargetPeer::ID, $this->id);

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

		$copyObj->setSharePrice($this->share_price);

		$copyObj->setBalance($this->balance);

		$copyObj->setSellBalance($this->sell_balance);

		$copyObj->setBuyBalance($this->buy_balance);

		$copyObj->setFakeSell($this->fake_sell);


		$copyObj->setNew(true);

		$copyObj->setId('0'); 
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
			self::$peer = new GgShareTargetPeer();
		}
		return self::$peer;
	}

} 