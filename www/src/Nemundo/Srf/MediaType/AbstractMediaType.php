<?php


namespace Nemundo\Srf\MediaType;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractMediaType extends AbstractBase
{

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $media;

    abstract protected function loadType();

    public function __construct()
    {
        $this->loadType();
    }


}