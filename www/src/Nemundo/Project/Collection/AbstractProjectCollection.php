<?php

namespace Nemundo\Project\Collection;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Sorting\SortingListOfObject;
use Nemundo\Project\AbstractProject;

abstract class AbstractProjectCollection extends AbstractBaseClass
{

    /**
     * @var AbstractProject[]
     */
    private $projectList = [];

    abstract protected function loadProjectCollection();


    public function __construct()
    {
        $this->loadProjectCollection();
    }


    protected function addProject(AbstractProject $project)
    {
        $this->projectList[] = $project;
        return $this;
    }


    /**
     * @return AbstractProject[]
     */
    public function getProjectList()
    {

        //(new Debug())->write('OUTDATED');
        //exit;



       /* $projectList = [];  // $this->projectList;
        foreach ($this->projectList as $project) {


            if (!(array_key_exists($project->namespace, $projectList))) {
                $projectList[$project->namespace] = $project;
            }

            foreach ($project->getDependencyList() as $dependency) {

                if (!(array_key_exists($dependency->namespace, $projectList))) {
                    $projectList[$dependency->namespace] = $dependency;
                }
                //$projectList=array_merge($projectList,  $project->getDependencyList());

            }
        }*/

        $sorting = new SortingListOfObject();
        $sorting->objectList =$this->projectList;
        $sorting->sortingProperty = 'project';
        $sortedList = $sorting->getSortedListOfObject();

        return $sortedList;

        //return  $projectList;

    }

}