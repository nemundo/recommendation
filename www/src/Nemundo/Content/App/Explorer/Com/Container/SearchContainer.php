<?php


namespace Nemundo\Content\App\Explorer\Com\Container;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Site\ContentDeleteSite;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Com\ListBox\ContentTypeCollectionListBox;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentModel;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Index\Search\Com\Form\QueryContentSearchForm;
use Nemundo\Content\Index\Search\Parameter\SearchQueryParameter;
use Nemundo\Content\Index\Search\Reader\SearchItemReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Core\Language\Translation;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Roundshot\Content\Roundshot\RoundshotWebcamContentType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class SearchContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    public function getContent()
    {

        new QueryContentSearchForm($this);


        /*
        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        /*$application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;*/


        /*$listbox = new ContentTypeListBox($formRow);
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;*/


/*
        $listbox = new ContentTypeCollectionListBox($formRow);
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;
        $listbox->contentTypeCollection=new BaseContentTypeCollection();*/



        //new AdminSearchButton($formRow);


        $queryParameter = new SearchQueryParameter();
        if ($queryParameter->hasValue()) {


            $layout = new BootstrapTwoColumnLayout($this);
            $layout->col1->columnWidth=8;
            $layout->col2->columnWidth=4;


            $p = new Paragraph($layout->col1);

            $table = new AdminClickableTable($layout->col1);

            $header =new AdminTableHeader($table);
            $header->addText('Subject');
            $header->addText('Text');
            $header->addText('Type');

            $searchReader = new SearchItemReader();
            $searchReader->query = $queryParameter->getValue();


            //$searchReader->addFilterContentType(new RoundshotContentType());
            //$searchReader->addFilterContentType()


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

              /*  $site = clone($this->redirectSite);  // ExplorerSite::$site);
                $site->addParameter(new ContentParameter($searchItem->contentId));
                $site->addParameter(new ContentTypeParameter());
                $site->addParameter(new SearchQueryParameter());
                $row->addClickableSite($site);
                */
                //$contentType = $searchItem->

                $contentType = (new ContentBuilder())->getContent($searchItem->contentId);

                if ($contentType->hasViewSite()) {
                    $row->addClickableSite($contentType->getViewSite());
                }

                //$row->addClickableSite($searchItem->site);

            }

            $pagination = new BootstrapPagination($layout->col1);
            $pagination->paginationReader = $searchReader;





            $list=new BootstrapSiteList($layout->col2);
            foreach ($searchReader->getContentTypeList() as $contentTypeResultItem) {

                $site = new Site();  // clone($this->redirectSite);
                $site->title = $contentTypeResultItem->contentTypeLabel;
                $site->addParameter(new ContentTypeParameter($contentTypeResultItem->contentTypeId));

                $list->addSite($site,$contentTypeResultItem->resultCount);

            }

        }

        return parent::getContent();

    }

}