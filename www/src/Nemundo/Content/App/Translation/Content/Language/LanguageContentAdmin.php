<?php

namespace Nemundo\Content\App\Translation\Content\Language;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Translation\Data\Language\LanguageReader;
use Nemundo\Content\View\AbstractContentAdmin;

class LanguageContentAdmin extends AbstractContentAdmin
{

    protected function loadIndex()
    {

        $table = new AdminTable($this);

        $languageReader = new LanguageReader();

        $header = new AdminTableHeader($table);
        $header->addText($languageReader->model->defaultLanguage->label);
        $header->addText($languageReader->model->language->label);
        $header->addText($languageReader->model->code->label);
        $header->addEmpty();
        $header->addEmpty();

        foreach ($languageReader->getData() as $languageRow) {

            $row = new TableRow($table);
            $row->addYesNo($languageRow->defaultLanguage);
            $row->addText($languageRow->language);
            $row->addText($languageRow->code);

            $row->addIconSite($this->getEditSite($languageRow->id));
            $row->addIconSite($this->getDeleteSite($languageRow->id));

        }

    }

}