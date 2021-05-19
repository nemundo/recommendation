<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Calendar\Com\Container\CalendarContainer;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Com\Dropdown\MenuDropdown;
use Nemundo\Content\App\Explorer\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\Explorer\Parameter\PublicShareParameter;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\NewSite;
use Nemundo\Content\App\Explorer\Site\_Share\PublicShareDeleteSite;
use Nemundo\Content\App\Explorer\Site\_Share\PublicShareSite;
use Nemundo\Content\App\Explorer\Site\TreeSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Com\Container\ContentPropertyContainer;
use Nemundo\Content\Com\Dropdown\ContentTypeCollectionSubmenuDropdown;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Group\Com\Container\GroupContainer;
use Nemundo\Content\Index\Log\Com\Container\LogContainer;
use Nemundo\Content\Index\Relation\Com\Widget\RelationIndexWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Reader\ParentContentReader;
use Nemundo\Content\Index\Tree\Reader\ParentContentTypeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class TreePage extends ExplorerTemplate  // AbstractTemplateDocument
{
    public function getContent()
    {






        $layout = new BootstrapTwoColumnLayout($this);



        $contentId = null;

        $parameter = new TreeParameter();
        if ($parameter->exists()) {
            //    $reader->filter->andEqual($reader->model->)

            $treeReader=new TreeReader();
            $treeReader->model->loadChild();
            $treeReader->model->child->loadContentType();
            $treeRow = $treeReader->getRowById($parameter->getValue());

            $contentId = $treeRow->childId;

            $contentType = $treeRow->child->getContentType();

            $contentType->getDefaultView($layout->col2);




            $reader = new ParentContentReader();
            $reader->treeId = $parameter->getValue();
            foreach ($reader->getData() as $contentRow) {
                (new Debug())->write($contentRow->subject);
            }



            /*
            $breadcrumb= new TreeBreadcrumb($layout->col1);
            $breadcrumb->contentType = $contentType;
*/

            $h2=new H2($layout->col2);
            $h2->content = $treeRow->child->subject;

        }









        $table = new AdminClickableTable($layout->col1);


        $treeReader = new TreeReader();



        $parameter = new TreeParameter();
        if ($parameter->exists()) {
            $treeReader->filter->andEqual($treeReader->model->parentId, $contentId);
        }


        $treeReader->model->loadChild();
        foreach ($treeReader->getData() as $treeRow) {


            $row = new BootstrapClickableTableRow($table);
            $row->addText($treeRow->child->subject);

            $site = clone(TreeSite::$site);
            $site->addParameter(new TreeParameter($treeRow->id));
            $row->addClickableSite($site);


        }





        /*

        $content = (new ContentParameter())->getContentType(false);





        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;


        if ($content->hasView()) {


            $dropdown = new ContentTypeCollectionSubmenuDropdown($layout->col1);
            $dropdown->redirectSite = clone(NewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            foreach ((new BaseContentTypeCollection())->getContentTypeList() as $child) {
                $dropdown->addContentType($child);
            }





            $widget = new AdminWidget($layout->col1);
            $widget->widgetTitle = $content->getSubject();


            $content->getDefaultView($widget);



            $container = new TreeIndexContainer($layout->col2);
            $container->contentType = $content;
            $container->redirectSite = TreeSite::$site;



        }
*/



        return parent::getContent();
    }
}