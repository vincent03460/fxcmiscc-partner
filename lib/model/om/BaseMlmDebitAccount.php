<?php


abstract class BaseMlmDebitAccount extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $debit_id;


	
	protected $dist_id;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;


	
	protected $convert_rp_to_cp1 = '1';


	
	protected $convert_cp3_to_cp1 = '1';


	
	protected $cp3_withdrawal = '1';


	
	protected $ecash_withdrawal = '1';


	
	protected $convert_cp2_to_cp1 = '1';


	
	protected $transfer_cp1 = '1';


	
	protected $transfer_cp2 = '1';


	
	protected $transfer_cp3 = '1';


	
	protected $remark;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDebitId()
	{

		return $this->debit_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
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

	
	public function getConvertRpToCp1()
	{

		return $this->convert_rp_to_cp1;
	}

	
	public function getConvertCp3ToCp1()
	{

		return $this->convert_cp3_to_cp1;
	}

	
	public function getCp3Withdrawal()
	{

		return $this->cp3_withdrawal;
	}

	
	public function getEcashWithdrawal()
	{

		return $this->ecash_withdrawal;
	}

	
	public function getConvertCp2ToCp1()
	{

		return $this->convert_cp2_to_cp1;
	}

	
	public function getTransferCp1()
	{

		return $this->transfer_cp1;
	}

	
	public function getTransferCp2()
	{

		return $this->transfer_cp2;
	}

	
	public function getTransferCp3()
	{

		return $this->transfer_cp3;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function setDebitId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->debit_id !== $v) {
			$this->debit_id = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::DEBIT_ID;
		}

	} 
	
	public function setDistId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::DIST_ID;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::CREATED_BY;
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
			$this->modifiedColumns[] = MlmDebitAccountPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = MlmDebitAccountPeer::UPDATED_ON;
		}

	} 
	
	public function setConvertRpToCp1($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->convert_rp_to_cp1 !== $v || $v === '1') {
			$this->convert_rp_to_cp1 = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::CONVERT_RP_TO_CP1;
		}

	} 
	
	public function setConvertCp3ToCp1($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->convert_cp3_to_cp1 !== $v || $v === '1') {
			$this->convert_cp3_to_cp1 = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::CONVERT_CP3_TO_CP1;
		}

	} 
	
	public function setCp3Withdrawal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cp3_withdrawal !== $v || $v === '1') {
			$this->cp3_withdrawal = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::CP3_WITHDRAWAL;
		}

	} 
	
	public function setEcashWithdrawal($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ecash_withdrawal !== $v || $v === '1') {
			$this->ecash_withdrawal = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::ECASH_WITHDRAWAL;
		}

	} 
	
	public function setConvertCp2ToCp1($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->convert_cp2_to_cp1 !== $v || $v === '1') {
			$this->convert_cp2_to_cp1 = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::CONVERT_CP2_TO_CP1;
		}

	} 
	
	public function setTransferCp1($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transfer_cp1 !== $v || $v === '1') {
			$this->transfer_cp1 = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::TRANSFER_CP1;
		}

	} 
	
	public function setTransferCp2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transfer_cp2 !== $v || $v === '1') {
			$this->transfer_cp2 = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::TRANSFER_CP2;
		}

	} 
	
	public function setTransferCp3($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->transfer_cp3 !== $v || $v === '1') {
			$this->transfer_cp3 = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::TRANSFER_CP3;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = MlmDebitAccountPeer::REMARK;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->debit_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->created_by = $rs->getInt($startcol + 2);

			$this->created_on = $rs->getTimestamp($startcol + 3, null);

			$this->updated_by = $rs->getInt($startcol + 4);

			$this->updated_on = $rs->getTimestamp($startcol + 5, null);

			$this->convert_rp_to_cp1 = $rs->getString($startcol + 6);

			$this->convert_cp3_to_cp1 = $rs->getString($startcol + 7);

			$this->cp3_withdrawal = $rs->getString($startcol + 8);

			$this->ecash_withdrawal = $rs->getString($startcol + 9);

			$this->convert_cp2_to_cp1 = $rs->getString($startcol + 10);

			$this->transfer_cp1 = $rs->getString($startcol + 11);

			$this->transfer_cp2 = $rs->getString($startcol + 12);

			$this->transfer_cp3 = $rs->getString($startcol + 13);

			$this->remark = $rs->getString($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MlmDebitAccount object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDebitAccountPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MlmDebitAccountPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(MlmDebitAccountPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MlmDebitAccountPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MlmDebitAccountPeer::DATABASE_NAME);
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
					$pk = MlmDebitAccountPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setDebitId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MlmDebitAccountPeer::doUpdate($this, $con);
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


			if (($retval = MlmDebitAccountPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDebitAccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDebitId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getCreatedBy();
				break;
			case 3:
				return $this->getCreatedOn();
				break;
			case 4:
				return $this->getUpdatedBy();
				break;
			case 5:
				return $this->getUpdatedOn();
				break;
			case 6:
				return $this->getConvertRpToCp1();
				break;
			case 7:
				return $this->getConvertCp3ToCp1();
				break;
			case 8:
				return $this->getCp3Withdrawal();
				break;
			case 9:
				return $this->getEcashWithdrawal();
				break;
			case 10:
				return $this->getConvertCp2ToCp1();
				break;
			case 11:
				return $this->getTransferCp1();
				break;
			case 12:
				return $this->getTransferCp2();
				break;
			case 13:
				return $this->getTransferCp3();
				break;
			case 14:
				return $this->getRemark();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDebitAccountPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDebitId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getCreatedBy(),
			$keys[3] => $this->getCreatedOn(),
			$keys[4] => $this->getUpdatedBy(),
			$keys[5] => $this->getUpdatedOn(),
			$keys[6] => $this->getConvertRpToCp1(),
			$keys[7] => $this->getConvertCp3ToCp1(),
			$keys[8] => $this->getCp3Withdrawal(),
			$keys[9] => $this->getEcashWithdrawal(),
			$keys[10] => $this->getConvertCp2ToCp1(),
			$keys[11] => $this->getTransferCp1(),
			$keys[12] => $this->getTransferCp2(),
			$keys[13] => $this->getTransferCp3(),
			$keys[14] => $this->getRemark(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MlmDebitAccountPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDebitId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setCreatedBy($value);
				break;
			case 3:
				$this->setCreatedOn($value);
				break;
			case 4:
				$this->setUpdatedBy($value);
				break;
			case 5:
				$this->setUpdatedOn($value);
				break;
			case 6:
				$this->setConvertRpToCp1($value);
				break;
			case 7:
				$this->setConvertCp3ToCp1($value);
				break;
			case 8:
				$this->setCp3Withdrawal($value);
				break;
			case 9:
				$this->setEcashWithdrawal($value);
				break;
			case 10:
				$this->setConvertCp2ToCp1($value);
				break;
			case 11:
				$this->setTransferCp1($value);
				break;
			case 12:
				$this->setTransferCp2($value);
				break;
			case 13:
				$this->setTransferCp3($value);
				break;
			case 14:
				$this->setRemark($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MlmDebitAccountPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDebitId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedBy($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedOn($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedOn($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConvertRpToCp1($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setConvertCp3ToCp1($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCp3Withdrawal($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEcashWithdrawal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setConvertCp2ToCp1($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTransferCp1($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTransferCp2($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTransferCp3($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRemark($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MlmDebitAccountPeer::DATABASE_NAME);

		if ($this->isColumnModified(MlmDebitAccountPeer::DEBIT_ID)) $criteria->add(MlmDebitAccountPeer::DEBIT_ID, $this->debit_id);
		if ($this->isColumnModified(MlmDebitAccountPeer::DIST_ID)) $criteria->add(MlmDebitAccountPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(MlmDebitAccountPeer::CREATED_BY)) $criteria->add(MlmDebitAccountPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(MlmDebitAccountPeer::CREATED_ON)) $criteria->add(MlmDebitAccountPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MlmDebitAccountPeer::UPDATED_BY)) $criteria->add(MlmDebitAccountPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(MlmDebitAccountPeer::UPDATED_ON)) $criteria->add(MlmDebitAccountPeer::UPDATED_ON, $this->updated_on);
		if ($this->isColumnModified(MlmDebitAccountPeer::CONVERT_RP_TO_CP1)) $criteria->add(MlmDebitAccountPeer::CONVERT_RP_TO_CP1, $this->convert_rp_to_cp1);
		if ($this->isColumnModified(MlmDebitAccountPeer::CONVERT_CP3_TO_CP1)) $criteria->add(MlmDebitAccountPeer::CONVERT_CP3_TO_CP1, $this->convert_cp3_to_cp1);
		if ($this->isColumnModified(MlmDebitAccountPeer::CP3_WITHDRAWAL)) $criteria->add(MlmDebitAccountPeer::CP3_WITHDRAWAL, $this->cp3_withdrawal);
		if ($this->isColumnModified(MlmDebitAccountPeer::ECASH_WITHDRAWAL)) $criteria->add(MlmDebitAccountPeer::ECASH_WITHDRAWAL, $this->ecash_withdrawal);
		if ($this->isColumnModified(MlmDebitAccountPeer::CONVERT_CP2_TO_CP1)) $criteria->add(MlmDebitAccountPeer::CONVERT_CP2_TO_CP1, $this->convert_cp2_to_cp1);
		if ($this->isColumnModified(MlmDebitAccountPeer::TRANSFER_CP1)) $criteria->add(MlmDebitAccountPeer::TRANSFER_CP1, $this->transfer_cp1);
		if ($this->isColumnModified(MlmDebitAccountPeer::TRANSFER_CP2)) $criteria->add(MlmDebitAccountPeer::TRANSFER_CP2, $this->transfer_cp2);
		if ($this->isColumnModified(MlmDebitAccountPeer::TRANSFER_CP3)) $criteria->add(MlmDebitAccountPeer::TRANSFER_CP3, $this->transfer_cp3);
		if ($this->isColumnModified(MlmDebitAccountPeer::REMARK)) $criteria->add(MlmDebitAccountPeer::REMARK, $this->remark);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MlmDebitAccountPeer::DATABASE_NAME);

		$criteria->add(MlmDebitAccountPeer::DEBIT_ID, $this->debit_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getDebitId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setDebitId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setConvertRpToCp1($this->convert_rp_to_cp1);

		$copyObj->setConvertCp3ToCp1($this->convert_cp3_to_cp1);

		$copyObj->setCp3Withdrawal($this->cp3_withdrawal);

		$copyObj->setEcashWithdrawal($this->ecash_withdrawal);

		$copyObj->setConvertCp2ToCp1($this->convert_cp2_to_cp1);

		$copyObj->setTransferCp1($this->transfer_cp1);

		$copyObj->setTransferCp2($this->transfer_cp2);

		$copyObj->setTransferCp3($this->transfer_cp3);

		$copyObj->setRemark($this->remark);


		$copyObj->setNew(true);

		$copyObj->setDebitId(NULL); 
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
			self::$peer = new MlmDebitAccountPeer();
		}
		return self::$peer;
	}

} 