<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Config\ConfigWriter;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Number\YesNo;

class ProjectConfigBuilder extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    public $mysqlHost = 'localhost';

    public $mysqlPort = 3306;

    public $mysqlUser = 'root';

    public $mysqlPassword;

    public $mysqlDatabase;

    public $webUrl = '/';

    /*
    public $smtpAuthentication = true;

    public $smtpHost;

    public $smtpPort;

    public $smtpUser = '';

    public $smtpPassword;

    public $defaultMailAddress;

    public $defaultMailText;*/


    public function writeConfigFile()
    {

        $file = new File($this->filename);

        if (!$file->fileExists()) {

            $writer = new ConfigWriter($this->filename);
            $writer->overwriteExistingFile = true;
            $writer->add('mysql_host', $this->mysqlHost);
            $writer->add('mysql_port', $this->mysqlPort);
            $writer->add('mysql_user', $this->mysqlUser);
            $writer->add('mysql_password', $this->mysqlPassword);
            $writer->add('mysql_database', $this->mysqlDatabase);
            $writer->add('web_url', $this->webUrl);
           /* $writer->add('smtp_host', $this->smtpHost);
            $writer->add('smtp_port', $this->smtpPort);
            $writer->add('smtp_authentication', (new YesNo($this->smtpAuthentication))->getText());
            $writer->add('smtp_user', $this->smtpUser);
            $writer->add('smtp_password', $this->smtpPassword);
            $writer->add('default_mail_address', $this->defaultMailAddress);
            $writer->add('default_mail_text', $this->defaultMailText);*/
            $writer->writeFile();

        }

    }

}