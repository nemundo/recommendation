<?php

namespace Nemundo\Content\Index\Tree\Page;

use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Site\TreeSite;
use Nemundo\Content\Index\Tree\Template\TreeTemplate;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class TreePage extends TreeTemplate  // AbstractTemplateDocument
{

    public function getContent()
    {


       /* $form = new SearchForm($this);   // new ApplicationContentTypeSearchForm($this);

        $formRow = new BootstrapRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->searchMode = true;
        $applicationListBox->submitOnChange = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $contentTypeListBox = new ViewContentTypeListBox($formRow);
        $contentTypeListBox->searchMode = true;
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->column = true;
        $contentTypeListBox->columnSize = 2;

        if ($applicationListBox->hasValue()) {
            $contentTypeListBox->applicationId = $applicationListBox->getValue();
        }*/

        $layout = new BootstrapThreeColumnLayout($this);

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $contentType = $contentTypeParameter->getContentType();


            if ($contentType->hasList()) {

                $contentTypeListBox = $contentType->getListing($layout->col1);

                $contentTypeListBox->redirectSite = clone(TreeSite::$site);
                $contentTypeListBox->redirectSite->addParameter(new ContentTypeParameter());
                $contentTypeListBox->redirectSite->addParameter(new PageParameter());

            }
        }


        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {

            $content = $contentParameter->getContent(false);
            if ($content->hasView()) {


                $breadcrumb = new TreeBreadcrumb($layout->col2);
                $breadcrumb->redirectSite = clone(TreeSite::$site);
                $breadcrumb->redirectSite->addParameter(new ApplicationParameter());
                $breadcrumb->redirectSite->addParameter(new ContentTypeParameter());
                $breadcrumb->addActiveParentContentType($content);



                $widget = new ContentWidget($layout->col2);
                $widget->contentType = $content;
                $widget->loadAction = true;
                $widget->redirectSite = TreeSite::$site;

                /*$container = new ContentChildContainer($layout->col2);
                $container->contentType=$content;*/

                $table = new ChildTreeTable($layout->col3);
                $table->contentType = $content;
                $table->redirectSite = clone(TreeSite::$site);
                $table->redirectSite->addParameter(new ApplicationParameter());
                $table->redirectSite->addParameter(new ContentTypeParameter());

            }

        }


        return parent::getContent();

    }

}