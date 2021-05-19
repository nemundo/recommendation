<?php


namespace Nemundo\Content\Index\Search\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;

use Nemundo\Content\Index\Search\Data\WordContentType\WordContentTypePaginationReader;
use Nemundo\Content\Index\Search\Parameter\SearchQueryParameter;
use Nemundo\Content\Index\Search\Reader\SearchItemReader;
use Nemundo\Content\Index\Search\Site\SearchSite;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Template\ContentAdminTemplate;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Core\Language\Translation;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Table\Th;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\Site;

class SearchWordPage extends ContentAdminTemplate
{

    public function getContent()
    {


        $form = new SearchForm($this);

        $contentType = new ContentTypeListBox($form);
        $contentType->searchMode = true;
        $contentType->submitOnChange = true;


        $table = new AdminTable($this);

        $reader = new WordContentTypePaginationReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->word);
        //$reader->paginationLimit=ProcessConfig::PAGINATION_LIMIT;


        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {
            $reader->filter->andEqual($reader->model->contentTypeId, $parameter->getValue());
        }

        $header = new TableHeader($table);
        $header->addText($reader->model->word->label);
        $header->addText($reader->model->contentType->label);

        foreach ($reader->getData() as $wordRow) {

            $row = new TableRow($table);
            $row->addText($wordRow->word);
            $row->addText($wordRow->contentType->contentType);


        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader=$reader;


        return parent::getContent();

    }

}