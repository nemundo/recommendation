<?php

namespace Nemundo\Content\App\Explorer\Content\Container;

use Nemundo\Content\App\Explorer\Data\Container\ContainerModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ContainerContentForm extends AbstractContentForm
{

    /**
     * @var ContainerContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $container;

    /**
     * @var BootstrapLargeTextBox
     */
    private $description;

    private $icon;

    public function getContent()
    {

        $model = new ContainerModel();

        $this->container = new BootstrapTextBox($this);
        $this->container->label = $model->container->label;
        $this->container->validation = true;

        /*$this->description = new BootstrapLargeTextBox($this);
        $this->description->label = $model->description->label;*/

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $this->container->value = $this->contentType->getDataRow()->container;
        //$this->description->value = $this->contentType->getDataRow()->description;

    }


    public function onSubmit()
    {

        $this->contentType->container = $this->container->getValue();
        //$this->contentType->description = $this->description->getValue();
        $this->contentType->saveType();

    }
}