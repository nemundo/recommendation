<?php


namespace Nemundo\Content\Index\Geo\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\Action\ViewContentAction;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Geo\Action\KmlContentAction;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Geo\Com\ListBox\GeoContentTypeListBox;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexPaginationReader;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Index\Geo\Parameter\GeoIndexParameter;
use Nemundo\Content\Index\Geo\Site\GeoIndexSite;
use Nemundo\Content\Index\Geo\Site\Kml\GeoContentKmlSite;
use Nemundo\Content\Index\Geo\Site\Kml\GeoIndexKmlSite;
use Nemundo\Content\Index\Geo\Template\GeoIndexTemplate;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\ContentDeleteSite;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class GeoIndexPage extends GeoIndexTemplate
{

    public function getContent()
    {


        // Container


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        /*$application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;*/


        $q = new BootstrapTextBox($formRow);


        /*
        $listbox = new BootstrapListBox($formRow);  // new ContentTypeListBox($formRow);
        $listbox->label = 'Content Type';
        $listbox->name = (new ContentTypeParameter())->getParameterName();
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;
        $listbox->column = true;
        $listbox->columnSize = 2;

        $reader = new GeoIndexReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->addGroup($reader->model->content->contentTypeId);
        foreach ($reader->getData() as $indexRow) {
            $listbox->addItem($indexRow->content->contentTypeId, $indexRow->content->contentType->contentType);
        }*/



        $listbox=new GeoContentTypeListBox($formRow);
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;
        $listbox->column = true;
        $listbox->columnSize = 2;





        $btn = new AdminIconSiteButton($this);
        $btn->site = clone(GeoIndexKmlSite::$site);
        $btn->site->addParameter(new ContentTypeParameter());


        $layout = new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Content Type');
        $header->addText('Place');
        $header->addText('Coordinate');

        $geoReader = new GeoIndexPaginationReader();
        $geoReader->model->loadContent();
        $geoReader->model->content->loadContentType();

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {
            $geoReader->filter->andEqual($geoReader->model->content->contentTypeId, $contentTypeParameter->getValue());
        }

        $geoReader->addOrder($geoReader->model->place);

        foreach ($geoReader->getData() as $geoRow) {

            $contentType = $geoRow->content->getContentType();

            if ($contentType !== null) {
                $row = new AdminClickableTableRow($table);

                if ($geoRow->id == (new GeoIndexParameter())->getValue()) {
                    $row->setActiveRow();
                }

                $row->addText($contentType->getTypeLabel());
                $row->addText($geoRow->place);

                $row->addText($geoRow->coordinate->getText());


                if ($contentType->hasKmlMarker()) {
                    $site = clone(GeoContentKmlSite::$site);
                    $site->addParameter(new GeoIndexParameter($geoRow->id));
                    $row->addIconSite($site);
                } else {
                    $row->addEmpty();
                }


                $site = clone(ContentDeleteSite::$site);
                $site->addParameter(new ContentParameter($contentType->getContentId()));
                $row->addIconSite($site);

                $site = clone(GeoIndexSite::$site);
                $site->addParameter(new ContentParameter($contentType->getContentId()));
                $site->addParameter(new ContentTypeParameter());
                $site->addParameter(new PageParameter());
                $site->addParameter(new GeoIndexParameter($geoRow->id));
                $row->addClickableSite($site);


            } else {
                (new LogMessage())->writeError('No Content Type');
            }

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $geoReader;


        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $contentType = $parameter->getContentType();

            if ($contentType->hasForm()) {
                $container = new ContentTypeFormContainer($layout->col2);
                $container->contentType = $contentType;
                $container->redirectSite = clone(GeoIndexSite::$site);
                $container->redirectSite->addParameter(new ApplicationParameter());
                $container->redirectSite->addParameter(new ContentTypeParameter());
            }

        }


        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {

            $content = $contentParameter->getContent(false);

            $widget = new ContentWidget($layout->col2);
            $widget->redirectSite = GeoIndexSite::$site;

            $widget->contentType = $content;
            //$widget->loadAction=true;

            $widget->addContentAction(new EditContentAction());
            $widget->addContentAction(new ViewContentAction());

            $action = new KmlContentAction();
            $widget->addContentAction($action);


            // geo kml
            // empty


            $container = new GeoIndexContainer($layout->col2);
            $container->contentType = $content;
            $container->redirectSite = GeoIndexSite::$site;


        }


        return parent::getContent();
    }

}