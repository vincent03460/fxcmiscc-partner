<?php


abstract class BaseGgNews extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $f_id;


	
	protected $f_title;


	
	protected $f_title_cn;


	
	protected $f_content;


	
	protected $f_content_cn;


	
	protected $f_date;


	
	protected $f_status;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFId()
	{

		return $this->f_id;
	}

	
	public function getFTitle()
	{

		return $this->f_title;
	}

	
	public function getFTitleCn()
	{

		return $this->f_title_cn;
	}

	
	public function getFContent()
	{

		return $this->f_content;
	}

	
	public function getFContentCn()
	{

		return $this->f_content_cn;
	}

	
	public function getFDate($format = 'Y-m-d')
	{

		if ($this->f_date === null || $this->f_date === '') {
			return null;
		} elseif (!is_int($this->f_date)) {
						$ts = strtotime($this->f_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [f_date] as date/time value: " . var_export($this->f_date, true));
			}
		} else {
			$ts = $this->f_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFStatus()
	{

		return $this->f_status;
	}

	
	public function setFId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->f_id !== $v) {
			$this->f_id = $v;
			$this->modifiedColumns[] = GgNewsPeer::F_ID;
		}

	} 
	
	public function setFTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->f_title !== $v) {
			$this->f_title = $v;
			$this->modifiedColumns[] = GgNewsPeer::F_TITLE;
		}

	} 
	
	public function setFTitleCn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->f_title_cn !== $v) {
			$this->f_title_cn = $v;
			$this->modifiedColumns[] = GgNewsPeer::F_TITLE_CN;
		}

	} 
	
	public function setFContent($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->f_content !== $v) {
			$this->f_content = $v;
			$this->modifiedColumns[] = GgNewsPeer::F_CONTENT;
		}

	} 
	
	public function setFContentCn($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->f_content_cn !== $v) {
			$this->f_content_cn = $v;
			$this->modifiedColumns[] = GgNewsPeer::F_CONTENT_CN;
		}

	} 
	
	public function setFDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [f_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->f_date !== $ts) {
			$this->f_date = $ts;
			$this->modifiedColumns[] = GgNewsPeer::F_DATE;
		}

	} 
	
	public function setFStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->f_status !== $v) {
			$this->f_status = $v;
			$this->modifiedColumns[] = GgNewsPeer::F_STATUS;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->f_id = $rs->getInt($startcol + 0);

			$this->f_title = $rs->getString($startcol + 1);

			$this->f_title_cn = $rs->getString($startcol + 2);

			$this->f_content = $rs->getString($startcol + 3);

			$this->f_content_cn = $rs->getString($startcol + 4);

			$this->f_date = $rs->getDate($startcol + 5, null);

			$this->f_status = $rs->getString($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgNews object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgNewsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgNewsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgNewsPeer::DATABASE_NAME);
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
					$pk = GgNewsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setFId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgNewsPeer::doUpdate($this, $con);
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


			if (($retval = GgNewsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgNewsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFId();
				break;
			case 1:
				return $this->getFTitle();
				break;
			case 2:
				return $this->getFTitleCn();
				break;
			case 3:
				return $this->getFContent();
				break;
			case 4:
				return $this->getFContentCn();
				break;
			case 5:
				return $this->getFDate();
				break;
			case 6:
				return $this->getFStatus();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgNewsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFId(),
			$keys[1] => $this->getFTitle(),
			$keys[2] => $this->getFTitleCn(),
			$keys[3] => $this->getFContent(),
			$keys[4] => $this->getFContentCn(),
			$keys[5] => $this->getFDate(),
			$keys[6] => $this->getFStatus(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgNewsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFId($value);
				break;
			case 1:
				$this->setFTitle($value);
				break;
			case 2:
				$this->setFTitleCn($value);
				break;
			case 3:
				$this->setFContent($value);
				break;
			case 4:
				$this->setFContentCn($value);
				break;
			case 5:
				$this->setFDate($value);
				break;
			case 6:
				$this->setFStatus($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgNewsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFTitleCn($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFContent($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFContentCn($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFStatus($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgNewsPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgNewsPeer::F_ID)) $criteria->add(GgNewsPeer::F_ID, $this->f_id);
		if ($this->isColumnModified(GgNewsPeer::F_TITLE)) $criteria->add(GgNewsPeer::F_TITLE, $this->f_title);
		if ($this->isColumnModified(GgNewsPeer::F_TITLE_CN)) $criteria->add(GgNewsPeer::F_TITLE_CN, $this->f_title_cn);
		if ($this->isColumnModified(GgNewsPeer::F_CONTENT)) $criteria->add(GgNewsPeer::F_CONTENT, $this->f_content);
		if ($this->isColumnModified(GgNewsPeer::F_CONTENT_CN)) $criteria->add(GgNewsPeer::F_CONTENT_CN, $this->f_content_cn);
		if ($this->isColumnModified(GgNewsPeer::F_DATE)) $criteria->add(GgNewsPeer::F_DATE, $this->f_date);
		if ($this->isColumnModified(GgNewsPeer::F_STATUS)) $criteria->add(GgNewsPeer::F_STATUS, $this->f_status);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgNewsPeer::DATABASE_NAME);

		$criteria->add(GgNewsPeer::F_ID, $this->f_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getFId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setFId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFTitle($this->f_title);

		$copyObj->setFTitleCn($this->f_title_cn);

		$copyObj->setFContent($this->f_content);

		$copyObj->setFContentCn($this->f_content_cn);

		$copyObj->setFDate($this->f_date);

		$copyObj->setFStatus($this->f_status);


		$copyObj->setNew(true);

		$copyObj->setFId(NULL); 
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
			self::$peer = new GgNewsPeer();
		}
		return self::$peer;
	}

} 