<?php

namespace Nemundo\Content\App\Dashboard\Content\DashboardColumn;

use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class DashboardColumnContentForm extends AbstractContentForm
{
    /**
     * @var DashboardColumnContentType
     */
    public $contentType;

    /**
     * @var BootstrapListBox
     */
    private $columnWidth;

    public function getContent()
    {

        $model=new DashboardColumnModel();

        $this->columnWidth = new BootstrapListBox($this);
        $this->columnWidth->label = $model->columnWidth->label;
        $this->columnWidth->validation = true;
        $this->columnWidth->emptyValueAsDefault=false;

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 12;
        foreach ($loop->getData() as $number) {
            $this->columnWidth->addItem($number, $number);
        }

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $columnRow = $this->contentType->getDataRow();
        $this->columnWidth->value=$columnRow->columnWidth;

    }


    public function onSubmit()
    {
        $this->contentType->columnWidth=$this->columnWidth->getValue();
        $this->contentType->saveType();
    }
}