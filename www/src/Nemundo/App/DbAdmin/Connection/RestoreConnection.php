<?php

namespace Nemundo\App\DbAdmin\Connection;


use Nemundo\Core\Config\ConfigFileReader;
use Nemundo\Core\Config\ConfigWriter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Project\ProjectConfig;

class RestoreConnection extends MySqlConnection
{

    protected function loadConnection()
    {

        $filename = ProjectConfig::$projectPath . 'restore.ini';


        if ((new File($filename))->fileExists()) {

            $config = new ConfigFileReader();
            $config->filename = $filename;

            $this->connectionParameter->host = $config->getValue('mysql_host');
            $this->connectionParameter->port = $config->getValue('mysql_port');
            $this->connectionParameter->user = $config->getValue('mysql_user');
            $this->connectionParameter->password = $config->getValue('mysql_password');
            $this->connectionParameter->database = $config->getValue('mysql_database');

        } else {

            $config = new ConfigWriter($filename);
            $config->filename = $filename;
            $config->add('mysql_host');
            $config->add('mysql_port');
            $config->add('mysql_user');
            $config->add('mysql_password');
            $config->add('mysql_database');

            (new Debug())->write('Config File restore.ini was created');
            exit;

        }

    }

}