<?php


namespace Nemundo\Admin\Loader;


use Nemundo\Model\ModelConfig;
use Nemundo\Project\Loader\MySqlProjectLoader;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\WebConfig;

class AdminMySqlProjectLoader extends MySqlProjectLoader
{

    public function loadProject()
    {

        parent::loadProject();

        WebConfig::$webUrl = '/';
        WebConfig::$webPath = ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR;

        ModelConfig::$dataPath = ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;
        ModelConfig::$dataUrl = WebConfig::$webUrl . 'data/';

        ModelConfig::$redirectDataPath = ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR . 'data_redirect' . DIRECTORY_SEPARATOR;

    }

}