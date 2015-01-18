<?php


abstract class BaseTunePlacement extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $placement_id;


	
	protected $dist_id = 0;


	
	protected $dist_code;


	
	protected $upline_dist_id = 0;


	
	protected $upline_dist_code = 0;


	
	protected $place_position;


	
	protected $created_by;


	
	protected $created_on;


	
	protected $updated_by;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPlacementId()
	{

		return $this->placement_id;
	}

	
	public function getDistId()
	{

		return $this->dist_id;
	}

	
	public function getDistCode()
	{

		return $this->dist_code;
	}

	
	public function getUplineDistId()
	{

		return $this->upline_dist_id;
	}

	
	public function getUplineDistCode()
	{

		return $this->upline_dist_code;
	}

	
	public function getPlacePosition()
	{

		return $this->place_position;
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

	
	public function setPlacementId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->placement_id !== $v) {
			$this->placement_id = $v;
			$this->modifiedColumns[] = TunePlacementPeer::PLACEMENT_ID;
		}

	} 

	
	public function setDistId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dist_id !== $v || $v === 0) {
			$this->dist_id = $v;
			$this->modifiedColumns[] = TunePlacementPeer::DIST_ID;
		}

	} 

	
	public function setDistCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->dist_code !== $v) {
			$this->dist_code = $v;
			$this->modifiedColumns[] = TunePlacementPeer::DIST_CODE;
		}

	} 

	
	public function setUplineDistId($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->upline_dist_id !== $v || $v === 0) {
			$this->upline_dist_id = $v;
			$this->modifiedColumns[] = TunePlacementPeer::UPLINE_DIST_ID;
		}

	} 

	
	public function setUplineDistCode($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->upline_dist_code !== $v || $v === 0) {
			$this->upline_dist_code = $v;
			$this->modifiedColumns[] = TunePlacementPeer::UPLINE_DIST_CODE;
		}

	} 

	
	public function setPlacePosition($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->place_position !== $v) {
			$this->place_position = $v;
			$this->modifiedColumns[] = TunePlacementPeer::PLACE_POSITION;
		}

	} 

	
	public function setCreatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TunePlacementPeer::CREATED_BY;
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
			$this->modifiedColumns[] = TunePlacementPeer::CREATED_ON;
		}

	} 

	
	public function setUpdatedBy($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = TunePlacementPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = TunePlacementPeer::UPDATED_ON;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->placement_id = $rs->getInt($startcol + 0);

			$this->dist_id = $rs->getInt($startcol + 1);

			$this->dist_code = $rs->getString($startcol + 2);

			$this->upline_dist_id = $rs->getInt($startcol + 3);

			$this->upline_dist_code = $rs->getInt($startcol + 4);

			$this->place_position = $rs->getString($startcol + 5);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->created_on = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->updated_on = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TunePlacement object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TunePlacementPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TunePlacementPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(TunePlacementPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TunePlacementPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TunePlacementPeer::DATABASE_NAME);
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
		$affectedRows = 0; 
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TunePlacementPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setPlacementId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += TunePlacementPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 
			}

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


			if (($retval = TunePlacementPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TunePlacementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPlacementId();
				break;
			case 1:
				return $this->getDistId();
				break;
			case 2:
				return $this->getDistCode();
				break;
			case 3:
				return $this->getUplineDistId();
				break;
			case 4:
				return $this->getUplineDistCode();
				break;
			case 5:
				return $this->getPlacePosition();
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
		$keys = TunePlacementPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPlacementId(),
			$keys[1] => $this->getDistId(),
			$keys[2] => $this->getDistCode(),
			$keys[3] => $this->getUplineDistId(),
			$keys[4] => $this->getUplineDistCode(),
			$keys[5] => $this->getPlacePosition(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getCreatedOn(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TunePlacementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPlacementId($value);
				break;
			case 1:
				$this->setDistId($value);
				break;
			case 2:
				$this->setDistCode($value);
				break;
			case 3:
				$this->setUplineDistId($value);
				break;
			case 4:
				$this->setUplineDistCode($value);
				break;
			case 5:
				$this->setPlacePosition($value);
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
		$keys = TunePlacementPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPlacementId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDistId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDistCode($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUplineDistId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUplineDistCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPlacePosition($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedOn($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedOn($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TunePlacementPeer::DATABASE_NAME);

		if ($this->isColumnModified(TunePlacementPeer::PLACEMENT_ID)) $criteria->add(TunePlacementPeer::PLACEMENT_ID, $this->placement_id);
		if ($this->isColumnModified(TunePlacementPeer::DIST_ID)) $criteria->add(TunePlacementPeer::DIST_ID, $this->dist_id);
		if ($this->isColumnModified(TunePlacementPeer::DIST_CODE)) $criteria->add(TunePlacementPeer::DIST_CODE, $this->dist_code);
		if ($this->isColumnModified(TunePlacementPeer::UPLINE_DIST_ID)) $criteria->add(TunePlacementPeer::UPLINE_DIST_ID, $this->upline_dist_id);
		if ($this->isColumnModified(TunePlacementPeer::UPLINE_DIST_CODE)) $criteria->add(TunePlacementPeer::UPLINE_DIST_CODE, $this->upline_dist_code);
		if ($this->isColumnModified(TunePlacementPeer::PLACE_POSITION)) $criteria->add(TunePlacementPeer::PLACE_POSITION, $this->place_position);
		if ($this->isColumnModified(TunePlacementPeer::CREATED_BY)) $criteria->add(TunePlacementPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TunePlacementPeer::CREATED_ON)) $criteria->add(TunePlacementPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(TunePlacementPeer::UPDATED_BY)) $criteria->add(TunePlacementPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(TunePlacementPeer::UPDATED_ON)) $criteria->add(TunePlacementPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TunePlacementPeer::DATABASE_NAME);

		$criteria->add(TunePlacementPeer::PLACEMENT_ID, $this->placement_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getPlacementId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setPlacementId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDistId($this->dist_id);

		$copyObj->setDistCode($this->dist_code);

		$copyObj->setUplineDistId($this->upline_dist_id);

		$copyObj->setUplineDistCode($this->upline_dist_code);

		$copyObj->setPlacePosition($this->place_position);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setPlacementId(NULL); 

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
			self::$peer = new TunePlacementPeer();
		}
		return self::$peer;
	}

} 