<?php

namespace Nemundo\App\ModelDesigner\Json;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Type\File\File;
use Nemundo\Project\AbstractProject;


class ProjectJson extends AbstractBase
{

    /**
     * @var bool
     */
    public $loadType = true;


    /**
     * @var AbstractProject
     */
    private $project;

    public function __construct(AbstractProject $project)
    {

        $this->project = $project;

    }


    /**
     * @return AppJson[]
     */
    public function getAppJsonList($hideDeletedApp = true)
    {

        $appList = [];

        if ((new File($this->project->modelPath))->directoryExists()) {

            $reader = new DirectoryReader();
            $reader->path = $this->project->modelPath;
            foreach ($reader->getData() as $file) {
                $appJson = new AppJson();
                $appJson->loadType = $this->loadType;
                $appJson->fromProject($this->project, $file->getFilenameWithoutExtension());

                $showItem = true;
                if ($hideDeletedApp) {
                    if ($appJson->isDeleted) {
                        $showItem = false;
                    }
                }

                if ($showItem) {
                    $appList[] = $appJson;
                }

            }

        }

        return $appList;

    }

}