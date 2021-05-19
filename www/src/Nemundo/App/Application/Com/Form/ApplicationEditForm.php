<?php

namespace Nemundo\App\Application\Com\Form;


use Nemundo\App\Application\Data\Application\ApplicationModel;
use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;

class ApplicationEditForm extends BootstrapForm
{

    public $applicationId;

    /**
     * @var BootstrapCheckBox
     */
    private $appMenu;

    /**
     * @var BootstrapCheckBox
     */
    private $adminMenu;


    public function getContent()
    {

        $applicationRow = (new ApplicationReader())->getRowById($this->applicationId);

        $model = new ApplicationModel();

        $this->appMenu = new BootstrapCheckBox($this);
        $this->appMenu->label = $model->appMenu->label;
        $this->appMenu->value = $applicationRow->appMenu;

        $this->adminMenu = new BootstrapCheckBox($this);
        $this->adminMenu->label = $model->adminMenu->label;
        $this->adminMenu->value = $applicationRow->adminMenu;

        return parent::getContent();

    }


    public function onSubmit()
    {

        $update = new ApplicationUpdate();
        $update->appMenu = $this->appMenu->getValue();
        $update->adminMenu = $this->adminMenu->getValue();
        $update->updateById($this->applicationId);


    }


}