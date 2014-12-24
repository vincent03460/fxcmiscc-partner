<?php


abstract class BaseMlmRoiDividend extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $devidend_id;


	
	protected $dist_id;


	
	protected $mt4_user_name;


	
	protected $idx;


	
	protected $account_ledger_id;


	
	protected $dividend_date;


	
	protected $package_id;


	
	protected $package_price = 0;


	
	protected $roi_percentage = 0;


	
	protected $mt4_balance = 0;


	
	protected $dividend_amount = 0;


	
	protected $remarks;


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $first_dividend_date;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDevidendId()
	{

		return $this->devidend_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getMt4UserName()
	{

		return $this->mt4_user_name;
	}

	
	public function getIdx()
	{

		return $this->idx;
	}

	
	public function getAccountLedgerId()
	{

		return $this->account_ledger_id;
	}

	
	public function getDividendDate($format = 'Y-m-d H:i:s')
	{

		if ($this->dividend_date === null || $this->dividend_date === '') {
			return null;
		} elseif (!is_int($this->dividend_date)) {
						$ts = strtotime($this->dividend_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [dividend_date] as date/time value: " . var_export($this->dividend_date, true));
			}
		} else {
			$ts = $this->dividend_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPackageId()
	{

		return $this->package_id;
	}

	
	public function getPackagePrice()
	{

		return $this->package_price;
	}

	
	public function getRoiPercentage()
	{

		return $this->roi_percentage;
	}

	
	public function getMt4Balance()
	{

		return $this->mt4_balance;
	}

	
	public function getDividendAmount()
	{

		return $this->dividend_amount;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
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

	
	public function getFirstDividendDate($format = 'Y-m-d H:i:s')
	{

		if ($this->first_dividend_date === null || $this->first_dividend_date === '') {
			return null;
		} elseif (!is_int($this->first_dividend_date)) {
						$ts = strtotime($this->first_dividend_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [first_dividend_date] as date/time value: " . var_export($this->first_dividend_date, true));
			}
		} else {
			$ts = $this->first_dividend_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setDevidendId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->devidend_id !== $v) {
			$this->devidend_id = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::DEVIDEND_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::DIST_ID;
		}

	} 
	
	public function setMt4UserName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_user_name !== $v) {
			$this->mt4_user_name = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::MT4_USER_NAME;
		}

	} 
	
	public function setIdx($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->idx !== $v) {
			$this->idx = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::IDX;
		}

	} 
	
	public function setAccountLedgerId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->account_ledger_id !== $v) {
			$this->account_ledger_id = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::ACCOUNT_LEDGER_ID;
		}

	} 
	
	public function setDividendDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [dividend_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->dividend_date !== $ts) {
			$this->dividend_date = $ts;
			$this->modifiedColumns[] = MlmRoiDividendPeer::DIVIDEND_DATE;
		}

	} 
	
	public function setPackageId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->package_id !== $v) {
			$this->package_id = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::PACKAGE_ID;
		}

	} 
	
	public function setPackagePrice($v)
	{

		if ($this->package_price !== $v || $v === 0) {
			$this->package_price = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::PACKAGE_PRICE;
		}

	} 
	
	public function setRoiPercentage($v)
	{

		if ($this->roi_percentage !== $v || $v === 0) {
			$this->roi_percentage = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::ROI_PERCENTAGE;
		}

	} 
	
	public function setMt4Balance($v)
	{

		if ($this->mt4_balance !== $v || $v === 0) {
			$this->mt4_balance = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::MT4_BALANCE;
		}

	} 
	
	public function setDividendAmount($v)
	{

		if ($this->dividend_amount !== $v || $v === 0) {
			$this->dividend_amount = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::DIVIDEND_AMOUNT;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::REMARKS;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmRoiDividendPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmRoiDividendPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmRoiDividendPeer::UPDATED_ON;
		}

	} 
	
	public function setFirstDividendDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [first_dividend_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->first_dividend_date !== $ts) {
			$this->first_dividend_date = $ts;
			$this->modifiedColumns[] = MlmRoiDividendPeer::FIRST_DIVIDEND_DATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->devidend_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->mt4_user_name = $rs->getString($startcol + 2);

			$this->idx = $rs->getInt($startcol + 3);

			$this->account_ledger_id = $rs->getInt($startcol + 4);

			$this->dividend_date = $rs->getTimestamp($startcol + 5, null);

			$this->package_id = $rs->getInt($startcol + 6);

			$this->package_price = $rs->getFloat($startcol + 7);

			$this->roi_percentage = $rs->getFloat($startcol + 8);

			$this->mt4_balance = $rs->getFloat($startcol + 9);

			$this->dividend_amount = $rs->getFloat($startcol + 10);

			$this->remarks = $rs->getString($startcol + 11);

			$this->status_code = $rs->getString($startcol + 12);

			$this->created_by = $rs->getInt($startcol + 13);

			$this->created_on = $rs->getTimestamp($startcol + 14, null);

			$this->updated_by = $rs->getInt($startcol + 15);

			$this->updated_on = $rs->getTimestamp($startcol + 16, null);

			$this->first_dividend_date = $rs->getTimestamp($startcol + 17, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmRoiDividend object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmRoiDividendPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmRoiDividendPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmRoiDividendPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmRoiDividendPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmRoiDividendPeer::DATABASE_NAME);
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
					$pk = MlmRoiDividendPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setDevidendId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmRoiDividendPeer::doUpdate($this, $con);
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


			if (($retval = MlmRoiDividendPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmRoiDividendPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDevidendId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getMt4UserName();
				break;
			case 3:
				return $this->getIdx();
				break;
			case 4:
				return $this->getAccountLedgerId();
				break;
			case 5:
				return $this->getDividendDate();
				break;
			case 6:
				return $this->getPackageId();
				break;
			case 7:
				return $this->getPackagePrice();
				break;
			case 8:
				return $this->getRoiPercentage();
				break;
			case 9:
				return $this->getMt4Balance();
				break;
			case 10:
				return $this->getDividendAmount();
				break;
			case 11:
				return $this->getRemarks();
				break;
			case 12:
				return $this->getStatusCode();
				break;
			case 13:
				return $this->getCreatedBy();
				break;
			case 14:
				return $this->getCreatedOn();
				break;
			case 15:
				return $this->getUpdatedBy();
				break;
			case 16:
				return $this->getUpdatedOn();
				break;
			case 17:
				return $this->getFirstDividendDate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmRoiDividendPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDevidendId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getMt4UserName(),
			$keys[3] => $this->getIdx(),
			$keys[4] => $this->getAccountLedgerId(),
			$keys[5] => $this->getDividendDate(),
			$keys[6] => $this->getPackageId(),
			$keys[7] => $this->getPackagePrice(),
			$keys[8] => $this->getRoiPercentage(),
			$keys[9] => $this->getMt4Balance(),
			$keys[10] => $this->getDividendAmount(),
			$keys[11] => $this->getRemarks(),
			$keys[12] => $this->getStatusCode(),
			$keys[13] => $this->getCreatedBy(),
			$keys[14] => $this->getCreatedOn(),
			$keys[15] => $this->getUpdatedBy(),
			$keys[16] => $this->getUpdatedOn(),
			$keys[17] => $this->getFirstDividendDate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmRoiDividendPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDevidendId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setMt4UserName($value);
				break;
			case 3:
				$this->setIdx($value);
				break;
			case 4:
				$this->setAccountLedgerId($value);
				break;
			case 5:
				$this->setDividendDate($value);
				break;
			case 6:
				$this->setPackageId($value);
				break;
			case 7:
				$this->setPackagePrice($value);
				break;
			case 8:
				$this->setRoiPercentage($value);
				break;
			case 9:
				$this->setMt4Balance($value);
				break;
			case 10:
				$this->setDividendAmount($value);
				break;
			case 11:
				$this->setRemarks($value);
				break;
			case 12:
				$this->setStatusCode($value);
				break;
			case 13:
				$this->setCreatedBy($value);
				break;
			case 14:
				$this->setCreatedOn($value);
				break;
			case 15:
				$this->setUpdatedBy($value);
				break;
			case 16:
				$this->setUpdatedOn($value);
				break;
			case 17:
				$this->setFirstDividendDate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmRoiDividendPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDevidendId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMt4UserName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdx($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAccountLedgerId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDividendDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPackageId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPackagePrice($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRoiPercentage($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMt4Balance($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDividendAmount($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRemarks($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStatusCode($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedOn($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedBy($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedOn($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFirstDividendDate($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmRoiDividendPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmRoiDividendPeer::DEVIDEND_ID)) $criteria->add(MlmRoiDividendPeer::DEVIDEND_ID, $this->devidend_id);
		if ($this->isColumnModified(MlmRoiDividendPeer::DIST_ID)) $criteria->add(MlmRoiDividendPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmRoiDividendPeer::MT4_USER_NAME)) $criteria->add(MlmRoiDividendPeer::MT4_USER_NAME, $this->mt4_user_name);
		if ($this->isColumnModified(MlmRoiDividendPeer::IDX)) $criteria->add(MlmRoiDividendPeer::IDX, $this->idx);
		if ($this->isColumnModified(MlmRoiDividendPeer::ACCOUNT_LEDGER_ID)) $criteria->add(MlmRoiDividendPeer::ACCOUNT_LEDGER_ID, $this->account_ledger_id);
		if ($this->isColumnModified(MlmRoiDividendPeer::DIVIDEND_DATE)) $criteria->add(MlmRoiDividendPeer::DIVIDEND_DATE, $this->dividend_date);
		if ($this->isColumnModified(MlmRoiDividendPeer::PACKAGE_ID)) $criteria->add(MlmRoiDividendPeer::PACKAGE_ID, $this->package_id);
		if ($this->isColumnModified(MlmRoiDividendPeer::PACKAGE_PRICE)) $criteria->add(MlmRoiDividendPeer::PACKAGE_PRICE, $this->package_price);
		if ($this->isColumnModified(MlmRoiDividendPeer::ROI_PERCENTAGE)) $criteria->add(MlmRoiDividendPeer::ROI_PERCENTAGE, $this->roi_percentage);
		if ($this->isColumnModified(MlmRoiDividendPeer::MT4_BALANCE)) $criteria->add(MlmRoiDividendPeer::MT4_BALANCE, $this->mt4_balance);
		if ($this->isColumnModified(MlmRoiDividendPeer::DIVIDEND_AMOUNT)) $criteria->add(MlmRoiDividendPeer::DIVIDEND_AMOUNT, $this->dividend_amount);
		if ($this->isColumnModified(MlmRoiDividendPeer::REMARKS)) $criteria->add(MlmRoiDividendPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmRoiDividendPeer::STATUS_CODE)) $criteria->add(MlmRoiDividendPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmRoiDividendPeer::CREATED_BY)) $criteria->add(MlmRoiDividendPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmRoiDividendPeer::CREATED_ON)) $criteria->add(MlmRoiDividendPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmRoiDividendPeer::UPDATED_BY)) $criteria->add(MlmRoiDividendPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmRoiDividendPeer::UPDATED_ON)) $criteria->add(MlmRoiDividendPeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(MlmRoiDividendPeer::FIRST_DIVIDEND_DATE)) $criteria->add(MlmRoiDividendPeer::FIRST_DIVIDEND_DATE, $this->first_dividend_date);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmRoiDividendPeer::DATABASE_NAME);

		$criteria->add(MlmRoiDividendPeer::DEVIDEND_ID, $this->devidend_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getDevidendId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setDevidendId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setMt4UserName($this->mt4_user_name);

		$copyObj->setIdx($this->idx);

		$copyObj->setAccountLedgerId($this->account_ledger_id);

		$copyObj->setDividendDate($this->dividend_date);

		$copyObj->setPackageId($this->package_id);

		$copyObj->setPackagePrice($this->package_price);

		$copyObj->setRoiPercentage($this->roi_percentage);

		$copyObj->setMt4Balance($this->mt4_balance);

		$copyObj->setDividendAmount($this->dividend_amount);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setFirstDividendDate($this->first_dividend_date);


		$copyObj->setNew(true);

		$copyObj->setDevidendId(NULL); 
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
			self::$peer = new MlmRoiDividendPeer();
		}
		return self::$peer;
	}

} 