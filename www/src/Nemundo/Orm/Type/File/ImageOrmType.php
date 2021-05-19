<?php

namespace Nemundo\Orm\Type\File;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Model\Data\Property\File\ImageDataProperty;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;
use Nemundo\Model\Type\File\ImageType;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;
use Nemundo\Orm\Type\OrmTypeTrait;

class ImageOrmType extends ImageType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Image';
        $this->typeName = 'image';
        $this->typeId = 'ab8d94c6-09d0-4e26-ada4-10de45a449b5';
    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addModelObject($phpClass, $phpFunction, ImageType::class);

        foreach ($this->getFormatList() as $format) {

            switch ($format->getClassName()) {

                case FixWidthModelModelImageFormat::class:

                    $variableName = $this->variableName . 'FixWidth' . $format->width;

                    $var = new PhpVariable($phpClass);
                    $var->variableName = $variableName;
                    $var->dataType = $this->prefixClassName(FixWidthModelModelImageFormat::class);

                    $phpFunction->add('$this->' . $variableName . ' = new ' . $this->prefixClassName(FixWidthModelModelImageFormat::class) . '($this->' . $this->variableName . ');');
                    $phpFunction->add('$this->' . $variableName . '->width = ' . $format->width . ';');

                    break;

                case FixHeightModelImageFormat::class:

                    $variableName = $this->variableName . 'FixHeight' . $format->height;

                    $var = new PhpVariable($phpClass);
                    $var->variableName = $variableName;
                    $var->dataType = $this->prefixClassName(FixHeightModelImageFormat::class);

                    $phpFunction->add('$this->' . $variableName . ' = new ' . $this->prefixClassName(FixHeightModelImageFormat::class) . '($this->' . $this->variableName . ');');
                    $phpFunction->add('$this->' . $variableName . '->height = ' . $format->height . ';');

                    break;

                case AutoSizeModelImageFormat::class:

                    $variableName = $this->variableName . 'AutoSize' . $format->size;

                    $var = new PhpVariable($phpClass);
                    $var->variableName = $variableName;
                    $var->dataType = $this->prefixClassName(AutoSizeModelImageFormat::class);

                    $phpFunction->add('$this->' . $variableName . ' = new ' . $this->prefixClassName(AutoSizeModelImageFormat::class) . '($this->' . $this->variableName . ');');
                    $phpFunction->add('$this->' . $variableName . '->size = ' . $format->size . ';');

                    break;

            }

        }

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, ImageType::class);
    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addDataProperty($phpClass, ImageDataProperty::class);
    }


    public function getRowCode(PhpClass $phpClass)
    {
        $this->addRowProperty($phpClass, ImageReaderProperty::class);
    }

}