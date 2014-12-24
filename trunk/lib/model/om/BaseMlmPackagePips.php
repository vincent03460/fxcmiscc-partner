<?php


abstract class BaseMlmPackagePips extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pips_id;


	
	protected $totol_sponsor;


	
	protected $pips;


	
	protected $generation;


	
	protected $pips2;


	
	protected $generation2;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPipsId()
	{

		return $this->pips_id;
	}

	
	public function getTotolSponsor()
	{

		return $this->totol_sponsor;
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

	
	public function setPipsId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pips_id !== $v) {
			$this->pips_id = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::PIPS_ID;
		}

	} 
	
	public function setTotolSponsor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->totol_sponsor !== $v) {
			$this->totol_sponsor = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::TOTOL_SPONSOR;
		}

	} 
	
	public function setPips($v)
	{

		if ($this->pips !== $v) {
			$this->pips = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::PIPS;
		}

	} 
	
	public function setGeneration($v)
	{

		if ($this->generation !== $v) {
			$this->generation = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::GENERATION;
		}

	} 
	
	public function setPips2($v)
	{

		if ($this->pips2 !== $v) {
			$this->pips2 = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::PIPS2;
		}

	} 
	
	public function setGeneration2($v)
	{

		if ($this->generation2 !== $v) {
			$this->generation2 = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::GENERATION2;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePipsPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmPackagePipsPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmPackagePipsPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->pips_id = $rs->getInt($startcol + 0);

			$this->totol_sponsor = $rs->getInt($startcol + 1);

			$this->pips = $rs->getFloat($startcol + 2);

			$this->generation = $rs->getFloat($startcol + 3);

			$this->pips2 = $rs->getFloat($startcol + 4);

			$this->generation2 = $rs->getFloat($startcol + 5);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->created_on = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->updated_on = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmPackagePips object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePipsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmPackagePipsPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmPackagePipsPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmPackagePipsPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmPackagePipsPeer::DATABASE_NAME);
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
					$pk = MlmPackagePipsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPipsId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmPackagePipsPeer::doUpdate($this, $con);
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


			if (($retval = MlmPackagePipsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePipsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPipsId();
				break;
			case 1:
				return $this->getTotolSponsor();
				break;
			case 2:
				return $this->getPips();
				break;
			case 3:
				return $this->getGeneration();
				break;
			case 4:
				return $this->getPips2();
				break;
			case 5:
				return $this->getGeneration2();
				break;
			case 6:
				return $this->getCreatedBy();
				break;
			case 7:
				return $this->getCreatedOn();
				break;
			case 8:
				return $this->getUpdatedBy();
				break;
			case 9:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackagePipsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPipsId(),
			$keys[1] => $this->getTotolSponsor(),
			$keys[2] => $this->getPips(),
			$keys[3] => $this->getGeneration(),
			$keys[4] => $this->getPips2(),
			$keys[5] => $this->getGeneration2(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedOn(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmPackagePipsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPipsId($value);
				break;
			case 1:
				$this->setTotolSponsor($value);
				break;
			case 2:
				$this->setPips($value);
				break;
			case 3:
				$this->setGeneration($value);
				break;
			case 4:
				$this->setPips2($value);
				break;
			case 5:
				$this->setGeneration2($value);
				break;
			case 6:
				$this->setCreatedBy($value);
				break;
			case 7:
				$this->setCreatedOn($value);
				break;
			case 8:
				$this->setUpdatedBy($value);
				break;
			case 9:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmPackagePipsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPipsId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTotolSponsor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPips($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGeneration($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPips2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGeneration2($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedOn($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmPackagePipsPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmPackagePipsPeer::PIPS_ID)) $criteria->add(MlmPackagePipsPeer::PIPS_ID, $this->pips_id);
		if ($this->isColumnModified(MlmPackagePipsPeer::TOTOL_SPONSOR)) $criteria->add(MlmPackagePipsPeer::TOTOL_SPONSOR, $this->totol_sponsor);
		if ($this->isColumnModified(MlmPackagePipsPeer::PIPS)) $criteria->add(MlmPackagePipsPeer::PIPS, $this->pips);
		if ($this->isColumnModified(MlmPackagePipsPeer::GENERATION)) $criteria->add(MlmPackagePipsPeer::GENERATION, $this->generation);
		if ($this->isColumnModified(MlmPackagePipsPeer::PIPS2)) $criteria->add(MlmPackagePipsPeer::PIPS2, $this->pips2);
		if ($this->isColumnModified(MlmPackagePipsPeer::GENERATION2)) $criteria->add(MlmPackagePipsPeer::GENERATION2, $this->generation2);
		if ($this->isColumnModified(MlmPackagePipsPeer::CREATED_BY)) $criteria->add(MlmPackagePipsPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmPackagePipsPeer::CREATED_ON)) $criteria->add(MlmPackagePipsPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmPackagePipsPeer::UPDATED_BY)) $criteria->add(MlmPackagePipsPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmPackagePipsPeer::UPDATED_ON)) $criteria->add(MlmPackagePipsPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmPackagePipsPeer::DATABASE_NAME);

		$criteria->add(MlmPackagePipsPeer::PIPS_ID, $this->pips_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPipsId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPipsId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTotolSponsor($this->totol_sponsor);

		$copyObj->setPips($this->pips);

		$copyObj->setGeneration($this->generation);

		$copyObj->setPips2($this->pips2);

		$copyObj->setGeneration2($this->generation2);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setPipsId(NULL); 
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
			self::$peer = new MlmPackagePipsPeer();
		}
		return self::$peer;
	}

} 