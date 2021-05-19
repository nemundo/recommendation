<?php

namespace Nemundo\Orm\Type\File;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\File\FileDataProperty;
use Nemundo\Model\Reader\Property\File\FileReaderProperty;
use Nemundo\Model\Type\File\FileType;
use Nemundo\Orm\Type\OrmTypeTrait;


class FileOrmType extends FileType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->typeLabel = 'File';
        $this->typeName = 'file';
        $this->typeId = 'b6810630-5fc9-4b9a-9f99-83b1d76d38a0';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, FileType::class);
        if ($this->keepOrginalFilename) {
            $phpFunction->add('$this->' . $this->variableName . '->keepOrginalFilename = true;');
        }

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        // keepOrginalFilename is missing

        $this->addExternlObject($phpClass, $phpFunction, FileType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataProperty($phpClass, FileDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowProperty($phpClass, FileReaderProperty::class);

    }

}
