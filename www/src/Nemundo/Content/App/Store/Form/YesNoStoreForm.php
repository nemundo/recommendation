<?php

namespace Nemundo\Content\App\Store\Form;


use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;

class YesNoStoreForm extends AbstractStoreForm
{

    /**
     * @var BootstrapCheckBox
     */
    private $checkbox;


    public function getContent()
    {

        $this->checkbox = new BootstrapCheckBox($this);
        $this->checkbox->label = $this->store->storeLabel;
        $this->checkbox->value = $this->store->getValue();

        return parent::getContent();

    }


    protected function getStoreValue()
    {
        $value = $this->checkbox->getValue();
        return $value;
    }

}