<?php


abstract class BaseDemoPipCsv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pip_id;


	
	protected $month_traded;


	
	protected $year_traded;


	
	protected $file_id;


	
	protected $pips_string;


	
	protected $login_id;


	
	protected $login_name;


	
	protected $deposit;


	
	protected $withdraw;


	
	protected $in_out;


	
	protected $credit;


	
	protected $volume;


	
	protected $commission;


	
	protected $taxes;


	
	protected $agent;


	
	protected $storage;


	
	protected $profit;


	
	protected $last_balance;


	
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

	
	public function getMonthTraded()
	{

		return $this->month_traded;
	}

	
	public function getYearTraded()
	{

		return $this->year_traded;
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

	
	public function getDeposit()
	{

		return $this->deposit;
	}

	
	public function getWithdraw()
	{

		return $this->withdraw;
	}

	
	public function getInOut()
	{

		return $this->in_out;
	}

	
	public function getCredit()
	{

		return $this->credit;
	}

	
	public function getVolume()
	{

		return $this->volume;
	}

	
	public function getCommission()
	{

		return $this->commission;
	}

	
	public function getTaxes()
	{

		return $this->taxes;
	}

	
	public function getAgent()
	{

		return $this->agent;
	}

	
	public function getStorage()
	{

		return $this->storage;
	}

	
	public function getProfit()
	{

		return $this->profit;
	}

	
	public function getLastBalance()
	{

		return $this->last_balance;
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
			$this->modifiedColumns[] = DemoPipCsvPeer::PIP_ID;
		}

	} 
	
	public function setMonthTraded($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->month_traded !== $v) {
			$this->month_traded = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::MONTH_TRADED;
		}

	} 
	
	public function setYearTraded($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->year_traded !== $v) {
			$this->year_traded = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::YEAR_TRADED;
		}

	} 
	
	public function setFileId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->file_id !== $v) {
			$this->file_id = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::FILE_ID;
		}

	} 
	
	public function setPipsString($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pips_string !== $v) {
			$this->pips_string = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::PIPS_STRING;
		}

	} 
	
	public function setLoginId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->login_id !== $v) {
			$this->login_id = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::LOGIN_ID;
		}

	} 
	
	public function setLoginName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->login_name !== $v) {
			$this->login_name = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::LOGIN_NAME;
		}

	} 
	
	public function setDeposit($v)
	{

		if ($this->deposit !== $v) {
			$this->deposit = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::DEPOSIT;
		}

	} 
	
	public function setWithdraw($v)
	{

		if ($this->withdraw !== $v) {
			$this->withdraw = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::WITHDRAW;
		}

	} 
	
	public function setInOut($v)
	{

		if ($this->in_out !== $v) {
			$this->in_out = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::IN_OUT;
		}

	} 
	
	public function setCredit($v)
	{

		if ($this->credit !== $v) {
			$this->credit = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::CREDIT;
		}

	} 
	
	public function setVolume($v)
	{

		if ($this->volume !== $v) {
			$this->volume = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::VOLUME;
		}

	} 
	
	public function setCommission($v)
	{

		if ($this->commission !== $v) {
			$this->commission = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::COMMISSION;
		}

	} 
	
	public function setTaxes($v)
	{

		if ($this->taxes !== $v) {
			$this->taxes = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::TAXES;
		}

	} 
	
	public function setAgent($v)
	{

		if ($this->agent !== $v) {
			$this->agent = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::AGENT;
		}

	} 
	
	public function setStorage($v)
	{

		if ($this->storage !== $v) {
			$this->storage = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::STORAGE;
		}

	} 
	
	public function setProfit($v)
	{

		if ($this->profit !== $v) {
			$this->profit = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::PROFIT;
		}

	} 
	
	public function setLastBalance($v)
	{

		if ($this->last_balance !== $v) {
			$this->last_balance = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::LAST_BALANCE;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::STATUS_CODE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::REMARKS;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::CREATED_BY;
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
			$this->modifiedColumns[] = DemoPipCsvPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = DemoPipCsvPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = DemoPipCsvPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->pip_id = $rs->getInt($startcol + 0);

			$this->month_traded = $rs->getInt($startcol + 1);

			$this->year_traded = $rs->getInt($startcol + 2);

			$this->file_id = $rs->getInt($startcol + 3);

			$this->pips_string = $rs->getString($startcol + 4);

			$this->login_id = $rs->getInt($startcol + 5);

			$this->login_name = $rs->getString($startcol + 6);

			$this->deposit = $rs->getFloat($startcol + 7);

			$this->withdraw = $rs->getFloat($startcol + 8);

			$this->in_out = $rs->getFloat($startcol + 9);

			$this->credit = $rs->getFloat($startcol + 10);

			$this->volume = $rs->getFloat($startcol + 11);

			$this->commission = $rs->getFloat($startcol + 12);

			$this->taxes = $rs->getFloat($startcol + 13);

			$this->agent = $rs->getFloat($startcol + 14);

			$this->storage = $rs->getFloat($startcol + 15);

			$this->profit = $rs->getFloat($startcol + 16);

			$this->last_balance = $rs->getFloat($startcol + 17);

			$this->status_code = $rs->getString($startcol + 18);

			$this->remarks = $rs->getString($startcol + 19);

			$this->created_by = $rs->getInt($startcol + 20);

			$this->created_on = $rs->getTimestamp($startcol + 21, null);

			$this->updated_by = $rs->getInt($startcol + 22);

			$this->updated_on = $rs->getTimestamp($startcol + 23, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 24; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DemoPipCsv object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DemoPipCsvPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DemoPipCsvPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(DemoPipCsvPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(DemoPipCsvPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DemoPipCsvPeer::DATABASE_NAME);
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
					$pk = DemoPipCsvPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPipId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DemoPipCsvPeer::doUpdate($this, $con);
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


			if (($retval = DemoPipCsvPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DemoPipCsvPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPipId();
				break;
			case 1:
				return $this->getMonthTraded();
				break;
			case 2:
				return $this->getYearTraded();
				break;
			case 3:
				return $this->getFileId();
				break;
			case 4:
				return $this->getPipsString();
				break;
			case 5:
				return $this->getLoginId();
				break;
			case 6:
				return $this->getLoginName();
				break;
			case 7:
				return $this->getDeposit();
				break;
			case 8:
				return $this->getWithdraw();
				break;
			case 9:
				return $this->getInOut();
				break;
			case 10:
				return $this->getCredit();
				break;
			case 11:
				return $this->getVolume();
				break;
			case 12:
				return $this->getCommission();
				break;
			case 13:
				return $this->getTaxes();
				break;
			case 14:
				return $this->getAgent();
				break;
			case 15:
				return $this->getStorage();
				break;
			case 16:
				return $this->getProfit();
				break;
			case 17:
				return $this->getLastBalance();
				break;
			case 18:
				return $this->getStatusCode();
				break;
			case 19:
				return $this->getRemarks();
				break;
			case 20:
				return $this->getCreatedBy();
				break;
			case 21:
				return $this->getCreatedOn();
				break;
			case 22:
				return $this->getUpdatedBy();
				break;
			case 23:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DemoPipCsvPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPipId(),
			$keys[1] => $this->getMonthTraded(),
			$keys[2] => $this->getYearTraded(),
			$keys[3] => $this->getFileId(),
			$keys[4] => $this->getPipsString(),
			$keys[5] => $this->getLoginId(),
			$keys[6] => $this->getLoginName(),
			$keys[7] => $this->getDeposit(),
			$keys[8] => $this->getWithdraw(),
			$keys[9] => $this->getInOut(),
			$keys[10] => $this->getCredit(),
			$keys[11] => $this->getVolume(),
			$keys[12] => $this->getCommission(),
			$keys[13] => $this->getTaxes(),
			$keys[14] => $this->getAgent(),
			$keys[15] => $this->getStorage(),
			$keys[16] => $this->getProfit(),
			$keys[17] => $this->getLastBalance(),
			$keys[18] => $this->getStatusCode(),
			$keys[19] => $this->getRemarks(),
			$keys[20] => $this->getCreatedBy(),
			$keys[21] => $this->getCreatedOn(),
			$keys[22] => $this->getUpdatedBy(),
			$keys[23] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DemoPipCsvPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPipId($value);
				break;
			case 1:
				$this->setMonthTraded($value);
				break;
			case 2:
				$this->setYearTraded($value);
				break;
			case 3:
				$this->setFileId($value);
				break;
			case 4:
				$this->setPipsString($value);
				break;
			case 5:
				$this->setLoginId($value);
				break;
			case 6:
				$this->setLoginName($value);
				break;
			case 7:
				$this->setDeposit($value);
				break;
			case 8:
				$this->setWithdraw($value);
				break;
			case 9:
				$this->setInOut($value);
				break;
			case 10:
				$this->setCredit($value);
				break;
			case 11:
				$this->setVolume($value);
				break;
			case 12:
				$this->setCommission($value);
				break;
			case 13:
				$this->setTaxes($value);
				break;
			case 14:
				$this->setAgent($value);
				break;
			case 15:
				$this->setStorage($value);
				break;
			case 16:
				$this->setProfit($value);
				break;
			case 17:
				$this->setLastBalance($value);
				break;
			case 18:
				$this->setStatusCode($value);
				break;
			case 19:
				$this->setRemarks($value);
				break;
			case 20:
				$this->setCreatedBy($value);
				break;
			case 21:
				$this->setCreatedOn($value);
				break;
			case 22:
				$this->setUpdatedBy($value);
				break;
			case 23:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DemoPipCsvPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPipId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonthTraded($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setYearTraded($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFileId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPipsString($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLoginId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLoginName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDeposit($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setWithdraw($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setInOut($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCredit($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setVolume($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCommission($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTaxes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAgent($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStorage($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setProfit($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLastBalance($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setStatusCode($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setRemarks($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCreatedBy($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCreatedOn($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setUpdatedBy($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setUpdatedOn($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DemoPipCsvPeer::DATABASE_NAME);

		if ($this->isColumnModified(DemoPipCsvPeer::PIP_ID)) $criteria->add(DemoPipCsvPeer::PIP_ID, $this->pip_id);
		if ($this->isColumnModified(DemoPipCsvPeer::MONTH_TRADED)) $criteria->add(DemoPipCsvPeer::MONTH_TRADED, $this->month_traded);
		if ($this->isColumnModified(DemoPipCsvPeer::YEAR_TRADED)) $criteria->add(DemoPipCsvPeer::YEAR_TRADED, $this->year_traded);
		if ($this->isColumnModified(DemoPipCsvPeer::FILE_ID)) $criteria->add(DemoPipCsvPeer::FILE_ID, $this->file_id);
		if ($this->isColumnModified(DemoPipCsvPeer::PIPS_STRING)) $criteria->add(DemoPipCsvPeer::PIPS_STRING, $this->pips_string);
		if ($this->isColumnModified(DemoPipCsvPeer::LOGIN_ID)) $criteria->add(DemoPipCsvPeer::LOGIN_ID, $this->login_id);
		if ($this->isColumnModified(DemoPipCsvPeer::LOGIN_NAME)) $criteria->add(DemoPipCsvPeer::LOGIN_NAME, $this->login_name);
		if ($this->isColumnModified(DemoPipCsvPeer::DEPOSIT)) $criteria->add(DemoPipCsvPeer::DEPOSIT, $this->deposit);
		if ($this->isColumnModified(DemoPipCsvPeer::WITHDRAW)) $criteria->add(DemoPipCsvPeer::WITHDRAW, $this->withdraw);
		if ($this->isColumnModified(DemoPipCsvPeer::IN_OUT)) $criteria->add(DemoPipCsvPeer::IN_OUT, $this->in_out);
		if ($this->isColumnModified(DemoPipCsvPeer::CREDIT)) $criteria->add(DemoPipCsvPeer::CREDIT, $this->credit);
		if ($this->isColumnModified(DemoPipCsvPeer::VOLUME)) $criteria->add(DemoPipCsvPeer::VOLUME, $this->volume);
		if ($this->isColumnModified(DemoPipCsvPeer::COMMISSION)) $criteria->add(DemoPipCsvPeer::COMMISSION, $this->commission);
		if ($this->isColumnModified(DemoPipCsvPeer::TAXES)) $criteria->add(DemoPipCsvPeer::TAXES, $this->taxes);
		if ($this->isColumnModified(DemoPipCsvPeer::AGENT)) $criteria->add(DemoPipCsvPeer::AGENT, $this->agent);
		if ($this->isColumnModified(DemoPipCsvPeer::STORAGE)) $criteria->add(DemoPipCsvPeer::STORAGE, $this->storage);
		if ($this->isColumnModified(DemoPipCsvPeer::PROFIT)) $criteria->add(DemoPipCsvPeer::PROFIT, $this->profit);
		if ($this->isColumnModified(DemoPipCsvPeer::LAST_BALANCE)) $criteria->add(DemoPipCsvPeer::LAST_BALANCE, $this->last_balance);
		if ($this->isColumnModified(DemoPipCsvPeer::STATUS_CODE)) $criteria->add(DemoPipCsvPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(DemoPipCsvPeer::REMARKS)) $criteria->add(DemoPipCsvPeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(DemoPipCsvPeer::CREATED_BY)) $criteria->add(DemoPipCsvPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(DemoPipCsvPeer::CREATED_ON)) $criteria->add(DemoPipCsvPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(DemoPipCsvPeer::UPDATED_BY)) $criteria->add(DemoPipCsvPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(DemoPipCsvPeer::UPDATED_ON)) $criteria->add(DemoPipCsvPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DemoPipCsvPeer::DATABASE_NAME);

		$criteria->add(DemoPipCsvPeer::PIP_ID, $this->pip_id);

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

		$copyObj->setMonthTraded($this->month_traded);

		$copyObj->setYearTraded($this->year_traded);

		$copyObj->setFileId($this->file_id);

		$copyObj->setPipsString($this->pips_string);

		$copyObj->setLoginId($this->login_id);

		$copyObj->setLoginName($this->login_name);

		$copyObj->setDeposit($this->deposit);

		$copyObj->setWithdraw($this->withdraw);

		$copyObj->setInOut($this->in_out);

		$copyObj->setCredit($this->credit);

		$copyObj->setVolume($this->volume);

		$copyObj->setCommission($this->commission);

		$copyObj->setTaxes($this->taxes);

		$copyObj->setAgent($this->agent);

		$copyObj->setStorage($this->storage);

		$copyObj->setProfit($this->profit);

		$copyObj->setLastBalance($this->last_balance);

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
			self::$peer = new DemoPipCsvPeer();
		}
		return self::$peer;
	}

} 