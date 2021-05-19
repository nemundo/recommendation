<?php


namespace Nemundo\Content\Page\Admin;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;

use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Content\Template\ContentAdminTemplate;
use Nemundo\Content\Type\JsonContentTrait;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;


class ContentTypePage extends ContentAdminTemplate
{

    public function getContent()
    {



        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 12;
        $layout->col2->columnWidth = 0;



        $form = new SearchForm($layout->col1);

        $formRow = new BootstrapRow($form);

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;
        $application->column=true;
        $application->columnSize=2;

        //new AdminSearchButton($formRow);


        $contentTypeReader = new ContentTypeReader();
        $contentTypeReader->model->loadApplication();

        if ($application->hasValue()) {
            $contentTypeReader->filter->andEqual($contentTypeReader->model->applicationId, $application->getValue());


         /*   $btn = new AdminSiteButton($layout->col1);
            $btn->site = clone(ApplicationJsonSite::$site);
            $btn->site->addParameter(new ApplicationParameter());*/


        }

        $contentTypeReader->addOrder($contentTypeReader->model->contentType);

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Class');
        $header->addText('Type Id');

        $header->addText('View');


        $header->addText($contentTypeReader->model->application->label);
        $header->addText('Item Count');
        $header->addEmpty();


        foreach ($contentTypeReader->getData() as $contentTypeRow) {

            $contentType = $contentTypeRow->getContentType();

            $row = new BootstrapClickableTableRow($table);

            $row->addText($contentTypeRow->contentType);
            $row->addText($contentTypeRow->phpClass);
            $row->addText($contentTypeRow->id);


            $ul= new UnorderedList($row);

            $viewReader = new ContentViewReader();
            $viewReader->filter->andEqual($viewReader->model->contentTypeId, $contentTypeRow->id);
            foreach ($viewReader->getData() as $viewRow) {

                $text = $viewRow->viewName. ' - '.$viewRow->viewClass;

                if ($viewRow->defaultView) {
                    $text.=' (default)';
                }
                $ul->addText($text);

            }


            $row->addText($contentTypeRow->application->application);

            $count = new ContentCount();
            $count->filter->andEqual($count->model->contentTypeId, $contentTypeRow->id);
            $row->addText((new Number($count->getCount()))->formatNumber());

            /*
            if ($contentType->isObjectOfTrait(JsonContentTrait::class)) {
                $site = clone(ContentTypeJsonSite::$site);
                $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
                $row->addSite($site);
            }*/


//            $row->addClickableSite($site);


            /*
            $site = clone(ContentTypeSite::$site);
            $site->addParameter(new ApplicationParameter());
            $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
            $row->addClickableSite($site);*/

        }


        /*
        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $contentType = $parameter->getContentType();

            $btn=new AdminSiteButton($layout->col2);
            $btn->site=clone(ContentTypeJsonSite::$site);
            $btn->site->addParameter($parameter);

            $btn=new AdminSiteButton($layout->col2);
            $btn->site=clone(ContentTypeRemoveSite::$site);
            $btn->site->addParameter($parameter);



            if ($contentType->hasAdmin()) {
                $contentType->getAdmin($layout->col2);
            }

        }*/




        return parent::getContent();

    }

}