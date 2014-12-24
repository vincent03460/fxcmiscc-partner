<?php


abstract class BaseMlmDistCommissionLedger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $commission_id;


	
	protected $dist_id;


	
	protected $commission_type;


	
	protected $transaction_type;


	
	protected $ref_id;


	
	protected $month_traded;


	
	protected $year_traded;


	
	protected $credit = 0;


	
	protected $debit = 0;


	
	protected $balance = 0;


	
	protected $remark;


	
	protected $pips_downline_username;


	
	protected $pips_mt4_id;


	
	protected $pips_rebate;


	
	protected $pips_level;


	
	protected $pips_lots_traded;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $status_code;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCommissionId()
	{

		return $this->commission_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getCommissionType()
	{

		return $this->commission_type;
	}

	
	public function getTransactionType()
	{

		return $this->transaction_type;
	}

	
	public function getRefId()
	{

		return $this->ref_id;
	}

	
	public function getMonthTraded()
	{

		return $this->month_traded;
	}

	
	public function getYearTraded()
	{

		return $this->year_traded;
	}

	
	public function getCredit()
	{

		return $this->credit;
	}

	
	public function getDebit()
	{

		return $this->debit;
	}

	
	public function getBalance()
	{

		return $this->balance;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getPipsDownlineUsername()
	{

		return $this->pips_downline_username;
	}

	
	public function getPipsMt4Id()
	{

		return $this->pips_mt4_id;
	}

	
	public function getPipsRebate()
	{

		return $this->pips_rebate;
	}

	
	public function getPipsLevel()
	{

		return $this->pips_level;
	}

	
	public function getPipsLotsTraded()
	{

		return $this->pips_lots_traded;
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

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function setCommissionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->commission_id !== $v) {
			$this->commission_id = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::COMMISSION_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::DIST_ID;
		}

	} 
	
	public function setCommissionType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->commission_type !== $v) {
			$this->commission_type = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::COMMISSION_TYPE;
		}

	} 
	
	public function setTransactionType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_type !== $v) {
			$this->transaction_type = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::TRANSACTION_TYPE;
		}

	} 
	
	public function setRefId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ref_id !== $v) {
			$this->ref_id = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::REF_ID;
		}

	} 
	
	public function setMonthTraded($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->month_traded !== $v) {
			$this->month_traded = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::MONTH_TRADED;
		}

	} 
	
	public function setYearTraded($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->year_traded !== $v) {
			$this->year_traded = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::YEAR_TRADED;
		}

	} 
	
	public function setCredit($v)
	{

		if ($this->credit !== $v || $v === 0) {
			$this->credit = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::CREDIT;
		}

	} 
	
	public function setDebit($v)
	{

		if ($this->debit !== $v || $v === 0) {
			$this->debit = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::DEBIT;
		}

	} 
	
	public function setBalance($v)
	{

		if ($this->balance !== $v || $v === 0) {
			$this->balance = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::BALANCE;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::REMARK;
		}

	} 
	
	public function setPipsDownlineUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pips_downline_username !== $v) {
			$this->pips_downline_username = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME;
		}

	} 
	
	public function setPipsMt4Id($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pips_mt4_id !== $v) {
			$this->pips_mt4_id = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::PIPS_MT4_ID;
		}

	} 
	
	public function setPipsRebate($v)
	{

		if ($this->pips_rebate !== $v) {
			$this->pips_rebate = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::PIPS_REBATE;
		}

	} 
	
	public function setPipsLevel($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pips_level !== $v) {
			$this->pips_level = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::PIPS_LEVEL;
		}

	} 
	
	public function setPipsLotsTraded($v)
	{

		if ($this->pips_lots_traded !== $v) {
			$this->pips_lots_traded = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::PIPS_LOTS_TRADED;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::UPDATED_ON;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmDistCommissionLedgerPeer::STATUS_CODE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->commission_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->commission_type = $rs->getString($startcol + 2);

			$this->transaction_type = $rs->getString($startcol + 3);

			$this->ref_id = $rs->getInt($startcol + 4);

			$this->month_traded = $rs->getInt($startcol + 5);

			$this->year_traded = $rs->getInt($startcol + 6);

			$this->credit = $rs->getFloat($startcol + 7);

			$this->debit = $rs->getFloat($startcol + 8);

			$this->balance = $rs->getFloat($startcol + 9);

			$this->remark = $rs->getString($startcol + 10);

			$this->pips_downline_username = $rs->getString($startcol + 11);

			$this->pips_mt4_id = $rs->getString($startcol + 12);

			$this->pips_rebate = $rs->getFloat($startcol + 13);

			$this->pips_level = $rs->getInt($startcol + 14);

			$this->pips_lots_traded = $rs->getFloat($startcol + 15);

			$this->created_by = $rs->getInt($startcol + 16);

			$this->created_on = $rs->getTimestamp($startcol + 17, null);

			$this->updated_by = $rs->getInt($startcol + 18);

			$this->updated_on = $rs->getTimestamp($startcol + 19, null);

			$this->status_code = $rs->getString($startcol + 20);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 21; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDistCommissionLedger object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistCommissionLedgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDistCommissionLedgerPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDistCommissionLedgerPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDistCommissionLedgerPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistCommissionLedgerPeer::DATABASE_NAME);
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
					$pk = MlmDistCommissionLedgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setCommissionId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDistCommissionLedgerPeer::doUpdate($this, $con);
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


			if (($retval = MlmDistCommissionLedgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistCommissionLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCommissionId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getCommissionType();
				break;
			case 3:
				return $this->getTransactionType();
				break;
			case 4:
				return $this->getRefId();
				break;
			case 5:
				return $this->getMonthTraded();
				break;
			case 6:
				return $this->getYearTraded();
				break;
			case 7:
				return $this->getCredit();
				break;
			case 8:
				return $this->getDebit();
				break;
			case 9:
				return $this->getBalance();
				break;
			case 10:
				return $this->getRemark();
				break;
			case 11:
				return $this->getPipsDownlineUsername();
				break;
			case 12:
				return $this->getPipsMt4Id();
				break;
			case 13:
				return $this->getPipsRebate();
				break;
			case 14:
				return $this->getPipsLevel();
				break;
			case 15:
				return $this->getPipsLotsTraded();
				break;
			case 16:
				return $this->getCreatedBy();
				break;
			case 17:
				return $this->getCreatedOn();
				break;
			case 18:
				return $this->getUpdatedBy();
				break;
			case 19:
				return $this->getUpdatedOn();
				break;
			case 20:
				return $this->getStatusCode();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistCommissionLedgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCommissionId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getCommissionType(),
			$keys[3] => $this->getTransactionType(),
			$keys[4] => $this->getRefId(),
			$keys[5] => $this->getMonthTraded(),
			$keys[6] => $this->getYearTraded(),
			$keys[7] => $this->getCredit(),
			$keys[8] => $this->getDebit(),
			$keys[9] => $this->getBalance(),
			$keys[10] => $this->getRemark(),
			$keys[11] => $this->getPipsDownlineUsername(),
			$keys[12] => $this->getPipsMt4Id(),
			$keys[13] => $this->getPipsRebate(),
			$keys[14] => $this->getPipsLevel(),
			$keys[15] => $this->getPipsLotsTraded(),
			$keys[16] => $this->getCreatedBy(),
			$keys[17] => $this->getCreatedOn(),
			$keys[18] => $this->getUpdatedBy(),
			$keys[19] => $this->getUpdatedOn(),
			$keys[20] => $this->getStatusCode(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistCommissionLedgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCommissionId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setCommissionType($value);
				break;
			case 3:
				$this->setTransactionType($value);
				break;
			case 4:
				$this->setRefId($value);
				break;
			case 5:
				$this->setMonthTraded($value);
				break;
			case 6:
				$this->setYearTraded($value);
				break;
			case 7:
				$this->setCredit($value);
				break;
			case 8:
				$this->setDebit($value);
				break;
			case 9:
				$this->setBalance($value);
				break;
			case 10:
				$this->setRemark($value);
				break;
			case 11:
				$this->setPipsDownlineUsername($value);
				break;
			case 12:
				$this->setPipsMt4Id($value);
				break;
			case 13:
				$this->setPipsRebate($value);
				break;
			case 14:
				$this->setPipsLevel($value);
				break;
			case 15:
				$this->setPipsLotsTraded($value);
				break;
			case 16:
				$this->setCreatedBy($value);
				break;
			case 17:
				$this->setCreatedOn($value);
				break;
			case 18:
				$this->setUpdatedBy($value);
				break;
			case 19:
				$this->setUpdatedOn($value);
				break;
			case 20:
				$this->setStatusCode($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistCommissionLedgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCommissionId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCommissionType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTransactionType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonthTraded($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setYearTraded($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCredit($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDebit($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBalance($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRemark($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPipsDownlineUsername($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPipsMt4Id($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPipsRebate($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPipsLevel($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPipsLotsTraded($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCreatedOn($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setUpdatedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUpdatedOn($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setStatusCode($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDistCommissionLedgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::COMMISSION_ID)) $criteria->add(MlmDistCommissionLedgerPeer::COMMISSION_ID, $this->commission_id);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::DIST_ID)) $criteria->add(MlmDistCommissionLedgerPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::COMMISSION_TYPE)) $criteria->add(MlmDistCommissionLedgerPeer::COMMISSION_TYPE, $this->commission_type);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::TRANSACTION_TYPE)) $criteria->add(MlmDistCommissionLedgerPeer::TRANSACTION_TYPE, $this->transaction_type);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::REF_ID)) $criteria->add(MlmDistCommissionLedgerPeer::REF_ID, $this->ref_id);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::MONTH_TRADED)) $criteria->add(MlmDistCommissionLedgerPeer::MONTH_TRADED, $this->month_traded);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::YEAR_TRADED)) $criteria->add(MlmDistCommissionLedgerPeer::YEAR_TRADED, $this->year_traded);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::CREDIT)) $criteria->add(MlmDistCommissionLedgerPeer::CREDIT, $this->credit);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::DEBIT)) $criteria->add(MlmDistCommissionLedgerPeer::DEBIT, $this->debit);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::BALANCE)) $criteria->add(MlmDistCommissionLedgerPeer::BALANCE, $this->balance);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::REMARK)) $criteria->add(MlmDistCommissionLedgerPeer::REMARK, $this->remark);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME)) $criteria->add(MlmDistCommissionLedgerPeer::PIPS_DOWNLINE_USERNAME, $this->pips_downline_username);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::PIPS_MT4_ID)) $criteria->add(MlmDistCommissionLedgerPeer::PIPS_MT4_ID, $this->pips_mt4_id);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::PIPS_REBATE)) $criteria->add(MlmDistCommissionLedgerPeer::PIPS_REBATE, $this->pips_rebate);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::PIPS_LEVEL)) $criteria->add(MlmDistCommissionLedgerPeer::PIPS_LEVEL, $this->pips_level);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::PIPS_LOTS_TRADED)) $criteria->add(MlmDistCommissionLedgerPeer::PIPS_LOTS_TRADED, $this->pips_lots_traded);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::CREATED_BY)) $criteria->add(MlmDistCommissionLedgerPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::CREATED_ON)) $criteria->add(MlmDistCommissionLedgerPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::UPDATED_BY)) $criteria->add(MlmDistCommissionLedgerPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::UPDATED_ON)) $criteria->add(MlmDistCommissionLedgerPeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(MlmDistCommissionLedgerPeer::STATUS_CODE)) $criteria->add(MlmDistCommissionLedgerPeer::STATUS_CODE, $this->status_code);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDistCommissionLedgerPeer::DATABASE_NAME);

		$criteria->add(MlmDistCommissionLedgerPeer::COMMISSION_ID, $this->commission_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCommissionId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCommissionId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setCommissionType($this->commission_type);

		$copyObj->setTransactionType($this->transaction_type);

		$copyObj->setRefId($this->ref_id);

		$copyObj->setMonthTraded($this->month_traded);

		$copyObj->setYearTraded($this->year_traded);

		$copyObj->setCredit($this->credit);

		$copyObj->setDebit($this->debit);

		$copyObj->setBalance($this->balance);

		$copyObj->setRemark($this->remark);

		$copyObj->setPipsDownlineUsername($this->pips_downline_username);

		$copyObj->setPipsMt4Id($this->pips_mt4_id);

		$copyObj->setPipsRebate($this->pips_rebate);

		$copyObj->setPipsLevel($this->pips_level);

		$copyObj->setPipsLotsTraded($this->pips_lots_traded);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setStatusCode($this->status_code);


		$copyObj->setNew(true);

		$copyObj->setCommissionId(NULL); 
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
			self::$peer = new MlmDistCommissionLedgerPeer();
		}
		return self::$peer;
	}

} 