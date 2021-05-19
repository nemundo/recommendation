<?php

namespace Nemundo\App\ClassDesigner\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\AbstractProject;

abstract class AbstractClassBuilder extends AbstractBase
{

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var string
     */
    public $className;


    abstract public function buildClass();

}