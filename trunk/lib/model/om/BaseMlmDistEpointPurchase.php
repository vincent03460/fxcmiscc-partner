<?php


abstract class BaseMlmDistEpointPurchase extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $purchase_id;


	
	protected $dist_id;


	
	protected $currency_type = 'USD';


	
	protected $amount = 0;


	
	protected $transaction_type;


	
	protected $image_src;


	
	protected $status_code;


	
	protected $remarks;


	
	protected $payment_reference;


	
	protected $bank_id = 1;


	
	protected $bank_code;


	
	protected $bill_create_ip;


	
	protected $time_start;


	
	protected $time_expire;


	
	protected $approve_reject_datetime;


	
	protected $approved_by_userid;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $payment_method;


	
	protected $pg_success;


	
	protected $pg_msg;


	
	protected $pg_bill_no;


	
	protected $pg_ret_encode_type;


	
	protected $pg_currency_type;


	
	protected $pg_signature;


	
	protected $return_string;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPurchaseId()
	{

		return $this->purchase_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getCurrencyType()
	{

		return $this->currency_type;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getTransactionType()
	{

		return $this->transaction_type;
	}

	
	public function getImageSrc()
	{

		return $this->image_src;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function getRemarks()
	{

		return $this->remarks;
	}

	
	public function getPaymentReference()
	{

		return $this->payment_reference;
	}

	
	public function getBankId()
	{

		return $this->bank_id;
	}

	
	public function getBankCode()
	{

		return $this->bank_code;
	}

	
	public function getBillCreateIp()
	{

		return $this->bill_create_ip;
	}

	
	public function getTimeStart()
	{

		return $this->time_start;
	}

	
	public function getTimeExpire()
	{

		return $this->time_expire;
	}

	
	public function getApproveRejectDatetime($format = 'Y-m-d H:i:s')
	{

		if ($this->approve_reject_datetime === null || $this->approve_reject_datetime === '') {
			return null;
		} elseif (!is_int($this->approve_reject_datetime)) {
						$ts = strtotime($this->approve_reject_datetime);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [approve_reject_datetime] as date/time value: " . var_export($this->approve_reject_datetime, true));
			}
		} else {
			$ts = $this->approve_reject_datetime;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getApprovedByUserid()
	{

		return $this->approved_by_userid;
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

	
	public function getPaymentMethod()
	{

		return $this->payment_method;
	}

	
	public function getPgSuccess()
	{

		return $this->pg_success;
	}

	
	public function getPgMsg()
	{

		return $this->pg_msg;
	}

	
	public function getPgBillNo()
	{

		return $this->pg_bill_no;
	}

	
	public function getPgRetEncodeType()
	{

		return $this->pg_ret_encode_type;
	}

	
	public function getPgCurrencyType()
	{

		return $this->pg_currency_type;
	}

	
	public function getPgSignature()
	{

		return $this->pg_signature;
	}

	
	public function getReturnString()
	{

		return $this->return_string;
	}

	
	public function setPurchaseId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->purchase_id !== $v) {
			$this->purchase_id = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PURCHASE_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::DIST_ID;
		}

	} 
	
	public function setCurrencyType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->currency_type !== $v || $v === 'USD') {
			$this->currency_type = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::CURRENCY_TYPE;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::AMOUNT;
		}

	} 
	
	public function setTransactionType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transaction_type !== $v) {
			$this->transaction_type = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::TRANSACTION_TYPE;
		}

	} 
	
	public function setImageSrc($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->image_src !== $v) {
			$this->image_src = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::IMAGE_SRC;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::STATUS_CODE;
		}

	} 
	
	public function setRemarks($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remarks !== $v) {
			$this->remarks = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::REMARKS;
		}

	} 
	
	public function setPaymentReference($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_reference !== $v) {
			$this->payment_reference = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PAYMENT_REFERENCE;
		}

	} 
	
	public function setBankId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->bank_id !== $v || $v === 1) {
			$this->bank_id = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::BANK_ID;
		}

	} 
	
	public function setBankCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_code !== $v) {
			$this->bank_code = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::BANK_CODE;
		}

	} 
	
	public function setBillCreateIp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bill_create_ip !== $v) {
			$this->bill_create_ip = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::BILL_CREATE_IP;
		}

	} 
	
	public function setTimeStart($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->time_start !== $v) {
			$this->time_start = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::TIME_START;
		}

	} 
	
	public function setTimeExpire($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->time_expire !== $v) {
			$this->time_expire = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::TIME_EXPIRE;
		}

	} 
	
	public function setApproveRejectDatetime($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [approve_reject_datetime] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->approve_reject_datetime !== $ts) {
			$this->approve_reject_datetime = $ts;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::APPROVE_REJECT_DATETIME;
		}

	} 
	
	public function setApprovedByUserid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->approved_by_userid !== $v) {
			$this->approved_by_userid = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::APPROVED_BY_USERID;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::UPDATED_ON;
		}

	} 
	
	public function setPaymentMethod($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_method !== $v) {
			$this->payment_method = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PAYMENT_METHOD;
		}

	} 
	
	public function setPgSuccess($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pg_success !== $v) {
			$this->pg_success = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PG_SUCCESS;
		}

	} 
	
	public function setPgMsg($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pg_msg !== $v) {
			$this->pg_msg = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PG_MSG;
		}

	} 
	
	public function setPgBillNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pg_bill_no !== $v) {
			$this->pg_bill_no = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PG_BILL_NO;
		}

	} 
	
	public function setPgRetEncodeType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pg_ret_encode_type !== $v) {
			$this->pg_ret_encode_type = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PG_RET_ENCODE_TYPE;
		}

	} 
	
	public function setPgCurrencyType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pg_currency_type !== $v) {
			$this->pg_currency_type = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PG_CURRENCY_TYPE;
		}

	} 
	
	public function setPgSignature($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pg_signature !== $v) {
			$this->pg_signature = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::PG_SIGNATURE;
		}

	} 
	
	public function setReturnString($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->return_string !== $v) {
			$this->return_string = $v;
			$this->modifiedColumns[] = MlmDistEpointPurchasePeer::RETURN_STRING;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->purchase_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->currency_type = $rs->getString($startcol + 2);

			$this->amount = $rs->getFloat($startcol + 3);

			$this->transaction_type = $rs->getString($startcol + 4);

			$this->image_src = $rs->getString($startcol + 5);

			$this->status_code = $rs->getString($startcol + 6);

			$this->remarks = $rs->getString($startcol + 7);

			$this->payment_reference = $rs->getString($startcol + 8);

			$this->bank_id = $rs->getInt($startcol + 9);

			$this->bank_code = $rs->getString($startcol + 10);

			$this->bill_create_ip = $rs->getString($startcol + 11);

			$this->time_start = $rs->getString($startcol + 12);

			$this->time_expire = $rs->getString($startcol + 13);

			$this->approve_reject_datetime = $rs->getTimestamp($startcol + 14, null);

			$this->approved_by_userid = $rs->getInt($startcol + 15);

			$this->created_by = $rs->getInt($startcol + 16);

			$this->created_on = $rs->getTimestamp($startcol + 17, null);

			$this->updated_by = $rs->getInt($startcol + 18);

			$this->updated_on = $rs->getTimestamp($startcol + 19, null);

			$this->payment_method = $rs->getString($startcol + 20);

			$this->pg_success = $rs->getString($startcol + 21);

			$this->pg_msg = $rs->getString($startcol + 22);

			$this->pg_bill_no = $rs->getString($startcol + 23);

			$this->pg_ret_encode_type = $rs->getString($startcol + 24);

			$this->pg_currency_type = $rs->getString($startcol + 25);

			$this->pg_signature = $rs->getString($startcol + 26);

			$this->return_string = $rs->getString($startcol + 27);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 28; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDistEpointPurchase object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistEpointPurchasePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDistEpointPurchasePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDistEpointPurchasePeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDistEpointPurchasePeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDistEpointPurchasePeer::DATABASE_NAME);
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
					$pk = MlmDistEpointPurchasePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setPurchaseId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDistEpointPurchasePeer::doUpdate($this, $con);
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


			if (($retval = MlmDistEpointPurchasePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistEpointPurchasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPurchaseId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getCurrencyType();
				break;
			case 3:
				return $this->getAmount();
				break;
			case 4:
				return $this->getTransactionType();
				break;
			case 5:
				return $this->getImageSrc();
				break;
			case 6:
				return $this->getStatusCode();
				break;
			case 7:
				return $this->getRemarks();
				break;
			case 8:
				return $this->getPaymentReference();
				break;
			case 9:
				return $this->getBankId();
				break;
			case 10:
				return $this->getBankCode();
				break;
			case 11:
				return $this->getBillCreateIp();
				break;
			case 12:
				return $this->getTimeStart();
				break;
			case 13:
				return $this->getTimeExpire();
				break;
			case 14:
				return $this->getApproveRejectDatetime();
				break;
			case 15:
				return $this->getApprovedByUserid();
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
				return $this->getPaymentMethod();
				break;
			case 21:
				return $this->getPgSuccess();
				break;
			case 22:
				return $this->getPgMsg();
				break;
			case 23:
				return $this->getPgBillNo();
				break;
			case 24:
				return $this->getPgRetEncodeType();
				break;
			case 25:
				return $this->getPgCurrencyType();
				break;
			case 26:
				return $this->getPgSignature();
				break;
			case 27:
				return $this->getReturnString();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistEpointPurchasePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPurchaseId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getCurrencyType(),
			$keys[3] => $this->getAmount(),
			$keys[4] => $this->getTransactionType(),
			$keys[5] => $this->getImageSrc(),
			$keys[6] => $this->getStatusCode(),
			$keys[7] => $this->getRemarks(),
			$keys[8] => $this->getPaymentReference(),
			$keys[9] => $this->getBankId(),
			$keys[10] => $this->getBankCode(),
			$keys[11] => $this->getBillCreateIp(),
			$keys[12] => $this->getTimeStart(),
			$keys[13] => $this->getTimeExpire(),
			$keys[14] => $this->getApproveRejectDatetime(),
			$keys[15] => $this->getApprovedByUserid(),
			$keys[16] => $this->getCreatedBy(),
			$keys[17] => $this->getCreatedOn(),
			$keys[18] => $this->getUpdatedBy(),
			$keys[19] => $this->getUpdatedOn(),
			$keys[20] => $this->getPaymentMethod(),
			$keys[21] => $this->getPgSuccess(),
			$keys[22] => $this->getPgMsg(),
			$keys[23] => $this->getPgBillNo(),
			$keys[24] => $this->getPgRetEncodeType(),
			$keys[25] => $this->getPgCurrencyType(),
			$keys[26] => $this->getPgSignature(),
			$keys[27] => $this->getReturnString(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDistEpointPurchasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPurchaseId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setCurrencyType($value);
				break;
			case 3:
				$this->setAmount($value);
				break;
			case 4:
				$this->setTransactionType($value);
				break;
			case 5:
				$this->setImageSrc($value);
				break;
			case 6:
				$this->setStatusCode($value);
				break;
			case 7:
				$this->setRemarks($value);
				break;
			case 8:
				$this->setPaymentReference($value);
				break;
			case 9:
				$this->setBankId($value);
				break;
			case 10:
				$this->setBankCode($value);
				break;
			case 11:
				$this->setBillCreateIp($value);
				break;
			case 12:
				$this->setTimeStart($value);
				break;
			case 13:
				$this->setTimeExpire($value);
				break;
			case 14:
				$this->setApproveRejectDatetime($value);
				break;
			case 15:
				$this->setApprovedByUserid($value);
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
				$this->setPaymentMethod($value);
				break;
			case 21:
				$this->setPgSuccess($value);
				break;
			case 22:
				$this->setPgMsg($value);
				break;
			case 23:
				$this->setPgBillNo($value);
				break;
			case 24:
				$this->setPgRetEncodeType($value);
				break;
			case 25:
				$this->setPgCurrencyType($value);
				break;
			case 26:
				$this->setPgSignature($value);
				break;
			case 27:
				$this->setReturnString($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDistEpointPurchasePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPurchaseId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCurrencyType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAmount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTransactionType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setImageSrc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatusCode($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRemarks($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPaymentReference($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBankId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setBankCode($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBillCreateIp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTimeStart($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTimeExpire($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setApproveRejectDatetime($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setApprovedByUserid($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCreatedBy($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCreatedOn($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setUpdatedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUpdatedOn($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setPaymentMethod($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPgSuccess($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPgMsg($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setPgBillNo($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPgRetEncodeType($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setPgCurrencyType($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPgSignature($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setReturnString($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDistEpointPurchasePeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PURCHASE_ID)) $criteria->add(MlmDistEpointPurchasePeer::PURCHASE_ID, $this->purchase_id);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::DIST_ID)) $criteria->add(MlmDistEpointPurchasePeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::CURRENCY_TYPE)) $criteria->add(MlmDistEpointPurchasePeer::CURRENCY_TYPE, $this->currency_type);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::AMOUNT)) $criteria->add(MlmDistEpointPurchasePeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::TRANSACTION_TYPE)) $criteria->add(MlmDistEpointPurchasePeer::TRANSACTION_TYPE, $this->transaction_type);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::IMAGE_SRC)) $criteria->add(MlmDistEpointPurchasePeer::IMAGE_SRC, $this->image_src);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::STATUS_CODE)) $criteria->add(MlmDistEpointPurchasePeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::REMARKS)) $criteria->add(MlmDistEpointPurchasePeer::REMARKS, $this->remarks);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PAYMENT_REFERENCE)) $criteria->add(MlmDistEpointPurchasePeer::PAYMENT_REFERENCE, $this->payment_reference);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::BANK_ID)) $criteria->add(MlmDistEpointPurchasePeer::BANK_ID, $this->bank_id);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::BANK_CODE)) $criteria->add(MlmDistEpointPurchasePeer::BANK_CODE, $this->bank_code);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::BILL_CREATE_IP)) $criteria->add(MlmDistEpointPurchasePeer::BILL_CREATE_IP, $this->bill_create_ip);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::TIME_START)) $criteria->add(MlmDistEpointPurchasePeer::TIME_START, $this->time_start);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::TIME_EXPIRE)) $criteria->add(MlmDistEpointPurchasePeer::TIME_EXPIRE, $this->time_expire);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::APPROVE_REJECT_DATETIME)) $criteria->add(MlmDistEpointPurchasePeer::APPROVE_REJECT_DATETIME, $this->approve_reject_datetime);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::APPROVED_BY_USERID)) $criteria->add(MlmDistEpointPurchasePeer::APPROVED_BY_USERID, $this->approved_by_userid);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::CREATED_BY)) $criteria->add(MlmDistEpointPurchasePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::CREATED_ON)) $criteria->add(MlmDistEpointPurchasePeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::UPDATED_BY)) $criteria->add(MlmDistEpointPurchasePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::UPDATED_ON)) $criteria->add(MlmDistEpointPurchasePeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PAYMENT_METHOD)) $criteria->add(MlmDistEpointPurchasePeer::PAYMENT_METHOD, $this->payment_method);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PG_SUCCESS)) $criteria->add(MlmDistEpointPurchasePeer::PG_SUCCESS, $this->pg_success);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PG_MSG)) $criteria->add(MlmDistEpointPurchasePeer::PG_MSG, $this->pg_msg);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PG_BILL_NO)) $criteria->add(MlmDistEpointPurchasePeer::PG_BILL_NO, $this->pg_bill_no);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PG_RET_ENCODE_TYPE)) $criteria->add(MlmDistEpointPurchasePeer::PG_RET_ENCODE_TYPE, $this->pg_ret_encode_type);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PG_CURRENCY_TYPE)) $criteria->add(MlmDistEpointPurchasePeer::PG_CURRENCY_TYPE, $this->pg_currency_type);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::PG_SIGNATURE)) $criteria->add(MlmDistEpointPurchasePeer::PG_SIGNATURE, $this->pg_signature);
		if ($this->isColumnModified(MlmDistEpointPurchasePeer::RETURN_STRING)) $criteria->add(MlmDistEpointPurchasePeer::RETURN_STRING, $this->return_string);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDistEpointPurchasePeer::DATABASE_NAME);

		$criteria->add(MlmDistEpointPurchasePeer::PURCHASE_ID, $this->purchase_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPurchaseId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPurchaseId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setCurrencyType($this->currency_type);

		$copyObj->setAmount($this->amount);

		$copyObj->setTransactionType($this->transaction_type);

		$copyObj->setImageSrc($this->image_src);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setRemarks($this->remarks);

		$copyObj->setPaymentReference($this->payment_reference);

		$copyObj->setBankId($this->bank_id);

		$copyObj->setBankCode($this->bank_code);

		$copyObj->setBillCreateIp($this->bill_create_ip);

		$copyObj->setTimeStart($this->time_start);

		$copyObj->setTimeExpire($this->time_expire);

		$copyObj->setApproveRejectDatetime($this->approve_reject_datetime);

		$copyObj->setApprovedByUserid($this->approved_by_userid);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setPaymentMethod($this->payment_method);

		$copyObj->setPgSuccess($this->pg_success);

		$copyObj->setPgMsg($this->pg_msg);

		$copyObj->setPgBillNo($this->pg_bill_no);

		$copyObj->setPgRetEncodeType($this->pg_ret_encode_type);

		$copyObj->setPgCurrencyType($this->pg_currency_type);

		$copyObj->setPgSignature($this->pg_signature);

		$copyObj->setReturnString($this->return_string);


		$copyObj->setNew(true);

		$copyObj->setPurchaseId(NULL); 
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
			self::$peer = new MlmDistEpointPurchasePeer();
		}
		return self::$peer;
	}

} 