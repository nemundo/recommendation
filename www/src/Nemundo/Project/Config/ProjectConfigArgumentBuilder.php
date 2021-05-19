<?php


namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBase;

class ProjectConfigArgumentBuilder extends AbstractBase
{

    public function createConfig($projectPath, $mysqlHost, $mysqlPort, $mysqlUser, $mysqlPassword, $mysqlDatabase)
    {

        $config = new ProjectConfigBuilder();
        $config->filename = $projectPath . 'config.ini';
        $config->mysqlHost = $mysqlHost;
        $config->mysqlPort = $mysqlPort;
        $config->mysqlUser = $mysqlUser;
        $config->mysqlPassword = $mysqlPassword;
        $config->mysqlDatabase = $mysqlDatabase;
        $config->writeConfigFile();

    }

}