<?php

namespace Nemundo\Orm\Type\DateTime;

use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\DateTime\CreatedDateTimeType;
use Nemundo\Orm\Type\OrmTypeTrait;

class CreatedDateTimeOrmType extends CreatedDateTimeType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->typeLabel = 'Created Date/Time';
        $this->typeName='created_date_time';
        $this->typeId = '71009f0d-3047-4ab6-9d99-9e1370a142ba';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, CreatedDateTimeType::class);

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, CreatedDateTimeType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowObject($phpClass, DateTime::class);

    }

}