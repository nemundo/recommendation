<?php

namespace Nemundo\Core\TextFile\Writer;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractDocument;

abstract class AbstractTextFileWriter extends AbstractDocument // AbstractBase
{

    /**
     * @var string
     */
    /*protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }*/


    abstract public function addLine($line);

}