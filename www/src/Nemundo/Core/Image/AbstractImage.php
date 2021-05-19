<?php

namespace Nemundo\Core\Image;


use Nemundo\Core\Base\AbstractBaseClass;

class AbstractImage extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $sourceFilename;

    public function __construct($imageFilename)
    {
        $this->sourceFilename = $imageFilename;
    }

}