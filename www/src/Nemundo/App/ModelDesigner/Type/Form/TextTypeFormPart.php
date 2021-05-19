<?php

namespace Nemundo\App\ModelDesigner\Type\Form;


use Nemundo\App\ModelDesigner\Type\TextModelDesignerType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class TextTypeFormPart extends AbstractModelDesignerTypeFormPart
{

    /**
     * @var TextModelDesignerType
     */
    public $type;

    /**
     * @var BootstrapTextBox
     */
    private $length;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->length = new BootstrapTextBox($this);
        $this->length->label = 'Length';

    }


    public function getContent()
    {

        $this->length->value = $this->type->length;

        return parent::getContent();

    }


    public function getJson()
    {

        $this->type->length = $this->length->getValue();

    }

}