<?php


namespace Nemundo\Content\Index\Search\Com\Container;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Content\Index\Search\Com\Form\QueryContentSearchForm;
use Nemundo\Content\Index\Search\Parameter\SearchQueryParameter;
use Nemundo\Content\Index\Search\Reader\SearchItemReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Core\Language\Translation;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class SearchIndexContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    public function getContent()
    {

        new QueryContentSearchForm($this);

        $queryParameter = new SearchQueryParameter();
        if ($queryParameter->hasValue()) {


            $layout = new BootstrapTwoColumnLayout($this);
            $layout->col1->columnWidth = 8;
            $layout->col2->columnWidth = 4;


            $p = new Paragraph($layout->col1);

            $table = new AdminClickableTable($layout->col1);

            $header = new AdminTableHeader($table);
            $header->addText('Subject');
            $header->addText('Text');
            $header->addText('Type');

            $searchReader = new SearchItemReader();
            $searchReader->query = $queryParameter->getValue();

            $searchReader->paginationLimit = 30;

            $contentTypeParameter = new ContentTypeParameter();
            $contentTypeParameter->contentTypeCheck = false;
            if ($contentTypeParameter->hasValue()) {
                $searchReader->addFilterContentType($contentTypeParameter->getContentType());
            }

            $resultText = [];
            $resultText[LanguageCode::EN] = 'Results found';
            $resultText[LanguageCode::DE] = 'Ergebnisse gefunden';


            $searchCount = $searchReader->getTotalCount();
            $p->content = $searchCount . ' ' . (new Translation())->getText($resultText);

            foreach ($searchReader->getData() as $searchItem) {

                $row = new BootstrapClickableTableRow($table);

                $row->addText($searchItem->subject);
                $row->addText($searchItem->text);
                $row->addText($searchItem->typeLabel);


                $site = null;

                $contentType = $searchItem->getContentType();
                if ($contentType->hasViewSite()) {
                    $site = $contentType->getViewSite();
                } else {
                    $site = clone($this->redirectSite);
                    $site->addParameter(new ContentParameter($searchItem->contentId));
                }

                $row->addClickableSite($site);


            }

            $pagination = new BootstrapPagination($layout->col1);
            $pagination->paginationReader = $searchReader;


            $list = new BootstrapSiteList($layout->col2);
            foreach ($searchReader->getContentTypeList() as $contentTypeResultItem) {

                $site = new Site();
                $site->title = $contentTypeResultItem->contentTypeLabel;
                $site->addParameter(new ContentTypeParameter($contentTypeResultItem->contentTypeId));

                $list->addSite($site, $contentTypeResultItem->resultCount);

            }

        }

        return parent::getContent();

    }

}