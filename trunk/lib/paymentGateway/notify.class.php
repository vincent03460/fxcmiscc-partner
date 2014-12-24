<?php
/**
 * LBN Payment Gateway Online Payment PHP Demo
 * @author langs
 * @version demo
 */

require_once("functions.php");

class Notify {
	
	var $config;

	function __construct($config){
		$this->config = $config;
	}
    function Notify($config) {
    	$this->__construct($config);
    }

    //backend notify
	function verifyNotify(){
		if(empty($_POST)) {//check post array not empty
			return false;
		}
		else {
			$mysign = $this->getMysign($_POST);
			if ($mysign == $_POST["accessKey"]){
				$log_text = "Backend notify message from LBN, SignString: ".$mysign."\n";
				$log_text = $log_text.createLinkString($_POST);
				logResult($log_text);
				return true;	
			}else{
				return false;
			}
		}
	}
	
	//frontend notify
	function verifyReturn(){
		if(empty($_POST)) {//check post array not empty
			return false;
		}
		else {
			$mysign = $this->getMysign($_POST);
			if ($mysign == $_POST["accessKey"]){
				$log_text = "Frontend notify message from LBN, SignString: ".$mysign."\n";
				$log_text = $log_text.createLinkString($_POST);
				logResult($log_text);
				return true;	
			}else{
				return false;
			}
		}
	}
	
	function getMysign($para_temp) {

		$para_filter = paraFilter($para_temp);
		
		$para_sort = argSort($para_filter);

		$mysign = buildMysign($para_sort, trim($this->config['key']), strtoupper(trim($this->config['sign_method'])));
		
		return $mysign;
	}
}
?>
