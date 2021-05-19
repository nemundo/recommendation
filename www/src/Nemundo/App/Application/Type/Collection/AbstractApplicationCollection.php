<?php


namespace Nemundo\App\Application\Type\Collection;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractApplicationCollection extends AbstractBase
{

    /**
     * @var AbstractApplication[]
     */
    private $applicationList = [];


    abstract protected function loadCollection();

    public function __construct()
    {
        $this->loadCollection();
    }


    protected function addApplication(AbstractApplication $application)
    {
        $this->applicationList[] = $application;
        return $this;
    }


    public function getApplicationList()
    {
        return $this->applicationList;
    }

}