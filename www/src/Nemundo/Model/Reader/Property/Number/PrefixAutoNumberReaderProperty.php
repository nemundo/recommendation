<?php

namespace Nemundo\Model\Reader\Property\Number;


use Nemundo\Db\Row\AbstractDataRow;
use Nemundo\Model\Reader\Property\AbstractReaderProperty;
use Nemundo\Model\Type\Number\PrefixAutoNumberType;

class PrefixAutoNumberReaderProperty extends AbstractReaderProperty
{

    /**
     * @var string
     */
    public $prefixAutoNumber;

    /**
     * @var int
     */
    public $autoNumber;

    /**
     * @var PrefixAutoNumberType
     */
    protected $type;


    public function __construct(AbstractDataRow $modelRow, $type)
    {

        parent::__construct($modelRow, $type);

        $this->prefixAutoNumber = $this->modelRow->getModelValue($this->type->prefixAutoNumber);
        $this->autoNumber = $this->modelRow->getModelValue($this->type->autoNumber);

    }

}