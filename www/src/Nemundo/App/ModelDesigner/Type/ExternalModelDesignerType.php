<?php

namespace Nemundo\App\ModelDesigner\Type;


use Nemundo\App\ModelDesigner\Type\Form\ExternalTypeFormPart;
use Nemundo\Orm\Type\External\ExternalOrmType;

class ExternalModelDesignerType extends ExternalOrmType
{

    use ModelDesignerTypeTrait;

    public $externalModelId;

    public function loadExternalType()
    {

        parent::loadExternalType();
        $this->modelDesignerFormPartClassName = ExternalTypeFormPart::class;

    }


    public function getAdditionalInformation()
    {

        $label = 'External Model: '.$this->externalClassName;
        return $label;

    }

}