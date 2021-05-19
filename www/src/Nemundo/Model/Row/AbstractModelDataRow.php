<?php

namespace Nemundo\Model\Row;

use Nemundo\Db\Row\AbstractDataRow;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Model\Definition\Model\AbstractModel;


abstract class AbstractModelDataRow extends AbstractDataRow
{

    /**
     * @var AbstractModel
     */
    public $model;


    public function getModelValue(AbstractField $type)
    {
        $value = $this->getValue($type->aliasFieldName);
        return $value;
    }

}