<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Explorer\Com\Form\ConfigContentTypeForm;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\App\Explorer\Data\ExplorerContentType\ExplorerContentTypeReader;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypeAdmin;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypeCollectionAdmin;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypePerContentTypeAdmin;

class ConfigPage extends ExplorerTemplate
{

    public function getContent()
    {


        $admin=new RestrictedContentTypePerContentTypeAdmin($this);
        $admin->contentTypeId = (new ContainerContentType())->typeId;


        /*
        $admin =  new RestrictedContentTypeCollectionAdmin($this);
$admin->contentTypeCollection->addContentType(new ContainerContentType());


        /*
        new ConfigContentTypeForm($this);

        $table = new AdminTable($this);

        $reader = new ExplorerContentTypeReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->contentType->contentType);

        foreach ($reader->getData() as $contentTypeRow) {

            $row = new TableRow($table);
            $row->addText($contentTypeRow->contentType->contentType);

        }*/


        return parent::getContent();
    }
}