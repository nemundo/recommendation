<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\App\Explorer\Site\AdminSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Com\HyperlinkList\ApplicationContentTypeCollectionHyperlinkList;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;

class AdminPage extends ExplorerTemplate
{
    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;


        if ($application->hasValue()) {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth=2;
        $layout->col2->columnWidth=10;



        /*        $listbox = new ContentTypeListBox($formRow);
                $listbox->submitOnChange = true;
                $listbox->searchMode = true;*/

        /*$contentTypeListbox = new BootstrapListBox($formRow);
        $contentTypeListbox->name = (new ContentTypeParameter())->getParameterName();
        $contentTypeListbox->submitOnChange = true;
        $contentTypeListbox->searchMode = true;*/


        $hyperlinkList = new ApplicationContentTypeCollectionHyperlinkList($layout->col1);
        $hyperlinkList->applicationId=$application->getValue();

        $hyperlinkList->redirectSite= clone(AdminSite::$site);
            //$site = clone(AdminSite::$site);
            //$site->addParameter(new ContentTypeParameter($contentTypeRow->id));
            //$site->addParameter(new ApplicationParameter());

            $hyperlinkList->redirectSite->addParameter(new ApplicationParameter());


       /* $reader = new ContentTypeReader();
        if ($application->hasValue()) {
        $reader->filter->andEqual($reader->model->applicationId, $application->getValue());
        }

        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {

            $contentType = $contentTypeRow->getContentType();

            if ($contentType->hasAdmin()) {

                //$contentTypeListbox->addItem($contentTypeRow->id, $contentTypeRow->contentType);

                $site = clone(AdminSite::$site);
                $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
                $site->addParameter(new ApplicationParameter());
                $site->title=$contentType->typeLabel;
                $hyperlinkList->addSite($site);

            }

            /*if ($contentType->hasList()) {
                $listbox->addItem($contentTypeRow->id, $contentTypeRow->contentType);
            }*/

        //}

        //new AdminSearchButton($formRow);

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {


            /*$subtitle = new AdminSubtitle($this);
            $subtitle->content = 'Admin';*/

            $contentType = $contentTypeParameter->getContentType();
            if ($contentType->hasAdmin()) {
                $contentType->getAdmin($layout->col2);
            }


            /*
            $subtitle = new AdminSubtitle($this);
            $subtitle->content = 'List';

            if ($contentType->hasList()) {

                $layout = new BootstrapTwoColumnLayout($this);

                $widget = new AdminWidget($layout->col1);
                $widget->widgetTitle = $contentType->typeLabel;

                $list = $contentType->getList($widget);
                $list->redirectSite = AdminSite::$site;
                $list->redirectSite->addParameter(new ContentTypeParameter());

                $dataIdParameter = new DataIdParameter();
                if ($dataIdParameter->hasValue()) {


                    $contentType->fromDataId($dataIdParameter->getValue());

                    $widget = new AdminWidget($layout->col2);
                    $widget->widgetTitle = $contentType->getSubject();

                    $contentType->getDefaultView($widget);


                }


            }*/

        }

        }


        return parent::getContent();
    }
}