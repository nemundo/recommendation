<?php

namespace Nemundo\Model\Type\File;

use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractFileType extends AbstractModelType
{

    /**
     * @var bool
     */
    public $keepOrginalFilename = false;

    abstract public function getDataPath();

    abstract public function getUrlPath();

}