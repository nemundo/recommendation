<?php

namespace Nemundo\App\ModelDesigner\Type;


use Nemundo\App\ModelDesigner\Type\Form\TextTypeFormPart;
use Nemundo\Orm\Type\Text\TextOrmType;

class TextModelDesignerType extends TextOrmType
{

    use ModelDesignerTypeTrait;

    protected function loadExternalType()
    {

        parent::loadExternalType();
        $this->modelDesignerFormPartClassName = TextTypeFormPart::class;

    }


    public function getAdditionalInformation()
    {

        $label = 'Length: ' . $this->length;
        return $label;

    }


}