<?php

/**
 * paymentGateway actions.
 *
 * @package    sf_sandbox
 * @subpackage paymentGateway
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class paymentGatewayActions extends sfActions
{
    /**
     * Executes index action
     *
     */
    public function executeNotify()
    {
        require_once("config.php");
        require_once("/paymentGateway/notify.class.php");
        //verify notify
        $Notify = new Notify($config);
        $verify_result = $Notify->verifyNotify();

        if($verify_result) {//verify succeed

            if($_POST["respCode"] != "00") {
                echo $_POST["respMsg"]; exit;
            } elseif ($_POST['status'] == '1') {
                //payment excuted succeed
                //place ur code here
            }elseif($_POST['status'] == '0'){
                //payment processing
                //place ur code here
            }elseif($_POST['status'] == '2'){
                //payment failure
                //place ur code here
            }else{
                echo $_POST["respMsg"]; exit;
            }
        }
        else {
            //signature failure
            //place ur code here
            echo "signature failure";
        }

    }
    public function executeReturn()
    {
        require_once("config.php");
        require_once("/paymentGateway/notify.class.php");

        $Notify = new Notify($config);
        $verify_result = $Notify->verifyReturn();
        if($verify_result) {//verify succeed
            if($_POST["respCode"] != "00") {
                $msg = $_POST["respMsg"];
            } elseif ($_POST['status'] == '1') {
                //payment succeed
                //place ur code here
                $msg = '支付成功';
            }elseif($_POST['status'] == '0'){
                //payment processing
                //place ur code here
                $msg = '支付处理中';
            }elseif($_POST['status'] == '2'){
                //payment failure
                //place ur code here
                $msg = '支付失败';
            }else{
                $msg = $_POST["respMsg"];
            }
        }else {
            //signature failure
            //place ur code here
            $msg =  "验签失败";
        }
        $this->setTemplate("return");
    }
    public function executeIndex()
    {
        require_once("config.php");

        $this->setTemplate("purchase");
    }

    public function executeOrder()
    {
        require_once("config.php");

        //var_dump($_POST['Order']);
        //exit();
        if (isset($_POST['Order'])) {
            $order = $_POST['Order'];
            $parameter = array(
                "orderNumber" => md5(uniqid()), //generate order id, must be unqiue.
                "orderAmount" => trim($order['orderAmount']),
                'orderCurrency' => $config['mer_currency'],
                'commodityName' => trim($order['commodityName']),
                'commodityUrl' => trim($order['commodityUrl']),
                'commodityUnitPrice' => trim($order['commodityUnitPrice']),
                'commodityQuantity' => trim($order['commodityQuantity']),
                'transferFee' => trim($order['transferFee']),
                'commodityDiscount' => trim($order['commodityDiscount']),
                'customerName' => trim($order['customer_name']),
                'cutomerCardNumber' => trim($order['cutomerCardNumber']),
            );

            $this->parameter = $parameter;
            //$content = realpath('views/payform.php');

            //defined layout
            //$layout = realpath('views/layouts/2columns.php');
            //include output template
            //include_once 'views/layouts/main.php';
            $this->setTemplate("main");
        }
    }

    public function executePayment()
    {

        require_once("config.php");
        require_once("/paymentGateway/submit.class.php");

        //var_dump($this->getCustormerIpaddress());
        //var_dump($config['version']);
        var_dump($_POST['Order']);
        var_dump($_POST['bank_type']);
        if (isset($_POST['Order'])) {
            $order = $_POST['Order'];
            if (isset($_POST['bank_type'])) {
                var_dump($_POST['bank_type']);
                //exit();
                $parameter = array(
                    "version" => trim($config['version']),
                    "charset" => trim($config['charset']),
                    "signMethod" => 'MD5',
                    "transType" => trim($config['trans_type']),
                    "merId" => trim($config['mer_id']),
                    "merCode" => trim($config['mer_code']),
                    "backEndUrl" => trim($config['benotify']),
                    "frontEndUrl" => trim($config['ftnotify']),
                    'orderTime' => date('Y-m-d H:i:s', time()),
                    'orderNumber' => trim($order['orderNumber']), //genebackEndUrlrate order id, must be unqiue.
                    'commodityName' => trim($order['commodityName']),
                    'commodityUrl' => trim($order['commodityUrl']),
                    'commodityUnitPrice' => trim($order['commodityUnitPrice']),
                    'commodityQuantity' => trim($order['commodityQuantity']),
                    'transferFee' => trim($order['transferFee']),
                    'commodityDiscount' => trim($order['commodityDiscount']),
                    'orderAmount' => trim($order['orderAmount']),
                    'orderCurrency' => trim($config['mer_currency_code']),
                    'customerName' => trim($order['customerName']),
                    'cutomerCardNumber' => trim($order['cutomerCardNumber']),
                    'bankNumber' => $_POST['bank_type'],
                    'transTimeout' => trim($config['trans_timeout']),
                    'customerIp' => $this->getCustormerIpaddress(),
                    'origQid' => '',
                    'merReserved' => ''
                );
                var_dump("=====================parameter");
                var_dump($parameter);
                //print_r(parameter);
                print_r("<br>");
                print_r("<br>");

                $Submit = new Submit();
                $result = $Submit->getMsg($parameter, $config['purchase'], $config);
                var_dump("=====================result");
                //var_dump($result);
                //exit();
                if ($result) {
                    if ($result->{'respCode'} == "00") { //no error;
                        if ($result->{'formData'}) {
                            $params = $Submit->buildForm($result->{'formData'}, $result->{'url'}, "post", $config);
                            echo $params;
                            exit;
                        } else {
                            $content = 'Malformed message';
                        }
                    } else {
                        $content = $result->{'respMsg'};
                    }
                } else {
                    $content = 'request timesout';
                }

                $this->result = $result;

                print_r("<br>Done");
                return sfView::HEADER_ONLY;
            } else {
                $this->parameter = $parameter;
                $this->setTemplate("bankList");
            }
            //$content = realpath(ROOT . 'views' . DIRECTORY_SEPARATOR . 'banklist.php');
            //defined layout
            //$layout = realpath(ROOT . 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . '2columns_2.php');
            //include output template
            //include_once realpath(ROOT . 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php');
        }
    }

    function getCustormerIpaddress()
    {
        if (isset ($_SERVER)) {
            if (isset ($_SERVER ['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER ['HTTP_X_FORWARDED_FOR']);

                foreach ($arr as $ip) {
                    $ip = trim($ip);

                    if ($ip != 'unknown') {
                        $realip = $ip;

                        break;
                    }
                }
            } elseif (isset ($_SERVER ['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER ['HTTP_CLIENT_IP'];
            } else {
                if (isset ($_SERVER ['REMOTE_ADDR'])) {
                    $realip = $_SERVER ['REMOTE_ADDR'];
                } else {
                    $realip = '0.0.0.0';
                }
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }

        preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
        $realip = !empty ($onlineip [0]) ? $onlineip [0] : '0.0.0.0';
        return $realip;
    }
}
