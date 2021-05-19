<?php

namespace Nemundo\Orm\Type\Text;


use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Model\Type\Text\TranslationTextType;
use Nemundo\Orm\Type\OrmTypeTrait;

class TranslationTextOrmType extends TextOrmType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Translation Text';
        $this->typeName = 'translation_text';
        $this->typeId = '6ed62749-871d-4317-959d-fdeb90ceabea';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, TranslationTextType::class);
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

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = 'string[]';

        $phpClass->addUseClass(LanguageConfig::class);
        $phpClass->addUseClass(TextType::class);

        $phpFunction->add('foreach (LanguageConfig::$languageList as $language) {');
        $phpFunction->add('if (isset($this->' . $var->variableName . '[$language])) {');
        $phpFunction->add('$type = new TextType();');
        $phpFunction->add('$type->fieldName = $this->model->' . $this->variableName . '->fieldName."_" . $language;');
        $phpFunction->add('$this->typeValueList->setModelValue($type, $this->' . $this->variableName . '[$language]);');
        $phpFunction->add('}');
        $phpFunction->add('}');

    }


    /*
    public function getRowCode(PhpClass $phpClass)
    {

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = 'string';

        $phpClass->addUseClass(LanguageConfig::class);
        $phpClass->addUseClass(TextType::class);

        $phpClass->addConstructor('$type = new TextType();');
        $phpClass->addConstructor('$type->aliasFieldName = $model->' . $this->variableName . '->aliasFieldName . "_" . LanguageConfig::$currentLanguageCode;');
        $phpClass->addConstructor('$this->' . $this->variableName . ' = $this->getModelValue($type);');

    }*/

}