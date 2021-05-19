<?php

namespace Nemundo\Content\App\Translation\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Translation\Com\Form\TranslationImportForm;
use Nemundo\Content\App\Translation\Content\Language\LanguageContentType;
use Nemundo\Content\App\Translation\Content\TranslationText\TranslationTextContentType;
use Nemundo\Content\App\Translation\Data\Translation\TranslationPaginationReader;
use Nemundo\Content\App\Translation\Site\Export\TranslationExportSite;
use Nemundo\Content\App\Translation\Template\TranslationTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class TranslationPage extends TranslationTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);


        $btn=new AdminSiteButton($layout->col1);
        $btn->site= TranslationExportSite::$site;


        $table = new AdminClickableTable($layout->col1);

        $translationReader = new TranslationPaginationReader();

        $header = new AdminTableHeader($table);
        $header->addText($translationReader->model->id->label);

        foreach ((new LanguageContentType())->getDataReader() as $languageRow) {
            $header->addText($languageRow->code);
        }

        foreach ($translationReader->getData() as $translationRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($translationRow->id);

            foreach ((new LanguageContentType())->getDataReader() as $languageRow) {

                $contentType = new TranslationTextContentType($translationRow->id);
                $row->addText($contentType->getTranslationText($languageRow->id));

            }

        }

        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $translationReader;

        new TranslationImportForm($layout->col2);


        return parent::getContent();
    }
}