<?php

namespace Nemundo\App\ModelDesigner\Com\ListBox;


use Nemundo\App\ModelDesigner\Collection\ModelTemplateCollection;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ModelTemplateListBox extends BootstrapListBox
{

    public function getContent()
    {

        $this->label = 'Template';
        $this->emptyValueAsDefault = false;

        foreach ((new ModelTemplateCollection())->getCollection() as $template) {
            $this->addItem($template->templateName, $template->templateLabel);
        }

        return parent::getContent();

    }

}