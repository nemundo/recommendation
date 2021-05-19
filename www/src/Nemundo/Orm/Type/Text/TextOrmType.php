<?php

namespace Nemundo\Orm\Type\Text;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Orm\Type\OrmTypeTrait;

class TextOrmType extends TextType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Text';
        $this->typeName = 'text';
        $this->typeId = 'd4b65d54-1cfb-4fd4-a367-3564f8cbcd1b';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, TextType::class);
        if ($this->createModelProperty) {
            $phpFunction->add('$this->' . $this->variableName . '->length = ' . $this->length . ';');
        }
    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, TextType::class);
    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addDataPrimitiveVariable($phpClass, $phpFunction, 'string');
    }


    public function getRowCode(PhpClass $phpClass)
    {
        $this->addRowPrimitiveVarialbe($phpClass, 'string');
    }

}