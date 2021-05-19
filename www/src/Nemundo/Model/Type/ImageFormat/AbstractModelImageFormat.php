<?php

namespace Nemundo\Model\Type\ImageFormat;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Model\Type\File\ImageType;

abstract class AbstractModelImageFormat extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $imageFormatId;

    /**
     * @var string
     */
    public $imageFormatName;

    /**
     * @var string
     */
    public $imageFormatLabel;

    /**
     * @var int
     */
    public $size;

    abstract public function getPath();

    abstract protected function loadImageFormat();

    public function __construct(ImageType $field = null)
    {

        if ($field !== null) {
            $field->addFormat($this);
        }

        $this->loadImageFormat();

    }

}