<?php

namespace Nemundo\App\ModelDesigner\Type;


use Nemundo\App\ModelDesigner\Type\Form\ExternalTypeFormPart;
use Nemundo\App\ModelDesigner\Type\Form\VirtualExternalTypeFormPart;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\External\VirtualExternalOrmType;

class VirtualExternalModelDesignerType extends VirtualExternalOrmType
{

    use ModelDesignerTypeTrait;

    public $externalModelId;


    public $externalFieldName;

    public function loadExternalType()
    {

        parent::loadExternalType();
        $this->modelDesignerFormPartClassName = VirtualExternalTypeFormPart::class;

    }


    public function getAdditionalInformation()
    {

        $label = 'External Model (Virtual): '.$this->externalClassName.' External Field Name: '.$this->externalFieldName;

        return $label;

    }

}