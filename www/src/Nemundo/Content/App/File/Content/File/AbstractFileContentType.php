<?php


namespace Nemundo\Content\App\File\Content\File;


use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Model\Data\Property\File\FileProperty;


abstract class AbstractFileContentType extends AbstractSearchContentType
{

    /**
     * @var FileProperty
     */
    public $file;

    public function __construct($dataId = null)
    {

        parent::__construct($dataId);
        $this->file = new FileProperty();

    }

}