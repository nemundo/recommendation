<?php


namespace Nemundo\App\Mail\Config;


use Nemundo\App\Mail\Connection\SmtpConnection;
use Nemundo\App\Mail\Data\MailServer\MailServerReader;
use Nemundo\App\Mail\MailConfig;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;

class MailConfigLoader extends AbstractBase
{

    public function loadConfig()
    {


        $n = 0;
        $reader = new MailServerReader();
        $reader->filter->andEqual($reader->model->active, true);
        foreach ($reader->getData() as $mailServerRow) {

            MailConfig::$mailConnection = new SmtpConnection();
            MailConfig::$mailConnection->host = $mailServerRow->host;
            MailConfig::$mailConnection->port = $mailServerRow->port;

            MailConfig::$mailConnection->authentication = $mailServerRow->authentication;
            MailConfig::$mailConnection->user = $mailServerRow->user;
            MailConfig::$mailConnection->password = $mailServerRow->password;

            MailConfig::$defaultMailFrom = $mailServerRow->mailAddress;
            MailConfig::$defaultMailFromText = $mailServerRow->mailText;

            $n++;

        }

        if ($n == 0) {
            (new LogMessage())->writeError('No Mail Config');
            exit;
        }

    }

}