<?php

/**
 * gmailApp actions.
 *
 * @package    sf_sandbox
 * @subpackage gmailApp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class gmailAppActions extends sfActions
{
    public function executeTestRoi()
    {
        print_r("+++++ ROI Dividend +++++<br>");
        $dateUtil = new DateUtil();
        $bonusDate = date("Y-m-j")." 23:59:59";
        $c = new Criteria();
        $c->add(MlmRoiDividendPeer::STATUS_CODE, Globals::DIVIDEND_STATUS_PENDING);
        $c->add(MlmRoiDividendPeer::DIVIDEND_DATE, $bonusDate, Criteria::LESS_EQUAL);
        $mlmRoiDividendDBs = MlmRoiDividendPeer::doSelect($c);
        foreach ($mlmRoiDividendDBs as $mlmRoiDividend) {
            $distId = $mlmRoiDividend->getDistId();
            $packagePrice = $mlmRoiDividend->getPackagePrice();
            $dividendDate = $mlmRoiDividend->getDividendDate();

            $dividendDateStr = $dateUtil->formatDate("Y-m-j", $dividendDate);
            $dividendDateFrom = $dividendDateStr . " 00:00:00";
            $dividendDateTo = $dividendDateStr . " 23:59:59";

            $dividendDateFromTS = strtotime($dividendDateFrom);
            $dividendDateToTS = strtotime($dividendDateTo);

            $query = "SELECT mt4_credit, credit_id FROM mlm_daily_dist_mt4_credit WHERE 1=1 "
                 . " AND dist_id = '" . $distId . "'"
                 . " AND traded_datetime >= '" . date("Y-m-d H:i:s", $dividendDateFromTS) . "' AND traded_datetime <= '" . date("Y-m-d H:i:s", $dividendDateToTS) . "'";

            //var_dump($query);
            //exit();
            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            if ($resultset->next()) {
                $arr = $resultset->getRow();
                if ($packagePrice > $arr["mt4_credit"]) {
                    $packagePrice = $arr["mt4_credit"];
                }
            //    print_r($arr["mt4_credit"]."<br>");
            //    print_r($arr["credit_id"]."<br>");
            //$c = new Criteria();
            //$c->add(MlmDailyDistMt4CreditPeer::DIST_ID, $distId);
            //$c->add(MlmDailyDistMt4CreditPeer::TRADED_DATETIME, date("Y-m-d H:i:s", $dividendDateFromTS), Criteria::GREATER_EQUAL);
            //$c->add(MlmDailyDistMt4CreditPeer::TRADED_DATETIME, date("Y-m-d H:i:s", $dividendDateToTS), Criteria::LESS_EQUAL);
            //$mlmDailyDistMt4CreditDB = MlmDailyDistMt4CreditPeer::doSelect($c);

            //if ($mlmDailyDistMt4CreditDB) {
                //if ($packagePrice > $mlmDailyDistMt4CreditDB->getMt4Credit()) {
                //    $packagePrice = $mlmDailyDistMt4CreditDB->getMt4Credit();
                //}
                $dividendAmount = $packagePrice * $mlmRoiDividend->getRoiPercentage() / 100;

                $accountBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_ECASH);

                $mlm_account_ledger = new MlmAccountLedger();
                $mlm_account_ledger->setDistId($distId);
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT);
                $mlm_account_ledger->setRemark($mlmRoiDividend->getRoiPercentage()."%, Fund:".$packagePrice);
                $mlm_account_ledger->setCredit($dividendAmount);
                $mlm_account_ledger->setDebit(0);
                $mlm_account_ledger->setBalance($accountBalance + $dividendAmount);
                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->save();

                $fundManagementBalance = $this->getCommissionBalance($distId, Globals::COMMISSION_TYPE_FUND_MANAGEMENT);

                $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                $sponsorDistCommissionledger->setMonthTraded(date('m'));
                $sponsorDistCommissionledger->setYearTraded(date('Y'));
                $sponsorDistCommissionledger->setDistId($distId);
                $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_FUND_MANAGEMENT);
                $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_DIVIDEND);
                //$sponsorDistCommissionledger->setRefId($mlm_pip_csv->getPipId());
                $sponsorDistCommissionledger->setCredit($dividendAmount);
                $sponsorDistCommissionledger->setDebit(0);
                $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                $sponsorDistCommissionledger->setBalance($fundManagementBalance + $dividendAmount);
                $sponsorDistCommissionledger->setRemark($mlmRoiDividend->getRoiPercentage()."%, Fund:".$packagePrice);
                $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $sponsorDistCommissionledger->save();

                $this->revalidateCommission($distId, Globals::COMMISSION_TYPE_FUND_MANAGEMENT);

                $mlmRoiDividend->setAccountLedgerId($mlm_account_ledger->getAccountId());
                $mlmRoiDividend->setDividendAmount($dividendAmount);
                $mlmRoiDividend->setStatusCode(Globals::DIVIDEND_STATUS_SUCCESS);
                //$mlm_gold_dividend->setRemarks($this->getRequestParameter('remarks'));
                $mlmRoiDividend->save();

                if ($mlmRoiDividend->getIdx() <= Globals::DIVIDEND_TIMES_ENTITLEMENT) {
                    print_r("DividendDate: " . $mlmRoiDividend->getDividendDate() . "<br>");
                    print_r("Idx: " . $mlmRoiDividend->getIdx() . "<br>");
                    //$currentDate2 = $dateUtil->formatDate("Y-m-d", $mlmRoiDividend->getDividendDate()) . " 00:00:00";
                    //$dividendDate = $dateUtil->addDate($currentDate2, 7, 0, 0);
                    $idx = $mlmRoiDividend->getIdx();
                    $firstDividendTime = strtotime($mlmRoiDividend->getFirstDividendDate());
                    $dividendDate = strtotime("+".$idx." months", $firstDividendTime);
                    print_r("DividendDate: " . $dividendDate . "<br>");

                    $mlm_roi_dividend = new MlmRoiDividend();
                    $mlm_roi_dividend->setDistId($mlmRoiDividend->getDistId());
                    $mlm_roi_dividend->setMt4UserName($mlmRoiDividend->getMt4UserName());
                    $mlm_roi_dividend->setIdx($idx + 1);
                    //$mlm_roi_dividend->setAccountLedgerId($this->getRequestParameter('account_ledger_id'));
                    $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                    $mlm_roi_dividend->setFirstDividendDate($mlmRoiDividend->getFirstDividendDate());
                    $mlm_roi_dividend->setPackageId($mlmRoiDividend->getPackageId());
                    $mlm_roi_dividend->setPackagePrice($mlmRoiDividend->getPackagePrice());
                    $mlm_roi_dividend->setRoiPercentage($mlmRoiDividend->getRoiPercentage());
                    //$mlm_roi_dividend->setDevidendAmount($this->getRequestParameter('devidend_amount'));
                    //$mlm_roi_dividend->setRemarks($this->getRequestParameter('remarks'));
                    $mlm_roi_dividend->setStatusCode(Globals::DIVIDEND_STATUS_PENDING);
                    $mlm_roi_dividend->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_roi_dividend->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_roi_dividend->save();
                }

                $this->revalidateAccount($distId, Globals::ACCOUNT_TYPE_ECASH);
            }
        }
        print_r("Done<br>");
        // roi dividend end~
        return sfView::HEADER_ONLY;
    }
    public function executeIndex()
    {
        $date = "06/10/2011 14:28"; // 6 october 2011 2:28 pm
        $otherDate = "06-10-2011 14:28"; // 6 october 2011 2:28 pm
        $otherDate = "06-10-2011"; // 6 october 2011 2:28 pm

        echo $stamp = strtotime($date) . "<br />"; // outputs 1307708880
        echo $otherStamp = strtotime($otherDate) . "<br />"; // outputs 1317904080

        echo date("d-m", $stamp); // outputs 10-06
        echo date("d-m-Y", $otherStamp); // outputs 06-10

        //1307716080
        //1317911280
        //10-06
        //06-10
        return sfView::HEADER_ONLY;
    }

    public function executeRetrieveGmailMailAttachment()
    {
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'finance@fxcmiscc.com';
        $password = 'SIXSTARtemp';

        var_dump("start reading email");
        /* try to connect */
        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());
        /* grab emails */
        $emails = imap_search($inbox, 'UNSEEN');
        /* if emails are returned, cycle through each... */
        if ($emails) {

            /* begin output var */
            $remarks = '';

            /* put the newest emails on top */
            rsort($emails);

            /* for every email... */
            foreach ($emails as $email_number) {
                /* get information specific to this email */
                $overview = imap_fetch_overview($inbox, $email_number, 0);
                $message = imap_fetchbody($inbox, $email_number, 2);
                $structure = imap_fetchstructure($inbox, $email_number);

                //pre($overview);
                $remarks .= 'subject:' . $overview[0]->subject;
                $remarks .= ', from:' . $overview[0]->from;
                $remarks .= ', date:' . $overview[0]->date;

                $emailSubject = $overview[0]->subject;

                $timeStamp = strtotime($emailSubject); //"06-10-2011 14:28" or "06/10/2011 14:28"

                $tradedDate = date("d-m-Y", $timeStamp); // outputs 06-10
                $attachments = array();
                if (isset($structure->parts) && count($structure->parts)) {
                    for ($i = 0; $i < count($structure->parts); $i++) {
                        $attachments[$i] = array(
                            'is_attachment' => false,
                            'filename' => '',
                            'name' => '',
                            'attachment' => '');

                        if ($structure->parts[$i]->ifdparameters) {
                            foreach ($structure->parts[$i]->dparameters as $object) {
                                if (strtolower($object->attribute) == 'filename') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['filename'] = $object->value;
                                }
                            }
                        }

                        if ($structure->parts[$i]->ifparameters) {
                            foreach ($structure->parts[$i]->parameters as $object) {
                                if (strtolower($object->attribute) == 'name') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['name'] = $object->value;
                                }
                            }
                        }

                        if ($attachments[$i]['is_attachment']) {
                            $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i + 1);
                            if ($structure->parts[$i]->encoding == 3) { // 3 = BASE64
                                $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                            }
                            elseif ($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                                $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                            }
                        }
                    } // for($i = 0; $i < count($structure->parts); $i++)
                } // if(isset($structure->parts) && count($structure->parts))

                if (count($attachments) != 0) {
                    foreach ($attachments as $at) {
                        if ($at[is_attachment] == 1) {
                            $pos = strrpos($at[filename], "csv");
                            if ($pos === false) { // note: three equal signs
                                // not found...
                            } else {
                                $fileName = date("YmdGis") . "_" . $at[filename];
                                file_put_contents(sfConfig::get('sf_upload_dir') . '/daily_pips/' . $fileName, $at[attachment]);

                                $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'daily_pips' . DIRECTORY_SEPARATOR . $fileName;
                                $file_handle = fopen($physicalDirectory, "rb");

                                $mlmDailyPipsFile = new MlmDailyPipsFile();
                                $mlmDailyPipsFile->setFileType("PIPS");
                                $mlmDailyPipsFile->setFileSrc($physicalDirectory);
                                $mlmDailyPipsFile->setFileName($fileName);
                                $mlmDailyPipsFile->setContentType("application/csv");
                                $mlmDailyPipsFile->setStatusCode(Globals::STATUS_ACTIVE);
                                $mlmDailyPipsFile->setRemarks($remarks);
                                $mlmDailyPipsFile->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                $mlmDailyPipsFile->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                $mlmDailyPipsFile->save();

                                while (!feof($file_handle)) {
                                    $line_of_text = fgets($file_handle);
                                    $parts = explode('=', $line_of_text);
                                    //print_r($line_of_text);
                                    $string = $parts[0] . $parts[1];
                                    $arr = explode(';', $string);

                                    $status = Globals::STATUS_PIPS_CSV_ACTIVE;
                                    $remarks = "";

                                    $mlm_pip_csv = new MlmDailyPipsCsv();
                                    $mlm_pip_csv->setFileId($mlmDailyPipsFile->getFileId());
                                    $mlm_pip_csv->setPipsString($string);

                                    if (count($arr) == 12) {
                                        if (is_numeric($arr[0])) {
                                            $idx = 0;
                                            $mlm_pip_csv->setTradedDatetime($tradedDate);
                                            $mlm_pip_csv->setLoginId($arr[$idx++]);
                                            $mlm_pip_csv->setLoginName($arr[$idx++]);
                                            $mlm_pip_csv->setBalance($arr[$idx++]);
                                            $mlm_pip_csv->setCredit($arr[$idx++]);
                                            $mlm_pip_csv->setCommissions($arr[$idx++]);
                                            $mlm_pip_csv->setTaxes($arr[$idx++]);
                                            $mlm_pip_csv->setStorage($arr[$idx++]);
                                            $mlm_pip_csv->setProfit($arr[$idx++]);
                                            $mlm_pip_csv->setInterest($arr[$idx++]);
                                            $mlm_pip_csv->setTax($arr[$idx++]);
                                            $mlm_pip_csv->setUnrealizedpl($arr[$idx++]);
                                            $mlm_pip_csv->setEquity($arr[$idx++]);
                                            $mlm_pip_csv->setStatusCode($status);
                                            $mlm_pip_csv->setRemarks($remarks);
                                            $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                            $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                            $mlm_pip_csv->save();
                                            /* ++++++++++++++++++++++++++++++++++++++++++++++
                                           *      Calculate Pips
                                           * +++++++++++++++++++++++++++++++++++++++++++++++*/
                                            //$totalVolume = $mlm_pip_csv->getVolume();
                                            $mt4Id = $mlm_pip_csv->getLoginId();

                                            $c = new Criteria();
                                            $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Id);
                                            $mlm_dist_mt4 = MlmDistMt4Peer::doSelectOne($c);

                                            if ($mlm_dist_mt4) {
                                                $mlmDailyDistMt4Credit = new MlmDailyDistMt4Credit();
                                                $mlmDailyDistMt4Credit->setDistId($mlm_dist_mt4->getDistId());
                                                $mlmDailyDistMt4Credit->setMt4UserName($mlm_dist_mt4->getMt4UserName());
                                                $mlmDailyDistMt4Credit->setMt4Credit($mlm_pip_csv->getBalance());
                                                $mlmDailyDistMt4Credit->setTradedDatetime($tradedDate);
                                                $mlmDailyDistMt4Credit->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $mlmDailyDistMt4Credit->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $mlmDailyDistMt4Credit->save();
                                            } else {
                                                $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_ERROR);
                                                $mlm_pip_csv->setRemarks("Invalid MT4 ID");
                                                $mlm_pip_csv->save();
                                            }
                                            /* ++++++++++++++++++++++++++++++++++++++++++++++
                                           *      ~ END Calculate Pips ~
                                           * +++++++++++++++++++++++++++++++++++++++++++++++*/
                                        } else {
                                            $status = Globals::STATUS_PIPS_CSV_ERROR;
                                            $remarks = "FIRST ELEMENT NOT NUMERIC";

                                            $mlm_pip_csv->setStatusCode($status);
                                            $mlm_pip_csv->setRemarks($remarks);
                                            $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                            $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                            $mlm_pip_csv->save();
                                        }
                                    } else {
                                        $status = Globals::STATUS_PIPS_CSV_ERROR;
                                        $remarks = "ARRAY NOT EQUAL TO 12";

                                        $mlm_pip_csv->setStatusCode($status);
                                        $mlm_pip_csv->setRemarks($remarks);
                                        $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                        $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                        $mlm_pip_csv->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }
            //echo $output;
        }

        /* close the connection */
        imap_close($inbox);
        return sfView::HEADER_ONLY;
    }

    public function executeTestRetrieveGmailMailAttachment()
    {
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'finance@fxcmiscc.com';
        $password = 'SIXSTARtemp';

        var_dump("start reading email");
        /* try to connect */
        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());
        /* grab emails */
        $emails = imap_search($inbox, 'UNSEEN');
        /* if emails are returned, cycle through each... */
        if ($emails) {

            /* begin output var */
            $output = '';

            /* put the newest emails on top */
            rsort($emails);

            /* for every email... */
            foreach ($emails as $email_number) {
                /* get information specific to this email */
                $overview = imap_fetch_overview($inbox, $email_number, 0);
                $message = imap_fetchbody($inbox, $email_number, 2);
                $structure = imap_fetchstructure($inbox, $email_number);

                //pre($overview);

                $attachments = array();
                if (isset($structure->parts) && count($structure->parts)) {
                    for ($i = 0; $i < count($structure->parts); $i++) {
                        $attachments[$i] = array(
                            'is_attachment' => false,
                            'filename' => '',
                            'name' => '',
                            'attachment' => '');

                        if ($structure->parts[$i]->ifdparameters) {
                            foreach ($structure->parts[$i]->dparameters as $object) {
                                if (strtolower($object->attribute) == 'filename') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['filename'] = $object->value;
                                }
                            }
                        }

                        if ($structure->parts[$i]->ifparameters) {
                            foreach ($structure->parts[$i]->parameters as $object) {
                                if (strtolower($object->attribute) == 'name') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['name'] = $object->value;
                                }
                            }
                        }

                        if ($attachments[$i]['is_attachment']) {
                            $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i + 1);
                            if ($structure->parts[$i]->encoding == 3) { // 3 = BASE64
                                $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                            }
                            elseif ($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                                $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                            }
                        }
                    } // for($i = 0; $i < count($structure->parts); $i++)
                } // if(isset($structure->parts) && count($structure->parts))

                if (count($attachments) != 0) {
                    foreach ($attachments as $at) {
                        if ($at[is_attachment] == 1) {
                            $pos = strrpos($at[filename], "csv");
                            if ($pos === false) { // note: three equal signs
                                // not found...
                            } else {
                                $fileName = date("YmdGis") . "_" . $at[filename];
                                file_put_contents(sfConfig::get('sf_upload_dir') . '/daily_pips/' . $fileName, $at[attachment]);

                                $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'daily_pips' . DIRECTORY_SEPARATOR . $fileName;
                                $file_handle = fopen($physicalDirectory, "rb");
                                while (!feof($file_handle)) {
                                    $line_of_text = fgets($file_handle);
                                    $parts = explode('=', $line_of_text);
                                    //print_r($line_of_text);

                                }
                            }
                        }
                    }
                }
            }
            //echo $output;
        }

        /* close the connection */
        imap_close($inbox);
    }

    public function executeTestRetrieveGmailMail()
    {
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'finance@fxcmiscc.com';
        $password = 'SIXSTARtemp';

        var_dump("start reading email");
        /* try to connect */
        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());
        /* grab emails */
        $emails = imap_search($inbox, 'UNSEEN');
        /* if emails are returned, cycle through each... */
        if ($emails) {

            /* begin output var */
            $output = '';

            /* put the newest emails on top */
            rsort($emails);

            /* for every email... */
            foreach ($emails as $email_number) {

                /* get information specific to this email */
                $overview = imap_fetch_overview($inbox, $email_number, 0);
                $message = imap_fetchbody($inbox, $email_number, 2);
                //var_dump($message);
                //$message = imap_fetchtext($inbox, $email_number, 2);
                //var_dump($message);
                //set the message format to UTF-8
                $message = imap_utf8($message);
                //var_dump($message);
                //strip existing HTML tags to display text content only.(JUST COMMENT IT IF YOU WANT TO DISPLAY IT IN AN HTML FORMAT)
                $message = strip_tags($message);
                //var_dump($message);

                //add break in each line of the image.
                //$message = nl2br($message);
                //var_dump($message);
                /* output the email header information */
                $output .= '<div class="toggler ' . ($overview[0]->seen ? 'read' : 'unread') . '">';
                $output .= '<span class="subject">' . $overview[0]->subject . '</span> ';
                $output .= '<span class="from">' . $overview[0]->from . '</span>';
                $output .= '<span class="date">on ' . $overview[0]->date . '</span>';
                $output .= '</div>';

                /* output the email body */
                $output .= '<div class="body">' . $message . '</div>';

                echo imap_qprint(imap_body($inbox, $email_number));
                break;
            }

            echo $output;
        }

        /* close the connection */
        imap_close($inbox);
    }
}
