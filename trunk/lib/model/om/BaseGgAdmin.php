<?php


abstract class BaseGgAdmin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $username;


	
	protected $password;


	
	protected $enc_password;


	
	protected $email;


	
	protected $master;


	
	protected $pv_db;


	
	protected $pv_task;


	
	protected $re_contact;


	
	protected $re_system;


	
	protected $re_error;


	
	protected $cdate;


	
	protected $last_login;


	
	protected $last_login2;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getPassword()
	{

		return $this->password;
	}

	
	public function getEncPassword()
	{

		return $this->enc_password;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getMaster()
	{

		return $this->master;
	}

	
	public function getPvDb()
	{

		return $this->pv_db;
	}

	
	public function getPvTask()
	{

		return $this->pv_task;
	}

	
	public function getReContact()
	{

		return $this->re_contact;
	}

	
	public function getReSystem()
	{

		return $this->re_system;
	}

	
	public function getReError()
	{

		return $this->re_error;
	}

	
	public function getCdate($format = 'Y-m-d H:i:s')
	{

		if ($this->cdate === null || $this->cdate === '') {
			return null;
		} elseif (!is_int($this->cdate)) {
						$ts = strtotime($this->cdate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [cdate] as date/time value: " . var_export($this->cdate, true));
			}
		} else {
			$ts = $this->cdate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{

		if ($this->last_login === null || $this->last_login === '') {
			return null;
		} elseif (!is_int($this->last_login)) {
						$ts = strtotime($this->last_login);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [last_login] as date/time value: " . var_export($this->last_login, true));
			}
		} else {
			$ts = $this->last_login;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getLastLogin2($format = 'Y-m-d H:i:s')
	{

		if ($this->last_login2 === null || $this->last_login2 === '') {
			return null;
		} elseif (!is_int($this->last_login2)) {
						$ts = strtotime($this->last_login2);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [last_login2] as date/time value: " . var_export($this->last_login2, true));
			}
		} else {
			$ts = $this->last_login2;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgAdminPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = GgAdminPeer::NAME;
		}

	} 
	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = GgAdminPeer::USERNAME;
		}

	} 
	
	public function setPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = GgAdminPeer::PASSWORD;
		}

	} 
	
	public function setEncPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->enc_password !== $v) {
			$this->enc_password = $v;
			$this->modifiedColumns[] = GgAdminPeer::ENC_PASSWORD;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = GgAdminPeer::EMAIL;
		}

	} 
	
	public function setMaster($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->master !== $v) {
			$this->master = $v;
			$this->modifiedColumns[] = GgAdminPeer::MASTER;
		}

	} 
	
	public function setPvDb($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pv_db !== $v) {
			$this->pv_db = $v;
			$this->modifiedColumns[] = GgAdminPeer::PV_DB;
		}

	} 
	
	public function setPvTask($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pv_task !== $v) {
			$this->pv_task = $v;
			$this->modifiedColumns[] = GgAdminPeer::PV_TASK;
		}

	} 
	
	public function setReContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->re_contact !== $v) {
			$this->re_contact = $v;
			$this->modifiedColumns[] = GgAdminPeer::RE_CONTACT;
		}

	} 
	
	public function setReSystem($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->re_system !== $v) {
			$this->re_system = $v;
			$this->modifiedColumns[] = GgAdminPeer::RE_SYSTEM;
		}

	} 
	
	public function setReError($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->re_error !== $v) {
			$this->re_error = $v;
			$this->modifiedColumns[] = GgAdminPeer::RE_ERROR;
		}

	} 
	
	public function setCdate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [cdate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->cdate !== $ts) {
			$this->cdate = $ts;
			$this->modifiedColumns[] = GgAdminPeer::CDATE;
		}

	} 
	
	public function setLastLogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [last_login] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->last_login !== $ts) {
			$this->last_login = $ts;
			$this->modifiedColumns[] = GgAdminPeer::LAST_LOGIN;
		}

	} 
	
	public function setLastLogin2($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [last_login2] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->last_login2 !== $ts) {
			$this->last_login2 = $ts;
			$this->modifiedColumns[] = GgAdminPeer::LAST_LOGIN2;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->username = $rs->getString($startcol + 2);

			$this->password = $rs->getString($startcol + 3);

			$this->enc_password = $rs->getString($startcol + 4);

			$this->email = $rs->getString($startcol + 5);

			$this->master = $rs->getString($startcol + 6);

			$this->pv_db = $rs->getString($startcol + 7);

			$this->pv_task = $rs->getString($startcol + 8);

			$this->re_contact = $rs->getString($startcol + 9);

			$this->re_system = $rs->getString($startcol + 10);

			$this->re_error = $rs->getString($startcol + 11);

			$this->cdate = $rs->getTimestamp($startcol + 12, null);

			$this->last_login = $rs->getTimestamp($startcol + 13, null);

			$this->last_login2 = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgAdmin object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgAdminPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgAdminPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgAdminPeer::DATABASE_NAME);
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
					$pk = GgAdminPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgAdminPeer::doUpdate($this, $con);
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


			if (($retval = GgAdminPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgAdminPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getUsername();
				break;
			case 3:
				return $this->getPassword();
				break;
			case 4:
				return $this->getEncPassword();
				break;
			case 5:
				return $this->getEmail();
				break;
			case 6:
				return $this->getMaster();
				break;
			case 7:
				return $this->getPvDb();
				break;
			case 8:
				return $this->getPvTask();
				break;
			case 9:
				return $this->getReContact();
				break;
			case 10:
				return $this->getReSystem();
				break;
			case 11:
				return $this->getReError();
				break;
			case 12:
				return $this->getCdate();
				break;
			case 13:
				return $this->getLastLogin();
				break;
			case 14:
				return $this->getLastLogin2();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgAdminPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getUsername(),
			$keys[3] => $this->getPassword(),
			$keys[4] => $this->getEncPassword(),
			$keys[5] => $this->getEmail(),
			$keys[6] => $this->getMaster(),
			$keys[7] => $this->getPvDb(),
			$keys[8] => $this->getPvTask(),
			$keys[9] => $this->getReContact(),
			$keys[10] => $this->getReSystem(),
			$keys[11] => $this->getReError(),
			$keys[12] => $this->getCdate(),
			$keys[13] => $this->getLastLogin(),
			$keys[14] => $this->getLastLogin2(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgAdminPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setUsername($value);
				break;
			case 3:
				$this->setPassword($value);
				break;
			case 4:
				$this->setEncPassword($value);
				break;
			case 5:
				$this->setEmail($value);
				break;
			case 6:
				$this->setMaster($value);
				break;
			case 7:
				$this->setPvDb($value);
				break;
			case 8:
				$this->setPvTask($value);
				break;
			case 9:
				$this->setReContact($value);
				break;
			case 10:
				$this->setReSystem($value);
				break;
			case 11:
				$this->setReError($value);
				break;
			case 12:
				$this->setCdate($value);
				break;
			case 13:
				$this->setLastLogin($value);
				break;
			case 14:
				$this->setLastLogin2($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgAdminPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUsername($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPassword($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEncPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMaster($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPvDb($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPvTask($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setReContact($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setReSystem($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setReError($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCdate($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLastLogin($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLastLogin2($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgAdminPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgAdminPeer::ID)) $criteria->add(GgAdminPeer::ID, $this->id);
		if ($this->isColumnModified(GgAdminPeer::NAME)) $criteria->add(GgAdminPeer::NAME, $this->name);
		if ($this->isColumnModified(GgAdminPeer::USERNAME)) $criteria->add(GgAdminPeer::USERNAME, $this->username);
		if ($this->isColumnModified(GgAdminPeer::PASSWORD)) $criteria->add(GgAdminPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(GgAdminPeer::ENC_PASSWORD)) $criteria->add(GgAdminPeer::ENC_PASSWORD, $this->enc_password);
		if ($this->isColumnModified(GgAdminPeer::EMAIL)) $criteria->add(GgAdminPeer::EMAIL, $this->email);
		if ($this->isColumnModified(GgAdminPeer::MASTER)) $criteria->add(GgAdminPeer::MASTER, $this->master);
		if ($this->isColumnModified(GgAdminPeer::PV_DB)) $criteria->add(GgAdminPeer::PV_DB, $this->pv_db);
		if ($this->isColumnModified(GgAdminPeer::PV_TASK)) $criteria->add(GgAdminPeer::PV_TASK, $this->pv_task);
		if ($this->isColumnModified(GgAdminPeer::RE_CONTACT)) $criteria->add(GgAdminPeer::RE_CONTACT, $this->re_contact);
		if ($this->isColumnModified(GgAdminPeer::RE_SYSTEM)) $criteria->add(GgAdminPeer::RE_SYSTEM, $this->re_system);
		if ($this->isColumnModified(GgAdminPeer::RE_ERROR)) $criteria->add(GgAdminPeer::RE_ERROR, $this->re_error);
		if ($this->isColumnModified(GgAdminPeer::CDATE)) $criteria->add(GgAdminPeer::CDATE, $this->cdate);
		if ($this->isColumnModified(GgAdminPeer::LAST_LOGIN)) $criteria->add(GgAdminPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(GgAdminPeer::LAST_LOGIN2)) $criteria->add(GgAdminPeer::LAST_LOGIN2, $this->last_login2);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgAdminPeer::DATABASE_NAME);

		$criteria->add(GgAdminPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setEncPassword($this->enc_password);

		$copyObj->setEmail($this->email);

		$copyObj->setMaster($this->master);

		$copyObj->setPvDb($this->pv_db);

		$copyObj->setPvTask($this->pv_task);

		$copyObj->setReContact($this->re_contact);

		$copyObj->setReSystem($this->re_system);

		$copyObj->setReError($this->re_error);

		$copyObj->setCdate($this->cdate);

		$copyObj->setLastLogin($this->last_login);

		$copyObj->setLastLogin2($this->last_login2);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
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
			self::$peer = new GgAdminPeer();
		}
		return self::$peer;
	}

} 