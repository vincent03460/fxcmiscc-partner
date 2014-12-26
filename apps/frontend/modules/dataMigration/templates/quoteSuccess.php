<?php
/*
 *Script that receives quotes data fron server and parse it to graphic form
 */

$server_name = "http://backend.fxcmiscc.com:8080";
$accaunt_login = "FX_Admin";
$accaunt_password = "wk123456";
$instruments = "EUR/USD;USD/CAD;GBP/USD";
$routeName="routeInt";

$soap = $server_name.'/proftrading/ProTrader.jws?method=lastQuote&login='.$accaunt_login.'&password='.$accaunt_password.'&instrumentNames='.$instruments.'&routeName='.$routeName;

// Get SOAP responce
$xmlresponce = get_quotes($soap);
$quotes = parse_qotes($xmlresponce);

// Create table with qouotes data
echo '<table id="quotes" style="width: 100%;">
        <thead style="text-align:left">
            <th>Instr.</th><th>Last</th><th>Open</th><th>Change</th>
        </thead>
        <tbody>';
        $i = 0;
        foreach($quotes as $row => $quote){
            echo '<tr>
                <td class="pair">'.$quote['symbol'].'</td>
                <td class="last">'.$quote['lastprice'].'</td>
                <td class="open">'.$quote['openprice'].'</td>
				<td class="change">'.$quote['netchange'].'</td>
				  </tr>';
        }

echo '  </tbody>
      </table>';

function get_quotes($url){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $string = curl_exec($ch);
    curl_close($ch);
    return $string;
}

function parse_qotes($quotes){
    // Parse XML string
    //$quotes = html_entity_decode($quotes);
    $quotes = strstr($quotes,"&lt;quote");
    //$quotes = strstr($quotes,"&lt;/quotes&gt;",true);
    $quotes = rtrim($quotes, "&lt;/quotes&gt;");

    $quotes = explode("&lt;quote ",$quotes);
    unset($quotes[0]);

    $i = 0;
    foreach($quotes as $qote){
        $qote = trim($qote);
        $qote = str_replace("/&gt;","",$qote);
        $qote = explode(" ",$qote);
        ++$i;
        foreach($qote as $param){
            $param = explode("=",$param);
            if (!empty($param[0])){
                $data[$i][$param[0]] = str_replace("&quot;","",$param[1]);
            }
        }
    }
    return $data;
}
?>