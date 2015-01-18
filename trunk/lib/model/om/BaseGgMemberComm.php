<?php


abstract class BaseGgMemberComm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $mid = '0';


	
	protected $pid = '0';


	
	protected $cid = '0';


	
	protected $nid;


	
	protected $uid = '0';


	
	protected $from_uid = '0';


	
	protected $type;


	
	protected $volume_type;


	
	protected $amount = 0;


	
	protected $amount2;


	
	protected $percent = 0;


	
	protected $percent2;


	
	protected $leg1;


	
	protected $leg1_id;


	
	protected $leg1_amount;


	
	protected $leg2;


	
	protected $leg2_id;


	
	protected $leg2_amount;


	
	protected $paired_unit;


	
	protected $level;


	
	protected $level2;


	
	protected $year;


	
	protected $month;


	
	protected $week;


	
	protected $day;


	
	protected $status;


	
	protected $descr;


	
	protected $bonus_date;


	
	protected $cdate;


	
	protected $flag = 0;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getMid()
	{

		return $this->mid;
	}

	
	public function getPid()
	{

		return $this->pid;
	}

	
	public function getCid()
	{

		return $this->cid;
	}

	
	public function getNid()
	{

		return $this->nid;
	}

	
	public function getUid()
	{

		return $this->uid;
	}

	
	public function getFromUid()
	{

		return $this->from_uid;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getVolumeType()
	{

		return $this->volume_type;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getAmount2()
	{

		return $this->amount2;
	}

	
	public function getPercent()
	{

		return $this->percent;
	}

	
	public function getPercent2()
	{

		return $this->percent2;
	}

	
	public function getLeg1()
	{

		return $this->leg1;
	}

	
	public function getLeg1Id()
	{

		return $this->leg1_id;
	}

	
	public function getLeg1Amount()
	{

		return $this->leg1_amount;
	}

	
	public function getLeg2()
	{

		return $this->leg2;
	}

	
	public function getLeg2Id()
	{

		return $this->leg2_id;
	}

	
	public function getLeg2Amount()
	{

		return $this->leg2_amount;
	}

	
	public function getPairedUnit()
	{

		return $this->paired_unit;
	}

	
	public function getLevel()
	{

		return $this->level;
	}

	
	public function getLevel2()
	{

		return $this->level2;
	}

	
	public function getYear()
	{

		return $this->year;
	}

	
	public function getMonth()
	{

		return $this->month;
	}

	
	public function getWeek()
	{

		return $this->week;
	}

	
	public function getDay()
	{

		return $this->day;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getDescr()
	{

		return $this->descr;
	}

	
	public function getBonusDate($format = 'Y-m-d')
	{

		if ($this->bonus_date === null || $this->bonus_date === '') {
			return null;
		} elseif (!is_int($this->bonus_date)) {
						$ts = strtotime($this->bonus_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [bonus_date] as date/time value: " . var_export($this->bonus_date, true));
			}
		} else {
			$ts = $this->bonus_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

	
	public function getFlag()
	{

		return $this->flag;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::ID;
		}

	} 
	
	public function setMid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mid !== $v || $v === '0') {
			$this->mid = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::MID;
		}

	} 
	
	public function setPid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pid !== $v || $v === '0') {
			$this->pid = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::PID;
		}

	} 
	
	public function setCid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cid !== $v || $v === '0') {
			$this->cid = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::CID;
		}

	} 
	
	public function setNid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nid !== $v) {
			$this->nid = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::NID;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::UID;
		}

	} 
	
	public function setFromUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->from_uid !== $v || $v === '0') {
			$this->from_uid = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::FROM_UID;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::TYPE;
		}

	} 
	
	public function setVolumeType($v)
	{

		if ($this->volume_type !== $v) {
			$this->volume_type = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::VOLUME_TYPE;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::AMOUNT;
		}

	} 
	
	public function setAmount2($v)
	{

		if ($this->amount2 !== $v) {
			$this->amount2 = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::AMOUNT2;
		}

	} 
	
	public function setPercent($v)
	{

		if ($this->percent !== $v || $v === 0) {
			$this->percent = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::PERCENT;
		}

	} 
	
	public function setPercent2($v)
	{

		if ($this->percent2 !== $v) {
			$this->percent2 = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::PERCENT2;
		}

	} 
	
	public function setLeg1($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->leg1 !== $v) {
			$this->leg1 = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEG1;
		}

	} 
	
	public function setLeg1Id($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->leg1_id !== $v) {
			$this->leg1_id = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEG1_ID;
		}

	} 
	
	public function setLeg1Amount($v)
	{

		if ($this->leg1_amount !== $v) {
			$this->leg1_amount = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEG1_AMOUNT;
		}

	} 
	
	public function setLeg2($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->leg2 !== $v) {
			$this->leg2 = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEG2;
		}

	} 
	
	public function setLeg2Id($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->leg2_id !== $v) {
			$this->leg2_id = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEG2_ID;
		}

	} 
	
	public function setLeg2Amount($v)
	{

		if ($this->leg2_amount !== $v) {
			$this->leg2_amount = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEG2_AMOUNT;
		}

	} 
	
	public function setPairedUnit($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->paired_unit !== $v) {
			$this->paired_unit = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::PAIRED_UNIT;
		}

	} 
	
	public function setLevel($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->level !== $v) {
			$this->level = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEVEL;
		}

	} 
	
	public function setLevel2($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->level2 !== $v) {
			$this->level2 = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::LEVEL2;
		}

	} 
	
	public function setYear($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->year !== $v) {
			$this->year = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::YEAR;
		}

	} 
	
	public function setMonth($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->month !== $v) {
			$this->month = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::MONTH;
		}

	} 
	
	public function setWeek($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->week !== $v) {
			$this->week = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::WEEK;
		}

	} 
	
	public function setDay($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->day !== $v) {
			$this->day = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::DAY;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::STATUS;
		}

	} 
	
	public function setDescr($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descr !== $v) {
			$this->descr = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::DESCR;
		}

	} 
	
	public function setBonusDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [bonus_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->bonus_date !== $ts) {
			$this->bonus_date = $ts;
			$this->modifiedColumns[] = GgMemberCommPeer::BONUS_DATE;
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
			$this->modifiedColumns[] = GgMemberCommPeer::CDATE;
		}

	} 
	
	public function setFlag($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->flag !== $v || $v === 0) {
			$this->flag = $v;
			$this->modifiedColumns[] = GgMemberCommPeer::FLAG;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->mid = $rs->getString($startcol + 1);

			$this->pid = $rs->getString($startcol + 2);

			$this->cid = $rs->getString($startcol + 3);

			$this->nid = $rs->getString($startcol + 4);

			$this->uid = $rs->getString($startcol + 5);

			$this->from_uid = $rs->getString($startcol + 6);

			$this->type = $rs->getString($startcol + 7);

			$this->volume_type = $rs->getFloat($startcol + 8);

			$this->amount = $rs->getFloat($startcol + 9);

			$this->amount2 = $rs->getFloat($startcol + 10);

			$this->percent = $rs->getFloat($startcol + 11);

			$this->percent2 = $rs->getFloat($startcol + 12);

			$this->leg1 = $rs->getInt($startcol + 13);

			$this->leg1_id = $rs->getString($startcol + 14);

			$this->leg1_amount = $rs->getFloat($startcol + 15);

			$this->leg2 = $rs->getInt($startcol + 16);

			$this->leg2_id = $rs->getString($startcol + 17);

			$this->leg2_amount = $rs->getFloat($startcol + 18);

			$this->paired_unit = $rs->getInt($startcol + 19);

			$this->level = $rs->getInt($startcol + 20);

			$this->level2 = $rs->getInt($startcol + 21);

			$this->year = $rs->getInt($startcol + 22);

			$this->month = $rs->getInt($startcol + 23);

			$this->week = $rs->getInt($startcol + 24);

			$this->day = $rs->getInt($startcol + 25);

			$this->status = $rs->getString($startcol + 26);

			$this->descr = $rs->getString($startcol + 27);

			$this->bonus_date = $rs->getDate($startcol + 28, null);

			$this->cdate = $rs->getTimestamp($startcol + 29, null);

			$this->flag = $rs->getInt($startcol + 30);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 31; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgMemberComm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgMemberCommPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgMemberCommPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgMemberCommPeer::DATABASE_NAME);
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
					$pk = GgMemberCommPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgMemberCommPeer::doUpdate($this, $con);
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


			if (($retval = GgMemberCommPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCommPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMid();
				break;
			case 2:
				return $this->getPid();
				break;
			case 3:
				return $this->getCid();
				break;
			case 4:
				return $this->getNid();
				break;
			case 5:
				return $this->getUid();
				break;
			case 6:
				return $this->getFromUid();
				break;
			case 7:
				return $this->getType();
				break;
			case 8:
				return $this->getVolumeType();
				break;
			case 9:
				return $this->getAmount();
				break;
			case 10:
				return $this->getAmount2();
				break;
			case 11:
				return $this->getPercent();
				break;
			case 12:
				return $this->getPercent2();
				break;
			case 13:
				return $this->getLeg1();
				break;
			case 14:
				return $this->getLeg1Id();
				break;
			case 15:
				return $this->getLeg1Amount();
				break;
			case 16:
				return $this->getLeg2();
				break;
			case 17:
				return $this->getLeg2Id();
				break;
			case 18:
				return $this->getLeg2Amount();
				break;
			case 19:
				return $this->getPairedUnit();
				break;
			case 20:
				return $this->getLevel();
				break;
			case 21:
				return $this->getLevel2();
				break;
			case 22:
				return $this->getYear();
				break;
			case 23:
				return $this->getMonth();
				break;
			case 24:
				return $this->getWeek();
				break;
			case 25:
				return $this->getDay();
				break;
			case 26:
				return $this->getStatus();
				break;
			case 27:
				return $this->getDescr();
				break;
			case 28:
				return $this->getBonusDate();
				break;
			case 29:
				return $this->getCdate();
				break;
			case 30:
				return $this->getFlag();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberCommPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMid(),
			$keys[2] => $this->getPid(),
			$keys[3] => $this->getCid(),
			$keys[4] => $this->getNid(),
			$keys[5] => $this->getUid(),
			$keys[6] => $this->getFromUid(),
			$keys[7] => $this->getType(),
			$keys[8] => $this->getVolumeType(),
			$keys[9] => $this->getAmount(),
			$keys[10] => $this->getAmount2(),
			$keys[11] => $this->getPercent(),
			$keys[12] => $this->getPercent2(),
			$keys[13] => $this->getLeg1(),
			$keys[14] => $this->getLeg1Id(),
			$keys[15] => $this->getLeg1Amount(),
			$keys[16] => $this->getLeg2(),
			$keys[17] => $this->getLeg2Id(),
			$keys[18] => $this->getLeg2Amount(),
			$keys[19] => $this->getPairedUnit(),
			$keys[20] => $this->getLevel(),
			$keys[21] => $this->getLevel2(),
			$keys[22] => $this->getYear(),
			$keys[23] => $this->getMonth(),
			$keys[24] => $this->getWeek(),
			$keys[25] => $this->getDay(),
			$keys[26] => $this->getStatus(),
			$keys[27] => $this->getDescr(),
			$keys[28] => $this->getBonusDate(),
			$keys[29] => $this->getCdate(),
			$keys[30] => $this->getFlag(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgMemberCommPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMid($value);
				break;
			case 2:
				$this->setPid($value);
				break;
			case 3:
				$this->setCid($value);
				break;
			case 4:
				$this->setNid($value);
				break;
			case 5:
				$this->setUid($value);
				break;
			case 6:
				$this->setFromUid($value);
				break;
			case 7:
				$this->setType($value);
				break;
			case 8:
				$this->setVolumeType($value);
				break;
			case 9:
				$this->setAmount($value);
				break;
			case 10:
				$this->setAmount2($value);
				break;
			case 11:
				$this->setPercent($value);
				break;
			case 12:
				$this->setPercent2($value);
				break;
			case 13:
				$this->setLeg1($value);
				break;
			case 14:
				$this->setLeg1Id($value);
				break;
			case 15:
				$this->setLeg1Amount($value);
				break;
			case 16:
				$this->setLeg2($value);
				break;
			case 17:
				$this->setLeg2Id($value);
				break;
			case 18:
				$this->setLeg2Amount($value);
				break;
			case 19:
				$this->setPairedUnit($value);
				break;
			case 20:
				$this->setLevel($value);
				break;
			case 21:
				$this->setLevel2($value);
				break;
			case 22:
				$this->setYear($value);
				break;
			case 23:
				$this->setMonth($value);
				break;
			case 24:
				$this->setWeek($value);
				break;
			case 25:
				$this->setDay($value);
				break;
			case 26:
				$this->setStatus($value);
				break;
			case 27:
				$this->setDescr($value);
				break;
			case 28:
				$this->setBonusDate($value);
				break;
			case 29:
				$this->setCdate($value);
				break;
			case 30:
				$this->setFlag($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgMemberCommPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNid($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFromUid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setType($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setVolumeType($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAmount($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAmount2($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPercent($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPercent2($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLeg1($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLeg1Id($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setLeg1Amount($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setLeg2($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLeg2Id($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setLeg2Amount($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPairedUnit($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setLevel($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setLevel2($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setYear($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMonth($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setWeek($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDay($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setStatus($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setDescr($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setBonusDate($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCdate($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFlag($arr[$keys[30]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgMemberCommPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgMemberCommPeer::ID)) $criteria->add(GgMemberCommPeer::ID, $this->id);
		if ($this->isColumnModified(GgMemberCommPeer::MID)) $criteria->add(GgMemberCommPeer::MID, $this->mid);
		if ($this->isColumnModified(GgMemberCommPeer::PID)) $criteria->add(GgMemberCommPeer::PID, $this->pid);
		if ($this->isColumnModified(GgMemberCommPeer::CID)) $criteria->add(GgMemberCommPeer::CID, $this->cid);
		if ($this->isColumnModified(GgMemberCommPeer::NID)) $criteria->add(GgMemberCommPeer::NID, $this->nid);
		if ($this->isColumnModified(GgMemberCommPeer::UID)) $criteria->add(GgMemberCommPeer::UID, $this->uid);
		if ($this->isColumnModified(GgMemberCommPeer::FROM_UID)) $criteria->add(GgMemberCommPeer::FROM_UID, $this->from_uid);
		if ($this->isColumnModified(GgMemberCommPeer::TYPE)) $criteria->add(GgMemberCommPeer::TYPE, $this->type);
		if ($this->isColumnModified(GgMemberCommPeer::VOLUME_TYPE)) $criteria->add(GgMemberCommPeer::VOLUME_TYPE, $this->volume_type);
		if ($this->isColumnModified(GgMemberCommPeer::AMOUNT)) $criteria->add(GgMemberCommPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgMemberCommPeer::AMOUNT2)) $criteria->add(GgMemberCommPeer::AMOUNT2, $this->amount2);
		if ($this->isColumnModified(GgMemberCommPeer::PERCENT)) $criteria->add(GgMemberCommPeer::PERCENT, $this->percent);
		if ($this->isColumnModified(GgMemberCommPeer::PERCENT2)) $criteria->add(GgMemberCommPeer::PERCENT2, $this->percent2);
		if ($this->isColumnModified(GgMemberCommPeer::LEG1)) $criteria->add(GgMemberCommPeer::LEG1, $this->leg1);
		if ($this->isColumnModified(GgMemberCommPeer::LEG1_ID)) $criteria->add(GgMemberCommPeer::LEG1_ID, $this->leg1_id);
		if ($this->isColumnModified(GgMemberCommPeer::LEG1_AMOUNT)) $criteria->add(GgMemberCommPeer::LEG1_AMOUNT, $this->leg1_amount);
		if ($this->isColumnModified(GgMemberCommPeer::LEG2)) $criteria->add(GgMemberCommPeer::LEG2, $this->leg2);
		if ($this->isColumnModified(GgMemberCommPeer::LEG2_ID)) $criteria->add(GgMemberCommPeer::LEG2_ID, $this->leg2_id);
		if ($this->isColumnModified(GgMemberCommPeer::LEG2_AMOUNT)) $criteria->add(GgMemberCommPeer::LEG2_AMOUNT, $this->leg2_amount);
		if ($this->isColumnModified(GgMemberCommPeer::PAIRED_UNIT)) $criteria->add(GgMemberCommPeer::PAIRED_UNIT, $this->paired_unit);
		if ($this->isColumnModified(GgMemberCommPeer::LEVEL)) $criteria->add(GgMemberCommPeer::LEVEL, $this->level);
		if ($this->isColumnModified(GgMemberCommPeer::LEVEL2)) $criteria->add(GgMemberCommPeer::LEVEL2, $this->level2);
		if ($this->isColumnModified(GgMemberCommPeer::YEAR)) $criteria->add(GgMemberCommPeer::YEAR, $this->year);
		if ($this->isColumnModified(GgMemberCommPeer::MONTH)) $criteria->add(GgMemberCommPeer::MONTH, $this->month);
		if ($this->isColumnModified(GgMemberCommPeer::WEEK)) $criteria->add(GgMemberCommPeer::WEEK, $this->week);
		if ($this->isColumnModified(GgMemberCommPeer::DAY)) $criteria->add(GgMemberCommPeer::DAY, $this->day);
		if ($this->isColumnModified(GgMemberCommPeer::STATUS)) $criteria->add(GgMemberCommPeer::STATUS, $this->status);
		if ($this->isColumnModified(GgMemberCommPeer::DESCR)) $criteria->add(GgMemberCommPeer::DESCR, $this->descr);
		if ($this->isColumnModified(GgMemberCommPeer::BONUS_DATE)) $criteria->add(GgMemberCommPeer::BONUS_DATE, $this->bonus_date);
		if ($this->isColumnModified(GgMemberCommPeer::CDATE)) $criteria->add(GgMemberCommPeer::CDATE, $this->cdate);
		if ($this->isColumnModified(GgMemberCommPeer::FLAG)) $criteria->add(GgMemberCommPeer::FLAG, $this->flag);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgMemberCommPeer::DATABASE_NAME);

		$criteria->add(GgMemberCommPeer::ID, $this->id);

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

		$copyObj->setMid($this->mid);

		$copyObj->setPid($this->pid);

		$copyObj->setCid($this->cid);

		$copyObj->setNid($this->nid);

		$copyObj->setUid($this->uid);

		$copyObj->setFromUid($this->from_uid);

		$copyObj->setType($this->type);

		$copyObj->setVolumeType($this->volume_type);

		$copyObj->setAmount($this->amount);

		$copyObj->setAmount2($this->amount2);

		$copyObj->setPercent($this->percent);

		$copyObj->setPercent2($this->percent2);

		$copyObj->setLeg1($this->leg1);

		$copyObj->setLeg1Id($this->leg1_id);

		$copyObj->setLeg1Amount($this->leg1_amount);

		$copyObj->setLeg2($this->leg2);

		$copyObj->setLeg2Id($this->leg2_id);

		$copyObj->setLeg2Amount($this->leg2_amount);

		$copyObj->setPairedUnit($this->paired_unit);

		$copyObj->setLevel($this->level);

		$copyObj->setLevel2($this->level2);

		$copyObj->setYear($this->year);

		$copyObj->setMonth($this->month);

		$copyObj->setWeek($this->week);

		$copyObj->setDay($this->day);

		$copyObj->setStatus($this->status);

		$copyObj->setDescr($this->descr);

		$copyObj->setBonusDate($this->bonus_date);

		$copyObj->setCdate($this->cdate);

		$copyObj->setFlag($this->flag);


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
			self::$peer = new GgMemberCommPeer();
		}
		return self::$peer;
	}

} 