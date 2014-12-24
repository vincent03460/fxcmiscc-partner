<?php
/**
 * LBN Payment Gateway Online Payment PHP Demo
 * @author langs
 * @version demo
 */

require_once("functions.php");

class Submit {
	function buildRequestPara($para_temp,$config) {

		$para_filter = paraFilter($para_temp);

		$para_sort = argSort($para_filter);

		$mysign = buildMysign($para_sort, trim($config['key']), strtoupper(trim($config['sign_method'])));
		
		$para_sort['signature'] = $mysign;

		return $para_sort;
	}

	function buildRequestParaToString($para_temp,$config) {

		$para = $this->buildRequestPara($para_temp,$config);
		
		$request_data = createLinkstringUrlencode($para);
		
		return $request_data;
	}
	
	function buildForm($para_temp, $gateway, $method, $config) {
        $sHtml = '<form id="payment" name="payment" action="'.$gateway.'" method="'.$method.'">';
        while (list ($key, $val) = each ($para_temp)) {
            $sHtml .= '<input type="hidden" name="'.$key.'" value="'.$val.'" />';
        }
        $sHtml .= '</form>';
        $sHtml .= '<script type="text/javascript">document.getElementById(\'payment\').submit();</script>';
        return $sHtml;
	}
	
	function getMsg($para_temp, $gateway, $config) {
        $respondData = '';
        var_dump($para_temp);
        print_r("<br>");
        print_r("<br>");
        print_r("<br>");
        var_dump($gateway);
        print_r("<br>");
        print_r("<br>");
        print_r("<br>");
        var_dump($config);
        print_r("<br>");
        print_r("<br>");
        print_r("<br>");
		$para = $this->buildRequestPara($para_temp, $config);
		$ch = curl_init ($gateway);
        $header = 'application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ( $ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ( $ch, CURLOPT_POST, 1);
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query($para));
		$output = curl_exec ( $ch );

        print_r("<br>");
        print_r("<br>");
        print_r("<br>output");
        var_dump($output);
		curl_close ( $ch );
		$respondData = json_decode($output);
		return $respondData;
	}
}
?>