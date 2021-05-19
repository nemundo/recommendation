<?php


namespace Nemundo\Content\Page;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Container\ContentChildContainer;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Content\Template\ContentTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;


class ContentPage extends ContentTemplate
{

    public function getContent()
    {

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $contentType = $contentTypeParameter->getContentType();

            $layout = new BootstrapTwoColumnLayout($this);


            if ($contentType->hasList()) {

                $contentTypeListBox = $contentType->getListing($layout->col1);

                $contentTypeListBox->redirectSite = clone(ContentSite::$site);
                $contentTypeListBox->redirectSite->addParameter(new ContentTypeParameter());
                $contentTypeListBox->redirectSite->addParameter(new PageParameter());

            }


            $contentParameter = new ContentParameter();
            if ($contentParameter->hasValue()) {

                $content = $contentParameter->getContent(false);
                if ($content->hasView()) {

                    $widget = new ContentWidget($layout->col2);
                    $widget->contentType = $content;
                    $widget->loadAction = true;
                    $widget->redirectSite = ContentSite::$site;

                    /*$container = new ContentChildContainer($layout->col2);
                    $container->contentType=$content;*/

                }

            }

        }




        return parent::getContent();

    }

}