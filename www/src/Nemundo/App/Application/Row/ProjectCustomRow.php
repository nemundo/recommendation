<?php


namespace Nemundo\App\Application\Row;


// Nemundo\App\Application\Row\ProjectCustomRow

use Nemundo\App\Application\Data\Project\ProjectRow;
use Nemundo\Project\AbstractProject;

class ProjectCustomRow extends ProjectRow
{

    public function getProject()
    {

        $className = $this->phpClass;

        /** @var AbstractProject $project */
        $project = new $className();

        return $project;

    }

}