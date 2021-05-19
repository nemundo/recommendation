<?php

namespace Nemundo\Content\App\Contact\Content\Phone;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PhoneContentForm extends AbstractContentForm
{
    /**
     * @var PhoneContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $phone;

    public function getContent()
    {

        $this->phone = new BootstrapTextBox($this);
        $this->phone->label = 'Phone';

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $this->phone->value=$this->contentType->getDataRow()->phone;

    }


    public function onSubmit()
    {

        $this->contentType->phone = $this->phone->getValue();
        $this->contentType->saveType();

    }
}