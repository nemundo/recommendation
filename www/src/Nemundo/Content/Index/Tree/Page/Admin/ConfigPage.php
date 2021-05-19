<?php


namespace Nemundo\Content\Index\Tree\Page\Admin;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypeAdmin;
use Nemundo\Content\Index\Tree\Com\Form\RestrictedContentTypeForm;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentTypeReader;
use Nemundo\Content\Index\Tree\Template\TreeAdminTemplate;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ConfigPage extends TreeAdminTemplate // AbstractTemplateDocument  // ContentTemplate
{

    public function getContent()
    {


        $admin = new RestrictedContentTypeAdmin($this);
$admin->contentTypeId= (new ContentTypeParameter())->getValue();



        //layout->col2);
        //$admin->contentTypeId=$contentTypeListBox->getValue();


        /*
        $layout = new BootstrapTwoColumnLayout($this);

        $form = new SearchForm($layout->col1);

        $contentTypeListBox = new ContentTypeListBox($form);
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->searchMode = true;

        if ($contentTypeListBox->hasValue()) {

            $form = new RestrictedContentTypeForm($layout->col2);
            $form->contentTypeId = $contentTypeListBox->getValue();

            $admin=new RestrictedContentTypeAdmin($layout->col2);
            $admin->contentTypeId=$contentTypeListBox->getValue();

        }*/














        /*
        $parentId = 1;
        $parameter= new ParentParameter();
        if ($parameter->hasValue()) {
            $parentId=$parameter->getValue();
            $parameter->getContentType(false)->getDefaultView($layout->col2);

            $breadcrumb = new TreeBreadcrumb($layout->col1);
            $breadcrumb->contentType = $parameter->getContentType(false);

        }








        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Parent');
        $header->addText('Parent Subject');
        $header->addText('Parent Id');
        $header->addText('Child');
        $header->addText('Child Subject');
        $header->addText('Child Id');
        $header->addText('Item Order');
        $header->addText('View Id');

        $treeReader = new TreePaginationReader();
        $treeReader->model->loadParent();
        $treeReader->model->parent->loadContentType();
        $treeReader->model->loadChild();
        $treeReader->model->child->loadContentType();
        $treeReader->filter->andEqual($treeReader->model->parentId,$parentId);
        $treeReader->addOrder($treeReader->model->id, SortOrder::DESCENDING);
        $treeReader->paginationLimit = 50;


        foreach ($treeReader->getData() as $treeRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($treeRow->parent->contentType->contentType);

            $contentType = $treeRow->parent->getContentType();
            $row->addText($contentType->getSubject());

            $row->addText($treeRow->parentId);


            $row->addText($treeRow->child->contentType->contentType);
            $contentType = $treeRow->child->getContentType();
            $row->addText($contentType->getSubject());
            $row->addText($treeRow->childId);
            $row->addText($treeRow->itemOrder);
            $row->addText($treeRow->viewId);

            $site=clone(TreeSite::$site);
            $site->addParameter(new ParentParameter($treeRow->childId));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $treeReader;*/


        return parent::getContent();


    }

}