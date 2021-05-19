<?php

namespace Nemundo\App\ModelDesigner\Script;


use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\App\ModelDesigner\Orm\OrmBuilder;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class ModelDesignerOrmScript extends AbstractBase
{

    /**
     * @var bool
     */
    public $deleteOrm = false;

    /**
     * @var bool
     */
    public $createOrm = false;


    /*
    protected function loadScript()
    {
        $this->scriptName = 'modeldesigner-orm';
    }*/


    public function run()
    {

        foreach ((new ModelDesignerConfig)->getProjectList() as $project) {

            (new Debug())->write($project->projectName);

            $projectJson = new ProjectJson($project);
            foreach ($projectJson->getAppJsonList(true) as $appJson) {

                $orm = new OrmBuilder();
                $orm->project = $project;
                $orm->app = $appJson;

                if ($this->deleteOrm) {
                    $orm->deleteOrm();
                }

                if ($this->createOrm) {
                $orm->createOrm();
                }

            }

        }

    }

}