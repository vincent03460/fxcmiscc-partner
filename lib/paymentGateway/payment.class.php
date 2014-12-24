<?php
/**
 * LBN Payment Gateway Online Payment PHP Demo
 * @author langs
 * @version demo
 */

require_once("submit.class.php");
class Payment {
	
	var $config;
	
	var $Transtype = array('01'=>'Payment','31'=>'Payment Cancel');
	var $Transstatus = array('Processing', 'Success', 'Failure','Audit');
	
	function __construct($config){
		$this->config = $config;
	}
    function Payment($config) {
    	$this->__construct($config);
    }
    function getInterface($para_temp, $interface, $type)
    {
        $button_name = "Submit";
        $Submit = new Submit();
        $obj = $Submit->getMsg($para_temp, $interface, $this->config);
        if ($obj) {
            if ($obj->{'respCode'} == "00") {
                if ($type == 1) {
                    if ($obj->{'formData'}) {
                        $html_text = $Submit->buildForm($obj->{'formData'}, $obj->{'url'}, "post", $button_name, $this->config);
                        return $html_text;
                    } else {
                        $html_text = 'Malformed message';
                    }
                } elseif ($type == 3) {
                    $html_text = "Payment Types: " . $this->Transtype[$obj->lastTransType] . ", Payment Status: " . $this->Transstatus[$obj->lastStatus];
                    return $html_text;
                }
            }
            $html_text = $obj->{'respMsg'};
        } else {
            $html_text = 'request timesout';
        }
        return $html_text;
    }

}
?>