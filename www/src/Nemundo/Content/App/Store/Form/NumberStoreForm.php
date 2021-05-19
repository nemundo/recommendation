<?php

namespace Nemundo\Content\App\Store\Form;


use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Workflow\App\Store\Type\AbstractNumberStoreType;


class NumberStoreForm extends AbstractStoreForm
{

    /**
     * @var AbstractNumberStoreType
     */
    public $store;

    /**
     * @var BootstrapTextBox
     */
    private $number;


    public function getContent()
    {

        $this->number = new BootstrapTextBox($this);
        $this->number->label = $this->store->storeLabel;
        $this->number->value = $this->store->getValue();
        $this->number->validation = true;
        $this->number->validationType = ValidationType::IS_NUMBER;

        return parent::getContent();

    }


    protected function getStoreValue()
    {
       // $value = $this->number->getValue();
       // return $value;
    }


    protected function onSubmit()
    {

        $this->store->setValue($this->number->getValue());

    }


}