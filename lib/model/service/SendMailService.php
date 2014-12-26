<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class SendMailService
{
    public function testSendMail()
    {
        /* ********* */
        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');
        var_dump("0");
        $mail = new PHPMailer();
        var_dump("1");
        if (Mails::EMAIL_SMTP == true) {
            $mail->IsSMTP();
            $mail->Port = Mails::EMAIL_PORT;
            $mail->SMTPDebug = 1; // telling the class to use SMTP
            $mail->SMTPAuth = true; // telling the class to use SMTP
            $mail->SMTPSecure = "ssl"; // telling the class to use SMTP
            $mail->Username = Mails::EMAIL_SENDER;
            $mail->Password = Mails::EMAIL_PASSWORD;
        } else {
            $mail->IsMail();
            $mail->Sender = Mails::EMAIL_SENDER;
        }
        var_dump("2");

        $mail->Host = Mails::EMAIL_HOST;
        $mail->From = Mails::EMAIL_FROM;
        $mail->FromName = Mails::EMAIL_FROM_NAME;

        var_dump("3");
        $mail->Subject = "Test Send Email Globals";
        $mail->CharSet="utf-8";

        $body = "Dear tester,<p><p>

        <p>Your Testing has been successfully</p>

        <p>Thank you</p>";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress(Mails::EMAIL_TEST_MAIL, "test");
        $mail->AddBCC(Mails::EMAIL_BCC, Mails::EMAIL_BCC_NAME);

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        } else {
            var_dump("done");
        }
    }

    public function sendMemberRegisterNotification()
    {

    }

    public function sendAccountActivationNotification($distributorDB, $md4Account)
    {

    }

    public function sendEcashWithdrawalNotification()
    {

    }

    public function sendPointPurchaseNotification()
    {

    }
    public function sendMail($receiverEmail, $receiverFullName, $subject, $body, $sendFrom=Mails::EMAIL_SENDER, $bcc="")
    {
        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');
        $mail = new PHPMailer();

        if (Mails::EMAIL_SMTP == true) {
            $mail->IsSMTP();
            $mail->Port = Mails::EMAIL_PORT;
            $mail->SMTPDebug = 1; // telling the class to use SMTP
            $mail->SMTPAuth = true; // telling the class to use SMTP
            $mail->SMTPSecure = "ssl"; // telling the class to use SMTP
            $mail->Username = $sendFrom;
            $mail->Password = Mails::EMAIL_PASSWORD;
        } else {
            $mail->IsMail();
            $mail->Sender = $sendFrom;
        }

        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->From = Mails::EMAIL_FROM_NOREPLY;
        $mail->FromName = Mails::EMAIL_FROM_NOREPLY_NAME;
        //$mail->Subject = $subject;
        $mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
        $mail->CharSet="utf-8";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress($receiverEmail, $receiverFullName);

        if ($bcc != "") {
            $arrs = explode(',', $bcc);
            for ($x = 0; $x < count($arrs); $x++) {
                $mail->AddBCC($arrs[$x], "boss");
            }
        }

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }
    }
    public function sendMailViaFinance($receiverEmail, $receiverFullName, $subject, $body, $sendFrom=Mails::EMAIL_SENDER_FINANCE, $bcc="")
    {
        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');
        $mail = new PHPMailer();

        if (Mails::EMAIL_SMTP == true) {
            $mail->IsSMTP();
            $mail->Port = Mails::EMAIL_PORT;
            $mail->SMTPDebug = 1; // telling the class to use SMTP
            $mail->SMTPAuth = true; // telling the class to use SMTP
            $mail->SMTPSecure = "ssl"; // telling the class to use SMTP
            $mail->Username = $sendFrom;
            $mail->Password = Mails::EMAIL_PASSWORD_FINANCE;
        } else {
            $mail->IsMail();
            $mail->Sender = $sendFrom;
        }

        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->From = Mails::EMAIL_FROM_NOREPLY_FINANCE;
        $mail->FromName = "Finance";
        //$mail->Subject = $subject;
        $mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
        $mail->CharSet="utf-8";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress($receiverEmail, $receiverFullName);

        if ($bcc != "") {
            $arrs = explode(',', $bcc);
            for ($x = 0; $x < count($arrs); $x++) {
                $mail->AddBCC($arrs[$x], "boss");
            }
        }

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }
    }
    public function sendForgetPassword($existDistributor, $subject, $body)
    {
        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');
        $mail = new PHPMailer();

        if (Mails::EMAIL_SMTP == true) {
            $mail->IsSMTP();
            $mail->Port = Mails::EMAIL_PORT;
            $mail->SMTPDebug = 1; // telling the class to use SMTP
            $mail->SMTPAuth = true; // telling the class to use SMTP
            $mail->SMTPSecure = "ssl"; // telling the class to use SMTP
            $mail->Username = Mails::EMAIL_SENDER;
            $mail->Password = Mails::EMAIL_PASSWORD;
        } else {
            $mail->IsMail();
            $mail->Sender = Mails::EMAIL_SENDER;
        }

        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->From = Mails::EMAIL_FROM_NOREPLY;
        $mail->FromName = Mails::EMAIL_FROM_NOREPLY_NAME;
        $mail->Subject = $subject;
        $mail->CharSet="utf-8";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress($existDistributor->getEmail(), $existDistributor->getNickname());

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }
    }

    public function sendMt4UsernameAndPassword($existDistributor, $subject, $body)
    {
        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');
        $mail = new PHPMailer();

        if (Mails::EMAIL_SMTP == true) {
            $mail->IsSMTP();
            $mail->Port = Mails::EMAIL_PORT;
            $mail->SMTPDebug = 1; // telling the class to use SMTP
            $mail->SMTPAuth = true; // telling the class to use SMTP
            $mail->SMTPSecure = "ssl"; // telling the class to use SMTP
            $mail->Username = Mails::EMAIL_SENDER;
            $mail->Password = Mails::EMAIL_PASSWORD;
        } else {
            $mail->IsMail();
            $mail->Sender = Mails::EMAIL_SENDER;
        }

        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->From = Mails::EMAIL_FROM_NOREPLY;
        $mail->FromName = Mails::EMAIL_FROM_NOREPLY_NAME;
        $mail->Subject = $subject;
        $mail->CharSet="utf-8";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress($existDistributor->getEmail(), $existDistributor->getNickname());

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }
    }

    public function sendTopupNotification()
    {
        /****************************/
        /*****  Send email **********/
        /****************************/
        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');

        $subject = $this->getContext()->getI18N()->__("Tune International Group Registration email notification", null, 'email');
        $body = $this->getContext()->getI18N()->__("Dear %1%", array('%1%' => $mlm_distributor->getNickname()), 'email') . ",<p><p>

        <p>" . $this->getContext()->getI18N()->__("Your registration request has been successfully sent to Tune International Group", null, 'email') . "</p>
        <p><b>" . $this->getContext()->getI18N()->__("Shareholder ID", null) . ": " . $fcode . "</b>
        <p><b>" . $this->getContext()->getI18N()->__("Password", null) . ": " . $password . "</b>";

        $mail = new PHPMailer();
        $mail->IsMail(); // telling the class to use SMTP
        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->Sender = Mails::EMAIL_FROM_NOREPLY;
        $mail->From = Mails::EMAIL_FROM_NOREPLY;
        $mail->FromName = Mails::EMAIL_FROM_NOREPLY_NAME;
        $mail->Subject = $subject;
        $mail->CharSet = "utf-8";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress($mlm_distributor->getEmail(), $mlm_distributor->getNickname());

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }
    }
}