<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\ListingSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Com\ListBox\RestrictedContentTypeListBox;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentTypeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;

// ContentListPage
class ListingPage extends ExplorerTemplate
{
    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapColumn($form);
        $formRow->columnWidth = 2;


        //$list = new ContentTypeCollectionListBox($formRow);


        /*
        $list = new BootstrapListBox($formRow);
        $list->name = (new ContentTypeParameter())->getParameterName();

        $reader = new RestrictedContentTypeReader();
        $reader->model->loadRestrictedContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, (new ContainerContentType())->typeId);
        $reader->addOrder($reader->model->restrictedContentType->contentType);
        foreach ($reader->getData() as $restrictedContentTypeRow) {
            $list->addItem($restrictedContentTypeRow->contentTypeId, $restrictedContentTypeRow->restrictedContentType->contentType);
        }*/


        $list=new RestrictedContentTypeListBox($formRow);
        $list->contentType=new ContainerContentType();
        //$list = new ContentTypeCollectionListBox($formRow);
        //$list->contentTypeCollection=new BaseContentTypeCollection();
        $list->searchMode = true;
        $list->submitOnChange = true;

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $contentType = $contentTypeParameter->getContentType();

            $layout = new BootstrapTwoColumnLayout($this);


            if ($contentType->hasList()) {

                $list = $contentType->getListing($layout->col1);
                $list->redirectSite = ExplorerSite::$site;  // ListingSite::$site;  // ExplorerSite::$site;
                //$list->redirectSite->addParameter(new ContentTypeParameter());

            }

            if ($contentType->hasForm()) {

                $widget = new AdminWidget($layout->col2);
                $widget->widgetTitle = 'New';

                $form = $contentType->getDefaultForm($widget);
                $form->redirectSite = clone(ListingSite::$site);
                $form->redirectSite->addParameter(new ContentTypeParameter());
                //$list->redirectSite = ExplorerSite::$site;
            }


            $contentParameter = new ContentParameter();
            if ($contentParameter->hasValue()) {

                $content = $contentParameter->getContent(false);
                if ($content->hasView()) {
                    $content->getDefaultView($layout->col2);
                }

            }


        }

        return parent::getContent();

    }

}