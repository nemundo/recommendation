<?php


namespace Nemundo\Content\Com\Form;


use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ApplicationContentTypeSearchForm extends SearchForm
{

    public function getContent()
    {

        $formRow = new BootstrapRow($this);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->searchMode = true;
        $applicationListBox->submitOnChange = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $contentTypeListBox = new ContentTypeListBox($formRow);
        $contentTypeListBox->searchMode = true;
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->column = true;
        $contentTypeListBox->columnSize = 2;

        if ($applicationListBox->hasValue()) {
            $contentTypeListBox->applicationId = $applicationListBox->getValue();
        }

        return parent::getContent();

    }

}