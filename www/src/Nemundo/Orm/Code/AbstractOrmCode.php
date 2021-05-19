<?php

namespace Nemundo\Orm\Code;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Dev\Code\PrefixPhpClassTrait;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Project\AbstractProject;


abstract class AbstractOrmCode extends AbstractBaseClass
{

    use PrefixPhpClassTrait;

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var AbstractOrmModel
     */
    public $model;


}