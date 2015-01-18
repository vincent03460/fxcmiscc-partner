<?php


abstract class BaseGgUsers extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $code;


	
	protected $name;


	
	protected $nickname;


	
	protected $username;


	
	protected $password;


	
	protected $enc_password;


	
	protected $ewallet_password;


	
	protected $ewallet_enc_password;


	
	protected $keep_ewallet;


	
	protected $epoint_password;


	
	protected $epoint_enc_password;


	
	protected $dividend_count = 0;


	
	protected $dividend_amount = 0;


	
	protected $dividend_balance = 0;


	
	protected $max_dlot = 0;


	
	protected $max_wlot = 0;


	
	protected $maintenance_lot = 0;


	
	protected $ref;


	
	protected $ref_left;


	
	protected $ref_right;


	
	protected $ref_level = 0;


	
	protected $creator;


	
	protected $cid;


	
	protected $rank_a;


	
	protected $future_rank = 0;


	
	protected $is_stockist;


	
	protected $stockist_uid = 0;


	
	protected $stockist_code;


	
	protected $stockist_assign_date;


	
	protected $matrix_upline;


	
	protected $matrix_left;


	
	protected $matrix_right;


	
	protected $matrix_level = 0;


	
	protected $matrix_position;


	
	protected $placement_date;


	
	protected $placement_type;


	
	protected $email;


	
	protected $ewallet;


	
	protected $eswallet;


	
	protected $swallet;


	
	protected $mwallet;


	
	protected $cwallet = 0;


	
	protected $owallet = 0;


	
	protected $rwallet = 0;


	
	protected $twallet = 0;


	
	protected $pwallet = 0;


	
	protected $rtwallet = 0;


	
	protected $refund_bv = 0;


	
	protected $incentive_date;


	
	protected $incentive_amount = 0;


	
	protected $ic;


	
	protected $address;


	
	protected $address2;


	
	protected $city;


	
	protected $zip;


	
	protected $state;


	
	protected $country;


	
	protected $homeno;


	
	protected $mobileno;


	
	protected $officeno;


	
	protected $faxno;


	
	protected $dob;


	
	protected $gender;


	
	protected $payee_name;


	
	protected $bank_name;


	
	protected $bank_acc_no;


	
	protected $bank_branch;


	
	protected $bank_swiftcode;


	
	protected $acc_type;


	
	protected $bis_reg;


	
	protected $person_in_charge;


	
	protected $occupation;


	
	protected $remark;


	
	protected $autowit;


	
	protected $status;


	
	protected $activated;


	
	protected $activated_date;


	
	protected $rvc;


	
	protected $is_free = 0;


	
	protected $pool_share = 0;


	
	protected $main_uid = '0';


	
	protected $sponsor_paid = 0;


	
	protected $flash_date = '';


	
	protected $cdate;


	
	protected $last_login;


	
	protected $last_login2;


	
	protected $site_visit = '';

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getCode()
	{

		return $this->code;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getNickname()
	{

		return $this->nickname;
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

	
	public function getEwalletPassword()
	{

		return $this->ewallet_password;
	}

	
	public function getEwalletEncPassword()
	{

		return $this->ewallet_enc_password;
	}

	
	public function getKeepEwallet()
	{

		return $this->keep_ewallet;
	}

	
	public function getEpointPassword()
	{

		return $this->epoint_password;
	}

	
	public function getEpointEncPassword()
	{

		return $this->epoint_enc_password;
	}

	
	public function getDividendCount()
	{

		return $this->dividend_count;
	}

	
	public function getDividendAmount()
	{

		return $this->dividend_amount;
	}

	
	public function getDividendBalance()
	{

		return $this->dividend_balance;
	}

	
	public function getMaxDlot()
	{

		return $this->max_dlot;
	}

	
	public function getMaxWlot()
	{

		return $this->max_wlot;
	}

	
	public function getMaintenanceLot()
	{

		return $this->maintenance_lot;
	}

	
	public function getRef()
	{

		return $this->ref;
	}

	
	public function getRefLeft()
	{

		return $this->ref_left;
	}

	
	public function getRefRight()
	{

		return $this->ref_right;
	}

	
	public function getRefLevel()
	{

		return $this->ref_level;
	}

	
	public function getCreator()
	{

		return $this->creator;
	}

	
	public function getCid()
	{

		return $this->cid;
	}

	
	public function getRankA()
	{

		return $this->rank_a;
	}

	
	public function getFutureRank()
	{

		return $this->future_rank;
	}

	
	public function getIsStockist()
	{

		return $this->is_stockist;
	}

	
	public function getStockistUid()
	{

		return $this->stockist_uid;
	}

	
	public function getStockistCode()
	{

		return $this->stockist_code;
	}

	
	public function getStockistAssignDate($format = 'Y-m-d')
	{

		if ($this->stockist_assign_date === null || $this->stockist_assign_date === '') {
			return null;
		} elseif (!is_int($this->stockist_assign_date)) {
						$ts = strtotime($this->stockist_assign_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [stockist_assign_date] as date/time value: " . var_export($this->stockist_assign_date, true));
			}
		} else {
			$ts = $this->stockist_assign_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMatrixUpline()
	{

		return $this->matrix_upline;
	}

	
	public function getMatrixLeft()
	{

		return $this->matrix_left;
	}

	
	public function getMatrixRight()
	{

		return $this->matrix_right;
	}

	
	public function getMatrixLevel()
	{

		return $this->matrix_level;
	}

	
	public function getMatrixPosition()
	{

		return $this->matrix_position;
	}

	
	public function getPlacementDate($format = 'Y-m-d H:i:s')
	{

		if ($this->placement_date === null || $this->placement_date === '') {
			return null;
		} elseif (!is_int($this->placement_date)) {
						$ts = strtotime($this->placement_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [placement_date] as date/time value: " . var_export($this->placement_date, true));
			}
		} else {
			$ts = $this->placement_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPlacementType()
	{

		return $this->placement_type;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getEwallet()
	{

		return $this->ewallet;
	}

	
	public function getEswallet()
	{

		return $this->eswallet;
	}

	
	public function getSwallet()
	{

		return $this->swallet;
	}

	
	public function getMwallet()
	{

		return $this->mwallet;
	}

	
	public function getCwallet()
	{

		return $this->cwallet;
	}

	
	public function getOwallet()
	{

		return $this->owallet;
	}

	
	public function getRwallet()
	{

		return $this->rwallet;
	}

	
	public function getTwallet()
	{

		return $this->twallet;
	}

	
	public function getPwallet()
	{

		return $this->pwallet;
	}

	
	public function getRtwallet()
	{

		return $this->rtwallet;
	}

	
	public function getRefundBv()
	{

		return $this->refund_bv;
	}

	
	public function getIncentiveDate($format = 'Y-m-d')
	{

		if ($this->incentive_date === null || $this->incentive_date === '') {
			return null;
		} elseif (!is_int($this->incentive_date)) {
						$ts = strtotime($this->incentive_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [incentive_date] as date/time value: " . var_export($this->incentive_date, true));
			}
		} else {
			$ts = $this->incentive_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIncentiveAmount()
	{

		return $this->incentive_amount;
	}

	
	public function getIc()
	{

		return $this->ic;
	}

	
	public function getAddress()
	{

		return $this->address;
	}

	
	public function getAddress2()
	{

		return $this->address2;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getZip()
	{

		return $this->zip;
	}

	
	public function getState()
	{

		return $this->state;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getHomeno()
	{

		return $this->homeno;
	}

	
	public function getMobileno()
	{

		return $this->mobileno;
	}

	
	public function getOfficeno()
	{

		return $this->officeno;
	}

	
	public function getFaxno()
	{

		return $this->faxno;
	}

	
	public function getDob($format = 'Y-m-d')
	{

		if ($this->dob === null || $this->dob === '') {
			return null;
		} elseif (!is_int($this->dob)) {
						$ts = strtotime($this->dob);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [dob] as date/time value: " . var_export($this->dob, true));
			}
		} else {
			$ts = $this->dob;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getGender()
	{

		return $this->gender;
	}

	
	public function getPayeeName()
	{

		return $this->payee_name;
	}

	
	public function getBankName()
	{

		return $this->bank_name;
	}

	
	public function getBankAccNo()
	{

		return $this->bank_acc_no;
	}

	
	public function getBankBranch()
	{

		return $this->bank_branch;
	}

	
	public function getBankSwiftcode()
	{

		return $this->bank_swiftcode;
	}

	
	public function getAccType()
	{

		return $this->acc_type;
	}

	
	public function getBisReg()
	{

		return $this->bis_reg;
	}

	
	public function getPersonInCharge()
	{

		return $this->person_in_charge;
	}

	
	public function getOccupation()
	{

		return $this->occupation;
	}

	
	public function getRemark()
	{

		return $this->remark;
	}

	
	public function getAutowit()
	{

		return $this->autowit;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getActivated()
	{

		return $this->activated;
	}

	
	public function getActivatedDate($format = 'Y-m-d H:i:s')
	{

		if ($this->activated_date === null || $this->activated_date === '') {
			return null;
		} elseif (!is_int($this->activated_date)) {
						$ts = strtotime($this->activated_date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [activated_date] as date/time value: " . var_export($this->activated_date, true));
			}
		} else {
			$ts = $this->activated_date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRvc()
	{

		return $this->rvc;
	}

	
	public function getIsFree()
	{

		return $this->is_free;
	}

	
	public function getPoolShare()
	{

		return $this->pool_share;
	}

	
	public function getMainUid()
	{

		return $this->main_uid;
	}

	
	public function getSponsorPaid()
	{

		return $this->sponsor_paid;
	}

	
	public function getFlashDate()
	{

		return $this->flash_date;
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

	
	public function getSiteVisit()
	{

		return $this->site_visit;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GgUsersPeer::ID;
		}

	} 
	
	public function setCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = GgUsersPeer::CODE;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = GgUsersPeer::NAME;
		}

	} 
	
	public function setNickname($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nickname !== $v) {
			$this->nickname = $v;
			$this->modifiedColumns[] = GgUsersPeer::NICKNAME;
		}

	} 
	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = GgUsersPeer::USERNAME;
		}

	} 
	
	public function setPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = GgUsersPeer::PASSWORD;
		}

	} 
	
	public function setEncPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->enc_password !== $v) {
			$this->enc_password = $v;
			$this->modifiedColumns[] = GgUsersPeer::ENC_PASSWORD;
		}

	} 
	
	public function setEwalletPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ewallet_password !== $v) {
			$this->ewallet_password = $v;
			$this->modifiedColumns[] = GgUsersPeer::EWALLET_PASSWORD;
		}

	} 
	
	public function setEwalletEncPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ewallet_enc_password !== $v) {
			$this->ewallet_enc_password = $v;
			$this->modifiedColumns[] = GgUsersPeer::EWALLET_ENC_PASSWORD;
		}

	} 
	
	public function setKeepEwallet($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keep_ewallet !== $v) {
			$this->keep_ewallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::KEEP_EWALLET;
		}

	} 
	
	public function setEpointPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->epoint_password !== $v) {
			$this->epoint_password = $v;
			$this->modifiedColumns[] = GgUsersPeer::EPOINT_PASSWORD;
		}

	} 
	
	public function setEpointEncPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->epoint_enc_password !== $v) {
			$this->epoint_enc_password = $v;
			$this->modifiedColumns[] = GgUsersPeer::EPOINT_ENC_PASSWORD;
		}

	} 
	
	public function setDividendCount($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->dividend_count !== $v || $v === 0) {
			$this->dividend_count = $v;
			$this->modifiedColumns[] = GgUsersPeer::DIVIDEND_COUNT;
		}

	} 
	
	public function setDividendAmount($v)
	{

		if ($this->dividend_amount !== $v || $v === 0) {
			$this->dividend_amount = $v;
			$this->modifiedColumns[] = GgUsersPeer::DIVIDEND_AMOUNT;
		}

	} 
	
	public function setDividendBalance($v)
	{

		if ($this->dividend_balance !== $v || $v === 0) {
			$this->dividend_balance = $v;
			$this->modifiedColumns[] = GgUsersPeer::DIVIDEND_BALANCE;
		}

	} 
	
	public function setMaxDlot($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->max_dlot !== $v || $v === 0) {
			$this->max_dlot = $v;
			$this->modifiedColumns[] = GgUsersPeer::MAX_DLOT;
		}

	} 
	
	public function setMaxWlot($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->max_wlot !== $v || $v === 0) {
			$this->max_wlot = $v;
			$this->modifiedColumns[] = GgUsersPeer::MAX_WLOT;
		}

	} 
	
	public function setMaintenanceLot($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->maintenance_lot !== $v || $v === 0) {
			$this->maintenance_lot = $v;
			$this->modifiedColumns[] = GgUsersPeer::MAINTENANCE_LOT;
		}

	} 
	
	public function setRef($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ref !== $v) {
			$this->ref = $v;
			$this->modifiedColumns[] = GgUsersPeer::REF;
		}

	} 
	
	public function setRefLeft($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ref_left !== $v) {
			$this->ref_left = $v;
			$this->modifiedColumns[] = GgUsersPeer::REF_LEFT;
		}

	} 
	
	public function setRefRight($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ref_right !== $v) {
			$this->ref_right = $v;
			$this->modifiedColumns[] = GgUsersPeer::REF_RIGHT;
		}

	} 
	
	public function setRefLevel($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->ref_level !== $v || $v === 0) {
			$this->ref_level = $v;
			$this->modifiedColumns[] = GgUsersPeer::REF_LEVEL;
		}

	} 
	
	public function setCreator($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->creator !== $v) {
			$this->creator = $v;
			$this->modifiedColumns[] = GgUsersPeer::CREATOR;
		}

	} 
	
	public function setCid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cid !== $v) {
			$this->cid = $v;
			$this->modifiedColumns[] = GgUsersPeer::CID;
		}

	} 
	
	public function setRankA($v)
	{

		if ($this->rank_a !== $v) {
			$this->rank_a = $v;
			$this->modifiedColumns[] = GgUsersPeer::RANK_A;
		}

	} 
	
	public function setFutureRank($v)
	{

		if ($this->future_rank !== $v || $v === 0) {
			$this->future_rank = $v;
			$this->modifiedColumns[] = GgUsersPeer::FUTURE_RANK;
		}

	} 
	
	public function setIsStockist($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->is_stockist !== $v) {
			$this->is_stockist = $v;
			$this->modifiedColumns[] = GgUsersPeer::IS_STOCKIST;
		}

	} 
	
	public function setStockistUid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->stockist_uid !== $v || $v === 0) {
			$this->stockist_uid = $v;
			$this->modifiedColumns[] = GgUsersPeer::STOCKIST_UID;
		}

	} 
	
	public function setStockistCode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->stockist_code !== $v) {
			$this->stockist_code = $v;
			$this->modifiedColumns[] = GgUsersPeer::STOCKIST_CODE;
		}

	} 
	
	public function setStockistAssignDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [stockist_assign_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->stockist_assign_date !== $ts) {
			$this->stockist_assign_date = $ts;
			$this->modifiedColumns[] = GgUsersPeer::STOCKIST_ASSIGN_DATE;
		}

	} 
	
	public function setMatrixUpline($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->matrix_upline !== $v) {
			$this->matrix_upline = $v;
			$this->modifiedColumns[] = GgUsersPeer::MATRIX_UPLINE;
		}

	} 
	
	public function setMatrixLeft($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->matrix_left !== $v) {
			$this->matrix_left = $v;
			$this->modifiedColumns[] = GgUsersPeer::MATRIX_LEFT;
		}

	} 
	
	public function setMatrixRight($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->matrix_right !== $v) {
			$this->matrix_right = $v;
			$this->modifiedColumns[] = GgUsersPeer::MATRIX_RIGHT;
		}

	} 
	
	public function setMatrixLevel($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->matrix_level !== $v || $v === 0) {
			$this->matrix_level = $v;
			$this->modifiedColumns[] = GgUsersPeer::MATRIX_LEVEL;
		}

	} 
	
	public function setMatrixPosition($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->matrix_position !== $v) {
			$this->matrix_position = $v;
			$this->modifiedColumns[] = GgUsersPeer::MATRIX_POSITION;
		}

	} 
	
	public function setPlacementDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [placement_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->placement_date !== $ts) {
			$this->placement_date = $ts;
			$this->modifiedColumns[] = GgUsersPeer::PLACEMENT_DATE;
		}

	} 
	
	public function setPlacementType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->placement_type !== $v) {
			$this->placement_type = $v;
			$this->modifiedColumns[] = GgUsersPeer::PLACEMENT_TYPE;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = GgUsersPeer::EMAIL;
		}

	} 
	
	public function setEwallet($v)
	{

		if ($this->ewallet !== $v) {
			$this->ewallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::EWALLET;
		}

	} 
	
	public function setEswallet($v)
	{

		if ($this->eswallet !== $v) {
			$this->eswallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::ESWALLET;
		}

	} 
	
	public function setSwallet($v)
	{

		if ($this->swallet !== $v) {
			$this->swallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::SWALLET;
		}

	} 
	
	public function setMwallet($v)
	{

		if ($this->mwallet !== $v) {
			$this->mwallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::MWALLET;
		}

	} 
	
	public function setCwallet($v)
	{

		if ($this->cwallet !== $v || $v === 0) {
			$this->cwallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::CWALLET;
		}

	} 
	
	public function setOwallet($v)
	{

		if ($this->owallet !== $v || $v === 0) {
			$this->owallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::OWALLET;
		}

	} 
	
	public function setRwallet($v)
	{

		if ($this->rwallet !== $v || $v === 0) {
			$this->rwallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::RWALLET;
		}

	} 
	
	public function setTwallet($v)
	{

		if ($this->twallet !== $v || $v === 0) {
			$this->twallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::TWALLET;
		}

	} 
	
	public function setPwallet($v)
	{

		if ($this->pwallet !== $v || $v === 0) {
			$this->pwallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::PWALLET;
		}

	} 
	
	public function setRtwallet($v)
	{

		if ($this->rtwallet !== $v || $v === 0) {
			$this->rtwallet = $v;
			$this->modifiedColumns[] = GgUsersPeer::RTWALLET;
		}

	} 
	
	public function setRefundBv($v)
	{

		if ($this->refund_bv !== $v || $v === 0) {
			$this->refund_bv = $v;
			$this->modifiedColumns[] = GgUsersPeer::REFUND_BV;
		}

	} 
	
	public function setIncentiveDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [incentive_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->incentive_date !== $ts) {
			$this->incentive_date = $ts;
			$this->modifiedColumns[] = GgUsersPeer::INCENTIVE_DATE;
		}

	} 
	
	public function setIncentiveAmount($v)
	{

		if ($this->incentive_amount !== $v || $v === 0) {
			$this->incentive_amount = $v;
			$this->modifiedColumns[] = GgUsersPeer::INCENTIVE_AMOUNT;
		}

	} 
	
	public function setIc($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ic !== $v) {
			$this->ic = $v;
			$this->modifiedColumns[] = GgUsersPeer::IC;
		}

	} 
	
	public function setAddress($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = GgUsersPeer::ADDRESS;
		}

	} 
	
	public function setAddress2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->address2 !== $v) {
			$this->address2 = $v;
			$this->modifiedColumns[] = GgUsersPeer::ADDRESS2;
		}

	} 
	
	public function setCity($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = GgUsersPeer::CITY;
		}

	} 
	
	public function setZip($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->zip !== $v) {
			$this->zip = $v;
			$this->modifiedColumns[] = GgUsersPeer::ZIP;
		}

	} 
	
	public function setState($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = GgUsersPeer::STATE;
		}

	} 
	
	public function setCountry($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = GgUsersPeer::COUNTRY;
		}

	} 
	
	public function setHomeno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->homeno !== $v) {
			$this->homeno = $v;
			$this->modifiedColumns[] = GgUsersPeer::HOMENO;
		}

	} 
	
	public function setMobileno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mobileno !== $v) {
			$this->mobileno = $v;
			$this->modifiedColumns[] = GgUsersPeer::MOBILENO;
		}

	} 
	
	public function setOfficeno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->officeno !== $v) {
			$this->officeno = $v;
			$this->modifiedColumns[] = GgUsersPeer::OFFICENO;
		}

	} 
	
	public function setFaxno($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->faxno !== $v) {
			$this->faxno = $v;
			$this->modifiedColumns[] = GgUsersPeer::FAXNO;
		}

	} 
	
	public function setDob($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [dob] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->dob !== $ts) {
			$this->dob = $ts;
			$this->modifiedColumns[] = GgUsersPeer::DOB;
		}

	} 
	
	public function setGender($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->gender !== $v) {
			$this->gender = $v;
			$this->modifiedColumns[] = GgUsersPeer::GENDER;
		}

	} 
	
	public function setPayeeName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->payee_name !== $v) {
			$this->payee_name = $v;
			$this->modifiedColumns[] = GgUsersPeer::PAYEE_NAME;
		}

	} 
	
	public function setBankName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_name !== $v) {
			$this->bank_name = $v;
			$this->modifiedColumns[] = GgUsersPeer::BANK_NAME;
		}

	} 
	
	public function setBankAccNo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_acc_no !== $v) {
			$this->bank_acc_no = $v;
			$this->modifiedColumns[] = GgUsersPeer::BANK_ACC_NO;
		}

	} 
	
	public function setBankBranch($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_branch !== $v) {
			$this->bank_branch = $v;
			$this->modifiedColumns[] = GgUsersPeer::BANK_BRANCH;
		}

	} 
	
	public function setBankSwiftcode($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_swiftcode !== $v) {
			$this->bank_swiftcode = $v;
			$this->modifiedColumns[] = GgUsersPeer::BANK_SWIFTCODE;
		}

	} 
	
	public function setAccType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->acc_type !== $v) {
			$this->acc_type = $v;
			$this->modifiedColumns[] = GgUsersPeer::ACC_TYPE;
		}

	} 
	
	public function setBisReg($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bis_reg !== $v) {
			$this->bis_reg = $v;
			$this->modifiedColumns[] = GgUsersPeer::BIS_REG;
		}

	} 
	
	public function setPersonInCharge($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->person_in_charge !== $v) {
			$this->person_in_charge = $v;
			$this->modifiedColumns[] = GgUsersPeer::PERSON_IN_CHARGE;
		}

	} 
	
	public function setOccupation($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->occupation !== $v) {
			$this->occupation = $v;
			$this->modifiedColumns[] = GgUsersPeer::OCCUPATION;
		}

	} 
	
	public function setRemark($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remark !== $v) {
			$this->remark = $v;
			$this->modifiedColumns[] = GgUsersPeer::REMARK;
		}

	} 
	
	public function setAutowit($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->autowit !== $v) {
			$this->autowit = $v;
			$this->modifiedColumns[] = GgUsersPeer::AUTOWIT;
		}

	} 
	
	public function setStatus($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GgUsersPeer::STATUS;
		}

	} 
	
	public function setActivated($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->activated !== $v) {
			$this->activated = $v;
			$this->modifiedColumns[] = GgUsersPeer::ACTIVATED;
		}

	} 
	
	public function setActivatedDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [activated_date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->activated_date !== $ts) {
			$this->activated_date = $ts;
			$this->modifiedColumns[] = GgUsersPeer::ACTIVATED_DATE;
		}

	} 
	
	public function setRvc($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->rvc !== $v) {
			$this->rvc = $v;
			$this->modifiedColumns[] = GgUsersPeer::RVC;
		}

	} 
	
	public function setIsFree($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_free !== $v || $v === 0) {
			$this->is_free = $v;
			$this->modifiedColumns[] = GgUsersPeer::IS_FREE;
		}

	} 
	
	public function setPoolShare($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->pool_share !== $v || $v === 0) {
			$this->pool_share = $v;
			$this->modifiedColumns[] = GgUsersPeer::POOL_SHARE;
		}

	} 
	
	public function setMainUid($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->main_uid !== $v || $v === '0') {
			$this->main_uid = $v;
			$this->modifiedColumns[] = GgUsersPeer::MAIN_UID;
		}

	} 
	
	public function setSponsorPaid($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sponsor_paid !== $v || $v === 0) {
			$this->sponsor_paid = $v;
			$this->modifiedColumns[] = GgUsersPeer::SPONSOR_PAID;
		}

	} 
	
	public function setFlashDate($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->flash_date !== $v || $v === '') {
			$this->flash_date = $v;
			$this->modifiedColumns[] = GgUsersPeer::FLASH_DATE;
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
			$this->modifiedColumns[] = GgUsersPeer::CDATE;
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
			$this->modifiedColumns[] = GgUsersPeer::LAST_LOGIN;
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
			$this->modifiedColumns[] = GgUsersPeer::LAST_LOGIN2;
		}

	} 
	
	public function setSiteVisit($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->site_visit !== $v || $v === '') {
			$this->site_visit = $v;
			$this->modifiedColumns[] = GgUsersPeer::SITE_VISIT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->code = $rs->getString($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->nickname = $rs->getString($startcol + 3);

			$this->username = $rs->getString($startcol + 4);

			$this->password = $rs->getString($startcol + 5);

			$this->enc_password = $rs->getString($startcol + 6);

			$this->ewallet_password = $rs->getString($startcol + 7);

			$this->ewallet_enc_password = $rs->getString($startcol + 8);

			$this->keep_ewallet = $rs->getString($startcol + 9);

			$this->epoint_password = $rs->getString($startcol + 10);

			$this->epoint_enc_password = $rs->getString($startcol + 11);

			$this->dividend_count = $rs->getInt($startcol + 12);

			$this->dividend_amount = $rs->getFloat($startcol + 13);

			$this->dividend_balance = $rs->getFloat($startcol + 14);

			$this->max_dlot = $rs->getInt($startcol + 15);

			$this->max_wlot = $rs->getInt($startcol + 16);

			$this->maintenance_lot = $rs->getInt($startcol + 17);

			$this->ref = $rs->getString($startcol + 18);

			$this->ref_left = $rs->getInt($startcol + 19);

			$this->ref_right = $rs->getInt($startcol + 20);

			$this->ref_level = $rs->getInt($startcol + 21);

			$this->creator = $rs->getString($startcol + 22);

			$this->cid = $rs->getString($startcol + 23);

			$this->rank_a = $rs->getFloat($startcol + 24);

			$this->future_rank = $rs->getFloat($startcol + 25);

			$this->is_stockist = $rs->getString($startcol + 26);

			$this->stockist_uid = $rs->getInt($startcol + 27);

			$this->stockist_code = $rs->getString($startcol + 28);

			$this->stockist_assign_date = $rs->getDate($startcol + 29, null);

			$this->matrix_upline = $rs->getString($startcol + 30);

			$this->matrix_left = $rs->getInt($startcol + 31);

			$this->matrix_right = $rs->getInt($startcol + 32);

			$this->matrix_level = $rs->getInt($startcol + 33);

			$this->matrix_position = $rs->getInt($startcol + 34);

			$this->placement_date = $rs->getTimestamp($startcol + 35, null);

			$this->placement_type = $rs->getString($startcol + 36);

			$this->email = $rs->getString($startcol + 37);

			$this->ewallet = $rs->getFloat($startcol + 38);

			$this->eswallet = $rs->getFloat($startcol + 39);

			$this->swallet = $rs->getFloat($startcol + 40);

			$this->mwallet = $rs->getFloat($startcol + 41);

			$this->cwallet = $rs->getFloat($startcol + 42);

			$this->owallet = $rs->getFloat($startcol + 43);

			$this->rwallet = $rs->getFloat($startcol + 44);

			$this->twallet = $rs->getFloat($startcol + 45);

			$this->pwallet = $rs->getFloat($startcol + 46);

			$this->rtwallet = $rs->getFloat($startcol + 47);

			$this->refund_bv = $rs->getFloat($startcol + 48);

			$this->incentive_date = $rs->getDate($startcol + 49, null);

			$this->incentive_amount = $rs->getFloat($startcol + 50);

			$this->ic = $rs->getString($startcol + 51);

			$this->address = $rs->getString($startcol + 52);

			$this->address2 = $rs->getString($startcol + 53);

			$this->city = $rs->getString($startcol + 54);

			$this->zip = $rs->getString($startcol + 55);

			$this->state = $rs->getString($startcol + 56);

			$this->country = $rs->getString($startcol + 57);

			$this->homeno = $rs->getString($startcol + 58);

			$this->mobileno = $rs->getString($startcol + 59);

			$this->officeno = $rs->getString($startcol + 60);

			$this->faxno = $rs->getString($startcol + 61);

			$this->dob = $rs->getDate($startcol + 62, null);

			$this->gender = $rs->getString($startcol + 63);

			$this->payee_name = $rs->getString($startcol + 64);

			$this->bank_name = $rs->getString($startcol + 65);

			$this->bank_acc_no = $rs->getString($startcol + 66);

			$this->bank_branch = $rs->getString($startcol + 67);

			$this->bank_swiftcode = $rs->getString($startcol + 68);

			$this->acc_type = $rs->getString($startcol + 69);

			$this->bis_reg = $rs->getString($startcol + 70);

			$this->person_in_charge = $rs->getString($startcol + 71);

			$this->occupation = $rs->getString($startcol + 72);

			$this->remark = $rs->getString($startcol + 73);

			$this->autowit = $rs->getString($startcol + 74);

			$this->status = $rs->getString($startcol + 75);

			$this->activated = $rs->getString($startcol + 76);

			$this->activated_date = $rs->getTimestamp($startcol + 77, null);

			$this->rvc = $rs->getString($startcol + 78);

			$this->is_free = $rs->getInt($startcol + 79);

			$this->pool_share = $rs->getInt($startcol + 80);

			$this->main_uid = $rs->getString($startcol + 81);

			$this->sponsor_paid = $rs->getInt($startcol + 82);

			$this->flash_date = $rs->getString($startcol + 83);

			$this->cdate = $rs->getTimestamp($startcol + 84, null);

			$this->last_login = $rs->getTimestamp($startcol + 85, null);

			$this->last_login2 = $rs->getTimestamp($startcol + 86, null);

			$this->site_visit = $rs->getString($startcol + 87);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 88; 
		} catch (Exception $e) {
			throw new PropelException("Error populating GgUsers object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GgUsersPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GgUsersPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GgUsersPeer::DATABASE_NAME);
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
					$pk = GgUsersPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GgUsersPeer::doUpdate($this, $con);
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


			if (($retval = GgUsersPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCode();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getNickname();
				break;
			case 4:
				return $this->getUsername();
				break;
			case 5:
				return $this->getPassword();
				break;
			case 6:
				return $this->getEncPassword();
				break;
			case 7:
				return $this->getEwalletPassword();
				break;
			case 8:
				return $this->getEwalletEncPassword();
				break;
			case 9:
				return $this->getKeepEwallet();
				break;
			case 10:
				return $this->getEpointPassword();
				break;
			case 11:
				return $this->getEpointEncPassword();
				break;
			case 12:
				return $this->getDividendCount();
				break;
			case 13:
				return $this->getDividendAmount();
				break;
			case 14:
				return $this->getDividendBalance();
				break;
			case 15:
				return $this->getMaxDlot();
				break;
			case 16:
				return $this->getMaxWlot();
				break;
			case 17:
				return $this->getMaintenanceLot();
				break;
			case 18:
				return $this->getRef();
				break;
			case 19:
				return $this->getRefLeft();
				break;
			case 20:
				return $this->getRefRight();
				break;
			case 21:
				return $this->getRefLevel();
				break;
			case 22:
				return $this->getCreator();
				break;
			case 23:
				return $this->getCid();
				break;
			case 24:
				return $this->getRankA();
				break;
			case 25:
				return $this->getFutureRank();
				break;
			case 26:
				return $this->getIsStockist();
				break;
			case 27:
				return $this->getStockistUid();
				break;
			case 28:
				return $this->getStockistCode();
				break;
			case 29:
				return $this->getStockistAssignDate();
				break;
			case 30:
				return $this->getMatrixUpline();
				break;
			case 31:
				return $this->getMatrixLeft();
				break;
			case 32:
				return $this->getMatrixRight();
				break;
			case 33:
				return $this->getMatrixLevel();
				break;
			case 34:
				return $this->getMatrixPosition();
				break;
			case 35:
				return $this->getPlacementDate();
				break;
			case 36:
				return $this->getPlacementType();
				break;
			case 37:
				return $this->getEmail();
				break;
			case 38:
				return $this->getEwallet();
				break;
			case 39:
				return $this->getEswallet();
				break;
			case 40:
				return $this->getSwallet();
				break;
			case 41:
				return $this->getMwallet();
				break;
			case 42:
				return $this->getCwallet();
				break;
			case 43:
				return $this->getOwallet();
				break;
			case 44:
				return $this->getRwallet();
				break;
			case 45:
				return $this->getTwallet();
				break;
			case 46:
				return $this->getPwallet();
				break;
			case 47:
				return $this->getRtwallet();
				break;
			case 48:
				return $this->getRefundBv();
				break;
			case 49:
				return $this->getIncentiveDate();
				break;
			case 50:
				return $this->getIncentiveAmount();
				break;
			case 51:
				return $this->getIc();
				break;
			case 52:
				return $this->getAddress();
				break;
			case 53:
				return $this->getAddress2();
				break;
			case 54:
				return $this->getCity();
				break;
			case 55:
				return $this->getZip();
				break;
			case 56:
				return $this->getState();
				break;
			case 57:
				return $this->getCountry();
				break;
			case 58:
				return $this->getHomeno();
				break;
			case 59:
				return $this->getMobileno();
				break;
			case 60:
				return $this->getOfficeno();
				break;
			case 61:
				return $this->getFaxno();
				break;
			case 62:
				return $this->getDob();
				break;
			case 63:
				return $this->getGender();
				break;
			case 64:
				return $this->getPayeeName();
				break;
			case 65:
				return $this->getBankName();
				break;
			case 66:
				return $this->getBankAccNo();
				break;
			case 67:
				return $this->getBankBranch();
				break;
			case 68:
				return $this->getBankSwiftcode();
				break;
			case 69:
				return $this->getAccType();
				break;
			case 70:
				return $this->getBisReg();
				break;
			case 71:
				return $this->getPersonInCharge();
				break;
			case 72:
				return $this->getOccupation();
				break;
			case 73:
				return $this->getRemark();
				break;
			case 74:
				return $this->getAutowit();
				break;
			case 75:
				return $this->getStatus();
				break;
			case 76:
				return $this->getActivated();
				break;
			case 77:
				return $this->getActivatedDate();
				break;
			case 78:
				return $this->getRvc();
				break;
			case 79:
				return $this->getIsFree();
				break;
			case 80:
				return $this->getPoolShare();
				break;
			case 81:
				return $this->getMainUid();
				break;
			case 82:
				return $this->getSponsorPaid();
				break;
			case 83:
				return $this->getFlashDate();
				break;
			case 84:
				return $this->getCdate();
				break;
			case 85:
				return $this->getLastLogin();
				break;
			case 86:
				return $this->getLastLogin2();
				break;
			case 87:
				return $this->getSiteVisit();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgUsersPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCode(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getNickname(),
			$keys[4] => $this->getUsername(),
			$keys[5] => $this->getPassword(),
			$keys[6] => $this->getEncPassword(),
			$keys[7] => $this->getEwalletPassword(),
			$keys[8] => $this->getEwalletEncPassword(),
			$keys[9] => $this->getKeepEwallet(),
			$keys[10] => $this->getEpointPassword(),
			$keys[11] => $this->getEpointEncPassword(),
			$keys[12] => $this->getDividendCount(),
			$keys[13] => $this->getDividendAmount(),
			$keys[14] => $this->getDividendBalance(),
			$keys[15] => $this->getMaxDlot(),
			$keys[16] => $this->getMaxWlot(),
			$keys[17] => $this->getMaintenanceLot(),
			$keys[18] => $this->getRef(),
			$keys[19] => $this->getRefLeft(),
			$keys[20] => $this->getRefRight(),
			$keys[21] => $this->getRefLevel(),
			$keys[22] => $this->getCreator(),
			$keys[23] => $this->getCid(),
			$keys[24] => $this->getRankA(),
			$keys[25] => $this->getFutureRank(),
			$keys[26] => $this->getIsStockist(),
			$keys[27] => $this->getStockistUid(),
			$keys[28] => $this->getStockistCode(),
			$keys[29] => $this->getStockistAssignDate(),
			$keys[30] => $this->getMatrixUpline(),
			$keys[31] => $this->getMatrixLeft(),
			$keys[32] => $this->getMatrixRight(),
			$keys[33] => $this->getMatrixLevel(),
			$keys[34] => $this->getMatrixPosition(),
			$keys[35] => $this->getPlacementDate(),
			$keys[36] => $this->getPlacementType(),
			$keys[37] => $this->getEmail(),
			$keys[38] => $this->getEwallet(),
			$keys[39] => $this->getEswallet(),
			$keys[40] => $this->getSwallet(),
			$keys[41] => $this->getMwallet(),
			$keys[42] => $this->getCwallet(),
			$keys[43] => $this->getOwallet(),
			$keys[44] => $this->getRwallet(),
			$keys[45] => $this->getTwallet(),
			$keys[46] => $this->getPwallet(),
			$keys[47] => $this->getRtwallet(),
			$keys[48] => $this->getRefundBv(),
			$keys[49] => $this->getIncentiveDate(),
			$keys[50] => $this->getIncentiveAmount(),
			$keys[51] => $this->getIc(),
			$keys[52] => $this->getAddress(),
			$keys[53] => $this->getAddress2(),
			$keys[54] => $this->getCity(),
			$keys[55] => $this->getZip(),
			$keys[56] => $this->getState(),
			$keys[57] => $this->getCountry(),
			$keys[58] => $this->getHomeno(),
			$keys[59] => $this->getMobileno(),
			$keys[60] => $this->getOfficeno(),
			$keys[61] => $this->getFaxno(),
			$keys[62] => $this->getDob(),
			$keys[63] => $this->getGender(),
			$keys[64] => $this->getPayeeName(),
			$keys[65] => $this->getBankName(),
			$keys[66] => $this->getBankAccNo(),
			$keys[67] => $this->getBankBranch(),
			$keys[68] => $this->getBankSwiftcode(),
			$keys[69] => $this->getAccType(),
			$keys[70] => $this->getBisReg(),
			$keys[71] => $this->getPersonInCharge(),
			$keys[72] => $this->getOccupation(),
			$keys[73] => $this->getRemark(),
			$keys[74] => $this->getAutowit(),
			$keys[75] => $this->getStatus(),
			$keys[76] => $this->getActivated(),
			$keys[77] => $this->getActivatedDate(),
			$keys[78] => $this->getRvc(),
			$keys[79] => $this->getIsFree(),
			$keys[80] => $this->getPoolShare(),
			$keys[81] => $this->getMainUid(),
			$keys[82] => $this->getSponsorPaid(),
			$keys[83] => $this->getFlashDate(),
			$keys[84] => $this->getCdate(),
			$keys[85] => $this->getLastLogin(),
			$keys[86] => $this->getLastLogin2(),
			$keys[87] => $this->getSiteVisit(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GgUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCode($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setNickname($value);
				break;
			case 4:
				$this->setUsername($value);
				break;
			case 5:
				$this->setPassword($value);
				break;
			case 6:
				$this->setEncPassword($value);
				break;
			case 7:
				$this->setEwalletPassword($value);
				break;
			case 8:
				$this->setEwalletEncPassword($value);
				break;
			case 9:
				$this->setKeepEwallet($value);
				break;
			case 10:
				$this->setEpointPassword($value);
				break;
			case 11:
				$this->setEpointEncPassword($value);
				break;
			case 12:
				$this->setDividendCount($value);
				break;
			case 13:
				$this->setDividendAmount($value);
				break;
			case 14:
				$this->setDividendBalance($value);
				break;
			case 15:
				$this->setMaxDlot($value);
				break;
			case 16:
				$this->setMaxWlot($value);
				break;
			case 17:
				$this->setMaintenanceLot($value);
				break;
			case 18:
				$this->setRef($value);
				break;
			case 19:
				$this->setRefLeft($value);
				break;
			case 20:
				$this->setRefRight($value);
				break;
			case 21:
				$this->setRefLevel($value);
				break;
			case 22:
				$this->setCreator($value);
				break;
			case 23:
				$this->setCid($value);
				break;
			case 24:
				$this->setRankA($value);
				break;
			case 25:
				$this->setFutureRank($value);
				break;
			case 26:
				$this->setIsStockist($value);
				break;
			case 27:
				$this->setStockistUid($value);
				break;
			case 28:
				$this->setStockistCode($value);
				break;
			case 29:
				$this->setStockistAssignDate($value);
				break;
			case 30:
				$this->setMatrixUpline($value);
				break;
			case 31:
				$this->setMatrixLeft($value);
				break;
			case 32:
				$this->setMatrixRight($value);
				break;
			case 33:
				$this->setMatrixLevel($value);
				break;
			case 34:
				$this->setMatrixPosition($value);
				break;
			case 35:
				$this->setPlacementDate($value);
				break;
			case 36:
				$this->setPlacementType($value);
				break;
			case 37:
				$this->setEmail($value);
				break;
			case 38:
				$this->setEwallet($value);
				break;
			case 39:
				$this->setEswallet($value);
				break;
			case 40:
				$this->setSwallet($value);
				break;
			case 41:
				$this->setMwallet($value);
				break;
			case 42:
				$this->setCwallet($value);
				break;
			case 43:
				$this->setOwallet($value);
				break;
			case 44:
				$this->setRwallet($value);
				break;
			case 45:
				$this->setTwallet($value);
				break;
			case 46:
				$this->setPwallet($value);
				break;
			case 47:
				$this->setRtwallet($value);
				break;
			case 48:
				$this->setRefundBv($value);
				break;
			case 49:
				$this->setIncentiveDate($value);
				break;
			case 50:
				$this->setIncentiveAmount($value);
				break;
			case 51:
				$this->setIc($value);
				break;
			case 52:
				$this->setAddress($value);
				break;
			case 53:
				$this->setAddress2($value);
				break;
			case 54:
				$this->setCity($value);
				break;
			case 55:
				$this->setZip($value);
				break;
			case 56:
				$this->setState($value);
				break;
			case 57:
				$this->setCountry($value);
				break;
			case 58:
				$this->setHomeno($value);
				break;
			case 59:
				$this->setMobileno($value);
				break;
			case 60:
				$this->setOfficeno($value);
				break;
			case 61:
				$this->setFaxno($value);
				break;
			case 62:
				$this->setDob($value);
				break;
			case 63:
				$this->setGender($value);
				break;
			case 64:
				$this->setPayeeName($value);
				break;
			case 65:
				$this->setBankName($value);
				break;
			case 66:
				$this->setBankAccNo($value);
				break;
			case 67:
				$this->setBankBranch($value);
				break;
			case 68:
				$this->setBankSwiftcode($value);
				break;
			case 69:
				$this->setAccType($value);
				break;
			case 70:
				$this->setBisReg($value);
				break;
			case 71:
				$this->setPersonInCharge($value);
				break;
			case 72:
				$this->setOccupation($value);
				break;
			case 73:
				$this->setRemark($value);
				break;
			case 74:
				$this->setAutowit($value);
				break;
			case 75:
				$this->setStatus($value);
				break;
			case 76:
				$this->setActivated($value);
				break;
			case 77:
				$this->setActivatedDate($value);
				break;
			case 78:
				$this->setRvc($value);
				break;
			case 79:
				$this->setIsFree($value);
				break;
			case 80:
				$this->setPoolShare($value);
				break;
			case 81:
				$this->setMainUid($value);
				break;
			case 82:
				$this->setSponsorPaid($value);
				break;
			case 83:
				$this->setFlashDate($value);
				break;
			case 84:
				$this->setCdate($value);
				break;
			case 85:
				$this->setLastLogin($value);
				break;
			case 86:
				$this->setLastLogin2($value);
				break;
			case 87:
				$this->setSiteVisit($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GgUsersPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNickname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUsername($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPassword($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEncPassword($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEwalletPassword($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEwalletEncPassword($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setKeepEwallet($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEpointPassword($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEpointEncPassword($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDividendCount($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDividendAmount($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDividendBalance($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMaxDlot($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setMaxWlot($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setMaintenanceLot($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setRef($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setRefLeft($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setRefRight($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setRefLevel($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCreator($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCid($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setRankA($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFutureRank($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setIsStockist($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setStockistUid($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setStockistCode($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setStockistAssignDate($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setMatrixUpline($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setMatrixLeft($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setMatrixRight($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setMatrixLevel($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setMatrixPosition($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setPlacementDate($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setPlacementType($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setEmail($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setEwallet($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setEswallet($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setSwallet($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setMwallet($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setCwallet($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setOwallet($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setRwallet($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setTwallet($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setPwallet($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setRtwallet($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setRefundBv($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setIncentiveDate($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setIncentiveAmount($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setIc($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setAddress($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setAddress2($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setCity($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setZip($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setState($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setCountry($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setHomeno($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setMobileno($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setOfficeno($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setFaxno($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setDob($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setGender($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setPayeeName($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setBankName($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setBankAccNo($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setBankBranch($arr[$keys[67]]);
		if (array_key_exists($keys[68], $arr)) $this->setBankSwiftcode($arr[$keys[68]]);
		if (array_key_exists($keys[69], $arr)) $this->setAccType($arr[$keys[69]]);
		if (array_key_exists($keys[70], $arr)) $this->setBisReg($arr[$keys[70]]);
		if (array_key_exists($keys[71], $arr)) $this->setPersonInCharge($arr[$keys[71]]);
		if (array_key_exists($keys[72], $arr)) $this->setOccupation($arr[$keys[72]]);
		if (array_key_exists($keys[73], $arr)) $this->setRemark($arr[$keys[73]]);
		if (array_key_exists($keys[74], $arr)) $this->setAutowit($arr[$keys[74]]);
		if (array_key_exists($keys[75], $arr)) $this->setStatus($arr[$keys[75]]);
		if (array_key_exists($keys[76], $arr)) $this->setActivated($arr[$keys[76]]);
		if (array_key_exists($keys[77], $arr)) $this->setActivatedDate($arr[$keys[77]]);
		if (array_key_exists($keys[78], $arr)) $this->setRvc($arr[$keys[78]]);
		if (array_key_exists($keys[79], $arr)) $this->setIsFree($arr[$keys[79]]);
		if (array_key_exists($keys[80], $arr)) $this->setPoolShare($arr[$keys[80]]);
		if (array_key_exists($keys[81], $arr)) $this->setMainUid($arr[$keys[81]]);
		if (array_key_exists($keys[82], $arr)) $this->setSponsorPaid($arr[$keys[82]]);
		if (array_key_exists($keys[83], $arr)) $this->setFlashDate($arr[$keys[83]]);
		if (array_key_exists($keys[84], $arr)) $this->setCdate($arr[$keys[84]]);
		if (array_key_exists($keys[85], $arr)) $this->setLastLogin($arr[$keys[85]]);
		if (array_key_exists($keys[86], $arr)) $this->setLastLogin2($arr[$keys[86]]);
		if (array_key_exists($keys[87], $arr)) $this->setSiteVisit($arr[$keys[87]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GgUsersPeer::DATABASE_NAME);

		if ($this->isColumnModified(GgUsersPeer::ID)) $criteria->add(GgUsersPeer::ID, $this->id);
		if ($this->isColumnModified(GgUsersPeer::CODE)) $criteria->add(GgUsersPeer::CODE, $this->code);
		if ($this->isColumnModified(GgUsersPeer::NAME)) $criteria->add(GgUsersPeer::NAME, $this->name);
		if ($this->isColumnModified(GgUsersPeer::NICKNAME)) $criteria->add(GgUsersPeer::NICKNAME, $this->nickname);
		if ($this->isColumnModified(GgUsersPeer::USERNAME)) $criteria->add(GgUsersPeer::USERNAME, $this->username);
		if ($this->isColumnModified(GgUsersPeer::PASSWORD)) $criteria->add(GgUsersPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(GgUsersPeer::ENC_PASSWORD)) $criteria->add(GgUsersPeer::ENC_PASSWORD, $this->enc_password);
		if ($this->isColumnModified(GgUsersPeer::EWALLET_PASSWORD)) $criteria->add(GgUsersPeer::EWALLET_PASSWORD, $this->ewallet_password);
		if ($this->isColumnModified(GgUsersPeer::EWALLET_ENC_PASSWORD)) $criteria->add(GgUsersPeer::EWALLET_ENC_PASSWORD, $this->ewallet_enc_password);
		if ($this->isColumnModified(GgUsersPeer::KEEP_EWALLET)) $criteria->add(GgUsersPeer::KEEP_EWALLET, $this->keep_ewallet);
		if ($this->isColumnModified(GgUsersPeer::EPOINT_PASSWORD)) $criteria->add(GgUsersPeer::EPOINT_PASSWORD, $this->epoint_password);
		if ($this->isColumnModified(GgUsersPeer::EPOINT_ENC_PASSWORD)) $criteria->add(GgUsersPeer::EPOINT_ENC_PASSWORD, $this->epoint_enc_password);
		if ($this->isColumnModified(GgUsersPeer::DIVIDEND_COUNT)) $criteria->add(GgUsersPeer::DIVIDEND_COUNT, $this->dividend_count);
		if ($this->isColumnModified(GgUsersPeer::DIVIDEND_AMOUNT)) $criteria->add(GgUsersPeer::DIVIDEND_AMOUNT, $this->dividend_amount);
		if ($this->isColumnModified(GgUsersPeer::DIVIDEND_BALANCE)) $criteria->add(GgUsersPeer::DIVIDEND_BALANCE, $this->dividend_balance);
		if ($this->isColumnModified(GgUsersPeer::MAX_DLOT)) $criteria->add(GgUsersPeer::MAX_DLOT, $this->max_dlot);
		if ($this->isColumnModified(GgUsersPeer::MAX_WLOT)) $criteria->add(GgUsersPeer::MAX_WLOT, $this->max_wlot);
		if ($this->isColumnModified(GgUsersPeer::MAINTENANCE_LOT)) $criteria->add(GgUsersPeer::MAINTENANCE_LOT, $this->maintenance_lot);
		if ($this->isColumnModified(GgUsersPeer::REF)) $criteria->add(GgUsersPeer::REF, $this->ref);
		if ($this->isColumnModified(GgUsersPeer::REF_LEFT)) $criteria->add(GgUsersPeer::REF_LEFT, $this->ref_left);
		if ($this->isColumnModified(GgUsersPeer::REF_RIGHT)) $criteria->add(GgUsersPeer::REF_RIGHT, $this->ref_right);
		if ($this->isColumnModified(GgUsersPeer::REF_LEVEL)) $criteria->add(GgUsersPeer::REF_LEVEL, $this->ref_level);
		if ($this->isColumnModified(GgUsersPeer::CREATOR)) $criteria->add(GgUsersPeer::CREATOR, $this->creator);
		if ($this->isColumnModified(GgUsersPeer::CID)) $criteria->add(GgUsersPeer::CID, $this->cid);
		if ($this->isColumnModified(GgUsersPeer::RANK_A)) $criteria->add(GgUsersPeer::RANK_A, $this->rank_a);
		if ($this->isColumnModified(GgUsersPeer::FUTURE_RANK)) $criteria->add(GgUsersPeer::FUTURE_RANK, $this->future_rank);
		if ($this->isColumnModified(GgUsersPeer::IS_STOCKIST)) $criteria->add(GgUsersPeer::IS_STOCKIST, $this->is_stockist);
		if ($this->isColumnModified(GgUsersPeer::STOCKIST_UID)) $criteria->add(GgUsersPeer::STOCKIST_UID, $this->stockist_uid);
		if ($this->isColumnModified(GgUsersPeer::STOCKIST_CODE)) $criteria->add(GgUsersPeer::STOCKIST_CODE, $this->stockist_code);
		if ($this->isColumnModified(GgUsersPeer::STOCKIST_ASSIGN_DATE)) $criteria->add(GgUsersPeer::STOCKIST_ASSIGN_DATE, $this->stockist_assign_date);
		if ($this->isColumnModified(GgUsersPeer::MATRIX_UPLINE)) $criteria->add(GgUsersPeer::MATRIX_UPLINE, $this->matrix_upline);
		if ($this->isColumnModified(GgUsersPeer::MATRIX_LEFT)) $criteria->add(GgUsersPeer::MATRIX_LEFT, $this->matrix_left);
		if ($this->isColumnModified(GgUsersPeer::MATRIX_RIGHT)) $criteria->add(GgUsersPeer::MATRIX_RIGHT, $this->matrix_right);
		if ($this->isColumnModified(GgUsersPeer::MATRIX_LEVEL)) $criteria->add(GgUsersPeer::MATRIX_LEVEL, $this->matrix_level);
		if ($this->isColumnModified(GgUsersPeer::MATRIX_POSITION)) $criteria->add(GgUsersPeer::MATRIX_POSITION, $this->matrix_position);
		if ($this->isColumnModified(GgUsersPeer::PLACEMENT_DATE)) $criteria->add(GgUsersPeer::PLACEMENT_DATE, $this->placement_date);
		if ($this->isColumnModified(GgUsersPeer::PLACEMENT_TYPE)) $criteria->add(GgUsersPeer::PLACEMENT_TYPE, $this->placement_type);
		if ($this->isColumnModified(GgUsersPeer::EMAIL)) $criteria->add(GgUsersPeer::EMAIL, $this->email);
		if ($this->isColumnModified(GgUsersPeer::EWALLET)) $criteria->add(GgUsersPeer::EWALLET, $this->ewallet);
		if ($this->isColumnModified(GgUsersPeer::ESWALLET)) $criteria->add(GgUsersPeer::ESWALLET, $this->eswallet);
		if ($this->isColumnModified(GgUsersPeer::SWALLET)) $criteria->add(GgUsersPeer::SWALLET, $this->swallet);
		if ($this->isColumnModified(GgUsersPeer::MWALLET)) $criteria->add(GgUsersPeer::MWALLET, $this->mwallet);
		if ($this->isColumnModified(GgUsersPeer::CWALLET)) $criteria->add(GgUsersPeer::CWALLET, $this->cwallet);
		if ($this->isColumnModified(GgUsersPeer::OWALLET)) $criteria->add(GgUsersPeer::OWALLET, $this->owallet);
		if ($this->isColumnModified(GgUsersPeer::RWALLET)) $criteria->add(GgUsersPeer::RWALLET, $this->rwallet);
		if ($this->isColumnModified(GgUsersPeer::TWALLET)) $criteria->add(GgUsersPeer::TWALLET, $this->twallet);
		if ($this->isColumnModified(GgUsersPeer::PWALLET)) $criteria->add(GgUsersPeer::PWALLET, $this->pwallet);
		if ($this->isColumnModified(GgUsersPeer::RTWALLET)) $criteria->add(GgUsersPeer::RTWALLET, $this->rtwallet);
		if ($this->isColumnModified(GgUsersPeer::REFUND_BV)) $criteria->add(GgUsersPeer::REFUND_BV, $this->refund_bv);
		if ($this->isColumnModified(GgUsersPeer::INCENTIVE_DATE)) $criteria->add(GgUsersPeer::INCENTIVE_DATE, $this->incentive_date);
		if ($this->isColumnModified(GgUsersPeer::INCENTIVE_AMOUNT)) $criteria->add(GgUsersPeer::INCENTIVE_AMOUNT, $this->incentive_amount);
		if ($this->isColumnModified(GgUsersPeer::IC)) $criteria->add(GgUsersPeer::IC, $this->ic);
		if ($this->isColumnModified(GgUsersPeer::ADDRESS)) $criteria->add(GgUsersPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(GgUsersPeer::ADDRESS2)) $criteria->add(GgUsersPeer::ADDRESS2, $this->address2);
		if ($this->isColumnModified(GgUsersPeer::CITY)) $criteria->add(GgUsersPeer::CITY, $this->city);
		if ($this->isColumnModified(GgUsersPeer::ZIP)) $criteria->add(GgUsersPeer::ZIP, $this->zip);
		if ($this->isColumnModified(GgUsersPeer::STATE)) $criteria->add(GgUsersPeer::STATE, $this->state);
		if ($this->isColumnModified(GgUsersPeer::COUNTRY)) $criteria->add(GgUsersPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(GgUsersPeer::HOMENO)) $criteria->add(GgUsersPeer::HOMENO, $this->homeno);
		if ($this->isColumnModified(GgUsersPeer::MOBILENO)) $criteria->add(GgUsersPeer::MOBILENO, $this->mobileno);
		if ($this->isColumnModified(GgUsersPeer::OFFICENO)) $criteria->add(GgUsersPeer::OFFICENO, $this->officeno);
		if ($this->isColumnModified(GgUsersPeer::FAXNO)) $criteria->add(GgUsersPeer::FAXNO, $this->faxno);
		if ($this->isColumnModified(GgUsersPeer::DOB)) $criteria->add(GgUsersPeer::DOB, $this->dob);
		if ($this->isColumnModified(GgUsersPeer::GENDER)) $criteria->add(GgUsersPeer::GENDER, $this->gender);
		if ($this->isColumnModified(GgUsersPeer::PAYEE_NAME)) $criteria->add(GgUsersPeer::PAYEE_NAME, $this->payee_name);
		if ($this->isColumnModified(GgUsersPeer::BANK_NAME)) $criteria->add(GgUsersPeer::BANK_NAME, $this->bank_name);
		if ($this->isColumnModified(GgUsersPeer::BANK_ACC_NO)) $criteria->add(GgUsersPeer::BANK_ACC_NO, $this->bank_acc_no);
		if ($this->isColumnModified(GgUsersPeer::BANK_BRANCH)) $criteria->add(GgUsersPeer::BANK_BRANCH, $this->bank_branch);
		if ($this->isColumnModified(GgUsersPeer::BANK_SWIFTCODE)) $criteria->add(GgUsersPeer::BANK_SWIFTCODE, $this->bank_swiftcode);
		if ($this->isColumnModified(GgUsersPeer::ACC_TYPE)) $criteria->add(GgUsersPeer::ACC_TYPE, $this->acc_type);
		if ($this->isColumnModified(GgUsersPeer::BIS_REG)) $criteria->add(GgUsersPeer::BIS_REG, $this->bis_reg);
		if ($this->isColumnModified(GgUsersPeer::PERSON_IN_CHARGE)) $criteria->add(GgUsersPeer::PERSON_IN_CHARGE, $this->person_in_charge);
		if ($this->isColumnModified(GgUsersPeer::OCCUPATION)) $criteria->add(GgUsersPeer::OCCUPATION, $this->occupation);
		if ($this->isColumnModified(GgUsersPeer::REMARK)) $criteria->add(GgUsersPeer::REMARK, $this->remark);
		if ($this->isColumnModified(GgUsersPeer::AUTOWIT)) $criteria->add(GgUsersPeer::AUTOWIT, $this->autowit);
		if ($this->isColumnModified(GgUsersPeer::STATUS)) $criteria->add(GgUsersPeer::STATUS, $this->status);
		if ($this->isColumnModified(GgUsersPeer::ACTIVATED)) $criteria->add(GgUsersPeer::ACTIVATED, $this->activated);
		if ($this->isColumnModified(GgUsersPeer::ACTIVATED_DATE)) $criteria->add(GgUsersPeer::ACTIVATED_DATE, $this->activated_date);
		if ($this->isColumnModified(GgUsersPeer::RVC)) $criteria->add(GgUsersPeer::RVC, $this->rvc);
		if ($this->isColumnModified(GgUsersPeer::IS_FREE)) $criteria->add(GgUsersPeer::IS_FREE, $this->is_free);
		if ($this->isColumnModified(GgUsersPeer::POOL_SHARE)) $criteria->add(GgUsersPeer::POOL_SHARE, $this->pool_share);
		if ($this->isColumnModified(GgUsersPeer::MAIN_UID)) $criteria->add(GgUsersPeer::MAIN_UID, $this->main_uid);
		if ($this->isColumnModified(GgUsersPeer::SPONSOR_PAID)) $criteria->add(GgUsersPeer::SPONSOR_PAID, $this->sponsor_paid);
		if ($this->isColumnModified(GgUsersPeer::FLASH_DATE)) $criteria->add(GgUsersPeer::FLASH_DATE, $this->flash_date);
		if ($this->isColumnModified(GgUsersPeer::CDATE)) $criteria->add(GgUsersPeer::CDATE, $this->cdate);
		if ($this->isColumnModified(GgUsersPeer::LAST_LOGIN)) $criteria->add(GgUsersPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(GgUsersPeer::LAST_LOGIN2)) $criteria->add(GgUsersPeer::LAST_LOGIN2, $this->last_login2);
		if ($this->isColumnModified(GgUsersPeer::SITE_VISIT)) $criteria->add(GgUsersPeer::SITE_VISIT, $this->site_visit);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GgUsersPeer::DATABASE_NAME);

		$criteria->add(GgUsersPeer::ID, $this->id);

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

		$copyObj->setCode($this->code);

		$copyObj->setName($this->name);

		$copyObj->setNickname($this->nickname);

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setEncPassword($this->enc_password);

		$copyObj->setEwalletPassword($this->ewallet_password);

		$copyObj->setEwalletEncPassword($this->ewallet_enc_password);

		$copyObj->setKeepEwallet($this->keep_ewallet);

		$copyObj->setEpointPassword($this->epoint_password);

		$copyObj->setEpointEncPassword($this->epoint_enc_password);

		$copyObj->setDividendCount($this->dividend_count);

		$copyObj->setDividendAmount($this->dividend_amount);

		$copyObj->setDividendBalance($this->dividend_balance);

		$copyObj->setMaxDlot($this->max_dlot);

		$copyObj->setMaxWlot($this->max_wlot);

		$copyObj->setMaintenanceLot($this->maintenance_lot);

		$copyObj->setRef($this->ref);

		$copyObj->setRefLeft($this->ref_left);

		$copyObj->setRefRight($this->ref_right);

		$copyObj->setRefLevel($this->ref_level);

		$copyObj->setCreator($this->creator);

		$copyObj->setCid($this->cid);

		$copyObj->setRankA($this->rank_a);

		$copyObj->setFutureRank($this->future_rank);

		$copyObj->setIsStockist($this->is_stockist);

		$copyObj->setStockistUid($this->stockist_uid);

		$copyObj->setStockistCode($this->stockist_code);

		$copyObj->setStockistAssignDate($this->stockist_assign_date);

		$copyObj->setMatrixUpline($this->matrix_upline);

		$copyObj->setMatrixLeft($this->matrix_left);

		$copyObj->setMatrixRight($this->matrix_right);

		$copyObj->setMatrixLevel($this->matrix_level);

		$copyObj->setMatrixPosition($this->matrix_position);

		$copyObj->setPlacementDate($this->placement_date);

		$copyObj->setPlacementType($this->placement_type);

		$copyObj->setEmail($this->email);

		$copyObj->setEwallet($this->ewallet);

		$copyObj->setEswallet($this->eswallet);

		$copyObj->setSwallet($this->swallet);

		$copyObj->setMwallet($this->mwallet);

		$copyObj->setCwallet($this->cwallet);

		$copyObj->setOwallet($this->owallet);

		$copyObj->setRwallet($this->rwallet);

		$copyObj->setTwallet($this->twallet);

		$copyObj->setPwallet($this->pwallet);

		$copyObj->setRtwallet($this->rtwallet);

		$copyObj->setRefundBv($this->refund_bv);

		$copyObj->setIncentiveDate($this->incentive_date);

		$copyObj->setIncentiveAmount($this->incentive_amount);

		$copyObj->setIc($this->ic);

		$copyObj->setAddress($this->address);

		$copyObj->setAddress2($this->address2);

		$copyObj->setCity($this->city);

		$copyObj->setZip($this->zip);

		$copyObj->setState($this->state);

		$copyObj->setCountry($this->country);

		$copyObj->setHomeno($this->homeno);

		$copyObj->setMobileno($this->mobileno);

		$copyObj->setOfficeno($this->officeno);

		$copyObj->setFaxno($this->faxno);

		$copyObj->setDob($this->dob);

		$copyObj->setGender($this->gender);

		$copyObj->setPayeeName($this->payee_name);

		$copyObj->setBankName($this->bank_name);

		$copyObj->setBankAccNo($this->bank_acc_no);

		$copyObj->setBankBranch($this->bank_branch);

		$copyObj->setBankSwiftcode($this->bank_swiftcode);

		$copyObj->setAccType($this->acc_type);

		$copyObj->setBisReg($this->bis_reg);

		$copyObj->setPersonInCharge($this->person_in_charge);

		$copyObj->setOccupation($this->occupation);

		$copyObj->setRemark($this->remark);

		$copyObj->setAutowit($this->autowit);

		$copyObj->setStatus($this->status);

		$copyObj->setActivated($this->activated);

		$copyObj->setActivatedDate($this->activated_date);

		$copyObj->setRvc($this->rvc);

		$copyObj->setIsFree($this->is_free);

		$copyObj->setPoolShare($this->pool_share);

		$copyObj->setMainUid($this->main_uid);

		$copyObj->setSponsorPaid($this->sponsor_paid);

		$copyObj->setFlashDate($this->flash_date);

		$copyObj->setCdate($this->cdate);

		$copyObj->setLastLogin($this->last_login);

		$copyObj->setLastLogin2($this->last_login2);

		$copyObj->setSiteVisit($this->site_visit);


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
			self::$peer = new GgUsersPeer();
		}
		return self::$peer;
	}

} 