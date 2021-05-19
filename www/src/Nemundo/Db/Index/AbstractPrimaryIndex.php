<?php

namespace Nemundo\Db\Index;


use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractPrimaryIndex extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $fieldName = 'id';


    /**
     * @var string
     */
    public $primaryIndexId;

    /**
     * @var string
     */
    public $primaryIndexLabel;

    /**
     * @var string
     */
    public $primaryIndexName;


    abstract protected function loadPrimaryIndex();


    public function __construct()
    {
        $this->loadPrimaryIndex();
    }


}