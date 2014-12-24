<?php


abstract class BaseAppUserAccess extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $access_code;


	
	protected $parent_id;


	
	protected $menu_url;


	
	protected $menu_label;


	
	protected $is_menu;


	
	protected $is_auth_needed;


	
	protected $tree_level;


	
	protected $tree_seq;


	
	protected $tree_structure;


	
	protected $status_code;


	
	protected $created_on;


	
	protected $updated_on;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAccessCode()
	{

		return $this->access_code;
	}

	
	public function getParentId()
	{

		return $this->parent_id;
	}

	
	public function getMenuUrl()
	{

		return $this->menu_url;
	}

	
	public function getMenuLabel()
	{

		return $this->menu_label;
	}

	
	public function getIsMenu()
	{

		return $this->is_menu;
	}

	
	public function getIsAuthNeeded()
	{

		return $this->is_auth_needed;
	}

	
	public function getTreeLevel()
	{

		return $this->tree_level;
	}

	
	public function getTreeSeq()
	{

		return $this->tree_seq;
	}

	
	public function getTreeStructure()
	{

		return $this->tree_structure;
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
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

	
	public function setAccessCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->access_code !== $v) {
			$this->access_code = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::ACCESS_CODE;
		}

	} 
	
	public function setParentId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->parent_id !== $v) {
			$this->parent_id = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::PARENT_ID;
		}

	} 
	
	public function setMenuUrl($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->menu_url !== $v) {
			$this->menu_url = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::MENU_URL;
		}

	} 
	
	public function setMenuLabel($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->menu_label !== $v) {
			$this->menu_label = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::MENU_LABEL;
		}

	} 
	
	public function setIsMenu($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_menu !== $v) {
			$this->is_menu = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::IS_MENU;
		}

	} 
	
	public function setIsAuthNeeded($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_auth_needed !== $v) {
			$this->is_auth_needed = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::IS_AUTH_NEEDED;
		}

	} 
	
	public function setTreeLevel($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_level !== $v) {
			$this->tree_level = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::TREE_LEVEL;
		}

	} 
	
	public function setTreeSeq($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tree_seq !== $v) {
			$this->tree_seq = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::TREE_SEQ;
		}

	} 
	
	public function setTreeStructure($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tree_structure !== $v) {
			$this->tree_structure = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::TREE_STRUCTURE;
		}

	} 
	
	public function setStatusCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v) {
			$this->status_code = $v;
			$this->modifiedColumns[] = AppUserAccessPeer::STATUS_CODE;
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
			$this->modifiedColumns[] = AppUserAccessPeer::CREATED_ON;
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
			$this->modifiedColumns[] = AppUserAccessPeer::UPDATED_ON;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->access_code = $rs->getString($startcol + 0);

			$this->parent_id = $rs->getString($startcol + 1);

			$this->menu_url = $rs->getString($startcol + 2);

			$this->menu_label = $rs->getString($startcol + 3);

			$this->is_menu = $rs->getString($startcol + 4);

			$this->is_auth_needed = $rs->getString($startcol + 5);

			$this->tree_level = $rs->getInt($startcol + 6);

			$this->tree_seq = $rs->getInt($startcol + 7);

			$this->tree_structure = $rs->getString($startcol + 8);

			$this->status_code = $rs->getString($startcol + 9);

			$this->created_on = $rs->getTimestamp($startcol + 10, null);

			$this->updated_on = $rs->getTimestamp($startcol + 11, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AppUserAccess object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserAccessPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AppUserAccessPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AppUserAccessPeer::CREATED_ON))
    {
      $this->setCreatedOn(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AppUserAccessPeer::UPDATED_ON))
    {
      $this->setUpdatedOn(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AppUserAccessPeer::DATABASE_NAME);
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
					$pk = AppUserAccessPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += AppUserAccessPeer::doUpdate($this, $con);
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


			if (($retval = AppUserAccessPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserAccessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAccessCode();
				break;
			case 1:
				return $this->getParentId();
				break;
			case 2:
				return $this->getMenuUrl();
				break;
			case 3:
				return $this->getMenuLabel();
				break;
			case 4:
				return $this->getIsMenu();
				break;
			case 5:
				return $this->getIsAuthNeeded();
				break;
			case 6:
				return $this->getTreeLevel();
				break;
			case 7:
				return $this->getTreeSeq();
				break;
			case 8:
				return $this->getTreeStructure();
				break;
			case 9:
				return $this->getStatusCode();
				break;
			case 10:
				return $this->getCreatedOn();
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
		$keys = AppUserAccessPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAccessCode(),
			$keys[1] => $this->getParentId(),
			$keys[2] => $this->getMenuUrl(),
			$keys[3] => $this->getMenuLabel(),
			$keys[4] => $this->getIsMenu(),
			$keys[5] => $this->getIsAuthNeeded(),
			$keys[6] => $this->getTreeLevel(),
			$keys[7] => $this->getTreeSeq(),
			$keys[8] => $this->getTreeStructure(),
			$keys[9] => $this->getStatusCode(),
			$keys[10] => $this->getCreatedOn(),
			$keys[11] => $this->getUpdatedOn(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AppUserAccessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAccessCode($value);
				break;
			case 1:
				$this->setParentId($value);
				break;
			case 2:
				$this->setMenuUrl($value);
				break;
			case 3:
				$this->setMenuLabel($value);
				break;
			case 4:
				$this->setIsMenu($value);
				break;
			case 5:
				$this->setIsAuthNeeded($value);
				break;
			case 6:
				$this->setTreeLevel($value);
				break;
			case 7:
				$this->setTreeSeq($value);
				break;
			case 8:
				$this->setTreeStructure($value);
				break;
			case 9:
				$this->setStatusCode($value);
				break;
			case 10:
				$this->setCreatedOn($value);
				break;
			case 11:
				$this->setUpdatedOn($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AppUserAccessPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAccessCode($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setParentId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMenuUrl($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMenuLabel($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsMenu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIsAuthNeeded($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTreeLevel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTreeSeq($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTreeStructure($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStatusCode($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedOn($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedOn($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AppUserAccessPeer::DATABASE_NAME);

		if ($this->isColumnModified(AppUserAccessPeer::ACCESS_CODE)) $criteria->add(AppUserAccessPeer::ACCESS_CODE, $this->access_code);
		if ($this->isColumnModified(AppUserAccessPeer::PARENT_ID)) $criteria->add(AppUserAccessPeer::PARENT_ID, $this->parent_id);
		if ($this->isColumnModified(AppUserAccessPeer::MENU_URL)) $criteria->add(AppUserAccessPeer::MENU_URL, $this->menu_url);
		if ($this->isColumnModified(AppUserAccessPeer::MENU_LABEL)) $criteria->add(AppUserAccessPeer::MENU_LABEL, $this->menu_label);
		if ($this->isColumnModified(AppUserAccessPeer::IS_MENU)) $criteria->add(AppUserAccessPeer::IS_MENU, $this->is_menu);
		if ($this->isColumnModified(AppUserAccessPeer::IS_AUTH_NEEDED)) $criteria->add(AppUserAccessPeer::IS_AUTH_NEEDED, $this->is_auth_needed);
		if ($this->isColumnModified(AppUserAccessPeer::TREE_LEVEL)) $criteria->add(AppUserAccessPeer::TREE_LEVEL, $this->tree_level);
		if ($this->isColumnModified(AppUserAccessPeer::TREE_SEQ)) $criteria->add(AppUserAccessPeer::TREE_SEQ, $this->tree_seq);
		if ($this->isColumnModified(AppUserAccessPeer::TREE_STRUCTURE)) $criteria->add(AppUserAccessPeer::TREE_STRUCTURE, $this->tree_structure);
		if ($this->isColumnModified(AppUserAccessPeer::STATUS_CODE)) $criteria->add(AppUserAccessPeer::STATUS_CODE, $this->status_code);
		if ($this->isColumnModified(AppUserAccessPeer::CREATED_ON)) $criteria->add(AppUserAccessPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(AppUserAccessPeer::UPDATED_ON)) $criteria->add(AppUserAccessPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AppUserAccessPeer::DATABASE_NAME);

		$criteria->add(AppUserAccessPeer::ACCESS_CODE, $this->access_code);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAccessCode();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAccessCode($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setParentId($this->parent_id);

		$copyObj->setMenuUrl($this->menu_url);

		$copyObj->setMenuLabel($this->menu_label);

		$copyObj->setIsMenu($this->is_menu);

		$copyObj->setIsAuthNeeded($this->is_auth_needed);

		$copyObj->setTreeLevel($this->tree_level);

		$copyObj->setTreeSeq($this->tree_seq);

		$copyObj->setTreeStructure($this->tree_structure);

		$copyObj->setStatusCode($this->status_code);

		$copyObj->setCreatedOn($this->created_on);

		$copyObj->setUpdatedOn($this->updated_on);


		$copyObj->setNew(true);

		$copyObj->setAccessCode(NULL); 
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
			self::$peer = new AppUserAccessPeer();
		}
		return self::$peer;
	}

} 