<?php


abstract class BaseLuckyDraw extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $lucky_id;


	
	protected $full_name;


	
	protected $email;


	
	protected $mt4_username;


	
	protected $mt4_password;


	
	protected $amount;


	
	protected $draw_type = 'WOF';


	
	protected $status_code;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getLuckyId()
	{

		return $this->lucky_id;
	}

	
	public function getFullName()
	{

		return $this->full_name;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getMt4Username()
	{

		return $this->mt4_username;
	}

	
	public function getMt4Password()
	{

		return $this->mt4_password;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getDrawType()
	{

		return $this->draw_type;
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

	
	public function setLuckyId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->lucky_id !== $v) {
			$this->lucky_id = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::LUCKY_ID;
		}

	} 
	
	public function setFullName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_name !== $v) {
			$this->full_name = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::FULL_NAME;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::EMAIL;
		}

	} 
	
	public function setMt4Username($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_username !== $v) {
			$this->mt4_username = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::MT4_USERNAME;
		}

	} 
	
	public function setMt4Password($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mt4_password !== $v) {
			$this->mt4_password = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::MT4_PASSWORD;
		}

	} 
	
	public function setAmount($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->amount !== $v) {
			$this->amount = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::AMOUNT;
		}

	} 
	
	public function setDrawType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->draw_type !== $v || $v === 'WOF') {
			$this->draw_type = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::DRAW_TYPE;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::STATUS_CODE;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::CREATED_BY;
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
			$this->modifiedColumns[] = LuckyDrawPeer::CREATED_ON;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = LuckyDrawPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = LuckyDrawPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->lucky_id = $rs->getInt($startcol + 0);

			$this->full_name = $rs->getString($startcol + 1);

			$this->email = $rs->getString($startcol + 2);

			$this->mt4_username = $rs->getString($startcol + 3);

			$this->mt4_password = $rs->getString($startcol + 4);

			$this->amount = $rs->getString($startcol + 5);

			$this->draw_type = $rs->getString($startcol + 6);

			$this->status_code = $rs->getString($startcol + 7);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->created_on = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating LuckyDraw object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LuckyDrawPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LuckyDrawPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(LuckyDrawPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(LuckyDrawPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LuckyDrawPeer::DATABASE_NAME);
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
					$pk = LuckyDrawPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setLuckyId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LuckyDrawPeer::doUpdate($this, $con);
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


			if (($retval = LuckyDrawPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LuckyDrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLuckyId();
				break;
			case 1:
				return $this->getFullName();
				break;
			case 2:
				return $this->getEmail();
				break;
			case 3:
				return $this->getMt4Username();
				break;
			case 4:
				return $this->getMt4Password();
				break;
			case 5:
				return $this->getAmount();
				break;
			case 6:
				return $this->getDrawType();
				break;
			case 7:
				return $this->getStatusCode();
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LuckyDrawPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLuckyId(),
			$keys[1] => $this->getFullName(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getMt4Username(),
			$keys[4] => $this->getMt4Password(),
			$keys[5] => $this->getAmount(),
			$keys[6] => $this->getDrawType(),
			$keys[7] => $this->getStatusCode(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedBy(),
			$keys[11] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LuckyDrawPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLuckyId($value);
				break;
			case 1:
				$this->setFullName($value);
				break;
			case 2:
				$this->setEmail($value);
				break;
			case 3:
				$this->setMt4Username($value);
				break;
			case 4:
				$this->setMt4Password($value);
				break;
			case 5:
				$this->setAmount($value);
				break;
			case 6:
				$this->setDrawType($value);
				break;
			case 7:
				$this->setStatusCode($value);
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LuckyDrawPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLuckyId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFullName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMt4Username($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMt4Password($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAmount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDrawType($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatusCode($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LuckyDrawPeer::DATABASE_NAME);

		if ($this->isColumnModified(LuckyDrawPeer::LUCKY_ID)) $criteria->add(LuckyDrawPeer::LUCKY_ID, $this->lucky_id);
		if ($this->isColumnModified(LuckyDrawPeer::FULL_NAME)) $criteria->add(LuckyDrawPeer::FULL_NAME, $this->full_name);
		if ($this->isColumnModified(LuckyDrawPeer::EMAIL)) $criteria->add(LuckyDrawPeer::EMAIL, $this->email);
		if ($this->isColumnModified(LuckyDrawPeer::MT4_USERNAME)) $criteria->add(LuckyDrawPeer::MT4_USERNAME, $this->mt4_username);
		if ($this->isColumnModified(LuckyDrawPeer::MT4_PASSWORD)) $criteria->add(LuckyDrawPeer::MT4_PASSWORD, $this->mt4_password);
		if ($this->isColumnModified(LuckyDrawPeer::AMOUNT)) $criteria->add(LuckyDrawPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(LuckyDrawPeer::DRAW_TYPE)) $criteria->add(LuckyDrawPeer::DRAW_TYPE, $this->draw_type);
		if ($this->isColumnModified(LuckyDrawPeer::STATUS_CODE)) $criteria->add(LuckyDrawPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(LuckyDrawPeer::CREATED_BY)) $criteria->add(LuckyDrawPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(LuckyDrawPeer::CREATED_ON)) $criteria->add(LuckyDrawPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(LuckyDrawPeer::UPDATED_BY)) $criteria->add(LuckyDrawPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(LuckyDrawPeer::UPDATED_ON)) $criteria->add(LuckyDrawPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LuckyDrawPeer::DATABASE_NAME);

		$criteria->add(LuckyDrawPeer::LUCKY_ID, $this->lucky_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getLuckyId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setLuckyId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFullName($this->full_name);

		$copyObj->setEmail($this->email);

		$copyObj->setMt4Username($this->mt4_username);

		$copyObj->setMt4Password($this->mt4_password);

		$copyObj->setAmount($this->amount);

		$copyObj->setDrawType($this->draw_type);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setLuckyId(NULL); 
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
			self::$peer = new LuckyDrawPeer();
		}
		return self::$peer;
	}

} 