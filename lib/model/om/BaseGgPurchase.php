<?php


abstract class BaseGgPurchase extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $creator;


	
	protected $cid;


	
	protected $refno;


	
	protected $member_sale;


	
	protected $nm_name;


	
	protected $nm_contact;


	
	protected $uid = '0';


	
	protected $sid;


	
	protected $stockist_sale;


	
	protected $collect_address;


	
	protected $collect_city;


	
	protected $collect_zip;


	
	protected $collect_state;


	
	protected $collect_country;


	
	protected $mail_type;


	
	protected $share_price = 0;


	
	protected $amount = 0;


	
	protected $total_bv = 0;


	
	protected $actual_bv;


	
	protected $total_dp;


	
	protected $actual_dp;


	
	protected $total_rp;


	
	protected $actual_rp;


	
	protected $total_cp = 0;


	
	protected $delivery_cost;


	
	protected $payment_type;


	
	protected $collected;


	
	protected $collected_date;


	
	protected $first_sale;


	
	protected $no_bv;


	
	protected $rank_a;


	
	protected $status;


	
	protected $remark;


	
	protected $cdate;


	
	protected $edate;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getCreator()
	{

		return $this->creator;
	}

	
	public function getCid()
	{

		return $this->cid;
	}

	
	public function getRefno()
	{

		return $this->refno;
	}

	
	public function getMemberSale()
	{

		return $this->member_sale;
	}

	
	public function getNmName()
	{

		return $this->nm_name;
	}

	
	public function getNmContact()
	{

		return $this->nm_contact;
	}

	
	public function getUid()
	{

		return $this->uid;
	}

	
	public function getSid()
	{

		return $this->sid;
	}

	
	public function getStockistSale()
	{

		return $this->stockist_sale;
	}

	
	public function getCollectAddress()
	{

		return $this->collect_address;
	}

	
	public function getCollectCity()
	{

		return $this->collect_city;
	}

	
	public function getCollectZip()
	{

		return $this->collect_zip;
	}

	
	public function getCollectState()
	{

		return $this->collect_state;
	}

	
	public function getCollectCountry()
	{

		return $this->collect_country;
	}

	
	public function getMailType()
	{

		return $this->mail_type;
	}

	
	public function getSharePrice()
	{

		return $this->share_price;
	}

	
	public function getAmount()
	{

		return $this->amount;
	}

	
	public function getTotalBv()
	{

		return $this->total_bv;
	}

	
	public function getActualBv()
	{

		return $this->actual_bv;
	}

	
	public function getTotalDp()
	{

		return $this->total_dp;
	}

	
	public function getActualDp()
	{

		return $this->actual_dp;
	}

	
	public function getTotalRp()
	{

		return $this->total_rp;
	}

	
	public function getActualRp()
	{

		return $this->actual_rp;
	}

	
	public function getTotalCp()
	{

		return $this->total_cp;
	}

	
	public function getDeliveryCost()
	{

		return $this->delivery_cost;
	}

	
	public function getPaymentType()
	{

		return $this->payment_type;
	}

	
	public function getCollected()
	{

		return $this->collected;
	}

	
	public function getCollectedDate($format = 'Y-m-d H:i:s')
	{

		if ($this->collected_date === null || $this->collected_date === '') {
			return null;
		} elseif (!is_int($this->collected_date)) {
						$ts = strtotime($this->collected_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [collected_date] as date/time value: " . var_export($this->collected_date, true));
			}
		} else {
			$ts = $this->collected_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFirstSale()
	{

		return $this->first_sale;
	}

	
	public function getNoBv()
	{

		return $this->no_bv;
	}

	
	public function getRankA()
	{

		return $this->rank_a;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getRemark()
	{

		return $this->remark;
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

	
	public function getEdate($format = 'Y-m-d H:i:s')
	{

		if ($this->edate === null || $this->edate === '') {
			return null;
		} elseif (!is_int($this->edate)) {
						$ts = strtotime($this->edate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [edate] as date/time value: " . var_export($this->edate, true));
			}
		} else {
			$ts = $this->edate;
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
			$this->modifiedColumns[] = GgPurchasePeer::ID;
		}

	} 
	
	public function setCreator($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->creator !== $v) {
			$this->creator = $v;
			$this->modifiedColumns[] = GgPurchasePeer::CREATOR;
		}

	} 
	
	public function setCid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cid !== $v) {
			$this->cid = $v;
			$this->modifiedColumns[] = GgPurchasePeer::CID;
		}

	} 
	
	public function setRefno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->refno !== $v) {
			$this->refno = $v;
			$this->modifiedColumns[] = GgPurchasePeer::REFNO;
		}

	} 
	
	public function setMemberSale($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->member_sale !== $v) {
			$this->member_sale = $v;
			$this->modifiedColumns[] = GgPurchasePeer::MEMBER_SALE;
		}

	} 
	
	public function setNmName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nm_name !== $v) {
			$this->nm_name = $v;
			$this->modifiedColumns[] = GgPurchasePeer::NM_NAME;
		}

	} 
	
	public function setNmContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nm_contact !== $v) {
			$this->nm_contact = $v;
			$this->modifiedColumns[] = GgPurchasePeer::NM_CONTACT;
		}

	} 
	
	public function setUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uid !== $v || $v === '0') {
			$this->uid = $v;
			$this->modifiedColumns[] = GgPurchasePeer::UID;
		}

	} 
	
	public function setSid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sid !== $v) {
			$this->sid = $v;
			$this->modifiedColumns[] = GgPurchasePeer::SID;
		}

	} 
	
	public function setStockistSale($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->stockist_sale !== $v) {
			$this->stockist_sale = $v;
			$this->modifiedColumns[] = GgPurchasePeer::STOCKIST_SALE;
		}

	} 
	
	public function setCollectAddress($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->collect_address !== $v) {
			$this->collect_address = $v;
			$this->modifiedColumns[] = GgPurchasePeer::COLLECT_ADDRESS;
		}

	} 
	
	public function setCollectCity($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->collect_city !== $v) {
			$this->collect_city = $v;
			$this->modifiedColumns[] = GgPurchasePeer::COLLECT_CITY;
		}

	} 
	
	public function setCollectZip($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->collect_zip !== $v) {
			$this->collect_zip = $v;
			$this->modifiedColumns[] = GgPurchasePeer::COLLECT_ZIP;
		}

	} 
	
	public function setCollectState($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->collect_state !== $v) {
			$this->collect_state = $v;
			$this->modifiedColumns[] = GgPurchasePeer::COLLECT_STATE;
		}

	} 
	
	public function setCollectCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->collect_country !== $v) {
			$this->collect_country = $v;
			$this->modifiedColumns[] = GgPurchasePeer::COLLECT_COUNTRY;
		}

	} 
	
	public function setMailType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mail_type !== $v) {
			$this->mail_type = $v;
			$this->modifiedColumns[] = GgPurchasePeer::MAIL_TYPE;
		}

	} 
	
	public function setSharePrice($v)
	{

		if ($this->share_price !== $v || $v === 0) {
			$this->share_price = $v;
			$this->modifiedColumns[] = GgPurchasePeer::SHARE_PRICE;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v || $v === 0) {
			$this->amount = $v;
			$this->modifiedColumns[] = GgPurchasePeer::AMOUNT;
		}

	} 
	
	public function setTotalBv($v)
	{

		if ($this->total_bv !== $v || $v === 0) {
			$this->total_bv = $v;
			$this->modifiedColumns[] = GgPurchasePeer::TOTAL_BV;
		}

	} 
	
	public function setActualBv($v)
	{

		if ($this->actual_bv !== $v) {
			$this->actual_bv = $v;
			$this->modifiedColumns[] = GgPurchasePeer::ACTUAL_BV;
		}

	} 
	
	public function setTotalDp($v)
	{

		if ($this->total_dp !== $v) {
			$this->total_dp = $v;
			$this->modifiedColumns[] = GgPurchasePeer::TOTAL_DP;
		}

	} 
	
	public function setActualDp($v)
	{

		if ($this->actual_dp !== $v) {
			$this->actual_dp = $v;
			$this->modifiedColumns[] = GgPurchasePeer::ACTUAL_DP;
		}

	} 
	
	public function setTotalRp($v)
	{

		if ($this->total_rp !== $v) {
			$this->total_rp = $v;
			$this->modifiedColumns[] = GgPurchasePeer::TOTAL_RP;
		}

	} 
	
	public function setActualRp($v)
	{

		if ($this->actual_rp !== $v) {
			$this->actual_rp = $v;
			$this->modifiedColumns[] = GgPurchasePeer::ACTUAL_RP;
		}

	} 
	
	public function setTotalCp($v)
	{

		if ($this->total_cp !== $v || $v === 0) {
			$this->total_cp = $v;
			$this->modifiedColumns[] = GgPurchasePeer::TOTAL_CP;
		}

	} 
	
	public function setDeliveryCost($v)
	{

		if ($this->delivery_cost !== $v) {
			$this->delivery_cost = $v;
			$this->modifiedColumns[] = GgPurchasePeer::DELIVERY_COST;
		}

	} 
	
	public function setPaymentType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payment_type !== $v) {
			$this->payment_type = $v;
			$this->modifiedColumns[] = GgPurchasePeer::PAYMENT_TYPE;
		}

	} 
	
	public function setCollected($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->collected !== $v) {
			$this->collected = $v;
			$this->modifiedColumns[] = GgPurchasePeer::COLLECTED;
		}

	} 
	
	public function setCollectedDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [collected_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->collected_date !== $ts) {
			$this->collected_date = $ts;
			$this->modifiedColumns[] = GgPurchasePeer::COLLECTED_DATE;
		}

	} 
	
	public function setFirstSale($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->first_sale !== $v) {
			$this->first_sale = $v;
			$this->modifiedColumns[] = GgPurchasePeer::FIRST_SALE;
		}

	} 
	
	public function setNoBv($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->no_bv !== $v) {
			$this->no_bv = $v;
			$this->modifiedColumns[] = GgPurchasePeer::NO_BV;
		}

	} 
	
	public function setRankA($v)
	{

		if ($this->rank_a !== $v) {
			$this->rank_a = $v;
			$this->modifiedColumns[] = GgPurchasePeer::RANK_A;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GgPurchasePeer::STATUS;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = GgPurchasePeer::REMARK;
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
			$this->modifiedColumns[] = GgPurchasePeer::CDATE;
		}

	} 
	
	public function setEdate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [edate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->edate !== $ts) {
			$this->edate = $ts;
			$this->modifiedColumns[] = GgPurchasePeer::EDATE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->creator = $rs->getString($startcol + 1);

			$this->cid = $rs->getString($startcol + 2);

			$this->refno = $rs->getString($startcol + 3);

			$this->member_sale = $rs->getString($startcol + 4);

			$this->nm_name = $rs->getString($startcol + 5);

			$this->nm_contact = $rs->getString($startcol + 6);

			$this->uid = $rs->getString($startcol + 7);

			$this->sid = $rs->getString($startcol + 8);

			$this->stockist_sale = $rs->getString($startcol + 9);

			$this->collect_address = $rs->getString($startcol + 10);

			$this->collect_city = $rs->getString($startcol + 11);

			$this->collect_zip = $rs->getString($startcol + 12);

			$this->collect_state = $rs->getString($startcol + 13);

			$this->collect_country = $rs->getString($startcol + 14);

			$this->mail_type = $rs->getString($startcol + 15);

			$this->share_price = $rs->getFloat($startcol + 16);

			$this->amount = $rs->getFloat($startcol + 17);

			$this->total_bv = $rs->getFloat($startcol + 18);

			$this->actual_bv = $rs->getFloat($startcol + 19);

			$this->total_dp = $rs->getFloat($startcol + 20);

			$this->actual_dp = $rs->getFloat($startcol + 21);

			$this->total_rp = $rs->getFloat($startcol + 22);

			$this->actual_rp = $rs->getFloat($startcol + 23);

			$this->total_cp = $rs->getFloat($startcol + 24);

			$this->delivery_cost = $rs->getFloat($startcol + 25);

			$this->payment_type = $rs->getString($startcol + 26);

			$this->collected = $rs->getString($startcol + 27);

			$this->collected_date = $rs->getTimestamp($startcol + 28, null);

			$this->first_sale = $rs->getString($startcol + 29);

			$this->no_bv = $rs->getString($startcol + 30);

			$this->rank_a = $rs->getFloat($startcol + 31);

			$this->status = $rs->getString($startcol + 32);

			$this->remark = $rs->getString($startcol + 33);

			$this->cdate = $rs->getTimestamp($startcol + 34, null);

			$this->edate = $rs->getTimestamp($startcol + 35, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 36; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgPurchase object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgPurchasePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgPurchasePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgPurchasePeer::DATABASE_NAME);
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
					$pk = GgPurchasePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgPurchasePeer::doUpdate($this, $con);
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


			if (($retval = GgPurchasePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCreator();
				break;
			case 2:
				return $this->getCid();
				break;
			case 3:
				return $this->getRefno();
				break;
			case 4:
				return $this->getMemberSale();
				break;
			case 5:
				return $this->getNmName();
				break;
			case 6:
				return $this->getNmContact();
				break;
			case 7:
				return $this->getUid();
				break;
			case 8:
				return $this->getSid();
				break;
			case 9:
				return $this->getStockistSale();
				break;
			case 10:
				return $this->getCollectAddress();
				break;
			case 11:
				return $this->getCollectCity();
				break;
			case 12:
				return $this->getCollectZip();
				break;
			case 13:
				return $this->getCollectState();
				break;
			case 14:
				return $this->getCollectCountry();
				break;
			case 15:
				return $this->getMailType();
				break;
			case 16:
				return $this->getSharePrice();
				break;
			case 17:
				return $this->getAmount();
				break;
			case 18:
				return $this->getTotalBv();
				break;
			case 19:
				return $this->getActualBv();
				break;
			case 20:
				return $this->getTotalDp();
				break;
			case 21:
				return $this->getActualDp();
				break;
			case 22:
				return $this->getTotalRp();
				break;
			case 23:
				return $this->getActualRp();
				break;
			case 24:
				return $this->getTotalCp();
				break;
			case 25:
				return $this->getDeliveryCost();
				break;
			case 26:
				return $this->getPaymentType();
				break;
			case 27:
				return $this->getCollected();
				break;
			case 28:
				return $this->getCollectedDate();
				break;
			case 29:
				return $this->getFirstSale();
				break;
			case 30:
				return $this->getNoBv();
				break;
			case 31:
				return $this->getRankA();
				break;
			case 32:
				return $this->getStatus();
				break;
			case 33:
				return $this->getRemark();
				break;
			case 34:
				return $this->getCdate();
				break;
			case 35:
				return $this->getEdate();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchasePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCreator(),
			$keys[2] => $this->getCid(),
			$keys[3] => $this->getRefno(),
			$keys[4] => $this->getMemberSale(),
			$keys[5] => $this->getNmName(),
			$keys[6] => $this->getNmContact(),
			$keys[7] => $this->getUid(),
			$keys[8] => $this->getSid(),
			$keys[9] => $this->getStockistSale(),
			$keys[10] => $this->getCollectAddress(),
			$keys[11] => $this->getCollectCity(),
			$keys[12] => $this->getCollectZip(),
			$keys[13] => $this->getCollectState(),
			$keys[14] => $this->getCollectCountry(),
			$keys[15] => $this->getMailType(),
			$keys[16] => $this->getSharePrice(),
			$keys[17] => $this->getAmount(),
			$keys[18] => $this->getTotalBv(),
			$keys[19] => $this->getActualBv(),
			$keys[20] => $this->getTotalDp(),
			$keys[21] => $this->getActualDp(),
			$keys[22] => $this->getTotalRp(),
			$keys[23] => $this->getActualRp(),
			$keys[24] => $this->getTotalCp(),
			$keys[25] => $this->getDeliveryCost(),
			$keys[26] => $this->getPaymentType(),
			$keys[27] => $this->getCollected(),
			$keys[28] => $this->getCollectedDate(),
			$keys[29] => $this->getFirstSale(),
			$keys[30] => $this->getNoBv(),
			$keys[31] => $this->getRankA(),
			$keys[32] => $this->getStatus(),
			$keys[33] => $this->getRemark(),
			$keys[34] => $this->getCdate(),
			$keys[35] => $this->getEdate(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgPurchasePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCreator($value);
				break;
			case 2:
				$this->setCid($value);
				break;
			case 3:
				$this->setRefno($value);
				break;
			case 4:
				$this->setMemberSale($value);
				break;
			case 5:
				$this->setNmName($value);
				break;
			case 6:
				$this->setNmContact($value);
				break;
			case 7:
				$this->setUid($value);
				break;
			case 8:
				$this->setSid($value);
				break;
			case 9:
				$this->setStockistSale($value);
				break;
			case 10:
				$this->setCollectAddress($value);
				break;
			case 11:
				$this->setCollectCity($value);
				break;
			case 12:
				$this->setCollectZip($value);
				break;
			case 13:
				$this->setCollectState($value);
				break;
			case 14:
				$this->setCollectCountry($value);
				break;
			case 15:
				$this->setMailType($value);
				break;
			case 16:
				$this->setSharePrice($value);
				break;
			case 17:
				$this->setAmount($value);
				break;
			case 18:
				$this->setTotalBv($value);
				break;
			case 19:
				$this->setActualBv($value);
				break;
			case 20:
				$this->setTotalDp($value);
				break;
			case 21:
				$this->setActualDp($value);
				break;
			case 22:
				$this->setTotalRp($value);
				break;
			case 23:
				$this->setActualRp($value);
				break;
			case 24:
				$this->setTotalCp($value);
				break;
			case 25:
				$this->setDeliveryCost($value);
				break;
			case 26:
				$this->setPaymentType($value);
				break;
			case 27:
				$this->setCollected($value);
				break;
			case 28:
				$this->setCollectedDate($value);
				break;
			case 29:
				$this->setFirstSale($value);
				break;
			case 30:
				$this->setNoBv($value);
				break;
			case 31:
				$this->setRankA($value);
				break;
			case 32:
				$this->setStatus($value);
				break;
			case 33:
				$this->setRemark($value);
				break;
			case 34:
				$this->setCdate($value);
				break;
			case 35:
				$this->setEdate($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgPurchasePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCreator($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefno($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMemberSale($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNmName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNmContact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSid($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStockistSale($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCollectAddress($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCollectCity($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCollectZip($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCollectState($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCollectCountry($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMailType($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSharePrice($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAmount($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTotalBv($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setActualBv($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setTotalDp($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setActualDp($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTotalRp($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setActualRp($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setTotalCp($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDeliveryCost($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPaymentType($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCollected($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCollectedDate($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setFirstSale($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNoBv($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setRankA($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setStatus($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setRemark($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCdate($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setEdate($arr[$keys[35]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgPurchasePeer::DATABASE_NAME);

		if ($this->isColumnModified(GgPurchasePeer::ID)) $criteria->add(GgPurchasePeer::ID, $this->id);
		if ($this->isColumnModified(GgPurchasePeer::CREATOR)) $criteria->add(GgPurchasePeer::CREATOR, $this->creator);
		if ($this->isColumnModified(GgPurchasePeer::CID)) $criteria->add(GgPurchasePeer::CID, $this->cid);
		if ($this->isColumnModified(GgPurchasePeer::REFNO)) $criteria->add(GgPurchasePeer::REFNO, $this->refno);
		if ($this->isColumnModified(GgPurchasePeer::MEMBER_SALE)) $criteria->add(GgPurchasePeer::MEMBER_SALE, $this->member_sale);
		if ($this->isColumnModified(GgPurchasePeer::NM_NAME)) $criteria->add(GgPurchasePeer::NM_NAME, $this->nm_name);
		if ($this->isColumnModified(GgPurchasePeer::NM_CONTACT)) $criteria->add(GgPurchasePeer::NM_CONTACT, $this->nm_contact);
		if ($this->isColumnModified(GgPurchasePeer::UID)) $criteria->add(GgPurchasePeer::UID, $this->uid);
		if ($this->isColumnModified(GgPurchasePeer::SID)) $criteria->add(GgPurchasePeer::SID, $this->sid);
		if ($this->isColumnModified(GgPurchasePeer::STOCKIST_SALE)) $criteria->add(GgPurchasePeer::STOCKIST_SALE, $this->stockist_sale);
		if ($this->isColumnModified(GgPurchasePeer::COLLECT_ADDRESS)) $criteria->add(GgPurchasePeer::COLLECT_ADDRESS, $this->collect_address);
		if ($this->isColumnModified(GgPurchasePeer::COLLECT_CITY)) $criteria->add(GgPurchasePeer::COLLECT_CITY, $this->collect_city);
		if ($this->isColumnModified(GgPurchasePeer::COLLECT_ZIP)) $criteria->add(GgPurchasePeer::COLLECT_ZIP, $this->collect_zip);
		if ($this->isColumnModified(GgPurchasePeer::COLLECT_STATE)) $criteria->add(GgPurchasePeer::COLLECT_STATE, $this->collect_state);
		if ($this->isColumnModified(GgPurchasePeer::COLLECT_COUNTRY)) $criteria->add(GgPurchasePeer::COLLECT_COUNTRY, $this->collect_country);
		if ($this->isColumnModified(GgPurchasePeer::MAIL_TYPE)) $criteria->add(GgPurchasePeer::MAIL_TYPE, $this->mail_type);
		if ($this->isColumnModified(GgPurchasePeer::SHARE_PRICE)) $criteria->add(GgPurchasePeer::SHARE_PRICE, $this->share_price);
		if ($this->isColumnModified(GgPurchasePeer::AMOUNT)) $criteria->add(GgPurchasePeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(GgPurchasePeer::TOTAL_BV)) $criteria->add(GgPurchasePeer::TOTAL_BV, $this->total_bv);
		if ($this->isColumnModified(GgPurchasePeer::ACTUAL_BV)) $criteria->add(GgPurchasePeer::ACTUAL_BV, $this->actual_bv);
		if ($this->isColumnModified(GgPurchasePeer::TOTAL_DP)) $criteria->add(GgPurchasePeer::TOTAL_DP, $this->total_dp);
		if ($this->isColumnModified(GgPurchasePeer::ACTUAL_DP)) $criteria->add(GgPurchasePeer::ACTUAL_DP, $this->actual_dp);
		if ($this->isColumnModified(GgPurchasePeer::TOTAL_RP)) $criteria->add(GgPurchasePeer::TOTAL_RP, $this->total_rp);
		if ($this->isColumnModified(GgPurchasePeer::ACTUAL_RP)) $criteria->add(GgPurchasePeer::ACTUAL_RP, $this->actual_rp);
		if ($this->isColumnModified(GgPurchasePeer::TOTAL_CP)) $criteria->add(GgPurchasePeer::TOTAL_CP, $this->total_cp);
		if ($this->isColumnModified(GgPurchasePeer::DELIVERY_COST)) $criteria->add(GgPurchasePeer::DELIVERY_COST, $this->delivery_cost);
		if ($this->isColumnModified(GgPurchasePeer::PAYMENT_TYPE)) $criteria->add(GgPurchasePeer::PAYMENT_TYPE, $this->payment_type);
		if ($this->isColumnModified(GgPurchasePeer::COLLECTED)) $criteria->add(GgPurchasePeer::COLLECTED, $this->collected);
		if ($this->isColumnModified(GgPurchasePeer::COLLECTED_DATE)) $criteria->add(GgPurchasePeer::COLLECTED_DATE, $this->collected_date);
		if ($this->isColumnModified(GgPurchasePeer::FIRST_SALE)) $criteria->add(GgPurchasePeer::FIRST_SALE, $this->first_sale);
		if ($this->isColumnModified(GgPurchasePeer::NO_BV)) $criteria->add(GgPurchasePeer::NO_BV, $this->no_bv);
		if ($this->isColumnModified(GgPurchasePeer::RANK_A)) $criteria->add(GgPurchasePeer::RANK_A, $this->rank_a);
		if ($this->isColumnModified(GgPurchasePeer::STATUS)) $criteria->add(GgPurchasePeer::STATUS, $this->status);
		if ($this->isColumnModified(GgPurchasePeer::REMARK)) $criteria->add(GgPurchasePeer::REMARK, $this->remark);
		if ($this->isColumnModified(GgPurchasePeer::CDATE)) $criteria->add(GgPurchasePeer::CDATE, $this->cdate);
		if ($this->isColumnModified(GgPurchasePeer::EDATE)) $criteria->add(GgPurchasePeer::EDATE, $this->edate);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgPurchasePeer::DATABASE_NAME);

		$criteria->add(GgPurchasePeer::ID, $this->id);

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

		$copyObj->setCreator($this->creator);

		$copyObj->setCid($this->cid);

		$copyObj->setRefno($this->refno);

		$copyObj->setMemberSale($this->member_sale);

		$copyObj->setNmName($this->nm_name);

		$copyObj->setNmContact($this->nm_contact);

		$copyObj->setUid($this->uid);

		$copyObj->setSid($this->sid);

		$copyObj->setStockistSale($this->stockist_sale);

		$copyObj->setCollectAddress($this->collect_address);

		$copyObj->setCollectCity($this->collect_city);

		$copyObj->setCollectZip($this->collect_zip);

		$copyObj->setCollectState($this->collect_state);

		$copyObj->setCollectCountry($this->collect_country);

		$copyObj->setMailType($this->mail_type);

		$copyObj->setSharePrice($this->share_price);

		$copyObj->setAmount($this->amount);

		$copyObj->setTotalBv($this->total_bv);

		$copyObj->setActualBv($this->actual_bv);

		$copyObj->setTotalDp($this->total_dp);

		$copyObj->setActualDp($this->actual_dp);

		$copyObj->setTotalRp($this->total_rp);

		$copyObj->setActualRp($this->actual_rp);

		$copyObj->setTotalCp($this->total_cp);

		$copyObj->setDeliveryCost($this->delivery_cost);

		$copyObj->setPaymentType($this->payment_type);

		$copyObj->setCollected($this->collected);

		$copyObj->setCollectedDate($this->collected_date);

		$copyObj->setFirstSale($this->first_sale);

		$copyObj->setNoBv($this->no_bv);

		$copyObj->setRankA($this->rank_a);

		$copyObj->setStatus($this->status);

		$copyObj->setRemark($this->remark);

		$copyObj->setCdate($this->cdate);

		$copyObj->setEdate($this->edate);


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
			self::$peer = new GgPurchasePeer();
		}
		return self::$peer;
	}

} 