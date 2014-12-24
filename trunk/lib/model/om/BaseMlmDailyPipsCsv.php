<?php


abstract class BaseMlmDailyPipsCsv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pip_id;


	
	protected $traded_datetime;


	
	protected $file_id;


	
	protected $pips_string;


	
	protected $login_id;


	
	protected $login_name;


	
	protected $balance;


	
	protected $credit;


	
	protected $commissions;


	
	protected $taxes;


	
	protected $storage;


	
	protected $profit;


	
	protected $interest;


	
	protected $tax;


	
	protected $unrealizedpl;


	
	protected $equity;


	
	protected $status_code;


	
	protected $remarks;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPipId()
	{

		return $this->pip_id;
	}

	
	public function getTradedDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->traded_datetime === null || $this->traded_datetime === '') {
			return null;
		} elseif (!is_int($this->traded_datetime)) {
						$ts = strtotime($this->traded_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [traded_datetime] as date/time value: " . var_export($this->traded_datetime, true));
			}
		} else {
			$ts = $this->traded_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFileId()
	{

		return $this->file_id;
	}

	
	public function getPipsString()
	{

		return $this->pips_string;
	}

	
	public function getLoginId()
	{

		return $this->login_id;
	}

	
	public function getLoginName()
	{

		return $this->login_name;
	}

	
	public function getBalance()
	{

		return $this->balance;
	}

	
	public function getCredit()
	{

		return $this->credit;
	}

	
	public function getCommissions()
	{

		return $this->commissions;
	}

	
	public function getTaxes()
	{

		return $this->taxes;
	}

	
	public function getStorage()
	{

		return $this->storage;
	}

	
	public function getProfit()
	{

		return $this->profit;
	}

	
	public function getInterest()
	{

		return $this->interest;
	}

	
	public function getTax()
	{

		return $this->tax;
	}

	
	public function getUnrealizedpl()
	{

		return $this->unrealizedpl;
	}

	
	public function getEquity()
	{

		return $this->equity;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
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

	
	public function setPipId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pip_id !== $v) {
			$this->pip_id = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::PIP_ID;
		}

	} 
	
	public function setTradedDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [traded_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->traded_datetime !== $ts) {
			$this->traded_datetime = $ts;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::TRADED_DATETIME;
		}

	} 
	
	public function setFileId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_id !== $v) {
			$this->file_id = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::FILE_ID;
		}

	} 
	
	public function setPipsString($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pips_string !== $v) {
			$this->pips_string = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::PIPS_STRING;
		}

	} 
	
	public function setLoginId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->login_id !== $v) {
			$this->login_id = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::LOGIN_ID;
		}

	} 
	
	public function setLoginName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->login_name !== $v) {
			$this->login_name = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::LOGIN_NAME;
		}

	} 
	
	public function setBalance($v)
	{

		if ($this->balance !== $v) {
			$this->balance = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::BALANCE;
		}

	} 
	
	public function setCredit($v)
	{

		if ($this->credit !== $v) {
			$this->credit = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::CREDIT;
		}

	} 
	
	public function setCommissions($v)
	{

		if ($this->commissions !== $v) {
			$this->commissions = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::COMMISSIONS;
		}

	} 
	
	public function setTaxes($v)
	{

		if ($this->taxes !== $v) {
			$this->taxes = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::TAXES;
		}

	} 
	
	public function setStorage($v)
	{

		if ($this->storage !== $v) {
			$this->storage = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::STORAGE;
		}

	} 
	
	public function setProfit($v)
	{

		if ($this->profit !== $v) {
			$this->profit = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::PROFIT;
		}

	} 
	
	public function setInterest($v)
	{

		if ($this->interest !== $v) {
			$this->interest = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::INTEREST;
		}

	} 
	
	public function setTax($v)
	{

		if ($this->tax !== $v) {
			$this->tax = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::TAX;
		}

	} 
	
	public function setUnrealizedpl($v)
	{

		if ($this->unrealizedpl !== $v) {
			$this->unrealizedpl = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::UNREALIZEDPL;
		}

	} 
	
	public function setEquity($v)
	{

		if ($this->equity !== $v) {
			$this->equity = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::EQUITY;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::STATUS_CODE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDailyPipsCsvPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->pip_id = $rs->getInt($startcol + 0);

			$this->traded_datetime = $rs->getTimestamp($startcol + 1, null);

			$this->file_id = $rs->getInt($startcol + 2);

			$this->pips_string = $rs->getString($startcol + 3);

			$this->login_id = $rs->getInt($startcol + 4);

			$this->login_name = $rs->getString($startcol + 5);

			$this->balance = $rs->getFloat($startcol + 6);

			$this->credit = $rs->getFloat($startcol + 7);

			$this->commissions = $rs->getFloat($startcol + 8);

			$this->taxes = $rs->getFloat($startcol + 9);

			$this->storage = $rs->getFloat($startcol + 10);

			$this->profit = $rs->getFloat($startcol + 11);

			$this->interest = $rs->getFloat($startcol + 12);

			$this->tax = $rs->getFloat($startcol + 13);

			$this->unrealizedpl = $rs->getFloat($startcol + 14);

			$this->equity = $rs->getFloat($startcol + 15);

			$this->status_code = $rs->getString($startcol + 16);

			$this->remarks = $rs->getString($startcol + 17);

			$this->created_by = $rs->getInt($startcol + 18);

			$this->created_on = $rs->getTimestamp($startcol + 19, null);

			$this->updated_by = $rs->getInt($startcol + 20);

			$this->updated_on = $rs->getTimestamp($startcol + 21, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDailyPipsCsv object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDailyPipsCsvPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDailyPipsCsvPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDailyPipsCsvPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDailyPipsCsvPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDailyPipsCsvPeer::DATABASE_NAME);
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
					$pk = MlmDailyPipsCsvPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPipId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDailyPipsCsvPeer::doUpdate($this, $con);
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


			if (($retval = MlmDailyPipsCsvPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDailyPipsCsvPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPipId();
				break;
			case 1:
				return $this->getTradedDatetime();
				break;
			case 2:
				return $this->getFileId();
				break;
			case 3:
				return $this->getPipsString();
				break;
			case 4:
				return $this->getLoginId();
				break;
			case 5:
				return $this->getLoginName();
				break;
			case 6:
				return $this->getBalance();
				break;
			case 7:
				return $this->getCredit();
				break;
			case 8:
				return $this->getCommissions();
				break;
			case 9:
				return $this->getTaxes();
				break;
			case 10:
				return $this->getStorage();
				break;
			case 11:
				return $this->getProfit();
				break;
			case 12:
				return $this->getInterest();
				break;
			case 13:
				return $this->getTax();
				break;
			case 14:
				return $this->getUnrealizedpl();
				break;
			case 15:
				return $this->getEquity();
				break;
			case 16:
				return $this->getStatusCode();
				break;
			case 17:
				return $this->getRemarks();
				break;
			case 18:
				return $this->getCreatedBy();
				break;
			case 19:
				return $this->getCreatedOn();
				break;
			case 20:
				return $this->getUpdatedBy();
				break;
			case 21:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDailyPipsCsvPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPipId(),
			$keys[1] => $this->getTradedDatetime(),
			$keys[2] => $this->getFileId(),
			$keys[3] => $this->getPipsString(),
			$keys[4] => $this->getLoginId(),
			$keys[5] => $this->getLoginName(),
			$keys[6] => $this->getBalance(),
			$keys[7] => $this->getCredit(),
			$keys[8] => $this->getCommissions(),
			$keys[9] => $this->getTaxes(),
			$keys[10] => $this->getStorage(),
			$keys[11] => $this->getProfit(),
			$keys[12] => $this->getInterest(),
			$keys[13] => $this->getTax(),
			$keys[14] => $this->getUnrealizedpl(),
			$keys[15] => $this->getEquity(),
			$keys[16] => $this->getStatusCode(),
			$keys[17] => $this->getRemarks(),
			$keys[18] => $this->getCreatedBy(),
			$keys[19] => $this->getCreatedOn(),
			$keys[20] => $this->getUpdatedBy(),
			$keys[21] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDailyPipsCsvPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPipId($value);
				break;
			case 1:
				$this->setTradedDatetime($value);
				break;
			case 2:
				$this->setFileId($value);
				break;
			case 3:
				$this->setPipsString($value);
				break;
			case 4:
				$this->setLoginId($value);
				break;
			case 5:
				$this->setLoginName($value);
				break;
			case 6:
				$this->setBalance($value);
				break;
			case 7:
				$this->setCredit($value);
				break;
			case 8:
				$this->setCommissions($value);
				break;
			case 9:
				$this->setTaxes($value);
				break;
			case 10:
				$this->setStorage($value);
				break;
			case 11:
				$this->setProfit($value);
				break;
			case 12:
				$this->setInterest($value);
				break;
			case 13:
				$this->setTax($value);
				break;
			case 14:
				$this->setUnrealizedpl($value);
				break;
			case 15:
				$this->setEquity($value);
				break;
			case 16:
				$this->setStatusCode($value);
				break;
			case 17:
				$this->setRemarks($value);
				break;
			case 18:
				$this->setCreatedBy($value);
				break;
			case 19:
				$this->setCreatedOn($value);
				break;
			case 20:
				$this->setUpdatedBy($value);
				break;
			case 21:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDailyPipsCsvPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPipId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTradedDatetime($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFileId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPipsString($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLoginId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLoginName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBalance($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCredit($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCommissions($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTaxes($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStorage($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setProfit($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setInterest($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTax($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUnrealizedpl($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEquity($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setStatusCode($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setRemarks($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCreatedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCreatedOn($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setUpdatedBy($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setUpdatedOn($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDailyPipsCsvPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDailyPipsCsvPeer::PIP_ID)) $criteria->add(MlmDailyPipsCsvPeer::PIP_ID, $this->pip_id);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::TRADED_DATETIME)) $criteria->add(MlmDailyPipsCsvPeer::TRADED_DATETIME, $this->traded_datetime);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::FILE_ID)) $criteria->add(MlmDailyPipsCsvPeer::FILE_ID, $this->file_id);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::PIPS_STRING)) $criteria->add(MlmDailyPipsCsvPeer::PIPS_STRING, $this->pips_string);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::LOGIN_ID)) $criteria->add(MlmDailyPipsCsvPeer::LOGIN_ID, $this->login_id);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::LOGIN_NAME)) $criteria->add(MlmDailyPipsCsvPeer::LOGIN_NAME, $this->login_name);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::BALANCE)) $criteria->add(MlmDailyPipsCsvPeer::BALANCE, $this->balance);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::CREDIT)) $criteria->add(MlmDailyPipsCsvPeer::CREDIT, $this->credit);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::COMMISSIONS)) $criteria->add(MlmDailyPipsCsvPeer::COMMISSIONS, $this->commissions);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::TAXES)) $criteria->add(MlmDailyPipsCsvPeer::TAXES, $this->taxes);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::STORAGE)) $criteria->add(MlmDailyPipsCsvPeer::STORAGE, $this->storage);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::PROFIT)) $criteria->add(MlmDailyPipsCsvPeer::PROFIT, $this->profit);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::INTEREST)) $criteria->add(MlmDailyPipsCsvPeer::INTEREST, $this->interest);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::TAX)) $criteria->add(MlmDailyPipsCsvPeer::TAX, $this->tax);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::UNREALIZEDPL)) $criteria->add(MlmDailyPipsCsvPeer::UNREALIZEDPL, $this->unrealizedpl);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::EQUITY)) $criteria->add(MlmDailyPipsCsvPeer::EQUITY, $this->equity);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::STATUS_CODE)) $criteria->add(MlmDailyPipsCsvPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::REMARKS)) $criteria->add(MlmDailyPipsCsvPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::CREATED_BY)) $criteria->add(MlmDailyPipsCsvPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::CREATED_ON)) $criteria->add(MlmDailyPipsCsvPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::UPDATED_BY)) $criteria->add(MlmDailyPipsCsvPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDailyPipsCsvPeer::UPDATED_ON)) $criteria->add(MlmDailyPipsCsvPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDailyPipsCsvPeer::DATABASE_NAME);

		$criteria->add(MlmDailyPipsCsvPeer::PIP_ID, $this->pip_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPipId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPipId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTradedDatetime($this->traded_datetime);

		$copyObj->setFileId($this->file_id);

		$copyObj->setPipsString($this->pips_string);

		$copyObj->setLoginId($this->login_id);

		$copyObj->setLoginName($this->login_name);

		$copyObj->setBalance($this->balance);

		$copyObj->setCredit($this->credit);

		$copyObj->setCommissions($this->commissions);

		$copyObj->setTaxes($this->taxes);

		$copyObj->setStorage($this->storage);

		$copyObj->setProfit($this->profit);

		$copyObj->setInterest($this->interest);

		$copyObj->setTax($this->tax);

		$copyObj->setUnrealizedpl($this->unrealizedpl);

		$copyObj->setEquity($this->equity);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setPipId(NULL); 
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
			self::$peer = new MlmDailyPipsCsvPeer();
		}
		return self::$peer;
	}

} 