<?php

namespace Nemundo\Model\Reader\Property;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Row\AbstractDataRow;
use Nemundo\Model\Row\ModelDataRow;
use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractReaderProperty extends AbstractBase
{

    /**
     * @var ModelDataRow
     */
    protected $modelRow;

    /**
     * @var AbstractModelType
     */
    protected $type;


    public function __construct(AbstractDataRow $modelRow, $type)
    {
        $this->modelRow = $modelRow;
        $this->type = $type;
    }

}