<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Config\ConfigFileReader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Dev\Deployment\DeploymentConfig;
use Nemundo\Web\WebConfig;

class ProjectConfigReader extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var ConfigFileReader
     */
    private static $configReader;


    public function readFile()
    {

        $file = new File($this->filename);

        if ($file->fileExists()) {

            if (ProjectConfigReader::$configReader == null) {
                ProjectConfigReader::$configReader = new ConfigFileReader();
                ProjectConfigReader::$configReader->filename = $this->filename;
            }

            DbConfig::$defaultConnection = new MySqlConnection();
            DbConfig::$defaultConnection->connectionParameter->host = ProjectConfigReader::$configReader->getValue('mysql_host');
            DbConfig::$defaultConnection->connectionParameter->port = ProjectConfigReader::$configReader->getValue('mysql_port');
            DbConfig::$defaultConnection->connectionParameter->user = ProjectConfigReader::$configReader->getValue('mysql_user');
            DbConfig::$defaultConnection->connectionParameter->password = ProjectConfigReader::$configReader->getValue('mysql_password');
            DbConfig::$defaultConnection->connectionParameter->database = ProjectConfigReader::$configReader->getValue('mysql_database');

            WebConfig::$webUrl = ProjectConfigReader::$configReader->getValue('web_url');

            /*
            MailConfig::$mailConnection = new SmtpConnection();
            MailConfig::$mailConnection->host = ProjectConfigReader::$configReader->getValue('smtp_host');
            MailConfig::$mailConnection->authentication = ProjectConfigReader::$configReader->getValue('smtp_authentication');
            MailConfig::$mailConnection->user = ProjectConfigReader::$configReader->getValue('smtp_user');
            MailConfig::$mailConnection->password = ProjectConfigReader::$configReader->getValue('smtp_password');
            MailConfig::$mailConnection->port = ProjectConfigReader::$configReader->getValue('smtp_port');

            MailConfig::$defaultMailFrom = ProjectConfigReader::$configReader->getValue('default_mail_address');
            MailConfig::$defaultMailFromText = ProjectConfigReader::$configReader->getValue('default_mail_text');*/


            DeploymentConfig::$stagingEnviroment = ProjectConfigReader::$configReader->getValue('staging_enviroment');

        } else {
            (new LogMessage())->writeError('Config File not found');
        }

        /*
        $loader = new ProjectConfigLoader();
        $loader->loadConfig();*/

    }


    public function getValue($variable)
    {

        $value = null;
        if (ProjectConfigReader::$configReader !== null) {
            $value = ProjectConfigReader::$configReader->getValue($variable);
        }
        return $value;

    }

}