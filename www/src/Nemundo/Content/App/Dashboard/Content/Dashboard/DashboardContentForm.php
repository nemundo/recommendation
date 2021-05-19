<?php

namespace Nemundo\Content\App\Dashboard\Content\Dashboard;

use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class DashboardContentForm extends AbstractContentForm
{
    /**
     * @var DashboardContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $dashboard;

    /**
     * @var BootstrapLargeTextBox
     */
    private $description;

    /**
     * @var BootstrapFileUpload
     */
    private $image;

    /**
     * @var BootstrapListBox
     */
    private $columnCount;

    /**
     * @var BootstrapCheckBox
     */
    private $active;

    public function getContent()
    {

        $model = new DashboardModel();

        $this->dashboard = new BootstrapTextBox($this);
        $this->dashboard->label = $model->dashboard->label;
        $this->dashboard->validation = true;
        //$this->dashboard->value='test';

        $this->description=new BootstrapLargeTextBox($this);
        $this->description->label=$model->description->label;

        $this->image=new BootstrapFileUpload($this);
        $this->image->label=$model->image->label;
        $this->image->acceptFileType=AcceptFileType::IMAGE;

        $this->columnCount = new BootstrapListBox($this);
        $this->columnCount->label = 'Column Count';  // $model->columnCount->label;
        //$this->columnCount->validation = true;
        $this->columnCount->emptyValueAsDefault = false;

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 5;
        foreach ($loop->getData() as $number) {
            $this->columnCount->addItem($number, $number);
        }

        $this->active = new BootstrapCheckBox($this);
        $this->active->label = $model->active->label;
        $this->active->value = true;


        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $dashboardRow = $this->contentType->getDataRow();
        $this->dashboard->value = $dashboardRow->dashboard;
        $this->description->value=$dashboardRow->description;
        $this->active->value = $dashboardRow->active;
        $this->columnCount->disabled=true;
        //$this->columnCount->va
        //$this->columnCount->visible=false;

    }


    public function onSubmit()
    {

        $this->contentType->dashboard = $this->dashboard->getValue();
        $this->contentType->description=$this->description->getValue();
        $this->contentType->image=$this->image->getFileRequest();
        $this->contentType->columnCount = $this->columnCount->getValue();
        $this->contentType->active = $this->active->getValue();
        $this->contentType->saveType();

    }
}