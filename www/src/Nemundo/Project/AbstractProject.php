<?php

namespace Nemundo\Project;

use Nemundo\App\Application\Type\AbstractApplication;

use Nemundo\App\Application\Type\Collection\ApplicationCollection;
use Nemundo\Core\Repository\AbstractRepository;

abstract class AbstractProject extends AbstractRepository
{

    /**
     * @var string
     */
    public $modelPath;

    public $setupClass;

    public $webLoadClass;


    /**
     * @var ApplicationCollection
     */
    //public $applicationCollection;  //=[];


    protected $applicationClassList=[];


    abstract protected function loadProject();

    public function __construct()
    {

        //$this->applicationCollection=new ApplicationCollection();

        parent::__construct();
        $this->loadProject();

    }


    public function getApplicationList() {

        /** @var AbstractApplication[] $list */
        $list=[];

        foreach ($this->applicationClassList as $className) {
            $list[]=new $className();
        }

        return $list;

    }

}