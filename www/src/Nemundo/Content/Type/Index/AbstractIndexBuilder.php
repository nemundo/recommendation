<?php

namespace Nemundo\Content\Type\Index;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;


// IndexSetup

// IndexBuilder
abstract class AbstractIndexBuilder extends AbstractBase
{


    /*

    public $indexId;

    public $indexLabel;





    protected function loadIndex() {

    }*/




    /**
     * @var AbstractContentType
     */
    protected $contentType;

    // createIndex
    abstract public function buildIndex();

    abstract public function deleteIndex();

    public function __construct(AbstractContentType $contentType)
    {
        $this->contentType = $contentType;
    }


    public function removeAllIndex() {


    }


}