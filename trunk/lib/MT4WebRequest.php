<?php
error_reporting(0);
class MT4WebRequest {
	// MetaTrader Server Address
	protected $host = '112.121.177.10';
	// MetaTrader Server Port
	protected $port = '443';

	// MetaTrader Server Connection Timeout, in sec
	protected $timeout = 5;
	// cache files directory
	protected $cache_dir = 'cache/';
	// cache expiration time, in sec
	protected $cache_time = 15;
	// limit of deleted files, after which process of cache clearing should be stopped
	protected $clear_delnumber = 15;

	// Master Password on Register Plugin
	protected $master_password = 'admin@20140822';

	// time
	protected $clear_time;
	// deleted files counter
	protected $clear_number;

	function setHost($host) {
		$this->host = $host;
		return $this;
	}

	function getHost() {
		return $this->host;
	}

	function setPort($port) {
		$this->port = $port;
		return $this;
	}

	function getPort() {
		return $this->port;
	}

	function setTimeout($timeout) {
		$this->timeout = $timeout;
		return $this;
	}

	function getTimeout() {
		return $this->timeout;
	}

	function setCacheDir($cache_dir) {
		$this->cache_dir = $cache_dir;
		return $this;
	}

	function getCacheDir() {
		return $this->cache_dir;
	}

	function setCacheTime($cache_time) {
		$this->cache_time = $cache_time;
		return $this;
	}

	function getCacheTime() {
		return $this->cache_time;
	}

	function setClearDelNumber($clear_delnumber) {
		$this->clear_delnumber = $clear_delnumber;
		return $this;
	}

	function getClearDelNumber() {
		return $this->clear_delnumber;
	}

	function setMasterPassword($master_password) {
		$this->master_password = $master_password;
		return $this;
	}

	function getMasterPassword() {
		return $this->master_password;
	}

	function AccountInfo($login, $password) {
		$login = substr($login, 0, 14);
		$password = substr($password, 0, 16);
		//---
		$result = $this->request('USERINFO-login=' . $login . '|password=' . $password);
		//---

		if(strpos($result['message'], 'Invalid') !== false || strpos($result['message'], 'Disabled') !== false) {
			$result['status'] = 'error';
		}

		if($result['status'] == 'success') {
			var_dump($result['message']);exit;
			$info = explode("\r\n", $result['message']);
			$data['account'] = isset($info[0]) ? $info[0] : '';
			$data['name'] = isset($info[1]) ? $info[1] : '';
			$data['joined'] = isset($info[2]) ? $info[2] : '';
			$data['balance'] = isset($info[3]) ? $this->ConvertParam($info[3]) : '';
			$data['equity'] = isset($info[4]) ? $this->ConvertParam($info[4]) : '';
			$data['margin'] = isset($info[5]) ? $this->ConvertParam($info[5]) : '';
			$data['free_margin'] = isset($info[6]) ? $this->ConvertParam($info[6]) : '';
			$data['margin_level'] = $data['margin'] != 0 ? number_format(100 * ($data['equity'] / $data['margin']), 2, '.', '') . '%' : '0%';

			$result['message'] = $data;
		}

		return $result;
	}

	function AccountBalance($login){
		$error = array();
		$login = substr($login, 0, 14);
		if(empty($login)) {
			$error[] = 'Login cannot empty';
		}

		if(sizeof($error)) {
			$result['status'] = 'error';
			$result['message'] = implode(', ', $error);
			return $result;
		}
		
		//--- prepare query
		$query = "CHECKBALANCE MASTER=" . $this->master_password . "|IP=$_SERVER[REMOTE_ADDR]|LOGIN=$login";
		
		//--- send request
		$result = $this->request($query);
		
		if(strpos($result['message'], 'ERROR') !== false) {
			$result['status'] = 'error';
		}

		return $result;
	}
	
