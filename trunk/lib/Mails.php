<?php


abstract class Mails {
    /*******************************/
    /*****    Email  ******/
    /*******************************/
    const EMAIL_SMTP = true;
    const EMAIL_SMTP_SECURE = "ssl";
    const EMAIL_PORT = 465;
    const EMAIL_HOST = "smtp.gmail.com";

    const EMAIL_FROM = "support@fxcmisc.com";
    const EMAIL_FROM_NOREPLY = "support@fxcmisc.com";
    const EMAIL_SENDER = "support@fxcmisc.com";
    const EMAIL_PASSWORD = "fxcmiscsupport";

    const EMAIL_FROM_NAME = "fxcmisc";
    const EMAIL_FROM_NOREPLY_NAME = "FXCMISC Account";
    const EMAIL_SENDER_INFO = "support@fxcmisc.com";
    const EMAIL_TEST_MAIL = "r9projecthost@gmail.com";
    const EMAIL_BCC = "r9projecthost@gmail.com";
    const EMAIL_BCC_NAME = "r9projecthost";

    const EMAIL_FROM_FINANCE = "finance@fxcmisc.com";
    const EMAIL_FROM_NOREPLY_FINANCE = "finance@fxcmisc.com";
    const EMAIL_SENDER_FINANCE = "finance@fxcmisc.com";
    const EMAIL_PASSWORD_FINANCE = "fxcmiscinfo123";
}