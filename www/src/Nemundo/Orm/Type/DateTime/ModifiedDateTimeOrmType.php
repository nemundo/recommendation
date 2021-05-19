<?php

namespace Nemundo\Orm\Type\DateTime;


use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\DateTime\ModifiedDateTimeType;
use Nemundo\Orm\Type\OrmTypeTrait;

class ModifiedDateTimeOrmType extends ModifiedDateTimeType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->typeLabel = 'Modified Date/Time';
        $this->typeName='modified_date_time';
        $this->typeId = 'eb56ef7d-be23-4b11-8e1f-0930becfe47e';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, ModifiedDateTimeType::class);

    }

    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, ModifiedDateTimeType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowObject($phpClass, DateTime::class);

    }

}