<?php
/**
 * LBN Payment Gateway Online Payment PHP Demo
 * @author langs
 * @version demo
 */

function buildMysign($sort_para, $key, $sign_type = "MD5") {
	$prestr = createLinkstring ( $sort_para );
    $prestr = $prestr .'&'. $key;
	$mysgin = sign ( $prestr, $sign_type );//exnotify.phpit;
	return $mysgin;
}

function createLinkstring($para) {
	$arg = "";
	while ( list ( $key, $val ) = each ( $para ) ) {
        if ($key == "accessKey" || $key == "merchantCardNumber")
            continue;
        else
		$arg .= $key . "=" . $val . "&";
	}

	$arg = substr ( $arg, 0, count ( $arg ) - 2 );
	
	if (get_magic_quotes_gpc ()) {
		$arg = stripslashes ( $arg );
	}
	
	return $arg;
}

function createLinkstringUrlencode($para) {
	$arg = "";
	while ( list ( $key, $val ) = each ( $para ) ) {
		$arg .= $key . "=" . urlencode ( $val ) . "&";
	}
	$arg = substr ( $arg, 0, count ( $arg ) - 2 );
	
	if (get_magic_quotes_gpc ()) {
		$arg = stripslashes ( $arg );
	}
	
	return $arg;
}

function paraFilter($para) {
	$para_filter = array ();
	while ( list ( $key, $val ) = each ( $para ) ) {
		if ($key == "accessKey")
			continue;
		else
			$para_filter [$key] = $para [$key];
	}
	return $para_filter;
}

function argSort($para) {
	ksort ( $para );
	reset ( $para );
	return $para;
}

function sign($prestr, $sign_type = 'MD5') {
	$sign = '';
	$sign = hash($sign_type, $prestr);
	return $sign;
}
 
function logResult($word = '') {
	$fp = fopen ( "log.txt", "a" );
	flock ( $fp, LOCK_EX );
	fwrite ( $fp, "excuted date: " . strftime ( "%Y-%m-%d %H:%M:%S", time () ) . "\n" . $word . "\n" );
	flock ( $fp, LOCK_UN );
	fclose ( $fp );
}

?>