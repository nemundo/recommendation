<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Config\ConfigWriter;

class ConfigFileBuilder extends AbstractBase
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    public $mySqlHost = 'localhost';

    public $mySqlPort = 3306;

    public $mySqlUser;

    public $mySqlPassword;

    public $mySqlDatabase;

    public $webUrl = '/';

    public function writeFile()
    {

        $writer = new ConfigWriter($this->filename);
        $writer->filename = $this->filename;
        $writer->overwriteExistingFile = $this->overwriteExistingFile;
        $writer->add('mysql_host', $this->mySqlHost);
        $writer->add('mysql_port', $this->mySqlPort);
        $writer->add('mysql_user', $this->mySqlUser);
        $writer->add('mysql_password', $this->mySqlPassword);
        $writer->add('mysql_database', $this->mySqlDatabase);
        $writer->add('web_url', $this->webUrl);
        $writer->writeFile();

    }

}