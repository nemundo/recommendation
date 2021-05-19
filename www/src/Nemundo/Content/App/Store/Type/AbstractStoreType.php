<?php

namespace Nemundo\Content\App\Store\Type;


use Nemundo\Content\Type\AbstractType;
use Nemundo\Core\Base\AbstractBase;


abstract class AbstractStoreType extends AbstractBase
{

    /**
     * @var string
     */
    public $storeId;

    /**
     * @var string
     */
    public $storeLabel;

    /**
     * @var string
     */
    protected $defaultValue;


    abstract protected function loadStore();

    abstract public function setValue($value);

    abstract public function getValue();

    abstract public function hasValue();

    abstract public function removeStore();

    public function __construct()
    {
        $this->loadStore();
    }


}