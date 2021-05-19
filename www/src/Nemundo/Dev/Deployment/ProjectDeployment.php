<?php


namespace Nemundo\Dev\Deployment;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Repository\AbstractRepository;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Project\AbstractProject;

class ProjectDeployment extends AbstractBase
{

    /**
     * @var AbstractProject
     */
    //public $project;

    /**
     * @var Path
     */
    public $path;


    public function copyProject(AbstractRepository $project)
    {


        //$deployPath->addPath($project->project)->createPath();


        $namespace = (new Text($project->namespace))->replace('\\', DIRECTORY_SEPARATOR)->getValue();


        /*if (!(new DeploymentPath())
            ->addPath('src')
            ->addPath($namespace)
            ->existPath()) {*/

            $copy = new \Nemundo\Core\File\DirectoryCopy();
            $copy->sourcePath = $project->path;
            $copy->destinationPath = (clone($this->path))
                ->addPath('src')
                ->addPath($namespace)
                ->createPath()
                ->getPath();
            $copy->copyDirectory();

        //}

        return $this;


    }


}