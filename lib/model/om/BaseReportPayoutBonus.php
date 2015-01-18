<?php


abstract class BaseReportPayoutBonus extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $account_id;


	
	protected $bonus_date;


	
	protected $total_sales = 0;


	
	protected $total_drb = 0;


	
	protected $total_gdb = 0;


	
	protected $gdb_percentage = 0;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAccountId()
	{

		return $this->account_id;
	}

	
	public function getBonusDate($format = 'Y-m-d H:i:s')
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

	
	public function getTotalSales()
	{

		return $this->total_sales;
	}

	
	public function getTotalDrb()
	{

		return $this->total_drb;
	}

	
	public function getTotalGdb()
	{

		return $this->total_gdb;
	}

	
	public function getGdbPercentage()
	{

		return $this->gdb_percentage;
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

	
	public function setAccountId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_id !== $v) {
			$this->account_id = $v;
			$this->modifiedColumns[] = ReportPayoutBonusPeer::ACCOUNT_ID;
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
			$this->modifiedColumns[] = ReportPayoutBonusPeer::BONUS_DATE;
		}

	} 
	
	public function setTotalSales($v)
	{

		if ($this->total_sales !== $v || $v === 0) {
			$this->total_sales = $v;
			$this->modifiedColumns[] = ReportPayoutBonusPeer::TOTAL_SALES;
		}

	} 
	
	public function setTotalDrb($v)
	{

		if ($this->total_drb !== $v || $v === 0) {
			$this->total_drb = $v;
			$this->modifiedColumns[] = ReportPayoutBonusPeer::TOTAL_DRB;
		}

	} 
	
	public function setTotalGdb($v)
	{

		if ($this->total_gdb !== $v || $v === 0) {
			$this->total_gdb = $v;
			$this->modifiedColumns[] = ReportPayoutBonusPeer::TOTAL_GDB;
		}

	} 
	
	public function setGdbPercentage($v)
	{

		if ($this->gdb_percentage !== $v || $v === 0) {
			$this->gdb_percentage = $v;
			$this->modifiedColumns[] = ReportPayoutBonusPeer::GDB_PERCENTAGE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ReportPayoutBonusPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ReportPayoutBonusPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ReportPayoutBonusPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = ReportPayoutBonusPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->account_id = $rs->getInt($startcol + 0);

			$this->bonus_date = $rs->getTimestamp($startcol + 1, null);

			$this->total_sales = $rs->getFloat($startcol + 2);

			$this->total_drb = $rs->getFloat($startcol + 3);

			$this->total_gdb = $rs->getFloat($startcol + 4);

			$this->gdb_percentage = $rs->getFloat($startcol + 5);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->created_on = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->updated_on = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ReportPayoutBonus object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ReportPayoutBonusPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ReportPayoutBonusPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ReportPayoutBonusPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ReportPayoutBonusPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ReportPayoutBonusPeer::DATABASE_NAME);
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
					$pk = ReportPayoutBonusPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setAccountId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ReportPayoutBonusPeer::doUpdate($this, $con);
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


			if (($retval = ReportPayoutBonusPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ReportPayoutBonusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAccountId();
				break;
			case 1:
				return $this->getBonusDate();
				break;
			case 2:
				return $this->getTotalSales();
				break;
			case 3:
				return $this->getTotalDrb();
				break;
			case 4:
				return $this->getTotalGdb();
				break;
			case 5:
				return $this->getGdbPercentage();
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
		$keys = ReportPayoutBonusPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAccountId(),
			$keys[1] => $this->getBonusDate(),
			$keys[2] => $this->getTotalSales(),
			$keys[3] => $this->getTotalDrb(),
			$keys[4] => $this->getTotalGdb(),
			$keys[5] => $this->getGdbPercentage(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedOn(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ReportPayoutBonusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAccountId($value);
				break;
			case 1:
				$this->setBonusDate($value);
				break;
			case 2:
				$this->setTotalSales($value);
				break;
			case 3:
				$this->setTotalDrb($value);
				break;
			case 4:
				$this->setTotalGdb($value);
				break;
			case 5:
				$this->setGdbPercentage($value);
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
		$keys = ReportPayoutBonusPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAccountId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBonusDate($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTotalSales($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotalDrb($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotalGdb($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGdbPercentage($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedOn($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ReportPayoutBonusPeer::DATABASE_NAME);

		if ($this->isColumnModified(ReportPayoutBonusPeer::ACCOUNT_ID)) $criteria->add(ReportPayoutBonusPeer::ACCOUNT_ID, $this->account_id);
		if ($this->isColumnModified(ReportPayoutBonusPeer::BONUS_DATE)) $criteria->add(ReportPayoutBonusPeer::BONUS_DATE, $this->bonus_date);
		if ($this->isColumnModified(ReportPayoutBonusPeer::TOTAL_SALES)) $criteria->add(ReportPayoutBonusPeer::TOTAL_SALES, $this->total_sales);
		if ($this->isColumnModified(ReportPayoutBonusPeer::TOTAL_DRB)) $criteria->add(ReportPayoutBonusPeer::TOTAL_DRB, $this->total_drb);
		if ($this->isColumnModified(ReportPayoutBonusPeer::TOTAL_GDB)) $criteria->add(ReportPayoutBonusPeer::TOTAL_GDB, $this->total_gdb);
		if ($this->isColumnModified(ReportPayoutBonusPeer::GDB_PERCENTAGE)) $criteria->add(ReportPayoutBonusPeer::GDB_PERCENTAGE, $this->gdb_percentage);
		if ($this->isColumnModified(ReportPayoutBonusPeer::CREATED_BY)) $criteria->add(ReportPayoutBonusPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ReportPayoutBonusPeer::CREATED_ON)) $criteria->add(ReportPayoutBonusPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(ReportPayoutBonusPeer::UPDATED_BY)) $criteria->add(ReportPayoutBonusPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ReportPayoutBonusPeer::UPDATED_ON)) $criteria->add(ReportPayoutBonusPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ReportPayoutBonusPeer::DATABASE_NAME);

		$criteria->add(ReportPayoutBonusPeer::ACCOUNT_ID, $this->account_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAccountId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAccountId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setBonusDate($this->bonus_date);

		$copyObj->setTotalSales($this->total_sales);

		$copyObj->setTotalDrb($this->total_drb);

		$copyObj->setTotalGdb($this->total_gdb);

		$copyObj->setGdbPercentage($this->gdb_percentage);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setAccountId(NULL); 
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
			self::$peer = new ReportPayoutBonusPeer();
		}
		return self::$peer;
	}

} 