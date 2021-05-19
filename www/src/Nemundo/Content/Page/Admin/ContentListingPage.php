<?php


namespace Nemundo\Content\Page\Admin;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Content\Site\Admin\ContentListingSite;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Content\Template\ContentAdminTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;


class ContentListingPage extends ContentAdminTemplate
{

    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->searchMode = true;
        $applicationListBox->submitOnChange = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $contentTypeListBox = new ViewContentTypeListBox($formRow);  // new ContentTypeListBox($formRow);
        $contentTypeListBox->searchMode = true;
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->column = true;
        $contentTypeListBox->columnSize = 2;

        if ($applicationListBox->hasValue()) {
            $contentTypeListBox->applicationId=$applicationListBox->getValue();
        }




        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $contentType = $contentTypeParameter->getContentType();

            $layout = new BootstrapThreeColumnLayout($this);
            $layout->col1->columnWidth= 4;
            $layout->col2->columnWidth= 6;
            $layout->col3->columnWidth= 2;




            if ($contentType->hasList()) {

                $contentTypeListBox = $contentType->getListing($layout->col1);

                $contentTypeListBox->redirectSite =ContentListingSite::$site;
                $contentTypeListBox->redirectSite->addParameter(new ContentTypeParameter());

            }


            $contentParameter = new ContentParameter();
            if ($contentParameter->hasValue()) {


                $btn=new AdminSiteButton($layout->col2);
                $btn->site = clone(ContentListingSite::$site);
                $btn->site->addParameter(new ContentTypeParameter());
                $btn->site->title='New';


                $content = $contentParameter->getContent(false);
                if ($content->hasView()) {

                    $widget = new ContentWidget($layout->col2);
                    $widget->contentType = $content;
                    $widget->loadAction = true;
                    $widget->redirectSite = ContentAdminSite::$site;

                    /*
                    $container = new TreeIndexContainer($layout->col3);
                    $container->contentType = $content;
                    $container->redirectSite = ContentAdminSite::$site;*/

                }

            } else {

                if ($contentType->hasForm()) {

                    $widget = new AdminWidget($layout->col2);
                    $widget->widgetTitle = 'New';

                    $form = $contentType->getDefaultForm($widget);
                    $form->redirectSite = clone(ContentListingSite::$site);
                    $form->redirectSite->addParameter(new ContentTypeParameter());

                }

            }

        }

        return parent::getContent();

    }

}