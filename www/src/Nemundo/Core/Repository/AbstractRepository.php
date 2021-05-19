<?php

namespace Nemundo\Core\Repository;

use Nemundo\Core\Base\AbstractBaseClass;



// nach Core
// AbstractRepo
// AbstractRepository

abstract class AbstractRepository extends AbstractBaseClass
{

    // nur $projectName

    /**
     * @var string
     */
    public $project;

    /**
     * @var string
     */
    public $projectName;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    //public $modelPath;

    //public $projectPath;

    /**
     * @var AbstractRepository[]
     */
    private $dependencyList = [];

    abstract protected function loadProject();

    public function __construct()
    {

        $this->loadProject();

    }


    protected function addDependency(AbstractRepository $project)
    {

        $this->dependencyList[] = $project;
        return $this;

    }


    public function getDependencyList()
    {

        /** @var AbstractRepository[] $projectList */
        $projectList = [];  // $this->projectList;
        $projectList[$this->namespace] = $this;

        foreach ($this->dependencyList as $project) {


            if (!(array_key_exists($project->namespace, $projectList))) {
                $projectList[$project->namespace] = $project;
            }

            foreach ($project->getDependencyList() as $dependency) {

                if (!(array_key_exists($dependency->namespace, $projectList))) {
                    $projectList[$dependency->namespace] = $dependency;
                }
                //$projectList=array_merge($projectList,  $project->getDependencyList());

            }
        }

        return array_values($projectList);

    }


}