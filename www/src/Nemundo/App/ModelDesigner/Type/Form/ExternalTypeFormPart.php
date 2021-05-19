<?php

namespace Nemundo\App\ModelDesigner\Type\Form;


use Nemundo\App\ModelDesigner\Builder\ModelBuilder;
use Nemundo\App\ModelDesigner\Com\ListBox\ModelListBox;
use Nemundo\App\ModelDesigner\Type\ExternalModelDesignerType;

class ExternalTypeFormPart extends AbstractModelDesignerTypeFormPart
{

    /**
     * @var ExternalModelDesignerType
     */
    public $type;

    /**
     * @var ModelListBox
     */
    private $externalModel;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->externalModel = new ModelListBox($this);
        $this->externalModel->label = 'External Model';
        $this->externalModel->inputId = 'external_model';
        $this->externalModel->validation = true;

    }


    public function getContent()
    {

        $this->externalModel->value = $this->type->externalModelId;
        return parent::getContent();

    }


    public function getJson()
    {

        $externalModelId = $this->externalModel->getValue();
        $this->type->externalModelId = $externalModelId;

        $externalModel = (new ModelBuilder())->getModelById($externalModelId);

        $this->type->externalClassName = $externalModel->namespace . '\\' . $externalModel->className;
        $this->type->rowClassName = $externalModel->rowClassName;

    }

}