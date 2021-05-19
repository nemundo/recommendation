<?php


namespace Nemundo\Content\App\Text\Content\LargeText;


use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Content\Form\AbstractContentForm;

abstract class AbstractLargeTextContentForm extends AbstractContentForm
{

    /**
     * @var AbstractLargeTextContentType
     */
    public $contentType;

    /**
     * @var BootstrapLargeTextBox
     */
    protected $largeText;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->largeText = new BootstrapLargeTextBox($this);

    }


    protected function loadUpdateForm()
    {

        $this->largeText->value = $this->contentType->getDataRow()->largeText;

    }


    protected function onSubmit()
    {

        $this->contentType->largeText = $this->largeText->getValue();
        $this->contentType->saveType();

    }

}