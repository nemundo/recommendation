<?php

namespace Nemundo\Content\App\Translation\Com\ListBox;

use Nemundo\Content\App\Translation\Content\Language\LanguageContentType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class LanguageListBox extends BootstrapListBox
{
    public function getContent()
    {
        $this->label = 'Language';


        foreach ((new LanguageContentType())->getDataReader() as $languageRow) {
            $this->addItem($languageRow->id,$languageRow->language);
        }


        return parent::getContent();
    }
}