	function ChangeBalance($login, $group, $balance) {
		$error = array();
		$login = substr($login, 0, 14);
		if(empty($login)) {
			$error[] = 'Login cannot empty';
		}

		if(empty($group)) {
			$error[] = 'Group cannot empty';
		}

		if(!is_numeric($balance)) {
			$error[] = 'Balance must be numeric';
		}

		if(sizeof($error)) {
			$result['status'] = 'error';
			$result['message'] = implode(', ', $error);
			return $result;
		}
		
		//--- prepare query
		$query = "CHANGEBALANCE MASTER=" . $this->master_password . "|IP=$_SERVER[REMOTE_ADDR]|LOGIN=$login|GROUP=$group|DEPOSIT=$balance";
		
		//--- send request
		$result = $this->request($query);
		
		if(strpos($result['message'], 'ERROR') !== false) {
			$result['status'] = 'error';
		}

		return $result;
	}

	function CreateAccount($data) {
		$check_result = $this->ValidateCreateAccountData($data);
		if($check_result['status'] == 'error') {
			return $check_result;
		}

		$encode = '';
		foreach(mb_list_encodings() as $val){
			if($val == 'GB18030' || $val == 'GB2312'){
				$encode = $val;
			}
		}
		
		if($encode){
			foreach($data as $key => $val){
				if(mb_detect_encoding($val, 'UTF-8') == 'UTF-8'){
					$data[$key] = mb_convert_encoding($val, $encode, 'UTF-8');
				}
			}
		}

		//--- prepare query
		$query = "NEWACCOUNT MASTER=" . $this->master_password . "|IP=$_SERVER[REMOTE_ADDR]|GROUP=$data[group]|NAME=$data[name]|" . "PASSWORD=$data[password]|INVESTOR=$data[investor]|EMAIL=$data[email]|COUNTRY=$data[country]|" . "STATE=$data[state]|CITY=$data[city]|ADDRESS=$data[address]|COMMENT=$data[comment]|" . "PHONE=$data[phone]|PHONE_PASSWORD=$data[phone_password]|STATUS=$data[status]|ZIPCODE=$data[zipcode]|" . "ID=$data[id]|LOGIN=$data[login]|LEVERAGE=$data[leverage]|AGENT=$data[agent]|SEND_REPORTS=$data[send_reports]|DEPOSIT=$data[deposit]";
		//var_dump($query);
		//--- send request
		$result = $this->request($query);
		
		if(strpos($result['message'], 'ERROR') !== false) {
			$result['status'] = 'error';
		}
		return $result;
	}

	protected function ValidateCreateAccountData($data) {
		$result = array(
			'status' => 'success',
			'message' => ''
		);
		$error = array();
		
		if(!isset($data['name']) || empty($data['name'])) {
			$error[] = 'Name cannot empty';
		}

		if(!isset($data['password']) || empty($data['password'])) {
			$error[] = 'Password cannot empty';
		} else if(!$this->ValidateCreateAccountPassword($data['password'])) {
			$error[] = 'Password must at least 5 alphanumeric';
		}
		
		if(!isset($data['email']) || empty($data['email'])) {
			$error[] = 'Email cannot empty';
		}

		if(!isset($data['country']) || empty($data['country'])) {
			$error[] = 'Country cannot empty';
		}

		if(!isset($data['state']) || empty($data['state'])) {
			$error[] = 'State cannot empty';
		}

		if(!isset($data['city']) || empty($data['city'])) {
			$error[] = 'City cannot empty';
		}

		if(!isset($data['zipcode']) || empty($data['zipcode'])) {
			$error[] = 'Zipcode cannot empty';
		}

		if(!isset($data['phone']) || empty($data['phone'])) {
			$error[] = 'Phone cannot empty';
		}
		
		if(!isset($data['group']) || empty($data['group'])) {
			$error[] = 'Group cannot empty';
		}

		if(!isset($data['leverage']) || !is_numeric($data['leverage'])) {
			$error[] = 'Leverage must be numeric';
		}
		
		if(!isset($data['deposit']) || !is_numeric($data['deposit'])) {
			$error[] = 'Deposit must be numeric';
		}

		if(isset($data['login']) && !is_int($data['login'])) {
			$error[] = 'Login must be integer';
		}

		if(sizeof($error)) {
			$result['status'] = 'error';
			$result['message'] = implode(', ', $error);
		}

		return $result;
	}

