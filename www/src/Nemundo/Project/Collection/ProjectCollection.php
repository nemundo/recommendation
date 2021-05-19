<?php

namespace Nemundo\Project\Collection;


use Nemundo\Project\AbstractProject;

class ProjectCollection extends AbstractProjectCollection
{

    protected function loadProjectCollection()
    {

    }

    public function addProject(AbstractProject $project)
    {
        return parent::addProject($project);
    }

}