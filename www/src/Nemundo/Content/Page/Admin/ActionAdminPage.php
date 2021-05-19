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
use Nemundo\Content\Data\ContentAction\ContentActionReader;
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


class ActionAdminPage extends ContentAdminTemplate
{

    public function getContent()
    {


        $contentActionReader = new ContentActionReader();
        $contentActionReader->model->loadContentType();
        $contentActionReader->addOrder($contentActionReader->model->contentType);


        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Class');
        $header->addText('Type Id');

        $header->addText('View');


        //$header->addText($contentActionReader->model->application->label);
        $header->addText('Item Count');
        $header->addEmpty();


        foreach ($contentActionReader->getData() as $contentActionRow) {

            //$contentType = $contentTypeRow->getContentType();

            $row = new BootstrapClickableTableRow($table);

            $row->addText($contentActionRow->contentType->contentType);
            //$row->addText($contentTypeRow->phpClass);
            //$row->addText($contentActionRow->id);

        }



        return parent::getContent();

    }

}