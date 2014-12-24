<?php


abstract class BaseMlmPackagePromax extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $package_id;


	
	protected $package_name;


	
	protected $price;


	
	protected $color;


	
	protected $commission;


	
	protected $monthly_roi;


	
	protected $pips_gen;


	
	protected $public_purchase = '1';


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $pips;


	
	protected $generation;


	
	protected $pips2;


	
	protected $generation2;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPackageId()
	{

		return $this->package_id;
	}

	
	public function getPackageName()
	{

		return $this->package_name;
	}

	
	public function getPrice()
	{

		return $this->price;
	}

	
	public function getColor()
	{

		return $this->color;
	}

	
	public function getCommission()
	{

		return $this->commission;
	}

	
	public function getMonthlyRoi()
	{

		return $this->monthly_roi;
	}

	
	public function getPipsGen()
	{

		return $this->pips_gen;
	}

	
	public function getPublicPurchase()
	{

		return $this->public_purchase;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getCreatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->created_on === null || $this->created_on === '') {
			return null;
		} elseif (!is_int($this->created_on)) {
						$ts = strtotime($this->created_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_on] as date/time value: " . var_export($this->created_on, true));
			}
		} else {
			$ts = $this->created_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function getUpdatedOn($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_on === null || $this->updated_on === '') {
			return null;
		} elseif (!is_int($this->updated_on)) {
						$ts = strtotime($this->updated_on);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_on] as date/time value: " . var_export($this->updated_on, true));
			}
		} else {
			$ts = $this->updated_on;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPips()
	{

		return $this->pips;
	}

	
	public function getGeneration()
	{

		return $this->generation;
	}

	
	public function getPips2()
	{

		return $this->pips2;
	}

	
	public function getGeneration2()
	{

		return $this->generation2;
	}

	
	public function setPackageId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->package_id !== $v) {
			$this->package_id = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::PACKAGE_ID;
		}

	} 
	
	public function setPackageName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->package_name !== $v) {
			$this->package_name = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::PACKAGE_NAME;
		}

	} 
	
	public function setPrice($v)
	{

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::PRICE;
		}

	} 
	
	public function setColor($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->color !== $v) {
			$this->color = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::COLOR;
		}

	} 
	
	public function setCommission($v)
	{

		if ($this->commission !== $v) {
			$this->commission = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::COMMISSION;
		}

	} 
	
	public function setMonthlyRoi($v)
	{

		if ($this->monthly_roi !== $v) {
			$this->monthly_roi = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::MONTHLY_ROI;
		}

	} 
	
	public function setPipsGen($v)
	{

		if ($this->pips_gen !== $v) {
			$this->pips_gen = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::PIPS_GEN;
		}

	} 
	
	public function setPublicPurchase($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->public_purchase !== $v || $v === '1') {
			$this->public_purchase = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::PUBLIC_PURCHASE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::CREATED_BY;
		}

	} 
	
	public function setCreatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_on !== $ts) {
			$this->created_on = $ts;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::UPDATED_BY;
		}

	} 
	
	public function setUpdatedOn($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_on] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_on !== $ts) {
			$this->updated_on = $ts;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::UPDATED_ON;
		}

	} 
	
	public function setPips($v)
	{

		if ($this->pips !== $v) {
			$this->pips = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::PIPS;
		}

	} 
	
	public function setGeneration($v)
	{

		if ($this->generation !== $v) {
			$this->generation = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::GENERATION;
		}

	} 
	
	public function setPips2($v)
	{

		if ($this->pips2 !== $v) {
			$this->pips2 = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::PIPS2;
		}

	} 
	
	public function setGeneration2($v)
	{

		if ($this->generation2 !== $v) {
			$this->generation2 = $v;
			$this->modifiedColumns[] = MlmPackagePromaxPeer::GENERATION2;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->package_id = $rs->getInt($startcol + 0);

			$this->package_name = $rs->getString($startcol + 1);

			$this->price = $rs->getFloat($startcol + 2);

			$this->color = $rs->getString($startcol + 3);

			$this->commission = $rs->getFloat($startcol + 4);

			$this->monthly_roi = $rs->getFloat($startcol + 5);

			$this->pips_gen = $rs->getFloat($startcol + 6);

			$this->public_purchase = $rs->getString($startcol + 7);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->created_on = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->pips = $rs->getFloat($startcol + 12);

			$this->generation = $rs->getFloat($startcol + 13);

			$this->pips2 = $rs->getFloat($startcol + 14);

			$this->generation2 = $rs->getFloat($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackagePromax object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePromaxPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackagePromaxPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackagePromaxPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackagePromaxPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePromaxPeer::DATABASE_NAME);
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
					$pk = MlmPackagePromaxPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPackageId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmPackagePromaxPeer::doUpdate($this, $con);
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


			if (($retval = MlmPackagePromaxPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePromaxPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPackageId();
				break;
			case 1:
				return $this->getPackageName();
				break;
			case 2:
				return $this->getPrice();
				break;
			case 3:
				return $this->getColor();
				break;
			case 4:
				return $this->getCommission();
				break;
			case 5:
				return $this->getMonthlyRoi();
				break;
			case 6:
				return $this->getPipsGen();
				break;
			case 7:
				return $this->getPublicPurchase();
				break;
			case 8:
				return $this->getCreatedBy();
				break;
			case 9:
				return $this->getCreatedOn();
				break;
			case 10:
				return $this->getUpdatedBy();
				break;
			case 11:
				return $this->getUpdatedOn();
				break;
			case 12:
				return $this->getPips();
				break;
			case 13:
				return $this->getGeneration();
				break;
			case 14:
				return $this->getPips2();
				break;
			case 15:
				return $this->getGeneration2();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackagePromaxPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPackageId(),
			$keys[1] => $this->getPackageName(),
			$keys[2] => $this->getPrice(),
			$keys[3] => $this->getColor(),
			$keys[4] => $this->getCommission(),
			$keys[5] => $this->getMonthlyRoi(),
			$keys[6] => $this->getPipsGen(),
			$keys[7] => $this->getPublicPurchase(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedBy(),
			$keys[11] => $this->getUpdatedOn(),
			$keys[12] => $this->getPips(),
			$keys[13] => $this->getGeneration(),
			$keys[14] => $this->getPips2(),
			$keys[15] => $this->getGeneration2(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePromaxPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPackageId($value);
				break;
			case 1:
				$this->setPackageName($value);
				break;
			case 2:
				$this->setPrice($value);
				break;
			case 3:
				$this->setColor($value);
				break;
			case 4:
				$this->setCommission($value);
				break;
			case 5:
				$this->setMonthlyRoi($value);
				break;
			case 6:
				$this->setPipsGen($value);
				break;
			case 7:
				$this->setPublicPurchase($value);
				break;
			case 8:
				$this->setCreatedBy($value);
				break;
			case 9:
				$this->setCreatedOn($value);
				break;
			case 10:
				$this->setUpdatedBy($value);
				break;
			case 11:
				$this->setUpdatedOn($value);
				break;
			case 12:
				$this->setPips($value);
				break;
			case 13:
				$this->setGeneration($value);
				break;
			case 14:
				$this->setPips2($value);
				break;
			case 15:
				$this->setGeneration2($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackagePromaxPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPackageId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPackageName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrice($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setColor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCommission($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonthlyRoi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPipsGen($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPublicPurchase($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPips($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setGeneration($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPips2($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setGeneration2($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackagePromaxPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackagePromaxPeer::PACKAGE_ID)) $criteria->add(MlmPackagePromaxPeer::PACKAGE_ID, $this->package_id);
		if ($this->isColumnModified(MlmPackagePromaxPeer::PACKAGE_NAME)) $criteria->add(MlmPackagePromaxPeer::PACKAGE_NAME, $this->package_name);
		if ($this->isColumnModified(MlmPackagePromaxPeer::PRICE)) $criteria->add(MlmPackagePromaxPeer::PRICE, $this->price);
		if ($this->isColumnModified(MlmPackagePromaxPeer::COLOR)) $criteria->add(MlmPackagePromaxPeer::COLOR, $this->color);
		if ($this->isColumnModified(MlmPackagePromaxPeer::COMMISSION)) $criteria->add(MlmPackagePromaxPeer::COMMISSION, $this->commission);
		if ($this->isColumnModified(MlmPackagePromaxPeer::MONTHLY_ROI)) $criteria->add(MlmPackagePromaxPeer::MONTHLY_ROI, $this->monthly_roi);
		if ($this->isColumnModified(MlmPackagePromaxPeer::PIPS_GEN)) $criteria->add(MlmPackagePromaxPeer::PIPS_GEN, $this->pips_gen);
		if ($this->isColumnModified(MlmPackagePromaxPeer::PUBLIC_PURCHASE)) $criteria->add(MlmPackagePromaxPeer::PUBLIC_PURCHASE, $this->public_purchase);
		if ($this->isColumnModified(MlmPackagePromaxPeer::CREATED_BY)) $criteria->add(MlmPackagePromaxPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackagePromaxPeer::CREATED_ON)) $criteria->add(MlmPackagePromaxPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackagePromaxPeer::UPDATED_BY)) $criteria->add(MlmPackagePromaxPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackagePromaxPeer::UPDATED_ON)) $criteria->add(MlmPackagePromaxPeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(MlmPackagePromaxPeer::PIPS)) $criteria->add(MlmPackagePromaxPeer::PIPS, $this->pips);
		if ($this->isColumnModified(MlmPackagePromaxPeer::GENERATION)) $criteria->add(MlmPackagePromaxPeer::GENERATION, $this->generation);
		if ($this->isColumnModified(MlmPackagePromaxPeer::PIPS2)) $criteria->add(MlmPackagePromaxPeer::PIPS2, $this->pips2);
		if ($this->isColumnModified(MlmPackagePromaxPeer::GENERATION2)) $criteria->add(MlmPackagePromaxPeer::GENERATION2, $this->generation2);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackagePromaxPeer::DATABASE_NAME);

		$criteria->add(MlmPackagePromaxPeer::PACKAGE_ID, $this->package_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPackageId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPackageId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setPackageName($this->package_name);

		$copyObj->setPrice($this->price);

		$copyObj->setColor($this->color);

		$copyObj->setCommission($this->commission);

		$copyObj->setMonthlyRoi($this->monthly_roi);

		$copyObj->setPipsGen($this->pips_gen);

		$copyObj->setPublicPurchase($this->public_purchase);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setPips($this->pips);

		$copyObj->setGeneration($this->generation);

		$copyObj->setPips2($this->pips2);

		$copyObj->setGeneration2($this->generation2);


		$copyObj->setNew(true);

		$copyObj->setPackageId(NULL); 
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
			self::$peer = new MlmPackagePromaxPeer();
		}
		return self::$peer;
	}

} 