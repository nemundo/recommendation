<?php

namespace Nemundo\Content\Type\Index;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;


// IndexSetup

// IndexBuilder
abstract class AbstractIndexType extends AbstractBase
{


    public $indexId;

    public $indexLabel;

    public $indexBuilderClass;


    abstract protected function loadIndexType();

    public function __construct() {

        $this->loadIndexType();

    }


}