	protected function ValidateCreateAccountPassword($password) {
		$digit = 0;
		$upper = 0;
		$lower = 0;
		//---- check password size
		if(strlen($password) < 5)
			return (false);
		//---- check password
		for($i = 0; $i < strlen($password); $i++) {
			if(ctype_digit($password[$i]))
				$digit = 1;
			if(ctype_lower($password[$i]))
				$lower = 1;
			if(ctype_upper($password[$i]))
				$upper = 1;
		}
		//---- final check
		return (($digit + $upper + $lower) >= 2);
	}

	protected function request($query, $use_cache = false, $cache_prefix = '') {
		$skip = false;
		$cache_dir = $this->getCacheDir();
		$cache_time = $this->getCacheTime();
		$result = array(
			'status' => 'error',
			'message' => ''
		);

		$cache_file = $cache_dir . $cache_prefix . crc32($query);
		// cache file name
		if($use_cache) {
			//--- Is there a cache? Has its time not expired yet?
			if(file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_time) {
				$skip = true;
				$result = array(
					'status' => 'success',
					'message' => file_get_contents($cache_file)
				);
			}
		}

		if(!$skip) {
			//---- open socket
			$connection = @fsockopen($this->host, $this->port, $errno, $errstr, 5);
			//---- check connection
			if($connection) {
				//---- send request
				if(fputs($connection, "W$query\nQUIT\n") != FALSE) {
					$result['status'] = 'success';
					//---- clear default answer
					$result['message'] = '';
					//---- receive answer
					while(!feof($connection)) {
						$line = fgets($connection, 128);
						if($line == "end\r\n") {
							break;
						}
						$result['message'] .= $line;
					}
				}
				fclose($connection);
				if($use_cache && $cache_time > 0) {
					//--- If there is a prefix (login, for example), create a nonpresent directory for storing the cache
					if($cache_prefix != '' && !file_exists($cache_dir . $cache_prefix)) {
						foreach(explode('/',$cache_prefix) as $tmp) {
							if($tmp == '' || $tmp[0] == '.') {
								continue;
							}
							$cache_dir .= $tmp . '/';
							if(!file_exists($cache_dir))
								@mkdir($cache_dir);
						}
					}
					//--- save result into cache
					$fp = @fopen($cache_file, 'w');
					if($fp) {
						fputs($fp, $result['message']);
						fclose($fp);
					}
				}
			} else if($errstr) {
				$result['message'] = sprintf('%s (%s)', $errstr, $errno);
			} else {
				if($use_cache && file_exists($cache_file)) {
					touch($cache_file);
					$result['status'] = 'success';
					$result['message'] = file_get_contents($cache_file);
				} else {
					$result['message'] = 'Cannot Connect!';
				}
			}
		}

		if($use_cache) {
			if(!file_exists($cache_dir . '.clearCache') || (time() - filemtime($cache_dir . '.clearCache')) >= 3) {
				ignore_user_abort(true);
				touch($cache_dir . '.clearCache');

				$this->clear_time = time();
				$this->ClearCache(realpath($cache_dir));

				ignore_user_abort(false);
			}
		}
		//---- return answer
		return $result;
	}

	protected function ConvertParam($line) {
		if($line){
			list($tmp, $value) = explode(' ', $line);
			return $value;
		}
	}

	protected function ClearCache($dir_name) {
		if(empty($dir_name) || ($list = glob($dir_name . '/*')) === false || empty($list)) {
			return;
		}
		//---
		$size = sizeof($list);
		foreach($list as $file_name) {
			$base_name = basename($file_name);
			if($base_name[0] == '.') {
				continue;
			}

			if(is_dir($file_name)) {
				//--- go through all cache directories recursively
				$this->ClearCache($file_name);
				if($this->clear_number >= $this->getClearDelNumber()) {
					return;
				}
				// by recursion check condition for function exit
			} elseif(($this->clear_time - filemtime($file_name)) > $this->getCacheTime()) {
				//--- if the file time is expired, delete it and, if the limit of deleted files has been exceeded, exit
				@unlink($file_name);
				if(++$this->clear_number >= $this->getClearDelNumber())
					return;
				--$size;
			}
		}
		//--- delete empty directory
		$tmp = realpath($this->getCacheDir());
		if(!empty($tmp) && $size <= 0 && strlen($dir_name) > strlen($tmp) && $dir_name != $tmp) {
			@rmdir($dir_name);
		}
	}
}
?>