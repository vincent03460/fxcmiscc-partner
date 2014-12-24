<?php


abstract class Mails {
    /*******************************/
    /*****    Email  ******/
    /*******************************/
    const EMAIL_SMTP = true;
    const EMAIL_SMTP_SECURE = "ssl";
    const EMAIL_PORT = 465;
    const EMAIL_HOST = "smtp.gmail.com";

    const EMAIL_FROM = "support@fxcmiscc.com";
    const EMAIL_FROM_NOREPLY = "support@fxcmiscc.com";
    const EMAIL_SENDER = "support@fxcmiscc.com";
    const EMAIL_PASSWORD = "fxcmisccinfo";

    const EMAIL_FROM_NAME = "fxcmiscc";
    const EMAIL_FROM_NOREPLY_NAME = "FXCMISCC Account";
    const EMAIL_SENDER_INFO = "support@fxcmiscc.com";
    const EMAIL_TEST_MAIL = "r9projecthost@gmail.com";
    const EMAIL_BCC = "r9projecthost@gmail.com";
    const EMAIL_BCC_NAME = "r9projecthost";

    const EMAIL_FROM_FINANCE = "finance@fxcmiscc.com";
    const EMAIL_FROM_NOREPLY_FINANCE = "finance@fxcmiscc.com";
    const EMAIL_SENDER_FINANCE = "finance@fxcmiscc.com";
    const EMAIL_PASSWORD_FINANCE = "fxcmisccinfo123";
}