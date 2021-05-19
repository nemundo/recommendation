<?php

namespace Nemundo\App\Mail;

use Nemundo\App\Mail\Connection\SmtpConnection;

class MailConfig
{

    /**
     * @var SmtpConnection
     */
    public static $mailConnection;

    /**
     * @var string
     */
    public static $defaultMailFrom;

    /**
     * @var string
     */
    public static $defaultMailFromText;

}
