<?php

namespace Nemundo\Dev\ProjectBuilder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Dev\Script\AdminBuilderScript;
use Nemundo\Project\Project;

class ProjectBuilderScript extends AbstractBase
{

    public function createProject()
    {

        $projectPath = getcwd() . DIRECTORY_SEPARATOR;

        $console = new ConsoleInput();
        $console->message = 'Project';
        $console->defaultValue = 'Project';
        $project = $console->getValue();

        $console = new ConsoleInput();
        $console->message = 'Project Namespace';
        $console->defaultValue = $project;
        $projectNamespace = $console->getValue();

        $project = new Project();
        $project->projectName = $project;
        $project->namespace = $projectNamespace;
        $project->path = $projectPath;

        $builder = new ProjectBuilder();
        $builder->project = $project;
        $builder->createProject();

    }

}