<?php

namespace Nemundo\App\System\Com\Table;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Project\Path\CachePath;
use Nemundo\Project\Path\ProjectPath;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\WebConfig;

class ProjectTable extends AdminLabelValueTable
{

    public function getContent()
    {

        if (DbConfig::$defaultConnection->isObjectOfClass(MySqlConnection::class)) {

            $this->addLabelValue('Host', DbConfig::$defaultConnection->connectionParameter->host);
            $this->addLabelValue('Port', DbConfig::$defaultConnection->connectionParameter->port);
            $this->addLabelValue('Database', DbConfig::$defaultConnection->connectionParameter->database);
            $this->addLabelValue('User', DbConfig::$defaultConnection->connectionParameter->user);

        }

        $this->addLabelValue('Web Url', WebConfig::$webUrl);
        $this->addLabelValue('Project Path', (new ProjectPath())->getFullFilename());
        $this->addLabelValue('Project Path', ProjectConfig::$projectPath);


        $this->addLabelValue('Cache Path', (new CachePath())->getFullFilename());


        return parent::getContent();

    }

}