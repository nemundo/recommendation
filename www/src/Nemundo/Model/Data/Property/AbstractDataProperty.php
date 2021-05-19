<?php

namespace Nemundo\Model\Data\Property;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\AbstractModelType;


abstract class AbstractDataProperty extends AbstractBase
{

    /**
     * @var AbstractModelType
     */
    protected $type;

    /**
     * @var ModelTypeValueList
     */
    protected $typeValueList;


    public function __construct(AbstractModelType $type, ModelTypeValueList $typeValueList, AbstractModel $model = null)
    {
        $this->type = $type;
        $this->typeValueList = $typeValueList;
    }

}