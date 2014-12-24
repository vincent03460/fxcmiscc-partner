<?php


abstract class BaseMlmPackage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $package_id;


	
	protected $package_name;


	
	protected $price;


	
	protected $color;


	
	protected $commission;


	
	protected $monthly_roi;


	
	protected $pips_gen;


	
	protected $public_purchase = '1';


	
	protected $leader_bonus;


	
	protected $pips;


	
	protected $generation;


	
	protected $pips2;


	
	protected $generation2;


	
	protected $pips3;


	
	protected $generation3;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
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

	
	public function getLeaderBonus()
	{

		return $this->leader_bonus;
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

	
	public function getPips3()
	{

		return $this->pips3;
	}

	
	public function getGeneration3()
	{

		return $this->generation3;
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

	
	public function setPackageId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->package_id !== $v) {
			$this->package_id = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PACKAGE_ID;
		}

	} 
	
	public function setPackageName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->package_name !== $v) {
			$this->package_name = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PACKAGE_NAME;
		}

	} 
	
	public function setPrice($v)
	{

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PRICE;
		}

	} 
	
	public function setColor($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->color !== $v) {
			$this->color = $v;
			$this->modifiedColumns[] = MlmPackagePeer::COLOR;
		}

	} 
	
	public function setCommission($v)
	{

		if ($this->commission !== $v) {
			$this->commission = $v;
			$this->modifiedColumns[] = MlmPackagePeer::COMMISSION;
		}

	} 
	
	public function setMonthlyRoi($v)
	{

		if ($this->monthly_roi !== $v) {
			$this->monthly_roi = $v;
			$this->modifiedColumns[] = MlmPackagePeer::MONTHLY_ROI;
		}

	} 
	
	public function setPipsGen($v)
	{

		if ($this->pips_gen !== $v) {
			$this->pips_gen = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PIPS_GEN;
		}

	} 
	
	public function setPublicPurchase($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->public_purchase !== $v || $v === '1') {
			$this->public_purchase = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PUBLIC_PURCHASE;
		}

	} 
	
	public function setLeaderBonus($v)
	{

		if ($this->leader_bonus !== $v) {
			$this->leader_bonus = $v;
			$this->modifiedColumns[] = MlmPackagePeer::LEADER_BONUS;
		}

	} 
	
	public function setPips($v)
	{

		if ($this->pips !== $v) {
			$this->pips = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PIPS;
		}

	} 
	
	public function setGeneration($v)
	{

		if ($this->generation !== $v) {
			$this->generation = $v;
			$this->modifiedColumns[] = MlmPackagePeer::GENERATION;
		}

	} 
	
	public function setPips2($v)
	{

		if ($this->pips2 !== $v) {
			$this->pips2 = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PIPS2;
		}

	} 
	
	public function setGeneration2($v)
	{

		if ($this->generation2 !== $v) {
			$this->generation2 = $v;
			$this->modifiedColumns[] = MlmPackagePeer::GENERATION2;
		}

	} 
	
	public function setPips3($v)
	{

		if ($this->pips3 !== $v) {
			$this->pips3 = $v;
			$this->modifiedColumns[] = MlmPackagePeer::PIPS3;
		}

	} 
	
	public function setGeneration3($v)
	{

		if ($this->generation3 !== $v) {
			$this->generation3 = $v;
			$this->modifiedColumns[] = MlmPackagePeer::GENERATION3;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackagePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackagePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePeer::UPDATED_ON;
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

			$this->leader_bonus = $rs->getFloat($startcol + 8);

			$this->pips = $rs->getFloat($startcol + 9);

			$this->generation = $rs->getFloat($startcol + 10);

			$this->pips2 = $rs->getFloat($startcol + 11);

			$this->generation2 = $rs->getFloat($startcol + 12);

			$this->pips3 = $rs->getFloat($startcol + 13);

			$this->generation3 = $rs->getFloat($startcol + 14);

			$this->created_by = $rs->getInt($startcol + 15);

			$this->created_on = $rs->getTimestamp($startcol + 16, null);

			$this->updated_by = $rs->getInt($startcol + 17);

			$this->updated_on = $rs->getTimestamp($startcol + 18, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackage object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackagePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackagePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackagePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePeer::DATABASE_NAME);
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
					$pk = MlmPackagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPackageId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmPackagePeer::doUpdate($this, $con);
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


			if (($retval = MlmPackagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLeaderBonus();
				break;
			case 9:
				return $this->getPips();
				break;
			case 10:
				return $this->getGeneration();
				break;
			case 11:
				return $this->getPips2();
				break;
			case 12:
				return $this->getGeneration2();
				break;
			case 13:
				return $this->getPips3();
				break;
			case 14:
				return $this->getGeneration3();
				break;
			case 15:
				return $this->getCreatedBy();
				break;
			case 16:
				return $this->getCreatedOn();
				break;
			case 17:
				return $this->getUpdatedBy();
				break;
			case 18:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPackageId(),
			$keys[1] => $this->getPackageName(),
			$keys[2] => $this->getPrice(),
			$keys[3] => $this->getColor(),
			$keys[4] => $this->getCommission(),
			$keys[5] => $this->getMonthlyRoi(),
			$keys[6] => $this->getPipsGen(),
			$keys[7] => $this->getPublicPurchase(),
			$keys[8] => $this->getLeaderBonus(),
			$keys[9] => $this->getPips(),
			$keys[10] => $this->getGeneration(),
			$keys[11] => $this->getPips2(),
			$keys[12] => $this->getGeneration2(),
			$keys[13] => $this->getPips3(),
			$keys[14] => $this->getGeneration3(),
			$keys[15] => $this->getCreatedBy(),
			$keys[16] => $this->getCreatedOn(),
			$keys[17] => $this->getUpdatedBy(),
			$keys[18] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setLeaderBonus($value);
				break;
			case 9:
				$this->setPips($value);
				break;
			case 10:
				$this->setGeneration($value);
				break;
			case 11:
				$this->setPips2($value);
				break;
			case 12:
				$this->setGeneration2($value);
				break;
			case 13:
				$this->setPips3($value);
				break;
			case 14:
				$this->setGeneration3($value);
				break;
			case 15:
				$this->setCreatedBy($value);
				break;
			case 16:
				$this->setCreatedOn($value);
				break;
			case 17:
				$this->setUpdatedBy($value);
				break;
			case 18:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPackageId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPackageName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrice($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setColor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCommission($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonthlyRoi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPipsGen($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPublicPurchase($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLeaderBonus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPips($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setGeneration($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPips2($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setGeneration2($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPips3($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setGeneration3($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedBy($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedOn($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUpdatedBy($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setUpdatedOn($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackagePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackagePeer::PACKAGE_ID)) $criteria->add(MlmPackagePeer::PACKAGE_ID, $this->package_id);
		if ($this->isColumnModified(MlmPackagePeer::PACKAGE_NAME)) $criteria->add(MlmPackagePeer::PACKAGE_NAME, $this->package_name);
		if ($this->isColumnModified(MlmPackagePeer::PRICE)) $criteria->add(MlmPackagePeer::PRICE, $this->price);
		if ($this->isColumnModified(MlmPackagePeer::COLOR)) $criteria->add(MlmPackagePeer::COLOR, $this->color);
		if ($this->isColumnModified(MlmPackagePeer::COMMISSION)) $criteria->add(MlmPackagePeer::COMMISSION, $this->commission);
		if ($this->isColumnModified(MlmPackagePeer::MONTHLY_ROI)) $criteria->add(MlmPackagePeer::MONTHLY_ROI, $this->monthly_roi);
		if ($this->isColumnModified(MlmPackagePeer::PIPS_GEN)) $criteria->add(MlmPackagePeer::PIPS_GEN, $this->pips_gen);
		if ($this->isColumnModified(MlmPackagePeer::PUBLIC_PURCHASE)) $criteria->add(MlmPackagePeer::PUBLIC_PURCHASE, $this->public_purchase);
		if ($this->isColumnModified(MlmPackagePeer::LEADER_BONUS)) $criteria->add(MlmPackagePeer::LEADER_BONUS, $this->leader_bonus);
		if ($this->isColumnModified(MlmPackagePeer::PIPS)) $criteria->add(MlmPackagePeer::PIPS, $this->pips);
		if ($this->isColumnModified(MlmPackagePeer::GENERATION)) $criteria->add(MlmPackagePeer::GENERATION, $this->generation);
		if ($this->isColumnModified(MlmPackagePeer::PIPS2)) $criteria->add(MlmPackagePeer::PIPS2, $this->pips2);
		if ($this->isColumnModified(MlmPackagePeer::GENERATION2)) $criteria->add(MlmPackagePeer::GENERATION2, $this->generation2);
		if ($this->isColumnModified(MlmPackagePeer::PIPS3)) $criteria->add(MlmPackagePeer::PIPS3, $this->pips3);
		if ($this->isColumnModified(MlmPackagePeer::GENERATION3)) $criteria->add(MlmPackagePeer::GENERATION3, $this->generation3);
		if ($this->isColumnModified(MlmPackagePeer::CREATED_BY)) $criteria->add(MlmPackagePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackagePeer::CREATED_ON)) $criteria->add(MlmPackagePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackagePeer::UPDATED_BY)) $criteria->add(MlmPackagePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackagePeer::UPDATED_ON)) $criteria->add(MlmPackagePeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackagePeer::DATABASE_NAME);

		$criteria->add(MlmPackagePeer::PACKAGE_ID, $this->package_id);

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

		$copyObj->setLeaderBonus($this->leader_bonus);

		$copyObj->setPips($this->pips);

		$copyObj->setGeneration($this->generation);

		$copyObj->setPips2($this->pips2);

		$copyObj->setGeneration2($this->generation2);

		$copyObj->setPips3($this->pips3);

		$copyObj->setGeneration3($this->generation3);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


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
			self::$peer = new MlmPackagePeer();
		}
		return self::$peer;
	}

} 