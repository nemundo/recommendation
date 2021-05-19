<?php

namespace Nemundo\Content\App\Store\Form;


use Nemundo\Package\Bootstrap\FormElement\BootstrapCkEditor5Editor;


class HtmlStoreForm extends AbstractStoreForm
{

    /**
     * @var BootstrapCkEditor5Editor
     */
    private $text;


    public function getContent()
    {

        $this->text = new BootstrapCkEditor5Editor($this);
        $this->text->label = $this->store->storeLabel;
        $this->text->value = $this->store->getValue();

        return parent::getContent();

    }


    protected function getStoreValue()
    {
        $value = $this->text->getValue();
        return $value;
    }

}