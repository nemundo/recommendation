<?php


namespace Nemundo\Core\TextFile\Reader;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractTextFileReader extends AbstractBase
{

    protected $filename;

    /**
     * @var bool
     */
    protected $utf8Encode = false;

    /**
     * @var bool
     */
    public $trimLine = true;


}