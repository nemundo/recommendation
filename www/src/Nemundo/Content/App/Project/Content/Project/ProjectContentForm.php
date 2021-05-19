<?php

namespace Nemundo\Content\App\Project\Content\Project;

use Nemundo\Content\App\Project\Data\Project\ProjectModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ProjectContentForm extends AbstractContentForm
{
    /**
     * @var ProjectContentType
     */
    public $contentType;


    /**
     * @var BootstrapTextBox
     */
    private $project;


    public function getContent()
    {

        $model = new ProjectModel();

        $this->project = new BootstrapTextBox($this);
        $this->project->label = $model->project->label;
        $this->project->validation = true;


        return parent::getContent();
    }

    public function onSubmit()
    {
        $this->contentType->project=$this->project->getValue();
        $this->contentType->saveType();
    }
}