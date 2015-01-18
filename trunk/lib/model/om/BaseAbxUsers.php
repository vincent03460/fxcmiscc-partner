<?php


abstract class BaseAbxUsers extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $chinese_name;


	
	protected $english_name;


	
	protected $username;


	
	protected $password;


	
	protected $enc_password;


	
	protected $sec_password;


	
	protected $enc_sec_password;


	
	protected $custodiankey;


	
	protected $enc_custodiankey;


	
	protected $cust_data;


	
	protected $mt4_data;


	
	protected $mt4_batch;


	
	protected $count_login;


	
	protected $admin_rank;


	
	protected $ref;


	
	protected $primary_acc;


	
	protected $primary_id;


	
	protected $upline1;


	
	protected $position1;


	
	protected $email;


	
	protected $ewallet;


	
	protected $cwallet;


	
	protected $mt4wallet;


	
	protected $fwallet;


	
	protected $epoint;


	
	protected $ecash;


	
	protected $ewallet_debt;


	
	protected $reinvest;


	
	protected $sewallet;


	
	protected $sepoint;


	
	protected $ewallet_mandatory;


	
	protected $ic;


	
	protected $eep;


	
	protected $english_address;


	
	protected $english_address2;


	
	protected $nationality;


	
	protected $street1;


	
	protected $street2;


	
	protected $city;


	
	protected $zip;


	
	protected $state;


	
	protected $country;


	
	protected $mobileno;


	
	protected $dob;


	
	protected $gender;


	
	protected $bank_name;


	
	protected $bank_branch_name;


	
	protected $bank_payee_name;


	
	protected $bank_acc_no;


	
	protected $bank_sorting_code;


	
	protected $bank_iban;


	
	protected $acc_type;


	
	protected $user_role;


	
	protected $language;


	
	protected $status;


	
	protected $debt_status;


	
	protected $debt_deduct_percent;


	
	protected $summary_mode = 0;


	
	protected $genealogy_lock;


	
	protected $profile_lock;


	
	protected $level;


	
	protected $cdate;


	
	protected $profile_updated;


	
	protected $status_code = 'PEND';

	
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

	
	public function getChineseName()
	{

		return $this->chinese_name;
	}

	
	public function getEnglishName()
	{

		return $this->english_name;
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

	
	public function getSecPassword()
	{

		return $this->sec_password;
	}

	
	public function getEncSecPassword()
	{

		return $this->enc_sec_password;
	}

	
	public function getCustodiankey()
	{

		return $this->custodiankey;
	}

	
	public function getEncCustodiankey()
	{

		return $this->enc_custodiankey;
	}

	
	public function getCustData()
	{

		return $this->cust_data;
	}

	
	public function getMt4Data()
	{

		return $this->mt4_data;
	}

	
	public function getMt4Batch()
	{

		return $this->mt4_batch;
	}

	
	public function getCountLogin()
	{

		return $this->count_login;
	}

	
	public function getAdminRank()
	{

		return $this->admin_rank;
	}

	
	public function getRef()
	{

		return $this->ref;
	}

	
	public function getPrimaryAcc()
	{

		return $this->primary_acc;
	}

	
	public function getPrimaryId()
	{

		return $this->primary_id;
	}

	
	public function getUpline1()
	{

		return $this->upline1;
	}

	
	public function getPosition1()
	{

		return $this->position1;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getEwallet()
	{

		return $this->ewallet;
	}

	
	public function getCwallet()
	{

		return $this->cwallet;
	}

	
	public function getMt4wallet()
	{

		return $this->mt4wallet;
	}

	
	public function getFwallet()
	{

		return $this->fwallet;
	}

	
	public function getEpoint()
	{

		return $this->epoint;
	}

	
	public function getEcash()
	{

		return $this->ecash;
	}

	
	public function getEwalletDebt()
	{

		return $this->ewallet_debt;
	}

	
	public function getReinvest()
	{

		return $this->reinvest;
	}

	
	public function getSewallet()
	{

		return $this->sewallet;
	}

	
	public function getSepoint()
	{

		return $this->sepoint;
	}

	
	public function getEwalletMandatory()
	{

		return $this->ewallet_mandatory;
	}

	
	public function getIc()
	{

		return $this->ic;
	}

	
	public function getEep()
	{

		return $this->eep;
	}

	
	public function getEnglishAddress()
	{

		return $this->english_address;
	}

	
	public function getEnglishAddress2()
	{

		return $this->english_address2;
	}

	
	public function getNationality()
	{

		return $this->nationality;
	}

	
	public function getStreet1()
	{

		return $this->street1;
	}

	
	public function getStreet2()
	{

		return $this->street2;
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

	
	public function getMobileno()
	{

		return $this->mobileno;
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

	
	public function getBankName()
	{

		return $this->bank_name;
	}

	
	public function getBankBranchName()
	{

		return $this->bank_branch_name;
	}

	
	public function getBankPayeeName()
	{

		return $this->bank_payee_name;
	}

	
	public function getBankAccNo()
	{

		return $this->bank_acc_no;
	}

	
	public function getBankSortingCode()
	{

		return $this->bank_sorting_code;
	}

	
	public function getBankIban()
	{

		return $this->bank_iban;
	}

	
	public function getAccType()
	{

		return $this->acc_type;
	}

	
	public function getUserRole()
	{

		return $this->user_role;
	}

	
	public function getLanguage()
	{

		return $this->language;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getDebtStatus()
	{

		return $this->debt_status;
	}

	
	public function getDebtDeductPercent()
	{

		return $this->debt_deduct_percent;
	}

	
	public function getSummaryMode()
	{

		return $this->summary_mode;
	}

	
	public function getGenealogyLock()
	{

		return $this->genealogy_lock;
	}

	
	public function getProfileLock()
	{

		return $this->profile_lock;
	}

	
	public function getLevel()
	{

		return $this->level;
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

	
	public function getProfileUpdated($format = 'Y-m-d H:i:s')
	{

		if ($this->profile_updated === null || $this->profile_updated === '') {
			return null;
		} elseif (!is_int($this->profile_updated)) {
						$ts = strtotime($this->profile_updated);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [profile_updated] as date/time value: " . var_export($this->profile_updated, true));
			}
		} else {
			$ts = $this->profile_updated;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getStatusCode()
	{

		return $this->status_code;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ID;
		}

	} 

	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AbxUsersPeer::NAME;
		}

	} 

	
	public function setChineseName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->chinese_name !== $v) {
			$this->chinese_name = $v;
			$this->modifiedColumns[] = AbxUsersPeer::CHINESE_NAME;
		}

	} 

	
	public function setEnglishName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->english_name !== $v) {
			$this->english_name = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ENGLISH_NAME;
		}

	} 

	
	public function setUsername($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = AbxUsersPeer::USERNAME;
		}

	} 

	
	public function setPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = AbxUsersPeer::PASSWORD;
		}

	} 

	
	public function setEncPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->enc_password !== $v) {
			$this->enc_password = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ENC_PASSWORD;
		}

	} 

	
	public function setSecPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sec_password !== $v) {
			$this->sec_password = $v;
			$this->modifiedColumns[] = AbxUsersPeer::SEC_PASSWORD;
		}

	} 

	
	public function setEncSecPassword($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->enc_sec_password !== $v) {
			$this->enc_sec_password = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ENC_SEC_PASSWORD;
		}

	} 

	
	public function setCustodiankey($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->custodiankey !== $v) {
			$this->custodiankey = $v;
			$this->modifiedColumns[] = AbxUsersPeer::CUSTODIANKEY;
		}

	} 

	
	public function setEncCustodiankey($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->enc_custodiankey !== $v) {
			$this->enc_custodiankey = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ENC_CUSTODIANKEY;
		}

	} 

	
	public function setCustData($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cust_data !== $v) {
			$this->cust_data = $v;
			$this->modifiedColumns[] = AbxUsersPeer::CUST_DATA;
		}

	} 

	
	public function setMt4Data($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->mt4_data !== $v) {
			$this->mt4_data = $v;
			$this->modifiedColumns[] = AbxUsersPeer::MT4_DATA;
		}

	} 

	
	public function setMt4Batch($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->mt4_batch !== $v) {
			$this->mt4_batch = $v;
			$this->modifiedColumns[] = AbxUsersPeer::MT4_BATCH;
		}

	} 

	
	public function setCountLogin($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->count_login !== $v) {
			$this->count_login = $v;
			$this->modifiedColumns[] = AbxUsersPeer::COUNT_LOGIN;
		}

	} 

	
	public function setAdminRank($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->admin_rank !== $v) {
			$this->admin_rank = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ADMIN_RANK;
		}

	} 

	
	public function setRef($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ref !== $v) {
			$this->ref = $v;
			$this->modifiedColumns[] = AbxUsersPeer::REF;
		}

	} 

	
	public function setPrimaryAcc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_acc !== $v) {
			$this->primary_acc = $v;
			$this->modifiedColumns[] = AbxUsersPeer::PRIMARY_ACC;
		}

	} 

	
	public function setPrimaryId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->primary_id !== $v) {
			$this->primary_id = $v;
			$this->modifiedColumns[] = AbxUsersPeer::PRIMARY_ID;
		}

	} 

	
	public function setUpline1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->upline1 !== $v) {
			$this->upline1 = $v;
			$this->modifiedColumns[] = AbxUsersPeer::UPLINE1;
		}

	} 

	
	public function setPosition1($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->position1 !== $v) {
			$this->position1 = $v;
			$this->modifiedColumns[] = AbxUsersPeer::POSITION1;
		}

	} 

	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AbxUsersPeer::EMAIL;
		}

	} 

	
	public function setEwallet($v)
	{

		if ($this->ewallet !== $v) {
			$this->ewallet = $v;
			$this->modifiedColumns[] = AbxUsersPeer::EWALLET;
		}

	} 

	
	public function setCwallet($v)
	{

		if ($this->cwallet !== $v) {
			$this->cwallet = $v;
			$this->modifiedColumns[] = AbxUsersPeer::CWALLET;
		}

	} 

	
	public function setMt4wallet($v)
	{

		if ($this->mt4wallet !== $v) {
			$this->mt4wallet = $v;
			$this->modifiedColumns[] = AbxUsersPeer::MT4WALLET;
		}

	} 

	
	public function setFwallet($v)
	{

		if ($this->fwallet !== $v) {
			$this->fwallet = $v;
			$this->modifiedColumns[] = AbxUsersPeer::FWALLET;
		}

	} 

	
	public function setEpoint($v)
	{

		if ($this->epoint !== $v) {
			$this->epoint = $v;
			$this->modifiedColumns[] = AbxUsersPeer::EPOINT;
		}

	} 

	
	public function setEcash($v)
	{

		if ($this->ecash !== $v) {
			$this->ecash = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ECASH;
		}

	} 

	
	public function setEwalletDebt($v)
	{

		if ($this->ewallet_debt !== $v) {
			$this->ewallet_debt = $v;
			$this->modifiedColumns[] = AbxUsersPeer::EWALLET_DEBT;
		}

	} 

	
	public function setReinvest($v)
	{

		if ($this->reinvest !== $v) {
			$this->reinvest = $v;
			$this->modifiedColumns[] = AbxUsersPeer::REINVEST;
		}

	} 

	
	public function setSewallet($v)
	{

		if ($this->sewallet !== $v) {
			$this->sewallet = $v;
			$this->modifiedColumns[] = AbxUsersPeer::SEWALLET;
		}

	} 

	
	public function setSepoint($v)
	{

		if ($this->sepoint !== $v) {
			$this->sepoint = $v;
			$this->modifiedColumns[] = AbxUsersPeer::SEPOINT;
		}

	} 

	
	public function setEwalletMandatory($v)
	{

		if ($this->ewallet_mandatory !== $v) {
			$this->ewallet_mandatory = $v;
			$this->modifiedColumns[] = AbxUsersPeer::EWALLET_MANDATORY;
		}

	} 

	
	public function setIc($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ic !== $v) {
			$this->ic = $v;
			$this->modifiedColumns[] = AbxUsersPeer::IC;
		}

	} 

	
	public function setEep($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->eep !== $v) {
			$this->eep = $v;
			$this->modifiedColumns[] = AbxUsersPeer::EEP;
		}

	} 

	
	public function setEnglishAddress($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->english_address !== $v) {
			$this->english_address = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ENGLISH_ADDRESS;
		}

	} 

	
	public function setEnglishAddress2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->english_address2 !== $v) {
			$this->english_address2 = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ENGLISH_ADDRESS2;
		}

	} 

	
	public function setNationality($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nationality !== $v) {
			$this->nationality = $v;
			$this->modifiedColumns[] = AbxUsersPeer::NATIONALITY;
		}

	} 

	
	public function setStreet1($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->street1 !== $v) {
			$this->street1 = $v;
			$this->modifiedColumns[] = AbxUsersPeer::STREET1;
		}

	} 

	
	public function setStreet2($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->street2 !== $v) {
			$this->street2 = $v;
			$this->modifiedColumns[] = AbxUsersPeer::STREET2;
		}

	} 

	
	public function setCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = AbxUsersPeer::CITY;
		}

	} 

	
	public function setZip($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->zip !== $v) {
			$this->zip = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ZIP;
		}

	} 

	
	public function setState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = AbxUsersPeer::STATE;
		}

	} 

	
	public function setCountry($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = AbxUsersPeer::COUNTRY;
		}

	} 

	
	public function setMobileno($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mobileno !== $v) {
			$this->mobileno = $v;
			$this->modifiedColumns[] = AbxUsersPeer::MOBILENO;
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
			$this->modifiedColumns[] = AbxUsersPeer::DOB;
		}

	} 

	
	public function setGender($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->gender !== $v) {
			$this->gender = $v;
			$this->modifiedColumns[] = AbxUsersPeer::GENDER;
		}

	} 

	
	public function setBankName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_name !== $v) {
			$this->bank_name = $v;
			$this->modifiedColumns[] = AbxUsersPeer::BANK_NAME;
		}

	} 

	
	public function setBankBranchName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_branch_name !== $v) {
			$this->bank_branch_name = $v;
			$this->modifiedColumns[] = AbxUsersPeer::BANK_BRANCH_NAME;
		}

	} 

	
	public function setBankPayeeName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_payee_name !== $v) {
			$this->bank_payee_name = $v;
			$this->modifiedColumns[] = AbxUsersPeer::BANK_PAYEE_NAME;
		}

	} 

	
	public function setBankAccNo($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_acc_no !== $v) {
			$this->bank_acc_no = $v;
			$this->modifiedColumns[] = AbxUsersPeer::BANK_ACC_NO;
		}

	} 

	
	public function setBankSortingCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_sorting_code !== $v) {
			$this->bank_sorting_code = $v;
			$this->modifiedColumns[] = AbxUsersPeer::BANK_SORTING_CODE;
		}

	} 

	
	public function setBankIban($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->bank_iban !== $v) {
			$this->bank_iban = $v;
			$this->modifiedColumns[] = AbxUsersPeer::BANK_IBAN;
		}

	} 

	
	public function setAccType($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->acc_type !== $v) {
			$this->acc_type = $v;
			$this->modifiedColumns[] = AbxUsersPeer::ACC_TYPE;
		}

	} 

	
	public function setUserRole($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_role !== $v) {
			$this->user_role = $v;
			$this->modifiedColumns[] = AbxUsersPeer::USER_ROLE;
		}

	} 

	
	public function setLanguage($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->language !== $v) {
			$this->language = $v;
			$this->modifiedColumns[] = AbxUsersPeer::LANGUAGE;
		}

	} 

	
	public function setStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = AbxUsersPeer::STATUS;
		}

	} 

	
	public function setDebtStatus($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->debt_status !== $v) {
			$this->debt_status = $v;
			$this->modifiedColumns[] = AbxUsersPeer::DEBT_STATUS;
		}

	} 

	
	public function setDebtDeductPercent($v)
	{

		if ($this->debt_deduct_percent !== $v) {
			$this->debt_deduct_percent = $v;
			$this->modifiedColumns[] = AbxUsersPeer::DEBT_DEDUCT_PERCENT;
		}

	} 

	
	public function setSummaryMode($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->summary_mode !== $v || $v === 0) {
			$this->summary_mode = $v;
			$this->modifiedColumns[] = AbxUsersPeer::SUMMARY_MODE;
		}

	} 

	
	public function setGenealogyLock($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->genealogy_lock !== $v) {
			$this->genealogy_lock = $v;
			$this->modifiedColumns[] = AbxUsersPeer::GENEALOGY_LOCK;
		}

	} 

	
	public function setProfileLock($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->profile_lock !== $v) {
			$this->profile_lock = $v;
			$this->modifiedColumns[] = AbxUsersPeer::PROFILE_LOCK;
		}

	} 

	
	public function setLevel($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->level !== $v) {
			$this->level = $v;
			$this->modifiedColumns[] = AbxUsersPeer::LEVEL;
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
			$this->modifiedColumns[] = AbxUsersPeer::CDATE;
		}

	} 

	
	public function setProfileUpdated($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [profile_updated] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->profile_updated !== $ts) {
			$this->profile_updated = $ts;
			$this->modifiedColumns[] = AbxUsersPeer::PROFILE_UPDATED;
		}

	} 

	
	public function setStatusCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->status_code !== $v || $v === 'PEND') {
			$this->status_code = $v;
			$this->modifiedColumns[] = AbxUsersPeer::STATUS_CODE;
		}

	} 

	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->chinese_name = $rs->getString($startcol + 2);

			$this->english_name = $rs->getString($startcol + 3);

			$this->username = $rs->getString($startcol + 4);

			$this->password = $rs->getString($startcol + 5);

			$this->enc_password = $rs->getString($startcol + 6);

			$this->sec_password = $rs->getString($startcol + 7);

			$this->enc_sec_password = $rs->getString($startcol + 8);

			$this->custodiankey = $rs->getString($startcol + 9);

			$this->enc_custodiankey = $rs->getString($startcol + 10);

			$this->cust_data = $rs->getString($startcol + 11);

			$this->mt4_data = $rs->getInt($startcol + 12);

			$this->mt4_batch = $rs->getInt($startcol + 13);

			$this->count_login = $rs->getInt($startcol + 14);

			$this->admin_rank = $rs->getInt($startcol + 15);

			$this->ref = $rs->getString($startcol + 16);

			$this->primary_acc = $rs->getString($startcol + 17);

			$this->primary_id = $rs->getString($startcol + 18);

			$this->upline1 = $rs->getString($startcol + 19);

			$this->position1 = $rs->getInt($startcol + 20);

			$this->email = $rs->getString($startcol + 21);

			$this->ewallet = $rs->getFloat($startcol + 22);

			$this->cwallet = $rs->getFloat($startcol + 23);

			$this->mt4wallet = $rs->getFloat($startcol + 24);

			$this->fwallet = $rs->getFloat($startcol + 25);

			$this->epoint = $rs->getFloat($startcol + 26);

			$this->ecash = $rs->getFloat($startcol + 27);

			$this->ewallet_debt = $rs->getFloat($startcol + 28);

			$this->reinvest = $rs->getFloat($startcol + 29);

			$this->sewallet = $rs->getFloat($startcol + 30);

			$this->sepoint = $rs->getFloat($startcol + 31);

			$this->ewallet_mandatory = $rs->getFloat($startcol + 32);

			$this->ic = $rs->getString($startcol + 33);

			$this->eep = $rs->getString($startcol + 34);

			$this->english_address = $rs->getString($startcol + 35);

			$this->english_address2 = $rs->getString($startcol + 36);

			$this->nationality = $rs->getString($startcol + 37);

			$this->street1 = $rs->getString($startcol + 38);

			$this->street2 = $rs->getString($startcol + 39);

			$this->city = $rs->getString($startcol + 40);

			$this->zip = $rs->getString($startcol + 41);

			$this->state = $rs->getString($startcol + 42);

			$this->country = $rs->getString($startcol + 43);

			$this->mobileno = $rs->getString($startcol + 44);

			$this->dob = $rs->getDate($startcol + 45, null);

			$this->gender = $rs->getString($startcol + 46);

			$this->bank_name = $rs->getString($startcol + 47);

			$this->bank_branch_name = $rs->getString($startcol + 48);

			$this->bank_payee_name = $rs->getString($startcol + 49);

			$this->bank_acc_no = $rs->getString($startcol + 50);

			$this->bank_sorting_code = $rs->getString($startcol + 51);

			$this->bank_iban = $rs->getString($startcol + 52);

			$this->acc_type = $rs->getInt($startcol + 53);

			$this->user_role = $rs->getInt($startcol + 54);

			$this->language = $rs->getString($startcol + 55);

			$this->status = $rs->getInt($startcol + 56);

			$this->debt_status = $rs->getInt($startcol + 57);

			$this->debt_deduct_percent = $rs->getFloat($startcol + 58);

			$this->summary_mode = $rs->getInt($startcol + 59);

			$this->genealogy_lock = $rs->getInt($startcol + 60);

			$this->profile_lock = $rs->getInt($startcol + 61);

			$this->level = $rs->getInt($startcol + 62);

			$this->cdate = $rs->getTimestamp($startcol + 63, null);

			$this->profile_updated = $rs->getTimestamp($startcol + 64, null);

			$this->status_code = $rs->getString($startcol + 65);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 66; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AbxUsers object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AbxUsersPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AbxUsersPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AbxUsersPeer::DATABASE_NAME);
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
					$pk = AbxUsersPeer::doInsert($this, $con);
					$affectedRows += 1; 
										 
										 

					$this->setId($pk);  

					$this->setNew(false);
				} else {
					$affectedRows += AbxUsersPeer::doUpdate($this, $con);
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


			if (($retval = AbxUsersPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbxUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getChineseName();
				break;
			case 3:
				return $this->getEnglishName();
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
				return $this->getSecPassword();
				break;
			case 8:
				return $this->getEncSecPassword();
				break;
			case 9:
				return $this->getCustodiankey();
				break;
			case 10:
				return $this->getEncCustodiankey();
				break;
			case 11:
				return $this->getCustData();
				break;
			case 12:
				return $this->getMt4Data();
				break;
			case 13:
				return $this->getMt4Batch();
				break;
			case 14:
				return $this->getCountLogin();
				break;
			case 15:
				return $this->getAdminRank();
				break;
			case 16:
				return $this->getRef();
				break;
			case 17:
				return $this->getPrimaryAcc();
				break;
			case 18:
				return $this->getPrimaryId();
				break;
			case 19:
				return $this->getUpline1();
				break;
			case 20:
				return $this->getPosition1();
				break;
			case 21:
				return $this->getEmail();
				break;
			case 22:
				return $this->getEwallet();
				break;
			case 23:
				return $this->getCwallet();
				break;
			case 24:
				return $this->getMt4wallet();
				break;
			case 25:
				return $this->getFwallet();
				break;
			case 26:
				return $this->getEpoint();
				break;
			case 27:
				return $this->getEcash();
				break;
			case 28:
				return $this->getEwalletDebt();
				break;
			case 29:
				return $this->getReinvest();
				break;
			case 30:
				return $this->getSewallet();
				break;
			case 31:
				return $this->getSepoint();
				break;
			case 32:
				return $this->getEwalletMandatory();
				break;
			case 33:
				return $this->getIc();
				break;
			case 34:
				return $this->getEep();
				break;
			case 35:
				return $this->getEnglishAddress();
				break;
			case 36:
				return $this->getEnglishAddress2();
				break;
			case 37:
				return $this->getNationality();
				break;
			case 38:
				return $this->getStreet1();
				break;
			case 39:
				return $this->getStreet2();
				break;
			case 40:
				return $this->getCity();
				break;
			case 41:
				return $this->getZip();
				break;
			case 42:
				return $this->getState();
				break;
			case 43:
				return $this->getCountry();
				break;
			case 44:
				return $this->getMobileno();
				break;
			case 45:
				return $this->getDob();
				break;
			case 46:
				return $this->getGender();
				break;
			case 47:
				return $this->getBankName();
				break;
			case 48:
				return $this->getBankBranchName();
				break;
			case 49:
				return $this->getBankPayeeName();
				break;
			case 50:
				return $this->getBankAccNo();
				break;
			case 51:
				return $this->getBankSortingCode();
				break;
			case 52:
				return $this->getBankIban();
				break;
			case 53:
				return $this->getAccType();
				break;
			case 54:
				return $this->getUserRole();
				break;
			case 55:
				return $this->getLanguage();
				break;
			case 56:
				return $this->getStatus();
				break;
			case 57:
				return $this->getDebtStatus();
				break;
			case 58:
				return $this->getDebtDeductPercent();
				break;
			case 59:
				return $this->getSummaryMode();
				break;
			case 60:
				return $this->getGenealogyLock();
				break;
			case 61:
				return $this->getProfileLock();
				break;
			case 62:
				return $this->getLevel();
				break;
			case 63:
				return $this->getCdate();
				break;
			case 64:
				return $this->getProfileUpdated();
				break;
			case 65:
				return $this->getStatusCode();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbxUsersPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getChineseName(),
			$keys[3] => $this->getEnglishName(),
			$keys[4] => $this->getUsername(),
			$keys[5] => $this->getPassword(),
			$keys[6] => $this->getEncPassword(),
			$keys[7] => $this->getSecPassword(),
			$keys[8] => $this->getEncSecPassword(),
			$keys[9] => $this->getCustodiankey(),
			$keys[10] => $this->getEncCustodiankey(),
			$keys[11] => $this->getCustData(),
			$keys[12] => $this->getMt4Data(),
			$keys[13] => $this->getMt4Batch(),
			$keys[14] => $this->getCountLogin(),
			$keys[15] => $this->getAdminRank(),
			$keys[16] => $this->getRef(),
			$keys[17] => $this->getPrimaryAcc(),
			$keys[18] => $this->getPrimaryId(),
			$keys[19] => $this->getUpline1(),
			$keys[20] => $this->getPosition1(),
			$keys[21] => $this->getEmail(),
			$keys[22] => $this->getEwallet(),
			$keys[23] => $this->getCwallet(),
			$keys[24] => $this->getMt4wallet(),
			$keys[25] => $this->getFwallet(),
			$keys[26] => $this->getEpoint(),
			$keys[27] => $this->getEcash(),
			$keys[28] => $this->getEwalletDebt(),
			$keys[29] => $this->getReinvest(),
			$keys[30] => $this->getSewallet(),
			$keys[31] => $this->getSepoint(),
			$keys[32] => $this->getEwalletMandatory(),
			$keys[33] => $this->getIc(),
			$keys[34] => $this->getEep(),
			$keys[35] => $this->getEnglishAddress(),
			$keys[36] => $this->getEnglishAddress2(),
			$keys[37] => $this->getNationality(),
			$keys[38] => $this->getStreet1(),
			$keys[39] => $this->getStreet2(),
			$keys[40] => $this->getCity(),
			$keys[41] => $this->getZip(),
			$keys[42] => $this->getState(),
			$keys[43] => $this->getCountry(),
			$keys[44] => $this->getMobileno(),
			$keys[45] => $this->getDob(),
			$keys[46] => $this->getGender(),
			$keys[47] => $this->getBankName(),
			$keys[48] => $this->getBankBranchName(),
			$keys[49] => $this->getBankPayeeName(),
			$keys[50] => $this->getBankAccNo(),
			$keys[51] => $this->getBankSortingCode(),
			$keys[52] => $this->getBankIban(),
			$keys[53] => $this->getAccType(),
			$keys[54] => $this->getUserRole(),
			$keys[55] => $this->getLanguage(),
			$keys[56] => $this->getStatus(),
			$keys[57] => $this->getDebtStatus(),
			$keys[58] => $this->getDebtDeductPercent(),
			$keys[59] => $this->getSummaryMode(),
			$keys[60] => $this->getGenealogyLock(),
			$keys[61] => $this->getProfileLock(),
			$keys[62] => $this->getLevel(),
			$keys[63] => $this->getCdate(),
			$keys[64] => $this->getProfileUpdated(),
			$keys[65] => $this->getStatusCode(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AbxUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setChineseName($value);
				break;
			case 3:
				$this->setEnglishName($value);
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
				$this->setSecPassword($value);
				break;
			case 8:
				$this->setEncSecPassword($value);
				break;
			case 9:
				$this->setCustodiankey($value);
				break;
			case 10:
				$this->setEncCustodiankey($value);
				break;
			case 11:
				$this->setCustData($value);
				break;
			case 12:
				$this->setMt4Data($value);
				break;
			case 13:
				$this->setMt4Batch($value);
				break;
			case 14:
				$this->setCountLogin($value);
				break;
			case 15:
				$this->setAdminRank($value);
				break;
			case 16:
				$this->setRef($value);
				break;
			case 17:
				$this->setPrimaryAcc($value);
				break;
			case 18:
				$this->setPrimaryId($value);
				break;
			case 19:
				$this->setUpline1($value);
				break;
			case 20:
				$this->setPosition1($value);
				break;
			case 21:
				$this->setEmail($value);
				break;
			case 22:
				$this->setEwallet($value);
				break;
			case 23:
				$this->setCwallet($value);
				break;
			case 24:
				$this->setMt4wallet($value);
				break;
			case 25:
				$this->setFwallet($value);
				break;
			case 26:
				$this->setEpoint($value);
				break;
			case 27:
				$this->setEcash($value);
				break;
			case 28:
				$this->setEwalletDebt($value);
				break;
			case 29:
				$this->setReinvest($value);
				break;
			case 30:
				$this->setSewallet($value);
				break;
			case 31:
				$this->setSepoint($value);
				break;
			case 32:
				$this->setEwalletMandatory($value);
				break;
			case 33:
				$this->setIc($value);
				break;
			case 34:
				$this->setEep($value);
				break;
			case 35:
				$this->setEnglishAddress($value);
				break;
			case 36:
				$this->setEnglishAddress2($value);
				break;
			case 37:
				$this->setNationality($value);
				break;
			case 38:
				$this->setStreet1($value);
				break;
			case 39:
				$this->setStreet2($value);
				break;
			case 40:
				$this->setCity($value);
				break;
			case 41:
				$this->setZip($value);
				break;
			case 42:
				$this->setState($value);
				break;
			case 43:
				$this->setCountry($value);
				break;
			case 44:
				$this->setMobileno($value);
				break;
			case 45:
				$this->setDob($value);
				break;
			case 46:
				$this->setGender($value);
				break;
			case 47:
				$this->setBankName($value);
				break;
			case 48:
				$this->setBankBranchName($value);
				break;
			case 49:
				$this->setBankPayeeName($value);
				break;
			case 50:
				$this->setBankAccNo($value);
				break;
			case 51:
				$this->setBankSortingCode($value);
				break;
			case 52:
				$this->setBankIban($value);
				break;
			case 53:
				$this->setAccType($value);
				break;
			case 54:
				$this->setUserRole($value);
				break;
			case 55:
				$this->setLanguage($value);
				break;
			case 56:
				$this->setStatus($value);
				break;
			case 57:
				$this->setDebtStatus($value);
				break;
			case 58:
				$this->setDebtDeductPercent($value);
				break;
			case 59:
				$this->setSummaryMode($value);
				break;
			case 60:
				$this->setGenealogyLock($value);
				break;
			case 61:
				$this->setProfileLock($value);
				break;
			case 62:
				$this->setLevel($value);
				break;
			case 63:
				$this->setCdate($value);
				break;
			case 64:
				$this->setProfileUpdated($value);
				break;
			case 65:
				$this->setStatusCode($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AbxUsersPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setChineseName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEnglishName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUsername($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPassword($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEncPassword($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSecPassword($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEncSecPassword($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCustodiankey($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEncCustodiankey($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCustData($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMt4Data($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMt4Batch($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCountLogin($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAdminRank($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setRef($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPrimaryAcc($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPrimaryId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUpline1($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setPosition1($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setEmail($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setEwallet($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCwallet($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setMt4wallet($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFwallet($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setEpoint($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setEcash($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setEwalletDebt($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setReinvest($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setSewallet($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setSepoint($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setEwalletMandatory($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setIc($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setEep($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setEnglishAddress($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setEnglishAddress2($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setNationality($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setStreet1($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setStreet2($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCity($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setZip($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setState($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setCountry($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setMobileno($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setDob($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setGender($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setBankName($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setBankBranchName($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setBankPayeeName($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setBankAccNo($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setBankSortingCode($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setBankIban($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setAccType($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setUserRole($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setLanguage($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setStatus($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setDebtStatus($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setDebtDeductPercent($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setSummaryMode($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setGenealogyLock($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setProfileLock($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setLevel($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setCdate($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setProfileUpdated($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setStatusCode($arr[$keys[65]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AbxUsersPeer::DATABASE_NAME);

		if ($this->isColumnModified(AbxUsersPeer::ID)) $criteria->add(AbxUsersPeer::ID, $this->id);
		if ($this->isColumnModified(AbxUsersPeer::NAME)) $criteria->add(AbxUsersPeer::NAME, $this->name);
		if ($this->isColumnModified(AbxUsersPeer::CHINESE_NAME)) $criteria->add(AbxUsersPeer::CHINESE_NAME, $this->chinese_name);
		if ($this->isColumnModified(AbxUsersPeer::ENGLISH_NAME)) $criteria->add(AbxUsersPeer::ENGLISH_NAME, $this->english_name);
		if ($this->isColumnModified(AbxUsersPeer::USERNAME)) $criteria->add(AbxUsersPeer::USERNAME, $this->username);
		if ($this->isColumnModified(AbxUsersPeer::PASSWORD)) $criteria->add(AbxUsersPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(AbxUsersPeer::ENC_PASSWORD)) $criteria->add(AbxUsersPeer::ENC_PASSWORD, $this->enc_password);
		if ($this->isColumnModified(AbxUsersPeer::SEC_PASSWORD)) $criteria->add(AbxUsersPeer::SEC_PASSWORD, $this->sec_password);
		if ($this->isColumnModified(AbxUsersPeer::ENC_SEC_PASSWORD)) $criteria->add(AbxUsersPeer::ENC_SEC_PASSWORD, $this->enc_sec_password);
		if ($this->isColumnModified(AbxUsersPeer::CUSTODIANKEY)) $criteria->add(AbxUsersPeer::CUSTODIANKEY, $this->custodiankey);
		if ($this->isColumnModified(AbxUsersPeer::ENC_CUSTODIANKEY)) $criteria->add(AbxUsersPeer::ENC_CUSTODIANKEY, $this->enc_custodiankey);
		if ($this->isColumnModified(AbxUsersPeer::CUST_DATA)) $criteria->add(AbxUsersPeer::CUST_DATA, $this->cust_data);
		if ($this->isColumnModified(AbxUsersPeer::MT4_DATA)) $criteria->add(AbxUsersPeer::MT4_DATA, $this->mt4_data);
		if ($this->isColumnModified(AbxUsersPeer::MT4_BATCH)) $criteria->add(AbxUsersPeer::MT4_BATCH, $this->mt4_batch);
		if ($this->isColumnModified(AbxUsersPeer::COUNT_LOGIN)) $criteria->add(AbxUsersPeer::COUNT_LOGIN, $this->count_login);
		if ($this->isColumnModified(AbxUsersPeer::ADMIN_RANK)) $criteria->add(AbxUsersPeer::ADMIN_RANK, $this->admin_rank);
		if ($this->isColumnModified(AbxUsersPeer::REF)) $criteria->add(AbxUsersPeer::REF, $this->ref);
		if ($this->isColumnModified(AbxUsersPeer::PRIMARY_ACC)) $criteria->add(AbxUsersPeer::PRIMARY_ACC, $this->primary_acc);
		if ($this->isColumnModified(AbxUsersPeer::PRIMARY_ID)) $criteria->add(AbxUsersPeer::PRIMARY_ID, $this->primary_id);
		if ($this->isColumnModified(AbxUsersPeer::UPLINE1)) $criteria->add(AbxUsersPeer::UPLINE1, $this->upline1);
		if ($this->isColumnModified(AbxUsersPeer::POSITION1)) $criteria->add(AbxUsersPeer::POSITION1, $this->position1);
		if ($this->isColumnModified(AbxUsersPeer::EMAIL)) $criteria->add(AbxUsersPeer::EMAIL, $this->email);
		if ($this->isColumnModified(AbxUsersPeer::EWALLET)) $criteria->add(AbxUsersPeer::EWALLET, $this->ewallet);
		if ($this->isColumnModified(AbxUsersPeer::CWALLET)) $criteria->add(AbxUsersPeer::CWALLET, $this->cwallet);
		if ($this->isColumnModified(AbxUsersPeer::MT4WALLET)) $criteria->add(AbxUsersPeer::MT4WALLET, $this->mt4wallet);
		if ($this->isColumnModified(AbxUsersPeer::FWALLET)) $criteria->add(AbxUsersPeer::FWALLET, $this->fwallet);
		if ($this->isColumnModified(AbxUsersPeer::EPOINT)) $criteria->add(AbxUsersPeer::EPOINT, $this->epoint);
		if ($this->isColumnModified(AbxUsersPeer::ECASH)) $criteria->add(AbxUsersPeer::ECASH, $this->ecash);
		if ($this->isColumnModified(AbxUsersPeer::EWALLET_DEBT)) $criteria->add(AbxUsersPeer::EWALLET_DEBT, $this->ewallet_debt);
		if ($this->isColumnModified(AbxUsersPeer::REINVEST)) $criteria->add(AbxUsersPeer::REINVEST, $this->reinvest);
		if ($this->isColumnModified(AbxUsersPeer::SEWALLET)) $criteria->add(AbxUsersPeer::SEWALLET, $this->sewallet);
		if ($this->isColumnModified(AbxUsersPeer::SEPOINT)) $criteria->add(AbxUsersPeer::SEPOINT, $this->sepoint);
		if ($this->isColumnModified(AbxUsersPeer::EWALLET_MANDATORY)) $criteria->add(AbxUsersPeer::EWALLET_MANDATORY, $this->ewallet_mandatory);
		if ($this->isColumnModified(AbxUsersPeer::IC)) $criteria->add(AbxUsersPeer::IC, $this->ic);
		if ($this->isColumnModified(AbxUsersPeer::EEP)) $criteria->add(AbxUsersPeer::EEP, $this->eep);
		if ($this->isColumnModified(AbxUsersPeer::ENGLISH_ADDRESS)) $criteria->add(AbxUsersPeer::ENGLISH_ADDRESS, $this->english_address);
		if ($this->isColumnModified(AbxUsersPeer::ENGLISH_ADDRESS2)) $criteria->add(AbxUsersPeer::ENGLISH_ADDRESS2, $this->english_address2);
		if ($this->isColumnModified(AbxUsersPeer::NATIONALITY)) $criteria->add(AbxUsersPeer::NATIONALITY, $this->nationality);
		if ($this->isColumnModified(AbxUsersPeer::STREET1)) $criteria->add(AbxUsersPeer::STREET1, $this->street1);
		if ($this->isColumnModified(AbxUsersPeer::STREET2)) $criteria->add(AbxUsersPeer::STREET2, $this->street2);
		if ($this->isColumnModified(AbxUsersPeer::CITY)) $criteria->add(AbxUsersPeer::CITY, $this->city);
		if ($this->isColumnModified(AbxUsersPeer::ZIP)) $criteria->add(AbxUsersPeer::ZIP, $this->zip);
		if ($this->isColumnModified(AbxUsersPeer::STATE)) $criteria->add(AbxUsersPeer::STATE, $this->state);
		if ($this->isColumnModified(AbxUsersPeer::COUNTRY)) $criteria->add(AbxUsersPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(AbxUsersPeer::MOBILENO)) $criteria->add(AbxUsersPeer::MOBILENO, $this->mobileno);
		if ($this->isColumnModified(AbxUsersPeer::DOB)) $criteria->add(AbxUsersPeer::DOB, $this->dob);
		if ($this->isColumnModified(AbxUsersPeer::GENDER)) $criteria->add(AbxUsersPeer::GENDER, $this->gender);
		if ($this->isColumnModified(AbxUsersPeer::BANK_NAME)) $criteria->add(AbxUsersPeer::BANK_NAME, $this->bank_name);
		if ($this->isColumnModified(AbxUsersPeer::BANK_BRANCH_NAME)) $criteria->add(AbxUsersPeer::BANK_BRANCH_NAME, $this->bank_branch_name);
		if ($this->isColumnModified(AbxUsersPeer::BANK_PAYEE_NAME)) $criteria->add(AbxUsersPeer::BANK_PAYEE_NAME, $this->bank_payee_name);
		if ($this->isColumnModified(AbxUsersPeer::BANK_ACC_NO)) $criteria->add(AbxUsersPeer::BANK_ACC_NO, $this->bank_acc_no);
		if ($this->isColumnModified(AbxUsersPeer::BANK_SORTING_CODE)) $criteria->add(AbxUsersPeer::BANK_SORTING_CODE, $this->bank_sorting_code);
		if ($this->isColumnModified(AbxUsersPeer::BANK_IBAN)) $criteria->add(AbxUsersPeer::BANK_IBAN, $this->bank_iban);
		if ($this->isColumnModified(AbxUsersPeer::ACC_TYPE)) $criteria->add(AbxUsersPeer::ACC_TYPE, $this->acc_type);
		if ($this->isColumnModified(AbxUsersPeer::USER_ROLE)) $criteria->add(AbxUsersPeer::USER_ROLE, $this->user_role);
		if ($this->isColumnModified(AbxUsersPeer::LANGUAGE)) $criteria->add(AbxUsersPeer::LANGUAGE, $this->language);
		if ($this->isColumnModified(AbxUsersPeer::STATUS)) $criteria->add(AbxUsersPeer::STATUS, $this->status);
		if ($this->isColumnModified(AbxUsersPeer::DEBT_STATUS)) $criteria->add(AbxUsersPeer::DEBT_STATUS, $this->debt_status);
		if ($this->isColumnModified(AbxUsersPeer::DEBT_DEDUCT_PERCENT)) $criteria->add(AbxUsersPeer::DEBT_DEDUCT_PERCENT, $this->debt_deduct_percent);
		if ($this->isColumnModified(AbxUsersPeer::SUMMARY_MODE)) $criteria->add(AbxUsersPeer::SUMMARY_MODE, $this->summary_mode);
		if ($this->isColumnModified(AbxUsersPeer::GENEALOGY_LOCK)) $criteria->add(AbxUsersPeer::GENEALOGY_LOCK, $this->genealogy_lock);
		if ($this->isColumnModified(AbxUsersPeer::PROFILE_LOCK)) $criteria->add(AbxUsersPeer::PROFILE_LOCK, $this->profile_lock);
		if ($this->isColumnModified(AbxUsersPeer::LEVEL)) $criteria->add(AbxUsersPeer::LEVEL, $this->level);
		if ($this->isColumnModified(AbxUsersPeer::CDATE)) $criteria->add(AbxUsersPeer::CDATE, $this->cdate);
		if ($this->isColumnModified(AbxUsersPeer::PROFILE_UPDATED)) $criteria->add(AbxUsersPeer::PROFILE_UPDATED, $this->profile_updated);
		if ($this->isColumnModified(AbxUsersPeer::STATUS_CODE)) $criteria->add(AbxUsersPeer::STATUS_CODE, $this->status_code);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AbxUsersPeer::DATABASE_NAME);

		$criteria->add(AbxUsersPeer::ID, $this->id);

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

		$copyObj->setChineseName($this->chinese_name);

		$copyObj->setEnglishName($this->english_name);

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setEncPassword($this->enc_password);

		$copyObj->setSecPassword($this->sec_password);

		$copyObj->setEncSecPassword($this->enc_sec_password);

		$copyObj->setCustodiankey($this->custodiankey);

		$copyObj->setEncCustodiankey($this->enc_custodiankey);

		$copyObj->setCustData($this->cust_data);

		$copyObj->setMt4Data($this->mt4_data);

		$copyObj->setMt4Batch($this->mt4_batch);

		$copyObj->setCountLogin($this->count_login);

		$copyObj->setAdminRank($this->admin_rank);

		$copyObj->setRef($this->ref);

		$copyObj->setPrimaryAcc($this->primary_acc);

		$copyObj->setPrimaryId($this->primary_id);

		$copyObj->setUpline1($this->upline1);

		$copyObj->setPosition1($this->position1);

		$copyObj->setEmail($this->email);

		$copyObj->setEwallet($this->ewallet);

		$copyObj->setCwallet($this->cwallet);

		$copyObj->setMt4wallet($this->mt4wallet);

		$copyObj->setFwallet($this->fwallet);

		$copyObj->setEpoint($this->epoint);

		$copyObj->setEcash($this->ecash);

		$copyObj->setEwalletDebt($this->ewallet_debt);

		$copyObj->setReinvest($this->reinvest);

		$copyObj->setSewallet($this->sewallet);

		$copyObj->setSepoint($this->sepoint);

		$copyObj->setEwalletMandatory($this->ewallet_mandatory);

		$copyObj->setIc($this->ic);

		$copyObj->setEep($this->eep);

		$copyObj->setEnglishAddress($this->english_address);

		$copyObj->setEnglishAddress2($this->english_address2);

		$copyObj->setNationality($this->nationality);

		$copyObj->setStreet1($this->street1);

		$copyObj->setStreet2($this->street2);

		$copyObj->setCity($this->city);

		$copyObj->setZip($this->zip);

		$copyObj->setState($this->state);

		$copyObj->setCountry($this->country);

		$copyObj->setMobileno($this->mobileno);

		$copyObj->setDob($this->dob);

		$copyObj->setGender($this->gender);

		$copyObj->setBankName($this->bank_name);

		$copyObj->setBankBranchName($this->bank_branch_name);

		$copyObj->setBankPayeeName($this->bank_payee_name);

		$copyObj->setBankAccNo($this->bank_acc_no);

		$copyObj->setBankSortingCode($this->bank_sorting_code);

		$copyObj->setBankIban($this->bank_iban);

		$copyObj->setAccType($this->acc_type);

		$copyObj->setUserRole($this->user_role);

		$copyObj->setLanguage($this->language);

		$copyObj->setStatus($this->status);

		$copyObj->setDebtStatus($this->debt_status);

		$copyObj->setDebtDeductPercent($this->debt_deduct_percent);

		$copyObj->setSummaryMode($this->summary_mode);

		$copyObj->setGenealogyLock($this->genealogy_lock);

		$copyObj->setProfileLock($this->profile_lock);

		$copyObj->setLevel($this->level);

		$copyObj->setCdate($this->cdate);

		$copyObj->setProfileUpdated($this->profile_updated);

		$copyObj->setStatusCode($this->status_code);


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
			self::$peer = new AbxUsersPeer();
		}
		return self::$peer;
	}

} 