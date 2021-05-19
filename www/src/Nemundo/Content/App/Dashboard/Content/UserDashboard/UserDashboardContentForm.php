<?php

namespace Nemundo\Content\App\Dashboard\Content\UserDashboard;

use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboard;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UserDashboardContentForm extends AbstractContentForm
{
    /**
     * @var UserDashboardContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $dashboard;

    public function getContent()
    {

        $model = new UserDashboardModel();

        $this->dashboard = new BootstrapTextBox($this);
        $this->dashboard->label = $model->dashboard->label;
        $this->dashboard->validation=true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $this->dashboard->value=$this->contentType->getDataRow()->dashboard;

    }


    public function onSubmit()
    {

        $this->contentType->dashboard=$this->dashboard->getValue();
        $this->contentType->saveType();

    }
}