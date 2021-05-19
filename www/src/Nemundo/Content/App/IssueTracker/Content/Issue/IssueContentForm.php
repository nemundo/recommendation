<?php

namespace Nemundo\Content\App\IssueTracker\Content\Issue;

use Nemundo\Content\App\IssueTracker\Com\ListBox\PriorityListBox;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssueModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class IssueContentForm extends AbstractContentForm
{

    /**
     * @var BootstrapTextBox
     */
    private $issue;

    /**
     * @var BootstrapLargeTextBox
     */
    private $description;

    /**
     * @var PriorityListBox
     */
    private $priority;

    /**
     * @var IssueProcess
     */
    public $contentType;

    public function getContent()
    {

        $model = new IssueModel();

        $this->issue = new BootstrapTextBox($this);
        $this->issue->label = $model->issue->label;
        $this->issue->validation = true;

        $this->description = new BootstrapLargeTextBox($this);
        $this->description->label = $model->description->label;

        $this->priority = new PriorityListBox($this);


        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $issueRow = $this->contentType->getDataRow();
        $this->issue->value = $issueRow->issue;
        $this->description->value = $issueRow->description;
        $this->priority->value = $issueRow->priorityId;

    }


    public function onSubmit()
    {

        $this->contentType->issue = $this->issue->getValue();
        $this->contentType->description = $this->description->getValue();
        if ($this->priority->hasValue()) {
            $this->contentType->priorityId = $this->priority->getValue();
        }
        $this->contentType->saveType();

    }
}