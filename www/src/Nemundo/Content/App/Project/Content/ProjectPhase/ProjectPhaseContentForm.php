<?php

namespace Nemundo\Content\App\Project\Content\ProjectPhase;

use Nemundo\Content\App\Project\Data\ProjectPhase\ProjectPhaseModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ProjectPhaseContentForm extends AbstractContentForm
{
    /**
     * @var ProjectPhaseContentType
     */
    public $contentType;


    /**
     * @var BootstrapTextBox
     */
    private $projectPhase;



    public function getContent()
    {

        $model=new ProjectPhaseModel();

        $this->projectPhase=new BootstrapTextBox($this);
        $this->projectPhase->label=$model->projectPhase->label;
        $this->projectPhase->validation=true;


        return parent::getContent();
    }

    public function onSubmit()
    {

        $this->contentType->projectPhase=$this->projectPhase->getValue();
        $this->contentType->saveType();
    }
}