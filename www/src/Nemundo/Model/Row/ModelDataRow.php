<?php

namespace Nemundo\Model\Row;

use Nemundo\Db\Sql\Field\AbstractField;


class ModelDataRow extends AbstractModelDataRow
{

    public function getModelValue(AbstractField $type)
    {
        return parent::getModelValue($type);
    }


    public function getData()
    {
        return parent::getData();
    }

}