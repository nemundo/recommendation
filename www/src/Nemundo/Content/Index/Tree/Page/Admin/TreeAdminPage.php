<?php


namespace Nemundo\Content\Index\Tree\Page\Admin;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Data\Tree\TreePaginationReader;
use Nemundo\Content\Index\Tree\Site\Admin\TreeAdminSite;
use Nemundo\Content\Index\Tree\Template\TreeAdminTemplate;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Parameter\ViewParameter;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;


class TreeAdminPage extends TreeAdminTemplate
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
            $contentTypeListBox->applicationId = $applicationListBox->getValue();
        }

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $contentType = $contentTypeParameter->getContentType();

            $layout = new BootstrapThreeColumnLayout($this);
            $layout->col1->columnWidth = 4;
            $layout->col2->columnWidth = 6;
            $layout->col3->columnWidth = 2;

            if ($contentType->hasList()) {

                $contentTypeListBox = $contentType->getListing($layout->col1);
                $contentTypeListBox->redirectSite = TreeAdminSite::$site;
                $contentTypeListBox->redirectSite->addParameter(new ContentTypeParameter());

            }


            $contentParameter = new ContentParameter();
            if ($contentParameter->hasValue()) {


                $btn = new AdminSiteButton($layout->col2);
                $btn->site = clone(ContentAdminSite::$site);
                $btn->site->addParameter(new ContentTypeParameter());
                $btn->site->title = 'New';


                $content = $contentParameter->getContent(false);
                if ($content->hasView()) {
                    //$content->getDefaultView($layout->col2);

                    $widget = new ContentWidget($layout->col2);
                    $widget->contentType = $content;
                    $widget->loadAction = true;

                    $widget->viewId = (new ViewParameter())->getValue();

                    $widget->redirectSite = ContentAdminSite::$site;


                    $container = new TreeIndexContainer($layout->col3);
                    $container->contentType = $content;
                    $container->redirectSite = TreeAdminSite::$site;

                }

            } else {

                if ($contentType->hasForm()) {

                    $widget = new AdminWidget($layout->col2);
                    $widget->widgetTitle = 'New';

                    $form = $contentType->getDefaultForm($widget);
                    $form->redirectSite = clone(TreeAdminSite::$site);
                    $form->redirectSite->addParameter(new ContentTypeParameter());
                    //$list->redirectSite = ExplorerSite::$site;
                }


            }


        }


        $treeReader = new TreePaginationReader();
        $treeReader->model->loadParent();
        $treeReader->model->parent->loadContentType();
        $treeReader->model->loadChild();
        $treeReader->model->child->loadContentType();
        $treeReader->model->loadView();

        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText($treeReader->model->parent->label);
        $header->addEmpty();

        $header->addText($treeReader->model->child->label);
        $header->addEmpty();

        $header->addText($treeReader->model->view->label);



        foreach ($treeReader->getData() as $treeRow) {

            $row = new AdminClickableTableRow($table);
            $row->addText($treeRow->parent->contentType->contentType);
            $row->addText($treeRow->parent->subject);
            $row->addText($treeRow->child->contentType->contentType);
            $row->addText($treeRow->child->subject);
            $row->addText($treeRow->view->viewName);

        }


        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $treeReader;


        return parent::getContent();

    }

}