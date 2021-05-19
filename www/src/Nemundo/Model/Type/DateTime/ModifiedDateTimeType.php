<?php

namespace Nemundo\Model\Type\DateTime;


use Nemundo\Model\Item\DateTime\DateTimeModelItem;

class ModifiedDateTimeType extends DateTimeType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();

        //$this->visible->form = false;

        $this->fieldName = 'modified_date_time';
        $this->label = 'Modified Date/Time';

        //$this->viewItemClassName = DateTimeModelItem::class;
        //$this->tableItemClassName = DateTimeModelItem::class;

    }

}